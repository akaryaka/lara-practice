<header>
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        logo
      </a>
      <div class="collapse navbar-collapse">
        {{-- ЭТО ВИДНО ТОЛЬКО ГОСТЯМ (не вошедшим) --}}
    @guest
        <a href="{{ route('login') }}">Войти</a> | 
        <a href="{{ route('register') }}">Регистрация</a>
    @endguest

    {{-- ЭТО ВИДНО ТОЛЬКО АВТОРИЗОВАННЫМ ПОЛЬЗОВАТЕЛЯМ --}}
    @auth
        Привет, <strong>{{ Auth::user()->name }}</strong>! 
        
        @if(Auth::user()->is_admin)
            | <a href="{{ route('admin') }}" style="color: red; font-weight: bold;">Админ-панель</a>
        @endif
        
        | 
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" style="background: none; border: none; color: blue; cursor: pointer; text-decoration: underline;">Выйти</button>
        </form>
    @endauth
        <!-- <ul class="navbar-nav ms-auto">
          <li class="nav-item">
              <a class="nav-link" href="{{ url('/login') }}">Вход</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ url('/register') }}">Регистрация</a>
          </li>
          <li>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
              @csrf
              <button type="submit" class="btn btn-danger btn-sm">Выйти</button>
          </form>
          </li>
        </ul> -->
      </div>
    </div>
  </nav>
</header>