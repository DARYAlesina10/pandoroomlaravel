<?php

namespace App\Http\Controllers;

use App\Quest;
use App\QuestBooking;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    protected const SORTABLE_COLUMNS = [
        'booking_date',
        'customer_name',
        'price',
        'created_at',
    ];

    public function index(Request $request)
    {
        $sort = $request->query('sort', 'booking_date');
        if (!in_array($sort, self::SORTABLE_COLUMNS, true)) {
            $sort = 'booking_date';
        }

        $direction = strtolower($request->query('direction', 'asc')) === 'desc' ? 'desc' : 'asc';

        $startDate = Carbon::now()->startOfDay();
        $endDate = $startDate->copy()->addDays(13);

        $quests = Quest::orderBy('name')->get();
        $selectedQuestId = (int) $request->query('quest_id');
        $selectedQuest = $quests->firstWhere('id', $selectedQuestId) ?? $quests->first();

        $slots = collect();
        $calendarBookings = collect();

        if ($selectedQuest) {
            $slots = $selectedQuest->slots()->orderBy('time')->get();
            $slots->each(function ($slot) use ($selectedQuest) {
                $slot->setRelation('quest', $selectedQuest);
            });

            $calendarBookings = QuestBooking::with(['slot', 'user'])
                ->where('quest_id', $selectedQuest->id)
                ->whereBetween('booking_date', [$startDate->toDateString(), $endDate->toDateString()])
                ->get()
                ->groupBy(function (QuestBooking $booking) {
                    return sprintf('%s|%s', $booking->booking_date->format('Y-m-d'), $booking->quest_slot_id);
                });
        }

        $dateRange = collect(range(0, 13))->map(function (int $offset) use ($startDate) {
            return $startDate->copy()->addDays($offset);
        });

        $listQuery = QuestBooking::query()
            ->with(['quest', 'slot'])
            ->whereDate('booking_date', '>=', $startDate->toDateString());

        $listQuery->orderBy($sort, $direction);

        if ($sort !== 'booking_date') {
            $listQuery->orderBy('booking_date');
        }

        $listQuery->orderBy('quest_slot_id');

        $bookings = $listQuery->paginate(20)->appends([
            'sort' => $sort,
            'direction' => $direction,
            'quest_id' => $selectedQuest ? $selectedQuest->id : null,
        ]);

        return view('admin.bookings', [
            'bookings' => $bookings,
            'sort' => $sort,
            'direction' => $direction,
            'quests' => $quests,
            'selectedQuest' => $selectedQuest,
            'dateRange' => $dateRange,
            'slots' => $slots,
            'calendarBookings' => $calendarBookings,
            'startDate' => $startDate,
            'endDate' => $endDate,
        ]);
    }
}
