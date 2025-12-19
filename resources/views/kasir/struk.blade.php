<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: monospace; font-size: 12px; }
        .center { text-align: center; }
    </style>
</head>
<body>

<div class="center">
    <strong>CAFE ANDA</strong><br>
    =====================
</div>

Kode : {{ $order->kode_order }}<br>
Meja : {{ $order->table->kode_meja }}<br>
Tanggal : {{ $order->created_at->format('d/m/Y H:i') }}<br>
---------------------

@foreach($order->items as $item)
{{ $item->menu->nama_menu }}<br>
{{ $item->qty }} x {{ number_format($item->harga,0,',','.') }}
@endforeach

---------------------
TOTAL : Rp {{ number_format($order->total_harga,0,',','.') }}

<br><br>
<div class="center">
Terima Kasih 🙏
</div>

</body>
</html>
