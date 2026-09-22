@extends('layouts.main')
@section('content')
  <h1>home</h1>
  <!-- для теста -->
  <a href="{{url('/about')}}">О компании</a>
  <a href="{{url('/services')}}">Услуги</a>
  <a href="{{url('/news')}}">Новости</a>
@endsection
