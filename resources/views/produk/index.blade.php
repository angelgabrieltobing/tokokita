@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
    <!-- Header Halaman dan Tombol Tambah -->
    <div class="d-flex justify-content-between align-items-center mb-4 mt-2">
        <h1 class="h3 mb-0">Daftar Produk Tersedia</h1>

        @auth
            @if(Auth::user()->role == 'admin_produk')
                <div>
                    <a href="{{ route('produk.create') }}" class="btn btn-primary">
                        + Tambah Produk
                    </a>
                    <a href="{{ route('produk.export.pdf') }}" class="btn btn-success">
                        Export PDF
                    </a>
                    <a href="{{ route('buku.index') }}" class="btn btn-info">
                        Buku
                    </a>
                </div>
            @endif
        @endauth
    </div>

    <!-- Flash Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Grid Produk -->
    <div class="row">
        @forelse($produks as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <!-- Gambar Produk -->
                    <img src="{{ $item->gambar_url }}" 
                         class="card-img-top" 
                         alt="{{ $item->nama_produk }}" 
                         style="height: 200px; object-fit: cover;">

                    <div class="card-body">

                        <!-- Informasi Produk -->
                        <h5 class="card-title fw-bold">{{ $item->nama_produk }}</h5>

                        <p class="card-text">
                            <!-- KATEGORI DIHAPUS -->
                            <strong>Harga:</strong> 
                            <span class="text-primary fw-bold">
                                Rp {{ number_format($item->harga, 0, ',', '.') }}
                            </span><br>
                            <strong>Stok:</strong> 
                            @if($item->stok > 0)
                                <span class="text-success">{{ $item->stok }} Tersedia</span>
                            @else
                                <span class="text-danger">Habis</span>
                            @endif
                        </p>

                        <p class="card-text text-muted small">
                            {{ \Illuminate\Support\Str::limit($item->deskripsi, 100) }}
                        </p>

                        <!-- Tombol CRUD hanya untuk Admin Produk -->
                        @auth
                            @if(Auth::user()->role == 'admin_produk')
                                <div class="mt-3 pt-3 border-top d-flex justify-content-between">
                                    <a href="{{ route('produk.edit', $item->id) }}" 
                                       class="btn btn-warning btn-sm w-50 me-2">
                                        Edit
                                    </a>

                                    <form action="{{ route('produk.destroy', $item->id) }}" 
                                          method="POST" 
                                          class="w-50"
                                          onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm w-100">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            @endif
                        @endauth

                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Belum ada produk. Tambahkan produk pertama!
                </div>
            </div>
        @endforelse
    </div>
@endsection