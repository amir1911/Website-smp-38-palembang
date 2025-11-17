<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarouselResource\Pages;
use App\Models\Carousel;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;

class CarouselResource extends Resource
{
    protected static ?string $model = Carousel::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Website';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([

                Forms\Components\FileUpload::make('gambar')
                    ->label('Foto Carousel')
                    ->directory('carousel')
                    ->disk('public')
                    ->visibility('public')        // penting agar public URL dapat diakses
                    ->image()
                    // ->imageEditor()            // aktifkan kalau Filament versi kamu mendukung
                    ->preserveFilenames()        // mencegah perubahan nama yang kadang memicu masalah
                    ->maxSize(4096)              // 4 MB
                    ->required(),

                Forms\Components\TextInput::make('judul')
                    ->label('Judul Gambar')
                    ->maxLength(100),

                Forms\Components\TextInput::make('urutan')
                    ->label('Urutan Tampil')
                    ->numeric()
                    ->default(0),

                Forms\Components\Toggle::make('aktif')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')->label('Foto'),
                Tables\Columns\TextColumn::make('judul')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('urutan')->sortable(),
                Tables\Columns\IconColumn::make('aktif')->boolean(),
                Tables\Columns\TextColumn::make('created_at')->date(),
            ])
            ->defaultSort('urutan', 'asc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListCarousels::route('/'),
            'create' => Pages\CreateCarousel::route('/create'),
            'edit'   => Pages\EditCarousel::route('/{record}/edit'),
        ];
    }
}
