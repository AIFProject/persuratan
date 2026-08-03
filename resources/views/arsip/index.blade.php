@extends('layouts.admin')
@section('title', 'Arsip Surat')
@section('breadcrumb')
    <li class="breadcrumb-item active">Arsip</li>
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">
                    <i class="bi bi-archive-fill text-primary me-2"></i>
                    Arsip Surat
                </h3>
                <p class="text-secondary mb-0">
                    Kelola seluruh arsip surat masuk dan surat keluar MTsN 1 Banyuwangi.
                </p>
            </div>
        </div>
        <!-- Statistik & Filter -->
        <div class="row mb-4">
            <!-- Card Statistik -->
            <div class="col-lg-3 mb-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center"
                            style="width:60px;height:60px;">
                            <span class="material-symbols-outlined">
                                archive
                            </span>
                        </div>
                        <div class="ms-3">
                            <small class="text-secondary">
                                Total Arsip
                            </small>
                            <h3 class="fw-bold mb-0">
                                {{ $results->total() }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Filter -->
            <div class="col-lg-9">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0">
                        <h6 class="fw-semibold mb-0">
                            <i class="bi bi-funnel-fill me-2"></i>
                            Filter Arsip
                        </h6>
                    </div>
                    <div class="card-body">
                        <form method="GET">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">
                                        Nomor Surat
                                    </label>
                                    <input type="text" name="nomor_surat" class="form-control"
                                        placeholder="Masukkan nomor surat" value="{{ request('nomor_surat') }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">
                                        Pengirim
                                    </label>
                                    <input type="text" name="pengirim" class="form-control" placeholder="Surat Masuk"
                                        value="{{ request('pengirim') }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">
                                        Tujuan
                                    </label>
                                    <input type="text" name="tujuan" class="form-control" placeholder="Surat Keluar"
                                        value="{{ request('tujuan') }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">
                                        Perihal
                                    </label>
                                    <input type="text" name="perihal" class="form-control" placeholder="Perihal surat"
                                        value="{{ request('perihal') }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">
                                        Bulan
                                    </label>
                                    <select class="form-select" name="bulan">
                                        <option value="">Semua Bulan</option>
                                        <option value="1" {{ request('bulan') == 1 ? 'selected' : '' }}>Januari</option>
                                        <option value="2" {{ request('bulan') == 2 ? 'selected' : '' }}>Februari</option>
                                        <option value="3" {{ request('bulan') == 3 ? 'selected' : '' }}>Maret</option>
                                        <option value="4" {{ request('bulan') == 4 ? 'selected' : '' }}>April</option>
                                        <option value="5" {{ request('bulan') == 5 ? 'selected' : '' }}>Mei</option>
                                        <option value="6" {{ request('bulan') == 6 ? 'selected' : '' }}>Juni</option>
                                        <option value="7" {{ request('bulan') == 7 ? 'selected' : '' }}>Juli</option>
                                        <option value="8" {{ request('bulan') == 8 ? 'selected' : '' }}>Agustus</option>
                                        <option value="9" {{ request('bulan') == 9 ? 'selected' : '' }}>September</option>
                                        <option value="10" {{ request('bulan') == 10 ? 'selected' : '' }}>Oktober</option>
                                        <option value="11" {{ request('bulan') == 11 ? 'selected' : '' }}>November</option>
                                        <option value="12" {{ request('bulan') == 12 ? 'selected' : '' }}>Desember</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">
                                        Tahun
                                    </label>
                                    <select class="form-select" name="tahun">
                                        <option value="">Semua Tahun</option>
                                        <option value="2026" {{ request('tahun') == 2026 ? 'selected' : '' }}>2026</option>
                                        <option value="2025" {{ request('tahun') == 2025 ? 'selected' : '' }}>2025</option>
                                        <option value="2024" {{ request('tahun') == 2024 ? 'selected' : '' }}>2024</option>
                                        <option value="2023" {{ request('tahun') == 2023 ? 'selected' : '' }}>2023</option>
                                        <option value="2022" {{ request('tahun') == 2022 ? 'selected' : '' }}>2022</option>
                                        <option value="2021" {{ request('tahun') == 2021 ? 'selected' : '' }}>2021</option>
                                        <option value="2020" {{ request('tahun') == 2020 ? 'selected' : '' }}>2020</option>
                                    </select>
                                </div>
                                <div class="col-md-3 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="bi bi-search me-2"></i>
                                        Cari Data
                                    </button>
                                </div>
                                <div class="col-md-3 d-flex align-items-end">
                                    <a href="{{ route('arsip.index') }}" class="btn btn-outline-secondary w-100">
                                        <i class="bi bi-arrow-clockwise me-2"></i>
                                        Reset
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tabel -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="fw-semibold mb-1">
                            Daftar Arsip Surat
                        </h5>
                        <small class="text-secondary">
                            Menampilkan
                            {{ $results->count() }}
                            data arsip
                        </small>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                {{  get_class($results) }}
                <table class="table table-hover align-middle mb-0">
                    <thead style="background:#f8fafc;">
                        <tr>
                            <th width="60">No</th>
                            <th>Jenis</th>
                            <th>Nomor Surat</th>
                            <th>Tanggal</th>
                            <th>Asal / Tujuan</th>
                            <th>Perihal</th>
                            <th width="130" class="text-center">File</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($results as $index => $item)
                            <tr>
                                <td>
                                    <span class="fw-semibold">
                                        {{ $results->firstItem() + $index }}
                                    </span>
                                </td>
                                <td>
                                    @if($item->jenis == 'masuk')
                                        <span class="badge rounded-pill bg-primary px-3 py-2">
                                            <i class="bi bi-box-arrow-in-down me-1"></i>
                                            Surat Masuk
                                        </span>
                                    @else
                                        <span class="badge rounded-pill bg-success px-3 py-2">
                                            <i class="bi bi-box-arrow-up-right me-1"></i>
                                            Surat Keluar
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-semibold text-dark">
                                        {{ $item->nomor_surat }}
                                    </div>
                                    <small class="text-secondary">
                                        ID #{{ $item->id }}
                                    </small>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}
                                    </span>
                                </td>
                                <td>
                                    <div class="fw-semibold">
                                        {{ $item->asal_tujuan }}
                                    </div>
                                </td>
                                <td>
                                    {{ $item->perihal }}
                                </td>
                                <td class="text-center">
                                    @if($item->file_surat)
                                        @if($item->jenis == 'masuk')
                                            <a href="{{ route('surat-masuk.download', $item->id) }}"
                                                class="badge rounded-pill text-bg-success text-decoration-none px-3 py-2">
                                                <i class="bi bi-file-earmark-pdf-fill me-1"></i>
                                                PDF
                                            </a>
                                        @else
                                            <a href="{{ route('surat-keluar.download', $item->id) }}"
                                                class="badge rounded-pill text-bg-success text-decoration-none px-3 py-2">
                                                <i class="bi bi-file-earmark-pdf-fill me-1"></i>
                                                PDF
                                            </a>
                                        @endif
                                    @else
                                        <span class="badge rounded-pill text-bg-secondary px-3 py-2">
                                            <i class="bi bi-file-earmark-x me-1"></i>
                                            Tidak Ada
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <div class="text-center py-5">
                                        <i class="bi bi-archive" style="font-size:72px;color:#cbd5e1;"></i>
                                        <h5 class="fw-semibold mt-3">
                                            Arsip Tidak Ditemukan
                                        </h5>
                                        <p class="text-secondary mb-4">
                                            Tidak ada data arsip yang sesuai dengan filter pencarian.
                                        </p>
                                        <a href="{{ route('arsip.index') }}" class="btn btn-primary">
                                            <i class="bi bi-arrow-clockwise me-2"></i>
                                            Tampilkan Semua Arsip
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Footer -->
            <div class="card-footer bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <small class="text-secondary">
                            Menampilkan
                            <strong>
                                {{ $results->firstItem() ?? 0 }}
                            </strong>
                            -
                            <strong>
                                {{ $results->lastItem() ?? 0 }}
                            </strong>
                            dari
                            <strong>
                                {{ $results->total() }}
                            </strong>
                            data arsip.
                        </small>
                    </div>
                    <div class="col-md-6 d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                        {{ $results->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection