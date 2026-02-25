<?php

namespace App\Filament\Resources\GaleriResource\Pages;

use App\Filament\Resources\GaleriResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
use Filament\Actions;

class EditGaleri extends EditRecord
{
    protected static string $resource = GaleriResource::class;

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Galeri Berhasil Diperbarui')
            ->body('Perubahan data galeri berhasil disimpan.');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Hapus Galeri')
                ->icon('heroicon-o-trash')
                ->color('danger')
                ->modalHeading('Hapus Galeri')
                ->modalDescription('Apakah Anda yakin ingin menghapus data galeri ini? Data yang dihapus tidak dapat dikembalikan.')
                ->modalSubmitActionLabel('Ya, Hapus')
                ->successNotification(
                    Notification::make()
                        ->success()
                        ->title('Galeri Berhasil Dihapus')
                        ->body('Data galeri telah dihapus dari sistem.')
                )
                ->successRedirectUrl(
                    $this->getResource()::getUrl('index')
                ),
        ];
    }
}
