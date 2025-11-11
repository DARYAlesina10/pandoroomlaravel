@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div>
            <h1 class="h3 mb-1">Залы</h1>
            <p class="text-muted mb-0">Управляйте площадками, к которым можно привязывать столы и брони.</p>
        </div>
    </div>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <h2 class="h5 mb-3">Добавить зал</h2>
            <form method="POST" action="{{ route('admin.halls.store') }}" class="row g-3">
                @csrf
                <div class="col-md-5">
                    <label for="hall-name" class="form-label">Название</label>
                    <input type="text" id="hall-name" name="name" value="{{ old('name') }}" class="form-control" required>
                </div>
                <div class="col-md-5">
                    <label for="hall-description" class="form-label">Описание</label>
                    <input type="text" id="hall-description" name="description" value="{{ old('description') }}" class="form-control">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Создать</button>
                </div>
            </form>
        </div>
    </div>

    @if ($halls->isEmpty())
        <div class="alert alert-info mb-0">Пока нет созданных залов. Добавьте первый, чтобы привязывать к нему столы.</div>
    @else
        <div class="table-responsive shadow-sm border rounded">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Зал</th>
                        <th>Описание</th>
                        <th>Столы</th>
                        <th class="text-end">Действия</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($halls as $hall)
                    <tr>
                        <td class="fw-semibold">{{ $hall->name }}</td>
                        <td>{{ $hall->description ?? '—' }}</td>
                        <td>
                            <span class="badge bg-light text-dark">{{ $hall->tables_count }}</span>
                        </td>
                        <td class="text-end">
                            <div class="d-flex flex-wrap justify-content-end gap-2">
                                <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#hall-edit-{{ $hall->id }}">Редактировать</button>
                                <form method="POST" action="{{ route('admin.halls.destroy', $hall) }}" onsubmit="return confirm('Удалить зал «{{ $hall->name }}»? Все связанные столы тоже будут удалены.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Удалить</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr class="collapse" id="hall-edit-{{ $hall->id }}">
                        <td colspan="4">
                            <form method="POST" action="{{ route('admin.halls.update', $hall) }}" class="row g-3 align-items-end">
                                @csrf
                                @method('PUT')
                                <div class="col-md-5">
                                    <label class="form-label">Название</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', $hall->name) }}" required>
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label">Описание</label>
                                    <input type="text" name="description" class="form-control" value="{{ old('description', $hall->description) }}">
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary w-100">Сохранить</button>
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
