@extends('dashboard.template.template')

@section('content')

<!-- Article & News Section -->
<div class="container py-5">
    <h1 class="text-center mb-5">Artikel & Berita Terbaru</h1>

    <!-- Featured Article -->
    <div class="row mb-5">
        <div class="col-lg-6">
            <div class="featured-article position-relative" style="overflow: hidden;">
                <img src="https://naevaschool.naevaweb.my.id/userfiles/uploads/img-edukasi-57.jpg" class="img-fluid rounded shadow-lg" alt="Featured Article">
                <div class="overlay d-flex flex-column justify-content-end p-4 text-white position-absolute"
                    style="top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.4); transition: background 0.3s ease-in-out;">
                    <h3 class="fw-bold">Judul Artikel Unggulan</h3>
                    <p class="mb-2">Ringkasan artikel unggulan yang memberikan gambaran singkat tentang isi artikel.</p>
                    <a href="#" class="btn btn-light btn-sm">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h4>Artikel Unggulan</h4>
            <p class="text-muted">Deskripsi lebih mendalam mengenai artikel yang sedang ditampilkan sebagai unggulan. Artikel ini berfokus pada topik penting yang relevan bagi pembaca.</p>
            <a href="#" class="btn btn-dark">Lihat Semua Artikel</a>
        </div>
    </div>

    <!-- Grid of Articles & News -->
    <div class="row g-4">
        <!-- Article Item 1 -->
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 shadow-sm border-0" style="transition: transform 0.3s ease-in-out;">
                <img src="https://naevaschool.naevaweb.my.id/userfiles/uploads/img-edukasi-5-4.jpg" class="card-img-top" alt="Article 1">
                <div class="card-body">
                    <h5 class="card-title">Judul Artikel 1</h5>
                    <p class="card-text">Ringkasan singkat dari artikel pertama yang menarik pembaca untuk membaca lebih lanjut.</p>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <a href="#" class="btn btn-outline-dark btn-sm">Baca Selengkapnya</a>
                </div>
            </div>
        </div>

        <!-- Article Item 2 -->
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 shadow-sm border-0" style="transition: transform 0.3s ease-in-out;">
                <img src="https://naevaschool.naevaweb.my.id/userfiles/uploads/img-edukasi-64.jpg" class="card-img-top" alt="Article 2">
                <div class="card-body">
                    <h5 class="card-title">Judul Artikel 2</h5>
                    <p class="card-text">Deskripsi singkat dari artikel kedua yang membahas topik penting terkait pendidikan.</p>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <a href="#" class="btn btn-outline-dark btn-sm">Baca Selengkapnya</a>
                </div>
            </div>
        </div>

        <!-- Article Item 3 -->
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 shadow-sm border-0" style="transition: transform 0.3s ease-in-out;">
                <img src="https://naevaschool.naevaweb.my.id/userfiles/uploads/bg-edukasi-76.jpg" class="card-img-top" alt="Article 3">
                <div class="card-body">
                    <h5 class="card-title">Judul Artikel 3</h5>
                    <p class="card-text">Pengantar artikel ketiga yang memberikan insight singkat untuk mendorong pembaca membaca lebih lanjut.</p>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <a href="#" class="btn btn-outline-dark btn-sm">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination (if needed) -->
    <div class="d-flex justify-content-center mt-5">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<!-- Inline JavaScript to handle hover effect for overlay -->
<script>
    document.querySelectorAll('.featured-article').forEach(item => {
        item.addEventListener('mouseover', function() {
            const overlay = this.querySelector('.overlay');
            overlay.style.background = 'rgba(0, 0, 0, 0.6)';
        });
        item.addEventListener('mouseout', function() {
            const overlay = this.querySelector('.overlay');
            overlay.style.background = 'rgba(0, 0, 0, 0.4)';
        });
    });

    document.querySelectorAll('.card').forEach(item => {
        item.addEventListener('mouseover', function() {
            this.style.transform = 'translateY(-5px)';
        });
        item.addEventListener('mouseout', function() {
            this.style.transform = 'translateY(0)';
        });
    });
</script>

@endsection
