@extends('admin.template.template')

@section('content')
<div class="container-fluid">
    <h1 class="text-center mb-4">Daftar Artikel</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Artikel</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.tambahArtikel') }}" class="btn btn-primary">Tambah Artikel</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Preview Gambar</th> <!-- Kolom untuk gambar -->
                                <th>Tanggal Upload</th>
                                <th>User</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($artikels as $artikel)
                            <tr>
                                <td>{{ $artikel->judul }}</td>
                                <td>{{ $artikel->deskripsi }}</td>
                                <td>
                                    <img src="{{ asset($artikel->file) }}"
                                         class="img-thumbnail"
                                         alt="{{ $artikel->judul }}"
                                         style="cursor: pointer; width: 100px;"
                                         data-bs-toggle="modal"
                                         data-bs-target="#modalPreview{{ $artikel->id }}">
                                </td>
                                <td>{{ $artikel->tgl_upload }}</td>
                                <td>{{ $artikel->user }}</td>
                                <td>{{ $artikel->kategori }}</td>
                                <td>
                                    <a href="{{ route('admin.editArtikel', $artikel->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.deleteArtikel', $artikel->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal Preview Gambar -->
                            <div class="modal fade" id="modalPreview{{ $artikel->id }}" tabindex="-1" aria-labelledby="modalPreviewLabel{{ $artikel->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <img src="{{ asset($artikel->file) }}" class="img-fluid" alt="{{ $artikel->judul }}">
                                            <h5 class="modal-title mt-2">{{ $artikel->judul }}</h5>
                                            <div class="modal-description mt-3" style="max-height: 200px; overflow-y: auto;">
                                                <p>{{ $artikel->deskripsi }}</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
