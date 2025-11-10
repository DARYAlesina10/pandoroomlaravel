<?php

namespace App\Http\Controllers;

use App\Quest;
use App\QuestBooking;
use App\TableBooking;
use App\User;
use App\VenueHall;
use App\VenueTable;
use Illuminate\Support\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $upcomingBookings = QuestBooking::with('quest')
            ->whereDate('booking_date', '>=', $today)
            ->orderBy('booking_date')
            ->orderBy('quest_slot_id')
            ->take(5)
            ->get();

        $bookingCount = QuestBooking::whereDate('booking_date', '>=', $today)->count();
        $tableBookingCount = TableBooking::whereDate('booking_date', '>=', $today)->count();
        $questCount = Quest::count();
        $tableCount = VenueTable::count();
        $hallCount = VenueHall::count();
        $userCount = User::count();

        $popularQuests = Quest::withCount(['bookings' => function ($query) use ($today) {
            $query->whereDate('booking_date', '>=', $today->copy()->subMonth());
        }])
            ->orderByDesc('bookings_count')
            ->take(4)
            ->get();

        $upcomingTableBookings = TableBooking::with(['table', 'questBooking.quest'])
            ->whereDate('booking_date', '>=', $today)
            ->orderBy('booking_date')
            ->orderBy('start_time')
            ->take(5)
            ->get();

        return view('admin.dashboard', [
            'bookingCount' => $bookingCount,
            'tableBookingCount' => $tableBookingCount,
            'questCount' => $questCount,
            'tableCount' => $tableCount,
            'hallCount' => $hallCount,
            'userCount' => $userCount,
            'upcomingBookings' => $upcomingBookings,
            'upcomingTableBookings' => $upcomingTableBookings,
            'popularQuests' => $popularQuests,
            'today' => $today,
        ]);
    }
}
