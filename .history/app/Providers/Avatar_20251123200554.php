<?php

namespace App\Filament;

use Filament\Models\Contracts\HasAvatar;
use Illuminate\Support\Facades\Storage;

class Avatar implements HasAvatar
{
    public function getFilamentAvatarUrl(): ?string
    {
        $user = auth()->user();

        if ($user?->photo) {
            return Storage::url($user->photo);
        }

        return null; // fallback ke inisial if no photo
    }
}
