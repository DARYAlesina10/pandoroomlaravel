<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $quest->name }}</title>
    <style>
        :root {
            --background: #0f172a;
            --card: #111827;
            --accent: #22d3ee;
            --accent-dark: #0ea5e9;
            --text: #f8fafc;
            --muted: #94a3b8;
            --danger: #f87171;
            --success: #4ade80;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: radial-gradient(circle at top, rgba(34, 211, 238, 0.1), transparent 55%), var(--background);
            color: var(--text);
            min-height: 100vh;
            padding: 32px 16px;
        }

        .page {
            max-width: 1080px;
            margin: 0 auto;
        }

        a.back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: var(--muted);
            margin-bottom: 16px;
            transition: color 0.2s ease-in-out;
        }

        a.back-link:hover {
            color: var(--accent);
        }

        .quest-card {
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.9), rgba(15, 23, 42, 0.65));
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 24px;
            padding: 32px;
            box-shadow: 0 35px 60px -25px rgba(15, 23, 42, 0.65);
        }

        .quest-header {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 32px;
        }

        .quest-meta {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 12px;
            font-size: 14px;
            color: var(--muted);
        }

        .quest-meta span {
            background: rgba(148, 163, 184, 0.08);
            border-radius: 999px;
            padding: 8px 14px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .quest-description {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 24px;
            margin-bottom: 40px;
        }

        .quest-description section {
            background: rgba(148, 163, 184, 0.06);
            border-radius: 16px;
            padding: 20px 24px;
            border: 1px solid rgba(148, 163, 184, 0.14);
        }

        .quest-description h2 {
            margin-top: 0;
            font-size: 18px;
            margin-bottom: 12px;
            color: var(--accent);
        }

        .status, .errors {
            padding: 16px 20px;
            border-radius: 16px;
            margin-bottom: 20px;
            border: 1px solid transparent;
        }

        .status {
            background: rgba(74, 222, 128, 0.12);
            border-color: rgba(74, 222, 128, 0.35);
            color: var(--success);
        }

        .errors {
            background: rgba(248, 113, 113, 0.1);
            border-color: rgba(248, 113, 113, 0.35);
            color: var(--danger);
        }

        .errors ul {
            margin: 8px 0 0;
            padding-left: 18px;
        }

        .slot-section {
            margin-bottom: 40px;
        }

        .slot-section h2 {
            margin-top: 0;
            margin-bottom: 12px;
            font-size: 20px;
        }

        .slot-section p {
            color: var(--muted);
            margin-top: 0;
        }

        .date-strip {
            display: flex;
            gap: 8px;
            padding: 12px 0;
            overflow-x: auto;
            scrollbar-width: thin;
        }

        .date-pill {
            border: 1px solid rgba(34, 211, 238, 0.35);
            background: rgba(34, 211, 238, 0.12);
            border-radius: 12px;
            padding: 10px 16px;
            min-width: 96px;
            text-align: left;
            color: var(--text);
            cursor: pointer;
            display: flex;
            flex-direction: column;
            gap: 4px;
            font-size: 14px;
            transition: border 0.2s ease, background 0.2s ease, transform 0.2s ease;
        }

        .date-pill.is-selected {
            background: linear-gradient(135deg, rgba(34, 211, 238, 0.35), rgba(14, 165, 233, 0.45));
            border-color: rgba(14, 165, 233, 0.65);
            transform: translateY(-2px);
        }

        .date-pill__day {
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            font-size: 12px;
            color: rgba(248, 250, 252, 0.75);
        }

        .date-pill__date {
            font-size: 15px;
        }

        .date-pill--picker {
            background: rgba(148, 163, 184, 0.15);
            border-color: rgba(148, 163, 184, 0.35);
        }

        .date-picker {
            position: absolute;
            left: -9999px;
            width: 1px;
            height: 1px;
            opacity: 0;
        }

        .slot-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 12px;
            margin-top: 20px;
        }

        .slot-button {
            background: rgba(34, 211, 238, 0.12);
            border: 1px solid rgba(34, 211, 238, 0.35);
            border-radius: 14px;
            padding: 18px;
            color: var(--text);
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
            transition: transform 0.15s ease, box-shadow 0.15s ease, border 0.15s ease;
        }

        .slot-button--unavailable {
            opacity: 0.4;
            cursor: not-allowed;
            border-style: dashed;
        }

        .slot-button:hover,
        .slot-button:focus {
            transform: translateY(-3px);
            box-shadow: 0 20px 30px -18px rgba(34, 211, 238, 0.7);
            border-color: rgba(34, 211, 238, 0.55);
            outline: none;
        }

        .slot-button--unavailable:hover,
        .slot-button--unavailable:focus {
            transform: none;
            box-shadow: none;
            border-color: rgba(148, 163, 184, 0.4);
        }

        .slot-button--booked {
            border-style: dashed;
        }

        .slot-button__time {
            font-size: 18px;
            font-weight: 700;
        }

        .slot-button__status {
            font-size: 13px;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            color: rgba(248, 250, 252, 0.65);
        }

        .slot-button__price {
            font-size: 14px;
            font-weight: 500;
            color: rgba(248, 250, 252, 0.85);
        }

        .empty-slots {
            padding: 20px;
            background: rgba(148, 163, 184, 0.08);
            border-radius: 16px;
            border: 1px dashed rgba(148, 163, 184, 0.4);
            color: var(--muted);
        }

        .slot-legend {
            display: flex;
            gap: 16px;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: rgba(148, 163, 184, 0.9);
            margin-bottom: 12px;
        }

        .slot-legend span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .slot-legend-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
        }

        .slot-legend-dot.available {
            background: var(--accent);
        }

        .slot-legend-dot.booked {
            background: var(--danger);
        }

        .slot-legend-dot.closed {
            background: rgba(148, 163, 184, 0.5);
        }

        .schedule-error {
            background: rgba(248, 113, 113, 0.12);
            border: 1px solid rgba(248, 113, 113, 0.35);
            padding: 14px 16px;
            border-radius: 14px;
            color: var(--danger);
            margin-bottom: 16px;
            display: none;
        }

        .schedule-error.is-visible {
            display: block;
        }

        .modal {
            position: fixed;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            backdrop-filter: blur(12px);
            background: rgba(15, 23, 42, 0.72);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.2s ease;
            z-index: 100;
        }

        .modal.is-visible {
            opacity: 1;
            pointer-events: auto;
        }

        .modal-dialog {
            width: 100%;
            max-width: 560px;
            background: rgba(15, 23, 42, 0.95);
            border-radius: 24px;
            border: 1px solid rgba(148, 163, 184, 0.25);
            box-shadow: 0 35px 60px -25px rgba(15, 23, 42, 0.65);
            padding: 28px 32px;
            position: relative;
        }

        .modal-close {
            position: absolute;
            top: 18px;
            right: 18px;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: rgba(148, 163, 184, 0.15);
            border: none;
            color: var(--text);
            cursor: pointer;
            font-size: 18px;
        }

        .modal h3 {
            margin: 0 0 8px;
            font-size: 22px;
        }

        .modal-subtitle {
            margin: 0 0 24px;
            color: var(--muted);
        }

        form {
            display: grid;
            gap: 18px;
        }

        .form-row {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        label {
            font-size: 14px;
            color: var(--muted);
        }

        input, select {
            border-radius: 12px;
            border: 1px solid rgba(148, 163, 184, 0.25);
            background: rgba(15, 23, 42, 0.65);
            color: var(--text);
            padding: 12px 14px;
            font-size: 15px;
            transition: border 0.2s ease, box-shadow 0.2s ease;
        }

        input:focus {
            border-color: rgba(34, 211, 238, 0.65);
            box-shadow: 0 0 0 4px rgba(34, 211, 238, 0.16);
            outline: none;
        }

        .price-hint {
            padding: 12px 14px;
            border-radius: 12px;
            background: rgba(34, 211, 238, 0.12);
            border: 1px solid rgba(34, 211, 238, 0.25);
            color: rgba(248, 250, 252, 0.85);
            font-size: 14px;
        }

        .error-text {
            font-size: 13px;
            color: var(--danger);
        }

        .submit-button {
            background: linear-gradient(135deg, var(--accent), var(--accent-dark));
            color: var(--text);
            padding: 14px 20px;
            border-radius: 14px;
            border: none;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }

        .submit-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 35px -18px rgba(14, 165, 233, 0.9);
        }

        @media (max-width: 640px) {
            body {
                padding: 24px 12px;
            }

            .quest-card {
                padding: 24px;
            }

            .modal-dialog {
                padding: 24px;
            }
        }
    </style>
