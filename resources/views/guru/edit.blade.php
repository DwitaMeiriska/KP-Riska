@extends('admin.template.template')

@section('content')
<div class="container">
    <h1>Edit Surat</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('surat.update', $surat->id_surat) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input type="number" class="form-control" id="user_id" name="user_id" value="{{ $surat->user_id }}" readonly>
        </div>
        <div class="form-group">
            <label for="kode_surat">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{$surat->judul}}" required>
        </div>
        <div class="mb-3">
            <label for="kode_surat" class="form-label">Kode Surat</label>
            <input type="text" class="form-control" id="kode_surat" name="kode_surat" value="{{ $surat->kode_surat }}" required>
        </div>
        <div class="form-group">
            <label for="tujuan">Tujuan</label>
            <input type="text" class="form-control" id="tujuan" name="tujuan" value="{{$surat->tujuan}}" required>
        </div>
        <div class="form-group">
            <label for="pengirim">Pengirim</label>
            <input type="text" class="form-control" id="pengirim" name="pengirim" value="{{ $surat->pengirim }}" required>
        </div>
        <div class="mb-3">
            <label for="kode_surat" class="form-label">Tujuan</label>
            <input type="text" class="form-control" id="kode_surat" name="tujuan" value="{{ $surat->tujuan }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
            <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" value="{{ $surat->tanggal_surat }}" required>
        </div>

        <div class="mb-3">
            <label for="no_surat" class="form-label">Nomor Surat</label>
            <input type="text" class="form-control" id="no_surat" name="no_surat" value="{{ $surat->no_surat }}" required>
        </div>

        <div class="mb-3">
            <label for="jenis_surat" class="form-label">Status</label>
            <select class="form-control" id="jenis_surat" name="jenis_surat">
                <option value="izin_sekolah" {{ $surat->jenis_surat == 'izin_sekolah' ? 'selected' : '' }}>Masuk</option>
                <option value="undangan" {{ $surat->jenis_surat == 'undangan' ? 'selected' : '' }}>Undangan</option>
                <option value="keputusan" {{ $surat->jenis_surat == 'keputusan' ? 'selected' : '' }}>Keputusan</option>
                <option value="edaran" {{ $surat->jenis_surat == 'edaran' ? 'selected' : '' }}>Edaran</option>
                <option value="tugas" {{ $surat->jenis_surat == 'tugas' ? 'selected' : '' }}>Tugas</option>
                <option value="permohonan" {{ $surat->jenis_surat == 'permohonan' ? 'selected' : '' }}>Permohonan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="file_surat" class="form-label">File Surat (Opsional)</label>
            <input type="file" class="form-control" id="file_surat" name="file_surat">
        </div>

        <button type="submit" class="btn btn-primary">Update Surat</button>
    </form>
</div>
@endsection
