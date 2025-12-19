<?php

namespace App\Filament\Kasir\Resources\Payments\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('order_id')
                    ->required()
                    ->numeric(),
                TextInput::make('payment_method_id')
                    ->required()
                    ->numeric(),
                TextInput::make('nominal')
                    ->required()
                    ->numeric(),
                TextInput::make('bukti_pembayaran')
                    ->required(),
                Select::make('status')
                    ->options(['pending' => 'Pending', 'valid' => 'Valid', 'invalid' => 'Invalid'])
                    ->default('pending')
                    ->required(),
                TextInput::make('verified_by')
                    ->numeric(),
                DateTimePicker::make('verified_at'),
            ]);
    }
}
