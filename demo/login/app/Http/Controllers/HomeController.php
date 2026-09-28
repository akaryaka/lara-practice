<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        // Этот метод заставит Laravel проверять авторизацию перед показом страницы
        $this->middleware('auth');
    }
    
    public function index() {
        return view('home');
    }
}
