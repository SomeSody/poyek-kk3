@extends('layouts.guest.app')

@section('title', 'Beranda')

@section('content')
    <div class="container-xxl py-5" style="min-height: 3vh;">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Selamat Datang di Layanan Mandiri Desa</h6>
                <h3 class="display-6 mb-4">Data anda dipastikan aman</h3>
            </div>
        </div>
    </div>
        
    <div class="col-12">
        <div class="text-center py-5">
            <div class="mb-4">
                <img class="img-fluid rounded" style="max-height:176px;" src="{{ asset('assets-guest/img/project-1.jpg') }}" alt="Image">
            </div>
        </div>
    </div>
@endsection
