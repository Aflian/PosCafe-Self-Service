<?php

namespace App\Filament\Widgets;

use App\Models\Table;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class MejaTerpakai extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(
                'Meja Terpakai',
                Table::where('status', 'aktif')->count()
            )
                ->icon('heroicon-o-qr-code')
                ->color('info'),
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
