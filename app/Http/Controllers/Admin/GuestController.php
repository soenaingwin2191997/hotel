<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    function index()
    {
        $guests = Guest::select('*','guests.id as id')
            ->join('rooms', 'guests.room_id', 'rooms.id')
            ->paginate(100);
        $total=Guest::all()->count();
        return view('admin.reservations.guests', [
            'guests' => $guests,
            'total'=>$total,
        ]);
    }

    function show(Request $request)
    {
        $guest = Guest::select('*')
            ->join('rooms', 'guests.room_id', 'rooms.id')
            ->join('hotels', 'rooms.hotel_id', 'hotels.id')
            ->where('guests.id', $request->id)->first();

        return response($guest);
    }

    function search(Request $request){
        $guests = Guest::select('*','guests.id as id')
            ->join('rooms', 'guests.room_id', 'rooms.id')
            ->where('guests.name','like',"%".$request->search."%")
            ->orWhere('guests.phone','like',"%".$request->search."%")
            ->paginate(100);
        $total=Guest::all()->count();
        return view('admin.reservations.guests', [
            'guests' => $guests,
            'total'=>$total,
        ]);
    }
}
