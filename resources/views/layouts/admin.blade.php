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
    <link rel="icon" type="image/png" href="{{ asset('logo-mtsn.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <style>
        :root {

            /* =============== PRIMARY =============== */

            --primary: #1bde1b;
            --primary-dark: #16c216;
            --primary-light: #49eb49;
            --primary-soft: #d8fbd8;

            /* =============== SIDEBAR =============== */

            --sidebar: #0f2613;
            --sidebar-second: #16361b;
            --sidebar-hover: rgba(27, 222, 27, .12);

            /* =============== BACKGROUND =============== */

            --background: #f5fff5;
            --surface: #ffffff;

            /* =============== TEXT =============== */

            --text: #1b2a1b;
            --muted: #5d7460;

            /* =============== BORDER =============== */

            --border: #dcefdc;

            /* =============== STATUS =============== */

            --success: #1bde1b;
            --warning: #f59e0b;
            --danger: #ef4444;

            /* =============== SIZE =============== */

            --sidebar-width: 280px;
            --sidebar-collapse: 88px;
            --topbar-height: 78px;

            --radius: 18px;

            /* =============== SHADOW =============== */

            --shadow-sm: 0 5px 15px rgba(27, 222, 27, .08);
            --shadow: 0 10px 35px rgba(27, 222, 27, .10);
            --shadow-lg: 0 20px 50px rgba(27, 222, 27, .16);

            --transition: .3s cubic-bezier(.4, 0, .2, 1);

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
            overflow-x: hidden;
            min-height: 100vh;
        }

        a {
            text-decoration: none;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        /* =====================================================
                    SIDEBAR
===================================================== */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background:
                linear-gradient(180deg,
                    #1bde1b 0%,
                    #149614 100%);
            color: #fff;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            z-index: 200;
            transition: var(--transition);
            box-shadow:
                18px 0 45px rgba(15, 23, 42, .12);
        }

        /* ================= BRAND ================= */
        .brand {
            padding: 28px 24px;
            display: flex;
            align-items: center;
            gap: 16px;
            border-bottom: 1px solid rgba(255, 255, 255, .08);
        }

        .brand-logo {
            width: 54px;
            height: 54px;
            border-radius: 18px;
            background: rgba(255, 255, 255, .18);
            backdrop-filter: blur(10px);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 28px;
            color: #fff;
            flex-shrink: 0;
        }

        .brand small {
            display: block;
            color: #fff;
            letter-spacing: 1px;
            font-size: 11px;
            text-transform: uppercase;
        }

        .brand h4 {
            margin-top: 4px;
            margin-bottom: 0;
            font-size: 20px;
            font-weight: 700;
            color: #fff;
        }

        /* ================= MENU ================= */
        .menu {
            flex: 1;
            overflow-y: auto;
            padding: 24px 18px;
        }

        .menu::-webkit-scrollbar {
            width: 6px;
        }

        .menu::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, .10);
            border-radius: 50px;
        }

        .menu-title {
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 11px;
            padding-left: 16px;
            margin-bottom: 16px;
            font-weight: 600;
        }

        /* =====================================================
                    MENU ITEM
===================================================== */
        .sidebar .nav {
            display flex;
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
            padding: 14px 16px;
            border-radius: 16px;
            color: #cbd5e1;
            font-size: 15px;
            font-weight: 500;
            transition: var(--transition);
            overflow: hidden;
        }

        /* icon */
        .sidebar .nav-link .material-symbols-outlined {
            width: 42px;
            height: 42px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 12px;
            background: rgba(255, 255, 255, .06);
            font-size: 22px;
            transition: var(--transition);
            flex-shrink: 0;
        }

        /* text */
        .sidebar .nav-link p {
            margin: 0;
            white-space: nowrap;
        }

        /* hover */
        .sidebar .nav-link:hover {
            color: #fff;
            background: rgba(255, 255, 255, .07);
            transform: translateX(6px);
        }

        .sidebar .nav-link:hover .material-symbols-outlined {
            background: rgba(255, 255, 255, .12);
        }

        /* active */
        .sidebar .nav-link.active {
            background: #ffffff;
            color: #149614;
            box-shadow:
                0 12px 30px rgba(27, 222, 27, .25);
        }

        .sidebar .nav-link.active .material-symbols-outlined {
            background: var(--primary-soft);
            color: var(--primary);
        }

        /* left indicator */
        .sidebar .nav-link.active::before {
            content: "";
            position: absolute;
            left: -2px;
            top: 10px;
            width: 5px;
            height: 34px;
            border-radius: 20px;
            background: var(--primary);
        }

        /* badge */
        .menu-badge {
            margin-left: auto;
            background: rgba(255, 255, 255, .10);
            color: #fff;
            padding: 3px 10px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 600;
        }

        /* =====================================================
                COLLAPSED SIDEBAR
===================================================== */
        .sidebar.collapsed {
            width: 88px;
        }

        .sidebar.collapsed .brand {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 12px;

            padding: 18px 0;
        }

        .sidebar.collapsed .brand-text {
            display: none;
        }

        .sidebar.collapsed .menu-title {
            display: none;
        }

        .sidebar.collapsed .nav-link {
            justify-content: center;
            padding: 12px;
        }

        .sidebar.collapsed .nav-link p {
            display: none;
        }

        .sidebar.collapsed .menu-badge {
            display: none;
        }

        .sidebar.collapsed .nav-link::before {
            display: none;
        }

        .sidebar.collapsed .profile-info {
            display: none;
        }

        .sidebar.collapsed #sidebarToggle {
            order: 1;
        }

        .sidebar.collapsed .brand-logo {
            order: 2;
        }

        .sidebar.collapsed .brand-text {
            display: none;
        }

        .main-wrapper.expanded {
            margin-left: 88px;
        }

        /* =====================================================
                    TOOLTIP
===================================================== */
        .sidebar.collapsed .nav-link {
            position: relative;
        }

        .sidebar.collapsed .nav-link:hover::after {
            content: attr(data-title);
            position: absolute;
            left: 78px;
            top: 50%;
            transform: translateY(-50%);
            background: #111827;
            color: #fff;
            padding: 8px 12px;
            border-radius: 10px;
            white-space: nowrap;
            font-size: 13px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, .15);
            z-index: 1000;
        }

        /* =====================================================
                CONTENT
===================================================== */
        .main-wrapper {
            position: relative;
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: var(--transition);
        }

        .main-wrapper::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image: url("{{ asset('13551.jpg') }}");
            background-repeat: repeat;
            background-position: center;
            background-size: 700px;
            filter: blur(3px);
            opacity: .12;
            opacity: 1;
            pointer-events: none;
            z-index: 0;
        }

        /* =====================================================
                    TOPBAR
===================================================== */
        .topbar {
            position: sticky;
            top: 0;
            z-index: 999;
            height: 70px;
            background: rgba(255, 255, 255, .82);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(226, 232, 240, .8);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 28px;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 20px;
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

        .topbar,
        .content {
            position: relative;
            z-index: 2;
        }

        /* =====================================================
                PROFILE SIDEBAR
===================================================== */
        .sidebar-footer {
            padding: 20px;
            border-top: 1px solid rgba(255, 255, 255, .08);
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 14px;
            background: rgba(255, 255, 255, .05);
            padding: 14px;
            border-radius: 18px;
            margin-bottom: 18px;
        }

        .profile-avatar {
            width: 50px;
            height: 50px;
            border-radius: 16px;
            background: linear-gradient(135deg,
                    #1bde1b,
                    #49eb49);
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-weight: 700;
            font-size: 18px;
            flex-shrink: 0;
        }

        .profile-info h6 {
            color: #fff;
            margin: 0;
            font-size: 15px;
            font-weight: 600;
        }

        .profile-info small {
            color: #94a3b8;
        }

        /* =====================================================
                    CONTENT
===================================================== */
        .content {
            padding: 34px;
        }

        .content>.container-fluid {
            padding: 0;
        }

        /* =====================================================
                CARD
===================================================== */
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: var(--transition);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .card-header {
            background: #fff;
            border-bottom: 1px solid var(--border);
            font-weight: 600;
        }

        /* =====================================================
                BUTTON
===================================================== */
        .btn {
            border-radius: 12px;
            font-weight: 600;
        }

        .btn-primary {
            background: var(--primary);
            border: none;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        /* =====================================================
                TABLE
===================================================== */
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

        /* =====================================================
                ALERT
===================================================== */
        .alert {
            border: none;
            border-radius: 14px;
        }

        /* ====================================================
                SCROLLBAR
===================================================== */
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

        /* =====================================================
                    LOGOUT BUTTON
===================================================== */
        .logout-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            width: 100%;
            padding: 14px;
            border-radius: 16px;
            color: #f87171;
            background: rgba(239, 68, 68, .08);
            transition: .3s;
        }

        .logout-btn:hover {
            background: #ef4444;
            color: #fff;
        }

        /* =====================================================
                    MOBILE OVERLAY
===================================================== */
        .sidebar-overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, .45);
            backdrop-filter: blur(2px);
            opacity: 0;
            visibility: hidden;
            transition: .3s;
            z-index: 900;
        }

        .sidebar-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        /* =====================================================
                    RESPONSIVE
===================================================== */
        @media (max-width:992px) {
            .sidebar {
                left: -100%;
                width: 280px;
            }

            .sidebar.show {
                left: 0;
            }

            .main-wrapper {
                margin-left: 0;
            }
        }

        @media (max-width:768px) {
            .topbar {
                padding: 0 18px;
            }

            .topbar-title h4 {
                font-size: 18px;
            }

            .content {
                padding: 20px;
            }
        }

        /* =====================================================
                    RIPPLE
===================================================== */

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

        /* =====================================================
                SIDEBAR ANIMATION
===================================================== */
        .sidebar .nav-item {
            opacity: 0;
            transform: translateX(-15px);
            animation: slideMenu .45s forwards;
        }

        .sidebar .nav-item:nth-child(1) {
            animation-delay: .05s;
        }

        .sidebar .nav-item:nth-child(2) {
            animation-delay: .10s;
        }

        .sidebar .nav-item:nth-child(3) {
            animation-delay: .15s;
        }

        .sidebar .nav-item:nth-child(4) {
            animation-delay: .20s;
        }

        .sidebar .nav-item:nth-child(5) {
            animation-delay: .25s;
        }

        .sidebar .nav-item:nth-child(6) {
            animation-delay: .30s;
        }

        @keyframes slideMenu {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .modal {
            z-index: 2000 !important;
        }

        .modal-dialog {
            z-index: 2001 !important;
        }

        .modal-content {
            z-index: 2002 !important;
        }
    </style>
    @stack('styles')
</head>

<body>
    <div class="sidebar">
        <!-- Logo -->
        <div class="brand">
            <div class="brand-logo">
                <span class="material-symbols-outlined">account_balance</span>
            </div>
            <div class="brand-text">
                <small>MTsN 1 Banyuwangi</small>
                <h4>Persuratan</h4>
            </div>
            <button class="btn btn-light border" id="sidebarToggle">
                <span class="material-symbols-outlined">density_small</span>
            </button>
        </div>
        <!-- Menu -->
        <div class="menu">
            <div class="menu-title">
                Menu Utama
            </div>
            <ul class="nav flex-column">
                <li class="nav-item d-flex align-items-center justify-content-between">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" data-title="Dashboard">
                        <span class="material-symbols-outlined">dashboard</span>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center justify-content-between">
                    <a href="{{ route('surat-masuk.index') }}"
                        class="nav-link {{ request()->routeIs('surat-masuk.*') ? 'active' : '' }}"
                        data-title="Surat Masuk">
                        <span class="material-symbols-outlined">inbox</span>
                        <p>Surat Masuk</p>
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center justify-content-between">
                    <a href="{{ route('surat-keluar.index') }}"
                        class="nav-link {{ request()->routeIs('surat-keluar.*') ? 'active' : '' }}"
                        data-title="Surat Keluar">
                        <span class="material-symbols-outlined">send</span>
                        <p>Surat Keluar</p>
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center justify-content-between">
                    <a href="{{ route('disposisi.index') }}"
                        class="nav-link {{ request()->routeIs('disposisi.*') ? 'active' : '' }}" data-title="Disposisi">
                        <span class="material-symbols-outlined">cycle</span>
                        <p>Disposisi</p>
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center justify-content-between">
                    <a href="{{ route('arsip.index') }}"
                        class="nav-link {{ request()->routeIs('arsip.*') ? 'active' : '' }}" data-title="Arsip">
                        <span class="material-symbols-outlined">archive</span>
                        <p>Arsip</p>
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center justify-content-between">
                    <a href="{{ route('laporan.index') }}"
                        class="nav-link {{ request()->routeIs('laporan.*') ? 'active' : '' }}" data-title="Laporan">
                        <span class="material-symbols-outlined">bar_chart</span>
                        <p>Laporan</p>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Footer Sidebar -->
        <div class="sidebar-footer">
            <div class="profile">
                <div class="profile-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                <div class="profile-info">
                    <h6>{{ Auth::user()->name }}</h6>
                    <small>Administrator</small>
                </div>
            </div>
            <a href="{{ route('logout') }}" class="logout-btn" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
    <div class="sidebar-overlay"></div>
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
        document.addEventListener("DOMContentLoaded", () => {
            /* ===========================
                    ALERT AUTO CLOSE
            =========================== */
            document.querySelectorAll(".alert").forEach(alert => {
                setTimeout(() => {
                    bootstrap.Alert
                        .getOrCreateInstance(alert)
                        .close();
                }, 4000);
            });
            /* ===========================
                    ELEMENT
            =========================== */
            const sidebar = document.querySelector(".sidebar");
            const wrapper = document.querySelector(".main-wrapper");
            const overlay = document.querySelector(".sidebar-overlay");
            const toggle = document.getElementById("sidebarToggle");
            if (!sidebar || !toggle) return;
            /* ===========================
                    RESTORE STATE
            =========================== */
            function restoreSidebar() {
                if (window.innerWidth > 992) {
                    const collapsed =
                        localStorage.getItem("sidebar-collapsed");
                    if (collapsed === "true") {
                        sidebar.classList.add("collapsed");
                        wrapper.classList.add("expanded");
                    }
                } else {
                    sidebar.classList.remove("collapsed");
                    wrapper.classList.remove("expanded");
                }
            }
            restoreSidebar();
            /* ===========================
                    TOGGLE
            =========================== */
            toggle.addEventListener("click", () => {
                if (window.innerWidth <= 992) {
                    sidebar.classList.toggle("show");
                    overlay.classList.toggle("show");
                } else {
                    const collapsed =
                        sidebar.classList.toggle("collapsed");
                    wrapper.classList.toggle(
                        "expanded",
                        collapsed
                    );
                    localStorage.setItem(
                        "sidebar-collapsed",
                        collapsed
                    );
                }
            });
            /* ===========================
                    OVERLAY MOBILE
            =========================== */
            overlay?.addEventListener("click", () => {
                sidebar.classList.remove("show");
                overlay.classList.remove("show");
            });
            /* ===========================
                    CLOSE MOBILE AFTER CLICK
            =========================== */
            document
                .querySelectorAll(".sidebar .nav-link")
                .forEach(link => {
                    link.addEventListener("click", () => {
                        if (window.innerWidth <= 992) {
                            sidebar.classList.remove("show");
                            overlay.classList.remove("show");
                        }
                    });
                });
            /* ===========================
                    RESIZE
            =========================== */
            window.addEventListener("resize", () => {
                restoreSidebar();
                if (window.innerWidth > 992) {
                    sidebar.classList.remove("show");
                    overlay.classList.remove("show");
                }
            });
            /* ===========================
                    RIPPLE
            =========================== */
            document.querySelectorAll(".nav-link")
                .forEach(link => {
                    link.addEventListener("click", function (e) {
                        const ripple =
                            document.createElement("span");
                        ripple.className = "ripple";
                        const rect =
                            this.getBoundingClientRect();
                        ripple.style.left =
                            (e.clientX - rect.left) + "px";
                        ripple.style.top =
                            (e.clientY - rect.top) + "px";
                        this.appendChild(ripple);
                        setTimeout(() => {
                            ripple.remove();
                        }, 600);
                    });
                });

            const deleteForm = document.getElementById('deleteForm');

            if (deleteForm) {
                deleteForm.addEventListener('submit', function () {

                    const btn = document.getElementById('btnDelete');

                    if (btn) {
                        btn.disabled = true;

                        btn.innerHTML = `
                <span class="spinner-border spinner-border-sm me-2"></span>
                Menghapus...
            `;
                    }

                });
            }
        });
    </script>
    @stack('scripts')
</body>

</html>