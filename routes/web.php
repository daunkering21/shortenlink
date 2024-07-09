<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ShortenedLinksController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.main');
});

Route::get('/home', [DashboardController::class, 'homepage']);


Route::get('/login', [DashboardController::class, 'login'])->name('login');


// ==================== Shortened Links ==================== \\
Route::post('/', [ShortenedLinksController::class, 'store']);
Route::get('/links', [ShortenedLinksController::class, 'latest']);