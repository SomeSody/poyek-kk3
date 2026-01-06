@extends('layouts.guest.app')
@section('title', 'Detail Berkas')

@section('content')
    <div class="container-xxl py-5" style="min-height: 70vh;">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Detail</h6>
                <h1 class="display-6 mb-4">Informasi Berkas</h1>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Main Card -->
                    <div class="card shadow-lg border-0 rounded-3 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                        <!-- Card Header dengan Status -->
                        <div class="card-header {{ $berkas->valid ? 'bg-success' : 'bg-warning' }} text-white py-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h4 class="mb-1">
                                        <i class="fa fa-file-alt me-2"></i>{{ $berkas->nama_berkas }}
                                    </h4>
                                    <small>ID Berkas: #{{ $berkas->berkas_id }}</small>
                                </div>
                                @if($berkas->valid)
                                    <div class="text-center">
                                        <i class="fa fa-check-circle fa-3x mb-2"></i>
                                        <div class="badge bg-light text-success fs-6">TERVERIFIKASI</div>
                                    </div>
                                @else
                                    <div class="text-center">
                                        <i class="fa fa-clock fa-3x mb-2"></i>
                                        <div class="badge bg-light text-warning fs-6">MENUNGGU</div>
                                    </div>
                                @endif
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
                                                <h5 class="mb-0">{{ $berkas->permohonan_id }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tanggal Dibuat -->
                                <div class="col-md-6">
                                    <div class="info-box bg-light p-3 rounded-3">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-circle bg-info text-white me-3">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">Tanggal Dibuat</small>
                                                <h6 class="mb-0">{{ optional($berkas->created_at)->format('d F Y, H:i') ?? '-' }}    </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <!-- Status Validasi -->
                            <div class="mb-4">
                                <h5 class="mb-3">
                                    <i class="fa fa-info-circle me-2 text-primary"></i>Status Validasi
                                </h5>
                                @if($berkas->valid)
                                    <div class="alert alert-success border-0 shadow-sm">
                                        <div class="d-flex align-items-start">
                                            <i class="fa fa-check-circle fa-2x me-3"></i>
                                            <div>
                                                <h6 class="alert-heading">Berkas Terverifikasi</h6>
                                                <p class="mb-0">Berkas persyaratan Anda telah diverifikasi oleh petugas dan dinyatakan <strong>VALID</strong>. Proses selanjutnya akan segera dilakukan.</p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="alert alert-warning border-0 shadow-sm">
                                        <div class="d-flex align-items-start">
                                            <i class="fa fa-exclamation-triangle fa-2x me-3"></i>
                                            <div>
                                                <h6 class="alert-heading">Menunggu Verifikasi</h6>
                                                <p class="mb-0">Berkas persyaratan Anda sedang dalam proses verifikasi oleh petugas. Mohon tunggu beberapa saat.</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <hr class="my-4">

                            <!-- Timeline Info -->
                            <div class="mb-4">
                                <h5 class="mb-3">
                                    <i class="fa fa-history me-2 text-primary"></i>Riwayat
                                </h5>
                                <div class="timeline">
                                    <div class="timeline-item">
                                        <div class="timeline-icon bg-primary">
                                            <i class="fa fa-upload"></i>
                                        </div>
                                        <div class="timeline-content">
                                            <h6 class="mb-1">Berkas Diunggah</h6>
                                            <small class="text-muted">
                                                {{ optional($berkas->created_at)->format('d F Y, H:i') ?? '-' }}                                   
                                            </small>
                                        </div>
                                    </div>
                                    @if($berkas->valid)
                                    <div class="timeline-item">
                                        <div class="timeline-icon bg-success">
                                            <i class="fa fa-check"></i>
                                        </div>
                                        <div class="timeline-content">
                                            <h6 class="mb-1">Berkas Diverifikasi</h6>
                                            <small class="text-muted">
                                                {{ optional($berkas->updated_at)->format('d F Y, H:i') ?? '-' }}
                                            </small>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Card Footer -->
                        <div class="card-footer bg-light border-0 py-3">
                            <a href="{{ route('berkas.index') }}" class="btn btn-secondary">
                                <i class="fa fa-arrow-left me-2"></i>Kembali ke Daftar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop