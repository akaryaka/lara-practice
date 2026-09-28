<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function login(Request $request)
    {
        // Валидация данных
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        // Попытка аутентификации пользователя
        if (Auth::attempt($credentials)) {
            // Если успешно: регенерируем сессию (защита от фиксации сессии)
            $request->session()->regenerate();

            // Редирект на главную страницу с сообщением
            return redirect()->intended('/')->with('success', 'Вы успешно вошли в систему!');
        }

        // Если неуспешно: возвращаем назад с ошибкой
        return back()->withErrors([
            'name' => 'Неверный email или пароль.',
        ])->onlyInput('email');
    }

    // 3. Выход из системы
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Вы вышли из системы.');
    }
}
