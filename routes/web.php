<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
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
Route::get('/user', [UserController::class, 'index']);
Route::get('/level', [LevelController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/user/tambah', [UserController::class, 'tambah'])->name('/user/tambah');
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan'])->name('/user/tambah_simpan');
Route::get('/user/ubah/{id}', [UserController::class, 'ubah'])->name('/user/ubah');
Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan'])->name('/user/ubah_simpan');
Route::get('/user/hapus/{id}', [UserController::class, 'hapus'])->name('/user/hapus');

Route::get('/kategori/create', [KategoriController::class, 'create'])->name('/kategori/create');
Route::post('/kategori', [KategoriController::class, 'store']);
Route::get('kategori/action', [KategoriController::class, 'action'])->name('kategori.action');

// Route untuk menampilkan halaman edit
Route::get('kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');

// Route untuk mengupdate data (gunakan metode PUT atau PATCH)
Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');    

// Route untuk menghapus data
Route::delete('kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

