<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function homepage()
    {
        $user = auth()->user();
        if ($user === null){
            $user = 'Guest';
        }
        return view('layouts.main',[
            'user' => $user
        ]);
    }
    public function index()
    {

    }
    public function store(Request $request)
    {

    }
    public function login()
    {
        return 'login';
    }
    public function register()
    {
        return 'register';
    }
}
