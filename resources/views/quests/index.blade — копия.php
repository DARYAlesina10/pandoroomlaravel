
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Список квестов</title>
   </head>
   <body>
       <h1>Список квестов</h1>
       <ul>
           @foreach($quests as $quest)
               <li>
                   <a href="{{ route('quests.show', $quest->id) }}">{{ $quest->name }}</a>
               </li>
           @endforeach
       </ul>
   </body>
   </html>