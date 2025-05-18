@extends('kelas.template.template')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="card card-primary col-md-10">
            <div class="card-header mt-2">
                <h3 class="card-title">Form Tambah Surat Izin Siswa</h3>
            </div>

            {{-- Tampilkan pesan error jika ada --}}
            @if (session('error'))
                <div class="alert alert-danger m-3">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Tampilkan pesan sukses jika ada --}}
            @if (session('success'))
                <div class="alert alert-success m-3">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('kelas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body row">

                    {{-- Nama Siswa --}}
                    <div class="form-group col-md-6">
                        <label for="nama_siswa">Nama Siswa</label>
                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ Auth::user()->name }}" readonly>
                    </div>

                    {{-- NISN --}}
                    <div class="form-group col-md-6">
                        <label for="nisn">NISN</label>
                        <input type="text" class="form-control" id="nisn" name="nisn" value="{{ $data->nisn }}" readonly>
                    </div>

                    {{-- Judul --}}
                    <div class="form-group col-md-6">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Surat" required>
                    </div>

                    {{-- Kelas --}}
                    <div class="form-group col-md-6">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $data->kelas }}" readonly>
                    </div>

                    {{-- Hidden: user_id --}}
                    <input type="hidden" name="user_id" value="{{ $data->user_id }}">

                    {{-- Keterangan --}}
                    <div class="form-group col-md-6">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="2" placeholder="Alasan izin" required></textarea>
                    </div>

                    {{-- Hidden: Status default --}}
                    <input type="hidden" name="status" value="belum">

                    {{-- Upload Lampiran --}}
                    <div class="form-group col-md-6">
                        <label for="lampiran">Upload Surat</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="lampiran" name="lampiran" required>
                            <label class="custom-file-label" for="lampiran">Pilih file</label>
                        </div>
                        @error('lampiran')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">Kirim Surat</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
