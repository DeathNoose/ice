<?php
// app/Providers/AppServiceProvider.php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Добавляем кастомное правило для текущего пароля
        Validator::extend('current_password', function ($attribute, $value, $parameters, $validator) {
            return \Illuminate\Support\Facades\Hash::check($value, auth()->user()->password);
        }, 'Текущий пароль указан неверно');
    }
}