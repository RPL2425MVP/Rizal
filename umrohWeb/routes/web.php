<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AgenDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman publik
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/paket', [PackageController::class, 'index'])->name('paket.index');
Route::get('/paket/{id}', [PackageController::class, 'show'])->name('paket.show'); // ✅ TAMBAHAN
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

// ✅ Konsultasi: BISA DIKIRIM OLEH PUBLIK (tanpa login)
Route::post('/konsultasi', [ConsultationController::class, 'store'])->name('konsultasi.store');

// Dashboard Agen
Route::middleware(['auth', 'agen'])->group(function () {
    Route::get('/agen/dashboard', [AgenDashboardController::class, 'index'])->name('agen.dashboard');
    Route::put('/agen/konsultasi/{id}', [AgenDashboardController::class, 'updateStatus'])->name('agen.update.status');
});

// Dashboard Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminDashboardController::class, 'users'])->name('admin.users');
    Route::post('/admin/users', [AdminDashboardController::class, 'storeUser'])->name('admin.users.store');
    
    // CRUD Paket & FAQ (untuk admin)
    Route::resource('packages', PackageController::class);
    Route::resource('faqs', FaqController::class);
});

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';