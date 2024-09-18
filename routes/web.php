<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PendencyController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\SendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('admin')->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/send-email', [MailController::class, 'index'])->name('admin.view-email');
    Route::post('/admin/send-email', [MailController::class, 'sendEmail'])->name('admin.email');

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

Route::middleware('manager')->group(function () {

    Route::get('/manager/dashboard', [ManagerController::class, 'dashboard'])->name('manager.dashboard');

    Route::get('/manager/transaction', [AccountController::class, 'transactionsViewManager'])->name('manager.transaction');
    Route::post('/manager/transaction', [AccountController::class, 'depositAndWithdraw'])->name('manager.deposit');
    Route::get('/manager/transaction/transfer', [AccountController::class, 'transferViewManager'])->name('manager.view-transfer');
    Route::post('/manager/transaction/transfer', [AccountController::class, 'transfer'])->name('manager.transfer');
    Route::get('/manager/transaction/extract', [AccountController::class, 'generatePdfManager'])->name('manager.pdf');
    
    Route::get('/manager/pendencies', [PendencyController::class, 'index'])->name('manage.pendencies');
    Route::delete('/manager/pendencies/loan/{id}', [PendencyController::class, 'deny'])->name('manager.deny');
    Route::post('/manager/pendencies/loan/{id}', [PendencyController::class, 'accept'])->name('manager.accept');
    
    Route::get('/manager/loan', [LoanController::class, 'loanViewManager'])->name('manager.view-loan');
    Route::post('/manager/loan', [LoanController::class, 'store'])->name('manager.loan-store');
    Route::post('/manager/loan/pay', [LoanController::class, 'pay'])->name('manager.loan-pay');
    
    Route::get('/manager/manage/users', [UserController::class, 'index'])->name('manager.user');
    Route::get('/manager/manage/users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/manager/manage/users/create', [UserController::class, 'store'])->name('user.store');
    Route::get('/manager/manage/users/{id}', [UserController::class, 'view'])->name('user.view');
    Route::get('/manager/manage/users/update/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('/manager/manage/users/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/manager/manage/users/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::get('/transaction', [AccountController::class, 'transactionsViewUser'])->name('user.transaction');
    Route::post('/transaction', [AccountController::class, 'depositAndWithdraw'])->name('user.deposit');
    Route::get('/transaction/transfer', [AccountController::class, 'transferViewUser'])->name('user.view-transfer');
    Route::post('/transaction/transfer', [AccountController::class, 'transfer'])->name('user.transfer');
    Route::get('/transaction/extract', [AccountController::class, 'generatePdfUser'])->name('user.pdf');
    
    Route::get('/loan', [LoanController::class, 'loanViewUser'])->name('user.view-loan');
    Route::post('/loan', [LoanController::class, 'store'])->name('user.loan-store');
    Route::post('/loan/pay', [LoanController::class, 'pay'])->name('user.loan-pay');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
