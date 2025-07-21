<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        // Hanya tiket milik user login
        return response()->json(Auth::user()->tickets()->with('schedule.film', 'schedule.theater')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'schedule_id' => 'required|exists:schedules,id',
            'seat_number' => 'required|string',
        ]);

        // Cek apakah kursi sudah diambil
        $exists = Ticket::where('schedule_id', $validated['schedule_id'])
            ->where('seat_number', $validated['seat_number'])
            ->where('status', 'booked')
            ->exists();

        if ($exists) {
            return response()->json(['message' => 'Seat already booked'], 409);
        }

        $ticket = Ticket::create([
            'user_id' => Auth::id(),
            'schedule_id' => $validated['schedule_id'],
            'seat_number' => $validated['seat_number'],
            'status' => 'booked',
        ]);

        return response()->json($ticket, 201);
    }

    public function show($id)
    {
        $ticket = Ticket::with('schedule.film', 'schedule.theater')->findOrFail($id);

        if ($ticket->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return response()->json($ticket);
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);

        if ($ticket->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $ticket->update(['status' => 'cancelled']);

        return response()->json(['message' => 'Ticket cancelled']);
    }
}
