@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Расписание квеста «{{ $quest->name }}»</h1>

    <div class="mb-3">
        <a href="{{ route('admin.edit', $quest->id) }}" class="btn btn-link">&larr; Вернуться к редактированию квеста</a>
    </div>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="card mb-4">
        <div class="card-body">
            <h2 class="card-title h4">Базовые цены</h2>
            <form method="POST" action="{{ route('admin.quests.schedule.pricing', $quest->id) }}" class="row g-3 align-items-end">
                @csrf
                @method('PUT')
                <div class="col-md-4">
                    <label for="weekday_base_price" class="form-label">Будние дни</label>
                    <input
                        type="number"
                        step="0.01"
                        min="0"
                        name="weekday_base_price"
                        id="weekday_base_price"
                        value="{{ old('weekday_base_price', $quest->weekday_base_price) }}"
                        class="form-control"
                        required
                    >
                </div>
                <div class="col-md-4">
                    <label for="weekend_base_price" class="form-label">Выходные дни</label>
                    <input
                        type="number"
                        step="0.01"
                        min="0"
                        name="weekend_base_price"
                        id="weekend_base_price"
                        value="{{ old('weekend_base_price', $quest->weekend_base_price) }}"
                        class="form-control"
                        required
                    >
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary w-100">Сохранить базовые цены</button>
                </div>
            </form>
        </div>
    </section>

    <section class="card mb-4">
        <div class="card-body">
            <h2 class="card-title h4">Добавить слот</h2>
            <form method="POST" action="{{ route('admin.quests.slots.store', $quest->id) }}" class="row gy-2 gx-3 align-items-center">
                @csrf
                <div class="col-sm-3 col-lg-2">
                    <label for="new-slot-time" class="form-label mb-1">Время</label>
                    <input
                        type="time"
                        class="form-control form-control-sm"
                        id="new-slot-time"
                        name="time"
                        value="{{ old('time') }}"
                        required
                    >
                </div>
                <div class="col-sm-4 col-lg-3">
                    <label class="form-label mb-1" for="new-slot-weekday-price">Будние дни</label>
                    <div class="d-flex flex-wrap gap-3 mb-2">
                        <div class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox" value="1" id="new-slot-weekday" name="weekday_enabled" {{ old('weekday_enabled', true) ? 'checked' : '' }}>
                            <label class="form-check-label small" for="new-slot-weekday">Включено</label>
                        </div>
                        <div class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox" value="1" id="new-slot-weekday-base" name="weekday_uses_base_price" data-target="new-slot-weekday-price" data-base-value="{{ $quest->weekday_base_price }}" {{ old('weekday_uses_base_price', true) ? 'checked' : '' }}>
                            <label class="form-check-label small" for="new-slot-weekday-base">Базовая цена</label>
                        </div>
                    </div>
                    <input
                        type="number"
                        step="0.01"
                        min="0"
                        class="form-control form-control-sm"
                        id="new-slot-weekday-price"
                        name="weekday_price"
                        value="{{ old('weekday_price', $quest->weekday_base_price) }}"
                    >
                </div>
                <div class="col-sm-4 col-lg-3">
                    <label class="form-label mb-1" for="new-slot-weekend-price">Выходные дни</label>
                    <div class="d-flex flex-wrap gap-3 mb-2">
                        <div class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox" value="1" id="new-slot-weekend" name="weekend_enabled" {{ old('weekend_enabled') ? 'checked' : '' }}>
                            <label class="form-check-label small" for="new-slot-weekend">Включено</label>
                        </div>
                        <div class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox" value="1" id="new-slot-weekend-base" name="weekend_uses_base_price" data-target="new-slot-weekend-price" data-base-value="{{ $quest->weekend_base_price }}" {{ old('weekend_uses_base_price', true) ? 'checked' : '' }}>
                            <label class="form-check-label small" for="new-slot-weekend-base">Базовая цена</label>
                        </div>
                    </div>
                    <input
                        type="number"
                        step="0.01"
                        min="0"
                        class="form-control form-control-sm"
                        id="new-slot-weekend-price"
                        name="weekend_price"
                        value="{{ old('weekend_price', $quest->weekend_base_price) }}"
                    >
                </div>
                <div class="col-sm-12 col-lg-2 ms-lg-auto">
                    <label class="form-label mb-1">&nbsp;</label>
                    <button type="submit" class="btn btn-success w-100">Добавить слот</button>
                </div>
            </form>
        </div>
    </section>

    <section class="card">
        <div class="card-body">
            <h2 class="card-title h4">Текущие слоты</h2>
            @forelse ($quest->slots as $slot)
                <div class="border rounded p-3 mb-3">
                    <form method="POST" action="{{ route('admin.quests.slots.update', [$quest->id, $slot->id]) }}" class="row gy-2 gx-3 align-items-center">
                        @csrf
                        @method('PUT')
                        <div class="col-sm-3 col-lg-2">
                            <label class="form-label mb-1" for="slot-time-{{ $slot->id }}">Время</label>
                            <input type="time" class="form-control form-control-sm" id="slot-time-{{ $slot->id }}" name="time" value="{{ \Illuminate\Support\Carbon::createFromFormat('H:i:s', $slot->time)->format('H:i') }}" required>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <label class="form-label mb-1" for="slot-weekday-price-{{ $slot->id }}">Будние дни</label>
                            <div class="d-flex flex-wrap gap-3 mb-2">
                                <div class="form-check form-switch mb-0">
                                    <input class="form-check-input" type="checkbox" value="1" id="slot-weekday-{{ $slot->id }}" name="weekday_enabled" {{ $slot->weekday_enabled ? 'checked' : '' }}>
                                    <label class="form-check-label small" for="slot-weekday-{{ $slot->id }}">Включено</label>
                                </div>
                                <div class="form-check form-switch mb-0">
                                    <input class="form-check-input" type="checkbox" value="1" id="slot-weekday-base-{{ $slot->id }}" name="weekday_uses_base_price" data-target="slot-weekday-price-{{ $slot->id }}" data-base-value="{{ $quest->weekday_base_price }}" {{ $slot->weekday_uses_base_price ? 'checked' : '' }}>
                                    <label class="form-check-label small" for="slot-weekday-base-{{ $slot->id }}">Базовая цена</label>
                                </div>
                            </div>
                            <input type="number" step="0.01" min="0" class="form-control form-control-sm" id="slot-weekday-price-{{ $slot->id }}" name="weekday_price" value="{{ $slot->weekday_uses_base_price ? $quest->weekday_base_price : $slot->weekday_price }}">
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <label class="form-label mb-1" for="slot-weekend-price-{{ $slot->id }}">Выходные дни</label>
                            <div class="d-flex flex-wrap gap-3 mb-2">
                                <div class="form-check form-switch mb-0">
                                    <input class="form-check-input" type="checkbox" value="1" id="slot-weekend-{{ $slot->id }}" name="weekend_enabled" {{ $slot->weekend_enabled ? 'checked' : '' }}>
                                    <label class="form-check-label small" for="slot-weekend-{{ $slot->id }}">Включено</label>
                                </div>
                                <div class="form-check form-switch mb-0">
                                    <input class="form-check-input" type="checkbox" value="1" id="slot-weekend-base-{{ $slot->id }}" name="weekend_uses_base_price" data-target="slot-weekend-price-{{ $slot->id }}" data-base-value="{{ $quest->weekend_base_price }}" {{ $slot->weekend_uses_base_price ? 'checked' : '' }}>
                                    <label class="form-check-label small" for="slot-weekend-base-{{ $slot->id }}">Базовая цена</label>
                                </div>
                            </div>
                            <input type="number" step="0.01" min="0" class="form-control form-control-sm" id="slot-weekend-price-{{ $slot->id }}" name="weekend_price" value="{{ $slot->weekend_uses_base_price ? $quest->weekend_base_price : $slot->weekend_price }}">
                        </div>
                        <div class="col-sm-12 col-lg-3 ms-lg-auto d-flex justify-content-lg-end">
                            <button type="submit" class="btn btn-primary btn-sm">Сохранить слот</button>
                        </div>
                    </form>
                    <div class="d-flex justify-content-lg-end mt-2">
                        <form method="POST" action="{{ route('admin.quests.slots.destroy', [$quest->id, $slot->id]) }}" onsubmit="return confirm('Удалить слот {{ \Illuminate\Support\Carbon::createFromFormat('H:i:s', $slot->time)->format('H:i') }}?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">Удалить</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="mb-0">Для этого квеста пока не создано ни одного слота.</p>
            @endforelse
        </div>
    </section>
</div>

<script>
    (function () {
        const applyBasePriceState = (checkbox) => {
            const targetId = checkbox.getAttribute('data-target');
            if (!targetId) {
                return;
            }

            const target = document.getElementById(targetId);
            if (!target) {
                return;
            }

            if (checkbox.checked) {
                const baseValue = checkbox.getAttribute('data-base-value') ?? '';
                target.value = baseValue;
                target.setAttribute('readonly', 'readonly');
            } else {
                target.removeAttribute('readonly');
            }
        };

        document.querySelectorAll('[data-base-value]').forEach((checkbox) => {
            checkbox.addEventListener('change', () => applyBasePriceState(checkbox));
            applyBasePriceState(checkbox);
        });
    })();
</script>
@endsection
