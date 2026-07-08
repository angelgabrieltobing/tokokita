@extends('layouts.app')

@section('title', 'Riwayat Peminjaman Saya')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Riwayat Peminjaman Saya</h2>
    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">
        + Pinjam Buku
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Durasi</th>
                    <th>Biaya</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($peminjamans as $item)  <!-- ← UBAH DI SINI -->
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->buku->judul }}</td>
                        <td>{{ $item->tanggal_pinjam->format('d M Y') }}</td>
                        <td>
                            @if($item->tanggal_kembali)
                                {{ $item->tanggal_kembali->format('d M Y') }}
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $item->durasi }} hari</td>
                        <td>
                            @if($item->biaya_sewa == 0)
                                <span class="badge bg-success">GRATIS</span>
                            @else
                                Rp {{ number_format($item->biaya_sewa, 0, ',', '.') }}
                            @endif
                        </td>
                        <td>
                            @if($item->status == 'Menunggu Konfirmasi')
                                <span class="badge bg-warning text-dark">{{ $item->status }}</span>
                            @elseif($item->status == 'Sedang Dipinjam')
                                <span class="badge bg-info">{{ $item->status }}</span>
                            @else
                                <span class="badge bg-success">{{ $item->status }}</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">
                            Belum ada peminjaman.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection