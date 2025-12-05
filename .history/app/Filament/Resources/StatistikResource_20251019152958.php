<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StatistikResource\Pages;
use App\Models\Statistik;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class StatistikResource extends Resource
{
    protected static ?string $model = Statistik::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static ?string $navigationLabel = 'Statistik Sekolah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('guru')
                    ->label('Jumlah Guru')
                    ->numeric()
                    ->required(),

                TextInput::make('kelas7')
                    ->label('Jumlah Siswa Kelas 7')
                    ->numeric()
                    ->required(),

                TextInput::make('kelas8')
                    ->label('Jumlah Siswa Kelas 8')
                    ->numeric()
                    ->required(),

                TextInput::make('kelas9')
                    ->label('Jumlah Siswa Kelas 9')
                    ->numeric()
                    ->required(),

                TextInput::make('staf')
                    ->label('Jumlah Staf')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('guru')->label('Guru'),
                Tables\Columns\TextColumn::make('kelas7')->label('Kelas 7'),
                Tables\Columns\TextColumn::make('kelas8')->label('Kelas 8'),
                Tables\Columns\TextColumn::make('kelas9')->label('Kelas 9'),
                Tables\Columns\TextColumn::make('staf')->label('Staf'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStatistiks::route('/'),
            'create' => Pages\CreateStatistik::route('/create'),
            'edit' => Pages\EditStatistik::route('/{record}/edit'),
        ];
    }
}
