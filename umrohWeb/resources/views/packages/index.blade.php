@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Paket Umroh</h2>
    <a href="{{ route('packages.create') }}" class="btn btn-primary">Tambah Paket</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nama Paket</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Belum ada paket</td>
                <td>-</td>
                <td>-</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection