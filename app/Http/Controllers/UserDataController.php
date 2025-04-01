<?php

namespace App\Http\Controllers;

use App\Models\UserData;
use Illuminate\Http\Request;

class UserDataController extends Controller
{
    public function saveLocation(Request $request) 
    {
        $data = $request->validate([
            'geolocation' => 'string',
            'ip' => 'string',
        ]);

        UserData::create($data);
        return response()->json([
            'status' => 'ok',
            'message' => 'success'
        ]);
    }

    public function getUserData()
    {
        $data = UserData::all();
        return response()->json($data);
    }
}
