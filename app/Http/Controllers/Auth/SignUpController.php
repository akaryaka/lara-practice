<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignUpController extends Controller
{
    public function create() 
    {
        // dd(session('errors'));
        return view('signup');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'check' => ['required', 'boolean']
        ]);
        // получаем поля формы регистрации, для проверки
        // dd($request -> all());
        $user = User::create([
            'email' => $request->email,
            'password' => $request->password,
            'check' => $request->check
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }
}
