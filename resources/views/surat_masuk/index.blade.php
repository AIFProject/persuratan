@extends('layouts.admin')
@section('title', 'Surat Masuk')
@section('breadcrumb')
    <li class="breadcrumb-item active">Surat Masuk</li>
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">
                    <i class="bi bi-envelope-paper-fill text-primary me-2"></i>
                    Surat Masuk
                </h3>
                <p class="text-secondary mb-0">
                    Kelola seluruh data surat masuk MTsN 1 Banyuwangi.
                </p>
            </div>
            <a href="{{ route('surat-masuk.create') }}" class="btn btn-primary px-4">
                <i class="bi bi-plus-circle me-2"></i>
                Tambah Surat
            </a>
        </div>
        <!-- Statistik -->
        <div class="row mb-4">
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="rounded-circle bg-primary bg-opacity-10
                                        d-flex align-items-center justify-content-center" style="width:60px;height:60px;">
                            <i class="bi bi-envelope-paper-fill
                                            text-primary fs-3"></i>
                        </div>
                        <div class="ms-3">
                            <small class="text-secondary">
                                Total Surat
                            </small>
                            <h3 class="fw-bold mb-0">
                                {{ $suratMasuk->total() }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <form method="GET">
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" class="form-control border-start-0 ps-0" name="search"
                                    placeholder="Cari nomor surat, pengirim atau perihal..."
                                    value="{{ request('search') }}">
                                <button class="btn btn-primary">
                                    Cari
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Tabel -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="fw-semibold mb-1">
                            Daftar Surat Masuk
                        </h5>
                        <small class="text-secondary">
                            Menampilkan
                            {{ $suratMasuk->count() }}
                            data
                        </small>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-middle table-hover mb-0">
                    <thead style="background:#f8fafc;">
                        <tr>
                            <th width="60">No</th>
                            <th>Nomor Surat</th>
                            <th>Tanggal</th>
                            <th>Pengirim</th>
                            <th>Perihal</th>
                            <th width="120" class="text-center">
                                File
                            </th>
                            <th width="170" class="text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($suratMasuk as $index => $sm)
                            <tr>
                                <td>
                                    <span class="fw-semibold">
                                        {{ $suratMasuk->firstItem() + $index }}
                                    </span>
                                </td>
                                <td>
                                    <div class="fw-semibold text-dark">
                                        {{ $sm->nomor_surat }}
                                    </div>
                                    <small class="text-secondary">
                                        ID #{{ $sm->id }}
                                    </small>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        {{ $sm->tanggal_surat->format('d/m/Y') }}
                                    </span>
                                </td>
                                <td>
                                    <div class="fw-semibold">
                                        {{ $sm->pengirim }}
                                    </div>
                                </td>
                                <td>
                                    {{ $sm->perihal }}
                                </td>
                                <td class="text-center">
                                    @if($sm->file_surat)
                                        <a href="{{ route('surat-masuk.download', $sm->id) }}"
                                            class="badge rounded-pill text-bg-success text-decoration-none px-3 py-2">
                                            <i class="bi bi-file-earmark-pdf-fill me-1"></i>
                                            PDF
                                        </a>
                                    @else
                                        <span class="badge text-bg-secondary rounded-pill">
                                            Tidak Ada
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('surat-masuk.show', $sm->id) }}"
                                            class="btn btn-success border rounded-circle" title="Detail"
                                            style="width:40px;height:40px;">
                                            <i class="bi bi-eye text-primary"></i>
                                        </a>
                                        <a href="{{ route('surat-masuk.edit', $sm->id) }}"
                                            class="btn btn-warning border rounded-circle" title="Edit"
                                            style="width:40px;height:40px;">
                                            <i class="bi bi-pencil text-warning"></i>
                                        </a>
                                        <button class="btn btn-danger border rounded-circle" style="width:40px;height:40px;"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal{{ $sm->id }}">
                                            <i class="bi bi-trash text-danger"></i>
                                        </button>
                                    </div>
                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="deleteModal{{ $sm->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 shadow">
                                                <div class="modal-header border-0 pb-0">
                                                    <h5 class="modal-title">
                                                        <i class="bi bi-trash text-danger me-2"></i>
                                                        Hapus Surat
                                                    </h5>
                                                    <button class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body py-4">
                                                    <div class="text-center">
                                                        <i class="bi bi-exclamation-circle-fill
                                                        text-danger" style="font-size:55px;"></i>
                                                        <h5 class="mt-3">
                                                            Yakin ingin menghapus?
                                                        </h5>
                                                        <p class="text-secondary mb-0">
                                                            Surat
                                                            <strong>
                                                                {{ $sm->nomor_surat }}
                                                            </strong>
                                                            akan dihapus permanen.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-0">
                                                    <button class="btn btn-light" data-bs-dismiss="modal">
                                                        Batal
                                                    </button>
                                                    <form action="{{ route('surat-masuk.destroy', $sm->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger">
                                                            Ya, Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <div class="text-center py-5">
                                        <i class="bi bi-inbox" style="font-size:70px;color:#cbd5e1;"></i>
                                        <h5 class="mt-3">
                                            Belum Ada Surat Masuk
                                        </h5>
                                        <p class="text-secondary">
                                            Silakan tambahkan data surat masuk terlebih dahulu.
                                        </p>
                                        <a href="{{ route('surat-masuk.create') }}" class="btn btn-primary">
                                            <i class="bi bi-plus-circle me-2"></i>
                                            Tambah Surat
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Footer Card -->
            <div class="card-footer bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <small class="text-secondary">
                            Menampilkan
                            <strong>
                                {{ $suratMasuk->firstItem() ?? 0 }}
                            </strong>
                            -
                            <strong>
                                {{ $suratMasuk->lastItem() ?? 0 }}
                            </strong>
                            dari
                            <strong>
                                {{ $suratMasuk->total() }}
                            </strong>
                            data surat masuk.
                        </small>
                    </div>
                    <div class="col-md-6 d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                        {{ $suratMasuk->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection