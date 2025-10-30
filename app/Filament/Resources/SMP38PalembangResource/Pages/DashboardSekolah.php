<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Pengumuman;

class DashboardSekolah extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.pages.dashboard-sekolah';
    protected static ?string $title = 'Dashboard Sekolah';
    protected static ?string $navigationLabel = 'Dashboard Sekolah';
    protected static ?string $navigationGroup = 'Beranda';

    public $guruCount;
    public $siswaCount;
    public $pengumumanCount;

    public function mount(): void
    {
        $this->guruCount = Guru::count();
        $this->siswaCount = Siswa::count();
        $this->pengumumanCount = Pengumuman::count();
    }
}
