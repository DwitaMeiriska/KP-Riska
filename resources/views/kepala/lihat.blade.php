@extends('guru.template.template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h1>Detail Surat</h1>
            @if($surat)
            <table class="table table-bordered">
                <tr>
                    <th>Judul</th>
                    <td>{{ $surat->judul }}</td>
                </tr>
                <tr>
                    <th>Kode Surat</th>
                    <td>{{ $surat->kode_surat }}</td>
                </tr>
                <tr>
                    <th>Tujuan</th>
                    <td>{{ $surat->tujuan }}</td>
                </tr>
                <tr>
                    <th>Pengirim</th>
                    <td>{{ $surat->pengirim }}</td>
                </tr>
                <tr>
                    <th>Nama Pengguna</th>
                    <td>{{ $surat->user->name ?? 'Tidak ada pengguna' }}</td>
                </tr>
                <tr>
                    <th>Tanggal Surat</th>
                    <td>{{ $surat->tanggal_surat }}</td>
                </tr>
                <tr>
                    <th>No Surat</th>
                    <td>{{ $surat->no_surat }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $surat->status }}</td>
                </tr>
                <tr>
                    <th>Jenis surat</th>
                    <td>{{ $surat->jenis_surat }}</td>
                </tr>
                <tr>
                    <th>File Surat</th>
                    <td>
                        <a href="{{ asset($surat->file_surat) }}" target="_blank">Lihat File</a>
                    </td>
                </tr>
            </table>
            @endif
            @if($surat->status == "masuk")
                <a href="{{ route('guru.suratIzin') }}" class="btn btn-secondary">Kembali</a>
            {{-- @elseif($surat->status == "keluar")
                <a href="{{ route('admin.keluar') }}" class="btn btn-secondary">Kembali</a> --}}
            @else
            <p>Data belum ada:(</p>
            @endif
        </div>
    </div>
</div>
@endsection
