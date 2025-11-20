<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #1A2A4F;">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
    <img src="{{ asset('images/logo haji.png') }}" 
         alt="Haji & Umrah" 
         style="height: 50px;">
</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('paket.index') ? 'active' : '' }}" href="{{ route('paket.index') }}">Paket</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('faq.index') ? 'active' : '' }}" href="{{ route('faq.index') }}">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kontak</a>
                </li>
            </ul>

            <!-- HANYA TAMPILKAN DROPDOWN LOGIN JIKA BELUM LOGIN -->
            @guest
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Login
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('login') }}">Masuk sebagai Admin/Agen</a></li>
                        </ul>
                    </li>
                </ul>
            @else
                <!-- JIKA SUDAH LOGIN, TAMPILKAN NAMA USER & DASHBOARD -->
                <ul class="navbar-nav ms-auto">
                    @if(Auth::user()->isAdmin())
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
                        </li>
                    @elseif(Auth::user()->isAgen())
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('agen.dashboard') ? 'active' : '' }}" href="{{ route('agen.dashboard') }}">Dashboard Agen</a>
                        </li>
                    @endif

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            @endguest
        </div>
    </div>
</nav>