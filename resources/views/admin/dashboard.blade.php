<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Административная панель</title>
    <style>
        :root {
            --background: linear-gradient(160deg, #f4f5f7 0%, #ffffff 45%, #f1f5f9 100%);
            --card: #ffffff;
            --accent: #d9c062;
            --accent-dark: #c0a445;
            --text: #171717;
            --muted: #6b7280;
            --border: rgba(209, 213, 219, 0.6);
            --shadow: 0 25px 50px -20px rgba(15, 23, 42, 0.35);
            --success: #3b8c66;
            --info: #1d4ed8;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: var(--background);
            color: var(--text);
            min-height: 100vh;
        }

        a {
            color: inherit;
        }

        .dashboard {
            max-width: 1360px;
            margin: 0 auto;
            padding: 56px 40px 96px;
            display: grid;
            gap: 40px;
        }

        header {
            display: grid;
            gap: 20px;
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            flex-wrap: wrap;
            gap: 18px;
        }

        .header-meta {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        h1 {
            margin: 0;
            font-size: clamp(36px, 4vw, 54px);
            letter-spacing: -0.02em;
        }

        .header-meta span {
            font-size: 15px;
            color: var(--muted);
        }

        .header-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .primary-button,
        .secondary-button {
            padding: 14px 22px;
            border-radius: 16px;
            text-decoration: none;
            font-weight: 600;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .primary-button {
            background: var(--accent);
            color: #fff;
            box-shadow: 0 12px 24px -12px rgba(201, 155, 32, 0.55);
        }

        .primary-button:hover {
            background: var(--accent-dark);
            transform: translateY(-2px);
        }

        .secondary-button {
            background: rgba(0, 0, 0, 0.05);
            color: var(--text);
        }

        .secondary-button:hover {
            transform: translateY(-2px);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .stat-card {
            background: var(--card);
            border-radius: 28px;
            padding: 28px;
            box-shadow: var(--shadow);
            border: 1px solid var(--border);
            display: grid;
            gap: 14px;
        }

        .stat-title {
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--muted);
        }

        .stat-value {
            font-size: 36px;
            font-weight: 700;
        }

        .stat-footer {
            font-size: 14px;
            color: var(--muted);
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 24px;
        }

        .action-card {
            background: var(--card);
            border-radius: 28px;
            padding: 28px;
            box-shadow: var(--shadow);
            border: 1px solid var(--border);
            display: grid;
            gap: 16px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .action-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 32px 60px -30px rgba(15, 23, 42, 0.55);
        }

        .action-title {
            margin: 0;
            font-size: 20px;
        }

        .action-description {
            margin: 0;
            color: var(--muted);
            font-size: 15px;
            line-height: 1.5;
        }

        .action-card a {
            justify-self: flex-start;
            padding: 12px 20px;
            border-radius: 14px;
            background: rgba(217, 192, 98, 0.12);
            text-decoration: none;
            font-weight: 600;
            color: var(--accent-dark);
        }

        .action-card a:hover {
            background: rgba(217, 192, 98, 0.22);
        }

        .upcoming-bookings {
            background: var(--card);
            border-radius: 28px;
            padding: 28px;
            box-shadow: var(--shadow);
            border: 1px solid var(--border);
            display: grid;
            gap: 18px;
        }

        .upcoming-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .upcoming-header h2 {
            margin: 0;
            font-size: 22px;
        }

        .upcoming-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 20px;
        }

        .upcoming-list {
            display: grid;
            gap: 16px;
        }

        .upcoming-list h3 {
            margin: 0;
            font-size: 16px;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .booking-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 18px;
            border-radius: 18px;
            border: 1px solid rgba(209, 213, 219, 0.6);
            background: rgba(249, 250, 251, 0.7);
            gap: 16px;
        }

        .booking-meta {
            display: grid;
            gap: 4px;
        }

        .booking-meta strong {
            font-size: 16px;
        }

        .booking-meta span {
            font-size: 14px;
            color: var(--muted);
        }

        .booking-date {
            font-size: 15px;
            font-weight: 600;
            color: var(--info);
        }

        .empty-state {
            padding: 24px;
            border-radius: 20px;
            background: rgba(15, 23, 42, 0.03);
            color: var(--muted);
            text-align: center;
        }

        @media (max-width: 768px) {
            .dashboard {
                padding: 32px 20px 64px;
            }

            .actions-grid,
            .stats-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            }

            .booking-row {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
<div class="dashboard">
    <header>
        <div class="header-top">
            <div class="header-meta">
                <span>Обновлено {{ $today->translatedFormat('d F Y') }}</span>
                <h1>Административная панель Pandoroom</h1>
            </div>
            <div class="header-actions">
                <a href="{{ route('admin.schedule.overview') }}" class="primary-button">Управление расписанием</a>
                <a href="{{ route('admin.bookings') }}" class="secondary-button">Смотреть брони</a>
            </div>
        </div>
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-title">Активные квесты</div>
                <div class="stat-value">{{ $questCount }}</div>
                <div class="stat-footer">Количество опубликованных сценариев</div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Грядущие бронирования</div>
                <div class="stat-value">{{ $bookingCount }}</div>
                <div class="stat-footer">На ближайшие даты от сегодняшнего дня</div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Пользователи</div>
                <div class="stat-value">{{ $userCount }}</div>
                <div class="stat-footer">Все зарегистрированные гости и администраторы</div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Брони столов</div>
                <div class="stat-value">{{ $tableBookingCount }}</div>
                <div class="stat-footer">Предстоящие мероприятия с размещением гостей</div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Доступные столы</div>
                <div class="stat-value">{{ $tableCount }}</div>
                <div class="stat-footer">В каталоге административной панели</div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Залы</div>
                <div class="stat-value">{{ $hallCount }}</div>
                <div class="stat-footer">Оборудованные площадки для проведения</div>
            </div>
        </div>
    </header>

    <section class="actions-grid">
        <div class="action-card">
            <h2 class="action-title">Администрирование квестов</h2>
            <p class="action-description">Создавайте новые сценарии, обновляйте описания и управляемые тарифы, добавляйте изображения и расписание.</p>
            <a href="{{ route('admin.quests') }}">Перейти к квестам</a>
        </div>
        <div class="action-card">
            <h2 class="action-title">Просмотр бронирований</h2>
            <p class="action-description">Следите за расписанием на ближайшие две недели, просматривайте детали броней и управляйте оплатами.</p>
            <a href="{{ route('admin.bookings') }}">Открыть календарь</a>
        </div>
        <div class="action-card">
            <h2 class="action-title">Управление пользователями</h2>
            <p class="action-description">Просматривайте гостей, их контактные данные и роли, помогайте восстановить доступ к личному кабинету.</p>
            <a href="{{ route('admin.users') }}">Список пользователей</a>
        </div>
        <div class="action-card">
            <h2 class="action-title">Новые страницы сайта</h2>
            <p class="action-description">Создавайте промо-страницы, обновляйте лэндинги и контролируйте структуру сайта Pandoroom.</p>
            <a href="{{ route('admin.pages') }}">Перейти в редактор</a>
        </div>
        <div class="action-card">
            <h2 class="action-title">Расписание по дням</h2>
            <p class="action-description">Отслеживайте все квесты в одном месте и моментально бронируйте свободные временные слоты.</p>
            <a href="{{ route('admin.schedule.overview') }}">Открыть сетку</a>
        </div>
        <div class="action-card">
            <h2 class="action-title">Быстрое добавление администратора</h2>
            <p class="action-description">Создайте доступ для нового менеджера без выхода из панели управления.</p>
            <a href="{{ url('/admin/register') }}">Добавить администратора</a>
        </div>
        <div class="action-card">
            <h2 class="action-title">Залы и столы</h2>
            <p class="action-description">Создавайте залы, настраивайте столы и отмечайте дополнительные услуги для праздников.</p>
            <a href="{{ route('admin.halls') }}">Перейти к залам</a>
        </div>
        <div class="action-card">
            <h2 class="action-title">Расписание столов</h2>
            <p class="action-description">Бронируйте столы с шагом в 30 минут и сразу связывайте их с подходящими квестами.</p>
            <a href="{{ route('admin.tables.schedule') }}">Планировать столы</a>
        </div>
        <div class="action-card">
            <h2 class="action-title">Мануалы и регламенты</h2>
            <p class="action-description">Под рукой инструкции по всем разделам панели: расписаниям, столам, клиентам.</p>
            <a href="{{ route('admin.manuals') }}">Открыть мануалы</a>
        </div>
    </section>

    <section class="upcoming-bookings">
        <div class="upcoming-header">
            <h2>Ближайшие события</h2>
            <a href="{{ route('admin.bookings') }}" class="secondary-button">Полный список</a>
        </div>

    <div class="upcoming-grid">
        <div class="upcoming-list">
            <h3>Квесты</h3>
            @if($upcomingBookings->isEmpty())
                <div class="empty-state">Пока нет будущих квестов — создайте бронь в расписании.</div>
            @else
                @foreach($upcomingBookings as $booking)
                    @php
                        $slotTime = optional($booking->slot)->time
                            ? \Illuminate\Support\Carbon::createFromFormat('H:i:s', $booking->slot->time)->format('H:i')
                            : '—';
                    @endphp
                    <div class="booking-row">
                        <div class="booking-meta">
                            <strong>{{ $booking->customer_name }}</strong>
                            <span>{{ optional($booking->quest)->name ?? 'Без названия' }} · {{ $slotTime }}</span>
                        </div>
                        <div class="booking-date">{{ $booking->booking_date->translatedFormat('d F, H:i') }}</div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="upcoming-list">
            <h3>Столы</h3>
            @if($upcomingTableBookings->isEmpty())
                <div class="empty-state">Расписание столов свободно — забронируйте места для гостей.</div>
            @else
                @foreach($upcomingTableBookings as $booking)
                    @php
                        $startTime = \Illuminate\Support\Carbon::createFromFormat('H:i:s', $booking->start_time)->format('H:i');
                        $endTime = \Illuminate\Support\Carbon::createFromFormat('H:i:s', $booking->end_time)->format('H:i');
                    @endphp
                    <div class="booking-row">
                        <div class="booking-meta">
                            <strong>{{ $booking->customer_name }}</strong>
                            <span>{{ optional($booking->table)->name ?? 'Стол' }} · {{ $startTime }} – {{ $endTime }}</span>
                            @if ($booking->questBooking)
                                <span>Квест: {{ optional($booking->questBooking->quest)->name }}</span>
                            @endif
                        </div>
                        <div class="booking-date">{{ $booking->booking_date->translatedFormat('d F, H:i') }}</div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    </section>
</div>
</body>
</html>
