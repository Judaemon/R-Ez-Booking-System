<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RoomController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// This is here because home of admin and user is the same for now might change later
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'admin', // for specifying url example admin/user (can be removed)
    'middleware' => ['auth', 'admin']
],function () {
    Route::resource('user', UserController::class);
    Route::resource('rental', RentalController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('room', RoomController::class);
    // This is needed if you want to separate home of admin and user
    // Route::get('/', [UserController::class. 'index'])->name('home');
});
