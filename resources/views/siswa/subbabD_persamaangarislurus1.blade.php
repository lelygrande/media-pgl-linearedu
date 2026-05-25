@extends('layout.halaman-materi')

@section('content')
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
            width: fit-content;
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

        .langkah-hint {
            font-size: 14px;
            color: #6c757d;
        }
    </style>

    {{-- Judul --}}
    <h1 class="mb-3" style="font-weight: 600;">D. Persamaan Garis Lurus</h1>

    {{-- Tujuan Pembelajaran --}}
    <div class="card card-tujuan mb-4">
        <div class="card-body">
            <h5>Tujuan Pembelajaran:</h5>
            <ol>
                <li>Peserta didik dapat menentukan persamaan garis lurus</li>
            </ol>
        </div>
    </div>

    {{-- Subjudul --}}
    <h2 class="mt-2 mb-3" style="font-weight: 600;">1. Persamaan Garis Lurus Melalui Satu Titik dengan Gradien</h2>

    {{-- ========================================================= --}}
    {{-- EKSPLORASI --}}
    {{-- ========================================================= --}}
    <div class="box-eksplorasi mt-5">

        <div class="title-box">
            Eksplorasi
        </div>

        <div class="box-bimbingan mt-2">
            <b>Petunjuk:</b> Perhatikan langkah-langkah berikut untuk menemukan bentuk persamaan garis yang melalui titik
            $(x_1, y_1)$ dan memiliki gradien $m$.
        </div>

        <p class="mt-3">
            Misalkan suatu garis melalui titik <b>$(x_1, y_1)$</b> dan memiliki gradien <b>$m$</b>.
        </p>

        <div class="row g-4 align-items-start">

            {{-- KOLOM KIRI --}}
            <div class="col-md-6 pe-md-4 border-end">

                <p>
                    Kita mulai dengan bentuk umum persamaan garis lurus:
                </p>

                <div class="rumus-box mb-3" style="width: fit-content;">
                    $y = mx + c$
                </div>

                <p>
                    Karena titik $(x_1, y_1)$ terletak pada garis, maka nilai $x = x_1$ dan $y = y_1$ disubstitusikan ke
                    persamaan tersebut.
                </p>

                <div class="rumus-box mb-2" style="width: fit-content;">
                    $y_1 = m($
                    <input type="text" id="sub_x1" class="form-control d-inline-block text-center"
                        style="width:70px;">
                    $) + c$
                </div>

                <p class="small text-muted mb-3">
                    Isilah kotak di atas dengan nilai pengganti untuk $x$.
                </p>

                <p>
                    Dari hasil substitusi tersebut, tentukan nilai $c$.
                </p>

                <div class="rumus-box mb-3" style="width: fit-content;">
                    $c =$
                    <input type="text" id="c1" class="form-control d-inline-block text-center"
                        style="width:70px;">
                    $-$
                    <input type="text" id="c2" class="form-control d-inline-block text-center"
                        style="width:90px;">
                </div>
            </div>

            {{-- KOLOM KANAN --}}
            <div class="col-md-6 ps-md-4">
                <p>
                    Selanjutnya, substitusikan kembali nilai $c$ ke persamaan awal.
                </p>

                <div class="rumus-box mb-3" style="width: fit-content;">
                    $y = mx + ($
                    <input type="text" id="sub_c2" class="form-control d-inline-block text-center"
                        style="width:120px;">
                    $)$
                </div>

                <p>
                    Sekarang, susun ulang persamaan tersebut hingga diperoleh bentuk:
                </p>

                <div class="rumus-box mb-3" style="width: fit-content;">
                    $y -$
                    <input type="text" id="y1_val" class="form-control d-inline-block text-center"
                        style="width:70px;">
                    $= m(x -$
                    <input type="text" id="x1_val" class="form-control d-inline-block text-center"
                        style="width:70px;">
                    $)$
                </div>

                <div class="mt-3">
                    <button class="btn btn-palet btn-sm" onclick="cekEksplorasi()">Cek</button>
                    <div id="feedbackEksplorasi" class="mt-2"></div>
                </div>

            </div>

        </div>

        <div class="box-kesimpulan mt-3 d-none" id="kesimpulanEksplorasi" style="width: fit-content;">
            <b>Kesimpulan:</b><br>
            Persamaan garis yang melalui titik $(x_1, y_1)$ dan memiliki gradien $m$ adalah:
            <div class="rumus-box mt-2">
                $y - y_1 = m(x - x_1)$
            </div>
        </div>
    </div>

    {{-- ========================================================= --}}
    {{-- MATERI KONSEP --}}
    {{-- ========================================================= --}}
    <div class="card card-materi mt-4 mb-4">
        <div class="card-body">
            <span class="badge-sub">Persamaan Garis Lurus Melalui Satu Titik dengan Gradien</span>

            <p class="mt-3" style="line-height:1.8;">
                Suatu garis lurus dapat ditentukan jika diketahui <b>gradien</b> dan sebuah titik yang dilalui garis
                tersebut.
                Misalkan suatu garis memiliki gradien <b>$m$</b> dan melalui titik <b>$(x_1, y_1)$</b>.
            </p>

            {{-- GAMBAR --}}
            <div class="text-center my-4">
                <img src="{{ asset('img/pgl/garis bergradien m yang melalui 1titik.png') }}"
                    alt="Garis melalui titik (x1,y1)" class="img-fluid" style="max-width:350px;">
                <div class="small text-muted mt-2">
                    Gambar: Garis bergradien $m$ yang melalui titik $(x_1, y_1)$
                </div>
            </div>


            <p style="line-height:1.8;">
                Dari gambar tersebut, terlihat bahwa perubahan nilai $y$ terhadap $y_1$ sebanding dengan perubahan nilai $x$
                terhadap $x_1$ sesuai dengan gradien garis.
            </p>

            <p style="line-height:1.8;">
                Hubungan tersebut dapat dinyatakan dalam bentuk persamaan:
            </p>

            <div class="rumus-box mb-3" style="width: fit-content;">
                $m = \dfrac{y - y_1}{x - x_1}$
            </div>

            <p style="line-height:1.8;">
                Persamaan di atas dapat disusun kembali menjadi:
            </p>

            <div class="rumus-box mb-3" style="width: fit-content;">
                $y - y_1 = m(x - x_1)$
            </div>

            <p style="line-height:1.8;">
                Persamaan tersebut disebut <b>persamaan garis lurus yang melalui satu titik dengan gradien</b>.
            </p>

            <p style="line-height:1.8;">
                Dengan menggunakan persamaan ini, kita dapat menentukan persamaan garis jika diketahui gradien dan satu
                titik
                yang dilalui garis tersebut.
            </p>

        </div>
    </div>

    <div class="box-contoh mt-5 mb-4">
        <div class="card-body">
            <span class="title-box">Contoh</span>

            {{-- ======================= --}}
            {{-- CONTOH 1 --}}
            {{-- ======================= --}}
            <p class="mt-3"><b>Contoh Soal 1</b></p>

            <p>
                Tentukan persamaan garis yang memiliki gradien <b>$m = 3$</b> dan melalui titik <b>$(2, -1)$</b>.
            </p>

            <p><b>Coba lengkapi substitusi berikut:</b></p>

            <div class="text-center mb-2">
                <div class="rumus-box">
                    $y - ($
                    <input type="text" id="c1_y1" class="form-control d-inline-block text-center"
                        style="width:60px;">
                    $) =$
                    <input type="text" id="c1_m" class="form-control d-inline-block text-center"
                        style="width:60px;">
                    $(x -$
                    <input type="text" id="c1_x1" class="form-control d-inline-block text-center"
                        style="width:60px;">
                    $)$
                </div>
            </div>

            <p class="small text-muted text-center">Isi nilai $y_1$, $m$, dan $x_1$.</p>

            <div class="text-center mt-3">
                <button type="button" class="btn btn-palet btn-sm" onclick="cekContoh1()">Cek Jawaban</button>
                <button type="button" class="btn btn-tampil btn-sm" onclick="toggleSolusi('solusiContoh1')">
                    Tampilkan Jawaban
                </button>
                <div id="feedbackContoh1" class="mt-2"></div>
            </div>

            <div id="solusiContoh1" class="mt-3 d-none">
                <p><b>Penyelesaian:</b></p>

                <p>Gunakan rumus:</p>
                <div class="text-center">
                    <div class="rumus-box mb-2">
                        $y - y_1 = m(x - x_1)$
                    </div>
                </div>

                <p>Substitusikan $m = 3$, $x_1 = 2$, dan $y_1 = -1$:</p>

                <div class="row align-items-center mb-3">
                    <div class="col-md-4 text-center">
                        <div class="rumus-box">
                            $y - (-1) = 3(x - 2)$
                        </div>
                    </div>
                    <div class="col-md-8">
                        <span class="langkah-hint">
                            Ubah $-(-1)$ menjadi $+1$
                        </span>
                    </div>
                </div>

                <div class="row align-items-center mb-3">
                    <div class="col-md-4 text-center">
                        <div class="rumus-box">
                            $y + 1 = 3x - 6$
                        </div>
                    </div>
                    <div class="col-md-8">
                        <span class="langkah-hint">
                            Buka kurung: $3(x - 2) = 3x - 6$
                        </span>
                    </div>
                </div>

                <div class="row align-items-center mb-3">
                    <div class="col-md-4 text-center">
                        <div class="rumus-box">
                            $y = 3x - 7$
                        </div>
                    </div>
                    <div class="col-md-8">
                        <span class="langkah-hint">
                            Kurangi kedua ruas dengan 1
                        </span>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            {{-- ======================= --}}
            {{-- CONTOH 2 --}}
            {{-- ======================= --}}
            <p class="mt-4"><b>Contoh Soal 2</b></p>

            <p>
                Tentukan persamaan garis yang memiliki gradien <b>$m = -\dfrac{1}{2}$</b> dan melalui titik <b>$(-4,
                    6)$</b>.
            </p>

            <p><b>Coba lengkapi langkah berikut:</b></p>

            <div class="text-center mb-2">
                <div class="rumus-box">
                    $y - 6 =$
                    <input type="text" id="c2_m" class="form-control d-inline-block text-center"
                        style="width:90px;">
                    $(x + 4)$
                </div>
            </div>

            <p class="small text-muted text-center">Isi dengan nilai gradien.</p>

            <div class="text-center mt-3">
                <button type="button" class="btn btn-palet btn-sm" onclick="cekContoh2()">Cek Jawaban</button>
                <button type="button" class="btn btn-tampil btn-sm" onclick="toggleSolusi('solusiContoh2')">
                    Tampilkan Jawaban
                </button>
                <div id="feedbackContoh2" class="mt-2"></div>
            </div>

            <div id="solusiContoh2" class="mt-3 d-none">
                <p><b>Penyelesaian:</b></p>

                <p>Gunakan rumus:</p>
                <div class="text-center">
                    <div class="rumus-box mb-2">
                        $y - y_1 = m(x - x_1)$
                    </div>
                </div>

                <p>Substitusikan nilai yang diketahui:</p>

                {{-- STEP 1 --}}
                <div class="row align-items-center mb-3">
                    <div class="col-md-5 text-center">
                        <div class="rumus-box">
                            $y - 6 = -\dfrac{1}{2}(x - (-4))$
                        </div>
                    </div>
                    <div class="col-md-7">
                        <span class="langkah-hint">
                            Ubah $x - (-4)$ menjadi $x + 4$
                        </span>
                    </div>
                </div>

                {{-- STEP 2 --}}
                <div class="row align-items-center mb-3">
                    <div class="col-md-4 text-center">
                        <div class="rumus-box">
                            $y - 6 = -\dfrac{1}{2}(x + 4)$
                        </div>
                    </div>
                    <div class="col-md-8">
                        <span class="langkah-hint">
                            Bentuk sudah siap untuk didistribusikan
                        </span>
                    </div>
                </div>

                {{-- STEP 3 --}}
                <div class="row align-items-center mb-3">
                    <div class="col-md-4 text-center">
                        <div class="rumus-box">
                            $y - 6 = -\dfrac{1}{2}x - 2$
                        </div>
                    </div>
                    <div class="col-md-8">
                        <span class="langkah-hint">
                            Kalikan $-\dfrac{1}{2}$ ke setiap suku di dalam kurung
                        </span>
                    </div>
                </div>

                {{-- STEP 4 --}}
                <div class="row align-items-center mb-3">
                    <div class="col-md-4 text-center">
                        <div class="rumus-box">
                            $y = -\dfrac{1}{2}x + 4$
                        </div>
                    </div>
                    <div class="col-md-8">
                        <span class="langkah-hint">
                            Tambahkan 6 ke kedua ruas untuk menghilangkan $-6$
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="box-latihan mt-5 mb-4">
        <div class="card-body">
            <span class="title-box">Latihan</span>

            {{-- ======================= --}}
            {{-- LATIHAN NO 1 --}}
            {{-- ======================= --}}
            <div id="latihan1" class="latihan-step">
                <p class="mt-3">
                    <b>1.</b> Tentukan persamaan garis yang melalui titik <b>$(3, -2)$</b> dan memiliki gradien <b>$2$</b>.
                </p>

                <p class="mb-2"><b>Penyelesaian:</b></p>

                <div class="mb-3">
                    <p>
                        Diketahui:
                        $(x_1, y_1) = ($
                        <input type="text" id="x1_1"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        ,
                        <input type="text" id="y1_1"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        $)$
                    </p>

                    <p>
                        Gradien $m =$
                        <input type="text" id="m_1"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                    </p>
                </div>

                <div class="mb-3">
                    <p>Gunakan rumus:</p>
                    <p>$y - y_1 = m(x - x_1)$</p>

                    <p>Substitusi:</p>
                    <p>
                        $y - ($
                        <input type="text" id="sub_y1_1"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        $) =$
                        <input type="text" id="sub_m_1"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        $(x -$
                        <input type="text" id="sub_x1_1"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        $)$
                    </p>
                </div>

                <div class="mb-3">
                    <p>Sederhanakan:</p>
                    <p>
                        $y +$
                        <input type="text" id="hasil1_1"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        $=$
                        <input type="text" id="hasil2_1"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        $x$
                        <input type="text" id="hasil3_1"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                    </p>
                </div>

                <div class="mb-3">
                    <p>Jadi, persamaan garisnya adalah:</p>
                    <p>
                        $y =$
                        <input type="text" id="akhir1_1"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        $x$
                        <input type="text" id="akhir2_1"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                    </p>
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
            </div>

            {{-- ======================= --}}
            {{-- LATIHAN NO 2 --}}
            {{-- ======================= --}}
            <div id="latihan2" class="latihan-step d-none">
                <p class="mt-4">
                    <b>2.</b> Suhu udara di suatu kota berubah secara teratur setiap jam.
                    Diketahui bahwa pada pukul tertentu suhu adalah $-2^\circ C$ dan laju perubahan suhu adalah $-2^\circ C$
                    per jam. Jika pada pukul tersebut dinyatakan sebagai <b>$x = 3$</b>, dan suhu pada waktu lain dinyatakan
                    sebagai <b>$(x, y)$</b>, tentukan suhu saat <b>$x = -5$</b>.
                </p>

                <p><b>Penyelesaian:</b></p>

                <div class="mb-3">
                    <p>
                        Diketahui:
                        $(x_1, y_1) = ($
                        <input type="text" id="l2_x1"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        ,
                        <input type="text" id="l2_y1"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        $)$
                    </p>

                    <p>
                        Gradien $m =$
                        <input type="text" id="l2_m"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                    </p>
                </div>

                <div class="mb-3">
                    <p>Gunakan rumus:</p>
                    <p>$y - y_1 = m(x - x_1)$</p>
                </div>

                <div class="mb-3">
                    <p>Substitusi:</p>
                    <p>
                        $y - ($
                        <input type="text" id="l2_sub_y1"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        $) =$
                        <input type="text" id="l2_sub_m"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        $(x -$
                        <input type="text" id="l2_sub_x1"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        $)$
                    </p>
                </div>

                <div class="mb-3">
                    <p>Sederhanakan:</p>
                    <p>
                        $y =$
                        <input type="text" id="l2_h1"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        $x$
                        <input type="text" id="l2_h2"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                    </p>
                </div>

                <div class="mb-3">
                    <p>Substitusikan $x = -5$:</p>
                    <p>
                        $y =$
                        <input type="text" id="l2_s1"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        $(\,$
                        <input type="text" id="l2_s2"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        $)$
                        <input type="text" id="l2_s3"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                    </p>
                </div>

                <div class="mb-3">
                    <p>Jadi, suhu saat $x = -5$ adalah:</p>
                    <p>
                        $y =$
                        <input type="text" id="l2_final"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        $^\circ C$
                    </p>
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
            </div>

            {{-- ======================= --}}
            {{-- LATIHAN NO 3 --}}
            {{-- ======================= --}}
            <div id="latihan3" class="latihan-step d-none">
                <p class="mt-4">
                    <b>3.</b> Sebuah benda bergerak dari titik awal koordinat $(0,0)$ dengan laju perubahan posisi
                    sebesar <b>$-\dfrac{3}{5}$</b> setiap satu satuan waktu.
                    Tentukan persamaan garis yang menggambarkan hubungan antara posisi $x$ dan $y$ benda tersebut.
                </p>

                <p><b>Penyelesaian:</b></p>

                <div class="mb-3">
                    <p>
                        Diketahui:
                        $(x_1, y_1) = ($
                        <input type="text" id="l3_x1"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        ,
                        <input type="text" id="l3_y1"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        $)$
                    </p>

                    <p>
                        $m =$
                        <input type="text" id="l3_m"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                    </p>
                </div>

                <div class="mb-3">
                    <p>Gunakan rumus:</p>
                    <p>$y - y_1 = m(x - x_1)$</p>
                </div>

                <div class="mb-3">
                    <p>Substitusi:</p>
                    <p>
                        $y - ($
                        <input type="text" id="l3_sub_y1"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        $) =$
                        <input type="text" id="l3_sub_m"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:90px;">
                        $(x -$
                        <input type="text" id="l3_sub_x1"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        $)$
                    </p>
                </div>

                <div class="mb-3">
                    <p>Sederhanakan:</p>
                    <p>
                        $y =$
                        <input type="text" id="l3_h1"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:90px;">
                        $x$
                    </p>
                </div>

                <div class="mb-3">
                    <p>Ubah ke bentuk tanpa pecahan:</p>
                    <p>
                        <input type="text" id="l3_kiri"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        $y =$
                        <input type="text" id="l3_kanan"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:90px;">
                        $x$
                    </p>
                </div>

                <div class="mb-3">
                    <p>Susun menjadi bentuk umum:</p>
                    <p>
                        <input type="text" id="l3_final1"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        $x +$
                        <input type="text" id="l3_final2"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        $y = 0$
                    </p>
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
                <div id="pesanAkhirLatihan" class="mt-3"></div>
            </div>
        </div>
    </div>


    <script src="https://www.geogebra.org/apps/deployggb.js"></script>
    <script>
        // Eksplorasi
        function cekEksplorasi() {
            const subX1 = document.getElementById("sub_x1").value.trim().toLowerCase();
            const c1 = document.getElementById("c1").value.trim().toLowerCase();
            const c2 = document.getElementById("c2").value.trim().toLowerCase();
            const subC2 = document.getElementById("sub_c2").value.trim().toLowerCase();
            const y1Val = document.getElementById("y1_val").value.trim().toLowerCase();
            const x1Val = document.getElementById("x1_val").value.trim().toLowerCase();

            const fb = document.getElementById("feedbackEksplorasi");
            const kesimpulan = document.getElementById("kesimpulanEksplorasi");

            const normal = (teks) => {
                return teks
                    .replace(/\s+/g, "")
                    .replace(/₁/g, "1")
                    .replace(/−/g, "-")
                    .replace(/–/g, "-");
            };

            const vSubX1 = normal(subX1);
            const vC1 = normal(c1);
            const vC2 = normal(c2);
            const vSubC2 = normal(subC2);
            const vY1 = normal(y1Val);
            const vX1 = normal(x1Val);

            const benarSubX1 = vSubX1 === "x1";
            const benarC = vC1 === "y1" && (vC2 === "mx1" || vC2 === "m(x1)");
            const benarSubC2 = vSubC2 === "y1-mx1" || vSubC2 === "y1-m(x1)";
            const benarAkhir = vY1 === "y1" && vX1 === "x1";

            let pesan = [];

            if (!benarSubX1) {
                pesan.push(
                    "Pada langkah substitusi, nilai pengganti untuk $x$ adalah $x_1$.",
                );
            }

            if (!benarC) {
                pesan.push(
                    "Perhatikan kembali bentuk nilai $c$, yaitu $c = y_1 - mx_1$.",
                );
            }

            if (!benarSubC2) {
                pesan.push(
                    "Nilai $c$ yang disubstitusikan kembali adalah $y_1 - mx_1$.",
                );
            }

            if (!benarAkhir) {
                pesan.push(
                    "Pada bentuk akhir, ruas kiri berisi $y - y_1$ dan di dalam kurung tertulis $(x - x_1)$.",
                );
            }

            if (benarSubX1 && benarC && benarSubC2 && benarAkhir) {
                fb.innerHTML =
                    "<span class='text-success fw-bold'>Bagus! Kamu berhasil menemukan bentuk persamaan garis.</span>";
                kesimpulan.classList.remove("d-none");
            } else {
                fb.innerHTML =
                    "<span class='text-danger'>" + pesan.join("<br>") + "</span>";
                kesimpulan.classList.add("d-none");
            }

            if (window.renderMathInElement) {
                renderMathInElement(fb, {
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
                });
            }
        }

        // Contoh Soal
        function normalizeInput(text) {
            return text
                .trim()
                .toLowerCase()
                .replace(/\s+/g, "")
                .replace(/₁/g, "1")
                .replace(/−/g, "-")
                .replace(/–/g, "-");
        }

        function toggleSolusi(id) {
            const el = document.getElementById(id);
            el.classList.toggle("d-none");

            if (window.renderMathInElement) {
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
                });
            }
        }

        function cekContoh1() {
            const y1 = normalizeInput(document.getElementById("c1_y1").value);
            const m = normalizeInput(document.getElementById("c1_m").value);
            const x1 = normalizeInput(document.getElementById("c1_x1").value);
            const fb = document.getElementById("feedbackContoh1");

            const benarY1 = y1 === "-1";
            const benarM = m === "3";
            const benarX1 = x1 === "2";

            if (benarY1 && benarM && benarX1) {
                fb.innerHTML =
                    "<span class='text-success fw-bold'>Benar. Sekarang perhatikan langkah penyelesaiannya.</span>";
            } else {
                let pesan = [];
                if (!benarY1) pesan.push("Nilai $y_1$ adalah $-1$.");
                if (!benarM) pesan.push("Nilai gradien $m$ adalah $3$.");
                if (!benarX1) pesan.push("Nilai $x_1$ adalah $2$.");
                fb.innerHTML =
                    "<span class='text-danger'>" + pesan.join("<br>") + "</span>";
            }

            if (window.renderMathInElement) {
                renderMathInElement(fb, {
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
                });
            }
        }

        function cekContoh2() {
            const m = normalizeInput(document.getElementById("c2_m").value);
            const fb = document.getElementById("feedbackContoh2");

            const benar =
                m === "-1/2" ||
                m === "-\\dfrac{1}{2}" ||
                m === "-\\frac{1}{2}" ||
                m === "-(1/2)";

            if (benar) {
                fb.innerHTML =
                    "<span class='text-success fw-bold'>Benar. Lanjutkan dengan melihat penyelesaiannya.</span>";
            } else {
                fb.innerHTML =
                    "<span class='text-danger'>Gradien yang digunakan adalah $-\\dfrac{1}{2}$.</span>";
            }

            if (window.renderMathInElement) {
                renderMathInElement(fb, {
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
                });
            }
        }

        // =========================
        // LATIHAN SOAL SUBBAB D
        // =========================

        // =========================
        // HELPER
        // =========================
        function normalize(val) {
            return String(val || "")
                .trim()
                .toLowerCase()
                .replace(/\s+/g, "")
                .replace(/−/g, "-")
                .replace(/–/g, "-")
                .replace(/₁/g, "1");
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
            renderMathSafe(document.body);
        });

        // =========================
        // NAVIGASI LATIHAN
        // =========================
        function scrollKeLatihan(idLatihan) {
            const content = document.querySelector(".content-wrapper");
            const target = document.getElementById(idLatihan);

            if (!target) return;

            if (!content) {
                target.scrollIntoView({
                    behavior: "smooth",
                    block: "start",
                });
                return;
            }

            const contentRect = content.getBoundingClientRect();
            const targetRect = target.getBoundingClientRect();

            const targetTop = content.scrollTop + (targetRect.top - contentRect.top) - 20;

            content.scrollTo({
                top: targetTop,
                behavior: "smooth",
            });
        }

        function nextLatihan(stepNumber) {
            const target = document.getElementById(`latihan${stepNumber}`);
            if (!target) return;

            target.classList.remove("d-none");
            renderMathSafe(target);
            scrollKeLatihan(`latihan${stepNumber}`);
        }

        function prevLatihan(stepNumber) {
            scrollKeLatihan(`latihan${stepNumber}`);
        }

        function resetStepSetelah(stepMulai) {
            for (let i = stepMulai; i <= 3; i++) {
                const target = document.getElementById(`latihan${i}`);
                if (target) target.classList.add("d-none");
            }
        }

        // =========================
        // SAVE PROGRESS
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
        // VALIDASI UMUM
        // =========================
        function setValid(id, benar) {
            const el = document.getElementById(id);
            if (!el) return;

            el.classList.remove("is-valid", "is-invalid");
            el.classList.add(benar ? "is-valid" : "is-invalid");
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

        function isiFeedback(id, tipe, pesan) {
            const el = document.getElementById(id);
            if (!el) return;

            const kelas = tipe === "success" ? "alert-success" : "alert-warning";

            el.innerHTML = `
        <div class="alert ${kelas} mb-0">
            ${pesan}
        </div>
    `;

            renderMathSafe(el);
        }

        // =========================
        // LATIHAN 1
        // =========================
        function cekLatihan1() {
            const x1 = normalize(document.getElementById("x1_1")?.value);
            const y1 = normalize(document.getElementById("y1_1")?.value);
            const m = normalize(document.getElementById("m_1")?.value);

            const subY1 = normalize(document.getElementById("sub_y1_1")?.value);
            const subM = normalize(document.getElementById("sub_m_1")?.value);
            const subX1 = normalize(document.getElementById("sub_x1_1")?.value);

            const h1 = normalize(document.getElementById("hasil1_1")?.value);
            const h2 = normalize(document.getElementById("hasil2_1")?.value);
            const h3 = normalize(document.getElementById("hasil3_1")?.value);

            const a1 = normalize(document.getElementById("akhir1_1")?.value);
            const a2 = normalize(document.getElementById("akhir2_1")?.value);

            const benarX1 = x1 === "3";
            const benarY1 = y1 === "-2";
            const benarM = m === "2";

            const benarSubY1 = subY1 === "-2";
            const benarSubM = subM === "2";
            const benarSubX1 = subX1 === "3";

            const benarH1 = h1 === "2";
            const benarH2 = h2 === "2";
            const benarH3 = h3 === "-6";

            const benarA1 = a1 === "2";
            const benarA2 = a2 === "-8";

            [
                ["x1_1", benarX1],
                ["y1_1", benarY1],
                ["m_1", benarM],
                ["sub_y1_1", benarSubY1],
                ["sub_m_1", benarSubM],
                ["sub_x1_1", benarSubX1],
                ["hasil1_1", benarH1],
                ["hasil2_1", benarH2],
                ["hasil3_1", benarH3],
                ["akhir1_1", benarA1],
                ["akhir2_1", benarA2],
            ].forEach(([id, benar]) => setValid(id, benar));

            const semuaBenar =
                benarX1 &&
                benarY1 &&
                benarM &&
                benarSubY1 &&
                benarSubM &&
                benarSubX1 &&
                benarH1 &&
                benarH2 &&
                benarH3 &&
                benarA1 &&
                benarA2;

            const nextBtn = document.getElementById("nextBtnLatihan1");

            if (semuaBenar) {
                isiFeedback(
                    "feedbackLatihan1",
                    "success",
                    "Benar! Persamaan garisnya adalah $y = 2x - 8$. Silakan lanjut ke latihan berikutnya."
                );

                if (nextBtn) nextBtn.disabled = false;
            } else {
                let pesan = [];

                if (!benarX1 || !benarY1 || !benarM) {
                    pesan.push("Periksa nilai $x_1$, $y_1$, dan $m$.");
                }

                if (benarX1 && benarY1 && benarM && (!benarSubY1 || !benarSubM || !benarSubX1)) {
                    pesan.push("Perhatikan langkah substitusi ke rumus $y-y_1=m(x-x_1)$.");
                }

                if (benarSubY1 && benarSubM && benarSubX1 && (!benarH1 || !benarH2 || !benarH3)) {
                    pesan.push("Periksa hasil penyederhanaan.");
                }

                if (benarH1 && benarH2 && benarH3 && (!benarA1 || !benarA2)) {
                    pesan.push("Periksa jawaban akhir.");
                }

                isiFeedback(
                    "feedbackLatihan1",
                    "warning",
                    pesan.join("<br>") || "Masih ada jawaban yang belum tepat."
                );

                if (nextBtn) nextBtn.disabled = true;
                resetStepSetelah(2);
            }
        }

        function resetLatihan1() {
            resetInput([
                "x1_1",
                "y1_1",
                "m_1",
                "sub_y1_1",
                "sub_m_1",
                "sub_x1_1",
                "hasil1_1",
                "hasil2_1",
                "hasil3_1",
                "akhir1_1",
                "akhir2_1",
            ]);

            const fb = document.getElementById("feedbackLatihan1");
            const nextBtn = document.getElementById("nextBtnLatihan1");

            if (fb) fb.innerHTML = "";
            if (nextBtn) nextBtn.disabled = true;

            resetStepSetelah(2);
        }

        // =========================
        // LATIHAN 2
        // =========================
        function cekLatihan2() {
            const val = (id) => normalize(document.getElementById(id)?.value);

            const x1 = val("l2_x1");
            const y1 = val("l2_y1");
            const m = val("l2_m");

            const subY1 = val("l2_sub_y1");
            const subM = val("l2_sub_m");
            const subX1 = val("l2_sub_x1");

            const h1 = val("l2_h1");
            const h2 = val("l2_h2");

            const s1 = val("l2_s1");
            const s2 = val("l2_s2");
            const s3 = val("l2_s3");

            const final = val("l2_final");

            const benarX1 = x1 === "3";
            const benarY1 = y1 === "-2";
            const benarM = m === "-2";

            const benarSubY1 = subY1 === "-2";
            const benarSubM = subM === "-2";
            const benarSubX1 = subX1 === "3";

            const benarH1 = h1 === "-2";
            const benarH2 = h2 === "+4" || h2 === "4";

            const benarS1 = s1 === "-2";
            const benarS2 = s2 === "-5";
            const benarS3 = s3 === "+4" || s3 === "4";

            const benarFinal = final === "14";

            [
                ["l2_x1", benarX1],
                ["l2_y1", benarY1],
                ["l2_m", benarM],
                ["l2_sub_y1", benarSubY1],
                ["l2_sub_m", benarSubM],
                ["l2_sub_x1", benarSubX1],
                ["l2_h1", benarH1],
                ["l2_h2", benarH2],
                ["l2_s1", benarS1],
                ["l2_s2", benarS2],
                ["l2_s3", benarS3],
                ["l2_final", benarFinal],
            ].forEach(([id, benar]) => setValid(id, benar));

            const semuaBenar =
                benarX1 &&
                benarY1 &&
                benarM &&
                benarSubY1 &&
                benarSubM &&
                benarSubX1 &&
                benarH1 &&
                benarH2 &&
                benarS1 &&
                benarS2 &&
                benarS3 &&
                benarFinal;

            const nextBtn = document.getElementById("nextBtnLatihan2");

            if (semuaBenar) {
                isiFeedback(
                    "feedbackLatihan2",
                    "success",
                    "Benar! Persamaan suhu adalah $y = -2x + 4$, sehingga saat $x=-5$, diperoleh $y=14$. Silakan lanjut ke latihan berikutnya."
                );

                if (nextBtn) nextBtn.disabled = false;
            } else {
                let pesan = [];

                if (!benarX1 || !benarY1) {
                    pesan.push("Ambil titik dari informasi suhu $-2$ ketika $x=3$.");
                }

                if (!benarM) {
                    pesan.push("Gradien adalah laju perubahan suhu.");
                }

                if (benarX1 && benarY1 && benarM && (!benarSubY1 || !benarSubM || !benarSubX1)) {
                    pesan.push("Substitusikan ke rumus $y-y_1=m(x-x_1)$.");
                }

                if (benarSubY1 && benarSubM && benarSubX1 && (!benarH1 || !benarH2)) {
                    pesan.push("Sederhanakan sampai bentuk $y = mx + c$.");
                }

                if (benarH1 && benarH2 && (!benarS1 || !benarS2 || !benarS3)) {
                    pesan.push("Substitusikan $x=-5$ ke persamaan yang sudah diperoleh.");
                }

                if (!benarFinal) {
                    pesan.push("Hitung kembali $-2 \\times (-5) + 4$.");
                }

                isiFeedback(
                    "feedbackLatihan2",
                    "warning",
                    pesan.join("<br>") || "Masih ada jawaban yang belum tepat."
                );

                if (nextBtn) nextBtn.disabled = true;
                resetStepSetelah(3);
            }
        }

        function resetLatihan2() {
            resetInput([
                "l2_x1",
                "l2_y1",
                "l2_m",
                "l2_sub_y1",
                "l2_sub_m",
                "l2_sub_x1",
                "l2_h1",
                "l2_h2",
                "l2_s1",
                "l2_s2",
                "l2_s3",
                "l2_final",
            ]);

            const fb = document.getElementById("feedbackLatihan2");
            const nextBtn = document.getElementById("nextBtnLatihan2");

            if (fb) fb.innerHTML = "";
            if (nextBtn) nextBtn.disabled = true;

            resetStepSetelah(3);
        }

        // =========================
        // LATIHAN 3
        // =========================
        async function cekLatihan3() {
            const val = (id) => normalize(document.getElementById(id)?.value);

            const benarX1 = val("l3_x1") === "0";
            const benarY1 = val("l3_y1") === "0";
            const benarM = val("l3_m") === "-3/5" || val("l3_m") === "-0.6";

            const benarSubY1 = val("l3_sub_y1") === "0";
            const benarSubM = val("l3_sub_m") === "-3/5" || val("l3_sub_m") === "-0.6";
            const benarSubX1 = val("l3_sub_x1") === "0";

            const benarH1 = val("l3_h1") === "-3/5" || val("l3_h1") === "-0.6";

            const benarKiri = val("l3_kiri") === "5";
            const benarKanan = val("l3_kanan") === "-3";

            const benarFinal1 = val("l3_final1") === "3";
            const benarFinal2 = val("l3_final2") === "5";

            [
                ["l3_x1", benarX1],
                ["l3_y1", benarY1],
                ["l3_m", benarM],
                ["l3_sub_y1", benarSubY1],
                ["l3_sub_m", benarSubM],
                ["l3_sub_x1", benarSubX1],
                ["l3_h1", benarH1],
                ["l3_kiri", benarKiri],
                ["l3_kanan", benarKanan],
                ["l3_final1", benarFinal1],
                ["l3_final2", benarFinal2],
            ].forEach(([id, benar]) => setValid(id, benar));

            const semuaBenar =
                benarX1 &&
                benarY1 &&
                benarM &&
                benarSubY1 &&
                benarSubM &&
                benarSubX1 &&
                benarH1 &&
                benarKiri &&
                benarKanan &&
                benarFinal1 &&
                benarFinal2;

            const fb = document.getElementById("feedbackLatihan3");

            if (semuaBenar) {
                fb.innerHTML = `
            <div class="alert alert-success mb-0">
                Hebat, semua latihan sudah selesai. Persamaan garisnya adalah $3x + 5y = 0$.
                Silakan lanjut ke materi berikutnya.
            </div>
        `;

                renderMathSafe(fb);

                const saved = await saveProgressMateri();

                if (saved) {
                    bukaNextButton();
                } else {
                    fb.innerHTML += `
                <div class="alert alert-warning mt-2 mb-0">
                    Jawaban benar, tetapi progres belum tersimpan. Coba cek koneksi atau refresh halaman.
                </div>
            `;
                }
            } else {
                fb.innerHTML = `
            <div class="alert alert-warning mb-0">
                Hint: Titik awal koordinat adalah $(0,0)$, lalu hilangkan pecahan dengan mengalikan 5.
            </div>
        `;

                renderMathSafe(fb);
            }
        }

        function resetLatihan3() {
            resetInput([
                "l3_x1",
                "l3_y1",
                "l3_m",
                "l3_sub_y1",
                "l3_sub_m",
                "l3_sub_x1",
                "l3_h1",
                "l3_kiri",
                "l3_kanan",
                "l3_final1",
                "l3_final2",
            ]);

            const fb = document.getElementById("feedbackLatihan3");
            if (fb) fb.innerHTML = "";
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
