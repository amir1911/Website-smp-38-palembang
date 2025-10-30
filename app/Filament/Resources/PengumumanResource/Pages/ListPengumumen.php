<?php

namespace App\Filament\Resources\PengumumanResource\Pages;

use App\Filament\Resources\PengumumanResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListPengumumen extends ListRecords
{
    protected static string $resource = PengumumanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(), // tombol tambah
        ];
    }
}
