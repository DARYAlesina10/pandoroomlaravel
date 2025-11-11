@extends('layouts.app')

@push('styles')
<style>
    .table-board-wrapper {
        background: #0f1014;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 24px 48px rgba(0, 0, 0, 0.35);
        color: #f5f6f8;
    }

    .table-board__meta {
        display: flex;
        flex-direction: column;
        gap: 6px;
        margin-bottom: 24px;
    }

    .table-board__meta h2 {
        font-size: 18px;
        font-weight: 700;
        margin: 0;
    }

    .table-board__meta small {
        color: rgba(245, 246, 248, 0.65);
    }

    .table-board__legend {
        display: flex;
        gap: 16px;
        align-items: center;
        margin-left: auto;
        flex-wrap: wrap;
    }

    .table-board__legend span {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        color: rgba(245, 246, 248, 0.7);
    }

    .table-board__legend i {
        width: 14px;
        height: 14px;
        border-radius: 4px;
        display: inline-block;
    }

    .table-board__legend i.free {
        background: linear-gradient(135deg, #39b54a, #78ff6a);
    }

    .table-board__legend i.busy {
        background: linear-gradient(135deg, #f45b69, #c81d77);
    }

    .table-board__legend i.disabled {
        background: linear-gradient(135deg, #3b4456, #1c212e);
    }

    .table-board {
        display: grid;
        grid-template-columns: 220px 1fr;
        gap: 24px;
    }

    .table-board__timeline {
        display: grid;
        grid-template-columns: repeat(var(--slot-count), minmax(56px, 1fr));
        gap: 4px;
        position: relative;
    }

    .table-board__timeline::before {
        content: '';
        position: absolute;
        top: -12px;
        left: 0;
        right: 0;
        border-top: 1px solid rgba(255, 255, 255, 0.05);
    }

    .table-board__time-headings {
        display: grid;
        grid-template-columns: repeat(var(--slot-count), minmax(56px, 1fr));
        gap: 4px;
        margin-bottom: 12px;
    }

    .table-board__time-headings span {
        font-size: 12px;
        text-align: center;
        color: rgba(245, 246, 248, 0.65);
    }

    .table-board__row {
        display: grid;
        grid-template-columns: 220px 1fr;
        align-items: stretch;
        gap: 24px;
        padding: 18px 0;
        border-top: 1px solid rgba(255, 255, 255, 0.04);
    }

    .table-board__row:first-of-type {
        border-top: none;
        padding-top: 0;
    }

    .table-board__table-card {
        background: linear-gradient(135deg, rgba(29, 34, 45, 0.9), rgba(46, 57, 81, 0.9));
        border-radius: 12px;
        padding: 16px;
        display: flex;
        flex-direction: column;
        gap: 12px;
        position: sticky;
        top: 90px;
    }

    .table-board__table-card h3 {
        margin: 0;
        font-size: 16px;
        font-weight: 700;
    }

    .table-board__table-meta {
        display: flex;
        flex-direction: column;
        gap: 4px;
        font-size: 13px;
        color: rgba(245, 246, 248, 0.6);
    }

    .table-board__services {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
    }

    .table-board__service {
        background: rgba(120, 128, 255, 0.15);
        color: #cbd2ff;
        border-radius: 999px;
        padding: 4px 10px;
        font-size: 11px;
    }

    .table-board__slot {
        border: none;
        border-radius: 10px;
        padding: 12px 10px;
        text-align: left;
        font-size: 13px;
        color: #f5f6f8;
        font-weight: 600;
        cursor: pointer;
        transition: transform 0.15s ease, box-shadow 0.15s ease;
        display: flex;
        flex-direction: column;
        gap: 6px;
        justify-content: center;
        min-height: 68px;
    }

    .table-board__slot small {
        font-weight: 500;
        font-size: 11px;
        color: rgba(245, 246, 248, 0.75);
    }

    .table-board__slot span {
        font-size: 12px;
    }

    .table-board__slot--free {
        background: linear-gradient(135deg, rgba(63, 214, 127, 0.18), rgba(47, 167, 101, 0.18));
        border: 1px solid rgba(63, 214, 127, 0.3);
    }

    .table-board__slot--free:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 24px rgba(63, 214, 127, 0.28);
    }

    .table-board__slot--booked {
        background: linear-gradient(135deg, rgba(241, 98, 137, 0.85), rgba(121, 40, 202, 0.85));
        border: 1px solid rgba(241, 98, 137, 0.9);
    }

    .table-board__slot--booked:hover {
        transform: translateY(-1px);
        box-shadow: 0 10px 20px rgba(241, 98, 137, 0.35);
    }

    .table-board__slot--disabled {
        background: linear-gradient(135deg, rgba(62, 68, 84, 0.65), rgba(40, 44, 59, 0.65));
        border: 1px solid rgba(62, 68, 84, 0.4);
        cursor: not-allowed;
        opacity: 0.6;
    }

    .table-board__row-controls {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    @media (max-width: 992px) {
        .table-board {
            grid-template-columns: 1fr;
        }

        .table-board__row {
            grid-template-columns: 1fr;
        }

        .table-board__table-card {
            position: static;
        }

        .table-board__time-headings,
        .table-board__timeline {
            overflow-x: auto;
        }
    }
</style>
@endpush

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
        @php
            $slotCount = count($timeSlots);
        @endphp
        <div class="table-board-wrapper">
            <div class="d-flex flex-column flex-lg-row align-items-lg-center gap-3 table-board__meta">
                <div>
                    <h2>{{ optional($selectedHall)->name }}</h2>
                    <small>{{ $selectedDate->translatedFormat('d F, l') }} · Всего столов: {{ $tables->count() }}</small>
                </div>
                <div class="table-board__legend">
                    <span><i class="free"></i> свободно</span>
                    <span><i class="busy"></i> занято</span>
                    <span><i class="disabled"></i> недоступно</span>
                </div>
            </div>
            <div class="table-board">
                <div></div>
                <div class="table-board__time-headings" style="--slot-count: {{ $slotCount }};">
                    @foreach ($timeSlots as $slot)
                        <span>{{ $slot }}</span>
                    @endforeach
                </div>

                @foreach ($tables as $table)
                    <div class="table-board__row">
                        <div class="table-board__table-card">
                            <div>
                                <h3>{{ $table->name }}</h3>
                                <div class="table-board__table-meta">
                                    <span>Вместимость: {{ $table->min_capacity }}–{{ $table->max_capacity }} гостей</span>
                                    <span>Статус: {{ $table->is_active ? 'активен' : 'скрыт' }}</span>
                                </div>
                            </div>
                            <div class="table-board__services">
                                @if (!empty($table->services))
                                    @foreach ($table->services as $service)
                                        <span class="table-board__service">{{ $service }}</span>
                                    @endforeach
                                @else
                                    <span class="table-board__service" style="background: rgba(255,255,255,0.08); color: rgba(245,246,248,0.6);">Без доп. услуг</span>
                                @endif
                            </div>
                            <div class="table-board__row-controls">
                                <button type="button"
                                        class="btn btn-sm btn-outline-light"
                                        data-open-table-booking
                                        data-table-id="{{ $table->id }}"
                                        data-table-name="{{ $table->name }}"
                                        data-start="09:00">
                                    Быстрая бронь с 09:00
                                </button>
                                <a href="{{ route('admin.tables') }}#table-{{ $table->id }}" class="btn btn-sm btn-outline-secondary">Редактировать</a>
                            </div>
                        </div>
                        <div class="table-board__timeline" style="--slot-count: {{ $slotCount }};">
                            @php
                                $slotIndex = 0;
                            @endphp
                            @while ($slotIndex < $slotCount)
                                @php
                                    $currentSlot = $timeSlots[$slotIndex];
                                    $key = $table->id . '|' . $currentSlot;
                                    $bookingCollection = $bookings->get($key);
                                    $booking = $bookingCollection ? $bookingCollection->first() : null;
                                @endphp

                                @if ($booking)
                                    @php
                                        $startCarbon = \Illuminate\Support\Carbon::createFromFormat('H:i:s', $booking->start_time);
                                        $endCarbon = \Illuminate\Support\Carbon::createFromFormat('H:i:s', $booking->end_time);
                                        $span = max(1, (int) ($startCarbon->diffInMinutes($endCarbon) / 30));
                                        $endLabel = $endCarbon->format('H:i');
                                        $questName = optional(optional($booking->questBooking)->quest)->name;
                                    @endphp
                                    <button type="button"
                                            class="table-board__slot table-board__slot--booked"
                                            style="grid-column: span {{ $span }};"
                                            data-booking-details
                                            data-start="{{ $currentSlot }}"
                                            data-end="{{ $endLabel }}"
                                            data-customer="{{ $booking->customer_name }}"
                                            data-phone="{{ $booking->customer_phone }}"
                                            data-staff="{{ $booking->staff_name }}"
                                            data-comment="{{ $booking->comment }}"
                                            data-quest="{{ $questName }}">
                                        <small>{{ $currentSlot }} – {{ $endLabel }}</small>
                                        <span>{{ $booking->customer_name }}</span>
                                        @if ($questName)
                                            <small>Квест: {{ $questName }}</small>
                                        @endif
                                    </button>
                                    @php
                                        $slotIndex += $span;
                                    @endphp
                                @else
                                    <button type="button"
                                            class="table-board__slot table-board__slot--free"
                                            style="grid-column: span 1;"
                                            data-open-table-booking
                                            data-table-id="{{ $table->id }}"
                                            data-table-name="{{ $table->name }}"
                                            data-start="{{ $currentSlot }}">
                                        <small>{{ $currentSlot }} – {{ \Illuminate\Support\Carbon::createFromFormat('H:i', $currentSlot)->addMinutes(30)->format('H:i') }}</small>
                                        <span>Свободно</span>
                                    </button>
                                    @php
                                        $slotIndex++;
                                    @endphp
                                @endif
                            @endwhile
                        </div>
                    </div>
                @endforeach
            </div>
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
