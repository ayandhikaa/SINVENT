<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use Illuminate\Support\Facades\Route;

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.submit');


// Rute yang memerlukan autentikasi
Route::middleware('auth')->group(function () {
    // Rute kategori dan barang hanya dapat diakses jika pengguna sudah login
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('kategori', KategoriController::class);
    Route::resource('barang', BarangController::class);
    Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::resource('barangmasuk', BarangMasukController::class);
    Route::resource('barangkeluar', \App\Http\Controllers\BarangKeluarController::class);

    // Rute logout
    Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout');
});
