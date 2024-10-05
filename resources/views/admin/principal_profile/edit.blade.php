@extends('admin.template.template')

@section('content')
<div class="container">
    <h1>Edit Profil Kepala Sekolah</h1>

    <form action="{{ route('admin.updateKepala', $profile->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Kepala Sekolah</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $profile->nama ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip" value="{{ $profile->nip ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto Kepala Sekolah</label>
            <input type="file" class="form-control" id="foto" name="foto">
            @if($profile && $profile->foto)
                <img src="{{ asset( $profile->foto) }}" alt="{{ $profile->nama }}" class="img-thumbnail mt-3" width="150">
            @endif
        </div>

        <div class="mb-3">
            <label for="visi" class="form-label">Visi</label>
            <textarea class="form-control" id="visi" name="visi">{{ $profile->visi ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label for="misi" class="form-label">Misi</label>
            <textarea class="form-control" id="misi" name="misi">{{ $profile->misi ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label for="bio" class="form-label">Biografi Singkat</label>
            <textarea class="form-control" id="bio" name="bio">{{ $profile->bio ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $profile->telepon ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $profile->email ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="riwayat_pendidikan" class="form-label">Riwayat Pendidikan</label>
            <textarea class="form-control" id="riwayat_pendidikan" name="riwayat_pendidikan">{{ $profile->riwayat_pendidikan ?? '' }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
