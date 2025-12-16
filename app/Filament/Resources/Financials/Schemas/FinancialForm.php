<?php

namespace App\Filament\Resources\Financials\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FinancialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('order_id')
                    ->required()
                    ->numeric(),
                DatePicker::make('tanggal')
                    ->required(),
                TextInput::make('pemasukan')
                    ->required()
                    ->numeric(),
            ]);
    }
}
