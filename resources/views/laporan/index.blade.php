@extends('layouts.admin')
@section('title', 'Laporan')
@section('breadcrumb')
    <li class="breadcrumb-item active">Laporan</li>
@endsection
@section('content')
    <div class="container-fluid">
        {{-- Header & Statistik Laporan --}}
        <div class="surat-overview mb-4">
            {{-- Dekorasi --}}
            <div class="surat-overview-decoration surat-overview-decoration-1"></div>
            <div class="surat-overview-decoration surat-overview-decoration-2"></div>
            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
                <div>
                    <h3 class="fw-bold mb-1 text-white">
                        <i class="bi bi-file-earmark-text-fill me-2"></i>
                        Laporan Surat
                    </h3>
                    <p class="mb-0 text-white-50">
                        Cetak laporan surat masuk dan surat keluar
                        berdasarkan rentang tanggal.
                    </p>
                </div>
            </div>
            {{-- Statistik --}}
            <div class="row g-3">
                <div class="col-12">
                    <div class="surat-stat-card">
                        <div class="surat-stat-icon">
                            <i class="bi bi-file-earmark-pdf"></i>
                        </div>
                        <div>
                            <small>Modul Laporan</small>
                            <h3>
                                Cetak Laporan PDF
                            </h3>
                            <span>
                                Buat dan cetak laporan surat masuk dan surat keluar
                                berdasarkan rentang tanggal.
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Surat Masuk -->
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="fw-semibold mb-0">
                            <i class="bi bi-box-arrow-in-down text-primary me-2"></i>
                            Laporan Surat Masuk
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('laporan.surat-masuk') }}" method="GET" target="_blank">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Tanggal Awal
                                </label>
                                <input type="date" name="start_date" class="form-control" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    Tanggal Akhir
                                </label>
                                <input type="date" name="end_date" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="bi bi-file-earmark-pdf-fill me-2"></i>
                                Cetak PDF Surat Masuk
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Surat Keluar -->
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="fw-semibold mb-0">
                            <i class="bi bi-box-arrow-up-right text-success me-2"></i>
                            Laporan Surat Keluar
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('laporan.surat-keluar') }}" method="GET" target="_blank">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Tanggal Awal
                                </label>
                                <input type="date" name="start_date" class="form-control" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    Tanggal Akhir
                                </label>
                                <input type="date" name="end_date" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100">
                                <i class="bi bi-file-earmark-pdf-fill me-2"></i>
                                Cetak PDF Surat Keluar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Informasi -->
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="me-3">
                        <i class="bi bi-info-circle-fill text-primary" style="font-size:2rem;"></i>
                    </div>
                    <div>
                        <h5 class="fw-semibold mb-2">
                            Informasi
                        </h5>
                        <p class="text-secondary mb-2">
                            Gunakan rentang tanggal untuk menghasilkan laporan
                            sesuai periode yang diinginkan.
                        </p>
                        <ul class="text-secondary mb-0">
                            <li>
                                Laporan akan terbuka pada tab baru.
                            </li>
                            <li>
                                Format laporan berupa PDF siap cetak.
                            </li>
                            <li>
                                Pastikan tanggal awal tidak melebihi tanggal akhir.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection