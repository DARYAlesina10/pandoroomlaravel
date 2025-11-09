<?php

namespace App\Http\Controllers;

use App\Quest;
use App\QuestBooking;
use App\QuestSlot;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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
            'customer_email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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

        DB::beginTransaction();

        try {
            $existingBooking = QuestBooking::query()
                ->where('quest_slot_id', $slot->id)
                ->whereDate('booking_date', $date)
                ->lockForUpdate()
                ->first();

            if ($existingBooking) {
                throw ValidationException::withMessages([
                    'quest_slot_id' => 'Этот слот уже забронирован на выбранную дату.',
                ]);
            }

            $user = User::where('email', $validated['customer_email'])->lockForUpdate()->first();

            if ($user) {
                if (!$user->password || !Hash::check($validated['password'], $user->password)) {
                    throw ValidationException::withMessages([
                        'customer_email' => 'Пользователь с таким email уже существует. Укажите правильный пароль или используйте другой email.',
                    ]);
                }

                if ($user->name !== $validated['customer_name']) {
                    $user->forceFill(['name' => $validated['customer_name']])->save();
                }
            } else {
                $user = User::create([
                    'name' => $validated['customer_name'],
                    'email' => $validated['customer_email'],
                    'password' => Hash::make($validated['password']),
                    'role' => 'user',
                ]);
            }

            $price = $this->determinePrice($slot, $date);

            QuestBooking::create([
                'quest_id' => $quest->id,
                'quest_slot_id' => $slot->id,
                'user_id' => $user->id,
                'booking_date' => $date,
                'customer_name' => $validated['customer_name'],
                'customer_phone' => $validated['customer_phone'],
                'price' => $price,
            ]);

            DB::commit();
        } catch (ValidationException $exception) {
            DB::rollBack();

            throw $exception;
        } catch (\Throwable $throwable) {
            DB::rollBack();

            report($throwable);

            return redirect()
                ->back()
                ->withErrors(['booking' => 'Не удалось сохранить бронирование. Попробуйте ещё раз.'])
                ->withInput();
        }

        return redirect()
            ->route('quests.show', ['id' => $quest->id])
            ->with('status', 'Слот успешно забронирован, личный кабинет создан!');
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
