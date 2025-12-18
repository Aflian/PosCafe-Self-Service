<?php

namespace App\Filament\Resources\Financials\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class FinancialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('order.kode_order')->disabled(),
                TextInput::make('pemasukan')->disabled(),
                TextInput::make('metode_pembayaran')->disabled(),
                TextInput::make('tanggal')->disabled(),
            ]);
    }
}
