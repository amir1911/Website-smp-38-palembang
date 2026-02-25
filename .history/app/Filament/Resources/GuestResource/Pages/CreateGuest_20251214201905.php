<?php

namespace App\Filament\Resources\GuestResource\Pages;

use App\Filament\Resources\GuestResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateGuest extends CreateRecord
{
    protected static string $resource = GuestResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Buku Tamu Berhasil Ditambahkan')
            ->body('Data buku tamu berhasil disimpan.');
    }
}
