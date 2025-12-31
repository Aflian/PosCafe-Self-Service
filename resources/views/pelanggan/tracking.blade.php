<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pesanan - Cafe Kevin</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
        }
        
        .order-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.25);
            overflow: hidden;
            max-width: 550px;
            margin: 0 auto;
            animation: slideIn 0.5s ease-out;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .order-header {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            padding: 30px;
            text-align: center;
            position: relative;
        }
        
        .order-header::after {
            content: '';
            position: absolute;
            bottom: -20px;
            left: 0;
            right: 0;
            height: 40px;
            background: white;
            border-radius: 50% 50% 0 0;
        }
        
        .order-id {
            background: rgba(255,255,255,0.2);
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 15px;
            margin-top: 15px;
            display: inline-block;
            font-family: 'Courier New', monospace;
        }
        
        .status-container {
            padding: 40px 25px 25px;
            text-align: center;
            position: relative;
            z-index: 1;
        }
        
        .status-icon {
            font-size: 70px;
            margin-bottom: 20px;
            display: inline-block;
            padding: 20px;
            border-radius: 50%;
            background: white;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        
        .status-badge {
            font-size: 18px;
            font-weight: 700;
            padding: 15px 30px;
            border-radius: 30px;
            display: inline-block;
            margin-bottom: 20px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        /* Warna untuk setiap status */
        .status-menunggu_pembayaran {
            background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%);
            color: #c0392b;
            border: 3px solid #ff9a9e;
        }
        
        .status-menunggu_verifikasi {
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
            color: #2980b9;
            border: 3px solid #a8edea;
        }
        
        .status-diproses {
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            color: #e67e22;
            border: 3px solid #ffecd2;
        }
        
        .status-disajikan {
            background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%);
            color: #27ae60;
            border: 3px solid #84fab0;
        }
        
        .status-selesai {
            background: linear-gradient(135deg, #d4fc79 0%, #96e6a1 100%);
            color: #16a085;
            border: 3px solid #d4fc79;
        }
        
        .status-ditolak {
            background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
            color: #c0392b;
            border: 3px solid #ff9a9e;
        }
        
        .status-message {
            font-size: 16px;
            color: #555;
            margin-bottom: 30px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 10px;
            border-left: 4px solid #6a11cb;
        }
        
        .timeline-container {
            padding: 0 25px 25px;
        }
        
        .timeline {
            position: relative;
            max-width: 400px;
            margin: 0 auto;
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            left: 30px;
            top: 0;
            bottom: 0;
            width: 3px;
            background: #e0e0e0;
        }
        
        .timeline-step {
            position: relative;
            margin-bottom: 25px;
            padding-left: 70px;
            min-height: 50px;
        }
        
        .timeline-step:last-child {
            margin-bottom: 0;
        }
        
        .timeline-icon {
            position: absolute;
            left: 18px;
            top: 0;
            width: 30px;
            height: 30px;
            background: #e0e0e0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
            z-index: 1;
        }
        
        .timeline-step.active .timeline-icon {
            background: #6a11cb;
            transform: scale(1.2);
            box-shadow: 0 0 0 5px rgba(106, 17, 203, 0.2);
        }
        
        .timeline-step.completed .timeline-icon {
            background: #27ae60;
        }
        
        .timeline-content {
            padding: 10px 15px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        }
        
        .timeline-content h6 {
            margin: 0;
            font-weight: 600;
        }
        
        .timeline-content small {
            color: #666;
        }
        
        .order-details {
            padding: 0 25px 25px;
        }
        
        .detail-card {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            border-left: 4px solid #6a11cb;
        }
        
        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px dashed #dee2e6;
        }
        
        .detail-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
            font-weight: bold;
            font-size: 18px;
            color: #6a11cb;
        }
        
        .items-list {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
            margin-bottom: 20px;
        }
        
        .item-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .item-row:last-child {
            border-bottom: none;
        }
        
        .item-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .item-number {
            background: #6a11cb;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        
        .item-name {
            font-weight: 600;
        }
        
        .item-price {
            color: #666;
            font-size: 14px;
        }
        
        .item-qty {
            background: #e9ecef;
            padding: 5px 15px;
            border-radius: 15px;
            font-weight: 600;
        }
        
        .action-buttons {
            padding: 25px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        
        .btn-action {
            padding: 15px;
            border-radius: 12px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s ease;
            border: none;
            font-size: 15px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
        }
        
        .btn-secondary {
            background: #f8f9fa;
            color: #333;
            border: 2px solid #e0e0e0;
        }
        
        .btn-action:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        
        .btn-action:active {
            transform: translateY(-1px);
        }
        
        .animate-pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .animate-bounce {
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        .animate-spin {
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .notification-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: #ff4757;
            color: white;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="order-card">
        <!-- Header -->
        <div class="order-header">
            <h2 class="mb-2">
                <i class="fas fa-clipboard-list me-2"></i>Status Pesanan
            </h2>
            <div class="order-id">
                <i class="fas fa-hashtag me-1"></i>{{ $order->kode_order }}
            </div>
            
            @if($order->status == 'menunggu_pembayaran')
                <div class="notification-badge">!</div>
            @endif
        </div>
        
        <!-- Status -->
        <div class="status-container">
            @php
                $statusConfig = [
                    'menunggu_pembayaran' => [
                        'icon' => 'fas fa-clock',
                        'animation' => 'animate-pulse',
                        'message' => 'Pesanan menunggu pembayaran. Silakan selesaikan pembayaran Anda.',
                        'color' => '#ff9a9e'
                    ],
                    'menunggu_verifikasi' => [
                        'icon' => 'fas fa-user-check',
                        'animation' => 'animate-bounce',
                        'message' => 'Pembayaran Anda sedang diverifikasi oleh kasir.',
                        'color' => '#a8edea'
                    ],
                    'diproses' => [
                        'icon' => 'fas fa-cogs',
                        'animation' => 'animate-spin',
                        'message' => 'Pesanan Anda sedang diproses oleh dapur.',
                        'color' => '#ffecd2'
                    ],
                    'disajikan' => [
                        'icon' => 'fas fa-concierge-bell',
                        'animation' => 'animate-pulse',
                        'message' => 'Pesanan Anda sedang disajikan ke meja Anda.',
                        'color' => '#84fab0'
                    ],
                    'selesai' => [
                        'icon' => 'fas fa-flag-checkered',
                        'animation' => '',
                        'message' => 'Pesanan telah selesai. Terima kasih telah memesan!',
                        'color' => '#d4fc79'
                    ],
                    'ditolak' => [
                        'icon' => 'fas fa-times-circle',
                        'animation' => '',
                        'message' => 'Pesanan Anda ditolak. Silakan hubungi kasir untuk informasi lebih lanjut.',
                        'color' => '#ff9a9e'
                    ]
                ];
                
                $config = $statusConfig[$order->status] ?? $statusConfig['menunggu_pembayaran'];
            @endphp
            
            <div class="status-icon {{ $config['animation'] }}" style="background: {{ $config['color'] }}20; border: 3px solid {{ $config['color'] }};">
                <i class="{{ $config['icon'] }}" style="color: {{ $config['color'] }};"></i>
            </div>
            
            <div class="status-badge status-{{ $order->status }}">
                {{ str_replace('_', ' ', strtoupper($order->status)) }}
            </div>
            
            <div class="status-message">
                <i class="fas fa-info-circle me-2" style="color: {{ $config['color'] }};"></i>
                {{ $config['message'] }}
            </div>
        </div>
        
        <!-- Timeline -->
        <div class="timeline-container">
            <h5 class="mb-3"><i class="fas fa-stream me-2"></i>Proses Pesanan</h5>
            <div class="timeline">
                @php
                    $timelineSteps = [
                        ['status' => 'menunggu_pembayaran', 'icon' => 'fas fa-money-bill-wave', 'title' => 'Menunggu Pembayaran', 'desc' => 'Pembayaran belum dilakukan'],
                        ['status' => 'menunggu_verifikasi', 'icon' => 'fas fa-user-check', 'title' => 'Verifikasi', 'desc' => 'Menunggu verifikasi pembayaran'],
                        ['status' => 'diproses', 'icon' => 'fas fa-utensils', 'title' => 'Diproses', 'desc' => 'Pesanan sedang dimasak'],
                        ['status' => 'disajikan', 'icon' => 'fas fa-concierge-bell', 'title' => 'Disajikan', 'desc' => 'Pesanan diantarkan ke meja'],
                        ['status' => 'selesai', 'icon' => 'fas fa-check-circle', 'title' => 'Selesai', 'desc' => 'Pesanan selesai']
                    ];
                    
                    $statusOrder = ['menunggu_pembayaran', 'menunggu_verifikasi', 'diproses', 'disajikan', 'selesai'];
                    $currentStatusIndex = array_search($order->status, $statusOrder);
                @endphp
                
                @foreach($timelineSteps as $index => $step)
                    <div class="timeline-step 
                        {{ $index <= $currentStatusIndex ? 'completed' : '' }} 
                        {{ $index == $currentStatusIndex ? 'active' : '' }}">
                        <div class="timeline-icon">
                            <i class="{{ $step['icon'] }}"></i>
                        </div>
                        <div class="timeline-content">
                            <h6>{{ $step['title'] }}</h6>
                            <small>{{ $step['desc'] }}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        <!-- Order Details -->
        <div class="order-details">
            <!-- Items List -->
            <div class="detail-card">
                <h5 class="mb-3"><i class="fas fa-list-ol me-2"></i>Daftar Pesanan</h5>
                
                <div class="items-list">
                    @foreach($order->items as $index => $item)
                        <div class="item-row">
                            <div class="item-info">
                                <div class="item-number">{{ $index + 1 }}</div>
                                <div>
                                    <div class="item-name">{{ $item->menu->nama_menu }}</div>
                                    <div class="item-price">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>
                                </div>
                            </div>
                            <div class="item-qty">x{{ $item->qty }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Payment Summary -->
            <div class="detail-card">
                <h5 class="mb-3"><i class="fas fa-file-invoice-dollar me-2"></i>Ringkasan Pembayaran</h5>
                
                <div class="detail-row">
                    <span>Subtotal:</span>
                    <span>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</span>
                </div>
                <div class="detail-row">
                    <span>Pajak (10%):</span>
                    <span>Rp {{ number_format($order->total_harga * 0.1, 0, ',', '.') }}</span>
                </div>
                <div class="detail-row">
                    <span>Biaya Layanan:</span>
                    <span>Rp 5.000</span>
                </div>
                <div class="detail-row">
                    <span>Total:</span>
                    <span>Rp {{ number_format($order->total_harga * 1.1 + 5000, 0, ',', '.') }}</span>
                </div>
            </div>
            
            <!-- Order Info -->
            <div class="detail-card">
                <h5 class="mb-3"><i class="fas fa-info-circle me-2"></i>Informasi Pesanan</h5>
                
                <div class="detail-row">
                    <span><i class="fas fa-clock me-1"></i> Waktu Pesanan:</span>
                    <span>{{ $order->created_at->format('d/m/Y H:i') }}</span>
                </div>
                
                @if($order->table)
                <div class="detail-row">
                    <span><i class="fas fa-chair me-1"></i> Nomor Meja:</span>
                    <span>Meja {{ $order->table->kode_meja }}</span>
                </div>
                @endif
                
                @if($order->status == 'selesai' && $order->completed_at)
                <div class="detail-row">
                    <span><i class="fas fa-flag-checkered me-1"></i> Waktu Selesai:</span>
                    <span>{{ $order->completed_at->format('H:i') }}</span>
                </div>
                @endif
            </div>
        </div>
        
        <!-- Action Buttons -->
        <div class="action-buttons">
            @if($order->status == 'menunggu_pembayaran')
                <button class="btn-action btn-primary" onclick="window.location.href='/payment'">
                    <i class="fas fa-credit-card"></i> Bayar Sekarang
                </button>
            @elseif(in_array($order->status, ['menunggu_verifikasi', 'diproses']))
                <button class="btn-action btn-primary" onclick="refreshStatus()">
                    <i class="fas fa-sync-alt"></i> Perbarui Status
                </button>
            @elseif($order->status == 'selesai')
                <button class="btn-action btn-primary" onclick="printReceipt()">
                    <i class="fas fa-print"></i> Cetak Struk
                </button>
            @endif
            
            <button class="btn-action btn-secondary" onclick="window.location.href='/'">
                <i class="fas fa-home"></i> Kembali ke Menu
            </button>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Fungsi untuk refresh status
        function refreshStatus() {
            const refreshBtn = document.querySelector('.btn-primary');
            if (refreshBtn) {
                const icon = refreshBtn.querySelector('i');
                const originalClass = icon.className;
                
                icon.className = 'fas fa-spinner fa-spin';
                refreshBtn.disabled = true;
                
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }
        }
        
        // Fungsi untuk cetak struk
        function printReceipt() {
            const printWindow = window.open('', '_blank');
            printWindow.document.write(`
                <html>
                <head>
                    <title>Struk Pesanan - Cafe Kevin</title>
                    <style>
                        body { font-family: monospace; padding: 20px; }
                        .header { text-align: center; margin-bottom: 20px; }
                        .item { margin: 5px 0; }
                        .total { font-weight: bold; margin-top: 10px; }
                    </style>
                </head>
                <body>
                    <div class="header">
                        <h3>Cafe Kevin</h3>
                        <p>Kode: {{ $order->kode_order }}</p>
                    </div>
                    <hr>
                    ${document.querySelector('.items-list').outerHTML}
                    <div class="total">
                        Total: Rp {{ number_format($order->total_harga * 1.1 + 5000, 0, ',', '.') }}
                    </div>
                    <hr>
                    <p>Terima kasih telah berkunjung!</p>
                </body>
                </html>
            `);
            printWindow.document.close();
            printWindow.print();
        }
        
        // Auto-refresh untuk status tertentu
        @if(in_array($order->status, ['menunggu_verifikasi', 'diproses']))
        setTimeout(() => {
            location.reload();
        }, 10000); // Refresh setiap 10 detik
        @endif
        
        // Animasi timeline saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            const timelineSteps = document.querySelectorAll('.timeline-step');
            timelineSteps.forEach((step, index) => {
                step.style.opacity = '0';
                step.style.transform = 'translateX(-20px)';
                
                setTimeout(() => {
                    step.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    step.style.opacity = '1';
                    step.style.transform = 'translateX(0)';
                }, index * 200);
            });
        });
    </script>
</body>
</html>