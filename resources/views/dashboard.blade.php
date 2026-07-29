@extends('layouts.admin')
@section('title', 'Dashboard')
@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-envelope"></i> Surat Masuk
                    </h5>
                    <p class="card-text display-4">
                        {{ $totalMasuk }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-send"></i> Surat Keluar
                    </h5>
                    <p class="card-text display-4">
                        {{ $totalKeluar }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-arrow-left-right"></i> Disposisi
                    </h5>
                    <p class="card-text display-4">
                        {{ $totalDisposisi }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <strong>Surat Masuk Terbaru</strong>
                </div>
                <ul class="list-group list-group-flush">
                    @forelse ($totalMasukTerbaru as $sm)
                        <li class="list-group-item d-flex justify-content-between">
                            <span>
                                {{ $sm->nomor_surat }} - {{ $sm->pengirim }}
                            </span>
                            <small>
                                {{ $sm->tanggal_surat->format('d/m/Y') }}
                            </small>
                        </li>
                    @empty
                        <li class="list-group-item">
                            Belum ada surat masuk
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <strong>Surat Keluar Terbaru</strong>
                </div>
                <ul class="list-group list-group-flush">
                    @forelse ($totalKeluarTerbaru as $sk)
                        <li class="list-group-item d-flex justify-content-between"
                            <span>
                                {{ $sk->nomor_surat }} - {{ $sk->tujuan }}
                            </span>
                            <small>
                                {{ $sk->tanggal_surat->format('d/m/Y') }}
                            </small>
                        </li>
                    @empty
                        <li class="list-group-item">
                            Belum ada surat keluar
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

@endsection