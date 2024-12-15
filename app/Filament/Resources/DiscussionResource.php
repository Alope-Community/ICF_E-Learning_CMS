<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DiscussionResource\Pages;
use App\Filament\Resources\DiscussionResource\RelationManagers;
use App\Models\Discussion;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DiscussionResource extends Resource
{
    protected static ?string $model = Discussion::class;

    protected static ?string $navigationIcon = 'heroicon-o-flag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('course_id')
                    ->label('From Forum')
                    ->relationship('forum', 'title')
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->label('User')
                    ->relationship('user', 'name')
                    ->required(),
                TiptapEditor::make('message')
                    ->columnSpanFull()
                    ->required()
                    ->extraInputAttributes(['style' => 'min-height: 25rem; overflow-y: auto;']),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('forum.title')
                    ->limit(30)
                    ->tooltip(fn($record) => $record->forum->title),
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('created_at')
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
            'index' => Pages\ListDiscussions::route('/'),
            'create' => Pages\CreateDiscussion::route('/create'),
            'view' => Pages\ViewDiscussion::route('/{record}'),
            'edit' => Pages\EditDiscussion::route('/{record}/edit'),
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

        return parent::getEloquentQuery()
            ->whereHas('forum', function ($query) use ($user) {
                $query->whereHas('course', function ($query) use ($user) {
                    $query->whereHas('user', function ($query) use ($user) {
                        $query->where('id', $user->id);
                    });
                });
            });
    }

    public static function canView(Model $record): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();


        if ($user->hasRole('admin')) {
            return true;
        }

        return $record->forum->course->user->id === $user->id;
    }

    public static function canEdit(Model $record): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();


        if ($user->hasRole('admin')) {
            return true;
        }

        return $record->forum->course->user->id === $user->id;
    }

    public static function canDelete(Model $record): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();


        if ($user->hasRole('admin')) {
            return true;
        }

        return $record->forum->course->user->id === $user->id;
    }

    public static function canCreate(): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();

        return $user && ($user->hasRole('admin') || $user->hasRole('teacher') && $user->email_verified_at !== null);
    }
}
