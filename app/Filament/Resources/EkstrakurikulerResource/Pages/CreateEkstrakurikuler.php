<?php

namespace App\Filament\Resources\EkstrakurikulerResource\Pages;

use App\Filament\Resources\EkstrakurikulerResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateEkstrakurikuler extends CreateRecord
{
    protected static string $resource = EkstrakurikulerResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

   protected function getCreatedNotification(): ?Notification
{
    return Notification::make()
        ->success()
        ->title('Ekstrakurikuler Berhasil Ditambahkan')
        ->body('Data ekstrakurikuler baru telah disimpan dengan sukses.');
}


    
}
