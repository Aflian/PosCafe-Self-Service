<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Kasir\StrukController;
use App\Http\Controllers\FinancialExportController;

/*
|--------------------------------------------------------------------------
| LANDING
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| ADMIN & KASIR (AUTH)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // 🔹 Export laporan keuangan
    Route::get(
        '/admin/financial/export/excel/{from}/{to}',
        [FinancialExportController::class, 'excel']
    )->name('financial.export.excel');

    Route::get(
        '/admin/financial/export/pdf/{from}/{to}',
        [FinancialExportController::class, 'pdf']
    )->name('financial.export.pdf');

    // 🔹 Cetak struk kasir
    Route::get(
        '/kasir/order/{order}/struk',
        [StrukController::class, 'print']
    )->name('struk');
});

/*
|--------------------------------------------------------------------------
| PELANGGAN (NO AUTH)
|--------------------------------------------------------------------------
*/

// 🔹 Akses menu via QR Meja
Route::get('/meja/{table}', [CustomerController::class, 'menu'])
    ->name('pelanggan.menu');

// 🔹 Cart
Route::post('/cart/add', [CartController::class, 'add'])
    ->name('cart.add');

Route::post('/cart/update', [CartController::class, 'update'])
    ->name('cart.update');

Route::post('/cart/remove', [CartController::class, 'remove'])
    ->name('cart.remove');

Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');

// 🔹 Checkout → buat order
Route::post('/checkout', [CheckoutController::class, 'store'])
    ->name('checkout.store');

// 🔹 Tracking order
Route::get('/order/{kode}/tracking', [CustomerController::class, 'tracking'])
    ->name('pelanggan.tracking');

// 🔹 Halaman pembayaran pelanggan
Route::get('/order/{kode}/payment', [CustomerController::class, 'payment'])
    ->name('pelanggan.payment');

// 🔹 Simpan pembayaran pelanggan
Route::post('/order/payment', [CustomerController::class, 'storePayment'])
    ->name('pelanggan.payment.store');
