<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cafe Kevin - Pesan Digital, Nikmati Hygge</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Dancing+Script:wght@600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #8B4513;
            --secondary-color: #D2691E;
            --accent-color: #FFD700;
            --light-color: #FFF8E1;
            --dark-color: #5D4037;
            --gradient: linear-gradient(135deg, #8B4513 0%, #D2691E 100%);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-color);
            color: var(--dark-color);
            overflow-x: hidden;
        }
        
        /* Hero Section */
        .hero {
            min-height: 100vh;
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), 
                        url('https://images.unsplash.com/photo-1445116572660-236099ec97a0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient);
            opacity: 0.3;
            z-index: 1;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            padding: 2rem;
        }
        
        .hero h1 {
            font-family: 'Dancing Script', cursive;
            font-size: 5rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.5);
            animation: fadeInDown 1s ease-out;
        }
        
        .hero p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            animation: fadeInUp 1s ease-out 0.3s both;
        }
        
        .badge {
            display: inline-block;
            background: var(--accent-color);
            color: var(--dark-color);
            padding: 0.8rem 2rem;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1.1rem;
            letter-spacing: 1px;
            box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
            animation: pulse 2s infinite;
            margin-top: 1rem;
        }
        
        .cta-button {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--accent-color);
            color: var(--dark-color);
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.2rem;
            text-decoration: none;
            margin-top: 2rem;
            transition: all 0.3s ease;
            box-shadow: 0 10px 25px rgba(255, 215, 0, 0.4);
            animation: fadeIn 1s ease-out 0.6s both;
        }
        
        .cta-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(255, 215, 0, 0.5);
            color: var(--dark-color);
        }
        
        /* Steps Section */
        .steps {
            padding: 100px 20px;
            background: white;
            position: relative;
        }
        
        .steps h2 {
            text-align: center;
            font-size: 3rem;
            margin-bottom: 3rem;
            color: var(--primary-color);
            font-family: 'Dancing Script', cursive;
        }
        
        .step-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .step {
            background: white;
            padding: 40px 30px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 15px 35px rgba(139, 69, 19, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border: 2px solid transparent;
        }
        
        .step:hover {
            transform: translateY(-15px);
            border-color: var(--accent-color);
            box-shadow: 0 20px 40px rgba(139, 69, 19, 0.15);
        }
        
        .step::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient);
        }
        
        .step h3 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }
        
        .step-number {
            display: inline-block;
            width: 50px;
            height: 50px;
            background: var(--gradient);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin: 0 auto 20px;
        }
        
        /* Features Section */
        .features {
            padding: 100px 20px;
            background: linear-gradient(135deg, #FFF8E1 0%, #FFECB3 100%);
            position: relative;
        }
        
        .features h2 {
            text-align: center;
            font-size: 3rem;
            margin-bottom: 3rem;
            color: var(--primary-color);
            font-family: 'Dancing Script', cursive;
        }
        
        .feature-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .feature {
            background: white;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            font-weight: 600;
            font-size: 1.2rem;
            color: var(--primary-color);
            box-shadow: 0 10px 25px rgba(139, 69, 19, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .feature:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(139, 69, 19, 0.15);
        }
        
        .feature i {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: var(--secondary-color);
            display: block;
        }
        
        /* Footer */
        footer {
            background: var(--primary-color);
            color: white;
            padding: 60px 20px 30px;
            text-align: center;
            position: relative;
        }
        
        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--accent-color);
        }
        
        footer p {
            font-size: 1.3rem;
            margin-bottom: 10px;
        }
        
        footer small {
            opacity: 0.8;
            display: block;
            margin-bottom: 2rem;
        }
        
        .footer-links {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 30px;
            flex-wrap: wrap;
        }
        
        .footer-links a {
            color: var(--light-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: var(--accent-color);
        }
        
        .social-icons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }
        
        .social-icon {
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }
        
        .social-icon:hover {
            background: var(--accent-color);
            color: var(--dark-color);
            transform: translateY(-3px);
        }
        
        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        
        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 3.5rem;
            }
            
            .hero p {
                font-size: 1.2rem;
            }
            
            .steps h2,
            .features h2 {
                font-size: 2.5rem;
            }
            
            .step {
                padding: 30px 20px;
            }
            
            .step-list {
                grid-template-columns: 1fr;
            }
        }
        
        /* Floating Elements */
        .floating-coffee {
            position: absolute;
            font-size: 2rem;
            opacity: 0.2;
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(10deg);
            }
        }
        
        /* QR Code Section */
        .qr-section {
            padding: 80px 20px;
            background: white;
            text-align: center;
        }
        
        .qr-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 30px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(139, 69, 19, 0.1);
            position: relative;
            overflow: hidden;
        }
        
        .qr-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient);
        }
        
        .qr-code {
            width: 200px;
            height: 200px;
            background: #f5f5f5;
            margin: 20px auto;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            font-size: 4rem;
            color: var(--primary-color);
            border: 2px dashed var(--secondary-color);
        }
    </style>
</head>
<body>

