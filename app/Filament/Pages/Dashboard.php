<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\CountersWidget;
use App\Models\Course;
use App\Models\User;
use Closure;
use Filament\Facades\Filament;
use Filament\Pages\Page;
use Filament\Widgets\AccountWidget;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?int $navigationSort = -2;

    protected static string $view = 'filament.pages.dashboard';

    protected static function getNavigationLabel(): string
    {
        return static::$navigationLabel ?? static::$title ?? __('filament::pages/dashboard.title');
    }

    protected function getWidgets(): array
    {
        return [AccountWidget::class, CountersWidget::class];
    }

    protected function getColumns(): int | string | array
    {
        return 2;
    }

    public static function getRoutes(): Closure
    {
        return function () {
            Route::get('/', static::class)->name(static::getSlug());
        };
    }

    protected function getTitle(): string
    {
        return static::$title ?? __('filament::pages/dashboard.title');
    }

    public function isEmailVerified(): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();

        Session::put('email', auth()->user()->email);

        return auth()->check() && (
            $user->hasRole('admin') ||
            $user->hasRole('teacher') && auth()->user()->email_verified_at !== null
        );
    }

}
