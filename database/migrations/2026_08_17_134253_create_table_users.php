<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Изменяем имя таблицы с 'table_users' на 'users'
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique(); // Желательно сделать email уникальным
            $table->string('password');     
            $table->boolean('check')->default(false);
            
            // 2. ОБЯЗАТЕЛЬНО добавляем timestamps (created_at и updated_at)
            $table->timestamps(); 
            
            // Опционально: токен для "Запомнить меня" (если используете Auth)
            // $table->rememberToken(); 
        });
    }

    public function down(): void
    {
        // Имя таблицы здесь тоже нужно поменять на 'users'
        Schema::dropIfExists('users');
    }
};