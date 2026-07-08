<?php

namespace App\Http\Controllers\Api;  // ← NAMESPACE HARUS INI

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Http\Resources\BukuResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuApiController extends Controller  // ← CLASS NAME HARUS INI
{
    public function index()
    {
        $buku = Buku::all();
        return BukuResource::collection($buku);
    }

    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        return new BukuResource($buku);
    }
}