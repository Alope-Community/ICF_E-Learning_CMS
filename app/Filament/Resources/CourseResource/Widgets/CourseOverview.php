<?php

namespace App\Filament\Resources\CourseResource\Widgets;

use App\Models\Course;
use Filament\Widgets\Widget;

class CourseOverview extends Widget
{
    protected static string $view = 'filament.resources.course-resource.widgets.course-overview';

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
