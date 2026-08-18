# Инструкция по установке

1. Проверяем наличие php, composer
2. Открываем домашнюю папку и документацию https://laravel.su/docs/13.x/installation
3. устанавливаем laravel глобально

```cmd
composer global require laravel/installer
```

4. устанавливаем laravel

```cmd
laravel new myapp
```

5.

```cmd
cd myapp
composer install
npm install
npm run build
php artisan migrate
composer run dev
```

6. DB_FOREIGN_KEYS=true
   DB_DATABASE=laravel(закомментить)

ВАЖНО: на данный момент не надо привязывать порты лары и phpmyadmin. достаточно открывать phpmyadmin на localhost

## Регистрация пользователя

- php artisan make:controller Auth/SignUpController

## Тестирование подключения к бд

- создаем бд в phpmyadmin
- прописываем ее в .env
- создаем таблицу с помощью cmd
- выполняем миграцию - проверяем запись в бд(форма должна быть с валидатором!)

## Чеклист проверки рабочего проекта

## таски

- убрать ошибки в консоли при запуске проекта
