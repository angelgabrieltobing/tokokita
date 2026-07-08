<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // Memberi tahu Laravel bahwa Model ini untuk Table 'produks'
    protected $table = 'produks';

    // Mass Assignment: Mendaftarkan kolom-kolom yang DIIZINKAN untuk diisi dari form
    protected $fillable = [
        'nama_produk',
        // 'kategori',  // ← DIHAPUS (kolom tidak ada di database)
        'harga',
        'deskripsi',
        'stok',
        'gambar_produk'
    ];

    // Accessor untuk URL gambar
    public function getGambarUrlAttribute()
    {
        if ($this->gambar_produk) {
            return asset('storage/' . $this->gambar_produk);
        }
        return asset('images/default-product.jpg');
    }
}