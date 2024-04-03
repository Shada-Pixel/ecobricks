<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class , 'dashboard'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(ReportController::class)->group(function () {
        Route::get('/dailyreport','daily')->name('report.daily');
        Route::get('/duereport','due')->name('report.due');
        Route::get('/priodreport','daterange')->name('report.priod');
        Route::get('/cashreport','cash')->name('report.cash');
    });

    Route::resource('customers', CustomerController::class);
    Route::resource('orders', OrderController::class);
});

require __DIR__.'/auth.php';