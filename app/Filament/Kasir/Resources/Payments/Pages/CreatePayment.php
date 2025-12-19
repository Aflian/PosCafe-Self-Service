<?php

namespace App\Filament\Kasir\Resources\Payments\Pages;

use App\Filament\Kasir\Resources\Payments\PaymentResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePayment extends CreateRecord
{
    protected static string $resource = PaymentResource::class;
}
