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
            padding: 16px 18px;
            color: var(--text);
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            gap: 6px;
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

        .slot-button span {
            font-size: 13px;
            color: rgba(248, 250, 252, 0.7);
            font-weight: 500;
        }

        .empty-slots {
            padding: 20px;
            background: rgba(148, 163, 184, 0.08);
            border-radius: 16px;
            border: 1px dashed rgba(148, 163, 184, 0.4);
            color: var(--muted);
        }

        .bookings-card {
            background: rgba(148, 163, 184, 0.06);
            border-radius: 18px;
            padding: 24px;
            border: 1px solid rgba(148, 163, 184, 0.14);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 12px;
        }

        th, td {
            text-align: left;
            padding: 12px 16px;
            border-bottom: 1px solid rgba(148, 163, 184, 0.18);
        }

        th {
            color: var(--muted);
            font-weight: 500;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.04em;
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

        <div class="slot-section" data-weekday-base="{{ $quest->weekday_base_price }}" data-weekend-base="{{ $quest->weekend_base_price }}">
            <h2>Выберите время</h2>
            <p>Кликните по доступному времени, чтобы открыть окно бронирования и создать личный кабинет гостя.</p>

            @if($quest->slots->isEmpty())
                <div class="empty-slots">Для этого квеста пока не добавлены расписания. Свяжитесь с администратором.</div>
            @else
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
                            data-discount-price="{{ $slot->discount_price }}"
                        >
                            {{ $timeLabel }}
                            <span>
                                будни:
                                @if($slot->weekday_enabled)
                                    {{ number_format($weekdayPrice, 0, '.', ' ') }} ₽
                                @else
                                    недоступно
                                @endif
                                <br>
                                выходные:
                                @if($slot->weekend_enabled)
                                    {{ number_format($weekendPrice, 0, '.', ' ') }} ₽
                                @else
                                    недоступно
                                @endif
                                @if($slot->is_discount && $slot->discount_price)
                                    <br>скидка: {{ number_format($slot->discount_price, 0, '.', ' ') }} ₽
                                @endif
                            </span>
                        </button>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="bookings-card">
            <h2>Ближайшие бронирования</h2>
            @if($upcomingBookings->isEmpty())
                <p style="color: var(--muted);">Пока нет подтверждённых бронирований — будьте первыми!</p>
            @else
                <table>
                    <thead>
                    <tr>
                        <th>Дата</th>
                        <th>Время</th>
                        <th>Гость</th>
                        <th>Email</th>
                        <th>Телефон</th>
                        <th>Стоимость</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($upcomingBookings as $booking)
                        <tr>
                            <td>{{ $booking->booking_date->format('d.m.Y') }}</td>
                            <td>{{ \Illuminate\Support\Carbon::createFromFormat('H:i:s', $booking->slot->time)->format('H:i') }}</td>
                            <td>{{ $booking->customer_name }}</td>
                            <td>{{ optional($booking->user)->email ?? '—' }}</td>
                            <td>{{ $booking->customer_phone }}</td>
                            <td>{{ number_format($booking->price, 0, '.', ' ') }} ₽</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
                <label for="customer_email">Email для личного кабинета</label>
                <input type="email" id="customer_email" name="customer_email" value="{{ old('customer_email') }}" required>
                @error('customer_email')
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
        const slotButtons = Array.from(document.querySelectorAll('[data-slot-button]'));
        let activeSlot = null;

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

        const parseDateInput = () => {
            const dateValue = bookingDateInput.value;
            if (!dateValue) {
                return null;
            }

            const [year, month, day] = dateValue.split('-').map(Number);
            if (!year || !month || !day) {
                return null;
            }

            return new Date(year, month - 1, day);
        };

        const isWeekendDate = (date) => {
            const day = date.getDay();
            return day === 0 || day === 6;
        };

        const parseSlotDataset = (dataset) => ({
            id: dataset.slotId,
            time: dataset.time,
            weekdayPrice: Number(dataset.weekdayPrice ?? 0),
            weekendPrice: Number(dataset.weekendPrice ?? 0),
            isDiscount: dataset.isDiscount === 'true',
            discountPrice: dataset.discountPrice ? Number(dataset.discountPrice) : null,
            weekdayEnabled: dataset.weekdayEnabled === 'true',
            weekendEnabled: dataset.weekendEnabled === 'true',
            weekdayUsesBasePrice: dataset.weekdayUsesBasePrice === 'true',
            weekendUsesBasePrice: dataset.weekendUsesBasePrice === 'true',
        });

        const isSlotAvailableOnDate = (slotData, date) => {
            if (!date) {
                return slotData.weekdayEnabled || slotData.weekendEnabled;
            }

            return isWeekendDate(date) ? slotData.weekendEnabled : slotData.weekdayEnabled;
        };

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

            const selectedDate = parseDateInput();

            if (selectedDate && !isSlotAvailableOnDate(slotData, selectedDate)) {
                return 'Этот слот недоступен на выбранную дату.';
            }

            if (slotData.isDiscount && slotData.discountPrice) {
                return `Специальная цена: ${formatCurrency(slotData.discountPrice)}.`;
            }

            const baseWeekdayPrice = resolveEffectivePrice(slotData, false);
            const baseWeekendPrice = resolveEffectivePrice(slotData, true);

            if (!selectedDate) {
                const weekdayLabel = slotData.weekdayEnabled ? formatCurrency(baseWeekdayPrice) : 'недоступно';
                const weekendLabel = slotData.weekendEnabled ? formatCurrency(baseWeekendPrice) : 'недоступно';

                return `Будни: ${weekdayLabel} • Выходные: ${weekendLabel}`;
            }

            const weekend = isWeekendDate(selectedDate);
            const price = resolveEffectivePrice(slotData, weekend);

            return `Стоимость бронирования: ${formatCurrency(price)} (${weekend ? 'выходной день' : 'будний день'}).`;
        };

        const openModal = (slotData) => {
            const selectedDate = parseDateInput();

            if (selectedDate && !isSlotAvailableOnDate(slotData, selectedDate)) {
                priceHint.textContent = 'Этот слот недоступен на выбранную дату.';
                return;
            }

            activeSlot = slotData;
            slotIdInput.value = slotData.id;
            slotSummaryInput.value = `${slotData.time}`;
            priceHint.textContent = computePriceText(slotData);
            modal.classList.add('is-visible');
        };

        const closeModal = () => {
            modal.classList.remove('is-visible');
        };

        const refreshSlotStates = () => {
            const selectedDate = parseDateInput();

            slotButtons.forEach((button) => {
                const slotData = parseSlotDataset(button.dataset);
                const available = isSlotAvailableOnDate(slotData, selectedDate);

                if (selectedDate) {
                    button.disabled = !available;
                    button.classList.toggle('slot-button--unavailable', !available);
                    button.setAttribute('aria-disabled', available ? 'false' : 'true');
                } else {
                    button.disabled = false;
                    button.classList.remove('slot-button--unavailable');
                    button.removeAttribute('aria-disabled');
                }
            });

            if (activeSlot) {
                priceHint.textContent = computePriceText(activeSlot);
            }
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

        bookingDateInput.addEventListener('change', () => {
            refreshSlotStates();
        });

        refreshSlotStates();

        if (modal.dataset.shouldOpen === 'true' && slotIdInput.value) {
            const initialButton = document.querySelector(`[data-slot-id="${slotIdInput.value}"]`);
            if (initialButton) {
                initialButton.click();
            }
        }
    });
</script>
</body>
</html>
