<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Пользователи Pandoroom</title>
    <style>
        :root {
            --bg: #f4f5f7;
            --panel: #ffffff;
            --accent: #d9c062;
            --text: #111827;
            --muted: #6b7280;
            --border: rgba(209, 213, 219, 0.6);
            --shadow: 0 22px 40px -28px rgba(15, 23, 42, 0.45);
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(160deg, #edf1f7 0%, #f9fafc 50%, #f4f5f7 100%);
            color: var(--text);
        }

        a { color: inherit; }

        .page {
            max-width: 1200px;
            margin: 0 auto;
            padding: 48px 40px 96px;
            display: grid;
            gap: 28px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            flex-wrap: wrap;
            gap: 16px;
        }

        .page-header h1 {
            margin: 0;
            font-size: clamp(32px, 4vw, 48px);
            letter-spacing: -0.02em;
        }

        .page-header span {
            color: var(--muted);
            font-size: 15px;
        }

        .actions a {
            padding: 12px 20px;
            border-radius: 16px;
            background: var(--accent);
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 18px 36px -24px rgba(201, 155, 32, 0.55);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: var(--panel);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        th, td {
            padding: 18px 20px;
            text-align: left;
            border-bottom: 1px solid var(--border);
        }

        th {
            background: rgba(17, 24, 39, 0.04);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            font-size: 13px;
            color: var(--muted);
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .role-badge {
            display: inline-flex;
            padding: 6px 12px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 600;
            background: rgba(217, 192, 98, 0.12);
            color: var(--accent);
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 12px;
            align-items: center;
        }

        .pagination span,
        .pagination a {
            padding: 8px 12px;
            border-radius: 12px;
            border: 1px solid transparent;
            text-decoration: none;
            font-weight: 500;
            color: var(--muted);
        }

        .pagination .active {
            border-color: var(--accent);
            color: var(--accent);
        }

        @media (max-width: 768px) {
            .page {
                padding: 32px 20px 80px;
            }

            table {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
<div class="page">
    <div class="page-header">
        <div>
            <span>Всего {{ $users->total() }} пользователей</span>
            <h1>Управление пользователями</h1>
        </div>
        <div class="actions">
            <a href="{{ route('admin.dashboard') }}">← В панель</a>
        </div>
    </div>

    <table>
        <thead>
        <tr>
            <th>Имя</th>
            <th>Телефон</th>
            <th>Email</th>
            <th>Роль</th>
            <th>Зарегистрирован</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->phone ?? '—' }}</td>
                <td>{{ $user->email }}</td>
                <td><span class="role-badge">{{ $user->role ?? 'user' }}</span></td>
                <td>{{ optional($user->created_at)->format('d.m.Y H:i') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Пользователей пока нет.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    @if($users->hasPages())
        <div class="pagination">
            {{ $users->links() }}
        </div>
    @endif
</div>
</body>
</html>
