@extends('adminlte::page')

@section('title', 'Create Berkas')

@section('content_header')
    <h1>Create Berkas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('berkas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('berkas.partials.form')
                <button class="btn btn-primary">Save</button>
                <a href="{{ route('berkas.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
@stop