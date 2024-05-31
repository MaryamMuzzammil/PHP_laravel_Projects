<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/,/index',[UserController::class,'show'])->name('home');
Route::get('/event',[UserController::class,'show_event'])->name('event');
Route::get('/contact',[UserController::class,'show_contact'])->name('contact');
Route::get('/blogs',[UserController::class,'show_blogs'])->name('blogs');
Route::get('/about',[UserController::class,'show_about'])->name('about');
Route::get('/activity',[UserController::class,'show_activity'])->name('activity');
Route::get('/sermons',[UserController::class,'show_sermons'])->name('sermons');
Route::get('/team',[UserController::class,'show_team'])->name('team');
Route::get('/testimonial',[UserController::class,'show_testimonial'])->name('testimonial');
Route::get('/login',[UserController::class,'show_login'])->name('login');
// Route::get('/user',[userController::class,'show'])->name('home');///


Route::get('/loginn',[AuthController::class,'login']);
Route::post('/authlogin',[AuthController::class,'authLogin']);
Route::get('logout',[AuthController::class,'logout']);
Route::get('test',[UserController::class,'test']);


Route::group(['middleware' => 'useradmin'], function () {
    Route::get('/panel/dashboard',[DashboardController::class,'dashboard']);


    Route::get('/panel/role',[RoleController::class,'list']);
    Route::get('/panel/role/add',[RoleController::class,'add']);
    Route::post('/panel/role/add',[RoleController::class,'insert']);
    Route::get('/panel/role/edit/{id}',[RoleController::class,'edit']);
    Route::post('/panel/role/edit/{id}',[RoleController::class,'update']);
    Route::get('/panel/role/delete/{id}',[RoleController::class,'delete']);


    Route::get('/panel/user',[UserController::class,'list']);
    Route::get('/panel/user/add',[UserController::class,'add']);
    Route::post('/panel/user/add',[UserController::class,'insert']);
    Route::get('/panel/user/edit/{id}',[UserController::class,'edit']);
    Route::post('/panel/user/edit/{id}',[UserController::class,'update']);
    Route::get('/panel/user/delete/{id}',[UserController::class,'delete']);


});