<?php

namespace App\Filament\Widgets;

use Filament\Widgets\AccountWidget;
use Illuminate\Support\Facades\Storage;

class CustomAccountWidget extends AccountWidget
{
    protected function getUserAvatarUrl(): ?string
    {
        $user = auth()->user();

        // Jika user punya foto, gunakan itu
        if ($user && $user->photo) {
            return Storage::url($user->photo); // menghasilkan /storage/photos/xxx.jpg
        }

        // fallback: jika tidak ada foto, Filament pakai avatar default (inisial)
        return null;
    }
}
