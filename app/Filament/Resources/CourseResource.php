<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Filament\Resources\CourseResource\RelationManagers;
use App\Models\Course;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->unique(Course::class, 'slug', fn($record) => $record)
                    ->required()
                    ->maxLength(255),
                Select::make('category_id')
                    ->relationship('category', 'title')
                    ->label('Category')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull()
                    ->required(),
                TiptapEditor::make('body')
                    ->columnSpanFull()
                    ->required()
                    ->extraInputAttributes(['style' => 'min-height: 25rem; overflow-y: auto;']),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
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
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'view' => Pages\ViewCourse::route('/{record}'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
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
