<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Home Route
Route::get('/', HomeController::class)->name('home');

// Auth Route
Route::prefix('auth')->middleware('guest')->group(function () {
    Route::prefix('login')->group(function () {
        Route::get('/', [AuthController::class, 'loginPage'])->name('login');
        Route::post('/', [AuthController::class, 'login'])->name('login');
    });
    Route::prefix('register')->group(function () {
        Route::get('/', [AuthController::class, 'registerPage'])->name('register');
        Route::post('/', [AuthController::class, 'register'])->name('register');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', DashBoardController::class)->name('dashboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('/todo', TaskController::class)->except(['index']);
});

