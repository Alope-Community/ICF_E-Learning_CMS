<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Facades\Filament;
use Filament\Forms;
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

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $set('slug', \Illuminate\Support\Str::slug($state));
                    })
                    ->maxLength(255),
                TextInput::make('slug')
                    ->disabled()
                    ->maxLength(255)->unique(),
                Textarea::make('description')
                    ->required()
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'view' => Pages\ViewCategory::route('/{record}'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }

    public function mount(): void
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        abort_unless($user->hasRole('admin'), 403);
    }

    protected static function shouldRegisterNavigation(): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        return $user->hasRole('admin');
    }

    public static function canViewAny(): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        return $user->hasRole('admin');
    }

    public static function canCreate(): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        return $user->hasRole('admin');
    }

    public static function canEdit(Model $record): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        return $user->hasRole('admin');
    }

    public static function canDelete(Model $record): bool
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        return $user->hasRole('admin');
    }
}
