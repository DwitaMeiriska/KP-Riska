@extends('admin.template.template')
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
                    // Setelah 5 detik, alert akan otomatis menghilang
                    setTimeout(function() {
                        $('#success-alert').alert('close');
                    }, 5000); // 5000ms = 5 detik
                </script>
            @endif

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

                <div class="col-lg-3 col-6">
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
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $latestMasuk->tanggal_surat ?? 'N/A' }}</h3>
                            <p>Tanggal Surat Masuk Terbaru</p>
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
                            <h3>{{ $oldestMasuk->tanggal_surat ?? 'N/A' }}</h3>
                            <p>Tanggal Surat Masuk Terlama</p>
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
                            <a href="{{ Route('admin.tambahmasuk') }}"><button class="btn btn-primary">Tambah +</button></a>
                        </h3>
                    </div>

                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dt-buttons btn-group flex-wrap"> <button
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
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                        aria-describedby="example1_info">
                                        <thead>
                                            <tr>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="ID Surat: activate to sort column descending"
                                                    aria-sort="ascending">ID Surat</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Kode Surat: activate to sort column ascending">Kode Surat
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="User: activate to sort column ascending">User
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Tanggal Surat: activate to sort column ascending">Tanggal
                                                    Surat</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="No Surat: activate to sort column ascending">No Surat</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Status: activate to sort column ascending">Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="File: activate to sort column ascending">File</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $surat)
                                                <tr>
                                                    <td>{{ $surat->id_surat }}</td>
                                                    <td>{{ $surat->kode_surat }}</td>
                                                    {{-- <td>{{ $surat->user_id }}</td> --}}
                                                    <td>{{ $surat->user->name ?? 'Tidak ada pengguna' }}</td>
                                                    <td>{{ $surat->tanggal_surat }}</td>
                                                    <td>{{ $surat->no_surat }}</td>
                                                    <td>{{ $surat->status }}</td>
                                                    <td><a href="{{ route('surat.lihat', $surat->id_surat) }}">
                                                        <button class="btn btn-sm btn-primary">Lihat</button>
                                                    </a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">ID Surat</th>
                                                <th rowspan="1" colspan="1">Kode Surat</th>
                                                <th rowspan="1" colspan="1">User</th>
                                                <th rowspan="1" colspan="1">Tanggal Surat</th>
                                                <th rowspan="1" colspan="1">No Surat</th>
                                                <th rowspan="1" colspan="1">Status</th>
                                                <th rowspan="1" colspan="1">File</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
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
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
