@extends("layout")
@section('title', 'Вход')
@section('content')
  <div class="container">
    <div class="d-flex flex-column align-items-center justify-content-center vh-100">
      <h1 class="text-center">Вход</h1>
            {{-- Сообщение об успехе (например, после регистрации или выхода) --}}
      @if(session('success'))
        <div class="alert alert-success w-25 text-center">
          {{ session('success') }}
        </div>
      @endif

      {{-- Блок для вывода ошибок --}}
      @if ($errors->any())
        <div class="alert alert-danger w-25 text-center">
          {{ $errors->first() }}
        </div>
      @endif
      <form method="post" action="{{ route('login.post') }}" class="w-25">
        @csrf
        <div class="form-group mb-3">
          <label for="input-login">Логин</label>
          <input name="name" type="text" class="form-control" id="input-login" placeholder="Введите логин">
        </div>
        <div class="form-group mb-3">
          <label for="password">Пароль</label>
          <input name="password" type="password" class="form-control" id="password" placeholder="Введите пароль">
        </div>
        <button type="submit" class="btn btn-primary w-100">Войти</button>
      </form>
    </div>
  </div>
@endsection