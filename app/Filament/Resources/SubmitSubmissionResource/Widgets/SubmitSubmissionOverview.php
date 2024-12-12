<?php

namespace App\Filament\Resources\SubmitSubmissionResource\Widgets;

use App\Models\Submission;
use App\Models\SubmitSubmission;
use Filament\Widgets\Widget;

class SubmitSubmissionOverview extends Widget
{
    protected static string $view = 'filament.resources.submit-submission-resource.widgets.submit-submission-overview';

    public $submitSubmission;

    public function getColumnSpan(): int|string|array
    {
        return 2;
    }

    public function mount(): void {
        $id = request()->route('record');
        $this->submitSubmission = SubmitSubmission::findOrFail($id);
    }
}
