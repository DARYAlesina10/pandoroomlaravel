<?php

namespace App\Http\Controllers;

use App\Quest;
use App\QuestBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminScheduleOverviewController extends Controller
{
    public function index(Request $request)
    {
        $today = Carbon::today();
        $requestedDate = $request->query('date');

        if ($requestedDate) {
            try {
                $activeDate = Carbon::parse($requestedDate)->startOfDay();
            } catch (\Throwable $throwable) {
                $activeDate = $today->copy();
            }
        } else {
            $activeDate = $today->copy();
        }

        $dateRange = collect(range(0, 13))->map(function (int $offset) use ($today) {
            return $today->copy()->addDays($offset);
        });

        $quests = Quest::with(['slots' => function ($query) {
            $query->orderBy('time');
        }])->orderBy('name')->get();

        $quests->each(function (Quest $quest) {
            $quest->slots->each->setRelation('quest', $quest);
        });

        $bookings = QuestBooking::with(['slot', 'quest'])
            ->whereDate('booking_date', $activeDate->toDateString())
            ->get()
            ->keyBy(function (QuestBooking $booking) {
                return sprintf('%s|%s', $booking->quest_id, $booking->quest_slot_id);
            });

        return view('admin.schedule-overview', [
            'quests' => $quests,
            'dateRange' => $dateRange,
            'activeDate' => $activeDate,
            'bookings' => $bookings,
        ]);
    }
}
