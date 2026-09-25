<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return view('register');
    }

    public function submitForm(Request $request)
    {
        // ВАЛИДАЦИИ НЕТ 
        
        // Забираем данные из запроса
        $login = $request->input('login');
        $email = $request->input('email');
        $password = $request->input('password');

        // Передаем данные в другой вид (result.blade.php)
        return view('result', [
            'user_login' => $login,
            'user_email' => $email,
            'user_password' => $password
        ]);
    }
}
