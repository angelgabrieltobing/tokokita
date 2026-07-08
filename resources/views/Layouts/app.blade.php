<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') - TokoKita</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-light">

    <!-- Navbar Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">TokoKita</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/produk">Produk</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/buku">Buku</a>
                    </li>

                    <!-- ========================================== -->
                    <!-- MENU PEMINJAMAN (UNTUK SEMUA YANG LOGIN)  -->
                    <!-- ========================================== -->
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/peminjaman">Peminjaman</a>
                        </li>
                    @endauth

                    <!-- ========================================== -->
                    <!-- MENU MANAJEMEN PEMINJAMAN (PUSTAKAWAN)    -->
                    <!-- ========================================== -->
                    @can('isPustakawan')
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/peminjaman">Manajemen Peminjaman</a>
                        </li>
                    @endcan

                    <li class="nav-item">
                        <a class="nav-link" href="/tentang">Tentang</a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item">
                            <form action="/logout" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm mt-1">
                                    Logout ({{ Auth::user()->name }})
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                    @endauth
                </ul>

            </div>
        </div>
    </nav>

    <main class="container">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <strong>✅ Berhasil!</strong>
                {{ session('success') }}
                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Close">
                </button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <strong>❌ Gagal!</strong>
                {{ session('error') }}
                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Close">
                </button>
            </div>
        @endif

        @yield('content')

    </main>

    <footer class="text-center p-4 mt-5 text-muted border-top">
        &copy; {{ date('Y') }} TokoKita. Hak Cipta Dilindungi.
    </footer>

</body>
</html>