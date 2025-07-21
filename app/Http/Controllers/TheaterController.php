<?php

namespace App\Http\Controllers;

use App\Models\Theater;
use Illuminate\Http\Request;

class TheaterController extends Controller
{
    public function index()
    {
        return response()->json(Theater::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'total_seats' => 'required|integer',
        ]);

        $theater = Theater::create($validated);

        return response()->json($theater, 201);
    }

    public function show($id)
    {
        return response()->json(Theater::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $theater = Theater::findOrFail($id);
        $theater->update($request->all());

        return response()->json($theater);
    }

    public function destroy($id)
    {
        $theater = Theater::findOrFail($id);
        $theater->delete();

        return response()->json(['message' => 'Theater deleted']);
    }
}
