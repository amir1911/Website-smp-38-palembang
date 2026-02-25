<?php

namespace App\Filament\Resources\ContactResource\Pages;

use App\Filament\Resources\ContactResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateContact extends CreateRecord
{
    protected static string $resource = ContactResource::class;
}
  protected function getCreatedNotification(): ?Notification
{
    return Notification::make()
        ->success()
        ->title('Ekstrakurikuler Berhasil Ditambahkan')
        ->body('Data ekstrakurikuler baru telah disimpan dengan sukses.');
}