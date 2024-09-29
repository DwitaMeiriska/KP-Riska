@extends('admin.template.template')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card card-primary">
                <button class="btn btn-lg btn-primary col-lg-6 p-3 mt-3" ><h1>Tambah Surat</h1></button>
                <div class="card-header mt-3">
                    <h3 class="card-title">Tambah Surat Keluar</h3>
                </div>
                <!-- form start -->
                <form action="{{ route('suratskeluar.store') }}" method="POST" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" id="kode_surat" name="kode_surat" placeholder="Masukkan kode surat" required>
                        </div>
                        <div class="form-group">
                            <label for="kode_surat">Tujuan</label>
                            <input type="text" class="form-control" id="kode_surat" name="tujuan" placeholder="Masukkan kode surat" required>
                        </div>

                        <!-- Tanggal Surat -->
                        <div class="form-group">
                            <label for="tanggal_surat">Tanggal Surat</label>
                            <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" required>
                        </div>

                        <!-- Nomor Surat -->
                        <div class="form-group">
                            <label for="no_surat">Nomor Surat</label>
                            <input type="text" class="form-control" id="no_surat" name="no_surat" placeholder="Masukkan nomor surat" required>
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
