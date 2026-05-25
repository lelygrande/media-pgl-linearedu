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
            background: #f7f9fc;
            border: 1px solid #dbe5f1;
            border-radius: 12px;
            padding: 14px 16px;
            overflow-x: auto;
            font-size: 20px;
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

        /* =========================================
                        RESPONSIVE MOBILE
                        ========================================= */
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
    </style>

    {{-- Subjudul --}}
    <h2 class="mt-2 mb-3" style="font-weight: 600;">2. Persamaan Garis Lurus Melalui Dua Titik</h2>

    {{-- ========================================================= --}}
    {{-- EKSPLORASI --}}
    {{-- ========================================================= --}}
    <div class="box-eksplorasi mt-5">
        <div class="title-box">
            Eksplorasi
        </div>

        <div class="mt-3">
            <p>
                Misalkan suatu garis melalui dua titik <span>$(x_1, y_1)$</span> dan
                <span>$(x_2, y_2)$</span>. Untuk menemukan persamaan garis yang melalui dua titik tersebut,
                kita mulai dari rumus gradien garis:
            </p>

            <div class="rumus-box mb-3 text-center" style="width: fit-content;">
                <span>$m=\dfrac{y_2-y_1}{x_2-x_1}$</span>
            </div>

            <p>
                Substitusikan bentuk gradien tersebut ke persamaan garis melalui titik
                <span>$(x_1,y_1)$</span>, yaitu <span>$y-y_1=m(x-x_1)$</span>.
            </p>

            <div class="rumus-box mb-3 text-center" style="width: fit-content;">
                <span>$y-y_1=\dfrac{y_2-y_1}{x_2-x_1}(x-x_1)$</span>
            </div>

            <p>
                Agar bentuk pecahannya hilang, kalikan kedua ruas dengan <span>$(x_2-x_1)$</span>.
                Lengkapilah bentuk berikut.
            </p>

            <div class="rumus-box mb-3" style="width: fit-content;">
                <input type="text" id="kali_eks_1"
                    class="form-control form-control-sm d-inline-block text-center jawaban-latihan" style="width:100px;">
                <span>$(y-y_1)=$</span>
                <input type="text" id="kali_eks_2"
                    class="form-control form-control-sm d-inline-block text-center jawaban-latihan" style="width:100px;">
                <span>$(x-x_1)$</span>
            </div>

            <p>
                Sekarang, susun kembali persamaan tersebut ke dalam bentuk perbandingan berikut.
            </p>

            <div class="d-flex align-items-center flex-wrap gap-4 mb-3">
                <div class="frac-static">
                    <div class="top">
                        <span>$y-y_1$</span>
                    </div>
                    <div class="bottom">
                        <input type="text" id="akhir1"
                            class="form-control form-control-sm text-center jawaban-latihan">
                        <span>$-$</span>
                        <input type="text" id="akhir2"
                            class="form-control form-control-sm text-center jawaban-latihan">
                    </div>
                </div>

                <span>$=$</span>

                <div class="frac-static">
                    <div class="top">
                        <span>$x-x_1$</span>
                    </div>
                    <div class="bottom">
                        <input type="text" id="akhir3"
                            class="form-control form-control-sm text-center jawaban-latihan">
                        <span>$-$</span>
                        <input type="text" id="akhir4"
                            class="form-control form-control-sm text-center jawaban-latihan">
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <button class="btn btn-palet btn-sm" onclick="cekEksplorasiDuaTitik()">Cek</button>
                <div id="feedbackEksplorasiDuaTitik" class="mt-2"></div>
                <div id="petunjukEksplorasiDuaTitik" class="mt-2"></div>
            </div>

            <div id="kesimpulanEksplorasiDuaTitik" class="box-kesimpulan mt-3 d-none">
                <b>Kesimpulan:</b>
                <p class="mb-2">
                    Persamaan garis yang melalui titik <span>$(x_1, y_1)$</span> dan
                    <span>$(x_2, y_2)$</span> adalah:
                </p>
                <div class="rumus-box" style="width: fit-content;">
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

            <p>
                Untuk menyusun persamaan garis yang melalui titik <span>$A(x_1, y_1)$</span> dan
                <span>$B(x_2, y_2)$</span>, langkah pertama yang dilakukan adalah menentukan gradien garis yang
                melalui kedua titik tersebut.
            </p>

            {{-- GAMBAR --}}
            <div class="text-center my-4">
                <img src="{{ asset('img/pgl/pgl_2titik.png') }}" alt="Garis melalui titik (x1,y1)" class="img-fluid"
                    style="max-width:350px;">
                <div class="small text-muted mt-2">
                    Gambar: Garis yang melalui titik $(x_1, y_1)$ dan $(x_2, y_2)$
                </div>
            </div>

            <p>Nilai gradien diperoleh dari perbandingan perubahan nilai koordinat
                <span>$y$</span> terhadap perubahan nilai koordinat <span>$x$</span>, yaitu:
            </p>

            <div class="rumus-box mb-3 text-center" style="width: fit-content">
                <span>$m = \dfrac{y_2 - y_1}{x_2 - x_1}$</span>
            </div>

            <p>
                Setelah nilai gradien diketahui, kita menggunakan persamaan dasar garis melalui titik
                <span>$(x_1, y_1)$</span> dengan gradien <span>$m$</span>, yaitu:
            </p>

            <div class="rumus-box mb-3 text-center" style="width: fit-content">
                <span>$y - y_1 = m(x - x_1)$</span>
            </div>

            <p>
                Jika nilai gradien tersebut disubstitusikan ke persamaan garis, maka diperoleh:
            </p>

            <div class="rumus-box mb-3 text-center" style="width: fit-content">
                <span>$y - y_1 = \dfrac{y_2 - y_1}{x_2 - x_1}(x - x_1)$</span>
            </div>

            <p>
                Bentuk ini menunjukkan bahwa setiap titik <span>$(x, y)$</span> yang terletak pada garis tersebut
                memenuhi hubungan perbandingan perubahan koordinat yang sama seperti dua titik yang dilaluinya.
                Oleh karena itu, persamaan garis yang melalui dua titik dapat dinyatakan dalam bentuk:
            </p>

            <div class="rumus-box mb-3 text-center" style="width: fit-content">
                <span>$\dfrac{y-y_1}{y_2-y_1}=\dfrac{x-x_1}{x_2-x_1}$</span>
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

                <button class="btn btn-tampil btn-sm" type="button" onclick="toggleSolusi('pembahasanContohSoal1')">
                    Tampilkan Jawaban
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

    {{-- Latihan --}}
    <div class="box-latihan mt-5 mb-4" id="latihanD2Box">
        <div class="card-body">
            <span class="title-box">Latihan</span>

            {{-- ===================== --}}
            {{-- LATIHAN 1 --}}
            {{-- ===================== --}}
            <div class="latihan-step" id="latihanStep1">

                <p>
                    1. Pada hari pertama, tinggi sebuah tanaman adalah <span>$4$</span> cm. Setelah <span>$3$</span>
                    hari, tinggi tanaman itu menjadi <span>$10$</span> cm. Jika pertumbuhan tinggi tanaman dianggap
                    membentuk garis lurus, tentukan persamaan garis yang menyatakan hubungan antara banyak hari
                    <span>$x$</span> dan tinggi tanaman <span>$y$</span>.
                </p>

                <p>Dari cerita di atas, tuliskan dua titik yang diketahui.</p>

                <p>
                    Titik 1 = (
                    <input type="text" id="lat_x1"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:70px;">
                    ,
                    <input type="text" id="lat_y1"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:70px;">
                    )
                </p>

                <p>
                    Titik 2 = (
                    <input type="text" id="lat_x2"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:70px;">
                    ,
                    <input type="text" id="lat_y2"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:70px;">
                    )
                </p>

                <p>Tuliskan rumus persamaan garis lurus melalui dua titik.</p>

                <div class="d-flex align-items-center flex-wrap gap-4 mb-3">
                    <div class="frac-static">
                        <div class="top">
                            <span>$y-$</span>
                            <input type="text" id="lat_rumus1"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:70px;">
                        </div>
                        <div class="bottom">
                            <input type="text" id="lat_rumus2"
                                class="form-control form-control-sm text-center jawaban-latihan">
                            <span>$-$</span>
                            <input type="text" id="lat_rumus3"
                                class="form-control form-control-sm text-center jawaban-latihan">
                        </div>
                    </div>

                    <span>$=$</span>

                    <div class="frac-static">
                        <div class="top">
                            <span>$x-$</span>
                            <input type="text" id="lat_rumus4"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:70px;">
                        </div>
                        <div class="bottom">
                            <input type="text" id="lat_rumus5"
                                class="form-control form-control-sm text-center jawaban-latihan">
                            <span>$-$</span>
                            <input type="text" id="lat_rumus6"
                                class="form-control form-control-sm text-center jawaban-latihan">
                        </div>
                    </div>
                </div>

                <p>Substitusikan titik-titik yang sudah kamu tentukan ke rumus tersebut.</p>

                <div class="d-flex align-items-center flex-wrap gap-4 mb-3">
                    <div class="frac-static">
                        <div class="top">
                            <span>$y-$</span>
                            <input type="text" id="lat_sub1"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:70px;">
                        </div>
                        <div class="bottom">
                            <input type="text" id="lat_sub2"
                                class="form-control form-control-sm text-center jawaban-latihan">
                            <span>$-$</span>
                            <input type="text" id="lat_sub3"
                                class="form-control form-control-sm text-center jawaban-latihan">
                        </div>
                    </div>

                    <span>$=$</span>

                    <div class="frac-static">
                        <div class="top">
                            <span>$x-$</span>
                            <input type="text" id="lat_sub4"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:70px;">
                        </div>
                        <div class="bottom">
                            <input type="text" id="lat_sub5"
                                class="form-control form-control-sm text-center jawaban-latihan">
                            <span>$-$</span>
                            <input type="text" id="lat_sub6"
                                class="form-control form-control-sm text-center jawaban-latihan">
                        </div>
                    </div>
                </div>

                <p>Sederhanakan penyebutnya, lalu lakukan kali silang.</p>

                <div class="rumus-box mb-3" style="width: fit-content;">
                    <input type="text" id="lat_kali1"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                    <span>$(y-$</span>
                    <input type="text" id="lat_kali2"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                    <span>$) =$</span>
                    <input type="text" id="lat_kali3"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                    <span>$(x-$</span>
                    <input type="text" id="lat_kali4"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                    <span>$)$</span>
                </div>

                <p>Tuliskan persamaan garis akhirnya.</p>

                <p>
                    <span>$y =$</span>
                    <input type="text" id="lat_akhir"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:180px;">
                </p>

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


                <p>
                    2. Perhatikan gambar persegi panjang berikut. Tentukan persamaan garis yang melalui titik
                    <span>$A$</span> dan <span>$C$</span>.
                </p>

                <div class="text-center mb-3">
                    <img src="{{ asset('img/pgl/pgl2latsol2.png') }}" alt="Gambar titik A dan C"
                        class="img-fluid rounded" style="max-width: 300px;">
                </div>

                <p>
                    Substitusikan koordinat titik <span>$A$</span> dan <span>$C$</span> dari gambar ke rumus
                    persamaan garis melalui dua titik.
                </p>

                <div class="d-flex align-items-center flex-wrap gap-4 mb-3">
                    <div class="frac-static">
                        <div class="top">
                            <span>$y-$</span>
                            <input type="text" id="lat2_sub1"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:70px;">
                        </div>
                        <div class="bottom">
                            <input type="text" id="lat2_sub2"
                                class="form-control form-control-sm text-center jawaban-latihan">
                            <span>$-$</span>
                            <input type="text" id="lat2_sub3"
                                class="form-control form-control-sm text-center jawaban-latihan">
                        </div>
                    </div>

                    <span>$=$</span>

                    <div class="frac-static">
                        <div class="top">
                            <span>$x-$</span>
                            <input type="text" id="lat2_sub4"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:70px;">
                        </div>
                        <div class="bottom">
                            <input type="text" id="lat2_sub5"
                                class="form-control form-control-sm text-center jawaban-latihan">
                            <span>$-$</span>
                            <input type="text" id="lat2_sub6"
                                class="form-control form-control-sm text-center jawaban-latihan">
                        </div>
                    </div>
                </div>

                <p>Sederhanakan penyebutnya, lalu lakukan kali silang.</p>

                <div class="rumus-box mb-3" style="width: fit-content;">
                    <input type="text" id="lat2_kali1"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                    <span>$(y-$</span>
                    <input type="text" id="lat2_kali2"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                    <span>$) =$</span>
                    <input type="text" id="lat2_kali3"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                    <span>$(x-$</span>
                    <input type="text" id="lat2_kali4"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                    <span>$)$</span>
                </div>

                <p>Tuliskan persamaan garis akhirnya.</p>

                <p>
                    <span>$y =$</span>
                    <input type="text" id="lat2_akhir"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:180px;">
                </p>

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

                <p>
                    3. Seorang siswa mengamati hubungan antara banyak buku tulis yang dibeli dan jumlah uang yang
                    harus dibayar. Data tersebut dinyatakan pada dua titik, yaitu <span>$A(1,5)$</span> dan
                    <span>$B(5,13)$</span>. Jika hubungan itu membentuk garis lurus, tentukan jumlah uang yang
                    harus dibayar saat membeli <span>$3$</span> buku tulis.
                </p>

                <p>
                    Substitusikan titik <span>$A(1,5)$</span> dan <span>$B(5,13)$</span> ke rumus persamaan garis
                    lurus melalui dua titik.
                </p>

                <div class="d-flex align-items-center flex-wrap gap-4 mb-3">
                    <div class="frac-static">
                        <div class="top">
                            <span>$y-$</span>
                            <input type="text" id="lat3_sub1"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:70px;">
                        </div>
                        <div class="bottom">
                            <input type="text" id="lat3_sub2"
                                class="form-control form-control-sm text-center jawaban-latihan">
                            <span>$-$</span>
                            <input type="text" id="lat3_sub3"
                                class="form-control form-control-sm text-center jawaban-latihan">
                        </div>
                    </div>

                    <span>$=$</span>

                    <div class="frac-static">
                        <div class="top">
                            <span>$x-$</span>
                            <input type="text" id="lat3_sub4"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:70px;">
                        </div>
                        <div class="bottom">
                            <input type="text" id="lat3_sub5"
                                class="form-control form-control-sm text-center jawaban-latihan">
                            <span>$-$</span>
                            <input type="text" id="lat3_sub6"
                                class="form-control form-control-sm text-center jawaban-latihan">
                        </div>
                    </div>
                </div>

                <p>Sederhanakan penyebutnya, lalu lakukan kali silang.</p>

                <div class="rumus-box mb-3" style="width: fit-content;">
                    <input type="text" id="lat3_kali1"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                    <span>$(y-$</span>
                    <input type="text" id="lat3_kali2"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                    <span>$) =$</span>
                    <input type="text" id="lat3_kali3"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                    <span>$(x-$</span>
                    <input type="text" id="lat3_kali4"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                    <span>$)$</span>
                </div>

                <p>Tuliskan persamaan garis yang diperoleh.</p>

                <p>
                    <span>$y =$</span>
                    <input type="text" id="lat3_persamaan"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:180px;">
                </p>

                <p>
                    Karena yang dibeli adalah <span>$3$</span> buku tulis, substitusikan <span>$x=3$</span> ke
                    persamaan garis tersebut. Jadi jumlah uang yang harus dibayar adalah:
                </p>

                <p>
                    <span>$y =$</span>
                    <input type="text" id="lat3_y"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:100px;">
                </p>

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
            const benarKali1 = cekInput("kali_eks_1", ["x2-x1", "x_2-x_1"]);
            const benarKali2 = cekInput("kali_eks_2", ["y2-y1", "y_2-y_1"]);

            const benarAkhir1 = cekInput("akhir1", ["y2", "y_2"]);
            const benarAkhir2 = cekInput("akhir2", ["y1", "y_1"]);
            const benarAkhir3 = cekInput("akhir3", ["x2", "x_2"]);
            const benarAkhir4 = cekInput("akhir4", ["x1", "x_1"]);

            const semuaBenar =
                benarKali1 &&
                benarKali2 &&
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
                petunjuk.innerHTML = "";
                kesimpulan.classList.remove("d-none");

                renderKatexById("feedbackEksplorasiDuaTitik");
                renderKatexById("kesimpulanEksplorasiDuaTitik");
                return;
            }

            feedback.innerHTML =
                '<div class="alert alert-warning py-2 mb-0">Masih ada jawaban yang belum tepat. Coba periksa lagi langkah-langkahnya.</div>';
            kesimpulan.classList.add("d-none");

            renderKatexById("feedbackEksplorasiDuaTitik");

            if (!benarKali1 || !benarKali2) {
                tampilkanPetunjukEksplorasi(
                    "Petunjuk: dari bentuk <b>$y-y_1=\\dfrac{y_2-y_1}{x_2-x_1}(x-x_1)$</b>, kalikan kedua ruas dengan <b>$(x_2-x_1)$</b>. Hasilnya menjadi <b>$(x_2-x_1)(y-y_1)=(y_2-y_1)(x-x_1)$</b>.",
                );
                return;
            }

            if (!benarAkhir1 || !benarAkhir2 || !benarAkhir3 || !benarAkhir4) {
                tampilkanPetunjukEksplorasi(
                    "Petunjuk: dari bentuk <b>$(x_2-x_1)(y-y_1)=(y_2-y_1)(x-x_1)$</b>, susun kembali ke bentuk perbandingan sehingga pembilang kiri menjadi <b>$y-y_1$</b> dan pembilang kanan menjadi <b>$x-x_1$</b>.",
                );
                return;
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

            if (semuaBenar) {
                isiFeedbackContoh(
                    "feedbackContohSoal1",
                    "success",
                    "Benar. Nilai titik sudah tepat disubstitusikan ke rumus persamaan garis melalui dua titik.",
                );

                if (pembahasan) {
                    pembahasan.classList.remove("d-none");
                    renderMathSafe(pembahasan);
                }

                return;
            }

            isiFeedbackContoh(
                "feedbackContohSoal1",
                "warning",
                "Masih ada nilai yang belum tepat. Dari $A(1,3)$ diperoleh $x_1=1$ dan $y_1=3$, sedangkan dari $B(5,11)$ diperoleh $x_2=5$ dan $y_2=11$.",
            );

            if (pembahasan) {
                pembahasan.classList.add("d-none");
            }
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
        function cekLatihan1() {
            const benarTitik1x = cekIsian("lat_x1", ["1"]);
            const benarTitik1y = cekIsian("lat_y1", ["4"]);
            const benarTitik2x = cekIsian("lat_x2", ["4"]);
            const benarTitik2y = cekIsian("lat_y2", ["10"]);

            const benarRumus1 = cekIsian("lat_rumus1", ["y1", "y_1"]);
            const benarRumus2 = cekIsian("lat_rumus2", ["y2", "y_2"]);
            const benarRumus3 = cekIsian("lat_rumus3", ["y1", "y_1"]);
            const benarRumus4 = cekIsian("lat_rumus4", ["x1", "x_1"]);
            const benarRumus5 = cekIsian("lat_rumus5", ["x2", "x_2"]);
            const benarRumus6 = cekIsian("lat_rumus6", ["x1", "x_1"]);

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
                benarRumus1 &&
                benarRumus2 &&
                benarRumus3 &&
                benarRumus4 &&
                benarRumus5 &&
                benarRumus6 &&
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
                    "Petunjuk: hari pertama berarti $x = 1$. Setelah 3 hari dari hari pertama berarti hari ke-4.",
                );
                return;
            }

            if (
                !benarRumus1 ||
                !benarRumus2 ||
                !benarRumus3 ||
                !benarRumus4 ||
                !benarRumus5 ||
                !benarRumus6
            ) {
                tampilkanPetunjuk(
                    "petunjukLatihan1",
                    "Petunjuk: tuliskan rumus persamaan garis lurus melalui dua titik.",
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
                    "Petunjuk: sederhanakan dulu $10 - 4$ dan $4 - 1$, lalu lakukan kali silang.",
                );
                return;
            }

            if (!benarAkhir) {
                tampilkanPetunjuk(
                    "petunjukLatihan1",
                    "Petunjuk: dari $3(y - 4) = 6(x - 1)$, uraikan lalu sederhanakan ke bentuk $y = mx + c$.",
                );
            }
        }

        function resetLatihan1() {
            resetInput([
                "lat_x1",
                "lat_y1",
                "lat_x2",
                "lat_y2",
                "lat_rumus1",
                "lat_rumus2",
                "lat_rumus3",
                "lat_rumus4",
                "lat_rumus5",
                "lat_rumus6",
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
        function cekLatihan2() {
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
                    "Petunjuk: baca koordinat titik $A$ dan $C$ dari gambar, lalu substitusikan ke rumus dua titik.",
                );
                return;
            }

            if (!benarKali1 || !benarKali2 || !benarKali3 || !benarKali4) {
                tampilkanPetunjuk(
                    "petunjukLatihan2",
                    "Petunjuk: sederhanakan dulu $1 - 5$ dan $6 - 2$, lalu lakukan kali silang.",
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
                    "Petunjuk: gunakan titik $A(1,5)$ dan $B(5,13)$ untuk menggantikan $x_1$, $y_1$, $x_2$, dan $y_2$.",
                );
                return;
            }

            if (!benarKali1 || !benarKali2 || !benarKali3 || !benarKali4) {
                tampilkanPetunjuk(
                    "petunjukLatihan3",
                    "Petunjuk: sederhanakan dulu $13 - 5$ dan $5 - 1$, lalu lakukan kali silang.",
                );
                return;
            }

            if (!benarPersamaan) {
                tampilkanPetunjuk(
                    "petunjukLatihan3",
                    "Petunjuk: dari $4(y - 5) = 8(x - 1)$, uraikan lalu sederhanakan.",
                );
                return;
            }

            if (!benarY) {
                tampilkanPetunjuk(
                    "petunjukLatihan3",
                    "Petunjuk: substitusikan $x = 3$ ke persamaan garis yang sudah kamu peroleh.",
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
