<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\PaySlipController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PaiementController;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard Route with Middleware
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); // Create a dashboard.blade.php view
    })->name('dashboard');

    Route::get('/paiement', [PaiementController::class, 'index'])->name('paiements.index');
    Route::get('/paiement/create', [PaiementController::class, 'creatPayment'])->name('paiements.create');
    Route::post('/paiement/store', [PaiementController::class, 'store'])->name('paiements.store');
    // Payment Routes
    Route::resource('payments', PaiementController::class);
    Route::get('payments/{payment}/print', [PaiementController::class, 'print'])->name('payments.print');
});


// use App\Http\Controllers\EmployeeController;
// routes/web.php

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [EmployeeController::class, 'dashboard'])->name('employees.dashboard');
    // Route::get('/dashboard', [EmployeeController::class, 'dashboard'])->name('employees.dashboard');
    // web.php
    // web.php
    Route::get('/dashboard/view', [EmployeeController::class, 'getDashboardView'])->name('employees.dashboardView');
    Route::resource('paySlips', PaySlipController::class);


    // Route::resource('employees', EmployeeController::class);
    // Route::resource('employees', EmployeeController::class);
    // Route::resource('taxes', TaxController::class);
    Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/{id}/update', [EmployeeController::class, 'update'])->name('employees.update');
    Route::get('/employees/{id}/delete', [EmployeeController::class, 'delete'])->name('employees.delete');
    Route::resource('employees', EmployeeController::class);
    Route::resource('taxes', TaxController::class);
    Route::resource('pay-slips', PaySlipController::class);
});
