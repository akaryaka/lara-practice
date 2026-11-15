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
    // 1. Убрали 'status' из валидации — пользователь его не выбирает
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'category' => 'required|string|in:category1,category2,category3',
    ]);

    // 2. Добавляем user_id и status вручную
    $validated['user_id'] = Auth::id();
    $validated['status'] = 'new'; // Статус по умолчанию для новых заявок

    // 3. Создаем заявку
    Application::create($validated);

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
