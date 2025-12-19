<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Table;
use App\Models\Payment;
use App\Models\Category;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Halaman menu pelanggan (via QR meja)
     */
    public function menu(Table $table)
    {
        // Simpan meja ke session
        session(['table_id' => $table->id]);

        $categories = Category::with([
            'menus' => fn ($q) => $q->where('is_active', 1)
        ])->get();

        return view('pelanggan.menu', compact('table', 'categories'));
    }

    /**
     * Tracking status order
     */
    public function tracking(string $kode)
    {
        $order = Order::with(['payment', 'table'])
            ->where('kode_order', $kode)
            ->firstOrFail();

        return view('pelanggan.tracking', compact('order'));
    }

    /**
     * Halaman pembayaran pelanggan
     */
    public function payment(string $kode)
    {
        $order = Order::where('kode_order', $kode)->firstOrFail();

        // Cegah bayar ulang
        if ($order->status !== 'menunggu_pembayaran') {
            return redirect()
                ->route('pelanggan.tracking', $order->kode_order);
        }

        $paymentMethods = PaymentMethod::where('is_active', 1)->get();

        return view('pelanggan.payment', compact('order', 'paymentMethods'));
    }

    /**
     * Simpan pembayaran pelanggan
     */
    public function storePayment(Request $request)
    {
        $request->validate([
            'order_id'           => 'required|exists:orders,id',
            'payment_method_id'  => 'required|exists:payment_methods,id',
            'nominal'            => 'required|numeric|min:1',
            'bukti_pembayaran'   => 'nullable|image|max:2048',
        ]);

        $order = Order::findOrFail($request->order_id);

        // Upload bukti jika ada
        $bukti = null;
        if ($request->hasFile('bukti_pembayaran')) {
            $bukti = $request->file('bukti_pembayaran')
                ->store('bukti-pembayaran', 'public');
        }

        Payment::create([
            'order_id'          => $order->id,
            'payment_method_id' => $request->payment_method_id,
            'nominal'           => $request->nominal,
            'bukti_pembayaran'  => $bukti,
            'status'            => 'pending',
        ]);

        // Update status order
        $order->update([
            'status' => 'menunggu_verifikasi',
        ]);

        return redirect()
            ->route('pelanggan.tracking', $order->kode_order)
            ->with('success', 'Pembayaran berhasil dikirim. Menunggu verifikasi kasir.');
    }
}
