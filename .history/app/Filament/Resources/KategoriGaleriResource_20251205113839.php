<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriGaleriResource\Pages;
use App\Models\KategoriGaleri;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KategoriGaleriResource extends Resource
{
    protected static ?string $model = KategoriGaleri::class;
  protected static ?string $navigationIcon = 'heroicon-o-folder';
    protected static ?string $navigationGroup = 'Manajemen Galeri';
    protected static ?string $modelLabel = 'Kategori Galeri';
    protected static ?string $pluralModelLabel = 'Kategori Galeri';
    protected static ?string $navigationLabel = 'Kategori Galeri';


    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama')
                ->label('Nama Kategori')
                ->required()
                ->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Kategori')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKategoriGaleris::route('/'),
            'create' => Pages\CreateKategoriGaleri::route('/create'),
            'edit' => Pages\EditKategoriGaleri::route('/{record}/edit'),
        ];
    }
}
