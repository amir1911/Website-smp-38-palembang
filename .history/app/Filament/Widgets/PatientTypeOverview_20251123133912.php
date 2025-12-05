<?php

namespace App\Filament\Widgets;

use App\Models\Ekstrakurikuler;
use App\Models\Guest;
use App\Models\Patient;
use App\Models\Pengumuman;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PatientTypeOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
           Stat::make('Total Ekstrakurikuler', Ekstrakurikuler::count()),
           Stat::make('Total Pengumuman', Pengumuman::count()),
           Stat::make('Buku Tamu',Guest ) 
        ];
    }
}