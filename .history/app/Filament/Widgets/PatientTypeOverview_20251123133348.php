<?php

namespace App\Filament\Widgets;

use App\Models\Ekstrakurikuler;
use App\Models\Patient;
use App\Models\Pengumuman;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PatientTypeOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
             Stat::make('Total Pengumuman', Pengumuman::count()),
           Stat::make('Total Ekstrakurikuler', Ekstrakurikuler::count()),
          
 Stat::make('Guru', $data?->guru ?? 0)
                ->description('Jumlah Guru Aktif')
                ->descriptionIcon('heroicon-o-academic-cap')
                ->color('success'),

            Stat::make('Kelas 7', $data?->kelas7 ?? 0)
                ->description('Jumlah Siswa Kelas 7')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('primary'),

            Stat::make('Kelas 8', $data?->kelas8 ?? 0)
                ->description('Jumlah Siswa Kelas 8')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('info'),

            Stat::make('Kelas 9', $data?->kelas9 ?? 0)
                ->description('Jumlah Siswa Kelas 9')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('warning'),

            Stat::make('Staf', $data?->staf ?? 0)
                ->description('Jumlah Staf & TU')
                ->descriptionIcon('heroicon-o-briefcase')
                ->color('danger'),
        ];
    }
}