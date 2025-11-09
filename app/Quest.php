<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    protected $guarded = [
        '_method',
        '_token',
    ];

    protected $casts = [
        'weekday_base_price' => 'float',
        'weekend_base_price' => 'float',
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
