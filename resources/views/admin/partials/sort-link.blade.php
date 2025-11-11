@php
    $isActive = ($sort ?? null) === $column;
    $currentDirection = $isActive ? ($direction ?? 'asc') : 'asc';
    $nextDirection = $isActive && $currentDirection === 'asc' ? 'desc' : 'asc';
    $icon = $isActive ? ($currentDirection === 'asc' ? '▲' : '▼') : '⇅';

    $query = array_merge(request()->except('page'), [
        'sort' => $column,
        'direction' => $nextDirection,
    ]);
@endphp
<a href="{{ route('admin.bookings', $query) }}" class="sort-link">
    <span>{{ $label }}</span>
    <span class="sort-indicator">{{ $icon }}</span>
</a>
