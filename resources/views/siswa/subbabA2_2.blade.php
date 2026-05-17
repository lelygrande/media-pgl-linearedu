@extends('layout.halaman-materi')

@section('content')
    <style>
        /* Card tujuan pembelajaran */
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

        /* Box materi */
        .box-info {
            background: #f7fbff;
            border: 1px solid rgba(0, 0, 0, .06);
            border-radius: 12px;
            padding: 14px 16px;
        }

        .badge-judul {
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

        /* Contoh 2 */

        /* contoh 2 */
        .step-stack {
            background: #e8f4ff;
            border: 1px solid rgba(0, 0, 0, .06);
            border-radius: 12px;
            padding: 14px;
        }

        .step-item {
            background: white;
            border: 1px solid rgba(0, 0, 0, .06);
            border-radius: 12px;
            padding: 12px;
            margin-bottom: 12px;
        }

        .step-row {
            display: grid;
            grid-template-columns: 260px 1fr;
            gap: 14px;
            align-items: start;
        }

        .step-eq {
            font-size: 20px;
            font-weight: 700;
            text-align: center;
            padding: 10px;
            border-radius: 10px;
            background: #f7fbff;
            border: 1px solid rgba(0, 0, 0, .06);
        }

        .step-note {
            font-size: 15px;
            line-height: 1.6;
            text-align: justify;
        }

        .btn-arrow {
            margin-top: 10px;
            width: 100%;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 8px 12px;
            font-weight: 600;
            transition: .2s;
        }

        .btn-arrow:hover {
            background: var(--primary-dark);
        }

        /* button universal */

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

        .box-border-blue {
            border: 2px solid #2E75B6;
            border-radius: 10px;
            background: #fff;
            padding: 12px;
        }

        .tabel-garis {
            width: 100%;
            border-collapse: collapse;
            font-size: 15px;
            background: white;
        }

        .tabel-garis th,
        .tabel-garis td {
            border: 2px solid #000;
            padding: 8px 10px;
            vertical-align: middle;
        }

        .tabel-garis th {
            text-align: center;
            font-weight: 800;
        }

        .tabel-garis td {
            text-align: center;
        }

        /* Tabel inputan */

        .input-y {
            width: 100%;
            max-width: 160px;
            padding: 6px 10px;
            border: 1px solid rgba(0, 0, 0, .2);
            border-radius: 8px;
            font-size: 15px;
        }

        .feedback-box {
            border-radius: 10px;
            padding: 10px 12px;
            margin-top: 10px;
            font-weight: 600;
            display: none;
        }

        .feedback-ok {
            display: block;
            background: #e8fff0;
            border: 1px solid #2fb344;
            color: #1b7a31;
        }

        .feedback-bad {
            display: block;
            background: #ffe8e8;
            border: 1px solid #e03131;
            color: #b42318;
        }

        .geogebra-wrap {
            border: 2px solid #2E75B6;
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
        }

        .input-step {
            font-family: "Times New Roman", serif;
            font-size: 18px
        }

        .input-step:focus {
            border-bottom: 2px solid #2563eb;
        }

        /* Slider latihan */

        .latihan-slider {
            overflow: hidden;
            width: 100%;
        }

        .latihan-track {
            display: flex;
            transition: transform 0.4s ease;
            width: 100%;
        }

        .latihan-slide {
            min-width: 100%;
            box-sizing: border-box;
        }

        .grafik-wrapper {
            width: 100%;
            max-width: 880px;
            margin: 0 auto;
            overflow-x: auto;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 12px;
            background: #fff;
        }

        /* =========================================
               RESPONSIVE TABLET
            ========================================= */
        @media (max-width: 992px) {

            .step-row {
                grid-template-columns: 1fr;
            }

            .step-eq {
                font-size: 18px;
            }

            .step-note {
                font-size: 14px;
            }

            .grafik-wrapper {
                padding: 10px;
            }

            #ggb-22 {
                height: 420px !important;
            }
        }

        /* =========================================
               RESPONSIVE MOBILE
            ========================================= */
        @media (max-width: 768px) {

            /* ---------- BOX ---------- */
            .box-info,
            .box-contoh,
            .box-latihan,
            .step-stack,
            .step-item {
                padding: 12px;
            }

            /* ---------- FONT ---------- */
            p,
            li,
            td,
            th {
                font-size: 14px;
                line-height: 1.6;
            }

            h2 {
                font-size: 1.4rem;
            }

            h5 {
                font-size: 1.05rem;
            }

            h6 {
                font-size: .95rem;
            }

            /* ---------- STEP ---------- */
            .step-row {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .step-eq {
                font-size: 17px;
                padding: 8px;
            }

            .step-note {
                font-size: 14px;
                text-align: left;
            }

            /* ---------- GAMBAR / GRAFIK ---------- */
            .grafik-wrapper {
                width: 100%;
                overflow-x: auto;
                padding: 8px;
            }

            canvas,
            .p5Canvas {
                max-width: 100% !important;
                height: auto !important;
                display: block;
                margin: 0 auto;
            }

            #ggb-22 {
                width: 100% !important;
                height: 320px !important;
            }

            /* ---------- TABEL ---------- */
            .table-responsive {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .tabel-garis {
                width: 100%;
                font-size: 13px;
            }

            .tabel-garis th,
            .tabel-garis td {
                padding: 6px 4px;
            }

            /* ---------- INPUT ---------- */
            .input-y,
            .input-matematika {
                width: 70px !important;
                max-width: 70px !important;
                font-size: 13px;
                padding: 4px;
            }

            /* ---------- BUTTON ---------- */
            .btn-palet {
                width: auto;
            }

            .grafik-actions {
                display: flex;
                flex-direction: column;
                gap: 8px;
            }

            .grafik-actions .btn-palet,
            .text-end .btn-palet {
                width: 100%;
            }

            /* ---------- FLEX BUTTON ---------- */
            .d-flex.justify-content-between.align-items-center.flex-wrap.gap-2 {
                flex-direction: column;
                align-items: stretch !important;
            }

            .d-flex.justify-content-between.align-items-center.flex-wrap.gap-2>div {
                width: 100%;
                display: flex;
                flex-direction: column;
                gap: 8px;
            }

            .d-flex.justify-content-between.align-items-center.flex-wrap.gap-2 .btn {
                width: 100%;
                margin-left: 0 !important;
            }
        }

        /* =========================================
                GEOGEBRA RESPONSIVE
                ========================================= */
        #ggb-22 {
            width: 100%;
            max-width: 720px;
            margin: 0 auto;
        }
    </style>

    {{-- css pilgan --}}
    <style>
        .box-info .d-grid .form-check {
            display: flex;
            align-items: center;
            gap: 10px;
            padding-left: 12px !important;
            /* ruang dalam kotak */
        }

        /* reset radio bawaan bootstrap */
        .box-info .d-grid .form-check-input {
            position: static !important;
            margin: 0 !important;
            flex: 0 0 auto;
        }

        /* rapikan label */
        .box-info .d-grid .form-check-label {
            margin: 0 !important;
            flex: 1;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/contrib/auto-render.min.js"
        onload="renderMathInElement(document.body);"></script>


    {{-- Subjudul --}}
    <h2 class="mt-2 mb-3" style="font-weight: 600;">2.2 Menggambar Grafik Persamaan Garis Lurus</h2>

    <div class="box-info mb-3">
        <h5 class="mb-2" style="font-weight:700;">Menggambar Grafik Persamaan menggunakan Dua Titik</h5>
        <p class="mb-3" style="line-height:1.7;">
            Dalam menggambar grafik persamaan garis lurus, kita tidak selalu membutuhkan banyak titik.
            Secara matematis, <b>sebuah garis lurus dapat ditentukan hanya oleh dua titik</b>.
            Oleh karena itu, kita dapat menggunakan <b>dua titik potong</b> dengan sumbu $x$ dan sumbu $y$
            untuk menggambarkan grafiknya.
        </p>
    </div>

    {{-- Konsep Titik Potong --}}
    <div class="box-info mb-3">
        <span class="badge-sub">Menentukan Titik Potong dengan Sumbu Koordinat</span>

        <p class="mb-2" style="line-height:1.7;">
            <b>Titik potong</b> adalah titik pertemuan antara suatu garis dengan sumbu koordinat pada bidang Kartesius.
            Setiap titik potong dapat ditentukan dengan memperhatikan nilai salah satu variabel pada sumbu tersebut.
        </p>

        <ul class="mb-2" style="line-height:1.7; padding-left: 18px;">
            <li>
                <b>Titik potong dengan sumbu x</b> diperoleh ketika garis memotong sumbu x.
                Pada sumbu x, nilai koordinat <b>y = 0</b>.
                Oleh karena itu, untuk menentukannya, substitusikan <b>y = 0</b> ke dalam persamaan garis.
            </li>
            <li>
                <b>Titik potong dengan sumbu y</b> diperoleh ketika garis memotong sumbu y.
                Pada sumbu y, nilai koordinat <b>x = 0</b>.
                Oleh karena itu, untuk menentukannya, substitusikan <b>x = 0</b> ke dalam persamaan garis.
            </li>
        </ul>

        <p class="mb-0" style="line-height:1.7;">
            Dengan demikian, dapat disimpulkan bahwa:
            <br>
            • Untuk mencari titik potong dengan sumbu x, gunakan <b>y = 0</b>.
            <br>
            • Untuk mencari titik potong dengan sumbu y, gunakan <b>x = 0</b>.
        </p>
    </div>

    {{-- Langkah-langkah --}}
    <div class="box-info mb-3">
        <p class="mb-2">
            Langkah-langkah menggambar grafik persamaan garis lurus menggunakan dua titik potong adalah:
        </p>

        <ol class="mb-0" style="line-height:1.7; padding-left: 18px;">
            <li>Tentukan titik potong garis dengan sumbu $x$ dengan mensubstitusikan $y=0$ ke dalam persamaan.</li>
            <li>Tentukan titik potong garis dengan sumbu $y$ dengan mensubstitusikan $x=0$ ke dalam persamaan.</li>
            <li>Gambarkan kedua titik potong tersebut pada bidang koordinat Kartesius.</li>
            <li>Hubungkan kedua titik tersebut sehingga terbentuk sebuah garis lurus.</li>
        </ol>
    </div>

    {{-- Contoh --}}
    <div class="box-contoh mb-4">
        <span class="title-box">Contoh</span>

        <p class="mt-2 mb-2">Gambarlah grafik persamaan garis lurus:</p>
        <p class="text-center mb-3" style="font-weight:700;">
            \( 2x + y = 6 \)
        </p>

        <!-- ======================= -->
        <!-- A. Titik potong sumbu X -->
        <!-- ======================= -->

        <h6 class="fw-bold mb-2">a. Menentukan titik potong dengan sumbu x</h6>
        <p class="mb-3">Titik potong sumbu x terjadi saat <b>$y = 0$</b>.</p>

        <div class="step-stack">

            <!-- STEP 1 -->
            <div class="step-item">
                <div class="step-row">
                    <div class="step-eq">$2x + y = 6$</div>
                    <div class="step-note">
                        Mulai dari persamaan garis.
                    </div>
                </div>

                <button class="btn-arrow" type="button" onclick="openStep('Ax2', this)">
                    ↓ Tampilkan langkah berikutnya
                </button>
            </div>

            <!-- STEP 2 -->
            <div id="Ax2" class="step-item" style="display:none;">
                <div class="step-row">
                    <div class="step-eq">$2x + 0 = 6$</div>
                    <div class="step-note">
                        Substitusikan $y = 0$.
                    </div>
                </div>

                <button class="btn-arrow" type="button" onclick="openStep('Ax3', this)">
                    ↓ Tampilkan langkah berikutnya
                </button>
            </div>

            <!-- STEP 3 -->
            <div id="Ax3" class="step-item" style="display:none;">
                <div class="step-row">
                    <div class="step-eq">$2x = 6$</div>
                    <div class="step-note">
                        Sederhanakan karena $2x + 0 = 2x$.
                    </div>
                </div>

                <button class="btn-arrow" type="button" onclick="openStep('Ax4', this)">
                    ↓ Tampilkan langkah berikutnya
                </button>
            </div>

            <!-- STEP 4 -->
            <div id="Ax4" class="step-item" style="display:none;">
                <div class="step-row">
                    <div class="step-eq">$x = 3$ <br> $\Rightarrow (3,0)$</div>
                    <div class="step-note">
                        Bagi kedua ruas dengan 2. Jadi titik potong sumbu $x$ adalah <b>$(3,0)$</b>.
                    </div>
                </div>
            </div>

        </div>

        <hr class="my-4">

        <!-- ======================= -->
        <!-- B. Titik potong sumbu Y -->
        <!-- ======================= -->

        <h6 class="fw-bold mb-2">b. Menentukan titik potong dengan sumbu y</h6>
        <p class="mb-3">Titik potong sumbu y terjadi saat <b>$x = 0$</b>.</p>

        <div class="step-stack">

            <!-- STEP 1 -->
            <div class="step-item">
                <div class="step-row">
                    <div class="step-eq">$2x + y = 6$</div>
                    <div class="step-note">
                        Mulai dari persamaan garis.
                    </div>
                </div>

                <button class="btn-arrow" type="button" onclick="openStep('By2', this)">
                    ↓ Tampilkan langkah berikutnya
                </button>
            </div>

            <!-- STEP 2 -->
            <div id="By2" class="step-item" style="display:none;">
                <div class="step-row">
                    <div class="step-eq">$2(0) + y = 6$</div>
                    <div class="step-note">
                        Substitusikan $x = 0$.
                    </div>
                </div>

                <button class="btn-arrow" type="button" onclick="openStep('By3', this)">
                    ↓ Tampilkan langkah berikutnya
                </button>
            </div>

            <!-- STEP 3 -->
            <div id="By3" class="step-item" style="display:none;">
                <div class="step-row">
                    <div class="step-eq">$0 + y = 6$</div>
                    <div class="step-note">
                        Hitung $2(0) = 0$.
                    </div>
                </div>

                <button class="btn-arrow" type="button" onclick="openStep('By4', this)">
                    ↓ Tampilkan langkah berikutnya
                </button>
            </div>

            <!-- STEP 4 -->
            <div id="By4" class="step-item" style="display:none;">
                <div class="step-row">
                    <div class="step-eq">$y = 6$ <br> $\Rightarrow (0,6)$</div>
                    <div class="step-note">
                        Jadi titik potong sumbu $y$ adalah <b>$(0,6)$</b>.
                    </div>
                </div>
            </div>

        </div>

        <hr class="my-4">

        <p class="mb-2">
            <b>Sebagai alternatif</b>, dua titik potong tersebut dapat dituliskan dalam tabel pasangan nilai $(x,y)$
            berikut:
        </p>

        <div class="table-responsive" style="max-width:450px;">
            <table class="tabel-garis">
                <thead>
                    <tr>
                        <th>\(x\)</th>
                        <th>\(y\)</th>
                        <th>\((x,y)\)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>$3$</td>
                        <td>$0$</td>
                        <td>\((3,0)\)</td>
                    </tr>
                    <tr>
                        <td>$0$</td>
                        <td>$6$</td>
                        <td>\((0,6)\)</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <p class="mt-3 mb-2">
            Selanjutnya, gambarkan titik <b>$(3,0)$</b> dan <b>$(0,6)$</b> pada bidang koordinat Kartesius,
            lalu hubungkan kedua titik tersebut sehingga terbentuk grafik persamaan garis lurus \(2x + y = 6\).
        </p>

        <div class="box-info mb-3">
            <p class="mb-2"><b>Visualisasi Grafik</b></p>
            <div id="ggb-22" style="width:100%; max-width:720px; height:480px; margin:0 auto;"></div>
        </div>
    </div>

    {{-- ===== Latihan Soal A2.2 ===== --}}
    <div class="box-latihan mt-5">
        <div class="card-body">
            <span class="title-box">Latihan Soal</span>
            <!-- ===================== -->
            <!-- LATIHAN 1 -->
            <!-- ===================== -->
            <div class="latihan-step" id="latihanStep1">
                <h5 class="mt-3 fw-bold">Menggambar grafik dari bentuk \(y = mx + c\)</h5>

                <p class="mb-3">
                    Diketahui persamaan garis:
                    <b>\( y = 2x + 4 \)</b>
                </p>

                <div class="box-info mb-3">
                    <h6 class="fw-bold">A. Titik potong dengan sumbu x</h6>
                    <p>Untuk mencari titik potong dengan sumbu x, substitusikan <b>\(y = 0\)</b>.</p>
                    <p>\(0 = 2x + 4\)</p>

                    <p>
                        \(x =\)
                        <input type="text" id="l1_x_value"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                    </p>

                    <p>
                        Titik potong sumbu x:
                        (
                        <input type="text" id="l1_x_point_x"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        ,
                        <input type="text" id="l1_x_point_y"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        )
                    </p>
                </div>

                <div class="box-info mb-3">
                    <h6 class="fw-bold">B. Titik potong dengan sumbu y</h6>
                    <p>Untuk mencari titik potong dengan sumbu y, substitusikan <b>\(x = 0\)</b>.</p>
                    <p>\(y = 2(0) + 4\)</p>

                    <p>
                        \(y =\)
                        <input type="text" id="l1_y_value"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                    </p>

                    <p>
                        Titik potong sumbu y:
                        (
                        <input type="text" id="l1_y_point_x"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        ,
                        <input type="text" id="l1_y_point_y"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        )
                    </p>
                </div>

                <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div>
                        <button class="btn btn-palet btn-sm" onclick="cekLatihan1A22()">Cek Jawaban</button>
                        <button class="btn btn-palet btn-sm" onclick="resetLatihan1A22()">Reset</button>
                    </div>
                </div>

                <div id="feedbackLatihan1A22" class="mt-3"></div>

                <div id="canvas-latihan1-wrap" class="mt-4" style="display:none;">
                    <div class="grafik-wrapper">
                        <div id="canvas-latihan1"></div>
                    </div>

                    <div class="mt-3 text-end">
                        <button id="nextBtnLatihan1" class="btn btn-palet btn-sm" onclick="nextLatihan(2)"
                            style="display:none;">
                            Lanjut ke Latihan 2
                        </button>
                    </div>
                </div>
            </div>

            <!-- ===================== -->
            <!-- LATIHAN 2 -->
            <!-- ===================== -->
            <div class="latihan-step" id="latihanStep2" style="display:none;">
                <hr class="my-4">

                <h5 class="mt-3 fw-bold">Menggambar grafik dari bentuk \(Ax + By + C = 0\)</h5>

                <p class="mb-3">
                    Diketahui persamaan garis:
                    <b>\(3x + 4y - 24 = 0\)</b>
                </p>

                <div class="box-info mb-3">
                    <h6 class="fw-bold">A. Titik potong dengan sumbu x</h6>
                    <p>Untuk mencari titik potong dengan sumbu x, substitusikan <b>\(y = 0\)</b>.</p>
                    <p>\(3x + 4(0) - 24 = 0\)</p>

                    <p>
                        \(x =\)
                        <input type="text" id="l2_x_value"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                    </p>

                    <p>
                        Titik potong sumbu x:
                        (
                        <input type="text" id="l2_x_point_x"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        ,
                        <input type="text" id="l2_x_point_y"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        )
                    </p>
                </div>

                <div class="box-info mb-3">
                    <h6 class="fw-bold">B. Titik potong dengan sumbu y</h6>
                    <p>Untuk mencari titik potong dengan sumbu y, substitusikan <b>\(x = 0\)</b>.</p>
                    <p>\(3(0) + 4y - 24 = 0\)</p>

                    <p>
                        \(y =\)
                        <input type="text" id="l2_y_value"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                    </p>

                    <p>
                        Titik potong sumbu y:
                        (
                        <input type="text" id="l2_y_point_x"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        ,
                        <input type="text" id="l2_y_point_y"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                        )
                    </p>
                </div>

                <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <button class="btn btn-palet btn-sm" onclick="prevLatihan(1)">
                        Kembali ke Latihan 1
                    </button>

                    <div>
                        <button class="btn btn-palet btn-sm" onclick="cekLatihan2A22()">Cek Jawaban</button>
                        <button class="btn btn-palet btn-sm" onclick="resetLatihan2A22()">Reset</button>
                    </div>
                </div>

                <div id="feedbackLatihan2A22" class="mt-3"></div>

                <div id="canvas-latihan2-wrap" class="mt-4" style="display:none;">
                    <div class="grafik-wrapper">
                        <div id="canvas-latihan2"></div>
                    </div>
                </div>

                <div class="box-kesimpulan mt-3" id="kesimpulanLatihan2A22" style="display:none;">
                    <p class="mb-1" style="font-weight:700;">Kesimpulan:</p>
                    <p class="mb-0">
                        Grafik persamaan garis lurus dapat digambar dengan menentukan dua titik potong,
                        yaitu titik potong dengan sumbu x dan titik potong dengan sumbu y.
                        Setelah kedua titik diperoleh, hubungkan kedua titik tersebut sehingga terbentuk garis lurus.
                    </p>
                </div>
            </div>
        </div>
    </div>


    <script src="https://www.geogebra.org/apps/deployggb.js"></script>
    <script src="{{ asset('js/subbabA/latsol2_2.js') }}"></script>
    <script src="{{ asset('js/subbabA/subbabA2_2.js') }}"></script>

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
