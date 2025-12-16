<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                BadgeColumn::make('role')
                    ->label('Role')
                    ->colors([
                        'danger' => 'admin',
                        'success' => 'kasir',
                    ])
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->recordActions([
                EditAction::make(),

                DeleteAction::make()
                    ->visible(fn ($record) => $record->id !== auth()->id()),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
