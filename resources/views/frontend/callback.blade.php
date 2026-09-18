<section>
  <div>
    <div>
      <div>
        <h2>Перезвоните мне</h2>
      </div>
    </div>
    <form action="/callback" method="POST">
      @csrf
        <label>
          <input type="text" placeholder="Введите ваше имя" required>
        </label>
        <label>
          <input type="tel" placeholder="Введите ваш телефон" required>
        </label>
        <div>
          <button>Заказать звонок</button>
        </div>
    </form>
  </div>
</section>