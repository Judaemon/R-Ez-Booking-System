<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;

use App\Models\Transactions;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

// paths going to home 
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [HomeController::class, 'index'])->name('home');
Route::get('/user', [HomeController::class, 'index'])->name('home');

// profile link
Route::get('/viewProfile', [HomeController::class, 'viewProfile'])->name('viewProfile');
Route::get('/editProfile', [HomeController::class, 'editProfile'])->name('editProfile');
Route::post('/updateProfile', [HomeController::class, 'updateProfile'])->name('updateProfile');

// welcome page paths
Route::view('/gallery', 'gallery')->name('gallery');
Route::view('/activities', 'activities')->name('activities');
Route::view('/contact', 'contact')->name('contact');


// Booking links
Route::post('getAvailableRooms', [TransactionsController::class, 'getAvailableRooms'])->name('getAvailableRooms');
Route::post('getAvailableRentals', [TransactionsController::class, 'getAvailableRentals'])->name('getAvailableRentals');

// Transactions links
// Route::get('showAllTransaction', [TransactionsController::class, 'showAllTransaction'])->name('showAllTransaction');

// for user only links
Route::group([
    'prefix' => 'user', // for specifying url example admin/user (can be removed)
    'middleware' => ['auth', 'user']
],function () {
    // all paths for customer only
    Route::resource('customer', customerController::class);
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
    Route::view('/scheduler', 'scheduler')->name('scheduler');

    // report paths
    Route::view('/report', 'report')->name('report');
    Route::get('/getGraphData', [ReportController::class, 'getGraphData'])->name('getGraphData');

    // dashboard paths
    Route::get('/getUserCount', [DashboardController::class, 'getUserCount'])->name('getUserCount');

    // Dapat ma move yung mga route ng tables sa ganto kasi mali yung pag gamit ng show method
    Route::get('showAllRental', [RentalController::class, 'showAllRental'])->name('showAllRental');
    Route::get('showAllUser', [UserController::class, 'showAllUser'])->name('showAllUser');
    Route::get('showAllRoom', [RoomController::class, 'showAllRoom'])->name('showAllRoom');
    Route::get('/getGraphData', [ReportController::class, 'getGraphData'])->name('getGraphData');

    

    Route::get('showAllTransaction', [TransactionsController::class, 'showAllTransaction'])->name('showAllTransaction');
    
    Route::get('getAllTransaction', [TransactionsController::class, 'getAllTransaction'])->name('getAllTransaction');
});
