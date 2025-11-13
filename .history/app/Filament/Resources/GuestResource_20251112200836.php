<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuestResource\Pages;
use App\Models\Guest;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Resources\Form as ResourceFormContract;
use Filament\Resources\Table as ResourceTableContract;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;

class GuestResource extends Resource
{
    protected static ?string $model = Guest::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Buku Tamu';
    protected static ?string $pluralModelLabel = 'Daftar Tamu';

    /**
     * FORM
     */
    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Tamu')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('instansi')
                    ->label('Instansi / Asal')
                    ->maxLength(255),

                Forms\Components\Textarea::make('keperluan')
                    ->label('Keperluan')
                    ->rows(3)
                    ->maxLength(65535),

                Forms\Components\FileUpload::make('foto')
                    ->label('Foto')
                    ->image()
                    ->directory('guests')
                    ->disk('public')
                    ->imagePreviewHeight('150'),
            ]);
    }

    /**
     * TABLE
     */
    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->getStateUsing(fn ($record) => asset('storage/' . $record->foto))
                    ->square()
                    ->height(80)
                    ->width(80),

                TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('instansi')
                    ->label('Instansi / Asal')
                    ->searchable(),

                TextColumn::make('keperluan')
                    ->label('Keperluan')
                    ->wrap(),

                TextColumn::make('created_at')
                    ->label('Waktu Datang')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([])
            ->headerActions([
                // Tombol Ekspor PDF
                FilamentExportHeaderAction::make('exportPdf')
                    ->label('📄 Ekspor PDF')
                    ->fileName('Buku_Tamu_' . now()->format('Y-m-d_His'))
                    ->defaultFormat('pdf')
                    // ->view('exports.guest-report') // aktifkan ini jika pakai template PDF custom
                    ->color('danger')
                    ->icon('heroicon-o-document'),

                // Tombol Ekspor Excel
                FilamentExportHeaderAction::make('exportExcel')
                    ->label('📊 Ekspor Excel')
                    ->fileName('Buku_Tamu_' . now()->format('Y-m-d_His'))
                    ->defaultFormat('xlsx')
                    ->color('success')
                    ->icon('heroicon-o-table'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListGuests::route('/'),
            'create' => Pages\CreateGuest::route('/create'),
            'edit' => Pages\EditGuest::route('/{record}/edit'),
        ];
    }
}
