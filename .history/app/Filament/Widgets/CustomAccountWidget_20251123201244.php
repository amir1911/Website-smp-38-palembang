<?php

namespace App\Filament\Widgets;

use Filament\Widgets\AccountWidget;
use Illuminate\Support\Facades\Storage;

class CustomAccountWidget extends AccountWidget
{
    protected function getUserAvatarUrl(): ?string
    {
        $user = auth()->user();

        if ($user && $user->photo) {
            return Storage::url($user->photo);
        }

        return null; // fallback ke inisial jika tidak ada foto
    }
}
