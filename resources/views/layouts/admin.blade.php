<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Persuratan')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
    <link rel="icon" type="image/png" href="{{ asset('logo-mtsn.png') }}">
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
            --shadow-sm: 0 5px 15px rgba(27, 222, 27, .08);
            --shadow: 0 10px 35px rgba(27, 222, 27, .10);
            --shadow-lg: 0 20px 50px rgba(27, 222, 27, .16);
            --transition:
                .3s cubic-bezier(.4, 0, .2, 1);
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html {
            scroll-behavior: smooth;
        }
        body {
            font-family: 'Inter', sans-serif;
            background: var(--background);
            color: var(--text);
            min-height: 100vh;
            overflow-x: hidden;
        }
        a {
            text-decoration: none;
        }
        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            z-index: 1045;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            color: #fff;
            background:
                linear-gradient(180deg,
                    #1bde1b 0%,
                    #149614 100%);
            box-shadow:
                18px 0 45px rgba(15, 23, 42, .12);
            transition:
                width var(--transition);
        }
        .brand {
            min-height: 110px;
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 16px;
            border-bottom:
                1px solid rgba(255, 255, 255, .10);
        }
        .brand-logo {
            width: 54px;
            height: 54px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 18px;
            color: #fff;
            background: rgba(255, 255, 255, .18);
            backdrop-filter: blur(10px);
        }
        .brand-logo .material-symbols-outlined {
            font-size: 28px;
        }
        .brand-text {
            min-width: 0;
            flex: 1;
            overflow: hidden;
        }
        .brand-text small {
            display: block;
            color: #fff;
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            white-space: nowrap;
        }
        .brand-text h4 {
            margin: 4px 0 0;
            color: #fff;
            font-size: 20px;
            font-weight: 700;
            white-space: nowrap;
        }
        .sidebar-collapse-btn {
            display: none;
            width: 42px;
            height: 42px;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--border);
            border-radius: 12px;
            color: var(--text);
            background: var(--surface);
            cursor: pointer;
            transition: var(--transition);
        }

        .sidebar-collapse-btn:hover {
            color: var(--primary);
            border-color: var(--primary);
            background: var(--primary-soft);
        }
        .menu {
            flex: 1;
            padding: 24px 18px;
            overflow-y: auto;
        }
        .menu::-webkit-scrollbar {
            width: 5px;
        }
        .menu::-webkit-scrollbar-track {
            background: transparent;
        }
        .menu::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, .15);
            border-radius: 50px;
        }
        .menu-title {
            padding-left: 16px;
            margin-bottom: 16px;
            color: rgba(255, 255, 255, .85);
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .sidebar .nav {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .sidebar .nav-item {
            width: 100%;
        }
        .sidebar .nav-link {
            position: relative;
            display: flex;
            align-items: center;
            gap: 14px;
            width: 100%;
            padding: 10px 12px;
            border-radius: 16px;
            color: #e2f4e2;
            font-size: 15px;
            font-weight: 500;
            transition: var(--transition);
            overflow: hidden;
        }
        .sidebar .nav-link .material-symbols-outlined {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 12px;
            background: rgba(255, 255, 255, .06);
            font-size: 22px;
            transition: var(--transition);
        }
        .sidebar .nav-link p {
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .sidebar .nav-link:hover {
            color: #fff;
            background: rgba(255, 255, 255, .09);
            transform: translateX(5px);
        }
        .sidebar .nav-link:hover .material-symbols-outlined {
            background: rgba(255, 255, 255, .12);
        }
        .sidebar .nav-link.active {
            color: #149614;
            background: #fff;
            box-shadow: 0 12px 30px rgba(27, 222, 27, .25);
        }
        .sidebar .nav-link.active .material-symbols-outlined {
            color: var(--primary);
            background: var(--primary-soft);
        }
        .sidebar .nav-link.active::before {
            content: "";
            position: absolute;
            top: 10px;
            left: -2px;
            width: 5px;
            height: 34px;
            border-radius: 20px;
            background: var(--primary);
        }
        .sidebar.collapsed {
            width: var(--sidebar-collapse);
        }
        .sidebar.collapsed .brand {
            min-height: 110px;
            flex-direction: column;
            justify-content: center;
            padding: 18px 0;
            gap: 10px;
        }
        .sidebar.collapsed .brand-text,
        .sidebar.collapsed .menu-title,
        .sidebar.collapsed .nav-link p,
        .sidebar.collapsed .profile-info,
        .sidebar.collapsed .logout-btn span {
            display: none;
        }
        .sidebar.collapsed .brand-logo {
            order: 2;
        }
        .sidebar.collapsed .sidebar-collapse-btn {
            order: 1;
        }
        .sidebar.collapsed .nav-link {
            justify-content: center;
            padding: 10px;
        }
        .sidebar.collapsed .nav-link.active::before {
            display: none;
        }
        .sidebar.collapsed .nav-link:hover {
            transform: none;
        }
        .sidebar.collapsed .nav-link:hover::after {
            content: attr(data-title);
            position: absolute;
            top: 50%;
            left: 76px;
            transform: translateY(-50%);
            z-index: 2000;
            padding: 8px 12px;
            border-radius: 10px;
            color: #fff;
            background: #111827;
            font-size: 13px;
            white-space: nowrap;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .18);
        }
        .sidebar-footer {
            padding: 20px;
            border-top: 1px solid rgba(255, 255, 255, .10);
        }
        .profile {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px;
            margin-bottom: 16px;
            border-radius: 18px;
            background: rgba(255, 255, 255, .06);
        }
        .profile-avatar {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 16px;
            color: #fff;
            background: linear-gradient(135deg, #1bde1b, #49eb49);
            font-size: 18px;
            font-weight: 700;
        }
        .profile-info {
            min-width: 0;
        }
        .profile-info h6 {
            margin: 0;
            color: #fff;
            font-size: 15px;
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .profile-info small {
            color: #d1e7d1;
        }
        .logout-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            width: 100%;
            padding: 14px;
            border-radius: 16px;
            color: #ffd0d0;
            background: rgba(239, 68, 68, .10);
            transition: var(--transition);
        }
        .logout-btn:hover {
            color: #fff;
            background: #ef4444;
        }
        .main-wrapper {
            position: relative;
            min-height: 100vh;
            margin-left: var(--sidebar-width);
            background: #f4f8f4;
            isolation: isolate;
            overflow: hidden;
            transition: margin-left var(--transition);
        }
        .main-wrapper.expanded {
            margin-left: var(--sidebar-collapse);
        }
        .main-wrapper::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 0;
            pointer-events: none;
            background-image: url("{{ asset('images.png') }}");
            background-repeat: no-repeat;
            background-position: center;
            background-size: 2000px;
            filter: blur(10px);
            opacity: .08;
        }
        .topbar {
            position: sticky;
            top: 0;
            z-index: 1000;
            height: var(--topbar-height);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            background: rgba(255, 255, 255, .82);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(226, 232, 240, .8);
        }
        .topbar-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .topbar-title h4 {
            margin: 0;
            font-size: 22px;
            font-weight: 700;
        }
        .topbar-title small {
            color: var(--muted);
        }
        .topbar-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }
        .mobile-menu-btn {
            width: 42px;
            height: 42px;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 0;
            border-radius: 12px;
        }
        .content {
            position: relative;
            z-index: 2;
            padding: 34px;
        }
        .content>.container-fluid {
            padding: 0;
        }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: var(--transition);
        }
        .card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }
        .card-header {
            background: #fff;
            border-bottom: 1px solid var(--border);
            font-weight: 600;
        }
        .btn {
            border-radius: 12px;
            font-weight: 600;
        }
        .btn-primary {
            border: none;
            background: var(--primary);
        }
        .btn-primary:hover {
            background: var(--primary-dark);
        }
        .table {
            vertical-align: middle;
        }
        .table thead {
            background: #f8fafc;
        }
        .table thead th {
            border: none;
            color: #475569;
            font-weight: 600;
        }
        .alert {
            border: none;
            border-radius: 14px;
        }
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 50px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        .nav-link {
            position: relative;
            overflow: hidden;
        }
        .ripple {
            position: absolute;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .35);
            transform: translate(-50%, -50%);
            animation: ripple .6s linear;
        }
        @keyframes ripple {
            from {
                opacity: 1;
                transform: translate(-50%, -50%) scale(0);
            }
            to {
                opacity: 0;
                transform: translate(-50%, -50%) scale(18);
            }
        }
        @media (max-width: 991.98px) {
            .sidebar {
                width: var(--sidebar-width);
                margin: 0;
                box-shadow: 18px 0 45px rgba(15, 23, 42, .20);
            }
            .sidebar.collapsed {
                width: var(--sidebar-width);
            }
            .main-wrapper,
            .main-wrapper.expanded {
                margin-left: 0;
            }
            .mobile-menu-btn {
                display: flex;
            }
            .topbar {
                padding: 0 20px;
            }
            .content {
                padding: 24px;
            }
            .sidebar.collapsed .brand {
                min-height: 110px;
                flex-direction: row;
                justify-content: flex-start;
                padding: 24px;
                gap: 16px;
            }
            .sidebar.collapsed .brand-text,
            .sidebar.collapsed .menu-title,
            .sidebar.collapsed .nav-link p,
            .sidebar.collapsed .profile-info,
            .sidebar.collapsed .logout-btn span {
                display: block;
            }
            .sidebar.collapsed .brand-logo,
            .sidebar.collapsed .sidebar-collapse-btn {
                order: initial;
            }
            .sidebar.collapsed .nav-link {
                justify-content: flex-start;
                padding: 10px 12px;
            }
            .sidebar.collapsed .nav-link:hover::after {
                display: none;
            }
        }
        @media (max-width: 768px) {
            .topbar {
                height: 64px;
                padding: 0 16px;
            }
            .topbar-title h4 {
                font-size: 18px;
            }
            .topbar-title small {
                display: none;
            }
            .topbar-right {
                gap: 10px;
            }
            .topbar-right>span {
                display: none;
            }
            .content {
                padding: 20px;
            }
        }
        @media (max-width: 480px) {
            .sidebar {
                width: min(var(--sidebar-width), 88vw);
            }
            .content {
                padding: 15px;
            }

            .topbar {
                padding: 0 14px;
            }
        }
        .global-loading {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, .55);
            backdrop-filter: blur(5px);
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: opacity .2s ease, visibility .2s ease;
        }
        .global-loading.show {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }
        .loading-box {
            min-width: 180px;
            padding: 24px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 14px;
            border-radius: 18px;
            background: #fff;
            box-shadow: 0 20px 50px rgba(0, 0, 0, .15);
        }
        .loading-text {
            color: var(--text);
            font-size: 14px;
            font-weight: 600;
        }
        .dashboard-overview {
            position: relative;
            overflow: hidden;
            padding: 30px;
            border-radius: 28px;
            color: #fff;
            background:
                linear-gradient(135deg,
                    var(--sidebar) 0%,
                    var(--sidebar-second) 45%,
                    var(--primary-dark) 100%);
            box-shadow:
                var(--shadow-lg);
            isolation: isolate;
        }
        .overview-decoration {
            position: absolute;
            z-index: -1;
            border-radius: 50%;
            pointer-events: none;
            background: rgba(255, 255, 255, .06);
        }
        .overview-decoration-1 {
            width: 430px;
            height: 430px;
            top: -280px;
            right: -80px;
        }

        .overview-decoration-2 {
            width: 350px;
            height: 350px;
            bottom: -270px;
            left: -150px;
        }

        .overview-header {
            position: relative;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
        }

        .overview-welcome h2 {
            margin: 0 0 6px;
            color: #fff;
            font-size: clamp(24px,
                    3vw,
                    34px);
            font-weight: 700;
            letter-spacing: -.7px;
        }

        .overview-welcome p {
            margin: 0;
            color:
                rgba(255, 255, 255, .75);
            font-size: 14px;
        }

        .overview-date {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 9px 14px;
            border: 1px solid rgba(255, 255, 255, .12);
            border-radius: 50px;
            color:
                rgba(255, 255, 255, .85);
            background:
                rgba(255, 255, 255, .08);
            backdrop-filter:
                blur(10px);
            font-size: 13px;
            white-space: nowrap;
        }

        .dashboard-stat-link {
            display: block;
            height: 100%;
            color: inherit;
            text-decoration: none;
        }

        .dashboard-stat-card {
            position: relative;
            height: 100%;
            min-height: 170px;
            padding: 20px;
            border: 1px solid rgba(255, 255, 255, .18);
            border-radius: 18px;
            background:
                rgba(255, 255, 255, .10);
            backdrop-filter:
                blur(12px);
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, .08);
            transition:
                transform .25s ease,
                background .25s ease,
                border-color .25s ease,
                box-shadow .25s ease;
        }

        .dashboard-stat-link:hover .dashboard-stat-card {
            transform:
                translateY(-5px);
            border-color:
                rgba(255, 255, 255, .30);
            background:
                rgba(255, 255, 255, .16);
            box-shadow:
                0 15px 30px rgba(0, 0, 0, .12);
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 18px;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            color: #fff;
            background:
                rgba(255, 255, 255, .16);
            font-size: 20px;
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, .15);
        }

        .stat-arrow {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color:
                rgba(255, 255, 255, .75);
            background:
                rgba(255, 255, 255, .07);
            font-size: 13px;
            transition:
                transform .25s ease;
        }

        .dashboard-stat-link:hover .stat-arrow {
            transform:
                translate(2px, -2px);
        }

        .stat-content {
            display: flex;
            flex-direction: column;
        }

        .stat-label {
            margin-bottom: 5px;
            color:
                rgba(255, 255, 255, .78);
            font-size: 14px;
            font-weight: 500;
        }

        .stat-content h3 {
            margin: 0 0 3px;
            color: #fff;
            font-size: 34px;
            line-height: 1;
            font-weight: 700;
            letter-spacing: -.5px;
        }

        .stat-content small {
            color:
                rgba(255, 255, 255, .55);
            font-size: 12px;
        }

        @media (max-width: 991.98px) {
            .dashboard-overview {
                padding: 25px;
            }

            .overview-header {
                margin-bottom: 22px;
            }

            .dashboard-stat-card {
                min-height: 155px;
            }
        }

        @media (max-width: 767.98px) {
            .dashboard-overview {
                padding: 20px;
                border-radius: 22px;
            }

            .overview-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 14px;
                margin-bottom: 20px;
            }

            .overview-welcome h2 {
                font-size: 23px;
            }

            .overview-welcome p {
                font-size: 13px;
                line-height: 1.6;
            }

            .overview-date {
                font-size: 12px;
            }

            .dashboard-stat-card {
                min-height: 145px;
                padding: 18px;
            }

            .stat-content h3 {
                font-size: 30px;
            }

            .sidebar-collapse-btn {
                display: flex;
            }
        }

        @media (max-width: 480px) {
            .dashboard-overview {
                padding: 17px;
                border-radius: 20px;
            }

            .overview-welcome h2 {
                font-size: 21px;
            }

            .dashboard-stat-card {
                min-height: 135px;
            }
        }

        .dashboard-overview .row {
            display: grid !important;
            grid-template-columns:
                repeat(4, minmax(0, 1fr));
            gap: 14px !important;
            margin: 0 !important;
        }

        .dashboard-overview .row>[class*="col-"] {
            width: 100% !important;
            max-width: none !important;
            flex: none !important;
            padding: 0 !important;
        }

        @media (max-width: 1199.98px) {
            .dashboard-overview .row {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 575.98px) {
            .dashboard-overview .row {
                grid-template-columns: 1fr;
                gap: 12px !important;
            }
        }

        .surat-overview {
            position: relative;
            overflow: hidden;
            padding: 28px;
            border-radius: 24px;
            color: #fff;
            background:
                linear-gradient(135deg,
                    var(--sidebar) 0%,
                    var(--sidebar-second) 50%,
                    var(--primary-dark) 100%);
            box-shadow:
                var(--shadow-lg);
            isolation: isolate;
        }

        .surat-overview-decoration {
            position: absolute;
            z-index: -1;
            border-radius: 50%;
            pointer-events: none;
            background:
                rgba(27, 222, 27, .08);
        }

        .surat-overview-decoration-1 {
            width: 420px;
            height: 420px;
            top: -300px;
            right: -80px;
        }


        .surat-overview-decoration-2 {
            width: 320px;
            height: 320px;
            bottom: -270px;
            left: -150px;
        }

        .surat-stat-card {
            height: 100%;
            min-height: 110px;
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 20px;
            border: 1px solid rgba(27, 222, 27, .22);
            border-radius: var(--radius);
            background:
                rgba(255, 255, 255, .09);
            backdrop-filter: blur(12px);
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, .05);
            transition:
                var(--transition);
        }

        .surat-stat-card:hover {
            background:
                rgba(27, 222, 27, .13);
            border-color:
                rgba(27, 222, 27, .4);
            transform:
                translateY(-2px);
        }

        .surat-stat-icon {
            width: 54px;
            height: 54px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            color: var(--primary);
            background:
                rgba(27, 222, 27, .14);
            border: 1px solid rgba(27, 222, 27, .2);
            font-size: 23px;
        }

        .surat-stat-card small {
            display: block;
            margin-bottom: 2px;
            color:
                rgba(255, 255, 255, .65);
            font-size: 13px;
        }

        .surat-stat-card h3 {
            margin: 0;
            color: #fff;
            font-size: 30px;
            font-weight: 700;
            line-height: 1.2;
        }

        .surat-stat-card span {
            color:
                rgba(255, 255, 255, .45);
            font-size: 11px;
        }

        .surat-search-card {
            height: 100%;
            min-height: 110px;
            display: flex;
            align-items: center;
            padding: 20px;
            border: 1px solid rgba(27, 222, 27, .18);
            border-radius: var(--radius);
            background:
                rgba(255, 255, 255, .08);
            backdrop-filter: blur(12px);
        }

        .surat-search-card form {
            width: 100%;
        }

        .surat-search-card .input-group {
            overflow: hidden;
            border-radius: 12px;
            background: #fff;
            box-shadow:
                0 5px 20px rgba(0, 0, 0, .08);
        }

        .surat-search-card .input-group-text {
            border: 0;
            color: var(--muted);
            background: #fff;
            padding-left: 16px;
        }

        .surat-search-card .form-control {
            height: 48px;
            border: 0;
            box-shadow: none;
            color: var(--text);
            background: #fff;
        }

        .surat-search-card .form-control:focus {
            box-shadow: none;
        }

        .surat-search-card .form-control::placeholder {
            color: #91a191;
        }

        .surat-search-card .btn-search {
            min-width: 70px;
            border: 0;
            color: #fff;
            background: var(--primary);
            font-weight: 600;
            transition: var(--transition);
        }

        .surat-search-card .btn-search:hover {
            background: var(--primary-dark);
        }

        @media (max-width: 767.98px) {
            .surat-overview {
                padding: 20px;
                border-radius: 20px;
            }

            .surat-overview>.d-flex {
                flex-direction: column;
                align-items: flex-start !important;
            }

            .surat-overview>.d-flex .btn {
                width: 100%;
            }

            .surat-stat-card {
                min-height: 100px;
            }

            .surat-search-card {
                min-height: 90px;
                padding: 15px;
            }

            .surat-search-card .input-group {
                flex-wrap: nowrap;
            }

            .surat-search-card .form-control {
                min-width: 0;
            }
        }

        .arsip-btn-search,
        .arsip-btn-reset {
            color: #fff !important;
            border: none;
            transition: var(--transition);
        }

        .arsip-btn-search:hover,
        .arsip-btn-reset:hover {
            color: #fff !important;
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        .arsip-btn-search {
            background: var(--primary);
        }

        .arsip-btn-search:hover {
            background: var(--primary-dark);
        }

        .arsip-btn-reset {
            background: var(--muted);
        }

        .arsip-btn-reset:hover {
            background: var(--sidebar);
        }
    </style>

    @stack('styles')

</head>

<body>

    <!-- =========================================================
                        SIDEBAR
        Desktop : fixed sidebar
        Mobile  : Bootstrap Offcanvas
    ========================================================== -->

    <aside class="sidebar offcanvas-lg offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">

        <!-- =====================================================
                            BRAND
        ====================================================== -->

        <div class="brand">

            <div class="brand-logo">
                <span class="material-symbols-outlined">
                    account_balance
                </span>
            </div>

            <div class="brand-text">

                <small>
                    MTsN 1 Banyuwangi
                </small>

                <h4 id="sidebarLabel">
                    Persuratan
                </h4>

            </div>


            <!--
                Tombol ini:
                - Desktop : collapse sidebar
                - Mobile  : tutup Offcanvas Bootstrap
            -->

            <button type="button" class="sidebar-collapse-btn" id="sidebarCollapseBtn"
                aria-label="Tutup atau kecilkan sidebar">

                <span class="material-symbols-outlined">
                    density_small
                </span>

            </button>

        </div>


        <!-- =====================================================
                            MENU
        ====================================================== -->

        <div class="menu">

            <div class="menu-title">
                Menu Utama
            </div>


            <ul class="nav flex-column">


                <!-- =========================
                            DASHBOARD
                ========================== -->

                <li class="nav-item">

                    <a href="{{ route('dashboard') }}" class="nav-link
                        {{ request()->routeIs('dashboard') ? 'active' : '' }}" data-title="Dashboard">

                        <span class="material-symbols-outlined">
                            dashboard
                        </span>

                        <p>
                            Dashboard
                        </p>

                    </a>

                </li>


                <!-- =========================
                            SURAT MASUK
                ========================== -->

                <li class="nav-item">

                    <a href="{{ route('surat-masuk.index') }}" class="nav-link
                        {{ request()->routeIs('surat-masuk.*') ? 'active' : '' }}" data-title="Surat Masuk">

                        <span class="material-symbols-outlined">
                            inbox
                        </span>

                        <p>
                            Surat Masuk
                        </p>

                    </a>

                </li>


                <!-- =========================
                            SURAT KELUAR
                ========================== -->

                <li class="nav-item">

                    <a href="{{ route('surat-keluar.index') }}" class="nav-link
                        {{ request()->routeIs('surat-keluar.*') ? 'active' : '' }}" data-title="Surat Keluar">

                        <span class="material-symbols-outlined">
                            send
                        </span>

                        <p>
                            Surat Keluar
                        </p>

                    </a>

                </li>


                <!-- =========================
                            SURAT KEPUTUSAN
                ========================== -->

                <li class="nav-item">

                    <a href="{{ route('surat-keputusan.index') }}" class="nav-link
                        {{ request()->routeIs('surat-keputusan.*') ? 'active' : '' }}" data-title="Surat Keputusan">

                        <span class="material-symbols-outlined">
                            gavel
                        </span>

                        <p>
                            Surat Keputusan
                        </p>

                    </a>

                </li>


                <!-- =========================
                            DISPOSISI
                ========================== -->

                <li class="nav-item">

                    <a href="{{ route('disposisi.index') }}" class="nav-link
                        {{ request()->routeIs('disposisi.*') ? 'active' : '' }}" data-title="Disposisi">

                        <span class="material-symbols-outlined">
                            cycle
                        </span>

                        <p>
                            Disposisi
                        </p>

                    </a>

                </li>


                <!-- =========================
                            ARSIP
                ========================== -->

                <li class="nav-item">

                    <a href="{{ route('arsip.index') }}" class="nav-link
                        {{ request()->routeIs('arsip.*') ? 'active' : '' }}" data-title="Arsip">

                        <span class="material-symbols-outlined">
                            archive
                        </span>

                        <p>
                            Arsip
                        </p>

                    </a>

                </li>


                <!-- =========================
                            LAPORAN
                ========================== -->

                <li class="nav-item">

                    <a href="{{ route('laporan.index') }}" class="nav-link
                        {{ request()->routeIs('laporan.*') ? 'active' : '' }}" data-title="Laporan">

                        <span class="material-symbols-outlined">
                            bar_chart
                        </span>

                        <p>
                            Laporan
                        </p>

                    </a>

                </li>

            </ul>

        </div>


        <!-- =====================================================
                        SIDEBAR FOOTER
        ====================================================== -->

        <div class="sidebar-footer">


            <!-- =========================
                            PROFILE
            ========================== -->

            <div class="profile">

                <div class="profile-avatar">

                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                </div>


                <div class="profile-info">

                    <h6>
                        {{ Auth::user()->name }}
                    </h6>

                    <small>
                        Administrator
                    </small>

                </div>

            </div>


            <!-- =========================
                            LOGOUT
            ========================== -->

            <a href="{{ route('logout') }}" class="logout-btn" onclick="
                    event.preventDefault();
                    document.getElementById('logout-form').submit();
                ">

                <i class="bi bi-box-arrow-right"></i>

                <span>
                    Logout
                </span>

            </a>


            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                @csrf

            </form>

        </div>

    </aside>


    <!-- =========================================================
                        MAIN WRAPPER
    ========================================================== -->

    <main class="main-wrapper" id="mainWrapper">


        <!-- =====================================================
                            TOPBAR
        ====================================================== -->

        <header class="topbar">


            <!-- =========================
                        LEFT SIDE
            ========================== -->

            <div class="topbar-left">


                <!--
                    MOBILE BURGER

                    Bootstrap Offcanvas:
                    data-bs-toggle="offcanvas"
                    data-bs-target="#sidebar"
                -->

                <button type="button" class="btn btn-light border mobile-menu-btn" data-bs-toggle="offcanvas"
                    data-bs-target="#sidebar" aria-controls="sidebar" aria-label="Buka menu">

                    <span class="material-symbols-outlined">
                        menu
                    </span>

                </button>


                <!-- =========================
                            PAGE TITLE
                ========================== -->

                <div class="topbar-title">

                    <h4>
                        @yield('title', 'Dashboard')
                    </h4>

                    <small>
                        Sistem Persuratan MTsN 1 Banyuwangi
                    </small>

                </div>

            </div>


            <!-- =========================
                        RIGHT SIDE
            ========================== -->

            <div class="topbar-right">


                <!-- Date -->

                <span class="text-secondary">

                    <i class="bi bi-calendar-event me-1"></i>

                    {{ now()->translatedFormat('d F Y') }}

                </span>


                <!-- User Avatar -->

                <div class="profile mb-0">

                    <div class="profile-avatar" style="
                            width: 40px;
                            height: 40px;
                            font-size: 15px;
                        ">

                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                    </div>

                </div>

            </div>

        </header>


        <!-- =====================================================
                            PAGE CONTENT
        ====================================================== -->

        <div class="content">


            <!-- =========================
                            BREADCRUMB
            ========================== -->

            @if(trim($__env->yieldContent('breadcrumb')))

                <nav class="mb-4">

                    <ol class="breadcrumb mb-0">

                        @yield('breadcrumb')

                    </ol>

                </nav>

            @endif


            <!-- =========================
                            SUCCESS
            ========================== -->

            @if(session('success'))

                <div class="alert alert-success shadow-sm">

                    <i class="bi bi-check-circle-fill me-2"></i>

                    {{ session('success') }}

                </div>

            @endif


            <!-- =========================
                            ERROR
            ========================== -->

            @if(session('error'))

                <div class="alert alert-danger shadow-sm">

                    <i class="bi bi-x-circle-fill me-2"></i>

                    {{ session('error') }}

                </div>

            @endif


            <!-- =========================
                        VALIDATION ERROR
            ========================== -->

            @if($errors->any())

                <div class="alert alert-danger shadow-sm">

                    <div class="fw-bold mb-2">

                        <i class="bi bi-exclamation-circle me-2"></i>

                        Terjadi kesalahan

                    </div>


                    <ul class="mb-0 ps-4">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- =========================
                        PAGE CONTENT
            ========================== -->

            @yield('content')

        </div>

    </main>


    <!-- =========================================================
                        GLOBAL LOADING
    ========================================================== -->

    <div id="globalLoading" class="global-loading">

        <div class="loading-box">

            <div class="spinner-border text-success" role="status">

                <span class="visually-hidden">
                    Loading...
                </span>

            </div>

            <div class="loading-text" id="loadingText">

                Memproses...

            </div>

        </div>

    </div>


    <!-- =========================================================
                            FOOTER
    ========================================================== -->

    <footer class="text-center py-4 text-secondary border-top bg-white">

        <small>

            © {{ date('Y') }}

            <strong>
                MTsN 1 Banyuwangi
            </strong>

            • Sistem Persuratan

        </small>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const sidebarCollapseBtn = document.getElementById('sidebarCollapseBtn');
            const mainWrapper = document.getElementById('mainWrapper');
            const navLinks = document.querySelectorAll('.sidebar .nav-link');
            const DESKTOP_BREAKPOINT = 992;
            function isDesktop() {
                return window.innerWidth >= DESKTOP_BREAKPOINT;
            }
            let offcanvasInstance = null;
            if (sidebar) {
                offcanvasInstance =
                    bootstrap.Offcanvas.getOrCreateInstance(
                        sidebar
                    );
            }
            function setDesktopCollapsed(collapsed) {
                if (!sidebar || !mainWrapper) {
                    return;
                }
                if (collapsed) {
                    sidebar.classList.add('collapsed');
                    mainWrapper.classList.add('expanded');
                } else {
                    sidebar.classList.remove('collapsed');
                    mainWrapper.classList.remove('expanded');
                }
                localStorage.setItem('sidebar-collapsed', collapsed ? 'true' : 'false');
            }
            function restoreSidebarState() {
                if (!isDesktop()) {
                    sidebar.classList.remove('collapsed');
                    mainWrapper.classList.remove('expanded');
                    return;
                }
                const savedState =
                    localStorage.getItem(
                        'sidebar-collapsed'
                    );
                if (savedState === 'true') {
                    sidebar.classList.add('collapsed');
                    mainWrapper.classList.add('expanded');
                } else {
                    sidebar.classList.remove('collapsed');
                    mainWrapper.classList.remove('expanded');
                }
            }
            if (sidebarCollapseBtn) {
                sidebarCollapseBtn.addEventListener(
                    'click',
                    function () {
                        if (!isDesktop()) {
                            if (offcanvasInstance) {
                                offcanvasInstance.hide();
                            }
                            return;
                        }
                        const isCollapsed =
                            sidebar.classList.contains(
                                'collapsed'
                            );
                        setDesktopCollapsed(!isCollapsed);
                    }
                );
            }
            function updateCollapseButton() {
                if (!sidebarCollapseBtn) {
                    return;
                }
                const icon = sidebarCollapseBtn.querySelector('.material-symbols-outlined');
                if (!icon) {
                    return;
                }
                if (!isDesktop()) {
                    icon.textContent = 'close';
                    sidebarCollapseBtn.setAttribute('aria-label', 'Tutup menu');
                    sidebarCollapseBtn.setAttribute('title', 'Tutup menu');
                    return;
                }
                const collapsed =
                    sidebar.classList.contains('collapsed');
                if (collapsed) {
                    icon.textContent = 'density_small';
                    sidebarCollapseBtn.setAttribute('aria-label', 'Perbesar sidebar');
                    sidebarCollapseBtn.setAttribute('title', 'Perbesar sidebar');
                } else {
                    icon.textContent = 'density_small';
                    sidebarCollapseBtn.setAttribute('aria-label', 'Kecilkan sidebar');
                    sidebarCollapseBtn.setAttribute('title', 'Kecilkan sidebar');
                }
            }
            navLinks.forEach(function (link) {
                link.addEventListener('click', function () {
                    if (isDesktop()) {
                        return;
                    }
                    if (offcanvasInstance) {
                        offcanvasInstance.hide();
                    }
                }
                );
            });
            if (sidebar) {
                sidebar.addEventListener('shown.bs.offcanvas', function () {
                    document.body.classList.add('sidebar-open');
                }
                );
                sidebar.addEventListener('hidden.bs.offcanvas', function () {
                    document.body.classList.remove('sidebar-open');
                }
                );
            }
            let wasDesktop = isDesktop();
            window.addEventListener('resize', function () {
                const currentlyDesktop = isDesktop();
                if (!wasDesktop && currentlyDesktop) {
                    if (offcanvasInstance) {
                        offcanvasInstance.hide();
                    }
                    restoreSidebarState();
                }
                if (wasDesktop && !currentlyDesktop) {
                    sidebar.classList.remove('collapsed');
                    mainWrapper.classList.remove('expanded');
                }
                wasDesktop = currentlyDesktop;
                updateCollapseButton();
            }
            );
            navLinks.forEach(function (link) {
                link.addEventListener('click', function (event) {
                    const ripple = document.createElement('span');
                    ripple.classList.add('ripple');
                    const rect = link.getBoundingClientRect();
                    ripple.style.left = (event.clientX - rect.left) + 'px';
                    ripple.style.top = (event.clientY - rect.top) + 'px';
                    link.appendChild(ripple);
                    setTimeout(function () { ripple.remove(); }, 600);
                }
                );
            });
            const globalLoading = document.getElementById('globalLoading');
            const loadingText = document.getElementById('loadingText');
            function showLoading(message = 'Memproses...') {
                if (!globalLoading) {
                    return;
                }
                if (loadingText) {
                    loadingText.textContent = message;
                }
                globalLoading.classList.add('show');
            }
            function hideLoading() {
                if (!globalLoading) {
                    return;
                }
                globalLoading.classList.remove('show');
            }
            document.querySelectorAll('form').forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.id === 'logout-form' || form.classList.contains('delete-form')) {
                        return;
                    }
                    if (event.defaultPrevented) {
                        return;
                    }
                    showLoading(
                        'Menyimpan data...'
                    );
                }
                );
            });
            document
                .querySelectorAll('.logout-btn')
                .forEach(function (link) {
                    link.addEventListener(
                        'click',
                        function () {
                            showLoading(
                                'Keluar dari sistem...'
                            );
                        }
                    );
                });
            restoreSidebarState();
            updateCollapseButton()
            window.addEventListener(
                'load',
                function () {
                    setTimeout(function () {
                        hideLoading();
                    }, 250);
                }
            );
        });
    </script>
    @stack('scripts')
</body>

</html>