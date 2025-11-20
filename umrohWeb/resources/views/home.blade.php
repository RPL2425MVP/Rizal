@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <!-- Banner Hero -->
    @if($banner)
    <div class="position-relative rounded mb-5 overflow-hidden" style="height: 300px; background: url('{{ asset('images/jamaah-.webp') }}') center/cover no-repeat;">
        <!-- Overlay gelap -->
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-75"></div>
        
        <!-- Teks di tengah -->
        <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-3">
            <h1 class="display-5 fw-bold">{{ $banner->judul_banner }}</h1>
            <p class="lead fs-5">{{ $banner->keterangan ?? 'Paket umroh terbaik untuk Anda' }}</p>
        </div>
    </div>
    @endif

    <!-- Paket Umroh -->
    <section class="mb-5">
        <h2 class="text-center mb-4">Paket Umroh</h2>
        <div class="row">
            @forelse($packages as $package)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <!-- Gambar Paket -->
                    <img src="{{ $package->gambar ? asset('images/back haji.jpg' . $package->gambar) : 'https://via.placeholder.com/300x200?text=No+Image' }}"
                         class="card-img-top"
                         alt="{{ $package->nama_paket }}"
                         style="height: 200px; object-fit: cover;">

                    <div class="card-body">
                        <h5 class="card-title">{{ $package->nama_paket }}</h5>
                        <p class="card-text">
                            <strong>Harga:</strong> Rp {{ number_format($package->harga, 0, ',', '.') }}<br>
                            <strong>Durasi:</strong> {{ $package->durasi }}<br>
                            <strong>Fasilitas:</strong> {{ Str::limit($package->fasilitas, 60) }}
                        </p>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info">Belum ada paket umroh tersedia.</div>
            </div>
            @endforelse
        </div>
    </section>

    <!-- FAQ -->
    <section class="mb-5">
        <h2 class="text-center mb-4">Pertanyaan Umum (FAQ)</h2>
        <div class="accordion" id="faqAccordion">
            @forelse($faqs as $index => $faq)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $index }}">
                    <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                        {{ $faq->pertanyaan }}
                    </button>
                </h2>
                <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        {{ $faq->jawaban }}
                    </div>
                </div>
            </div>
            @empty
            <div class="alert alert-info">Belum ada FAQ.</div>
            @endforelse
        </div>
    </section>

    <!-- Form Konsultasi -->
    <section class="mb-5">
        <h2 class="text-center mb-4">Konsultasi Gratis</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('konsultasi.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">Nomor WhatsApp</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                    </div>
                    <div class="mb-3">
                        <label for="pesan" class="form-label">Pesan</label>
                        <textarea class="form-control" id="pesan" name="pesan" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Kirim Konsultasi</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Kontak -->
    @if($contact)
    <footer class="text-center py-4 border-top">
        <p>
             {{ $contact->telepon }} | 📧 {{ $contact->email }}<br>
         {{ $contact->alamat }}
        </p>
    </footer>
    @endif
</div>
@endsection