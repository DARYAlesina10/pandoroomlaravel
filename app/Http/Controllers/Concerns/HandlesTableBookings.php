<?php

namespace App\Http\Controllers\Concerns;

use App\TableBooking;
use App\VenueTable;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;

trait HandlesTableBookings
{
    protected function makeTime(string $time, bool $isEnd = false): Carbon
    {
        return Carbon::createFromFormat('H:i', $time);
    }

    protected function assertValidTableWindow(array $tableRequest, string $fieldPrefix = 'table_booking'): void
    {
        $start = $this->makeTime($tableRequest['start_time']);
        $end = $this->makeTime($tableRequest['end_time'], true);

        $startField = $fieldPrefix ? $fieldPrefix . '.start_time' : 'start_time';
        $endField = $fieldPrefix ? $fieldPrefix . '.end_time' : 'end_time';

        if ($start->minute % 30 !== 0 || $end->minute % 30 !== 0) {
            throw ValidationException::withMessages([
                $startField => 'Время бронирования стола задаётся с шагом 30 минут.',
            ]);
        }

        $opening = Carbon::today()->setTime(9, 0);
        $closing = Carbon::today()->setTime(23, 59, 59);

        if ($start->lt($opening) || $end->gt($closing)) {
            throw ValidationException::withMessages([
                $startField => 'Стол можно забронировать с 09:00 до 24:00.',
            ]);
        }

        if ($start->diffInMinutes($end) % 30 !== 0) {
            throw ValidationException::withMessages([
                $endField => 'Длительность бронирования должна быть кратна 30 минутам.',
            ]);
        }
    }

    protected function guardTableAvailability(
        VenueTable $table,
        Carbon $date,
        Carbon $start,
        Carbon $end,
        string $field = 'table_booking.table_id'
    ): void
    {
        $overlap = TableBooking::where('venue_table_id', $table->id)
            ->whereDate('booking_date', $date)
            ->where(function ($query) use ($start, $end) {
                $query->where('start_time', '<', $end->format('H:i:s'))
                    ->where('end_time', '>', $start->format('H:i:s'));
            })
            ->lockForUpdate()
            ->exists();

        if ($overlap) {
            throw ValidationException::withMessages([
                $field => 'Выбранный стол уже забронирован в указанный промежуток.',
            ]);
        }
    }
}
