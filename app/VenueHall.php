<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VenueHall extends Model
{
    protected $guarded = ['id'];

    public function tables()
    {
        return $this->hasMany(VenueTable::class);
    }
}
