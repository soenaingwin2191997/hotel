<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Township;
use Illuminate\Http\Request;

class TownshipController extends Controller
{
    function index()
    {
        $townships = Township::all();
        return view('admin.settings.townships', [
            'townships' => $townships,
        ]);
    }

    function create(Request $request)
    {
        $request->validate([
            'township_name' => 'required|max:255',
        ]);

        Township::create([
            'township_name' => $request->township_name,
        ]);

        return back();
    }

    function ajaxTownship(Request $request)
    {
        $data = Township::find($request->id);
        return response($data);
    }

    function update(Request $request)
    {
        $request->validate([
            'township_name' => 'required|max:255',
        ]);

        Township::find($request->id)->update([
            'township_name' => $request->township_name,
        ]);

        return back();
    }

    function delete($id)
    {
        Township::find($id)->delete();
        return back();
    }
}
