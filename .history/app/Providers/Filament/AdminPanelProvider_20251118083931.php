<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login() // gunakan login bawaan Filament
    ->theme(asset('resources/css/filament/admin/theme.css'))
->darkMode(false)



            
            // ->favicon(asset('storage/logo/logosmp.png'))
            // ->brandLogo(asset('storage/logo/logosmp.png'))
            ->brandName('SMPN 38 Palembang')
            // ->darkMode(true) // aktifkan mode gelap otomatis
            ->sidebarCollapsibleOnDesktop() // sidebar bisa dilipat
            ->colors([
                'primary' => Color::hex('#2563EB'), // biru modern
                'secondary' => Color::hex('#64748B'),
                'success' => Color::hex('#16A34A'),
                'danger' => Color::hex('#DC2626'),
                'warning' => Color::hex('#F59E0B'),
            ])
            ->font('Inter') // font modern
            ->navigationGroups([
                'Manajemen Data',
                'Konten Website',
                'Pengaturan Sistem',
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
