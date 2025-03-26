<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

// Register Routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Login Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

// Main page route (accessible after login)
Route::get('main', function () {
    return view('main'); // Ensure you have the `main.blade.php` view in your `resources/views` folder.
})->middleware('auth')->name('main');

// Logout Route
Route::post('logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');
