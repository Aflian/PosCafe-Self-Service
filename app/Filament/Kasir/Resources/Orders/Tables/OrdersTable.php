<?php

namespace App\Filament\Kasir\Resources\Orders\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\Action;
use App\Services\OrderApprovalService;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // 🔢 Kode Order
                TextColumn::make('kode_order')
                    ->label('Kode')
                    ->searchable(),

                // 🪑 Nama Meja
                TextColumn::make('table.nama')
                    ->label('Meja'),

                // 💰 Total Harga
                TextColumn::make('total_harga')
                    ->label('Total')
                    ->money('IDR', locale: 'id'),

                // 🔄 Status Order
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state) => match ($state) {
                        'menunggu_pembayaran' => 'secondary',
                        'menunggu_verifikasi' => 'warning',
                        'diproses' => 'info',
                        'disajikan' => 'success',
                        'selesai' => 'primary',
                        'ditolak' => 'danger',
                    }),

                // 🧾 Bukti Pembayaran
                ImageColumn::make('payment.bukti_pembayaran')
                    ->label('Bukti')
                    ->disk('public')
                    ->height(40),
            ])

            ->actions([
                // ✅ Approve Pesanan
                Action::make('approve')
                    ->label('Approve')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn ($record) =>
                        $record->status === 'menunggu_verifikasi'
                    )
                    ->action(fn ($record) =>
                        app(OrderApprovalService::class)
                            ->approve($record, auth()->id())
                    ),

                // ❌ Reject Pesanan
                Action::make('reject')
                    ->label('Tolak')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->visible(fn ($record) =>
                        $record->status === 'menunggu_verifikasi'
                    )
                    ->action(fn ($record) =>
                        app(OrderApprovalService::class)
                            ->reject($record, auth()->id())
                    ),

                // 🍽 Update ke Disajikan
                Action::make('disajikan')
                    ->label('Disajikan')
                    ->icon('heroicon-o-hand-thumb-up')
                    ->color('info')
                    ->visible(fn ($record) =>
                        $record->status === 'diproses'
                    )
                    ->action(fn ($record) =>
                        $record->update(['status' => 'disajikan'])
                    ),

                // ✅ Selesai & Meja Kosong
                Action::make('selesai')
                    ->label('Selesai')
                    ->icon('heroicon-o-check-badge')
                    ->color('primary')
                    ->visible(fn ($record) =>
                        $record->status === 'disajikan'
                    )
                    ->action(function ($record) {
                        $record->update(['status' => 'selesai']);
                        $record->table()->update(['status' => 'kosong']);
                    }),
                    Action::make('detail')
                    ->label('Detail')
                    ->icon('heroicon-o-eye')
                    ->color('secondary')
                    ->modalHeading('Detail Pesanan')
                    ->modalSubmitAction(false) // ❌ tanpa tombol submit
                    ->modalCancelActionLabel('Tutup')
                    ->form(fn ($record) => [
                        TextInput::make('kode_order')
                            ->label('Kode Order')
                            ->default($record->kode_order)
                            ->disabled(),
                
                        TextInput::make('meja')
                            ->label('Meja')
                            ->default($record->table->nama ?? '-')
                            ->disabled(),
                
                        TextInput::make('total')
                            ->label('Total Harga')
                            ->default('Rp ' . number_format($record->total_harga, 0, ',', '.'))
                            ->disabled(),
                
                        Repeater::make('items')
                            ->label('Daftar Pesanan')
                            ->schema([
                                TextInput::make('menu')
                                    ->label('Menu')
                                    ->disabled(),
                
                                TextInput::make('qty')
                                    ->label('Qty')
                                    ->disabled(),
                
                                TextInput::make('harga')
                                    ->label('Harga')
                                    ->disabled(),
                            ])
                            ->default(
                                $record->items->map(fn ($item) => [
                                    'menu'   => $item->menu->nama,
                                    'qty'    => $item->qty,
                                    'harga'  => 'Rp ' . number_format($item->harga, 0, ',', '.'),
                                ])->toArray()
                            )
                            ->columns(3)
                            ->disabled(),
                    ]),
                
            ])

            ->defaultSort('created_at', 'desc');
    }
}
