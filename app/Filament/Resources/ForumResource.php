<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ForumResource\Pages;
use App\Filament\Resources\ForumResource\RelationManagers;
use App\Models\Forum;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ForumResource extends Resource
{
    protected static ?string $model = Forum::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\Select::make('course_id')
                    ->relationship('course', 'title')
                    ->label('From Course')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->limit(30)
                    ->tooltip(fn($record) => $record->title),
                Tables\Columns\TextColumn::make('course.title'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListForums::route('/'),
            'create' => Pages\CreateForum::route('/create'),
            'view' => Pages\ViewForum::route('/{record}'),
            'edit' => Pages\EditForum::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();

        return ($user->hasRole('admin') || ($user->hasRole('teacher') && $user->email_verified_at !== null));
    }

    protected static function shouldRegisterNavigation(): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();

        return ($user->hasRole('admin') || ($user->hasRole('teacher') && $user->email_verified_at !== null));
    }

    public static function getEloquentQuery(): Builder
    {
        /** @var \App\Models\User */
        $user = auth()->user();


        if ($user->hasRole('admin')) {
            return parent::getEloquentQuery();
        }

        return parent::getEloquentQuery()->whereHas('course.user', function ($query) use ($user) {
            $query->where('id', $user->id);
        });
    }

    public static function canView(Model $record): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();


        if ($user->hasRole('admin')) {
            return true;
        }

        return $record->course->user->id === $user->id;
    }

    public static function canEdit(Model $record): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();


        if ($user->hasRole('admin')) {
            return true;
        }

        return $record->course->user->id === $user->id;
    }

    public static function canDelete(Model $record): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();


        if ($user->hasRole('admin')) {
            return true;
        }

        return $record->course->user->id === $user->id;
    }

    public static function canCreate(): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();

        return $user && ($user->hasRole('admin') || $user->hasRole('teacher') && $user->email_verified_at !== null);
    }
}
