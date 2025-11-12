<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisSuratController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ketua', function () {
    return view('ketua');
});

Route::get('/anggota', function () {
    return view('wanggota');
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('products', \App\Http\Controllers\ProductController::class);

Route::resource('jenis_surat', JenisSuratController::class);
