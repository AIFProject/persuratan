@extends('layouts.admin')
@section('title', 'Surat Masuk')
@section('breadcrumb')
    <li class="breadcrumb-item active">Surat Masuk</li>
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
                        <i class="bi bi-envelope-paper-fill me-2"></i>
                        Surat Masuk
                    </h3>
                    <p class="mb-0 text-white-50">
                        Kelola seluruh data surat masuk
                        PSTP MTsN 1 Banyuwangi.
                    </p>
                </div>
                <a href="{{ route('surat-masuk.create') }}" class="btn btn-light px-4 fw-semibold flex-shrink-0">
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
                            <h3>{{ $suratMasuk->total() }}</h3>
                            <span>Surat masuk terdaftar</span>
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
                                    @if ($sm->file_surat)
                                        <a href="{{ route('surat-masuk.download', $sm->id) }}"
                                            class="btn btn-sm btn-outline-success rounded-pill">
                                            <i class="bi bi-file-earmark-pdf-fill me-1"></i>
                                            PDF
                                        </a>
                                    @else
                                        <span class="badge rounded-pill text-bg-secondary px-3 py-2">
                                            Tidak Ada
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        {{-- Detail --}}
                                        <a href="{{ route('surat-masuk.show', $sm->id) }}"
                                            class="btn btn-success rounded-circle d-flex align-items-center justify-content-center"
                                            title="Detail" style="width:40px;height:40px;">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        {{-- Edit --}}
                                        <a href="{{ route('surat-masuk.edit', $sm->id) }}"
                                            class="btn btn-warning rounded-circle d-flex align-items-center justify-content-center"
                                            title="Edit" style="width:40px;height:40px;">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        {{-- Delete --}}
                                        <form action="{{ route('surat-masuk.destroy', $sm->id) }}" method="POST"
                                            class="delete-form d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-danger rounded-circle d-flex align-items-center justify-content-center"
                                                style="width:40px;height:40px;" title="Hapus"
                                                data-nomor="{{ $sm->nomor_surat }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <div class="text-center py-5">
                                        <i class="bi bi-inbox" style="font-size:70px;color:#cbd5e1;">
                                        </i>
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

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            document.querySelectorAll('.delete-form').forEach(form => {

                form.addEventListener('submit', function (e) {

                    e.preventDefault();

                    const button = this.querySelector('button');
                    const nomor = button.dataset.nomor;

                    Swal.fire({
                        title: 'Hapus Surat?',
                        html: `
                                                <p>
                                                    Surat <strong>${nomor}</strong> akan dihapus.
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

                            // =====================================
                            // TAMPILKAN LOADING BARU
                            // =====================================

                            Swal.fire({
                                title: 'Menghapus surat...',
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

                            // Jalankan DELETE
                            form.submit();
                        }

                    });

                });

            });

        });
    </script>
@endpush