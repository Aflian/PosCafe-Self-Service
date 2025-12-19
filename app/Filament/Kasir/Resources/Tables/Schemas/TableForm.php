<?php

namespace App\Filament\Kasir\Resources\Tables\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TableForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_meja')
                    ->required(),
                Select::make('status')
                    ->options(['kosong' => 'Kosong', 'aktif' => 'Aktif', 'selesai' => 'Selesai'])
                    ->default('kosong')
                    ->required(),
            ]);
    }
}
