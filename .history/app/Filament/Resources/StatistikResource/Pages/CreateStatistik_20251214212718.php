<?php

namespace App\Filament\Resources\StatistikResource\Pages;

use App\Filament\Resources\StatistikResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateStatistik extends CreateRecord
{
    protected static string $resource = StatistikResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Statistik Berhasil Ditambahkan')
            ->body('Data statistik baru berhasil disimpan.');
    }
}
