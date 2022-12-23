<?php

use Illuminate\Support\Facades\Route;

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

// Karyawan Routes
Route::get('/karyawan', [App\Http\Controllers\KaryawanController::class, 'index'])->name('karyawan');
Route::get('/karyawan/create', [App\Http\Controllers\KaryawanController::class, 'create'])->name('karyawan.create');
Route::post('/karyawan/store', [App\Http\Controllers\KaryawanController::class, 'store'])->name('karyawan.store');
Route::get('/karyawan/{id}/edit', [App\Http\Controllers\KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::delete('/karyawan/{id}/delete', [App\Http\Controllers\KaryawanController::class, 'destroy'])->name('karyawan.destroy');

// Penjualan Routes
Route::get('/penjualan', [App\Http\Controllers\PenjualanController::class, 'index'])->name('penjualan');
Route::get('/penjualan/create', [App\Http\Controllers\PenjualanController::class, 'create'])->name('penjualan.create');
Route::post('/penjualan/store', [App\Http\Controllers\PenjualanController::class, 'store'])->name('penjualan.store');
Route::get('/penjualan/{id}/edit', [App\Http\Controllers\PenjualanController::class, 'edit'])->name('penjualan.edit');
Route::delete('/penjualan/{id}/delete', [App\Http\Controllers\PenjualanController::class, 'destroy'])->name('penjualan.destroy');

// Produk Routes
Route::get('/produk', [App\Http\Controllers\ProdukController::class, 'index'])->name('produk');
Route::get('/produk/create', [App\Http\Controllers\ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk/store', [App\Http\Controllers\ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk/{id}/edit', [App\Http\Controllers\ProdukController::class, 'edit'])->name('produk.edit');
Route::delete('/produk/{id}/delete', [App\Http\Controllers\ProdukController::class, 'destroy'])->name('produk.destroy');

// Penjualan Has Produk Routes
Route::get('/penjualanhasproduk', [App\Http\Controllers\PenjualanHasProdukController::class, 'index'])->name('penjualanhasproduk');
Route::get('/penjualanhasproduk/create', [App\Http\Controllers\PenjualanHasProdukController::class, 'create'])->name('penjualanhasproduk.create');
Route::post('/penjualanhasproduk/store', [App\Http\Controllers\PenjualanHasProdukController::class, 'store'])->name('penjualanhasproduk.store');
Route::get('/penjualanhasproduk/{id}/edit', [App\Http\Controllers\PenjualanHasProdukController::class, 'edit'])->name('penjualanhasproduk.edit');
Route::put('/penjualanhasproduk/update', [App\Http\Controllers\PenjualanHasProdukController::class, 'update'])->name('penjualanhasproduk.update');
Route::delete('/penjualanhasproduk/{id}/delete', [App\Http\Controllers\PenjualanHasProdukController::class, 'destroy'])->name('penjualanhasproduk.destroy');
