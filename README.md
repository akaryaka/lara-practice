# Инструкция по установке

1. Проверяем наличие php, composer
2. Открываем домашнюю папку и документацию https://laravel.su/docs/13.x/installation
3. устанавливаем laravel глобально

```cmd
composer global require laravel/installer
```

4. устанавливаем проект laravel

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
- php artisan make:controller Auth/SignInController

## Тестирование подключения к бд

- создаем бд в phpmyadmin
- прописываем ее в .env
- создаем таблицу с помощью cmd
- выполняем миграцию - проверяем запись в бд(форма должна быть с валидатором!)

## Чеклист проверки рабочего проекта

### тасклист для себя

#### ветка для себя

- добавить вывод ошибок(страница входа для уже зарегистрированных пользователей)
- добавить чекбокс "запомнить меня"
- использовать для теста dd($request->all());

#### ветка студентам

- создание админа в бд
- создание ролей для пользователей(user, admin)
- вывод зарегистрированных пользователей в админке
- user: форма создания заявки со статусом
- admin: заявка с подтверждением о выполнении
