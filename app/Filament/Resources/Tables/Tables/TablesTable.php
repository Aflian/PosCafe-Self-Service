<?php

namespace App\Filament\Resources\Tables\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

class TablesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_meja')
                    ->label('Kode Meja')
                    ->searchable()
                    ->sortable(),

                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'kosong',
                        'warning' => 'aktif',
                        'gray' => 'selesai',
                    ]),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y'),
            ])
            ->recordActions([
                EditAction::make(),

                DeleteAction::make()
                    ->requiresConfirmation()
                    ->visible(fn ($record) => $record->status === 'kosong'),
            ])
            ->defaultSort('kode_meja');
    }
}
