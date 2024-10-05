@extends('dashboard.template.template')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Profil Kepala Sekolah</h1>

    @if($profile)
        <div class="text-center mb-5">
            @if($profile->foto)
                <img src="{{ asset($profile->foto) }}" alt="{{ $profile->nama }}" class="img-fluid rounded-circle mb-4" style="width: 200px; height: 200px;">
            @endif
            <h2 class="font-weight-bold">{{ $profile->nama }}</h2>
            <p class="text-muted"><strong>NIP:</strong> {{ $profile->nip }}</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-body">
                        <h4 class="card-title">Visi</h4>
                        <p class="card-text">{{ $profile->visi ?? 'Belum tersedia' }}</p>
                    </div>
                </div>
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-body">
                        <h4 class="card-title">Misi</h4>
                        <p class="card-text">{{ $profile->misi ?? 'Belum tersedia' }}</p>
                    </div>
                </div>
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-body">
                        <h4 class="card-title">Riwayat Pendidikan</h4>
                        <p class="card-text">{{ $profile->riwayat_pendidikan ?? 'Belum tersedia' }}</p>
                    </div>
                </div>
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-body">
                        <h4 class="card-title">Biografi Singkat</h4>
                        <p class="card-text">{{ $profile->bio ?? 'Belum tersedia' }}</p>
                    </div>
                </div>
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-body">
                        <h4 class="card-title">Kontak</h4>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-phone-alt"></i> <strong>Telepon:</strong> {{ $profile->telepon ?? 'Belum tersedia' }}</li>
                            <li><i class="fas fa-envelope"></i> <strong>Email:</strong> {{ $profile->email ?? 'Belum tersedia' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-warning text-center">
            <p>Profil kepala sekolah belum tersedia.</p>
        </div>
    @endif
</div>
@endsection
