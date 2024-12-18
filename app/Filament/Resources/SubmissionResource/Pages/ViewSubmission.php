<?php

namespace App\Filament\Resources\SubmissionResource\Pages;

use App\Filament\Resources\SubmissionResource;
use App\Filament\Resources\SubmissionResource\Widgets\SubmissionOverview;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSubmission extends ViewRecord
{
    protected static string $resource = SubmissionResource::class;

    protected function getTitle(): string
    {
        return $this->record->title;
    }

    protected function getHeaderWidgets(): array
    {
        return [
            SubmissionOverview::class,
        ];
    }

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    protected function getFormSchema(): array
    {
        return [];
    }
    
}
