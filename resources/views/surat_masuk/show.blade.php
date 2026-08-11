@extends('layouts.admin')
@section('title', 'Detail Surat Masuk')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('surat-masuk.index') }}">Surat Masuk</a></li>
    <li class="breadcrumb-item active">Detail</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="mb-0">Detail Surat Masuk</h5>
            <div>
                <a href="{{ route('surat-masuk.edit', $suratMasuk->id) }}" class="btn btn-warning btn-sm"><i
                        class="bi bi-pencil"></i> Edit</a>
                <form action="{{ route('surat-masuk.destroy', $suratMasuk->id) }}" method="POST"
                    class="delete-form d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" data-nomor="{{ $suratMasuk->nomor_surat }}">
                        <i class="bi bi-trash"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 200px;">Nomor Surat</th>
                    <td>{{ $suratMasuk->nomor_surat }}</td>
                </tr>
                <tr>
                    <th>Tanggal Surat</th>
                    <td>{{ $suratMasuk->tanggal_surat->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <th>Tanggal Diterima</th>
                    <td>{{ $suratMasuk->tanggal_diterima->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <th>Pengirim</th>
                    <td>{{ $suratMasuk->pengirim }}</td>
                </tr>
                <tr>
                    <th>Perihal</th>
                    <td>{{ $suratMasuk->perihal }}</td>
                </tr>
                <tr>
                    <th>Sifat Surat</th>
                    <td>{{ $suratMasuk->sifat_surat }}</td>
                </tr>
                <tr>
                    <th>Klasifikasi</th>
                    <td>{{ $suratMasuk->klasifikasi }}</td>
                </tr>
                <tr>
                    <th>File</th>
                    <td>
                        @if($suratMasuk->file_surat)
                            <a href="{{ route('surat-masuk.download', $suratMasuk->id) }}"
                                class="btn btn-sm btn-outline-success"><i class="bi bi-download"></i> Download</a>
                        @else - @endif
                    </td>
                </tr>
                <tr>
                    <th>Keterangan</th>
                    <td>{{ $suratMasuk->keterangan ?? '-' }}</td>
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