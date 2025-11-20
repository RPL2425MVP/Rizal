@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar FAQ</h2>
    <a href="{{ route('faqs.create') }}" class="btn btn-primary">Tambah FAQ</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Pertanyaan</th>
                <th>Jawaban</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Belum ada FAQ</td>
                <td>-</td>
                <td>-</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection