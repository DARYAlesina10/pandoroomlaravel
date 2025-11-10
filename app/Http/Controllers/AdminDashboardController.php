<?php

namespace App\Http\Controllers;

use App\Quest;
use App\QuestBooking;
use App\User;
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
        $questCount = Quest::count();
        $userCount = User::count();

        $popularQuests = Quest::withCount(['bookings' => function ($query) use ($today) {
            $query->whereDate('booking_date', '>=', $today->copy()->subMonth());
        }])
            ->orderByDesc('bookings_count')
            ->take(4)
            ->get();

        return view('admin.dashboard', [
            'bookingCount' => $bookingCount,
            'questCount' => $questCount,
            'userCount' => $userCount,
            'upcomingBookings' => $upcomingBookings,
            'popularQuests' => $popularQuests,
            'today' => $today,
        ]);
    }
}
