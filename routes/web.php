<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;

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
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Student management routes
    Route::resource('students', StudentController::class);
    Route::get('/students-search', [StudentController::class, 'search'])->name('students.search');
    
    // Keep the old routes for backward compatibility
    Route::get('/addStudent', [StudentController::class, 'create'])->name('addStudent');
    Route::get('/studentRecord', [StudentController::class, 'index'])->name('studentRecord');
});
