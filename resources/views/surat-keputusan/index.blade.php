@extends('layouts.admin')
@section('title', 'Surat Keputusan')
@section('breadcrumb')
    <li class="breadcrumb-item active">Surat Keputusan</li>
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Header -->
        <div class="surat-overview mb-4">
            <div class="surat-overview-decoration surat-overview-decoration-1"></div>
            <div class="surat-overview-decoration surat-overview-decoration-2"></div>

            <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
                <div>
                    <h3 class="fw-bold mb-1 text-white">
                        <i class="bi bi-file-earmark-check me-2"></i>
                        Surat Keputusan
                    </h3>
                    <p class="mb-0 text-white-50">
                        Kelola seluruh data surat keputusan
                        PSTP MTsN 1 Banyuwangi.
                    </p>
                </div>
                <a href="{{ route('surat-keputusan.create') }}" class="btn btn-light px-4 fw-semibold flex-shrink-0">
                    <i class="bi bi-plus-circle me-2"></i>
                    Tambah Surat
                </a>
            </div>
            <div class="row g-3">
                <div class="col-12 col-lg-4">
                    <div class="surat-stat-card">
                        <div class="surat-stat-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div>
                            <small>Total Surat</small>
                            <h3>{{ $suratKeputusan->total() }}</h3>
                            <span>Surat keputusan terdaftar</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="surat-search-card">
                        <form method="get">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" name="search" class="form-control"
                                    placeholder="Cari nomor surat, pengirim atau perihal..."
                                    value="{{ request('search') }}">
                                <button type="submit" class="btn btn-search">
                                    <i class="bi bi-search me-1"></i>
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
                                                class="btn btn-success rounded-circle d-flex align-items-center justify-content-center"
                                                title="Detail" style="width:40px;height:40px;">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                        @endif
                                        {{-- Edit --}}
                                        <a href="{{ route('surat-keputusan.edit', $sk->id) }}"
                                            class="btn btn-warning rounded-circle d-flex align-items-center justify-content-center"
                                            title="Edit" style="width:40px;height:40px;">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        {{-- Hapus --}}
                                        <form action="{{ route('surat-keputusan.destroy', $sk->id) }}" method="POST"
                                            class="delete-form d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-danger rounded-circle d-flex align-items-center justify-content-center"
                                                style="width:40px;height:40px;" title="Hapus" data-nomor="{{ $sk->nomor_sk }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <img src="{{ asset('law_10814589.png') }}" alt="Empty" width="180" class="mb-3">
                                    <h5 class="fw-semibold">
                                        Belum ada Surat Keputusan
                                    </h5>
                                    <p class="text-secondary mb-0">
                                        Silakan tambahkan data Surat Keputusan terlebih dahulu.
                                    </p>
                                    <a href="{{ route('surat-keputusan.create') }}" class="btn btn-primary">
                                        <i class="bi bi-plus-circle me-2"></i>
                                        Tambah Surat
                                    </a>
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

            document.querySelectorAll('.delete-form').forEach(form => {

                form.addEventListener('submit', function (e) {

                    e.preventDefault();

                    const button = this.querySelector('button');
                    const nomor = button.dataset.nomor;

                    Swal.fire({
                        title: 'Hapus Surat Keputusan?',
                        html: `
                                    <p>
                                        Surat Keputusan
                                        <strong>${nomor}</strong>
                                        akan dihapus.
                                    </p>

                                    <p class="text-danger mb-0">
                                        Data yang dihapus tidak dapat dikembalikan.
                                    </p>
                                `,
                        icon: 'warning',

                        showCancelButton: true,

                        confirmButtonText: 'Hapus',
                        cancelButtonText: 'Batal',

                        confirmButtonColor: '#dc3545',
                        cancelButtonColor: '#6c757d',

                        reverseButtons: true

                    }).then((result) => {

                        if (result.isConfirmed) {

                            // Loading setelah klik "Hapus"
                            Swal.fire({
                                title: 'Menghapus Surat Keputusan...',
                                text: 'Mohon tunggu sebentar.',
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                showConfirmButton: false,

                                didOpen: () => {
                                    Swal.showLoading();
                                }
                            });

                            // Cegah double click
                            button.disabled = true;

                            // Jalankan DELETE Laravel
                            form.submit();
                        }

                    });

                });

            });

        });
    </script>
@endpush