<?php

namespace App\Http\Controllers;

use App\Quest;
use App\TableBooking;
use App\VenueHall;
use App\VenueTable;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminTableScheduleController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->query('date');
        $selectedDate = $date ? Carbon::parse($date)->startOfDay() : Carbon::today();
        $selectedDate->startOfDay();

        $halls = VenueHall::with(['tables' => function ($query) {
            $query->orderBy('name');
        }])->orderBy('name')->get();

        $selectedHallId = (int) $request->query('hall_id', $halls->first()->id ?? 0);
        $selectedHall = $halls->firstWhere('id', $selectedHallId) ?? $halls->first();

        $tables = $selectedHall ? $selectedHall->tables : collect();
        $tableIds = $tables->pluck('id');

        $bookings = TableBooking::with(['questBooking.quest'])
            ->whereDate('booking_date', $selectedDate)
            ->whereIn('venue_table_id', $tableIds)
            ->get()
            ->groupBy(function (TableBooking $booking) {
                return $booking->venue_table_id . '|' . Carbon::createFromFormat('H:i:s', $booking->start_time)->format('H:i');
            });

        $timeSlots = $this->generateTimeSlots();
        $quests = Quest::with(['slots' => function ($query) {
            $query->orderBy('time');
        }])->orderBy('name')->get();

        return view('admin.tables.schedule', [
            'halls' => $halls,
            'selectedHall' => $selectedHall,
            'selectedDate' => $selectedDate,
            'timeSlots' => $timeSlots,
            'tables' => $tables,
            'bookings' => $bookings,
            'quests' => $quests,
        ]);
    }

    protected function generateTimeSlots(): array
    {
        $slots = [];
        $current = Carbon::today()->setTime(9, 0);
        $end = Carbon::today()->setTime(23, 30);

        while ($current->lte($end)) {
            $slots[] = $current->format('H:i');
            $current->addMinutes(30);
        }

        return $slots;
    }
}
