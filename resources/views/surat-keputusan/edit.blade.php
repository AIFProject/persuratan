@extends('layouts.admin')
@section('title', 'Edit Surat Keputusan')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('surat-keputusan.index') }}">
            Surat Keputusan
        </a>
    </li>
    <li class="breadcrumb-item active">
        Edit
    </li>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">
                    <i class="bi bi-pencil-square text-warning me-2"></i>
                    Edit Surat Keputusan
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('surat-keputusan.update', $suratKeputusan) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('surat-keputusan._form')
                </form>
            </div>
        </div>
    </div>
@endsection