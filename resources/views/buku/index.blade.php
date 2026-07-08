<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
    <!-- CDN BOOTSTRAP DIHAPUS, PAKAI VITE -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

            <h4 class="mb-0">Data Buku</h4>

            <div>

                @guest
                    <a href="{{ route('login') }}" class="btn btn-light">
                        Login
                    </a>
                @endguest

                @auth

                    @can('isPustakawan')
                    <a href="{{ route('buku.create') }}" class="btn btn-light">
                        + Tambah Buku
                    </a>
                    @endcan

                    <a href="{{ route('buku.export.pdf') }}" class="btn btn-success">
                        Export PDF
                    </a>

                    <form action="{{ route('logout') }}"
                          method="POST"
                          class="d-inline">
                        @csrf
                        <button class="btn btn-danger">
                            Logout
                        </button>
                    </form>

                @endauth

            </div>

        </div>

        <div class="card-body">

            {{-- Sapaan User --}}
            @auth

                @if(Auth::user()->role == 'pustakawan')
                    <div class="alert alert-success">
                        Halo Pustakawan,
                        <strong>{{ Auth::user()->name }}</strong>
                    </div>
                @endif

                @if(Auth::user()->role == 'anggota')
                    <div class="alert alert-info">
                        Halo Anggota,
                        <strong>{{ Auth::user()->name }}</strong>
                    </div>
                @endif

            @endauth

            {{-- Flash Message Success --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert">
                    </button>
                </div>
            @endif

            {{-- Flash Message Error --}}
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}
                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert">
                    </button>
                </div>
            @endif

            @if($bukus->count() > 0)

            <div class="row">
                @foreach($bukus as $buku)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">

                        {{-- TAMPILKAN GAMBAR DENGAN PLACEHOLDER --}}
                        @if($buku->sampul_buku)
                            <img src="{{ asset('storage/' . $buku->sampul_buku) }}" 
                                 class="card-img-top" 
                                 alt="{{ $buku->judul }}" 
                                 style="height: 250px; object-fit: cover; width: 100%;">
                        @else
                            <img src="https://via.placeholder.com/300x250?text=Tidak+Ada+Sampul" 
                                 class="card-img-top" 
                                 alt="Tidak Ada Sampul" 
                                 style="height: 250px; object-fit: cover; width: 100%;">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $buku->judul }}</h5>
                            <p class="card-text">
                                <strong>Pengarang:</strong> {{ $buku->pengarang }}<br>
                                <strong>Tahun:</strong> {{ $buku->tahun }}  <!-- ✅ PAKAI 'tahun' -->
                            </p>

                            <!-- ========================================== -->
                            <!-- TAMBAHKAN LABEL SINOPSIS                 -->
                            <!-- ========================================== -->
                            <p class="card-text text-muted small">
                                <strong>Sinopsis:</strong> 
                                @if($buku->sinopsis)
                                    {{ Str::limit($buku->sinopsis, 100) }}
                                @else
                                    <em>Tidak ada sinopsis</em>
                                @endif
                            </p>

                        </div>

                        @can('isPustakawan')
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('buku.edit', $buku->id) }}" 
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('buku.destroy', $buku->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus buku ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm">
                                    Hapus
                                </button>

                            </form>
                        </div>
                        @endcan

                    </div>
                </div>
                @endforeach
            </div>

            {{-- TAMPILKAN JUMLAH DATA --}}
            <div class="mt-3 text-muted small">
                Menampilkan {{ $bukus->count() }} data buku
            </div>

            @else

                <div class="alert alert-info text-center">
                    Data buku masih kosong.
                </div>

            @endif

        </div>

    </div>

</div>

<!-- CDN BOOTSTRAP JS DIHAPUS, PAKAI VITE -->

</body>
</html>