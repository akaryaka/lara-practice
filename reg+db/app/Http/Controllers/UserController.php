<?php

namespace App\Http\Controllers;

use App\Models\User; // <-- Обязательно импортируйте модель

class UserController extends Controller
{
    public function index()
    {
        // Получаем всех пользователей из БД
        $users = User::all();
        
        // Передаем их в шаблон users.index
        return view('dashboard', compact('users'));
    }
}