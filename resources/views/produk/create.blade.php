@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="row mt-4">
    <div class="col-md-8 mx-auto">
        <div class="card shadow-sm">

            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Tambah Produk Baru</h4>
            </div>

            <div class="card-body">

                {{-- TAMBAHKAN enctype="multipart/form-data" --}}
                <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <!-- Nama Produk -->
                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text"
                               name="nama_produk"
                               value="{{ old('nama_produk') }}"
                               class="form-control @error('nama_produk') is-invalid @enderror">

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
                               value="{{ old('harga') }}"
                               class="form-control @error('harga') is-invalid @enderror">

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
                                  rows="3"
                                  class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>

                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Stok -->
                    <div class="mb-3">
                        <label class="form-label">Stok Awal</label>
                        <input type="number"
                               name="stok"
                               value="{{ old('stok', 0) }}"
                               class="form-control @error('stok') is-invalid @enderror">

                        @error('stok')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- ========================================== -->
                    <!-- TAMBAHKAN UPLOAD GAMBAR                    -->
                    <!-- ========================================== -->
                    <div class="mb-3">
                        <label class="form-label">Gambar Produk</label>
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

                    <button type="submit" class="btn btn-success">
                        Simpan Data
                    </button>

                    <a href="{{ route('produk.index') }}" class="btn btn-secondary">
                        Batal / Kembali
                    </a>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection