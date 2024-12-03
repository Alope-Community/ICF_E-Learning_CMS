<?php

namespace App\Providers;

use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Session;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Event::listen(Authenticated::class, function ($event) {
            
            Session::put('email', $event->user->email);
            
            if (!Session::has('login_notified')) {
                if ($event->user->hasRole('teacher') && $event->user->email_verified_at == null) {
                    Notification::make()
                        ->title('Akun anda belum terverifikasi')
                        ->body('Silahkan verifikasi akun Anda terlebih dahulu.')
                        ->warning()
                        ->actions([
                            Action::make('Verifikasi')
                            ->button()
                            ->url(route('auth.verify.otp.form'))
                        ])
                        ->persistent()
                        ->send();
                } else {
                    Notification::make()
                        ->title('Login Berhasil')
                        ->body('Selamat datang kembali, ' . $event->user->name . '!')
                        ->success()
                        ->send();
                }

                Session::put('login_notified', true);
            }
        });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
