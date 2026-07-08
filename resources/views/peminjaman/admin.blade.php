@extends('layouts.app')

@section('title', 'Manajemen Peminjaman')

@section('content')
<h2 class="mb-4">Manajemen Peminjaman Buku</h2>

<div class="card shadow-sm">
    <div class="card-body p-0 table-responsive">
        <table class="table table-bordered table-hover mb-0 align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Peminjam</th>
                    <th>Buku</th>
                    <th>Durasi</th>
                    <th>Biaya</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($peminjamans as $item)  <!-- ← UBAH DI SINI -->
                <tr>
                    <td>#{{ $item->id }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->buku->judul }}</td>
                    <td>{{ $item->durasi }} hari</td>
                    <td>
                        @if($item->biaya_sewa == 0)
                            <span class="badge bg-success">GRATIS</span>
                        @else
                            Rp {{ number_format($item->biaya_sewa, 0, ',', '.') }}
                        @endif
                    </td>
                    <td>
                        <span class="badge 
                            @if($item->status == 'Menunggu Konfirmasi') bg-warning text-dark
                            @elseif($item->status == 'Sedang Dipinjam') bg-info
                            @else bg-success
                            @endif
                        ">
                            {{ $item->status }}
                        </span>
                    </td>
                    <td>
                        <form action="{{ route('admin.peminjaman.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status" class="form-select form-select-sm d-inline w-auto">
                                <option value="Menunggu Konfirmasi" {{ $item->status == 'Menunggu Konfirmasi' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                                <option value="Sedang Dipinjam" {{ $item->status == 'Sedang Dipinjam' ? 'selected' : '' }}>Sedang Dipinjam</option>
                                <option value="Sudah Dikembalikan" {{ $item->status == 'Sudah Dikembalikan' ? 'selected' : '' }}>Sudah Dikembalikan</option>
                            </select>
                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                        </form>
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