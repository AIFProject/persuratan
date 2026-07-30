@extends('layouts.admin')
@section('title', 'Arsip Surat')
@section('breadcrumb')
    <li class="breadcrumb-item active">Arsip</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Arsip Seluruh Surat</h5>
        </div>
        <div class="card-body">
            <!-- Form Filter -->
            <form method="GET" class="row g-3 mb-4">
                <div class="col-md-3">
                    <input type="text" name="nomor_surat" class="form-control" placeholder="Nomor Surat"
                        value="{{ request('nomor_surat') }}">
                </div>
                <div class="col-md-3">
                    <input type="text" name="pengirim" class="form-control" placeholder="Pengirim (surat masuk)"
                        value="{{ request('pengirim') }}">
                </div>
                <div class="col-md-3">
                    <input type="text" name="tujuan" class="form-control" placeholder="Tujuan (surat keluar)"
                        value="{{ request('tujuan') }}">
                </div>
                <div class="col-md-3">
                    <input type="text" name="perihal" class="form-control" placeholder="Perihal"
                        value="{{ request('perihal') }}">
                </div>
                <div class="col-md-2">
                    <select name="bulan" class="form-select">
                        <option value="">Semua Bulan</option>
                        @for($m = 1; $m <= 12; $m++)
                            <option value="{{ $m }}" {{ request('bulan') == $m ? 'selected' : '' }}>
                                {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="tahun" class="form-select">
                        <option value="">Semua Tahun</option>
                        @for($y = date('Y'); $y >= 2020; $y--)
                            <option value="{{ $y }}" {{ request('tahun') == $y ? 'selected' : '' }}>{{ $y }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100"><i class="bi bi-search"></i> Cari</button>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('arsip.index') }}" class="btn btn-secondary w-100">Reset</a>
                </div>
            </form>

            <!-- Tabel -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Jenis</th>
                            <th>Nomor Surat</th>
                            <th>Tanggal</th>
                            <th>Asal / Tujuan</th>
                            <th>Perihal</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($results as $index => $item)
                            <tr>
                                <td>{{ $results->firstItem() + $index }}</td>
                                <td>
                                    @if($item->jenis == 'masuk')
                                        <span class="badge bg-primary">Masuk</span>
                                    @else
                                        <span class="badge bg-success">Keluar</span>
                                    @endif
                                </td>
                                <td>{{ $item->nomor_surat }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
                                <td>{{ $item->asal_tujuan }}</td>
                                <td>{{ $item->perihal }}</td>
                                <td>
                                    @if($item->file_surat)
                                        @if($item->jenis == 'masuk')
                                            <a href="{{ route('surat-masuk.download', $item->id) }}"
                                                class="btn btn-sm btn-outline-success">
                                                <i class="bi bi-download"></i> PDF
                                            </a>
                                        @else
                                            <a href="{{ route('surat-keluar.download', $item->id) }}"
                                                class="btn btn-sm btn-outline-success">
                                                <i class="bi bi-download"></i> PDF
                                            </a>
                                        @endif
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada surat ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $results->links() }}
        </div>
    </div>
@endsection