<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\Hotel;
use App\Models\RoomPhoto;
use App\Models\RoomFeature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class RoomController extends Controller
{
    function index()
    {
        $rooms = Room::select('*', 'rooms.id as id')
            ->join('hotels', 'rooms.hotel_id', 'hotels.id')->get();
        return view('admin.rooms.rooms', [
            'rooms' => $rooms,
        ]);
    }

    function show(Request $request)
    {
        $room = Room::select('*', 'rooms.id as id')
            ->join('hotels', 'rooms.hotel_id', 'hotels.id')
            ->where('rooms.id', $request->id)
            ->first();

        return ($room);
    }

    function createPage()
    {
        $hotels = Hotel::all();
        return view('admin.rooms.room-add', [
            'hotels' => $hotels,
        ]);
    }

    function create(Request $request)
    {

        $request->validate([
            'hotel_id' => 'required|numeric',
            'room_number' => 'required|numeric',
            'room_photo' => 'required',
            'room_price' => 'required',
            'room_bad' => 'required',
            'room_person' => 'required',
            'room_floor' => 'required',
            'room_desc' => 'required',
            'room_status' => 'required',
            'room_type' => 'required',
        ]);

        if ($request->file('room_photo')) {
            $roomPhoto = uniqid() . '_' . $request->file('room_photo')->getClientOriginalName();
            $request->file('room_photo')->storeAs('public/room_photos', $roomPhoto);
        } else {
            return back();
        }

        $roomId = Room::create([
            'hotel_id' => $request->hotel_id,
            'room_number' => $request->room_number,
            'room_photo' => $roomPhoto,
            'room_price' => $request->room_price,
            'room_bad' => $request->room_bad,
            'room_person' => $request->room_person,
            'room_floor' => $request->room_floor,
            'room_desc' => $request->room_desc,
            'room_type' => $request->room_type,
            'room_status' => $request->room_status,
        ]);

        if ($request->file('room_other_photo')) {
            foreach ($request->file('room_other_photo') as $photo) {
                $otherPhoto = uniqid() . '_' . $photo->getClientOriginalName();
                $photo->storeAs('public/room_photos', $otherPhoto);
                RoomPhoto::create([
                    'room_id' => $roomId->id,
                    'photo' => $otherPhoto,
                ]);
            }
        }

        $airCon = $request->input('air_con');
        $fun = $request->input('fun');
        $bathRoom = $request->input('bathroom');
        $tv = $request->input('tv');
        $cityView = $request->input('city_view');
        $wifi = $request->input('wifi');
        $breakfast = $request->input('breakfast');
        $lunch = $request->input('lunch');
        $toilet = $request->input('toilet');
        $window = $request->input('window');

        RoomFeature::create([
            'room_id' => $roomId->id,
            'air_con' => $airCon ? 1 : 0,
            'fun' => $fun ? 1 : 0,
            'tv' => $tv ? 1 : 0,
            'city_view' => $cityView ? 1 : 0,
            'breakfast' => $breakfast ? 1 : 0,
            'lunch' => $lunch ? 1 : 0,
            'bathroom' => $bathRoom ? 1 : 0,
            'wifi' => $wifi ? 1 : 0,
            'toilet' => $toilet ? 1 : 0,
            'window' => $window ? 1 : 0,
        ]);

        return back();
    }

    function updatePage($id)
    {
        $room = Room::select('*', 'rooms.id as id')
            ->join('room_features', 'rooms.id', 'room_features.room_id')
            ->where('rooms.id', $id)->first();
        $hotels = Hotel::all();
        $otherPhotos = RoomPhoto::where('room_id', $id)->get();
        return view('admin.rooms.room-update', [
            'room' => $room,
            'hotels' => $hotels,
            'otherPhotos' => $otherPhotos,
        ]);
    }

    function update(Request $request){
        $request->validate([
            'id' => 'required|numeric',
            'room_number' => 'required|numeric',
            'room_price' => 'required',
            'room_bad' => 'required',
            'room_person' => 'required',
            'room_floor' => 'required',
            'room_desc' => 'required',
            'room_status' => 'required',
            'room_type' => 'required',
        ]);

        if ($request->file('room_photo')) {
            $oldPhoto=Room::find($request->id);
            $oldPhoto=$oldPhoto->room_photo;
            // Storage::delete('public/room_photos',$oldPhoto);

            $roomPhoto = uniqid() . '_' . $request->file('room_photo')->getClientOriginalName();
            $request->file('room_photo')->storeAs('public/room_photos', $roomPhoto);
            Room::find($request->id)->update([
                'room_photo'=>$roomPhoto,
            ]);
        }

        Room::find($request->id)->update([
            'room_number' => $request->room_number,
            'room_price' => $request->room_price,
            'room_bad' => $request->room_bad,
            'room_person' => $request->room_person,
            'room_floor' => $request->room_floor,
            'room_desc' => $request->room_desc,
            'room_type' => $request->room_type,
            'room_status' => $request->room_status,
        ]);

        $airCon = $request->input('air_con');
        $fun = $request->input('fun');
        $bathRoom = $request->input('bathroom');
        $tv = $request->input('tv');
        $cityView = $request->input('city_view');
        $wifi = $request->input('wifi');
        $breakfast = $request->input('breakfast');
        $lunch = $request->input('lunch');
        $toilet = $request->input('toilet');
        $window = $request->input('window');

        RoomFeature::where('room_id',$request->id)->update([
            'air_con' => $airCon ? 1 : 0,
            'fun' => $fun ? 1 : 0,
            'tv' => $tv ? 1 : 0,
            'city_view' => $cityView ? 1 : 0,
            'breakfast' => $breakfast ? 1 : 0,
            'lunch' => $lunch ? 1 : 0,
            'bathroom' => $bathRoom ? 1 : 0,
            'wifi' => $wifi ? 1 : 0,
            'toilet' => $toilet ? 1 : 0,
            'window' => $window ? 1 : 0,
        ]);

        return back();
    }

    function delete($id){
        Room::find($id)->delete();
        RoomFeature::where('room_id',$id)->delete();
        $roomPhoto=RoomPhoto::where('room_id',$id)->get();
        foreach($roomPhoto as $rp){
            Storage::delete('public/hotel_photos/'.$rp->photo);
        }
        RoomPhoto::where('room_id',$id)->delete();
        return back();
    }
}
