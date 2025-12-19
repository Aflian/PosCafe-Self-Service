<?php

namespace App\Filament\Resources\Financials\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class FinancialsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                // 🔢 Kode Order
                TextColumn::make('order.kode_order')
                    ->label('Kode Order')
                    ->searchable(),

                // 📅 Tanggal Transaksi
                TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),

                // 💰 Pemasukan (FIX: dari amount → pemasukan)
                TextColumn::make('pemasukan')
                    ->label('Nominal')
                    ->money('IDR', locale: 'id')
                    ->sortable(),

                // 💳 Metode Pembayaran (via relasi)
                TextColumn::make('order.payment.paymentMethod.nama_metode')
                    ->label('Metode Pembayaran')
                    ->badge(),

                // 🕒 Dicatat
                TextColumn::make('created_at')
                    ->label('Dicatat')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('tanggal', 'desc');
    }
}
