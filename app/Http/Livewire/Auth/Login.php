<?php

namespace App\Http\Livewire\Auth;

use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use Filament\Facades\Filament;
use Livewire\Component;
use Filament\Http\Livewire\Auth\Login as FilamentLogin;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Illuminate\Validation\ValidationException;

class Login extends FilamentLogin
{
    public function authenticate(): ?LoginResponse
    {
        try {
            $this->rateLimit(5);
        } catch (TooManyRequestsException $exception) {
            throw ValidationException::withMessages([
                'email' => __('filament::login.messages.throttled', [
                    'seconds' => $exception->secondsUntilAvailable,
                    'minutes' => ceil($exception->secondsUntilAvailable / 60),
                ]),
            ]);
        }

        $data = $this->form->getState();

        if (!Filament::auth()->attempt([
            'email' => $data['email'],
            'password' => $data['password'],
        ], $data['remember'])) {
            throw ValidationException::withMessages([
                'email' => __('filament::login.messages.failed'),
            ]);
        }

        /** @var \App\Models\User */
        $user = auth()->user();

        if ($user->hasRole('student')) {
            auth()->logout();
            session()->invalidate();
            session()->regenerateToken();
            throw ValidationException::withMessages([
                'email' => __('You are not authorized to access this panel.'),
            ]);
        }

        session()->regenerate();

        return app(LoginResponse::class);
    }
}
