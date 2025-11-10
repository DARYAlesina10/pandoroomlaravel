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
use Illuminate\Support\Str;
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

        if (!$slot->isAvailableForDate($date)) {
            return redirect()
                ->back()
                ->withErrors(['quest_slot_id' => 'Этот слот недоступен для выбранной даты.'])
                ->withInput();
        }

        $slot->setRelation('quest', $quest);

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

            $normalizedPhone = $this->normalizePhone($validated['customer_phone']);

            $user = User::where('phone', $normalizedPhone)->lockForUpdate()->first();

            if ($user) {
                if (!$user->password || !Hash::check($validated['password'], $user->password)) {
                    throw ValidationException::withMessages([
                        'customer_phone' => 'Пользователь с таким номером уже существует. Укажите правильный пароль или используйте другой номер телефона.',
                    ]);
                }

                if ($user->name !== $validated['customer_name']) {
                    $user->forceFill(['name' => $validated['customer_name']])->save();
                }
                if ($user->phone !== $normalizedPhone) {
                    $user->forceFill(['phone' => $normalizedPhone])->save();
                }
            } else {
                $user = User::create([
                    'name' => $validated['customer_name'],
                    'email' => $this->generateGuestEmail($normalizedPhone),
                    'phone' => $normalizedPhone,
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
        $slot->loadMissing('quest');

        return $slot->priceForDate($date);
    }

    protected function normalizePhone(string $phone): string
    {
        $digits = preg_replace('/\D+/', '', $phone);

        if (!$digits) {
            return $phone;
        }

        if (strlen($digits) === 10) {
            $digits = '7' . $digits;
        }

        if ($digits[0] === '8' && strlen($digits) === 11) {
            $digits = '7' . substr($digits, 1);
        }

        return '+' . $digits;
    }

    protected function generateGuestEmail(string $normalizedPhone): string
    {
        $digits = preg_replace('/\D+/', '', $normalizedPhone);

        if (!$digits) {
            $digits = Str::random(10);
        }

        return sprintf('guest.%s@pandoroom.local', $digits);
    }
}
