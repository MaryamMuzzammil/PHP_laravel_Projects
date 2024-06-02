<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::view('/index', 'layout.index')->name('home');
Route::get('/index',[EventController::class,'index2'])->name('home');
Route::get('/index',[BlogController::class,'index2b'])->name('home');
// Route::view('/event', 'layout.event')->name('event');
Route::get('/event',[EventController::class,'index'])->name('event');
Route::view('/contact', 'layout.contact')->name('contact');
Route::get('/blogs',[BlogController::class,'index'])->name('blogs');
Route::view('/about', 'layout.about')->name('about');
Route::view('/activity', 'layout.activity')->name('activity');
Route::view('/sermons', 'layout.sermons')->name('sermons');
Route::view('/team', 'layout.team')->name('team');
Route::view('/testimonial', 'layout.testimonial')->name('testimonial');
Route::view('/register', 'layout.register')->name('register');
Route::post('/registersave',[UserController::class,'register'])->name('registerSave');



Route::view('/login','layout.login')->name('login');
Route::post('/login',[AuthController::class,'authLogin'])->name('login.post');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::group(['middleware' => 'useradmin'], function () {
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('panel.dashboard');
});