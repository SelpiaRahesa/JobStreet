<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isPerusahaan;
// use App\Http\Controllers\Perusahaan\JobPostingController;
// use App\Http\Controllers\Perusahaan\JobPostingController;
// use App\Http\Controllers\Perusahaan\PerusahaanController;

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
// Route user (Frontend)
Route::get('motivation',[App\Http\Controllers\FrontController::class,'motivation'])->name('motivation');
Route::get('/detailMotivation/{id}', [App\Http\Controllers\FrontController::class,'show'])->name('berita');
Route::get('job',[App\Http\Controllers\FrontController::class,'job'])->name('job');
Route::get('detailJob',[App\Http\Controllers\FrontController::class,'detailJob'])->name('detailJob');

Route::group(['prefix' => 'perusahaan', 'middleware' => ['auth', isPerusahaan::class]], function () {
    // Route::get('', [App\Http\Controllers\Perusahaan\PerusahaanController::class, 'index'])->name('perusahaanindex');
    Route::resource('jobPost', App\Http\Controllers\Perusahaan\JobPostingController::class, ['as' => 'perusahaan']);
    Route::resource('perusahaan', App\Http\Controllers\Perusahaan\PerusahaanController::class, ['as' => 'perusahaan']);

});

// Perusahaan hanya bisa akses jobPost
// Route::middleware(['auth', 'role:perusahaan'])->group(function () {
//     Route::get('/', function () {
//         return view('perusahaan.index');
//     });
    // Route::get('/jobPost', [App\Http\Controllers\FrontController::class, 'jobPost'])->name('jobPost');
    // Route::post('/user/perusahaan/store', [App\Http\Controllers\PerusahaanController::class, 'store'])->name('user.perusahaan.store');
    // Route::post('/user/post/store', [App\Http\Controllers\JobPostingController::class, 'store'])->name('user.post.store');
//});

// Pelamar hanya bisa akses pelamar
// Route::middleware(['auth', 'role:pelamar'])->group(function () {
   // Route::get('/pelamar', [App\Http\Controllers\FrontController::class, 'pelamar'])->name('pelamar');
//});

// Route::group(['prefix' => 'petugas', 'middleware' => ['auth', isPerusahaan::class]], function () {
//     Route::get('', [App\Http\Controllers\PerusahaanController::class, 'index'])->name('perusahaandashboard');
//     Route::get('/jobPost', [App\Http\Controllers\FrontController::class, 'jobPost'])->name('jobPost');
// });


Auth::routes(); // Menonaktifkan route registrasi
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', isAdmin::class]], function () {
    Route::get('/', function () {
        return view('admin.index');
    });
//Route untuk backend
Route::resource('user', App\Http\Controllers\UserController::class);
Route::resource('motivasi', App\Http\Controllers\MotivasiController::class);
Route::resource('bidang', App\Http\Controllers\BidangController::class);
Route::resource('lokasi', App\Http\Controllers\LokasiController::class);
Route::resource('jenis_pekerjaan', App\Http\Controllers\Jenis_pekerjaanController::class);
Route::resource('perusahaan', App\Http\Controllers\PerusahaanController::class);
Route::resource('job_postings', App\Http\Controllers\JobPostingController::class);
});


