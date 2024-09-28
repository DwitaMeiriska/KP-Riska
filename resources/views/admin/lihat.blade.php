@extends('admin.template.template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h1>Detail Surat</h1>
            <table class="table table-bordered">
                <tr>
                    <th>ID Surat</th>
                    <td>{{ $surat->id_surat }}</td>
                </tr>
                <tr>
                    <th>Kode Surat</th>
                    <td>{{ $surat->kode_surat }}</td>
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
                    <th>File Surat</th>
                    <td>
                        <a href="{{ asset($surat->file_surat) }}" target="_blank">Lihat File</a>
                    </td>
                </tr>
            </table>
            <a href="{{ route('admin.template') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
