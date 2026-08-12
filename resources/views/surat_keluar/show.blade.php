@extends('layouts.admin')
@section('title', 'Detail Surat Keluar')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('surat-keluar.index') }}">Surat Keluar</a></li>
    <li class="breadcrumb-item active">Detail</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="mb-0">Detail Surat Keluar</h5>
            <div>
                <a href="{{ route('surat-keluar.edit', $suratKeluar->id) }}" class="btn btn-warning btn-sm"><i
                        class="bi bi-pencil"></i> Edit</a>
                <form action="{{ route('surat-keluar.destroy', $suratKeluar->id) }}" method="POST"
                    class="delete-form d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" data-nomor="{{ $suratKeluar->nomor_surat }}">
                        <i class="bi bi-trash"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 200px;">Nomor Surat</th>
                    <td>{{ $suratKeluar->nomor_surat }}</td>
                </tr>
                <tr>
                    <th>Tanggal Surat</th>
                    <td>{{ $suratKeluar->tanggal_surat->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <th>Tujuan</th>
                    <td>{{ $suratKeluar->tujuan }}</td>
                </tr>
                <tr>
                    <th>Perihal</th>
                    <td>{{ $suratKeluar->perihal }}</td>
                </tr>
                <tr>
                    <th>File</th>
                    <td>
                        @if($suratKeluar->file_surat)
                            <a href="{{ route('surat-keluar.download', $suratKeluar->id) }}"
                                class="btn btn-sm btn-outline-success"><i class="bi bi-download"></i> Download</a>
                        @else - @endif
                    </td>
                </tr>
                <tr>
                    <th>Keterangan</th>
                    <td>{{ $suratKeluar->keterangan ?? '-' }}</td>
                </tr>
            </table>
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
                            // Loading setelah klik "Hapus"
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
                            // Jalankan DELETE Laravel
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endpush