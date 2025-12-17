@extends('adminlte::page')

@section('title', 'Edit Riwayat')

@section('content_header')
    <h1>Edit Riwayat</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('riwayats.update', $riwayat) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('riwayats.partials.form')
                <button class="btn btn-primary">Update</button>
                <a href="{{ route('riwayats.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
@stop