@extends('layout')

@section('content')
  <h1>Страница пользователя</h1>
  
   @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <h3>Создание новой заявки</h3>
    <form action="{{ route('application.store') }}" method="POST">
        @csrf
         @if ($errors->any())
        <div style="background: #fee; color: #c00; padding: 10px; border: 1px solid #c00; margin-bottom: 15px;">
            <strong>Ошибка при сохранении:</strong>
            <ul style="margin: 5px 0 0 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div style="margin-bottom: 10px;">
            <label>Тема:</label><br>
            <input type="text" name="title" required style="width: 300px;">
        </div>
        <div style="margin-bottom: 10px;">
            <label>Описание:</label><br>
            <textarea name="description" rows="4" required style="width: 300px;"></textarea>
        </div>
        <div style="margin-bottom: 10px;">
            <label>Категория:</label><br>
            <select name="category" id="category" required style="width: 300px;">
                <option value="category1">category1</option>
                <option value="category2">category2</option>
                <option value="category3">category3</option>
            </select>
        </div>
        <button type="submit">Создать заявку</button>
    </form>

    <hr>

    <h3>Мои заявки</h3>
    <ul>
        {{-- Обратите внимание на applications (с буквой s) и ?? [] для безопасности --}}
        @forelse(Auth::user()->applications ?? [] as $item)
            <li>
                <strong>{{ $item->title }}</strong> 
                (Статус: {{ $item->status }}, Категория: {{ $item->category }})<br>
                {{ $item->description }} <br>
                <small style="color: gray;">Создано: {{ $item->created_at->format('d.m.Y H:i') }}</small>
            </li>
        @empty
            <li>У вас пока нет заявок.</li>
        @endforelse
    </ul>
@endsection