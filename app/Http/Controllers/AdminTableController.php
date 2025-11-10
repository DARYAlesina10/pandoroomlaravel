<?php

namespace App\Http\Controllers;

use App\VenueHall;
use App\VenueTable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminTableController extends Controller
{
    public function index()
    {
        $halls = VenueHall::orderBy('name')->get();
        $tables = VenueTable::with('hall')->orderBy('name')->get();

        return view('admin.tables.index', [
            'halls' => $halls,
            'tables' => $tables,
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validateTable($request);

        VenueTable::create($data);

        return redirect()->route('admin.tables')->with('status', 'Стол добавлен в каталог.');
    }

    public function update(Request $request, VenueTable $table)
    {
        $data = $this->validateTable($request);

        $table->update($data);

        return redirect()->route('admin.tables')->with('status', 'Данные стола обновлены.');
    }

    public function destroy(VenueTable $table)
    {
        $table->delete();

        return redirect()->route('admin.tables')->with('status', 'Стол удалён.');
    }

    protected function validateTable(Request $request): array
    {
        $validated = $request->validate([
            'venue_hall_id' => ['required', 'exists:venue_halls,id'],
            'name' => ['required', 'string', 'max:255'],
            'min_capacity' => ['required', 'integer', 'min:1'],
            'max_capacity' => ['required', 'integer', 'min:1', 'gte:min_capacity'],
            'services' => ['nullable', 'string'],
            'is_active' => ['sometimes', 'boolean'],
        ]);

        $services = collect(preg_split('/[,\n]+/', (string) ($validated['services'] ?? ''), -1, PREG_SPLIT_NO_EMPTY))
            ->map(function ($service) {
                return Str::of($service)->trim()->limit(100)->toString();
            })
            ->filter()
            ->values()
            ->all();

        $validated['services'] = $services ?: null;
        $validated['is_active'] = $request->has('is_active')
            ? $this->toBoolean($request->input('is_active'))
            : true;

        return $validated;
    }

    protected function toBoolean($value): bool
    {
        if (is_bool($value)) {
            return $value;
        }

        if ($value === null) {
            return false;
        }

        return in_array(strtolower((string) $value), ['1', 'true', 'on', 'yes'], true);
    }
}
