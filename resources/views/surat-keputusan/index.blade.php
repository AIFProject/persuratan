@extends('layouts.admin')
@section('title', 'Surat Keputusan')
@section('breadcrumb')
    <li class="breadcrumb-item active">Surat Keputusan</li>
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">
                    <i class="bi bi-file-earmark-text-fill text-success me-2"></i>
                    Surat Keputusan
                </h3>
                <p class="text-secondary mb-0">
                    Kelola seluruh data Surat Keputusan MTsN 1 Banyuwangi.
                </p>
            </div>
            <a href="{{ route('surat-keputusan.create') }}" class="btn btn-success px-4">
                <i class="bi bi-plus-circle me-2"></i>
                Tambah Surat
            </a>
        </div>
        <!-- Statistik -->
        <div class="row mb-4">
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="rounded-circle bg-success bg-opacity-10 d-flex align-items-center justify-content-center"
                            style="width:60px;height:60px;">
                            <span class="material-symbols-outlined">
                                gavel
                            </span>
                        </div>
                        <div class="ms-3">
                            <small class="text-secondary">
                                Total Surat Keputusan
                            </small>
                            <h3 class="fw-bold mb-0">
                                {{ $suratKeputusan->total() }}
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
                                    placeholder="Cari nomor SK, nama SK atau perihal..." value="{{ request('search') }}">
                                <button class="btn btn-success">
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
                            Daftar Surat Keputusan
                        </h5>
                        <small class="text-secondary">
                            Menampilkan
                            {{ $suratKeputusan->count() }}
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
                            <th>Nomor SK</th>
                            <th>Nama SK</th>
                            <th>Tanggal</th>
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
                        @forelse($suratKeputusan as $index => $sk)
                            <tr>
                                <td>
                                    <span class="fw-semibold">
                                        {{ $suratKeputusan->firstItem() + $index }}
                                    </span>
                                </td>
                                <td>
                                    <div class="fw-semibold text-dark">
                                        {{ $sk->nomor_sk }}
                                    </div>
                                    <small class="text-secondary">
                                        ID #{{ $sk->id }}
                                    </small>
                                </td>
                                <td>
                                    <div class="fw-semibold">
                                        {{ $sk->nama_sk }}
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        {{ $sk->tanggal->format('d/m/Y') }}
                                    </span>
                                </td>
                                <td>
                                    {{ $sk->perihal }}
                                </td>
                                <td class="text-center">
                                    @if($sk->google_drive_url)
                                        <a href="{{ $sk->google_drive_url }}" target="_blank"
                                            class="btn btn-sm btn-outline-success rounded-pill">
                                            <i class="bi bi-file-earmark-pdf-fill me-1"></i>
                                            PDF
                                        </a>
                                    @else
                                        <span class="badge bg-secondary rounded-pill">
                                            Tidak Ada
                                        </span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-inline-flex gap-2">
                                        {{-- Detail --}}
                                        @if($sk->google_drive_url)
                                            <a href="{{ route('surat-keputusan.show', $sk->id) }}"
                                                class="btn btn-sm btn-success rounded-circle" title="Lihat">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                        @endif
                                        {{-- Edit --}}
                                        <a href="{{ route('surat-keputusan.edit', $sk->id) }}"
                                            class="btn btn-sm btn-warning rounded-circle" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        {{-- Hapus --}}
                                        <form action="{{ route('surat-keputusan.destroy', $sk->id) }}" method="POST"
                                            class="d-inline form-delete">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger rounded-circle" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <img src="{{ asset('empty.svg') }}" alt="Empty" width="180" class="mb-3">
                                    <h5 class="fw-semibold">
                                        Belum ada Surat Keputusan
                                    </h5>
                                    <p class="text-secondary mb-0">
                                        Silakan tambahkan data Surat Keputusan terlebih dahulu.
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer bg-white border-0">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <div class="text-muted small">
                        @if($suratKeputusan->count())
                            Menampilkan
                            <strong>{{ $suratKeputusan->firstItem() }}</strong>
                            -
                            <strong>{{ $suratKeputusan->lastItem() }}</strong>
                            dari
                            <strong>{{ $suratKeputusan->total() }}</strong>
                            data.
                        @else
                            Tidak ada data.
                        @endif
                    </div>
                    <div>
                        {{ $suratKeputusan->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.form-delete').forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Hapus Surat Keputusan?',
                        text: 'Data dan file di Google Drive akan ikut dihapus.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#198754',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, Hapus',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endpush