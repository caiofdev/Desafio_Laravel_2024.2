<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Global

Route::get('/', function () {
    return view('auth.login');
});

// Admin routes

Route::middleware('admin')->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Manage routes

    Route::get('/admin/manage/managers', [ManagerController::class, 'index'])->name('admin.manager');
    Route::get('/admin/manage/managers/create', [ManagerController::class, 'create'])->name('manager.create');
    Route::post('/admin/manage/managers/create', [ManagerController::class, 'store'])->name('manager.store');
    Route::get('/admin/manage/managers/{id}', [ManagerController::class, 'view'])->name('manager.view');
    Route::get('/admin/manage/managers/update/{id}', [ManagerController::class, 'edit'])->name('manager.edit');
    Route::patch('/admin/manage/managers/update/{id}', [ManagerController::class, 'update'])->name('manager.update');
    Route::delete('/admin/manage/managers/delete/{id}', [ManagerController::class, 'destroy'])->name('manager.destroy');
    
    Route::get('/admin/manage/admins', [AdminController::class, 'index'])->name('admin.admin');
    Route::get('/admin/manage/admins/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/manage/admins/create', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/manage/admins/{id}', [AdminController::class, 'view'])->name('admin.view');
    Route::get('/admin/manage/admins/update/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::patch('/admin/manage/admins/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/manage/admins/delete/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
});

// Manager routes

Route::middleware('manager')->group(function () {

    Route::get('/manager/dashboard', function () {
        return view('manager.dashboard');
    })->name('manager.dashboard');

    Route::get('/manager/transaction', function () {
        return view('manager.transaction');
    })->name('manager.transaction');

    Route::get('/manager/loan', function () {
        return view('manager.loan');
    })->name('manager.loan');

    // Manage routes

    Route::get('/manager/manage/users', [UserController::class, 'index'])->name('manager.user');
    Route::get('/manager/manage/users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/manager/manage/users/create', [UserController::class, 'store'])->name('user.store');
    Route::get('/manager/manage/users/{id}', [UserController::class, 'view'])->name('user.view');
    Route::get('/manager/manage/users/update/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('/manager/manage/users/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/manager/manage/users/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

// User routes

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/transaction', function () {
        return view('transaction');
    })->name('transaction');

    Route::get('/loan', function () {
        return view('loan');
    })->name('loan');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
