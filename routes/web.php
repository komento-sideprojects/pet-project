<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('/books/browse', [UserController::class, 'browse'])->name('books.browse');
    Route::post('/books/borrow', [UserController::class, 'borrow'])->name('books.borrow');
    Route::get('/books/borrowed', [UserController::class, 'borrowed'])->name('books.borrowed');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/books', [AdminController::class, 'manageBooks'])->name('admin.books');
    // Add more admin routes here
});
