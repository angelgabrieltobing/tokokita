<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Produk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuku = Buku::count();
        $totalProduk = Produk::count();
        $bukuTerbaru = Buku::latest()->take(5)->get();
        $produkTerbaru = Produk::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalBuku',
            'totalProduk',
            'bukuTerbaru',
            'produkTerbaru'
        ));
    }
}