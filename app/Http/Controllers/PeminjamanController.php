<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | BAGIAN 1: FITUR ANGGOTA (CUSTOMER)
    |--------------------------------------------------------------------------
    */

    // 1. Menampilkan halaman daftar peminjaman anggota
    public function index()
    {
        // Hanya anggota yang bisa melihat riwayat peminjaman
        if (Auth::user()->role != 'anggota') {
            return redirect('/')->with('error', 'Hanya anggota yang bisa melihat riwayat peminjaman!');
        }

        $peminjamans = Peminjaman::where('user_id', Auth::id())
            ->with('buku')
            ->latest()
            ->get();

        return view('peminjaman.index', compact('peminjamans'));
    }

    // 2. Menampilkan form peminjaman baru (pilih buku & durasi)
    public function create()
    {
        // Hanya anggota yang bisa meminjam buku
        if (Auth::user()->role != 'anggota') {
            return redirect('/')->with('error', 'Hanya anggota yang bisa meminjam buku!');
        }

        $bukus = Buku::all();
        return view('peminjaman.create', compact('bukus'));
    }

    // 3. Memproses peminjaman dan menghitung biaya sewa
    public function store(Request $request)
    {
        // Hanya anggota yang bisa meminjam buku
        if (Auth::user()->role != 'anggota') {
            return redirect('/')->with('error', 'Hanya anggota yang bisa meminjam buku!');
        }

        $request->validate([
            'buku_id' => 'required|exists:bukus,id',
            'durasi' => 'required|integer|min:1',
        ]);

        $durasi = $request->durasi;
        $biayaSewa = Peminjaman::hitungBiayaSewa($durasi);

        // Cek apakah buku sedang dipinjam
        $isDipinjam = Peminjaman::where('buku_id', $request->buku_id)
            ->whereIn('status', ['Menunggu Konfirmasi', 'Sedang Dipinjam'])
            ->exists();

        if ($isDipinjam) {
            return redirect()->back()
                ->with('error', 'Buku ini sedang dipinjam oleh orang lain!');
        }

        Peminjaman::create([
            'user_id' => Auth::id(),
            'buku_id' => $request->buku_id,
            'durasi' => $durasi,
            'biaya_sewa' => $biayaSewa,
            'status' => 'Menunggu Konfirmasi',
            'tanggal_pinjam' => now(),
            'tanggal_kembali' => null,
        ]);

        return redirect('/peminjaman')
            ->with('success', "Peminjaman berhasil! Biaya sewa: Rp " . number_format($biayaSewa, 0, ',', '.'));
    }

    /*
    |--------------------------------------------------------------------------
    | BAGIAN 2: FITUR PUSTAKAWAN (ADMIN)
    |--------------------------------------------------------------------------
    */

    // 4. Menampilkan semua peminjaman dari semua anggota
    public function adminIndex()
    {
        // Hanya pustakawan yang bisa mengelola peminjaman
        if (Auth::user()->role != 'pustakawan') {
            return redirect('/')->with('error', 'Hanya pustakawan yang bisa mengelola peminjaman!');
        }

        $peminjamans = Peminjaman::with(['user', 'buku'])
            ->latest()
            ->get();

        return view('peminjaman.admin', compact('peminjamans'));
    }

    // 5. Mengubah status peminjaman
    public function updateStatus(Request $request, $id)
    {
        // Hanya pustakawan yang bisa update status
        if (Auth::user()->role != 'pustakawan') {
            return redirect('/')->with('error', 'Hanya pustakawan yang bisa mengubah status peminjaman!');
        }

        $request->validate([
            'status' => 'required|in:Menunggu Konfirmasi,Sedang Dipinjam,Sudah Dikembalikan',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);

        $data = ['status' => $request->status];

        if ($request->status == 'Sudah Dikembalikan') {
            $data['tanggal_kembali'] = now();
        }

        $peminjaman->update($data);

        return redirect()->back()
            ->with('success', 'Status peminjaman berhasil diperbarui!');
    }
}