<!-- HERO -->
<section class="hero">
    <!-- Floating coffee icons -->
    <div class="floating-coffee" style="top: 20%; left: 10%;">☕</div>
    <div class="floating-coffee" style="top: 60%; right: 15%;">🍰</div>
    <div class="floating-coffee" style="top: 30%; right: 20%;">🥐</div>
    <div class="floating-coffee" style="bottom: 20%; left: 15%;">🍵</div>
    
    <div class="hero-content">
        <h1>Cafe Kevin</h1>
        <p>Pesan Mudah • Bayar Praktis • Nikmati Hygge</p>
        <span class="badge">Dine-in Experience</span>
        
        <a href="#" class="cta-button">
            <i class="fas fa-qrcode"></i> Scan QR Code Meja Anda
        </a>
    </div>
</section>

<!-- QR CODE SECTION -->
<section class="qr-section">
    <div class="container">
        <div class="qr-container">
            <h3 style="color: var(--primary-color); margin-bottom: 20px;">
                <i class="fas fa-mobile-alt me-2"></i>Scan QR Code di Meja Anda
            </h3>
            <div class="qr-code">
                <i class="fas fa-qrcode"></i>
            </div>
            <p style="color: #666; margin-top: 20px;">
                Arahkan kamera smartphone Anda ke QR Code di meja untuk memulai pemesanan
            </p>
        </div>
    </div>
</section>

<!-- CARA PESAN -->
<section class="steps">
    <h2>Cara Pemesanan</h2>
    <div class="step-list">
        <div class="step">
            <div class="step-number">1</div>
            <h3><i class="fas fa-qrcode me-2"></i> Scan QR Code</h3>
            <p>Scan QR Code unik yang ada di meja Anda untuk mengakses menu digital</p>
        </div>
        <div class="step">
            <div class="step-number">2</div>
            <h3><i class="fas fa-utensils me-2"></i> Pilih Menu</h3>
            <p>Jelajahi menu lengkap kami dan pilih makanan & minuman favorit Anda</p>
        </div>
        <div class="step">
            <div class="step-number">3</div>
            <h3><i class="fas fa-credit-card me-2"></i> Bayar & Tunggu</h3>
            <p>Lakukan pembayaran digital dan pantau status pesanan secara real-time</p>
        </div>
    </div>
</section>

<!-- KEUNGGULAN -->
<section class="features">
    <h2>Kenapa Cafe Kevin?</h2>
    <div class="feature-list">
        <div class="feature">
            <i class="fas fa-bolt"></i>
            Cepat & Efisien
            <p class="mt-2" style="font-size: 0.9rem; font-weight: normal; color: #666;">Pesan dalam hitungan detik tanpa antri</p>
        </div>
        <div class="feature">
            <i class="fas fa-mobile-alt"></i>
            Tanpa Aplikasi
            <p class="mt-2" style="font-size: 0.9rem; font-weight: normal; color: #666;">Hanya butuh browser di smartphone</p>
        </div>
        <div class="feature">
            <i class="fas fa-wallet"></i>
            Banyak Metode Bayar
            <p class="mt-2" style="font-size: 0.9rem; font-weight: normal; color: #666;">Transfer, QRIS, E-wallet & Cash</p>
        </div>
        <div class="feature">
            <i class="fas fa-chart-line"></i>
            Pesanan Tercatat
            <p class="mt-2" style="font-size: 0.9rem; font-weight: normal; color: #666;">Histori pesanan tersimpan rapi</p>
        </div>
        <div class="feature">
            <i class="fas fa-history"></i>
            Real-time Tracking
            <p class="mt-2" style="font-size: 0.9rem; font-weight: normal; color: #666;">Pantau status pesanan live</p>
        </div>
        <div class="feature">
            <i class="fas fa-headset"></i>
            Customer Support
            <p class="mt-2" style="font-size: 0.9rem; font-weight: normal; color: #666;">Bantuan 24/7 via chat</p>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <p>© <?php echo date('Y'); ?> Cafe Kevin</p>
    <small>Sistem Pemesanan Digital Terintegrasi</small>
    
    <div class="footer-links">
        <a href="#"><i class="fas fa-info-circle me-1"></i> Tentang Kami</a>
        <a href="#"><i class="fas fa-book me-1"></i> Menu</a>
        <a href="#"><i class="fas fa-question-circle me-1"></i> FAQ</a>
        <a href="#"><i class="fas fa-phone me-1"></i> Kontak</a>
        <a href="#"><i class="fas fa-shield-alt me-1"></i> Kebijakan Privasi</a>
    </div>
    
    <div class="social-icons">
        <a href="#" class="social-icon">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="#" class="social-icon">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#" class="social-icon">
            <i class="fab fa-whatsapp"></i>
        </a>
        <a href="#" class="social-icon">
            <i class="fab fa-tiktok"></i>
        </a>
    </div>
    
    <p style="margin-top: 30px; font-size: 0.9rem; opacity: 0.7;">
        <i class="fas fa-map-marker-alt me-1"></i> Jl. Raya Cafe No. 123, Kota Anda
        <br>
        <i class="fas fa-clock me-1"></i> Buka Setiap Hari: 08:00 - 23:00
    </p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Simple animation for elements on scroll
    document.addEventListener('DOMContentLoaded', function() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);
        
        // Observe steps and features
        document.querySelectorAll('.step, .feature').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
        
        // Add delay to each step and feature
        document.querySelectorAll('.step').forEach((el, index) => {
            el.style.transitionDelay = `${index * 0.2}s`;
        });
        
        document.querySelectorAll('.feature').forEach((el, index) => {
            el.style.transitionDelay = `${index * 0.1}s`;
        });
    });
</script>

</body>
</html>