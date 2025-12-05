<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriPengumumanResource\Pages;
use App\Models\KategoriPengumuman;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KategoriPengumumanResource extends Resource
{
    protected static ?string $model = KategoriPengumuman::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationGroup = 'Manajemen Pengumuman';
    protected static ?string $modelLabel = 'Kategori Pengumuman';
    protected static ?string $pluralLabel = 'Kategori Pengumuman';
    protected static ?string $label = 'Kategori Pemberitahuan';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama_kategori')
                ->label('Nama Kategori')
                ->required()
                ->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('nama_kategori')
                    ->label('Nama Kategori')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i'),
            ])
            ->filters([])
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
            'index' => Pages\ListKategoriPengumumen::route('/'),
            'create' => Pages\CreateKategoriPengumuman::route('/create'),
            'edit' => Pages\EditKategoriPengumuman::route('/{record}/edit'),
        ];
    }
}
