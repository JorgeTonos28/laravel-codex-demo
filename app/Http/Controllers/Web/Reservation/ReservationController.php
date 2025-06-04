<?php

namespace App\Http\Controllers\Web\Reservation;

use App\Http\Controllers\Web\Controller;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create()
    {
        $rooms = Room::where('is_active', true)->get();

        return view('web.pages.reservations.create', [
            'rooms' => $rooms,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_name' => 'required|string',
            'department' => 'required|string',
            'extension' => 'nullable|string',
            'people_count' => 'required|integer',
            'room_id' => 'required|exists:rooms,id',
            'event_name' => 'required|string',
            'public_type' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        $room = Room::findOrFail($data['room_id']);
        if ($data['people_count'] > $room->capacity) {
            return back()->withErrors(['people_count' => 'Capacity exceeded']);
        }

        $data['needs_janitor'] = (int)($data['time'] >= '16:00:00');

        Reservation::create($data);

        // TODO: notifications

        return redirect()->route('reservations.create')->with('status', 'Reserved');
    }
}
