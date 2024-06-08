<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubscribeController;
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
// Route::view('/team', 'layout.team')->name('team');
// Route::get('/testimonial', [TestimonialController::class,'index'])->name('testimonial');
Route::view('/register', 'layout.register')->name('register');
Route::post('/registersave',[UserController::class,'register'])->name('registerSave');
// Route::view('/editevent', 'layout.event_edit')->name('editevent');
// Route::post('/addevent', [EventController::class, 'addevent'])->name('addevent');
// Route::view('/editblog', 'layout.blog_edit')->name('editblog');
// Route::post('/addblog', [BlogController::class, 'addblog'])->name('addblog');
Route::resource('donations', DonationController::class);
// Route::view('/testimonialedit', 'layout.testimonial_edit')->name('testimonial_edit');
Route::get('/testimonial', [TestimonialController::class, 'create'])->name('testimonial');
// Route::post('testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');


Route::post('/donate', [DonationController::class, 'donate'])->name('donate');

Route::view('/login','layout.login')->name('login');
Route::post('/login',[AuthController::class,'authLogin'])->name('login.post');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::post('/subscribe', [SubscribeController::class, 'subscribe'])->name('subscribe');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');


Route::group(['middleware' => 'useradmin'], function () {
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('panel.dashboard');

Route::get('/donate', [DonationController::class, 'showForm'])->name('donation.form');
Route::get('/panel/role',[RoleController::class,'list'])->name('roleslist');
Route::get('/panel/role/add',[RoleController::class,'add'])->name('rolesadd');
Route::post('/panel/role/add',[RoleController::class,'insert'])->name('rolesinsert');
Route::get('/panel/role/edit/{id}',[RoleController::class,'edit'])->name('rolesedit');
Route::post('/panel/role/edit/{id}',[RoleController::class,'update'])->name('rolesupdate');
Route::get('/panel/role/delete/{id}',[RoleController::class,'delete'])->name('rolesdelete');


Route::get('/panel/user',[UserController::class,'list'])->name('userslist');
Route::get('/panel/user/add',[UserController::class,'add'])->name('usersadd');
Route::post('/panel/user/add',[UserController::class,'insert'])->name('usersinsert');
Route::get('/panel/user/edit/{id}',[UserController::class,'edit'])->name('usersedit');
Route::post('/panel/user/edit/{id}',[UserController::class,'update'])->name('usersupdate');
Route::get('/panel/user/delete/{id}',[UserController::class,'delete'])->name('usersdelete');

Route::get('/panel/blogs',[BlogController::class,'list'])->name('blogslist');
Route::get('/panel/blogs/add',[BlogController::class,'add'])->name('blogsadd');
Route::post('/panel/blogs/add',[BlogController::class,'insert'])->name('blogsinsert');
Route::get('/panel/blogs/edit/{id}',[BlogController::class,'edit'])->name('blogsedit');
Route::post('/panel/blogs/edit/{id}',[BlogController::class,'update'])->name('blogsupdate');
Route::get('/panel/blogs/delete/{id}',[BlogController::class,'delete'])->name('blogsdelete');

Route::get('/panel/events',[EventController::class,'list'])->name('eventslist');
Route::get('/panel/events/add',[EventController::class,'add'])->name('eventsadd');
Route::post('/panel/events/add',[EventController::class,'insert'])->name('eventsinsert');
Route::get('/panel/events/edit/{id}',[EventController::class,'edit'])->name('eventsedit');
Route::post('/panel/events/edit/{id}',[EventController::class,'update'])->name('eventsupdate');
Route::get('/panel/events/delete/{id}',[EventController::class,'delete'])->name('eventsdelete');


Route::get('/panel/testimonials',[TestimonialController::class,'list'])->name('testimonialslist');
Route::get('/panel/testimonials/add',[TestimonialController::class,'add'])->name('testimonialsadd');
Route::post('/panel/testimonials/add',[TestimonialController::class,'insert'])->name('testimonialsinsert');
Route::get('/panel/testimonials/edit/{id}',[TestimonialController::class,'edit'])->name('testimonialsedit');
Route::post('/panel/testimonials/edit/{id}',[TestimonialController::class,'update'])->name('testimonialsupdate');
Route::get('/panel/testimonials/delete/{id}',[TestimonialController::class,'delete'])->name('testimonialsdelete');

Route::get('/panel/donations',[DonationController::class,'list'])->name('donationslist');
Route::get('/panel/donations/add',[DonationController::class,'add'])->name('donationsadd');
Route::post('/panel/donations/add',[DonationController::class,'insert'])->name('donationsinsert');
Route::get('/panel/donations/edit/{id}', [DonationController::class, 'edit'])->name('donationsedit');
Route::put('/panel/donations/edit/{id}', [DonationController::class, 'update'])->name('donations.update');
Route::get('/panel/donations/delete/{id}',[DonationController::class,'destroy'])->name('donationsdelete');

Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');



});