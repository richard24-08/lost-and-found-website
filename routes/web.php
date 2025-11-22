<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;

// =======================
// Redirect root ke login
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
    // DASHBOARD
    // =======================
    Route::get('/home', [ReportController::class, 'index'])->name('home');

    Route::get('/reports/all', [ReportController::class, 'viewAllReports'])->name('reports.all');

    // =======================
    // REPORT CRUD (Lost & Found)
    // =======================
    Route::get('/report/create', [ReportController::class, 'create'])->name('report.create');
    Route::post('/report', [ReportController::class, 'store'])->name('report.store');
    Route::get('/report/{report}', [ReportController::class, 'show'])->name('report.show');
    Route::get('/report/{report}/edit', [ReportController::class, 'edit'])->name('report.edit');
    Route::put('/report/{report}', [ReportController::class, 'update'])->name('report.update');
    Route::delete('/report/{report}', [ReportController::class, 'destroy'])->name('report.destroy');

    // =======================
    // MY REPORTS
    // =======================
    Route::get('/my-report', [ReportController::class, 'myReports'])->name('report.mine');

    // =======================
    // ITEMS (optional)
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
    // STATIC VIEWS
    // =======================
    Route::view('/report-new-item', 'reportnewitem')->name('reportnewitem');
    Route::get('/report/{report}', [ReportController::class, 'show'])->name('itemdetail');
    Route::view('/profile', 'profile')->name('profile');

    // di web.php - pastikan ada route update
    Route::put('/report/{report}', [ReportController::class, 'update'])->name('report.update');
});
