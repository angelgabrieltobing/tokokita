<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();
        return view('buku.index', compact('bukus'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        // ✅ VALIDASI - PAKAI 'tahun_terbit' (SESUAI FORM CREATE)
        $validated = $request->validate([
            'judul' => 'required|min:3',
            'pengarang' => 'required|min:3',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
            'sinopsis' => 'nullable|string',
            'sampul_buku' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        // Upload sampul
        if ($request->hasFile('sampul_buku')) {
            $path = $request->file('sampul_buku')->store('sampul_buku', 'public');
            $validated['sampul_buku'] = $path;
        }

        // ✅ ISI KOLOM 'tahun' (KARENA DATABASE PAKAI 'tahun')
        $validated['tahun'] = $request->tahun_terbit;

        // Simpan ke database
        Buku::create($validated);
        
        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.show', compact('buku'));
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        // ✅ VALIDASI - PAKAI 'tahun' (SESUAI FORM EDIT)
        $validated = $request->validate([
            'judul' => 'required|min:3',
            'pengarang' => 'required|min:3',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),  // <-- UBAH KE 'tahun'
            'sinopsis' => 'nullable|string',
            'sampul_buku' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        // ✅ HAPUS INI! (tidak perlu karena form sudah kirim 'tahun')
        // $validated['tahun'] = $request->tahun_terbit;

        if ($request->hasFile('sampul_buku')) {
            if ($buku->sampul_buku) {
                Storage::disk('public')->delete($buku->sampul_buku);
            }
            $path = $request->file('sampul_buku')->store('sampul_buku', 'public');
            $validated['sampul_buku'] = $path;
        }

        if ($request->has('hapus_sampul') && $request->hapus_sampul == 1) {
            if ($buku->sampul_buku) {
                Storage::disk('public')->delete($buku->sampul_buku);
                $buku->sampul_buku = null;
                $buku->save();
            }
        }

        $buku->update($validated);
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diupdate!');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        if ($buku->sampul_buku) {
            Storage::disk('public')->delete($buku->sampul_buku);
        }

        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus!');
    }

    public function exportPdf()
    {
        $bukus = Buku::all();
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('buku.pdf', compact('bukus'));
        return $pdf->download('Katalog-Buku-' . date('Y-m-d') . '.pdf');
    }
}