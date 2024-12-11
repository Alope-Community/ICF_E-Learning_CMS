<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Filament\Widgets\Widget;

class UserOverview extends Widget
{
    protected static string $view = 'filament.resources.user-resource.widgets.user-overview';

    public $user;

    public function getColumnSpan(): int|string|array
    {
        return 2;
    }

    public function mount(): void
    {
        $id = request()->route('record');
        $this->user = User::findOrFail($id);
    }
}
