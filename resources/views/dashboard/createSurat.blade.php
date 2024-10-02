@extends('dashboard.template.template')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="card card-primary shadow-lg" style="width: 100%; max-width: 800px; border-radius: 15px;">
                <!-- Tombol untuk menambah surat -->
                <div class="text-center mt-4">
                    <button class="btn btn-lg btn-primary" style="border-radius: 50px; padding: 10px 30px;">
                        <h1 class="m-0" style="font-size: 24px;">Tambah Surat</h1>
                    </button>
                </div>

                <!-- Header Card -->
                <div class="card-header text-center mt-3">
                    <h3 class="card-title">Tambah Surat Baru</h3>
                </div>

                <!-- Menampilkan pesan sukses -->
                @if(session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Form untuk menambah surat -->
                <form action="{{ route('dashboard.suratStore') }}" method="POST" enctype="multipart/form-data" class="p-4">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <!-- Kolom Pertama -->
                            <div class="col-md-6">
                                <!-- Input untuk kode surat -->
                                <div class="form-group">
                                    <label for="kode_surat" class="font-weight-bold">Kode Surat</label>
                                    <input type="text" class="form-control" id="kode_surat" name="kode_surat" placeholder="Masukkan kode surat" required style="border-radius: 10px; padding: 10px;">
                                </div>

                                <!-- Input untuk judul surat -->
                                <div class="form-group">
                                    <label for="judul" class="font-weight-bold">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul surat" required style="border-radius: 10px; padding: 10px;">
                                </div>

                                <!-- Input untuk tujuan surat -->
                                <div class="form-group">
                                    <label for="tujuan" class="font-weight-bold">Tujuan</label>
                                    <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Masukkan tujuan surat" required style="border-radius: 10px; padding: 10px;">
                                </div>

                                <!-- Input untuk tanggal surat -->
                                <div class="form-group">
                                    <label for="tanggal_surat" class="font-weight-bold">Tanggal Surat</label>
                                    <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" required style="border-radius: 10px; padding: 10px;">
                                </div>
                            </div>

                            <!-- Kolom Kedua -->
                            <div class="col-md-6">
                                <!-- Input untuk pengirim surat -->
                                <div class="form-group">
                                    <label for="pengirim" class="font-weight-bold">Pengirim</label>
                                    <input type="text" class="form-control" id="pengirim" name="pengirim" placeholder="Masukkan pengirim surat" required style="border-radius: 10px; padding: 10px;">
                                </div>

                                <!-- Input untuk nomor surat -->
                                <div class="form-group">
                                    <label for="no_surat" class="font-weight-bold">Nomor Surat</label>
                                    <input type="text" class="form-control" id="no_surat" name="no_surat" placeholder="Masukkan nomor surat" required style="border-radius: 10px; padding: 10px;">
                                </div>

                                <!-- Upload file surat -->
                                <div class="form-group">
                                    <label for="file_surat" class="font-weight-bold">Upload File Surat</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file_surat" name="file_surat" required>
                                        <label class="custom-file-label" for="file_surat">Pilih file</label>
                                    </div>
                                </div>

                                <!-- Pilihan jenis surat -->
                                <div class="form-group">
                                    <label for="jenis_surat" class="font-weight-bold">Jenis Surat</label>
                                    <select class="form-control" id="jenis_surat" name="jenis_surat" style="border-radius: 10px; padding: 10px;">
                                        <option value="undangan">Undangan</option>
                                        <option value="keputusan">Keputusan</option>
                                        <option value="edaran">Edaran</option>
                                        <option value="tugas">Tugas</option>
                                        <option value="permohonan">Permohonan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol submit -->
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary" style="border-radius: 50px; padding: 10px 30px;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
