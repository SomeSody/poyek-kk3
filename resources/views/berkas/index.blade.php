@extends('layouts.guest.app')
@section('title', 'Data Berkas Persyaratan')

@section('content')
    <div class="container-xxl py-5" style="min-height: 70vh;">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Data</h6>
                <h1 class="display-6 mb-4">Berkas Persyaratan</h1>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Filter/Search -->
            <div class="row mb-4">
                <div class="col-lg-6 mx-auto">
                    <div class="input-group">
                        <input type="text" id="searchBox" class="form-control" placeholder="Cari berkas...">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Cards Grid -->
            <div class="row g-4" id="berkasContainer">
                @forelse($berkas as $item)
                    <div class="col-lg-4 col-md-6 wow fadeInUp berkas-item" data-wow-delay="0.1s">
                        <div class="card h-100 shadow-sm border-0 rounded-3 hover-lift">
                            <!-- Card Header dengan Status -->
                            <div class="card-header {{ $item->valid ? 'bg-success' : 'bg-warning' }} text-white py-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">
                                        <i class="fa fa-file-alt me-2"></i>Berkas
                                    </h5>
                                    @if($item->valid)
                                        <span class="badge bg-light text-success">
                                            <i class="fa fa-check-circle me-1"></i>Terverifikasi
                                        </span>
                                    @else
                                        <span class="badge bg-light text-warning">
                                            <i class="fa fa-clock me-1"></i>Menunggu
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body p-4">
                                <!-- ID Berkas -->
                                <div class="mb-3 pb-3 border-bottom">
                                    <small class="text-muted d-block mb-1">
                                        <i class="fa fa-hashtag me-1"></i>ID Berkas
                                    </small>
                                    <h6 class="mb-0 text-primary">#{{ $item->berkas_id }}</h6>
                                </div>

                                <!-- Nama Berkas -->
                                <div class="mb-3 pb-3 border-bottom">
                                    <small class="text-muted d-block mb-2">
                                        <i class="fa fa-file-alt me-1"></i>Nama Berkas
                                    </small>
                                    <h5 class="mb-0">{{ $item->nama_berkas }}</h5>
                                </div>

                                <!-- ID Permohonan -->
                                <div class="mb-3 pb-3 border-bottom">
                                    <small class="text-muted d-block mb-2">
                                        <i class="fa fa-folder me-1"></i>ID Permohonan
                                    </small>
                                    <span class="badge bg-secondary fs-6">{{ $item->permohonan_id }}</span>
                                </div>

                                <!-- Status Detail -->
                                <div class="mb-3">
                                    <small class="text-muted d-block mb-2">
                                        <i class="fa fa-info-circle me-1"></i>Status Validasi
                                    </small>
                                    @if($item->valid)
                                        <div class="alert alert-success mb-0 py-2">
                                            <i class="fa fa-check-circle me-2"></i>
                                            Berkas telah divalidasi dan dinyatakan <strong>VALID</strong>
                                        </div>
                                    @else
                                        <div class="alert alert-warning mb-0 py-2">
                                            <i class="fa fa-exclamation-triangle me-2"></i>
                                            Berkas sedang dalam proses validasi
                                        </div>
                                    @endif
                                </div>

                                <!-- Tanggal -->
                                <div class="text-muted small">
                                    <i class="fa fa-calendar me-1"></i>
                                    Dibuat: {{ $item->created_at->format('d M Y, H:i') }} WIB
                                </div>
                            </div>

                            <!-- Card Footer -->
                            <div class="card-footer bg-light border-0 py-3">
                                <a href="{{ route('berkas.show', $item) }}" class="btn btn-primary w-100">
                                    <i class="fa fa-eye me-2"></i>Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <div class="mb-4">
                                <i class="fa fa-inbox fa-5x text-muted"></i>
                            </div>
                            <h4 class="text-muted">Belum Ada Data Berkas</h4>
                            <p class="text-muted">Saat ini belum ada berkas persyaratan yang tersedia.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            Pagination
            @if($berkas->hasPages())
            <div class="mt-5">
                <!-- Pagination Links -->
                <div class="d-flex justify-content-center mb-3">
                    <nav aria-label="Page navigation">
                        {{ $berkas->links('pagination::bootstrap-4') }}
                    </nav>
                </div>
                <div class="text-center">
                    <small class="text-muted">
                        Menampilkan {{ $berkas->firstItem() }} sampai {{ $berkas->lastItem() }} dari {{ $berkas->total() }} hasil
                    </small>
                </div>
            </div>
            @endif
        <script src="{{ asset('assets-guest/js/main.js') }}"></script>
        </div>
    </div>
@stop
