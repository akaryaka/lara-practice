<header>
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">
        logo
      </a>
      <div class="collapse navbar-collapse">
        @guest
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/login') }}">Вход</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/register') }}">Регистрация</a>
            </li>
        </ul>
        @endguest

        @auth
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">Привет, <strong>{{ Auth::user()->name }}</strong>! </li>
          </ul>      
          <form action="{{ route('logout') }}" method="POST" style="display: inline;">
              @csrf
              <button class="nav-item" type="submit" style="background: none; border: none; color: blue; cursor: pointer; text-decoration: underline;">Выйти</button>
          </form>
        @endauth
      </div>
    </div>
  </nav>
</header>