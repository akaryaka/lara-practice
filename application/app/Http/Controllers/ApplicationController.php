<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
        // Обработка формы создания заявки (для обычного пользователя)
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Создаем заявку, привязывая её к текущему пользователю
        Auth::user()->tickets()->create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return back()->with('success', 'Заявка успешно создана!');
    }

    // Просмотр всех заявок (только для админа)
    public function adminIndex()
    {
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            return redirect('/dashboard')->with('error', 'Доступ запрещен');
        }

        // Получаем все заявки с данными пользователей, сортируем по новым
        $application = Application::with('user')->latest()->get();
        
        return view('admin.application', compact('application'));
    }
}
