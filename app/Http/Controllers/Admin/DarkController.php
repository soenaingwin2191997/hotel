<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DarkController extends Controller
{
    function dark($id){
        User::find($id)->update([
            'dark'=>0,
        ]);
        return back();
    }

    function light($id){
        User::find($id)->update([
            'dark'=>1,
        ]);
        return back();
    }
}
