<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\HotelPhoto;
use App\Models\Room;
use Illuminate\Http\Request;

class UserHotelController extends Controller
{
    function show($id){
        $hotel=Hotel::find($id);
        $hotelPhotos=HotelPhoto::where('hotel_id',$id)->get();
        $rooms=Room::where('hotel_id',$id)->get();
        return view('users.hotel-detail',[
            'hotel'=>$hotel,
            'hotelPhotos'=>$hotelPhotos,
            'rooms'=>$rooms,
        ]);
    }
}
