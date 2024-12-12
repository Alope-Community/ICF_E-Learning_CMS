<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubmitSubmissionResource\Pages;
use App\Filament\Resources\SubmitSubmissionResource\RelationManagers;
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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubmitSubmissionResource extends Resource
{
    protected static ?string $model = SubmitSubmission::class;

    protected static ?string $navigationIcon = 'heroicon-o-download';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('submission_id')
                    ->relationship('submission', 'title', function ($query) {
                        /** @var \App\Models\User */
                        $user = auth()->user();
                        $user->hasRole('teacher') && $query->where('user_id', auth()->id());
                    })
                    ->label('From Submission')
                    ->required(),
                FileUpload::make('file')
                    ->label('Upload File')
                    ->required(),
                Textarea::make('body')
                    ->required()
                    ->columnSpanFull(),
                Select::make('user_id')
                    ->relationship('user', 'name', function ($query) {
                        $query->whereHas('roles', function ($roleQuery) {
                            $roleQuery->where('name', 'student');
                        });
                    })
                    ->label('Submitted By')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
}
