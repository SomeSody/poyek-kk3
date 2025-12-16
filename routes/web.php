<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\MultipleuploadsController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/ketua', function () {
    return view('ketua');
});

Route::get('/anggota', function () {
    return view('wanggota');
});

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('products', \App\Http\Controllers\ProductController::class);

Route::resource('jenis_surat', JenisSuratController::class);

Route::get('/multipleuploads', 'MultipleuploadsController@index')->name('uploads');

Route::post('/save', 'MultipleuploadsController@store')->name('uploads.store');
