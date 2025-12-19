<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Cafe</title>

    <link rel="stylesheet" href="/css/pelanggan.css">
</head>
<body>

{{-- HEADER --}}
<header class="header">
    <div>
        <h1>☕ Cafe Kevin</h1>
        <small>Pemesanan Dine-in</small>
    </div>

    <div class="meja">
        🪑 {{ $table->kode_meja }}
    </div>
</header>

{{-- ALERT --}}
@if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- MENU --}}
@foreach($categories as $category)
    <section class="category-section">
        <h2 class="category-title">
            {{ $category->nama_kategori }}
        </h2>

        <div class="menu-grid">
            @forelse($category->menus as $menu)
                <div class="menu-card">
                    {{-- FOTO --}}
                    <div class="menu-image">
                        @if($menu->foto)
                            <img src="{{ asset('storage/'.$menu->foto) }}" alt="{{ $menu->nama_menu }}">
                        @else
                            <div class="no-image">🍽️</div>
                        @endif
                    </div>

                    {{-- INFO --}}
                    <div class="menu-info">
                        <h3>{{ $menu->nama_menu }}</h3>
                        <p class="price">
                            Rp {{ number_format($menu->harga, 0, ',', '.') }}
                        </p>
                    </div>

                    {{-- ADD TO CART --}}
                    <form method="POST" action="{{ route('cart.add') }}">
                        @csrf
                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                        <button type="submit" class="btn-add">
                            ➕ Tambah
                        </button>
                    </form>
                </div>
            @empty
                <p class="empty">Menu tidak tersedia</p>
            @endforelse
        </div>
    </section>
@endforeach

{{-- CART BUTTON --}}
<a href="{{ route('cart.index') }}" class="cart-floating">
    🛒 Keranjang
</a>

</body>
</html>
