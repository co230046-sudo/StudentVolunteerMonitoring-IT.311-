<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Show Login Page (Default)
Route::view('/', 'login')->name('login');

// Show Register Page
Route::view('/register', 'register')->name('register');

// Handle Login Form Submission
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Handle Registration Form Submission
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Pages that require login
Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::view('/addStudent', 'addStudent')->name('addStudent');
    Route::view('/studentRecord', 'studentRecord')->name('studentRecord');
});
