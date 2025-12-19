<?php
namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Table;
use App\Models\Menu;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Financial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $table = Table::first();
        $menu  = Menu::first();
        $method = PaymentMethod::first();
        $subtotal = $menu->harga;

        $order = Order::create([
            'kode_order' => 'ORD-' . strtoupper(Str::random(6)),
            'table_id' => $table->id,
            'payment_method_id' => $method->id,
            'total_harga' => $menu->harga,
            'status' => 'diproses',
            'approved_by' => 2, // kasir
            'approved_at' => now(),
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'menu_id' => $menu->id,
            'qty' => 1,
            'harga' => $menu->harga,
            'subtotal' => $subtotal,
        ]);

        $payment = Payment::create([
            'order_id' => $order->id,
            'payment_method_id' => $method->id,
            'nominal' => $menu->harga,
            'status' => 'valid',
            'verified_by' => 2,
            'verified_at' => now(),
        ]);

        Financial::create([
            'order_id' => $order->id,
            'tanggal' => Carbon::today(),
            'pemasukan' => $menu->harga,
        ]);
    }
}
