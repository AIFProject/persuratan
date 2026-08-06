@extends('layouts.admin')
@section('title', 'Detail Surat Keputusan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('surat-keputusan.index') }}">Surat Keputusan</a></li>
    <li class="breadcrumb-item active">Detail</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="mb-0">Detail Surat Keputusan</h5>
            <div>
                <a href="{{ route('surat-keputusan.edit', $suratKeputusan->id) }}" class="btn btn-warning btn-sm"><i
                        class="bi bi-pencil"></i> Edit</a>
                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal"><i
                        class="bi bi-trash"></i> Hapus</button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width:220px;"> Nomor SK </th>
                    <td> {{ $suratKeputusan->nomor_sk }} </td>
                </tr>
                <tr>
                    <th> Nama SK </th>
                    <td> {{ $suratKeputusan->nama_sk }} </td>
                </tr>
                <tr>
                    <th> Tanggal </th>
                    <td> {{ $suratKeputusan->tanggal->format('d/m/Y') }} </td>
                </tr>
                <tr>
                    <th> Perihal </th>
                    <td> {{ $suratKeputusan->perihal }} </td>
                </tr>
                <tr>
                    <th>File Surat</th>
                    <td>
                        @if($suratKeputusan->google_drive_url)
                            <a href="{{ route('surat-keputusan.download', $suratKeputusan) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-download"></i>
                                Download PDF
                            </a>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th> Dibuat </th>
                    <td> {{ $suratKeputusan->created_at->translatedFormat('d F Y H:i') }} WIB </td>
                </tr>
                <tr>
                    <th> Terakhir Diubah </th>
                    <td> {{ $suratKeputusan->updated_at->translatedFormat('d F Y H:i') }} WIB </td>
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
                    <form action="{{ route('surat-keputusan.destroy', $suratKeputusan->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
@endsection