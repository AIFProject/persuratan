@extends('layouts.admin')
@section('title', 'Edit Disposisi')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('disposisi.index') }}">Disposisi</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Edit Disposisi</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('disposisi.update', $disposisi->id) }}" method="POST">
                @csrf @method('PUT')
                @include('disposisi._form')
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('disposisi.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection