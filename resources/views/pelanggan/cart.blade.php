<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Pesanan - Cafe Kevin</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #6f42c1;
            --secondary-color: #20c997;
            --danger-color: #ff6b6b;
            --warning-color: #ffc107;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
            --shadow: 0 5px 15px rgba(0,0,0,0.08);
            --transition: all 0.3s ease;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            min-height: 100vh;
            padding-top: 20px;
            padding-bottom: 100px;
        }
        
        .cart-container {
            max-width: 900px;
            margin: 0 auto;
        }
        
        /* Header */
        .cart-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #5a32a3 100%);
            color: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow);
        }
        
        .cart-title {
            font-weight: 600;
            margin: 0;
        }
        
        .table-info {
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 10px;
            padding: 8px 15px;
            display: inline-block;
            margin-top: 10px;
            font-weight: 500;
        }
        
        /* Empty Cart */
        .empty-cart {
            background: white;
            border-radius: 15px;
            padding: 3rem;
            text-align: center;
            box-shadow: var(--shadow);
            margin-bottom: 2rem;
        }
        
        .empty-icon {
            font-size: 4rem;
            color: #dee2e6;
            margin-bottom: 1.5rem;
        }
        
        /* Cart Items */
        .cart-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border-left: 4px solid var(--primary-color);
        }
        
        .cart-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }
        
        .menu-name {
            font-weight: 600;
            color: var(--dark-color);
            font-size: 1.1rem;
            margin-bottom: 5px;
        }
        
        .menu-price {
            color: var(--primary-color);
            font-weight: 600;
            font-size: 1.2rem;
        }
        
        .menu-price:before {
            content: 'Rp ';
            font-size: 0.9rem;
        }
        
        .qty-control {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .qty-input {
            width: 70px;
            text-align: center;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 8px;
            font-weight: 600;
        }
        
        .qty-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(111, 66, 193, 0.25);
        }
        
        .btn-update {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 8px 15px;
            font-weight: 500;
            transition: var(--transition);
        }
        
        .btn-update:hover {
            background-color: #1aa179;
            color: white;
        }
        
        .btn-remove {
            background-color: var(--danger-color);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 8px 15px;
            font-weight: 500;
            transition: var(--transition);
        }
        
        .btn-remove:hover {
            background-color: #ff5252;
            color: white;
        }
        
        .subtotal {
            font-weight: 600;
            color: var(--dark-color);
            font-size: 1.1rem;
            padding: 10px 0;
        }
        
        /* Cart Summary */
        .cart-summary {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: var(--shadow);
            margin-top: 2rem;
            position: sticky;
            bottom: 20px;
            z-index: 100;
        }
        
        .total-amount {
            color: var(--primary-color);
            font-size: 1.8rem;
            font-weight: 700;
            margin: 0;
        }
        
        .total-amount:before {
            content: 'Rp ';
            font-size: 1.2rem;
        }
        
        .btn-checkout {
            background: linear-gradient(135deg, var(--primary-color) 0%, #5a32a3 100%);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: var(--transition);
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .btn-checkout:hover {
            background: linear-gradient(135deg, #5a32a3 0%, var(--primary-color) 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(111, 66, 193, 0.3);
            color: white;
        }
        
        .btn-back {
            background-color: #6c757d;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 500;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .btn-back:hover {
            background-color: #5a6268;
            color: white;
        }
        
        .btn-add-more {
            background-color: white;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 500;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .btn-add-more:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .cart-header {
                padding: 1rem;
            }
            
            .cart-title {
                font-size: 1.5rem;
            }
            
            .cart-card {
                padding: 1rem;
            }
            
            .qty-control {
                flex-wrap: wrap;
            }
            
            .btn-update, .btn-remove {
                flex: 1;
                min-width: 120px;
            }
            
            .total-amount {
                font-size: 1.5rem;
            }
        }
        
        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .cart-card {
            animation: fadeIn 0.5s ease forwards;
        }
        
        .cart-card:nth-child(odd) {
            animation-delay: 0.1s;
        }
        
        .cart-card:nth-child(even) {
            animation-delay: 0.2s;
        }
        
        /* Badge for item count */
        .item-count-badge {
            background-color: var(--warning-color);
            color: #000;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: 600;
            margin-left: 8px;
        }
    </style>
</head>
<body>

<div class="container cart-container">
    <!-- Header -->
    <div class="cart-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="cart-title">
                    <i class="fas fa-shopping-cart me-2"></i>Keranjang Pesanan
                    @if(!empty($cart) && count($cart) > 0)
                        <span class="item-count-badge">{{ count($cart) }}</span>
                    @endif
                </h1>
                <div class="table-info">
                    <i class="fas fa-chair me-1"></i> Meja: <strong>{{ session('table_id') ?: 'Belum dipilih' }}</strong>
                </div>
            </div>
            <div>
                <a href="{{ url()->previous() }}" class="btn btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    @if(empty($cart) || count($cart) === 0)
        <!-- Empty Cart State -->
        <div class="empty-cart">
            <div class="empty-icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <h3 class="mb-3">Keranjang Masih Kosong</h3>
            <p class="text-muted mb-4">Tambahkan menu favorit Anda untuk memulai pesanan</p>
            <a href="{{ url()->previous() }}" class="btn btn-checkout" style="max-width: 250px; margin: 0 auto;">
                <i class="fas fa-utensils me-2"></i> Lihat Menu
            </a>
        </div>
    @else
        <!-- Cart Items -->
        <div class="mb-4">
            @foreach($cart as $item)
                <div class="cart-card">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <div class="menu-name">{{ $item['nama'] }}</div>
                            <div class="menu-price">{{ number_format($item['harga'], 0, ',', '.') }}</div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="subtotal">
                                Subtotal: Rp {{ number_format($item['harga'] * $item['qty'], 0, ',', '.') }}
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="d-flex flex-column flex-md-row gap-2">
                                <!-- Update Quantity Form -->
                                <form method="POST" action="{{ route('cart.update') }}" class="d-flex align-items-center gap-2">
                                    @csrf
                                    <input type="hidden" name="menu_id" value="{{ $item['menu_id'] }}">
                                    <div class="qty-control">
                                        <input type="number" 
                                               name="qty" 
                                               value="{{ $item['qty'] }}" 
                                               min="1" 
                                               max="99"
                                               class="form-control qty-input">
                                        <button type="submit" class="btn btn-update">
                                            <i class="fas fa-sync-alt me-1"></i> Update
                                        </button>
                                    </div>
                                </form>
                                
                                <!-- Remove Item Form -->
                                <form method="POST" action="{{ route('cart.remove') }}" 
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus {{ $item['nama'] }} dari keranjang?')">
                                    @csrf
                                    <input type="hidden" name="menu_id" value="{{ $item['menu_id'] }}">
                                    <button type="submit" class="btn btn-remove w-100">
                                        <i class="fas fa-trash-alt me-1"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Cart Summary -->
        <div class="cart-summary">
            <div class="row align-items-center">
                <div class="col-md-4 mb-3 mb-md-0">
                    <h5 class="text-muted mb-1">Total Pesanan</h5>
                    <p class="total-amount">{{ number_format($total, 0, ',', '.') }}</p>
                </div>
                
                <div class="col-md-8">
                    <div class="d-flex flex-column flex-md-row gap-3">
                        <!-- Checkout Form -->
                        <form method="POST" action="{{ route('checkout.store') }}" class="flex-fill">
                            @csrf
                            <input type="hidden" name="table_id" value="{{ session('table_id') }}">
                            <button type="submit" class="btn btn-checkout">
                                <i class="fas fa-check-circle me-2"></i> Konfirmasi Pesanan
                            </button>
                        </form>
                        
                        <a href="{{ url()->previous() }}" class="btn btn-add-more">
                            <i class="fas fa-plus-circle me-2"></i> Tambah Menu Lain
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Additional Info -->
            <div class="mt-3 pt-3 border-top">
                <div class="row">
                    <div class="col-md-6">
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i> 
                            Total sudah termasuk pajak dan layanan
                        </small>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <small class="text-muted">
                            <i class="fas fa-clock me-1"></i> 
                            Pesanan akan disiapkan dalam 15-25 menit
                        </small>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Quantity input validation
    document.addEventListener('DOMContentLoaded', function() {
        const qtyInputs = document.querySelectorAll('.qty-input');
        
        qtyInputs.forEach(input => {
            input.addEventListener('change', function() {
                if (this.value < 1) {
                    this.value = 1;
                }
                if (this.value > 99) {
                    this.value = 99;
                }
            });
        });
        
        // Add animation to cart items
        const cartCards = document.querySelectorAll('.cart-card');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1 });
        
        cartCards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            observer.observe(card);
        });
        
        // Confirm checkout
        const checkoutForm = document.querySelector('form[action="{{ route("checkout.store") }}"]');
        if (checkoutForm) {
            checkoutForm.addEventListener('submit', function(e) {
                const total = parseFloat("{{ $total ?? 0 }}");
                if (total > 0) {
                    if (!confirm('Apakah Anda yakin ingin mengkonfirmasi pesanan ini?\nTotal: Rp ' + total.toLocaleString('id-ID'))) {
                        e.preventDefault();
                    }
                }
            });
        }
    });
</script>

</body>
</html>