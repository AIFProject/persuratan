@extends('layouts.admin')
@section('title', 'Disposisi')
@section('breadcrumb')
    <li class="breadcrumb-item active">Disposisi</li>
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">
                    <i class="bi bi-diagram-3-fill text-primary me-2"></i>
                    Disposisi
                </h3>
                <p class="text-secondary mb-0">
                    Kelola seluruh data disposisi surat masuk MTsN 1 Banyuwangi.
                </p>
            </div>
            <a href="{{ route('disposisi.create') }}" class="btn btn-primary px-4">
                <i class="bi bi-plus-circle me-2"></i>
                Tambah Disposisi
            </a>
        </div>
        <!-- Statistik -->
        <div class="row mb-4">
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center"
                            style="width:60px;height:60px;">
                            <span class="material-symbols-outlined">
                                assignment
                            </span>
                        </div>
                        <div class="ms-3">
                            <small class="text-secondary">
                                Total Disposisi
                            </small>
                            <h3 class="fw-bold mb-0">
                                {{ $disposisi->total() }}
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
                                    placeholder="Cari nomor surat, pengirim, atau tujuan disposisi..."
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
        <!-- Card -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="fw-semibold mb-1">
                            Daftar Disposisi
                        </h5>
                        <small class="text-secondary">
                            Menampilkan
                            {{ $disposisi->count() }}
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
                            <th>Pengirim</th>
                            <th>Tujuan Disposisi</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th width="170" class="text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($disposisi as $index => $d)
                            <tr>
                                <td>
                                    <span class="fw-semibold">
                                        {{ $disposisi->firstItem() + $index }}
                                    </span>
                                </td>
                                <td>
                                    <div class="fw-semibold text-dark">
                                        {{ $d->suratMasuk->nomor_surat }}
                                    </div>
                                    <small class="text-secondary">
                                        ID #{{ $d->suratMasuk->id }}
                                    </small>
                                </td>
                                <td>
                                    <div class="fw-semibold">
                                        {{ $d->suratMasuk->pengirim }}
                                    </div>
                                </td>
                                <td>
                                    {{ $d->tujuan_disposisi }}
                                </td>
                                <td>
                                    @if($d->status == 'Belum Diproses')
                                        <span class="badge bg-secondary rounded-pill px-3 py-2">
                                            Belum Diproses
                                        </span>
                                    @elseif($d->status == 'Diproses')
                                        <span class="badge bg-warning text-dark rounded-pill px-3 py-2">
                                            Diproses
                                        </span>
                                    @else
                                        <span class="badge bg-success rounded-pill px-3 py-2">
                                            Selesai
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        {{ $d->tanggal_disposisi->format('d/m/Y') }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">

                                        <!-- Detail -->
                                        <a href="{{ route('disposisi.show', $d->id) }}"
                                            class="btn btn-success rounded-circle d-flex align-items-center justify-content-center"
                                            style="width:40px;height:40px;" title="Detail">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <!-- Edit -->
                                        <a href="{{ route('disposisi.edit', $d->id) }}"
                                            class="btn btn-warning rounded-circle d-flex align-items-center justify-content-center"
                                            style="width:40px;height:40px;" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <!-- Delete -->
                                        <form action="{{ route('disposisi.destroy', $d->id) }}" method="POST"
                                            class="delete-form d-inline">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="btn btn-danger rounded-circle d-flex align-items-center justify-content-center"
                                                style="width:40px;height:40px;" title="Hapus"
                                                data-nomor="{{ $d->suratMasuk->nomor_surat }}">
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
                                        <i class="bi bi-diagram-3" style="font-size:70px;color:#cbd5e1;"></i>
                                        <h5 class="mt-3">
                                            Belum Ada Data Disposisi
                                        </h5>
                                        <p class="text-secondary">
                                            Silakan tambahkan data disposisi terlebih dahulu.
                                        </p>
                                        <a href="{{ route('disposisi.create') }}" class="btn btn-primary">
                                            <i class="bi bi-plus-circle me-2"></i>
                                            Tambah Disposisi
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Footer -->
            <div class="card-footer bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <small class="text-secondary">
                            Menampilkan
                            <strong>
                                {{ $disposisi->firstItem() ?? 0 }}
                            </strong>
                            -
                            <strong>
                                {{ $disposisi->lastItem() ?? 0 }}
                            </strong>
                            dari
                            <strong>
                                {{ $disposisi->total() }}
                            </strong>
                            data disposisi.
                        </small>
                    </div>
                    <div class="col-md-6 d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                        {{ $disposisi->withQueryString()->links() }}
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

                    const nomor = this.querySelector('button').dataset.nomor;

                    Swal.fire({
                        title: 'Hapus Disposisi?',
                        html: `
                                <p>Disposisi untuk surat <strong>${nomor}</strong> akan dihapus.</p>
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
                            form.submit();
                        }

                    });

                });

            });

        });
    </script>
@endpush