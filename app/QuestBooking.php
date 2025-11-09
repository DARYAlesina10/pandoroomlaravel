<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestBooking extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'booking_date' => 'date',
    ];

    public function quest()
    {
        return $this->belongsTo(Quest::class);
    }

    public function slot()
    {
        return $this->belongsTo(QuestSlot::class, 'quest_slot_id');
    }
}
