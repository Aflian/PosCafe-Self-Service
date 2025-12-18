<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FinancialExportController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])
    ->group(function () {
        Route::get('/admin/financial/export/excel/{from}/{to}',
            [FinancialExportController::class, 'excel']
        );

        Route::get('/admin/financial/export/pdf/{from}/{to}',
            [FinancialExportController::class, 'pdf']
        );
    });
