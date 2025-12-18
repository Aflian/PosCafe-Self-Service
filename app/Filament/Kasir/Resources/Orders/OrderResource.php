<?php

namespace App\Filament\Kasir\Resources\Orders;

use App\Filament\Kasir\Resources\Orders\Pages\ListOrders;
use App\Filament\Kasir\Resources\Orders\Tables\OrdersTable;
use App\Models\Order;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static string|BackedEnum|null $navigationIcon
        = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Pesanan';

    protected static ?int $navigationSort = 1;

    /**
     * 🔒 Kasir hanya lihat order aktif
     */
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->whereIn('status', [
                'menunggu_verifikasi',
                'diproses',
                'disajikan',
            ])
            ->latest();
    }

    /**
     * ❌ Kasir tidak membuat order
     */
    public static function canCreate(): bool
    {
        return false;
    }

    /**
     * ❌ Kasir tidak edit order
     */
    public static function canEdit($record): bool
    {
        return false;
    }

    /**
     * ❌ Kasir tidak hapus order
     */
    public static function canDelete($record): bool
    {
        return false;
    }

    /**
     * 📊 Table operasional kasir
     */
    public static function table(Table $table): Table
    {
        return OrdersTable::configure($table);
    }

    /**
     * 📄 Halaman yang tersedia (HANYA LIST)
     */
    public static function getPages(): array
    {
        return [
            'index' => ListOrders::route('/'),
        ];
    }
}
