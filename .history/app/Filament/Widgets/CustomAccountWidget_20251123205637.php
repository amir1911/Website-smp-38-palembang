<?php

namespace App\Filament\Widgets;

use Filament\Widgets\AccountWidget;

use Illuminate\Support\Facades\Storage;

class CustomAccountWidget extends AccountWidget
{
    protected function getUserAvatarUrl(): ?string
    {
        $user = auth()->user();

        // jika kolom photo ada
        if ($user && $user->photo) {

            // Coba baca URL yang dihasilkan Laravel
            $url = Storage::url($user->photo);

            // Jika URL benar (file ada)
            if (file_exists(public_path(str_replace('/storage', 'storage', $url)))) {
                return $url;
            }

            // Jika file TIDAK ditemukan, coba pakai asset()
            if (file_exists(public_path('storage/' . $user->photo))) {
                return asset('storage/' . $user->photo);
            }
        }

        return null; // fallback ke inisial jika tidak ada foto
    }
}
