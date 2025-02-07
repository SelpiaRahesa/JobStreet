<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\IsAdmin;
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
Route::get('/job', function () {
    return view('job');
});
Route::get('/detailJob', function () {
    return view('detailJob');
});
Route::get('/jobPost', function () {
    return view('jobPost');
});
Route::get('/pelamar', function () {
    return view('pelamar');
});


Auth::routes(); // Menonaktifkan route registrasi
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', IsAdmin::class]], function () {
    Route::get('/', function () {
        return view('admin.index');
    });
//Route untuk backend
Route::resource('user', App\Http\Controllers\UserController::class);
Route::resource('motivasi', App\Http\Controllers\MotivasiController::class);
Route::resource('bidang', App\Http\Controllers\BidangController::class);
Route::resource('lokasi', App\Http\Controllers\LokasiController::class);
Route::resource('jenis_pekerjaan', App\Http\Controllers\Jenis_pekerjaanController::class);
});

