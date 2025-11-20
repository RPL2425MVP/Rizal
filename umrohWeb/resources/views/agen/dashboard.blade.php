<!-- resources/views/agen/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Dashboard Agen — Daftar Konsultasi</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Pesan</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($konsultasis as $k)
            <tr>
                <td>{{ $k->nama }}</td>
                <td>{{ $k->email }}</td>
                <td>{{ $k->no_hp }}</td>
                <td>{{ Str::limit($k->pesan, 50) }}</td>
                <td>{{ $k->tanggal->format('d M Y') }}</td>
                <td>
                    <span class="badge bg-{{ 
                        $k->status === 'responded' ? 'success' : 
                        ($k->status === 'not_responded' ? 'danger' : 'warning') 
                    }}">
                        {{ ucfirst($k->status) }}
                    </span>
                </td>
                <td>
                    <form action="{{ route('agen.update.status', $k->id) }}" method="POST">
                        @csrf @method('PUT')
                        <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="pending" {{ $k->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="responded" {{ $k->status === 'responded' ? 'selected' : '' }}>Responded</option>
                            <option value="not_responded" {{ $k->status === 'not_responded' ? 'selected' : '' }}>Not Responded</option>
                        </select>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada konsultasi.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection