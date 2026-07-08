<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Http\Resources\ProdukResource;
use Illuminate\Http\Request;

class ProdukApiController extends Controller
{
    // GET /api/produk - Menampilkan semua produk
    public function index()
    {
        $produk = Produk::all();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Data semua produk berhasil diambil',
            'data' => ProdukResource::collection($produk)
        ], 200);
    }

    // GET /api/produk/{id} - Menampilkan satu produk
    public function show($id)
    {
        $produk = Produk::find($id);
        
        if (!$produk) {
            return response()->json([
                'status' => 'error',
                'message' => 'Produk tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data produk berhasil diambil',
            'data' => new ProdukResource($produk)
        ], 200);
    }

    // POST /api/produk - Menambah produk baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string'
        ]);

        $produk = Produk::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Produk berhasil ditambahkan',
            'data' => new ProdukResource($produk)
        ], 201);
    }

    // PUT /api/produk/{id} - Mengupdate produk
    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);
        
        if (!$produk) {
            return response()->json([
                'status' => 'error',
                'message' => 'Produk tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'nama_produk' => 'sometimes|string|max:255',
            'harga' => 'sometimes|integer|min:0',
            'stok' => 'sometimes|integer|min:0',
            'deskripsi' => 'nullable|string'
        ]);

        $produk->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Produk berhasil diupdate',
            'data' => new ProdukResource($produk)
        ], 200);
    }

    // DELETE /api/produk/{id} - Menghapus produk
    public function destroy($id)
    {
        $produk = Produk::find($id);
        
        if (!$produk) {
            return response()->json([
                'status' => 'error',
                'message' => 'Produk tidak ditemukan'
            ], 404);
        }

        $produk->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Produk berhasil dihapus'
        ], 200);
    }
}