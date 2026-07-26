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

        /* Contoh Penyelesaian Bertahap */
        .penyelesaian-sejajar {
            margin-top: 18px;
            padding: 4px 0 8px;
        }

        .baris-penyelesaian {
            display: grid;
            grid-template-columns: 280px 1fr;
            column-gap: 18px;
            align-items: start;
            margin-bottom: 18px;
            padding: 12px 14px;
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.65);
            border: 1px solid rgba(123, 97, 199, 0.14);
        }

        .rumus-kiri {
            font-size: 18px;
            font-weight: 700;
            text-align: left;
            line-height: 1.8;
            display: flex;
            align-items: center;
            gap: 10px;

            /* ini yang memperbaiki overflow aneh */
            overflow: visible !important;
            min-width: 0;
            padding: 6px 0;
        }

        .rumus-dua-baris {
            line-height: 1.9;
        }

        .rumus-kiri .katex {
            font-size: 1.05em !important;
        }

        .step-badge {
            width: 28px;
            height: 28px;
            min-width: 28px;
            border-radius: 50%;
            background: #6f42c1;
            color: #ffffff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 800;
        }

        .catatan-kanan {
            font-size: 15px;
            line-height: 1.7;
            color: #555b6e;
            text-align: justify;
        }

        .catatan-kanan .katex {
            font-size: 1em !important;
        }

        .btn-step-text {
            margin-top: 8px;
            border: none;
            background: transparent;
            color: #6f4ed8;
            font-weight: 800;
            padding: 0;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-step-text:hover {
            text-decoration: underline;
        }

        .kesimpulan-sejajar {
            margin-top: 10px;
            padding: 10px 12px;
            border-left: 4px solid #7b56d9;
            background: #f7f3ff;
            border-radius: 8px;
            color: #333;
        }

        /* jaga-jaga kalau script lama sempat kasih display:block */
        .baris-penyelesaian[style*="display: block"] {
            display: grid !important;
        }

        @media (max-width: 768px) {
            .baris-penyelesaian {
                grid-template-columns: 1fr;
                row-gap: 8px;
                margin-bottom: 16px;
            }

            .rumus-kiri {
                font-size: 17px;
            }

            .catatan-kanan {
                font-size: 14px;
            }
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

        /* Contoh Plotting P5 */
        .plot-contoh-row {
            display: grid;
            grid-template-columns: auto 280px;
            gap: 24px;
            align-items: start;
            justify-content: center;
        }

        .plot-info-side {
            width: 280px;
            margin-top: 90px;
        }

        .plot-info-side .info-aktivitas {
            min-height: 110px;
        }

        .canvas-responsive {
            width: 100%;
            max-width: 440px;
            margin: 0;
            overflow: hidden;
            border: 1px solid rgba(0, 0, 0, .08);
            border-radius: 12px;
            background: #fff;
            padding: 8px;
        }

        #canvas-contoh-22 {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        #canvas-contoh-22 canvas {
            width: 100% !important;
            max-width: 420px !important;
            height: auto !important;
            display: block;
            margin: 0 auto;
        }

        .info-aktivitas {
            background: #f8fbff;
            border: 1px solid rgba(74, 118, 184, .25);
            border-radius: 10px;
            padding: 10px 12px;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        @media (max-width: 992px) {
            .plot-contoh-row {
                grid-template-columns: 1fr;
            }

            .canvas-responsive {
                margin: 0 auto;
            }

            .plot-info-side {
                width: 100%;
                margin-top: 12px;
            }
        }

        /* ===== Layout Grafik Latihan A2.2 ===== */
        .grafik-latihan-layout {
            display: grid;
            grid-template-columns: minmax(0, 520px) minmax(220px, 1fr);
            gap: 14px;
            align-items: start;
        }

        .grafik-wrapper {
            width: 100%;
            max-width: 520px;
            overflow: hidden;
        }

        #canvas-latihan1,
        #canvas-latihan2 {
            width: 100%;
            max-width: 520px;
        }

        #canvas-latihan1 canvas,
        #canvas-latihan2 canvas {
            width: 100% !important;
            height: auto !important;
            display: block;
        }


        .status-plot-mini {
            margin-top: 8px;
            padding-top: 8px;
            border-top: 1px dashed #e6c76b;
        }

        @media (max-width: 768px) {
            .grafik-latihan-layout {
                grid-template-columns: 1fr;
            }

            .grafik-wrapper {
                max-width: 100%;
            }
        }

        /* ===== RESPONSIVE TABLET ===== */
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

        /* ===== RESPONSIVE MOBILE ===== */
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
    <h2 class="mt-2 mb-3" style="font-weight: 600;">2. Menggambar Grafik Persamaan Garis Lurus</h2>

    <div class="box-info mb-3">
        <h5 class="mb-2" style="font-weight:700;">2.2 Menggambar Grafik Persamaan menggunakan Dua Titik</h5>
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

        <p class="mt-2 mb-2" style="line-height:1.8; text-align:justify;">
            Gambarlah grafik persamaan garis lurus berikut.
        </p>

        <p class="text-center mb-3" style="font-weight:700;">
            \(y = -2x + 6\)
        </p>

        <div class="petunjuk-mini-latihan mb-3">
            <b>Petunjuk:</b> Klik tulisan <b>“Tampilkan langkah berikutnya”</b> untuk melihat proses menentukan
            titik potong sumbu \(x\) dan titik potong sumbu \(y\) secara bertahap.
        </div>

        {{-- ======================= --}}
        {{-- A. Titik potong sumbu X --}}
        {{-- ======================= --}}

        <h6 class="fw-bold mb-2">a. Menentukan titik potong dengan sumbu \(x\)</h6>

        <p class="mb-3" style="line-height:1.8; text-align:justify;">
            Titik potong sumbu \(x\) terjadi saat nilai <b>\(y = 0\)</b>.
        </p>

        <div class="penyelesaian-sejajar">

            {{-- STEP 1 --}}
            <div class="baris-penyelesaian">
                <div class="rumus-kiri">
                    <span class="step-badge">1</span>
                    \(y = -2x + 6\)
                </div>

                <div class="catatan-kanan">
                    Mulai dari persamaan garis dalam bentuk eksplisit.

                    <br>
                    <button class="btn-step-text" type="button" onclick="openStep('Ax2', this)">
                        Tampilkan langkah berikutnya ↓
                    </button>
                </div>
            </div>

            {{-- STEP 2 --}}
            <div id="Ax2" class="baris-penyelesaian" style="display:none;">
                <div class="rumus-kiri">
                    <span class="step-badge">2</span>
                    \(0 = -2x + 6\)
                </div>

                <div class="catatan-kanan">
                    Karena titik potong sumbu \(x\) terjadi saat \(y = 0\), maka nilai \(y\)
                    pada persamaan diganti dengan \(0\).

                    <br>
                    <button class="btn-step-text" type="button" onclick="openStep('Ax3', this)">
                        Tampilkan langkah berikutnya ↓
                    </button>
                </div>
            </div>

            {{-- STEP 3 --}}
            <div id="Ax3" class="baris-penyelesaian" style="display:none;">
                <div class="rumus-kiri">
                    <span class="step-badge">3</span>
                    \(0 - 6 = -2x + 6 - 6\)
                </div>

                <div class="catatan-kanan">
                    Kurangi kedua ruas dengan \(6\), agar suku \(-2x\) berada sendiri di ruas kanan.

                    <br>
                    <button class="btn-step-text" type="button" onclick="openStep('Ax4', this)">
                        Tampilkan langkah berikutnya ↓
                    </button>
                </div>
            </div>

            {{-- STEP 4 --}}
            <div id="Ax4" class="baris-penyelesaian" style="display:none;">
                <div class="rumus-kiri">
                    <span class="step-badge">4</span>
                    \(-6 = -2x\)
                </div>

                <div class="catatan-kanan">
                    Hasil dari \(0 - 6\) adalah \(-6\), sedangkan \(6 - 6 = 0\).
                    Jadi diperoleh \(-6 = -2x\).

                    <br>
                    <button class="btn-step-text" type="button" onclick="openStep('Ax5', this)">
                        Tampilkan langkah berikutnya ↓
                    </button>
                </div>
            </div>

            {{-- STEP 5 --}}
            <div id="Ax5" class="baris-penyelesaian" style="display:none;">
                <div class="rumus-kiri">
                    <span class="step-badge">5</span>
                    \(\dfrac{-6}{-2} = \dfrac{-2x}{-2}\)
                </div>

                <div class="catatan-kanan">
                    Bagi kedua ruas dengan \(-2\), karena koefisien dari \(x\) adalah \(-2\).

                    <br>
                    <button class="btn-step-text" type="button" onclick="openStep('Ax6', this)">
                        Tampilkan hasil titik potong ↓
                    </button>
                </div>
            </div>

            {{-- STEP 6 --}}
            <div id="Ax6" class="baris-penyelesaian" style="display:none;">
                <div class="rumus-kiri rumus-dua-baris hasil-akhir">
                    <span class="step-badge">6</span>
                    \(x = 3\) <br>
                    \(\Rightarrow A(3,0)\)
                </div>

                <div class="catatan-kanan">
                    Diperoleh \(x = 3\). Karena titik potong sumbu \(x\) memiliki \(y = 0\),
                    maka titik potong sumbu \(x\) adalah <b>\(A(3,0)\)</b>.
                </div>
            </div>

        </div>

        <hr class="my-4">

        {{-- ======================= --}}
        {{-- B. Titik potong sumbu Y --}}
        {{-- ======================= --}}

        <h6 class="fw-bold mb-2">b. Menentukan titik potong dengan sumbu \(y\)</h6>

        <p class="mb-3" style="line-height:1.8; text-align:justify;">
            Titik potong sumbu \(y\) terjadi saat nilai <b>\(x = 0\)</b>.
        </p>

        <div class="penyelesaian-sejajar">

            {{-- STEP 1 --}}
            <div class="baris-penyelesaian">
                <div class="rumus-kiri">
                    <span class="step-badge">1</span>
                    \(y = -2x + 6\)
                </div>

                <div class="catatan-kanan">
                    Mulai dari persamaan garis dalam bentuk eksplisit.

                    <br>
                    <button class="btn-step-text" type="button" onclick="openStep('By2', this)">
                        Tampilkan langkah berikutnya ↓
                    </button>
                </div>
            </div>

            {{-- STEP 2 --}}
            <div id="By2" class="baris-penyelesaian" style="display:none;">
                <div class="rumus-kiri">
                    <span class="step-badge">2</span>
                    \(y = -2(0) + 6\)
                </div>

                <div class="catatan-kanan">
                    Karena titik potong sumbu \(y\) terjadi saat \(x = 0\), maka nilai \(x\)
                    pada persamaan diganti dengan \(0\).

                    <br>
                    <button class="btn-step-text" type="button" onclick="openStep('By3', this)">
                        Tampilkan langkah berikutnya ↓
                    </button>
                </div>
            </div>

            {{-- STEP 3 --}}
            <div id="By3" class="baris-penyelesaian" style="display:none;">
                <div class="rumus-kiri">
                    <span class="step-badge">3</span>
                    \(y = 0 + 6\)
                </div>

                <div class="catatan-kanan">
                    Hitung \(-2(0)\). Karena bilangan apa pun dikali \(0\) hasilnya \(0\),
                    maka diperoleh \(y = 0 + 6\).

                    <br>
                    <button class="btn-step-text" type="button" onclick="openStep('By4', this)">
                        Tampilkan hasil titik potong ↓
                    </button>
                </div>
            </div>

            {{-- STEP 4 --}}
            <div id="By4" class="baris-penyelesaian" style="display:none;">
                <div class="rumus-kiri rumus-dua-baris hasil-akhir">
                    <span class="step-badge">4</span>
                    \(y = 6\) <br>
                    \(\Rightarrow B(0,6)\)
                </div>

                <div class="catatan-kanan">
                    Diperoleh \(y = 6\). Karena titik potong sumbu \(y\) memiliki \(x = 0\),
                    maka titik potong sumbu \(y\) adalah <b>\(B(0,6)\)</b>.
                </div>
            </div>

        </div>

        <hr class="my-4">

        <p class="mb-2" style="line-height:1.8; text-align:justify;">
            Dua titik potong tersebut dapat dituliskan dalam tabel pasangan nilai \((x,y)\) berikut.
        </p>

        <div class="table-responsive mx-auto" style="max-width:450px;">
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
                        <td>\(3\)</td>
                        <td>\(0\)</td>
                        <td>\((3,0)\)</td>
                    </tr>
                    <tr>
                        <td>\(0\)</td>
                        <td>\(6\)</td>
                        <td>\((0,6)\)</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <p class="mt-3 mb-2" style="line-height:1.8; text-align:justify;">
            Selanjutnya, gambarkan titik <b>\((3,0)\)</b> dan <b>\((0,6)\)</b> pada bidang koordinat Kartesius,
            lalu hubungkan kedua titik tersebut sehingga terbentuk grafik persamaan garis lurus
            \(y = -2x + 6\).
        </p>

        <div class="box-info mb-3" style="background:#fff;">
            <div class="petunjuk-mini-latihan">
                <strong>Petunjuk:</strong>
                Klik titik potong sumbu \(x\), yaitu <b>A(3,0)</b>, dan titik potong sumbu \(y\),
                yaitu <b>B(0,6)</b>, pada bidang koordinat Kartesius. Setelah kedua titik tepat,
                klik tombol <strong>Hubungkan Titik</strong> untuk membentuk grafik garis lurus.
            </div>

            <div class="plot-contoh-row">
                <div class="canvas-responsive">
                    <div id="canvas-contoh-22"></div>
                </div>

                <div class="plot-info-side">
                    <div id="infoContoh22" class="info-aktivitas">
                        Klik titik <b>A(3,0)</b> pada bidang koordinat.
                    </div>

                    <div class="d-flex gap-2 flex-wrap mt-3">
                        <button id="btnHubungkan22" class="btn-palet btn btn-sm" onclick="hubungkanContoh22()" disabled>
                            Hubungkan Titik
                        </button>

                        <button class="btn-palet btn btn-sm" onclick="resetContoh22()">
                            Reset
                        </button>
                    </div>
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

    {{-- ===== Latihan Soal A2.2 ===== --}}
    <div class="box-latihan mt-5">
        <div class="card-body">
            <span class="title-box">Latihan Soal</span>
            <!-- ===================== -->
            <!-- LATIHAN 1 -->
            <!-- ===================== -->
            <div class="latihan-step" id="latihanStep1">
                <h5 class="mt-3 fw-bold">Menggambar grafik dari bentuk \(y = mx + c\)</h5>

                <p class="mb-2">
                    Diketahui persamaan garis <b>\(y=2x+4\)</b>.
                    Tentukan titik potong garis dengan sumbu \(x\) dan sumbu \(y\),
                    kemudian gambarkan grafiknya pada bidang koordinat.
                </p>

                <div class="petunjuk-mini-latihan">
                    <strong>Petunjuk Pengerjaan:</strong>
                    Isi seluruh kotak jawaban, lalu klik tombol
                    <strong>Cek Jawaban</strong>.
                    Kotak hijau menunjukkan jawaban benar dan kotak merah menunjukkan jawaban salah.
                    Jika semua jawaban benar, bidang koordinat akan muncul.
                </div>

                <div class="box-info mb-3">
                    <h6 class="fw-bold">A. Titik potong dengan sumbu x</h6>
                    <p>Untuk mencari titik potong dengan sumbu x, substitusikan <b>\(y = 0\)</b>.</p>
                    <p>$y = 2x + 4$</p>
                    <p>$0 = 2x + 4$</p>

                    <p>
                        $x = $
                        <input type="text" id="l1_x_value"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                    </p>

                    <p>
                        Titik potong sumbu $x$:
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
                    <p>Untuk mencari titik potong dengan sumbu y, substitusikan <b>$x = 0$</b>.</p>
                    <p>$y = 2x + 4$</p>
                    <p>$y = 2(0) + 4$</p>

                    <p>
                        $y =$
                        <input type="text" id="l1_y_value"
                            class="form-control form-control-sm d-inline-block text-center input-matematika"
                            style="width:70px;">
                    </p>

                    <p>
                        Titik potong sumbu $y$:
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
                    <div class="grafik-latihan-layout">
                        <div class="grafik-wrapper">
                            <div id="canvas-latihan1"></div>
                        </div>

                        <div class="petunjuk-mini-latihan">
                            <strong>Petunjuk Pengerjaan:</strong>
                            Klik titik \((-2,0)\) dan \((0,4)\) pada bidang koordinat.
                            Jika titik yang dipilih salah, kedua titik akan direset secara otomatis.
                            Jika kedua titik benar, garis akan terbentuk.

                            <div id="statusPlotLatihan1A22" class="alert alert-info py-2 px-3 mt-2 mb-0">
                                Klik titik \((-2,0)\) dan \((0,4)\).
                            </div>
                        </div>
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

                <h5 class="mt-3 fw-bold">Menggambar grafik dari bentuk $Ax + By + C = 0$</h5>

                <p class="mb-2">
                    Diketahui persamaan garis <b>\(3x+4y-24=0\)</b>.
                    Tentukan titik potong garis dengan sumbu \(x\) dan sumbu \(y\),
                    kemudian gambarkan grafiknya pada bidang koordinat.
                </p>

                <div class="petunjuk-mini-latihan">
                    <strong>Petunjuk Pengerjaan:</strong>
                    Isi seluruh kotak jawaban, lalu klik tombol
                    <strong>Cek Jawaban</strong>.
                    Kotak hijau menunjukkan jawaban benar dan kotak merah menunjukkan jawaban salah.
                    Jika semua jawaban benar, bidang koordinat akan muncul.
                </div>

                <div class="box-info mb-3">
                    <h6 class="fw-bold">A. Titik potong dengan sumbu x</h6>
                    <p>Untuk mencari titik potong dengan sumbu x, substitusikan <b>$y = 0$</b>.</p>
                    <p>$3x + 4y - 24 = 0$</p>
                    <p>$3x + 4(0) - 24 = 0$</p>

                    <p>
                        $x =$
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
                    <p>Untuk mencari titik potong dengan sumbu y, substitusikan <b>$x = 0$</b>.</p>
                    <p>$3x + 4y - 24 = 0$</p>
                    <p>$3(0) + 4y - 24 = 0$</p>

                    <p>
                        $y =$
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
                    <div class="grafik-latihan-layout">
                        <div class="grafik-wrapper">
                            <div id="canvas-latihan2"></div>
                        </div>

                        <div class="petunjuk-mini-latihan">
                            <strong>Petunjuk Pengerjaan:</strong>
                            Klik titik \((8,0)\) dan \((0,6)\) pada bidang koordinat.
                            Jika titik yang dipilih salah, kedua titik akan direset secara otomatis.
                            Jika kedua titik benar, garis akan terbentuk.

                            <div id="statusPlotLatihan2A22" class="alert alert-info py-2 px-3 mt-2 mb-0">
                                Klik titik \((8,0)\) dan \((0,6)\).
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-kesimpulan mt-3" id="kesimpulanLatihan2A22" style="display:none;">
                    <p class="mb-1" style="font-weight:700;">Kesimpulan:</p>
                    <p class="mb-0">
                        Grafik persamaan garis lurus dapat digambar dengan menentukan dua titik potong,
                        yaitu titik potong dengan sumbu $x$ dan titik potong dengan sumbu $y$.
                        Setelah kedua titik diperoleh, hubungkan kedua titik tersebut sehingga terbentuk garis lurus.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/subbabA/latsol2_2.js') }}"></script>

    {{-- Script complete --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        window.completeMateriUrl = "{{ route('materi.complete', $materi->id) }}";
        window.nextMateriUrl = @json($nextMateri ? route('materi.show', $nextMateri->slug) : null);
    </script>

    {{-- P5 Contoh Plotting --}}
    <script>
        // =========================
        // Contoh 2.2 - Menggambar Grafik dengan Dua Titik
        // =========================

        let targetContoh22 = [{
                nama: "A",
                x: 3,
                y: 0
            },
            {
                nama: "B",
                x: 0,
                y: 6
            },
        ];

        let indeksContoh22 = 0;
        let titikContoh22Benar = [];
        let titikContoh22Percobaan = null;
        let garisContoh22Terbentuk = false;

        function updateInfoContoh22() {
            const infoBox = document.getElementById("infoContoh22");
            const btnHubungkan = document.getElementById("btnHubungkan22");

            if (!infoBox) return;

            if (indeksContoh22 >= targetContoh22.length && !garisContoh22Terbentuk) {
                infoBox.innerHTML =
                    `Bagus! Titik $A(3,0)$ dan $B(0,6)$ sudah tepat. Klik tombol <b>Hubungkan Titik</b> untuk membentuk grafik garis lurus.`;

                if (btnHubungkan) btnHubungkan.disabled = false;
                renderMathContoh22(infoBox);
                return;
            }

            if (garisContoh22Terbentuk) {
                infoBox.innerHTML =
                    `Bagus! Kedua titik sudah dihubungkan sehingga membentuk grafik garis lurus dari persamaan <b>$2x + y = 6$</b>.`;

                if (btnHubungkan) btnHubungkan.disabled = true;
                renderMathContoh22(infoBox);
                return;
            }

            const titik = targetContoh22[indeksContoh22];

            infoBox.innerHTML =
                `Klik titik <b>${titik.nama}(${titik.x},${titik.y})</b> pada bidang koordinat.`;

            if (btnHubungkan) btnHubungkan.disabled = true;
        }

        function renderMathContoh22(target) {
            if (!target || typeof renderMathInElement !== "function") return;

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
                ],
            });
        }

        const sketchContoh22 = (p) => {
            const gridSize = 300;

            const leftMargin = 42;
            const topMargin = 36;
            const rightMargin = 42;
            const bottomMargin = 26;

            const canvasW = leftMargin + gridSize + rightMargin;
            const canvasH = topMargin + gridSize + bottomMargin;

            const minX = -1;
            const maxX = 7;
            const minY = -1;
            const maxY = 7;

            let scaleUnit;
            let originX;
            let originY;
            let lastClickTime = 0;

            p.setup = function() {
                const canvas = p.createCanvas(canvasW, canvasH);
                canvas.parent("canvas-contoh-22");

                scaleUnit = gridSize / (maxX - minX);

                originX = leftMargin + (-minX * scaleUnit);
                originY = topMargin + (maxY * scaleUnit);
                canvas.mousePressed(function() {
                    handleKlikContoh22();
                    return false;
                });

                updateInfoContoh22();
            };

            p.draw = function() {
                p.background(250);

                drawGrid();

                if (garisContoh22Terbentuk) {
                    drawGaris();
                }

                drawTitikBenar();

                if (titikContoh22Percobaan) {
                    drawTitikPercobaan();
                }
            };

            function handleKlikContoh22() {
                if (p.millis() - lastClickTime < 300) return;

                lastClickTime = p.millis();

                if (indeksContoh22 >= targetContoh22.length) return;

                const koordinat = pixelToCoord(p.mouseX, p.mouseY);
                if (!koordinat) return;

                const target = targetContoh22[indeksContoh22];

                if (koordinat.x === target.x && koordinat.y === target.y) {
                    titikContoh22Benar.push({
                        nama: target.nama,
                        x: target.x,
                        y: target.y,
                    });

                    titikContoh22Percobaan = null;
                    indeksContoh22++;

                    updateInfoContoh22();
                } else {
                    titikContoh22Percobaan = {
                        x: koordinat.x,
                        y: koordinat.y,
                    };

                    const infoBox = document.getElementById("infoContoh22");

                    if (infoBox) {
                        infoBox.innerHTML =
                            `Titik yang kamu klik belum tepat. Coba perhatikan kembali koordinat titik yang diminta.`;
                    }
                }
            }

            function drawGrid() {
                p.push();

                p.stroke(225);
                p.strokeWeight(1);

                for (let i = minX; i <= maxX; i++) {
                    const x = toPixelX(i);
                    p.line(x, toPixelY(minY), x, toPixelY(maxY));
                }

                for (let j = minY; j <= maxY; j++) {
                    const y = toPixelY(j);
                    p.line(toPixelX(minX), y, toPixelX(maxX), y);
                }

                p.stroke(0);
                p.strokeWeight(2);

                // Sumbu x dan sumbu y
                p.line(toPixelX(minX), toPixelY(0), toPixelX(maxX) + 20, toPixelY(0));
                p.line(toPixelX(0), toPixelY(minY), toPixelX(0), toPixelY(maxY) - 20);

                p.noStroke();
                p.fill(0);
                p.textSize(12);
                p.textAlign(p.CENTER, p.CENTER);

                for (let i = minX; i <= maxX; i++) {
                    if (i !== 0) {
                        p.text(i, toPixelX(i), toPixelY(0) + 18);
                    }
                }

                for (let j = minY; j <= maxY; j++) {
                    if (j !== 0) {
                        p.text(j, toPixelX(0) - 20, toPixelY(j));
                    }
                }

                p.text("0", toPixelX(0) - 12, toPixelY(0) + 18);

                p.textSize(16);
                p.text("x", toPixelX(maxX) + 34, toPixelY(0));
                p.text("y", toPixelX(0), toPixelY(maxY) - 32);

                p.pop();
            }

            function drawTitikBenar() {
                p.push();

                titikContoh22Benar.forEach((t) => {
                    const px = toPixelX(t.x);
                    const py = toPixelY(t.y);

                    p.fill(0, 102, 204);
                    p.noStroke();
                    p.circle(px, py, 12);

                    p.fill(0);
                    p.textSize(14);
                    p.textAlign(p.LEFT, p.BOTTOM);

                    let labelX = px + 8;
                    let labelY = py - 6;

                    if (t.x === 0) labelX = px + 10;
                    if (t.y === 0) labelY = py - 10;

                    p.text(`${t.nama}(${t.x},${t.y})`, labelX, labelY);
                });

                p.pop();
            }

            function drawTitikPercobaan() {
                const px = toPixelX(titikContoh22Percobaan.x);
                const py = toPixelY(titikContoh22Percobaan.y);

                p.push();

                p.stroke(220, 0, 0);
                p.strokeWeight(3);
                p.line(px - 7, py - 7, px + 7, py + 7);
                p.line(px + 7, py - 7, px - 7, py + 7);

                p.pop();
            }

            function drawGaris() {
                if (titikContoh22Benar.length < 2) return;

                const A = titikContoh22Benar[0];
                const B = titikContoh22Benar[1];

                p.push();

                p.stroke(30, 150, 70);
                p.strokeWeight(3);

                p.line(
                    toPixelX(A.x),
                    toPixelY(A.y),
                    toPixelX(B.x),
                    toPixelY(B.y)
                );

                p.pop();
            }

            function pixelToCoord(px, py) {
                const batasKiri = toPixelX(minX);
                const batasKanan = toPixelX(maxX);
                const batasAtas = toPixelY(maxY);
                const batasBawah = toPixelY(minY);

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

            function toPixelX(x) {
                return originX + x * scaleUnit;
            }

            function toPixelY(y) {
                return originY - y * scaleUnit;
            }
        };

        document.addEventListener("DOMContentLoaded", function() {
            if (document.getElementById("canvas-contoh-22")) {
                new p5(sketchContoh22);
            }
        });

        function hubungkanContoh22() {
            if (titikContoh22Benar.length < 2) return;

            garisContoh22Terbentuk = true;
            updateInfoContoh22();
        }

        function resetContoh22() {
            indeksContoh22 = 0;
            titikContoh22Benar = [];
            titikContoh22Percobaan = null;
            garisContoh22Terbentuk = false;

            updateInfoContoh22();
        }
    </script>

    {{-- Latihan Soal --}}
    <script>
        // Skrip contoh perhitungan titik potong
        function openStep(id, btn) {
            const next = document.getElementById(id);
            if (!next) return;

            next.style.display = "block";
            btn.style.display = "none";
        }
        // =========================
        // LATIHAN SOAL A2.2
        // =========================

        let latihan1BenarA22 = false;
        let latihan2BenarA22 = false;

        let sketchLatihan1Instance = null;
        let sketchLatihan2Instance = null;

        // titik potong yang benar untuk y = 2x + 4
        const expectedA1 = {
            x: -2,
            y: 0
        };
        const expectedB1 = {
            x: 0,
            y: 4
        };

        // titik potong benar untuk 3x + 4y - 24 = 0
        const expectedA2 = {
            x: 8,
            y: 0
        };
        const expectedB2 = {
            x: 0,
            y: 6
        };

        // =========================
        // HELPER
        // =========================
        function renderMathSafe(target) {
            if (!target || !window.renderMathInElement) return;

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
            });
        }

        function normJawaban(v) {
            return String(v || "")
                .trim()
                .replace(/\s+/g, "")
                .replace(",", ".");
        }

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

        function setFeedback(id, benar, pesan) {
            const element = document.getElementById(id);
            if (!element) return;

            element.className = "mt-3";
            element.style.display = "block";

            element.innerHTML = `
        <div
            class="alert ${
                benar ? "alert-success" : "alert-danger"
            } d-table text-start py-2 px-3 mb-0"
            role="alert"
        >
            <strong>
                ${benar ? "Benar." : "Belum tepat."}
            </strong>
            ${pesan}
        </div>
    `;

            renderMathSafe(element);
        }

        function resetFeedback(id) {
            const element = document.getElementById(id);
            if (!element) return;

            element.innerHTML = "";
            element.className = "mt-3";
            element.style.display = "none";
        }

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
            for (let i = stepMulai; i <= 2; i++) {
                const step = document.getElementById(`latihanStep${i}`);
                if (step) step.style.display = "none";
            }
        }
        // Set Status Plot
        function setStatusPlotLatihan(id, pesan, tipe = "info") {
            const element = document.getElementById(id);
            if (!element) return;

            element.className =
                `alert alert-${tipe} py-2 px-3 mt-2 mb-0`;

            element.innerHTML = pesan;

            renderMathSafe(element);
        }

        // Simpan Jawaban Latihan
        function ambilJawabanLatihan1A22() {
            return {
                l1_x_value: document.getElementById("l1_x_value")?.value.trim() ?? "",
                l1_x_point_x: document.getElementById("l1_x_point_x")?.value.trim() ?? "",
                l1_x_point_y: document.getElementById("l1_x_point_y")?.value.trim() ?? "",
                l1_y_value: document.getElementById("l1_y_value")?.value.trim() ?? "",
                l1_y_point_x: document.getElementById("l1_y_point_x")?.value.trim() ?? "",
                l1_y_point_y: document.getElementById("l1_y_point_y")?.value.trim() ?? "",
            };
        }

        function ambilJawabanLatihan2A22() {
            return {
                l2_x_value: document.getElementById("l2_x_value")?.value.trim() ?? "",
                l2_x_point_x: document.getElementById("l2_x_point_x")?.value.trim() ?? "",
                l2_x_point_y: document.getElementById("l2_x_point_y")?.value.trim() ?? "",
                l2_y_value: document.getElementById("l2_y_value")?.value.trim() ?? "",
                l2_y_point_x: document.getElementById("l2_y_point_x")?.value.trim() ?? "",
                l2_y_point_y: document.getElementById("l2_y_point_y")?.value.trim() ?? "",
            };
        }

        // =========================
        // SAVE PROGRESS
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
                console.log("Simpan latihan A2.2:", data);

                return response.ok;
            } catch (error) {
                console.error("Gagal menyimpan latihan A2.2:", error);
                return false;
            }
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

        function bukaQuizButton() {
            const quizBtn = document.getElementById("quizBabBtn");
            if (!quizBtn) return;

            const url = quizBtn.dataset.quizUrl;
            if (!url) return;

            const link = document.createElement("a");
            link.href = url;
            link.id = "quizBabBtn";
            link.className = "btn btn-next px-4 rounded-pill fw-semibold";
            link.textContent = "Kuis →";

            quizBtn.replaceWith(link);
        }

        // =========================
        // LATIHAN 1 A2.2
        // y = 2x + 4
        // titik potong x = (-2, 0)
        // titik potong y = (0, 4)
        // =========================
        async function cekLatihan1A22() {
            const benar1 = cekIsian("l1_x_value", "-2");
            const benar2 = cekIsian("l1_x_point_x", "-2");
            const benar3 = cekIsian("l1_x_point_y", "0");

            const benar4 = cekIsian("l1_y_value", "4");
            const benar5 = cekIsian("l1_y_point_x", "0");
            const benar6 = cekIsian("l1_y_point_y", "4");

            const semuaBenar = benar1 && benar2 && benar3 && benar4 && benar5 && benar6;
            const nextBtn = document.getElementById("nextBtnLatihan1");

            if (semuaBenar) {
                latihan1BenarA22 = true;

                setFeedback(
                    "feedbackLatihan1A22",
                    true,
                    "Semua jawaban sudah tepat. Silakan lanjut membuat grafik."
                );
                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L1_ISIAN`,
                    "input",
                    ambilJawabanLatihan1A22(),
                    true
                );
                tampilkanCanvasLatihan1();
            } else {
                latihan1BenarA22 = false;

                setFeedback(
                    "feedbackLatihan1A22",
                    false,
                    "Periksa kembali kotak jawaban yang berwarna merah."
                );

                resetCanvasLatihan1();

                if (nextBtn) nextBtn.disabled = true;

                resetStepSetelah(2);
            }
        }

        function resetLatihan1A22() {
            [
                "l1_x_value",
                "l1_x_point_x",
                "l1_x_point_y",
                "l1_y_value",
                "l1_y_point_x",
                "l1_y_point_y",
            ].forEach((id) => {
                const el = document.getElementById(id);
                if (el) {
                    el.value = "";
                    el.classList.remove("is-valid", "is-invalid");
                }
            });

            const nextBtn = document.getElementById("nextBtnLatihan1");

            resetFeedback("feedbackLatihan1A22");

            if (nextBtn) nextBtn.disabled = true;

            latihan1BenarA22 = false;
            resetCanvasLatihan1();
            resetStepSetelah(2);
        }

        function tampilkanCanvasLatihan1(autoScroll = true) {
            const wrap = document.getElementById("canvas-latihan1-wrap");
            if (wrap) wrap.style.display = "block";

            if (sketchLatihan1Instance) {
                sketchLatihan1Instance.remove();
                sketchLatihan1Instance = null;
            }

            const holder = document.getElementById("canvas-latihan1");
            if (holder) holder.innerHTML = "";

            sketchLatihan1Instance = new p5(
                sketchLatihan1,
                "canvas-latihan1"
            );

            if (autoScroll) {
                setTimeout(() => {
                    scrollKeStep("feedbackLatihan1A22");
                }, 100);
            }
        }

        function resetCanvasLatihan1() {
            if (sketchLatihan1Instance) {
                sketchLatihan1Instance.remove();
                sketchLatihan1Instance = null;
            }

            const holder = document.getElementById("canvas-latihan1");
            if (holder) holder.innerHTML = "";

            const wrap = document.getElementById("canvas-latihan1-wrap");
            if (wrap) wrap.style.display = "none";
        }

        // =========================
        // LATIHAN 2 A2.2
        // 3x + 4y - 24 = 0
        // titik potong x = (8, 0)
        // titik potong y = (0, 6)
        // =========================
        async function cekLatihan2A22() {
            const benar1 = cekIsian("l2_x_value", "8");
            const benar2 = cekIsian("l2_x_point_x", "8");
            const benar3 = cekIsian("l2_x_point_y", "0");

            const benar4 = cekIsian("l2_y_value", "6");
            const benar5 = cekIsian("l2_y_point_x", "0");
            const benar6 = cekIsian("l2_y_point_y", "6");

            const semuaBenar = benar1 && benar2 && benar3 && benar4 && benar5 && benar6;

            if (semuaBenar) {
                latihan2BenarA22 = true;

                setFeedback(
                    "feedbackLatihan2A22",
                    true,
                    "Semua jawaban sudah tepat. Silakan lanjut membuat grafik."
                );

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L2_ISIAN`,
                    "input",
                    ambilJawabanLatihan2A22(),
                    true
                );

                tampilkanCanvasLatihan2();
            } else {
                latihan2BenarA22 = false;

                setFeedback(
                    "feedbackLatihan2A22",
                    false,
                    "Periksa kembali kotak jawaban yang berwarna merah."
                );

                resetCanvasLatihan2();

                const kesimpulan = document.getElementById("kesimpulanLatihan2A22");
                if (kesimpulan) kesimpulan.style.display = "none";
            }
        }

        function resetLatihan2A22() {
            [
                "l2_x_value",
                "l2_x_point_x",
                "l2_x_point_y",
                "l2_y_value",
                "l2_y_point_x",
                "l2_y_point_y",
            ].forEach((id) => {
                const el = document.getElementById(id);
                if (el) {
                    el.value = "";
                    el.classList.remove("is-valid", "is-invalid");
                }
            });

            resetFeedback("feedbackLatihan2A22");

            latihan2BenarA22 = false;
            resetCanvasLatihan2();

            const kesimpulan = document.getElementById("kesimpulanLatihan2A22");
            if (kesimpulan) kesimpulan.style.display = "none";
        }

        function tampilkanCanvasLatihan2(autoScroll = true) {
            const wrap = document.getElementById("canvas-latihan2-wrap");
            if (wrap) wrap.style.display = "block";

            if (sketchLatihan2Instance) {
                sketchLatihan2Instance.remove();
                sketchLatihan2Instance = null;
            }

            const holder = document.getElementById("canvas-latihan2");
            if (holder) holder.innerHTML = "";

            sketchLatihan2Instance = new p5(
                sketchLatihan2,
                "canvas-latihan2"
            );

            if (autoScroll) {
                setTimeout(() => {
                    scrollKeStep("feedbackLatihan2A22");
                }, 100);
            }
        }

        function resetCanvasLatihan2() {
            if (sketchLatihan2Instance) {
                sketchLatihan2Instance.remove();
                sketchLatihan2Instance = null;
            }

            const holder = document.getElementById("canvas-latihan2");
            if (holder) holder.innerHTML = "";

            const wrap = document.getElementById("canvas-latihan2-wrap");
            if (wrap) wrap.style.display = "none";
        }

        // =========================
        // P5 SKETCH LATIHAN 1
        // =========================
        const sketchLatihan1 = (p) => {
            const gridSize = 420;
            const leftMargin = 40;
            const topMargin = 40;

            const xMin = -4;
            const xMax = 4;
            const yMin = -2;
            const yMax = 6;

            let originX, originY, scaleUnit;
            let titikA = null;
            let titikB = null;

            let plottingSelesai = false;
            let plottingBenar = false;
            let waktuReset = null;

            let feedbackPlot =
                "Klik dua titik potong yang benar pada bidang koordinat.";

            p.setup = function() {
                p.createCanvas(500, 500);

                scaleUnit = gridSize / Math.max(xMax - xMin, yMax - yMin);
                originX = leftMargin + (-xMin * scaleUnit);
                originY = topMargin + (yMax * scaleUnit);
            };

            p.draw = function() {
                p.background(255);

                drawGrid();

                if (titikA) drawPoint(titikA.x, titikA.y, "A");
                if (titikB) drawPoint(titikB.x, titikB.y, "B");

                if (titikA && titikB) {
                    drawLineThroughPoints(titikA, titikB);
                }

                if (waktuReset !== null && p.millis() >= waktuReset) {
                    resetPlot();
                    waktuReset = null;
                }
            };

            p.mousePressed = async function() {
                if (!latihan1BenarA22) return;

                const pt = pixelToCoord(p.mouseX, p.mouseY);
                if (!pt) return;

                if (waktuReset !== null) return;

                if (!titikA) {
                    titikA = pt;
                    feedbackPlot = `Titik A dipilih di ${formatPoint(pt)}. Sekarang klik titik kedua.`;
                    setStatusPlotLatihan(
                        "statusPlotLatihan1A22",
                        `Titik A dipilih di <b>${formatPoint(pt)}</b>. Sekarang klik titik kedua.`
                    );
                    return;
                }

                if (!titikB) {
                    if (isSamePoint(pt, titikA)) {
                        feedbackPlot =
                            "Titik kedua tidak boleh sama dengan titik pertama.";
                        return;
                    }

                    titikB = pt;
                    plottingSelesai = true;

                    if (isCorrectPair(titikA, titikB, expectedA1, expectedB1)) {
                        plottingBenar = true;
                        feedbackPlot =
                            "Bagus! Garis yang kamu buat sudah melalui dua titik potong yang benar.";
                        setStatusPlotLatihan(
                            "statusPlotLatihan1A22",
                            "Bagus! Garis yang kamu buat sudah melalui titik <b>(-2, 0)</b> dan <b>(0, 4)</b>."
                        );

                        const nextBtn = document.getElementById("nextBtnLatihan1");
                        if (nextBtn) {
                            nextBtn.disabled = false;
                            nextBtn.style.display = "inline-block";
                        }

                        await simpanProgressLatihan(
                            `${MATERI_SLUG}_L1`,
                            "grafik", {
                                ...ambilJawabanLatihan1A22(),
                                titikA: titikA,
                                titikB: titikB,
                                plottingBenar: true,
                            },
                            true
                        );

                        setTimeout(() => {
                            scrollKeStep("nextBtnLatihan1");
                        }, 300);
                    } else {
                        plottingBenar = false;
                        feedbackPlot = "Garis belum sesuai. Coba lagi sampai benar.";
                        setStatusPlotLatihan(
                            "statusPlotLatihan1A22",
                            "Garis belum sesuai. Coba klik titik <b>(-2, 0)</b> dan <b>(0, 4)</b>."
                        );
                        waktuReset = p.millis() + 1200;
                    }
                }
            };

            function resetPlot() {
                titikA = null;
                titikB = null;
                plottingSelesai = false;
                plottingBenar = false;
                feedbackPlot =
                    "Klik dua titik potong yang benar pada bidang koordinat.";
            }

            // Restore Plot
            window.restorePlotLatihan1A22 = function(saved) {
                if (!saved || !saved.titikA || !saved.titikB) return;

                titikA = saved.titikA;
                titikB = saved.titikB;
                plottingSelesai = true;
                plottingBenar = true;
                waktuReset = null;

                feedbackPlot =
                    "Jawaban grafik Latihan 1 sudah tersimpan. Garis sudah melalui dua titik potong yang benar.";

                const nextBtn = document.getElementById("nextBtnLatihan1");
                if (nextBtn) {
                    nextBtn.disabled = false;
                    nextBtn.style.display = "inline-block";
                }
            };

            function isSamePoint(p1, p2) {
                return p1 && p2 && p1.x === p2.x && p1.y === p2.y;
            }

            function isPointEqual(p1, p2) {
                return p1.x === p2.x && p1.y === p2.y;
            }

            function isCorrectPair(a, b, expected1, expected2) {
                return (
                    (isPointEqual(a, expected1) && isPointEqual(b, expected2)) ||
                    (isPointEqual(a, expected2) && isPointEqual(b, expected1))
                );
            }

            function formatPoint(pt) {
                return `(${pt.x},${pt.y})`;
            }

            function drawGrid() {
                p.stroke(230);
                p.strokeWeight(1);

                for (let x = xMin; x <= xMax; x++) {
                    const px = toPixelX(x);
                    p.line(px, topMargin, px, topMargin + gridSize);
                }

                for (let y = yMin; y <= yMax; y++) {
                    const py = toPixelY(y);
                    p.line(leftMargin, py, leftMargin + gridSize, py);
                }

                // sumbu x
                if (yMin <= 0 && yMax >= 0) {
                    p.stroke(0);
                    p.strokeWeight(2);
                    p.line(leftMargin, toPixelY(0), leftMargin + gridSize, toPixelY(0));
                }

                // sumbu y
                if (xMin <= 0 && xMax >= 0) {
                    p.stroke(0);
                    p.strokeWeight(2);
                    p.line(toPixelX(0), topMargin, toPixelX(0), topMargin + gridSize);
                }

                p.noStroke();
                p.fill(0);
                p.textAlign(p.CENTER, p.CENTER);
                p.textSize(12);

                for (let x = xMin; x <= xMax; x++) {
                    const px = toPixelX(x);
                    if (x !== 0) p.text(x, px, toPixelY(0) + 18);
                }

                for (let y = yMin; y <= yMax; y++) {
                    const py = toPixelY(y);
                    if (y !== 0) p.text(y, toPixelX(0) - 18, py);
                }

                p.text("0", toPixelX(0) - 10, toPixelY(0) + 18);

                p.textSize(16);
                p.text("X", leftMargin + gridSize + 16, toPixelY(0));
                p.text("Y", toPixelX(0), topMargin - 16);
            }

            function drawPoint(x, y, label) {
                const px = toPixelX(x);
                const py = toPixelY(y);

                p.fill(220, 0, 0);
                p.noStroke();
                p.circle(px, py, 10);

                p.fill(0);
                p.textAlign(p.LEFT, p.BOTTOM);
                p.textSize(13);
                p.text(label, px + 8, py - 4);
            }

            function drawLineThroughPoints(p1, p2) {
                if (p1.x === p2.x && p1.y === p2.y) return;

                const seg = getClippedLineSegmentInBox(p1.x, p1.y, p2.x, p2.y);
                if (!seg) return;

                p.stroke(
                    plottingSelesai ?
                    plottingBenar ?
                    p.color(30, 150, 70) :
                    p.color(220, 80, 80) :
                    p.color(30, 120, 255),
                );
                p.strokeWeight(3);

                p.line(
                    toPixelX(seg.p1.x),
                    toPixelY(seg.p1.y),
                    toPixelX(seg.p2.x),
                    toPixelY(seg.p2.y),
                );
            }

            function getClippedLineSegmentInBox(x1, y1, x2, y2) {
                if (x1 === x2) {
                    if (x1 < xMin || x1 > xMax) return null;

                    return {
                        p1: {
                            x: x1,
                            y: yMin
                        },
                        p2: {
                            x: x1,
                            y: yMax
                        },
                    };
                }

                const m = (y2 - y1) / (x2 - x1);
                const c = y1 - m * x1;

                const candidates = [{
                        x: xMin,
                        y: m * xMin + c
                    },
                    {
                        x: xMax,
                        y: m * xMax + c
                    },
                ];

                if (m !== 0) {
                    candidates.push({
                        x: (yMin - c) / m,
                        y: yMin
                    });
                    candidates.push({
                        x: (yMax - c) / m,
                        y: yMax
                    });
                } else {
                    if (c < yMin || c > yMax) return null;

                    return {
                        p1: {
                            x: xMin,
                            y: c
                        },
                        p2: {
                            x: xMax,
                            y: c
                        },
                    };
                }

                const inside = candidates.filter(
                    (pt) =>
                    pt.x >= xMin &&
                    pt.x <= xMax &&
                    pt.y >= yMin &&
                    pt.y <= yMax
                );

                if (inside.length < 2) return null;

                let bestPair = [inside[0], inside[1]];
                let bestDist = -1;

                for (let i = 0; i < inside.length; i++) {
                    for (let j = i + 1; j < inside.length; j++) {
                        const dx = inside[i].x - inside[j].x;
                        const dy = inside[i].y - inside[j].y;
                        const d2 = dx * dx + dy * dy;

                        if (d2 > bestDist) {
                            bestDist = d2;
                            bestPair = [inside[i], inside[j]];
                        }
                    }
                }

                return {
                    p1: bestPair[0],
                    p2: bestPair[1],
                };
            }

            function pixelToCoord(px, py) {
                if (
                    px < leftMargin ||
                    px > leftMargin + gridSize ||
                    py < topMargin ||
                    py > topMargin + gridSize
                ) {
                    return null;
                }

                let x = Math.round((px - originX) / scaleUnit);
                let y = Math.round((originY - py) / scaleUnit);

                x = p.constrain(x, xMin, xMax);
                y = p.constrain(y, yMin, yMax);

                return {
                    x,
                    y
                };
            }

            function toPixelX(x) {
                return originX + x * scaleUnit;
            }

            function toPixelY(y) {
                return originY - y * scaleUnit;
            }
        };

        // =========================
        // P5 SKETCH LATIHAN 2
        // =========================
        const sketchLatihan2 = (p) => {
            const leftMargin = 40;
            const topMargin = 40;
            const rightMargin = 40;
            const bottomMargin = 40;

            const xMin = -1;
            const xMax = 9;
            const yMin = -1;
            const yMax = 7;

            let originX, originY, scaleUnit, gridW, gridH;

            let titikA = null;
            let titikB = null;

            let plottingSelesai = false;
            let plottingBenar = false;
            let waktuReset = null;

            let feedbackPlot =
                "Klik dua titik potong yang benar pada bidang koordinat.";

            p.setup = function() {
                scaleUnit = 42;

                gridW = (xMax - xMin) * scaleUnit;
                gridH = (yMax - yMin) * scaleUnit;

                originX = leftMargin + (-xMin * scaleUnit);
                originY = topMargin + (yMax * scaleUnit);

                p.createCanvas(
                    leftMargin + gridW + rightMargin,
                    topMargin + gridH + bottomMargin
                );
            };

            p.draw = function() {
                p.background(255);

                drawGrid();
                if (titikA) drawPoint(titikA.x, titikA.y, "A");
                if (titikB) drawPoint(titikB.x, titikB.y, "B");

                if (titikA && titikB) {
                    drawLineThroughPoints(titikA, titikB);
                }

                if (waktuReset !== null && p.millis() >= waktuReset) {
                    resetPlot();
                    waktuReset = null;
                }
            };

            p.mousePressed = async function() {
                if (!latihan2BenarA22) return;

                const pt = pixelToCoord(p.mouseX, p.mouseY);
                if (!pt) return;

                if (waktuReset !== null) return;

                if (!titikA) {
                    titikA = pt;
                    feedbackPlot = `Titik A dipilih di ${formatPoint(pt)}. Sekarang klik titik kedua.`;
                    setStatusPlotLatihan(
                        "statusPlotLatihan2A22",
                        `Titik A dipilih di <b>${formatPoint(pt)}</b>. Sekarang klik titik kedua.`
                    );
                    return;
                }

                if (!titikB) {
                    if (isSamePoint(pt, titikA)) {
                        feedbackPlot =
                            "Titik kedua tidak boleh sama dengan titik pertama.";
                        return;
                    }

                    titikB = pt;
                    plottingSelesai = true;

                    if (isCorrectPair(titikA, titikB, expectedA2, expectedB2)) {
                        plottingBenar = true;
                        feedbackPlot =
                            "Bagus! Garis yang kamu buat sudah melalui dua titik potong yang benar.";
                        setStatusPlotLatihan(
                            "statusPlotLatihan2A22",
                            "Bagus! Garis yang kamu buat sudah melalui titik <b>(8, 0)</b> dan <b>(0, 6)</b>."
                        );

                        const kesimpulan = document.getElementById(
                            "kesimpulanLatihan2A22",
                        );
                        if (kesimpulan) kesimpulan.style.display = "block";

                        await simpanProgressLatihan(
                            `${MATERI_SLUG}_L2`,
                            "grafik", {
                                ...ambilJawabanLatihan2A22(),
                                titikA: titikA,
                                titikB: titikB,
                                plottingBenar: true,
                            },
                            true
                        );

                        const saved = await saveProgressMateri();

                        if (saved) {
                            bukaQuizButton();
                        } else {
                            setFeedback(
                                "feedbackLatihan2A22",
                                true,
                                "Grafik benar, tetapi progres materi belum tersimpan. Coba refresh atau cek koneksi.",
                            );
                        }
                    } else {
                        plottingBenar = false;
                        feedbackPlot = "Garis belum sesuai. Coba lagi sampai benar.";
                        setStatusPlotLatihan(
                            "statusPlotLatihan2A22",
                            "Garis belum sesuai. Coba klik titik <b>(8, 0)</b> dan <b>(0, 6)</b>."
                        );
                        waktuReset = p.millis() + 1200;
                    }
                }
            };

            function resetPlot() {
                titikA = null;
                titikB = null;
                plottingSelesai = false;
                plottingBenar = false;
                feedbackPlot =
                    "Klik dua titik potong yang benar pada bidang koordinat.";
            }

            window.restorePlotLatihan2A22 = function(saved) {
                if (!saved || !saved.titikA || !saved.titikB) return;

                titikA = saved.titikA;
                titikB = saved.titikB;
                plottingSelesai = true;
                plottingBenar = true;
                waktuReset = null;

                feedbackPlot =
                    "Jawaban grafik Latihan 2 sudah tersimpan. Garis sudah melalui dua titik potong yang benar.";

                const kesimpulan = document.getElementById("kesimpulanLatihan2A22");
                if (kesimpulan) kesimpulan.style.display = "block";
            };

            function isSamePoint(p1, p2) {
                return p1 && p2 && p1.x === p2.x && p1.y === p2.y;
            }

            function isPointEqual(p1, p2) {
                return p1.x === p2.x && p1.y === p2.y;
            }

            function isCorrectPair(a, b, expected1, expected2) {
                return (
                    (isPointEqual(a, expected1) && isPointEqual(b, expected2)) ||
                    (isPointEqual(a, expected2) && isPointEqual(b, expected1))
                );
            }

            function formatPoint(pt) {
                return `(${pt.x},${pt.y})`;
            }

            function drawGrid() {
                p.stroke(230);
                p.strokeWeight(1);

                for (let x = xMin; x <= xMax; x++) {
                    const px = toPixelX(x);
                    p.line(px, topMargin, px, topMargin + gridH);
                }

                for (let y = yMin; y <= yMax; y++) {
                    const py = toPixelY(y);
                    p.line(leftMargin, py, leftMargin + gridW, py);
                }

                // Sumbu x
                if (yMin <= 0 && yMax >= 0) {
                    p.stroke(0);
                    p.strokeWeight(2);
                    p.line(leftMargin, toPixelY(0), leftMargin + gridW, toPixelY(0));
                }

                // Sumbu y
                if (xMin <= 0 && xMax >= 0) {
                    p.stroke(0);
                    p.strokeWeight(2);
                    p.line(toPixelX(0), topMargin, toPixelX(0), topMargin + gridH);
                }

                p.noStroke();
                p.fill(0);
                p.textAlign(p.CENTER, p.CENTER);
                p.textSize(12);

                for (let x = xMin; x <= xMax; x++) {
                    if (x !== 0) {
                        p.text(x, toPixelX(x), toPixelY(0) + 18);
                    }
                }

                for (let y = yMin; y <= yMax; y++) {
                    if (y !== 0) {
                        p.text(y, toPixelX(0) - 18, toPixelY(y));
                    }
                }

                p.text("0", toPixelX(0) - 10, toPixelY(0) + 18);

                p.textSize(16);
                p.text("X", leftMargin + gridW + 16, toPixelY(0));
                p.text("Y", toPixelX(0), topMargin - 16);
            }

            function drawPoint(x, y, label) {
                const px = toPixelX(x);
                const py = toPixelY(y);

                p.fill(220, 0, 0);
                p.noStroke();
                p.circle(px, py, 10);

                p.fill(0);
                p.textAlign(p.LEFT, p.BOTTOM);
                p.textSize(13);
                p.text(label, px + 8, py - 4);
            }

            function drawLineThroughPoints(p1, p2) {
                if (p1.x === p2.x && p1.y === p2.y) return;

                const seg = getClippedLineSegmentInBox(p1.x, p1.y, p2.x, p2.y);
                if (!seg) return;

                p.stroke(
                    plottingSelesai ?
                    plottingBenar ?
                    p.color(30, 150, 70) :
                    p.color(220, 80, 80) :
                    p.color(30, 120, 255),
                );
                p.strokeWeight(3);

                p.line(
                    toPixelX(seg.p1.x),
                    toPixelY(seg.p1.y),
                    toPixelX(seg.p2.x),
                    toPixelY(seg.p2.y),
                );
            }

            function getClippedLineSegmentInBox(x1, y1, x2, y2) {
                if (x1 === x2) {
                    if (x1 < xMin || x1 > xMax) return null;
                    return {
                        p1: {
                            x: x1,
                            y: yMin
                        },
                        p2: {
                            x: x1,
                            y: yMax
                        },
                    };
                }

                const m = (y2 - y1) / (x2 - x1);
                const c = y1 - m * x1;

                const candidates = [{
                        x: xMin,
                        y: m * xMin + c
                    },
                    {
                        x: xMax,
                        y: m * xMax + c
                    },
                ];

                if (m !== 0) {
                    candidates.push({
                        x: (yMin - c) / m,
                        y: yMin
                    });
                    candidates.push({
                        x: (yMax - c) / m,
                        y: yMax
                    });
                } else {
                    if (c < yMin || c > yMax) return null;
                    return {
                        p1: {
                            x: xMin,
                            y: c
                        },
                        p2: {
                            x: xMax,
                            y: c
                        },
                    };
                }

                const inside = candidates.filter(
                    (pt) => pt.x >= xMin && pt.x <= xMax && pt.y >= yMin && pt.y <= yMax
                );

                if (inside.length < 2) return null;

                let bestPair = [inside[0], inside[1]];
                let bestDist = -1;

                for (let i = 0; i < inside.length; i++) {
                    for (let j = i + 1; j < inside.length; j++) {
                        const dx = inside[i].x - inside[j].x;
                        const dy = inside[i].y - inside[j].y;
                        const d2 = dx * dx + dy * dy;

                        if (d2 > bestDist) {
                            bestDist = d2;
                            bestPair = [inside[i], inside[j]];
                        }
                    }
                }

                return {
                    p1: bestPair[0],
                    p2: bestPair[1],
                };
            }

            function pixelToCoord(px, py) {
                if (
                    px < leftMargin ||
                    px > leftMargin + gridW ||
                    py < topMargin ||
                    py > topMargin + gridH
                ) {
                    return null;
                }

                let x = Math.round((px - originX) / scaleUnit);
                let y = Math.round((originY - py) / scaleUnit);

                x = p.constrain(x, xMin, xMax);
                y = p.constrain(y, yMin, yMax);

                return {
                    x,
                    y
                };
            }

            function toPixelX(x) {
                return originX + x * scaleUnit;
            }

            function toPixelY(y) {
                return originY - y * scaleUnit;
            }
        };
    </script>

    {{-- Restore Jawaban Latihan --}}
    <script>
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

        function restoreLatihan1A22() {
            const savedFinal = SAVED_LATIHAN[`${MATERI_SLUG}_L1`]?.jawaban;
            const savedIsian = SAVED_LATIHAN[`${MATERI_SLUG}_L1_ISIAN`]?.jawaban;
            const saved = savedFinal || savedIsian;

            if (!saved) return;

            setValueSafe("l1_x_value", saved.l1_x_value);
            setValueSafe("l1_x_point_x", saved.l1_x_point_x);
            setValueSafe("l1_x_point_y", saved.l1_x_point_y);
            setValueSafe("l1_y_value", saved.l1_y_value);
            setValueSafe("l1_y_point_x", saved.l1_y_point_x);
            setValueSafe("l1_y_point_y", saved.l1_y_point_y);

            beriValid([
                "l1_x_value",
                "l1_x_point_x",
                "l1_x_point_y",
                "l1_y_value",
                "l1_y_point_x",
                "l1_y_point_y",
            ]);

            latihan1BenarA22 = true;

            setFeedback(
                "feedbackLatihan1A22",
                true,
                "Jawaban Latihan 1 sudah tersimpan.",
            );

            tampilkanCanvasLatihan1(false);

            if (savedFinal && savedFinal.plottingBenar) {
                const nextBtn = document.getElementById("nextBtnLatihan1");

                if (nextBtn) {
                    nextBtn.disabled = false;
                    nextBtn.style.display = "inline-block";
                }

                const latihan2 = document.getElementById("latihanStep2");
                if (latihan2) latihan2.style.display = "block";

                setTimeout(() => {
                    if (typeof window.restorePlotLatihan1A22 === "function") {
                        window.restorePlotLatihan1A22(savedFinal);
                    }
                }, 300);
            }
        }

        function restoreLatihan2A22() {
            const savedFinal = SAVED_LATIHAN[`${MATERI_SLUG}_L2`]?.jawaban;
            const savedIsian = SAVED_LATIHAN[`${MATERI_SLUG}_L2_ISIAN`]?.jawaban;
            const saved = savedFinal || savedIsian;

            if (!saved) return;

            const latihan2 = document.getElementById("latihanStep2");
            if (latihan2) latihan2.style.display = "block";

            setValueSafe("l2_x_value", saved.l2_x_value);
            setValueSafe("l2_x_point_x", saved.l2_x_point_x);
            setValueSafe("l2_x_point_y", saved.l2_x_point_y);
            setValueSafe("l2_y_value", saved.l2_y_value);
            setValueSafe("l2_y_point_x", saved.l2_y_point_x);
            setValueSafe("l2_y_point_y", saved.l2_y_point_y);

            beriValid([
                "l2_x_value",
                "l2_x_point_x",
                "l2_x_point_y",
                "l2_y_value",
                "l2_y_point_x",
                "l2_y_point_y",
            ]);

            latihan2BenarA22 = true;

            setFeedback(
                "feedbackLatihan2A22",
                true,
                "Jawaban Latihan 2 sudah tersimpan.",
            );

            tampilkanCanvasLatihan2(false);

            if (savedFinal && savedFinal.plottingBenar) {
                const kesimpulan = document.getElementById("kesimpulanLatihan2A22");
                if (kesimpulan) kesimpulan.style.display = "block";

                setTimeout(() => {
                    if (typeof window.restorePlotLatihan2A22 === "function") {
                        window.restorePlotLatihan2A22(savedFinal);
                    }
                }, 300);

                bukaQuizButton();
            }
        }

        function restoreProgressA22() {
            if (IS_MATERI_COMPLETED) {
                const latihan2 = document.getElementById("latihanStep2");
                if (latihan2) latihan2.style.display = "block";

                bukaQuizButton();
            }

            restoreLatihan1A22();
            restoreLatihan2A22();
        }

        document.addEventListener("DOMContentLoaded", function() {
            restoreProgressA22();
        });
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
