@extends('layouts.guest.app')
@section('title', 'Data Jenis Surat')

@section('content')
    <div class="container-xxl py-5" style="min-height: 70vh;">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Data</h6>
                <h1 class="display-6 mb-4">Jenis Surat</h1>
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
                        <input type="text" id="searchBox" class="form-control" placeholder="Cari jenis surat...">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Cards Grid -->
            <div class="row g-4" id="jenisSuratContainer">
                @forelse($jenis_surat as $item)
                    <div class="col-lg-4 col-md-6 wow fadeInUp jenis-surat-item" data-wow-delay="0.1s">
                        <div class="card h-100 shadow-sm border-0 rounded-3 hover-lift">
                            <!-- Card Header -->
                            <div class="card-header bg-primary text-white py-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">
                                        <i class="fa fa-file-alt me-2"></i>Kode: {{ $item->kode }}
                                    </h5>
                                    <span class="badge bg-light text-primary">
                                        <i class="fa fa-bookmark me-1"></i>Surat
                                    </span>
                                </div>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body p-4">
                                <!-- Nama Jenis Surat -->
                                <div class="mb-3 pb-3 border-bottom">
                                    <small class="text-muted d-block mb-2">
                                        <i class="fa fa-file-alt me-1"></i>Nama Jenis Surat
                                    </small>
                                    <h5 class="mb-0">{{ $item->nama_jenis }}</h5>
                                </div>

                                <!-- Syarat -->
                                <div class="mb-3">
                                    <small class="text-muted d-block mb-2">
                                        <i class="fa fa-list me-1"></i>Persyaratan
                                    </small>
                                    <div class="bg-light p-3 rounded" style="max-height: 150px; overflow-y: auto;">
                                        <small>{!! nl2br(e(Str::limit($item->syarat, 150))) !!}</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Footer -->
                            <div class="card-footer bg-light border-0 py-3">
                                <a href="{{ route('jenis_surat.show', $item) }}" class="btn btn-primary w-100">
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
                            <h4 class="text-muted">Belum Ada Data Jenis Surat</h4>
                            <p class="text-muted">Saat ini belum ada jenis surat yang tersedia.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            Pagination
            @if($jenis_surat->hasPages())
            <div class="mt-5">
                <!-- Pagination Links -->
                <div class="d-flex justify-content-center mb-3">
                    <nav aria-label="Page navigation">
                        {{ $jenis_surat->links('pagination::bootstrap-4') }}
                    </nav>
                </div>
                <div class="text-center">
                    <small class="text-muted">
                        Menampilkan {{ $jenis_surat->firstItem() }} sampai {{ $jenis_surat->lastItem() }} dari {{ $jenis_surat->total() }} hasil
                    </small>
                </div>
            </div>
            @endif
        <script src="{{ asset('assets-guest/js/main.js') }}"></script>
        </div>
    </div>
@stop
