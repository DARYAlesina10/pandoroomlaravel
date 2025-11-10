<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Календарь бронирований</title>
    <style>
        :root {
            --bg: #f4f5f7;
            --panel: #ffffff;
            --panel-alt: #fdfbf4;
            --accent: #d9c062;
            --accent-dark: #c0a445;
            --text: #1c1c1c;
            --muted: #6f7784;
            --grid-line: #e5e7eb;
            --danger: #e0564f;
            --success: #3b8c66;
            --shadow: 0 30px 60px -35px rgba(25, 28, 32, 0.45);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: linear-gradient(160deg, #edeff3 0%, #f9fafc 50%, #f4f5f7 100%);
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            color: var(--text);
            min-height: 100vh;
        }

        a {
            color: inherit;
        }

        .admin-page {
            max-width: 1440px;
            margin: 0 auto;
            padding: 48px 40px 72px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 32px;
        }

        .page-header__title {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .page-header h1 {
            margin: 0;
            font-size: 40px;
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        .page-header__range {
            color: var(--muted);
            font-size: 15px;
        }

        .page-header__actions {
            display: flex;
            gap: 16px;
            align-items: center;
        }

        .link-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 18px;
            border-radius: 999px;
            background: rgba(0, 0, 0, 0.05);
            text-decoration: none;
            font-weight: 500;
        }

        .quest-selector {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 18px;
            border-radius: 14px;
            background: var(--panel);
            box-shadow: var(--shadow);
        }

        .quest-selector label {
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--muted);
        }

        .quest-selector select {
            border: none;
            background: transparent;
            font-size: 16px;
            font-weight: 600;
            min-width: 220px;
        }

        .quest-selector button {
            padding: 10px 18px;
            border-radius: 12px;
            border: none;
            background: var(--accent);
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .quest-selector button:hover {
            background: var(--accent-dark);
        }

        .calendar-panel {
            background: var(--panel);
            border-radius: 28px;
            padding: 32px;
            box-shadow: var(--shadow);
        }

        .calendar-toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .calendar-toolbar__legend {
            display: inline-flex;
            gap: 16px;
            font-size: 13px;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .calendar-toolbar__legend span {
            display: inline-flex;
            gap: 6px;
            align-items: center;
        }

        .legend-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            display: inline-block;
        }

        .legend-dot.available { background: var(--success); }
        .legend-dot.booked { background: var(--danger); }
        .legend-dot.closed { background: rgba(31, 35, 41, 0.25); }

        .calendar-grid {
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid #e5e7eb;
        }

        .calendar-grid__head {
            display: grid;
            grid-template-columns: 140px repeat(auto-fit, minmax(120px, 1fr));
            background: var(--panel-alt);
            border-bottom: 1px solid var(--grid-line);
        }

        .calendar-grid__head div {
            padding: 18px 20px;
            border-right: 1px solid var(--grid-line);
        }

        .calendar-grid__head div:last-child {
            border-right: none;
        }

        .calendar-grid__day {
            display: flex;
            flex-direction: column;
            gap: 6px;
            font-weight: 600;
            font-size: 16px;
        }

        .calendar-grid__day small {
            font-size: 12px;
            color: var(--muted);
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }

        .calendar-grid__rows {
            display: grid;
            grid-template-columns: 140px repeat(auto-fit, minmax(120px, 1fr));
        }

        .calendar-grid__rows .time-cell {
            background: var(--panel-alt);
            padding: 18px 20px;
            border-right: 1px solid var(--grid-line);
            border-bottom: 1px solid var(--grid-line);
            font-weight: 600;
        }

        .calendar-cell {
            position: relative;
            padding: 16px;
            border-right: 1px solid var(--grid-line);
            border-bottom: 1px solid var(--grid-line);
            background: #fff;
            cursor: pointer;
            transition: box-shadow 0.2s ease, transform 0.2s ease;
        }

        .calendar-cell:last-child {
            border-right: none;
        }

        .calendar-cell:hover {
            transform: translateY(-3px);
            box-shadow: 0 24px 32px -28px rgba(25, 28, 32, 0.6);
            z-index: 2;
        }

        .calendar-cell__time {
            font-weight: 700;
            font-size: 15px;
            margin-bottom: 6px;
        }

        .calendar-cell__status {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .calendar-cell.available {
            background: rgba(59, 140, 102, 0.08);
            border-color: rgba(59, 140, 102, 0.3);
        }

        .calendar-cell.booked {
            background: rgba(224, 86, 79, 0.08);
            border-color: rgba(224, 86, 79, 0.24);
        }

        .calendar-cell.disabled {
            color: var(--muted);
            background: #f3f4f6;
            cursor: not-allowed;
        }

        .calendar-cell__price {
            font-size: 13px;
            color: var(--muted);
        }

        .calendar-empty {
            padding: 24px;
            text-align: center;
            color: var(--muted);
            background: rgba(0, 0, 0, 0.03);
        }

        .booking-table {
            margin-top: 48px;
            background: var(--panel);
            border-radius: 28px;
            padding: 32px;
            box-shadow: var(--shadow);
        }

        .booking-table h2 {
            margin: 0 0 24px;
            font-size: 28px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 16px 18px;
            border-bottom: 1px solid var(--grid-line);
            text-align: left;
        }

        th {
            text-transform: uppercase;
            letter-spacing: 0.08em;
            font-size: 12px;
            color: var(--muted);
        }

        .empty {
            padding: 24px;
            background: rgba(0, 0, 0, 0.03);
            border-radius: 16px;
            text-align: center;
            color: var(--muted);
        }

        .pagination {
            display: flex;
            gap: 12px;
            margin-top: 24px;
        }

        .pagination a,
        .pagination span {
            padding: 10px 16px;
            border-radius: 12px;
            text-decoration: none;
            color: var(--text);
            background: #eceef2;
        }

        .pagination .active {
            background: var(--accent);
            color: #fff;
        }

        .booking-modal {
            position: fixed;
            inset: 0;
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 50;
        }

        .booking-modal.is-visible {
            display: flex;
        }

        .booking-modal__backdrop {
            position: absolute;
            inset: 0;
            background: rgba(24, 28, 34, 0.45);
            backdrop-filter: blur(4px);
        }

        .booking-modal__card {
            position: relative;
            background: #fff;
            width: min(720px, calc(100% - 32px));
            border-radius: 28px;
            padding: 32px;
            box-shadow: 0 40px 80px -45px rgba(24, 28, 34, 0.55);
            display: grid;
            gap: 20px;
        }

        .booking-modal__header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .booking-modal__title {
            margin: 0;
            font-size: 24px;
        }

        .booking-modal__close {
            border: none;
            background: transparent;
            font-size: 26px;
            cursor: pointer;
            color: #6b7280;
        }

        .booking-modal__grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 18px;
        }

        .booking-modal__grid label {
            display: block;
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 6px;
        }

        .booking-modal__grid input,
        .booking-modal__grid select,
        .booking-modal__grid textarea {
            width: 100%;
            padding: 10px 12px;
            border-radius: 14px;
            border: 1px solid #d1d5db;
            font-size: 15px;
        }

        .booking-modal__grid textarea {
            resize: vertical;
        }

        .booking-modal__switch {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-top: 6px;
        }

        .booking-modal__footer {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .booking-modal__footer button {
            padding: 12px 20px;
            border-radius: 14px;
            border: none;
            font-weight: 600;
            cursor: pointer;
        }

        .booking-modal__footer .secondary {
            background: rgba(0, 0, 0, 0.05);
        }

        .booking-modal__footer .primary {
            background: #d9c062;
            color: #fff;
        }

        .popover {
            position: fixed;
            inset: 0;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.2s ease;
        }

        .popover.is-visible {
            pointer-events: auto;
            opacity: 1;
        }

        .popover__backdrop {
            position: absolute;
            inset: 0;
            background: rgba(24, 28, 34, 0.35);
        }

        .popover__card {
            position: relative;
            background: #fff;
            width: min(520px, calc(100% - 40px));
            border-radius: 24px 24px 0 0;
            padding: 32px;
            box-shadow: 0 -25px 40px -30px rgba(24, 28, 34, 0.45);
        }

        .popover__header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .popover__title {
            margin: 0;
            font-size: 24px;
        }

        .popover__close {
            border: none;
            background: transparent;
            font-size: 24px;
            cursor: pointer;
        }

        .popover__details {
            display: grid;
            gap: 12px;
        }

        .popover__details p {
            margin: 0;
            color: var(--muted);
        }

        @media (max-width: 1024px) {
            .calendar-grid__head,
            .calendar-grid__rows {
                grid-template-columns: 120px repeat(auto-fit, minmax(100px, 1fr));
            }

            .admin-page {
                padding: 32px 20px 56px;
            }
        }

        @media (max-width: 720px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }

            .quest-selector {
                flex-wrap: wrap;
                gap: 8px 16px;
            }

            .calendar-grid__head,
            .calendar-grid__rows {
                grid-template-columns: 1fr 1fr 1fr;
            }

            .calendar-grid__head div:first-child,
            .calendar-grid__rows .time-cell {
                display: none;
            }
        }
    </style>
</head>
<body>
<div class="admin-page">
    <div class="page-header">
        <div class="page-header__title">
            <a href="{{ route('admin.dashboard') }}" class="link-back">&larr; В панель</a>
            <h1>Бронирования</h1>
            <span class="page-header__range">{{ $startDate->isoFormat('DD MMMM') }} &mdash; {{ $endDate->isoFormat('DD MMMM') }}</span>
        </div>
        <form method="GET" class="quest-selector">
            <label for="quest_id">Квест</label>
            <select id="quest_id" name="quest_id">
                @foreach($quests as $quest)
                    <option value="{{ $quest->id }}" {{ optional($selectedQuest)->id === $quest->id ? 'selected' : '' }}>{{ $quest->name }}</option>
                @endforeach
            </select>
            <input type="hidden" name="sort" value="{{ $sort }}">
            <input type="hidden" name="direction" value="{{ $direction }}">
            <button type="submit">Показать</button>
        </form>
    </div>

    <section class="calendar-panel">
        @if(!$selectedQuest)
            <div class="calendar-empty">Пока нет квестов, для которых можно построить расписание.</div>
        @elseif($slots->isEmpty())
            <div class="calendar-empty">Для квеста «{{ optional($selectedQuest)->name ?? '—' }}» не настроено ни одного слота.</div>
        @else
            <div class="calendar-toolbar">
                <div class="calendar-toolbar__legend">
                    <span><span class="legend-dot available"></span> свободно</span>
                    <span><span class="legend-dot booked"></span> занято</span>
                    <span><span class="legend-dot closed"></span> выключено</span>
                </div>
                <div class="calendar-toolbar__caption">Расписание обновляется автоматически при бронировании</div>
            </div>

            <div class="calendar-grid" data-calendar-grid data-quest-id="{{ optional($selectedQuest)->id }}">
                <div class="calendar-grid__head">
                    <div>Время</div>
                    @foreach($dateRange as $date)
                        <div class="calendar-grid__day">
                            <span>{{ $date->format('d') }}</span>
                            <small>{{ $date->translatedFormat('D') }}</small>
                            <small>{{ $date->translatedFormat('M') }}</small>
                        </div>
                    @endforeach
                </div>
                <div class="calendar-grid__rows">
                    @foreach($slots as $slot)
                        @php
                            $slotLabel = $slot->time ? \Illuminate\Support\Carbon::createFromFormat('H:i:s', $slot->time)->format('H:i') : '—';
                        @endphp
                        <div class="time-cell">{{ $slotLabel }}</div>
                        @foreach($dateRange as $date)
                            @php
                                $key = $date->format('Y-m-d') . '|' . $slot->id;
                                $bookingCollection = $calendarBookings->get($key);
                                $booking = $bookingCollection ? $bookingCollection->first() : null;
                                $isWeekend = $date->isWeekend();
                                $isEnabled = $isWeekend ? $slot->weekend_enabled : $slot->weekday_enabled;
                                $price = $slot->priceForDate($date);
                            @endphp
                            <div
                                class="calendar-cell {{ $booking ? 'booked' : ($isEnabled ? 'available' : 'disabled') }}"
                                data-calendar-cell
                                data-slot="{{ $slot->id }}"
                                data-date="{{ $date->toDateString() }}"
                                data-time="{{ $slotLabel }}"
                                data-price="{{ $price }}"
                                data-status="{{ $booking ? 'booked' : ($isEnabled ? 'available' : 'disabled') }}"
                                data-customer="{{ $booking->customer_name ?? '' }}"
                                data-phone="{{ $booking->customer_phone ?? '' }}"
                                data-created="{{ optional($booking->created_at)->format('d.m.Y H:i') }}"
                                data-quest="{{ optional($selectedQuest)->name }}"
                                data-quest-id="{{ optional($selectedQuest)->id }}"
                            >
                                <div class="calendar-cell__time">{{ $slotLabel }}</div>
                                <div class="calendar-cell__status">
                                    @if($booking)
                                        Забронировано
                                    @elseif(!$isEnabled)
                                        Слот выключен
                                    @else
                                        Свободно
                                    @endif
                                </div>
                                <div class="calendar-cell__price">{{ number_format($price, 0, '.', ' ') }} ₽</div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        @endif
    </section>

    <section class="booking-table">
        <h2>Список бронирований</h2>
        @if($bookings->isEmpty())
            <div class="empty">Будущих бронирований пока нет.</div>
        @else
            <table>
                <thead>
                <tr>
                    <th>@include('admin.partials.sort-link', ['label' => 'Дата', 'column' => 'booking_date'])</th>
                    <th>Время</th>
                    <th>Квест</th>
                    <th>@include('admin.partials.sort-link', ['label' => 'Гость', 'column' => 'customer_name'])</th>
                    <th>Телефон</th>
                    <th>@include('admin.partials.sort-link', ['label' => 'Стоимость', 'column' => 'price'])</th>
                    <th>@include('admin.partials.sort-link', ['label' => 'Создано', 'column' => 'created_at'])</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ optional($booking->booking_date)->format('d.m.Y') ?? '—' }}</td>
                        @php
                            $tableSlotTime = optional($booking->slot)->time;
                        @endphp
                        <td>
                            @if($tableSlotTime)
                                {{ \Illuminate\Support\Carbon::createFromFormat('H:i:s', $tableSlotTime)->format('H:i') }}
                            @else
                                —
                            @endif
                        </td>
                        <td>{{ optional($booking->quest)->name ?? '—' }}</td>
                        <td>{{ $booking->customer_name }}</td>
                        <td>{{ $booking->customer_phone }}</td>
                        <td>{{ number_format($booking->price, 0, '.', ' ') }} ₽</td>
                        <td>{{ $booking->created_at ? $booking->created_at->format('d.m.Y H:i') : '—' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="pagination">
                {{ $bookings->links() }}
            </div>
        @endif
    </section>
</div>

<div id="booking-modal" class="booking-modal" aria-hidden="true">
    <div class="booking-modal__backdrop" data-close-booking></div>
    <div class="booking-modal__card">
        <div class="booking-modal__header">
            <h3 class="booking-modal__title">Новое бронирование</h3>
            <button type="button" class="booking-modal__close" data-close-booking>&times;</button>
        </div>
        <form method="POST" id="quest-booking-form" data-action-template="{{ url('/admin/quests') }}/__QUEST__/bookings">
                @csrf
            <input type="hidden" name="booking_date" id="modal-booking-date">
            <input type="hidden" name="quest_slot_id" id="modal-slot-id">
            <div class="booking-modal__grid">
                <div>
                    <label>Квест</label>
                    <input type="text" id="modal-quest-name" readonly>
                </div>
                <div>
                    <label>Дата</label>
                    <input type="text" id="modal-quest-date" readonly>
                </div>
                <div>
                    <label>Начало</label>
                    <input type="text" id="modal-quest-time" readonly>
                </div>
                <div>
                    <label>Стоимость</label>
                    <input type="text" id="modal-quest-price" readonly>
                </div>
                <div>
                    <label>Имя клиента</label>
                    <input type="text" name="customer_name" required>
                </div>
                <div>
                    <label>Телефон</label>
                    <input type="text" name="customer_phone" required>
                </div>
            </div>
            <div class="booking-modal__switch">
                <input type="checkbox" id="table-toggle" {{ $tables->isEmpty() ? 'disabled' : '' }}>
                <label for="table-toggle">{{ $tables->isEmpty() ? 'Нет доступных столов для бронирования' : 'Забронировать стол вместе с квестом' }}</label>
            </div>
            <div class="booking-modal__grid" id="table-fields" style="display:none;">
                <div>
                    <label>Стол</label>
                    <select name="table_booking[table_id]" id="modal-table-select">
                        <option value="">Выберите стол</option>
                        @foreach ($tables as $table)
                            <option value="{{ $table->id }}">{{ optional($table->hall)->name ? optional($table->hall)->name . ' — ' : '' }}{{ $table->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Начало для стола</label>
                    <input type="text" name="table_booking[start_time]" id="modal-table-start" readonly>
                </div>
                <div>
                    <label>Окончание</label>
                    <select name="table_booking[end_time]" id="modal-table-end"></select>
                </div>
                <div>
                    <label>Ответственный сотрудник</label>
                    <input type="text" name="table_booking[staff_name]" id="modal-table-staff">
                </div>
                <div style="grid-column: 1 / -1;">
                    <label>Комментарий</label>
                    <textarea name="table_booking[comment]" id="modal-table-comment" rows="2"></textarea>
                </div>
            </div>
            <div class="booking-modal__footer">
                <button type="button" class="secondary" data-close-booking>Отмена</button>
                <button type="submit" class="primary">Сохранить</button>
            </div>
        </form>
    </div>
</div>
<div id="booking-popover" class="popover" aria-hidden="true">
    <div class="popover__backdrop" data-close-popover></div>
    <div class="popover__card">
        <div class="popover__header">
            <h3 class="popover__title" data-popover-title>Бронирование</h3>
            <button type="button" class="popover__close" data-close-popover>&times;</button>
        </div>
        <div class="popover__details">
            <p><strong>Квест:</strong> <span data-popover-quest></span></p>
            <p><strong>Дата:</strong> <span data-popover-date></span></p>
            <p><strong>Время:</strong> <span data-popover-time></span></p>
            <p><strong>Стоимость:</strong> <span data-popover-price></span></p>
            <p data-popover-extra></p>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const popover = document.getElementById('booking-popover');
        const popoverTitle = popover.querySelector('[data-popover-title]');
        const popoverQuest = popover.querySelector('[data-popover-quest]');
        const popoverDate = popover.querySelector('[data-popover-date]');
        const popoverTime = popover.querySelector('[data-popover-time]');
        const popoverPrice = popover.querySelector('[data-popover-price]');
        const popoverExtra = popover.querySelector('[data-popover-extra]');
        const closeTriggers = popover.querySelectorAll('[data-close-popover]');

        const bookingModal = document.getElementById('booking-modal');
        const bookingForm = document.getElementById('quest-booking-form');
        const bookingActionTemplate = bookingForm ? bookingForm.dataset.actionTemplate : '';
        const bookingCloseButtons = bookingModal.querySelectorAll('[data-close-booking]');
        const modalQuestName = document.getElementById('modal-quest-name');
        const modalQuestDate = document.getElementById('modal-quest-date');
        const modalQuestTime = document.getElementById('modal-quest-time');
        const modalQuestPrice = document.getElementById('modal-quest-price');
        const modalBookingDate = document.getElementById('modal-booking-date');
        const modalSlotId = document.getElementById('modal-slot-id');
        const tableToggle = document.getElementById('table-toggle');
        const tableFields = document.getElementById('table-fields');
        const tableSelect = document.getElementById('modal-table-select');
        const tableStart = document.getElementById('modal-table-start');
        const tableEnd = document.getElementById('modal-table-end');
        const tableStaff = document.getElementById('modal-table-staff');
        const tableComment = document.getElementById('modal-table-comment');
        const hasTableControls = tableToggle && tableFields && tableSelect && tableStart && tableEnd && tableStaff && tableComment;
        const calendarGrid = document.querySelector('[data-calendar-grid]');
        const currentQuestId = calendarGrid ? calendarGrid.dataset.questId : '';

        const formatCurrency = (value) => {
            const number = Number(value);
            if (Number.isNaN(number)) {
                return '';
            }
            return new Intl.NumberFormat('ru-RU', {
                style: 'currency',
                currency: 'RUB',
                maximumFractionDigits: 0,
            }).format(number);
        };

        const formatDate = (dateString) => {
            if (!dateString) {
                return '';
            }
            const date = new Date(`${dateString}T00:00:00`);
            return date.toLocaleDateString('ru-RU', { day: 'numeric', month: 'long', weekday: 'long' });
        };

        const toggleTableFields = (enabled) => {
            if (!hasTableControls) {
                return;
            }
            tableFields.style.display = enabled ? 'grid' : 'none';
            tableSelect.required = enabled;
            tableEnd.required = enabled;
            tableStaff.required = enabled;
            if (!enabled) {
                tableSelect.value = '';
                tableEnd.innerHTML = '';
                tableStaff.value = '';
                tableComment.value = '';
            }
        };

        const populateEndOptions = (startValue) => {
            if (!hasTableControls) {
                return;
            }
            tableEnd.innerHTML = '';
            if (!startValue) {
                return;
            }
            const [hour, minute] = startValue.split(':').map(Number);
            if (Number.isNaN(hour) || Number.isNaN(minute)) {
                return;
            }
            const current = new Date();
            current.setHours(hour, minute, 0, 0);
            const closing = new Date();
            closing.setHours(23, 30, 0, 0);

            while (current < closing) {
                current.setMinutes(current.getMinutes() + 30);
                if (current > closing) {
                    break;
                }
                const value = current.toTimeString().slice(0, 5);
                const option = document.createElement('option');
                option.value = value;
                option.textContent = value;
                tableEnd.appendChild(option);
            }
        };

        const openPopover = (cell) => {
            const status = cell.dataset.status;
            const quest = cell.dataset.quest || '';
            const date = cell.dataset.date || '';
            const time = cell.dataset.time || '';
            const price = cell.dataset.price || '';
            const customer = cell.dataset.customer || '';
            const phone = cell.dataset.phone || '';
            const created = cell.dataset.created || '';

            popoverTitle.textContent = status === 'booked' ? 'Бронирование' : 'Информация';
            popoverQuest.textContent = quest;
            popoverDate.textContent = formatDate(date);
            popoverTime.textContent = time;
            popoverPrice.textContent = price ? formatCurrency(price) : '—';

            if (status === 'booked') {
                popoverExtra.innerHTML = `<strong>Гость:</strong> ${customer || '—'}<br><strong>Телефон:</strong> ${phone || '—'}<br><strong>Создано:</strong> ${created || '—'}`;
            } else if (status === 'disabled') {
                popoverExtra.textContent = 'Слот отключён для выбранного дня.';
            } else {
                popoverExtra.textContent = 'Слот свободен.';
            }

            popover.classList.add('is-visible');
            popover.setAttribute('aria-hidden', 'false');
        };

        const closePopover = () => {
            popover.classList.remove('is-visible');
            popover.setAttribute('aria-hidden', 'true');
        };

        const openBookingModal = (cell) => {
            const questId = cell.dataset.questId || currentQuestId;
            if (!questId || !bookingForm) {
                openPopover(cell);
                return;
            }

            if (bookingActionTemplate) {
                bookingForm.action = bookingActionTemplate.replace('__QUEST__', questId);
            }

            const date = cell.dataset.date || '';
            const time = cell.dataset.time || '';
            const price = cell.dataset.price || '';

            modalQuestName.value = cell.dataset.quest || '';
            modalQuestDate.value = formatDate(date);
            modalQuestTime.value = time;
            modalQuestPrice.value = price ? formatCurrency(price) : '';
            modalBookingDate.value = date;
            modalSlotId.value = cell.dataset.slot || '';

            if (hasTableControls) {
                tableStart.value = time;
                populateEndOptions(time);
                tableToggle.checked = false;
                toggleTableFields(false);
            }

            bookingModal.classList.add('is-visible');
            bookingModal.setAttribute('aria-hidden', 'false');
        };

        const closeBookingModal = () => {
            bookingModal.classList.remove('is-visible');
            bookingModal.setAttribute('aria-hidden', 'true');
        };

        document.querySelectorAll('[data-calendar-cell]').forEach((cell) => {
            const status = cell.dataset.status;
            if (status === 'disabled') {
                return;
            }

            if (status === 'available') {
                cell.addEventListener('click', () => openBookingModal(cell));
            } else {
                cell.addEventListener('click', () => openPopover(cell));
            }
        });

        closeTriggers.forEach((trigger) => {
            trigger.addEventListener('click', closePopover);
        });

        bookingCloseButtons.forEach((button) => {
            button.addEventListener('click', closeBookingModal);
        });

        if (hasTableControls) {
            tableToggle.addEventListener('change', () => {
                const enabled = tableToggle.checked;
                toggleTableFields(enabled);
                if (enabled) {
                    populateEndOptions(tableStart.value);
                }
            });
        }

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                closePopover();
                closeBookingModal();
            }
        });
    });
</script>

</body>
</html>
