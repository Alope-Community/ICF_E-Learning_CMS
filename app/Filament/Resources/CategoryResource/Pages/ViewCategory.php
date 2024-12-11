<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use App\Filament\Resources\CategoryResource\Widgets\CategoryOverview;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCategory extends ViewRecord
{
    protected static string $resource = CategoryResource::class;

    protected function getTitle(): string
    {
        return $this->record->title;
    }

    protected function getHeaderWidgets(): array
    {
        return [
            CategoryOverview::class,
        ];
    }

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    public function getFormSchema(): array {
        return [];
    }
}
