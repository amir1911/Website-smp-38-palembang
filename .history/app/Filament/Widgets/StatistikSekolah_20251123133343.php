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
           
        ];
    }
}
