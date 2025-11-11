<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VenueTable extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'services' => 'array',
        'is_active' => 'bool',
    ];

    public function hall()
    {
        return $this->belongsTo(VenueHall::class, 'venue_hall_id');
    }

    public function bookings()
    {
        return $this->hasMany(TableBooking::class, 'venue_table_id');
    }
}
