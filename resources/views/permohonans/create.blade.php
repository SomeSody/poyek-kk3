@extends('layouts.mantis.mantis')

@section('title', 'Create Permohonan')

@section('content_header')
    <h1>Create Permohonan</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permohonans.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('permohonans.partials.form')
                <button class="btn btn-primary">Save</button>
                <a href="{{ route('permohonans.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
@stop
