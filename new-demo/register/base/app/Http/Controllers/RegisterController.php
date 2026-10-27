<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        // 1. Валидация данных
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // Рекомендуется добавить подтверждение пароля
            'phone' => 'required|string|min:8',
        ]);

        // 2. Создание пользователя
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone' => $validated['phone'],
        ]);

        // 3. (Опционально) Автоматическая авторизация после регистрации
        // Auth::login($user);

        // 4. Редирект на страницу входа или главную с сообщением
        return redirect()->route('register')->with('success', 'Регистрация прошла успешно! Теперь вы можете войти.');
    }
}
