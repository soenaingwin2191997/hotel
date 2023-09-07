<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserRoomController extends Controller
{
    function show(){
        return view('users.room-detail');
    }
}
