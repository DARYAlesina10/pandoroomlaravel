<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class TableBooking extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'booking_date' => 'date',
    ];

    public function table()
    {
        return $this->belongsTo(VenueTable::class, 'venue_table_id');
    }

    public function questBooking()
    {
        return $this->belongsTo(QuestBooking::class, 'quest_booking_id');
    }

    public function overlaps(Carbon $start, Carbon $end): bool
    {
        $currentStart = Carbon::createFromFormat('H:i:s', $this->start_time);
        $currentEnd = Carbon::createFromFormat('H:i:s', $this->end_time);

        return $start->lt($currentEnd) && $end->gt($currentStart);
    }
}
