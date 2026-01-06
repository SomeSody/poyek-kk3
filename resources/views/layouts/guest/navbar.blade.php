<nav class="navbar navbar-expand-lg bg-primary navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
    <a href="#" class="navbar-brand ms-3 d-lg-none">MENU</a>
    <button type="button" class="navbar-toggler me-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav me-auto p-3 p-lg-0">
            <!-- Beranda -->
            <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
            <a href="{{ route('jenis_surat.index') }}" class="nav-item nav-link {{ request()->routeIs('jenis_surat.*') ? 'active' : '' }}">Data Jenis Surat</a>
            <a href="{{ route('permohonans.index') }}" class="nav-item nav-link {{ request()->routeIs('permohonans.*') ? 'active' : '' }}">Data Permohonan Surat</a>
            <a href="{{ route('berkas.index') }}" class="nav-item nav-link {{ request()->routeIs('berkas.*') ? 'active' : '' }}">Data Berkas</a>
            <a href="{{ route('riwayats.index') }}" class="nav-item nav-link {{ request()->routeIs('riwayat.*') ? 'active' : '' }}">Riwayat</a>
        </div>
    </div>
</nav>