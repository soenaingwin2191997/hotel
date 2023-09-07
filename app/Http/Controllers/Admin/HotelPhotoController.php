<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HotelPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelPhotoController extends Controller
{
    function delete($id){
        $hotelPhoto=HotelPhoto::find($id);
        // Storage::delete('public/hotel_photos',$hotelPhoto->photo);

        HotelPhoto::find($id)->delete();
        return back();
    }
}
