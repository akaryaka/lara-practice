<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create() 
    {
        return view('login');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'check' => ['required']
        ]);
        
    }
}
