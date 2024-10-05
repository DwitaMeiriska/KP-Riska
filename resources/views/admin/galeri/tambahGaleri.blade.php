@extends('admin.template.template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="card card-primary">
            <button class="btn btn-lg btn-primary col-lg-6 p-3 mt-3"><h1>Tambah Galeri</h1></button>
            <div class="card-header mt-3">
                <h3 class="card-title">Tambah Galeri Baru</h3>
            </div>
            <!-- form start -->
            <form action="{{ route('admin.storeGaleri') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <!-- Judul Galeri -->
                    <div class="form-group">
                        <label for="judul">Judul Galeri</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul" required>
                    </div>

                    <div class="form-group">
                        <label for="user">Di Ambil Oleh</label>
                        <input type="text" class="form-control" id="user" name="user" placeholder="Masukkan pengambil photo" required>
                    </div>

                    <!-- Deskripsi Galeri -->
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Galeri</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi" rows="3" required></textarea>
                    </div>

                    <!-- Upload File Galeri -->
                    <div class="form-group">
                        <label for="file">Upload Gambar</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="file" accept="image/*" required>
                                <label class="custom-file-label" for="file">Pilih gambar</label>
                            </div>
                        </div>
                    </div>

                    <!-- Tanggal Upload -->
                    <div class="form-group">
                        <label for="tgl_upload">Tanggal Upload</label>
                        <input type="date" class="form-control" id="tgl_upload" name="tgl_upload" required>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
