<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamans';

    protected $fillable = [
        'user_id',
        'buku_id',
        'durasi',
        'biaya_sewa',
        'status',
        'tanggal_pinjam',
        'tanggal_kembali',
    ];

    protected $casts = [
        'tanggal_pinjam' => 'date',
        'tanggal_kembali' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }

    // Fungsi untuk menghitung biaya sewa
    public static function hitungBiayaSewa($durasi)
    {
        if ($durasi <= 3) {
            return 0; // Gratis
        }
        return ($durasi - 3) * 2000; // Rp 2.000 per hari ekstra
    }
}