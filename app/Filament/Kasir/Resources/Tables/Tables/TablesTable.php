<?php

namespace App\Filament\Kasir\Resources\Tables\Tables;

use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;

class TablesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_meja')
                    ->searchable()
                    ->label('Meja'),
                TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'success' => 'kosong',
                        'warning' => 'aktif',
                        'gray'    => 'selesai',
                    ]),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->actions([
                Action::make('lihat_order')
                    ->label('Order')
                    ->icon('heroicon-o-eye')
                    ->url(fn ($record) => route(
                        'filament.kasir.resources.orders.index',
                        ['table_id' => $record->id]
                    ))
                    ->visible(fn ($record) => $record->orders_count > 0),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
