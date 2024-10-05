@extends('dashboard.template.template')

@section('content')
<div class="container py-5">
    <!-- Header Image -->
    <div class="jumbotron text-white text-center" style="background: url('/path/to/your/school-image.jpg') center center/cover no-repeat; padding: 5rem 1rem;">
        <h1 class="display-4 fw-bold">{{ $profile->nama_sekolah ?? 'Nama Sekolah' }}</h1>
        <p class="lead">{{ $profile->deskripsi ?? 'Deskripsi singkat sekolah yang bisa menarik perhatian pengunjung.' }}</p>
    </div>

    <!-- Content -->
    <div class="row justify-content-center mt-5">
        <div class="col-lg-8">
            <div class="card shadow-lg">
                <div class="card-body">
                    @if($profile)
                        <!-- Visi & Misi Section -->
                        <div class="mb-4 text-center">
                            <h3 class="fw-bold">Visi Sekolah</h3>
                            <p class="lead fst-italic">{{ $profile->visi }}</p>
                        </div>

                        <div class="mb-4 text-center">
                            <h3 class="fw-bold">Misi Sekolah</h3>
                            <p class="lead fst-italic">{{ $profile->misi }}</p>
                        </div>

                        <!-- Contact Information -->
                        <div class="mb-4">
                            <h4 class="fw-bold">Informasi Kontak</h4>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-map-marker-alt"></i> <strong>Alamat:</strong> {{ $profile->alamat }}</li>
                                <li><i class="fas fa-phone"></i> <strong>Telepon:</strong> {{ $profile->telepon }}</li>
                                <li><i class="fas fa-envelope"></i> <strong>Email:</strong> {{ $profile->email }}</li>
                            </ul>
                        </div>

                    @else
                        <div class="alert alert-warning text-center">
                            <p>Profil sekolah belum tersedia.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Extra Section (Optional) -->
    <div class="row justify-content-center mt-5">
        <div class="col-lg-8 text-center">
            <h4 class="fw-bold mb-4">Kenapa Memilih Sekolah Kami?</h4>
            <p class="lead">Kami memiliki kurikulum yang inovatif dan lingkungan belajar yang mendukung pengembangan potensi anak secara maksimal. Kualitas pengajaran kami terbukti melalui prestasi akademik dan non-akademik siswa-siswi kami.</p>
            <button class="btn btn-primary btn-lg mt-3">Pelajari Lebih Lanjut</button>
        </div>
    </div>
</div>

<!-- Custom CSS for Profile Page -->
<style>
    .jumbotron {
        background-blend-mode: darken;
        color: #fff;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.6);
    }

    .card-body {
        padding: 2rem;
    }

    .lead {
        font-size: 1.2rem;
    }

    .list-unstyled li {
        margin-bottom: 1rem;
        font-size: 1.1rem;
    }

    .fas {
        margin-right: 10px;
    }
</style>
@endsection
