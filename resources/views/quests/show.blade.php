
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>{{ $quest->name }}</title>
   </head>
   <body>
       <h1>{{ $quest->name }}</h1>
       <p><strong>Жанр:</strong> {{ $quest->genreId }}</p>
       <p><strong>Сложность:</strong> {{ $quest->difficultyId }}</p>
       <p><strong>Количество игроков:</strong> {{ $quest->players_count }}</p>
       <p><strong>Время игры:</strong> {{ $quest->game_time }}</p>
       <p><strong>Описание:</strong> {{ $quest->description }}</p>
       <p><strong>Правила:</strong> {{ $quest->rules }}</p>
       <p><strong>Безопасность:</strong> {{ $quest->safety }}</p>
       <p><strong>Дополнительные услуги:</strong> {{ $quest->additional_services }}</p>
       <p><strong>Дополнительные игроки:</strong> {{ $quest->additional_players }}</p>
       <p><strong>Цена за дополнительного игрока:</strong> {{ $quest->price_per_additional_player }}</p>
   </body>
   </html>