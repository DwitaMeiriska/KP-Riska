@extends('kelas.template.template')

@section('content')
<section class="content">
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <script>
                setTimeout(function() {
                    $('#success-alert').alert('close');
                }, 5000);
            </script>
        @endif

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Surat Izin Siswa</h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID Surat</th>
                            <th>Nama Siswa</th>
                            <th>NISN</th>
                            <th>Kelas</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Lampiran</th>
                            <th>Tanggal Dibuat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $surat)
                            <tr>
                                <td>{{ $surat->id_surat }}</td>
                                <td>{{ $surat->nama_siswa }}</td>
                                <td>{{ $surat->nisn }}</td>
                                <td>{{ $surat->kelas }}</td>
                                <td>{{ $surat->keterangan }}</td>
                                <td>
                                    @if ($surat->status == 'belum')
                                        <span class="btn btn-warning">Belum</span>
                                    @elseif ($surat->status == 'diterima')
                                        <span class="btn btn-success">Diterima</span>
                                    @elseif ($surat->status == 'ditolak')
                                        <span class="btn btn-danger">Ditolak</span>
                                    @else
                                        <span class="btn btn-secondary">{{ $surat->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($surat->lampiran)
                                        <a href="{{ asset($surat->lampiran) }}" target="_blank" class="btn btn-sm btn-primary">Lihat</a>
                                    @else
                                        <span class="text-muted">Tidak ada</span>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($surat->created_at)->format('d M Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">Tidak ada data surat ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
