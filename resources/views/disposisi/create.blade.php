@extends('layouts.admin')
@section('title', 'Tambah Disposisi')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('disposisi.index') }}">Disposisi</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Tambah Disposisi</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('disposisi.store') }}" method="POST">
                @csrf
                @include('disposisi._form')
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('disposisi.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection