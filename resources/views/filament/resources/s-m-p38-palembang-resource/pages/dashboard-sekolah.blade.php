<?php

namespace App\Filament\Widgets;

use App\Models\Guru;
use App\Models\Siswa; // jika tabelnya murid, ganti jadi Murid
use App\Models\Pengumuman;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Guru', Guru::count())
                ->description('Total guru yang terdaftar')
                ->icon('heroicon-o-user-group')
                ->color('success'),

            Stat::make('Jumlah Siswa', Siswa::count())
                ->description('Total siswa yang aktif')
                ->icon('heroicon-o-academic-cap')
                ->color('primary'),

            Stat::make('Jumlah Pengumuman', Pengumuman::count())
                ->description('Total pengumuman yang dibuat')
                ->icon('heroicon-o-megaphone')
                ->color('warning'),
        ];
    }
}
