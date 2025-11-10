<?php

namespace App\Http\Controllers;

use App\QuestBooking;
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

        $query = QuestBooking::query()
            ->with(['quest', 'slot'])
            ->whereDate('booking_date', '>=', now()->toDateString());

        $query->orderBy($sort, $direction);

        if ($sort !== 'booking_date') {
            $query->orderBy('booking_date');
        }

        $query->orderBy('quest_slot_id');

        $bookings = $query->paginate(20)->appends([
            'sort' => $sort,
            'direction' => $direction,
        ]);

        return view('admin.bookings', [
            'bookings' => $bookings,
            'sort' => $sort,
            'direction' => $direction,
        ]);
    }
}
