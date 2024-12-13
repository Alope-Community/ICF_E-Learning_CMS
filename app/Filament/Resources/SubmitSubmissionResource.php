<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubmitSubmissionResource\Pages;
use App\Filament\Resources\SubmitSubmissionResource\RelationManagers;
use App\Forms\Components\RangeSlider as ComponentsRangeSlider;
use App\Models\SubmitSubmission;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Yepsua\Filament\Forms\Components\RangeSlider;

class SubmitSubmissionResource extends Resource
{
    protected static ?string $model = SubmitSubmission::class;

    protected static ?string $navigationIcon = 'heroicon-o-download';

    protected static ?string $navigationLabel = 'Submitted Submissions';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('submission_id')
                    ->relationship('submission', 'title', function ($query) {
                        /** @var \App\Models\User */
                        $user = auth()->user();

                        if ($user->hasRole('teacher')) {
                            $query->whereHas('course', function ($subQuery) use ($user) {
                                $subQuery->where('user_id', $user->id);
                            });
                        }
                    })
                    ->label('From Submission')
                    ->required(),
                Select::make('user_id')
                    ->relationship('user', 'name', function ($query) {
                        $query->whereHas('roles', function ($roleQuery) {
                            $roleQuery->where('name', 'student');
                        });
                    })
                    ->label('Submitted By')
                    ->required(),
                Textarea::make('body')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('file')
                    ->preserveFilenames()
                    ->enableDownload()
                    ->label('Upload File')
                    ->directory('submissions')
                    ->loadingIndicatorPosition('right')
                    ->panelAspectRatio('2:1')
                    ->removeUploadedFileButtonPosition('right')
                    ->uploadButtonPosition('right')
                    ->uploadProgressIndicatorPosition('right'),
                ComponentsRangeSlider::make('grade')
                    ->nullable()
                    ->min(0)
                    ->max(100)
                    ->step(10)
                    ->label('Grade')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('submission.title'),
                TextColumn::make('user.name')->label('Submitted By'),
                TextColumn::make('created_at')->label('Submitted At')
                    ->dateTime()
                    ->formatStateUsing(function ($state) {
                        return \Carbon\Carbon::parse($state)->translatedFormat('l, d F Y - H:i');
                    }),
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
            'index' => Pages\ListSubmitSubmissions::route('/'),
            'create' => Pages\CreateSubmitSubmission::route('/create'),
            'view' => Pages\ViewSubmitSubmission::route('/{record}'),
            'edit' => Pages\EditSubmitSubmission::route('/{record}/edit'),
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

        return parent::getEloquentQuery()->whereHas('submission.course', function ($query) use ($user) {
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

        return ($user->hasRole('admin') || ($user->hasRole('teacher') && $user->email_verified_at !== null));
    }

    public static function canView(Model $record): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();


        if ($user->hasRole('admin')) {
            return true;
        }


        return $record->submission
            && $record->submission->course
            && $record->submission->course->user_id === $user->id;
    }

    public static function canCreate(): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();

        return $user && (
            $user->hasRole('admin') ||
            ($user->hasRole('teacher') && $user->email_verified_at !== null)
        );
    }

    public static function canEdit(Model $record): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();


        if ($user->hasRole('admin')) {
            return true;
        }

        return $record->submission
            && $record->submission->course
            && $record->submission->course->user_id === $user->id;
    }

    public static function canDelete(Model $record): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();


        if ($user->hasRole('admin')) {
            return true;
        }

        return $record->submission
            && $record->submission->course
            && $record->submission->course->user_id === $user->id;
    }
}
