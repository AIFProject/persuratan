<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Login') - Sistem Informasi Persuratan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary: #1bde1b;
            --primary-dark: #16c216;
            --primary-light: #49eb49;
            --primary-soft: #d8fbd8;

            --sidebar: #0f2613;
            --sidebar-second: #16361b;
            --sidebar-hover: rgba(27, 222, 27, .12);

            --background: #f5fff5;
            --surface: #ffffff;

            --text: #1b2a1b;
            --muted: #5d7460;

            --border: #dcefdc;

            --success: #1bde1b;
            --warning: #f59e0b;
            --danger: #ef4444;

            --sidebar-width: 280px;
            --sidebar-collapse: 88px;
            --topbar-height: 70px;

            --radius: 18px;

            --shadow-sm:
                0 5px 15px rgba(27, 222, 27, .08);

            --shadow:
                0 10px 35px rgba(27, 222, 27, .10);

            --shadow-lg:
                0 20px 50px rgba(27, 222, 27, .16);

            --transition:
                .3s cubic-bezier(.4, 0, .2, 1);
        }

        .login-page {
            min-height: 100vh;
            width: 100%;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            font-family: "Inter", sans-serif;
        }

        .login-background {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #6bc115 0%, #15c115 45%, #15c16b 100%);
            z-index: 0;
        }

        .login-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg,
                    rgba(255, 255, 255, 0.05),
                    transparent 45%,
                    rgba(0, 0, 0, 0.08));
            pointer-events: none;
        }

        .login-circle {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }

        .login-circle-1 {
            width: 520px;
            height: 520px;
            top: -300px;
            right: -100px;
            background: rgba(255, 255, 255, 0.06);
        }

        .login-circle-2 {
            width: 600px;
            height: 600px;
            bottom: -420px;
            left: -180px;
            background: rgba(0, 0, 0, 0.07);
        }

        .login-container {
            position: relative;
            z-index: 2;
            width: min(900px, calc(100% - 40px));
            min-height: 560px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 28px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.25);
        }

        .login-brand {
            position: relative;
            display: flex;
            align-items: center;
            padding: 55px;
            color: #fff;
            border-right: 1px solid rgba(255, 255, 255, 0.3);
        }

        .brand-content {
            width: 100%;
        }

        .brand-logo {
            width: 78px;
            height: 78px;
            margin-bottom: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
        }

        .brand-logo img {
            width: 58px;
            height: 58px;
            object-fit: contain;
        }

        .brand-title small {
            display: block;
            margin-bottom: 8px;
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 1.4px;
            color: rgba(255, 255, 255, 0.7);
        }

        .brand-title h1 {
            margin: 0;
            font-size: clamp(32px, 4vw, 48px);
            line-height: 1.05;
            font-weight: 800;
            letter-spacing: -1px;
            color: #fff;
        }

        .brand-divider {
            width: 55px;
            height: 2px;
            margin: 28px 0;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 50px;
        }

        .brand-system small {
            display: block;
            margin-bottom: 4px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            color: rgba(255, 255, 255, 0.65);
        }

        .brand-system h2 {
            margin: 0 0 12px;
            font-size: 25px;
            font-weight: 800;
            letter-spacing: 0.5px;
            color: #fff;
        }

        .brand-system p {
            max-width: 360px;
            margin: 0;
            font-size: 13px;
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.7);
        }

        .brand-info {
            display: flex;
            align-items: center;

            gap: 12px;

            margin-top: 35px;
        }

        .brand-info>span {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.12);
            color: #fff;
            font-size: 21px;
        }

        .brand-info strong {
            display: block;
            font-size: 12px;
            color: #fff;
        }

        .brand-info small {
            display: block;
            margin-top: 3px;
            font-size: 10px;
            color: rgba(255, 255, 255, 0.55);
        }

        .login-form-wrapper {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 55px;
            color: #fff;
        }

        .login-form-card {
            width: 100%;
            max-width: 350px;
        }

        .mobile-login-logo {
            display: none;
            width: 65px;
            height: 65px;
            margin-bottom: 25px;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .mobile-login-logo img {
            width: 48px;
            height: 48px;
            object-fit: contain;
        }

        .login-header {
            margin-bottom: 30px;
        }

        .login-header small {
            display: block;
            margin-bottom: 8px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            color: rgba(255, 255, 255, 0.65);
        }

        .login-header h2 {
            margin: 0 0 8px;
            font-size: 31px;
            font-weight: 800;
            letter-spacing: -0.7px;
            color: #fff;
        }

        .login-header p {
            margin: 0;
            font-size: 13px;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.65);
        }

        .login-alert {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 12px 14px;
            margin-bottom: 20px;
            border-radius: 10px;
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #fff;
        }

        .login-alert>span {
            font-size: 20px;
        }

        .login-alert strong {
            display: block;
            font-size: 12px;
            margin-bottom: 2px;
        }

        .login-alert small {
            display: block;
            font-size: 10px;
            color: rgba(255, 255, 255, 0.65);
        }

        .login-form-group {
            margin-bottom: 20px;
        }

        .login-form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 12px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.85);
        }

        .login-label-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .login-input {
            position: relative;
            display: flex;
            align-items: center;
            width: 100%;
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 9px;
            background: rgba(255, 255, 255, 0.1);
            transition:
                border-color 0.2s ease,
                background 0.2s ease,
                box-shadow 0.2s ease;
        }

        .login-input>span {
            flex-shrink: 0;
            margin-left: 14px;
            font-size: 19px;
            color: rgba(255, 255, 255, 0.55);
            transition: color 0.2s ease;
        }

        .login-input input {
            width: 100%;
            min-width: 0;
            height: 48px;
            padding: 0 14px;
            border: 0;
            outline: 0;
            background: transparent;
            font-family: inherit;
            font-size: 13px;
            color: #fff;
        }

        .login-input input::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .login-input:focus-within {
            border-color: rgba(255, 255, 255, 0.65);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.07);
        }

        .login-input:focus-within>span {
            color: #fff;
        }

        .password-toggle {
            flex-shrink: 0;
            width: 42px;
            height: 42px;
            margin-right: 3px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 0;
            border-radius: 7px;
            background: transparent;
            color: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition:
                background 0.2s ease,
                color 0.2s ease;
        }

        .password-toggle:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        .password-toggle span {
            font-size: 19px;
        }

        .login-input:has(input.is-invalid) {
            border-color: rgba(239, 68, 68, 0.7);
        }

        .login-error {
            display: block;
            margin-top: 6px;
            font-size: 10px;
            color: #ffb4b4;
        }

        .login-options {
            display: flex;
            align-items: center;
            margin: 4px 0 24px;
        }

        .remember-option {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            font-size: 11px;
            color: rgba(255, 255, 255, 0.65);
        }

        .remember-option input {
            width: 15px;
            height: 15px;
            margin: 0;
            appearance: none;
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 4px;
            background: transparent;
            cursor: pointer;
            position: relative;
            transition:
                background 0.2s ease,
                border-color 0.2s ease;
        }

        .remember-option input:checked {
            background: #fff;
            border-color: #fff;
        }

        .remember-option input:checked::after {
            content: "";
            position: absolute;
            left: 4px;
            top: 1px;
            width: 5px;
            height: 9px;
            border-right: 2px solid #1267a2;
            border-bottom: 2px solid #1267a2;
            transform: rotate(45deg);
        }

        .login-submit {
            width: 100%;
            height: 49px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: 0;
            border-radius: 9px;
            background: #fff;
            color: #1267a2;
            font-family: inherit;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 1px;
            cursor: pointer;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease;
        }

        .login-submit .material-symbols-outlined {
            font-size: 18px;
            transition: transform 0.2s ease;
        }

        .login-submit:hover {
            background: #f2f8fc;
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.18);
        }

        .login-submit:hover .material-symbols-outlined {
            transform: translateX(4px);
        }

        .login-submit:active {
            transform: translateY(0);
        }

        .login-submit:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        .login-footer {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-top: 28px;
            font-size: 9px;
            color: rgba(255, 255, 255, 0.4);
        }

        .login-footer span:last-child {
            text-align: right;
        }

        @media (max-width: 900px) {
            .login-container {
                width: min(700px, calc(100% - 30px));
                min-height: 520px;
            }

            .login-brand {
                padding: 40px;
            }

            .login-form-wrapper {
                padding: 40px;
            }

            .brand-title h1 {
                font-size: 36px;
            }

            .brand-system h2 {
                font-size: 21px;
            }
        }

        @media (max-width: 767.98px) {
            .login-page {
                padding: 20px;
                min-height: 100vh;
            }

            .login-container {
                width: 100%;
                min-height: auto;
                display: block;
                border-radius: 22px;
            }

            .login-brand {
                display: none;
            }

            .login-form-wrapper {
                padding: 35px 25px;
            }

            .login-form-card {
                max-width: none;
            }

            .mobile-login-logo {
                display: flex;
            }

            .login-header h2 {
                font-size: 28px;
            }

            .login-footer {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .login-footer span:last-child {
                text-align: center;
            }
        }

        @media (max-width: 400px) {
            .login-page {
                padding: 12px;
            }

            .login-container {
                border-radius: 18px;
            }

            .login-form-wrapper {
                padding: 30px 20px;
            }

            .login-header {
                margin-bottom: 25px;
            }

            .login-header h2 {
                font-size: 25px;
            }

            .login-input input {
                height: 46px;
            }

            .login-submit {
                height: 47px;
            }
        }

        .login-container {
            animation: loginContainerIn 0.6s ease-out both;
        }

        .login-brand {
            animation: loginBrandIn 0.7s ease-out 0.1s both;
        }

        .login-form-wrapper {
            animation: loginFormIn 0.7s ease-out 0.15s both;
        }

        @keyframes loginContainerIn {
            from {
                opacity: 0;
                transform: translateY(20px) scale(0.98);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes loginBrandIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes loginFormIn {
            from {
                opacity: 0;
                transform: translateX(20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .login-input input:focus-visible,
        .password-toggle:focus-visible,
        .login-submit:focus-visible,
        .remember-option input:focus-visible {
            outline: 2px solid rgba(255, 255, 255, 0.8);
            outline-offset: 2px;
        }

        @media (prefers-reduced-motion: reduce) {

            .login-container,
            .login-brand,
            .login-form-wrapper {
                animation: none;
            }

            .login-submit,
            .password-toggle,
            .login-input {
                transition: none;
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
    @stack('scripts')
</body>

</html>