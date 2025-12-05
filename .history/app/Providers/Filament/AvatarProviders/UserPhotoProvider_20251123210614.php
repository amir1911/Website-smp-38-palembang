<?php

namespace App\Filament\AvatarProviders;

use Filament\AvatarProviders\Contracts\AvatarProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UserPhotoProvider implements AvatarProvider
{
    public function get(Model|Authenticatable $record): string|null
    {
        // Jika user punya foto, gunakan itu
        if ($record->photo) {
            return Storage::url($record->photo); // → /storage/photos/xxx.jpg
        }

        // Jika tidak ada, fallback ke default Filament
        return null;
    }
}
