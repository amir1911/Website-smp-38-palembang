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
        if ($record->photo) {
            return Storage::url($record->photo);
        }

        return null; // fallback ke default Filament avatar
    }
}
