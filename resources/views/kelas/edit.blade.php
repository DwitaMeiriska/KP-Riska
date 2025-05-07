@extends('guru.template.template')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card card-primary">
                <button class="btn btn-lg btn-primary col-lg-6 p-3 mt-3" ><h1>Edit Siswa</h1></button>
                <div class="card-header mt-3">
                    <h3 class="card-title">Edit  Siswa</h3>
                </div>
                <!-- form start -->
                <form action="{{ route('guru.updateKelas', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                            <label for="name">Nama Siswa</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}">
                        </div>
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="text" class="form-control" id="nisn" name="nisn" value="{{$data->nisn}}">
                        </div>
                        {{-- <div class="form-group">
                            <label for="kelas" class="form-label">Kelas</label>
                            <select class="form-control" id="kelas"  name="kelas">
                                <option value="8A" {{ $data->kelas == '8A' ? 'selected' : '' }}>8A</option>
                                <option value="9A" {{ $data->kelas == '9A' ? 'selected' : '' }}>9A</option>
                                <option value="7A" {{ $data->kelas == '7A' ? 'selected' : '' }}>7A</option>
                                <option value="7B" {{ $data->kelas == '7B' ? 'selected' : '' }}>7B</option>
                                <option value="8B" {{ $data->kelas == '8B' ? 'selected' : '' }}>8B</option>
                                <option value="9B" {{ $data->kelas == '9B' ? 'selected' : '' }}>9B</option>
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label for="kelas" class="form-label">Kelas</label>
                            <select class="form-control" id="kelas"  name="kelas">
                                @foreach($kelasList as $kelas)
                                    <option value="{{ $kelas }}" {{ $data->kelas == $kelas ? 'selected' : '' }}>{{ $kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="form-group">
                            <label for="tujuan">Tujuan</label>
                            <input type="text" class="form-control" id="tujuan" name="tujuan" value="{{ Auth::user()->name }}" readonly>

                        </div> --}}

                        <div class="form-group">
                            <label for="namaOrangTua">Nama Orang Tua</label>
                            <input type="text" class="form-control" id="namaOrangTua" name="namaOrangTua" value="{{$data->namaOrangTua}}">
                        </div>
                        <div class="form-group">
                            <label for="noTelpOrangTua">Nomor Handphone Orang Tua</label>
                            <input type="text" class="form-control" id="noTelpOrangTua" name="noTelpOrangTua" value="{{$data->noTelpOrangTua}}">
                        </div>

                        <!-- Tanggal Surat -->
                        <input type="hidden" value="{{ Auth::user()->id }}" name="guru_id">

                        <!-- Nomor Surat -->


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
