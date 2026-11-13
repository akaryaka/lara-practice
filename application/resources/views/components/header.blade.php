<header>
  <a href="{{ url('/') }}">home</a>
  @guest
    <a href="{{ url('/register') }}">register</a>
    <a href="{{ url('/login') }}">login</a>
  @endguest
  @auth
    <p>Привет, {{ Auth::user()->name }}!</p>
    
    {{-- Ссылка видна ВСЕМ авторизованным --}}
    <a href="{{ route('dashboard') }}">Мой кабинет</a>

    {{-- Ссылка видна ТОЛЬКО если роль === 'admin' --}}
    @if(Auth::user()->isAdmin())
        <a href="{{ route('admin.dashboard') }}" style="color: red;">Админ-панель</a>
    @endif

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Выйти</button>
    </form>
  @endauth  
</header>