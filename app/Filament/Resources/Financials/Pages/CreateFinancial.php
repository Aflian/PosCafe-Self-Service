<?php

namespace App\Filament\Resources\Financials\Pages;

use App\Filament\Resources\Financials\FinancialResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFinancial extends CreateRecord
{
    protected static string $resource = FinancialResource::class;
}
