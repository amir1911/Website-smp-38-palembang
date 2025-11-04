<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Models\Contact;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Tables\Actions;
use Filament\Notifications\Notification;
use Illuminate\Support\Carbon; // ⬅️ Tambahkan untuk format waktu

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;
    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationLabel = 'Pesan Kontak';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->label('Nama')->disabled(),
            Forms\Components\TextInput::make('email')->disabled(),
            Forms\Components\TextInput::make('phone')->disabled(),
            Forms\Components\TextInput::make('subject')->disabled(),
            Forms\Components\Textarea::make('message')->label('Pesan')->disabled(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email'),

                Tables\Columns\TextColumn::make('phone'),

                Tables\Columns\TextColumn::make('subject'),

                Tables\Columns\TextColumn::make('message')
                    ->label('Pesan')
                    ->limit(50),

                // ✅ Kolom waktu dengan zona waktu Indonesia
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dikirim')
                    ->getStateUsing(fn ($record) =>
                        Carbon::parse($record->created_at)
                            ->timezone('Asia/Jakarta')
                            ->translatedFormat('d F Y, H:i') . ' WIB'
                    ),
            ])
            ->actions([
                Actions\ViewAction::make(),

                // ✅ Delete action dengan notifikasi sukses
                Actions\DeleteAction::make()
                    ->label('Hapus')
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->after(function ($record) {
                        Notification::make()
                            ->title('Pesan berhasil dihapus!')
                            ->success()
                            ->send();
                    }),
            ])
            ->bulkActions([
                Actions\DeleteBulkAction::make()
                    ->label('Hapus Terpilih')
                    ->after(function () {
                        Notification::make()
                            ->title('Pesan terpilih berhasil dihapus!')
                            ->success()
                            ->send();
                    }),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
        ];
    }
}
