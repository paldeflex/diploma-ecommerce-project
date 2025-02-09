<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Главная страница
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Дашборд для администратора
Route::get('/admin/dashboard', function () {
    return view('dashboard.admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

// Дашборд для продавца
Route::get('/seller/dashboard', function () {
    return view('dashboard.seller.dashboard');
})->middleware(['auth', 'role:seller'])->name('seller.dashboard');

// Дашборд для покупателя
Route::get('/customer/dashboard', function () {
    return view('dashboard.customer.dashboard');
})->middleware(['auth', 'role:customer'])->name('customer.dashboard');

// Группа маршрутов для профиля
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
