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
                    <li class="nav-item"><a class="nav-link text-dark active" aria-current="page" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="#">PPDB</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tentang Kami</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Profil Sekolah</a></li>
                            <li><a class="dropdown-item" href="#">Fasilitas</a></li>
                            <li><a class="dropdown-item" href="#">Tenaga Pendidik</a></li>
                            <li><a class="dropdown-item" href="#">Ekstrakurikuler</a></li>
                            <li><a class="dropdown-item" href="#">Daftar Prestasi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link text-dark" href="#">Kontak Kami</a></li>
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

    <!-- Footer or any additional content -->
    <div class="container pb-5">
        @yield('footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-cPjCOe5Fn9Gj1VteKwKSOZbKwrkpBWo+et1f/E+7B0QR8bX/p4uZDC0E6V5b6Yt5" crossorigin="anonymous"></script>
</body>
</html>
