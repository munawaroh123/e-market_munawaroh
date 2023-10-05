<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\barangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PembelianController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, "index"]);
Route::get('profile', [HomeController::class, "profile"]);
Route::get('contact', [HomeController::class, "contact"]);
Route::get('faq', [HomeController::class, "faq"]);
Route::resource('produk', ProdukController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('pemasok', PemasokController::class);
Route::resource('barang', barangController::class);
Route::resource('pembelian', PembelianController::class);
//login
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login/cek', [UserController::class, 'ceklogin'])->name('cekLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
//route yang sudah login
Route::group(['milddware'=>'auth'], function(){
    Route::get('/', [HomeController::class, 'index']);
    Route::get('profile', [HomeController::class, 'profile']);
    Route::get('contact', [HomeController::class, 'contact']);
});
//route untuk admin
Route::group(['middleware'=>['cekUserLogin:1']], function(){
    Route::resource('produk', ProdukController::class);
});
//route untuk kasir
Route::group(['middleware'=>['cekUserLogin:2']], function(){
    Route::resource('pembelian', PembelianController::class);
});