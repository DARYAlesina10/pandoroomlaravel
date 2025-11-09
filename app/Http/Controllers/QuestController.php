<?php

namespace App\Http\Controllers;

use App\Quest;
use Illuminate\Http\Request;

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
        }])->findOrFail($id); // Находим квест по ID или выбрасываем ошибку, если не найден

        $upcomingBookings = $quest->bookings()
            ->with(['slot', 'user'])
            ->whereDate('booking_date', '>=', now()->toDateString())
            ->orderBy('booking_date')
            ->orderBy('quest_slot_id')
            ->get();

        return view('quests.show', [
            'quest' => $quest,
            'upcomingBookings' => $upcomingBookings,
        ]); // Возвращаем представление для одного квеста
    }
}
