<?php

use App\Livewire\Page\Home;
use App\Livewire\Page\News;
use App\Livewire\Page\Team;
use App\Livewire\Page\Login;
use App\Livewire\Page\Pages;
use App\Livewire\Page\Terms;
use App\Livewire\Page\Contact;
use App\Livewire\Page\Privacy;
use App\Livewire\Page\Features;
use App\Livewire\Page\Feedback;
use App\Livewire\Page\Register;
use App\Livewire\Page\Templates;
use App\Livewire\Page\CookiePolicy;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('livewire-home');
Route::get('/features', Features::class)->name('livewire-features');
Route::get('/pages', Pages::class)->name('livewire-pages');
Route::get('/news', News::class)->name('livewire-news');
Route::get('/contact', Contact::class)->name('livewire-contact');
Route::get('/template', Templates::class)->name('livewire-template');
Route::get('/team', Team::class)->name('livewire-team');
Route::get('/feedback', Feedback::class)->name('livewire-feedback');
Route::get('/privacy', Privacy::class)->name('livewire-privacy');
Route::get('/terms', Terms::class)->name('livewire-terms');
Route::get('/cookie', CookiePolicy::class)->name('livewire-cookie');

Route::get('/login', Login::class)->name('livewire-login');
Route::get('/register', Register::class)->name('livewire-register');