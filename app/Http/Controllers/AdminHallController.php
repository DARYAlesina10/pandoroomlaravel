<?php

namespace App\Http\Controllers;

use App\VenueHall;
use Illuminate\Http\Request;

class AdminHallController extends Controller
{
    public function index()
    {
        $halls = VenueHall::withCount('tables')->orderBy('name')->get();

        return view('admin.halls', [
            'halls' => $halls,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        VenueHall::create($data);

        return redirect()->route('admin.halls')->with('status', 'Зал успешно создан.');
    }

    public function update(Request $request, VenueHall $hall)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        $hall->update($data);

        return redirect()->route('admin.halls')->with('status', 'Данные зала обновлены.');
    }

    public function destroy(VenueHall $hall)
    {
        $hall->delete();

        return redirect()->route('admin.halls')->with('status', 'Зал удалён.');
    }
}
