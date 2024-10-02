@extends('admin.template.template')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card card-primary">
                <button class="btn btn-lg btn-primary col-lg-6 p-3 mt-3"><h1>Tambah Guru</h1></button>
                <div class="card-header mt-3">
                    <h3 class="card-title">Tambah Guru Baru</h3>
                </div>
                <!-- form start -->
                <form action="{{ route('admin.storeGuru') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <!-- Nama Guru (relasi dengan User) -->
                        <div class="form-group">
                            <label for="user_id">Nama Guru</label>
                            <select class="form-control" id="user_id" name="user_id" required>
                                @foreach($user as $usr)
                                    <option value="{{ $usr->id }}">{{ $usr->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- NIP -->
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP" required>
                        </div>

                        <!-- Kelas -->
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan kelas" required>
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
