<?php

namespace App\Filament\Resources\KategoriPengumumanResource\Pages;

use App\Filament\Resources\KategoriPengumumanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKategoriPengumuman extends CreateRecord
{
    protected static string $resource = KategoriPengumumanResource::class;

       protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
