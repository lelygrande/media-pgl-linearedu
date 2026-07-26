@extends('layout.halaman-materi')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/subbabB/subbbabB_gradienduatitik.css') }}">

    <style>
        .card-tujuan {
            background: #2E75B6;
            color: #fff;
            border: 0;
            border-radius: 16px;
            padding: 10px 6px;
        }

        .card-tujuan h5 {
            font-weight: 800;
            margin-bottom: 10px;
        }

        .card-tujuan ol {
            margin-bottom: 0;
            padding-left: 22px;
            line-height: 1.7;
        }

        .card-materi {
            border-radius: 16px;
            border: 2px solid #2E75B6;
            background: #fff;
        }

        .rumus-box {
            display: inline-block;
            background: #fff3cd;
            border: 1px solid #ffe69c;
            padding: 10px 30px;
            font-size: 20px;
            border-radius: 12px;
        }

        .badge-contoh {
            display: inline-block;
            background: #2E75B6;
            color: #fff;
            font-weight: 800;
            padding: 6px 12px;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .badge-latihan {
            display: inline-block;
            background: #22b969;
            color: #fff;
            font-weight: 800;
            padding: 6px 12px;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .badge-sub {
            display: inline-block;
            background: #eef4ff;
            color: #2E75B6;
            font-weight: 800;
            padding: 6px 10px;
            border-radius: 999px;
            margin-bottom: 10px;
            border: 1px solid #dbe5f1;
        }

        .quiz-card {
            border-radius: 16px;
            border: 1px solid #e5e7eb;
            background: #fff;
        }

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

        .btn-tampil {
            background-color: #f1a10c;
            /* abu-abu bootstrap */
            color: white;
            border: none;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 10px;
            transition: 0.2s ease-in-out;
        }

        .btn-tampil:hover {
            background-color: #895d09;
            color: #dbe5f1;
        }

        .box-bimbingan {
            background: #f8fbff;
            border-left: 5px solid #2E75B6;
            padding: 14px 16px;
            border-radius: 10px;
            margin-bottom: 16px;
        }

        .box-kesimpulan {
            background: #fff8e8;
            border: 1px solid #e6c76a;
            border-radius: 12px;
            padding: 14px 16px;
        }

        /* ukuran input */
        .frac-input input,
        .frac input {
            width: 70px;
            text-align: center;
        }

        /* garis pecahan */
        .frac .top,
        .frac-input .top {
            border-bottom: 2px solid #222;
            padding: 3px 6px 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
        }

        .frac .bottom,
        .frac-input .bottom {
            padding: 6px 6px 3px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
        }
    </style>

    <style>
        .frac-static {
            display: inline-flex;
            flex-direction: column;
            align-items: stretch;
            text-align: center;
            min-width: 180px;
        }

        .frac-static .top {
            border-bottom: 2px solid #222;
            padding: 0 8px 6px 8px;
            min-width: 180px;
        }

        .frac-static .bottom {
            padding-top: 6px;
            min-width: 180px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 6px;
        }

        .frac-static input {
            width: 70px;
            text-align: center;
        }
    </style>

    {{-- Eksplorasi --}}
    <style>
        .eksplorasi-dua-titik-layout {
            display: grid;
            grid-template-columns: 1.35fr 0.9fr;
            gap: 28px;
            align-items: start;
        }

        .eksplorasi-derivasi {
            line-height: 1.9;
        }

        .derivasi-line {
            display: grid;
            grid-template-columns: 40px 1fr;
            gap: 10px;
            align-items: center;
            margin: 8px 0;
            font-size: 1.08rem;
        }

        .derivasi-symbol {
            text-align: center;
            font-weight: 700;
        }

        .derivasi-rumus {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
        }

        .gambar-dua-titik {
            text-align: center;
            position: sticky;
            top: 20px;
        }

        .gambar-dua-titik img {
            max-width: 100%;
            border-radius: 12px;
        }

        .input-eksplorasi {
            width: 100px;
            height: 36px;
            padding: 4px 8px;
        }

        @media (max-width: 992px) {
            .eksplorasi-dua-titik-layout {
                grid-template-columns: 1fr;
            }

            .gambar-dua-titik {
                position: static;
            }
        }
    </style>

    {{-- Slider Latihan --}}
    <style>
        .latihan-slider {
            width: 100%;
            overflow: hidden;
            position: relative;
        }

        .latihan-track {
            display: flex;
            transition: transform 0.45s ease-in-out;
            width: 100%;
        }

        .latihan-slide {
            min-width: 100%;
            flex: 0 0 100%;
            box-sizing: border-box;
        }

        /* ===== RESPONSIVE MOBILE ====== */
        @media (max-width: 768px) {

            /* ---------- RUMUS ---------- */
            .rumus-box {
                width: 100% !important;
                max-width: 100% !important;
                overflow-x: auto;
                font-size: 16px;
                padding: 12px;
            }

            .rumus-box span {
                white-space: nowrap;
            }

            /* ---------- GAMBAR ---------- */
            .img-fluid,
            .zoomable,
            .img-grid img,
            figure img {
                width: 100% !important;
                max-width: 100% !important;
                height: auto !important;
                display: block;
                margin: 0 auto;
            }

            /* gambar dalam materi */
            .text-center img {
                max-width: 100% !important;
            }

            /* ---------- GRID GAMBAR ---------- */
            .img-grid {
                grid-template-columns: 1fr !important;
            }

            /* ---------- BOX LATIHAN ---------- */
            .rumus-box input {
                width: 60px !important;
            }

            /* ---------- FLEX RUMUS ---------- */
            .d-flex.align-items-center.flex-wrap.gap-4 {
                gap: 12px !important;
            }
        }

        /* ===== Petunjuk Latihan ===== */
        .petunjuk-mini-latihan {
            background: #fffdf5;
            border: 1px solid #ffe69c;
            border-radius: 12px;
            padding: 10px 12px;
            line-height: 1.6;
            margin: 10px 0 14px;
            font-size: 0.95rem;
        }

        /* ========================= */
        /* LATIHAN SOAL - COMPACT */
        /* ========================= */

        .hitung-turun {
            margin-top: 12px;
            margin-bottom: 18px;
            max-width: 900px;
        }

        .hitung-step {
            display: grid;
            grid-template-columns: 150px 1fr;
            column-gap: 18px;
            align-items: start;
            margin-bottom: 18px;
        }

        .hitung-label {
            font-weight: 700;
            color: #1f2937;
            line-height: 2.1;
            padding-top: 4px;
        }

        .hitung-content {
            min-width: 0;
        }

        .hitung-line {
            display: grid;
            grid-template-columns: 280px 28px 1fr;
            align-items: center;
            column-gap: 8px;
            margin-bottom: 8px;
            font-size: 1.08rem;
            line-height: 2.1;
        }

        .hitung-left {
            text-align: right;
            white-space: nowrap;
        }

        .hitung-eq {
            text-align: center;
            font-weight: 700;
        }

        .hitung-right {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 7px;
        }

        .input-matematika {
            vertical-align: middle;
            height: 38px;
            padding: 4px 8px;
        }

        /* Pecahan input */
        .frac-latihan {
            width: 220px;
            display: inline-flex;
            flex-direction: column;
            align-items: center;
        }

        .frac-latihan .atas {
            width: 100%;
            border-bottom: 2px solid #222;
            padding: 0 8px 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .frac-latihan .bawah {
            width: 100%;
            padding-top: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .frac-latihan input {
            width: 66px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hitung-step {
                grid-template-columns: 1fr;
                row-gap: 6px;
            }

            .hitung-label {
                padding-top: 0;
            }

            .hitung-line {
                grid-template-columns: 1fr 24px 1fr;
                font-size: 1rem;
            }

            .frac-latihan {
                width: 190px;
            }

            .frac-latihan input {
                width: 58px;
            }
        }
    </style>

    {{-- Subjudul --}}
    <h2 class="mt-2 mb-3" style="font-weight: 600;">2. Persamaan Garis Lurus yang Melalui Dua Titik</h2>

    <div class="mt-4">
        Pada bagian sebelumnya, kamu telah mempelajari cara menentukan persamaan garis
        yang melalui satu titik koordinat apabila gradiennya diketahui.
        Selanjutnya, kamu akan mempelajari cara menentukan persamaan garis yang melalui
        dua titik. Konsep ini masih berkaitan dengan materi sebelumnya, karena rumus
        persamaan garis melalui dua titik dapat diturunkan dari rumus gradien dan
        persamaan garis melalui satu titik.
    </div>

    {{-- ========================================================= --}}
    {{-- EKSPLORASI --}}
    {{-- ========================================================= --}}
    <div class="box-eksplorasi mt-5">
        <div class="title-box">
            Eksplorasi
        </div>

        <div class="mt-3">

            <p class="lh-lg mb-3">
                Misalkan suatu garis melalui dua titik <span>$(x_1, y_1)$</span> dan
                <span>$(x_2, y_2)$</span>. Kamu telah mengetahui bahwa gradien garis yang
                melalui dua titik tersebut adalah:
            </p>

            <div class="d-flex justify-content-center my-3 fs-5">
                <span>$m=\dfrac{y_2-y_1}{x_2-x_1}$</span>
            </div>

            <p class="lh-lg mb-3">
                Sekarang, substitusikan nilai $m$ tersebut ke persamaan garis melalui satu titik,
                yaitu <span>$y-y_1=m(x-x_1)$</span>.
            </p>

            <div class="d-flex justify-content-center my-3 fs-5">
                <span>$y-y_1=m(x-x_1)$</span>
            </div>

            <div class="d-flex align-items-center justify-content-center gap-3 flex-wrap my-3 fs-5">
                <span>$\Leftrightarrow$</span>
                <span>$y-y_1=\left(\dfrac{y_2-y_1}{x_2-x_1}\right)(x-x_1)$</span>
            </div>

            <p class="lh-lg mt-4 mb-3">
                Untuk memperoleh bentuk perbandingan, bagilah kedua ruas dengan
                <span>$(y_2-y_1)$</span>.
            </p>

            <div class="d-flex align-items-center justify-content-center gap-3 flex-wrap my-3 fs-5">
                <span>$\Leftrightarrow$</span>
                <span>
                    $\dfrac{y-y_1}{y_2-y_1}
                    =
                    \dfrac{(y_2-y_1)(x-x_1)}{(y_2-y_1)(x_2-x_1)}$
                </span>
            </div>

            <p class="lh-lg mt-4 mb-3">
                Karena <span>$\dfrac{y_2-y_1}{y_2-y_1}=1$</span>, maka bentuk tersebut
                dapat disederhanakan. Lengkapilah bentuk akhir persamaan garis melalui dua titik berikut.
            </p>

            {{-- INPUT BENTUK AKHIR --}}
            <div class="d-flex align-items-center justify-content-center gap-3 flex-wrap my-4 fs-5">

                <span>$\Leftrightarrow$</span>

                {{-- PECAHAN KIRI --}}
                <div class="d-inline-flex flex-column align-items-center">
                    <div class="border-bottom border-2 border-dark px-5 pb-1">
                        <span>$y-y_1$</span>
                    </div>

                    <div class="d-flex align-items-center justify-content-center gap-2 pt-2">
                        <input type="text" id="akhir1"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:80px;">

                        <span>$-$</span>

                        <input type="text" id="akhir2"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:80px;">
                    </div>
                </div>

                <span>$=$</span>

                {{-- PECAHAN KANAN --}}
                <div class="d-inline-flex flex-column align-items-center">
                    <div class="border-bottom border-2 border-dark px-5 pb-1">
                        <span>$x-x_1$</span>
                    </div>

                    <div class="d-flex align-items-center justify-content-center gap-2 pt-2">
                        <input type="text" id="akhir3"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:80px;">

                        <span>$-$</span>

                        <input type="text" id="akhir4"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:80px;">
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <button class="btn btn-palet btn-sm" onclick="cekEksplorasiDuaTitik()">
                    Cek
                </button>

                <div id="feedbackEksplorasiDuaTitik" class="mt-2"></div>
                <div id="petunjukEksplorasiDuaTitik" class="mt-2"></div>
            </div>

            <div id="kesimpulanEksplorasiDuaTitik" class="box-kesimpulan mt-3 d-none">
                <b>Kesimpulan:</b>

                <p class="mb-2 mt-2">
                    Persamaan garis yang melalui titik <span>$(x_1, y_1)$</span> dan
                    <span>$(x_2, y_2)$</span> adalah:
                </p>

                <div class="d-flex justify-content-center my-3 fs-5">
                    <span>$\dfrac{y-y_1}{y_2-y_1}=\dfrac{x-x_1}{x_2-x_1}$</span>
                </div>
            </div>

        </div>
    </div>

    <style>
        .jawaban-latihan.is-valid {
            border: 2px solid #198754 !important;
            background-color: #f0fff4 !important;
        }

        .jawaban-latihan.is-invalid {
            border: 2px solid #dc3545 !important;
            background-color: #fff5f5 !important;
        }
    </style>

    {{-- ========================================================= --}}
    {{-- MATERI KONSEP --}}
    {{-- ========================================================= --}}
    <div class="card card-materi mt-4 mb-4">
        <div class="card-body">
            <span class="badge-sub">Persamaan Garis Lurus Melalui Dua Titik</span>

            <p class="mt-3" style="line-height:1.8; text-align: justify;">
                Berdasarkan hasil eksplorasi, persamaan garis lurus yang melalui dua titik
                <span>$(x_1, y_1)$</span> dan <span>$(x_2, y_2)$</span> dapat ditentukan
                dengan membandingkan perubahan nilai koordinat <span>$y$</span> dan
                perubahan nilai koordinat <span>$x$</span>.
            </p>

            {{-- GAMBAR --}}
            <div class="text-center my-4">
                <img src="{{ asset('img/pgl/ilustrasi-dua-titik.png') }}" alt="Garis yang melalui dua titik"
                    class="img-fluid rounded zoomable" style="max-width:300px; width:100%; cursor:zoom-in;">

                <small class="text-muted d-block mt-2">
                    <strong>Gambar 4.2</strong> Garis yang melalui dua titik
                </small>
            </div>

            <p style="line-height:1.8; text-align: justify;">
                Jika sebuah garis melalui titik <span>$(x_1, y_1)$</span> dan
                <span>$(x_2, y_2)$</span>, maka persamaan garisnya dapat ditulis sebagai:
            </p>

            <div class="rumus-box mb-3 text-center mx-auto" style="width: fit-content">
                <span>$\dfrac{y-y_1}{y_2-y_1}=\dfrac{x-x_1}{x_2-x_1}$</span>
            </div>

            <p style="line-height:1.8; text-align: justify;">
                Pada rumus tersebut, <span>$(x_1, y_1)$</span> dan
                <span>$(x_2, y_2)$</span> adalah dua titik yang diketahui pada garis,
                sedangkan <span>$(x,y)$</span> menyatakan titik lain yang terletak pada
                garis tersebut.
            </p>

            <div class="box-kesimpulan mt-3">
                <b>Catatan:</b><br>
                Rumus ini digunakan apabila diketahui dua titik yang dilalui oleh garis.
                Nilai <span>$x_1$</span> dan <span>$x_2$</span> tidak boleh sama, karena
                penyebut <span>$x_2-x_1$</span> tidak boleh bernilai nol.
            </div>
        </div>
    </div>

    {{-- Contoh Soal --}}
    <div class="box-contoh mt-5 mb-4">
        <div class="card-body">
            <span class="title-box">Contoh</span>

            <p>
                Tentukan persamaan garis yang melalui titik <span>$A(1,3)$</span> dan <span>$B(5,11)$</span>.
            </p>

            <p><b>Coba lengkapi substitusi ke rumus berikut:</b></p>

            <div class="d-flex align-items-center flex-wrap gap-4 mb-3">
                <div class="frac-static">
                    <div class="top">
                        <span>$y-$</span>
                        <input type="text" id="cs_y1"
                            class="form-control form-control-sm d-inline-block text-center jawaban-contoh"
                            style="width:70px;">
                    </div>
                    <div class="bottom">
                        <input type="text" id="cs_y2"
                            class="form-control form-control-sm text-center jawaban-contoh">
                        <span>$-$</span>
                        <input type="text" id="cs_y1_bawah"
                            class="form-control form-control-sm text-center jawaban-contoh">
                    </div>
                </div>

                <span>$=$</span>

                <div class="frac-static">
                    <div class="top">
                        <span>$x-$</span>
                        <input type="text" id="cs_x1"
                            class="form-control form-control-sm d-inline-block text-center jawaban-contoh"
                            style="width:70px;">
                    </div>
                    <div class="bottom">
                        <input type="text" id="cs_x2"
                            class="form-control form-control-sm text-center jawaban-contoh">
                        <span>$-$</span>
                        <input type="text" id="cs_x1_bawah"
                            class="form-control form-control-sm text-center jawaban-contoh">
                    </div>
                </div>
            </div>

            <p class="small text-muted">
                Isi nilai $x_1$, $y_1$, $x_2$, dan $y_2$ dari titik $A(1,3)$ dan $B(5,11)$.
            </p>

            <div class="mt-3">
                <button class="btn btn-palet btn-sm" type="button" onclick="cekContohSoal1()">
                    Cek Jawaban
                </button>

                <button id="btnPembahasanContohSoal1" class="btn btn-tampil btn-sm d-none" type="button"
                    onclick="toggleSolusi('pembahasanContohSoal1')">
                    Tampilkan Penyelesaian
                </button>

                <div id="feedbackContohSoal1" class="mt-2"></div>
            </div>

            <div id="pembahasanContohSoal1" class="box-kesimpulan mt-3 d-none">
                <b>Pembahasan:</b>

                <p class="mt-2 mb-2">
                    Dari titik <span>$A(1,3)$</span> dan <span>$B(5,11)$</span>, diperoleh:
                </p>

                <div class="rumus-box mb-3" style="width: fit-content;">
                    <span>$x_1=1,\quad y_1=3,\quad x_2=5,\quad y_2=11$</span>
                </div>

                <p class="mb-2">
                    Gunakan rumus persamaan garis melalui dua titik:
                </p>

                <div class="rumus-box mb-3" style="width: fit-content;">
                    <span>$\dfrac{y-y_1}{y_2-y_1}=\dfrac{x-x_1}{x_2-x_1}$</span>
                </div>

                <p class="mb-2">
                    Substitusikan nilai yang diketahui:
                </p>

                <div class="rumus-box mb-3" style="width: fit-content;">
                    <span>$\dfrac{y-3}{11-3}=\dfrac{x-1}{5-1}$</span>
                </div>

                <p class="mb-2">
                    Sederhanakan penyebutnya:
                </p>

                <div class="rumus-box mb-3" style="width: fit-content;">
                    <span>$\dfrac{y-3}{8}=\dfrac{x-1}{4}$</span>
                </div>

                <p class="mb-2">
                    Lakukan kali silang:
                </p>

                <div class="rumus-box mb-3" style="width: fit-content;">
                    <span>$4(y-3)=8(x-1)$</span>
                </div>

                <p class="mb-2">
                    Uraikan kedua ruas:
                </p>

                <div class="rumus-box mb-3" style="width: fit-content;">
                    <span>$4y-12=8x-8$</span>
                </div>

                <p class="mb-2">
                    Selesaikan hingga diperoleh:
                </p>

                <div class="rumus-box mb-3" style="width: fit-content;">
                    <span>$4y=8x+4$</span>
                </div>

                <div class="rumus-box mb-3" style="width: fit-content;">
                    <span>$y=2x+1$</span>
                </div>

                <div class="alert alert-success mb-0" style="border-radius:14px;">
                    Jadi, persamaan garis yang melalui titik <span>$A(1,3)$</span> dan
                    <span>$B(5,11)$</span> adalah <b>$y=2x+1$</b>.
                </div>
            </div>
        </div>
    </div>

    <script>
        const MATERI_ID = @json($materi->id);
        const MATERI_SLUG = @json($materi->slug);
        const IS_MATERI_COMPLETED = @json((bool) ($materialProgress->is_completed ?? false));
        const SAVED_LATIHAN = @json($latihanProgress ?? []);
        const LATIHAN_PROGRESS_URL = @json(route('latihan.progress.store', $materi->id));
    </script>

    {{-- Latihan --}}
    <div class="box-latihan mt-5 mb-4" id="latihanD2Box">
        <div class="card-body">
            <span class="title-box">Latihan Soal</span>

            {{-- ===================== --}}
            {{-- LATIHAN 1 --}}
            {{-- ===================== --}}
            <div class="latihan-step" id="latihanStep1">

                <p class="mt-3">
                    <b>1.</b> Pada hari pertama, tinggi sebuah tanaman adalah <span>$4$</span> cm.
                    Setelah <span>$3$</span> hari, tinggi tanaman itu menjadi <span>$10$</span> cm.
                    Jika pertumbuhan tinggi tanaman dianggap membentuk garis lurus, tentukan persamaan garis
                    yang menyatakan hubungan antara banyak hari <span>$x$</span> dan tinggi tanaman <span>$y$</span>.
                </p>

                <p class="mb-2"><b>Penyelesaian:</b></p>

                <div class="hitung-turun">

                    {{-- Diketahui --}}
                    <div class="hitung-step">
                        <div class="hitung-label">Diketahui:</div>

                        <div class="hitung-content">
                            <div class="hitung-line">
                                <div class="hitung-left">Titik 1</div>
                                <div class="hitung-eq">$=$</div>
                                <div class="hitung-right">
                                    <span>$($</span>
                                    <input type="text" id="lat_x1"
                                        class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                        style="width:70px;">
                                    <span>$,$</span>
                                    <input type="text" id="lat_y1"
                                        class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                        style="width:70px;">
                                    <span>$)$</span>
                                </div>
                            </div>

                            <div class="hitung-line">
                                <div class="hitung-left">Titik 2</div>
                                <div class="hitung-eq">$=$</div>
                                <div class="hitung-right">
                                    <span>$($</span>
                                    <input type="text" id="lat_x2"
                                        class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                        style="width:70px;">
                                    <span>$,$</span>
                                    <input type="text" id="lat_y2"
                                        class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                        style="width:70px;">
                                    <span>$)$</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Rumus --}}
                    <div class="hitung-step">
                        <div class="hitung-label">Rumus:</div>

                        <div class="hitung-content">
                            <div class="hitung-line">
                                <div class="hitung-left">
                                    $\dfrac{y-y_1}{y_2-y_1}$
                                </div>
                                <div class="hitung-eq">$=$</div>
                                <div class="hitung-right">
                                    $\dfrac{x-x_1}{x_2-x_1}$
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Substitusi --}}
                    <div class="hitung-step">
                        <div class="hitung-label">Substitusi:</div>

                        <div class="hitung-content">
                            <div class="hitung-line">
                                <div class="hitung-left">
                                    <div class="frac-latihan">
                                        <div class="atas">
                                            <span>$y-$</span>
                                            <input type="text" id="lat_sub1"
                                                class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                        </div>
                                        <div class="bawah">
                                            <input type="text" id="lat_sub2"
                                                class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                            <span>$-$</span>
                                            <input type="text" id="lat_sub3"
                                                class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                        </div>
                                    </div>
                                </div>

                                <div class="hitung-eq">$=$</div>

                                <div class="hitung-right">
                                    <div class="frac-latihan">
                                        <div class="atas">
                                            <span>$x-$</span>
                                            <input type="text" id="lat_sub4"
                                                class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                        </div>
                                        <div class="bawah">
                                            <input type="text" id="lat_sub5"
                                                class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                            <span>$-$</span>
                                            <input type="text" id="lat_sub6"
                                                class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Penyederhanaan --}}
                    <div class="hitung-step">
                        <div class="hitung-label">Penyederhanaan:</div>

                        <div class="hitung-content">
                            <div class="hitung-line">
                                <div class="hitung-left">$\dfrac{y-4}{6}$</div>
                                <div class="hitung-eq">$=$</div>
                                <div class="hitung-right">$\dfrac{x-1}{3}$</div>
                            </div>
                        </div>
                    </div>

                    {{-- Kali silang --}}
                    <div class="hitung-step">
                        <div class="hitung-label">Kali silang:</div>

                        <div class="hitung-content">
                            <div class="hitung-line">
                                <div class="hitung-left">
                                    <input type="text" id="lat_kali1"
                                        class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                        style="width:70px;">
                                    <span>$(y-$</span>
                                    <input type="text" id="lat_kali2"
                                        class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                        style="width:70px;">
                                    <span>$)$</span>
                                </div>

                                <div class="hitung-eq">$=$</div>

                                <div class="hitung-right">
                                    <input type="text" id="lat_kali3"
                                        class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                        style="width:70px;">
                                    <span>$(x-$</span>
                                    <input type="text" id="lat_kali4"
                                        class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                        style="width:70px;">
                                    <span>$)$</span>
                                </div>
                            </div>

                            <div class="hitung-line">
                                <div class="hitung-left">$3y-12$</div>
                                <div class="hitung-eq">$=$</div>
                                <div class="hitung-right">$6x-6$</div>
                            </div>

                            <div class="hitung-line">
                                <div class="hitung-left">$3y$</div>
                                <div class="hitung-eq">$=$</div>
                                <div class="hitung-right">$6x+6$</div>
                            </div>
                        </div>
                    </div>

                    {{-- Bentuk akhir --}}
                    <div class="hitung-step">
                        <div class="hitung-label">Bentuk akhir:</div>

                        <div class="hitung-content">
                            <div class="hitung-line">
                                <div class="hitung-left">$y$</div>
                                <div class="hitung-eq">$=$</div>
                                <div class="hitung-right">
                                    <input type="text" id="lat_akhir"
                                        class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                        style="width:100px;">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div>
                        <button class="btn btn-palet btn-sm" type="button" onclick="cekLatihan1()">
                            Cek Jawaban
                        </button>

                        <button class="btn btn-palet btn-sm" type="button" onclick="resetLatihan1()">
                            Reset
                        </button>
                    </div>

                    <button id="nextBtnLatihan1" class="btn btn-palet btn-sm" type="button" onclick="nextLatihan(2)"
                        disabled>
                        Lanjut ke Latihan 2
                    </button>
                </div>

                <div id="feedbackLatihan1" class="mt-2"></div>
                <div id="petunjukLatihan1" class="mt-2"></div>

            </div>

            {{-- ===================== --}}
            {{-- LATIHAN 2 --}}
            {{-- ===================== --}}
            <div class="latihan-step" id="latihanStep2" style="display:none;">
                <hr class="my-4">

                <p class="mt-3">
                    <b>2.</b> Perhatikan gambar persegi panjang berikut. Tentukan persamaan garis yang melalui titik
                    <span>$A$</span> dan <span>$C$</span>.
                </p>

                <div class="text-center mb-3">
                    <img src="{{ asset('img/pgl/pgl2latsol2.png') }}" alt="Gambar titik A dan C"
                        class="img-fluid rounded" style="max-width: 300px;">
                </div>

                <p class="mb-2"><b>Penyelesaian:</b></p>

                <div class="hitung-turun">

                    {{-- Rumus --}}
                    <div class="hitung-step">
                        <div class="hitung-label">Rumus:</div>

                        <div class="hitung-content">
                            <div class="hitung-line">
                                <div class="hitung-left">
                                    $\dfrac{y-y_1}{y_2-y_1}$
                                </div>
                                <div class="hitung-eq">$=$</div>
                                <div class="hitung-right">
                                    $\dfrac{x-x_1}{x_2-x_1}$
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Substitusi --}}
                    <div class="hitung-step">
                        <div class="hitung-label">Substitusi:</div>

                        <div class="hitung-content">
                            <div class="hitung-line">
                                <div class="hitung-left">
                                    <div class="frac-latihan">
                                        <div class="atas">
                                            <span>$y-$</span>
                                            <input type="text" id="lat2_sub1"
                                                class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                        </div>
                                        <div class="bawah">
                                            <input type="text" id="lat2_sub2"
                                                class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                            <span>$-$</span>
                                            <input type="text" id="lat2_sub3"
                                                class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                        </div>
                                    </div>
                                </div>

                                <div class="hitung-eq">$=$</div>

                                <div class="hitung-right">
                                    <div class="frac-latihan">
                                        <div class="atas">
                                            <span>$x-$</span>
                                            <input type="text" id="lat2_sub4"
                                                class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                        </div>
                                        <div class="bawah">
                                            <input type="text" id="lat2_sub5"
                                                class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                            <span>$-$</span>
                                            <input type="text" id="lat2_sub6"
                                                class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Penyederhanaan --}}
                    <div class="hitung-step">
                        <div class="hitung-label">Penyederhanaan:</div>

                        <div class="hitung-content">
                            <div class="hitung-line">
                                <div class="hitung-left">
                                    $\dfrac{y-5}{-4}$
                                </div>
                                <div class="hitung-eq">$=$</div>
                                <div class="hitung-right">
                                    $\dfrac{x-2}{4}$
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Kali silang --}}
                    <div class="hitung-step">
                        <div class="hitung-label">Kali silang:</div>

                        <div class="hitung-content">
                            <div class="hitung-line">
                                <div class="hitung-left">
                                    <input type="text" id="lat2_kali1"
                                        class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                        style="width:70px;">
                                    <span>$(y-$</span>
                                    <input type="text" id="lat2_kali2"
                                        class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                        style="width:70px;">
                                    <span>$)$</span>
                                </div>

                                <div class="hitung-eq">$=$</div>

                                <div class="hitung-right">
                                    <input type="text" id="lat2_kali3"
                                        class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                        style="width:70px;">
                                    <span>$(x-$</span>
                                    <input type="text" id="lat2_kali4"
                                        class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                        style="width:70px;">
                                    <span>$)$</span>
                                </div>
                            </div>

                            <div class="hitung-line">
                                <div class="hitung-left">$4y-20$</div>
                                <div class="hitung-eq">$=$</div>
                                <div class="hitung-right">$-4x+8$</div>
                            </div>

                            <div class="hitung-line">
                                <div class="hitung-left">$4y$</div>
                                <div class="hitung-eq">$=$</div>
                                <div class="hitung-right">$-4x+28$</div>
                            </div>
                        </div>
                    </div>

                    {{-- Bentuk akhir --}}
                    <div class="hitung-step">
                        <div class="hitung-label">Bentuk akhir:</div>

                        <div class="hitung-content">
                            <div class="hitung-line">
                                <div class="hitung-left">$y$</div>
                                <div class="hitung-eq">$=$</div>
                                <div class="hitung-right">
                                    <input type="text" id="lat2_akhir"
                                        class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                        style="width:180px;">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <button class="btn btn-palet btn-sm" type="button" onclick="prevLatihan(1)">
                        Kembali ke Latihan 1
                    </button>

                    <div>
                        <button class="btn btn-palet btn-sm" type="button" onclick="cekLatihan2()">
                            Cek Jawaban
                        </button>

                        <button class="btn btn-palet btn-sm" type="button" onclick="resetLatihan2()">
                            Reset
                        </button>
                    </div>

                    <button id="nextBtnLatihan2" class="btn btn-palet btn-sm" type="button" onclick="nextLatihan(3)"
                        disabled>
                        Lanjut ke Latihan 3
                    </button>
                </div>

                <div id="feedbackLatihan2" class="mt-2"></div>
                <div id="petunjukLatihan2" class="mt-2"></div>
            </div>

            {{-- ===================== --}}
            {{-- LATIHAN 3 --}}
            {{-- ===================== --}}
            <div class="latihan-step" id="latihanStep3" style="display:none;">
                <hr class="my-4">

                <p class="mt-3">
                    <b>3.</b> Seorang siswa mengamati hubungan antara banyak buku tulis yang dibeli dan jumlah uang yang
                    harus dibayar. Data tersebut dinyatakan pada dua titik, yaitu <span>$A(1,5)$</span> dan
                    <span>$B(5,13)$</span>. Jika hubungan itu membentuk garis lurus, tentukan jumlah uang yang
                    harus dibayar saat membeli <span>$3$</span> buku tulis.
                </p>

                <p class="mb-2"><b>Penyelesaian:</b></p>

                <div class="hitung-turun">

                    {{-- Rumus --}}
                    <div class="hitung-step">
                        <div class="hitung-label">Rumus:</div>

                        <div class="hitung-content">
                            <div class="hitung-line">
                                <div class="hitung-left">
                                    $\dfrac{y-y_1}{y_2-y_1}$
                                </div>
                                <div class="hitung-eq">$=$</div>
                                <div class="hitung-right">
                                    $\dfrac{x-x_1}{x_2-x_1}$
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Substitusi --}}
                    <div class="hitung-step">
                        <div class="hitung-label">Substitusi:</div>

                        <div class="hitung-content">
                            <div class="hitung-line">
                                <div class="hitung-left">
                                    <div class="frac-latihan">
                                        <div class="atas">
                                            <span>$y-$</span>
                                            <input type="text" id="lat3_sub1"
                                                class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                        </div>
                                        <div class="bawah">
                                            <input type="text" id="lat3_sub2"
                                                class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                            <span>$-$</span>
                                            <input type="text" id="lat3_sub3"
                                                class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                        </div>
                                    </div>
                                </div>

                                <div class="hitung-eq">$=$</div>

                                <div class="hitung-right">
                                    <div class="frac-latihan">
                                        <div class="atas">
                                            <span>$x-$</span>
                                            <input type="text" id="lat3_sub4"
                                                class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                        </div>
                                        <div class="bawah">
                                            <input type="text" id="lat3_sub5"
                                                class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                            <span>$-$</span>
                                            <input type="text" id="lat3_sub6"
                                                class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Penyederhanaan --}}
                    <div class="hitung-step">
                        <div class="hitung-label">Penyederhanaan:</div>

                        <div class="hitung-content">
                            <div class="hitung-line">
                                <div class="hitung-left">
                                    $\dfrac{y-5}{8}$
                                </div>
                                <div class="hitung-eq">$=$</div>
                                <div class="hitung-right">
                                    $\dfrac{x-1}{4}$
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Kali silang --}}
                    <div class="hitung-step">
                        <div class="hitung-label">Kali silang:</div>

                        <div class="hitung-content">
                            <div class="hitung-line">
                                <div class="hitung-left">
                                    <input type="text" id="lat3_kali1"
                                        class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                        style="width:70px;">
                                    <span>$(y-$</span>
                                    <input type="text" id="lat3_kali2"
                                        class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                        style="width:70px;">
                                    <span>$)$</span>
                                </div>

                                <div class="hitung-eq">$=$</div>

                                <div class="hitung-right">
                                    <input type="text" id="lat3_kali3"
                                        class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                        style="width:70px;">
                                    <span>$(x-$</span>
                                    <input type="text" id="lat3_kali4"
                                        class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                        style="width:70px;">
                                    <span>$)$</span>
                                </div>
                            </div>

                            <div class="hitung-line">
                                <div class="hitung-left">$4y-20$</div>
                                <div class="hitung-eq">$=$</div>
                                <div class="hitung-right">$8x-8$</div>
                            </div>

                            <div class="hitung-line">
                                <div class="hitung-left">$4y$</div>
                                <div class="hitung-eq">$=$</div>
                                <div class="hitung-right">$8x+12$</div>
                            </div>
                        </div>
                    </div>

                    {{-- Persamaan garis --}}
                    <div class="hitung-step">
                        <div class="hitung-label">Persamaan:</div>

                        <div class="hitung-content">
                            <div class="hitung-line">
                                <div class="hitung-left">$y$</div>
                                <div class="hitung-eq">$=$</div>
                                <div class="hitung-right">
                                    <input type="text" id="lat3_persamaan"
                                        class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                        style="width:180px;">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Substitusi x = 3 --}}
                    <div class="hitung-step">
                        <div class="hitung-label">$x=3$:</div>

                        <div class="hitung-content">
                            <div class="hitung-line">
                                <div class="hitung-left">$y$</div>
                                <div class="hitung-eq">$=$</div>
                                <div class="hitung-right">
                                    <input type="text" id="lat3_y"
                                        class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                        style="width:100px;">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <button class="btn btn-palet btn-sm" type="button" onclick="prevLatihan(2)">
                        Kembali ke Latihan 2
                    </button>

                    <div>
                        <button class="btn btn-palet btn-sm" type="button" onclick="cekLatihan3()">
                            Cek Jawaban
                        </button>

                        <button class="btn btn-palet btn-sm" type="button" onclick="resetLatihan3()">
                            Reset
                        </button>
                    </div>
                </div>

                <div id="feedbackLatihan3" class="mt-2"></div>
                <div id="petunjukLatihan3" class="mt-2"></div>
                <div id="pesanAkhirLatihan" class="mt-3"></div>
            </div>
        </div>
    </div>

    <script src="https://www.geogebra.org/apps/deployggb.js"></script>
    <script>
        // Eksplorasi
        function normalisasi(teks) {
            return (teks || "").toLowerCase().replace(/\s+/g, "").replace(/[()]/g, "");
        }

        function cekInput(id, daftarJawaban) {
            const input = document.getElementById(id);
            const nilai = normalisasi(input.value);
            const benar = daftarJawaban.some((j) => normalisasi(j) === nilai);

            input.classList.remove("is-valid", "is-invalid");
            input.classList.add(benar ? "is-valid" : "is-invalid");

            return benar;
        }

        function renderKatexById(id) {
            const el = document.getElementById(id);
            if (el && window.renderMathInElement) {
                renderMathInElement(el, {
                    delimiters: [{
                            left: "$$",
                            right: "$$",
                            display: true
                        },
                        {
                            left: "$",
                            right: "$",
                            display: false
                        },
                    ],
                    throwOnError: false,
                });
            }
        }

        function tampilkanPetunjukEksplorasi(pesan) {
            const el = document.getElementById("petunjukEksplorasiDuaTitik");
            if (!el) return;

            el.innerHTML =
                '<div class="alert alert-info py-2 mb-0">' + pesan + "</div>";

            renderKatexById("petunjukEksplorasiDuaTitik");
        }

        function cekEksplorasiDuaTitik() {
            const benarAkhir1 = cekInput("akhir1", ["y2", "y_2"]);
            const benarAkhir2 = cekInput("akhir2", ["y1", "y_1"]);
            const benarAkhir3 = cekInput("akhir3", ["x2", "x_2"]);
            const benarAkhir4 = cekInput("akhir4", ["x1", "x_1"]);

            const semuaBenar =
                benarAkhir1 &&
                benarAkhir2 &&
                benarAkhir3 &&
                benarAkhir4;

            const feedback = document.getElementById("feedbackEksplorasiDuaTitik");
            const petunjuk = document.getElementById("petunjukEksplorasiDuaTitik");
            const kesimpulan = document.getElementById("kesimpulanEksplorasiDuaTitik");

            if (semuaBenar) {
                feedback.innerHTML =
                    '<div class="alert alert-success py-2 mb-0">Bagus, semua jawabanmu benar. Sekarang kamu sudah menemukan bentuk persamaan garis melalui dua titik.</div>';

                if (petunjuk) petunjuk.innerHTML = "";
                if (kesimpulan) kesimpulan.classList.remove("d-none");

                renderKatexById("feedbackEksplorasiDuaTitik");
                renderKatexById("kesimpulanEksplorasiDuaTitik");
                return;
            }

            feedback.innerHTML =
                '<div class="alert alert-warning py-2 mb-0">Masih ada jawaban yang belum tepat. Coba periksa kembali bentuk akhir persamaan garis melalui dua titik.</div>';

            if (kesimpulan) kesimpulan.classList.add("d-none");

            renderKatexById("feedbackEksplorasiDuaTitik");

            if (!benarAkhir1 || !benarAkhir2) {
                tampilkanPetunjukEksplorasi(
                    "Petunjuk: penyebut pada ruas kiri berasal dari selisih nilai $y$, yaitu <b>$y_2-y_1$</b>."
                );
                return;
            }

            if (!benarAkhir3 || !benarAkhir4) {
                tampilkanPetunjukEksplorasi(
                    "Petunjuk: penyebut pada ruas kanan berasal dari selisih nilai $x$, yaitu <b>$x_2-x_1$</b>."
                );
            }
        }

        // =========================
        // CONTOH SOAL
        // Hanya cek substitusi x1, y1, x2, y2
        // =========================
        function normContoh(teks) {
            return String(teks || "")
                .trim()
                .toLowerCase()
                .replace(/\s+/g, "")
                .replace(/[()]/g, "")
                .replace(/−/g, "-");
        }

        function cekIsianContoh(id, jawabanBenar) {
            const el = document.getElementById(id);
            if (!el) return false;

            const nilai = normContoh(el.value);
            const daftar = Array.isArray(jawabanBenar) ? jawabanBenar : [jawabanBenar];
            const cocok = daftar.map(normContoh).includes(nilai);

            el.classList.remove("is-valid", "is-invalid");
            el.classList.add(cocok ? "is-valid" : "is-invalid");

            return cocok;
        }

        function isiFeedbackContoh(idElemen, tipe, pesan) {
            const el = document.getElementById(idElemen);
            if (!el) return;

            const kelas =
                tipe === "success" ?
                "alert-success" :
                tipe === "warning" ?
                "alert-warning" :
                "alert-info";

            el.innerHTML = `
        <div class="alert ${kelas} py-2 mb-0">
            ${pesan}
        </div>
    `;

            renderMathSafe(el);
        }

        function cekContohSoal1() {
            const benarY1Atas = cekIsianContoh("cs_y1", ["3"]);
            const benarY2 = cekIsianContoh("cs_y2", ["11"]);
            const benarY1Bawah = cekIsianContoh("cs_y1_bawah", ["3"]);

            const benarX1Atas = cekIsianContoh("cs_x1", ["1"]);
            const benarX2 = cekIsianContoh("cs_x2", ["5"]);
            const benarX1Bawah = cekIsianContoh("cs_x1_bawah", ["1"]);

            const semuaBenar =
                benarY1Atas &&
                benarY2 &&
                benarY1Bawah &&
                benarX1Atas &&
                benarX2 &&
                benarX1Bawah;

            const pembahasan = document.getElementById("pembahasanContohSoal1");
            const btnPembahasan = document.getElementById("btnPembahasanContohSoal1");

            // Setelah siswa mencoba 1 kali, tombol pembahasan muncul
            if (btnPembahasan) {
                btnPembahasan.classList.remove("d-none");
            }

            // Pembahasan tetap disembunyikan dulu sampai tombol diklik
            if (pembahasan) {
                pembahasan.classList.add("d-none");
            }

            if (semuaBenar) {
                isiFeedbackContoh(
                    "feedbackContohSoal1",
                    "success",
                    "Benar. Nilai titik sudah tepat disubstitusikan ke rumus persamaan garis melalui dua titik. Kamu dapat menekan tombol Tampilkan Penyelesaian untuk melihat langkah lengkapnya."
                );

                return;
            }

            isiFeedbackContoh(
                "feedbackContohSoal1",
                "warning",
                "Masih ada nilai yang belum tepat. Perhatikan kembali urutan titik pertama sebagai $(x_1,y_1)$ dan titik kedua sebagai $(x_2,y_2)$."
            );
        }

        function toggleSolusi(id) {
            const el = document.getElementById(id);
            if (!el) return;

            el.classList.toggle("d-none");
            renderMathSafe(el);
        }

        // =========================
        // LATIHAN SOAL SUBBAB D2
        // Sistem turun ke bawah
        // =========================

        // =========================
        // Helper umum
        // =========================
        function normJawaban(teks) {
            return String(teks || "")
                .trim()
                .toLowerCase()
                .replace(/\s+/g, "")
                .replace(/[()]/g, "")
                .replace(/−/g, "-");
        }

        function renderMathSafe(target) {
            if (!window.renderMathInElement || !target) return;

            renderMathInElement(target, {
                delimiters: [{
                        left: "$$",
                        right: "$$",
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
                    },
                    {
                        left: "\\[",
                        right: "\\]",
                        display: true
                    },
                ],
                throwOnError: false,
            });
        }

        document.addEventListener("DOMContentLoaded", function() {
            renderMathSafe(document.getElementById("latihanD2Box") || document.body);
            restoreProgressD2();
        });

        // =========================
        // Navigasi latihan
        // =========================
        function scrollKeStep(stepId) {
            const content = document.querySelector(".content-wrapper");
            const step = document.getElementById(stepId);

            if (!step) return;

            if (!content) {
                step.scrollIntoView({
                    behavior: "smooth",
                    block: "start",
                });
                return;
            }

            const contentRect = content.getBoundingClientRect();
            const stepRect = step.getBoundingClientRect();
            const targetTop = content.scrollTop + (stepRect.top - contentRect.top) - 20;

            content.scrollTo({
                top: targetTop,
                behavior: "smooth",
            });
        }

        function nextLatihan(stepNumber) {
            const step = document.getElementById(`latihanStep${stepNumber}`);
            if (!step) return;

            step.style.display = "block";
            renderMathSafe(step);
            scrollKeStep(`latihanStep${stepNumber}`);
        }

        function prevLatihan(stepNumber) {
            scrollKeStep(`latihanStep${stepNumber}`);
        }

        function resetStepSetelah(stepMulai) {
            for (let i = stepMulai; i <= 3; i++) {
                const step = document.getElementById(`latihanStep${i}`);
                if (step) step.style.display = "none";
            }
        }

        // =========================
        // Save progress
        // =========================

        // =========================
        // SAVE LATIHAN PROGRESS D2
        // =========================
        async function simpanProgressLatihan(latihanKey, tipe, jawaban, isCorrect) {
            const csrfToken = document
                .querySelector('meta[name="csrf-token"]')
                ?.getAttribute("content");

            if (!LATIHAN_PROGRESS_URL || !csrfToken) {
                console.error("URL atau CSRF kosong.", {
                    LATIHAN_PROGRESS_URL,
                    csrfToken,
                });
                return false;
            }

            try {
                const response = await fetch(LATIHAN_PROGRESS_URL, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": csrfToken,
                        "X-Requested-With": "XMLHttpRequest",
                        Accept: "application/json",
                    },
                    body: JSON.stringify({
                        latihan_key: latihanKey,
                        tipe: tipe,
                        jawaban: jawaban,
                        is_correct: isCorrect,
                    }),
                });

                const data = await response.json();
                console.log("Simpan latihan D2:", data);

                return response.ok;
            } catch (error) {
                console.error("Gagal menyimpan latihan D2:", error);
                return false;
            }
        }

        function ambilJawabanLatihan1D2() {
            return {
                lat_x1: document.getElementById("lat_x1")?.value.trim() ?? "",
                lat_y1: document.getElementById("lat_y1")?.value.trim() ?? "",
                lat_x2: document.getElementById("lat_x2")?.value.trim() ?? "",
                lat_y2: document.getElementById("lat_y2")?.value.trim() ?? "",

                lat_sub1: document.getElementById("lat_sub1")?.value.trim() ?? "",
                lat_sub2: document.getElementById("lat_sub2")?.value.trim() ?? "",
                lat_sub3: document.getElementById("lat_sub3")?.value.trim() ?? "",
                lat_sub4: document.getElementById("lat_sub4")?.value.trim() ?? "",
                lat_sub5: document.getElementById("lat_sub5")?.value.trim() ?? "",
                lat_sub6: document.getElementById("lat_sub6")?.value.trim() ?? "",

                lat_kali1: document.getElementById("lat_kali1")?.value.trim() ?? "",
                lat_kali2: document.getElementById("lat_kali2")?.value.trim() ?? "",
                lat_kali3: document.getElementById("lat_kali3")?.value.trim() ?? "",
                lat_kali4: document.getElementById("lat_kali4")?.value.trim() ?? "",

                lat_akhir: document.getElementById("lat_akhir")?.value.trim() ?? "",
            };
        }

        function ambilJawabanLatihan2D2() {
            return {
                lat2_sub1: document.getElementById("lat2_sub1")?.value.trim() ?? "",
                lat2_sub2: document.getElementById("lat2_sub2")?.value.trim() ?? "",
                lat2_sub3: document.getElementById("lat2_sub3")?.value.trim() ?? "",
                lat2_sub4: document.getElementById("lat2_sub4")?.value.trim() ?? "",
                lat2_sub5: document.getElementById("lat2_sub5")?.value.trim() ?? "",
                lat2_sub6: document.getElementById("lat2_sub6")?.value.trim() ?? "",

                lat2_kali1: document.getElementById("lat2_kali1")?.value.trim() ?? "",
                lat2_kali2: document.getElementById("lat2_kali2")?.value.trim() ?? "",
                lat2_kali3: document.getElementById("lat2_kali3")?.value.trim() ?? "",
                lat2_kali4: document.getElementById("lat2_kali4")?.value.trim() ?? "",

                lat2_akhir: document.getElementById("lat2_akhir")?.value.trim() ?? "",
            };
        }

        function ambilJawabanLatihan3D2() {
            return {
                lat3_sub1: document.getElementById("lat3_sub1")?.value.trim() ?? "",
                lat3_sub2: document.getElementById("lat3_sub2")?.value.trim() ?? "",
                lat3_sub3: document.getElementById("lat3_sub3")?.value.trim() ?? "",
                lat3_sub4: document.getElementById("lat3_sub4")?.value.trim() ?? "",
                lat3_sub5: document.getElementById("lat3_sub5")?.value.trim() ?? "",
                lat3_sub6: document.getElementById("lat3_sub6")?.value.trim() ?? "",

                lat3_kali1: document.getElementById("lat3_kali1")?.value.trim() ?? "",
                lat3_kali2: document.getElementById("lat3_kali2")?.value.trim() ?? "",
                lat3_kali3: document.getElementById("lat3_kali3")?.value.trim() ?? "",
                lat3_kali4: document.getElementById("lat3_kali4")?.value.trim() ?? "",

                lat3_persamaan: document.getElementById("lat3_persamaan")?.value.trim() ?? "",
                lat3_y: document.getElementById("lat3_y")?.value.trim() ?? "",
            };
        }

        async function saveProgressMateri() {
            const csrfToken = document
                .querySelector('meta[name="csrf-token"]')
                ?.getAttribute("content");

            if (!window.completeMateriUrl || !csrfToken) return false;

            try {
                const response = await fetch(window.completeMateriUrl, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": csrfToken,
                        "X-Requested-With": "XMLHttpRequest",
                        Accept: "application/json",
                    },
                    body: JSON.stringify({}),
                });

                return response.ok;
            } catch (error) {
                console.error(error);
                return false;
            }
        }

        function bukaNextButton() {
            const nextBtn = document.getElementById("nextMateriBtn");
            if (!nextBtn) return;

            const url = nextBtn.dataset.nextUrl;
            if (!url) return;

            const link = document.createElement("a");
            link.href = url;
            link.id = "nextMateriBtn";
            link.className = "btn btn-next px-4 rounded-pill fw-semibold";
            link.textContent = "Next →";

            nextBtn.replaceWith(link);
        }

        // =========================
        // Validasi umum
        // =========================
        function cekIsian(id, jawabanBenar) {
            const el = document.getElementById(id);
            if (!el) return false;

            const nilai = normJawaban(el.value);
            const daftar = Array.isArray(jawabanBenar) ? jawabanBenar : [jawabanBenar];
            const cocok = daftar.map(normJawaban).includes(nilai);

            el.classList.remove("is-valid", "is-invalid");
            el.classList.add(cocok ? "is-valid" : "is-invalid");

            return cocok;
        }

        function resetInput(ids) {
            ids.forEach((id) => {
                const el = document.getElementById(id);

                if (el) {
                    el.value = "";
                    el.classList.remove("is-valid", "is-invalid");
                }
            });
        }

        function tampilkanPetunjuk(idElemen, pesan) {
            const el = document.getElementById(idElemen);
            if (!el) return;

            el.innerHTML = `
        <div class="alert alert-info py-2 mb-0">
            ${pesan}
        </div>
    `;

            renderMathSafe(el);
        }

        function kosongkanPetunjuk(idElemen) {
            const el = document.getElementById(idElemen);
            if (el) el.innerHTML = "";
        }

        function isiFeedback(idElemen, tipe, pesan) {
            const el = document.getElementById(idElemen);
            if (!el) return;

            const kelas = tipe === "success" ? "alert-success" : "alert-warning";

            el.innerHTML = `
        <div class="alert ${kelas} py-2 mb-0">
            ${pesan}
        </div>
    `;

            renderMathSafe(el);
        }

        // =========================
        // Latihan 1
        // =========================
        async function cekLatihan1() {
            const benarTitik1x = cekIsian("lat_x1", ["1"]);
            const benarTitik1y = cekIsian("lat_y1", ["4"]);
            const benarTitik2x = cekIsian("lat_x2", ["4"]);
            const benarTitik2y = cekIsian("lat_y2", ["10"]);

            const benarSub1 = cekIsian("lat_sub1", ["4"]);
            const benarSub2 = cekIsian("lat_sub2", ["10"]);
            const benarSub3 = cekIsian("lat_sub3", ["4"]);
            const benarSub4 = cekIsian("lat_sub4", ["1"]);
            const benarSub5 = cekIsian("lat_sub5", ["4"]);
            const benarSub6 = cekIsian("lat_sub6", ["1"]);

            const benarKali1 = cekIsian("lat_kali1", ["3"]);
            const benarKali2 = cekIsian("lat_kali2", ["4"]);
            const benarKali3 = cekIsian("lat_kali3", ["6"]);
            const benarKali4 = cekIsian("lat_kali4", ["1"]);

            const benarAkhir = cekIsian("lat_akhir", ["2x+2", "2x + 2"]);

            const semuaBenar =
                benarTitik1x &&
                benarTitik1y &&
                benarTitik2x &&
                benarTitik2y &&
                benarSub1 &&
                benarSub2 &&
                benarSub3 &&
                benarSub4 &&
                benarSub5 &&
                benarSub6 &&
                benarKali1 &&
                benarKali2 &&
                benarKali3 &&
                benarKali4 &&
                benarAkhir;

            const nextBtn = document.getElementById("nextBtnLatihan1");

            if (semuaBenar) {
                isiFeedback(
                    "feedbackLatihan1",
                    "success",
                    "Bagus, jawabanmu sudah benar. Persamaan garisnya adalah $y = 2x + 2$. Silakan lanjut ke soal berikutnya.",
                );

                kosongkanPetunjuk("petunjukLatihan1");

                if (nextBtn) nextBtn.disabled = false;

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L1`,
                    "input",
                    ambilJawabanLatihan1D2(),
                    true
                );

                return;
            }

            isiFeedback(
                "feedbackLatihan1",
                "warning",
                "Masih ada jawaban yang belum tepat. Coba periksa kembali jawabanmu.",
            );

            if (nextBtn) nextBtn.disabled = true;
            resetStepSetelah(2);

            if (!benarTitik1x || !benarTitik1y || !benarTitik2x || !benarTitik2y) {
                tampilkanPetunjuk(
                    "petunjukLatihan1",
                    "Petunjuk: hari pertama berarti $x = 1$. Setelah $3$ hari dari hari pertama berarti hari ke-$4$, sehingga titik keduanya adalah $(4,10)$.",
                );
                return;
            }

            if (
                !benarSub1 ||
                !benarSub2 ||
                !benarSub3 ||
                !benarSub4 ||
                !benarSub5 ||
                !benarSub6
            ) {
                tampilkanPetunjuk(
                    "petunjukLatihan1",
                    "Petunjuk: gunakan titik $(1,4)$ dan $(4,10)$ untuk menggantikan $x_1$, $y_1$, $x_2$, dan $y_2$.",
                );
                return;
            }

            if (!benarKali1 || !benarKali2 || !benarKali3 || !benarKali4) {
                tampilkanPetunjuk(
                    "petunjukLatihan1",
                    "Petunjuk: dari $\\dfrac{y-4}{6}=\\dfrac{x-1}{3}$, lakukan kali silang sehingga diperoleh $3(y-4)=6(x-1)$.",
                );
                return;
            }

            if (!benarAkhir) {
                tampilkanPetunjuk(
                    "petunjukLatihan1",
                    "Petunjuk: dari $3(y-4)=6(x-1)$, uraikan lalu sederhanakan ke bentuk $y=mx+c$.",
                );
            }
        }

        function resetLatihan1() {
            resetInput([
                "lat_x1",
                "lat_y1",
                "lat_x2",
                "lat_y2",

                "lat_sub1",
                "lat_sub2",
                "lat_sub3",
                "lat_sub4",
                "lat_sub5",
                "lat_sub6",

                "lat_kali1",
                "lat_kali2",
                "lat_kali3",
                "lat_kali4",

                "lat_akhir",
            ]);

            const feedback = document.getElementById("feedbackLatihan1");
            const petunjuk = document.getElementById("petunjukLatihan1");
            const nextBtn = document.getElementById("nextBtnLatihan1");

            if (feedback) feedback.innerHTML = "";
            if (petunjuk) petunjuk.innerHTML = "";
            if (nextBtn) nextBtn.disabled = true;

            resetStepSetelah(2);
        }

        // =========================
        // Latihan 2
        // =========================
        async function cekLatihan2() {
            const benarSub1 = cekIsian("lat2_sub1", ["5"]);
            const benarSub2 = cekIsian("lat2_sub2", ["1"]);
            const benarSub3 = cekIsian("lat2_sub3", ["5"]);
            const benarSub4 = cekIsian("lat2_sub4", ["2"]);
            const benarSub5 = cekIsian("lat2_sub5", ["6"]);
            const benarSub6 = cekIsian("lat2_sub6", ["2"]);

            const benarKali1 = cekIsian("lat2_kali1", ["4"]);
            const benarKali2 = cekIsian("lat2_kali2", ["5"]);
            const benarKali3 = cekIsian("lat2_kali3", ["-4"]);
            const benarKali4 = cekIsian("lat2_kali4", ["2"]);

            const benarAkhir = cekIsian("lat2_akhir", ["-x+7", "-x + 7", "7-x"]);

            const semuaBenar =
                benarSub1 &&
                benarSub2 &&
                benarSub3 &&
                benarSub4 &&
                benarSub5 &&
                benarSub6 &&
                benarKali1 &&
                benarKali2 &&
                benarKali3 &&
                benarKali4 &&
                benarAkhir;

            const nextBtn = document.getElementById("nextBtnLatihan2");

            if (semuaBenar) {
                isiFeedback(
                    "feedbackLatihan2",
                    "success",
                    "Bagus, jawabanmu sudah benar. Persamaan garisnya adalah $y = -x + 7$. Silakan lanjut ke soal berikutnya.",
                );
                kosongkanPetunjuk("petunjukLatihan2");

                if (nextBtn) nextBtn.disabled = false;

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L2`,
                    "input",
                    ambilJawabanLatihan2D2(),
                    true
                );
                return;
            }

            isiFeedback(
                "feedbackLatihan2",
                "warning",
                "Masih ada jawaban yang belum tepat. Coba periksa kembali jawabanmu.",
            );

            if (nextBtn) nextBtn.disabled = true;
            resetStepSetelah(3);

            if (
                !benarSub1 ||
                !benarSub2 ||
                !benarSub3 ||
                !benarSub4 ||
                !benarSub5 ||
                !benarSub6
            ) {
                tampilkanPetunjuk(
                    "petunjukLatihan2",
                    "Petunjuk: perhatikan kembali koordinat titik pada gambar, lalu masukkan nilai $x_1$, $y_1$, $x_2$, dan $y_2$ ke rumus persamaan garis melalui dua titik.",
                );
                return;
            }

            if (!benarKali1 || !benarKali2 || !benarKali3 || !benarKali4) {
                tampilkanPetunjuk(
                    "petunjukLatihan2",
                    "Petunjuk: sederhanakan penyebut pada kedua ruas terlebih dahulu, kemudian lakukan kali silang dengan benar.",
                );
                return;
            }

            if (!benarAkhir) {
                tampilkanPetunjuk(
                    "petunjukLatihan2",
                    "Petunjuk: dari $4(y - 5) = -4(x - 2)$, uraikan lalu sederhanakan.",
                );
            }
        }

        function resetLatihan2() {
            resetInput([
                "lat2_sub1",
                "lat2_sub2",
                "lat2_sub3",
                "lat2_sub4",
                "lat2_sub5",
                "lat2_sub6",
                "lat2_kali1",
                "lat2_kali2",
                "lat2_kali3",
                "lat2_kali4",
                "lat2_akhir",
            ]);

            const feedback = document.getElementById("feedbackLatihan2");
            const petunjuk = document.getElementById("petunjukLatihan2");
            const nextBtn = document.getElementById("nextBtnLatihan2");

            if (feedback) feedback.innerHTML = "";
            if (petunjuk) petunjuk.innerHTML = "";
            if (nextBtn) nextBtn.disabled = true;

            resetStepSetelah(3);
        }

        // =========================
        // Latihan 3
        // =========================
        async function cekLatihan3() {
            const benarSub1 = cekIsian("lat3_sub1", ["5"]);
            const benarSub2 = cekIsian("lat3_sub2", ["13"]);
            const benarSub3 = cekIsian("lat3_sub3", ["5"]);
            const benarSub4 = cekIsian("lat3_sub4", ["1"]);
            const benarSub5 = cekIsian("lat3_sub5", ["5"]);
            const benarSub6 = cekIsian("lat3_sub6", ["1"]);

            const benarKali1 = cekIsian("lat3_kali1", ["4"]);
            const benarKali2 = cekIsian("lat3_kali2", ["5"]);
            const benarKali3 = cekIsian("lat3_kali3", ["8"]);
            const benarKali4 = cekIsian("lat3_kali4", ["1"]);

            const benarPersamaan = cekIsian("lat3_persamaan", ["2x+3", "2x + 3"]);
            const benarY = cekIsian("lat3_y", ["9"]);

            const semuaBenar =
                benarSub1 &&
                benarSub2 &&
                benarSub3 &&
                benarSub4 &&
                benarSub5 &&
                benarSub6 &&
                benarKali1 &&
                benarKali2 &&
                benarKali3 &&
                benarKali4 &&
                benarPersamaan &&
                benarY;

            const feedback = document.getElementById("feedbackLatihan3");
            const akhir = document.getElementById("pesanAkhirLatihan");

            if (semuaBenar) {
                isiFeedback(
                    "feedbackLatihan3",
                    "success",
                    "Bagus, jawabanmu sudah benar. Persamaan garisnya adalah $y = 2x + 3$, sehingga saat $x=3$ diperoleh $y=9$.",
                );
                kosongkanPetunjuk("petunjukLatihan3");

                if (akhir) {
                    akhir.innerHTML = `
                <div class="alert alert-success fw-semibold text-center mt-3">
                    Bagus, kamu sudah memahami cara menentukan persamaan garis melalui dua titik.
                    Silakan lanjut ke materi berikutnya.
                </div>
            `;
                    renderMathSafe(akhir);
                }

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L3`,
                    "input",
                    ambilJawabanLatihan3D2(),
                    true
                );

                const saved = await saveProgressMateri();

                if (saved) {
                    bukaNextButton();
                } else if (akhir) {
                    akhir.innerHTML += `
                <div class="alert alert-warning mt-2 mb-0">
                    Jawaban benar, tetapi progres belum tersimpan. Coba cek koneksi atau refresh halaman.
                </div>
            `;
                }

                return;
            }

            isiFeedback(
                "feedbackLatihan3",
                "warning",
                "Masih ada jawaban yang belum tepat. Coba periksa kembali jawabanmu.",
            );

            if (akhir) akhir.innerHTML = "";

            if (
                !benarSub1 ||
                !benarSub2 ||
                !benarSub3 ||
                !benarSub4 ||
                !benarSub5 ||
                !benarSub6
            ) {
                tampilkanPetunjuk(
                    "petunjukLatihan3",
                    "Petunjuk: gunakan dua titik yang diketahui pada soal, lalu masukkan nilai $x_1$, $y_1$, $x_2$, dan $y_2$ ke rumus persamaan garis melalui dua titik.",
                );
                return;
            }

            if (!benarKali1 || !benarKali2 || !benarKali3 || !benarKali4) {
                tampilkanPetunjuk(
                    "petunjukLatihan3",
                    "Petunjuk: sederhanakan penyebut pada kedua ruas, lalu lakukan kali silang.",
                );
                return;
            }

            if (!benarPersamaan) {
                tampilkanPetunjuk(
                    "petunjukLatihan3",
                    "Petunjuk: uraikan hasil kali silang, kemudian sederhanakan hingga diperoleh persamaan dalam bentuk $y=mx+c$.",
                );
                return;
            }

            if (!benarY) {
                tampilkanPetunjuk(
                    "petunjukLatihan3",
                    "Petunjuk: masukkan nilai $x$ yang diminta pada soal ke persamaan garis yang sudah diperoleh.",
                );
            }
        }

        function resetLatihan3() {
            resetInput([
                "lat3_sub1",
                "lat3_sub2",
                "lat3_sub3",
                "lat3_sub4",
                "lat3_sub5",
                "lat3_sub6",
                "lat3_kali1",
                "lat3_kali2",
                "lat3_kali3",
                "lat3_kali4",
                "lat3_persamaan",
                "lat3_y",
            ]);

            const feedback = document.getElementById("feedbackLatihan3");
            const petunjuk = document.getElementById("petunjukLatihan3");
            const akhir = document.getElementById("pesanAkhirLatihan");

            if (feedback) feedback.innerHTML = "";
            if (petunjuk) petunjuk.innerHTML = "";
            if (akhir) akhir.innerHTML = "";
        }

        // =========================
        // RESTORE PROGRESS D2
        // =========================
        function setValueSafe(id, value) {
            const el = document.getElementById(id);

            if (el && value !== undefined && value !== null) {
                el.value = value;
            }
        }

        function beriValid(ids) {
            ids.forEach((id) => {
                const el = document.getElementById(id);

                if (el) {
                    el.classList.remove("is-invalid");
                    el.classList.add("is-valid");
                }
            });
        }

        function ambilSavedJawaban(latihanKey) {
            const saved = SAVED_LATIHAN?.[latihanKey]?.jawaban;

            if (!saved) return null;

            if (typeof saved === "string") {
                try {
                    return JSON.parse(saved);
                } catch (error) {
                    console.error("Gagal parse jawaban tersimpan:", error);
                    return null;
                }
            }

            return saved;
        }

        function restoreLatihan1D2() {
            const saved = ambilSavedJawaban(`${MATERI_SLUG}_L1`);
            if (!saved) return;

            Object.entries(saved).forEach(([id, value]) => {
                setValueSafe(id, value);
            });

            beriValid(Object.keys(saved));

            const fb = document.getElementById("feedbackLatihan1");
            const nextBtn = document.getElementById("nextBtnLatihan1");
            const latihan2 = document.getElementById("latihanStep2");

            if (fb) {
                fb.innerHTML = `
            <div class="alert alert-success py-2 mb-0">
                Jawaban Latihan 1 sudah tersimpan.
            </div>
        `;
                renderMathSafe(fb);
            }

            if (nextBtn) nextBtn.disabled = false;
            if (latihan2) latihan2.style.display = "block";
        }

        function restoreLatihan2D2() {
            const saved = ambilSavedJawaban(`${MATERI_SLUG}_L2`);
            if (!saved) return;

            Object.entries(saved).forEach(([id, value]) => {
                setValueSafe(id, value);
            });

            beriValid(Object.keys(saved));

            const fb = document.getElementById("feedbackLatihan2");
            const nextBtn = document.getElementById("nextBtnLatihan2");
            const latihan2 = document.getElementById("latihanStep2");
            const latihan3 = document.getElementById("latihanStep3");

            if (latihan2) latihan2.style.display = "block";
            if (latihan3) latihan3.style.display = "block";

            if (fb) {
                fb.innerHTML = `
            <div class="alert alert-success py-2 mb-0">
                Jawaban Latihan 2 sudah tersimpan.
            </div>
        `;
                renderMathSafe(fb);
            }

            if (nextBtn) nextBtn.disabled = false;
        }

        function restoreLatihan3D2() {
            const saved = ambilSavedJawaban(`${MATERI_SLUG}_L3`);
            if (!saved) return;

            Object.entries(saved).forEach(([id, value]) => {
                setValueSafe(id, value);
            });

            beriValid(Object.keys(saved));

            const latihan2 = document.getElementById("latihanStep2");
            const latihan3 = document.getElementById("latihanStep3");
            const fb = document.getElementById("feedbackLatihan3");
            const akhir = document.getElementById("pesanAkhirLatihan");

            if (latihan2) latihan2.style.display = "block";
            if (latihan3) latihan3.style.display = "block";

            if (fb) {
                fb.innerHTML = `
            <div class="alert alert-success py-2 mb-0">
                Jawaban Latihan 3 sudah tersimpan.
            </div>
        `;
                renderMathSafe(fb);
            }

            if (akhir) {
                akhir.innerHTML = `
            <div class="alert alert-success fw-semibold text-center mt-3">
                Bagus, kamu sudah memahami cara menentukan persamaan garis melalui dua titik.
                Silakan lanjut ke materi berikutnya.
            </div>
        `;
                renderMathSafe(akhir);
            }

            bukaNextButton();
        }

        function restoreProgressD2() {
            restoreLatihan1D2();
            restoreLatihan2D2();
            restoreLatihan3D2();

            if (IS_MATERI_COMPLETED) {
                const latihan2 = document.getElementById("latihanStep2");
                const latihan3 = document.getElementById("latihanStep3");

                const nextBtn1 = document.getElementById("nextBtnLatihan1");
                const nextBtn2 = document.getElementById("nextBtnLatihan2");

                if (latihan2) latihan2.style.display = "block";
                if (latihan3) latihan3.style.display = "block";

                if (nextBtn1) nextBtn1.disabled = false;
                if (nextBtn2) nextBtn2.disabled = false;

                bukaNextButton();
            }

            renderMathSafe(document.getElementById("latihanD2Box") || document.body);
        }
    </script>

    {{-- Script complete --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        window.completeMateriUrl = "{{ route('materi.complete', $materi->id) }}";
        window.nextMateriUrl = @json($nextMateri ? route('materi.show', $nextMateri->slug) : null);
    </script>
@endsection

@section('nav')
    @php
        $isNextUnlocked = $nextMateri ? in_array($nextMateri->slug, $unlockedSlugs ?? []) : false;
        $isCurrentMateriCompleted = $materialProgress?->is_completed ?? false;
    @endphp

    {{-- PREV --}}
    @if ($previousMateri)
        <a href="{{ route('materi.show', $previousMateri->slug) }}" class="btn btn-prev px-4 rounded-pill">
            ← Prev
        </a>
    @elseif($materi->slug === 'subbab-a1')
        <a href="{{ route('apersepsi1') }}" class="btn btn-prev px-4 rounded-pill">
            ← Prev
        </a>
    @else
        <span class="btn btn-prev px-4 rounded-pill invisible">← Prev</span>
    @endif

    {{-- NEXT / KUIS --}}
    @if ($nextMateri && $isNextUnlocked)
        <a id="nextMateriBtn" href="{{ route('materi.show', $nextMateri->slug) }}"
            class="btn btn-next px-4 rounded-pill fw-semibold">
            Next →
        </a>
    @elseif ($nextMateri && !$isNextUnlocked)
        <span id="nextMateriBtn" class="btn btn-secondary px-4 rounded-pill fw-semibold"
            data-next-url="{{ route('materi.show', $nextMateri->slug) }}" style="opacity:.65; cursor:not-allowed;">
            🔒 Next
        </span>
    @elseif($quizBab && $isCurrentMateriCompleted)
        <a id="quizBabBtn" href="{{ route('quiz.show', $quizBab->id) }}"
            class="btn btn-next px-4 rounded-pill fw-semibold">
            Kuis →
        </a>
    @elseif($quizBab && !$isCurrentMateriCompleted)
        <span id="quizBabBtn" class="btn btn-secondary px-4 rounded-pill fw-semibold"
            data-quiz-url="{{ route('quiz.show', $quizBab->id) }}" style="opacity:.65; cursor:not-allowed;">
            🔒 Kuis
        </span>
    @else
        <span class="btn btn-next px-4 rounded-pill invisible">Next →</span>
    @endif
@endsection
