<header>
  <a href="{{ url('/') }}">home</a>
  @guest
    <a href="{{ url('/register') }}">register</a>
    <a href="{{ url('/login') }}">login</a>
  @endguest
  @auth
    Привет, <span>{{ Auth::user()->name }}</span>
  @endauth
</header>