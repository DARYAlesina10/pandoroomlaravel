<?php

namespace App;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Model;

class QuestSlot extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'is_discount' => 'bool',
        'weekday_enabled' => 'bool',
        'weekend_enabled' => 'bool',
        'weekday_uses_base_price' => 'bool',
        'weekend_uses_base_price' => 'bool',
        'weekday_price' => 'float',
        'weekend_price' => 'float',
        'discount_price' => 'float',
    ];

    public function quest()
    {
        return $this->belongsTo(Quest::class);
    }

    public function bookings()
    {
        return $this->hasMany(QuestBooking::class);
    }

    public function isAvailableForDate(CarbonInterface $date): bool
    {
        return $date->isWeekend() ? $this->weekend_enabled : $this->weekday_enabled;
    }

    public function effectiveWeekdayPrice(): float
    {
        $base = optional($this->quest)->weekday_base_price ?? 0.0;

        return $this->weekday_uses_base_price ? (float) $base : (float) $this->weekday_price;
    }

    public function effectiveWeekendPrice(): float
    {
        $base = optional($this->quest)->weekend_base_price ?? 0.0;

        return $this->weekend_uses_base_price ? (float) $base : (float) $this->weekend_price;
    }

    public function priceForDate(CarbonInterface $date): float
    {
        if ($this->is_discount && $this->discount_price) {
            return (float) $this->discount_price;
        }

        return $date->isWeekend()
            ? $this->effectiveWeekendPrice()
            : $this->effectiveWeekdayPrice();
    }
}
