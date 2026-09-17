<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create() 
    {
        return view('auth.login');
    }

    public function store(Request $request) 
    {
        // dd($request->all());
        // валидация
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);
        
        // аутентификация
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('dashboard');
        }

        return back()->withErrors([
            'email' => 'Неверный email или пароль.',
        ])->withInput($request->only('email'));
    }

    public function destroy(Request $request) 
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
