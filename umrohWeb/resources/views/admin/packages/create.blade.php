@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Paket Baru</h2>

    <form action="{{ route('packages.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Paket</label>
            <input type="text" name="nama_paket" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Harga (angka saja)</label>
            <input type="number" name="harga" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Durasi</label>
            <input type="text" name="durasi" class="form-control" placeholder="Contoh: 9 Hari" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Fasilitas</label>
            <textarea name="fasilitas" class="form-control" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan Paket</button>
        <a href="{{ route('packages.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection