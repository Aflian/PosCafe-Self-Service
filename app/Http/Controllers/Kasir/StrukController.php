<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class StrukController extends Controller
{
    public function print(Order $order)
    {
        return Pdf::loadView('kasir.struk', [
            'order' => $order,
        ])->stream('struk-' . $order->kode_order . '.pdf');
    }
}
