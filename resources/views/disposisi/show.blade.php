@extends('layouts.admin')
@section('title', 'Detail Disposisi')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('disposisi.index') }}">Disposisi</a></li>
    <li class="breadcrumb-item active">Detail</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Detail Disposisi</h5>
            <div>
                <a href="{{ route('disposisi.edit', $disposisi->id) }}" class="btn btn-warning btn-sm"><i
                        class="bi bi-pencil"></i> Edit</a>
                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal"><i
                        class="bi bi-trash"></i> Hapus</button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 200px;">Nomor Surat Masuk</th>
                    <td>{{ $disposisi->suratMasuk->nomor_surat }}</td>
                </tr>
                <tr>
                    <th>Pengirim</th>
                    <td>{{ $disposisi->suratMasuk->pengirim }}</td>
                </tr>
                <tr>
                    <th>Tujuan Disposisi</th>
                    <td>{{ $disposisi->tujuan_disposisi }}</td>
                </tr>
                <tr>
                    <th>Isi Disposisi</th>
                    <td>{{ nl2br($disposisi->isi_disposisi) }}</td>
                </tr>
                <tr>
                    <th>Tanggal Disposisi</th>
                    <td>{{ $disposisi->tanggal_disposisi->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $disposisi->status }}</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Modal Hapus -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5><button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">Yakin ingin menghapus disposisi ini?</div>
                <div class="modal-footer">
                    <form action="{{ route('disposisi.destroy', $disposisi->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
@endsection