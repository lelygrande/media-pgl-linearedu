<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Progress Belajar')</title>
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

        .navbar {
            padding-top: 20px;
            padding-bottom: 15px;
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

        /* ========================
           PROGRESS BELAJAR CARD
        ========================= */
        .student-progress-wrapper {
            border-radius: 20px;
            overflow: hidden;
            background-color: #ffffff;
            box-shadow: 0 8px 20px rgba(15, 76, 117, 0.12);
        }

        .student-progress-header {
            background-color: #195a80;
            color: #ffffff;
            padding: 24px 32px;
        }

        .student-progress-header .student-name {
            margin-top: 12px;
            font-weight: 700;
            font-size: 1.05rem;
        }

        .student-avatar-box {
            width: 130px;
            height: 150px;
            border-radius: 4px;
            background:
                url("{{ asset('img/student-icon.png') }}") center/75% no-repeat,
                #0f476c;
            margin: 0 auto;
        }

        .study-progress-label {
            font-weight: 700;
            font-size: 1.1rem;
        }

        .study-progress-bar {
            height: 18px;
            border-radius: 999px;
            background-color: #d7dde6;
            overflow: hidden;
        }

        .study-progress-bar .progress-bar {
            background-color: #b8c1cc;
        }

        .student-progress-body {
            padding: 28px 32px 32px;
        }

        .progress-section-title {
            font-weight: 700;
            font-size: 1.05rem;
            margin-bottom: 18px;
        }

        @media (max-width: 576px) {
            .student-progress-header {
                padding: 20px;
            }

            .student-progress-body {
                padding: 22px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>
    @php
        use Illuminate\Support\Facades\Auth;
    @endphp

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
                </ul>
            </div>
        </div>
    </nav>

    {{-- KONTEN HALAMAN --}}
    <main class="py-5">
        <div class="container">
            <div class="student-progress-wrapper">

                {{-- BAGIAN ATAS (BIRU) --}}
                <div class="student-progress-header">
                    <div class="row g-4 align-items-center">
                        <div class="col-md-3 col-lg-2 text-center">
                            <div class="student-avatar-box"></div>
                            <div class="student-name">
                                {{ Auth::guard('siswa')->user()->nama }}
                            </div>
                        </div>

                        <div class="col-md-9 col-lg-10 mt-3 mt-md-0">
                            <div class="study-progress-label mb-3">
                                Progress Belajar
                            </div>
                            <div class="progress study-progress-bar">
                                {{-- contoh 60%, nanti bisa diganti nilai dinamis --}}
                                <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- BAGIAN BAWAH (PUTIH) --}}
                <div class="student-progress-body">
                    <div class="progress-section-title">
                        Progress Materi Bab dan Kuis
                    </div>

                    <div class="row fw-semibold mb-2">
                        <div class="col-md-8 col-7">Materi</div>
                        <div class="col-md-4 col-5">Status</div>
                    </div>

                    <hr class="my-2">

                    <div class="row mb-2">
                        <div class="col-md-8 col-7">Bentuk Umum Persamaan Garis Lurus</div>
                        <div class="col-md-4 col-5 text-muted fw-semibold">Belum</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-8 col-7">Menggambar Grafik dari Persamaan Garis Lurus 1</div>
                        <div class="col-md-4 col-5 text-muted fw-semibold">Belum</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-8 col-7">Menggambar Grafik dari Persamaan Garis Lurus 2</div>
                        <div class="col-md-4 col-5 text-muted fw-semibold">Belum</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-8 col-7">KUIS</div>
                        <div class="col-md-4 col-5 text-muted fw-semibold">Belum</div>
                    </div>

                    <hr>

                    <div class="row mb-2">
                        <div class="col-md-8 col-7">Pengertian Gradien atau Kemiringan</div>
                        <div class="col-md-4 col-5 text-muted fw-semibold">Belum</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-8 col-7">Gradien garis melalui titik pusat dan (x1,y1)</div>
                        <div class="col-md-4 col-5 text-muted fw-semibold">Belum</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-8 col-7">Gradien garis melalui dua titik</div>
                        <div class="col-md-4 col-5 text-muted fw-semibold">Belum</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-8 col-7">Gradien pada persamaan y = mx</div>
                        <div class="col-md-4 col-5 text-muted fw-semibold">Belum</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-8 col-7">Gradien pada persamaan y = mx + c</div>
                        <div class="col-md-4 col-5 text-muted fw-semibold">Belum</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-8 col-7">KUIS</div>
                        <div class="col-md-4 col-5 text-muted fw-semibold">Belum</div>
                    </div>

                    <hr>

                    <div class="row mb-2">
                        <div class="col-md-8 col-7">Gradien garis sejajar sumbu x dan sumbu y</div>
                        <div class="col-md-4 col-5 text-muted fw-semibold">Belum</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-8 col-7"> Gradien garis garis yang saling sejajar</div>
                        <div class="col-md-4 col-5 text-muted fw-semibold">Belum</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-8 col-7">Gradien dua garis saling tegak lurus</div>
                        <div class="col-md-4 col-5 text-muted fw-semibold">Belum</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-8 col-7">KUIS</div>
                        <div class="col-md-4 col-5 text-muted fw-semibold">Belum</div>
                    </div>
                    <hr>
                    <div class="row mb-2">
                        <div class="col-md-8 col-7">Persamaan Garis Melalui Satu Titik dan Gradien</div>
                        <div class="col-md-4 col-5 text-muted fw-semibold">Belum</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-8 col-7">Persamaan Garis yang Melalui Dua Titik</div>
                        <div class="col-md-4 col-5 text-muted fw-semibold">Belum</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-8 col-7">Persamaan Garis yang Melalui Satu Titik dan Sejajar dengan Garis
                            Lain</div>
                        <div class="col-md-4 col-5 text-muted fw-semibold">Belum</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-8 col-7">Persamaan Garis yang Melalui Satu Titik dan Tegak Lurus dengan
                            Garis Lain
                        </div>
                        <div class="col-md-4 col-5 text-muted fw-semibold">Belum</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-8 col-7">KUIS</div>
                        <div class="col-md-4 col-5 text-muted fw-semibold">Belum</div>
                    </div>
                    <hr>
                    <div class="row mb-2">
                        <div class="col-md-8 col-7">Evaluasi</div>
                        <div class="col-md-4 col-5 text-muted fw-semibold">Belum</div>
                    </div>
                </div>
            </div>
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
