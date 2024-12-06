<?php

namespace App\Filament\Resources\CourseResource\Pages;

use App\Filament\Resources\CourseResource;
use App\Filament\Widgets\CountersWidget;
use App\Filament\Widgets\CourseWidget;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCourse extends ViewRecord
{
    protected static string $resource = CourseResource::class;

    protected function getTitle(): string
    {
        return $this->record->title;
    }

    protected function getHeaderWidgets(): array
    {
        return [
            CourseWidget::class,
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
        return [
            // Select::make('category_id')
            //     ->relationship('category', 'title')
            //     ->label('Category'),
            // MarkdownEditor::make('description'),
            // Select::make('users')
            //     ->label('Siswa yang mengikuti kelas')
            //     ->relationship('users', 'name')
            //     ->multiple()
            //     ->disabled(),
        ];
    }
}
