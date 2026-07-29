@extends('layouts.admin')
@section('title', 'Edit Surat Keluar')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('surat-keluar.index') }}">Surat Keluar</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Edit Surat Keluar</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('surat-keluar.update', $suratKeluar->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                @include('surat_keluar._form')
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('surat-keluar.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection