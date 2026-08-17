<?php

use App\Http\Controllers\Auth\SignUpController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::post('/submit', function () {
    return view('submit');
});

Route::get('/signin', function () {
    return view('signin');
});

Route::get('/signup', [SignUpController::class, 'create'])->name('signup');
Route::post('/signup', [SignUpController::class, 'store']);