<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    protected $guarded = [
        '_method',
        '_token',
    ];

    public function slots()
    {
        return $this->hasMany(QuestSlot::class)->orderBy('time');
    }

    public function bookings()
    {
        return $this->hasMany(QuestBooking::class);
    }
}
