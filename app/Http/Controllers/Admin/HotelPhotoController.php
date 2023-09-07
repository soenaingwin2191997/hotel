<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HotelPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelPhotoController extends Controller
{
    function create(Request $request){
        if($request->file('photo')){
            foreach ($request->file('photo') as $photo) {
                $photoPath = uniqid().'_'.$photo->getClientOriginalName();
                $photo->storeAs('public/hotel_photos', $photoPath);
                HotelPhoto::create([
                    'hotel_id' => $request->hotel_id,
                    'photo' => $photoPath,
                ]);
            }
        }
        return back();
    }

    function update(Request $request){
        $request->validate([
            'id'=>'required',
            'photo'=>'required',
        ]);
 
        if($request->file('photo')){
            $oldPhoto=HotelPhoto::find($request->id);
            $oldPhoto=$oldPhoto->photo;
            // Storage::delete('public/hotel_photos',$oldPhoto);
            
            $path=uniqid().'_'.$request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('public/hotel_photos',$path);

            HotelPhoto::where('id',$request->id)->update([
                'photo'=>$path,
            ]);
        }
        return back();
    }

    function delete($id){
        $hotelPhoto=HotelPhoto::find($id);
        // Storage::delete('public/hotel_photos',$hotelPhoto->photo);

        HotelPhoto::find($id)->delete();
        return back();
    }
}
