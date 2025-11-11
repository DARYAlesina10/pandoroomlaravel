<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Страницы сайта</title>
    <style>
        :root {
            --bg: #f4f5f7;
            --panel: #ffffff;
            --accent: #d9c062;
            --text: #111827;
            --muted: #6b7280;
            --border: rgba(209, 213, 219, 0.6);
            --shadow: 0 22px 46px -28px rgba(15, 23, 42, 0.45);
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(160deg, #edf1f7 0%, #f9fafc 50%, #f4f5f7 100%);
            color: var(--text);
        }

        .page {
            max-width: 1200px;
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

        .actions {
            display: flex;
            gap: 12px;
        }

        .actions a {
            padding: 12px 20px;
            border-radius: 16px;
            text-decoration: none;
            font-weight: 600;
        }

        .actions a.primary {
            background: var(--accent);
            color: #fff;
            box-shadow: 0 18px 36px -24px rgba(201, 155, 32, 0.55);
        }

        .actions a.secondary {
            background: rgba(0, 0, 0, 0.05);
            color: var(--text);
        }

        .panel {
            background: var(--panel);
            border-radius: 24px;
            padding: 28px;
            box-shadow: var(--shadow);
            border: 1px solid var(--border);
            display: grid;
            gap: 18px;
        }

        .panel h2 {
            margin: 0;
            font-size: 22px;
        }

        .panel p {
            margin: 0;
            color: var(--muted);
            line-height: 1.6;
        }

        .page-list {
            display: grid;
            gap: 12px;
        }

        .page-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 18px;
            border: 1px solid var(--border);
            border-radius: 18px;
            background: rgba(249, 250, 251, 0.75);
        }

        .page-item strong {
            font-size: 16px;
        }

        .page-item span {
            color: var(--muted);
            font-size: 14px;
        }

        .empty-state {
            padding: 20px;
            border-radius: 18px;
            background: rgba(15, 23, 42, 0.04);
            color: var(--muted);
        }

        @media (max-width: 768px) {
            .page {
                padding: 32px 20px 80px;
            }

            .page-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 6px;
            }
        }
    </style>
</head>
<body>
<div class="page">
    <div class="page-header">
        <div>
            <span>Всего шаблонов: {{ $availablePages->count() }}</span>
            <h1>Страницы сайта</h1>
        </div>
        <div class="actions">
            <a href="{{ route('admin.dashboard') }}" class="secondary">← В панель</a>
            <a href="#" class="primary">Создать страницу</a>
        </div>
    </div>

    <div class="panel">
        <h2>Готовые шаблоны</h2>
        <p>Эти blade-шаблоны уже находятся в проекте. Используйте их как основу для новых страниц или продублируйте при помощи вашего IDE.</p>
        <div class="page-list">
            @forelse($availablePages as $page)
                <div class="page-item">
                    <strong>{{ $page['name'] }}</strong>
                    <span>{{ $page['path'] }}</span>
                </div>
            @empty
                <div class="empty-state">Шаблоны не найдены. Добавьте файлы в директорию <code>resources/views</code>.</div>
            @endforelse
        </div>
    </div>
</div>
</body>
</html>
