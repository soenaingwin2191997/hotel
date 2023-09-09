<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use App\Models\Hotel;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    function index()
    {
        $reservations = Reservation::select('*', 'reservations.id as id')
            ->join('users', 'users.id', 'reservations.user_id')
            ->join('rooms', 'reservations.room_id', 'rooms.id')->paginate(100);
        $total = Reservation::all()->count();
        $hotels = Hotel::all();
        return view('admin.reservations.reservations', [
            'hotels' => $hotels,
            'reservations' => $reservations,
            'total' => $total,
        ]);
    }

    function show(Request $request)
    {
        $reservation = Reservation::select('*')
            ->join('users', 'users.id', 'reservations.user_id')
            ->join('rooms', 'reservations.room_id', 'rooms.id')
            ->join('hotels', 'reservations.hotel_id', 'hotels.id')
            ->where('reservations.id', $request->id)->first();

        return response($reservation);
    }

    function search(Request $request)
    {
        $reservations = Reservation::select('*', 'reservations.id as id')
            ->join('users', 'users.id', 'reservations.user_id')
            ->join('rooms', 'reservations.room_id', 'rooms.id')
            ->Where('users.name', 'like', "%" . $request->search . "%")
            ->orWhere('users.phone', 'like', "%" . $request->search . "%")
            ->paginate(100);
        $hotels = Hotel::all();
        $total = Reservation::all()->count();

        return view('admin.reservations.reservations', [
            'hotels' => $hotels,
            'reservations' => $reservations,
            'total' => $total,
        ]);
    }

    function update($action, $id)
    {
        $reservation = Reservation::find($id);
        if ($action == 1) {
            Reservation::find($id)->update([
                'action' => 1,
            ]);
            return back();
        }

        if ($action == '2') {
            Guest::create([
                'user_id' => $reservation->user_id,
                'hotel_id' => $reservation->hotel_id,
                'room_id' => $reservation->room_id,
                'check_in_date' => $reservation->check_in_date,
                'check_out_date' => $reservation->check_out_date,
            ]);
            Reservation::find($id)->update([
                'action' => 2,
            ]);
            return back();
        }

        if ($action == 3) {
            Reservation::find($id)->update([
                'action' => 3,
            ]);
            return back();
        }

        if ($action == 4) {
            Reservation::find($id)->delete();
            return back();
        }
    }
}
