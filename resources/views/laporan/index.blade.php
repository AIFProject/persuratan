@extends('layouts.admin')
@section('title', 'Laporan')
@section('breadcrumb')
    <li class="breadcrumb-item active">Laporan</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><strong>Laporan Surat Masuk</strong></div>
                <div class="card-body">
                    <form action="{{ route('laporan.surat-masuk') }}" method="GET" target="_blank">
                        <div class="mb-3">
                            <label class="form-label">Tanggal Awal</label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Akhir</label>
                            <input type="date" name="end_date" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-file-earmark-pdf"></i> Cetak
                            PDF</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><strong>Laporan Surat Keluar</strong></div>
                <div class="card-body">
                    <form action="{{ route('laporan.surat-keluar') }}" method="GET" target="_blank">
                        <div class="mb-3">
                            <label class="form-label">Tanggal Awal</label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Akhir</label>
                            <input type="date" name="end_date" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success"><i class="bi bi-file-earmark-pdf"></i> Cetak
                            PDF</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection