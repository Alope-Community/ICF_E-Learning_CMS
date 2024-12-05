<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubmissionResource\Pages;
use App\Filament\Resources\SubmissionResource\RelationManagers;
use App\Models\Submission;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubmissionResource extends Resource
{
    protected static ?string $model = Submission::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->columnSpanFull()
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull()
                    ->required(),
                Select::make('course_id')
                    ->relationship('course', 'title')
                    ->label('From Course')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('description')
                    ->limit(30)
                    ->tooltip(fn($record) => $record->description),
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
            'index' => Pages\ListSubmissions::route('/'),
            'create' => Pages\CreateSubmission::route('/create'),
            'view' => Pages\ViewSubmission::route('/{record}'),
            'edit' => Pages\EditSubmission::route('/{record}/edit'),
        ];
    }

    public function mount(): void
    {
        $user = Filament::auth()->user();

        $user = Filament::auth()->user();

        abort_unless($user && (
            $user->hasRole('admin') ||
            ($user->hasRole('teacher') && $user->email_verified_at !== null)
        ), 403);
    }

    protected static function shouldRegisterNavigation(): bool
    {
        $user = Filament::auth()->user();

        $user = Filament::auth()->user();

        return $user && (
            $user->hasRole('admin') ||
            ($user->hasRole('teacher') && $user->email_verified_at !== null)
        );
    }

    public static function canViewAny(): bool
    {
        $user = Filament::auth()->user();

        $user = Filament::auth()->user();

        return $user && (
            $user->hasRole('admin') ||
            ($user->hasRole('teacher') && $user->email_verified_at !== null)
        );
    }

    public static function canCreate(): bool
    {
        $user = Filament::auth()->user();

        $user = Filament::auth()->user();

        return $user && (
            $user->hasRole('admin') ||
            ($user->hasRole('teacher') && $user->email_verified_at !== null)
        );
    }

    public static function canEdit(Model $record): bool
    {
        $user = Filament::auth()->user();

        $user = Filament::auth()->user();

        return $user && (
            $user->hasRole('admin') ||
            ($user->hasRole('teacher') && $user->email_verified_at !== null)
        );
    }

    public static function canDelete(Model $record): bool
    {
        $user = Filament::auth()->user();

        return $user && (
            $user->hasRole('admin') ||
            ($user->hasRole('teacher') && $user->email_verified_at !== null)
        );
    }
}
