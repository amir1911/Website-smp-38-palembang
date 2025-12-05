<?php

namespace App\Providers;

use App\Filament\Avatar;
use Filament\Facades\Filament;
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
   public function boot(): void
    {
        Filament::serving(function () {
            Filament::setAvatarProvider(Avatar::class);
        });
    }
}
