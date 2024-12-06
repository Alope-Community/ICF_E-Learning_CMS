<?php

namespace App\Filament\Widgets;

use App\Models\Course;
use Filament\Widgets\Widget;
use Illuminate\Contracts\View\View;

class CourseWidget extends Widget
{
    protected static string $view = 'filament.widgets.course-widget';

    public $course;


    public function getColumnSpan(): int|string|array
    {
        return 2;
    }

    public function mount(): void
    {
        $id = request()->route('record');
        $this->course = Course::findOrFail($id);
    }

}
