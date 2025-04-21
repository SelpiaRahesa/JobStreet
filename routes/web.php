<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PelamarController;

use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isPerusahaan;

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


Route::group(['prefix' => 'admin', 'middleware' => ['auth', isAdmin::class]], function () {
    //Route untuk backend
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::resource('motivasi', App\Http\Controllers\MotivasiController::class);
    Route::resource('bidang', App\Http\Controllers\BidangController::class);
    Route::resource('lokasi', App\Http\Controllers\LokasiController::class);
    Route::resource('jenis_pekerjaan', App\Http\Controllers\Jenis_pekerjaanController::class);
    Route::resource('perusahaan', App\Http\Controllers\PerusahaanController::class);
    Route::resource('pelamar', App\Http\Controllers\PelamarController::class);
    Route::resource('job_postings', App\Http\Controllers\JobPostingController::class);
    // Route untuk update status job posting
    Route::patch('/admin/job_postings/{jobPosting}/updateStatus', [App\Http\Controllers\JobPostingController::class, 'updateStatus'])->name('admin.job_postings.updateStatus');
    Route::get('/admin/jobPost', [App\Http\Controllers\JobPostingController::class, 'index'])->name('admin.jobPost.index');
    Route::patch('/jobPost/{id}/status', [App\Http\Controllers\JobPostingController::class, 'updateStatus'])->name('jobPost.updateStatus');
});

// Route user (Frontend)
Route::get('/', function () {
    return view('welcome');
});
Route::get('motivation', [App\Http\Controllers\FrontController::class, 'motivation'])->name('motivation');
Route::get('/detailMotivation/{id}', [App\Http\Controllers\FrontController::class, 'show'])->name('berita');
Route::get('job', [App\Http\Controllers\FrontController::class, 'job'])->name('job');
Route::get('/job/{id}', [App\Http\Controllers\FrontController::class, 'show'])->name('job.show');
Route::get('detailJob/{id}', [App\Http\Controllers\FrontController::class, 'detailJob'])->name('detailJob');

// Route::group(['prefix' => 'perusahaan', 'middleware' => ['auth', isPerusahaan::class]], function () {
//     Route::resource('jobPost', App\Http\Controllers\Perusahaan\JobPostingController::class, ['as' => 'perusahaan']);
//     Route::resource('perusahaan', App\Http\Controllers\Perusahaan\PerusahaanController::class, ['as' => 'perusahaan']);
//     Route::get('', [App\Http\Controllers\Perusahaan\PerusahaanController::class, 'index'])->name('perusahaanindex');
//     Route::resource('jobPost', App\Http\Controllers\Perusahaan\JobPostingController::class, ['as' => 'perusahaan']);
// });

Route::group(['prefix' => 'perusahaan'], function () {
    Route::resource('jobPost', App\Http\Controllers\Perusahaan\JobPostingController::class, ['as' => 'perusahaan']);
    Route::resource('perusahaan', App\Http\Controllers\Perusahaan\PerusahaanController::class, ['as' => 'perusahaan']);
});


Route::middleware(['auth'])->group(function () {
    Route::get('/pelamar', [PelamarController::class, 'apply'])->name('pelamar');
    Route::post('/pelamar/store', [PelamarController::class, 'store'])->name('pelamar.store');
    // Route::resource('pelamar', PelamarController::class);
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


// Route::middleware(['auth', 'role:pelamar'])->group(function () {
// Route::get('/pelamar', [App\Http\Controllers\FrontController::class, 'pelamar'])->name('pelamar');
// });

// Route::group(['prefix' => 'petugas', 'middleware' => ['auth', isPerusahaan::class]], function () {
//     Route::get('', [App\Http\Controllers\PerusahaanController::class, 'index'])->name('perusahaandashboard');
//     Route::get('/jobPost', [App\Http\Controllers\FrontController::class, 'jobPost'])->name('jobPost');
// });

Auth::routes(); // Menonaktifkan route registrasi
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
