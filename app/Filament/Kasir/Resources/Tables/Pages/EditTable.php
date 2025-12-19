<?php

namespace App\Filament\Kasir\Resources\Tables\Pages;

use App\Filament\Kasir\Resources\Tables\TableResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTable extends EditRecord
{
    protected static string $resource = TableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
