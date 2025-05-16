@extends('guru.template.template')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $totalSurat }}</h3>
                        <p>Total Surat</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            {{-- <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $totalSuratMasuk }}</h3>
                        <p>Total Surat masuk</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div> --}}

            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $latestIzinMasuk->surat->tanggal_surat ?? 'N/A' }}</h3>
                        <p>Tanggal Surat Izin Terbaru</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $oldestIzinMasuk->surat->tanggal_surat ?? 'N/A' }}</h3>
                        <p>Tanggal Surat Izin Terlama</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">
                    <a href="{{ Route('guru.tambahSuratIzin') }}"><button class="btn btn-primary">Tambah +</button></a>
                </h3>
            </div>

                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                {{-- <div class="dt-buttons btn-group flex-wrap"> <button
                                        class="btn btn-secondary buttons-copy buttons-html5" tabindex="0"
                                        aria-controls="example1" type="button"><span>Copy</span></button> <button
                                        class="btn btn-secondary buttons-csv buttons-html5" tabindex="0"
                                        aria-controls="example1" type="button"><span>CSV</span></button> <button
                                        class="btn btn-secondary buttons-excel buttons-html5" tabindex="0"
                                        aria-controls="example1" type="button"><span>Excel</span></button> <button
                                        class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0"
                                        aria-controls="example1" type="button"><span>PDF</span></button> <button
                                        class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1"
                                        type="button"><span>Print</span></button>
                                    <div class="btn-group"><button
                                            class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis"
                                            tabindex="0" aria-controls="example1" type="button"
                                            aria-haspopup="true"><span>Column visibility</span><span
                                                class="dt-down-arrow"></span></button></div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search"
                                            class="form-control form-control-sm" placeholder=""
                                            aria-controls="example1"></label></div>
                            </div> --}}
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                            rowspan="1" colspan="1"
                                            aria-label="Nama Siswa: activate to sort column descending"
                                            aria-sort="ascending">Nama Siswa</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                            rowspan="1" colspan="1"
                                            aria-label="NISN: activate to sort column descending"
                                            aria-sort="ascending">NISN</th>
                                            {{-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Kode Surat: activate to sort column ascending">
                                                Kode Surat
                                            </th> --}}
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Judul: activate to sort column ascending">Judul
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Kelas: activate to sort column ascending">Kelas
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Keterangan: activate to sort column ascending">
                                                Keterangan                                            </th>

                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Tanggal Surat: activate to sort column ascending">Tanggal
                                                Surat</th>

                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Status: activate to sort column ascending">
                                                Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="File: activate to sort column ascending">File
                                            </th>
                                            {{-- <th class="sorting" tabindex="0" aria-controls="example1"
                                            rowspan="1" colspan="1"
                                            aria-label="Aksi: activate to sort column ascending">Aksi</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <p>{{$data}}</p>
                                        @foreach ($data as $surat)
                                            <tr>
                                                <td>{{ $surat->nama_siswa }}</td>
                                                <td>{{ $surat->nisn }}</td>
                                                {{-- <td>{{ $surat->surat->kode_surat }}</td> --}}
                                                <td>{{ $surat->surat->judul }}</td>
                                                {{-- <td>{{ $surat->tujuan }}</td> --}}
                                                {{-- <td>{{ $surat->pengirim }}</td> --}}
                                                {{-- <td>{{ $surat->user->name ?? 'Tidak ada pengguna' }}</td> --}}
                                                <td>{{ $surat->surat->guru->kelas ?? '-' }}</td>
                                                <td>{{ $surat->keterangan }}</td>
                                                <td>{{ $surat->surat->tanggal_surat }}</td>
                                                {{-- <td>{{ $surat->no_surat }}</td> --}}
                                                <td>{{ $surat->status }}</td>
                                                {{-- <td>{{ $surat->jenis_surat }}</td> --}}
                                                <td><a href="{{ route('guru.lihat', $surat->id_surat) }}">
                                                        <button class="btn btn-sm btn-primary">Lihat</button>
                                                    </a></td>
                                                {{-- <td>
                                                <a href="{{ route('surat.edit', $surat->id_surat) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('surat.delete', $surat->id_surat) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus surat ini?')">Delete</button>
                                                </form>
                                            </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">Nama Siswa</th>
                                            <th rowspan="1" colspan="1">NISN</th>
                                            {{-- <th rowspan="1" colspan="1">Kode Surat</th> --}}
                                            <th rowspan="1" colspan="1">Judul</th>
                                            <th rowspan="1" colspan="1">Kelas</th>
                                            <th rowspan="1" colspan="1">Keterangan</th>
                                            {{-- <th rowspan="1" colspan="1">Pengirim</th>
                                            <th rowspan="1" colspan="1">User</th> --}}
                                            <th rowspan="1" colspan="1">Tanggal Surat</th>
                                            {{-- <th rowspan="1" colspan="1">No Surat</th> --}}
                                            <th rowspan="1" colspan="1">Status</th>
                                            {{-- <th rowspan="1" colspan="1">Jenis Surat</th> --}}
                                            <th rowspan="1" colspan="1">File</th>
                                            {{-- <th rowspan="1" colspan="1">Aksi</th> --}}
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        {{-- <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                    Menampilkan {{ $data->firstItem() }} sampai {{ $data->lastItem() }} dari total
                                    {{ $data->total() }} surat
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                    {{ $data->links() }}
                                </div>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                    Menampilkan {{ $data->firstItem() }} sampai {{ $data->lastItem() }} dari total
                                    {{ $data->total() }} surat
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                    <nav aria-label="Page navigation example">

                                            {{ $data->links('pagination::bootstrap-4') }}


                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
