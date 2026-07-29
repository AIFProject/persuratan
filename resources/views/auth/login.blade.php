@extends('layouts.guest')
@section('title', 'Login')

@section('content')
    <div class="login-box">
        <h3 class="text-center mb-4">Sistem Persuratan</h3>

        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" required autofocus>
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    required>
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Ingat Saya</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
@endsection