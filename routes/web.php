<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Global

Route::get('/', function () {
    return view('auth.login');
});

// Admin routes

Route::middleware('admin')->group(function () {
    Route::get('/adminDashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// Manager routes

Route::middleware('manager')->group(function () {
    Route::get('/managerDashboard', function () {
        return view('manager.dashboard');
    })->name('manager.dashboard');
});

// User routes

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
