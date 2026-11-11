@extends('layout')
@section('content')
    <h1>Панель администратора</h1>
    <<a href="{{ route('admin.tickets') }}">Посмотреть все заявки пользователей</a>
@endsection