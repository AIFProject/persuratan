@extends('layouts.admin')
@section('title', 'Tambah Arsip')
@section('content')
    <div class="container-fluid">
        <div class="card shadow-sm border-0">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="bi bi-archive-fill me-2"></i>
                    Tambah Arsip
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">
                            Jenis Surat
                        </label>
                        <select class="form-select" name="jenis" id="jenis">
                            <option value="">-- Pilih --</option>
                            <option value="masuk">
                                Surat Masuk
                            </option>
                            <option value="keluar">
                                Surat Keluar
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Pilih Surat
                        </label>
                        <select class="form-select" name="surat_id" id="surat">
                            <option>
                                Pilih jenis surat dahulu
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Upload File
                        </label>
                        <input type="file" name="file" class="form-control" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                    </div>
                    <button class="btn btn-primary">
                        <i class="bi bi-upload"></i>
                        Simpan Arsip
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection