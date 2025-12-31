<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Cafe Kevin</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #6f42c1;
            --secondary-color: #20c997;
            --accent-color: #ff6b6b;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
            --shadow: 0 5px 15px rgba(0,0,0,0.1);
            --transition: all 0.3s ease;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: var(--dark-color);
            padding-bottom: 100px;
        }
        
        /* Header Styling */
        .cafe-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #5a32a3 100%);
            color: white;
            padding: 1.5rem 0;
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .cafe-title {
            font-family: 'Dancing Script', cursive;
            font-size: 2.5rem;
            font-weight: 600;
            margin: 0;
        }
        
        .cafe-subtitle {
            font-size: 0.9rem;
            opacity: 0.9;
        }
        
        .table-badge {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            padding: 8px 20px;
            font-weight: 500;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        /* Alert Styling */
        .alert-custom {
            background: linear-gradient(to right, #20c997, #17a2b8);
            color: white;
            border: none;
            border-radius: 10px;
            box-shadow: var(--shadow);
        }
        
        /* Category Section */
        .category-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border: none;
        }
        
        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        
        .category-title {
            color: var(--primary-color);
            font-weight: 600;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary-color);
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .category-title:after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 50px;
            height: 2px;
            background-color: var(--secondary-color);
        }
        
        /* Menu Card */
        .menu-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.08);
            transition: var(--transition);
            height: 100%;
            border: none;
            margin-bottom: 1.5rem;
        }
        
        .menu-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 20px rgba(0,0,0,0.15);
        }
        
        .menu-image {
            height: 180px;
            overflow: hidden;
            position: relative;
        }
        
        .menu-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .menu-card:hover .menu-image img {
            transform: scale(1.05);
        }
        
        .no-image {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            font-size: 3rem;
        }
        
        .menu-info {
            padding: 1.2rem;
        }
        
        .menu-info h3 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
            line-height: 1.4;
        }
        
        .price {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 1.3rem;
            margin: 0;
        }
        
        .price:before {
            content: 'Rp ';
            font-size: 0.9rem;
        }
        
        /* Button Styling */
        .btn-add {
            background: linear-gradient(135deg, var(--primary-color) 0%, #5a32a3 100%);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
            transition: var(--transition);
            width: 100%;
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .btn-add:hover {
            background: linear-gradient(135deg, #5a32a3 0%, var(--primary-color) 100%);
            transform: scale(1.02);
            color: white;
        }
        
        /* Floating Cart Button */
        .cart-floating {
            position: fixed;
            bottom: 25px;
            right: 25px;
            background: linear-gradient(135deg, var(--accent-color) 0%, #ff4757 100%);
            color: white;
            padding: 15px 25px;
            border-radius: 50px;
            box-shadow: 0 6px 15px rgba(255, 107, 107, 0.4);
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            z-index: 100;
            transition: var(--transition);
        }
        
        .cart-floating:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(255, 107, 107, 0.5);
            color: white;
        }
        
        .cart-badge {
            background-color: white;
            color: var(--accent-color);
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: 700;
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #6c757d;
        }
        
        .empty-state i {
            font-size: 3rem;
            color: #dee2e6;
            margin-bottom: 1rem;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .cafe-title {
                font-size: 2rem;
            }
            
            .category-card {
                padding: 1rem;
            }
            
            .menu-image {
                height: 150px;
            }
            
            .cart-floating {
                padding: 12px 20px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>

<!-- Header -->
<header class="cafe-header">
    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div class="text-center text-md-start mb-3 mb-md-0">
                <h1 class="cafe-title">
                    <i class="fas fa-mug-hot me-2"></i>Cafe Kevin
                </h1>
                <p class="cafe-subtitle">
                    <i class="fas fa-utensils me-1"></i> Pemesanan Dine-in • Pesan langsung dari meja Anda
                </p>
            </div>
            <div class="d-flex align-items-center">
                <div class="table-badge">
                    <i class="fas fa-chair me-2"></i> Meja: <strong>{{ $table->kode_meja }}</strong>
                </div>
            </div>
        </div>
    </div>
</header>

<main class="container my-4">
    <!-- Alert -->
    @if(session('success'))
        <div class="alert alert-custom alert-dismissible fade show" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-check-circle me-3 fs-4"></i>
                <div>{{ session('success') }}</div>
            </div>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <!-- Menu Categories -->
    @foreach($categories as $category)
        <div class="category-card">
            <h2 class="category-title">
                <i class="fas fa-{{ $category->icon ?? 'tag' }} me-2"></i>
                {{ $category->nama_kategori }}
            </h2>
            
            @if($category->menus->count() > 0)
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
                    @foreach($category->menus as $menu)
                        <div class="col">
                            <div class="menu-card">
                                <!-- Menu Image -->
                                <div class="menu-image">
                                    @if($menu->foto)
                                        <img src="{{ asset('storage/'.$menu->foto) }}" 
                                             alt="{{ $menu->nama_menu }}"
                                             class="img-fluid">
                                    @else
                                        <div class="no-image">
                                            <i class="fas fa-utensils"></i>
                                        </div>
                                    @endif
                                </div>
                                
                                <!-- Menu Info -->
                                <div class="menu-info">
                                    <h3>{{ $menu->nama_menu }}</h3>
                                    @if($menu->deskripsi)
                                        <p class="text-muted small mb-2">
                                            {{ Str::limit($menu->deskripsi, 60) }}
                                        </p>
                                    @endif
                                    <p class="price">
                                        {{ number_format($menu->harga, 0, ',', '.') }}
                                    </p>
                                    
                                    <!-- Add to Cart Form -->
                                    <form method="POST" action="{{ route('cart.add') }}">
                                        @csrf
                                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                        <button type="submit" class="btn btn-add">
                                            <i class="fas fa-plus-circle"></i> Tambah ke Keranjang
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <i class="fas fa-glass-cheers"></i>
                    <h4 class="mt-3">Menu Tidak Tersedia</h4>
                    <p class="text-muted">Silakan pilih kategori lain</p>
                </div>
            @endif
        </div>
    @endforeach
    
    @if($categories->count() === 0)
        <div class="text-center py-5">
            <i class="fas fa-glass-cheers fa-4x text-muted mb-4"></i>
            <h3 class="text-muted">Belum Ada Kategori Menu</h3>
            <p class="text-muted">Silakan hubungi admin untuk menambahkan menu</p>
        </div>
    @endif
</main>

<!-- Floating Cart Button -->
<a href="{{ route('cart.index') }}" class="cart-floating">
    <i class="fas fa-shopping-cart"></i>
    <span>Keranjang</span>
    @if(isset($cartCount) && $cartCount > 0)
        <span class="cart-badge">{{ $cartCount }}</span>
    @endif
</a>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Add animation to menu cards when they appear
    document.addEventListener('DOMContentLoaded', function() {
        // Animate cards on scroll
        const cards = document.querySelectorAll('.menu-card');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1 });
        
        cards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            observer.observe(card);
        });
        
        // Add ripple effect to buttons
        const buttons = document.querySelectorAll('.btn-add');
        buttons.forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size/2;
                const y = e.clientY - rect.top - size/2;
                
                ripple.style.cssText = `
                    position: absolute;
                    border-radius: 50%;
                    background: rgba(255, 255, 255, 0.7);
                    transform: scale(0);
                    animation: ripple-animation 0.6s linear;
                    width: ${size}px;
                    height: ${size}px;
                    top: ${y}px;
                    left: ${x}px;
                `;
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
    });
    
    // Add CSS for ripple animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes ripple-animation {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
        .btn-add {
            position: relative;
            overflow: hidden;
        }
    `;
    document.head.appendChild(style);
</script>

</body>
</html>