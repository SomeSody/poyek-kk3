@extends('layouts.admin.mantis')
@section('title', 'Edit Surat')
@section('content')

<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="#">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('jenis_surat.index') }}">Data Surat</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Surat</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Edit Surat</h1>
            <p class="mb-0">Form untuk mengedit data jenis surat.</p>
        </div>
        <div>
            <a href="{{ route('jenis_surat.index') }}" class="btn btn-primary">
                <i class="ti ti-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body">
                <!-- Alert Error Validasi -->
                @if ($errors->any())
                    <div class="alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops!</strong> Ada beberapa masalah dengan input Anda:
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Alert Success (jika ada) -->
                @if (session('success'))
                    <div class="alert-success alert-dismissible fade show" role="alert">
                        <strong>Berhasil!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('jenis_surat.update', $dataJenisSurat->jenis_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row mb-4">
                        <!-- Kode Surat -->
                        <div class="mb-3">
                            <label for="kode" class="form-label">Kode Surat <span class="text-danger">*</span></label>
                            <input type="number" id="kode" name="kode" class="form-control @error('kode') is-invalid @enderror" value="{{ old('kode', $dataJenisSurat->kode) }}" placeholder="Masukkan kode surat" required>
                            @error('kode')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nama Jenis Surat -->
                        <div class="mb-3">
                            <label for="nama_jenis" class="form-label">Nama Jenis Surat <span class="text-danger">*</span></label>
                            <input type="text" id="nama_jenis" name="nama_jenis" class="form-control @error('nama_jenis') is-invalid @enderror" value="{{ old('nama_jenis', $dataJenisSurat->nama_jenis) }}" placeholder="Masukkan nama jenis surat" required>
                            @error('nama_jenis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <!-- Syarat Json -->
                        <div class="mb-3">
                            <label for="syarat_json" class="form-label">Syarat JSON <span class="text-danger">*</span></label>
                            <textarea id="syarat_json" name="syarat_json" class="form-control @error('syarat_json') is-invalid @enderror" rows="4" placeholder='Contoh: ["KTP", "KK", "Foto"]' required>{{ old('syarat_json', $dataJenisSurat->syarat_json) }}</textarea>
                            @error('syarat_json')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Masukkan data dalam format JSON array</small>
                        </div>

                        <!-- Buttons -->
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="ti ti-device-floppy me-1"></i> Simpan Perubahan
                            </button>
                            <a href="{{ route('jenis_surat.index') }}" class="btn btn-outline-secondary ms-2">
                                <i class="ti ti-x me-1"></i> Batal
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection