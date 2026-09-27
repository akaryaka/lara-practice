@extends("layout")
@section('title', 'Вход')
@section('content')
  <div class="container">
    <div class="d-flex flex-column align-items-center justify-content-center vh-100">
      <h1 class="text-center">Вход</h1>
      <form class="w-25">
        <div class="form-group mb-3">
          <label for="input-login">Логин</label>
          <input type="text" class="form-control" id="input-login" placeholder="Введите логин">
        </div>
        <div class="form-group mb-3">
          <label for="password">Пароль</label>
          <input type="password" class="form-control" id="password" placeholder="Введите пароль">
        </div>
        <button type="submit" class="btn btn-primary w-100">Войти</button>
      </form>
    </div>
  </div>
@endsection