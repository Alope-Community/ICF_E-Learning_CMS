<?php

namespace App\Filament\Resources\SubmitSubmissionResource\Pages;

use App\Filament\Resources\SubmitSubmissionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubmitSubmissions extends ListRecords
{
    protected static string $resource = SubmitSubmissionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
