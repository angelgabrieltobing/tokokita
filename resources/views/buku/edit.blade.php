<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow col-md-8 mx-auto">

        <div class="card-header bg-warning">
            <h4>Edit Buku</h4>
        </div>

        <div class="card-body">

            {{-- TAMPILKAN SEMUA ERROR --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- FLASH MESSAGE SUKSES --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- FORM DENGAN enctype="multipart/form-data" -->
            <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- JUDUL -->
                <div class="mb-3">
                    <label class="form-label">Judul Buku <span class="text-danger">*</span></label>
                    <input
                        type="text"
                        name="judul"
                        value="{{ old('judul', $buku->judul) }}"
                        class="form-control @error('judul') is-invalid @enderror"
                        placeholder="Masukkan judul buku">

                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- PENGARANG -->
                <div class="mb-3">
                    <label class="form-label">Pengarang <span class="text-danger">*</span></label>
                    <input
                        type="text"
                        name="pengarang"
                        value="{{ old('pengarang', $buku->pengarang) }}"
                        class="form-control @error('pengarang') is-invalid @enderror"
                        placeholder="Masukkan nama pengarang">

                    @error('pengarang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- TAHUN TERBIT -->
                <div class="mb-3">
                    <label class="form-label">Tahun Terbit <span class="text-danger">*</span></label>
                    <input
                        type="number"
                        name="tahun"
                        value="{{ old('tahun', $buku->tahun) }}"
                        class="form-control @error('tahun') is-invalid @enderror"
                        placeholder="Contoh: 2024"
                        min="1900"
                        max="{{ date('Y') }}">

                    @error('tahun')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- SINOPSIS -->
                <div class="mb-3">
                    <label class="form-label">Sinopsis</label>
                    <textarea
                        name="sinopsis"
                        rows="4"
                        class="form-control @error('sinopsis') is-invalid @enderror"
                        placeholder="Tulis sinopsis buku">{{ old('sinopsis', $buku->sinopsis) }}</textarea>

                    @error('sinopsis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- ========================================== -->
                <!-- PREVIEW & INFORMASI SAMPUL SAAT INI       -->
                <!-- ========================================== -->
                <div class="mb-3">
                    <label class="form-label">Sampul Saat Ini</label>
                    <div class="d-flex align-items-center gap-3">
                        @if($buku->sampul_buku)
                            <img src="{{ asset('storage/' . $buku->sampul_buku) }}" 
                                 alt="Sampul {{ $buku->judul }}" 
                                 width="150" 
                                 class="img-thumbnail">
                            <div>
                                <span class="badge bg-success">Ada</span>
                                <br>
                                <small class="text-muted">
                                    Nama file: {{ basename($buku->sampul_buku) }}
                                </small>
                                <br>
                                <small class="text-muted">
                                    Ukuran: 
                                    @php
                                        $size = Storage::disk('public')->size($buku->sampul_buku);
                                        if ($size < 1024) {
                                            echo $size . ' B';
                                        } elseif ($size < 1048576) {
                                            echo round($size / 1024, 2) . ' KB';
                                        } else {
                                            echo round($size / 1048576, 2) . ' MB';
                                        }
                                    @endphp
                                </small>
                            </div>
                        @else
                            <span class="text-muted">Tidak ada sampul</span>
                        @endif
                    </div>
                </div>

                <!-- ========================================== -->
                <!-- INPUT FILE UNTUK GANTI SAMPUL              -->
                <!-- ========================================== -->
                <div class="mb-3">
                    <label class="form-label">Ganti Sampul</label>
                    <input type="file"
                           name="sampul_buku"
                           accept="image/*"
                           class="form-control @error('sampul_buku') is-invalid @enderror">

                    @error('sampul_buku')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <small class="text-muted">
                        Format: JPEG, PNG, JPG, GIF (Maksimal 2MB)
                    </small>
                    <br>
                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengubah sampul
                    </small>
                </div>

                <!-- ========================================== -->
                <!-- TAMBAHKAN OPSI HAPUS SAMPUL               -->
                <!-- ========================================== -->
                @if($buku->sampul_buku)
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hapus_sampul" id="hapus_sampul" value="1">
                        <label class="form-check-label text-danger" for="hapus_sampul">
                            Hapus sampul buku ini
                        </label>
                    </div>
                    <small class="text-muted">
                        Centang jika ingin menghapus sampul tanpa mengganti dengan yang baru
                    </small>
                </div>
                @endif

                <!-- ========================================== -->
                <!-- TOMBOL AKSI                                -->
                <!-- ========================================== -->
                <button type="submit" class="btn btn-warning">
                    Update Buku
                </button>

                <a href="{{ route('buku.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </form>

        </div>
    </div>
</div>

<!-- BOOTSTRAP JS UNTUK ALERT DISMISSIBLE -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>