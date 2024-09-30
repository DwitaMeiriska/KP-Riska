@extends('Guru.template.template')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card card-primary">
                <button class="btn btn-lg btn-primary col-lg-6 p-3 mt-3" ><h1>Tambah Surat</h1></button>
                <div class="card-header mt-3">
                    <h3 class="card-title">Tambah Surat Izin Siswa</h3>
                </div>
                <!-- form start -->
                <form action="{{ route('guru.storeSuratIzin') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <!-- User ID (Foreign key) -->
                        {{-- <div class="form-group">
                            <label for="user_id">User</label>
                            <select class="form-control" id="user_id" name="user_id">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}

                        <!-- Kode Surat -->
                        <div class="form-group">
                            <label for="kode_surat">Kode Surat</label>
                            <input type="text" class="form-control" id="kode_surat" name="kode_surat" value="Izin" readonly>
                        </div>
                        <div class="form-group">
                            <label for="kode_surat">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul" required>
                        </div>
                        <div class="form-group">
                            <label for="tujuan">Tujuan</label>
                            <input type="text" class="form-control" id="tujuan" name="tujuan" value="{{ Auth::user()->name }}" readonly>

                        </div>
                        <div class="form-group">
                            <label for="pengirim">Pengirim</label>
                            <input type="text" class="form-control" id="pengirim" name="pengirim" placeholder="Masukkan Pengirim" required>
                        </div>

                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN" required>
                        </div>

                        <!-- Tanggal Surat -->
                        <div class="form-group">
                            <label for="tanggal_surat">Tanggal Surat</label>
                            <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" required>
                        </div>

                        <!-- Nomor Surat -->
                        <div class="form-group">
                            <label for="no_surat">Nomor Surat</label>
                            <input type="text" class="form-control" id="no_surat" name="no_surat" value="000" readonly>
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan" required>
                        </div>
                        <!-- File Surat -->
                        <div class="form-group">
                            <label for="file_surat">Upload File Surat</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file_surat" name="file_surat" required>
                                    <label class="custom-file-label" for="file_surat">Pilih file</label>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label for="jenis_surat" class="form-label">Jenis Surat</label>
                            <select class="form-control" id="jenis_surat" name="jenis_surat">
                                <option value="izin_sekolah">Masuk</option>
                                <option value="undangan">Undangan</option>
                                <option value="keputusan" >Keputusan</option>
                                <option value="edaran">Edaran</option>
                                <option value="tugas">Tugas</option>
                                <option value="permohonan">Permohonan</option>
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label for="kelas" class="form-label">Kelas</label>
                            <select class="form-control" id="kelas" name="kelas">
                                <option value="8A">8A</option>
                                <option value="9A">9A</option>
                                <option value="7A" >7A</option>
                                <option value="7B">7B</option>
                                <option value="8B">8B</option>
                                <option value="9B">9B</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status_izin" class="form-label">Status</label>
                            <select class="form-control" id="status_izin" name="status_izin">
                                <option value="belum" selected>Di Terima</option>
                                <option value="tolak">Di Tolak</option>
                                <option value="terima" >Di Terima</option>
                            </select>
                        </div>
                        <input type="hidden" name="jenis_surat" id="jenis_surat" value="izin_sekolah">
                        <!-- Status Surat -->
                        {{-- <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="masuk">Masuk</option>
                                <option value="keluar">Keluar</option>
                            </select>
                        </div> --}}
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
