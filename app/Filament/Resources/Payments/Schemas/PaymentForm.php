<?php

namespace App\Filament\Resources\Payments\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('order.kode_order')
                    ->label('Kode Order')
                    ->disabled(),

                TextInput::make('paymentMethod.nama')
                    ->label('Metode Pembayaran')
                    ->disabled(),

                TextInput::make('amount')
                    ->label('Nominal')
                    ->disabled(),

                FileUpload::make('bukti_bayar')
                    ->label('Bukti Pembayaran')
                    ->image()
                    ->directory('payments')
                    ->disabled(),

                TextInput::make('status')
                    ->disabled(),
            ]);
    }
}
