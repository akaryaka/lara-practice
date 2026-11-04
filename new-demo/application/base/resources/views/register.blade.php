@extends('layout')
@section('content')
  <h1>register</h1>
  <form method="POST" action="{{ route('register.store') }}">
    @csrf
    
    <input name="name" type="text" placeholder="Имя" required>
    <input name="email" type="email" placeholder="Email" required>
    <input name="password" type="password" placeholder="Пароль" required>
    <input name="phone" type="text" placeholder="Телефон" required>
    
    <button type="submit">Зарегистрироваться</button>
  </form>
@endsection