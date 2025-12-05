<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuestResource\Pages;
use App\Models\Guest;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ExportAction\Export;

use Filament\Tables\Actions\Action;    // untuk PDF
use Barryvdh\DomPDF\Facade\Pdf;        // untuk PDF export



class GuestResource extends Resource
{
    protected static ?string $model = Guest::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Buku Tamu';
    protected static ?string $pluralModelLabel = 'Daftar Tamu';

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
                    ->imagePreviewHeight(150),
            ]);
    }


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

                // =============================
                // EXPORT CSV / XLSX (Filament)
                // =============================
                ExportAction::make('export')
                    ->label('📁 Ekspor Excel / CSV')
                    ->exports([
                        Export::make('CSV'),
                        Export::make('XLSX'),
                    ]),

                // =============================
                // EXPORT PDF (Manual DOMPDF)
                // =============================
                Action::make('pdf')
                    ->label('📄 Ekspor PDF')
                    ->color('danger')
                    ->icon('heroicon-o-document-arrow-down')
                    ->action(function () {
                        $guests = Guest::orderBy('created_at', 'desc')->get();

                        $pdf = Pdf::loadView('pdf.buku_tamu', [
                            'guests' => $guests,
                        ])->setPaper('a4', 'portrait');

                        return response()->streamDownload(function () use ($pdf) {
                            echo $pdf->output();
                        }, 'Buku_Tamu_' . now()->format('Y-m-d_His') . '.pdf');
                    }),

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
