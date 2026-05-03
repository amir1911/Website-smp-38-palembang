<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Kelola User';
    protected static ?string $navigationGroup = 'Manajemen Akses';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->label('Nama Lengkap')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->email()
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('password')
                ->label('Password')
                ->password()
                ->revealable()
                ->required(fn (string $context) => $context === 'create')
                ->dehydrated(fn ($state) => filled($state)),

            Forms\Components\Select::make('role')
                ->label('Peran')
                ->options([
                    'super_admin' => 'Super Admin',
                    'admin' => 'Admin',
                ])
                ->default('admin')
                ->disabled(fn () => Auth::user()?->role !== 'super_admin'), // ✅ FIX
        ]);
    }

    public static function table(Table $table): Table
    {
        App::setLocale('id');
        Carbon::setLocale('id');

        return $table
            ->modifyQueryUsing(function ($query) {
                // ✅ Admin hanya lihat dirinya sendiri
                if (Auth::user()?->role !== 'super_admin') {
                    $query->where('id', Auth::id());
                }
            })
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                Tables\Columns\BadgeColumn::make('role')
                    ->label('Peran')
                    ->colors([
                        'success' => 'super_admin',
                        'warning' => 'admin',
                    ]),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->getStateUsing(function ($record) {
                        return Carbon::parse($record->created_at)
                            ->timezone(config('app.timezone'))
                            ->translatedFormat('l, d F Y H:i') . ' WIB';
                    })
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),

                Tables\Actions\DeleteAction::make()
                    ->label('Delete')
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->requiresConfirmation()
                    ->visible(fn () => Auth::user()?->role === 'super_admin'), // ✅ FIX
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->visible(fn () => Auth::user()?->role === 'super_admin'), // ✅ FIX
                ]),
            ]);
    }

    // ✅ Super Admin saja yang bisa create
    public static function canCreate(): bool
    {
        return Auth::user()?->role === 'super_admin';
    }

    // ✅ Super Admin saja yang bisa delete
    public static function canDelete($record): bool
    {
        return Auth::user()?->role === 'super_admin';
    }

    // ✅ Semua user login boleh lihat (filter sudah di query)
    public static function canViewAny(): bool
    {
        return Auth::check();
    }

    // ✅ Admin hanya bisa edit dirinya sendiri
    public static function canEdit($record): bool
    {
        if (Auth::user()?->role === 'super_admin') return true;

        return Auth::id() === $record->id;
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}