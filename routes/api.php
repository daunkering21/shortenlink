<?php

use App\Http\Controllers\UserDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/userdata', [UserDataController::class, 'getUserData']);
Route::post('/send-location', [UserDataController::class, 'saveLocation']);