@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Dashboard Admin</h2>
    <p>Halo, {{ Auth::user()->name }}!</p>
</div>
@endsection