<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Laporan;
use App\Http\Controllers\PenjualanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [AuthController::class, 'formLogin'])->middleware(['guest'])->name('login');
Route::post('/login/store', [AuthController::class, 'login'])->middleware(['guest']);

Route::get('/home', function () {
   return redirect('/barang');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/dashboard', [UserController::class, 'dashboard']);

    //barang
    Route::get('/barang', [BarangController::class, 'index']);
    Route::get('/barang/form', [BarangController::class, 'create']);
    Route::post('/barang/store', [BarangController::class, 'store']);
    Route::get('/barang/destroy/{id}', [BarangController::class, 'destroy']);
    Route::post('/barang/update/{id}', [BarangController::class, 'update']);
    Route::post('/barang/diskon/{id}', [BarangController::class, 'test']);

    //pelanggan
    Route::get('/pelanggan/', [PelangganController::class, 'index']);
    Route::get('/pelanggan/form', [PelangganController::class, 'create']);
    Route::post('/pelanggan/store', [PelangganController::class, 'store']);
    Route::get('/pelanggan/destroy/{id}', [PelangganController::class, 'destroy']);
    Route::post('/pelanggan/update/{id}', [PelangganController::class, 'update']);

    Route::middleware(['userAkses:Admin'])->group(function () {
        //petugas
        Route::get('/petugas', [UserController::class, 'index']);
        Route::get('/petugas/form', [UserController::class, 'create']);
        Route::post('/petugas/store', [UserController::class, 'store']);
        Route::get('/petugas/destroy/{id}', [UserController::class, 'destroy']);
        Route::post('/petugas/update/{id}', [UserController::class, 'update']);

        //laporan
        Route::get('/laporan', [Laporan::class, 'index']);
        Route::get('/laporan/stok', [Laporan::class, 'stok']);
        Route::get('/laporan/form', [Laporan::class, 'create']);
        Route::post('/laporan/store', [Laporan::class, 'store']);
        Route::get('/laporan/destroy/{id}', [Laporan::class, 'destroy']);
        Route::post('/laporan/update/{id}', [Laporan::class, 'update']);
    });


    Route::middleware(['userAkses:Petugas'])->group(function () {

        Route::get('/penjualan', [PenjualanController::class, 'index']);
        Route::get('/struk', [PenjualanController::class, 'struk'])->name('struk');
        Route::get('/penjualan/form', [PenjualanController::class, 'create']);
        Route::post('/penjualan/store', [PenjualanController::class, 'store']);
        Route::post('/penjualan/store/pelanggan{id}', [PenjualanController::class, 'storepel']);
        Route::get('/penjualan/destroy/{id}', [PenjualanController::class, 'destroy']);
        Route::post('/penjualan/update/{id}', [PenjualanController::class, 'update']);
    });
    

});
