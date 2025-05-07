@extends('admin.template.template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalGuru ?? 'N/A' }}</h3>
                    <h4 class="bold">Jumlah guru</h4>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <a href="{{ Route('admin.tambahGuru') }}"><button class="btn btn-primary">Tambah +</button></a>
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
                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="Nama: activate to sort column ascending">Nama
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="NIP: activate to sort column ascending">NIP
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="Kelas: activate to sort column ascending">Kelas
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $guru)
                                        <tr>
                                            <td>{{ $guru->user->name ?? 'Tidak ada pengguna' }}</td>
                                            <td>{{ $guru->nip }}</td>
                                            <td>{{ $guru->kelas }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Nama</th>
                                        <th rowspan="1" colspan="1">NIP</th>
                                        <th rowspan="1" colspan="1">Kelas</th>
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
@endsection
