<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomFeature;
use App\Models\RoomPhoto;
use Illuminate\Http\Request;

class UserRoomController extends Controller
{
    function show($id)
    {
        $room = Room::select('*', 'rooms.id as id')
            ->join('hotels', 'rooms.hotel_id', 'hotels.id')->first();
        $roomPhotos = RoomPhoto::where('room_id', $id)->get();
        $roomFeature = RoomFeature::where('room_id', $id)->first();
        return view('users.room-detail', [
            'room' => $room,
            'roomPhotos' => $roomPhotos,
            'roomFeature' => $roomFeature,
        ]);
    }
}
