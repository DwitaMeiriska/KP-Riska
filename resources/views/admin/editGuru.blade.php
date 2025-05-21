@extends('admin.template.template')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="card card-primary">
                <div class="card-header mt-3">
                    <h3 class="card-title">Edit Data Guru</h3>
                </div>
                <form action="{{ route('admin.updateGuru', $guru->id) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="user_id">Nama Guru</label>
                            <select class="form-control" id="user_id" name="user_id" required>
                                @foreach($user as $usr)
                                    <option value="{{ $usr->id }}" {{ $guru->user_id == $usr->id ? 'selected' : '' }}>
                                        {{ $usr->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip" value="{{ $guru->nip }}" required>
                        </div>

                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $guru->kelas }}"
                                required>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('admin.guru') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
