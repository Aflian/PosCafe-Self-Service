<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang</title>
    <link rel="stylesheet" href="{{ asset('css/pelanggan.css') }}">
</head>
<body>

<div class="container">

    <h1>🛒 Keranjang Pesanan</h1>

    @if(empty($cart) || count($cart) === 0)
        <p class="empty-cart">Keranjang masih kosong</p>
        <a href="{{ url()->previous() }}" class="btn">⬅ Kembali ke Menu</a>
    @else

        @foreach($cart as $item)
            <div class="menu-card">
                <div class="menu-info">
                    <strong>{{ $item['nama'] }}</strong>
                    <p>Rp {{ number_format($item['harga'], 0, ',', '.') }}</p>
                </div>

                <div class="menu-action">
                    {{-- Update qty --}}
                    <form method="POST" action="{{ route('cart.update') }}">
                        @csrf
                        <input type="hidden" name="menu_id" value="{{ $item['menu_id'] }}">
                        <input type="number"
                               name="qty"
                               value="{{ $item['qty'] }}"
                               min="1"
                               class="qty-input">
                        <button type="submit" class="btn-small">Update</button>
                    </form>

                    {{-- Hapus item --}}
                    <form method="POST" action="{{ route('cart.remove') }}">
                        @csrf
                        <input type="hidden" name="menu_id" value="{{ $item['menu_id'] }}">
                        <button type="submit" class="btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach

        <div class="cart-total">
            <h3>Total: Rp {{ number_format($total, 0, ',', '.') }}</h3>
        </div>

        {{-- Checkout --}}
        <form method="POST" action="{{ route('checkout.store') }}">
            @csrf
            <input type="hidden" name="table_id" value="{{ session('table_id') }}">
            <button type="submit" class="btn-checkout">
                ✅ Checkout
            </button>
        </form>

        <a href="{{ url()->previous() }}" class="btn-secondary">
            ➕ Tambah Menu
        </a>

    @endif

</div>

</body>
</html>
