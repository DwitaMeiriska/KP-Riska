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
            <input type="number" class="form-control" id="user_id" name="user_id" value="{{ $surat->user_id }}" required>
        </div>

        <div class="mb-3">
            <label for="kode_surat" class="form-label">Kode Surat</label>
            <input type="text" class="form-control" id="kode_surat" name="kode_surat" value="{{ $surat->kode_surat }}" required>
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

        {{-- <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="masuk" {{ $surat->status == 'masuk' ? 'selected' : '' }}>Masuk</option>
                <option value="keluar" {{ $surat->status == 'keluar' ? 'selected' : '' }}>Keluar</option>
            </select>
        </div> --}}

        <div class="mb-3">
            <label for="file_surat" class="form-label">File Surat (Opsional)</label>
            <input type="file" class="form-control" id="file_surat" name="file_surat">
        </div>

        <button type="submit" class="btn btn-primary">Update Surat</button>
    </form>
</div>
@endsection
