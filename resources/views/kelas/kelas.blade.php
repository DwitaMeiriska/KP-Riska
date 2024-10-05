@extends("guru.template.template")

@section('content')
    <div class="container-fluid">
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
                    <div class="col-lg-4 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $totalSiswa }}</h3>
                                <p>Siswa</p>
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
                                <h3>{{ $totalSuratKeluar }}</h3>
                                <p>Total Surat Keluar</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div> --}}

                    <div class="col-lg-4 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $kelasName }}</h3>
                                <p>Kelas</p>
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
                                <a href="{{ Route('guru.tambahKelas') }}"><button class="btn btn-primary">Tambah +</button></a>
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
                                                    {{-- <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="ID Surat: activate to sort column descending"
                                                        aria-sort="ascending">ID Surat</th> --}}
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Name: activate to sort column ascending">Name
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="NISN: activate to sort column ascending">NISN
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Kelas: activate to sort column ascending">Kelas
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Nama Orang Tua: activate to sort column ascending">Nama Orang Tua
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="No HP Orang Tua: activate to sort column ascending">No HP Orang Tua
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Guru: activate to sort column ascending">Guru</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Aksi: activate to sort column ascending">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $dt)
                                                    <tr>
                                                        {{-- <td>{{ $dt->id_surat }}</td> --}}
                                                        <td>{{ $dt->name }}</td>
                                                        <td>{{ $dt->nisn }}</td>
                                                        <td>{{ $dt->kelas }}</td>
                                                        <td>{{ $dt->namaOrangTua }}</td>
                                                        <td>{{ $dt->noTelpOrangTua }}</td>
                                                        <td>{{ $dt->guru->user->name }}</td>
                                                        {{-- <td><a href="{{ route('dt.lihat', $dt->id_surat) }}">
                                                            <button class="btn btn-sm btn-primary">Lihat</button>
                                                        </a></td> --}}
                                                        <td>
                                                            <a href="{{ route('guru.editKelas', $dt->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                            <form action="{{ route('guru.deleteKelas', $dt->id) }}" method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus dt ini?')">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    {{-- <th rowspan="1" colspan="1">ID Surat</th> --}}
                                                    <th rowspan="1" colspan="1">Name</th>
                                                    <th rowspan="1" colspan="1">NISN</th>
                                                    <th rowspan="1" colspan="1">Kelas</th>
                                                    <th rowspan="1" colspan="1">Nama Orang Tua</th>
                                                    <th rowspan="1" colspan="1">No HP Orang Tua</th>
                                                    <th rowspan="1" colspan="1">Guru</th>
                                                    <th rowspan="1" colspan="1">Aksi</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                            Menampilkan {{ $data->firstItem() }} sampai {{ $data->lastItem() }} dari total
                                            {{ $data->total() }} siswa
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
    </div>
@endsection
