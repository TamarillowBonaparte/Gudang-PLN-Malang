<?php

use App\Http\Controllers\DaftarAkun;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GudangBawahController;
use App\Http\Controllers\DaftarPermintaanMaterialController;
use App\Http\Controllers\EditAkun;
use App\Http\Controllers\DpmController;
use App\Http\Controllers\K3Controller;
use App\Http\Controllers\K7Controller;
use App\Http\Controllers\SuratJalanController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MaterialController;

// Route ke halaman Login
Route::get('/', [LoginController::class, 'index'])->name('login');
// proses login
Route::post('proses_login', [LoginController::class, 'proses_login'])->name('proses_login');
// proses logout
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Route ke halaman Login
Route::get('/daftar-akun', [DaftarAkun::class, 'index'])->name('daftar.akun');

// Route ke edit akun
Route::get('/edit-akun', [EditAkun::class, 'index'])->name('edit.akun');
//middleware untuk cek kondisi login
Route::group(['middleware' => ['auth']], function() {
    Route::group(['middleware' => ['cek_login:101']], function() {
        Route::resource('home', HomeController::class);
        Route::resource('daftar-permintaan-material', DaftarPermintaanMaterialController::class);
        Route::resource('surat-jalan', SuratJalanController::class);
        Route::resource('material', MaterialController::class);
        Route::resource('daftar-akun', DaftarAkun::class);
    });
    Route::group(['middleware' => ['cek_login:103']], function() {
        Route::resource('gudangbawah', GudangBawahController::class);
    });
    Route::group(['middleware' => ['cek_login:102']], function() {
        Route::resource('vendor', VendorController::class);
        Route::resource('dpm', DpmController::class);
        Route::resource('k7', K7Controller::class);
        Route::resource('k3', K3Controller::class);
    });
});
