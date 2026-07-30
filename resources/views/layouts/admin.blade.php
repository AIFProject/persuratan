<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Persuratan')</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/bootstrap-icons.min.css">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --sidebar: #0f172a;
            --sidebar-hover: #1e293b;
            --bg: #f8fafc;
            --card: #ffffff;
            --text: #1e293b;
            --muted: #64748b;
            --border: #e2e8f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }

        /* ===========================
                SIDEBAR
        =========================== */
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: var(--sidebar);
            display: flex;
            flex-direction: column;
            z-index: 999;
        }

        .brand {
            padding: 28px 24px;
            border-bottom: 1px solid rgba(255, 255, 255, .08);
        }

        .brand small {
            color: #94a3b8;
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .brand h4 {
            margin-top: 6px;
            color: white;
            font-weight: 700;
            font-size: 20px;
        }

        .menu {
            flex: 1;
            padding: 18px;
        }

        .menu-title {
            color: #64748b;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 12px;
            padding-left: 12px;
        }

        .sidebar .nav-link {
            color: #cbd5e1;
            border-radius: 12px;
            padding: 13px 16px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: .25s;
            font-weight: 500;
        }

        .sidebar .nav-link i {
            font-size: 18px;
            width: 22px;
        }

        .sidebar .nav-link:hover {
            background: var(--sidebar-hover);
            color: #fff;
            transform: translateX(4px);
        }

        .sidebar .nav-link.active {
            background: var(--primary);
            color: white;
            box-shadow: 0 10px 20px rgba(37, 99, 235, .25);
        }

        .sidebar-footer {
            padding: 20px;
            border-top: 1px solid rgba(255, 255, 255, .08);
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 15px;
        }

        .profile-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
            font-weight: 700;
        }

        .profile h6 {
            color: white;
            margin: 0;
            font-size: 15px;
        }

        .profile small {
            color: #94a3b8;
        }

        /* ===========================
                CONTENT
        =========================== */
        .main-wrapper {
            margin-left: 260px;
            min-height: 100vh;
        }

        .topbar {
            background: white;
            height: 75px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            border-bottom: 1px solid var(--border);
        }

        .topbar-title h4 {
            margin: 0;
            font-weight: 700;
        }

        .topbar-title small {
            color: var(--muted);
        }

        .content {
            padding: 30px;
        }

        /* ===========================
                CARD
        =========================== */
        .card {
            border: none;
            border-radius: 18px;
            background: var(--card);
            box-shadow: 0 10px 30px rgba(15, 23, 42, .06);
            transition: .3s;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(15, 23, 42, .10);
        }

        .card-header {
            background: white;
            border: none;
            border-bottom: 1px solid var(--border);
            font-weight: 600;
            border-radius: 18px 18px 0 0 !important;
        }

        /* ===========================
                ALERT
        =========================== */
        .alert {
            border: none;
            border-radius: 12px;
        }

        /* ===========================
                BUTTON
        =========================== */
        .btn {
            border-radius: 10px;
            font-weight: 500;
        }

        .btn-primary {
            background: var(--primary);
            border: none;
        }

        .btn-primary:hover {
            background: var(--primary-hover);
        }

        /* ===========================
                TABLE
        =========================== */
        .table {
            vertical-align: middle;
        }

        .table thead {
            background: #f1f5f9;
        }

        .table thead th {
            border: none;
            color: #475569;
            font-weight: 600;
        }

        /* ===========================
                SCROLLBAR
        =========================== */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 20px;
        }

        /* ===========================
                RESPONSIVE
        =========================== */
        @media(max-width:992px) {
            .sidebar {
                width: 80px;
            }

            .brand h4,
            .brand small,
            .sidebar span,
            .profile-info {
                display: none;
            }

            .main-wrapper {
                margin-left: 80px;
            }

            .sidebar .nav-link {
                justify-content: center;
            }
        }

        @media(max-width:768px) {
            .sidebar {
                display: none;
            }

            .main-wrapper {
                margin-left: 0;
            }

            .topbar {
                padding: 20px;
            }

            .content {
                padding: 20px;
            }
        }
    </style>
    @stack('styles')
</head>

<body>
    <div class="sidebar">
        <!-- Logo -->
        <!-- Logo -->
        <div class="brand">
            <small>MTsN 1 Banyuwangi</small>
            <h4>Sistem Persuratan</h4>
        </div>
        <!-- Menu -->
        <div class="menu">
            <div class="menu-title">
                Menu Utama
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('surat-masuk.index') }}"
                        class="nav-link {{ request()->routeIs('surat-masuk.*') ? 'active' : '' }}">
                        <i class="bi bi-envelope-paper-fill"></i>
                        <span>Surat Masuk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('surat-keluar.index') }}"
                        class="nav-link {{ request()->routeIs('surat-keluar.*') ? 'active' : '' }}">
                        <i class="bi bi-send-fill"></i>
                        <span>Surat Keluar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('disposisi.index') }}"
                        class="nav-link {{ request()->routeIs('disposisi.*') ? 'active' : '' }}">
                        <i class="bi bi-arrow-left-right"></i>
                        <span>Disposisi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('arsip.index') }}"
                        class="nav-link {{ request()->routeIs('arsip.*') ? 'active' : '' }}">
                        <i class="bi bi-archive-fill"></i>
                        <span>Arsip</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('laporan.index') }}"
                        class="nav-link {{ request()->routeIs('laporan.*') ? 'active' : '' }}">
                        <i class="bi bi-file-earmark-bar-graph-fill"></i>
                        <span>Laporan</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Footer Sidebar -->
        <div class="sidebar-footer">
            <div class="profile">
                <div class="profile-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="profile-info">
                    <h6>{{ Auth::user()->name }}</h6>
                    <small>Administrator</small>
                </div>
            </div>
            <a href="{{ route('logout') }}" class="nav-link text-danger"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
    <!-- ===========================
        MAIN CONTENT
=========================== -->
    <div class="main-wrapper">
        <!-- Topbar -->
        <div class="topbar">
            <div class="topbar-title">
                <h4>@yield('title', 'Dashboard')</h4>
                <small>Sistem Persuratan MTsN 1 Banyuwangi</small>
            </div>
            <div class="d-flex align-items-center gap-3">
                <span class="text-secondary">
                    <i class="bi bi-calendar-event"></i>
                    {{ now()->translatedFormat('d F Y') }}
                </span>
                <div class="profile d-flex align-items-center mb-0">
                    <div class="profile-avatar" style="width:40px;height:40px;font-size:15px;">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class="content">
            @if (trim($__env->yieldContent('breadcrumb')))
                <nav class="mb-4">
                    <ol class="breadcrumb mb-0">
                        @yield('breadcrumb')
                    </ol>
                </nav>
            @endif
            @if(session('success'))
                <div class="alert alert-success shadow-sm">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger shadow-sm">
                    <i class="bi bi-x-circle-fill me-2"></i>
                    {{ session('error') }}
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger shadow-sm">
                    <strong class="d-block mb-2">
                        Terjadi kesalahan
                    </strong>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </div>
    </div>
    <!-- Footer -->
    <footer class="text-center py-4 text-secondary border-top bg-white">
        <small>
            © {{ date('Y') }}
            <strong>MTsN 1 Banyuwangi</strong>
            • Sistem Persuratan
        </small>
    </footer>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto close alert
        document.addEventListener('DOMContentLoaded', function () {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function (alert) {
                setTimeout(() => {
                    const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
                    bsAlert.close();
                }, 4000);
            });
        });
    </script>
    @stack('scripts')
</body>

</html>