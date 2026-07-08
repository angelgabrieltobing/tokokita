<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BukuResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'judul' => $this->judul,
            'pengarang' => $this->pengarang,
            'tahun_terbit' => 'Tahun ' . ($this->tahun_terbit ?? '-'),
            'sinopsis' => $this->sinopsis ?? 'Tidak ada sinopsis',
            'sampul' => $this->sampul_buku ? asset('storage/' . $this->sampul_buku) : null,
            // created_at & updated_at TIDAK ditampilkan
        ];
    }
}