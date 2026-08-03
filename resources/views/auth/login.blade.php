@extends('layouts.guest')
@section('title', 'Login')
@section('content')
    <div class="login-page">
        <!-- ==========================
                            HERO SECTION
                    =========================== -->
        <div class="login-hero">
            <div class="hero-grid"></div>
            <div class="hero-content">
                <div class="hero-header">
                    <img src="{{ asset('logo-mtsn.png') }}" alt="Logo MTsN" class="hero-logo">
                    <div>
                        <small class="hero-subtitle">
                            KEMENTERIAN AGAMA REPUBLIK INDONESIA
                        </small>
                        <h2>
                            MTsN 1 Banyuwangi
                        </h2>
                    </div>
                </div>
                <div class="hero-body">
                    <span class="hero-label">
                        SISTEM INFORMASI PERSURATAN
                    </span>
                    <h1>
                        Administrasi Surat
                        <br>
                        <span>Terintegrasi.</span>
                    </h1>
                    <p>
                        Sistem Informasi Persuratan MTsN 1 Banyuwangi
                        digunakan untuk mengelola surat masuk,
                        surat keluar, disposisi, serta arsip digital
                        secara tertib, aman, dan terdokumentasi
                        guna mendukung pelayanan administrasi madrasah.
                    </p>
                </div>
                <div class="hero-feature">

                    <div class="feature-item">

                        <span class="material-symbols-outlined">
                            inbox
                        </span>

                        <div>

                            <strong>Surat Masuk</strong>

                            <small>
                                Pencatatan dan penerimaan surat masuk.
                            </small>

                        </div>

                    </div>

                    <div class="feature-item">

                        <span class="material-symbols-outlined">
                            outgoing_mail
                        </span>

                        <div>

                            <strong>Surat Keluar</strong>

                            <small>
                                Pembuatan dan distribusi surat keluar.
                            </small>

                        </div>

                    </div>

                    <div class="feature-item">

                        <span class="material-symbols-outlined">
                            assignment
                        </span>

                        <div>

                            <strong>Disposisi</strong>

                            <small>
                                Penerusan dan tindak lanjut surat.
                            </small>

                        </div>

                    </div>

                    <div class="feature-item">

                        <span class="material-symbols-outlined">
                            folder_managed
                        </span>

                        <div>

                            <strong>Arsip Digital</strong>

                            <small>
                                Penyimpanan dokumen secara elektronik.
                            </small>

                        </div>

                    </div>

                </div>

                <div class="hero-footer">

                    © {{ date('Y') }} MTsN 1 Banyuwangi

                    <br>

                    <small>
                        Sistem Informasi Persuratan
                    </small>

                </div>
                <div class="hero-footer">
                    © {{ date('Y') }}
                    MTsN 1 Banyuwangi
                </div>
            </div>
            <div class="hero-watermark">
                <img src="{{ asset('logo-mtsn.png') }}" alt="Watermark">
            </div>
        </div>
        <!-- ==========================
                            LOGIN SECTION
                    =========================== -->
        <div class="login-panel">
            <div class="login-card">
                <div class="mobile-logo">
                    <img src="{{ asset('logo-mtsn.png') }}" alt="Logo">
                </div>
                <small class="login-tag">
                    SIGN IN
                </small>
                <h2>
                    Selamat
                    <span>Datang.</span>
                </h2>
                <p class="login-description">
                    Masukkan email dan password
                    untuk melanjutkan.
                </p>
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- EMAIL -->
                    <div class="form-group">
                        <label>
                            Email
                        </label>
                        <div class="input-group">
                            <span class="material-symbols-outlined">
                                mail
                            </span>
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror" placeholder="nama@email.com"
                                required autofocus>
                        </div>
                        @error('email')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <!-- PASSWORD -->
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <label>
                                Password
                            </label>
                        </div>
                        <div class="input-group">
                            <span class="material-symbols-outlined">
                                lock
                            </span>
                            <input id="password" type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="••••••••"
                                required>
                            <button type="button" id="togglePassword" class="password-toggle">
                                <span class="material-symbols-outlined">
                                    visibility
                                </span>
                            </button>
                        </div>
                        @error('password')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <!-- REMEMBER -->
                    <div class="login-option">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">
                                Ingat Saya
                            </label>
                        </div>
                    </div>
                    <!-- BUTTON -->
                    <button type="submit" class="btn-login" id="loginButton">
                        MASUK
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection