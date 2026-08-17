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
        return view('signup');
    }

    public function store(Request $request) 
    {
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
