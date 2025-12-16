<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_order')->disabled(),
                TextInput::make('table.kode_meja')->label('Meja')->disabled(),
                TextInput::make('status')->disabled(),
                TextInput::make('total_harga')->disabled(),

                Repeater::make('items')
                    ->label('Item Pesanan')
                    ->schema([
                        TextInput::make('menu.nama_menu')
                            ->label('Menu')
                            ->disabled(),
                        TextInput::make('qty')
                            ->label('Qty')
                            ->disabled(),
                        TextInput::make('subtotal')
                            ->label('Subtotal')
                            ->disabled(),
                    ])
                    ->disabled(),
            ]);
    }
}
