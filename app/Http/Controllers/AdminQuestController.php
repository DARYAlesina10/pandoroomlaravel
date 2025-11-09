<?php

namespace App\Http\Controllers;

use App\Quest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminQuestController extends Controller
{
    public function create()
    {
        return view('admin.create');
    }

    public function index()
    {
        return view('admin.quests');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'genreId' => 'required|integer',
            'difficultyId' => 'required|integer',
            'branchId' => 'nullable|integer',
            'players_count' => 'required|integer',
            'game_time' => 'nullable|string',
            'preview_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'rules' => 'nullable|string',
            'safety' => 'nullable|string',
            'additional_services' => 'nullable|string',
            'additional_players' => 'nullable|integer',
            'price_per_additional_player' => 'nullable|integer',
            'weekday_base_price' => 'required|numeric|min:0',
            'weekend_base_price' => 'required|numeric|min:0',
        ]);

        $quest = new Quest();
        $quest->fill($request->all());

        if ($request->hasFile('preview_image')) {
            $path = $request->file('preview_image')->store('images/quests');
            $quest->preview_image = $path;
        }

        if ($request->hasFile('background_image')) {
            $path = $request->file('background_image')->store('images/quests');
            $quest->background_image = $path;
        }

        $quest->save();

        return redirect()->route('admin.create')->with('success', 'Квест успешно создан!');
    }

    public function edit($id)
    {
        $quest = Quest::findOrFail($id);

        return view('admin.edit', compact('quest'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'genreId' => 'required|integer',
            'difficultyId' => 'required|integer',
            'branchId' => 'nullable|integer',
            'players_count' => 'required|integer',
            'game_time' => 'nullable|string',
            'preview_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'rules' => 'nullable|string',
            'safety' => 'nullable|string',
            'additional_services' => 'nullable|string',
            'additional_players' => 'nullable|integer',
            'price_per_additional_player' => 'nullable|integer',
            'weekday_base_price' => 'required|numeric|min:0',
            'weekend_base_price' => 'required|numeric|min:0',
        ]);

        $quest = Quest::findOrFail($id);
        $quest->fill($request->all());

        if ($request->hasFile('preview_image')) {
            if ($quest->preview_image) {
                Storage::delete($quest->preview_image);
            }
            $path = $request->file('preview_image')->store('images/quests');
            $quest->preview_image = $path;
        }

        if ($request->hasFile('background_image')) {
            if ($quest->background_image) {
                Storage::delete($quest->background_image);
            }
            $path = $request->file('background_image')->store('images/quests');
            $quest->background_image = $path;
        }

        $quest->save();

        return redirect()->route('admin.edit', $quest->id)->with('success', 'Квест успешно обновлён!');
    }
}