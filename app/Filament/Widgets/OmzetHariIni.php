<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Financial;


class OmzetHariIni extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $today = now()->toDateString();
        return [
            Stat::make(
                'Omzet Hari Ini',
                'Rp ' . number_format(
                    Financial::whereDate('tanggal', $today)->sum('pemasukan'),
                    0,
                    ',',
                    '.'
                )
            )
            ->icon('heroicon-o-banknotes')
            ->color('success'),
        ];
    }
    public function getColumns(): int | array
    {
        return [
            'default' => 1,
            'md' => 3,
            'xl' => 3,
        ];
    }
}
