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
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('dashboard'); 
    }

    // Страница АДМИНА
    public function adminDashboard() {
        // если не авторизован ИЛИ не админ
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            return redirect('/dashboard')->with('error', 'Доступ запрещен');
        }

        return view('admin.dashboard'); // Создайте файл resources/views/admin/dashboard.blade.php
    }
}
