@extends('dashboard.template.template')
@section('content')
    <div id="carouselDekstop" class="carousel slide d-none d-lg-block" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselDekstop" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselDekstop" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselDekstop" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('file/depan.png') }}" class="d-block w-100 rounded"
                    alt="..." style="max-height: 400px; object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('file/foto-depan.jpg') }}" class="d-block w-100 rounded"
                    alt="..." style="max-height: 400px; object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('file/taman.png') }}"class="d-block w-100 rounded"
                    alt="..." style="max-height: 400px; object-fit: cover;">
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselDekstop" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselDekstop" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div id="carouselMobile" class="carousel slide d-lg-none" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselMobile" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselMobile" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselMobile" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://naevaschool.naevaweb.my.id/userfiles/uploads/img-edukasi-64.jpg" class="d-block w-100"
                    alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://naevaschool.naevaweb.my.id/userfiles/uploads/img-edukasi-5-4.jpg" class="d-block w-100"
                    alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://naevaschool.naevaweb.my.id/userfiles/uploads/img-edukasi-57.jpg" class="d-block w-100"
                    alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselMobile" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselMobile" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container py-5">
        <div class="row py-3">
            <div class="col-lg-7 mb-4">
                <h1>SMAN 11 KOTA BENGKULU</h1>
                <h4>visi</h4>
                <p>Menghasilkan lulusan yang beriman dan bertaqwa, berkarakter dan berkompeten yang didasari ilmu pengetahuan teknologi berwawasan global </p>
                <p> <button type="button"
                        class="btn btn-outline-dark">Profil Sekolah</button></p>
            </div>
            <div class="col-lg-5 mb-4">
                <img src="{{ asset('file/logo-sma.png') }}" class="d-block w-50 rounded mx-auto" alt="Logo SMA">
            </div>
        </div>
    </div>
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-3 mb-lg-4">
                <div class="bg-light text-dark border text-center p-3 p-xl-4 rounded">
                    <div class="pb-3"><i class="fas fa-trophy fa-3x"></i></div>
                    <div class="h5 text-uppercase pb-2">Berprestasi</div>
                    <div>Kami percaya, setiap siswa memiliki potensi besar untuk berprestasi dan membawa perubahan positif. </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3 mb-lg-4">
                <div class="bg-light text-dark border text-center p-3 p-xl-4 rounded">
                    <div class="pb-3"><i class="fas fa-award fa-3x"></i></div>
                    <div class="h5 text-uppercase pb-2">Terakreditasi B</div>
                    <div>ke lingkungan yang membentuk karakter, mengasah potensi, dan membuka peluang. </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3 mb-lg-4">
                <div class="bg-light text-dark border text-center p-3 p-xl-4 rounded">
                    <div class="pb-3"><i class="fas fa-microscope fa-3x"></i></div>
                    <div class="h5 text-uppercase pb-2">Modern</div>
                    <div>Upgrade Dirimu Bareng Kami — SMA yang Siap Bersaing di Era Digital. </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3 mb-lg-4">
                <div class="bg-light text-dark border text-center p-3 p-xl-4 rounded">
                    <div class="pb-3"><i class="fas fa-shapes fa-3x"></i></div>
                    <div class="h5 text-uppercase pb-2">Ekstrakurikuler</div>
                    <div>Temukan versi terbaik dirimu lewat kegiatan seru dan bermakna di ekskul!. </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container pb-5">
        <div class="row pb-3 align-items-top">
            <div class="col-xxl-5 col-lg-6 mb-3 mb-lg-4">
                <div class="bg-dark text-white p-3 rounded">
                    <div class="h5 text-uppercase pb-2">Gallery Sekolah</div>

                    <!-- Carousel for Gallery -->
                    <div id="carouselGallery" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($galeris as $key => $galeri)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <!-- Image with modal trigger -->
                                    <img src="{{ asset($galeri->file) }}" class="d-block w-100 rounded" alt="{{ $galeri->judul }}" data-bs-toggle="modal" data-bs-target="#galleryModal{{ $galeri->id }}">
                                </div>

                                <!-- Modal for each image -->
                                <div class="modal fade" id="galleryModal{{ $galeri->id }}" tabindex="-1" aria-labelledby="galleryModalLabel{{ $galeri->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-fullscreen">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="galleryModalLabel{{ $galeri->id }}">{{ $galeri->judul }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img src="{{ asset($galeri->file) }}" class="img-fluid rounded" alt="{{ $galeri->judul }}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Carousel Controls -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselGallery" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselGallery" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>


            <div class="col-xxl-7 col-lg-6 mb-3 mb-lg-4">
                <div class="h5 text-uppercase">Artikel &amp; Kegiatan Sekolah</div>

                @foreach ($artikels as $artikel)
                    <div class="d-flex py-3 border-bottom">
                        <div class="me-3 me-lg-4">
                            <!-- Image triggers modal -->
                            <img src="{{ asset($artikel->file) }}" class="rounded" alt="{{ $artikel->judul }}"
                                style="width: 64px; height: 64px; object-fit: cover; cursor: pointer;"
                                data-bs-toggle="modal" data-bs-target="#modalArtikel{{ $artikel->id }}">
                        </div>
                        <div>
                            <!-- Title triggers modal -->
                            <div>
                                <a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal"
                                    data-bs-target="#modalArtikel{{ $artikel->id }}">{{ $artikel->judul }}</a>
                            </div>
                            <div class="small text-secondary">{{ Str::limit($artikel->deskripsi, 100) }}</div>
                        </div>
                    </div>

                    <!-- Modal for Full Article -->
                    <div class="modal fade" id="modalArtikel{{ $artikel->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $artikel->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel{{ $artikel->id }}">{{ $artikel->judul }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Full image -->
                                    <img src="{{ asset($artikel->file) }}" class="img-fluid rounded mb-4" alt="{{ $artikel->judul }}">

                                    <!-- Full content of the article -->
                                    <p>{{ $artikel->deskripsi }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="pt-3">
                    <a href="{{ route('artikel') }}" class="btn btn-dark btn-sm">Selengkapnya</a>
                </div>
            </div>


        </div>
    </div>
    <div class="py-2">
        <div class="container text-center bg-success text-white py-5">
            <div class="fs-2 mb-3">Segera Daftar!</div>
            <p>Penerimaan Peserta Didik Baru (PPDB) Sekolah Naevaweb Tahun Pelajaran 2025-2026</p>
            <div class="pt-2">
                <button type="button" class="btn btn-outline-light me-2">Info Lebih Lanjut</button>
                <button type="button" class="btn btn-outline-light">Daftar Sekarang</button>
            </div>
        </div>
    </div>
@endsection
