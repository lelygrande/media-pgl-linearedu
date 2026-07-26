@extends('layout.halaman-materi')

@section('content')
    <style>
        .box-pengantar {
            background: var(--hero-bg);
            border-radius: 12px;
            padding: 14px 16px;
            border: 1px solid rgba(0, 0, 0, .05);
            line-height: 1.7;
        }

        /* Aktivitas menempatkan titik pada koordinat */
        .info-aktivitas {
            background: #f8fbff;
            border: 1px solid rgba(74, 118, 184, .25);
            border-radius: 10px;
            padding: 10px 12px;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        #canvas-letak-titik canvas {
            max-width: 100% !important;
            height: auto !important;
            display: block;
            margin: 0 auto;
        }

        /* Petunjuk Detail */

        .petunjuk-detail {
            background: #f8fbff;
            border: 1px solid rgba(74, 118, 184, .25);
            border-left: 5px solid #4a76b8;
            border-radius: 12px;
            padding: 14px 16px;
            line-height: 1.75;
        }

        .petunjuk-detail p {
            margin-bottom: 8px;
        }

        .petunjuk-detail ol,
        .petunjuk-detail ul {
            padding-left: 22px;
            margin-bottom: 0;
        }

        .petunjuk-detail li {
            margin-bottom: 6px;
        }

        .petunjuk-subtitle {
            font-weight: 700;
            color: #315f9e;
            margin-top: 10px;
            margin-bottom: 4px;
        }

        .petunjuk-catatan {
            background: #ffffff;
            border: 1px dashed rgba(74, 118, 184, .45);
            border-radius: 10px;
            padding: 10px 12px;
            margin-top: 12px;
        }

        /* Petunjuk Scroll */
        .petunjuk-scroll {
            max-height: 430px;
            overflow-y: auto;
            padding-right: 12px;
        }

        /* Scrollbar agar lebih rapi */
        .petunjuk-scroll::-webkit-scrollbar {
            width: 8px;
        }

        .petunjuk-scroll::-webkit-scrollbar-track {
            background: #eef5ff;
            border-radius: 10px;
        }

        .petunjuk-scroll::-webkit-scrollbar-thumb {
            background: #4a76b8;
            border-radius: 10px;
        }

        .petunjuk-scroll::-webkit-scrollbar-thumb:hover {
            background: #315f9e;
        }

        /* Di HP jangan terlalu tinggi */
        @media (max-width: 768px) {
            .petunjuk-scroll {
                max-height: 360px;
            }
        }

        /* Eksplorasi Titik */
        .eksplorasi-layout {
            display: grid;
            grid-template-columns: 1.15fr 0.95fr;
            gap: 20px;
            align-items: start;
            margin-top: 16px;
        }

        .eksplorasi-media {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .eksplorasi-media .canvas-responsive {
            margin-top: 0 !important;
        }

        @media (max-width: 992px) {
            .eksplorasi-layout {
                grid-template-columns: 1fr;
            }
        }

        .garis-check-section {
            margin-top: 28px;
        }

        .garis-check-title {
            font-size: 1.35rem;
            font-weight: 700;
            color: #22324a;
            margin-bottom: 12px;
        }

        .garis-check-box {
            background: #ffffff;
            border: 1px solid rgba(74, 118, 184, .22);
            border-radius: 16px;
            padding: 18px 20px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, .04);
        }

        .petunjuk-garis-box {
            background: #f8fbff;
            border: 1px solid rgba(74, 118, 184, .25);
            border-left: 5px solid #4a76b8;
            border-radius: 12px;
            padding: 12px 14px;
            line-height: 1.7;
            margin-bottom: 18px;
        }

        .soal-garis-item {
            border-bottom: 1px dashed rgba(74, 118, 184, .25);
            padding: 14px 0;
        }

        .soal-garis-item:last-child {
            border-bottom: none;
        }

        .soal-garis-title {
            font-weight: 700;
            margin-bottom: 10px;
            color: #22324a;
        }

        .opsi-garis-row {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .opsi-garis-row label {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #f8fbff;
            border: 1px solid #d7e6f8;
            border-radius: 12px;
            padding: 10px 14px;
            cursor: pointer;
            min-width: 230px;
            margin: 0;
        }

        .opsi-garis-row label:hover {
            background: #eef5ff;
        }

        .feedback-garis {
            margin-top: 16px;
            padding: 14px 16px;
            border-radius: 12px;
            line-height: 1.7;
            display: none;
        }

        .feedback-garis.salah {
            display: block;
            background: #fff3cd;
            border: 1px solid #ffe69c;
            color: #664d03;
        }

        .feedback-garis.benar {
            display: block;
            background: #d1e7dd;
            border: 1px solid #badbcc;
            color: #0f5132;
        }

        .penyelesaian-garis-box {
            display: none;
            margin-top: 18px;
            background: #ffffff;
            border: 1px solid rgba(74, 118, 184, .22);
            border-radius: 14px;
            padding: 14px;
        }

        .penyelesaian-garis-box img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            border-radius: 10px;
        }

        @media (max-width: 768px) {
            .garis-check-title {
                font-size: 1.15rem;
            }

            .garis-check-box {
                padding: 16px;
            }

            .opsi-garis-row label {
                width: 100%;
                min-width: 0;
            }
        }

        .status-garis {
            margin-top: 10px;
            font-weight: 600;
        }

        .status-garis.benar {
            color: #198754;
        }

        .status-garis.salah {
            color: #dc3545;
        }

        .status-garis.belum {
            color: #b58100;
        }

        /* Penyelesaian */
        .penyelesaian-garis-box {
            display: none;
            margin-top: 18px;
            background: #ffffff;
            border: 1px solid rgba(74, 118, 184, .22);
            border-radius: 14px;
            padding: 16px;
        }

        .penyelesaian-garis-grid {
            display: grid;
            grid-template-columns: repeat(2, 300px);
            gap: 16px;
            justify-content: center;
        }

        .penyelesaian-garis-item {
            width: 300px;
            margin: 0;
            background: #f8fbff;
            border: 1px solid rgba(74, 118, 184, .22);
            border-radius: 14px;
            padding: 10px;
        }

        .penyelesaian-garis-item img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 10px;
        }

        .penyelesaian-garis-item figcaption {
            margin-top: 8px;
            text-align: center;
            font-size: 0.85rem;
            line-height: 1.5;
            font-weight: 600;
            color: #22324a;
        }

        @media (max-width: 768px) {
            .penyelesaian-garis-grid {
                grid-template-columns: 1fr;
                justify-items: center;
            }

            .penyelesaian-garis-item {
                width: 100%;
                max-width: 300px;
            }
        }

        /* Button Biru */
        .btn-palet {
            background-color: var(--primary-color);
            color: white;
            border: none;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 10px;
            transition: 0.2s ease-in-out;
        }

        .btn-palet:hover {
            background-color: var(--primary-dark);
            color: white;
        }


        /* ===== Responsive Apersepsi ===== */
        .apersepsi-container {
            max-width: 100%;
        }

        .apersepsi-card {
            border-radius: 14px;
        }

        .apersepsi-section {
            border: 2px solid #4a76b8;
            border-radius: 10px;
            background-color: white;
            padding: 24px;
        }

        .section-label {
            top: -18px;
            left: 20px;
            background-color: #4a76b8;
            border-radius: 8px;
            max-width: calc(100% - 40px);
            white-space: normal;
            line-height: 1.3;
        }

        /* ===== Gambar Apersepsi ===== */
        .materi-img {
            width: auto;
            max-width: 100%;
            height: auto;
            display: block;
            margin-left: auto;
            margin-right: auto;
            border-radius: 10px;
            cursor: zoom-in;
        }

        .gambar-wrapper {
            width: 100%;
            max-width: 680px;
            max-height: 340px;
            overflow: hidden;
            margin-left: auto;
            margin-right: auto;
            border-radius: 12px;
        }

        .gambar-wrapper img {
            width: 100%;
            max-height: 340px;
            object-fit: contain;
        }

        .img-koordinat {
            max-width: 680px;
        }

        .img-titik-asal {
            max-width: 260px;
            width: 100%;
        }

        /* ===== Canvas ===== */

        .eksplorasi-media .canvas-responsive {
            padding: 6px;
        }

        .canvas-responsive {
            width: 100%;
            overflow-x: auto;
            overflow-y: hidden;
            -webkit-overflow-scrolling: touch;
            border: 1px solid rgba(0, 0, 0, .08);
            border-radius: 12px;
            background: #fff;
            padding: 8px;
        }

        .aksi-latihan {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .medium-zoom-overlay {
            z-index: 9998 !important;
        }

        .medium-zoom-image--opened {
            z-index: 9999 !important;
        }

        @media (max-width: 768px) {
            .container.apersepsi-container {
                padding-left: 12px;
                padding-right: 12px;
                margin-top: 16px !important;
            }

            .card-body {
                padding: 16px;
            }

            h1 {
                font-size: 1.55rem;
                line-height: 1.35;
            }

            h5 {
                font-size: 1rem;
                line-height: 1.4;
            }

            p,
            li,
            table,
            input,
            button {
                font-size: 0.95rem;
            }

            .apersepsi-section {
                padding: 22px 14px 16px;
            }

            .section-label {
                left: 14px;
                padding: 6px 10px !important;
                font-size: 0.9rem;
            }

            .box-pengantar {
                padding: 12px;
            }

            .gambar-wrapper {
                max-width: 100%;
                max-height: 300px;
            }

            .gambar-wrapper img {
                max-height: 300px;
            }

            .img-titik-asal {
                max-width: 220px;
            }

            .canvas-responsive {
                padding: 6px;
            }

            #canvas-container,
            #canvas-latihan-buat {
                min-height: 280px;
            }

            .input-koordinat {
                align-items: stretch;
                gap: 8px;
            }

            .input-koordinat label {
                width: 100%;
            }

            .input-koordinat .form-control {
                width: 100% !important;
                max-width: 100%;
            }

            .btn-palet,
            .aksi-latihan .btn {
                width: 100%;
                white-space: normal;
            }

            .table-responsive {
                width: 100%;
            }

            .tabel-posisi {
                min-width: 390px !important;
            }

            .tabel-posisi th:nth-child(1),
            .tabel-posisi td:nth-child(1),
            .tabel-posisi th:nth-child(2),
            .tabel-posisi td:nth-child(2) {
                width: 70px;
                min-width: 70px;
            }

            .tabel-posisi th:nth-child(3),
            .tabel-posisi td:nth-child(3) {
                width: 180px;
                min-width: 180px;
            }

            .input-posisi {
                width: 120px !important;
                max-width: 120px;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.35rem;
            }

            .card-body {
                padding: 14px;
            }

            .apersepsi-section {
                padding-left: 12px;
                padding-right: 12px;
            }

            .gambar-wrapper {
                max-height: 240px;
            }

            .gambar-wrapper img {
                max-height: 240px;
            }
        }

        /* Canvas untuk menaruh titik2 dan menghubungkan garis */
        .visual-garis {
            margin: 14px 0 16px;
            padding: 14px;
            border: 1px dashed #d8e4f2;
            border-radius: 14px;
            background: #fbfdff;
        }

        .canvas-garis {
            display: block;
            width: 100%;
            max-width: 340px;
            height: auto;
            margin: 0 auto;
            background: #ffffff;
            border: 1px solid #dbe5f1;
            border-radius: 12px;
        }

        .btn-visual-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 8px;
            margin-top: 12px;
        }

        .btn-mini-garis {
            border: none;
            border-radius: 999px;
            padding: 7px 14px;
            font-size: 14px;
            font-weight: 600;
            background: #315f9c;
            color: #ffffff;
            cursor: pointer;
        }

        .btn-mini-garis.reset {
            background: #6c757d;
        }

        .catatan-visual {
            margin: 10px 0 0;
            font-size: 14px;
            text-align: center;
            color: #4b5563;
        }

        /* Alat bantu plotting */
        .plot-bebas-box {
            padding: 16px;
            border: 1px solid #dbe5f1;
            border-radius: 16px;
            background: #fbfdff;
        }

        .plot-bebas-title {
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 12px;
            text-align: center;
        }

        .info-plot-bebas {
            padding: 10px 12px;
            margin-bottom: 12px;
            border-radius: 12px;
            background: #eef6ff;
            color: #1f2937;
            font-size: 15px;
            text-align: center;
        }

        .canvas-plot-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .canvas-plot-wrapper canvas {
            max-width: 100%;
            height: auto !important;
            border: 1px solid #dbe5f1;
            border-radius: 12px;
            background: #ffffff;
        }

        .plot-btn-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 8px;
            margin-top: 12px;
        }

        .btn-mini-garis {
            border: none;
            border-radius: 999px;
            padding: 7px 14px;
            font-size: 14px;
            font-weight: 600;
            background: #315f9c;
            color: #ffffff;
            cursor: pointer;
        }

        .btn-mini-garis:hover {
            opacity: 0.9;
        }

        .btn-mini-garis.reset {
            background: #6c757d;
        }

        .status-plot-bebas {
            margin-top: 10px;
            font-size: 14px;
            text-align: center;
            color: #4b5563;
        }

        .status-plot-bebas.benar {
            color: #198754;
            font-weight: 700;
        }

        .status-plot-bebas.salah {
            color: #dc3545;
            font-weight: 700;
        }

        .plot-bebas-box {
            margin-top: 0;
        }

        .canvas-plot-wrapper {
            width: 100%;
            overflow-x: auto;
        }


        /* =============================== */
        /* CARD SCROLL EKSPLORASI GARIS */
        /* =============================== */

        .eksplorasi-scroll-card {
            background: #ffffff;
            border: 1px solid #dbe5f1;
            border-radius: 20px;
            padding: 18px;
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.06);
        }

        .eksplorasi-scroll-grid {
            display: grid;
            grid-template-columns: 48% 52%;
            gap: 18px;
            height: 560px;
            min-height: 440px;
        }

        .scroll-panel {
            border: 1px solid #dbe5f1;
            border-radius: 18px;
            background: #fbfdff;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .scroll-panel-header {
            padding: 14px 16px;
            font-weight: 700;
            text-align: center;
            color: #1f2937;
            background: #f3f8ff;
            border-bottom: 1px solid #dbe5f1;
        }

        .scroll-panel-body {
            padding: 16px;
            overflow-y: auto;
            overflow-x: hidden;
            flex: 1;
        }


        /* =============================== */
        /* PANEL GRAFIK */
        /* =============================== */

        .info-plot-bebas {
            padding: 12px 14px;
            margin-bottom: 14px;
            border-radius: 14px;
            background: #eef6ff;
            color: #1f2937;
            font-size: 0.95rem;
            line-height: 1.55;
            text-align: center;
        }

        .canvas-plot-wrapper {
            display: flex;
            justify-content: center;
            width: 100%;
            overflow-x: auto;
            margin-top: 10px;
        }

        .canvas-plot-wrapper canvas {
            max-width: 100%;
            height: auto !important;
            border: 1px solid #dbe5f1;
            border-radius: 12px;
            background: #ffffff;
        }

        .plot-btn-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 8px;
            margin-top: 14px;
        }

        .btn-mini-garis {
            border: none;
            border-radius: 999px;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 600;
            background: #315f9c;
            color: #ffffff;
            cursor: pointer;
        }

        .btn-mini-garis:hover {
            opacity: 0.9;
        }

        .btn-mini-garis.reset {
            background: #6c757d;
        }

        .status-plot-bebas {
            margin-top: 12px;
            font-size: 14px;
            text-align: center;
            color: #4b5563;
        }

        .status-plot-bebas.benar {
            color: #198754;
            font-weight: 700;
        }

        .status-plot-bebas.salah {
            color: #dc3545;
            font-weight: 700;
        }


        /* =============================== */
        /* PANEL SOAL */
        /* =============================== */

        .soal-garis-item {
            padding-bottom: 18px;
            margin-bottom: 18px;
            border-bottom: 1px dashed #d6e0ee;
        }

        .soal-garis-title {
            font-size: 1.08rem;
            font-weight: 700;
            margin-bottom: 12px;
            color: #1f2937;
        }

        .opsi-garis-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .opsi-garis-row label {
            width: 100%;
            min-width: 0;
            margin: 0;
            padding: 12px 14px;
            border-radius: 14px;
            background: #f8fbff;
            border: 1px solid #cfe0f5;
            box-sizing: border-box;
            font-size: 0.96rem;
            line-height: 1.45;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .opsi-garis-row input {
            flex-shrink: 0;
        }

        .status-garis {
            margin-top: 8px;
            font-weight: 700;
        }

        .feedback-garis {
            margin-top: 14px;
        }


        /* =============================== */
        /* SCROLLBAR BIAR RAPI */
        /* =============================== */

        .scroll-panel-body::-webkit-scrollbar {
            width: 8px;
        }

        .scroll-panel-body::-webkit-scrollbar-track {
            background: #eef3f9;
            border-radius: 999px;
        }

        .scroll-panel-body::-webkit-scrollbar-thumb {
            background: #b9c8dc;
            border-radius: 999px;
        }

        .scroll-panel-body::-webkit-scrollbar-thumb:hover {
            background: #8fa4bf;
        }


        /* =============================== */
        /* RESPONSIVE */
        /* =============================== */

        @media (max-width: 992px) {
            .eksplorasi-scroll-grid {
                grid-template-columns: 1fr;
                height: auto;
            }

            .scroll-panel {
                max-height: 520px;
            }

            .opsi-garis-row {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="container mt-4 apersepsi-container">
        <div class="card shadow-sm mb-4 apersepsi-card">
            <div class="card-body">
                <h1 class="mb-3" style="font-weight: 600;">Pendahuluan</h1>

                <p style="text-align: justify;">
                    Sebelum memahami pengertian Persamaan Garis Lurus, ada baiknya kamu
                    mengingat kembali materi tentang koordinat Kartesius. Persamaan garis lurus
                    digambarkan pada bidang koordinat Kartesius. Oleh karena itu, kamu perlu
                    memahami kembali cara menentukan letak suatu titik pada bidang koordinat
                    Kartesius.
                </p>

                <h5 class="mt-4 mb-3" style="font-weight: 700;">Koordinat Kartesius</h5>

                <p style="text-align: justify;">
                    Pada materi sebelumnya, kamu telah mengenal bidang koordinat Kartesius.
                    Bidang koordinat Kartesius memiliki dua sumbu yang saling tegak lurus,
                    yaitu sumbu mendatar yang disebut <strong>sumbu X</strong> dan sumbu tegak
                    yang disebut <strong>sumbu Y</strong>.
                </p>

                <p style="text-align: justify;">
                    Titik potong antara sumbu X dan sumbu Y disebut <strong>titik asal</strong>
                    atau <strong>titik pusat koordinat</strong>. Titik asal dinyatakan dengan
                    <strong>O(0,0)</strong>.
                </p>

                <div class="text-center my-4 gambar-wrapper">
                    <img src="{{ asset('img/koordinatkartesisus.png') }}" alt="Bidang Koordinat Kartesius"
                        class="materi-img zoomable img-koordinat">
                </div>

                <p class="mt-2 mb-0 text-center">
                    <small><strong>Gambar 1.1</strong> Bidang koordinat Kartesius</small>
                </p>
                <br>
            </div>
        </div>

        <div class="mt-4">
            <h5 style="font-weight: 700;">a. Menggambar Titik pada Koordinat Kartesius</h5>

            <p style="text-align: justify;">
                Setiap titik pada bidang koordinat Kartesius dinyatakan dalam bentuk pasangan
                berurutan <strong>(x, y)</strong>. Nilai <strong>x</strong> menunjukkan posisi titik
                pada sumbu-X dan disebut <strong>absis</strong>, sedangkan nilai <strong>y</strong>
                menunjukkan posisi titik pada sumbu-Y dan disebut <strong>ordinat</strong>.
                Oleh karena itu, letak suatu titik pada bidang koordinat dapat ditentukan
                dengan memperhatikan pasangan bilangan tersebut.
            </p>

            <p style="text-align: justify;">
                Perhatikan gambar berikut. Pada gambar tersebut terdapat beberapa titik pada
                bidang koordinat Kartesius. Setiap titik dapat dituliskan dalam bentuk
                pasangan koordinat sesuai dengan letaknya pada sumbu-X dan sumbu-Y.
            </p>

            <div class="contoh-koordinat-wrap my-4">
                <div class="contoh-koordinat-gambar">
                    <img src="{{ asset('img/contoh-titik-koordinat.png') }}"
                        alt="Contoh titik pada bidang koordinat Kartesius" class="materi-img zoomable"
                        style="max-width: 300px">
                    <p class="mt-2 mb-0 text-center">
                        <small><strong>Gambar 1.2</strong> Contoh titik pada bidang koordinat Kartesius</small>
                    </p>
                </div>

                <div class="contoh-koordinat-daftar">
                    <p><strong>Penulisan titik koordinat:</strong></p>
                    <ul class="mb-0">
                        <li><strong>A</strong> = (2, 1)</li>
                        <li><strong>B</strong> = (-2, 3)</li>
                        <li><strong>C</strong> = (-3, -1)</li>
                        <li><strong>D</strong> = (4, -3)</li>
                        <li><strong>E</strong> = (3, 0)</li>
                        <li><strong>F</strong> = (0, 2)</li>
                    </ul>
                </div>
            </div>

            <div class="cara-menentukan-box">
                <h6 class="mb-2"><strong>Cara Menentukan Letak Titik</strong></h6>
                <ol class="mb-0">
                    <li>Bacalah pasangan koordinat dalam bentuk <strong>(x, y)</strong>.</li>
                    <li>Tentukan nilai <strong>x</strong> terlebih dahulu pada sumbu-X.</li>
                    <li>
                        Jika <strong>x</strong> bernilai positif, bergerak ke <strong>kanan</strong>.
                        Jika <strong>x</strong> bernilai negatif, bergerak ke <strong>kiri</strong>.
                    </li>
                    <li>
                        Setelah itu, tentukan nilai <strong>y</strong> pada sumbu-Y.
                        Jika <strong>y</strong> bernilai positif, bergerak ke <strong>atas</strong>.
                        Jika <strong>y</strong> bernilai negatif, bergerak ke <strong>bawah</strong>.
                    </li>
                    <li>Titik perpotongan kedua arah tersebut merupakan letak titik yang dimaksud.</li>
                </ol>
            </div>

            <div class="contoh-koordinat-box mt-3">
                <p class="mb-2"><strong>Contoh:</strong></p>
                <p class="mb-1">
                    Titik <strong>A(2,1)</strong> berarti dari titik asal <strong>O(0,0)</strong>,
                    bergerak <strong>2 satuan ke kanan</strong> dan <strong>1 satuan ke atas</strong>.
                </p>
                <p class="mb-0">
                    Titik <strong>B(-2,3)</strong> berarti dari titik asal <strong>O(0,0)</strong>,
                    bergerak <strong>2 satuan ke kiri</strong> dan <strong>3 satuan ke atas</strong>.
                </p>
            </div>
        </div>

        {{-- Eksplorasi Menentukan Letak Titik --}}
        <div class="position-relative apersepsi-section mt-5">

            <div class="position-absolute px-3 py-2 text-white fw-bold section-label">
                Eksplorasi Menentukan Letak Titik
            </div>

            <div class="eksplorasi-layout">
                <div class="box-pengantar petunjuk-detail petunjuk-scroll mt-3 mb-3">
                    <div class="petunjuk-subtitle">Petunjuk aktivitas:</div>

                    <ol>
                        <li>Perhatikan titik yang harus ditempatkan.</li>
                        <li>Baca angka pertama sebagai nilai <b>x</b>.</li>
                        <li>Baca angka kedua sebagai nilai <b>y</b>.</li>
                        <li>Klik posisi titik pada perpotongan garis koordinat yang sesuai.</li>
                        <li>Jika titik yang kamu klik benar, titik akan muncul pada bidang koordinat dan kamu akan lanjut ke
                            titik berikutnya.</li>
                        <li>Jika titik yang kamu klik salah, akan muncul tanda silang(X), lalu baca petunjuk dan coba klik
                            kembali.</li>
                    </ol>

                    <div class="petunjuk-catatan">
                        <b>Contoh:</b> Titik <b>A(2,3)</b> berarti dari titik asal
                        <b>O(0,0)</b>, bergerak 2 satuan ke kanan dan 3 satuan ke atas.
                    </div>
                </div>

                <div class="eksplorasi-media mt-3">
                    <div class="canvas-responsive">
                        <div id="canvas-letak-titik"></div>
                    </div>

                    <div id="infoLetakTitik" class="info-aktivitas">
                        Klik posisi titik <b>A(2,3)</b> pada bidang koordinat.
                    </div>

                    <div class="aksi-latihan mt-2">
                        <button class="btn-palet btn btn-sm" onclick="resetLetakTitik()">Reset</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <h5 style="font-weight: 700;">b. Menggambar Garis pada Koordinat Kartesius</h5>
            <p class="mt-3" style="text-align: justify;">
                Setelah kamu dapat menentukan letak titik pada bidang koordinat Kartesius,
                sekarang kamu akan mengamati bagaimana beberapa titik dapat dihubungkan
                sehingga membentuk sebuah garis.
            </p>

            <p style="text-align: justify;">
                Sebuah garis lurus dapat digambar dengan menggunakan sedikitnya dua titik
                pada bidang koordinat. Jika beberapa titik berada pada arah atau pola yang
                sama, maka titik-titik tersebut dapat dihubungkan dan membentuk garis lurus.
            </p>

            <div class="box-pengantar petunjuk-detail mt-3 mb-3">
                <div class="petunjuk-subtitle">Perhatikan ilustrasi berikut:</div>

                <p style="text-align: justify;">
                    Misalkan terdapat titik <b>A(0,1)</b>, <b>B(1,2)</b>,
                    <b>C(2,3)</b>, dan <b>D(3,4)</b>. Titik-titik tersebut terletak
                    pada bidang koordinat Kartesius. Jika titik-titik itu dihubungkan
                    secara berurutan, maka akan terbentuk sebuah garis lurus.
                </p>

                <div class="text-center my-4 gambar-wrapper">
                    <img src="{{ asset('img/ilustrasi-garis-lurus.png') }}"
                        alt="Ilustrasi titik-titik pembentuk garis lurus" class="materi-img zoomable img-koordinat">
                </div>

                <p class="mt-2 mb-0 text-center">
                    <small><strong>Gambar 1.3</strong> Titik-titik pada bidang koordinat yang membentuk garis lurus</small>
                </p>
            </div>
        </div>

        {{-- Eksplorasi Menentukan Titik-Titik yang Membentuk Garis Lurus --}}
        <div class="position-relative apersepsi-section mt-5">

            <div class="position-absolute px-3 py-2 text-white fw-bold section-label">
                Eksplorasi Menentukan Titik-Titik yang Membentuk Garis Lurus
            </div>

            <div class="garis-check-box mt-3">

                <div class="petunjuk-garis-box">
                    <strong>Petunjuk eksplorasi:</strong><br>
                    Perhatikan titik-titik pada setiap soal di kotak sebelah kanan. Gunakan bidang koordinat di kotak kiri sebagai alat bantu
                    untuk menggambar tiga titik sesuai soal koordinat yang diberikan. Setelah tiga titik digambar,
                    klik tombol <strong>Lihat Garis</strong>, lalu tentukan apakah ketiga titik tersebut
                    membentuk garis lurus atau tidak. Klik <strong>Reset Grafik</strong> sebelum mencoba soal berikutnya.
                </div>

                <div class="eksplorasi-scroll-card mt-3">

                    <div class="eksplorasi-scroll-grid">

                        {{-- KOLOM KIRI: ALAT BANTU GRAFIK --}}
                        <div class="scroll-panel scroll-panel-grafik">
                            <div class="scroll-panel-header">
                                Alat Bantu Menggambar Titik
                            </div>

                            <div class="scroll-panel-body">

                                <div id="infoPlotBebas" class="info-plot-bebas">
                                    Klik titik ke-1 pada bidang koordinat Kartesius. Kamu sudah membuat 0 dari 3 titik.
                                </div>

                                <div id="canvas-plot-bebas" class="canvas-plot-wrapper"></div>

                                <div class="plot-btn-row">
                                    <button type="button" class="btn-mini-garis" onclick="lihatGarisPlotBebas()">
                                        Lihat Garis
                                    </button>

                                    <button type="button" class="btn-mini-garis reset" onclick="resetPlotBebas()">
                                        Reset Grafik
                                    </button>
                                </div>

                                <div id="statusPlotBebas" class="status-plot-bebas"></div>

                            </div>
                        </div>

                        {{-- KOLOM KANAN: SOAL --}}
                        <div class="scroll-panel scroll-panel-soal">
                            <div class="scroll-panel-header">
                                Soal Eksplorasi
                            </div>

                            <div class="scroll-panel-body">
                                <div class="instruksi-soal-garis">
                                    Tentukan apakah tiga titik berikut membentuk garis lurus atau tidak.
                                </div>

                                <div class="soal-garis-item" id="itemGaris1">
                                    <div class="soal-garis-title">
                                        1. $A(0,0)$, $B(1,1)$, $C(2,2)$
                                    </div>

                                    <div class="opsi-garis-row">
                                        <label>
                                            <input type="radio" name="garis1" value="ya">
                                            Membentuk garis lurus
                                        </label>

                                        <label>
                                            <input type="radio" name="garis1" value="tidak">
                                            Tidak membentuk garis lurus
                                        </label>
                                    </div>

                                    <div id="statusGaris1" class="status-garis"></div>
                                </div>

                                <div class="soal-garis-item" id="itemGaris2">
                                    <div class="soal-garis-title">
                                        2. $D(2,-2)$, $E(1,-1)$, $F(0,0)$
                                    </div>

                                    <div class="opsi-garis-row">
                                        <label>
                                            <input type="radio" name="garis2" value="ya">
                                            Membentuk garis lurus
                                        </label>

                                        <label>
                                            <input type="radio" name="garis2" value="tidak">
                                            Tidak membentuk garis lurus
                                        </label>
                                    </div>

                                    <div id="statusGaris2" class="status-garis"></div>
                                </div>

                                <div class="soal-garis-item" id="itemGaris3">
                                    <div class="soal-garis-title">
                                        3. $G(-2,1)$, $H(1,0)$, $I(4,3)$
                                    </div>

                                    <div class="opsi-garis-row">
                                        <label>
                                            <input type="radio" name="garis3" value="ya">
                                            Membentuk garis lurus
                                        </label>

                                        <label>
                                            <input type="radio" name="garis3" value="tidak">
                                            Tidak membentuk garis lurus
                                        </label>
                                    </div>

                                    <div id="statusGaris3" class="status-garis"></div>
                                </div>

                                <div class="soal-garis-item" id="itemGaris4">
                                    <div class="soal-garis-title">
                                        4. $J(2,-2)$, $K(3,0)$, $L(1,1)$
                                    </div>

                                    <div class="opsi-garis-row">
                                        <label>
                                            <input type="radio" name="garis4" value="ya">
                                            Membentuk garis lurus
                                        </label>

                                        <label>
                                            <input type="radio" name="garis4" value="tidak">
                                            Tidak membentuk garis lurus
                                        </label>
                                    </div>

                                    <div id="statusGaris4" class="status-garis"></div>
                                </div>

                                <button class="btn-palet btn mt-2" onclick="cekGarisLurus()">
                                    Cek Jawaban
                                </button>

                                <div id="feedbackGarisLurus" class="feedback-garis"></div>

                            </div>
                        </div>

                    </div>
                </div>

                <div id="penyelesaianGarisLurus" class="penyelesaian-garis-box">
                    <p class="mb-3">
                        <strong>Penyelesaian:</strong>
                    </p>

                    <div class="penyelesaian-garis-grid">

                        <figure class="penyelesaian-garis-item">
                            <div class="label-penyelesaian">Jawaban No. 1</div>

                            <img src="{{ asset('img/apersepsi/gambar1.png') }}" alt="Jawaban nomor 1 titik A, B, dan C"
                                class="zoomable">

                            <figcaption>
                                Titik-titik $A(0,0)$, $B(1,1)$, dan $C(2,2)$ berada pada satu garis yang sama.
                                Jadi, titik-titik tersebut <strong>membentuk garis lurus</strong>.
                            </figcaption>
                        </figure>

                        <figure class="penyelesaian-garis-item">
                            <div class="label-penyelesaian">Jawaban No. 2</div>

                            <img src="{{ asset('img/apersepsi/gambar2.png') }}" alt="Jawaban nomor 2 titik D, E, dan F"
                                class="zoomable">

                            <figcaption>
                                Titik-titik $D(2,-2)$, $E(1,-1)$, dan $F(0,0)$ berada pada satu garis yang sama.
                                Jadi, titik-titik tersebut <strong>membentuk garis lurus</strong>.
                            </figcaption>
                        </figure>

                        <figure class="penyelesaian-garis-item">
                            <div class="label-penyelesaian">Jawaban No. 3</div>

                            <img src="{{ asset('img/apersepsi/gambar3.png') }}" alt="Jawaban nomor 3 titik G, H, dan I"
                                class="zoomable">

                            <figcaption>
                                Titik-titik $G(-2,1)$, $H(1,0)$, dan $I(4,3)$ tidak berada pada satu garis yang sama.
                                Jadi, titik-titik tersebut <strong>tidak membentuk garis lurus</strong>.
                            </figcaption>
                        </figure>

                        <figure class="penyelesaian-garis-item">
                            <div class="label-penyelesaian">Jawaban No. 4</div>

                            <img src="{{ asset('img/apersepsi/gambar4.png') }}" alt="Jawaban nomor 4 titik J, K, dan L"
                                class="zoomable">

                            <figcaption>
                                Titik-titik $J(2,-2)$, $K(3,0)$, dan $L(1,1)$ tidak berada pada satu garis yang sama.
                                Jadi, titik-titik tersebut <strong>tidak membentuk garis lurus</strong>.
                            </figcaption>
                        </figure>
                    </div>

                    <div class="box-pengantar mt-4">
                        <p style="text-align: justify;">
                            Berdasarkan aktivitas sebelumnya, dapat diketahui bahwa beberapa titik
                            pada bidang koordinat Kartesius dapat membentuk garis lurus apabila
                            titik-titik tersebut terletak pada satu garis yang sama.
                        </p>

                        <p style="text-align: justify;">
                            Garis lurus yang terbentuk pada bidang koordinat dapat dinyatakan dalam
                            bentuk persamaan. Persamaan inilah yang disebut sebagai
                            <strong>Persamaan Garis Lurus</strong>.
                        </p>

                        <p style="text-align: justify;" class="mb-0">
                            Selanjutnya, kamu akan mempelajari bentuk umum Persamaan Garis Lurus.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Aktivitas P5 --}}

    {{-- Menentukan titik pada Bidang Kartesius --}}
    <script>
        // Aktivitas Menentukan letak titik pada koordinat Kartesius
        let targetLetakTitik = [{
                nama: "A",
                x: 2,
                y: 3
            },
            {
                nama: "B",
                x: -2,
                y: 3
            },
            {
                nama: "C",
                x: 2,
                y: -3
            },
            {
                nama: "D",
                x: -3,
                y: -2
            },
        ];

        let indeksLetakTitik = 0;
        let titikLetakBenar = [];
        let titikLetakPercobaan = null;

        function petunjukArahTitik(titik) {
            let arahX = "";

            if (titik.x > 0) {
                arahX = `${titik.x} satuan ke kanan`;
            } else if (titik.x < 0) {
                arahX = `${Math.abs(titik.x)} satuan ke kiri`;
            } else {
                arahX = `tetap pada sumbu Y`;
            }

            let arahY = "";

            if (titik.y > 0) {
                arahY = `${titik.y} satuan ke atas`;
            } else if (titik.y < 0) {
                arahY = `${Math.abs(titik.y)} satuan ke bawah`;
            } else {
                arahY = `tetap pada sumbu X`;
            }

            return `Dari O(0,0), bergerak ${arahX}, lalu ${arahY}.`;
        }

        function updateInfoLetakTitik() {
            const infoBox = document.getElementById("infoLetakTitik");

            if (!infoBox) return;

            if (indeksLetakTitik >= targetLetakTitik.length) {
                infoBox.innerHTML = `
            <div class="alert alert-success mb-0">
                <strong>Bagus!</strong><br>
                Kamu sudah bisa menempatkan titik pada bidang koordinat Kartesius dengan baik.
            </div>
        `;
                return;
            }

            const titik = targetLetakTitik[indeksLetakTitik];

            infoBox.innerHTML =
                `Klik posisi titik <b>${titik.nama}(${titik.x},${titik.y})</b> pada bidang koordinat. ` +
                petunjukArahTitik(titik);
        }

        const sketchLetakTitik = (p) => {
            const canvasW = 360;
            const canvasH = 340;
            const gridSize = 280;

            let originX;
            let originY;
            let scaleUnit;

            p.setup = function() {
                const canvas = p.createCanvas(canvasW, canvasH);
                canvas.parent("canvas-letak-titik");

                originX = canvasW / 2;
                originY = 25 + gridSize / 2;
                scaleUnit = gridSize / 10;

                canvas.mousePressed(function() {
                    handleKlikLetakTitik();
                    return false;
                });
            };

            p.draw = function() {
                p.background(250);
                drawGrid();
                drawTitikBenar();

                if (titikLetakPercobaan) {
                    drawTitikPercobaan();
                }
            };

            function handleKlikLetakTitik() {
                if (indeksLetakTitik >= targetLetakTitik.length) return;

                const koordinat = pixelToCoord(p.mouseX, p.mouseY);

                if (!koordinat) return;

                const target = targetLetakTitik[indeksLetakTitik];

                if (koordinat.x === target.x && koordinat.y === target.y) {
                    titikLetakBenar.push({
                        nama: target.nama,
                        x: target.x,
                        y: target.y,
                    });

                    titikLetakPercobaan = null;
                    indeksLetakTitik++;

                    updateInfoLetakTitik();
                } else {
                    titikLetakPercobaan = {
                        x: koordinat.x,
                        y: koordinat.y,
                    };
                }
            }

            function drawGrid() {
                p.push();

                p.stroke(220);
                p.strokeWeight(1);

                for (let i = -5; i <= 5; i++) {
                    const x = originX + i * scaleUnit;
                    const y = originY - i * scaleUnit;

                    p.line(x, originY - gridSize / 2, x, originY + gridSize / 2);
                    p.line(originX - gridSize / 2, y, originX + gridSize / 2, y);
                }

                p.stroke(0);
                p.strokeWeight(2);

                p.line(originX - gridSize / 2 - 10, originY, originX + gridSize / 2 + 10, originY);
                p.line(originX, originY + gridSize / 2 + 10, originX, originY - gridSize / 2 - 10);

                p.noStroke();
                p.fill(0);
                p.textSize(12);

                for (let i = -5; i <= 5; i++) {
                    if (i !== 0) {
                        p.text(i, originX + i * scaleUnit - 4, originY + 18);
                        p.text(i, originX - 20, originY - i * scaleUnit + 4);
                    }
                }

                p.text("O", originX + 6, originY + 16);
                p.text("x", originX + gridSize / 2 + 16, originY - 8);
                p.text("y", originX + 8, originY - gridSize / 2 - 16);

                p.pop();
            }

            function drawTitikBenar() {
                p.push();

                titikLetakBenar.forEach((t) => {
                    const px = originX + t.x * scaleUnit;
                    const py = originY - t.y * scaleUnit;

                    p.fill(0, 102, 204);
                    p.noStroke();
                    p.circle(px, py, 11);

                    p.fill(0);
                    p.textSize(14);
                    p.text(`${t.nama}(${t.x},${t.y})`, px + 8, py - 8);
                });

                p.pop();
            }

            function drawTitikPercobaan() {
                const px = originX + titikLetakPercobaan.x * scaleUnit;
                const py = originY - titikLetakPercobaan.y * scaleUnit;

                p.push();

                p.stroke(220, 0, 0);
                p.strokeWeight(3);
                p.line(px - 6, py - 6, px + 6, py + 6);
                p.line(px + 6, py - 6, px - 6, py + 6);

                p.pop();
            }

            function pixelToCoord(px, py) {
                const batasKiri = originX - gridSize / 2;
                const batasKanan = originX + gridSize / 2;
                const batasAtas = originY - gridSize / 2;
                const batasBawah = originY + gridSize / 2;

                if (px < batasKiri || px > batasKanan || py < batasAtas || py > batasBawah) {
                    return null;
                }

                const x = Math.round((px - originX) / scaleUnit);
                const y = Math.round((originY - py) / scaleUnit);

                return {
                    x,
                    y
                };
            }
        };

        document.addEventListener("DOMContentLoaded", function() {
            if (document.getElementById("canvas-letak-titik")) {
                new p5(sketchLetakTitik);
                updateInfoLetakTitik();
            }
        });

        function resetLetakTitik() {
            indeksLetakTitik = 0;
            titikLetakBenar = [];
            titikLetakPercobaan = null;

            updateInfoLetakTitik();
        }
    </script>

    {{-- Plotting Mandiri --}}
    <script>
        let titikPlotBebas = [];
        let garisPlotBebasAktif = false;

        function updateInfoPlotBebas() {
            const infoBox = document.getElementById("infoPlotBebas");
            const statusBox = document.getElementById("statusPlotBebas");

            if (!infoBox) return;

            const jumlah = titikPlotBebas.length;

            if (jumlah < 3) {
                infoBox.innerHTML =
                    `Klik titik ke-${jumlah + 1} pada bidang koordinat Kartesius. ` +
                    `Kamu sudah membuat <b>${jumlah}</b> dari <b>3</b> titik.`;

                if (statusBox) {
                    statusBox.classList.remove("benar", "salah");
                    statusBox.innerHTML = "";
                }
            } else {
                infoBox.innerHTML =
                    `Kamu sudah membuat 3 titik. Klik tombol <b>Lihat Garis</b> untuk melihat apakah ketiga titik membentuk garis lurus.`;
            }
        }
        const sketchPlotBebas = (p) => {
            const canvasW = 380;
            const canvasH = 360;
            const gridSize = 280;

            let originX;
            let originY;
            let scaleUnit;

            p.setup = function() {
                const canvas = p.createCanvas(canvasW, canvasH);
                canvas.parent("canvas-plot-bebas");

                originX = canvasW / 2;
                originY = 30 + gridSize / 2;
                scaleUnit = gridSize / 10;

                canvas.mousePressed(function() {
                    handleKlikPlotBebas();
                    return false;
                });
            };

            p.draw = function() {
                p.background(250);
                drawGrid();

                if (garisPlotBebasAktif && titikPlotBebas.length === 3) {
                    drawGarisDariDuaTitikPertama();
                    drawGarisPenghubungTitik();
                }

                drawTitikPlotBebas();
            };

            function handleKlikPlotBebas() {
                if (titikPlotBebas.length >= 3) {
                    const statusBox = document.getElementById("statusPlotBebas");

                    if (statusBox) {
                        statusBox.classList.remove("benar", "salah");
                        statusBox.innerHTML =
                            `Kamu sudah membuat 3 titik. Klik <b>Reset</b> jika ingin mencoba titik lain.`;
                    }

                    return;
                }

                const koordinat = pixelToCoord(p.mouseX, p.mouseY);

                if (!koordinat) return;

                const sudahAda = titikPlotBebas.some((t) => {
                    return t.x === koordinat.x && t.y === koordinat.y;
                });

                if (sudahAda) {
                    const statusBox = document.getElementById("statusPlotBebas");

                    if (statusBox) {
                        statusBox.classList.remove("benar", "salah");
                        statusBox.innerHTML =
                            `Titik tersebut sudah dipilih. Pilih titik lain.`;
                    }

                    return;
                }

                const label = ["A", "B", "C"][titikPlotBebas.length];

                titikPlotBebas.push({
                    nama: label,
                    x: koordinat.x,
                    y: koordinat.y
                });

                garisPlotBebasAktif = false;
                updateInfoPlotBebas();
            }

            function drawGrid() {
                p.push();

                p.stroke(220);
                p.strokeWeight(1);

                for (let i = -5; i <= 5; i++) {
                    const x = originX + i * scaleUnit;
                    const y = originY - i * scaleUnit;

                    p.line(x, originY - gridSize / 2, x, originY + gridSize / 2);
                    p.line(originX - gridSize / 2, y, originX + gridSize / 2, y);
                }

                p.stroke(0);
                p.strokeWeight(2);

                p.line(originX - gridSize / 2 - 10, originY, originX + gridSize / 2 + 10, originY);
                p.line(originX, originY + gridSize / 2 + 10, originX, originY - gridSize / 2 - 10);

                p.noStroke();
                p.fill(0);
                p.textSize(12);

                for (let i = -5; i <= 5; i++) {
                    if (i !== 0) {
                        p.text(i, originX + i * scaleUnit - 4, originY + 18);
                        p.text(i, originX - 20, originY - i * scaleUnit + 4);
                    }
                }

                p.text("O", originX + 6, originY + 16);
                p.text("x", originX + gridSize / 2 + 16, originY - 8);
                p.text("y", originX + 8, originY - gridSize / 2 - 16);

                p.pop();
            }

            function drawTitikPlotBebas() {
                p.push();

                titikPlotBebas.forEach((t) => {
                    const px = originX + t.x * scaleUnit;
                    const py = originY - t.y * scaleUnit;

                    p.fill(0, 102, 204);
                    p.noStroke();
                    p.circle(px, py, 11);

                    p.fill(0);
                    p.textSize(14);
                    p.text(`${t.nama}(${t.x},${t.y})`, px + 8, py - 8);
                });

                p.pop();
            }

            function drawGarisDariDuaTitikPertama() {
                const p1 = titikPlotBebas[0];
                const p2 = titikPlotBebas[1];

                let awal;
                let akhir;

                if (p1.x === p2.x) {
                    awal = {
                        x: p1.x,
                        y: -5
                    };
                    akhir = {
                        x: p1.x,
                        y: 5
                    };
                } else {
                    const m = (p2.y - p1.y) / (p2.x - p1.x);

                    awal = {
                        x: -5,
                        y: m * (-5 - p1.x) + p1.y
                    };

                    akhir = {
                        x: 5,
                        y: m * (5 - p1.x) + p1.y
                    };
                }

                const awalPx = coordToPixel(awal);
                const akhirPx = coordToPixel(akhir);

                p.push();

                p.stroke(25, 135, 84);
                p.strokeWeight(3);
                p.line(awalPx.x, awalPx.y, akhirPx.x, akhirPx.y);

                p.pop();
            }

            function drawGarisPenghubungTitik() {
                const p1 = coordToPixel(titikPlotBebas[0]);
                const p2 = coordToPixel(titikPlotBebas[1]);
                const p3 = coordToPixel(titikPlotBebas[2]);

                p.push();

                p.stroke(220, 53, 69);
                p.strokeWeight(2);
                p.drawingContext.setLineDash([6, 6]);

                p.line(p1.x, p1.y, p2.x, p2.y);
                p.line(p2.x, p2.y, p3.x, p3.y);

                p.drawingContext.setLineDash([]);

                p.pop();
            }

            function coordToPixel(titik) {
                return {
                    x: originX + titik.x * scaleUnit,
                    y: originY - titik.y * scaleUnit
                };
            }

            function pixelToCoord(px, py) {
                const batasKiri = originX - gridSize / 2;
                const batasKanan = originX + gridSize / 2;
                const batasAtas = originY - gridSize / 2;
                const batasBawah = originY + gridSize / 2;

                if (px < batasKiri || px > batasKanan || py < batasAtas || py > batasBawah) {
                    return null;
                }

                const x = Math.round((px - originX) / scaleUnit);
                const y = Math.round((originY - py) / scaleUnit);

                return {
                    x,
                    y
                };
            }
        };

        function lihatGarisPlotBebas() {
            const statusBox = document.getElementById("statusPlotBebas");

            if (titikPlotBebas.length < 3) {
                if (statusBox) {
                    statusBox.innerHTML = `Buat 3 titik terlebih dahulu sebelum melihat garis.`;
                }

                return;
            }

            garisPlotBebasAktif = true;

            if (statusBox) {
                statusBox.innerHTML = `Perhatikan posisi ketiga titik pada bidang koordinat.`;
            }
        }

        function resetPlotBebas() {
            titikPlotBebas = [];
            garisPlotBebasAktif = false;

            const statusBox = document.getElementById("statusPlotBebas");

            if (statusBox) {
                statusBox.classList.remove("benar", "salah");
                statusBox.innerHTML = "";
            }

            updateInfoPlotBebas();
        }

        document.addEventListener("DOMContentLoaded", function() {
            if (document.getElementById("canvas-plot-bebas")) {
                new p5(sketchPlotBebas);
                updateInfoPlotBebas();
            }
        });
    </script>

    {{-- Menentukan apakah titik2 membuat sebuah garis lurus --}}
    <script>
        function cekGarisLurus() {
            const kunci = {
                garis1: "ya",
                garis2: "ya",
                garis3: "tidak",
                garis4: "tidak"
            };

            let jumlahBenar = 0;
            let jumlahTerjawab = 0;
            const totalSoal = 4;

            for (let i = 1; i <= totalSoal; i++) {
                const nama = "garis" + i;
                const status = document.getElementById("statusGaris" + i);
                const jawaban = document.querySelector(`input[name="${nama}"]:checked`);

                status.className = "status-garis";
                status.innerHTML = "";

                if (!jawaban) {
                    status.classList.add("belum");
                    status.innerHTML = "Pilih salah satu jawaban.";
                    continue;
                }

                jumlahTerjawab++;

                if (jawaban.value === kunci[nama]) {
                    jumlahBenar++;

                    status.classList.add("benar");
                    status.innerHTML = "Benar";
                } else {
                    status.classList.add("salah");
                    status.innerHTML = "Coba amati kembali letak titik-titiknya.";
                }
            }

            const feedback = document.getElementById("feedbackGarisLurus");
            const penyelesaian = document.getElementById("penyelesaianGarisLurus");

            feedback.className = "feedback-garis";
            feedback.innerHTML = "";
            penyelesaian.style.display = "none";

            if (jumlahTerjawab < totalSoal) {
                feedback.classList.add("salah");
                feedback.innerHTML =
                    `Masih ada soal yang belum dijawab. Kamu menjawab <b>${jumlahBenar}</b> dari <b>${totalSoal}</b> soal benar.`;
                return;
            }

            if (jumlahBenar < totalSoal) {
                feedback.classList.add("salah");
                feedback.innerHTML =
                    `Masih ada jawaban yang salah. Kamu menjawab <b>${jumlahBenar}</b> dari <b>${totalSoal}</b> soal benar. Perbaiki soal yang bertanda salah.`;
                return;
            }

            feedback.classList.add("benar");
            feedback.innerHTML =
                `Bagus, semua jawaban benar. Kamu sudah dapat menentukan titik-titik yang membentuk garis lurus dan yang tidak membentuk garis lurus.`;

            penyelesaian.style.display = "block";
        }
    </script>

    {{-- Zoom Gambar --}}
    <script src="https://cdn.jsdelivr.net/npm/medium-zoom@1.1.0/dist/medium-zoom.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            mediumZoom('.zoomable', {
                margin: 24,
                background: 'rgba(0, 0, 0, 0.75)',
                scrollOffset: 40
            });
        });
    </script>
@endsection

@section('nav')
    <a href="{{ route('peta-konsep') }}" class="btn btn-prev px-4 rounded-pill">
        ← Prev
    </a>
    <a href="{{ route('materi.show', 'subbab-a1') }}" class="btn btn-next px-4 rounded-pill fw-semibold">
        Next →
    </a>
@endsection
