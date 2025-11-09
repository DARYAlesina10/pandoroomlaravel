<?php

namespace App\Http\Controllers;

use App\Quest;
use App\QuestBooking;
use App\QuestSlot;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class QuestBookingController extends Controller
{
    public function store(Request $request, $questId): RedirectResponse
    {
        $quest = Quest::with('slots')->findOrFail($questId);

        $validated = $request->validate([
            'booking_date' => ['required', 'date', 'after_or_equal:today'],
            'quest_slot_id' => ['required', 'integer'],
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_phone' => ['required', 'string', 'max:50'],
        ]);

        /** @var QuestSlot $slot */
        $slot = $quest->slots->firstWhere('id', (int) $validated['quest_slot_id']);

        if (!$slot) {
            return redirect()
                ->back()
                ->withErrors(['quest_slot_id' => 'Выбранный слот не принадлежит этому квесту.'])
                ->withInput();
        }

        $date = Carbon::parse($validated['booking_date'])->startOfDay();

        $alreadyBooked = QuestBooking::query()
            ->where('quest_slot_id', $slot->id)
            ->whereDate('booking_date', $date)
            ->exists();

        if ($alreadyBooked) {
            return redirect()
                ->back()
                ->withErrors(['quest_slot_id' => 'Этот слот уже забронирован на выбранную дату.'])
                ->withInput();
        }

        $price = $this->determinePrice($slot, $date);

        QuestBooking::create([
            'quest_id' => $quest->id,
            'quest_slot_id' => $slot->id,
            'booking_date' => $date,
            'customer_name' => $validated['customer_name'],
            'customer_phone' => $validated['customer_phone'],
            'price' => $price,
        ]);

        return redirect()
            ->route('quests.show', ['id' => $quest->id])
            ->with('status', 'Слот успешно забронирован!');
    }

    protected function determinePrice(QuestSlot $slot, Carbon $date): float
    {
        if ($slot->is_discount && $slot->discount_price) {
            return (float) $slot->discount_price;
        }

        $isWeekend = in_array($date->dayOfWeek, [Carbon::SATURDAY, Carbon::SUNDAY], true);

        return (float) ($isWeekend ? $slot->weekend_price : $slot->weekday_price);
    }
}
