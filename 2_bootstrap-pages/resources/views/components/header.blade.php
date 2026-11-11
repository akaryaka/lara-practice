<header>
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
      <!-- navbar-brand стилизация логотипа-->
      <a class="navbar-brand" href="{{ url('/') }}">
        logo
      </a>
      <div class="collapse navbar-collapse">
        <!-- ms-auto располагает меню справа -->
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
              <a class="nav-link" href="{{ url('/login') }}">Вход</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ url('/register') }}">Регистрация</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>