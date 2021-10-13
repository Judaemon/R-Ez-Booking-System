<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TransactionsController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// paths going to home 
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [HomeController::class, 'index'])->name('home');
Route::get('/user', [HomeController::class, 'index'])->name('home');

// profile link
Route::get('/viewProfile', [HomeController::class, 'viewProfile'])->name('viewProfile');

// for user only links
Route::group([
    'prefix' => 'user', // for specifying url example admin/user (can be removed)
    'middleware' => ['auth', 'user']
],function () {
    // all paths for customer only
});

// for admin only links
Route::group([
    'prefix' => 'admin', // for specifying url example admin/user (can be removed)
    'middleware' => ['auth', 'admin']
],function () {
    Route::resource('user', UserController::class);
    Route::resource('rental', RentalController::class);
    Route::resource('room', RoomController::class);

    Route::view('/transaction', 'transaction')->name('transaction');
    Route::view('/report', 'report')->name('report');

    // Dapat ma move yung mga route ng tables sa ganto kasi mali yung pag gamit ng show method
    Route::get('showAllRental', [RentalController::class, 'showAllRental'])->name('showAllRental');
    Route::get('showAllTransaction', [TransactionsController::class, 'showAllTransaction'])->name('showAllTransaction');
    
    Route::get('getAllTransaction', [TransactionsController::class, 'getAllTransaction'])->name('getAllTransaction');
});
