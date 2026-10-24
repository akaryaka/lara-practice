<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @fonts

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
               
            </style>
        @endif
    </head>
    <body>
        @include('components.header')
        <div class="container h-[100vh] flex flex-col justify-center items-center text-center">
          <h1 class="mb-5">Регистрация</h1>
          <form action="{{route('signup')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Адрес электронной почты</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" autofocus aria-describedby="emailHelp">
                @error('email')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                @error('password')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">зарегистрироваться</button>
          </form>
        </div>
        @include('components.footer')
    </body>
</html>
