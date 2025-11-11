<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\HandlesCustomerAccounts;
use App\Quest;
use App\QuestBooking;
use App\QuestSlot;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class QuestBookingController extends Controller
{
    use HandlesCustomerAccounts;

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

            $user = $this->resolveCustomer(
                $validated['customer_name'],
                $normalizedPhone,
                $validated['password'],
                true
            );

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

        $returnTo = $request->input('return_to');

        if ($returnTo === 'admin_schedule_overview') {
            return redirect()
                ->route('admin.schedule.overview', ['date' => $date->format('Y-m-d')])
                ->with('status', 'Слот успешно забронирован и добавлен в расписание.');
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
}
