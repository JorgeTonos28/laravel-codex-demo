<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Web\Controller;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $reservations = Reservation::latest()->get();
        $rooms = Room::all();

        return view('web.pages.admin.index', [
            'reservations' => $reservations,
            'rooms' => $rooms,
        ]);
    }

    public function toggleRoom(Room $room)
    {
        $room->is_active = ! $room->is_active;
        $room->save();

        return back();
    }

    public function cancelReservation(Reservation $reservation)
    {
        $reservation->is_canceled = true;
        $reservation->save();

        // TODO: notification

        return back();
    }
}
