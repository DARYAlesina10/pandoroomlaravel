<?php

namespace App\Http\Controllers;

use App\Quest;
use App\QuestSlot;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminQuestScheduleController extends Controller
{
    public function edit(Quest $quest)
    {
        $quest->load(['slots' => function ($query) {
            $query->orderBy('time');
        }]);

        return view('admin.schedule', [
            'quest' => $quest,
        ]);
    }

    public function updatePricing(Request $request, Quest $quest)
    {
        $data = $request->validate([
            'weekday_base_price' => ['required', 'numeric', 'min:0'],
            'weekend_base_price' => ['required', 'numeric', 'min:0'],
        ]);

        $quest->update($data);

        if ($quest->wasChanged('weekday_base_price')) {
            $quest->slots()
                ->where('weekday_uses_base_price', true)
                ->update(['weekday_price' => $quest->weekday_base_price]);
        }

        if ($quest->wasChanged('weekend_base_price')) {
            $quest->slots()
                ->where('weekend_uses_base_price', true)
                ->update(['weekend_price' => $quest->weekend_base_price]);
        }

        return redirect()
            ->route('admin.quests.schedule', $quest)
            ->with('status', 'Базовые цены обновлены.');
    }

    public function storeSlot(Request $request, Quest $quest)
    {
        $data = $this->validateSlot($request, $quest);

        $slot = new QuestSlot();
        $slot->quest()->associate($quest);
        $slot->fill([
            'time' => $data['time'],
            'weekday_enabled' => $data['weekday_enabled'],
            'weekend_enabled' => $data['weekend_enabled'],
            'weekday_price' => $data['weekday_price'],
            'weekend_price' => $data['weekend_price'],
            'weekday_uses_base_price' => $data['weekday_uses_base_price'],
            'weekend_uses_base_price' => $data['weekend_uses_base_price'],
        ]);

        $this->synchroniseSlotPricing($slot, $quest);

        $slot->save();

        return redirect()
            ->route('admin.quests.schedule', $quest)
            ->with('status', 'Слот добавлен.');
    }

    public function updateSlot(Request $request, Quest $quest, QuestSlot $slot)
    {
        if ($slot->quest_id !== $quest->id) {
            abort(404);
        }

        $data = $this->validateSlot($request, $quest, $slot->id);

        $slot->fill([
            'time' => $data['time'],
            'weekday_enabled' => $data['weekday_enabled'],
            'weekend_enabled' => $data['weekend_enabled'],
            'weekday_price' => $data['weekday_price'],
            'weekend_price' => $data['weekend_price'],
            'weekday_uses_base_price' => $data['weekday_uses_base_price'],
            'weekend_uses_base_price' => $data['weekend_uses_base_price'],
        ]);

        $this->synchroniseSlotPricing($slot, $quest);

        $slot->save();

        return redirect()
            ->route('admin.quests.schedule', $quest)
            ->with('status', 'Слот обновлён.');
    }

    public function destroySlot(Request $request, Quest $quest, QuestSlot $slot)
    {
        if ($slot->quest_id !== $quest->id) {
            abort(404);
        }

        $slot->delete();

        return redirect()
            ->route('admin.quests.schedule', $quest)
            ->with('status', 'Слот удалён.');
    }

    protected function validateSlot(Request $request, Quest $quest, ?int $slotId = null): array
    {
        $useWeekdayBase = $request->boolean('weekday_uses_base_price');
        $useWeekendBase = $request->boolean('weekend_uses_base_price');

        $weekdayRules = $useWeekdayBase ? ['nullable', 'numeric', 'min:0'] : ['required', 'numeric', 'min:0'];
        $weekendRules = $useWeekendBase ? ['nullable', 'numeric', 'min:0'] : ['required', 'numeric', 'min:0'];

        $validated = $request->validate([
            'time' => [
                'required',
                'date_format:H:i',
                Rule::unique('quest_slots', 'time')
                    ->where(fn ($query) => $query->where('quest_id', $quest->id))
                    ->ignore($slotId),
            ],
            'weekday_enabled' => ['sometimes', 'boolean'],
            'weekend_enabled' => ['sometimes', 'boolean'],
            'weekday_uses_base_price' => ['sometimes', 'boolean'],
            'weekend_uses_base_price' => ['sometimes', 'boolean'],
            'weekday_price' => $weekdayRules,
            'weekend_price' => $weekendRules,
        ]);

        $time = Carbon::createFromFormat('H:i', $validated['time'])->format('H:i:s');

        return [
            'time' => $time,
            'weekday_enabled' => $request->boolean('weekday_enabled'),
            'weekend_enabled' => $request->boolean('weekend_enabled'),
            'weekday_uses_base_price' => $useWeekdayBase,
            'weekend_uses_base_price' => $useWeekendBase,
            'weekday_price' => $validated['weekday_price'] ?? null,
            'weekend_price' => $validated['weekend_price'] ?? null,
        ];
    }

    protected function synchroniseSlotPricing(QuestSlot $slot, Quest $quest): void
    {
        if ($slot->weekday_uses_base_price) {
            $slot->weekday_price = $quest->weekday_base_price;
        }

        if ($slot->weekend_uses_base_price) {
            $slot->weekend_price = $quest->weekend_base_price;
        }
    }
}
