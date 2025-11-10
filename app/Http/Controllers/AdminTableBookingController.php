<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\HandlesCustomerAccounts;
use App\Http\Controllers\Concerns\HandlesTableBookings;
use App\Quest;
use App\QuestBooking;
use App\QuestSlot;
use App\TableBooking;
use App\VenueTable;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AdminTableBookingController extends Controller
{
    use HandlesCustomerAccounts;
    use HandlesTableBookings;

    public function store(Request $request)
    {
        if (!$request->user() || $request->user()->role !== 'admin') {
            abort(403);
        }

        $validated = $request->validate([
            'venue_table_id' => ['required', 'integer', 'exists:venue_tables,id'],
            'booking_date' => ['required', 'date', 'after_or_equal:today'],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['required', 'date_format:H:i', 'after:start_time'],
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_phone' => ['required', 'string', 'max:50'],
            'staff_name' => ['required', 'string', 'max:255'],
            'comment' => ['nullable', 'string'],
            'quest.quest_id' => ['nullable', 'integer', 'exists:quests,id'],
            'quest.quest_slot_id' => [
                'nullable',
                'integer',
                Rule::exists('quest_slots', 'id'),
            ],
        ], [
            'staff_name.required' => 'Укажите ответственного сотрудника.',
        ]);

        $questRequest = $request->input('quest', []);

        if (!empty($questRequest['quest_id']) || !empty($questRequest['quest_slot_id'])) {
            if (empty($questRequest['quest_id']) || empty($questRequest['quest_slot_id'])) {
                throw ValidationException::withMessages([
                    'quest.quest_slot_id' => 'Для привязки к квесту выберите сценарий и временной слот.',
                ]);
            }
        }

        $tableWindow = [
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
        ];
        $this->assertValidTableWindow($tableWindow, '');

        $bookingDate = Carbon::parse($validated['booking_date'])->startOfDay();
        $table = VenueTable::findOrFail($validated['venue_table_id']);
        $start = $this->makeTime($validated['start_time']);
        $end = $this->makeTime($validated['end_time'], true);

        DB::beginTransaction();

        try {
            $this->guardTableAvailability($table, $bookingDate, $start, $end, 'table_id');

            $normalizedPhone = $this->normalizePhone($validated['customer_phone']);
            $user = $this->resolveCustomer(
                $validated['customer_name'],
                $normalizedPhone,
                null,
                false
            );

            $tableBooking = TableBooking::create([
                'venue_table_id' => $table->id,
                'booking_date' => $bookingDate,
                'start_time' => $start->format('H:i:s'),
                'end_time' => $end->format('H:i:s'),
                'customer_name' => $validated['customer_name'],
                'customer_phone' => $validated['customer_phone'],
                'staff_name' => $validated['staff_name'],
                'comment' => $validated['comment'] ?? null,
            ]);

            if (!empty($questRequest['quest_id'])) {
                $quest = Quest::findOrFail($questRequest['quest_id']);
                $slot = QuestSlot::where('quest_id', $quest->id)->findOrFail($questRequest['quest_slot_id']);
                $slot->setRelation('quest', $quest);

                $slotTime = Carbon::createFromFormat('H:i:s', $slot->time)->format('H:i');
                if ($slotTime !== $validated['start_time']) {
                    throw ValidationException::withMessages([
                        'quest.quest_slot_id' => 'Выбранный слот квеста начинается в другое время. Выберите слот на ' . $validated['start_time'] . '.',
                    ]);
                }

                $existingQuestBooking = QuestBooking::where('quest_slot_id', $slot->id)
                    ->whereDate('booking_date', $bookingDate)
                    ->lockForUpdate()
                    ->first();

                if ($existingQuestBooking) {
                    throw ValidationException::withMessages([
                        'quest.quest_slot_id' => 'Этот слот квеста уже забронирован на выбранную дату.',
                    ]);
                }

                $price = $slot->priceForDate($bookingDate);

                $questBooking = QuestBooking::create([
                    'quest_id' => $quest->id,
                    'quest_slot_id' => $slot->id,
                    'user_id' => $user->id,
                    'booking_date' => $bookingDate,
                    'customer_name' => $validated['customer_name'],
                    'customer_phone' => $validated['customer_phone'],
                    'price' => $price,
                    'table_booking_id' => $tableBooking->id,
                ]);

                $tableBooking->forceFill(['quest_booking_id' => $questBooking->id])->save();
            }

            DB::commit();
        } catch (ValidationException $exception) {
            DB::rollBack();

            throw $exception;
        } catch (\Throwable $throwable) {
            DB::rollBack();

            report($throwable);

            return redirect()
                ->back()
                ->withErrors(['booking' => 'Не удалось сохранить бронирование стола. Попробуйте ещё раз.'])
                ->withInput();
        }

        return redirect()
            ->route('admin.tables.schedule', ['date' => $bookingDate->format('Y-m-d')])
            ->with('status', 'Бронирование стола успешно создано.');
    }
}
