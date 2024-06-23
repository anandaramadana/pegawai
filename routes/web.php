<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\PegawaiController;
use App\Models\Pegawai;

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
    return view('index');
});

// Login & Register
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// List Pegawai
Route::get('/list-pegawai', [PegawaiController::class, 'index'])->name('list-pegawai');
Route::get('/detail-pegawai/{id}', [PegawaiController::class, 'show'])->name('detail-pegawai');

// Akses Admin
Route::group(['middleware' => ['auth', 'CekRole:admin']], function () {
    // Dashboard
    Route::get('/admin', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Logout
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    // Tabel Fakultas
    Route::get('/fakultas', [FakultasController::class, 'fakultas'])->name('fakultas');
    Route::post('/tambah_fakultas', [FakultasController::class,'tambah_fakultas'])->name('tambah_fakultas');
    Route::get('/fakultas/{id}/edit', [FakultasController::class,'update_fakultas'])->name('update_fakultas');
    Route::post('/fakultas/{id}/update_fakultas', [FakultasController::class,'edit_fakultas'])->name('edit_fakultas');
    Route::get('/fakultas/{id}/delete', [FakultasController::class,'delete_fakultas'])->name('delete_fakultas');
    
    // Tabel Pegawai
    Route::get('/pegawai', [PegawaiController::class, 'pegawai'])->name('pegawai');
    Route::post('/tambah_pegawai', [PegawaiController::class,'tambah_pegawai'])->name('tambah_pegawai');
    Route::get('/pegawai/{id}/edit', [PegawaiController::class,'update_pegawai'])->name('update_pegawai');
    Route::post('/pegawai/{id}/update_pegawai', [PegawaiController::class,'edit_pegawai'])->name('edit_pegawai');
    Route::get('/pegawai/{id}/delete', [PegawaiController::class,'delete_pegawai'])->name('delete_pegawai');
});
