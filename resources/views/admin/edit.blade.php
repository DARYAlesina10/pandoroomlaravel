@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Редактировать квест</h1>
    <div class="mb-3">
        <a href="{{ route('admin.quests.schedule', $quest->id) }}" class="btn btn-secondary">Настроить расписание</a>
    </div>
    <form action="{{ route('admin.update', $quest->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $quest->name }}" required>
        </div>
        <div class="form-group">
            <label for="genreId">Жанр</label>
            <input type="number" name="genreId" id="genreId" class="form-control" value="{{ $quest->genreId }}" required>
        </div>
        <div class="form-group">
            <label for="difficultyId">Сложность</label>
            <input type="number" name="difficultyId" id="difficultyId" class="form-control" value="{{ $quest->difficultyId }}" required>
        </div>
        <div class="form-group">
            <label for="branchId">Филиал</label>
            <input type="number" name="branchId" id="branchId" class="form-control" value="{{ $quest->branchId }}">
        </div>
        <div class="form-group">
            <label for="players_count">Количество игроков</label>
            <input type="number" name="players_count" id="players_count" class="form-control" value="{{ $quest->players_count }}" required>
        </div>
        <div class="form-group">
            <label for="game_time">Время игры</label>
            <input type="text" name="game_time" id="game_time" class="form-control" value="{{ $quest->game_time }}">
        </div>
        <div class="form-group">
            <label for="preview_image">Превью изображение</label>
            <input type="file" name="preview_image" id="preview_image" class="form-control">
            <img src="{{ asset($quest->preview_image) }}" alt="Preview Image" style="max-width: 100px;">
        </div>
        <div class="form-group">
            <label for="background_image">Фоновое изображение</label>
            <input type="file" name="background_image" id="background_image" class="form-control">
            <img src="{{ asset($quest->background_image) }}" alt="Background Image" style="max-width: 100px;">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" id="description" class="form-control" required>{{ $quest->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="rules">Правила</label>
            <textarea name="rules" id="rules" class="form-control">{{ $quest->rules }}</textarea>
        </div>
        <div class="form-group">
            <label for="safety">Безопасность</label>
            <textarea name="safety" id="safety" class="form-control">{{ $quest->safety }}</textarea>
        </div>
        <div class="form-group">
            <label for="additional_services">Дополнительные услуги</label>
            <textarea name="additional_services" id="additional_services" class="form-control">{{ $quest->additional_services }}</textarea>
        </div>
        <div class="form-group">
            <label for="additional_players">Дополнительные игроки</label>
            <input type="number" name="additional_players" id="additional_players" class="form-control" value="{{ $quest->additional_players }}">
        </div>
        <div class="form-group">
            <label for="price_per_additional_player">Цена за дополнительного игрока</label>
            <input type="number" name="price_per_additional_player" id="price_per_additional_player" class="form-control" value="{{ $quest->price_per_additional_player }}">
        </div>
        <div class="form-group">
            <label for="weekday_base_price">Базовая цена (будни)</label>
            <input type="number" step="0.01" name="weekday_base_price" id="weekday_base_price" class="form-control" value="{{ old('weekday_base_price', $quest->weekday_base_price) }}" required>
        </div>
        <div class="form-group">
            <label for="weekend_base_price">Базовая цена (выходные)</label>
            <input type="number" step="0.01" name="weekend_base_price" id="weekend_base_price" class="form-control" value="{{ old('weekend_base_price', $quest->weekend_base_price) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    </form>
</div>
@endsection