<?php

namespace App\Filament\Pages\Auth;

use App\Models\User;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;


class ChangePassword extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string $view = 'filament.pages.auth.change-password';

    protected static bool $shouldRegisterNavigation = false;

    protected ?string $heading = '';

    public $data = [];

    public User $user;

    public function mount()
    {
        $this->user = auth()->user();
        $this->data = [];
    }

    public function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Change Password')
                    ->schema([
                        Forms\Components\TextInput::make('current_password')
                            ->password()
                            ->revealable()
                            ->currentPassword()
                            ->prefixIcon('heroicon-m-lock-closed')
                            ->required()
                            ->minLength(6)
                            ->maxLength(16),
                        Forms\Components\TextInput::make('password')
                            ->label('New Password')
                            ->password()
                            ->revealable()
                            ->prefixIcon('heroicon-m-lock-closed')
                            ->required()
                            ->minLength(6)
                            ->maxLength(16)
                            ->confirmed(),
                        Forms\Components\TextInput::make('password_confirmation')
                            ->label('Confirm New Password')
                            ->password()
                            ->revealable()
                            ->prefixIcon('heroicon-m-lock-closed')
                            ->required()
                            ->minLength(6)
                            ->maxLength(16),
                        Forms\Components\Actions::make([
                            Forms\Components\Actions\Action::make('submit')
                                ->action(fn () => $this->save())
                                ->label('Change Password'),
                            Forms\Components\Actions\Action::make('reset')
                                ->color('danger')
                                ->action(fn () => $this->mount())
                                ->label('Reset'),
                        ]),
                    ])
                    ->compact(),
            ])
            ->model($this->user)
            ->statePath('data');
    }

    public function save()
    {
        $this->validate();

        $this->user->update([
            'password' => bcrypt($this->data['password']),
        ]);

        $this->redirect('login');
    }
}
