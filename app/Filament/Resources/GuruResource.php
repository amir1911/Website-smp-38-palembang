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
    protected static ?string $navigationLabel = 'Guru';
    protected static ?string $modelLabel = 'Guru'; //untuk menganti judul di admin
    protected static ?string $pluralLabel = 'Guru';//agar tidak terjadi penambahan kata
    protected static ?string $navigationGroup = 'Data Sekolah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Guru')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('mata_pelajaran')
                    ->label('Mata Pelajaran')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('jabatan')
                    ->label('Jabatan')
                    ->maxLength(255),

                Forms\Components\FileUpload::make('foto')
                    ->label('Foto Guru')
                    ->image()
                    ->directory('guru')
                    ->required(false),

                Forms\Components\TextInput::make('facebook')
                    ->label('Facebook')
                    ->maxLength(255)
                    ->placeholder('https://facebook.com/...'),

                Forms\Components\TextInput::make('instagram')
                    ->label('Instagram')
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
                    ->searchable(),

                Tables\Columns\TextColumn::make('jabatan')
                    ->label('Jabatan'),

                Tables\Columns\TextColumn::make('facebook')
                    ->label('Facebook')
                    ->limit(20),

                Tables\Columns\TextColumn::make('instagram')
                    ->label('Instagram')
                    ->limit(20),

                
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
