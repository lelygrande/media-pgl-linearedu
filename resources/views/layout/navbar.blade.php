<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'LinearEdu')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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

        /* ===== NAVBAR KECIL ===== */
        .navbar {
            font-weight: 600;
            padding-top: 4px;
            padding-bottom: 4px;
            min-height: 52px;
        }

        .navbar .container {
            min-height: 44px;
        }

        .navbar-brand {
            padding-top: 0;
            padding-bottom: 0;
        }

        .navbar-brand img {
            height: 32px !important;
            width: auto;
        }

        .navbar-nav {
            align-items: center;
            gap: 4px;
        }

        .nav-link {
            font-weight: 700;
            font-size: 14px;
            padding: 6px 12px !important;
            border-radius: 999px;
            color: #1f2a37;
            transition: 0.2s ease;
        }

        .nav-link:hover {
            background-color: #eef8ff;
            color: var(--primary-color);
        }

        /* ACTIVE NAVBAR */
        .nav-link.active {
            background-color: var(--primary-color);
            color: #ffffff !important;
            box-shadow: 0 3px 8px rgba(1, 135, 184, 0.25);
        }

        .navbar-toggler {
            padding: 3px 7px;
            font-size: 14px;
        }

        .navbar .btn-outline-danger {
            padding: 4px 10px;
            font-size: 13px;
            border-radius: 999px;
            font-weight: 700;
        }

        .navbar-brand span:first-child {
            color: #000;
            font-weight: 600;
        }

        .navbar-brand span:last-child {
            color: var(--primary-color);
            font-weight: 600;
        }

        .nav-link {
            font-weight: 600;
        }


        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            font-weight: 600;
        }

        .btn-outline-primary {
            font-weight: 600;
            border-color: var(--primary-color);
            color: var(--primary-dark);
            border-width: 2px;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .card-empty {
            min-height: 150px;
            border-radius: 15px;
        }

        .hero-illustration-box {
            width: 100%;
            aspect-ratio: 4 / 3;
            border-radius: 20px;
            background:
                url("{{ asset('img/landing-pic.png') }}") center/contain no-repeat,
                linear-gradient(135deg, #cfe6ff, #f5fbff);
        }
    </style>

    @stack('styles')
</head>

<body>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('landing-page') }}">
                <img src="{{ asset('img/logo.png') }}" alt="LinearEdu Logo">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-3">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('landing-page') ? 'active' : '' }}"
                            href="{{ route('landing-page') }}">
                            Beranda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('petunjuk') ? 'active' : '' }}"
                            href="{{ route('petunjuk') }}">
                            Petunjuk Penggunaan
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('tentang') ? 'active' : '' }}"
                            href="{{ route('tentang') }}">
                            Tentang
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('guru.login') ? 'active' : '' }}"
                            href="{{ route('guru.login') }}">
                            Halaman Guru
                        </a>
                    </li>

                </ul>

                <div class="d-flex gap-2 mt-2 mt-lg-0">
                    <a href="{{ route('registrasi-siswa') }}"
                        class="btn btn-outline-primary {{ request()->routeIs('registrasi-siswa') ? 'active' : '' }}">
                        Daftar
                    </a>

                    <a href="{{ route('login') }}"
                        class="btn btn-primary {{ request()->routeIs('login') ? 'active' : '' }}">
                        Masuk
                    </a>
                </div>
            </div>
        </div>
    </nav>

    {{-- KONTEN HALAMAN --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="text-center text-white py-3" style="background-color: var(--footer-bg);">
        Copyright @ 2026 LinearEdu Pendidikan Komputer
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>

</html>
