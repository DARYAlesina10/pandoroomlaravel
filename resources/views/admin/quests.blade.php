@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div>
            <h1 class="h3 mb-1">Квесты</h1>
            <p class="text-muted mb-0">Управляйте сценариями, расписанием и ценами в одном месте.</p>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('admin.schedule.overview') }}" class="btn btn-outline-secondary">Общий календарь</a>
            <a href="{{ route('admin.create') }}" class="btn btn-primary">Добавить квест</a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($quests->isEmpty())
        <div class="alert alert-info mb-0">
            Пока нет ни одного квеста. Нажмите «Добавить квест», чтобы создать первый сценарий и настроить расписание.
        </div>
    @else
        <div class="table-responsive shadow-sm border rounded">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="text-uppercase small text-muted">Название</th>
                        <th class="text-uppercase small text-muted">Игроки</th>
                        <th class="text-uppercase small text-muted">Длительность</th>
                        <th class="text-uppercase small text-muted">Цены</th>
                        <th class="text-uppercase small text-muted">Слоты</th>
                        <th class="text-uppercase small text-muted text-end">Действия</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($quests as $quest)
                    <tr>
                        <td>
                            <strong>{{ $quest->name }}</strong>
                            <div class="text-muted small">ID {{ $quest->id }}</div>
                        </td>
                        <td>
                            {{ $quest->players_count ?? '—' }}
                            <div class="text-muted small">участников</div>
                        </td>
                        <td>
                            {{ $quest->game_time ?? '—' }}
                        </td>
                        <td>
                            <div class="small text-muted">Будни</div>
                            <div class="fw-semibold">{{ $quest->weekday_base_price !== null ? number_format($quest->weekday_base_price, 0, '.', ' ') . ' ₽' : '—' }}</div>
                            <div class="small text-muted mt-2">Выходные</div>
                            <div class="fw-semibold">{{ $quest->weekend_base_price !== null ? number_format($quest->weekend_base_price, 0, '.', ' ') . ' ₽' : '—' }}</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark">{{ $quest->slots_count }}</span>
                            <div class="text-muted small">временных слотов</div>
                        </td>
                        <td class="text-end">
                            <div class="d-flex flex-wrap justify-content-end gap-2">
                                <a href="{{ route('quests.show', $quest->id) }}" class="btn btn-sm btn-outline-secondary" target="_blank">Открыть на сайте</a>
                                <a href="{{ route('admin.edit', $quest->id) }}" class="btn btn-sm btn-outline-primary">Редактировать</a>
                                <a href="{{ route('admin.quests.schedule', $quest->id) }}" class="btn btn-sm btn-primary">Расписание</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
