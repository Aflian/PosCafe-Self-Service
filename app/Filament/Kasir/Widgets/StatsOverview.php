<?php   
namespace App\Filament\Kasir\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(
                'Menunggu Verifikasi',
                Order::where('status', 'menunggu_verifikasi')->count()
            )
                ->description('Perlu dicek')
                ->color('warning')
                ->icon('heroicon-o-clock'),

            Stat::make(
                'Sedang Diproses',
                Order::where('status', 'diproses')->count()
            )
                ->description('Di dapur')
                ->color('info')
                ->icon('heroicon-o-fire'),

            Stat::make(
                'Siap Disajikan',
                Order::where('status', 'disajikan')->count()
            )
                ->description('Tinggal antar')
                ->color('success')
                ->icon('heroicon-o-check-circle'),

            Stat::make(
                'Order Hari Ini',
                Order::whereDate('created_at', Carbon::today())->count()
            )
                ->description('Total order')
                ->color('gray')
                ->icon('heroicon-o-calendar'),
        ];
    }
}
