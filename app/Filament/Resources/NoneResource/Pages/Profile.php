<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;

class Profile extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $navigationLabel = 'Profil Saya';
    protected static ?string $navigationGroup = 'Akun';

    protected static string $view = 'filament.pages.profile';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(Auth::user()->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->label('Nama')->required(),
                Forms\Components\TextInput::make('email')->email()->required(),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->revealable()
                    ->dehydrateStateUsing(fn($state) => filled($state) ? bcrypt($state) : Auth::user()->password)
                    ->label('Password Baru'),
                Forms\Components\FileUpload::make('photo')->label('Foto Profil')->image(),
                Forms\Components\Textarea::make('bio')->label('Bio'),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $user = Auth::user();
        $user->update($this->form->getState());

        Notification::make()
            ->title('Profil berhasil diperbarui')
            ->success()
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            Forms\Components\Actions\Action::make('save')
                ->label('Simpan Perubahan')
                ->button()
                ->submit('save'),
        ];
    }
}
