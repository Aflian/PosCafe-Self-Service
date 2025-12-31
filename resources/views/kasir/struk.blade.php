<!DOCTYPE html>
<html>
<head>
    <title>Struk Cafe Anda</title>
    <style>
        body {
            font-family: 'Courier New', monospace;
            font-size: 12px;
            max-width: 58mm;
            margin: 0 auto;
            padding: 5px;
            line-height: 1.2;
        }
        .center { 
            text-align: center; 
            margin: 8px 0;
        }
        .header {
            margin-bottom: 12px;
        }
        .order-info {
            margin: 8px 0;
            line-height: 1.4;
        }
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }
        .items-table td {
            padding: 3px 0;
            vertical-align: top;
        }
        .item-name {
            width: 55%;
        }
        .item-qty {
            width: 15%;
            text-align: center;
        }
        .item-price {
            width: 30%;
            text-align: right;
        }
        .subtotal {
            text-align: right;
        }
        .total-section {
            margin-top: 12px;
            padding-top: 8px;
            border-top: 2px dashed #000;
            text-align: right;
            font-weight: bold;
        }
        .footer {
            margin-top: 15px;
            text-align: center;
            font-size: 11px;
        }
        .separator {
            border-bottom: 1px dashed #000;
            margin: 8px 0;
        }
        .text-left {
            text-align: left;
        }
        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="center">
            <strong>CAFE ANDA</strong><br>
            Jl. Contoh No. 123<br>
            Telp: (021) 12345678<br>
            =====================
        </div>
    </div>

    <div class="order-info">
        <table width="100%">
            <tr>
                <td class="text-left">Kode:</td>
                <td class="text-right">{{ $order->kode_order }}</td>
            </tr>
            <tr>
                <td class="text-left">Meja:</td>
                <td class="text-right">{{ $order->table->kode_meja }}</td>
            </tr>
            <tr>
                <td class="text-left">Tanggal:</td>
                <td class="text-right">{{ $order->created_at->format('d/m/Y H:i') }}</td>
            </tr>
        </table>
    </div>

    <div class="separator"></div>

    <table class="items-table">
        <thead>
            <tr>
                <td class="item-name"><strong>ITEM</strong></td>
                <td class="item-qty"><strong>QTY</strong></td>
                <td class="item-price"><strong>HARGA</strong></td>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td class="item-name">{{ $item->menu->nama_menu }}</td>
                <td class="item-qty">{{ $item->qty }}</td>
                <td class="item-price">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="separator"></div>

    <table width="100%" class="total-section">
        <tr>
            <td class="text-left"><strong>TOTAL:</strong></td>
            <td class="text-right"><strong>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</strong></td>
        </tr>
    </table>

    <div class="footer">
        Terima Kasih Atas Kunjungan Anda<br>
        🙏<br>
        =====================<br>
        <small>Struk ini sebagai bukti pembayaran yang sah</small><br>
        <small>Barang yang sudah dibeli tidak dapat dikembalikan</small>
    </div>
</body>
</html>