@extends('kepala.template.template')
@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        {{-- <div class="col">
            <a href="#" class="btn btn-primary">Tambah Guru +</a>
        </div> --}}
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Guru</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Guru</th>
                        <th>Email</th>
                        <th>NIP</th>
                        <th>Kelas</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $n=0;
                    @endphp
                    @forelse ($guru as $index => $g)
                        @php
                            $n++;
                        @endphp
                        <tr>
                            <td>{{ $n }}</td>
                            <td>{{ $g->user->name ?? 'Tidak ada user' }}</td>
                            <td>{{ $g->user->email ?? '-' }}</td>
                            <td>{{ $g->nip }}</td>
                            <td>{{ $g->kelas }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Data guru belum tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- <div class="mt-3">
                {{ $guru->links() }}
            </div> --}}
        </div>
    </div>
</div>
@endsection
