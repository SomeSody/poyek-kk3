<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\AuthController;
// use App\Http\Controllers\MultipleuploadsController;


Route::get('/ketua', function () {
    return view('ketua');
});

Route::get('/anggota', function () {
    return view('wanggota');
});

Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('jenis_surat', \App\Http\Controllers\JenisSuratController::class);
Route::resource('permohonans', \App\Http\Controllers\PermohonanController::class);
Route::resource('berkas', \App\Http\Controllers\BerkasController::class);
Route::resource('riwayats', \App\Http\Controllers\RiwayatController::class);


Route::resource('products', \App\Http\Controllers\ProductController::class);

// Route::get('/multipleuploads', 'MultipleuploadsController@index')->name('uploads');
// Route::post('/save', 'MultipleuploadsController@store')->name('uploads.store');

Route::resource('pelanggan', PelangganController::class) ->middleware('checkislogin');

// Route::group(['middleware'=> ['checkrole:Admin']], function()
// {Route::resource('user', UserController::class);});
Route::resource('user', UserController::class);

Route::get('auth', [AuthController::class, 'index'])->name('auth');
Route::post('auth/login', [AuthController::class,'login'])->name('auth.login');
Route::get('auth/logout', [AuthController::class,'logout'])->name('auth.logout');

