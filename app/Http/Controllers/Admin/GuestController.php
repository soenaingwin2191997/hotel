<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\User;
use App\Models\Guest;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class GuestController extends Controller
{
    function index()
    {
        $guests = Guest::select('*', 'guests.id as id')
            ->join('rooms', 'guests.room_id', 'rooms.id')
            ->join('users', 'users.id', 'guests.user_id')
            ->paginate(100);
        $total = Guest::all()->count();
        return view('admin.guests.guests', [
            'guests' => $guests,
            'total' => $total,
        ]);
    }

    function createPage()
    {
        $hotels = Hotel::all();
        return view('admin.guests.guest-add', [
            'hotels' => $hotels,
        ]);
    }

    function ajaxGuestHotel(Request $request)
    {
        $rooms = Room::where('hotel_id', $request->id)->orderBy('room_number', 'ASC')->get();
        return response($rooms);
    }

    function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => 'required|max:255',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'hotel_id' => 'required',
            'room_id' => 'required',
            'check_in_date' => 'required',
            'check_out_date' => 'required',
            'nrc' => 'max:255',
            'passport' => 'max:255',
        ]);

        $userId = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'nrc' => $request->nrc,
            'passport' => $request->passport,
            'password' => Hash::make($request->password),
        ]);

        Guest::create([
            'user_id' => $userId->id,
            'hotel_id' => $request->hotel_id,
            'room_id' => $request->room_id,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
        ]);
        return back();
    }

    function updatePage($id)
    {
        $guest = Guest::select('*', 'guests.id as id')
            ->join('users', 'users.id', 'guests.user_id')
            ->join('rooms','rooms.id','guests.room_id')
            ->join('hotels','hotels.id','guests.hotel_id')
            ->where('guests.id', $id)->first();
        $hotels = Hotel::all();
        $rooms = Room::select('*', 'rooms.id as id')
            ->where('hotel_id', $guest->hotel_id)->get();
        return view('admin.guests.guest-update', [
            'guest' => $guest,
            'hotels' => $hotels,
            'rooms' => $rooms,
        ]);
    }

    function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => 'required|max:255',
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'hotel_id' => 'required',
            'room_id' => 'required',
            'check_in_date' => 'required',
            'check_out_date' => 'required',
            'nrc' => 'max:255',
            'passport' => 'max:255',
        ]);

        User::find($request->user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'nrc' => $request->nrc,
            'passport' => $request->passport,
            // 'password' => Hash::make($request->password),
        ]);

        Guest::find($request->id)->update([
            'hotel_id' => $request->hotel_id,
            'room_id' => $request->room_id,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
        ]);

        return back();
    }

    function show(Request $request)
    {
        $guest = Guest::select('*')
            ->join('rooms', 'guests.room_id', 'rooms.id')
            ->join('hotels', 'rooms.hotel_id', 'hotels.id')
            ->join('users', 'users.id', 'guests.user_id')
            ->where('guests.id', $request->id)->first();

        return response($guest);
    }

    function search(Request $request)
    {
        $guests = Guest::select('*', 'guests.id as id')
            ->join('rooms', 'guests.room_id', 'rooms.id')
            ->join('users', 'users.id', 'guests.user_id')
            ->where('users.name', 'like', "%" . $request->search . "%")
            ->orWhere('users.phone', 'like', "%" . $request->search . "%")
            ->paginate(100);
        $total = Guest::all()->count();
        return view('admin.guests.guests', [
            'guests' => $guests,
            'total' => $total,
        ]);
    }

    function delete($id)
    {
        Guest::find($id)->delete();
        return back();
    }
}
