<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>LinearEdu - Landing Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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

        .bg-hero {
            background-color: var(--hero-bg);
        }

        .bg-section-light {
            background-color: var(--section-light);
        }

        .bg-section-dark {
            background-color: var(--section-dark);
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
                        <a class="nav-link" href="{{ route('tentang') }}">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('guru.login') }}">Halaman Guru</a>
                    </li>
                </ul>

                <div class="d-flex gap-2">
                    <a href="{{ route('registrasi-siswa') }}" class="btn btn-outline-primary">Daftar</a>
                    <a href="{{ route('login') }}" class="btn btn-primary">Masuk</a>
                </div>
            </div>
        </div>
    </nav>

    <main>

        {{-- HERO --}}
        <section class="bg-hero pt-5 py-5">
            <div class="container">
                <div class="row align-items-center gy-4">
                    <div class="col-md-6">
                        <div class="hero-illustration-box"></div>
                    </div>
                    <div class="col-md-6">
                        <h1 class="fw-bold mb-3">Selamat Datang di Website LinearEdu!</h1>
                        <p class="mb-4">
                            Media pembelajaran interaktif yang membantu siswa memahami materi
                            Persamaan Garis Lurus dengan cara yang lebih mudah dan menyenangkan.
                            Siswa dapat belajar secara mandiri melalui tampilan yang sederhana, menarik, dan mudah
                            digunakan, sehingga proses pembelajaran menjadi lebih efektif dan interaktif.
                        </p>
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Mulai Belajar</a>
                    </div>
                </div>
            </div>
        </section>

        {{-- FITUR-FITUR --}}
        <section class="bg-section-light py-5">
            <div class="container">
                <h2 class="text-center fw-bold mb-4">FITUR-FITUR</h2>
                <div class="row g-4">

                    <!-- Materi Interaktif -->
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 text-center p-3">
                            <img src="{{ asset('img/belajar.jpg') }}" class="card-img-top mx-auto"
                                style="width: 140px;" alt="Materi Interaktif">
                            <div class="card-body">
                                <h5 class="card-title fw-bold mb-3">Materi Interaktif</h5>
                                <p class="card-text">
                                    Siswa belajar konsep <b>persamaan garis lurus</b> melalui
                                    animasi, simulasi, dan aktivitas interaktif sehingga lebih
                                    mudah memahami hubungan antara gradient, titik potong, dan grafik.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Kuis & Evaluasi -->
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 text-center p-3">
                            <img src="{{ asset('img/kuis.jpg') }}" class="card-img-top mx-auto" style="width: 140px;"
                                alt="Kuis dan Evaluasi">
                            <div class="card-body">
                                <h5 class="card-title fw-bold mb-3">Kuis &amp; Evaluasi</h5>
                                <p class="card-text">
                                    Tersedia latihan soal di akhir setiap bab untuk menguji
                                    pemahaman siswa, serta evaluasi akhir yang memberikan
                                    gambaran menyeluruh mengenai tingkat penguasaan materi.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Dashboard Guru -->
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 text-center p-3">
                            <img src="{{ asset('img/guru.jpg') }}" class="card-img-top mx-auto" style="width: 140px;"
                                alt="Dashboard Guru">
                            <div class="card-body">
                                <h5 class="card-title fw-bold mb-3">Dashboard Guru</h5>
                                <p class="card-text">
                                    Guru dapat mengelola siswa, memantau aktivitas belajar,
                                    melihat progres latihan, serta merekap nilai secara otomatis
                                    dalam dashboard yang mudah digunakan.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>



        {{-- MATERI --}}
        <section class="bg-section-dark py-5">
            <div class="container">
                <h2 class="text-center fw-bold mb-4">Materi yang akan dipelajari:</h2>
                <div class="row g-4">
                    <!-- Bab A -->
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 p-3">
                            <div class="card-body">
                                <h5 class="card-title fw-bold mb-2">
                                    Bab A: Bentuk Umum Persamaan Garis Lurus
                                </h5>
                                <ul class="mb-0">
                                    <li>Bentuk umum persamaan garis lurus</li>
                                    <li>Menggambar grafik dari persamaan garis lurus</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Bab B -->
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 p-3">
                            <div class="card-body">
                                <h5 class="card-title fw-bold mb-2">
                                    Bab B: Gradien (Kemiringan Garis)
                                </h5>
                                <ul class="mb-0">
                                    <li>Pengertian gradien atau kemiringan</li>
                                    <li>Gradien garis melalui titik pusat (0,0) dan (x₁, y₁)</li>
                                    <li>Gradien garis yang melewati dua titik</li>
                                    <li>Gradien pada persamaan <i>y = mx</i></li>
                                    <li>Gradien pada persamaan garis <i>y = mx + c</i></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Bab C -->
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 p-3">
                            <div class="card-body">
                                <h5 class="card-title fw-bold mb-2">
                                    Bab C: Sifat-sifat Gradien
                                </h5>
                                <ul class="mb-0">
                                    <li>Gradien garis yang sejajar dengan sumbu-x</li>
                                    <li>Gradien garis yang sejajar dengan sumbu-y</li>
                                    <li>Gradien dua garis sejajar</li>
                                    <li>Gradien dua garis saling tegak lurus</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Bab D -->
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 p-3">
                            <div class="card-body">
                                <h5 class="card-title fw-bold mb-2">
                                    Bab D: Persamaan Garis Lurus
                                </h5>
                                <ul class="mb-0">
                                    <li>Persamaan garis melalui satu titik dan gradien</li>
                                    <li>Persamaan garis yang melalui dua titik</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    {{-- FOOTER --}}
    <footer class="text-center text-white py-3" style="background-color: var(--footer-bg);">
        Copyright @ 2026 LinearEdu Pendidikan Komputer
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
