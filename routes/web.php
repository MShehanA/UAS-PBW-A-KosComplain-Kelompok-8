<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\AdminController;

Route::get('/', fn () => auth()->check()
    ? redirect()->route(auth()->user()->role === 'admin' ? 'admin.dashboard' : 'resident.dashboard')
    : redirect()->route('login'));

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware(['auth', 'role:penghuni'])->prefix('penghuni')->name('resident.')->group(function () {
    Route::get('/dashboard', [ResidentController::class, 'dashboard'])->name('dashboard');
    Route::get('/keluhan/buat', [ResidentController::class, 'create'])->name('complaints.create');
    Route::post('/keluhan', [ResidentController::class, 'store'])->name('complaints.store');
    Route::get('/keluhan', [ResidentController::class, 'index'])->name('complaints.index');
    Route::get('/keluhan/{complaint}', [ResidentController::class, 'show'])->name('complaints.show');
    Route::get('/profil', [ResidentController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profil', [ResidentController::class, 'updateProfile'])->name('profile.update');
});
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/keluhan', [AdminController::class, 'index'])->name('complaints.index');
    Route::get('/keluhan/{complaint}', [AdminController::class, 'show'])->name('complaints.show');
    Route::put('/keluhan/{complaint}/status', [AdminController::class, 'updateStatus'])->name('complaints.status');
    Route::post('/keluhan/{complaint}/tanggapan', [AdminController::class, 'respond'])->name('complaints.respond');
    Route::get('/profil', [AdminController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profil', [AdminController::class, 'updateProfile'])->name('profile.update');
});
