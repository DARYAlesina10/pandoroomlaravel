<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $quest->name }}</title>
    <style>
        :root {
            --bg-dark: #080808;
            --bg-overlay: rgba(8, 8, 8, 0.85);
            --accent: #d9c062;
            --accent-strong: #c0a445;
            --text: #f6f3ee;
            --muted: rgba(239, 234, 220, 0.75);
            --muted-strong: rgba(239, 234, 220, 0.45);
            --border: rgba(255, 255, 255, 0.12);
            --danger: #f87171;
            --success: #4ade80;
            --card-bg: rgba(21, 21, 21, 0.82);
            --card-highlight: rgba(35, 35, 35, 0.86);
            --shadow: 0 35px 60px -35px rgba(0, 0, 0, 0.75);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: var(--bg-dark);
            color: var(--text);
            min-height: 100vh;
        }

        a { color: inherit; }

        .page {
            position: relative;
            min-height: 100vh;
        }

        .hero {
            position: relative;
            min-height: 520px;
            padding: 48px 24px 80px;
            display: flex;
            align-items: flex-end;
            background-size: cover;
            background-position: center;
        }

        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(8, 8, 8, 0.35) 0%, rgba(8, 8, 8, 0.92) 75%, rgba(8, 8, 8, 1) 100%);
        }

        .hero__content {
            position: relative;
            z-index: 2;
            max-width: 1080px;
            width: 100%;
            margin: 0 auto;
            display: grid;
            gap: 24px;
        }

        .hero__breadcrumbs {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 10px 16px;
            border-radius: 999px;
            background: rgba(0, 0, 0, 0.45);
            color: var(--muted);
            text-decoration: none;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .hero__title {
            margin: 0;
            font-size: clamp(40px, 5vw, 68px);
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        .hero__meta {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .hero__meta span {
            padding: 12px 18px;
            border-radius: 999px;
            background: rgba(0, 0, 0, 0.55);
            border: 1px solid rgba(255, 255, 255, 0.08);
            font-size: 14px;
        }

        .content {
            max-width: 1100px;
            margin: -140px auto 0;
            padding: 0 24px 120px;
            position: relative;
            z-index: 3;
        }

        .deck {
            display: grid;
            gap: 32px;
        }

        .card {
            background: var(--card-bg);
            border-radius: 28px;
            padding: 32px 36px;
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
        }

        .card--highlight {
            background: var(--card-highlight);
        }

        .card__title {
            margin: 0 0 18px;
            font-size: 26px;
            font-weight: 600;
            letter-spacing: -0.01em;
        }

        .card__subtitle {
            margin: -12px 0 20px;
            color: var(--muted);
            font-size: 15px;
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 24px;
        }

        .details-grid section {
            display: grid;
            gap: 12px;
        }

        .details-grid h3 {
            margin: 0;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--muted);
        }

        .status-banner,
        .error-banner {
            margin-bottom: 24px;
            padding: 18px 20px;
            border-radius: 16px;
            border: 1px solid transparent;
            font-size: 15px;
        }

        .status-banner {
            border-color: rgba(74, 222, 128, 0.4);
            background: rgba(74, 222, 128, 0.12);
            color: var(--success);
        }

        .error-banner {
            border-color: rgba(248, 113, 113, 0.4);
            background: rgba(248, 113, 113, 0.12);
            color: var(--danger);
        }

        .schedule {
            display: grid;
            gap: 24px;
        }

        .schedule__heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .schedule__heading h2 {
            margin: 0;
            font-size: 28px;
        }

        .schedule__heading button {
            border: none;
            border-radius: 14px;
            padding: 10px 16px;
            background: rgba(255, 255, 255, 0.08);
            color: var(--text);
            cursor: pointer;
            font-size: 14px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .date-strip {
            display: flex;
            gap: 12px;
            overflow-x: auto;
            padding-bottom: 6px;
            scrollbar-width: thin;
        }

        .date-pill {
            min-width: 110px;
            padding: 14px 16px;
            border-radius: 18px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            background: rgba(0, 0, 0, 0.45);
            display: grid;
            gap: 6px;
            cursor: pointer;
            transition: transform 0.2s ease, border 0.2s ease;
        }

        .date-pill:hover { transform: translateY(-3px); }

        .date-pill.is-selected {
            border-color: rgba(217, 192, 98, 0.95);
            background: linear-gradient(135deg, rgba(217, 192, 98, 0.85), rgba(192, 164, 69, 0.65));
            color: #1a1405;
        }

        .date-pill__weekday {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--muted);
        }

        .date-pill.is-selected .date-pill__weekday {
            color: rgba(32, 26, 14, 0.7);
        }

        .date-pill__date {
            font-size: 18px;
            font-weight: 600;
        }

        .date-pill__month {
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--muted-strong);
        }

        .schedule__grid {
            display: grid;
            gap: 16px;
        }

        .slot-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 14px;
        }

        .slot-button {
            position: relative;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            background: rgba(0, 0, 0, 0.45);
            padding: 18px;
            display: grid;
            gap: 10px;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .slot-button:not(.slot-button--unavailable):hover {
            transform: translateY(-4px);
            box-shadow: 0 25px 35px -25px rgba(0, 0, 0, 0.9);
        }

        .slot-button--unavailable {
            cursor: not-allowed;
            opacity: 0.45;
        }

        .slot-button--booked {
            border-color: rgba(248, 113, 113, 0.75);
            background: rgba(248, 113, 113, 0.14);
        }

        .slot-button__time {
            font-size: 20px;
            font-weight: 700;
        }

        .slot-button__price {
            font-size: 14px;
            color: var(--muted);
        }

        .slot-button__status {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.12em;
        }

        .schedule__legend {
            display: flex;
            gap: 16px;
            color: var(--muted);
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.12em;
        }

        .legend-dot {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-right: 6px;
        }

        .legend-dot.available { background: var(--accent); }
        .legend-dot.booked { background: var(--danger); }
        .legend-dot.closed { background: var(--muted-strong); }

        .schedule-error {
            display: none;
            padding: 16px 20px;
            border-radius: 16px;
            background: rgba(248, 113, 113, 0.14);
            border: 1px solid rgba(248, 113, 113, 0.35);
            color: var(--danger);
        }

        .schedule-error.is-visible { display: block; }

        .guest-card {
            display: grid;
            gap: 20px;
            background: linear-gradient(135deg, rgba(217, 192, 98, 0.1), rgba(217, 192, 98, 0.02));
            border-radius: 24px;
            padding: 28px;
            border: 1px solid rgba(217, 192, 98, 0.3);
        }

        .guest-card h3 {
            margin: 0;
            font-size: 22px;
        }

        .guest-card__grid {
            display: grid;
            gap: 16px;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        }

        .guest-card__item {
            padding: 18px;
            border-radius: 18px;
            background: rgba(0, 0, 0, 0.45);
            border: 1px solid rgba(217, 192, 98, 0.2);
        }

        .guest-card__item strong {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: rgba(217, 192, 98, 0.9);
        }

        .stories {
            display: grid;
            gap: 24px;
        }

        .stories__list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 18px;
        }

        .story-card {
            border-radius: 24px;
            padding: 24px;
            background: rgba(0, 0, 0, 0.45);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .story-card__meta {
            display: flex;
            justify-content: space-between;
            color: var(--muted);
            font-size: 13px;
            margin-bottom: 12px;
        }

        .story-card__title {
            margin: 0 0 12px;
            font-size: 18px;
            font-weight: 600;
        }

        .story-card__text { color: var(--muted); }

        footer {
            margin-top: 64px;
            text-align: center;
            color: var(--muted-strong);
            font-size: 13px;
        }

        .modal {
            position: fixed;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 32px;
            background: rgba(8, 8, 8, 0.7);
            backdrop-filter: blur(6px);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.25s ease;
            z-index: 100;
        }

        .modal.is-visible {
            opacity: 1;
            pointer-events: auto;
        }

        .modal-dialog {
            width: min(520px, 100%);
            background: var(--card-highlight);
            border-radius: 28px;
            padding: 32px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: var(--shadow);
            position: relative;
        }

        .modal-close {
            position: absolute;
            top: 18px;
            right: 18px;
            border: none;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.35);
            color: var(--text);
            font-size: 20px;
            cursor: pointer;
        }

        .modal h3 {
            margin: 0 0 8px;
            font-size: 26px;
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
            display: grid;
            gap: 8px;
        }

        label {
            font-size: 13px;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        input {
            border-radius: 14px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            background: rgba(0, 0, 0, 0.55);
            color: var(--text);
            padding: 12px 16px;
            font-size: 16px;
        }

        input:focus {
            outline: none;
            border-color: rgba(217, 192, 98, 0.65);
            box-shadow: 0 0 0 4px rgba(217, 192, 98, 0.15);
        }

        .price-hint {
            padding: 12px 16px;
            border-radius: 16px;
            background: rgba(217, 192, 98, 0.08);
            border: 1px solid rgba(217, 192, 98, 0.25);
            color: var(--muted);
            font-size: 14px;
        }

        .error-text {
            font-size: 13px;
            color: var(--danger);
        }

        .submit-button {
            border: none;
            border-radius: 18px;
            padding: 16px 20px;
            background: linear-gradient(135deg, var(--accent), var(--accent-strong));
            color: #1a1405;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .submit-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 30px -18px rgba(217, 192, 98, 0.75);
        }

        @media (max-width: 768px) {
            .hero { padding: 32px 18px 56px; }
            .content { margin-top: -100px; padding: 0 18px 80px; }
            .card { padding: 26px; }
            .slot-grid { grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); }
        }

        @media (max-width: 540px) {
            .hero__meta { gap: 8px; }
            .hero__meta span { padding: 10px 12px; font-size: 12px; }
            .date-pill { min-width: 96px; padding: 12px 14px; }
            .slot-button { padding: 16px; }
        }
    </style>
