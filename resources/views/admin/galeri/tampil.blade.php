@extends('admin.template.template')

@section('content')
<div class="container-fluid">
    <h1 class="text-center mb-4">Daftar Galeri</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Galeri</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <div class="text-right mb-3">
                            <a href="{{ route('admin.tambahGaleri') }}" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Tambah Galeri</a>
                        </div>

                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Oleh</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Tanggal Upload</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($galeris as $galeri)
                            <tr>
                                <td>
                                    <img src="{{ asset($galeri->file) }}" alt="{{ $galeri->judul }}" class="img-thumbnail" style="width: 100px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modalGaleri{{ $galeri->id }}">
                                    <!-- Modal untuk menampilkan gambar besar -->
                                    <div class="modal fade" id="modalGaleri{{ $galeri->id }}" tabindex="-1" aria-labelledby="modalGaleriLabel{{ $galeri->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <img src="{{ asset($galeri->file) }}" alt="{{ $galeri->judul }}" class="img-fluid">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $galeri->judul }}</td>
                                <td>{{ $galeri->user }}</td>
                                <td>{{ $galeri->deskripsi }}</td>
                                <td>{{ $galeri->tgl_upload }}</td>
                                <td>
                                    <a href="{{ route('admin.editGaleri', $galeri->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.destroyGaleri', $galeri->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus galeri ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
