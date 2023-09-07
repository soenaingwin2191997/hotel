<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

class UserController extends Controller
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
}
