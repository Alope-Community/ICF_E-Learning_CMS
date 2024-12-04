<?php

namespace App\Filament\Widgets;

use App\Models\Course;
use App\Models\User;
use Filament\Widgets\Widget;

class CountersWidget extends Widget
{
    protected static string $view = 'filament.widgets.counters-widget';

    public function getCounters(): array | null
    {
        if (auth()->check() && auth()->user()->hasRole('admin'))
        return [
            'users' => [
                'teacher' => User::role('teacher')->count(),
                'student' => User::role('student')->count(),
            ],
            'courses' => [
                'total' => Course::count(),
            ],
        ];
        else return null;
    }

    public function renderData(): array | null
    {
        return $this->getCounters();
    }
}
