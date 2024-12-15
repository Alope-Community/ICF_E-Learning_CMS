<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Filament\Resources\CourseResource\RelationManagers;
use App\Models\Course;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\CheckboxList;
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
                    ->reactive()
                    ->afterStateUpdated(function ($state, $set) {
                        $set('slug', \Illuminate\Support\Str::slug($state));
                    })
                    ->maxLength(255),
                TextInput::make('slug')
                    ->unique(Course::class, 'slug', fn($record) => $record)
                    ->disabled()
                    ->maxLength(255),
                Select::make('category_id')
                    ->relationship('category', 'title')
                    ->label('Category')
                    ->required(),
                TextInput::make('course_code')
                    ->default(fn() => \Illuminate\Support\Str::upper(\Illuminate\Support\Str::random(6)))
                    ->unique(Course::class, 'course_code', fn($record) => $record)
                    ->disabled(),
                Select::make('students')
                    ->relationship('users', 'name', function ($query) {
                        $query->whereHas('roles', function ($roleQuery) {
                            $roleQuery->where('name', 'student');
                        });
                    })
                    ->label('Daftar Siswa')
                    ->columns(2)
                    ->multiple()
                    ->helperText('Pilih siswa yang dapat mengikuti kelas.'),
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
                    ->limit(30)
                    ->tooltip(fn($record) => $record->description),
                TextColumn::make('category.title'),
                Tables\Columns\TextColumn::make('description')
                    ->limit(30)
                    ->tooltip(fn($record) => $record->description),
            ])
            ->filters([])
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
        return [];
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


        return parent::getEloquentQuery()->where('user_id', $user->id);
    }

    public static function canView(Model $record): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();


        if ($user->hasRole('admin')) {
            return true;
        }


        return $record->user_id === $user->id;
    }

    public static function canEdit(Model $record): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();


        if ($user->hasRole('admin')) {
            return true;
        }


        return $record->user_id === $user->id;
    }

    public static function canDelete(Model $record): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();


        if ($user->hasRole('admin')) {
            return true;
        }


        return $record->user_id === $user->id;
    }

    public static function canCreate(): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();


        return $user && ($user->hasRole('admin') || $user->hasRole('teacher') && $user->email_verified_at !== null);
    }
}
