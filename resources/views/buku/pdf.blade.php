<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Buku</title>
    <style>
        /* CSS untuk PDF */
        body {
            font-family: 'Arial', 'Helvetica', sans-serif;
            font-size: 12px;
            padding: 20px;
            margin: 0;
        }
        
        h1 {
            text-align: center;
            color: #2c3e50;
            font-size: 24px;
            border-bottom: 3px solid #3498db;
            padding-bottom: 10px;
            margin-bottom: 5px;
        }
        
        .subtitle {
            text-align: center;
            color: #7f8c8d;
            font-size: 14px;
            margin-top: 0;
            margin-bottom: 20px;
        }
        
        .info {
            display: flex;
            justify-content: space-between;
            font-size: 11px;
            color: #555;
            margin-bottom: 15px;
            padding: 5px 0;
            border-bottom: 1px dashed #ddd;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        
        th {
            background-color: #3498db;
            color: white;
            padding: 10px 8px;
            text-align: left;
            font-size: 12px;
            font-weight: bold;
        }
        
        td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 11px;
        }
        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        tr:hover {
            background-color: #f5f5f5;
        }
        
        .text-center {
            text-align: center;
        }
        
        .text-right {
            text-align: right;
        }
        
        .text-muted {
            color: #7f8c8d;
        }
        
        .footer {
            position: fixed;
            bottom: 20px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 10px;
            color: #95a5a6;
            border-top: 1px solid #ecf0f1;
            padding-top: 10px;
        }
        
        .page-break {
            page-break-after: always;
        }
        
        .badge {
            background-color: #e74c3c;
            color: white;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 10px;
        }
        
        .stok-tersedia {
            background-color: #2ecc71;
            color: white;
            padding: 2px 8px;
            border-radius: 3px;
            font-size: 10px;
        }
        
        .stok-habis {
            background-color: #e74c3c;
            color: white;
            padding: 2px 8px;
            border-radius: 3px;
            font-size: 10px;
        }
    </style>
</head>
<body>
    <!-- HEADER -->
    <h1>Katalog Buku</h1>
    <div class="subtitle">Perpustakaan Digital</div>
    
    <!-- INFORMASI CETAK -->
    <div class="info">
        <div>
            <strong>Total Buku:</strong> {{ count($bukus) }} judul
        </div>
        <div>
            <strong>Dicetak pada:</strong> {{ \Carbon\Carbon::now()->translatedFormat('d F Y H:i') }}
        </div>
        <div>
            <strong>Di cetak oleh:</strong> {{ Auth::check() ? Auth::user()->name : 'Sistem' }}
        </div>
    </div>
    
    <!-- TABEL DATA BUKU -->
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="30%">Judul Buku</th>
                <th width="20%">Pengarang</th>
                <th width="15%">Tahun Terbit</th>
                <th width="30%">Sinopsis</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bukus as $index => $buku)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td><strong>{{ $buku->judul }}</strong></td>
                    <td>{{ $buku->pengarang }}</td>
                    <td class="text-center">{{ $buku->tahun_terbit }}</td>
                    <td>{{ Str::limit($buku->sinopsis ?? '-', 80) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Tidak ada data buku
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <!-- STATISTIK -->
    @if(count($bukus) > 0)
    <div style="margin-top: 20px; font-size: 11px; color: #555;">
        <div style="display: inline-block; margin-right: 20px;">
            <strong>Total Buku:</strong> {{ count($bukus) }}
        </div>
    </div>
    @endif
    
    <!-- FOOTER -->
    <div class="footer">
        <p>
            Laporan ini dicetak secara otomatis oleh Sistem Katalog Buku
            <br>
            &copy; {{ date('Y') }} - Hak Cipta Dilindungi Undang-Undang
        </p>
    </div>
</body>
</html>