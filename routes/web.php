<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestimonialController;

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
Route::get('/testimonial', [TestimonialController::class,'index'])->name('testimonial');
Route::view('/register', 'layout.register')->name('register');
Route::post('/registersave',[UserController::class,'register'])->name('registerSave');
Route::view('/editevent', 'layout.event_edit')->name('editevent');
Route::post('/addevent', [EventController::class, 'addevent'])->name('addevent');
Route::view('/editblog', 'layout.blog_edit')->name('editblog');
Route::post('/addblog', [BlogController::class, 'addblog'])->name('addblog');
Route::resource('donations', DonationController::class);

Route::get('/donate', [DonationController::class, 'showForm'])->name('donation.form');
Route::post('/donate', [DonationController::class, 'donate'])->name('donate');

Route::view('/login','layout.login')->name('login');
Route::post('/login',[AuthController::class,'authLogin'])->name('login.post');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::group(['middleware' => 'useradmin'], function () {
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('panel.dashboard');




Route::view('/testimonialedit', 'layout.testimonial_edit')->name('testimonial_edit');
// Route::get('/testimonial', [TestimonialController::class, 'create'])->name('testimonial');
Route::post('testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');




});