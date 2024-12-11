<?php

namespace App\Filament\Resources\SubmissionResource\Widgets;

use App\Models\Submission;
use Filament\Widgets\Widget;

class SubmissionOverview extends Widget
{
    protected static string $view = 'filament.resources.submission-resource.widgets.submission-overview';

    public $submission;

    public function getColumnSpan(): int|string|array
    {
        return 2;
    }

    public function mount(): void
    {
        $id = request()->route('record');
        $this->submission = Submission::findOrFail($id);
    }
}
