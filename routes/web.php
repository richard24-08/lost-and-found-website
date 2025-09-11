<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

// Halaman utama -> arahkan ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// =======================
// Auth Routes
// =======================
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'doLogin'])->name('doLogin');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'doRegister'])->name('doRegister');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// =======================
// Barang Routes
// =======================
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
Route::get('/barang/{id}', [BarangController::class, 'show'])->name('barang.show');

// =======================
// User Routes
// =======================
Route::get('/user/{userId}/profile', [UserController::class, 'profile'])->name('user.profile');
Route::post('/user/profile', [UserController::class, 'update'])->name('user.update');
