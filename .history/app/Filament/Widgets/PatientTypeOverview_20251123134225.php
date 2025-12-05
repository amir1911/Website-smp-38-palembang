<?php

namespace App\Filament\Widgets;

use App\Models\Ekstrakurikuler;
use App\Models\Guest;
use App\Models\Pengumuman;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PatientTypeOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Ekstrakurikuler', Ekstrakurikuler::count())
                ->icon('heroicon-o-academic-cap')
                ->description('Jumlah kegiatan ekstrakurikuler')
                ->color('success'),

            Stat::make('Total Pengumuman', Pengumuman::count())
                ->icon('heroicon-o-megaphone')
                ->description('Total pengumuman yang dibuat')
                ->color('warning'),

            Stat::make('Buku Tamu', Guest::count())
                ->icon('heroicon-o-book-open')
                ->description('Total pengisian buku tamu')
                ->color('primary'),
        ];
    }
}
