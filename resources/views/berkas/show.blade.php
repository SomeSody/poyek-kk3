@extends('adminlte::page')

@section('title', 'Detail Berkas')

@section('content_header')
    <h1>Detail Berkas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p><strong>Permohonan Id:</strong> {{ $berkas->permohonan_id }}</p>
            <p><strong>Nama Berkas:</strong> {{ $berkas->nama_berkas }}</p>
            <p><strong>Valid:</strong> {{ $berkas->valid }}</p>
            
            <a href="{{ route('berkas.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@stop