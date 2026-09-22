<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function Index() {
        return view('home');
    }

    public function About() {
        return view('about');
    }

    public function Services() {
        return view('services');
        
    }

    public function Search() {
        
    }

    public function Subscribe() {
        
    }

    public function Callback() {
        
    }
}
