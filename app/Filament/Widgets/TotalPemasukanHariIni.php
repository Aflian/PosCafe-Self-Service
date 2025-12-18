<?php

namespace App\Filament\Widgets;

use App\Models\Financial;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TotalPemasukanHariIni extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalPemasukanHariIni = Financial::whereDate(
            'tanggal',
            now()->toDateString()
        )->sum('pemasukan');

        return [
            Stat::make(
                'Total Pemasukan Hari Ini',
                'Rp ' . number_format($totalPemasukanHariIni, 0, ',', '.')
            )
                ->icon('heroicon-o-banknotes')
                ->color('success')
                ->columns(3),
        ];
    }

    /**
     * Widget hanya dapat dilihat oleh Admin
     */
    public static function canView(): bool
    {
        return auth()->user()?->role === 'admin';
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
