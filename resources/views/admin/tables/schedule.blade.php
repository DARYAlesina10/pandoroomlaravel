@extends('layouts.app')

@push('styles')
<style>
    .table-board-wrapper {
        background: #0f1014;
        border-radius: 18px;
        padding: 28px;
        box-shadow: 0 28px 60px rgba(0, 0, 0, 0.35);
        color: #f5f6f8;
    }

    .table-board__meta {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-bottom: 28px;
    }

    @media (min-width: 992px) {
        .table-board__meta {
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
        }
    }

    .table-board__meta h2 {
        font-size: 20px;
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
        flex-wrap: wrap;
    }

    .table-board__legend span {
        display: inline-flex;
        align-items: center;
        gap: 8px;
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

    .table-board__hall {
        background: linear-gradient(145deg, rgba(22, 24, 32, 0.92), rgba(34, 40, 58, 0.88));
        border-radius: 16px;
        border: 1px solid rgba(255, 255, 255, 0.04);
        padding: 22px 24px 26px;
        margin-bottom: 24px;
    }

    .table-board__hall-header {
        display: flex;
        flex-direction: column;
        gap: 6px;
        margin-bottom: 18px;
    }

    @media (min-width: 768px) {
        .table-board__hall-header {
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
        }
    }

    .table-board__hall-header h3 {
        margin: 0;
        font-size: 18px;
        font-weight: 700;
    }

    .table-board__hall-header small {
        display: block;
        color: rgba(245, 246, 248, 0.6);
    }

    .table-board__hall-meta {
        display: flex;
        gap: 16px;
        align-items: center;
        flex-wrap: wrap;
        font-size: 13px;
        color: rgba(245, 246, 248, 0.65);
    }

    .table-board {
        display: grid;
        grid-template-columns: 220px 1fr;
        gap: 22px;
    }

    .table-board__head-spacer {
        height: 0;
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
        gap: 22px;
        align-items: stretch;
        padding: 16px 0;
        border-top: 1px solid rgba(255, 255, 255, 0.05);
    }

    .table-board__row:first-of-type {
        border-top: none;
        padding-top: 6px;
    }

    .table-board__table-card {
        background: linear-gradient(145deg, rgba(32, 36, 52, 0.96), rgba(44, 54, 80, 0.92));
        border-radius: 14px;
        padding: 14px 16px;
        display: flex;
        flex-direction: column;
        gap: 6px;
        height: 100%;
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.03);
        transition: transform 0.2s ease;
    }

    .table-board__table-card:hover {
        transform: translateY(-2px);
    }

    .table-board__table-hall {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: rgba(203, 210, 255, 0.85);
    }

    .table-board__table-card h4 {
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
        max-height: 0;
        opacity: 0;
        overflow: hidden;
        transition: max-height 0.2s ease, opacity 0.2s ease;
    }

    .table-board__services {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        max-height: 0;
        opacity: 0;
        overflow: hidden;
        transition: max-height 0.2s ease, opacity 0.2s ease;
    }

    .table-board__service {
        background: rgba(120, 128, 255, 0.15);
        color: #cbd2ff;
        border-radius: 999px;
        padding: 4px 10px;
        font-size: 11px;
    }

    .table-board__row-controls {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-top: auto;
        max-height: 0;
        opacity: 0;
        overflow: hidden;
        transition: max-height 0.2s ease, opacity 0.2s ease;
    }

    .table-board__table-card:hover .table-board__table-meta,
    .table-board__table-card:hover .table-board__services,
    .table-board__table-card:hover .table-board__row-controls,
    .table-board__table-card:focus-within .table-board__table-meta,
    .table-board__table-card:focus-within .table-board__services,
    .table-board__table-card:focus-within .table-board__row-controls {
        max-height: 400px;
        opacity: 1;
    }

    .table-board__timeline {
        display: grid;
        grid-template-columns: repeat(var(--slot-count), minmax(56px, 1fr));
        gap: 4px;
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
        background: rgba(255, 255, 255, 0.02);
        user-select: none;
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

    .table-board__slot--selecting,
    .table-board__slot--selected {
        background: linear-gradient(135deg, rgba(90, 227, 160, 0.4), rgba(47, 167, 101, 0.4));
        border: 1px solid rgba(63, 214, 127, 0.65);
        box-shadow: 0 0 0 2px rgba(63, 214, 127, 0.2);
    }

    .table-board__slot--selected {
        box-shadow: 0 0 0 2px rgba(63, 214, 127, 0.35);
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

    @media (max-width: 992px) {
        .table-board__hall {
            padding: 20px;
        }

        .table-board {
            grid-template-columns: 1fr;
        }

        .table-board__row {
            grid-template-columns: 1fr;
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
                    <option value="0" {{ $selectedHallId === 0 ? 'selected' : '' }}>Все залы</option>
                    @foreach ($halls as $hall)
                        <option value="{{ $hall->id }}" {{ $selectedHallId === $hall->id ? 'selected' : '' }}>{{ $hall->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 text-md-end">
                <button type="submit" class="btn btn-primary">Показать расписание</button>
            </div>
        </div>
    </form>

    @if ($halls->isEmpty())
        <div class="alert alert-info">Сначала создайте хотя бы один зал, чтобы планировать расписание столов.</div>
    @elseif ($displayHalls->isEmpty())
        <div class="alert alert-info">Залов, подходящих под выбранные фильтры, сейчас нет. Попробуйте снять фильтр или создайте новые записи.</div>
    @else
        @php
            $slotCount = count($timeSlots);
            $totalTables = $tables->count();
            $metaTitle = $selectedHallId !== 0 && $displayHalls->first()
                ? $displayHalls->first()->name
                : 'Все залы';
        @endphp
        <div class="table-board-wrapper">
            <div class="table-board__meta">
                <div>
                    <h2>{{ $metaTitle }}</h2>
                    <small>{{ $selectedDate->translatedFormat('d F, l') }} · Столов: {{ $totalTables }}</small>
                </div>
                <div class="table-board__legend">
                    <span><i class="free"></i> доступно</span>
                    <span><i class="busy"></i> занято</span>
                    <span><i class="disabled"></i> недоступно</span>
                </div>
            </div>

            @foreach ($displayHalls as $hall)
                <div class="table-board__hall" id="hall-{{ $hall->id }}">
                    <div class="table-board__hall-header">
                        <div>
                            <h3>{{ $hall->name }}</h3>
                            <small>Столов: {{ $hall->tables->count() }}</small>
                        </div>
                        @if ($hall->tables->isNotEmpty())
                            @php
                                $minCapacity = $hall->tables->min('min_capacity');
                                $maxCapacity = $hall->tables->max('max_capacity');
                            @endphp
                            <div class="table-board__hall-meta">
                                <span>Диапазон вместимости: {{ $minCapacity }}–{{ $maxCapacity }} гостей</span>
                            </div>
                        @endif
                    </div>

                    @if ($hall->tables->isEmpty())
                        <div class="alert alert-dark text-light mb-0">В этом зале ещё не создано столов. Добавьте их на странице управления столами.</div>
                    @else
                        <div class="table-board" style="--slot-count: {{ $slotCount }};">
                            <div class="table-board__head-spacer"></div>
                            <div class="table-board__time-headings" style="--slot-count: {{ $slotCount }};">
                                @foreach ($timeSlots as $slot)
                                    <span>{{ $slot }}</span>
                                @endforeach
                            </div>

                            @foreach ($hall->tables as $table)
                                <div class="table-board__row" id="table-{{ $table->id }}">
                                    <div class="table-board__table-card">
                                        <span class="table-board__table-hall">Зал · {{ $hall->name }}</span>
                                        <h4>{{ $table->name }}</h4>
                                        <div class="table-board__table-meta">
                                            <span>Вместимость: {{ $table->min_capacity }}–{{ $table->max_capacity }} гостей</span>
                                            <span>Статус: {{ $table->is_active ? 'активен' : 'скрыт' }}</span>
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
                                            @php
                                                $quickStart = '09:00';
                                                $quickEnd = \Illuminate\Support\Carbon::createFromFormat('H:i', $quickStart)
                                                    ->addMinutes(30)
                                                    ->format('H:i');
                                            @endphp
                                            <button type="button"
                                                    class="btn btn-sm btn-outline-light"
                                                    data-open-table-booking
                                                    data-table-id="{{ $table->id }}"
                                                    data-table-name="{{ $table->name }}"
                                                    data-table-hall="{{ $hall->name }}"
                                                    data-start="{{ $quickStart }}"
                                                    data-end="{{ $quickEnd }}">
                                                Быстрая бронь с {{ $quickStart }}
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
                                                        data-quest="{{ $questName }}"
                                                        data-table="{{ $table->name }}"
                                                        data-hall="{{ $hall->name }}">
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
                                                @php
                                                    $slotEnd = \Illuminate\Support\Carbon::createFromFormat('H:i', $currentSlot)
                                                        ->addMinutes(30)
                                                        ->format('H:i');
                                                @endphp
                                                <button type="button"
                                                        class="table-board__slot table-board__slot--free"
                                                        style="grid-column: span 1;"
                                                        data-table-id="{{ $table->id }}"
                                                        data-table-name="{{ $table->name }}"
                                                        data-table-hall="{{ $hall->name }}"
                                                        data-start="{{ $currentSlot }}"
                                                        data-end="{{ $slotEnd }}"
                                                        data-slot-index="{{ $slotIndex }}">
                                                    <small>{{ $currentSlot }} – {{ $slotEnd }}</small>
                                                    <span>Выбрать</span>
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
                    @endif
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
                            <label class="form-label">Зал</label>
                            <input type="text" class="form-control" id="modal-hall-name" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Дата</label>
                            <input type="date" class="form-control" name="booking_date" value="{{ $selectedDate->toDateString() }}" readonly>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Начало</label>
                            <input type="time" class="form-control" name="start_time" id="modal-start" readonly>
                        </div>
                        <div class="col-md-3">
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
                                    <label class="form-label" for="modal-quest-select">Квест</label>
                                    <select class="form-select" name="quest_id" id="modal-quest-select">
                                        <option value="">Выберите квест</option>
                                        @foreach ($quests as $quest)
                                            <option value="{{ $quest->id }}">{{ $quest->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="modal-quest-slot">Временной слот квеста</label>
                                    <select class="form-select" name="quest_slot_id" id="modal-quest-slot">
                                        <option value="">Выберите слот</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-primary">Сохранить бронь</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="tableBookingInfo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Информация о бронировании</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <p><strong>Время:</strong> <span data-info-time></span></p>
                <p><strong>Зал:</strong> <span data-info-hall></span></p>
                <p><strong>Стол:</strong> <span data-info-table></span></p>
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

    $slotTimesForJs = array_values($timeSlots);
@endphp

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const slotTimes = @json($slotTimesForJs);
        const bookingModal = new bootstrap.Modal(document.getElementById('tableBookingModal'));
        const bookingInfoModal = new bootstrap.Modal(document.getElementById('tableBookingInfo'));
        const questSlots = @json($questSlotsMap);

        const endSelect = document.getElementById('modal-end');
        const startInput = document.getElementById('modal-start');
        const hallInput = document.getElementById('modal-hall-name');
        const questToggle = document.getElementById('link-quest-toggle');
        const questFields = document.getElementById('linked-quest-fields');
        const questSelect = document.getElementById('modal-quest-select');
        const questSlotSelect = document.getElementById('modal-quest-slot');

        document.querySelectorAll('[data-open-table-booking]').forEach((button) => {
            if (button.classList.contains('table-board__slot--free')) {
                return;
            }

            button.addEventListener('click', () => {
                const tableId = button.getAttribute('data-table-id');
                const tableName = button.getAttribute('data-table-name');
                const hallName = button.getAttribute('data-table-hall');
                const start = button.getAttribute('data-start');
                const end = button.getAttribute('data-end') || null;

                openTableBooking(tableId, tableName, hallName, start, end);
            });
        });

        document.querySelectorAll('[data-booking-details]').forEach((button) => {
            button.addEventListener('click', () => {
                const infoModal = document.getElementById('tableBookingInfo');
                infoModal.querySelector('[data-info-time]').textContent = `${button.dataset.start} – ${button.dataset.end}`;
                infoModal.querySelector('[data-info-hall]').textContent = button.dataset.hall || '—';
                infoModal.querySelector('[data-info-table]').textContent = button.dataset.table || '—';
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

        const freeSlotButtons = document.querySelectorAll('.table-board__slot--free');
        let isDragging = false;
        let selectionTableId = null;
        let selectionStartIndex = null;
        let selectionRangeStart = null;
        let selectionRangeEnd = null;
        let selectingButtons = [];
        let selectedButtons = [];
        let selectionReady = false;

        function clearSelecting() {
            if (selectingButtons.length === 0) {
                return;
            }
            selectingButtons.forEach((btn) => btn.classList.remove('table-board__slot--selecting'));
            selectingButtons = [];
        }

        function clearSelectedRange() {
            if (selectedButtons.length > 0) {
                selectedButtons.forEach((btn) => btn.classList.remove('table-board__slot--selected'));
            }
            selectedButtons = [];
            selectionReady = false;
            selectionRangeStart = null;
            selectionRangeEnd = null;
            selectionTableId = null;
            selectionStartIndex = null;
        }

        function beginSelection(button, event) {
            if (event) {
                event.preventDefault();
            }
            clearSelecting();
            clearSelectedRange();
            const tableId = button.getAttribute('data-table-id');
            const slotIndex = parseInt(button.getAttribute('data-slot-index'), 10);
            if (!tableId || Number.isNaN(slotIndex)) {
                return;
            }
            isDragging = true;
            selectionTableId = tableId;
            selectionStartIndex = slotIndex;
            selectionRangeStart = slotIndex;
            selectionRangeEnd = slotIndex;
            updateSelection(button);
        }

        function updateSelection(button) {
            if (!isDragging || button.getAttribute('data-table-id') !== selectionTableId) {
                return;
            }

            const row = button.closest('.table-board__row');
            if (!row) {
                return;
            }

            const freeButtons = Array.from(row.querySelectorAll('.table-board__slot--free'));
            const indexMap = new Map();
            freeButtons.forEach((btn) => {
                const index = parseInt(btn.getAttribute('data-slot-index'), 10);
                if (!Number.isNaN(index)) {
                    indexMap.set(index, btn);
                }
            });

            const currentIndex = parseInt(button.getAttribute('data-slot-index'), 10);
            if (Number.isNaN(currentIndex)) {
                return;
            }

            const minIndex = Math.min(selectionStartIndex, currentIndex);
            const maxIndex = Math.max(selectionStartIndex, currentIndex);

            for (let idx = minIndex; idx <= maxIndex; idx++) {
                if (!indexMap.has(idx)) {
                    return;
                }
            }

            clearSelecting();

            for (let idx = minIndex; idx <= maxIndex; idx++) {
                const slotButton = indexMap.get(idx);
                slotButton.classList.add('table-board__slot--selecting');
                selectingButtons.push(slotButton);
            }

            selectionRangeStart = minIndex;
            selectionRangeEnd = maxIndex;
        }

        function finalizeSelection() {
            if (!isDragging) {
                return;
            }

            isDragging = false;

            const currentSelection = [...selectingButtons];
            clearSelecting();

            if (currentSelection.length === 0) {
                selectionReady = false;
                return;
            }

            selectedButtons = currentSelection;
            selectedButtons.forEach((btn) => btn.classList.add('table-board__slot--selected'));
            selectionReady = true;
        }

        function formatTime(date) {
            return `${String(date.getHours()).padStart(2, '0')}:${String(date.getMinutes()).padStart(2, '0')}`;
        }

        function addMinutesToTime(time, minutes) {
            const [hour, minute] = time.split(':').map(Number);
            if (Number.isNaN(hour)) {
                return time;
            }
            const dt = new Date();
            dt.setHours(hour, minute, 0, 0);
            dt.setMinutes(dt.getMinutes() + minutes);
            return formatTime(dt);
        }

        function openSelectionModal() {
            if (!selectionReady || selectedButtons.length === 0) {
                return;
            }

            const first = selectedButtons[0];
            const tableId = first.getAttribute('data-table-id');
            const tableName = first.getAttribute('data-table-name');
            const hallName = first.getAttribute('data-table-hall');
            const startTime = slotTimes[selectionRangeStart] || first.getAttribute('data-start');
            const slotCount = selectionRangeEnd - selectionRangeStart + 1;
            const endTime = addMinutesToTime(startTime, slotCount * 30);

            openTableBooking(tableId, tableName, hallName, startTime, endTime);
            clearSelectedRange();
        }

        freeSlotButtons.forEach((button) => {
            button.addEventListener('mousedown', (event) => {
                if (event.button !== 0) {
                    return;
                }
                beginSelection(button, event);
            });

            button.addEventListener('mouseenter', () => {
                updateSelection(button);
            });

            button.addEventListener('click', (event) => {
                if (selectionReady && selectedButtons.includes(button)) {
                    event.preventDefault();
                    openSelectionModal();
                }
            });
        });

        document.addEventListener('mouseup', () => {
            finalizeSelection();
        });

        document.addEventListener('click', (event) => {
            if (!event.target.closest('.table-board__slot--free') && !event.target.closest('#tableBookingModal')) {
                clearSelectedRange();
            }
        });

        function openTableBooking(tableId, tableName, hallName, start, preferredEnd = null) {
            clearSelectedRange();

            document.getElementById('modal-table-id').value = tableId || '';
            document.getElementById('modal-table-name').value = tableName || '';
            hallInput.value = hallName || '';
            startInput.value = start || '';
            questToggle.checked = false;
            questFields.style.display = 'none';
            questSelect.value = '';
            questSlotSelect.innerHTML = '<option value="">Выберите слот</option>';

            populateEndOptions(start, preferredEnd);
            bookingModal.show();
        }

        function populateEndOptions(start, preferredEnd = null) {
            endSelect.innerHTML = '';
            if (!start) {
                return;
            }
            const [hour, minute] = start.split(':').map(Number);
            if (Number.isNaN(hour)) {
                return;
            }

            const current = new Date();
            current.setHours(hour, minute, 0, 0);

            const closing = new Date();
            closing.setHours(23, 59, 0, 0);

            while (current < closing) {
                current.setMinutes(current.getMinutes() + 30);
                if (current > closing) {
                    break;
                }
                const value = formatTime(current);
                const option = document.createElement('option');
                option.value = value;
                option.textContent = value;
                endSelect.appendChild(option);
            }

            if (preferredEnd) {
                const preferred = Array.from(endSelect.options).find((option) => option.value === preferredEnd);
                if (preferred) {
                    preferred.selected = true;
                    return;
                }
            }

            if (endSelect.options.length > 0) {
                endSelect.selectedIndex = 0;
            }
        }
    });
</script>
@endpush
@endsection
