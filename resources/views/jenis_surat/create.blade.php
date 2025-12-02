@extends('layouts.admin.mantis')
@section('content')
@section('title', 'Tambah Surat')

<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="#">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#">Data Surat</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Surat</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Tambah Surat</h1>
            <p class="mb-0">Form untuk menambahkan data surat baru.</p>
        </div>
        <div>
            <a href="{{route('jenis_surat.index')}}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body">
                
                <!-- Alert Error Validasi -->
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops!</strong> Ada beberapa masalah dengan input Anda:
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Alert Success (jika dari session) -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Berhasil!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('jenis_surat.store')}}" method="POST">
                    @csrf
                    <div class="row mb-4">

                        <!-- Kode Surat -->
                        <div class="mb-3">
                            <label for="kode" class="form-label">Kode Surat <span class="text-danger">*</span></label>
                            <input name="kode" type="number" id="kode" class="form-control @error('kode') is-invalid @enderror" placeholder="Masukkan kode surat" value="{{ old('kode') }}"required>
                            @error('kode')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nama Jenis Surat -->
                        <div class="mb-3">
                            <label for="nama_jenis" class="form-label">Jenis Surat <span class="text-danger">*</span></label>
                            <input name="nama_jenis" type="text" id="nama_jenis" class="form-control @error('nama_jenis') is-invalid @enderror" placeholder="Masukkan nama jenis surat" value="{{ old('nama_jenis') }}" required>
                            @error('nama_jenis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Syarat -->
                            <div class="mb-3">
                                <label for="syarat" class="form-label">Syarat <span class="text-danger">*</span></label>
                                <select name="syarat" id="syarat"
                                    class="form-select @error('syarat') is-invalid @enderror"
                                    required>
                                    <option value="" disabled selected>-- Pilih syarat --</option>
                                    <option value="KTP">KTP</option>
                                    <option value="KK">KK</option>
                                    <option value="Surat Pengantar RT/RW">Surat Pengantar RT/RW</option>
                                    <option value="Akte Kelahiran">Akte Kelahiran</option>
                                    <option value="Pas Foto">Pas Foto</option>
                                    <option value="Surat Nikah">Surat Nikah</option>
                                    <option value="Kartu Pelajar">Kartu Pelajar</option>
                                    <option value="Surat Pernyataan">Surat Pernyataan</option>
                                </select>

                                @error('syarat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                    <!-- Tombol -->
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="ti ti-device-floppy me-1"></i> Simpan
                        </button>
                        <a href="{{ route('jenis_surat.index') }}" class="btn btn-outline-secondary ms-2">
                            <i class="ti ti-x me-1"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection