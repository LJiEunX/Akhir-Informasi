<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsAdmin;

Route::get('/', function () {
    return redirect()->route('login'); // Arahkan root ke login
});

// Route yang hanya bisa diakses oleh user yang sudah login
Route::middleware(['auth'])->group(function () {

    // Dashboard tersedia untuk semua user login
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Halaman profil (opsional)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route khusus admin
    Route::middleware([IsAdmin::class])->group(function () {
        Route::resource('karyawan', KaryawanController::class);
        Route::resource('gaji', GajiController::class);
    });
});

require __DIR__.'/auth.php';