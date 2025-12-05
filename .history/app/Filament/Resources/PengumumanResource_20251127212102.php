<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengumumanResource\Pages;
use App\Models\Pengumuman;
use App\Models\KategoriPengumuman;
use Carbon\Carbon;
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
        Forms\Components\Section::make('Informasi Pengumuman')->schema([

    Forms\Components\TextInput::make('judul')
        ->label('Judul Pengumuman')
        ->required()
        ->maxLength(255)
        ->placeholder('Masukkan judul pengumuman'),

    Forms\Components\Select::make('kategori_id')
        ->label('Kategori')
        ->relationship('kategori', 'nama_kategori')
        ->required()
        ->reactive()
        ->helperText('Pilih kategori seperti PPDB, Alumni, atau Pemberitahuan.'),

    Forms\Components\Textarea::make('isi')
        ->label('Isi Pengumuman')
        ->rows(6)
        ->placeholder('Tuliskan isi pengumuman di sini...')
        ->nullable()
        ->helperText('Hanya untuk kategori "Pemberitahuan". Kosongkan jika unggah PDF.'),

    Forms\Components\FileUpload::make('foto')
        ->label('Foto (Opsional)')
        ->directory('pengumuman/foto')
        ->image()
        ->imageEditor()
        ->maxSize(2048)
        ->helperText('Format: JPG/PNG, maks 2MB.'),

    // ✅ LINK INSTAGRAM BARU
    Forms\Components\TextInput::make('instagram_link')
        ->label('Link Instagram (Opsional)')
        ->placeholder('https://www.instagram.com/p/xxxxxx/')
        ->url()
        ->maxLength(255)
        ->prefixIcon('heroicon-o-link')
        ->columnSpanFull()
        ->helperText('Masukkan link postingan Instagram jika ingin menampilkan embed.'),

    Forms\Components\FileUpload::make('file_pdf')
        ->label('File PDF (Khusus Alumni & PPDB)')
        ->directory('pengumuman/pdf')
        ->acceptedFileTypes(['application/pdf'])
        ->maxSize(5120)
        ->visible(fn (callable $get) => 
            str_contains(strtoupper(optional(KategoriPengumuman::find($get('kategori_id')))->nama_kategori ?? ''), 'PPDB') 
            || str_contains(strtoupper(optional(KategoriPengumuman::find($get('kategori_id')))->nama_kategori ?? ''), 'ALUMNI')
        )
        ->helperText('Upload file PDF pengumuman (maks 5MB).'),

    Forms\Components\DatePicker::make('tanggal')
        ->label('Tanggal Pengumuman')
        ->default(now())
        ->required(),

    Forms\Components\Toggle::make('status')
        ->label('Tampilkan di Website')
        ->default(true),
]),

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->circular()
                    ->height(45)
                    ->width(45),

                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->limit(40)
                    ->searchable(),

                // 🔹 Tambahkan kolom deskripsi di tabel
                Tables\Columns\TextColumn::make('isi')
                    ->label('Deskripsi')
                    ->limit(60)
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('kategori.nama_kategori')
                    ->label('Kategori')
                    ->badge()
                    ->sortable(),

                Tables\Columns\TextColumn::make('file_pdf')
                    ->label('PDF')
                    ->formatStateUsing(fn ($state) => $state ? '📄 Lihat File' : '-')
                    ->url(fn ($record) => $record->file_pdf ? asset('storage/' . $record->file_pdf) : null)
                    ->openUrlInNewTab(),

                Tables\Columns\IconColumn::make('status')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-eye')
                    ->falseIcon('heroicon-o-eye-slash'),

                     // 🗓️ Kolom tanggal dengan format Indonesia
                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->formatStateUsing(fn ($state) => 
                        Carbon::parse($state)
                            ->locale('id')
                            ->translatedFormat('d F Y')
                    )
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori_id')
                    ->label('Filter Kategori')
                    ->relationship('kategori', 'nama_kategori'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengumumen::route('/'),
            'create' => Pages\CreatePengumuman::route('/create'),
            'edit' => Pages\EditPengumuman::route('/{record}/edit'),
        ];
    }
}
