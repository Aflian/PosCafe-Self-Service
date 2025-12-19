<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $cart = session('cart', []);
        $tableId = session('table_id');

        if (!$tableId || empty($cart)) {
            return redirect()->back()->with('error', 'Keranjang kosong atau meja tidak valid');
        }

        $order = null;

        DB::transaction(function () use ($cart, $tableId, &$order) {

            $total = collect($cart)->sum('subtotal');

            $order = Order::create([
                'kode_order'  => 'ORD-' . strtoupper(Str::random(6)),
                'table_id'    => $tableId,
                'total_harga' => $total,
                'status'      => 'menunggu_pembayaran',
            ]);

            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'menu_id'  => $item['menu_id'],
                    'qty'      => $item['qty'],
                    'harga'    => $item['harga'],
                    'subtotal' => $item['subtotal'],
                ]);
            }

            // meja jadi aktif
            Table::where('id', $tableId)->update([
                'status' => 'aktif',
            ]);
        });

        session()->forget('cart');

        return redirect()->route(
            'pelanggan.pembayaran',
            $order->kode_order
        );
    }
}
