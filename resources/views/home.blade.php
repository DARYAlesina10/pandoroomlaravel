<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная страница</title>
</head>
<body>
    <h1>Добро пожаловать на главную страницу</h1>
    <a href="{{ route('profile') }}">Личный кабинет</a>
    <a href="{{ route('admin.quests') }}">Страница администратора</a>
</body>
</html>