<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $fillable = [
        'user_id',
        'paket',
        'jumlah_sepatu',
        'layanan_tambahan',
        'total_biaya',
        'status'
    ];

    // Casting JSON ke Array
    protected $casts = [
        'layanan_tambahan' => 'array'
    ];

    // Relasi: Pesanan milik satu User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}