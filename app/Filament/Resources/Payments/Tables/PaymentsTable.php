<?php

namespace App\Filament\Resources\Payments\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;

class PaymentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order.kode_order')
                    ->label('Kode Order')
                    ->searchable(),

                TextColumn::make('order.table.kode_meja')
                    ->label('Meja'),

                TextColumn::make('paymentMethod.nama')
                    ->label('Metode'),

                TextColumn::make('amount')
                    ->label('Nominal')
                    ->money('IDR'),

                BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'verified',
                        'danger'  => 'rejected',
                    ]),

                TextColumn::make('created_at')
                    ->label('Waktu')
                    ->dateTime('d M Y H:i'),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
