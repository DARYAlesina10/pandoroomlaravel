<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestSlot extends Model
{
    protected $guarded = ['id'];

    public function quest()
    {
        return $this->belongsTo(Quest::class);
    }

    public function bookings()
    {
        return $this->hasMany(QuestBooking::class);
    }
}
