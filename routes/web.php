<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController; // 

// =======================
// Redirect root to login
// =======================
Route::get('/', function () {
    return redirect()->route('login');
});

// =======================
// AUTH ROUTES
// =======================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('doLogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// =======================
// PROTECTED ROUTES (butuh login)
// =======================
Route::middleware(['auth'])->group(function () {

    // =======================
    // DASHBOARD
    // =======================
    Route::get('/dashboard', [ReportController::class, 'index'])->name('dashboard');

    // =======================
    // REPORT CRUD (Lost & Found)
    // =======================
    Route::get('/report/create', [ReportController::class, 'create'])->name('report.create'); // Form tambah
    Route::post('/report', [ReportController::class, 'store'])->name('report.store');          // Simpan data
    Route::get('/report/{id}/edit', [ReportController::class, 'edit'])->name('report.edit');   // Form edit
    // Route::put('/report/{id}', [ReportController::class, 'update'])->name('report.update');    // Update data
    Route::put('/report/{report}', [ReportController::class, 'update'])->name('report.update');    // Update data
    // Route::delete('/report/{id}', [ReportController::class, 'destroy'])->name('report.destroy'); // Hapus data
    Route::delete('/report/{report}', [ReportController::class, 'destroy'])->name('report.destroy'); // Hapus data

    // =======================
    // ITEMS (kalau kamu tetap mau ItemController)
    // =======================
    Route::prefix('items')->group(function () {
        Route::get('/', [ItemController::class, 'index'])->name('items.index');
        Route::get('/mine', [ItemController::class, 'myReports'])->name('items.mine');
        Route::get('/create', [ItemController::class, 'create'])->name('items.create');
        Route::post('/', [ItemController::class, 'store'])->name('items.store');
        Route::get('/{id}', [ItemController::class, 'show'])->name('items.show');
    });

    // =======================
    // USER PROFILE
    // =======================
    Route::prefix('user')->group(function () {
        Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
        Route::post('/profile', [UserController::class, 'update'])->name('user.update');
    });

    // =======================
    // STATIC PAGES (langsung view)
    // =======================
    Route::view('/report-new-item', 'reportnewitem')->name('reportnewitem');
    Route::view('/item-detail', 'itemdetail')->name('itemdetail');
    Route::view('/profile', 'profile')->name('profile');
    Route::view('/my-report', 'myreport')->name('myreport');
});