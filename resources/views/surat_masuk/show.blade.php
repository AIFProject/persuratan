@extends('layouts.admin')
@section('title', 'Detail Surat Masuk')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('surat-masuk.index') }}">Surat Masuk</a></li>
    <li class="breadcrumb-item active">Detail</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="mb-0">Detail Surat Masuk</h5>
            <div>
                <a href="{{ route('surat-masuk.edit', $suratMasuk->id) }}" class="btn btn-warning btn-sm"><i
                        class="bi bi-pencil"></i> Edit</a>
                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal"><i
                        class="bi bi-trash"></i> Hapus</button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 200px;">Nomor Surat</th>
                    <td>{{ $suratMasuk->nomor_surat }}</td>
                </tr>
                <tr>
                    <th>Tanggal Surat</th>
                    <td>{{ $suratMasuk->tanggal_surat->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <th>Tanggal Diterima</th>
                    <td>{{ $suratMasuk->tanggal_diterima->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <th>Pengirim</th>
                    <td>{{ $suratMasuk->pengirim }}</td>
                </tr>
                <tr>
                    <th>Perihal</th>
                    <td>{{ $suratMasuk->perihal }}</td>
                </tr>
                <tr>
                    <th>Sifat Surat</th>
                    <td>{{ $suratMasuk->sifat_surat }}</td>
                </tr>
                <tr>
                    <th>Klasifikasi</th>
                    <td>{{ $suratMasuk->klasifikasi }}</td>
                </tr>
                <tr>
                    <th>File</th>
                    <td>
                        @if($suratMasuk->file_surat)
                            <a href="{{ route('surat-masuk.download', $suratMasuk->id) }}"
                                class="btn btn-sm btn-outline-success"><i class="bi bi-download"></i> Download</a>
                        @else - @endif
                    </td>
                </tr>
                <tr>
                    <th>Keterangan</th>
                    <td>{{ $suratMasuk->keterangan ?? '-' }}</td>
                </tr>
            </table>
        </div>
    </div>
    <!-- Modal Hapus (sama seperti di index) -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">Yakin ingin menghapus surat ini?</div>
                <div class="modal-footer">
                    <form action="{{ route('surat-masuk.destroy', $suratMasuk->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
@endsection