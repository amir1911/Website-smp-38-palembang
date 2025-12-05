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
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ExportAction\Export;




class GuestResource extends Resource
{
    protected static ?string $model = Guest::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Buku Tamu';
    protected static ?string $pluralModelLabel = 'Daftar Tamu';

    /**
     * Form (note: use Filament\Forms\Form type via alias below)
     *
     * @param  \Filament\Forms\Form  $form
     * @return \Filament\Forms\Form
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
     * Table (note: use Filament\Tables\Table type via Forms alias)
     *
     * @param  \Filament\Tables\Table  $table
     * @return \Filament\Tables\Table
     */
    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    ->square()
                    ->height(80)
                    ->width(80),

                TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('instansi')
                    ->label('Instansi')
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
                ExportAction::make()
                    ->label('📄 Ekspor Data')
                    ->exports([
                        FileExport::make('pdf')
                            ->label('Ekspor PDF')
                            ->filename('Buku_Tamu_' . now()->format('Y-m-d_His')),
                    ])
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
