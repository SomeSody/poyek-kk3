<!-- Footer Start -->
<div class="container-fluid bg-dark text-body footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Alamat</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Desa Example, Kec. Example, Indonesia</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 812 3456 7890</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>layanan@desa.example</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-square btn-outline-secondary rounded-circle me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-outline-secondary rounded-circle me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-outline-secondary rounded-circle me-1" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-square btn-outline-secondary rounded-circle me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Menu Cepat</h5>
                <!-- PERBAIKAN: gunakan route('about') bukan route('guest.about') -->
                <a class="btn btn-link" href="{{ route('about') }}">Tentang Kami</a>
                <a class="btn btn-link" href="{{ route('contact') }}">Kontak</a>
                <a class="btn btn-link" href="{{ route('service') }}">Layanan Kami</a>
                <a class="btn btn-link" href="{{ route('feature') }}">Fitur</a>
                <a class="btn btn-link" href="{{ route('team') }}">Tim Kami</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Galeri</h5>
                <div class="row g-2">
                    <div class="col-4">
                        <img class="img-fluid rounded" src="{{ asset('assets-guest/img/project-1.jpg') }}" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded" src="{{ asset('assets-guest/img/project-2.jpg') }}" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded" src="{{ asset('assets-guest/img/project-3.jpg') }}" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded" src="{{ asset('assets-guest/img/project-4.jpg') }}" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded" src="{{ asset('assets-guest/img/project-5.jpg') }}" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded" src="{{ asset('assets-guest/img/project-6.jpg') }}" alt="Image">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Newsletter</h5>
                <p>Dapatkan informasi terbaru tentang layanan desa.</p>
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <input class="form-control bg-transparent border-secondary w-100 py-3 ps-4 pe-5" type="text" placeholder="Email anda">
                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Daftar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a href="{{ route('dashboard') }}">Layanan Mandiri Desa</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
