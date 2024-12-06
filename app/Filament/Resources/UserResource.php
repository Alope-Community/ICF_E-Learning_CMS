<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('roles')
                    ->multiple()
                    ->relationship('roles', 'name')
                    ->preload()
                    ->options(Role::all()->pluck('name', 'id'))
                    ->label('Roles'),
                Forms\Components\Select::make('permissions')
                    ->multiple()
                    ->relationship('permissions', 'name')
                    ->preload()
                    ->options(Permission::all()->pluck('name', 'id'))
                    ->label('Permissions'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\BadgeColumn::make('roles.name')
                    ->label('Role')
                    ->colors([
                        'primary' => 'admin',
                        'success' => 'teacher',
                        'warning' => 'student',
                    ])->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
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
