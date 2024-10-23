<?php

use App\Http\Controllers\DaftarAkun;
use App\Http\Controllers\DaftarAkunController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GudangBawahController;
use App\Http\Controllers\DaftarPermintaanMaterialController;
use App\Http\Controllers\DetailSuratController;
use App\Http\Controllers\EditAkun;
use App\Http\Controllers\DpmController;
use App\Http\Controllers\DpmPreviewController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\GudangDPMController;
use App\Http\Controllers\K3Controller;
use App\Http\Controllers\K7Controller;
use App\Http\Controllers\SuratJalanController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ShowForm;

// Route ke halaman Login
Route::get('/', [LoginController::class, 'index'])->name('login');
// proses login
Route::post('proses_login', [LoginController::class, 'proses_login'])->name('proses_login');
// proses logout
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('tabel', [DpmController::class, 'showTable'])->name('tabel');
Route::get('/search', [DpmController::class, 'search']);
// route input DPM
Route::post('/cetaksurat', [DpmController::class, 'store'])->name('cetaksurat');

// Route membuat akun
Route::post('register', [DaftarAkunController::class, 'store'])->name('register');

Route::get('/search_k7', [K7Controller::class, 'search'])->name('search_k7');
//Route cetak surat K7
Route::post('/cetaksuratk7', [K7Controller::class, 'store'])->name('cetaksuratk7');
Route::get('/printk7/{id}/{srtJlnId}', [K7Controller::class, 'cetak'])->name('printk7');
Route::get('/suratk7', [ShowForm::class, 'index'])->name('suratk7');

Route::get('/searchk3', [K3Controller::class, 'searchK3']);
// route input K3
Route::post('/cetaksuratk3', [K3Controller::class, 'store'])->name('cetaksuratk3');

Route::get('/print/{id}/{srtJlnId}', [VendorController::class, 'cetak'])->name('print');
Route::get('/show/{id}/{srtJlnId}', [VendorController::class, 'show'])->name('show');
Route::get('/showK7/{id}/{srtJlnId}', [VendorController::class, 'showK7'])->name('showK7');

// route input nopol dan pengemudi surat jalan
Route::post('/cetaksrtjln', [GudangBawahController::class, 'inputNopolDriver'])->name('cetaksrtjln');
Route::get('/formsrt', [GudangBawahController::class, 'show'])->name('formsrt');
// route ajax show surat jalan
Route::get('/suratongoing', [GudangBawahController::class, 'showSurat'])->name('suratongoing');

//route ke halaman setting
Route::get('/setting', [SettingController::class, 'index'])->name('setting');

// Route ke edit akun
Route::get('/edit-akun', [EditAkun::class, 'index'])->name('edit.akun');
//middleware untuk cek kondisi login
Route::group(['middleware' => ['auth']], function() {
    Route::group(['middleware' => ['cek_login:101']], function() {
        Route::resource('home', HomeController::class);
        Route::resource('daftar-permintaan-material', DaftarPermintaanMaterialController::class);
        Route::resource('surat-jalan', SuratJalanController::class);
        Route::resource('material', MaterialController::class);
        Route::resource('daftar-akun', DaftarAkunController::class);
    });
    Route::group(['middleware' => ['cek_login:103']], function() {
        Route::resource('/gudangbawah', GudangBawahController::class);
    });
    Route::group(['middleware' => ['cek_login:102']], function() {
        Route::resource('/vendor', VendorController::class);
        Route::resource('/dpm', DpmController::class);
        Route::resource('detail-surat', DetailSuratController::class);
        Route::resource('k7', K7Controller::class);
        Route::resource('k3', K3Controller::class);
    });

    Route::patch('/update-dpm/{id}', 'DpmController@update')->name('update.dpm');
});

// Route ke gudang
Route::get('/gudang', [GudangController::class, 'index'])->name('gudang');

// Route ke gudang DPM
Route::get('/gudangdpm', [GudangDPMController::class, 'index'])->name('gudang.dpm');

Route::get('/suratjalan', [GudangController::class, 'index'])->name('suratjalan');

Route::post('/material-baru', [MaterialController::class, 'materialBaru'])->name('materialBaru');
