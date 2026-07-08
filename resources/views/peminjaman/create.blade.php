@extends('layouts.app')

@section('title', 'Form Peminjaman Buku')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Form Peminjaman Buku</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('peminjaman.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Pilih Buku</label>
                        <select name="buku_id" class="form-select" required>
                            <option value="">-- Pilih Buku --</option>
                            @foreach($bukus as $buku)
                                <option value="{{ $buku->id }}">
                                    {{ $buku->judul }} - {{ $buku->pengarang }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Durasi Peminjaman (Hari)</label>
                        <input type="number" name="durasi" class="form-control" 
                               value="1" min="1" required>
                        <small class="text-muted">
                            ⚠️ ≤ 3 hari = GRATIS | > 3 hari = Rp 2.000/hari ekstra
                        </small>
                    </div>

                    <button type="submit" class="btn btn-success w-100 fw-bold">
                        Ajukan Peminjaman
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection