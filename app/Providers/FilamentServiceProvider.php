<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            Filament::registerViteTheme('resources/css/filament.css');
            Filament::registerUserMenuItems([
                'user-profile' => UserMenuItem::make()
                ->icon('heroicon-o-user')
                ->label('Profile')
                ->url(route('filament.pages.user-profile'))
            ]);
        });
    }
}
