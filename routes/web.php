<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminController;

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
    // DASHBOARD ROUTES
    // =======================
    Route::get('/home', [ReportController::class, 'index'])->name('home');
    
    // =======================
    // ADMIN ROUTES (Hanya untuk admin & guru)
    // =======================
    Route::middleware(['check.admin'])->prefix('admin')->group(function () {
        // Dashboard
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        
        // User Management
        Route::prefix('users')->group(function () {
            Route::get('/', [AdminController::class, 'userList'])->name('admin.users');
            Route::delete('/{id}', [AdminController::class, 'destroy'])->name('admin.users.delete');
        });
        
        // =======================
        // REPORT LIST ROUTES (Sederhana: hanya tampil dan hapus)
        // =======================
        Route::prefix('reports')->group(function () {
            Route::get('/list', [ReportController::class, 'reportList'])->name('admin.reports.list');
            Route::get('/lost', [ReportController::class, 'lostReports'])->name('admin.reports.lost');
            Route::get('/found', [ReportController::class, 'foundReports'])->name('admin.reports.found');
            Route::delete('/{report}', [ReportController::class, 'destroy'])->name('admin.reports.delete');
        });
    });

    // =======================
    // REPORT ROUTES (Untuk semua user yang login)
    // =======================
    Route::prefix('reports')->group(function () {
        Route::get('/create', [ReportController::class, 'create'])->name('reports.create');
        Route::post('/', [ReportController::class, 'store'])->name('reports.store');

        // 🔥 Route khusus HARUS ADA DI ATAS route {report}
        Route::get('/my-reports', [ReportController::class, 'myReports'])->name('reports.mine');
        Route::get('/all', [ReportController::class, 'viewAllReports'])->name('reports.all');

        // 🔥 Route dinamis letakkan PALING BAWAH
        Route::get('/{report}', [ReportController::class, 'show'])->name('reports.show');
        Route::get('/{report}/edit', [ReportController::class, 'edit'])->name('reports.edit');
        Route::put('/{report}', [ReportController::class, 'update'])->name('reports.update');
        Route::delete('/{report}', [ReportController::class, 'destroy'])->name('reports.destroy');
    });

    // =======================
    // USER PROFILE ROUTES
    // =======================
    Route::prefix('profile')->group(function () {
        Route::get('/', [UserController::class, 'profile'])->name('profile');
        Route::get('/edit', [UserController::class, 'edit'])->name('profile.edit');
        Route::put('/', [UserController::class, 'update'])->name('profile.update');
        Route::post('/photo', [UserController::class, 'updatePhoto'])->name('profile.photo');
    });

});

// =======================
// CATCH-ALL REDIRECT
// =======================
Route::fallback(fn() => redirect()->route('home'));