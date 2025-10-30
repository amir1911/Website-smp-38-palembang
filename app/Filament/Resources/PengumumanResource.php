<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengumumanResource\Pages;
use App\Models\Pengumuman;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PengumumanResource extends Resource
{
    protected static ?string $model = Pengumuman::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';
    protected static ?string $navigationGroup = 'Manajemen Pengumuman';
    protected static ?string $modelLabel = 'Pengumuman';
    protected static ?string $pluralLabel = 'Pengumuman';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('judul')
                ->label('Judul Pengumuman')
                ->required()
                ->maxLength(255),

            Forms\Components\Textarea::make('isi')
                ->label('Isi Pengumuman')
                ->required(),

            Forms\Components\FileUpload::make('foto')
                ->label('Foto')
                ->image()
                ->directory('pengumuman/foto')
                ->imageEditor()
                ->maxSize(2048)
                ->rules(['image', 'mimes:jpg,jpeg,png', 'max:2048'])
                ->helperText('Format: JPG/PNG, Maks: 2 MB'),

            Forms\Components\FileUpload::make('file_pdf')
                ->label('File PDF (opsional)')
                ->directory('pengumuman/pdf')
                ->acceptedFileTypes(['application/pdf'])
                ->maxSize(5120)
                ->helperText('Upload file pengumuman dalam format PDF (maks 5 MB).'),

            Forms\Components\Select::make('kategori_id')
                ->label('Kategori')
                ->relationship('kategori', 'nama_kategori')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->circular()
                    ->height(50)
                    ->width(50),

                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable(),

                Tables\Columns\TextColumn::make('kategori.nama_kategori')
                    ->label('Kategori')
                    ->sortable()
                    ->badge(),

                Tables\Columns\TextColumn::make('file_pdf')
                    ->label('File PDF')
                    ->formatStateUsing(fn ($state) => $state ? '📄 Download' : '-')
                    ->url(fn ($record) => $record->file_pdf ? asset('storage/' . $record->file_pdf) : null)
                    ->openUrlInNewTab(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Waktu Upload')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori_id')
                    ->label('Filter Kategori')
                    ->relationship('kategori', 'nama_kategori'),
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
            'index' => Pages\ListPengumumen::route('/'),
            'create' => Pages\CreatePengumuman::route('/create'),
            'edit' => Pages\EditPengumuman::route('/{record}/edit'),
        ];
    }
}
