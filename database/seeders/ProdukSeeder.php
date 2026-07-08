<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        // Data produk sesuai dengan yang ada di aplikasi TokoKita
        $produk = [
            [
                'nama_produk' => 'Tumbler',
                'harga' => 350000,
                'stok' => 8,
                'deskripsi' => 'bagus dan kece'
            ],
            [
                'nama_produk' => 'Sandal',
                'harga' => 50000,
                'stok' => 10,
                'deskripsi' => 'sendal anti air'
            ],
            [
                'nama_produk' => 'Laptop Asus',
                'harga' => 5000000,
                'stok' => 25,
                'deskripsi' => 'laptop terbaru dan bagus'
            ],
            [
                'nama_produk' => 'kipas angin mini',
                'harga' => 50000,
                'stok' => 15,
                'deskripsi' => 'angin kencang seperti badai'
            ],
            [
                'nama_produk' => 'Tas ransel',
                'harga' => 250000,
                'stok' => 40,
                'deskripsi' => 'kuat dan ringan'
            ],
            [
                'nama_produk' => 'Topi',
                'harga' => 60000,
                'stok' => 35,
                'deskripsi' => 'anti terbang'
            ],
        ];

        // Insert data ke database
        foreach ($produk as $item) {
            Produk::create($item);
        }
    }
}