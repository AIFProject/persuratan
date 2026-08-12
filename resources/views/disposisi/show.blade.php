@extends('layouts.admin')
@section('title', 'Detail Disposisi')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('disposisi.index') }}">Disposisi</a></li>
    <li class="breadcrumb-item active">Detail</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Detail Disposisi</h5>
            <div>
                <a href="{{ route('disposisi.edit', $disposisi->id) }}" class="btn btn-warning btn-sm"><i
                        class="bi bi-pencil"></i> Edit</a>
                <form action="{{ route('disposisi.destroy', $disposisi->id) }}" method="POST" class="delete-form d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                        data-nomor="{{ $disposisi->suratMasuk->nomor_surat }}">
                        <i class="bi bi-trash"></i> Hapus
                    </button>
                </form>
                <a href="{{ route('disposisi.cetak', $disposisi) }}" class="btn btn-primary">
                    <i class="bi bi-file-earmark-word-fill"></i>
                    Download DOCX
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 200px;">Nomor Surat Masuk</th>
                    <td>{{ $disposisi->suratMasuk->nomor_surat }}</td>
                </tr>
                <tr>
                    <th>Pengirim</th>
                    <td>{{ $disposisi->suratMasuk->pengirim }}</td>
                </tr>
                <tr>
                    <th>Tujuan Disposisi</th>
                    <td>{{ $disposisi->tujuan_disposisi }}</td>
                </tr>
                <tr>
                    <th>Isi Disposisi</th>
                    <td>{{ nl2br($disposisi->isi_disposisi) }}</td>
                </tr>
                <tr>
                    <th>Tanggal Disposisi</th>
                    <td>{{ $disposisi->tanggal_disposisi->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $disposisi->status }}</td>
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
                        title: 'Hapus Disposisi?',
                        html: `
                                            <p>
                                                Disposisi untuk surat
                                                <strong>${nomor}</strong>
                                                akan dihapus.
                                            </p>

                                            <p class="text-danger mb-0">
                                                Data disposisi yang dihapus tidak dapat dikembalikan.
                                                Surat masuk tetap tersimpan.
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

                            Swal.fire({
                                title: 'Menghapus disposisi...',
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