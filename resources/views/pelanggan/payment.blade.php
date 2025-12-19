<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran</title>
    <link rel="stylesheet" href="/css/pelanggan.css">
</head>
<body>

<h1>💳 Pembayaran</h1>

<div class="card">
    <p><strong>Kode Order:</strong> {{ $order->kode_order }}</p>
    <p><strong>Total:</strong> Rp {{ number_format($order->total_harga) }}</p>
</div>

<form method="POST" action="{{ route('pelanggan.payment.store') }}" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="order_id" value="{{ $order->id }}">
    <input type="hidden" name="nominal" value="{{ $order->total_harga }}">

    <label>Metode Pembayaran</label>
    <select name="payment_method_id" required>
        <option value="">-- Pilih Metode --</option>
        @foreach($paymentMethods as $method)
            <option value="{{ $method->id }}">
                {{ $method->nama_metode }}
            </option>
        @endforeach
    </select>

    <label>Bukti Pembayaran (opsional)</label>
    <input type="file" name="bukti_pembayaran">

    <button class="btn-primary">
        Kirim Pembayaran
    </button>
</form>

</body>
</html>
