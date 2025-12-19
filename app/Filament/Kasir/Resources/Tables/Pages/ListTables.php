<?php

namespace App\Filament\Kasir\Resources\Tables\Pages;

use App\Filament\Kasir\Resources\Tables\TableResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTables extends ListRecords
{
    protected static string $resource = TableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // CreateAction::make(),
        ];
    }
}
