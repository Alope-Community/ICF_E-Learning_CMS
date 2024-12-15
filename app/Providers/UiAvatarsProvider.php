<?php

namespace App\Providers;

use Filament\AvatarProviders\Contracts\AvatarProvider;
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UiAvatarsProvider implements AvatarProvider
{
    public function get(Model $user): string
    {
        $name = Str::of(Filament::getUserName($user))
            ->trim()
            ->explode(' ')
            ->map(fn(string $segment): string => filled($segment) ? mb_substr($segment, 0, 1) : '')
            ->join(' ');

        return $user->profile ? Storage::url($user->profile) : 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&color=FFFFFF&background=111827';
    }
}
