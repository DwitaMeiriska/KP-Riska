@extends('dashboard.template.template')

@section('content')

<!-- Gallery Section -->
<div class="container py-5">
    <h1 class="text-center mb-5">Gallery Sekolah</h1>
    <div class="row g-4">
        @foreach ($data as $galeri)
        <!-- Gallery Item -->
        <div class="col-lg-4 col-md-6">
            <div class="gallery-item position-relative text-center">
                <img src="{{ asset($galeri->file) }}"
                     class="img-fluid rounded shadow gallery-image"
                     alt="{{ $galeri->judul }}"
                     data-bs-toggle="modal"
                     data-bs-target="#galleryModal{{ $galeri->id }}">
                <h5 class="mt-2">{{ $galeri->judul }}</h5>
            </div>
        </div>

        <!-- Gallery Modal -->
        <div class="modal fade" id="galleryModal{{ $galeri->id }}" tabindex="-1" aria-labelledby="galleryModalLabel{{ $galeri->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <img src="{{ asset($galeri->file) }}" class="img-fluid rounded mb-3" alt="{{ $galeri->judul }}">
                        <h5 class="modal-title">{{ $galeri->judul }}</h5>
                        <div class="modal-description mt-3" style="max-height: 200px; overflow-y: auto;">
                            <p>Di Ambil Oleh: {{ $galeri->user }}</p>
                            <p>{{ $galeri->deskripsi }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .gallery-image {
        width: 100%; /* Atur lebar gambar agar sesuai dengan kolom */
        height: 200px; /* Atur tinggi yang diinginkan untuk gambar */
        object-fit: cover; /* Memastikan gambar tidak terdistorsi */
    }
</style>

@endsection
