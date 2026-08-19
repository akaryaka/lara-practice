<header>
  <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Bootstrap</a>
        <div class="auth-btn">
          @guest
            <a class="btn btn-primary" href='/login'>вход</a>
            <a class="btn btn-primary" href='/signup'>регистрация</a>
          @else
            <a href="/dashboard">Панель управления</a>
            <form method="POST" action="/login">
                @csrf
                <button type="submit">Выйти</button>
            </form>
          @endguest
          
        </div>
    </div>
  </nav>
</header>

