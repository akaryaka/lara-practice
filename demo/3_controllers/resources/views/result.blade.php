<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Результат</title>
</head>
<body>
    <h2>Данные успешно переданы!</h2>
    <!-- Выводим переданные из контроллера переменные -->
    <p>{{ $user_login }}</p>
    <p>{{ $user_email }}</p>
    <a href="{{url('/')}}">Вернуться к форме</a>
</body>
</html>