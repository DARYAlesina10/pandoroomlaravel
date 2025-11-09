
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $quest->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: #f5f5f5;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            background: #fff;
            border-radius: 12px;
            padding: 24px 32px;
            box-shadow: 0 10px 35px rgba(31, 41, 55, 0.12);
        }

        h1 {
            margin-top: 0;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 16px;
        }

        .card {
            padding: 16px;
            background: #f9fafb;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
        }

        .status {
            padding: 12px 16px;
            background: #dcfce7;
            border: 1px solid #15803d;
            color: #166534;
            border-radius: 8px;
            margin-bottom: 16px;
        }

        .errors {
            padding: 12px 16px;
            background: #fee2e2;
            border: 1px solid #ef4444;
            color: #991b1b;
            border-radius: 8px;
            margin-bottom: 16px;
        }

        form {
            margin-top: 24px;
            display: grid;
            gap: 12px;
        }

        label {
            font-weight: bold;
        }

        input, select, button {
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            font-size: 14px;
        }

        button {
            background: #2563eb;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background 0.2s ease-in-out;
        }

        button:hover {
            background: #1d4ed8;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }

        table th, table td {
            padding: 10px 12px;
            border-bottom: 1px solid #e5e7eb;
        }

        table th {
            text-align: left;
            background: #f3f4f6;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>{{ $quest->name }}</h1>

    @if(session('status'))
        <div class="status">{{ session('status') }}</div>
    @endif

    @if($errors->any())
        <div class="errors">
            <strong>Ошибка бронирования:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid">
        <div class="card">
            <p><strong>Жанр:</strong> {{ $quest->genreId }}</p>
            <p><strong>Сложность:</strong> {{ $quest->difficultyId }}</p>
            <p><strong>Количество игроков:</strong> {{ $quest->players_count }}</p>
            <p><strong>Время игры:</strong> {{ $quest->game_time }}</p>
        </div>
        <div class="card">
            <p><strong>Дополнительные услуги:</strong> {{ $quest->additional_services }}</p>
            <p><strong>Дополнительные игроки:</strong> {{ $quest->additional_players }}</p>
            <p><strong>Цена за дополнительного игрока:</strong> {{ $quest->price_per_additional_player }}</p>
        </div>
    </div>

    <div class="card" style="margin-top: 20px;">
        <h2>Описание</h2>
        <p>{{ $quest->description }}</p>
        <h3>Правила</h3>
        <p>{{ $quest->rules }}</p>
        <h3>Безопасность</h3>
        <p>{{ $quest->safety }}</p>
    </div>

    <div class="card" style="margin-top: 20px;">
        <h2>Свободные слоты</h2>
        @if($quest->slots->isEmpty())
            <p>Для этого квеста пока нет доступных слотов.</p>
        @else
            <form action="{{ route('quests.book', ['id' => $quest->id]) }}" method="POST">
                @csrf
                <div>
                    <label for="booking_date">Дата бронирования</label>
                    <input type="date" id="booking_date" name="booking_date" value="{{ old('booking_date') }}" required>
                </div>
                <div>
                    <label for="quest_slot_id">Время</label>
                    <select id="quest_slot_id" name="quest_slot_id" required>
                        <option value="" disabled {{ old('quest_slot_id') ? '' : 'selected' }}>Выберите время</option>
                        @foreach($quest->slots as $slot)
                            <option value="{{ $slot->id }}" {{ (int) old('quest_slot_id') === $slot->id ? 'selected' : '' }}>
                                {{ \Illuminate\Support\Carbon::createFromFormat('H:i:s', $slot->time)->format('H:i') }} · будни: {{ number_format($slot->weekday_price, 0, '.', ' ') }} ₽ · выходные: {{ number_format($slot->weekend_price, 0, '.', ' ') }} ₽
                                @if($slot->is_discount && $slot->discount_price)
                                    · скидка: {{ number_format($slot->discount_price, 0, '.', ' ') }} ₽
                                @endif
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="customer_name">Имя</label>
                    <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name') }}" required>
                </div>
                <div>
                    <label for="customer_phone">Телефон</label>
                    <input type="text" id="customer_phone" name="customer_phone" value="{{ old('customer_phone') }}" required>
                </div>
                <button type="submit">Забронировать слот</button>
            </form>
        @endif
    </div>

    <div class="card" style="margin-top: 20px;">
        <h2>Ближайшие бронирования</h2>
        @if($upcomingBookings->isEmpty())
            <p>Пока нет ни одного бронирования.</p>
        @else
            <table>
                <thead>
                <tr>
                    <th>Дата</th>
                    <th>Время</th>
                    <th>Клиент</th>
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
                        <td>{{ $booking->customer_phone }}</td>
                        <td>{{ number_format($booking->price, 0, '.', ' ') }} ₽</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
</body>
</html>
