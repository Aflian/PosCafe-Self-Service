<?php

namespace App\Filament\Resources\Financials;

use App\Filament\Resources\Financials\Pages\CreateFinancial;
use App\Filament\Resources\Financials\Pages\EditFinancial;
use App\Filament\Resources\Financials\Pages\ListFinancials;
use App\Filament\Resources\Financials\Schemas\FinancialForm;
use App\Filament\Resources\Financials\Tables\FinancialsTable;
use App\Models\Financial;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FinancialResource extends Resource
{
    protected static ?string $model = Financial::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return FinancialForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FinancialsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFinancials::route('/'),
            'create' => CreateFinancial::route('/create'),
            'edit' => EditFinancial::route('/{record}/edit'),
        ];
    }
}
