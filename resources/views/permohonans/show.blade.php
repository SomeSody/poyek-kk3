@extends('layouts.mantis.mantis')

@section('title', 'Detail Permohonan')

@section('content_header')
    <h1>Detail Permohonan</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p><strong>Nomor Permohonan:</strong> {{ $permohonan->nomor_permohonan }}</p>
            <p><strong>Pemohon Warga Id:</strong> {{ $permohonan->pemohon_warga_id }}</p>
            <p><strong>Jenis Id:</strong> {{ $permohonan->jenis_id }}</p>
            <p><strong>Tanggal Pengajuan:</strong> {{ $permohonan->tanggal_pengajuan }}</p>
            <p><strong>Status:</strong> {{ $permohonan->status }}</p>
            <p><strong>Catatan:</strong> {{ $permohonan->catatan }}</p>

            <a href="{{ route('permohonans.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@stop
