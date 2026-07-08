<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow col-md-8 mx-auto">

        <div class="card-header bg-success text-white">
            <h4>Tambah Buku</h4>
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
            @endif  <!-- ✅ HAPUS HURUF 'A' DI SINI! -->

            {{-- FLASH MESSAGE SUKSES --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- FORM DENGAN enctype="multipart/form-data" -->
            <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- JUDUL -->
                <div class="mb-3">
                    <label class="form-label">Judul Buku <span class="text-danger">*</span></label>
                    <input type="text"
                           name="judul"
                           value="{{ old('judul') }}"
                           class="form-control @error('judul') is-invalid @enderror"
                           placeholder="Masukkan judul buku"
                           required>

                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- PENGARANG -->
                <div class="mb-3">
                    <label class="form-label">Pengarang <span class="text-danger">*</span></label>
                    <input type="text"
                           name="pengarang"
                           value="{{ old('pengarang') }}"
                           class="form-control @error('pengarang') is-invalid @enderror"
                           placeholder="Masukkan nama pengarang"
                           required>

                    @error('pengarang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- TAHUN TERBIT -->
                <div class="mb-3">
                    <label class="form-label">Tahun Terbit <span class="text-danger">*</span></label>
                    <input type="number"
                           name="tahun_terbit"
                           value="{{ old('tahun_terbit') }}"
                           class="form-control @error('tahun_terbit') is-invalid @enderror"
                           placeholder="Contoh: 2024"
                           min="1900"
                           max="{{ date('Y') }}"
                           required>

                    @error('tahun_terbit')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- SINOPSIS -->
                <div class="mb-3">
                    <label class="form-label">Sinopsis</label>
                    <textarea name="sinopsis"
                              rows="4"
                              class="form-control @error('sinopsis') is-invalid @enderror"
                              placeholder="Tulis sinopsis buku">{{ old('sinopsis') }}</textarea>

                    @error('sinopsis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- ========================================== -->
                <!-- INPUT FILE SAMPUL BUKU DENGAN PREVIEW     -->
                <!-- ========================================== -->
                <div class="mb-3">
                    <label class="form-label">Sampul Buku</label>
                    <input type="file"
                           name="sampul_buku"
                           accept="image/*"
                           class="form-control @error('sampul_buku') is-invalid @enderror"
                           id="sampul_buku"
                           onchange="previewImage(event)">

                    @error('sampul_buku')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <small class="text-muted">
                        Format: JPEG, PNG, JPG, GIF (Maksimal 2MB)
                    </small>

                    <!-- PREVIEW GAMBAR -->
                    <div id="preview-container" class="mt-2" style="display: none;">
                        <img id="preview-image" 
                             src="#" 
                             alt="Preview Sampul" 
                             style="max-height: 200px; max-width: 100%;" 
                             class="img-thumbnail">
                        <br>
                        <button type="button" 
                                class="btn btn-sm btn-danger mt-1" 
                                onclick="removeImage()">
                            Hapus Preview
                        </button>
                    </div>
                </div>

                <!-- TOMBOL AKSI -->
                <button type="submit" class="btn btn-success">
                    Simpan Buku
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

<!-- SCRIPT UNTUK PREVIEW GAMBAR -->
<script>
    function previewImage(event) {
        var reader = new FileReader();
        var previewContainer = document.getElementById('preview-container');
        var previewImage = document.getElementById('preview-image');
        
        reader.onload = function() {
            previewImage.src = reader.result;
            previewContainer.style.display = 'block';
        }
        
        if (event.target.files.length > 0) {
            reader.readAsDataURL(event.target.files[0]);
        }
    }
    
    function removeImage() {
        var fileInput = document.getElementById('sampul_buku');
        var previewContainer = document.getElementById('preview-container');
        var previewImage = document.getElementById('preview-image');
        
        fileInput.value = '';
        previewImage.src = '#';
        previewContainer.style.display = 'none';
    }
</script>

</body>
</html>