</head>
<body>
<div class="page">
    <a href="{{ url()->previous() ?? route('quests.index') }}" class="back-link">&larr; Назад к квестам</a>

    <div class="quest-card">
        <div class="quest-header">
            <h1>{{ $quest->name }}</h1>
            <div class="quest-meta">
                <span>Жанр: {{ $quest->genreId }}</span>
                <span>Сложность: {{ $quest->difficultyId }}</span>
                <span>Игроки: {{ $quest->players_count }}</span>
                <span>Длительность: {{ $quest->game_time }}</span>
            </div>
        </div>

        @if(session('status'))
            <div class="status">{{ session('status') }}</div>
        @endif

        @if($errors->any())
            <div class="errors">
                <strong>Не получилось забронировать слот:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="quest-description">
            <section>
                <h2>Описание</h2>
                <p>{{ $quest->description }}</p>
            </section>
            <section>
                <h2>Правила</h2>
                <p>{{ $quest->rules }}</p>
            </section>
            <section>
                <h2>Безопасность</h2>
                <p>{{ $quest->safety }}</p>
            </section>
            <section>
                <h2>Дополнительно</h2>
                <p>Доп. услуги: {{ $quest->additional_services }}</p>
                <p>Доп. игроки: {{ $quest->additional_players }}</p>
                <p>Цена за доп. игрока: {{ number_format($quest->price_per_additional_player, 0, '.', ' ') }} ₽</p>
            </section>
        </div>

        @php
            $weekdayShortLabels = ['вс', 'пн', 'вт', 'ср', 'чт', 'пт', 'сб'];
            $weekdayFullLabels = ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'];
            $monthShortLabels = ['янв', 'фев', 'мар', 'апр', 'май', 'июн', 'июл', 'авг', 'сен', 'окт', 'ноя', 'дек'];
            $monthFullLabels = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
            $initialDateRaw = old('booking_date', now()->toDateString());
            try {
                $initialDateCarbon = \Illuminate\Support\Carbon::createFromFormat('Y-m-d', $initialDateRaw);
            } catch (\Exception $exception) {
                $initialDateCarbon = now();
                $initialDateRaw = $initialDateCarbon->toDateString();
            }
            $initialDate = $initialDateRaw;
        @endphp

        <div
            class="slot-section"
            data-weekday-base="{{ $quest->weekday_base_price }}"
            data-weekend-base="{{ $quest->weekend_base_price }}"
            data-initial-date="{{ $initialDate }}"
            data-schedule-endpoint="{{ route('quests.schedule', ['id' => $quest->id]) }}"
        >
            <h2>Выберите время</h2>
            <p>Кликните по доступному времени, чтобы открыть окно бронирования и создать личный кабинет гостя.</p>

            @if($quest->slots->isEmpty())
                <div class="empty-slots">Для этого квеста пока не добавлены расписания. Свяжитесь с администратором.</div>
            @else
                <div class="date-strip" data-date-strip>
                    @foreach($dateOptions as $dateOption)
                        @php
                            $dateString = $dateOption->toDateString();
                            $weekdayShort = $weekdayShortLabels[$dateOption->dayOfWeek];
                            $monthShort = $monthShortLabels[$dateOption->month - 1];
                        @endphp
                        <button
                            type="button"
                            class="date-pill {{ $dateString === $initialDate ? 'is-selected' : '' }}"
                            data-date-button
                            data-date="{{ $dateString }}"
                        >
                            <span class="date-pill__day">{{ mb_strtoupper($weekdayShort, 'UTF-8') }}</span>
                            <span class="date-pill__date">{{ $dateOption->format('d') }} {{ $monthShort }}</span>
                        </button>
                    @endforeach
                    <button type="button" class="date-pill date-pill--picker" data-open-picker>Выбрать дату</button>
                    <input
                        type="date"
                        class="date-picker"
                        id="schedule-date-picker"
                        min="{{ now()->toDateString() }}"
                        value="{{ $initialDate }}"
                    >
                </div>

                <p data-schedule-heading>
                    Расписание на {{ $initialDateCarbon->format('d') }} {{ $monthFullLabels[$initialDateCarbon->month - 1] }}, {{ $weekdayFullLabels[$initialDateCarbon->dayOfWeek] }}
                </p>

                <div class="slot-legend" data-slot-legend>
                    <span><span class="slot-legend-dot available"></span> свободно</span>
                    <span><span class="slot-legend-dot booked"></span> занято</span>
                    <span><span class="slot-legend-dot closed"></span> не работает</span>
                </div>

                <div class="schedule-error" data-schedule-error>Не удалось загрузить расписание. Попробуйте ещё раз.</div>

                <div class="slot-grid">
                    @foreach($quest->slots as $slot)
                        @php
                            $timeLabel = \Illuminate\Support\Carbon::createFromFormat('H:i:s', $slot->time)->format('H:i');
                            $weekdayPrice = $slot->weekday_uses_base_price ? $quest->weekday_base_price : $slot->weekday_price;
                            $weekendPrice = $slot->weekend_uses_base_price ? $quest->weekend_base_price : $slot->weekend_price;
                            $isActive = $slot->weekday_enabled || $slot->weekend_enabled;
                        @endphp
                        @if(!$isActive)
                            @continue
                        @endif
                        <button
                            type="button"
                            class="slot-button"
                            data-slot-button
                            data-slot-id="{{ $slot->id }}"
                            data-time="{{ $timeLabel }}"
                            data-weekday-price="{{ $weekdayPrice }}"
                            data-weekend-price="{{ $weekendPrice }}"
                            data-weekday-enabled="{{ $slot->weekday_enabled ? 'true' : 'false' }}"
                            data-weekend-enabled="{{ $slot->weekend_enabled ? 'true' : 'false' }}"
                            data-weekday-uses-base-price="{{ $slot->weekday_uses_base_price ? 'true' : 'false' }}"
                            data-weekend-uses-base-price="{{ $slot->weekend_uses_base_price ? 'true' : 'false' }}"
                            data-is-discount="{{ $slot->is_discount ? 'true' : 'false' }}"
                            data-discount-price="{{ $slot->discount_price ?? '' }}"
                        >
                            <span class="slot-button__time">{{ $timeLabel }}</span>
                            <span class="slot-button__status" data-slot-status>Выберите дату</span>
                            <span class="slot-button__price" data-slot-price>
                                Будни: {{ $slot->weekday_enabled ? number_format($weekdayPrice, 0, '.', ' ') . ' ₽' : '—' }} ·
                                Выходные: {{ $slot->weekend_enabled ? number_format($weekendPrice, 0, '.', ' ') . ' ₽' : '—' }}
                                @if($slot->is_discount && $slot->discount_price)
                                    · Скидка: {{ number_format($slot->discount_price, 0, '.', ' ') }} ₽
                                @endif
                            </span>
                        </button>
                    @endforeach
                </div>
            @endif
        </div>

    </div>
