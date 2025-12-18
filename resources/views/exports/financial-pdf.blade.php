<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: DejaVu Sans; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px; }
        th { background: #f0f0f0; }
    </style>
</head>
<body>

<h3>Laporan Keuangan Cafe</h3>
<p>Periode: {{ $from }} s/d {{ $to }}</p>

<table>
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Order</th>
            <th>Pemasukan</th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0; @endphp
        @foreach($data as $row)
            <tr>
                <td>{{ $row->tanggal }}</td>
                <td>{{ $row->order_id }}</td>
                <td>Rp {{ number_format($row->pemasukan,0,',','.') }}</td>
            </tr>
            @php $total += $row->pemasukan; @endphp
        @endforeach
        <tr>
            <th colspan="2">TOTAL</th>
            <th>Rp {{ number_format($total,0,',','.') }}</th>
        </tr>
    </tbody>
</table>

</body>
</html>
