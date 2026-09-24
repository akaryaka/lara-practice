@extends("layout")
@section('title', 'Регистрация')
@section('content')
  <div class="container">
    <div class="d-flex flex-column align-items-center justify-content-center vh-100">
      <h1 class="text-center">Регистрация</h1>
      <form method="post" action="/form-register" class="w-25">
        <div class="form-group mb-3">
          <label for="input-login">Логин</label>
          <input name="login" type="text" class="form-control" id="input-login" placeholder="Введите логин">
        </div>
        <div class="form-group mb-3">
          <label for="input-email">Почта</label>
          <input name="email" type="email" class="form-control" id="input-email" placeholder="Введите email">
        </div>
        <div class="form-group mb-3">
          <label for="password">Пароль</label>
          <input name="password" type="password" class="form-control" id="password" placeholder="Введите пароль">
        </div>
        <button type="submit" class="btn btn-primary w-100">Зарегистрироваться</button>
      </form>
    </div>
  </div>
@endsection