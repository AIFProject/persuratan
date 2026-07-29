@extends('layouts.admin')
@section('title', 'Tambah Surat Keluar')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('surat-keluar.index') }}">Surat Keluar</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Tambah Surat Keluar</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('surat-keluar.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('surat_keluar._form')
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('surat-keluar.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection