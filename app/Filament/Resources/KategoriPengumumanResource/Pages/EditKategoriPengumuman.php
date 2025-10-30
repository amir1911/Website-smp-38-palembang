<?php

namespace App\Filament\Resources\KategoriPengumumanResource\Pages;

use App\Filament\Resources\KategoriPengumumanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKategoriPengumuman extends EditRecord
{
    protected static string $resource = KategoriPengumumanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
