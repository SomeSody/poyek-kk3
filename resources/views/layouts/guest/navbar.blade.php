<nav class="navbar navbar-expand-lg bg-primary navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
    <a href="#" class="navbar-brand ms-3 d-lg-none">MENU</a>
    <button type="button" class="navbar-toggler me-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav me-auto p-3 p-lg-0">
            <!-- Beranda -->
            <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>

            <!-- Tentang -->
            <a href="{{ route('about') }}" class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">Tentang</a>

            <!-- Data Dropdown -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ request()->routeIs('warga.*') || request()->routeIs('jenis-surat.*') || request()->routeIs('permohonan-surat.*') || request()->routeIs('user.*') ? 'active' : '' }}" data-bs-toggle="dropdown">Data</a>
                <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                    <a href="{{ route('warga.index') }}" class="dropdown-item {{ request()->routeIs('warga.*') ? 'active' : '' }}">Data Warga</a>
                    <a href="{{ route('jenis-surat.index') }}" class="dropdown-item {{ request()->routeIs('jenis-surat.*') ? 'active' : '' }}">Data Jenis Surat</a>
                    <a href="{{ route('permohonan-surat.index') }}" class="dropdown-item {{ request()->routeIs('permohonan-surat.*') ? 'active' : '' }}">Data Permohonan Surat</a>
                    <a href="{{ route('user.index') }}" class="dropdown-item {{ request()->routeIs('user.*') ? 'active' : '' }}">Data User</a>
                </div>
            </div>

            <!-- Tambah Data Dropdown -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Tambah Data</a>
                <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                    <a href="{{ route('warga.create') }}" class="dropdown-item">Tambah Warga</a>
                    <a href="{{ route('jenis-surat.create') }}" class="dropdown-item">Tambah Jenis Surat</a>
                    <a href="{{ route('permohonan-surat.create') }}" class="dropdown-item">Tambah Permohonan Surat</a>
                    <a href="{{ route('user.create') }}" class="dropdown-item">Tambah User</a>
                </div>
            </div>
        </div>
        <a href="#" class="btn btn-sm btn-light rounded-pill py-2 px-4 d-none d-lg-block">Login</a>
    </div>
</nav>
