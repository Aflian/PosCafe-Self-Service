<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Financial;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Exception;

class OrderApprovalService
{
    /**
     * Approve order oleh kasir
     */
    public function approve(Order $order, int $kasirId): void
    {
        DB::transaction(function () use ($order, $kasirId) {

            // 🔒 Lock order agar tidak di-approve ganda
            $order->lockForUpdate();

            // 1️⃣ Validasi status order
            if ($order->status !== 'menunggu_verifikasi') {
                throw new Exception('Pesanan tidak dapat di-approve.');
            }

            $payment = $order->payment;

            // 2️⃣ Validasi pembayaran
            if (!$payment || $payment->status !== 'pending') {
                throw new Exception('Pembayaran belum valid.');
            }

            // 3️⃣ Update pembayaran
            $payment->update([
                'status'       => 'valid',
                'verified_by'  => $kasirId,
                'verified_at'  => now(),
            ]);

            // 4️⃣ Update order
            $order->update([
                'status'       => 'diproses',
                'approved_by'  => $kasirId,
                'approved_at'  => now(),
            ]);

            // 5️⃣ CATAT KEUANGAN (ANTI DUPLIKASI & LENGKAP)
            Financial::firstOrCreate(
                [
                    'order_id' => $order->id,
                ],
                [
                    'payment_id'        => $payment->id,
                    'tanggal'           => Carbon::today(),
                    'pemasukan'            => $order->total_harga,
                    'metode_pembayaran' => $payment->paymentMethod->nama,
                ]
            );

            // 6️⃣ Update status meja
            $order->table()->update([
                'status' => 'aktif',
            ]);
        });
    }

    /**
     * Reject order oleh kasir
     */
    public function reject(Order $order, int $kasirId, ?string $alasan = null): void
    {
        DB::transaction(function () use ($order, $kasirId) {

            // 🔒 Lock order
            $order->lockForUpdate();

            if ($order->status !== 'menunggu_verifikasi') {
                throw new Exception('Pesanan tidak dapat ditolak.');
            }

            $payment = $order->payment;

            if ($payment) {
                $payment->update([
                    'status'      => 'invalid',
                    'verified_by' => $kasirId,
                    'verified_at' => now(),
                ]);
            }

            $order->update([
                'status'      => 'ditolak',
                'approved_by' => $kasirId,
                'approved_at' => now(),
            ]);

            // Meja kembali kosong
            $order->table()->update([
                'status' => 'kosong',
            ]);
        });
    }
}
