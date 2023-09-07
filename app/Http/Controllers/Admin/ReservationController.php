<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    function index()
    {
        $reservations = Reservation::select('*', 'reservations.id as id')
            ->join('rooms', 'reservations.room_id', 'rooms.id')->paginate(100);
        $total = Reservation::all()->count();
        return view('admin.reservations.reservations', [
            'reservations' => $reservations,
            'total' => $total,
        ]);
    }

    function show(Request $request)
    {
        $reservation = Reservation::select('*')
            ->join('rooms', 'reservations.room_id', 'rooms.id')
            ->join('hotels', 'reservations.hotel_id', 'hotels.id')
            ->where('reservations.id', $request->id)->first();

        return response($reservation);
    }

    function search(Request $request)
    {
        $reservations = Reservation::select('*', 'reservations.id as id')
            ->join('rooms', 'reservations.room_id', 'rooms.id')
            ->where('reservations.name', 'like', "%" . $request->search . "%")
            ->orWhere('reservations.phone', 'like', "%" . $request->search . "%")
            ->paginate(100);
        $total = Reservation::all()->count();

        return view('admin.reservations.reservations', [
            'reservations' => $reservations,
            'total' => $total,
        ]);
    }

    function update($action,$id){
        if($action=='1'){
            $reservation=Reservation::find($id);
            Guest::create([
                'hotel_id'=>$reservation->hotel_id,
                'room_id'=>$reservation->room_id,
                'name'=>$reservation->name,
                'email'=>$reservation->email,
                'phone'=>$reservation->phone,
                'nrc'=>$reservation->nrc,
                'passport'=>$reservation->passport,
                'birthday'=>$reservation->birthday,
                'check_in_date'=>$reservation->check_in_date,
                'check_out_date'=>$reservation->check_out_date,
            ]);
            Reservation::find($id)->delete();
            return back();
        }
        if($action=='2'){

        }
        if($action=='3'){

        }
    }
}
