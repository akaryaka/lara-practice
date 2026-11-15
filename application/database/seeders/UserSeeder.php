<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Администратор
        User::create([
            'name' => 'Админ',
            'email' => 'admin@example.com',
            'phone' => '123123123',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Обычный пользователь
        User::create([
            'name' => 'Тестовый пользователь',
            'email' => 'user@example.com',
            'phone' => '123123123',
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);

        // Еще несколько пользователей (опционально)
        User::create([
            'name' => 'Мария Сидорова',
            'email' => 'maria@example.com',
            'phone' => '123123123',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}