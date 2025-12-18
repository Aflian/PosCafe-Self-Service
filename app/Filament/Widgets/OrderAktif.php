<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrderAktif extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(
                'Order Aktif',
                Order::whereIn('status', ['diproses', 'disajikan'])->count()
            )
            ->icon('heroicon-o-clipboard-document')
            ->color('warning'),
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
