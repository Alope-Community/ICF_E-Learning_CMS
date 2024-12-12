<?php

namespace App\Filament\Resources\SubmitSubmissionResource\Pages;

use Filament\Pages\Actions;
use App\Filament\Resources\SubmitSubmissionResource\Widgets\SubmitSubmissionOverview;
use App\Filament\Resources\SubmitSubmissionResource;
use Filament\Resources\Pages\ViewRecord;

class ViewSubmitSubmission extends ViewRecord
{
    protected static string $resource = SubmitSubmissionResource::class;

    protected function getTitle(): string
    {
        return $this->record->submission->title;
    }

    protected function getHeaderWidgets(): array
    {
        return [
            SubmitSubmissionOverview::class,
        ];
    }

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    protected function getFormSchema(): array {
        return [];
    }
}
