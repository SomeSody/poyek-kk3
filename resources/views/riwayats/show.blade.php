@extends('layouts.guest.app')
@section('title', 'Detail Riwayat')

@section('content')
    <div class="container-xxl py-5" style="min-height: 70vh;">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Detail</h6>
                <h1 class="display-6 mb-4">Informasi Riwayat</h1>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Main Card -->
                    <div class="card shadow-lg border-0 rounded-3 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                        <!-- Card Header dengan Status -->
                        <div class="card-header 
                            @if($riwayat->status == 'disetujui') bg-success
                            @elseif($riwayat->status == 'ditolak') bg-danger
                            @elseif($riwayat->status == 'diproses') bg-warning
                            @else bg-secondary
                            @endif text-white py-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h4 class="mb-1">
                                        <i class="fa fa-history me-2"></i>Riwayat Permohonan
                                    </h4>
                                    <small>ID Riwayat: #{{ $riwayat->id }}</small>
                                </div>
                                <div class="text-center">
                                    @if($riwayat->status == 'disetujui')
                                        <i class="fa fa-check-circle fa-3x mb-2"></i>
                                        <div class="badge bg-light text-success fs-6">DISETUJUI</div>
                                    @elseif($riwayat->status == 'ditolak')
                                        <i class="fa fa-times-circle fa-3x mb-2"></i>
                                        <div class="badge bg-light text-danger fs-6">DITOLAK</div>
                                    @elseif($riwayat->status == 'diproses')
                                        <i class="fa fa-clock fa-3x mb-2"></i>
                                        <div class="badge bg-light text-warning fs-6">DIPROSES</div>
                                    @else
                                        <i class="fa fa-hourglass-half fa-3x mb-2"></i>
                                        <div class="badge bg-light text-secondary fs-6">{{ strtoupper($riwayat->status) }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body p-4">
                            <!-- Info Boxes -->
                            <div class="row g-3 mb-4">
                                <!-- ID Permohonan -->
                                <div class="col-md-6">
                                    <div class="info-box bg-light p-3 rounded-3">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-circle bg-primary text-white me-3">
                                                <i class="fa fa-folder"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">ID Permohonan</small>
                                                <h5 class="mb-0">{{ $riwayat->permohonan_id }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- ID Petugas -->
                                <div class="col-md-6">
                                    <div class="info-box bg-light p-3 rounded-3">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-circle bg-info text-white me-3">
                                                <i class="fa fa-user-tie"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">ID Petugas</small>
                                                <h5 class="mb-0">{{ $riwayat->petugas_warga_id ?? 'Belum ada' }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <!-- Waktu -->
                            <div class="mb-4">
                                <h5 class="mb-3">
                                    <i class="fa fa-clock me-2 text-primary"></i>Waktu Riwayat
                                </h5>
                                <div class="bg-light p-3 rounded">
                                    <h5 class="mb-0">{{ \Carbon\Carbon::parse($riwayat->waktu)->format('d F Y, H:i:s') }} WIB</h5>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="mb-4">
                                <h5 class="mb-3">
                                    <i class="fa fa-info-circle me-2 text-primary"></i>Status
                                </h5>
                                @if($riwayat->status == 'disetujui')
                                    <div class="alert alert-success border-0 shadow-sm">
                                        <div class="d-flex align-items-start">
                                            <i class="fa fa-check-circle fa-2x me-3"></i>
                                            <div>
                                                <h6 class="alert-heading">Disetujui</h6>
                                                <p class="mb-0">Permohonan telah <strong>DISETUJUI</strong>.</p>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($riwayat->status == 'ditolak')
                                    <div class="alert alert-danger border-0 shadow-sm">
                                        <div class="d-flex align-items-start">
                                            <i class="fa fa-times-circle fa-2x me-3"></i>
                                            <div>
                                                <h6 class="alert-heading">Ditolak</h6>
                                                <p class="mb-0">Permohonan <strong>DITOLAK</strong>.</p>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($riwayat->status == 'diproses')
                                    <div class="alert alert-warning border-0 shadow-sm">
                                        <div class="d-flex align-items-start">
                                            <i class="fa fa-clock fa-2x me-3"></i>
                                            <div>
                                                <h6 class="alert-heading">Sedang Diproses</h6>
                                                <p class="mb-0">Permohonan sedang <strong>DIPROSES</strong>.</p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="alert alert-secondary border-0 shadow-sm">
                                        <div class="d-flex align-items-start">
                                            <i class="fa fa-circle fa-2x me-3"></i>
                                            <div>
                                                <h6 class="alert-heading">{{ ucfirst($riwayat->status) }}</h6>
                                                <p class="mb-0">Status: <strong>{{ strtoupper($riwayat->status) }}</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- Keterangan -->
                            <div class="mb-4">
                                <h5 class="mb-3">
                                    <i class="fa fa-sticky-note me-2 text-primary"></i>Keterangan
                                </h5>
                                <div class="alert alert-info border-0 shadow-sm">
                                    <p class="mb-0">
                                        {!! nl2br(e($riwayat->keterangan ?? 'Tidak ada keterangan')) !!}
                                    </p>
                                </div>
                            </div>

                            <hr class="my-4">

                            <!-- Timeline Info -->
                            <div class="mb-4">
                                <h5 class="mb-3">
                                    <i class="fa fa-history me-2 text-primary"></i>Informasi Waktu
                                </h5>
                                <div class="timeline">
                                    <div class="timeline-item">
                                        <div class="timeline-icon bg-primary">
                                            <i class="fa fa-plus"></i>
                                        </div>
                                        <div class="timeline-content">
                                            <h6 class="mb-1">Riwayat Dibuat</h6>
                                            <small class="text-muted">
                                                {{ $riwayat->created_at->format('d F Y, H:i') }} WIB
                                            </small>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-icon bg-success">
                                            <i class="fa fa-sync"></i>
                                        </div>
                                        <div class="timeline-content">
                                            <h6 class="mb-1">Terakhir Diperbarui</h6>
                                            <small class="text-muted">
                                                {{ $riwayat->updated_at->format('d F Y, H:i') }} WIB
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Footer -->
                        <div class="card-footer bg-light border-0 py-3">
                            <a href="{{ route('riwayats.index') }}" class="btn btn-secondary">
                                <i class="fa fa-arrow-left me-2"></i>Kembali ke Daftar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop