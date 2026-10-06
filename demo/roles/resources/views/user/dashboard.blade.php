@extends('layout')
@section('title', 'Личный кабинет')
@section('content')
<h1>Привет, {{ auth()->user()->name }}!</h1>
@endsection

 
 