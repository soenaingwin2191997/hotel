<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\Hotel;
use App\Models\Township;
use App\Models\HotelPhoto;
use App\Models\HotelFeature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    function index()
    {
        $hotels = Hotel::select('*','hotels.id as id')
            ->join('townships', 'townships.id', 'hotels.township_id')->get();
        return view('admin.hotels.hotels', [
            'hotels' => $hotels,
        ]);
    }

    function show(Request $request)
    {
        $hotel = Hotel::select('*')
            ->join('townships', 'townships.id', 'hotels.township_id')
            ->where('hotels.id', $request->id)->first();

        return ($hotel);
    }

    function createPage()
    {
        $townships = Township::all();
        return view('admin.hotels.hotel-add', [
            'townships' => $townships,
        ]);
    }

    function create(Request $request)
    {
        $request->validate([
            'hotel_name' => 'required|max:255',
            'hotel_email' => 'required|max:255',
            'hotel_photo' => 'required|max:5000',
            'hotel_phone' => 'required',
            'hotel_map' => 'required',
            'hotel_address' => 'required',
            'hotel_desc' => 'required',
            'hotel_township' => 'required',
        ]);

        if ($request->file('hotel_photo')) {
            $photoPath = uniqid() . '_' . $request->file('hotel_photo')->getClientOriginalName();
            $request->file('hotel_photo')->storeAs('public/hotel_photos', $photoPath);
        }

        $hotelId = Hotel::create([
            'hotel_name' => $request->hotel_name,
            'hotel_email' => $request->hotel_email,
            'hotel_phone' => $request->hotel_phone,
            'hotel_photo' => $photoPath,
            'hotel_photo_desc' => $request->hotel_photo_desc,
            'hotel_map' => $request->hotel_map,
            'hotel_address' => $request->hotel_address,
            'hotel_desc' => $request->hotel_desc,
            'hotel_township' => $request->hotel_township,
        ]);

        if ($request->file('hotel_other_photo')) {
            foreach ($request->file('hotel_other_photo') as $photo) {
                $path = uniqid() . '_' . $photo->getClientOriginalName();
                $photo->storeAs('public/hotel_photos', $path);
                HotelPhoto::create([
                    'hotel_id' => $hotelId->id,
                    'hotel_other_photo' => $path,
                ]);
            }
        }

        $pool = $request->input('pool');
        $spa = $request->input('spa');
        $carParking = $request->input('car_parking');
        $wifi = $request->input('wifi');
        $restaurant = $request->input('restaurant');
        $gyn = $request->input('gyn');
        $bar = $request->input('bar');
        $airCon = $request->input('air_con');
        $city_view = $request->input('city_view');
        $elevator = $request->input('elevator');
        
        HotelFeature::create([
            'hotel_id' => $hotelId->id,
            'pool' => $pool ? 1 : 0,
            'spa' => $spa ? 1 : 0,
            'car_parking' => $carParking ? 1 : 0,
            'wifi' => $wifi ? 1 : 0,
            'restaurant' => $restaurant ? 1 : 0,
            'gyn' => $gyn ? 1 : 0,
            'bar' => $bar ? 1 : 0,
            'air_con' => $airCon ? 1 : 0,
            'city_view' => $city_view ? 1 : 0,
            'elevator' => $elevator ? 1 : 0,
        ]);

        return back();
    }


    function updatePage($id)
    {
        $townships = Township::all();
        $hotelPhotos = HotelPhoto::where('hotel_id', $id)->get();
        $hotel = Hotel::select('*')
            ->join('hotel_features', 'hotels.id', 'hotel_features.hotel_id')
            ->where('hotels.id', $id)->first();

        return view('admin.hotels.hotel-update', [
            'townships' => $townships,
            'hotel' => $hotel,
            'hotelPhotos' => $hotelPhotos,
        ]);
    }

    function delete($id)
    {
        Hotel::find($id)->delete();
        Room::where('hotel_id', $id)->delete();
        HotelFeature::where('hotel_id', $id)->delete();
        // $hotelPhoto=HotelPhoto::where('hotel_id',$id)->get();
        // foreach($hotelPhoto as $hp){
        //     Storage::delete('public/hotel_photos/'.$hp->hotel_photo);
        // }
        return back();
    }
}
