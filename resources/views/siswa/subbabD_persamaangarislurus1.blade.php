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
                <li>Siswa dapat menentukan persamaan garis lurus dari satu titik dan gradien.</li>
                <li>Siswa dapat menentukan persamaan garis lurus dari dua titik.</li>
                <li>Siswa dapat menentukan persamaan garis lurus yang melalui satu titik dan sejajar dengan garis lain.</li>
                <li>Siswa dapat menentukan persamaan garis lurus yang melalui satu titik dan tegak lurus dengan garis lain.
                </li>
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
    <script src="{{ asset('js/subbabD/subbabD_persamaan1.js') }}"></script>

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
