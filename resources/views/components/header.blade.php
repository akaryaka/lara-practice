<header>
  <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Bootstrap</a>
        <div class="auth-btn">
          @guest
            <a class="btn btn-primary" href='/login'>вход</a>
            <a class="btn btn-primary" href='/signup'>регистрация</a>
          @else
            <a href="{{route('logout')}}">Выйти</a>
          @endguest
        </div>
    </div>
  </nav>
</header>

