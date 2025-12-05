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
            $url = Storage::url($user->photo);

            if (file_exists(public_path('storage/' . $user->photo))) {
                return asset('storage/' . $user->photo);
            }

            return $url;
        }

        return null;
    }
}
