<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
     // Страница обычного пользователя
    public function userDashboard() {
        // Страховка: если вдруг не авторизован
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('dashboard'); // Создайте файл resources/views/dashboard.blade.php
    }

    // Страница АДМИНА
    public function adminDashboard() {
        // Страховка: если не авторизован ИЛИ не админ
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            abort(403, 'У вас нет прав для просмотра этой страницы.');
            // Или: return redirect('/dashboard')->with('error', 'Доступ запрещен');
        }

        return view('admin.dashboard'); // Создайте файл resources/views/admin/dashboard.blade.php
    }
}
