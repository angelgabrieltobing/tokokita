@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
<div class="row mt-4">
    <div class="col-md-8 mx-auto">
        <div class="card shadow-sm border-warning">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">Edit Produk: {{ $produk->nama_produk }}</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Nama Produk -->
                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text"
                               name="nama_produk"
                               value="{{ old('nama_produk', $produk->nama_produk) }}"
                               class="form-control @error('nama_produk') is-invalid @enderror"
                               required>

                        @error('nama_produk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Harga -->
                    <div class="mb-3">
                        <label class="form-label">Harga (Rp)</label>
                        <input type="number"
                               name="harga"
                               value="{{ old('harga', $produk->harga) }}"
                               class="form-control @error('harga') is-invalid @enderror"
                               required>

                        @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi"
                                  class="form-control @error('deskripsi') is-invalid @enderror"
                                  rows="3">{{ old('deskripsi', $produk->deskripsi) }}</textarea>

                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Stok -->
                    <div class="mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number"
                               name="stok"
                               value="{{ old('stok', $produk->stok) }}"
                               class="form-control @error('stok') is-invalid @enderror">

                        @error('stok')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Gambar Saat Ini -->
                    <div class="mb-3">
                        <label class="form-label">Gambar Saat Ini</label>
                        <div>
                            @if($produk->gambar_produk)
                                <img src="{{ asset('storage/' . $produk->gambar_produk) }}" 
                                     alt="{{ $produk->nama_produk }}" 
                                     width="150" 
                                     class="img-thumbnail">
                            @else
                                <span class="text-muted">Tidak ada gambar</span>
                            @endif
                        </div>
                    </div>

                    <!-- Ganti Gambar -->
                    <div class="mb-3">
                        <label class="form-label">Ganti Gambar</label>
                        <input type="file"
                               name="gambar_produk"
                               accept="image/*"
                               class="form-control @error('gambar_produk') is-invalid @enderror">

                        @error('gambar_produk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <small class="text-muted">
                            Format: JPEG, PNG, JPG (Max 2MB)
                        </small>
                    </div>

                    <button type="submit" class="btn btn-warning text-dark fw-bold">
                        Simpan Perubahan
                    </button>

                    <a href="{{ route('produk.index') }}" class="btn btn-secondary">
                        Batal
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection