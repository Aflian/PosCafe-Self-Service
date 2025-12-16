<?php

namespace App\Filament\Resources\Menus\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\ImageColumn;

class MenusTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->circular(),

                TextColumn::make('nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('kategori.nama')
                    ->label('Kategori')
                    ->sortable(),

                TextColumn::make('harga')
                    ->money('IDR')
                    ->sortable(),

                ToggleColumn::make('is_active')
                    ->label('Aktif')
                    ->onColor('success')
                    ->offColor('gray'),
            ])
            ->defaultSort('nama');
    }
}
