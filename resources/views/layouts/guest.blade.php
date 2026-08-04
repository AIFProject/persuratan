<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Login') - Sistem Informasi Persuratan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        /* ==========================================================
            ROOT
        ========================================================== */
        :root {
            --primary: #198754;
            --primary-dark: #146c43;
            --primary-light: #dff4e8;

            --surface: #ffffff;
            --background: #f4f6f9;

            --text: #212529;
            --muted: #6c757d;

            --border: #dee2e6;

            --shadow:
                0 12px 35px rgba(0, 0, 0, .08);

            --radius: 18px;
            --transition: .3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--background);
            color: var(--text);
            overflow: hidden;
        }

        a {
            text-decoration: none;
        }

        /* ==========================================================
            PAGE
        ========================================================== */
        .login-page {
            display: grid;
            grid-template-columns: 58% 42%;
            min-height: 100vh;
            width: 100%;
        }

        /* ==========================================================
            HERO
        ========================================================== */
        .login-hero {
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            color: #fff;
        }

        /* background */
        .login-hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(rgba(15, 92, 42, .82),
                    rgba(15, 92, 42, .82)),
                url("{{ asset('logo-mtsn.png') }}");
            background-size: cover;
            background-position: center;
            filter: blur(2px);
            transform: scale(1.05);
        }

        /* motif */
        .hero-grid {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 255, 255, .05) 1px,
                    transparent 1px),
                linear-gradient(90deg,
                    rgba(255, 255, 255, .05) 1px,
                    transparent 1px);
            background-size: 40px 40px;
            z-index: 1;
        }

        /* ==========================================================
            CONTENT
        ========================================================== */
        .hero-content {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            padding: 60px;
        }

        .hero-header {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .hero-logo {
            width: 70px;
            height: 70px;
            object-fit: contain;
            background: #fff;
            border-radius: 50%;
            padding: 8px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .15);
        }

        .hero-header small {
            display: block;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .85);
        }

        .hero-header h2 {
            margin-top: 6px;
            font-size: 30px;
            font-weight: 800;
            color: #fff;
        }

        /* ==========================================================
            BODY
        ========================================================== */
        .hero-body {
            max-width: 640px;
        }

        .hero-label {
            display: inline-flex;
            align-items: center;
            padding: 8px 18px;
            border-radius: 50px;
            background: rgba(255, 255, 255, .12);
            border: 1px solid rgba(255, 255, 255, .15);
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 26px;
        }

        .hero-body h1 {
            font-size: 50px;
            font-weight: 800;
            line-height: 1.25;
            margin-bottom: 24px;
        }

        .hero-body h1 span {
            color: #d9ffe8;
        }

        .hero-body p {
            font-size: 17px;
            line-height: 1.8;
            color: rgba(255, 255, 255, .9);
            max-width: 620px;
        }

        /* ==========================================================
            FEATURE
        ========================================================== */
        .hero-feature {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
            max-width: 650px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 18px;
            background: rgba(255, 255, 255, .12);
            border: 1px solid rgba(255, 255, 255, .15);
            backdrop-filter: blur(10px);
            border-radius: 16px;
        }

        .feature-item .material-symbols-outlined {
            font-size: 34px;
            color: #fff;
        }

        .feature-item strong {
            display: block;
            font-size: 15px;
            color: #fff;
        }

        .feature-item small {
            color: rgba(255, 255, 255, .8);
        }

        /* ==========================================================
            FOOTER
        ========================================================== */
        .hero-footer {
            margin-top: 10px;
            font-size: 14px;
            color: rgba(255, 255, 255, .75);
        }

        /* ==========================================================
            WATERMARK
        ========================================================== */
        .hero-watermark {
            position: absolute;
            right: -120px;
            bottom: -120px;
            z-index: 1;
            opacity: .07;
            pointer-events: none;
        }

        .hero-watermark img {
            width: 520px;
        }

        /* ==========================================================
            LOGIN PANEL
        ========================================================== */
        .login-panel {
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f8fafb;
            padding: 60px;
        }

        .login-card {
            width: 100%;
            max-width: 470px;
            background: #fff;
            border-radius: 22px;
            padding: 42px;
            box-shadow: var(--shadow);
            border: 1px solid #edf0f2;
            animation: fadeUp .7s ease;
        }

        /* ==========================================================
            LOGIN HEADER
        ========================================================== */
        .mobile-logo {
            display: none;
            text-align: center;
            margin-bottom: 24px;
        }

        .mobile-logo img {
            width: 72px;
        }

        .login-tag {
            display: inline-block;
            padding: 6px 14px;
            margin-bottom: 18px;
            border-radius: 50px;
            background: var(--primary-light);
            color: var(--primary-dark);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .login-card h2 {
            font-size: 34px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 12px;
        }

        .login-card h2 span {
            color: var(--primary);
        }

        .login-description {
            color: var(--muted);
            line-height: 1.7;
            margin-bottom: 32px;
        }

        /* ==========================================================
            FORM
        ========================================================== */
        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #495057;
        }

        /* ==========================================================
            INPUT GROUP
        ========================================================== */
        .input-group {
            display: flex;
            align-items: center;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 14px;
            transition: var(--transition);
            overflow: hidden;
        }

        .input-group:hover {
            border-color: #b8c2cc;
        }

        .input-group:focus-within {
            border-color: var(--primary);
            box-shadow:
                0 0 0 .25rem rgba(25, 135, 84, .12);
        }

        .input-group .material-symbols-outlined:first-child {
            width: 54px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            font-size: 22px;
        }

        .input-group .form-control {
            border: none !important;
            box-shadow: none !important;
            background: transparent !important;
            height: 58px;
            font-size: 15px;
            color: var(--text);
        }

        .input-group .form-control::placeholder {
            color: #adb5bd;
        }

        /* ==========================================================
            PASSWORD BUTTON
        ========================================================== */
        .password-toggle {
            width: 54px;
            height: 58px;
            border: none;
            background: none;
            color: #6c757d;
            transition: var(--transition);
        }

        .password-toggle:hover {
            color: var(--primary);
        }

        /* ==========================================================
            REMEMBER
        ========================================================== */
        .login-option {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 8px 0 28px;
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-check-input {
            cursor: pointer;
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .form-check-label {
            color: var(--muted);
            cursor: pointer;
            user-select: none;
        }

        /* ==========================================================
            BUTTON
        ========================================================== */
        .btn-login {
            width: 100%;
            height: 56px;
            border: none;
            border-radius: 14px;
            background: var(--primary);
            color: #fff;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: .5px;
            transition: var(--transition);
        }

        .btn-login:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(25, 135, 84, .25);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        /* ==========================================================
            ALERT
        ========================================================== */
        .alert {
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .invalid-feedback {
            display: block;
            margin-top: 6px;
            font-size: 13px;
        }

        /* ==========================================================
            ANIMATION
        ========================================================== */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ==========================================================
            RESPONSIVE
        ========================================================== */

        @media (max-width:1200px) {
            .login-page {
                grid-template-columns: 1fr;
            }

            .login-hero {
                display: none;
            }

            .login-panel {
                padding: 50px 24px;
            }

            .mobile-logo {
                display: block;
            }
        }

        @media (max-width:768px) {
            body {
                overflow: auto;
            }

            .login-panel {
                padding: 24px;
                min-height: 100vh;
            }

            .login-card {
                padding: 32px 24px;
                border-radius: 18px;
            }

            .login-card h2 {
                font-size: 28px;
            }

            .btn-login,
            .input-group .form-control,
            .password-toggle {
                height: 54px;
            }
        }

        @media (max-width:480px) {
            .login-panel {
                padding: 18px;
            }

            .login-card {
                padding: 24px 18px;
            }

            .login-tag {
                font-size: 11px;
            }

            .login-card h2 {
                font-size: 24px;
            }

            .login-description {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');
        if (togglePassword) {
            togglePassword.addEventListener('click', function () {
                const icon = this.querySelector('.material-symbols-outlined');
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    icon.textContent = "visibility_off";
                } else {
                    passwordInput.type = "password";
                    icon.textContent = "visibility";
                }
            });
        }
    </script>
</body>

</html>