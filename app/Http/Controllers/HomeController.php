<?php

namespace App\Http\Controllers;
use App\Quest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   public function index()
    {
        $quests = Quest::all(); // Получаем все квесты
        return view('index', compact('quests')); // Передаем квесты в представление с именем index
    }
}
