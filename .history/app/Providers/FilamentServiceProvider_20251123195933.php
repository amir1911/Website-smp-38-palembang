<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    use Filament\Facades\Filament;

public function boot(): void
{
    Filament::serving(function () {
        Filament::getUserAvatarUrlUsing(function ($user) {
            if ($user->photo) {
                return asset('storage/' . $user->photo);
            }

            // fallback jika tidak ada foto
            return null; 
        });
    });
}

