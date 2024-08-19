<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DaftarPermintaanMaterialController;
use App\Http\Controllers\SuratJalanController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\LoginController;


// Route::get('/', [HomeController::class, 'index']);
// use App\Http\Controllers\DaftarPermintaanMaterialController;
// Route::get('/daftar-permintaan-material', [DaftarPermintaanMaterialController::class, 'index'])->name('daftar.permintaan.material');


// Route ke halaman utama (misalnya Dashboard)
Route::get('/', [HomeController::class, 'index'])->name('dashboard');

// Route ke halaman Daftar Permintaan Material
Route::get('/daftar-permintaan-material', [DaftarPermintaanMaterialController::class, 'index'])->name('daftar.permintaan.material');

// Route ke halaman Surat Jalan
Route::get('/surat-jalan', [SuratJalanController::class, 'index'])->name('surat.jalan');

// Route ke halaman Material
Route::get('/material', [MaterialController::class, 'index'])->name('material');

// Route ke halaman Vendor
Route::get('/vendor', [VendorController::class, 'index'])->name('vendor');

// Route ke halaman Login
Route::get('/loginpage', [LoginController::class, 'index'])->name('loginpage');

