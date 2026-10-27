@extends('layout')
@section('content')
  <h1>register</h1>
  <form method="POST" >
    @csrf
    <input name="name" type="text" placeholder="name">
    <input name="email" type="text" placeholder="email">
    <input name="password" type="text" placeholder="password">
    <input name="phone" type="text" placeholder="phone">
    <button type="submit">регистрация</button>
  </form>
@endsection