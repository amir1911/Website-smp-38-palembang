<?php

namespace App\Filament\Resources\KategoriGaleriResource\Pages;

use App\Filament\Resources\KategoriGaleriResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateKategoriGaleri extends CreateRecord
{
    protected static string $resource = KategoriGaleriResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Kategori Galeri Berhasil Ditambahkan')
            ->body('Data kategori galeri baru berhasil disimpan.');
    }
}
