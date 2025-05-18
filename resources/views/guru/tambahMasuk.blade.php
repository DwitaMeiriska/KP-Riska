@extends('guru.template.template')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card card-primary mb-5">
                {{-- <button class="btn btn-lg btn-primary col-lg-6 p-3 mt-3" ><h1>Tambah Surat</h1></button> --}}
                <div class="card-header mt-3">
                    <h3 class="card-title">Tambah Surat Baru</h3>
                </div>
                <!-- form start -->
                <form action="{{ route('guru.storeMasuk') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <!-- User ID (Foreign key) -->
                        {{-- <div class="form-group">
                            <label for="user_id">User</label>
                            <select class="form-control" id="user_id" name="user_id">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}

                        <!-- Kode Surat -->
                        <div class="form-group">
                            <label for="kode_surat">Kode Surat</label>
                            <input type="text" class="form-control" id="kode_surat" name="kode_surat" placeholder="Masukkan kode surat" required>
                        </div>
                        <div class="form-group">
                            <label for="kode_surat">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul" required>
                        </div>
                        <div class="form-group">
                            <label for="tujuan">Tujuan</label>
                            <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Masukkan kode surat" required>
                        </div>
                        {{-- <div class="form-group">
                            <label for="pengirim">Pengirim</label>
                            <input type="text" class="form-control" id="pengirim" name="pengirim" placeholder="Masukkan Pengirim" required>
                        </div> --}}
                        <!-- Tanggal Surat -->
                        <div class="form-group">
                            <label for="tanggal_surat">Tanggal Surat</label>
                            <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" required>
                        </div>

                        <!-- Nomor Surat -->
                        <div class="form-group">
                            <label for="no_surat">Nomor Surat</label>
                            <input type="text" class="form-control" id="no_surat" name="no_surat" placeholder="Masukkan nomor surat" required>
                        </div>

                        <!-- File Surat -->
                        <div class="form-group">
                            <label for="file_surat">Upload File Surat</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file_surat" name="file_surat" required>
                                    <label class="custom-file-label" for="file_surat">Pilih file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jenis_surat" class="form-label">Jenis Surat</label>
                            <select class="form-control" id="jenis_surat" name="jenis_surat">
                                <option value="izin_sekolah">Masuk</option>
                                <option value="undangan">Undangan</option>
                                <option value="keputusan" >Keputusan</option>
                                <option value="edaran">Edaran</option>
                                <option value="tugas">Tugas</option>
                                <option value="permohonan">Permohonan</option>
                            </select>
                        </div>
                        <!-- Status Surat -->
                        {{-- <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="masuk">Masuk</option>
                                <option value="keluar">Keluar</option>
                            </select>
                        </div> --}}
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-12">
                <div class="card">


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
                                                    aria-label="Kode Surat: activate to sort column ascending">Kode Surat
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Judul: activate to sort column ascending">Judul
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Tujuan: activate to sort column ascending">Tujuan
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Pengirim: activate to sort column ascending">Pengirim
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
                                                    aria-label="Jenis Surat: activate to sort column ascending">Jenis Surat</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="File: activate to sort column ascending">File</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $surat)
                                                <tr>
                                                    {{-- <td>{{ $surat->id_surat }}</td> --}}
                                                    <td>{{ $surat->kode_surat }}</td>
                                                    <td>{{ $surat->judul }}</td>
                                                    <td>{{ $surat->tujuan }}</td>
                                                    <td>{{ $surat->pengirim }}</td>
                                                    <td>{{ $surat->user->name ?? 'Tidak ada pengguna' }}</td>
                                                    <td>{{ $surat->tanggal_surat }}</td>
                                                    <td>{{ $surat->no_surat }}</td>
                                                    <td>{{ ucfirst($surat->status) }}</td>
                                                    <td>{{ ucfirst($surat->jenis_surat)}}</td>
                                                    {{-- <td>{{ ucfirst($surat->acc) }}</td> --}}

                                                    </td>
                                                    <td><a href="{{ route('guru.lihat', $surat->id_surat) }}">
                                                            <button class="btn btn-sm btn-primary">Lihat</button>
                                                        </a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                {{-- <th rowspan="1" colspan="1">ID Surat</th> --}}
                                                <th rowspan="1" colspan="1">Kode Surat</th>
                                                <th rowspan="1" colspan="1">Judul</th>
                                                <th rowspan="1" colspan="1">Tujuan</th>
                                                <th rowspan="1" colspan="1">Pengirim</th>
                                                <th rowspan="1" colspan="1">User</th>
                                                <th rowspan="1" colspan="1">Tanggal Surat</th>
                                                <th rowspan="1" colspan="1">No Surat</th>
                                                <th rowspan="1" colspan="1">Status</th>
                                                <th rowspan="1" colspan="1">Jenis Surat</th>
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
    </div>
@endsection
