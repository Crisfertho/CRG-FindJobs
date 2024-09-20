<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function($notifiable, $url){
            return (new MailMessage)
            ->subject('Verificar Email')
            ->line('Haga clic en el botón a continuación para verificar su dirección de correo electrónico.')
            ->action('Confirmar cuenta', $url)
            ->line('Si no ha creado una cuenta, no es necesario realizar ninguna otra acción.');
        });
    }
}
