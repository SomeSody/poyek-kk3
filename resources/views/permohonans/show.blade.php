@extends('layouts.guest.app')
@section('title', 'Detail Permohonan')

@section('content')
    <div class="container-xxl py-5" style="min-height: 70vh;">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Detail</h6>
                <h1 class="display-6 mb-4">Informasi Permohonan</h1>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Main Card -->
                    <div class="card shadow-lg border-0 rounded-3 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                        <!-- Card Header dengan Status -->
                        <div class="card-header 
                            @if($permohonan->status == 'disetujui') bg-success
                            @elseif($permohonan->status == 'ditolak') bg-danger
                            @elseif($permohonan->status == 'diproses') bg-warning
                            @else bg-secondary
                            @endif text-white py-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h4 class="mb-1">
                                        <i class="fa fa-file-alt me-2"></i>{{ $permohonan->nomor_permohonan }}
                                    </h4>
                                    <small>Permohonan Surat #{{ $permohonan->id }}</small>
                                </div>
                                <div class="text-center">
                                    @if($permohonan->status == 'disetujui')
                                        <i class="fa fa-check-circle fa-3x mb-2"></i>
                                        <div class="badge bg-light text-success fs-6">DISETUJUI</div>
                                    @elseif($permohonan->status == 'ditolak')
                                        <i class="fa fa-times-circle fa-3x mb-2"></i>
                                        <div class="badge bg-light text-danger fs-6">DITOLAK</div>
                                    @elseif($permohonan->status == 'diproses')
                                        <i class="fa fa-clock fa-3x mb-2"></i>
                                        <div class="badge bg-light text-warning fs-6">DIPROSES</div>
                                    @else
                                        <i class="fa fa-hourglass-half fa-3x mb-2"></i>
                                        <div class="badge bg-light text-secondary fs-6">MENUNGGU</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body p-4">
                            <!-- Info Boxes -->
                            <div class="row g-3 mb-4">
                                <!-- ID Pemohon -->
                                <div class="col-md-6">
                                    <div class="info-box bg-light p-3 rounded-3">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-circle bg-primary text-white me-3">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">ID Pemohon</small>
                                                <h5 class="mb-0">{{ $permohonan->pemohon_warga_id }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- ID Jenis Surat -->
                                <div class="col-md-6">
                                    <div class="info-box bg-light p-3 rounded-3">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-circle bg-info text-white me-3">
                                                <i class="fa fa-file"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">ID Jenis Surat</small>
                                                <h5 class="mb-0">{{ $permohonan->jenis_id }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <!-- Tanggal Pengajuan -->
                            <div class="mb-4">
                                <h5 class="mb-3">
                                    <i class="fa fa-calendar me-2 text-primary"></i>Tanggal Pengajuan
                                </h5>
                                <div class="bg-light p-3 rounded">
                                    <h5 class="mb-0">{{ \Carbon\Carbon::parse($permohonan->tanggal_pengajuan)->format('d F Y, H:i') }} WIB</h5>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="mb-4">
                                <h5 class="mb-3">
                                    <i class="fa fa-info-circle me-2 text-primary"></i>Status Permohonan
                                </h5>
                                @if($permohonan->status == 'disetujui')
                                    <div class="alert alert-success border-0 shadow-sm">
                                        <div class="d-flex align-items-start">
                                            <i class="fa fa-check-circle fa-2x me-3"></i>
                                            <div>
                                                <h6 class="alert-heading">Permohonan Disetujui</h6>
                                                <p class="mb-0">Permohonan surat Anda telah <strong>DISETUJUI</strong> oleh petugas.</p>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($permohonan->status == 'ditolak')
                                    <div class="alert alert-danger border-0 shadow-sm">
                                        <div class="d-flex align-items-start">
                                            <i class="fa fa-times-circle fa-2x me-3"></i>
                                            <div>
                                                <h6 class="alert-heading">Permohonan Ditolak</h6>
                                                <p class="mb-0">Permohonan surat Anda <strong>DITOLAK</strong>. Silakan hubungi petugas untuk informasi lebih lanjut.</p>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($permohonan->status == 'diproses')
                                    <div class="alert alert-warning border-0 shadow-sm">
                                        <div class="d-flex align-items-start">
                                            <i class="fa fa-clock fa-2x me-3"></i>
                                            <div>
                                                <h6 class="alert-heading">Sedang Diproses</h6>
                                                <p class="mb-0">Permohonan surat Anda sedang <strong>DIPROSES</strong> oleh petugas. Mohon tunggu.</p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="alert alert-secondary border-0 shadow-sm">
                                        <div class="d-flex align-items-start">
                                            <i class="fa fa-hourglass-half fa-2x me-3"></i>
                                            <div>
                                                <h6 class="alert-heading">Menunggu Verifikasi</h6>
                                                <p class="mb-0">Permohonan Anda sedang <strong>MENUNGGU</strong> verifikasi dari petugas.</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- Catatan -->
                            @if($permohonan->catatan)
                            <div class="mb-4">
                                <h5 class="mb-3">
                                    <i class="fa fa-sticky-note me-2 text-primary"></i>Catatan
                                </h5>
                                <div class="alert alert-info border-0 shadow-sm">
                                    <p class="mb-0">{!! nl2br(e($permohonan->catatan)) !!}</p>
                                </div>
                            </div>
                            @endif

                            <hr class="my-4">

                            <!-- Timeline Info -->
                            <div class="mb-4">
                                <h5 class="mb-3">
                                    <i class="fa fa-history me-2 text-primary"></i>Riwayat Waktu
                                </h5>
                                <div class="timeline">
                                    <div class="timeline-item">
                                        <div class="timeline-icon bg-primary">
                                            <i class="fa fa-plus"></i>
                                        </div>
                                        <div class="timeline-content">
                                            <h6 class="mb-1">Permohonan Dibuat</h6>
                                            <small class="text-muted">
                                                {{ $permohonan->created_at->format('d F Y, H:i') }} WIB
                                            </small>
                                        </div>
                                    </div>
                                    @if($permohonan->status != 'menunggu')
                                    <div class="timeline-item">
                                        <div class="timeline-icon 
                                            @if($permohonan->status == 'disetujui') bg-success
                                            @elseif($permohonan->status == 'ditolak') bg-danger
                                            @else bg-warning
                                            @endif">
                                            <i class="fa fa-
                                                @if($permohonan->status == 'disetujui') check
                                                @elseif($permohonan->status == 'ditolak') times
                                                @else sync
                                                @endif"></i>
                                        </div>
                                        <div class="timeline-content">
                                            <h6 class="mb-1">Status: {{ ucfirst($permohonan->status) }}</h6>
                                            <small class="text-muted">
                                                {{ $permohonan->updated_at->format('d F Y, H:i') }} WIB
                                            </small>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Card Footer -->
                        <div class="card-footer bg-light border-0 py-3">
                            <a href="{{ route('permohonans.index') }}" class="btn btn-secondary">
                                <i class="fa fa-arrow-left me-2"></i>Kembali ke Daftar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
