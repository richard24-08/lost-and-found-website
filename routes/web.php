<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
<<<<<<< HEAD
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController; // 

// =======================
// Redirect root to login
// =======================
Route::get('/', function () {
    return redirect()->route('login');
});
=======
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;

// =======================
// Redirect root ke login
// =======================
Route::get('/', fn() => redirect()->route('login'));
>>>>>>> 4579bda (update baru)

// =======================
// AUTH ROUTES
// =======================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('doLogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// =======================
<<<<<<< HEAD
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
=======
// PROTECTED ROUTES
// =======================
Route::middleware(['auth'])->group(function () {

    // HOME (Dashboard User)
    Route::get('/home', [ReportController::class, 'index'])->name('home');

    // VIEW ALL Reports (non-filtered)
    Route::get('/reports/all', [ReportController::class, 'viewAllReports'])->name('reports.all');

    // REPORT CRUD
    Route::get('/report/create', [ReportController::class, 'create'])->name('report.create');
    Route::post('/report', [ReportController::class, 'store'])->name('report.store');
    Route::get('/report/{id}', [ReportController::class, 'show'])->name('itemdetail'); // <-- Ganti disini!
    Route::get('/report/{id}/edit', [ReportController::class, 'edit'])->name('report.edit');
    Route::put('/report/{id}', [ReportController::class, 'update'])->name('report.update');
    Route::delete('/report/{id}', [ReportController::class, 'destroy'])->name('report.destroy');

    // REPORT yang dimiliki user login
    Route::get('/my-report', [ReportController::class, 'myReports'])->name('report.mine');

    // USER PROFILE
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/profile', [UserController::class, 'update'])->name('update');
});
>>>>>>> 4579bda (update baru)
