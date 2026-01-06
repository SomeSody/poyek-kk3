@extends('layouts.guest.app')
@section('title', 'Detail Jenis Surat')

@section('content')
    <div class="container-xxl py-5" style="min-height: 70vh;">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Detail</h6>
                <h1 class="display-6 mb-4">Informasi Jenis Surat</h1>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Main Card -->
                    <div class="card shadow-lg border-0 rounded-3 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                        <!-- Card Header -->
                        <div class="card-header bg-primary text-white py-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h4 class="mb-1">
                                        <i class="fa fa-file-alt me-2"></i>{{ $jenis_surat->nama_jenis }}
                                    </h4>
                                    <small>Kode Surat: {{ $jenis_surat->kode }}</small>
                                </div>
                                <div class="text-center">
                                    <i class="fa fa-bookmark fa-3x mb-2"></i>
                                    <div class="badge bg-light text-primary fs-6">JENIS SURAT</div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body p-4">
                            <!-- Info Boxes -->
                            <div class="row g-3 mb-4">
                                <!-- Kode Surat -->
                                <div class="col-md-6">
                                    <div class="info-box bg-light p-3 rounded-3">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-circle bg-primary text-white me-3">
                                                <i class="fa fa-hashtag"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">Kode Surat</small>
                                                <h5 class="mb-0">{{ $jenis_surat->kode }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Nama Jenis -->
                                <div class="col-md-6">
                                    <div class="info-box bg-light p-3 rounded-3">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-circle bg-info text-white me-3">
                                                <i class="fa fa-file-alt"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">Nama Jenis</small>
                                                <h6 class="mb-0">{{ $jenis_surat->nama_jenis }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <!-- Persyaratan -->
                            <div class="mb-4">
                                <h5 class="mb-3">
                                    <i class="fa fa-list-ul me-2 text-primary"></i>Persyaratan
                                </h5>
                                <div class="alert alert-info border-0 shadow-sm">
                                    <div class="syarat-content">
                                        {!! nl2br(e($jenis_surat->syarat)) !!}
                                    </div>
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
                                            <h6 class="mb-1">Dibuat</h6>
                                            <small class="text-muted">
                                                {{ $jenis_surat->created_at->format('d F Y, H:i') }} WIB
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
                                                {{ $jenis_surat->updated_at->format('d F Y, H:i') }} WIB
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Footer -->
                        <div class="card-footer bg-light border-0 py-3">
                            <a href="{{ route('jenis_surat.index') }}" class="btn btn-secondary">
                                <i class="fa fa-arrow-left me-2"></i>Kembali ke Daftar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop