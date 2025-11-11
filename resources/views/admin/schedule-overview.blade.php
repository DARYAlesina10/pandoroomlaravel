<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Общий календарь квестов</title>
    <style>
        :root {
            --bg: #f4f5f7;
            --panel: #ffffff;
            --accent: #d9c062;
            --accent-dark: #c0a445;
            --text: #111827;
            --muted: #6b7280;
            --border: rgba(209, 213, 219, 0.6);
            --shadow: 0 32px 64px -30px rgba(15, 23, 42, 0.45);
            --success: #3b8c66;
            --danger: #c2410c;
            --warning: #f97316;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(160deg, #edf1f7 0%, #f9fafc 65%, #f4f5f7 100%);
            color: var(--text);
        }

        a {
            color: inherit;
        }

        .page {
            max-width: 1400px;
            margin: 0 auto;
            padding: 48px 40px 96px;
            display: grid;
            gap: 32px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            flex-wrap: wrap;
            gap: 18px;
        }

        .page-header h1 {
            margin: 0;
            font-size: clamp(34px, 4vw, 52px);
            letter-spacing: -0.02em;
        }

        .page-header span {
            color: var(--muted);
            font-size: 15px;
        }

        .header-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .header-actions a {
            padding: 12px 20px;
            border-radius: 16px;
            text-decoration: none;
            font-weight: 600;
        }

        .button-secondary {
            background: rgba(0, 0, 0, 0.05);
        }

        .button-primary {
            background: var(--accent);
            color: #fff;
            box-shadow: 0 18px 36px -20px rgba(201, 155, 32, 0.55);
        }

        .date-strip {
            display: flex;
            gap: 12px;
            overflow-x: auto;
            padding-bottom: 12px;
        }

        .date-chip {
            min-width: 120px;
            padding: 14px 18px;
            border-radius: 18px;
            background: var(--panel);
            border: 1px solid var(--border);
            text-align: left;
            cursor: pointer;
            display: grid;
            gap: 6px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .date-chip:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow);
        }

        .date-chip.active {
            background: var(--accent);
            border-color: transparent;
            color: #fff;
            box-shadow: 0 22px 40px -25px rgba(201, 155, 32, 0.65);
        }

        .date-chip span:first-child {
            font-weight: 600;
        }

        .alert {
            padding: 18px 20px;
            border-radius: 20px;
            border: 1px solid rgba(59, 140, 102, 0.45);
            background: rgba(59, 140, 102, 0.12);
            color: var(--success);
            font-weight: 500;
        }

        .alert ul {
            margin: 0;
            padding-left: 18px;
        }

        .alert.error {
            border-color: rgba(194, 65, 12, 0.35);
            background: rgba(194, 65, 12, 0.12);
            color: var(--danger);
        }

        .quests-grid {
            display: grid;
            gap: 24px;
        }

        .quest-card {
            background: var(--panel);
            border-radius: 28px;
            padding: 28px;
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
            display: grid;
            gap: 18px;
        }

        .quest-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            flex-wrap: wrap;
            gap: 12px;
        }

        .quest-header h2 {
            margin: 0;
            font-size: 24px;
        }

        .quest-meta {
            color: var(--muted);
            font-size: 14px;
        }

        .slot-grid {
            display: grid;
            gap: 12px;
        }

        .slot-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 18px;
            border: 1px solid var(--border);
            padding: 14px 18px;
            background: rgba(249, 250, 251, 0.65);
            flex-wrap: wrap;
            gap: 12px;
        }

        .slot-info {
            display: grid;
            gap: 2px;
        }

        .slot-status {
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--muted);
        }

        .slot-actions {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .slot-price {
            font-weight: 600;
        }

        .slot-button {
            padding: 10px 18px;
            border-radius: 12px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .slot-button.book {
            background: var(--accent);
            color: #fff;
        }

        .slot-button.book:hover {
            transform: translateY(-2px);
        }

        .slot-button.disabled {
            background: rgba(0, 0, 0, 0.08);
            color: var(--muted);
            cursor: not-allowed;
        }

        .slot-tag {
            padding: 6px 10px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 600;
        }

        .slot-tag.busy {
            background: rgba(194, 65, 12, 0.12);
            color: var(--danger);
        }

        .slot-tag.offline {
            background: rgba(107, 114, 128, 0.12);
            color: var(--muted);
        }

        .slot-tag.available {
            background: rgba(59, 140, 102, 0.12);
            color: var(--success);
        }

        .booking-details {
            color: var(--muted);
            font-size: 14px;
        }

        .modal {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.55);
            display: none;
            align-items: center;
            justify-content: center;
            padding: 24px;
            z-index: 100;
        }

        .modal.active {
            display: flex;
        }

        .modal-card {
            background: #ffffff;
            border-radius: 24px;
            padding: 32px;
            max-width: 520px;
            width: 100%;
            box-shadow: 0 30px 60px -25px rgba(15, 23, 42, 0.6);
            display: grid;
            gap: 20px;
        }

        .modal-card h3 {
            margin: 0;
            font-size: 24px;
        }

        .modal-grid {
            display: grid;
            gap: 16px;
        }

        label {
            font-size: 14px;
            font-weight: 600;
            display: grid;
            gap: 8px;
        }

        input[type="text"],
        input[type="tel"],
        input[type="password"] {
            border-radius: 12px;
            border: 1px solid var(--border);
            padding: 12px 14px;
            font-size: 15px;
        }

        .modal-actions {
            display: flex;
            justify-content: space-between;
            gap: 12px;
        }

        .modal-actions button,
        .modal-actions a {
            flex: 1;
            text-align: center;
            padding: 12px 18px;
            border-radius: 12px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }

        .modal-actions .submit {
            background: var(--accent);
            color: #fff;
        }

        .modal-actions .cancel {
            background: rgba(0, 0, 0, 0.08);
            color: var(--muted);
        }

        @media (max-width: 768px) {
            .page {
                padding: 32px 20px 80px;
            }

            .page-header {
                align-items: flex-start;
            }

            .slot-row {
                flex-direction: column;
                align-items: flex-start;
            }

            .slot-actions {
                width: 100%;
                justify-content: space-between;
            }

            .modal-card {
                padding: 28px 20px;
            }
        }
    </style>
</head>
<body>
<div class="page">
    <div class="page-header">
        <div>
            <span>Дата: {{ $activeDate->translatedFormat('l, d F') }}</span>
            <h1>Все квесты и расписание</h1>
        </div>
        <div class="header-actions">
            <a href="{{ route('admin.dashboard') }}" class="button-secondary">← В панель</a>
            <a href="{{ route('admin.bookings') }}" class="button-primary">Смотреть список броней</a>
        </div>
    </div>

    <div class="date-strip">
        @foreach($dateRange as $date)
            <a href="{{ route('admin.schedule.overview', ['date' => $date->toDateString()]) }}" class="date-chip {{ $date->isSameDay($activeDate) ? 'active' : '' }}">
                <span>{{ $date->translatedFormat('D, d M') }}</span>
                <span>{{ $date->isToday() ? 'Сегодня' : ($date->isTomorrow() ? 'Завтра' : '') }}</span>
            </a>
        @endforeach
    </div>

    @if(session('status'))
        <div class="alert">{{ session('status') }}</div>
    @endif

    @if($errors->any())
        <div class="alert error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="quests-grid">
        @forelse($quests as $quest)
            <div class="quest-card">
                <div class="quest-header">
                    <h2>{{ $quest->name }}</h2>
                    <div class="quest-meta">Игроков: {{ $quest->players_count ?? '—' }} · База будни {{ number_format($quest->weekday_base_price ?? 0, 0, '.', ' ') }} ₽ · База выходные {{ number_format($quest->weekend_base_price ?? 0, 0, '.', ' ') }} ₽</div>
                </div>
                <div class="slot-grid">
                    @forelse($quest->slots as $slot)
                        @php
                            $bookingKey = $quest->id . '|' . $slot->id;
                            $booking = $bookings->get($bookingKey);
                            $available = $slot->isAvailableForDate($activeDate);
                            $price = number_format($slot->priceForDate($activeDate), 0, '.', ' ');
                        @endphp
                        <div class="slot-row">
                            <div class="slot-info">
                                <strong>{{ $slot->time }}</strong>
                                <div class="booking-details">
                                    @if($booking)
                                        {{ $booking->customer_name }} · {{ $booking->customer_phone }}
                                    @elseif(!$available)
                                        Слот отключён для этой даты
                                    @else
                                        Свободно для бронирования
                                    @endif
                                </div>
                            </div>
                            <div class="slot-actions">
                                <span class="slot-price">{{ $price }} ₽</span>
                                @if($booking)
                                    <span class="slot-tag busy">Занято</span>
                                @elseif(!$available)
                                    <span class="slot-tag offline">Не работает</span>
                                @else
                                    <span class="slot-tag available">Свободно</span>
                                @endif
                                @if($available && !$booking)
                                    <button
                                        class="slot-button book"
                                        data-quest="{{ $quest->name }}"
                                        data-quest-id="{{ $quest->id }}"
                                        data-slot-id="{{ $slot->id }}"
                                        data-time="{{ $slot->time }}"
                                        data-date="{{ $activeDate->toDateString() }}"
                                        data-price="{{ $price }}"
                                        data-action="{{ route('quests.book', ['id' => $quest->id]) }}"
                                    >Забронировать</button>
                                @else
                                    <button class="slot-button disabled" disabled>{{ $booking ? 'Просмотр' : 'Недоступно' }}</button>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="slot-row">
                            <div class="slot-info">
                                <strong>Слоты не настроены</strong>
                                <div class="booking-details">Добавьте временные окна на странице расписания квеста.</div>
                            </div>
                            <div class="slot-actions">
                                <a class="slot-button book" href="{{ route('admin.quests.schedule', $quest->id) }}">Настроить</a>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        @empty
            <div class="alert">Пока нет квестов. Создайте первый сценарий, чтобы управлять расписанием.</div>
        @endforelse
    </div>
</div>

<div id="admin-booking-modal" class="modal">
    <div class="modal-card">
        <h3 id="modal-title">Новое бронирование</h3>
        <div class="modal-grid">
            <div>
                <strong id="modal-quest"></strong>
                <div id="modal-time" class="booking-details"></div>
                <div id="modal-price" class="booking-details"></div>
            </div>
            <form id="admin-booking-form" method="POST" class="modal-grid">
                @csrf
                <input type="hidden" name="booking_date" id="booking-date-input" value="{{ old('booking_date') }}">
                <input type="hidden" name="quest_slot_id" id="slot-id-input" value="{{ old('quest_slot_id') }}">
                <input type="hidden" name="return_to" value="admin_schedule_overview">
                <label>
                    Имя гостя
                    <input type="text" name="customer_name" value="{{ old('customer_name') }}" required>
                </label>
                <label>
                    Телефон
                    <input type="tel" name="customer_phone" value="{{ old('customer_phone') }}" required placeholder="+7 999 123-45-67">
                </label>
                <label>
                    Пароль для личного кабинета
                    <input type="password" name="password" required minlength="8">
                </label>
                <label>
                    Повтор пароля
                    <input type="password" name="password_confirmation" required minlength="8">
                </label>
                <div class="modal-actions">
                    <a href="#" class="cancel" id="modal-cancel">Отмена</a>
                    <button type="submit" class="submit">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const modal = document.getElementById('admin-booking-modal');
    const modalQuest = document.getElementById('modal-quest');
    const modalTime = document.getElementById('modal-time');
    const modalPrice = document.getElementById('modal-price');
    const bookingDateInput = document.getElementById('booking-date-input');
    const slotIdInput = document.getElementById('slot-id-input');
    const form = document.getElementById('admin-booking-form');
    const cancelButton = document.getElementById('modal-cancel');

    document.querySelectorAll('.slot-button.book').forEach(function (button) {
        button.addEventListener('click', function () {
            modalQuest.textContent = button.dataset.quest;
            modalTime.textContent = `${button.dataset.time} · ${new Date(button.dataset.date).toLocaleDateString('ru-RU')}`;
            modalPrice.textContent = `Стоимость: ${button.dataset.price} ₽`;
            bookingDateInput.value = button.dataset.date;
            slotIdInput.value = button.dataset.slotId;
            form.action = button.dataset.action;
            modal.classList.add('active');
        });
    });

    cancelButton.addEventListener('click', function (event) {
        event.preventDefault();
        modal.classList.remove('active');
    });

    modal.addEventListener('click', function (event) {
        if (event.target === modal) {
            modal.classList.remove('active');
        }
    });

    @if($errors->any())
    (function () {
        const initialSlotId = '{{ old('quest_slot_id') }}';
        if (!initialSlotId) {
            return;
        }

        const triggerButton = document.querySelector(`.slot-button.book[data-slot-id="${initialSlotId}"]`);
        if (triggerButton) {
            triggerButton.click();
        } else {
            modal.classList.add('active');
        }
    })();
    @endif
</script>
</body>
</html>
