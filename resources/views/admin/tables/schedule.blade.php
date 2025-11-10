@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div>
            <h1 class="h3 mb-1">Расписание столов</h1>
            <p class="text-muted mb-0">Планируйте размещение гостей и комбинируйте бронирования со сценариями квестов.</p>
        </div>
        <a href="{{ route('admin.tables') }}" class="btn btn-outline-secondary">К управлению столами</a>
    </div>

    <form method="GET" class="card mb-4">
        <div class="card-body row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label" for="schedule-date">Дата</label>
                <input type="date" id="schedule-date" name="date" value="{{ $selectedDate->toDateString() }}" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label" for="schedule-hall">Зал</label>
                <select id="schedule-hall" name="hall_id" class="form-select">
                    @foreach ($halls as $hall)
                        <option value="{{ $hall->id }}" {{ optional($selectedHall)->id === $hall->id ? 'selected' : '' }}>{{ $hall->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 text-md-end">
                <button type="submit" class="btn btn-primary">Показать расписание</button>
            </div>
        </div>
    </form>

    @if (!$selectedHall)
        <div class="alert alert-info">Сначала создайте зал, чтобы планировать расписание столов.</div>
    @elseif ($tables->isEmpty())
        <div class="alert alert-info">В выбранном зале пока нет столов. Добавьте их, чтобы строить расписание.</div>
    @else
        <div class="d-flex flex-column gap-4">
            @foreach ($tables as $table)
                <div class="card shadow-sm">
                    <div class="card-header d-flex flex-column flex-lg-row justify-content-between gap-2 align-items-lg-center">
                        <div>
                            <h2 class="h5 mb-1">{{ $table->name }}</h2>
                            <div class="text-muted small">{{ $table->min_capacity }}–{{ $table->max_capacity }} гостей · {{ $selectedDate->translatedFormat('d F, l') }}</div>
                        </div>
                        <div class="text-muted small">
                            @if ($table->services)
                                <span class="me-2">Услуги:</span>
                                @foreach ($table->services as $service)
                                    <span class="badge bg-light text-dark">{{ $service }}</span>
                                @endforeach
                            @else
                                <span class="badge bg-light text-dark">Без доп. услуг</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th style="width:120px">Время</th>
                                        <th>Статус</th>
                                        <th>Комментарий</th>
                                        <th style="width:160px" class="text-end">Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($timeSlots as $slot)
                                    @php
                                        $key = $table->id . '|' . $slot;
                                        $bookingCollection = $bookings->get($key);
                                        $booking = $bookingCollection ? $bookingCollection->first() : null;
                                        $endTime = $booking ? \Illuminate\Support\Carbon::createFromFormat('H:i:s', $booking->end_time)->format('H:i') : null;
                                    @endphp
                                    <tr class="slot-row {{ $booking ? 'table-warning' : '' }}">
                                        <td>{{ $slot }} – {{ $booking ? $endTime : \Illuminate\Support\Carbon::createFromFormat('H:i', $slot)->addMinutes(30)->format('H:i') }}</td>
                                        <td>
                                            @if ($booking)
                                                <div class="fw-semibold">Забронировано</div>
                                                <div class="small text-muted">{{ $booking->customer_name }} • {{ $booking->customer_phone }}</div>
                                                @if ($booking->questBooking)
                                                    <div class="small">Квест: {{ optional(optional($booking->questBooking)->quest)->name }}</div>
                                                @endif
                                            @else
                                                <span class="text-success">Свободно</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($booking)
                                                <div class="small text-muted">Сотрудник: {{ $booking->staff_name }}</div>
                                                <div class="small">{{ $booking->comment ?? '—' }}</div>
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            @if ($booking)
                                                <button type="button" class="btn btn-outline-secondary btn-sm" data-booking-details
                                                    data-customer="{{ $booking->customer_name }}"
                                                    data-phone="{{ $booking->customer_phone }}"
                                                    data-staff="{{ $booking->staff_name }}"
                                                    data-comment="{{ $booking->comment }}"
                                                    data-quest="{{ optional(optional($booking->questBooking)->quest)->name }}"
                                                    data-start="{{ $slot }}"
                                                    data-end="{{ $endTime }}"
                                                >Подробнее</button>
                                            @else
                                                <button type="button" class="btn btn-primary btn-sm" data-open-table-booking
                                                    data-table-id="{{ $table->id }}"
                                                    data-table-name="{{ $table->name }}"
                                                    data-start="{{ $slot }}"
                                                >Забронировать</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<div class="modal fade" id="tableBookingModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Новое бронирование стола</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <form method="POST" action="{{ route('admin.tables.bookings.store') }}" id="table-booking-form">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Стол</label>
                            <input type="text" class="form-control" id="modal-table-name" readonly>
                            <input type="hidden" name="venue_table_id" id="modal-table-id">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Дата</label>
                            <input type="date" class="form-control" name="booking_date" value="{{ $selectedDate->toDateString() }}" readonly>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Начало</label>
                            <input type="time" class="form-control" name="start_time" id="modal-start" readonly>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Окончание</label>
                            <select class="form-select" name="end_time" id="modal-end"></select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Имя клиента</label>
                            <input type="text" class="form-control" name="customer_name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Телефон</label>
                            <input type="text" class="form-control" name="customer_phone" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Ответственный сотрудник</label>
                            <input type="text" class="form-control" name="staff_name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Комментарий</label>
                            <textarea class="form-control" name="comment" rows="2" placeholder="Пожелания, сет или дополнительная информация"></textarea>
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="link-quest-toggle">
                                <label class="form-check-label" for="link-quest-toggle">Привязать бронирование к квесту</label>
                            </div>
                        </div>
                        <div class="col-12" id="linked-quest-fields" style="display:none;">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Квест</label>
                                    <select class="form-select" name="quest[quest_id]" id="modal-quest-select">
                                        <option value="">Выберите квест</option>
                                        @foreach ($quests as $quest)
                                            <option value="{{ $quest->id }}">{{ $quest->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Слот квеста</label>
                                    <select class="form-select" name="quest[quest_slot_id]" id="modal-quest-slot">
                                        <option value="">Выберите слот</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-primary">Сохранить бронирование</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="tableBookingInfo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Детали бронирования</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <p><strong>Время:</strong> <span data-info-time></span></p>
                <p><strong>Клиент:</strong> <span data-info-customer></span></p>
                <p><strong>Телефон:</strong> <span data-info-phone></span></p>
                <p><strong>Сотрудник:</strong> <span data-info-staff></span></p>
                <p><strong>Комментарий:</strong> <span data-info-comment></span></p>
                <p><strong>Квест:</strong> <span data-info-quest></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

@php
    $questSlotsMap = $quests->mapWithKeys(function ($quest) {
        return [$quest->id => $quest->slots->map(function ($slot) {
            return [
                'id' => $slot->id,
                'time' => \Illuminate\Support\Carbon::createFromFormat('H:i:s', $slot->time)->format('H:i'),
                'label' => \Illuminate\Support\Carbon::createFromFormat('H:i:s', $slot->time)->format('H:i'),
            ];
        })];
    });
@endphp

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const bookingModal = new bootstrap.Modal(document.getElementById('tableBookingModal'));
        const bookingInfoModal = new bootstrap.Modal(document.getElementById('tableBookingInfo'));
        const questSlots = @json($questSlotsMap);

        const endSelect = document.getElementById('modal-end');
        const startInput = document.getElementById('modal-start');
        const questToggle = document.getElementById('link-quest-toggle');
        const questFields = document.getElementById('linked-quest-fields');
        const questSelect = document.getElementById('modal-quest-select');
        const questSlotSelect = document.getElementById('modal-quest-slot');

        document.querySelectorAll('[data-open-table-booking]').forEach((button) => {
            button.addEventListener('click', () => {
                const tableId = button.getAttribute('data-table-id');
                const tableName = button.getAttribute('data-table-name');
                const start = button.getAttribute('data-start');

                document.getElementById('modal-table-id').value = tableId;
                document.getElementById('modal-table-name').value = tableName;
                startInput.value = start;
                questToggle.checked = false;
                questFields.style.display = 'none';
                questSelect.value = '';
                questSlotSelect.innerHTML = '<option value="">Выберите слот</option>';

                populateEndOptions(start);
                bookingModal.show();
            });
        });

        document.querySelectorAll('[data-booking-details]').forEach((button) => {
            button.addEventListener('click', () => {
                const infoModal = document.getElementById('tableBookingInfo');
                infoModal.querySelector('[data-info-time]').textContent = `${button.dataset.start} – ${button.dataset.end}`;
                infoModal.querySelector('[data-info-customer]').textContent = button.dataset.customer || '—';
                infoModal.querySelector('[data-info-phone]').textContent = button.dataset.phone || '—';
                infoModal.querySelector('[data-info-staff]').textContent = button.dataset.staff || '—';
                infoModal.querySelector('[data-info-comment]').textContent = button.dataset.comment || '—';
                infoModal.querySelector('[data-info-quest]').textContent = button.dataset.quest || '—';
                bookingInfoModal.show();
            });
        });

        questToggle.addEventListener('change', () => {
            questFields.style.display = questToggle.checked ? 'block' : 'none';
        });

        questSelect.addEventListener('change', () => {
            const questId = questSelect.value;
            questSlotSelect.innerHTML = '<option value="">Выберите слот</option>';
            if (!questId || !questSlots[questId]) {
                return;
            }

            const startValue = startInput.value;
            questSlots[questId].forEach((slot) => {
                if (slot.time === startValue) {
                    const option = document.createElement('option');
                    option.value = slot.id;
                    option.textContent = `${slot.label}`;
                    questSlotSelect.appendChild(option);
                }
            });

            if (questSlotSelect.children.length === 1) {
                const option = document.createElement('option');
                option.value = '';
                option.disabled = true;
                option.textContent = 'Нет подходящих слотов';
                questSlotSelect.appendChild(option);
            }
        });

        function populateEndOptions(start) {
            endSelect.innerHTML = '';
            const [hour, minute] = start.split(':').map(Number);
            let current = new Date();
            current.setHours(hour, minute, 0, 0);

            const closing = new Date();
            closing.setHours(23, 59, 0, 0);

            while (current < closing) {
                current.setMinutes(current.getMinutes() + 30);
                if (current > closing) {
                    break;
                }
                const value = current.toTimeString().slice(0, 5);
                const option = document.createElement('option');
                option.value = value;
                option.textContent = value;
                endSelect.appendChild(option);
            }
        }
    });
</script>
@endpush
@endsection
