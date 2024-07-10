<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class , 'dashboard'])->name('dashboard');
    Route::get('/home', [HomeController::class , 'home'])->name('home');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(ReportController::class)->group(function () {
        Route::get('/dailyreport','daily')->name('report.daily');
        Route::get('/duereport','due')->name('report.due');
        Route::get('/priodreport','daterange')->name('report.priod');
        Route::get('/cashreport','cash')->name('report.cash');
        Route::get('/ledgersales','lsakes')->name('report.lsakes');
        Route::get('/delivery','delivery')->name('report.delivery');
    });

    Route::controller(FileController::class)->group(function () {
        Route::get('/files', 'index')->name('files.index');
        Route::post('/files', 'store')->name('files.store');
        Route::get('/files/{id}', 'show')->name('files.show');
        Route::get('/files/download/{id}', 'downloadFile')->name('files.download');
        Route::delete('/files/{id}', 'destroy')->name('files.destroy');
    });



    Route::resource('customers', CustomerController::class);
    Route::resource('orders', OrderController::class);

    Route::get('/porder', [OrderController::class, 'porder'])->name('porder');
});

require __DIR__.'/auth.php';
