<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignUpController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/profile', fn() => 'profile')->middleware('auth')->name('profile');

Route::view('/dashboard', 'dashboard')->middleware('auth')->name('dashboard');

Route::get('/signup', [SignUpController::class, 'create'])->name('signup');
Route::post('/signup', [SignUpController::class, 'store']);

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);