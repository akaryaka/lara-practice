<?php

use Illuminate\Support\Facades\Route;


// Главный контроллер - некоторые общие страницы(MainController)
// Главная страница
Route::get('/', 'App\Http\Controllers\MainController@Index');
// Страница О компании
Route::get('/about', 'App\Http\Controllers\MainController@About');
// Страница Услуги
Route::get('/services', 'App\Http\Controllers\MainController@Services');

// Обработка форм
// Поиск
Route::post('/search', 'App\Http\Controllers\MainController@Search');
// Подписка на новости
Route::post('/subscribe', 'App\Http\Controllers\MainController@Subscribe');
// Форма обратного звонка
Route::post('/callback', 'App\Http\Controllers\MainController@Callback');


// контроллер новостей
Route::get('/news', 'App\Http\Controllers\NewsController@NewsLine');
