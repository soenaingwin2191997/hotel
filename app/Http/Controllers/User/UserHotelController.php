<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\HotelFeature;
use App\Models\HotelPhoto;
use App\Models\Room;
use Illuminate\Http\Request;

class UserHotelController extends Controller
{

    function index()
    {
        $hotels = Hotel::select('*', 'hotels.id as id')
            ->join('townships', 'hotels.township_id', 'townships.id')
            ->inRandomOrder()->limit(8)->get();
        return view('users.index', [
            'hotels' => $hotels,
        ]);
    }

    function search(Request $request)
    {
        $hotels = Hotel::select('*', 'hotels.id as id')
            ->join('townships', 'hotels.township_id', 'townships.id')
            ->where('township_name', 'like', "%" . $request->search . "%")
            ->orWhere('hotel_name', 'like', '%' . $request->search . '%')
            ->get();
        return view('users.index', [
            'hotels' => $hotels,
        ]);
    }

    
    function show($id){
        $hotel=Hotel::find($id);
        $hotelPhotos=HotelPhoto::where('hotel_id',$id)->get();
        $hotelFeature=HotelFeature::where('hotel_id',$id)->first();
        $rooms=Room::where('hotel_id',$id)->get();
        return view('users.hotel-detail',[
            'hotel'=>$hotel,
            'hotelPhotos'=>$hotelPhotos,
            'hotelFeature'=>$hotelFeature,
            'rooms'=>$rooms,
        ]);
    }
}
