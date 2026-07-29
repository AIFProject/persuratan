@extends('layouts.admin')
@section('title', 'Surat Masuk')
@section('breadcrumb')
    <li class="breadcrumb-item active">Surat Masuk</li>
@endsection
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Surat Masuk</h5>
        <a href="{{ route('surat-masuk.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i>
            Tambah</a>
    </div>
    <div class="card-body">
        <form method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari nomor, pengirim, perihal..."
                    value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nomor Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Pengirim</th>
                        <th>Perihal</th>
                        <th>File</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($suratMasuk as $index => $sm)
                        <tr>
                            <td>{{ $suratMasuk->firstItem() + $index }}</td>
                            <td>{{ $sm->nomor_surat }}</td>
                            <td>{{ $sm->tanggal_surat->format('d/m/Y') }}</td>
                            <td>{{ $sm->pengirim }}</td>
                            <td>{{ $sm->perihal }}</td>
                            <td>
                                @if($sm->file_surat)
                                    <a href="{{ route('surat-masuk.download', $sm->id) }}"
                                        class="btn btn-sm btn-outline-success"><i class="bi bi-download"></i> PDF</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('surat-masuk.show', $sm->id) }}" class="btn btn-sm btn-info"><i
                                        class="bi bi-eye"></i></a>
                                <a href="{{ route('surat-masuk.edit', $sm->id) }}" class="btn btn-sm btn-warning"><i
                                        class="bi bi-pencil"></i></a>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $sm->id }}"><i class="bi bi-trash"></i></button>
                                <!-- Modal Konfirmasi -->
                                <div class="modal fade" id="deleteModal{{ $sm->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">Yakin ingin menghapus surat nomor
                                                <strong>{{ $sm->nomor_surat }}</strong>?</div>
                                            <div class="modal-footer">
                                                <form action="{{ route('surat-masuk.destroy', $sm->id) }}" method="POST">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada surat masuk</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $suratMasuk->links() }}
    </div>
</div>
@endsection