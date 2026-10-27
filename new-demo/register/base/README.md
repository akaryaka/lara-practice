# Дома

- npm install
- npm run build
- php artisan serve

## заметки для студентов

- добавил Auth::routes();
- database/migrations/users => add $table->string('phone');
- проверить поля в User.php $fillable = [
  'name',
  'email',
  'password',
  "phone",
  ];
- php artisan optimize:clear
- php artisan migrate:fresh
- php artisan make:controller RegisterController
  public function index()
  {
  return view('register');
  }
