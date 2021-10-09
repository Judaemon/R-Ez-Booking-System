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

// paths going to their designated home
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [HomeController::class, 'index'])->name('home');
Route::get('/user', [HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'user', // for specifying url example admin/user (can be removed)
    'middleware' => ['auth', 'user']
],function () {
    // all paths for customer only
});

Route::group([
    'prefix' => 'admin', // for specifying url example admin/user (can be removed)
    'middleware' => ['auth', 'admin']
],function () {
    Route::resource('user', UserController::class);
    Route::resource('rental', RentalController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('room', RoomController::class);
});
