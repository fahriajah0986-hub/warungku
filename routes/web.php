<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

// Halaman utama sementara diarahkan ke login admin
Route::get('/', function () {
    return redirect()->route('login');
});

// Login admin
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [LoginController::class, 'login'])
        ->name('login.process');
});

// Halaman admin yang wajib login
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
   Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

    Route::resource('products', ProductController::class);

    Route::resource('categories', CategoryController::class);

    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');
});