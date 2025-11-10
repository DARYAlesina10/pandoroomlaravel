@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div>
            <h1 class="h3 mb-1">Столы</h1>
            <p class="text-muted mb-0">Создавайте и настраивайте столы для дополнительных услуг и банкетов.</p>
        </div>
        <a href="{{ route('admin.tables.schedule') }}" class="btn btn-outline-secondary">Расписание столов</a>
    </div>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <h2 class="h5 mb-3">Добавить стол</h2>
            <form method="POST" action="{{ route('admin.tables.store') }}" class="row g-3">
                @csrf
                <div class="col-md-3">
                    <label for="table-hall" class="form-label">Зал</label>
                    <select id="table-hall" name="venue_hall_id" class="form-select" required>
                        <option value="" disabled selected>Выберите зал</option>
                        @foreach ($halls as $hall)
                            <option value="{{ $hall->id }}" {{ old('venue_hall_id') == $hall->id ? 'selected' : '' }}>{{ $hall->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="table-name" class="form-label">Название</label>
                    <input type="text" id="table-name" name="name" value="{{ old('name') }}" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Мин. гостей</label>
                    <input type="number" name="min_capacity" value="{{ old('min_capacity', 2) }}" min="1" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Макс. гостей</label>
                    <input type="number" name="max_capacity" value="{{ old('max_capacity', 8) }}" min="1" class="form-control" required>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_active" id="table-active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="table-active">Активен</label>
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label" for="table-services">Дополнительные услуги (через запятую)</label>
                    <textarea id="table-services" name="services" rows="2" class="form-control" placeholder="Например: торт, сервировка, аниматор">{{ old('services') }}</textarea>
                </div>
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary">Добавить стол</button>
                </div>
            </form>
        </div>
    </div>

    @if ($tables->isEmpty())
        <div class="alert alert-info mb-0">Пока не добавлено ни одного стола. Создайте первый, чтобы начать бронировать дополнительные услуги.</div>
    @else
        <div class="table-responsive shadow-sm border rounded">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Стол</th>
                        <th>Зал</th>
                        <th>Вместимость</th>
                        <th>Услуги</th>
                        <th>Статус</th>
                        <th class="text-end">Действия</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($tables as $table)
                    <tr>
                        <td class="fw-semibold">{{ $table->name }}</td>
                        <td>{{ optional($table->hall)->name ?? '—' }}</td>
                        <td>{{ $table->min_capacity }} – {{ $table->max_capacity }} гостей</td>
                        <td>
                            @if ($table->services)
                                <div class="d-flex flex-wrap gap-1">
                                    @foreach ($table->services as $service)
                                        <span class="badge bg-light text-dark">{{ $service }}</span>
                                    @endforeach
                                </div>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td>
                            @if ($table->is_active)
                                <span class="badge bg-success">Активен</span>
                            @else
                                <span class="badge bg-secondary">Скрыт</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <div class="d-flex flex-wrap justify-content-end gap-2">
                                <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#table-edit-{{ $table->id }}">Редактировать</button>
                                <form method="POST" action="{{ route('admin.tables.destroy', $table) }}" onsubmit="return confirm('Удалить стол «{{ $table->name }}»?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Удалить</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr class="collapse" id="table-edit-{{ $table->id }}">
                        <td colspan="6">
                            <form method="POST" action="{{ route('admin.tables.update', $table) }}" class="row g-3 align-items-end">
                                @csrf
                                @method('PUT')
                                <div class="col-md-3">
                                    <label class="form-label">Зал</label>
                                    <select name="venue_hall_id" class="form-select" required>
                                        @foreach ($halls as $hall)
                                            <option value="{{ $hall->id }}" {{ $hall->id === $table->venue_hall_id ? 'selected' : '' }}>{{ $hall->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Название</label>
                                    <input type="text" name="name" class="form-control" value="{{ $table->name }}" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Мин. гости</label>
                                    <input type="number" name="min_capacity" class="form-control" min="1" value="{{ $table->min_capacity }}" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Макс. гости</label>
                                    <input type="number" name="max_capacity" class="form-control" min="1" value="{{ $table->max_capacity }}" required>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-check form-switch mt-4">
                                        <input class="form-check-input" type="checkbox" name="is_active" value="1" id="table-active-{{ $table->id }}" {{ $table->is_active ? 'checked' : '' }}>
                                        <label class="form-check-label" for="table-active-{{ $table->id }}">Активен</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Дополнительные услуги (через запятую)</label>
                                    <textarea name="services" rows="2" class="form-control">{{ $table->services ? implode(', ', $table->services) : '' }}</textarea>
                                </div>
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
