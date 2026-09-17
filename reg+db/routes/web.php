<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\Auth\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Эти страницы доступны только авторизованным пользователям
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $users = User::all();
        return view('dashboard', compact('users'));
    });
    
    Route::get('/profile', function () {
        return view('profile');
    });

    Route::get('/users', [UserController::class, 'dashboard'])->name('dashboard');

    Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');
});

// Эти страницы доступны только гостям (неавторизованным)
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);

    Route::get('/signup', [SignUpController::class, 'create'])->name('signup');
    Route::post('/signup', [SignUpController::class, 'store']);
});

// Главная страница доступна всем
Route::get('/', function () {
    return view('home');
});