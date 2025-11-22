<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;

// =======================
// REDIRECT ROOT TO LOGIN
// =======================
Route::get('/', fn() => redirect()->route('login'));

// =======================
// AUTH ROUTES
// =======================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('doLogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// =======================
// PROTECTED ROUTES
// =======================
Route::middleware(['auth'])->group(function () {

    // =======================
    // DASHBOARD & REPORTS
    // =======================
    Route::get('/home', [ReportController::class, 'index'])->name('home');
    Route::get('/reports/all', [ReportController::class, 'viewAllReports'])->name('reports.all');
    Route::get('/my-report', [ReportController::class, 'myReports'])->name('report.mine');

    // =======================
    // REPORT CRUD
    // =======================
    Route::prefix('report')->group(function () {
        Route::get('/create', [ReportController::class, 'create'])->name('report.create');
        Route::post('/', [ReportController::class, 'store'])->name('report.store');
        Route::get('/{report}', [ReportController::class, 'show'])->name('report.show');
        Route::get('/{report}/edit', [ReportController::class, 'edit'])->name('report.edit');
        Route::put('/{report}', [ReportController::class, 'update'])->name('report.update');
        Route::delete('/{report}', [ReportController::class, 'destroy'])->name('report.destroy');
    });

    // =======================
    // ITEMS (jika diperlukan)
    // =======================
    Route::prefix('items')->group(function () {
        Route::get('/', [ItemController::class, 'index'])->name('items.index');
        Route::get('/mine', [ItemController::class, 'myReports'])->name('items.mine');
        Route::get('/create', [ItemController::class, 'create'])->name('items.create');
        Route::post('/', [ItemController::class, 'store'])->name('items.store');
        Route::get('/{id}', [ItemController::class, 'show'])->name('items.show');
    });

    // =======================
    // USER PROFILE - ROUTES YANG DIPERBAIKI
    // =======================
    Route::prefix('user')->group(function () {
        // Profile View
        Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
        
        // Profile Edit Form
        Route::get('/profile/edit', [UserController::class, 'edit'])->name('user.profile.edit');
        
        // Profile Update (General)
        Route::put('/profile', [UserController::class, 'update'])->name('user.profile.update');
        
        // Profile Photo Update Only
        Route::post('/profile/photo', [UserController::class, 'updatePhoto'])->name('user.profile.photo');
    });

});

// =======================
// CATCH-ALL REDIRECT (untuk route yang tidak ditemukan)
// =======================
Route::fallback(fn() => redirect()->route('home'));