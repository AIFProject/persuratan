@extends('layouts.admin')
@section('title', 'Dashboard')
@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection
@section('content')
    <div class="dashboard-overview mb-4">
        <div class="overview-decoration overview-decoration-1"></div>
        <div class="overview-decoration overview-decoration-2"></div>

        <div class="overview-header">
            <div class="overview-welcome">
                <h2>Selamat Datang Kembali, Admin</h2>
                <p>Berikut ringkasan aktivitas sistem persuratan hari ini</p>
            </div>
            <div class="overview-actions">
                <div class="overview-date">
                    <i class="bi bi-calendar"></i>
                    {{ now()->translatedFormat('l, d F Y') }}
                </div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-12 col-sm-6 col-xl-3">
                <a href="{{ route('surat-masuk.index') }}" class="dashboard-stat-link">
                    <div class="dashboard-stat-card">
                        <div class="stat-top">
                            <div class="stat-icon">
                                <i class="bi bi-inbox"></i>
                            </div>
                            <span class="stat-arrow">
                                <i class="bi bi-arrow-up-right"></i>
                            </span>
                        </div>
                        <div class="stat-content">
                            <span class="stat-label">Surat Masuk</span>
                            <h3>{{ $totalMasuk }}</h3>
                            <small>Total surat masuk</small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <a href="{{ route('surat-keluar.index') }}" class="dashboard-stat-link">
                    <div class="dashboard-stat-card">
                        <div class="stat-top">
                            <div class="stat-icon">
                                <i class="bi bi-send"></i>
                            </div>
                            <span class="stat-arrow">
                                <i class="bi bi-arrow-up-right"></i>
                            </span>
                        </div>
                        <div class="stat-content">
                            <span class="stat-label">Surat Keluar</span>
                            <h3>{{ $totalKeluar }}</h3>
                            <small>Total surat keluar</small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <a href="{{ route('disposisi.index') }}" class="dashboard-stat-link">
                    <div class="dashboard-stat-card">
                        <div class="stat-top">
                            <div class="stat-icon">
                                <i class="bi bi-diagram-3"></i>
                            </div>
                            <span class="stat-arrow">
                                <i class="bi bi-arrow-up-right"></i>
                            </span>
                        </div>
                        <div class="stat-content">
                            <span class="stat-label">Disposisi</span>
                            <h3>{{ $totalDisposisi }}</h3>
                            <small>Total disposisi</small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <a href="{{ route('surat-keputusan.index') }}" class="dashboard-stat-link">
                    <div class="dashboard-stat-card">
                        <div class="stat-top">
                            <div class="stat-icon">
                                <i class="bi bi-file-earmark-check"></i>
                            </div>
                            <span class="stat-arrow">
                                <i class="bi bi-arrow-up-right"></i>
                            </span>
                        </div>
                        <div class="stat-content">
                            <span class="stat-label">Surat Keputusan</span>
                            <h3>{{ $totalSK }}</h3>
                            <small>Total surat keputusan</small>
                        </div>
                    </div>
                </a>
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
                        <li class="list-group-item d-flex justify-content-between" <span>
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