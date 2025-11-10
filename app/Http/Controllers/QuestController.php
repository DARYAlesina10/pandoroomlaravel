<?php

namespace App\Http\Controllers;

use App\Quest;
use App\QuestBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class QuestController extends Controller
{
    public function index()
    {
        $quests = Quest::all(); // Получаем всех квестов из базы данных
        return view('quests.index', compact('quests')); // Возвращаем представление с квестами
    }

    public function show($id)
    {
        $quest = Quest::with(['slots' => function ($query) {
            $query->orderBy('time');
        }])->findOrFail($id);

        $startDate = Carbon::now()->startOfDay();
        $dateOptions = collect(range(0, 13))->map(function ($offset) use ($startDate) {
            return $startDate->copy()->addDays($offset);
        });

        return view('quests.show', [
            'quest' => $quest,
            'dateOptions' => $dateOptions,
        ]);
    }

    public function schedule(Request $request, $id)
    {
        $quest = Quest::with('slots')->findOrFail($id);

        $dateString = $request->query('date', Carbon::now()->toDateString());

        try {
            $date = Carbon::createFromFormat('Y-m-d', $dateString)->startOfDay();
        } catch (\Throwable $throwable) {
            return response()->json([
                'message' => 'Некорректная дата.',
            ], 422);
        }

        $bookings = $quest->bookings()
            ->whereDate('booking_date', $date->toDateString())
            ->get()
            ->map(function (QuestBooking $booking) {
                return [
                    'id' => $booking->id,
                    'quest_slot_id' => $booking->quest_slot_id,
                    'customer_name' => $booking->customer_name,
                ];
            })
            ->values();

        return response()->json([
            'date' => $date->toDateString(),
            'is_weekend' => $date->isWeekend(),
            'bookings' => $bookings,
        ]);
    }
}
