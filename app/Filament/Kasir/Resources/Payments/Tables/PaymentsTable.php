<?php

namespace App\Filament\Kasir\Resources\Payments\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\Action;

class PaymentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order.kode_order')
                ->label('Kode Order')
                ->searchable(),

            TextColumn::make('paymentMethod.nama_metode')
                ->label('Metode'),

            TextColumn::make('nominal')
                ->label('Nominal')
                ->money('IDR'),

            TextColumn::make('status')
                ->badge()
                ->colors([
                    'warning' => 'pending',
                    'success' => 'valid',
                    'danger'  => 'invalid',
                ]),

            TextColumn::make('created_at')
                ->label('Waktu')
                ->dateTime('d M Y H:i'),
        ])
        ->defaultSort('created_at', 'desc')
        ->actions([
            Action::make('lihat_bukti')
                ->label('Bukti')
                ->icon('heroicon-o-photo')
                ->modalHeading('Bukti Pembayaran')
                ->modalSubmitAction(false)
                ->modalCancelActionLabel('Tutup')
                ->modalContent(fn ($record) => view(
                    'kasir.payments.bukti',
                    ['payment' => $record]
                ))
                ->visible(fn ($record) => $record->bukti_pembayaran),

            Action::make('cetak')
                ->label('Struk')
                ->icon('heroicon-o-printer')
                ->url(fn ($record) => route('struk', $record->order_id))
                ->openUrlInNewTab()
                ->visible(fn ($record) => $record->status === 'valid'),]);
    }
}
