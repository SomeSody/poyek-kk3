@extends('layouts.guest.app')
@section('title', 'Permohonans')

@section('content')
    <div class="container-xxl py-5" style="min-height: 70vh;">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Data</h6>
                <h1 class="display-6 mb-4">Permohonan Surat</h1>
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
                        <input type="text" id="searchBox" class="form-control" placeholder="Cari permohonan...">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Cards Grid -->
            <div class="row g-4" id="permohonanContainer">
                @forelse($permohonans as $item)
                    <div class="col-lg-4 col-md-6 wow fadeInUp permohonan-item" data-wow-delay="0.1s">
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
                                        <i class="fa fa-file-alt me-2"></i>Permohonan
                                    </h5>
                                    <span class="badge bg-light 
                                        @if($item->status == 'disetujui') text-success
                                        @elseif($item->status == 'ditolak') text-danger
                                        @elseif($item->status == 'diproses') text-warning
                                        @else text-secondary
                                        @endif">
                                        <i class="fa fa-circle me-1"></i>{{ ucfirst($item->status ?? 'Menunggu') }}
                                    </span>
                                </div>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body p-4">
                                <!-- Nomor Permohonan -->
                                <div class="mb-3 pb-3 border-bottom">
                                    <small class="text-muted d-block mb-1">
                                        <i class="fa fa-hashtag me-1"></i>Nomor Permohonan
                                    </small>
                                    <h6 class="mb-0 text-primary">{{ $item->nomor_permohonan }}</h6>
                                </div>

                                <!-- ID Pemohon -->
                                <div class="mb-3 pb-3 border-bottom">
                                    <small class="text-muted d-block mb-2">
                                        <i class="fa fa-user me-1"></i>ID Pemohon
                                    </small>
                                    <span class="badge bg-secondary fs-6">{{ $item->pemohon_warga_id }}</span>
                                </div>

                                <!-- Tanggal Pengajuan -->
                                <div class="mb-3">
                                    <small class="text-muted d-block mb-2">
                                        <i class="fa fa-calendar me-1"></i>Tanggal Pengajuan
                                    </small>
                                    <div class="bg-light p-2 rounded text-center">
                                        {{ \Carbon\Carbon::parse($item->tanggal_pengajuan)->format('d M Y') }}
                                    </div>
                                </div>

                                <!-- Status Badge -->
                                <div class="text-center mt-3">
                                    @if($item->status == 'disetujui')
                                        <div class="alert alert-success mb-0 py-2">
                                            <i class="fa fa-check-circle me-2"></i>
                                            <strong>Disetujui</strong>
                                        </div>
                                    @elseif($item->status == 'ditolak')
                                        <div class="alert alert-danger mb-0 py-2">
                                            <i class="fa fa-times-circle me-2"></i>
                                            <strong>Ditolak</strong>
                                        </div>
                                    @elseif($item->status == 'diproses')
                                        <div class="alert alert-warning mb-0 py-2">
                                            <i class="fa fa-clock me-2"></i>
                                            <strong>Sedang Diproses</strong>
                                        </div>
                                    @else
                                        <div class="alert alert-secondary mb-0 py-2">
                                            <i class="fa fa-hourglass-half me-2"></i>
                                            <strong>Menunggu</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Card Footer -->
                            <div class="card-footer bg-light border-0 py-3">
                                <a href="{{ route('permohonans.show', $item) }}" class="btn btn-primary w-100">
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
                            <h4 class="text-muted">Belum Ada Data Permohonan</h4>
                            <p class="text-muted">Saat ini belum ada permohonan surat yang tersedia.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($permohonans->hasPages())
            <div class="mt-5">
                <!-- Pagination Links -->
                <div class="d-flex justify-content-center mb-3">
                    <nav aria-label="Page navigation">
                        {{ $permohonans->links('pagination::bootstrap-4') }}
                    </nav>
                </div>
                <div class="text-center">
                    <small class="text-muted">
                        Menampilkan {{ $permohonans->firstItem() }} sampai {{ $permohonans->lastItem() }} dari {{ $permohonans->total() }} hasil
                    </small>
                </div>
            </div>
            @endif
        <script src="{{ asset('assets-guest/js/main.js') }}"></script>
        </div>
    </div>
@stop
