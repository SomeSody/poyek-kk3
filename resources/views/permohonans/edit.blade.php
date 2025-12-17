@extends('layouts.mantis.mantis')

@section('title', 'Edit Permohonan')

@section('content_header')
    <h1>Edit Permohonan</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permohonans.update', $permohonan) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('permohonans.partials.form')
                <button class="btn btn-primary">Update</button>
                <a href="{{ route('permohonans.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
@stop
