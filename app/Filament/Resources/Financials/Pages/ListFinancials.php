<?php

namespace App\Filament\Resources\Financials\Pages;

use App\Filament\Resources\Financials\FinancialResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFinancials extends ListRecords
{
    protected static string $resource = FinancialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
