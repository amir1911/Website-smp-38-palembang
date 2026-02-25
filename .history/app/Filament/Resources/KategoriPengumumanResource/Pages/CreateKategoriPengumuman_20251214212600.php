<?php

namespace App\Filament\Resources\KategoriPengumumanResource\Pages;

use App\Filament\Resources\KategoriPengumumanResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateKategoriPengumuman extends CreateRecord
{
    protected static string $resource = KategoriPengumumanResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Kategori Pengumuman Berhasil Ditambahkan')
            ->body('Data kategori pengumuman baru berhasil disimpan.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