</head>
<body>
@php
    $backgroundUrl = $quest->background_image ? asset($quest->background_image) : asset('images/quest-default.jpg');
    $weekdayShortLabels = ['вс', 'пн', 'вт', 'ср', 'чт', 'пт', 'сб'];
    $monthShortLabels = ['янв', 'фев', 'мар', 'апр', 'май', 'июн', 'июл', 'авг', 'сен', 'окт', 'ноя', 'дек'];
    $initialDateRaw = old('booking_date', now()->toDateString());
    try {
        $initialDateCarbon = \Illuminate\Support\Carbon::createFromFormat('Y-m-d', $initialDateRaw);
    } catch (\Throwable $exception) {
        $initialDateCarbon = now();
        $initialDateRaw = $initialDateCarbon->toDateString();
    }

    $quest->slots->each(function ($slot) use ($quest) {
        $slot->setRelation('quest', $quest);
    });
@endphp
<div class="page">
    <header class="hero" style="background-image: url('{{ $backgroundUrl }}');">
        <div class="hero__content">
            <a href="{{ url()->previous() ?? route('quests.index') }}" class="hero__breadcrumbs">&larr; Вернуться к квестам</a>
            <h1 class="hero__title">{{ $quest->name }}</h1>
            <div class="hero__meta">
                <span>Жанр: {{ $quest->genreId }}</span>
                <span>Сложность: {{ $quest->difficultyId }}</span>
                <span>Игроки: {{ $quest->players_count }}</span>
                <span>Время: {{ $quest->game_time }}</span>
            </div>
        </div>
    </header>

    <main class="content">
        <div class="deck">
            <article class="card card--highlight">
                @if(session('status'))
                    <div class="status-banner">{{ session('status') }}</div>
                @endif

                @if($errors->any())
                    <div class="error-banner">
                        <strong>Не получилось забронировать слот:</strong>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="details-grid">
                    <section>
                        <h3>Описание</h3>
                        <p>{{ $quest->description }}</p>
                    </section>
                    <section>
                        <h3>Правила</h3>
                        <p>{{ $quest->rules }}</p>
                    </section>
                    <section>
                        <h3>Безопасность</h3>
                        <p>{{ $quest->safety }}</p>
                    </section>
                    <section>
                        <h3>Дополнительно</h3>
                        <p>Услуги: {{ $quest->additional_services }}</p>
                        <p>Дополнительные игроки: {{ $quest->additional_players }}</p>
                        <p>Цена за дополнительного игрока: {{ number_format($quest->price_per_additional_player, 0, '.', ' ') }} ₽</p>
                    </section>
                </div>
            </article>

            <article
                class="card"
                data-schedule-section
            >
                <div
                    class="schedule slot-section"
                    data-weekday-base="{{ $quest->weekday_base_price }}"
                    data-weekend-base="{{ $quest->weekend_base_price }}"
                    data-schedule-endpoint="{{ route('quests.schedule', $quest->id) }}"
                    data-initial-date="{{ $initialDateRaw }}"
                >
                    <div class="schedule__heading">
                        <div>
                            <h2>Расписание</h2>
                            <p class="card__subtitle" data-schedule-heading>{{ $initialDateCarbon->isoFormat('D MMMM, dddd') }}</p>
                        </div>
                        <button type="button" data-open-picker>Выбрать дату</button>
                        <input type="date" id="schedule-date-picker" class="date-picker" value="{{ $initialDateRaw }}" style="position:absolute;left:-9999px;opacity:0;">
                    </div>

                    <div class="date-strip">
                        @foreach($dateOptions as $option)
                            @php
                                $isSelected = $option->isSameDay($initialDateCarbon);
                            @endphp
                            <button
                                type="button"
                                class="date-pill {{ $isSelected ? 'is-selected' : '' }}"
                                data-date-button
                                data-date="{{ $option->toDateString() }}"
                            >
                                <span class="date-pill__weekday">{{ $weekdayShortLabels[$option->dayOfWeek] }}</span>
                                <span class="date-pill__date">{{ $option->format('d') }}</span>
                                <span class="date-pill__month">{{ $monthShortLabels[$option->month - 1] }}</span>
                            </button>
                        @endforeach
                    </div>

                    <div class="schedule__grid">
                        <div class="schedule-error" data-schedule-error>Не удалось загрузить расписание. Попробуйте выбрать дату ещё раз.</div>
                        <div class="slot-grid">
                            @foreach($quest->slots as $slot)
                                @php
                                    $timeFormatted = \Illuminate\Support\Carbon::createFromFormat('H:i:s', $slot->time)->format('H:i');
                                    $priceForInitial = $slot->priceForDate($initialDateCarbon);
                                    $isWeekendInitial = $initialDateCarbon->isWeekend();
                                    $isEnabledInitial = $isWeekendInitial ? $slot->weekend_enabled : $slot->weekday_enabled;
                                @endphp
                                <button
                                    type="button"
                                    class="slot-button {{ $isEnabledInitial ? '' : 'slot-button--unavailable' }}"
                                    data-slot-button
                                    data-slot-id="{{ $slot->id }}"
                                    data-time="{{ $timeFormatted }}"
                                    data-weekday-price="{{ $slot->weekday_price }}"
                                    data-weekend-price="{{ $slot->weekend_price }}"
                                    data-weekday-enabled="{{ $slot->weekday_enabled ? 'true' : 'false' }}"
                                    data-weekend-enabled="{{ $slot->weekend_enabled ? 'true' : 'false' }}"
                                    data-weekday-uses-base-price="{{ $slot->weekday_uses_base_price ? 'true' : 'false' }}"
                                    data-weekend-uses-base-price="{{ $slot->weekend_uses_base_price ? 'true' : 'false' }}"
                                    data-is-discount="{{ $slot->is_discount ? 'true' : 'false' }}"
                                    data-discount-price="{{ $slot->discount_price }}"
                                >
                                    <span class="slot-button__time">{{ $timeFormatted }}</span>
                                    <span class="slot-button__status">{{ $isEnabledInitial ? 'Доступно' : 'Выключено' }}</span>
                                    <span class="slot-button__price">от {{ number_format($priceForInitial, 0, '.', ' ') }} ₽</span>
                                </button>
                            @endforeach
                        </div>
                        <div class="schedule__legend">
                            <span><span class="legend-dot available"></span> свободно</span>
                            <span><span class="legend-dot booked"></span> занято</span>
                            <span><span class="legend-dot closed"></span> недоступно</span>
                        </div>
                    </div>
                </div>
            </article>

            <article class="card guest-card">
                <h3>Карточка гостя</h3>
                <p class="card__subtitle">Мы создадим личный кабинет по номеру телефона, чтобы вы могли управлять бронями.</p>
                <div class="guest-card__grid">
                    <div class="guest-card__item">
                        <strong>Как это работает</strong>
                        <p>Вы выбираете удобное время, оставляете имя и телефон. Мы пришлём доступ в личный кабинет, где можно отслеживать и переносить брони.</p>
                    </div>
                    <div class="guest-card__item">
                        <strong>Контроль оплаты</strong>
                        <p>Стоимость рассчитывается автоматически — будни и выходные учитываются отдельно, а для отдельных слотов можно включить спеццену.</p>
                    </div>
                    <div class="guest-card__item">
                        <strong>Поддержка 24/7</strong>
                        <p>Если планы поменялись, просто позвоните нам. Мы поможем перенести бронь без потери оплаты.</p>
                    </div>
                </div>
            </article>

            @php
                $stories = [
                    ['title' => 'Команда “Сигма” праздновала день рождения', 'text' => 'Подарочный сертификат, персональный ведущий и маскарад — всё в одном квесте.', 'meta' => '12.03.2025'],
                    ['title' => 'Новая акция ко Дню космонавтики', 'text' => 'Скидка 15% на все слоты до 12:00. Используйте промокод SPACE.', 'meta' => '05.04.2025'],
                    ['title' => 'Обновили сценарий “Лабиринта”', 'text' => 'Добавили альтернативную концовку и новые головоломки для опытных команд.', 'meta' => '28.02.2025'],
                ];
            @endphp
            <article class="card stories">
                <div class="schedule__heading">
                    <div>
                        <h2 class="card__title">Новости и акции</h2>
                        <p class="card__subtitle">Следите за обновлениями, чтобы не пропустить бонусы и новые сценарии.</p>
                    </div>
                </div>
                <div class="stories__list">
                    @foreach($stories as $story)
                        <div class="story-card">
                            <div class="story-card__meta">
                                <span>{{ $story['meta'] }}</span>
                                <span>Новости</span>
                            </div>
                            <h3 class="story-card__title">{{ $story['title'] }}</h3>
                            <p class="story-card__text">{{ $story['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </article>
        </div>

        <footer>© {{ date('Y') }} Pandoroom. Все права защищены.</footer>
    </main>
</div>

<div id="booking-modal" class="modal" data-should-open="{{ $errors->any() ? 'true' : 'false' }}">
    <div class="modal-dialog">
        <button class="modal-close" type="button" data-close-modal>&times;</button>
        <h3>Бронирование</h3>
        <p class="modal-subtitle">Выбранный слот: <span id="modal-slot-summary">—</span></p>
        <form method="POST" action="{{ route('quests.book', $quest->id) }}">
            @csrf
            <input type="hidden" name="quest_slot_id" id="modal-slot-id" value="{{ old('quest_slot_id') }}">
            <input type="hidden" name="booking_date" id="modal-booking-date" value="{{ old('booking_date', $initialDateRaw) }}">

            <div class="price-hint" id="modal-price-hint">Выберите время, чтобы увидеть стоимость.</div>

            <div class="form-row">
                <label for="customer_name">Имя гостя</label>
                <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name') }}" required>
            </div>

            <div class="form-row">
                <label for="customer_phone">Номер телефона</label>
                <input type="text" id="customer_phone" name="customer_phone" value="{{ old('customer_phone') }}" required>
            </div>

            <div class="form-row">
                <label for="password">Пароль</label>
                <input type="password" id="password" name="password" required>
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

            slotButtons.forEach((button) => {
                const slotId = button.dataset.slotId;
                const slotData = parseSlotDataset(button.dataset);
                const isWeekend = Boolean(schedule.is_weekend);
                const isEnabled = isWeekend ? slotData.weekendEnabled : slotData.weekdayEnabled;

                button.classList.remove('slot-button--unavailable', 'slot-button--booked');

                if (!isEnabled) {
                    button.classList.add('slot-button--unavailable');
                    button.querySelector('.slot-button__status').textContent = 'Выключено';
                } else if (bookedIds.has(String(slotId))) {
                    button.classList.add('slot-button--booked');
                    button.querySelector('.slot-button__status').textContent = 'Занято';
                } else {
                    button.querySelector('.slot-button__status').textContent = 'Доступно';
                }

                const price = slotData.isDiscount && slotData.discountPrice
                    ? slotData.discountPrice
                    : resolveEffectivePrice(slotData, isWeekend);

                const priceEl = button.querySelector('.slot-button__price');
                if (priceEl) {
                    priceEl.textContent = `от ${formatCurrency(price)}`;
                }
            });
        };

        const fetchSchedule = async (date) => {
            if (!scheduleEndpoint) {
                return null;
            }

            if (scheduleCache.has(date)) {
                return scheduleCache.get(date);
            }

            try {
                const response = await fetch(`${scheduleEndpoint}?date=${encodeURIComponent(date)}`);
                if (!response.ok) {
                    throw new Error('Bad response');
                }

                const data = await response.json();
                scheduleCache.set(date, data);
                return data;
            } catch (error) {
                console.error(error);
                return null;
            }
        };

        const openModalForSlot = (button) => {
            const slotData = parseSlotDataset(button.dataset);
            activeSlot = slotData;

            const summary = `${slotData.time}, ${formatSummaryDate(selectedDate)}`;
            slotSummaryInput.textContent = summary;
            slotIdInput.value = slotData.id;
            bookingDateInput.value = selectedDate;
            priceHint.textContent = computePriceText(slotData);

            modal.classList.add('is-visible');
        };

        const closeModal = () => {
            modal.classList.remove('is-visible');
        };

        slotButtons.forEach((button) => {
            button.addEventListener('click', () => {
                if (button.classList.contains('slot-button--unavailable') || button.classList.contains('slot-button--booked')) {
                    return;
                }

                openModalForSlot(button);
            });
        });

        document.querySelectorAll('[data-close-modal]').forEach((button) => {
            button.addEventListener('click', closeModal);
        });

        modal.addEventListener('click', (event) => {
            if (event.target === modal) {
                closeModal();
            }
        });

        const activateDateButton = (date) => {
            dateButtons.forEach((button) => {
                button.classList.toggle('is-selected', button.dataset.date === date);
            });
        };

        const handleDateChange = async (date) => {
            selectedDate = date;
            activateDateButton(date);
            if (scheduleHeading) {
                scheduleHeading.textContent = formatHeading(date);
            }
            if (bookingDateInput) {
                bookingDateInput.value = date;
            }

            const schedule = await fetchSchedule(date);
            if (!schedule) {
                if (scheduleError) {
                    scheduleError.classList.add('is-visible');
                }
                return;
            }

            if (scheduleError) {
                scheduleError.classList.remove('is-visible');
            }
            applySchedule(schedule);
            priceHint.textContent = computePriceText(activeSlot);
        };

        dateButtons.forEach((button) => {
            button.addEventListener('click', () => handleDateChange(button.dataset.date));
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
            datePicker.addEventListener('change', (event) => {
                if (!event.target.value) {
                    return;
                }
                handleDateChange(event.target.value);
            });
        }

        if (initialSlotId) {
            const matchedButton = slotButtons.find((button) => Number(button.dataset.slotId) === Number(initialSlotId));
            if (matchedButton) {
                activeSlot = parseSlotDataset(matchedButton.dataset);
                slotSummaryInput.textContent = `${activeSlot.time}, ${formatSummaryDate(selectedDate)}`;
                priceHint.textContent = computePriceText(activeSlot);
                if (shouldRestoreModal) {
                    modal.classList.add('is-visible');
                }
            }
        }

        if (initialDate) {
            handleDateChange(initialDate);
        }
    });
</script>
</body>
</html>
