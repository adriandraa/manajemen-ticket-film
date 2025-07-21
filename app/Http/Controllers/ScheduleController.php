<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        return response()->json(Schedule::with(['film', 'theater'])->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'film_id' => 'required|exists:films,id',
            'theater_id' => 'required|exists:theaters,id',
            'start_time' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $schedule = Schedule::create($validated);

        return response()->json($schedule, 201);
    }

    public function show($id)
    {
        return response()->json(Schedule::with(['film', 'theater'])->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->update($request->all());

        return response()->json($schedule);
    }

    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return response()->json(['message' => 'Schedule deleted']);
    }
}
