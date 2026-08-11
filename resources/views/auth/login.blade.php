@extends('layouts.guest')
@section('title', 'Login')
@section('content')
    <div class="login-page">
        <div class="login-background">
            <div class="login-overlay"></div>

            <div class="login-circle login-circle-1"></div>
            <div class="login-circle login-circle-2"></div>
        </div>
        <div class="login-container">
            <div class="login-brand">
                <div class="brand-content">
                    <div class="brand-logo">
                        <img src="{{ asset('logo-mtsn.png') }}" alt="Logo MTsN 1 Banyuwangi">
                    </div>
                    <div class="brand-title">
                        <small>
                            KEMENTRIAN AGAMA KABUPATEN BANYUWANGI
                        </small>
                        <h1>MTsN 1 <br>Banyuwangi</h1>
                    </div>
                    <div class="brand-divider"></div>
                    <div class="brand-system">
                        <small>SISTEM INFORMASI</small>
                        <h2>PERSURATAN</h2>
                        <p>Kelola surat masuk, surat keluar,
                            disposisi, dan arsip digital
                            secara terintegrasi.
                        </p>
                    </div>
                    <div class="brand-info">
                        <span class="material-symbols-outlined">
                            account_balance
                        </span>
                        <div>
                            <strong>Administrasi Digital</strong>
                            <small>Sistem Persuratan MTsN 1 Banyuwangi</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="login-form-wrapper">
                <div class="login-form-card">
                    <div class="mobile-login-logo">
                        <img src="{{ asset('logo-mtsn.png') }}" alt="Logo MTsN">
                    </div>
                    <div class="login-header">
                        <small>SIGN IN</small>
                        <h2>Selamat Datang</h2>
                        <p>Masuk ke sistem persuratan
                            untuk melanjutkan
                        </p>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="login-alert">
                            <span class="material-symbols-outlined">
                                error
                            </span>
                            <div>
                                <strong>Login gagal</strong>
                                <small>Periksa kembali email dan password anda.</small>
                            </div>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        {{-- EMAIL --}}
                        <div class="login-form-group">  
                            <label for="email">
                                Email
                            </label>

                            <div class="login-input">

                                <span class="material-symbols-outlined">
                                    mail
                                </span>

                                <input id="email" type="email" name="email" value="{{ old('email') }}"
                                    placeholder="nama@email.com" class="@error('email') is-invalid @enderror" required
                                    autofocus autocomplete="email">

                            </div>

                            @error('email')
                                <small class="login-error">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>


                        {{-- PASSWORD --}}
                        <div class="login-form-group">

                            <div class="login-label-row">

                                <label for="password">
                                    Password
                                </label>

                            </div>

                            <div class="login-input">

                                <span class="material-symbols-outlined">
                                    lock
                                </span>

                                <input id="password" type="password" name="password" placeholder="••••••••"
                                    class="@error('password') is-invalid @enderror" required
                                    autocomplete="current-password">

                                <button type="button" id="togglePassword" class="password-toggle"
                                    aria-label="Tampilkan password">
                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>
                                </button>

                            </div>

                            @error('password')
                                <small class="login-error">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>


                        {{-- REMEMBER --}}
                        <div class="login-options">

                            <label class="remember-option">

                                <input type="checkbox" name="remember" id="remember">

                                <span>
                                    Ingat Saya
                                </span>

                            </label>

                        </div>


                        {{-- BUTTON --}}
                        <button type="submit" class="login-submit" id="loginButton">

                            <span>
                                MASUK
                            </span>

                            <span class="material-symbols-outlined">
                                arrow_forward
                            </span>

                        </button>

                    </form>


                    {{-- Footer --}}
                    <div class="login-footer">

                        <span>
                            © {{ date('Y') }} MTsN 1 Banyuwangi
                        </span>

                        <span>
                            Sistem Informasi Persuratan
                        </span>

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection