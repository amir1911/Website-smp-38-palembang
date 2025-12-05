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
    protected static ?string $modelLabel = 'Guru / Staff';
    protected static ?string $pluralLabel = 'Guru & Staff';
    protected static ?string $navigationGroup = 'Data Sekolah';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Grid::make(2)->schema([
                // ========================
                // Kolom Kiri
                // ========================
                Forms\Components\Section::make('Data Pribadi')->schema([
                    Forms\Components\Select::make('kategori')
                        ->label('Kategori')
                        ->options([
                            'Guru' => 'Guru',
                            'Staff' => 'Staff',
                        ])
                        ->default('Guru')
                        ->reactive()
                        ->required(),

                    Forms\Components\TextInput::make('nip')
    ->label('NIP')
    ->maxLength(255)
    ->placeholder('Masukkan NIP (opsional)')
    ->unique(ignoreRecord: true),


                    Forms\Components\TextInput::make('nama')
                        ->label('Nama Lengkap')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('jabatan')
                        ->label('Jabatan')
                        ->maxLength(255)
                        ->nullable(),

                    Forms\Components\TextInput::make('mata_pelajaran')
                        ->label('Mata Pelajaran')
                        ->maxLength(255)
                        ->nullable()
                        ->visible(fn ($get) => $get('kategori') === 'Guru'),
                ])->columns(2),

                // ========================
                // Kolom Kanan
                // ========================
                Forms\Components\Section::make('Foto & Sosial Media')->schema([
                    Forms\Components\FileUpload::make('foto')
                        ->label('Foto Profil')
                        ->image()
                        ->imageEditor()
                        ->imagePreviewHeight('150')
                        ->previewable(true)
                        ->directory('guru')
                        ->visibility('public')
                        ->nullable(),

                    Forms\Components\TextInput::make('facebook')
                        ->label('Facebook')
                        ->maxLength(255)
                        ->placeholder('https://facebook.com/...'),

                    Forms\Components\TextInput::make('instagram')
                        ->label('Instagram')
                        ->maxLength(255)
                        ->placeholder('https://instagram.com/...'),

                    Forms\Components\TextInput::make('linkedin')
                        ->label('LinkedIn')
                        ->maxLength(255)
                        ->placeholder('https://linkedin.com/in/...'),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->circular(),

                Tables\Columns\TextColumn::make('nip')
                    ->label('NIP')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('kategori')
                    ->label('Kategori')
                    ->colors([
                        'success' => 'Guru',
                        'info' => 'Staff',
                    ])
                    ->sortable(),

                Tables\Columns\TextColumn::make('mata_pelajaran')
                    ->label('Mata Pelajaran')
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('jabatan')
                    ->label('Jabatan')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('facebook')
                    ->label('Facebook')
                    ->limit(20),

                Tables\Columns\TextColumn::make('instagram')
                    ->label('Instagram')
                    ->limit(20),

                Tables\Columns\TextColumn::make('linkedin')
                    ->label('LinkedIn')
                    ->limit(20),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori')
                    ->options([
                        'Guru' => 'Guru',
                        'Staff' => 'Staff',
                    ])
                    ->label('Filter Berdasarkan Kategori'),
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
