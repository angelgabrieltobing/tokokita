<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Katalog Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
            border-bottom: 3px solid #4CAF50;
            padding-bottom: 10px;
        }
        .info {
            text-align: center;
            margin-bottom: 20px;
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            text-align: left;
        }
        td {
            border: 1px solid #ddd;
            padding: 10px;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .badge-success {
            background-color: #28a745;
            color: white;
            padding: 3px 8px;
            border-radius: 4px;
        }
        .badge-danger {
            background-color: #dc3545;
            color: white;
            padding: 3px 8px;
            border-radius: 4px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #999;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
    </style>
</head>
<body>

    <h1>📦 Katalog Produk</h1>
    <div class="info">
        Total: <strong>{{ count($produks) }}</strong> produk
        | Dicetak: {{ date('d-m-Y H:i:s') }}
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produks as $index => $produk)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>{{ $produk->kategori ?? '-' }}</td>
                    <td class="text-right">
                        Rp {{ number_format($produk->harga, 0, ',', '.') }}
                    </td>
                    <td class="text-center">{{ $produk->stok }}</td>
                    <td class="text-center">
                        @if($produk->stok > 0)
                            <span class="badge-success">Tersedia</span>
                        @else
                            <span class="badge-danger">Habis</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada produk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        © {{ date('Y') }} TokoKita
    </div>

</body>
</html>