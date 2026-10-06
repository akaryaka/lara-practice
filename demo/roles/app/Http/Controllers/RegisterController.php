<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('register');
    }

    public function register(Request $request)
    {    
        // dd('Форма отправлена!', $request->all());

        // 1. Валидация данных
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

        // 2. Создание пользователя
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']), // Хешируем пароль
        ]);

        // 3. Редирект с сообщением об успехе
        return redirect()->route('register')->with('success', 'Регистрация прошла успешно! Теперь вы можете войти.');
    }
}
