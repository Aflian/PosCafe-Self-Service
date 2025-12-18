<?php

namespace App\Filament\Kasir\Resources\Orders\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_order')
                    ->required(),
                TextInput::make('table_id')
                    ->required()
                    ->numeric(),
                TextInput::make('payment_method_id')
                    ->numeric(),
                TextInput::make('total_harga')
                    ->required()
                    ->numeric(),
                Select::make('status')
                    ->options([
            'menunggu_pembayaran' => 'Menunggu pembayaran',
            'menunggu_verifikasi' => 'Menunggu verifikasi',
            'diproses' => 'Diproses',
            'disajikan' => 'Disajikan',
            'selesai' => 'Selesai',
            'ditolak' => 'Ditolak',
        ])
                    ->default('menunggu_pembayaran')
                    ->required(),
                TextInput::make('approved_by')
                    ->numeric(),
                DateTimePicker::make('approved_at'),
            ]);
    }
}
