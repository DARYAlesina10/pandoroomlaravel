<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Ближайшие бронирования</title>
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #0f172a;
            color: #f8fafc;
            margin: 0;
            padding: 32px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h1 {
            margin-bottom: 24px;
            font-size: 28px;
        }

        a.back-link {
            display: inline-block;
            margin-bottom: 24px;
            color: #38bdf8;
            text-decoration: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(15, 23, 42, 0.95);
            border-radius: 16px;
            overflow: hidden;
        }

        th, td {
            padding: 16px 20px;
            border-bottom: 1px solid rgba(148, 163, 184, 0.2);
            text-align: left;
        }

        th {
            font-size: 13px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #94a3b8;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .sort-link {
            color: inherit;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .sort-indicator {
            font-size: 12px;
            opacity: 0.6;
        }

        .empty {
            padding: 24px;
            background: rgba(148, 163, 184, 0.12);
            border-radius: 16px;
            margin-top: 16px;
            color: #94a3b8;
        }

        .pagination {
            display: flex;
            gap: 12px;
            margin-top: 24px;
        }

        .pagination a,
        .pagination span {
            padding: 8px 12px;
            border-radius: 8px;
            text-decoration: none;
            color: #f8fafc;
            background: rgba(148, 163, 184, 0.18);
        }

        .pagination .active {
            background: #38bdf8;
        }
    </style>
</head>
<body>
<div class="container">
    <a href="{{ route('admin.quests') }}" class="back-link">&larr; Назад к квестам</a>
    <h1>Ближайшие бронирования</h1>

    @if($bookings->isEmpty())
        <div class="empty">Пока нет будущих бронирований.</div>
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
                    <td>{{ $booking->booking_date->format('d.m.Y') }}</td>
                    <td>{{ optional($booking->slot)->time ? \Illuminate\Support\Carbon::createFromFormat('H:i:s', $booking->slot->time)->format('H:i') : '—' }}</td>
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
</div>
</body>
</html>
