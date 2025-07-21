<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        return response()->json(Film::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'genre' => 'required|string',
            'duration' => 'required|integer',
            'release_date' => 'required|date',
        ]);

        $film = Film::create($validated);

        return response()->json($film, 201);
    }

    public function show($id)
    {
        $film = Film::findOrFail($id);
        return response()->json($film);
    }

    public function update(Request $request, $id)
    {
        $film = Film::findOrFail($id);
        $film->update($request->all());

        return response()->json($film);
    }

    public function destroy($id)
    {
        $film = Film::findOrFail($id);
        $film->delete();

        return response()->json(['message' => 'Film deleted']);
    }
}
