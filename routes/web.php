<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/index',[UserController::class,'show'])->name('home');
Route::get('/event',[UserController::class,'show_event'])->name('event');
Route::get('/contact',[UserController::class,'show_contact'])->name('contact');
Route::get('/blogs',[UserController::class,'show_blogs'])->name('blogs');
Route::get('/about',[UserController::class,'show_about'])->name('about');
Route::get('/activity',[UserController::class,'show_activity'])->name('activity');
Route::get('/sermons',[UserController::class,'show_sermons'])->name('sermons');
Route::get('/team',[UserController::class,'show_team'])->name('team');
Route::get('/testimonial',[UserController::class,'show_testimonial'])->name('testimonial');
<<<<<<< HEAD
=======
Route::get('/login',[UserController::class,'show_login'])->name('login');
>>>>>>> maryam
// Route::get('/user',[userController::class,'show'])->name('home');///