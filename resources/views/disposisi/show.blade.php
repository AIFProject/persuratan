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
                <button class="btn btn-danger btn-sm" onclick="hapusDisposisi()">
                    <i class="bi bi-trash"></i>Hapus
                </button>
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

    <form id="deleteForm" action="{{ route('disposisi.destroy', $disposisi) }}" method="POST" style="display:none;">

        @csrf
        @method('DELETE')

    </form>

    @push('scripts')
        <script>

            function hapusDisposisi() {

                Swal.fire({

                    title: 'Hapus Disposisi?',

                    text: "Data yang dihapus tidak dapat dikembalikan.",

                    icon: 'warning',

                    showCancelButton: true,

                    confirmButtonColor: '#d33',

                    cancelButtonColor: '#6c757d',

                    confirmButtonText: 'Ya, Hapus!',

                    cancelButtonText: 'Batal'

                }).then((result) => {

                    if (result.isConfirmed) {

                        document
                            .getElementById('deleteForm')
                            .submit();

                    }

                });

            }

        </script>
    @endpush
@endsection