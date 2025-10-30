<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EkstrakurikulerResource\Pages;
use App\Models\Ekstrakurikuler;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EkstrakurikulerResource extends Resource
{
    protected static ?string $model = Ekstrakurikuler::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Ekstrakurikuler';
    protected static ?string $navigationGroup = 'Data Sekolah';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama_kegiatan')
                ->label('Nama Kegiatan')
                ->required(),

            Forms\Components\FileUpload::make('foto')
                ->label('Foto Kegiatan')
                ->image()
                ->directory('ekstrakurikuler')
                ->visibility('public') // penting agar bisa ditampilkan
                ->maxSize(2048),

            Forms\Components\Textarea::make('deskripsi')
                ->label('Deskripsi')
                ->rows(4),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('nama_kegiatan')->label('Nama Kegiatan'),
            Tables\Columns\ImageColumn::make('foto')->label('Foto'),
            Tables\Columns\TextColumn::make('deskripsi')->label('Deskripsi')->limit(50),
        ])->actions([
            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEkstrakurikulers::route('/'),
            'create' => Pages\CreateEkstrakurikuler::route('/create'),
            'edit' => Pages\EditEkstrakurikuler::route('/{record}/edit'),
        ];
    }
}
