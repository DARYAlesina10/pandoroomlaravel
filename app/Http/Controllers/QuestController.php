<?php

namespace App\Http\Controllers;

use App\Quest;
use Illuminate\Http\Request;

class QuestController extends Controller
{
    public function index()
    {
        $quests = Quest::all(); // Получаем всех квестов из базы данных
        return view('quests.index', compact('quests')); // Возвращаем представление с квестами
    }

    public function show($id)
    {
        $quest = Quest::findOrFail($id); // Находим квест по ID или выбрасываем ошибку, если не найден
        return view('quests.show', compact('quest')); // Возвращаем представление для одного квеста
    }
}
