<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuruResource\Pages;
use App\Models\Guru;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GuruResource extends Resource
{
    protected static ?string $model = Guru::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Guru & Staff';
    protected static ?string $pluralModelLabel = 'Guru & Staff';
    protected static ?string $navigationGroup = 'Manajemen Sekolah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('mata_pelajaran')
                    ->label('Mata Pelajaran')
                    ->maxLength(255)
                    ->placeholder('Kosongkan jika Staff'),

                Forms\Components\Select::make('jabatan')
                    ->label('Jabatan')
                    ->options([
                        'Guru' => 'Guru',
                        'Staff' => 'Staff',
                    ])
                    ->required(),

                Forms\Components\FileUpload::make('foto')
                    ->label('Foto')
                    ->image()
                    ->directory('guru')
                    ->maxSize(2048)
                    ->imageEditor(),

                Forms\Components\TextInput::make('facebook')
                    ->label('Link Facebook')
                    ->prefixIcon('heroicon-o-link')
                    ->maxLength(255)
                    ->placeholder('https://facebook.com/...'),

                Forms\Components\TextInput::make('instagram')
                    ->label('Link Instagram')
                    ->prefixIcon('heroicon-o-link')
                    ->maxLength(255)
                    ->placeholder('https://instagram.com/...'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->circular(),

                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('mata_pelajaran')
                    ->label('Mata Pelajaran')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('jabatan')
                    ->label('Jabatan')
                    ->badge()
                    ->colors([
                        'success' => 'Guru',
                        'info' => 'Staff',
                    ]),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListGurus::route('/'),
            'create' => Pages\CreateGuru::route('/create'),
            'edit' => Pages\EditGuru::route('/{record}/edit'),
        ];
    }
}
