@extends('adminlte::page')

@section('title', 'Edit Berkas')

@section('content_header')
    <h1>Edit Berkas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('berkas.update', $berkas) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('jenis_surat.partials.form')
                <button class="btn btn-primary">Update</button>
                <a href="{{ route('berkas.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
@stop