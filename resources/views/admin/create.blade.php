
@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Создать новый квест</h1>
    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="genreId">Жанр</label>
            <input type="number" name="genreId" id="genreId" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="difficultyId">Сложность</label>
            <input type="number" name="difficultyId" id="difficultyId" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="branchId">Филиал</label>
            <input type="number" name="branchId" id="branchId" class="form-control">
        </div>
        <div class="form-group">
            <label for="players_count">Количество игроков</label>
            <input type="number" name="players_count" id="players_count" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="game_time">Время игры</label>
            <input type="text" name="game_time" id="game_time" class="form-control">
        </div>
        <div class="form-group">
            <label for="preview_image">Превью изображение</label>
            <input type="file" name="preview_image" id="preview_image" class="form-control">
        </div>
        <div class="form-group">
            <label for="background_image">Фоновое изображение</label>
            <input type="file" name="background_image" id="background_image" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="rules">Правила</label>
            <textarea name="rules" id="rules" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="safety">Безопасность</label>
            <textarea name="safety" id="safety" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="additional_services">Дополнительные услуги</label>
            <textarea name="additional_services" id="additional_services" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="additional_players">Дополнительные игроки</label>
            <input type="number" name="additional_players" id="additional_players" class="form-control">
        </div>
        <div class="form-group">
            <label for="price_per_additional_player">Цена за дополнительного игрока</label>
            <input type="number" name="price_per_additional_player" id="price_per_additional_player" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
</div>
@endsection