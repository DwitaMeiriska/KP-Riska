<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" integrity="sha512-3M00D/rn8n+2ZVXBO9Hib0GKNpkm8MSUU/e2VNthDyBYxKWG+BftNYYcuEjXlyrSO637tidzMBXfE7sQm0INUg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>@yield('title', 'Default Title')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light border">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="https://naevaweb.com/userfiles/uploads/naevaschool-2.svg" height="30" alt="NaevaScool" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-dark active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        {{-- <a class="nav-link text-dark" href="{{ route('ppdb') }}">PPDB</a> --}}
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profiles
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('profiles') }}">Profil Sekolah</a></li>
                            <li><a class="dropdown-item" href="{{ route('profileKepala') }}">Kepala Sekolah</a></li>

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('galeri') }}">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('artikel') }}">Artikel</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('kontak') }}">Kontak Kami</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('dashboard.createSurat') }}">Kirim Surat</a>
                    </li>
                </ul>

                <!-- Authentication -->
                <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
                    @if (Route::has('login'))
                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-icon btn-dark">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-icon btn-dark">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-icon btn-dark">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Section for Carousel (optional) -->
    @yield('carousel')

    <!-- Main Content -->
    <div class="container py-5">
        @yield('content')
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63245.983719423304!2d110.33364512110442!3d-7.803163419271912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5787bd5b6bc5%3A0x21723fd4d3684f71!2sYogyakarta%2C%20Yogyakarta%20City%2C%20Special%20Region%20of%20Yogyakarta!5e0!3m2!1sen!2sid!4v1710005466701!5m2!1sen!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-lg-6 mb-4">
                    <h2 class="section-title">Hubungi Kami</h2>
                    <p>Bila ada pertanyaan jangan ragu untuk menghubungi kami</p>
                    <div class="d-flex mb-2">
                        <div class="me-3"><i class="fas fa-map-marker-alt"></i></div>
                        <div>Jl. Nama Jalan No 123 Sleman Yogyakarta</div>
                    </div>
                    <div class="d-flex mb-2">
                        <div class="me-3"><i class="fas fa-phone"></i></div>
                        <div>0274 - 1231231</div>
                    </div>
                    <div class="d-flex mb-2">
                        <div class="me-3"><i class="fab fa-whatsapp"></i></div>
                        <div>0812345679801</div>
                    </div>
                    <div class="pt-3">
                        <a href="#" class="btn btn-icon btn-dark me-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="btn btn-icon btn-dark me-2"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="btn btn-icon btn-dark me-2"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-dark text-white py-3">
        <div class="container pt-4">
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-3">
                    <div class="h5">Tentang Kami</div>
                    <div>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="h5">Halaman</div>
                    <ul class="list-unstyled">
                        <li class="pb-1"><a href="#" class="text-white text-decoration-none">PPDB</a></li>
                        <li class="pb-1"><a href="#" class="text-white text-decoration-none">Tentang Kami</a></li>
                        <li class="pb-1"><a href="#" class="text-white text-decoration-none">Kontak Kami</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="h5">Update</div>
                    <ul class="list-unstyled">
                        <li class="pb-1"><a href="#" class="text-white text-decoration-none">Kegiatan Sekolah</a></li>
                        <li class="pb-1"><a href="#" class="text-white text-decoration-none">Kegiatan Wali Murid</a></li>
                        <li class="pb-1"><a href="#" class="text-white text-decoration-none">Pengumuman</a></li>
                        <li class="pb-1"><a href="#" class="text-white text-decoration-none">Update Prestasi</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-dark text-white py-3 border-top border-secondary">
        <div class="container">
            <div class="d-lg-flex justify-content-between">
                <div class="mb-2 mb-lg-0">Copyright &copy; 2024</div>
                <div class="mb-2 mb-lg-0">Template by <a href="https://naevaweb.com" class="text-white text-decoration-none">Naevaweb.com</a></div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-cPjCOe5Fn9Gj1VteKwKSOZbKwrkpBWo+et1f/E+7B0QR8bX/p4uZDC0E6V5b6Yt5" crossorigin="anonymous"></script>
</body>
</html>
