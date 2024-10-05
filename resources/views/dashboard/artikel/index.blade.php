@extends('dashboard.template.template')

@section('content')

<!-- Article & News Section -->
<div class="container py-5">
    <h1 class="text-center mb-5">Artikel & Berita Terbaru</h1>

    <!-- Filter Kategori -->
    <div class="mb-4 d-flex justify-content-center">
        <form method="GET" action="{{ route('artikel') }}">
            <div class="input-group">
                <select name="kategori" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua Kategori</option>
                    <option value="berita" {{ request('kategori') == 'berita' ? 'selected' : '' }}>Berita</option>
                    <option value="pengumuman" {{ request('kategori') == 'pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                </select>
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </form>
    </div>

    <!-- List of Articles with Pagination -->
    <div class="list-group">
        @foreach ($artikels as $artikel)
        <a href="#" class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#modalPreview{{ $artikel->id }}">
            <div class="d-flex align-items-start">
                <img src="{{ asset($artikel->file) }}" class="img-fluid me-3 preview-img" alt="{{ $artikel->judul }}">
                <div>
                    <h5 class="mb-1">{{ $artikel->judul }}</h5>
                    <p class="mb-1">{{ Str::limit($artikel->deskripsi, 50) }}</p>
                    <small class="text-muted">Ditulis oleh: {{ $artikel->user }} | Tanggal: {{ $artikel->tgl_upload }}</small>
                </div>
            </div>
        </a>

        <!-- Modal Preview Gambar -->
        <div class="modal fade" id="modalPreview{{ $artikel->id }}" tabindex="-1" aria-labelledby="modalPreviewLabel{{ $artikel->id }}" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen"> <!-- Menggunakan modal fullscreen -->
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> <!-- Tombol X -->
                    </div>
                    <div class="modal-body d-flex justify-content-center align-items-center">
                        <img src="{{ asset($artikel->file) }}" class="img-fluid" alt="{{ $artikel->judul }}">
                    </div>
                    <div class="modal-body text-center">
                        <h5 class="modal-title mt-2">{{ $artikel->judul }}</h5>
                        <div class="modal-description mt-3" style="max-height: 200px; overflow-y: auto;">
                            <p>{{ $artikel->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $artikels->withQueryString()->links() }} <!-- Pagination yang tetap membawa query string (kategori) -->
    </div>
</div>

<!-- Styling for Preview Images and Fullscreen Modal -->
<style>
    /* Membuat gambar preview memiliki ukuran tetap yang sama */
    .preview-img {
        width: 100px;
        height: 100px;
        object-fit: cover; /* Menjaga gambar tetap proporsional dalam kotak */
    }

    /* Tombol X di modal fullscreen */
    .modal-fullscreen .btn-close {
        position: absolute;
        top: 15px;
        right: 15px;
        background-color: white;
        border-radius: 50%;
        padding: 10px;
        z-index: 9999;
    }

    .modal-fullscreen .modal-body {
        padding: 0;
        height: 100%;
    }
</style>

@endsection
