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
                    ->reactive()
                    ->afterStateUpdated(function ($state, $set) {
                        $set('slug', \Illuminate\Support\Str::slug($state));
                    })
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull()
                    ->required(),
                Select::make('course_id')
                    ->relationship('course', 'title', function ($query) {
                        /** @var \App\Models\User */
                        $user = auth()->user();
                        $user->hasRole('teacher') && $query->where('user_id', auth()->id());
                    })
                    ->label('From Course')
                    ->required(),
                Forms\Components\DateTimePicker::make('deadline')
                    ->format('Y-m-d H:i')
                    ->timezone('Asia/Jakarta')
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
                Tables\Columns\TextColumn::make('deadline')
                    ->dateTime()
                    ->placeholder('-')
                    ->formatStateUsing(function ($state) {
                        return $state
                            ? \Carbon\Carbon::parse($state)->translatedFormat('l, d F Y - H:i')
                            : '-';
                    }),
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
            'index' => Pages\ListSubmissions::route('/'),
            'create' => Pages\CreateSubmission::route('/create'),
            'view' => Pages\ViewSubmission::route('/{record}'),
            'edit' => Pages\EditSubmission::route('/{record}/edit'),
        ];
    }

    public function mount(): void
    {
        /** @var \App\Models\User */
        $user = auth()->user();

        abort_unless($user && (
            $user->hasRole('admin') ||
            ($user->hasRole('teacher') && $user->email_verified_at !== null)
        ), 403);
    }

    public static function getEloquentQuery(): Builder
    {
        /** @var \App\Models\User */
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            return parent::getEloquentQuery();
        }

        return parent::getEloquentQuery()->whereHas('course', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        });
    }

    protected static function shouldRegisterNavigation(): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();

        return $user && (
            $user->hasRole('admin') ||
            ($user->hasRole('teacher') && $user->email_verified_at !== null)
        );
    }

    public static function canViewAny(): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            return true;
        }

        return $user && $user->email_verified_at !== null && (
            $user->hasRole('teacher') || $user->hasRole('admin')
        );
    }

    public static function canView(Model $record): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();


        if ($user->hasRole('admin')) {
            return true;
        }


        return $record->course->user_id === $user->id;
    }

    public static function canEdit(Model $record): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();


        if ($user->hasRole('admin')) {
            return true;
        }


        return $record->course->user_id === $user->id;
    }

    public static function canDelete(Model $record): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();


        if ($user->hasRole('admin')) {
            return true;
        }


        return $record->course->user_id === $user->id;
    }

    public static function canCreate(): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();


        return $user && ($user->hasRole('admin') || $user->hasRole('teacher') && $user->email_verified_at !== null);
    }
}
