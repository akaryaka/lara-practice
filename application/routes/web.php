<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
// GET-маршрут для отображения формы (с именем 'login')
Route::get('/login', [LoginController::class, 'index'])->name('login');
// POST-маршрут для обработки отправки формы
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// GET-маршрут для отображения формы (с именем 'register')
Route::get('/register', [RegisterController::class, 'index'])->name('register');
// POST-маршрут для обработки отправки формы
Route::post('/register', [RegisterController::class, 'register'])->name('register.store');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
