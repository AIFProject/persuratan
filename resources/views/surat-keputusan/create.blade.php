@extends('layouts.admin')
@section('title', 'Tambah Surat Keputusan')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('surat-keputusan.index') }}">
            Surat Keputusan
        </a>
    </li>
    <li class="breadcrumb-item active">
        Tambah
    </li>
@endsection
@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white">
            <h5 class="mb-0 fw-bold">
                Tambah Surat kpeutusan
            </h5>
        </div>
        <div class="card-body">
            <form action="{{ route('surat-keputusan.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('surat-keputusan._form')
        </div>
        </form>
    </div>
@endsection