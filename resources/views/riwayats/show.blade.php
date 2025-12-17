@extends('adminlte::page')

@section('title', 'Detail Riwayat')

@section('content_header')
    <h1>Detail Riwayat</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p><strong>Permohonan Id:</strong> {{ $riwayat->permohonan_id }}</p>
            <p><strong>Status:</strong> {{ $riwayat->status }}</p>
            <p><strong>Petugas Warga Id:</strong> {{ $riwayat->petugas_warga_id }}</p>
            <p><strong>Waktu:</strong> {{ $riwayat->waktu }}</p>
            <p><strong>Keterangan:</strong> {{ $riwayat->keterangan }}</p>
            
            <a href="{{ route('riwayats.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@stop