<?php

namespace App\Filament\Resources\CarouselResource\Pages;

use App\Filament\Resources\CarouselResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateCarousel extends CreateRecord
{
    protected static string $resource = CarouselResource::class;

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
