<?php

namespace App\Filament\Resources\CourseResource\Pages;

use App\Filament\Resources\CourseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListCourses extends ListRecords
{
    protected static string $resource = CourseResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableQuery(): Builder
    {
        $query = parent::getTableQuery();
        
        /** @var \App\Models\User */
        $user = auth()->user();

        if ($user->hasRole('teacher')) {
            $query->where('user_id', auth()->id());
        }
    
        return $query;
    }
}