</div>

<div id="booking-modal" class="modal" data-should-open="{{ old('quest_slot_id') ? 'true' : 'false' }}">
    <div class="modal-dialog">
        <button type="button" class="modal-close" data-modal-close aria-label="Закрыть">×</button>
        <h3>Бронирование квеста</h3>
        <p class="modal-subtitle">Заполните данные гостя — мы создадим для него личный кабинет и закрепим выбранный слот.</p>

        <form action="{{ route('quests.book', ['id' => $quest->id]) }}" method="POST" id="booking-form">
            @csrf
            <input type="hidden" name="quest_slot_id" id="modal-slot-id" value="{{ old('quest_slot_id') }}">

            <div class="price-hint" id="modal-price-hint">
                Выберите время, чтобы увидеть стоимость.
            </div>

            <div class="form-row">
                <label for="modal-booking-date">Дата посещения</label>
                <input
                    type="date"
                    id="modal-booking-date"
                    name="booking_date"
                    min="{{ now()->toDateString() }}"
                    value="{{ old('booking_date', now()->toDateString()) }}"
                    required
                >
                @error('booking_date')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-row">
                <label>Выбранный слот</label>
                <input type="text" id="modal-slot-summary" readonly placeholder="Нажмите на время в расписании" />
                @error('quest_slot_id')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-row">
                <label for="customer_name">Имя и фамилия гостя</label>
                <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name') }}" required>
                @error('customer_name')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-row">
                <label for="customer_phone">Телефон</label>
                <input type="tel" id="customer_phone" name="customer_phone" value="{{ old('customer_phone') }}" required>
                @error('customer_phone')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-row">
                <label for="password">Пароль</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-row">
                <label for="password_confirmation">Повторите пароль</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            @error('booking')
                <span class="error-text">{{ $message }}</span>
            @enderror

            <button type="submit" class="submit-button">Подтвердить бронирование</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('booking-modal');
        const slotSummaryInput = document.getElementById('modal-slot-summary');
        const slotIdInput = document.getElementById('modal-slot-id');
        const priceHint = document.getElementById('modal-price-hint');
        const bookingDateInput = document.getElementById('modal-booking-date');
        const slotSection = document.querySelector('.slot-section');
        const questWeekdayBasePrice = slotSection ? Number(slotSection.dataset.weekdayBase || 0) : 0;
        const questWeekendBasePrice = slotSection ? Number(slotSection.dataset.weekendBase || 0) : 0;
        const scheduleEndpoint = slotSection ? slotSection.dataset.scheduleEndpoint : null;
        const initialDate = slotSection ? slotSection.dataset.initialDate : null;
        const slotButtons = Array.from(document.querySelectorAll('[data-slot-button]'));
        const dateButtons = Array.from(document.querySelectorAll('[data-date-button]'));
        const datePicker = document.getElementById('schedule-date-picker');
        const manualPickerTrigger = document.querySelector('[data-open-picker]');
        const scheduleHeading = document.querySelector('[data-schedule-heading]');
        const scheduleError = document.querySelector('[data-schedule-error]');
        const initialSlotId = slotIdInput ? slotIdInput.value : null;
        const shouldRestoreModal = modal ? modal.dataset.shouldOpen === 'true' : false;

        if (!slotSection || slotButtons.length === 0) {
            return;
        }

        const scheduleCache = new Map();
        let activeSlot = null;
        let currentSchedule = null;
        let selectedDate = initialDate;

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

        const formatHeading = (dateStr) => {
            const date = new Date(`${dateStr}T00:00:00`);
            const dayMonth = date.toLocaleDateString('ru-RU', { day: 'numeric', month: 'long' });
            const weekday = date.toLocaleDateString('ru-RU', { weekday: 'long' });
            return `${dayMonth}, ${weekday}`;
        };

        const formatSummaryDate = (dateStr) => {
            const date = new Date(`${dateStr}T00:00:00`);
            return date.toLocaleDateString('ru-RU', { day: 'numeric', month: 'long' });
        };

        const parseSlotDataset = (dataset) => ({
            id: Number(dataset.slotId),
            time: dataset.time,
            weekdayPrice: Number(dataset.weekdayPrice ?? 0),
            weekendPrice: Number(dataset.weekendPrice ?? 0),
            isDiscount: dataset.isDiscount === 'true',
            discountPrice: dataset.discountPrice ? Number(dataset.discountPrice) : 0,
            weekdayEnabled: dataset.weekdayEnabled === 'true',
            weekendEnabled: dataset.weekendEnabled === 'true',
            weekdayUsesBasePrice: dataset.weekdayUsesBasePrice === 'true',
            weekendUsesBasePrice: dataset.weekendUsesBasePrice === 'true',
        });

        const resolveEffectivePrice = (slotData, isWeekend) => {
            if (isWeekend) {
                return slotData.weekendUsesBasePrice ? questWeekendBasePrice : slotData.weekendPrice;
            }

            return slotData.weekdayUsesBasePrice ? questWeekdayBasePrice : slotData.weekdayPrice;
        };

        const computePriceText = (slotData) => {
            if (!slotData) {
                return 'Выберите время, чтобы увидеть стоимость.';
            }

            if (!currentSchedule) {
                return 'Выберите дату, чтобы увидеть стоимость.';
            }

            const isWeekend = Boolean(currentSchedule.is_weekend);
            const availableByDay = isWeekend ? slotData.weekendEnabled : slotData.weekdayEnabled;

            if (!availableByDay) {
                return 'Этот слот не работает в выбранный день.';
            }

            const bookings = Array.isArray(currentSchedule.bookings) ? currentSchedule.bookings : [];
            if (bookings.some((booking) => Number(booking.quest_slot_id) === slotData.id)) {
                return 'Этот слот уже забронирован на выбранную дату.';
            }

            if (slotData.isDiscount && slotData.discountPrice) {
                return `Специальная цена: ${formatCurrency(slotData.discountPrice)}.`;
            }

            const price = resolveEffectivePrice(slotData, isWeekend);

            return `Стоимость бронирования: ${formatCurrency(price)} (${isWeekend ? 'выходной день' : 'будний день'}).`;
        };

        const applySchedule = (schedule) => {
            currentSchedule = schedule;
            const bookings = Array.isArray(schedule.bookings) ? schedule.bookings : [];
            const bookedIds = new Set(bookings.map((booking) => String(booking.quest_slot_id)));
            const isWeekend = Boolean(schedule.is_weekend);

            slotButtons.forEach((button) => {
                const slotData = parseSlotDataset(button.dataset);
                const statusLabel = button.querySelector('[data-slot-status]');
                const priceLabel = button.querySelector('[data-slot-price]');
                const availableByDay = isWeekend ? slotData.weekendEnabled : slotData.weekdayEnabled;
                const isBooked = bookedIds.has(String(slotData.id));
                const available = availableByDay && !isBooked;
                const price = slotData.isDiscount && slotData.discountPrice
                    ? slotData.discountPrice
                    : resolveEffectivePrice(slotData, isWeekend);

                if (statusLabel) {
                    statusLabel.textContent = isBooked
                        ? 'Занято'
                        : (availableByDay ? 'Свободно' : 'Не работает');
                }

                if (priceLabel) {
                    priceLabel.textContent = availableByDay ? formatCurrency(price) : '—';
                }

                button.disabled = !available;
                button.classList.toggle('slot-button--unavailable', !available);
                button.classList.toggle('slot-button--booked', isBooked);

                if (!available) {
                    button.setAttribute('aria-disabled', 'true');
                } else {
                    button.removeAttribute('aria-disabled');
                }
            });

            if (activeSlot) {
                const refreshedButton = document.querySelector(`[data-slot-id="${activeSlot.id}"]`);
                if (!refreshedButton || refreshedButton.disabled) {
                    activeSlot = null;
                    slotSummaryInput.value = '';
                    slotIdInput.value = '';
                }
            }

            priceHint.textContent = computePriceText(activeSlot);
        };

        const updateHeading = (dateStr) => {
            if (!scheduleHeading) {
                return;
            }

            scheduleHeading.textContent = `Расписание на ${formatHeading(dateStr)}`;
        };

        const loadSchedule = async (dateStr) => {
            if (!scheduleEndpoint || !dateStr) {
                return null;
            }

            if (scheduleError) {
                scheduleError.classList.remove('is-visible');
            }

            if (scheduleCache.has(dateStr)) {
                const cached = scheduleCache.get(dateStr);
                selectedDate = cached.date;
                bookingDateInput.value = cached.date;
                if (datePicker) {
                    datePicker.value = cached.date;
                }
                updateHeading(cached.date);
                applySchedule(cached);
                return cached;
            }

            try {
                const response = await fetch(`${scheduleEndpoint}?date=${encodeURIComponent(dateStr)}`, {
                    headers: { 'Accept': 'application/json' },
                });

                if (!response.ok) {
                    throw new Error('Schedule request failed');
                }

                const data = await response.json();
                scheduleCache.set(data.date, data);
                selectedDate = data.date;
                bookingDateInput.value = data.date;
                if (datePicker) {
                    datePicker.value = data.date;
                }
                dateButtons.forEach((button) => {
                    button.classList.toggle('is-selected', button.dataset.date === data.date);
                });
                updateHeading(data.date);
                applySchedule(data);

                return data;
            } catch (error) {
                console.error(error);
                if (scheduleError) {
                    scheduleError.classList.add('is-visible');
                }
                return null;
            }
        };

        const setSelectedDate = (dateStr, { skipRequest = false, preserveSelection = false } = {}) => {
            if (!dateStr) {
                return Promise.resolve(null);
            }

            selectedDate = dateStr;
            bookingDateInput.value = dateStr;
            if (datePicker) {
                datePicker.value = dateStr;
            }
            dateButtons.forEach((button) => {
                button.classList.toggle('is-selected', button.dataset.date === dateStr);
            });
            updateHeading(dateStr);

            if (!preserveSelection) {
                activeSlot = null;
                slotSummaryInput.value = '';
                slotIdInput.value = '';
                priceHint.textContent = 'Выберите время, чтобы увидеть стоимость.';
            }

            if (skipRequest) {
                return Promise.resolve(currentSchedule);
            }

            return loadSchedule(dateStr);
        };

        const openModal = (slotData) => {
            if (!currentSchedule) {
                priceHint.textContent = 'Выберите дату, чтобы увидеть стоимость.';
                return;
            }

            const bookings = Array.isArray(currentSchedule.bookings) ? currentSchedule.bookings : [];
            const isBooked = bookings.some((booking) => Number(booking.quest_slot_id) === slotData.id);
            const isWeekend = Boolean(currentSchedule.is_weekend);
            const availableByDay = isWeekend ? slotData.weekendEnabled : slotData.weekdayEnabled;

            if (!availableByDay || isBooked) {
                priceHint.textContent = computePriceText(slotData);
                return;
            }

            activeSlot = slotData;
            slotIdInput.value = slotData.id;
            const summaryDate = formatSummaryDate(currentSchedule.date || selectedDate);
            slotSummaryInput.value = `${slotData.time} · ${summaryDate}`;
            priceHint.textContent = computePriceText(slotData);
            bookingDateInput.value = currentSchedule.date || selectedDate;
            modal.classList.add('is-visible');
        };

        const closeModal = () => {
            modal.classList.remove('is-visible');
        };

        slotButtons.forEach((button) => {
            button.addEventListener('click', () => {
                const slotData = parseSlotDataset(button.dataset);
                openModal(slotData);
            });
        });

        document.querySelectorAll('[data-modal-close]').forEach((element) => {
            element.addEventListener('click', closeModal);
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && modal.classList.contains('is-visible')) {
                closeModal();
            }
        });

        modal.addEventListener('click', (event) => {
            if (event.target === modal) {
                closeModal();
            }
        });

        if (manualPickerTrigger && datePicker) {
            manualPickerTrigger.addEventListener('click', () => {
                if (typeof datePicker.showPicker === 'function') {
                    datePicker.showPicker();
                } else {
                    datePicker.focus();
                    datePicker.click();
                }
            });
        }

        if (datePicker) {
            datePicker.addEventListener('change', () => {
                setSelectedDate(datePicker.value);
            });
        }

        bookingDateInput.addEventListener('change', () => {
            setSelectedDate(bookingDateInput.value);
        });

        dateButtons.forEach((button) => {
            button.addEventListener('click', () => {
                setSelectedDate(button.dataset.date);
            });
        });

        const fallbackDate = selectedDate || bookingDateInput.value || new Date().toISOString().slice(0, 10);

        setSelectedDate(fallbackDate, { preserveSelection: true }).then(() => {
            if (shouldRestoreModal && initialSlotId) {
                const initialButton = document.querySelector(`[data-slot-id="${initialSlotId}"]`);
                if (initialButton && !initialButton.disabled) {
                    initialButton.click();
                }
            }
        });
    });
</script>
</body>
</html>
