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

class AdminQuestBookingController extends Controller
{
    use HandlesCustomerAccounts;
    use HandlesTableBookings;

    public function store(Request $request, Quest $quest)
    {
        if (!$request->user() || $request->user()->role !== 'admin') {
            abort(403);
        }

        $validated = $request->validate([
            'quest_slot_id' => [
                'required',
                'integer',
                Rule::exists('quest_slots', 'id')->where(function ($query) use ($quest) {
                    return $query->where('quest_id', $quest->id);
                }),
            ],
            'booking_date' => ['required', 'date', 'after_or_equal:today'],
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_phone' => ['required', 'string', 'max:50'],
            'table_booking.table_id' => ['nullable', 'integer', 'exists:venue_tables,id'],
            'table_booking.start_time' => ['required_with:table_booking.table_id', 'date_format:H:i'],
            'table_booking.end_time' => ['required_with:table_booking.table_id', 'date_format:H:i', 'after:table_booking.start_time'],
            'table_booking.staff_name' => ['required_with:table_booking.table_id', 'string', 'max:255'],
            'table_booking.comment' => ['nullable', 'string'],
        ], [
            'table_booking.staff_name.required_with' => 'Укажите ответственного сотрудника для бронирования стола.',
        ]);

        $slot = QuestSlot::where('quest_id', $quest->id)->findOrFail($validated['quest_slot_id']);
        $slot->setRelation('quest', $quest);

        $bookingDate = Carbon::parse($validated['booking_date'])->startOfDay();

        $tableRequest = $request->input('table_booking', []);

        if (!empty($tableRequest['table_id'])) {
            $this->assertValidTableWindow($tableRequest);
        }

        DB::beginTransaction();

        try {
            $existingBooking = QuestBooking::where('quest_slot_id', $slot->id)
                ->whereDate('booking_date', $bookingDate)
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
                null,
                false
            );

            $price = $slot->priceForDate($bookingDate);

            $questBooking = QuestBooking::create([
                'quest_id' => $quest->id,
                'quest_slot_id' => $slot->id,
                'user_id' => $user->id,
                'booking_date' => $bookingDate,
                'customer_name' => $validated['customer_name'],
                'customer_phone' => $validated['customer_phone'],
                'price' => $price,
            ]);

            if (!empty($tableRequest['table_id'])) {
                $table = VenueTable::findOrFail($tableRequest['table_id']);
                $start = $this->makeTime($tableRequest['start_time']);
                $end = $this->makeTime($tableRequest['end_time'], true);

                $this->guardTableAvailability($table, $bookingDate, $start, $end);

                $tableBooking = TableBooking::create([
                    'venue_table_id' => $table->id,
                    'booking_date' => $bookingDate,
                    'start_time' => $start->format('H:i:s'),
                    'end_time' => $end->format('H:i:s'),
                    'customer_name' => $validated['customer_name'],
                    'customer_phone' => $validated['customer_phone'],
                    'staff_name' => $tableRequest['staff_name'],
                    'comment' => $tableRequest['comment'] ?? null,
                    'quest_booking_id' => $questBooking->id,
                ]);

                $questBooking->forceFill(['table_booking_id' => $tableBooking->id])->save();
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
                ->withErrors(['booking' => 'Не удалось сохранить бронирование. Попробуйте ещё раз.'])
                ->withInput();
        }

        return redirect()
            ->route('admin.bookings', ['quest_id' => $quest->id])
            ->with('status', 'Бронирование квеста успешно создано.');
    }

}
