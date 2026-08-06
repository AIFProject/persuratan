@extends('layouts.admin')
@section('title', 'Surat Keluar')
@section('breadcrumb')
    <li class="breadcrumb-item active">Surat Keluar</li>
@endsection
@section('content')
    <div class="container-fluid">
        <!-- ===========================
                                HEADER
                        ============================ -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">
                    <i class="bi bi-send-fill text-primary me-2"></i>
                    Surat Keluar
                </h3>
                <p class="text-secondary mb-0">
                    Kelola seluruh data surat keluar MTsN 1 Banyuwangi.
                </p>
            </div>
            <a href="{{ route('surat-keluar.create') }}" class="btn btn-primary px-4">
                <i class="bi bi-plus-circle me-2"></i>
                Tambah Surat
            </a>
        </div>
        <!-- ===========================
                                STATISTIK
                        ============================ -->
        <div class="row mb-4">
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center"
                            style="width:60px;height:60px;">
                            <span class="material-symbols-outlined">
                                outgoing_mail
                            </span>
                        </div>
                        <div class="ms-3">
                            <small class="text-secondary">
                                Total Surat Keluar
                            </small>
                            <h3 class="fw-bold mb-0">
                                {{ $suratKeluar->total() }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <form method="GET">
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" class="form-control border-start-0 ps-0" name="search"
                                    placeholder="Cari nomor surat, tujuan atau perihal..." value="{{ request('search') }}">
                                <button class="btn btn-primary">
                                    Cari
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ===========================
                                TABEL
                        ============================ -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="fw-semibold mb-1">
                            Daftar Surat Keluar
                        </h5>
                        <small class="text-secondary">
                            Menampilkan
                            <strong>
                                {{ $suratKeluar->count() }}
                            </strong>
                            data
                        </small>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead style="background:#f8fafc;">
                        <tr>
                            <th width="60">
                                No
                            </th>
                            <th>
                                Nomor Surat
                            </th>
                            <th>
                                Tanggal
                            </th>
                            <th>
                                Tujuan
                            </th>
                            <th>
                                Perihal
                            </th>
                            <th width="120" class="text-center">
                                File
                            </th>
                            <th width="180" class="text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($suratKeluar as $index => $sk)
                            <tr>
                                <td>
                                    <span class="fw-semibold">
                                        {{ $suratKeluar->firstItem() + $index }}
                                    </span>
                                </td>
                                <td>
                                    <div class="fw-semibold text-dark">
                                        {{ $sk->nomor_surat }}
                                    </div>
                                    <small class="text-secondary">
                                        ID #{{ $sk->id }}
                                    </small>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        {{ $sk->tanggal_surat->format('d/m/Y') }}
                                    </span>
                                </td>
                                <td>
                                    <div class="fw-semibold">
                                        {{ $sk->tujuan }}
                                    </div>
                                </td>
                                <td>
                                    {{ $sk->perihal }}
                                </td>
                                <td class="text-center">
                                    @if($sk->file_surat)
                                        <a href="{{ route('surat-keluar.download', $sk->id) }}"
                                            class="btn btn-sm btn-outline-success rounded-pill">
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
                                        <!-- Detail -->
                                        <a href="{{ route('surat-keluar.show', $sk->id) }}"
                                            class="btn btn-success rounded-circle d-flex align-items-center justify-content-center"
                                            style="width:40px;height:40px;" title="Detail">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <!-- Edit -->
                                        <a href="{{ route('surat-keluar.edit', $sk->id) }}"
                                            class="btn btn-warning rounded-circle d-flex align-items-center justify-content-center"
                                            style="width:40px;height:40px;" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <!-- Delete -->
                                        <form action="{{ route('surat-keluar.destroy', $sk->id) }}" method="POST"
                                            class="delete-form d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-danger rounded-circle d-flex align-items-center justify-content-center"
                                                style="width:40px;height:40px;" title="Hapus"
                                                data-nomor="{{ $sk->nomor_surat }}">
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
                                        <i class="bi bi-send-x" style="font-size:70px;color:#cbd5e1;">
                                        </i>
                                        <h5 class="mt-3">
                                            Belum Ada Surat Keluar
                                        </h5>
                                        <p class="text-secondary">
                                            Silakan tambahkan data surat keluar terlebih dahulu.
                                        </p>
                                        <a href="{{ route('surat-keluar.create') }}" class="btn btn-primary">
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
            <!-- ===========================
                                    FOOTER
                            ============================ -->
            <div class="card-footer bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <small class="text-secondary">
                            Menampilkan
                            <strong>
                                {{ $suratKeluar->firstItem() ?? 0 }}
                            </strong>
                            -
                            <strong>
                                {{ $suratKeluar->lastItem() ?? 0 }}
                            </strong>
                            dari
                            <strong>
                                {{ $suratKeluar->total() }}
                            </strong>
                            data surat keluar.
                        </small>
                    </div>
                    <div class="col-md-6 d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                        {{ $suratKeluar->withQueryString()->links() }}
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
                                        <p class="mb-2">
                                            Surat
                                            <strong>${nomor}</strong>
                                        </p>
                                        <p class="text-danger mb-0">
                                            Data yang dihapus tidak dapat dikembalikan.
                                        </p>
                                    `,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Hapus',
                        cancelButtonText: 'Batal',
                        confirmButtonColor: '#dc3545',
                        cancelButtonColor: '#6c757d',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            button.disabled = true;
                            button.innerHTML = `
                                            <span class="spinner-border spinner-border-sm"></span>
                                        `;
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endpush