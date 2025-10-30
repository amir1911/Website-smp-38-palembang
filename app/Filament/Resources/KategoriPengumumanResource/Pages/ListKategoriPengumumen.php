<?php

namespace App\Filament\Resources\KategoriPengumumanResource\Pages;

use App\Filament\Resources\KategoriPengumumanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKategoriPengumumen extends ListRecords
{
    protected static string $resource = KategoriPengumumanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
