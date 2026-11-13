@extends('layout')
@section('content')
  <h1>Страница пользователя</h1>
   @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <h3>Создание новой заявки</h3>
    <form action="{{ route('application.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 10px;">
            <label>Тема:</label><br>
            <input type="text" name="title" required style="width: 300px;">
        </div>
        <div style="margin-bottom: 10px;">
            <label>Описание:</label><br>
            <textarea name="description" rows="4" required style="width: 300px;"></textarea>
        </div>
        <button type="submit">Создать заявку</button>
    </form>

    <hr>

    <h3>Мои заявки</h3>
    <ul>
        @forelse(Auth::user()->applications as $application)
            <li>
                <strong>{{ $application->title }}</strong> (Статус: {{ $application->status }})<br>
                {{ $application->description }} <br>
            </li>
        @empty
            <li>У вас пока нет заявок.</li>
        @endforelse
    </ul>
@endsection