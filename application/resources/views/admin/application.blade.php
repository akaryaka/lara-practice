@extends('layout')

@section('content')
    <h1>Панель администратора: Все заявки</h1>
    
    <p><a href="{{ route('admin.dashboard') }}">← Вернуться в админ-панель</a></p>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if($application->isEmpty())
        <p>Заявок пока нет.</p>
    @else
        <table border="1" cellpadding="10" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Пользователь</th>
                    <th>Тема</th>
                    <th>Описание</th>
                    <th>Категория</th>
                    <th>Статус</th>
                    <th>Изменить статус</th>
                    <th>Дата</th>
                </tr>
            </thead>
            <tbody>
                @foreach($application as $ticket)
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->user->name }}<br><small>{{ $ticket->user->email }}</small></td>
                        <td>{{ $ticket->title }}</td>
                        <td>{{ $ticket->description }}</td>
                        <td>{{ $ticket->category }}</td>
                        <td>
                            <strong style="color: 
                                @if($ticket->status == 'new') blue
                                @elseif($ticket->status == 'in_progress') orange
                                @elseif($ticket->status == 'completed') green
                                @elseif($ticket->status == 'rejected') red
                                @endif
                            ">
                                {{ $ticket->status }}
                            </strong>
                        </td>
                        <td>
                            <form action="{{ route('application.updateStatus', $ticket->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <select name="status" required style="padding: 5px;">
                                    <option value="new" {{ $ticket->status == 'new' ? 'selected' : '' }}>Новая</option>
                                    <option value="in_progress" {{ $ticket->status == 'in_progress' ? 'selected' : '' }}>В работе</option>
                                    <option value="completed" {{ $ticket->status == 'completed' ? 'selected' : '' }}>Завершена</option>
                                    <option value="rejected" {{ $ticket->status == 'rejected' ? 'selected' : '' }}>Отклонена</option>
                                </select>
                                <button type="submit" style="padding: 5px 10px; margin-left: 5px;">Сохранить</button>
                            </form>
                        </td>
                        <td>{{ $ticket->created_at->format('d.m.Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection