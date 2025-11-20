@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Paket Umroh</h2>
        <a href="{{ route('packages.create') }}" class="btn btn-primary">Tambah Paket</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama Paket</th>
                <th>Harga</th>
                <th>Durasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($packages as $p)
            <tr>
                <td>{{ $p->nama_paket }}</td>
                <td>Rp {{ number_format($p->harga) }}</td>
                <td>{{ $p->durasi }}</td>
                <td>
                    <a href="{{ route('packages.edit', $p) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('packages.destroy', $p) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus paket ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection