<h1>Status Pesanan</h1>

<div class="status {{ $order->status }}">
    {{ str_replace('_', ' ', strtoupper($order->status)) }}
</div>

<ul>
    @foreach($order->items as $item)
        <li>{{ $item->menu->nama_menu }} x {{ $item->qty }}</li>
    @endforeach
</ul>

<p>Total: Rp {{ number_format($order->total_harga) }}</p>
