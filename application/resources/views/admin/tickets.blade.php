@extends('layout')

@section('content')
    <h1>Панель администратора: Все заявки</h1>
    
    <p><a href="{{ route('admin.dashboard') }}">← Вернуться в админ-панель</a></p>

    @if($tickets->isEmpty())
        <p>Заявок пока нет.</p>
    @else
        <table border="1" cellpadding="10" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Пользователь</th>
                    <th>Тема</th>
                    <th>Описание</th>
                    <th>Статус</th>
                    <th>Дата</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->user->name }}<br><small>{{ $ticket->user->email }}</small></td>
                        <td>{{ $ticket->title }}</td>
                        <td>{{ $ticket->description }}</td>
                        <td>{{ $ticket->status }}</td>
                        <td>{{ $ticket->created_at->format('d.m.Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection