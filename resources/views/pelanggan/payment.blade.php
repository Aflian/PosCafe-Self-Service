<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - Cafe Kevin</title>
    
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
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .payment-container {
            max-width: 800px;
            width: 100%;
        }
        
        /* Header */
        .payment-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #5a32a3 100%);
            color: white;
            border-radius: 15px 15px 0 0;
            padding: 2rem;
            text-align: center;
            box-shadow: var(--shadow);
        }
        
        .payment-title {
            font-weight: 600;
            margin: 0;
            font-size: 2rem;
        }
        
        .payment-subtitle {
            opacity: 0.9;
            margin-top: 0.5rem;
            font-size: 1rem;
        }
        
        /* Order Summary */
        .order-summary {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            margin-top: 20px;
            box-shadow: var(--shadow);
        }
        
        .order-id {
            background-color: rgba(111, 66, 193, 0.1);
            color: var(--primary-color);
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1.1rem;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
        
        .total-amount {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin: 1.5rem 0;
            text-align: center;
        }
        
        .total-amount:before {
            content: 'Rp ';
            font-size: 1.5rem;
        }
        
        /* Payment Form */
        .payment-form {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            margin-top: 20px;
            box-shadow: var(--shadow);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }
        
        .form-select, .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 1rem;
            transition: var(--transition);
        }
        
        .form-select:focus, .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(111, 66, 193, 0.25);
        }
        
        .file-upload {
            position: relative;
            border: 2px dashed #dee2e6;
            border-radius: 10px;
            padding: 40px 20px;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            background-color: #f8f9fa;
        }
        
        .file-upload:hover {
            border-color: var(--primary-color);
            background-color: rgba(111, 66, 193, 0.05);
        }
        
        .file-upload i {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 15px;
        }
        
        .file-upload input {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }
        
        .file-info {
            margin-top: 10px;
            font-size: 0.9rem;
            color: #6c757d;
        }
        
        /* Payment Methods */
        .payment-methods {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 1rem;
        }
        
        .payment-method {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            background-color: white;
        }
        
        .payment-method:hover {
            border-color: var(--primary-color);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .payment-method.active {
            border-color: var(--primary-color);
            background-color: rgba(111, 66, 193, 0.05);
        }
        
        .payment-method i {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 10px;
        }
        
        .payment-method-name {
            font-weight: 500;
            margin: 0;
        }
        
        /* Buttons */
        .btn-pay {
            background: linear-gradient(135deg, var(--primary-color) 0%, #5a32a3 100%);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 15px 30px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: var(--transition);
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 2rem;
        }
        
        .btn-pay:hover {
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
            margin-top: 1rem;
            width: 100%;
        }
        
        .btn-back:hover {
            background-color: #5a6268;
            color: white;
        }
        
        /* Alert */
        .alert-payment {
            background: linear-gradient(to right, #20c997, #17a2b8);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .payment-header {
                padding: 1.5rem;
            }
            
            .payment-title {
                font-size: 1.5rem;
            }
            
            .order-summary, .payment-form {
                padding: 1.5rem;
            }
            
            .total-amount {
                font-size: 2rem;
            }
            
            .payment-methods {
                grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            }
        }
        
        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .order-summary, .payment-form {
            animation: fadeIn 0.5s ease forwards;
        }
        
        /* Loading spinner */
        .spinner-border {
            width: 1.2rem;
            height: 1.2rem;
            border-width: 0.2em;
        }
    </style>
</head>
<body>

<div class="payment-container">
    <!-- Header -->
    <div class="payment-header">
        <h1 class="payment-title">
            <i class="fas fa-credit-card me-2"></i>Pembayaran
        </h1>
        <p class="payment-subtitle">Lengkapi pembayaran untuk melanjutkan pesanan</p>
    </div>

    <!-- Order Summary -->
    <div class="order-summary">
        <div class="text-center">
            <div class="order-id">
                <i class="fas fa-receipt"></i>
                Kode Order: {{ $order->kode_order }}
            </div>
            
            <div class="total-amount mt-4">
                {{ number_format($order->total_harga, 0, ',', '.') }}
            </div>
            
            <p class="text-muted mb-0">
                <i class="fas fa-info-circle me-1"></i>
                Total sudah termasuk pajak dan layanan
            </p>
        </div>
    </div>

    <!-- Payment Form -->
    <div class="payment-form">
        <form method="POST" action="{{ route('pelanggan.payment.store') }}" enctype="multipart/form-data" id="paymentForm">
            @csrf
            
            <input type="hidden" name="order_id" value="{{ $order->id }}">
            <input type="hidden" name="nominal" value="{{ $order->total_harga }}">
            
            <!-- Payment Method Selection -->
            <div class="mb-4">
                <label class="form-label">
                    <i class="fas fa-wallet me-2"></i>Metode Pembayaran
                </label>
                
                <div class="payment-methods mb-3">
                    @foreach($paymentMethods as $method)
                        <div class="payment-method" 
                             data-id="{{ $method->id }}"
                             onclick="selectPaymentMethod(this, '{{ $method->id }}')">
                            <p class="payment-method-name">{{ $method->nama_metode }}</p>
                        </div>
                    @endforeach
                </div>
                
                <select name="payment_method_id" id="paymentMethodSelect" class="form-select" required style="display: none;">
                    <option value="">-- Pilih Metode Pembayaran --</option>
                    @foreach($paymentMethods as $method)
                        <option value="{{ $method->id }}">
                            {{ $method->nama_metode }}
                        </option>
                    @endforeach
                </select>
                
                <div id="paymentMethodError" class="text-danger mt-2" style="display: none;">
                    <i class="fas fa-exclamation-circle"></i> Silakan pilih metode pembayaran
                </div>
            </div>
            
            <!-- Payment Proof Upload -->
            <div class="mb-4">
                <label class="form-label">
                    <i class="fas fa-file-upload me-2"></i>Bukti Pembayaran
                    <span class="text-muted">(Opsional)</span>
                </label>
                
                <div class="file-upload mb-2">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p class="mb-2"><strong>Klik untuk mengunggah bukti</strong></p>
                    <p class="text-muted mb-0">Format: JPG, PNG (Maks. 2MB)</p>
                    <input type="file" 
                           name="bukti_pembayaran" 
                           id="buktiPembayaran" 
                           accept="image/*"
                           onchange="previewFile()">
                </div>
                
                <div id="filePreview" class="text-center" style="display: none;">
                    <img id="previewImage" src="#" alt="Preview" class="img-thumbnail mt-3" style="max-height: 200px;">
                    <p id="fileName" class="mt-2"></p>
                    <button type="button" class="btn btn-sm btn-outline-danger mt-2" onclick="removeFile()">
                        <i class="fas fa-times"></i> Hapus File
                    </button>
                </div>
                
                <div class="file-info">
                    <i class="fas fa-info-circle me-1"></i>
                    Upload bukti transfer jika pembayaran dilakukan via transfer bank
                </div>
            </div>
            
            <!-- Buttons -->
            <div class="d-grid gap-3">
                <button type="submit" class="btn btn-pay" id="submitBtn">
                    <i class="fas fa-paper-plane me-2"></i>
                    <span id="submitText">Kirim Pembayaran</span>
                    <div class="spinner-border spinner-border-sm ms-2" role="status" id="loadingSpinner" style="display: none;">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </button>
                
                <a href="{{ url()->previous() }}" class="btn btn-back">
                    <i class="fas fa-arrow-left me-2"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Helper function to get icon based on payment method
    function getPaymentMethodIcon(methodName) {
        const icons = {
            'Cash': 'fa-money-bill',
            'Transfer Bank': 'fa-university',
            'E-Wallet': 'fa-mobile-alt',
            'QRIS': 'fa-qrcode',
            'Kartu Kredit': 'fa-credit-card',
            'Debit': 'fa-credit-card'
        };
        
        for (const [key, icon] of Object.entries(icons)) {
            if (methodName.includes(key)) {
                return icon;
            }
        }
        
        return 'fa-wallet'; // default icon
    }
    
    // Select payment method
    function selectPaymentMethod(element, methodId) {
        // Remove active class from all payment methods
        document.querySelectorAll('.payment-method').forEach(el => {
            el.classList.remove('active');
        });
        
        // Add active class to selected payment method
        element.classList.add('active');
        
        // Set value to hidden select
        document.getElementById('paymentMethodSelect').value = methodId;
        
        // Hide error message if shown
        document.getElementById('paymentMethodError').style.display = 'none';
    }
    
    // File preview
    function previewFile() {
        const fileInput = document.getElementById('buktiPembayaran');
        const filePreview = document.getElementById('filePreview');
        const previewImage = document.getElementById('previewImage');
        const fileName = document.getElementById('fileName');
        
        if (fileInput.files && fileInput.files[0]) {
            const file = fileInput.files[0];
            const reader = new FileReader();
            
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                fileName.textContent = file.name;
                filePreview.style.display = 'block';
            }
            
            reader.readAsDataURL(file);
            
            // Validate file size (max 2MB)
            if (file.size > 2 * 1024 * 1024) {
                alert('File terlalu besar! Maksimal ukuran file adalah 2MB.');
                fileInput.value = '';
                filePreview.style.display = 'none';
                return false;
            }
        }
    }
    
    // Remove file
    function removeFile() {
        document.getElementById('buktiPembayaran').value = '';
        document.getElementById('filePreview').style.display = 'none';
    }
    
    // Form submission
    document.getElementById('paymentForm').addEventListener('submit', function(e) {
        const paymentMethod = document.getElementById('paymentMethodSelect').value;
        const submitBtn = document.getElementById('submitBtn');
        const submitText = document.getElementById('submitText');
        const loadingSpinner = document.getElementById('loadingSpinner');
        
        // Validate payment method
        if (!paymentMethod) {
            e.preventDefault();
            document.getElementById('paymentMethodError').style.display = 'block';
            return false;
        }
        
        // Show loading state
        submitBtn.disabled = true;
        submitText.textContent = 'Memproses...';
        loadingSpinner.style.display = 'inline-block';
        
        // Optional: Add timeout to prevent accidental double submission
        setTimeout(() => {
            submitBtn.disabled = false;
            submitText.textContent = 'Kirim Pembayaran';
            loadingSpinner.style.display = 'none';
        }, 5000);
    });
    
    // Initialize payment method icons
    document.addEventListener('DOMContentLoaded', function() {
        // Add icons to payment methods
        document.querySelectorAll('.payment-method i').forEach(icon => {
            const methodName = icon.parentElement.querySelector('.payment-method-name').textContent;
            const iconClass = getPaymentMethodIcon(methodName);
            icon.className = `fas ${iconClass}`;
        });
        
        // Add fade-in animation
        const elements = document.querySelectorAll('.order-summary, .payment-form');
        elements.forEach((el, index) => {
            el.style.animationDelay = `${index * 0.2}s`;
        });
    });
</script>

</body>
</html>