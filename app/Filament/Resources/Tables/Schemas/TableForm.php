<?php

namespace App\Filament\Resources\Tables\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class TableForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_meja')
                    ->label('Kode Meja')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(10),

                Select::make('status')
                    ->label('Status Meja')
                    ->options([
                        'kosong' => 'Kosong',
                        'aktif' => 'Aktif',
                        'selesai' => 'Selesai',
                    ])
                    ->disabled(), // 🔒 Status dikontrol sistem
            ]);
    }
}
