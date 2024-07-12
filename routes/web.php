<?php

use App\Http\Controllers\ArticlesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ShortenedLinksController;

Route::get('/', function () {
    return view('front.homepage');
});

Route::get('/home', [DashboardController::class, 'homepage']);

// ==================== Dashboard ==================== \\
Route::get('/login', [DashboardController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [DashboardController::class, 'auth']);
Route::get('/logout', [DashboardController::class, 'logout']);
Route::get('/register', [DashboardController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register', [DashboardController::class, 'store']);
Route::get('/features',[DashboardController::class, 'features']);

Route::middleware('auth')->group(function(){
    // Homepage
    Route::get('/dashboard',[DashboardController::class, 'index']);
    Route::get('/dashboard/profile',[DashboardController::class, 'profile']);
    // User Link
    Route::get('/dashboard/link/{username}',[ShortenedLinksController::class, 'index']);
    Route::get('/dashboard/link/{username}/{custom_url}/edit',[ShortenedLinksController::class, 'editCustomUrl']);
    Route::put('/dashboard/link/{username}/{custom_url}',[ShortenedLinksController::class, 'update']);
    Route::delete('/dashboard/link/{username}/{custom_url}',[ShortenedLinksController::class, 'destroy']);

    Route::get('/dashboard/biolink/{username}',[DashboardController::class, 'biolink']);
    Route::get('/dashboard/analytics/{username}',[DashboardController::class, 'analytics']);
    Route::get('/dashboard/articles/{username}',[DashboardController::class, 'articles']);
});

// ==================== Blogs Page ==================== \\
Route::get('/articles',[ArticlesController::class, 'index']);

// ==================== Shortened Links ==================== \\
Route::post('/short', [ShortenedLinksController::class, 'store']);
Route::get('/links', [ShortenedLinksController::class, 'latest']);
Route::get('{shortenedUrl}', [ShortenedLinksController::class, 'goToLink']);