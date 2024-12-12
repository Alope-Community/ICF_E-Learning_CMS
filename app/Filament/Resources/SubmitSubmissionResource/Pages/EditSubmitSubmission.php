<?php

namespace App\Filament\Resources\SubmitSubmissionResource\Pages;

use App\Filament\Resources\SubmitSubmissionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubmitSubmission extends EditRecord
{
    protected static string $resource = SubmitSubmissionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
