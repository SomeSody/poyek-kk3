@extends('layouts.admin.mantis')
@section('title', 'Edit Pelanggan')
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
                <li class="breadcrumb-item"><a href="#">Pelanggan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Pelanggan</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Edit Pelanggan</h1>
                <p class="mb-0">Form untuk mengedit data pelanggan baru.</p>
            </div>
            <div>
                <a href="{{ route('jenis_surat.index') }}" class="btn btn-primary"><i class="far fa-question-circle me-1"></i>
                    Kembali</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <form action="{{ route('jenis_surat.update', $dataJenisSurat->jenis_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <div class="col-lg-6 col-sm-6">
                                <!-- Kode Surat -->
                                <div class="mb-3">
                                    <label for="kode" class="form-label">Kode Surat</label>
                                    <input type="number" id="kode" name="kode" class="form-control"
                                        value="{{ $dataJenisSurat->kode }}" required>
                                </div>

                                <!-- Nama Jenis Surat -->
                                <div class="mb-3">
                                    <label for="nama_jenis" class="form-label">Nama Jenis Surat</label>
                                    <input type="text" id="nama_jenis" name="nama_jenis" class="form-control"
                                        value="{{ $dataJenisSurat->nama_jenis }}" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <!-- Syarat Json -->
                                <div class="mb-3">
                                    <label for="syarat_json" class="form-label">Syarat JSON</label>
                                    <input type="text" id="syarat_json" name="syarat_json" class="form-control"
                                        value="{{ $dataJenisSurat->syarat_json }}" required>
                                </div>

                                <!-- Buttons -->
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('jenis_surat.index') }}"
                                        class="btn btn-outline-secondary ms-2">Batal</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
