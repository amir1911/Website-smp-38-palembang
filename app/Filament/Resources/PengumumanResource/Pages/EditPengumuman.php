<?php

namespace App\Filament\Resources\PengumumanResource\Pages;

use App\Filament\Resources\PengumumanResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions;

class EditPengumuman extends EditRecord
{
    protected static string $resource = PengumumanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(), // tombol hapus di halaman edit
        ];
    }
}
