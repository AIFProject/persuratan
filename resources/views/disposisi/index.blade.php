@extends('layouts.admin')
@section('title', 'Disposisi')
@section('breadcrumb')
    <li class="breadcrumb-item active">Disposisi</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Disposisi</h5>
            <a href="{{ route('disposisi.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle"></i> Tambah Disposisi
            </a>
        </div>
        <div class="card-body">
            <form method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control"
                        placeholder="Cari nomor surat, pengirim, atau tujuan disposisi..." value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nomor Surat Masuk</th>
                            <th>Pengirim</th>
                            <th>Tujuan Disposisi</th>
                            <th>Status</th>
                            <th>Tanggal Disposisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($disposisi as $index => $d)
                            <tr>
                                <td>{{ $disposisi->firstItem() + $index }}</td>
                                <td>{{ $d->suratMasuk->nomor_surat }}</td>
                                <td>{{ $d->suratMasuk->pengirim }}</td>
                                <td>{{ $d->tujuan_disposisi }}</td>
                                <td>
                                    @if($d->status == 'Belum Diproses')
                                        <span class="badge bg-secondary">Belum Diproses</span>
                                    @elseif($d->status == 'Diproses')
                                        <span class="badge bg-warning text-dark">Diproses</span>
                                    @else
                                        <span class="badge bg-success">Selesai</span>
                                    @endif
                                </td>
                                <td>{{ $d->tanggal_disposisi->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('disposisi.show', $d->id) }}" class="btn btn-sm btn-info"><i
                                            class="bi bi-eye"></i></a>
                                    <a href="{{ route('disposisi.edit', $d->id) }}" class="btn btn-sm btn-warning"><i
                                            class="bi bi-pencil"></i></a>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $d->id }}"><i class="bi bi-trash"></i></button>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="deleteModal{{ $d->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Yakin ingin menghapus disposisi untuk surat nomor
                                                    <strong>{{ $d->suratMasuk->nomor_surat }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('disposisi.destroy', $d->id) }}" method="POST">
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
                                <td colspan="7" class="text-center">Tidak ada data disposisi</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $disposisi->links() }}
        </div>
    </div>
@endsection