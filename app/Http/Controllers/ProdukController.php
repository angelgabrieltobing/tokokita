<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('produk.index', compact('produks'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'nama_produk' => 'required|string|min:3|max:255',
                'harga' => 'required|numeric|min:1000',
                'deskripsi' => 'nullable|string',
                'stok' => 'required|integer|min:0',
                'gambar_produk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ],
            [
                'nama_produk.required' => 'Kolom nama produk tidak boleh kosong!',
                'nama_produk.min' => 'Nama produk minimal 3 karakter!',
                'nama_produk.max' => 'Nama produk maksimal 255 karakter!',
           
                'harga.required' => 'Harga wajib diisi!',
                'harga.numeric' => 'Harga harus berupa angka!',
                'harga.min' => 'Harga minimal Rp 1.000!',

                'stok.required' => 'Stok wajib diisi!',
                'stok.integer' => 'Stok harus berupa angka bulat!',
                'stok.min' => 'Stok tidak boleh kurang dari 0!',

                'gambar_produk.image' => 'File harus berupa gambar!',
                'gambar_produk.mimes' => 'Format gambar harus JPEG, PNG, atau JPG!',
                'gambar_produk.max' => 'Ukuran gambar maksimal 2MB!'
            ]
        );

        $data = $validatedData;

        if ($request->hasFile('gambar_produk')) {
            $file = $request->file('gambar_produk');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('produk', $namaFile, 'public');
            $data['gambar_produk'] = $path;
        }

        Produk::create($data);

        return redirect('/produk')
            ->with('success', 'Produk baru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $validatedData = $request->validate(
            [
                'nama_produk' => 'required|string|min:3|max:255',
                'harga' => 'required|numeric|min:1000',
                'deskripsi' => 'nullable|string',
                'stok' => 'required|integer|min:0',
                'gambar_produk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ],
            [
                'nama_produk.required' => 'Kolom nama produk tidak boleh kosong!',
                'nama_produk.min' => 'Nama produk minimal 3 karakter!',
                'nama_produk.max' => 'Nama produk maksimal 255 karakter!',
           
                'harga.required' => 'Harga wajib diisi!',
                'harga.numeric' => 'Harga harus berupa angka!',
                'harga.min' => 'Harga minimal Rp 1.000!',

                'stok.required' => 'Stok wajib diisi!',
                'stok.integer' => 'Stok harus berupa angka bulat!',
                'stok.min' => 'Stok tidak boleh kurang dari 0!',

                'gambar_produk.image' => 'File harus berupa gambar!',
                'gambar_produk.mimes' => 'Format gambar harus JPEG, PNG, atau JPG!',
                'gambar_produk.max' => 'Ukuran gambar maksimal 2MB!'
            ]
        );

        $data = $validatedData;

        if ($request->hasFile('gambar_produk')) {
            if ($produk->gambar_produk) {
                Storage::disk('public')->delete($produk->gambar_produk);
            }

            $file = $request->file('gambar_produk');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('produk', $namaFile, 'public');
            $data['gambar_produk'] = $path;
        }

        $produk->update($data);

        return redirect('/produk')
            ->with('success', 'Data produk berhasil diubah!');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->gambar_produk) {
            Storage::disk('public')->delete($produk->gambar_produk);
        }

        $produk->delete();

        return redirect('/produk')
            ->with('success', 'Data produk berhasil dihapus!');
    }

    public function exportPdf()
    {
        $produks = Produk::all();
        $pdf = Pdf::loadView('produk.pdf', compact('produks'));
        return $pdf->download('katalog-produk.pdf');
    }
}