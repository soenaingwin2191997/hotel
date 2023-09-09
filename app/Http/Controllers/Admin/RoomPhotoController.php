<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomPhoto;
use Illuminate\Http\Request;

class RoomPhotoController extends Controller
{
    function create(Request $request){
        foreach($request->file('photos') as $photo){
            $photoPath = uniqid().'_'.$photo->getClientOriginalName();
            $photo->storeAs('public/room_photos', $photoPath);
            RoomPhoto::create([
                'room_id'=>$request->room_id,
                'photo'=>$photoPath,
            ]);
        }
        return back();
    }

    function update(Request $request){
        $request->validate([
            'id'=>'required',
            'photo'=>'required',
        ]);
 
        if($request->file('photo')){
            $oldPhoto=RoomPhoto::find($request->id);
            $oldPhoto=$oldPhoto->photo;
            // Storage::delete('public/rooms_photos',$oldPhoto);
            
            $path=uniqid().'_'.$request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('public/room_photos',$path);

            RoomPhoto::where('id',$request->id)->update([
                'photo'=>$path,
            ]);
        }
        return back();
    }

    function delete($id){
        RoomPhoto::find($id)->delete();
        return back();
    }
}
