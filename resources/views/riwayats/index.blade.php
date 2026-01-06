@extends('layouts.guest.app')
@section('title', 'Riwayats')

@section('content')
    <div class="container-xxl py-5" style="min-height: 70vh;">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Data</h6>
                <h1 class="display-6 mb-4">Riwayat Permohonan</h1>
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
                        <input type="text" id="searchBox" class="form-control" placeholder="Cari riwayat...">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Cards Grid -->
            <div class="row g-4" id="riwayatContainer">
                @forelse($riwayats as $item)
                    <div class="col-lg-4 col-md-6 wow fadeInUp riwayat-item" data-wow-delay="0.1s">
                        <div class="card h-100 shadow-sm border-0 rounded-3 hover-lift">
                            <!-- Card Header dengan Status -->
                            <div class="card-header 
                                @if($item->status == 'disetujui') bg-success
                                @elseif($item->status == 'ditolak') bg-danger
                                @elseif($item->status == 'diproses') bg-warning
                                @else bg-secondary
                                @endif text-white py-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">
                                        <i class="fa fa-history me-2"></i>Riwayat
                                    </h5>
                                    <span class="badge bg-light 
                                        @if($item->status == 'disetujui') text-success
                                        @elseif($item->status == 'ditolak') text-danger
                                        @elseif($item->status == 'diproses') text-warning
                                        @else text-secondary
                                        @endif">
                                        <i class="fa fa-circle me-1"></i>{{ ucfirst($item->status ?? 'Status') }}
                                    </span>
                                </div>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body p-4">
                                <!-- ID Riwayat -->
                                <div class="mb-3 pb-3 border-bottom">
                                    <small class="text-muted d-block mb-1">
                                        <i class="fa fa-hashtag me-1"></i>ID Riwayat
                                    </small>
                                    <h6 class="mb-0 text-primary">#{{ $item->id }}</h6>
                                </div>

                                <!-- ID Permohonan -->
                                <div class="mb-3 pb-3 border-bottom">
                                    <small class="text-muted d-block mb-2">
                                        <i class="fa fa-folder me-1"></i>ID Permohonan
                                    </small>
                                    <span class="badge bg-secondary fs-6">{{ $item->permohonan_id }}</span>
                                </div>

                                <!-- ID Petugas -->
                                <div class="mb-3 pb-3 border-bottom">
                                    <small class="text-muted d-block mb-2">
                                        <i class="fa fa-user-tie me-1"></i>ID Petugas
                                    </small>
                                    <span class="badge bg-info fs-6">{{ $item->petugas_warga_id ?? 'Belum ada' }}</span>
                                </div>

                                <!-- Waktu -->
                                <div class="mb-3">
                                    <small class="text-muted d-block mb-2">
                                        <i class="fa fa-clock me-1"></i>Waktu
                                    </small>
                                    <div class="bg-light p-2 rounded text-center">
                                        {{ \Carbon\Carbon::parse($item->waktu)->format('d M Y, H:i') }}
                                    </div>
                                </div>

                                <!-- Keterangan Preview -->
                                @if($item->keterangan)
                                <div class="text-muted small">
                                    <i class="fa fa-info-circle me-1"></i>
                                    {{ Str::limit($item->keterangan, 50) }}
                                </div>
                                @endif
                            </div>

                            <!-- Card Footer -->
                            <div class="card-footer bg-light border-0 py-3">
                                <a href="{{ route('riwayats.show', $item) }}" class="btn btn-primary w-100">
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
                            <h4 class="text-muted">Belum Ada Data Riwayat</h4>
                            <p class="text-muted">Saat ini belum ada riwayat permohonan yang tersedia.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($riwayats->hasPages())
            <div class="mt-5">
                <!-- Pagination Links -->
                <div class="d-flex justify-content-center mb-3">
                    <nav aria-label="Page navigation">
                        {{ $riwayats->links('pagination::bootstrap-4') }}
                    </nav>
                </div>
                <div class="text-center">
                    <small class="text-muted">
                        Menampilkan {{ $riwayats->firstItem() }} sampai {{ $riwayats->lastItem() }} dari {{ $riwayats->total() }} hasil
                    </small>
                </div>
            </div>
            @endif
    <script src="{{ asset('assets-guest/js/main.js') }}"></script>
    </div>
@stop
