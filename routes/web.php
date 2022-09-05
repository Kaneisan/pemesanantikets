<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\AdminController::class, 'index']);

Route::get('/tiket', [App\Http\Controllers\TiketsController::class, 'index']);
Route::post('/tiket',  [App\Http\Controllers\TiketsController::class, 'store']);
Route::get('/tikettemp', [App\Http\Controllers\TiketsController::class, 'tikettemp'] );
Route::get('/homepage', [App\Http\Controllers\TiketsController::class, 'homepage']);

Route::get('/admin', [App\Http\Controllers\TiketsController::class, 'index']);
Route::middleware(['auth'])->group(function(){
    
    Route::get('/home', [App\Http\Controllers\AdminController::class, 'index']);
    Route::resource('tikets','App\Http\Controllers\TiketsController');
    Route::get('/checkin', [App\Http\Controllers\TiketsController::class, 'checkin']);
    Route::get('/checkindetail', [App\Http\Controllers\TiketsController::class, 'checkindetail']);
    Route::get('/tiketvalid', [App\Http\Controllers\TiketsController::class, 'tiketvalid']);
    Route::get('/laporanuser', [App\Http\Controllers\TiketsController::class, 'laporanuser']);

});

