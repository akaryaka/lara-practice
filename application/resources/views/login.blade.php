@extends('layout')
@section('title', 'login')
@section('content')
<h1>login</h1>
<form method="POST" action="{{ route('login.post') }}">
  @csrf  
  <input type="text" name="name" placeholder="name">
  <input type="text" name="password" placeholder="password">
  <button type="submit">войти</button>
</form>
@endsection