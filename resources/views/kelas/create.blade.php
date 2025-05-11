@extends('kelas.template.template')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="card card-primary col-md-10">
            <div class="card-header mt-2">
                <h3 class="card-title">Form Tambah Surat Izin Siswa</h3>
            </div>
            <form action="{{ route('kelas.store')}}" method="POST" enctype="multipart/form-data">
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
                        <input type="text" class="form-control" id="nisn" name="nisn" value="{{$data->nisn}}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Surat" required>
                    </div>

                    {{-- Kelas --}}
                    <div class="form-group col-md-6">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" readonly value="{{$data->kelas}}">
                    </div>
                    {{-- Tujuan --}}
                    {{-- <div class="form-group> col-md-6">
                        <label for="tujuan">Tujuan</label>
                        <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Tujuan izin" required>
                    </div> --}}
                    <input type="hidden" name="user_id" value="{{$data->user_id}}">
                    {{-- Tanggal Izin --}}
                    {{-- Keterangan --}}
                    <div class="form-group col-md-6">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="2" placeholder="Alasan izin" required></textarea>
                    </div>

                    {{-- Status --}}
                    {{-- <div class="form-group col-md-6">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="belum" selected>Belum</option>
                            <option value="diterima">Diterima</option>
                            <option value="ditolak">Ditolak</option>
                        </select>
                    </div> --}}
                    <input type="hidden" name="status" value="belum">

                    {{-- Tanggal Izin --}}

                    {{-- File Lampiran --}}
                    <div class="form-group col-md-6">
                        <label for="lampiran">Upload Surat</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="lampiran" name="lampiran" required>
                            <label class="custom-file-label" for="lampiran">Pilih file</label>
                        </div>
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
