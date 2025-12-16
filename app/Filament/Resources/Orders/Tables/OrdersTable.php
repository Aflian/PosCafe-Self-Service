<?php

namespace App\Filament\Resources\Orders\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Actions\Action;
use App\Services\OrderApprovalService;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_order')
                    ->label('Kode')
                    ->searchable(),

                TextColumn::make('table.kode_meja')
                    ->label('Meja')
                    ->sortable(),

                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'warning' => 'menunggu_verifikasi',
                        'info'    => 'diproses',
                        'primary' => 'disajikan',
                        'success' => 'selesai',
                        'danger'  => 'ditolak',
                    ]),

                TextColumn::make('total_harga')
                    ->label('Total')
                    ->money('IDR'),

                TextColumn::make('created_at')
                    ->label('Waktu')
                    ->dateTime('d M Y H:i'),
            ])
            ->recordActions([
                Action::make('approve')
                    ->label('Approve')
                    ->color('success')
                    ->icon('heroicon-o-check-circle')
                    ->requiresConfirmation()
                    ->visible(fn ($record) =>
                        $record->status === 'menunggu_verifikasi'
                        && auth()->user()?->isKasir()
                    )
                    ->action(fn ($record) =>
                        app(OrderApprovalService::class)
                            ->approve($record, auth()->id())
                    ),

                Action::make('reject')
                    ->label('Tolak')
                    ->color('danger')
                    ->icon('heroicon-o-x-circle')
                    ->requiresConfirmation()
                    ->visible(fn ($record) =>
                        $record->status === 'menunggu_verifikasi'
                        && auth()->user()?->isKasir()
                    )
                    ->action(fn ($record) =>
                        app(OrderApprovalService::class)
                            ->reject($record, auth()->id())
                    ),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
