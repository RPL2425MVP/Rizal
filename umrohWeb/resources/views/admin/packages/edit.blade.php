@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Paket: {{ $package->nama_paket }}</h2>

    <form action="{{ route('packages.update', $package) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama Paket</label>
            <input type="text" name="nama_paket" class="form-control" value="{{ $package->nama_paket }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ $package->harga }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Durasi</label>
            <input type="text" name="durasi" class="form-control" value="{{ $package->durasi }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Fasilitas</label>
            <textarea name="fasilitas" class="form-control" rows="4" required>{{ $package->fasilitas }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="5" required>{{ $package->deskripsi }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Perbarui Paket</button>
        <a href="{{ route('packages.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection