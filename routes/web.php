<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\PenjualanController;
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

Route::get('/', [WelcomeController::class,'index']);
// Praktikum 3
Route::group(['prefix'=> 'user'], function(){
    Route::get('/',[UserController::class, 'index']);               // Menampilkan halaman user
    Route::post('/list',[UserController::class, 'list'])->name('user.list');           // Menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create',[UserController::class, 'create'])->name('user.create');        // Menampilkan halaman form tambah user
    Route::post('/',[UserController::class, 'store'])->name('user.store');              // Menampilkan data user baru
    Route::get('/{id}',[UserController::class, 'show'])->name('user.show');            // Menampilkan detail user
    Route::get('/{id}/edit',[UserController::class, 'edit'])->name('user.edit');       // Menampilkan halaman form edit user
    Route::put('/{id}',[UserController::class, 'update'])->name('user.update');          // Menyimpan perubahan data user
    Route::delete('/{id}',[UserController::class, 'destroy'])->name('user.destroy');      // Menghapus data user
});

Route::group(['prefix' => 'level'], function () {
    Route::get('/', [LevelController::class, 'index']);
    Route::post('/list', [LevelController::class, 'list'])->name('level.list');
    Route::get('/create', [LevelController::class, 'create'])->name('level.create');
    Route::post('/', [LevelController::class, 'store'])->name('level.store');
    Route::get('/{id}', [LevelController::class, 'show'])->name('level.show');
    Route::get('/{id}/edit', [LevelController::class, 'edit'])->name('level.edit');
    Route::put('/{id}', [LevelController::class, 'update'])->name('level.update');
    Route::delete('/{id}', [LevelController::class, 'destroy'])->name('level.destroy');
});

Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [KategoriController::class, 'index']);
    Route::post('/list', [KategoriController::class, 'list'])->name('kategori.list');
    Route::get('/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/{id}', [KategoriController::class, 'show'])->name('kategori.show');
    Route::get('/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
});

Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [BarangController::class, 'index']);
    Route::post('/list', [BarangController::class, 'list'])->name('barang.list');
    Route::get('/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/{id}', [BarangController::class, 'show'])->name('barang.show');
    Route::get('/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
});

Route::group(['prefix' => 'stok'], function () {
    Route::get('/', [StokController::class, 'index']);
    Route::post('/list', [StokController::class, 'list'])->name('stok.list');
    Route::get('/create', [StokController::class, 'create'])->name('stok.create');
    Route::post('/', [StokController::class, 'store'])->name('stok.store');
    Route::get('/{id}', [StokController::class, 'show'])->name('stok.show');
    Route::get('/{id}/edit', [StokController::class, 'edit'])->name('stok.edit');
    Route::put('/{id}', [StokController::class, 'update'])->name('stok.update');
    Route::delete('/{id}', [StokController::class, 'destroy'])->name('stok.destroy');
});

Route::group(['prefix' => 'penjualan'], function () {
    Route::get('/', [PenjualanController::class, 'index']);
    Route::post('/list', [PenjualanController::class, 'list'])->name('penjualan.list');
    Route::get('/create', [PenjualanController::class, 'create'])->name('penjualan.create');
    Route::post('/', [PenjualanController::class, 'store'])->name('penjualan.store');
    Route::get('/{id}', [PenjualanController::class, 'show'])->name('penjualan.show');
    Route::get('/{id}/edit', [PenjualanController::class, 'edit'])->name('penjualan.edit');
    Route::put('/{id}', [PenjualanController::class, 'update'])->name('penjualan.update');
    Route::delete('/{id}', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');
});

//  Route::get('/user', [UserController::class, 'index']);
//  Route::get('/level', [LevelController::class, 'index']);
//  Route::get('/kategori', [KategoriController::class, 'index'])->name('/kategori/index');
//  Route::get('/user/tambah', [UserController::class, 'tambah'])->name('/user/tambah');
//  Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan'])->name('/user/tambah_simpan');
//  Route::get('/user/ubah/{id}', [UserController::class, 'ubah'])->name('/user/ubah');
//  Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan'])->name('/user/ubah_simpan');
//  Route::get('/user/hapus/{id}', [UserController::class, 'hapus'])->name('/user/hapus');
//  Route::get('/kategori/create', [KategoriController::class, 'create'])->name('/kategori/create');
//  Route::post('/kategori', [KategoriController::class, 'store']);
//  Route::get('kategori/action', [KategoriController::class, 'action'])->name('kategori.action');

//  // Route untuk menampilkan halaman edit
//  Route::get('kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');

// // // Route untuk mengupdate data (gunakan metode PUT atau PATCH)
//  Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');    

//  Route::delete('kategori/hapus/{id}', [KategoriController::class, 'hapus'])->name('kategori.hapus');


//  Route::get('/level/create', [LevelController::class, 'create'])->name('level.create');
//  Route::post('/level', [LevelController::class, 'store'])->name('level.store');