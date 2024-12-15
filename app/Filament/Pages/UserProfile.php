<?php

namespace App\Filament\Pages;

use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Resources\Form;

class UserProfile extends Page implements HasForms
{

    use InteractsWithForms;

    protected static string $view = 'filament.pages.user-profile';

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationTitle = 'Profile';

    protected static ?string $pageTitle = 'Profile';

    protected static ?string $navigationGroup = 'User Management';

    protected static ?string $slug = 'user-profile';

    public $user;

    public function mount(): void
    {
        /** @var \App\Models\User */
        $this->user = auth()->user();

        if ($this->user) {
            $this->form->fill([
                'name' => $this->user->name,
                'email' => $this->user->email,
                'profile' => $this->user->profile,
            ]);
        }
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->label('Name')
                ->required()
                ->default($this->user->name ?? ''),

            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->email()
                ->disabled()
                ->default($this->user->email ?? ''),

            Forms\Components\FileUpload::make('profile')
                ->nullable()
                ->avatar()
                ->preserveFilenames()
                ->label('Avatar Profile')
                ->directory('profile')
                ->default($this->user->profile ?? null)
                ->panelAspectRatio('2:1')
                ->enableDownload(),
        ];
    }

    public function save()
    {
        $this->validate();

        $this->user->update([
            'name' => $this->form->getState()['name'],
            'profile' => $this->form->getState()['profile'],
        ]);

        $this->notify('success', 'Profile updated successfully.');
    }

    protected function getActions(): array
    {
        return [
            \Filament\Pages\Actions\Action::make('save')
                ->label('Save Changes')
                ->action('save')
                ->color('success'),
        ];
    }
}
