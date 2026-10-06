<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

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
// Публичные маршруты
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Маршруты, доступные ТОЛЬКО авторизованным пользователям
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $user = auth()->user();
        
        dd('Логин: ' . $user->name . ' | Роль в БД: ' . $user->role . ' | Результат isAdmin(): ' . ($user->isAdmin() ? 'TRUE' : 'FALSE'));
        // =========================

        if ($user->isAdmin()) {
            return view('admin.dashboard');
        }
        
        return view('user.dashboard');
    })->name('dashboard');
    // Главная страница после входа (разделяем по ролям)
    Route::get('/dashboard', function () {
        if (auth()->user()->isAdmin()) {
            return view('admin.dashboard');
        }
        return view('user.dashboard');
    })->name('dashboard');

    Route::get('/admin/users', function () {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Доступ запрещен. У вас нет прав администратора.');
        }
        return view('admin.users_list'); 
    })->name('admin.users');
});