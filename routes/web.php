<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellerDashboardController;
use Illuminate\Support\Facades\Route;

// Главная страница
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminDashboardController::class, 'index'])
        ->middleware('role:admin')
        ->name('admin.dashboard');

    Route::get('/seller', [SellerDashboardController::class, 'index'])
        ->middleware('role:seller')
        ->name('seller.dashboard');

    Route::get('/customer', [CustomerDashboardController::class, 'index'])
        ->middleware('role:customer')
        ->name('customer.dashboard');
});



// Группа маршрутов для профиля
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
