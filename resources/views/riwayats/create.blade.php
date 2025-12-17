@extends('adminlte::page')

@section('title', 'Create Riwayat')

@section('content_header')
    <h1>Create Riwayat</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('riwayats.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('riwayats.partials.form')
                <button class="btn btn-primary">Save</button>
                <a href="{{ route('riwayats.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
@stop