@extends("layout")
@section('title', 'Регистрация')
@section('content')
  <div class="container">
    <div class="d-flex flex-column align-items-center justify-content-center vh-100">
      <h1 class="text-center">Регистрация</h1>
      @if ($errors->any())
        <div class="alert alert-danger w-25">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form method="POST" action="{{ route('register.post') }}" class="w-25">
        @csrf
        <div class="form-group mb-3">
          <label for="input-login">Логин</label>
          <input name="name" type="text" class="form-control" value="{{ old('name') }}" id="input-login" placeholder="Введите логин" required>
        </div>
        <div class="form-group mb-3">
          <label for="input-email">Почта</label>
          <input name="email" type="email" class="form-control" value="{{ old('email') }}" id="input-email" placeholder="Введите email" required>
        </div>
        <div class="form-group mb-3">
          <label for="password">Пароль</label>
          <input name="password" type="password" class="form-control" value="{{ old('password') }}" id="password" placeholder="Введите пароль" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Зарегистрироваться</button>
      </form>
    </div>
  </div>
@endsection