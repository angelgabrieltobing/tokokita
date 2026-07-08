<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PesananController;

/*
|--------------------------------------------------------------------------
| Halaman Awal - WELCOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Route Latihan
|--------------------------------------------------------------------------
*/

Route::get('/halo', function () {
    return 'Halo, Selamat Datang di Laravel 12!';
});

Route::get('/salam/{nama?}', function ($nama = 'Pengunjung') {
    return "Halo $nama!";
});

/*
|--------------------------------------------------------------------------
| Login & Logout
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Mahasiswa
|--------------------------------------------------------------------------
*/

Route::get('/mhsiswa', [MahasiswaController::class, 'index']);
Route::get('/mahasiswa/{nim}', [MahasiswaController::class, 'show']);
Route::get('/data-mahasiswa', [MahasiswaController::class, 'data']);

/*
|--------------------------------------------------------------------------
| Tentang
|--------------------------------------------------------------------------
*/

Route::get('/tentang', [TentangController::class, 'index']);

/*
|--------------------------------------------------------------------------
| Buku - Bisa Dilihat Semua Orang
|--------------------------------------------------------------------------
*/

Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');

// ⚠️ ROUTE SHOW DIPINDAHKAN KE DALAM MIDDLEWARE
// Route::get('/buku/{id}', [BukuController::class, 'show'])->name('buku.show');

Route::get('/buku/export/pdf', [BukuController::class, 'exportPdf'])->name('buku.export.pdf');

/*
|--------------------------------------------------------------------------
| Buku - Khusus Pustakawan
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:pustakawan'])->group(function () {

    Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
    Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');

    Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
    Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

    Route::get('/buku/{id}', [BukuController::class, 'show'])->name('buku.show');
});

/*
|--------------------------------------------------------------------------
| Produk - Bisa Dilihat Semua Orang
|--------------------------------------------------------------------------
*/

Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/export/pdf', [ProdukController::class, 'exportPdf'])->name('produk.export.pdf');

/*
|--------------------------------------------------------------------------
| Produk - Khusus Admin Produk
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin_produk'])->group(function () {

    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');

    Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

    Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');
});

/*
|--------------------------------------------------------------------------
| PEMINJAMAN BUKU
|--------------------------------------------------------------------------
*/

// HANYA ANGGOTA YANG BISA MEMINJAM
Route::middleware(['auth', 'role:anggota'])->group(function () {
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
    Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
});

// HANYA PUSTAKAWAN YANG BISA KELOLA PEMINJAMAN
Route::middleware(['auth', 'role:pustakawan'])->group(function () {
    Route::get('/admin/peminjaman', [PeminjamanController::class, 'adminIndex'])->name('admin.peminjaman.index');
    Route::put('/admin/peminjaman/{id}', [PeminjamanController::class, 'updateStatus'])->name('admin.peminjaman.update');
});

// ============================================
// Rute untuk Pelanggan (Customer)
// ============================================
Route::middleware('auth')->group(function () {
    Route::get('/pesanan', [PesananController::class, 'index']);
    Route::get('/pesanan/create', [PesananController::class, 'create']);
    Route::post('/pesanan', [PesananController::class, 'store']);
});

// ============================================
// Rute khusus untuk Administrator
// ============================================
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/pesanan', [PesananController::class, 'adminIndex']);
    Route::put('/admin/pesanan/{id}', [PesananController::class, 'updateStatus']);
});