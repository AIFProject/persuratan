@extends('layouts.admin')
@section('title', 'Surat Keluar')
@section('breadcrumb')
    <li class="breadcrumb-item active">Surat Keluar</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Surat Keluar</h5>
            <a href="{{ route('surat-keluar.create') }}" class="btn btn-primary btn-sk"><i class="bi bi-plus-circle"></i>
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
                            <th>Tujuan</th>
                            <th>Perihal</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($suratKeluar as $index => $sk)
                            <tr>
                                <td>{{ $suratKeluar->firstItem() + $index }}</td>
                                <td>{{ $sk->nomor_surat }}</td>
                                <td>{{ $sk->tanggal_surat->format('d/m/Y') }}</td>
                                <td>{{ $sk->tujuan }}</td>
                                <td>{{ $sk->perihal }}</td>
                                <td>
                                    @if($sk->file_surat)
                                        <a href="{{ route('surat-keluar.download', $sk->id) }}"
                                            class="btn btn-sk btn-outline-success"><i class="bi bi-download"></i> PDF</a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('surat-keluar.show', $sk->id) }}" class="btn btn-sk btn-info"><i
                                            class="bi bi-eye"></i></a>
                                    <a href="{{ route('surat-keluar.edit', $sk->id) }}" class="btn btn-sk btn-warning"><i
                                            class="bi bi-pencil"></i></a>
                                    <button type="button" class="btn btn-sk btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $sk->id }}"><i class="bi bi-trash"></i></button>
                                    <!-- Modal Konfirmasi -->
                                    <div class="modal fade" id="deleteModal{{ $sk->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-diskiss="modal"></button>
                                                </div>
                                                <div class="modal-body">Yakin ingin menghapus surat nomor
                                                    <strong>{{ $sk->nomor_surat }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('surat-keluar.destroy', $sk->id) }}" method="POST">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-diskiss="modal">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada surat keluar</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $suratKeluar->links() }}
        </div>
    </div>
@endsection