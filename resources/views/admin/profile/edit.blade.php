@extends('admin.template.template')

@section('content')
<div class="container">
    <h1>Edit Profil Sekolah</h1>

    <form action="{{ route('admin.updateProfile', $profile->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
            <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" value="{{ $profile->nama_sekolah ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="visi" class="form-label">Visi</label>
            <textarea class="form-control" id="visi" name="visi" required>{{ $profile->visi ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label for="misi" class="form-label">Misi</label>
            <textarea class="form-control" id="misi" name="misi" required>{{ $profile->misi ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $profile->alamat ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $profile->telepon ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $profile->email ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ $profile->deskripsi ?? '' }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
