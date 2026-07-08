<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('bukus')->truncate();

        $bukus = [
            [
                'judul' => 'Laskar Pelangi',
                'pengarang' => 'Andrea Hirata',
                'tahun' => 2005,              // ← PAKAI 'tahun'
                'sinopsis' => 'Kisah 10 anak Belitung yang berjuang untuk pendidikan.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'judul' => 'Bumi Manusia',
                'pengarang' => 'Pramoedya Ananta Toer',
                'tahun' => 1980,
                'sinopsis' => 'Kisah cinta di masa kolonial Belanda.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'judul' => 'Perahu Kertas',
                'pengarang' => 'Dee Lestari',
                'tahun' => 2009,
                'sinopsis' => 'Kisah persahabatan dan cinta di masa muda.',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        foreach ($bukus as $buku) {
            Buku::create($buku);
        }
    }
}