<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/motivation', function () {
    return view('motivation');
});
Route::get('/detailMotivation', function () {
    return view('detailMotivation');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('motivasi', App\Http\Controllers\MotivasiController::class);
Route::resource('bidang', App\Http\Controllers\BidangController::class);
Route::resource('lokasi', App\Http\Controllers\LokasiController::class);
