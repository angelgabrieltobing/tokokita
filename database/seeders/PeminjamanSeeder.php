<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Peminjaman;
use Carbon\Carbon;

class PeminjamanSeeder extends Seeder
{
    public function run(): void
    {
        $peminjamans = [
            [
                'user_id' => 2,
                'buku_id' => 1,
                'durasi' => 2,
                'biaya_sewa' => 0,
                'status' => 'Menunggu Konfirmasi',
                'tanggal_pinjam' => now(),
                'tanggal_kembali' => now()->addDays(2),  // ← TAMBAHKAN INI
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'buku_id' => 2,
                'durasi' => 5,
                'biaya_sewa' => 4000,
                'status' => 'Sedang Dipinjam',
                'tanggal_pinjam' => now()->subDays(3),
                'tanggal_kembali' => now()->addDays(2),  // ← TAMBAHKAN INI
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($peminjamans as $peminjaman) {
            Peminjaman::create($peminjaman);
        }
    }
}