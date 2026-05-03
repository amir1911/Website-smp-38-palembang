<?php

namespace App\Filament\Widgets;

use App\Models\Statistik;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\HtmlString;

class StatistikSekolah extends BaseWidget
{
    protected function getStats(): array
    {
        $data = Statistik::first();

        return [
            Stat::make('Guru', $data?->guru ?? 0)
                ->description('Jumlah Guru Aktif')
                ->descriptionIcon('heroicon-o-academic-cap')
                ->color('success'),

            Stat::make('Kelas 10', $data?->kelas10 ?? 0)
                ->description('Jumlah Siswa Kelas 10')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('primary'),

            Stat::make('Kelas 11', $data?->kelas11 ?? 0)
                ->description('Jumlah Siswa Kelas 11')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('info'),

            Stat::make('Kelas 12', $data?->kelas12 ?? 0)
                ->description('Jumlah Siswa Kelas 12')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('warning'),

            Stat::make('Staf', $data?->staf ?? 0)
                ->description('Jumlah Staf & TU')
                ->descriptionIcon('heroicon-o-briefcase')
                ->color('danger'),
        ];
    }
}
