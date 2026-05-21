<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'LinearEdu Guru')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">


    <style>
        :root {
            --hero-bg: #e8f4ff;
            --section-light: #cfe6ff;
            --section-dark: #a9cff7;
            --footer-bg: #004365;
            --primary-color: #0187b8;
            --primary-dark: #00658b;
        }

        body {
            background-color: #f5f9ff;
            font-family: "Quicksand", sans-serif;
        }

        .navbar {
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .nav-link {
            font-weight: 600;
        }

        /* Sidebar Guru with Materi Style */
        .sidebar-wrapper {
            background-color: #d6ebff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
            max-height: calc(100vh - 100px);
            overflow-y: auto;
            padding-right: 8px;
        }

        .btn-sub {
            width: 100%;
            text-align: left;
            margin-bottom: 10px;
            padding: 10px 60px 10px 18px;
            border-radius: 5px;
            background-color: #1e5c7b;
            border: none;
            font-weight: 700;
            white-space: normal;
            line-height: 1.3;
            position: relative;
            color: #fff;
        }

        .btn-sub.dropdown-toggle::after {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
        }

        .btn-sub:hover {
            background-color: #2c6f92 !important;
        }

        .dropdown-item-custom {
            width: 90%;
            margin-left: auto;
            display: block;
            margin-bottom: 12px;
            background: #eef7ff;
            padding: 10px 18px;
            border-radius: 5px;
            text-decoration: none;
            color: #1e5c7b;
            font-weight: 700;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
            line-height: 1.3;
        }

        .dropdown-item-custom:hover {
            background: #dfefff;
        }

        a {
            text-decoration: none
        }

        .sidebar-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: radial-gradient(circle at 30% 30%, #6fd0ff, #0060b8);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 14px;
        }

        .main-card {
            border-radius: 10px;
            background-color: white;
            height: calc(100vh - 120px);
            overflow-y: auto;
            padding-bottom: 20px;
        }

        aside {
            width: 270px;
            flex-shrink: 0;
        }

        /* =========================
           SIDEBAR TOGGLE (GESER KIRI)
           ========================= */
        .layout-guru {
            transition: all .25s ease;
        }

        #sidebarGuru {
            transition: transform .25s ease, width .25s ease, margin .25s ease;
        }

        /* kondisi collapsed: sidebar geser ke kiri */
        .layout-guru.sidebar-collapsed #sidebarGuru {
            transform: translateX(-110%);
            width: 0 !important;
            margin: 0 !important;
            padding: 0 !important;
            overflow: hidden;
        }

        /* konten melebar */
        .layout-guru.sidebar-collapsed section {
            width: 100%;
        }

        /* tombol burger di area konten */
        .btn-burger {
            border: 2px solid rgba(0, 0, 0, 0.08);
            background: #ffffff;
            border-radius: 12px;
            font-weight: 800;
            color: #1e5c7b;
            padding: 8px 12px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-burger:hover {
            background: #eef7ff;
        }

        /* ===== Toggle button di sidebar ===== */
        .btn-toggle-sidebar {
            width: 100%;
            border: 2px solid rgba(0, 0, 0, 0.08);
            background: #ffffff;
            border-radius: 12px;
            font-weight: 800;
            color: #1e5c7b;
            padding: 10px 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
        }

        .btn-toggle-sidebar:hover {
            background: #eef7ff;
        }

        /* ===== Sidebar mini (bukan hilang total) ===== */
        #sidebarGuru {
            width: 270px;
            transition: width .25s ease;
        }

        /* saat collapsed -> sidebar jadi kecil tapi tetap muncul */
        .layout-guru.sidebar-collapsed #sidebarGuru {
            width: 72px !important;
            transform: none !important;
            margin: 0 !important;
            padding: 0 !important;
            overflow: hidden;
        }

        /* sembunyikan teks/menu saat mini */
        .layout-guru.sidebar-collapsed .sidebar-wrapper {
            padding: 12px !important;
        }

        .layout-guru.sidebar-collapsed .sidebar-wrapper .toggle-text {
            display: none;
        }

        /* avatar + nama disembunyikan saat mini */
        .layout-guru.sidebar-collapsed .sidebar-avatar,
        .layout-guru.sidebar-collapsed .sidebar-wrapper p {
            display: none;
        }

        /* menu menu disembunyikan saat mini */
        .layout-guru.sidebar-collapsed .btn-sub,
        .layout-guru.sidebar-collapsed .dropdown-item-custom,
        .layout-guru.sidebar-collapsed #menuSiswa {
            display: none !important;
        }

        /* default: konten dibatasi biar enak dibaca */
        .main-card {
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
        }

        /* saat sidebar mini: konten melebar full */
        .layout-guru.sidebar-collapsed .main-card {
            max-width: 100%;
            margin: 0;
            /* biar nempel kiri */
        }

        .btn-sub.active {
            background-color: var(--primary-color) !important;
            color: #fff !important;
        }

        .dropdown-item-custom.active-child {
            background: #cfe6ff;
            color: #0b4f6c;
        }

        /* =========================
        OVERLAY
        ========================= */

        .sidebar-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .4);
            z-index: 1040;

            opacity: 0;
            visibility: hidden;
            transition: .3s;
        }

        .sidebar-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        /* =========================
            MOBILE
        ========================= */

        @media (max-width: 768px) {

            body {
                overflow-x: hidden;
            }

            main.py-2 {
                padding: 0 !important;
            }

            #layoutGuru {
                padding: 10px !important;
                gap: 0 !important;
            }

            /* ===== NAVBAR ===== */

            .navbar .container {
                padding-left: 10px;
                padding-right: 10px;
            }

            .navbar img {
                height: 34px !important;
            }

            /* ===== SIDEBAR ===== */

            aside {
                width: 0 !important;
            }

            #sidebarGuru {
                position: fixed;
                top: 0;
                left: -280px;

                width: 260px !important;
                height: 100vh;

                z-index: 1050;
                transition: .3s ease;

                padding: 10px;
            }

            #sidebarGuru.show {
                left: 0;
            }

            .sidebar-wrapper {
                border-radius: 0 !important;
                height: 100%;
                max-height: 100vh;
                overflow-y: auto;
            }

            /* ===== OVERLAY ===== */

            .sidebar-overlay {
                position: fixed;
                inset: 0;

                background: rgba(0, 0, 0, .4);

                z-index: 1040;

                opacity: 0;
                visibility: hidden;

                transition: .3s;
            }

            .sidebar-overlay.show {
                opacity: 1;
                visibility: visible;
            }

            /* ===== MAIN CONTENT ===== */

            section.flex-grow-1 {
                width: 100%;
            }

            .main-card {
                width: 100%;
                max-width: 100%;

                min-height: calc(100vh - 100px);

                border-radius: 14px;
                padding: 18px !important;
            }

            /* ===== TEXT ===== */

            h1,
            h2 {
                font-size: 24px !important;
            }

            h3,
            h4 {
                font-size: 20px !important;
            }

            p,
            li,
            a,
            button {
                font-size: 14px;
            }

            /* ===== CARD ===== */

            .card,
            .dashboard-card {
                border-radius: 14px;
            }

            /* ===== BUTTON ===== */

            .btn-sub {
                padding: 12px 45px 12px 14px;
                font-size: 14px;
            }

            .dropdown-item-custom {
                width: 95%;
                padding: 10px 14px;
                font-size: 13px;
            }

            /* ===== PROFILE ===== */

            .sidebar-avatar {
                width: 80px;
                height: 80px;
            }

            .sidebar-avatar i {
                font-size: 40px !important;
            }

        }

        /* =========================
        DESKTOP
        ========================= */

        @media (min-width: 769px) {

            #sidebarGuru {
                position: relative;
                left: 0 !important;
            }

            .sidebar-overlay {
                display: none;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
        <div class="container d-flex align-items-center">

            <button id="toggleSidebarGuru" class="btn btn-outline-primary d-md-none me-2" type="button"
                style="
                    border-radius: 10px;
                    font-weight: 700;
                    padding: 8px 14px;
                ">

                <i class="bi bi-list me-1"></i>
                Menu
            </button>

            {{-- LOGO --}}
            <a class="navbar-brand d-flex align-items-center me-auto" href="{{ route('landing-page') }}">

                <img src="{{ asset('img/logo.png') }}" alt="LinearEdu Logo" style="height: 40px;">
            </a>

            {{-- BURGER NAVBAR --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">

                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- MENU NAVBAR --}}
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-3">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('landing-page') }}">
                            Beranda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('petunjuk') }}">
                            Petunjuk Penggunaan
                        </a>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('guru.logout') }}" method="POST" class="d-inline">

                            @csrf

                            <button type="submit" class="nav-link border-0 bg-transparent">
                                Logout
                            </button>

                        </form>
                    </li>

                </ul>
            </div>

        </div>
    </nav>
    @php
        $isSiswaMenu = request()->routeIs('daftarsiswa', 'rekapitulasi-nilai', 'progres-siswa');
    @endphp

    {{-- LAYOUT GURU: SIDEBAR + MAIN CONTENT --}}
    <main class="py-2">
        <div id="layoutGuru" class="d-flex layout-guru" style="gap: 10px; padding: 0 20px;">

            {{-- SIDEBAR --}}
            <aside id="sidebarGuru" style="width: 270px;">
                <div class="sidebar-wrapper p-3 h-100">

                    {{-- Avatar Guru --}}
                    <div class="sidebar-avatar">
                        <i class="bi bi-person-fill" style="font-size: 60px; color: #ffffff;"></i>
                    </div>

                    <p class="fw-bold text-center mb-4">{{ auth('guru')->user()->nama }}</p>

                    <a href="{{ route('dashboardguru') }}" class="btn-sub d-block mb-2">
                        Dashboard
                    </a>

                    <button class="btn-sub dropdown-toggle {{ $isSiswaMenu ? 'active' : '' }}" data-bs-toggle="collapse"
                        data-bs-target="#menuSiswa" aria-expanded="{{ $isSiswaMenu ? 'true' : 'false' }}">
                        Manajemen Siswa
                    </button>

                    <div id="menuSiswa" class="collapse mt-2 {{ $isSiswaMenu ? 'show' : '' }}">
                        <a href="{{ route('daftarsiswa.index') }}"
                            class="dropdown-item-custom {{ request()->routeIs('daftarsiswa.index') ? 'active-child' : '' }}">
                            Daftar Siswa
                        </a>

                        <a href="{{ route('rekapitulasi-nilai') }}"
                            class="dropdown-item-custom {{ request()->routeIs('rekapitulasi-nilai') ? 'active-child' : '' }}">
                            Rekapitulasi Nilai
                        </a>

                        <a href="{{ route('guru.progress-siswa') }}"
                            class="dropdown-item-custom {{ request()->routeIs('progres-siswa') ? 'active-child' : '' }}">
                            Progress Siswa
                        </a>
                    </div>
                    <a href="{{ route('kuis.index') }}"
                        class="btn-sub d-block {{ request()->routeIs('kuis.*') ? 'active' : '' }}">
                        Manajemen Kuis
                    </a>
                </div>
            </aside>

            {{-- MAIN CONTENT --}}
            <section class="flex-grow-1">
                <div class="card shadow-sm main-card">
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>
            </section>

        </div>
    </main>

    <!-- OVERLAY -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    {{-- FOOTER --}}
    <footer class="text-center text-white py-3" style="background-color: var(--footer-bg);">
        Copyright @ 2026 LinearEdu Pendidikan Komputer
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    {{-- Sidebar Overlay - responsive --}}
    <script>
        const sidebar = document.getElementById('sidebarGuru');
        const overlay = document.getElementById('sidebarOverlay');
        const toggleBtn = document.getElementById('toggleSidebarGuru');

        toggleBtn.addEventListener('click', function() {

            if (window.innerWidth <= 768) {

                sidebar.classList.toggle('show');
                overlay.classList.toggle('show');

            } else {

                document
                    .getElementById('layoutGuru')
                    .classList.toggle('sidebar-collapsed');

            }

        });

        overlay.addEventListener('click', function() {

            sidebar.classList.remove('show');
            overlay.classList.remove('show');

        });
    </script>

    @stack('scripts')
</body>

</html>
