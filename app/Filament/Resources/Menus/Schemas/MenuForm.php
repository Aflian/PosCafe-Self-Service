<?php

namespace App\Filament\Resources\Menus\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;

class MenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(100),

                Select::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'nama_kategori')
                    ->required(),

                TextInput::make('harga')
                    ->numeric()
                    ->prefix('Rp')
                    ->required(),

                FileUpload::make('foto')
                    ->image()
                    ->directory('menus')
                    ->imageEditor(),

                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }
}
