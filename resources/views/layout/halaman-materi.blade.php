<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>LinearEdu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- BOOTSTRAP CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- GOOGLE FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- P5.js --}}
    <script src="https://cdn.jsdelivr.net/npm/p5@1.9.0/lib/p5.min.js"></script>

    {{-- KaTeX --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/contrib/auto-render.min.js"
        onload="renderMathInElement(document.body, {delimiters: [{left: '$$', right: '$$', display: true},{left: '$', right: '$', display: false},{left: '\\\\[', right: '\\\\]', display: true},{left: '\\\\(', right: '\\\\)', display: false}]});">
    </script>

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
            font-family: "Quicksand", sans-serif;
            background-color: #e0e9f6;
            overflow: hidden;
            font-weight: 550;
        }

        .navbar {
            font-weight: 600;
            padding-top: 10px;
            padding-bottom: 10px;
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

        .sidebar-wrapper {
            background-color: #d6ebff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
            max-height: calc(100vh - 100px);
            overflow-y: auto;
            padding-right: 8px;
        }

        .sidebar-wrapper .btn-sub {
            width: 100%;
            text-align: left;
            margin-bottom: 8px;
            padding: 12px 60px 12px 18px;
            border-radius: 14px;
            background-color: #1e5c7b;
            border: none;
            font-weight: 700;
            white-space: normal;
            word-wrap: break-word;
            overflow-wrap: break-word;
            line-height: 1.3;
            position: relative;
        }

        .btn-sub.dropdown-toggle::after {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            margin-top: 0;
        }

        .sidebar-wrapper .btn-sub:hover {
            background-color: #2c6f92 !important;
        }

        .dropdown-item-custom {
            width: 90%;
            margin-left: auto;
            margin-right: 0;
            margin-bottom: 8px;
            display: block;
            background: #eef7ff;
            padding: 12px 18px;
            border-radius: 14px;
            text-decoration: none;
            color: #1e5c7b;
            font-weight: 700;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
            white-space: normal;
            overflow-wrap: break-word;
            line-height: 1.3;
        }

        .dropdown-item-custom:hover {
            background: #dfefff;
        }

        .dropdown-item-custom.active {
            background: var(--section-light);
            border: 2px solid var(--primary-color);
        }

        .content-wrapper {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            max-height: calc(100vh - 160px);
            overflow-y: auto;
            padding-bottom: 20px;
        }

        .main-row {
            min-height: calc(100vh - 80px);
        }

        .btn-prev {
            background-color: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            font-weight: 600;
        }

        .btn-prev:hover {
            background-color: var(--primary-color);
            color: #fff;
        }

        .btn-next {
            background-color: var(--primary-color);
            border: 2px solid var(--primary-color);
            color: #fff;
            font-weight: 600;
        }

        .btn-next:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            color: #fff;
        }

        .burger-mini {
            width: 42px;
            height: 42px;
            background-color: var(--primary-color);
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.2s ease-in-out;
        }

        .burger-mini:hover {
            background-color: var(--primary-dark);
        }

        .materi-top-btn {
            width: fit-content;
            margin-bottom: 10px;
            border-radius: 12px;
            font-weight: 700;
        }

        .nav-wrapper {
            margin-top: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            bottom: 0;
            background: #e0e9f6;
            padding: 12px 0;
            z-index: 50;
        }

        .content-wrapper {
            padding-bottom: 80px;
        }

        input[type="text"] {
            font-family: "Times New Roman", "Cambria Math", "STIX Two Text", "Latin Modern Roman", serif;
            font-style: italic;
            font-size: 18px;
        }

        /* BOX */
        /* =========================
            BOX EKSPLORASI (BIRU)
        ========================= */
        .box-eksplorasi {
            background: linear-gradient(135deg, #eef4ff, #f8fbff);
            border: 2px solid #2E75B6;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(46, 117, 182, 0.15);
            position: relative;
            padding: 28px 20px 20px 20px;
        }

        .box-eksplorasi .title-box {
            position: absolute;
            top: -18px;
            left: 20px;
            background: linear-gradient(135deg, #2E75B6, #5a9be0);
            color: white;
            padding: 6px 14px;
            border-radius: 10px;
            font-weight: 700;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* =========================
            BOX CONTOH (UNGU/BIRU TUA)
        ========================= */
        .box-contoh {
            position: relative;
            border: 2px solid #7b61c7;
            border-radius: 16px;
            background: linear-gradient(135deg, #f6f3ff, #fbfaff);
            box-shadow: 0 8px 20px rgba(123, 97, 199, 0.15);

            padding: 28px 20px 20px 20px;
        }

        .box-contoh .title-box {
            position: absolute;
            top: -18px;
            left: 20px;
            background: linear-gradient(135deg, #6f42c1, #9b7be0);
            color: white;
            padding: 6px 14px;
            border-radius: 10px;
            font-weight: 700;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* =========================
        BOX LATIHAN (HIJAU)
        ========================= */
        .box-latihan {
            background: linear-gradient(135deg, #f0fff5, #f8fffb);
            border: 2px solid #22b969;
            border-radius: 26px;
            box-shadow: 0 8px 20px rgba(34, 185, 105, 0.15);
            position: relative;
            padding: 28px 20px 20px 20px;
        }

        .box-latihan .title-box {
            position: absolute;
            top: -18px;
            left: 20px;
            background: linear-gradient(135deg, #22b969, #4cd38a);
            color: white;
            padding: 6px 14px;
            border-radius: 10px;
            font-weight: 700;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* BOX MATERI */

        .card-materi {
            border-radius: 16px;
            border: 1.5px solid #dbe5f1;
            background: linear-gradient(180deg, #ffffff, #f9fbff);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.05);
            transition: 0.2s;
        }

        .card-materi:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(0, 0, 0, 0.08);
        }

        .badge-sub {
            display: inline-block;
            background: linear-gradient(135deg, #eef4ff, #f4f8ff);
            color: #2E75B6;
            font-weight: 700;
            padding: 6px 12px;
            border-radius: 999px;
            margin-bottom: 12px;
            border: 1px solid #dbe5f1;
        }
    </style>

    {{-- CSS Input Matematika --}}
    <style>
        .math-host {
            position: relative;
        }

        .math-preview {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            pointer-events: none;
            white-space: nowrap;
            overflow: hidden;
            color: #212529;
            z-index: 2;
            padding: .375rem .75rem;

            font-family: "Times New Roman", "Cambria Math", "STIX Two Text", "Latin Modern Roman", serif !important;
            font-style: italic;
            font-size: 18px;
            font-weight: 400;
            line-height: 1.5;
            text-align: center;
        }

        .math-preview.is-hidden {
            display: none;
        }


        .math-real-input.previewing {
            color: transparent !important;
            -webkit-text-fill-color: transparent !important;
            caret-color: transparent;
        }

        .math-real-input.previewing:-webkit-autofill {
            -webkit-text-fill-color: transparent !important;
            transition: background-color 9999s ease-in-out 0s;
        }

        /* pecahan */
        .frac {
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0 1px;
            line-height: 1;
            font-family: "Times New Roman", "Cambria Math", "STIX Two Text", "Latin Modern Roman", serif !important;
            font-style: normal;
            font-weight: 200;
        }

        .frac .top {
            border-bottom: 1px solid currentColor;
            padding: 0 3px 1px;
            font-size: 0.78em;
            line-height: 1;
            margin-bottom: -1px;
            font-style: normal;
        }

        .frac .bottom {
            padding: 1px 3px 0;
            font-size: 0.78em;
            line-height: 1;
            margin-top: -1px;
            font-style: normal;
        }
    </style>

</head>

<body>
    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('landing-page') }}">
                <img src="{{ asset('img/logo.png') }}" alt="LinearEdu Logo" style="height: 40px;">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('landing-page') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('petunjuk') }}">Petunjuk Penggunaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('progress-belajar') }}">Progress Belajar</a>
                    </li>

                    @auth('siswa')
                        <li class="nav-item d-flex align-items-center">
                            <form action="{{ route('siswa.logout') }}" method="POST" class="mb-0">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid px-4 py-3">
        <div class="row main-row g-3">
            {{-- SIDEBAR --}}
            <div id="sidebarCol" class="col-md-4 col-lg-3">
                <div class="sidebar-wrapper p-3 h-100">
                    <button id="closeSidebarBtn" type="button" class="burger-mini mb-3">
                        ☰
                    </button>

                    {{-- Lock/Unlock --}}
                    @php
                        $unlockedSlugs = $unlockedSlugs ?? [];
                        $passedQuizIds = $passedQuizIds ?? [];

                        $canAccessQuizA = $canAccessQuizA ?? false;
                        $canAccessQuizB = $canAccessQuizB ?? false;
                        $canAccessQuizC = $canAccessQuizC ?? false;
                        $canAccessQuizD = $canAccessQuizD ?? false;

                        $isUnlocked = function ($slug) use ($unlockedSlugs) {
                            return in_array($slug, $unlockedSlugs);
                        };

                        $isQuizPassed = function ($quizId) use ($passedQuizIds) {
                            return in_array($quizId, $passedQuizIds);
                        };
                    @endphp

                    @php
                        $currentSlug = request()->route('slug');

                        $openIntro = request()->routeIs('peta-konsep', 'apersepsi1');

                        $openA =
                            ($currentSlug && in_array($currentSlug, ['subbab-a1', 'subbab-a2-1', 'subbab-a2-2'])) ||
                            request()->is('quiz/1');

                        $openB =
                            ($currentSlug &&
                                in_array($currentSlug, [
                                    'subbab-b-gradien',
                                    'subbab-b-gradien-satu-titik',
                                    'subbab-b-gradien-dua-titik',
                                    'subbab-b-gradien-persamaan1',
                                ])) ||
                            request()->is('quiz/2');

                        $openC =
                            ($currentSlug &&
                                in_array($currentSlug, [
                                    'subbab-c-garis-sejajar-sumbuxy',
                                    'subbab-c-dua-garis-sejajar',
                                    'subbab-c-dua-garis-tegak-lurus',
                                ])) ||
                            request()->is('quiz/3');

                        $openD =
                            ($currentSlug &&
                                in_array($currentSlug, [
                                    'subbab-d-pgl1',
                                    'subbab-d-pgl2',
                                    'subbab-d-pgl-sejajar',
                                    'subbab-d-pgl-tegak-lurus',
                                ])) ||
                            request()->is('quiz/4');
                    @endphp

                    <div class="dropdown">
                        <button class="btn btn-primary btn-sub dropdown-toggle {{ $openIntro ? '' : 'collapsed' }}"
                            data-bs-toggle="collapse" data-bs-target="#subIntro"
                            aria-expanded="{{ $openIntro ? 'true' : 'false' }}">
                            Pengantar
                        </button>

                        <div id="subIntro" class="collapse mt-2 {{ $openIntro ? 'show' : '' }}">
                            <a href="{{ route('peta-konsep') }}"
                                class="dropdown-item-custom {{ request()->routeIs('peta-konsep') ? 'active' : '' }}">
                                Peta Konsep
                            </a>

                            <a href="{{ route('apersepsi1') }}"
                                class="dropdown-item-custom {{ request()->routeIs('apersepsi1') ? 'active' : '' }}">
                                Apersepsi
                            </a>
                        </div>
                    </div>

                    <div class="dropdown">
                        <button class="btn btn-primary btn-sub dropdown-toggle {{ $openA ? '' : 'collapsed' }}"
                            data-bs-toggle="collapse" data-bs-target="#subA"
                            aria-expanded="{{ $openA ? 'true' : 'false' }}">
                            Bentuk Umum Persamaan Garis Lurus
                        </button>

                        <div id="subA" class="collapse mt-2 {{ $openA ? 'show' : '' }}">
                            <a href="{{ route('materi.show', 'subbab-a1') }}"
                                class="dropdown-item-custom {{ $currentSlug === 'subbab-a1' ? 'active' : '' }}">
                                Pengertian dan Bentuk Umum
                            </a>

                            @if ($isUnlocked('subbab-a2-1'))
                                <a href="{{ route('materi.show', 'subbab-a2-1') }}"
                                    class="dropdown-item-custom {{ $currentSlug === 'subbab-a2-1' ? 'active' : '' }}">
                                    Menggambar Grafik Persamaan Garis Lurus 1
                                </a>
                            @else
                                <div class="dropdown-item-custom d-flex justify-content-between align-items-center text-muted"
                                    style="opacity:.7; cursor:not-allowed;">
                                    <span>Menggambar Grafik Persamaan Garis Lurus 1</span>
                                    <span>🔒</span>
                                </div>
                            @endif

                            @if ($isUnlocked('subbab-a2-2'))
                                <a href="{{ route('materi.show', 'subbab-a2-2') }}"
                                    class="dropdown-item-custom {{ $currentSlug === 'subbab-a2-2' ? 'active' : '' }}">
                                    Menggambar Grafik Persamaan Garis Lurus 2
                                </a>
                            @else
                                <div class="dropdown-item-custom d-flex justify-content-between align-items-center text-muted"
                                    style="opacity:.7; cursor:not-allowed;">
                                    <span>Menggambar Grafik Persamaan Garis Lurus 2</span>
                                    <span>🔒</span>
                                </div>
                            @endif

                            @if ($canAccessQuizA)
                                <a href="{{ route('quiz.show', 1) }}"
                                    class="dropdown-item-custom {{ request()->is('quiz/1') ? 'active' : '' }}">
                                    Kuis A
                                </a>
                            @else
                                <div class="dropdown-item-custom d-flex justify-content-between align-items-center text-muted"
                                    style="opacity:.7; cursor:not-allowed;">
                                    <span>Kuis A</span>
                                    <span>🔒</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="dropdown">
                        <button class="btn btn-primary btn-sub dropdown-toggle {{ $openB ? '' : 'collapsed' }}"
                            data-bs-toggle="collapse" data-bs-target="#subB"
                            aria-expanded="{{ $openB ? 'true' : 'false' }}">
                            Gradien (Kemiringan Garis)
                        </button>

                        <div id="subB" class="collapse mt-2 {{ $openB ? 'show' : '' }}">
                            <a href="{{ route('materi.show', 'subbab-b-gradien') }}"
                                class="dropdown-item-custom {{ $currentSlug === 'subbab-b-gradien' ? 'active' : '' }}">
                                Pengertian Gradien
                            </a>

                            <a href="{{ route('materi.show', 'subbab-b-gradien-satu-titik') }}"
                                class="dropdown-item-custom {{ $currentSlug === 'subbab-b-gradien-satu-titik' ? 'active' : '' }}">
                                Gradien garis melalui (0,0) dan (x1,y1)
                            </a>

                            <a href="{{ route('materi.show', 'subbab-b-gradien-dua-titik') }}"
                                class="dropdown-item-custom {{ $currentSlug === 'subbab-b-gradien-dua-titik' ? 'active' : '' }}">
                                Gradien garis yang melewati dua titik
                            </a>

                            <a href="{{ route('materi.show', 'subbab-b-gradien-persamaan1') }}"
                                class="dropdown-item-custom {{ $currentSlug === 'subbab-b-gradien-persamaan1' ? 'active' : '' }}">
                                Gradien garis dari suatu Persamaan Garis Lurus
                            </a>

                            <a href="{{ route('quiz.show', 2) }}"
                                class="dropdown-item-custom {{ request()->is('quiz/2') ? 'active' : '' }}">
                                Kuis B
                            </a>
                        </div>
                    </div>

                    <div class="dropdown">
                        <button class="btn btn-primary btn-sub dropdown-toggle {{ $openC ? '' : 'collapsed' }}"
                            data-bs-toggle="collapse" data-bs-target="#subC"
                            aria-expanded="{{ $openC ? 'true' : 'false' }}">
                            Hubungan Gradien Garis
                        </button>

                        <div id="subC" class="collapse mt-2 {{ $openC ? 'show' : '' }}">
                            <a href="{{ route('materi.show', 'subbab-c-garis-sejajar-sumbuxy') }}"
                                class="dropdown-item-custom {{ $currentSlug === 'subbab-c-garis-sejajar-sumbuxy' ? 'active' : '' }}">
                                Gradien garis sejajar sumbu x dan sumbu y
                            </a>

                            <a href="{{ route('materi.show', 'subbab-c-dua-garis-sejajar') }}"
                                class="dropdown-item-custom {{ $currentSlug === 'subbab-c-dua-garis-sejajar' ? 'active' : '' }}">
                                Gradien Garis-garis yang saling Sejajar
                            </a>

                            <a href="{{ route('materi.show', 'subbab-c-dua-garis-tegak-lurus') }}"
                                class="dropdown-item-custom {{ $currentSlug === 'subbab-c-dua-garis-tegak-lurus' ? 'active' : '' }}">
                                Gradien Garis-garis yang saling Tegak Lurus
                            </a>

                            <a href="{{ route('quiz.show', 3) }}"
                                class="dropdown-item-custom {{ request()->is('quiz/3') ? 'active' : '' }}">
                                Kuis C
                            </a>
                        </div>
                    </div>

                    <div class="dropdown">
                        <button class="btn btn-primary btn-sub dropdown-toggle {{ $openD ? '' : 'collapsed' }}"
                            data-bs-toggle="collapse" data-bs-target="#subD"
                            aria-expanded="{{ $openD ? 'true' : 'false' }}">
                            Menentukan Persamaan Garis Lurus
                        </button>

                        <div id="subD" class="collapse mt-2 {{ $openD ? 'show' : '' }}">
                            <a href="{{ route('materi.show', 'subbab-d-pgl1') }}"
                                class="dropdown-item-custom {{ $currentSlug === 'subbab-d-pgl1' ? 'active' : '' }}">
                                Persamaan Garis Melalui Satu Titik dan Gradien
                            </a>

                            <a href="{{ route('materi.show', 'subbab-d-pgl2') }}"
                                class="dropdown-item-custom {{ $currentSlug === 'subbab-d-pgl2' ? 'active' : '' }}">
                                Persamaan Garis yang Melalui Dua Titik
                            </a>

                            <a href="{{ route('materi.show', 'subbab-d-pgl-sejajar') }}"
                                class="dropdown-item-custom {{ $currentSlug === 'subbab-d-pgl-sejajar' ? 'active' : '' }}">
                                Persamaan Garis yang Melalui Satu Titik dan Sejajar dengan Garis Lain
                            </a>

                            <a href="{{ route('materi.show', 'subbab-d-pgl-tegak-lurus') }}"
                                class="dropdown-item-custom {{ $currentSlug === 'subbab-d-pgl-tegak-lurus' ? 'active' : '' }}">
                                Persamaan Garis yang Melalui Satu Titik dan Tegak Lurus dengan Garis Lain
                            </a>

                            <a href="{{ route('quiz.show', 4) }}"
                                class="dropdown-item-custom {{ request()->is('quiz/4') ? 'active' : '' }}">
                                Kuis D
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('quiz.show', 5) }}"
                        class="btn btn-primary btn-sub w-100 {{ request()->is('quiz/5') ? 'active' : '' }}">
                        Evaluasi
                    </a>
                </div>
            </div>

            {{-- KONTEN --}}
            <div id="contentCol" class="col-md-8 col-lg-9 d-flex flex-column">
                <button id="openSidebarBtn" type="button" class="btn btn-primary d-none materi-top-btn"
                    style="background-color: var(--primary-color)">
                    ☰ Materi
                </button>

                <div class="content-wrapper p-4 flex-grow-1">
                    @yield('content')
                </div>

                <div class="nav-wrapper">
                    @yield('nav')
                </div>
            </div>
        </div>
    </div>

    {{-- BOOTSTRAP JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- TOGGLE SIDEBAR --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarCol = document.getElementById("sidebarCol");
            const contentCol = document.getElementById("contentCol");

            const openBtn = document.getElementById("openSidebarBtn");
            const closeBtn = document.getElementById("closeSidebarBtn");

            function showSidebar() {
                sidebarCol.classList.remove("d-none");
                contentCol.classList.remove("col-12");
                contentCol.classList.add("col-md-8", "col-lg-9");
                openBtn.classList.add("d-none");
            }

            function hideSidebar() {
                sidebarCol.classList.add("d-none");
                contentCol.classList.remove("col-md-8", "col-lg-9");
                contentCol.classList.add("col-12");
                openBtn.classList.remove("d-none");
            }

            if (closeBtn) closeBtn.addEventListener("click", hideSidebar);
            if (openBtn) openBtn.addEventListener("click", showSidebar);

            if (window.innerWidth < 768) {
                hideSidebar();
            }
        });
    </script>

    {{-- KaTeX --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            renderMathInElement(document.body, {
                delimiters: [{
                        left: "$$",
                        right: "$$",
                        display: true
                    },
                    {
                        left: "\\[",
                        right: "\\]",
                        display: true
                    },
                    {
                        left: "$",
                        right: "$",
                        display: false
                    },
                    {
                        left: "\\(",
                        right: "\\)",
                        display: false
                    }
                ]
            });
        });
    </script>

    {{-- Input Matematika --}}
    <script>
        function escapeHtml(text) {
            return text
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;');
        }

        function renderMathPreview(text) {
            const safe = escapeHtml(text);

            return safe.replace(/(-?\d+)\s*\/\s*(-?\d+)/g, function(_, a, b) {
                return `
                <span class="frac">
                    <span class="top">${a}</span>
                    <span class="bar"></span>
                    <span class="bottom">${b}</span>
                </span>
            `;
            });
        }

        function enhanceMathInput(input) {
            if (!input || input.dataset.mathEnhanced === 'true') return;

            const parent = input.parentElement;
            if (!parent) return;

            // parent jadi anchor overlay, tanpa ubah inline/block input
            if (getComputedStyle(parent).position === 'static') {
                parent.classList.add('math-host');
            }

            const preview = document.createElement('span');
            preview.className = 'math-preview is-hidden';

            parent.appendChild(preview);

            input.classList.add('math-real-input');
            input.dataset.mathEnhanced = 'true';

            function update() {
                const value = input.value || '';
                preview.innerHTML = renderMathPreview(value);

                const hasFraction = /-?\d+\s*\/\s*-?\d+/.test(value);
                const isFocused = document.activeElement === input;
                const isEmpty = value.trim() === '';

                if (!isEmpty && hasFraction && !isFocused) {
                    preview.classList.remove('is-hidden');
                    input.classList.add('previewing');
                } else {
                    preview.classList.add('is-hidden');
                    input.classList.remove('previewing');
                }

                syncPreviewBox();
            }

            function syncPreviewBox() {
                const style = getComputedStyle(input);
                const rect = input.getBoundingClientRect();

                preview.style.left = input.offsetLeft + 'px';
                preview.style.top = input.offsetTop + 'px';
                preview.style.width = rect.width + 'px';
                preview.style.height = rect.height + 'px';
                preview.style.fontSize = style.fontSize;
                preview.style.fontFamily = style.fontFamily;
                preview.style.borderRadius = style.borderRadius;

                preview.style.textAlign = 'center';
                preview.style.justifyContent = 'center';
            }

            input.addEventListener('input', update);
            input.addEventListener('change', update);
            input.addEventListener('focus', update);
            input.addEventListener('blur', update);
            window.addEventListener('resize', syncPreviewBox);

            // untuk menangkap autofill setelah halaman selesai load
            setTimeout(update, 100);
            setTimeout(update, 500);
            setTimeout(update, 1000);

            update();
            syncPreviewBox();
        }

        function initAllMathInputs() {
            document.querySelectorAll('input[type="text"]').forEach(enhanceMathInput);
        }

        document.addEventListener('DOMContentLoaded', initAllMathInputs);
    </script>
</body>

</html>
