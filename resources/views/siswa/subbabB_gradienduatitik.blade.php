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

        /* tambahan */
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

        .img-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(220px, 1fr));
            gap: 14px;
        }

        .img-grid figure {
            margin: 0;
            text-align: center;
        }

        .img-grid img {
            width: 100%;
            max-width: 420px;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
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
    </style>

    {{-- css pilgan --}}
    <style>
        /* pengantar */
        /* warna ala KA */
        .x-green {
            color: #2e7d32;
            font-weight: 700;
        }

        .y-brown {
            color: #8d6e63;
            font-weight: 700;
        }
    </style>

    {{-- Slider --}}
    <style>
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
    </style>

    <style>
        /* Penjelasan */
        .ka-toggle {
            color: #1a73e8;
            font-weight: 600;
            cursor: pointer;
            user-select: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .ka-toggle:hover {
            text-decoration: underline;
        }

        .ka-chevron {
            display: inline-block;
            transition: transform .15s ease;
            font-size: 14px;
            line-height: 1;
        }

        .ka-chevron.open {
            transform: rotate(180deg);
        }

        /* kotak penjelasan (quote bar kiri) */
        .ka-explain {
            display: none;
            margin-top: 10px;
            padding: 10px 14px;
            border-left: 4px solid #d0d7de;
            background: #fafbfc;
            border-radius: 10px;
        }

        /* container rumus KaTeX */
        .katex-box {
            background: #f7f9fc;
            border: 1px solid #dbe5f1;
            border-radius: 12px;
            padding: 14px 16px;
            overflow-x: auto;
        }

        .ka-figure {
            text-align: center;
            margin: 14px 0;
        }

        .ka-figure img {
            width: 100%;
            max-width: 300px;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
        }

        .ka-caption {
            font-size: 13px;
            color: #6b7280;
            margin-top: 6px;
        }
    </style>

    {{-- Subjudul --}}
    <h2 class="mt-2 mb-3" style="font-weight: 600;">3. Gradien garis yang melewati dua titik</h2>

    <div class="box-eksplorasi mt-4 mb-4">
        <div class="title-box">Eksplorasi</div>

        <p class="mb-3" style="line-height:1.7;">
            Perhatikan gambar berikut. Terdapat dua titik, yaitu titik <b>A</b> dan titik <b>B</b>,
            yang terletak pada suatu garis. Koordinat titik A adalah <b>$A(x_1, y_1)$</b>
            dan koordinat titik B adalah <b>$B(x_2, y_2)$</b>.
        </p>

        <p class="mb-3" style="line-height:1.7;">
            Bayangkan kamu bergerak dari titik <b>A</b> menuju titik <b>B</b>.
            Untuk menentukan kemiringan garis tersebut, kita perlu melihat:
        </p>

        <ul class="mb-3" style="line-height:1.8;">
            <li>selisih nilai $y$ (naik atau turun),</li>
            <li>dan selisih nilai $x$ (gerak ke samping).</li>
        </ul>

        <div class="text-center mb-3">
            <img class="zoomable" src="{{ asset('img/gradien/gradienduatitik.png') }}"
                style="max-width:300px;width:100%;border-radius:12px;border:1px solid #e5e7eb;">
            <div class="text-muted mt-2" style="font-size:13px;">
                Perpindahan dari titik A ke titik B
            </div>
        </div>

        {{-- Soal 1 --}}
        <div class="p-3 border rounded-4 mb-3">
            <div class="fw-semibold mb-2">
                1. Tuliskan bentuk selisih nilai $y$ dari titik A ke titik B.
            </div>
            <input type="text" id="ex1_input" class="form-control" style="width: 120px">
            <div id="fb_ex1" class="mt-2"></div>
        </div>

        {{-- Soal 2 --}}
        <div class="p-3 border rounded-4 mb-3">
            <div class="fw-semibold mb-2">
                2. Tuliskan bentuk selisih nilai $x$ dari titik A ke titik B.
            </div>
            <input type="text" id="ex2_input" class="form-control" style="width: 120px">
            <div id="fb_ex2" class="mt-2"></div>
        </div>

        {{-- Soal 3 --}}
        <div class="p-3 border rounded-4 mb-3">
            <div class="fw-semibold mb-2">
                3. Gradien adalah perbandingan selisih nilai $y$ terhadap selisih nilai $x$.
                Lengkapi rumus gradien berikut:
            </div>

            <div class="d-flex align-items-center gap-2 flex-wrap">
                <span>$m=$</span>

                <div class="frac-input">
                    <div class="top">
                        <input type="text" id="eks_subY2" class="form-control form-control-sm text-center">
                    </div>
                    <div class="bottom">
                        <input type="text" id="eks_subX2" class="form-control form-control-sm text-center">
                    </div>
                </div>
            </div>

            <div id="fb_ex3" class="mt-2"></div>
        </div>
        <div class="d-flex gap-2 flex-wrap mt-2">
            <button class="btn btn-palet btn-sm" onclick="cekEksplorasiDuaTitik()">Cek Jawaban</button>
            <button class="btn btn-palet btn-sm" onclick="resetEksplorasiDuaTitik()">Reset</button>
        </div>

        <div id="kesimpulanEksDuaTitik" class="mt-3"></div>
    </div>

    {{-- Pengantar --}}
    <div class="card card-materi mb-4">
        <div class="card-body">

            <p class="mb-2" style="line-height:1.8;">
                Ingat kembali bahwa gradien (\(m\)) menunjukkan tingkat kemiringan suatu garis.
                Gradien diperoleh dari perbandingan antara perubahan nilai \(y\)
                dengan perubahan nilai \(x\).
            </p>

            <div id="katex_def" class="katex-box mb-3"></div>

            {{-- Gambar dua titik --}}
            <p class="mb-2" style="line-height:1.8;">
                Perhatikan sebuah garis yang melalui dua titik berikut.
                Titik pertama adalah \((x_1,y_1)\) dan titik kedua adalah \((x_2,y_2)\).
            </p>

            <div class="ka-figure">
                <img class="zoomable" src="{{ asset('img/gradien/duatitik1.png') }}" alt="Garis melalui dua titik">

                <div class="ka-caption">
                    Garis melalui dua titik \((x_1,y_1)\) dan \((x_2,y_2)\)
                </div>
            </div>

            {{-- Δx --}}
            <h5 class="mt-3" style="font-weight:800;">
                Perubahan pada nilai <span class="x-green">\(x\)</span>
            </h5>

            <p class="mb-2" style="line-height:1.8;">
                Untuk mengetahui perubahan pada nilai \(x\),
                kita mengurangkan nilai \(x\) yang kedua dengan nilai \(x\) yang pertama.
            </p>

            <p class="mb-2" style="line-height:1.8;">
                Perubahan pada nilai \(x\) dapat ditulis:
            </p>

            <div id="katex_dx" class="katex-box mb-2"></div>

            <div class="ka-toggle" onclick="toggleExplain('ex_dx')">
                <span>Mengapa begitu?</span>
                <span id="chev_ex_dx" class="ka-chevron">▾</span>
            </div>

            <div id="ex_dx" class="ka-explain">

                <p class="mb-2" style="line-height:1.8;">
                    Misalnya diketahui:
                    <span class="x-green">\(x_1 = 3\)</span>
                    dan
                    <span class="x-green">\(x_2 = 7\)</span>.
                </p>

                <p class="mb-2" style="line-height:1.8;">
                    Maka perubahan pada nilai \(x\):
                </p>

                <div id="katex_dx_ex" class="katex-box"></div>

                <p class="mb-0" style="line-height:1.8;">
                    Artinya, titik bergerak dari 3 ke 7 sejauh 4 satuan ke arah horizontal.
                </p>
            </div>

            <div class="ka-figure">
                <img class="zoomable" src="{{ asset('img/gradien/duatitik2.png') }}" alt="Perubahan Δx">

                <div class="ka-caption">
                    Panah menunjukkan perubahan \(\Delta x\)
                </div>
            </div>

            {{-- Δy --}}
            <h5 class="mt-4" style="font-weight:800;">
                Perubahan pada nilai <span class="y-brown">\(y\)</span>
            </h5>

            <p class="mb-2" style="line-height:1.8;">
                Dengan cara yang sama,
                perubahan pada nilai \(y\)
                diperoleh dengan mengurangkan nilai \(y\) kedua
                dengan nilai \(y\) pertama.
            </p>

            <p class="mb-2" style="line-height:1.8;">
                Perubahan pada nilai \(y\) dapat ditulis:
            </p>

            <div id="katex_dy" class="katex-box mb-2"></div>

            <div class="ka-toggle" onclick="toggleExplain('ex_dy')">
                <span>Mengapa begitu?</span>
                <span id="chev_ex_dy" class="ka-chevron">▾</span>
            </div>

            <div id="ex_dy" class="ka-explain">

                <p class="mb-2" style="line-height:1.8;">
                    Misalnya diketahui:
                    <span class="y-brown">\(y_1 = 2\)</span>
                    dan
                    <span class="y-brown">\(y_2 = 9\)</span>.
                </p>

                <p class="mb-2" style="line-height:1.8;">
                    Maka perubahan pada nilai \(y\):
                </p>

                <div id="katex_dy_ex" class="katex-box"></div>

                <p class="mb-0" style="line-height:1.8;">
                    Artinya, titik bergerak naik dari 2 ke 9 sebanyak 7 satuan.
                </p>
            </div>

            <div class="ka-figure">
                <img class="zoomable" src="{{ asset('img/gradien/duatitik3.png') }}" alt="Perubahan Δy">

                <div class="ka-caption">
                    Panah menunjukkan perubahan \(\Delta y\)
                </div>
            </div>

            {{-- Rumus akhir --}}
            <p class="mt-4" style="line-height:1.8;">
                Karena gradien merupakan perbandingan perubahan nilai \(y\)
                terhadap perubahan nilai \(x\),
                maka rumus gradien garis yang melalui dua titik dapat ditulis sebagai berikut.
            </p>

            <div id="katex_final" class="katex-box"></div>

            <p class="mt-2" style="line-height:1.8;">
                Jadi, untuk menentukan gradien garis melalui dua titik,
                kita membagi perubahan nilai \(y\)
                dengan perubahan nilai \(x\).
            </p>

        </div>
    </div>

    {{-- Contoh --}}
    <div class="box-contoh mt-5 mb-4">
        <div class="card-body">
            <span class="title-box">Contoh</span>

            <p class="mb-2" style="line-height:1.8;">
                Tentukanlah gradien garis yang melalui titik-titik koordinat berikut:
            </p>

            <ol class="mb-3" style="line-height:1.9; padding-left:18px;">
                <li>a. $P(1,3)$ dan $Q(5,7)$</li>
                <li>b. $R(-1,4)$ dan $S(3,-2)$</li>
                <li>c. $T(-3,-1)$ dan $U(2,-4)$</li>
            </ol>

            <p><b>Penyelesaian:</b></p>

            {{-- a --}}
            <div class="mb-3">
                <div class="fw-semibold mb-1">a. Untuk titik $P(1,3)$ dan $Q(5,7)$</div>
                <div class="rumus-box">
                    $$ m = \frac{y_2-y_1}{x_2-x_1} = \frac{7-3}{5-1} = \frac{4}{4} = 1 $$
                </div>
                <div class="alert alert-success mt-2 mb-0" style="border-radius: 14px;">
                    Jadi, gradiennya adalah <b>1</b>.
                </div>
            </div>

            {{-- b --}}
            <div class="mb-3">
                <div class="fw-semibold mb-1">b. Untuk titik $R(-1,4)$ dan $S(3,-2)$</div>
                <div class="rumus-box">
                    $$ m = \frac{-2-4}{3-(-1)} = \frac{-6}{4} = -\frac{3}{2} $$
                </div>
                <div class="alert alert-success mt-2 mb-0" style="border-radius: 14px;">
                    Jadi, gradiennya adalah <b>$-\frac{3}{2}$</b>.
                </div>
            </div>

            {{-- c --}}
            <div>
                <div class="fw-semibold mb-1">c. Untuk titik $T(-3,-1)$ dan $U(2,-4)$</div>
                <div class="rumus-box">
                    $$ m = \frac{-4-(-1)}{2-(-3)} = \frac{-3}{5} = -\frac{3}{5} $$
                </div>
                <div class="alert alert-success mt-2 mb-0" style="border-radius: 14px;">
                    Jadi, gradiennya adalah <b>$-\frac{3}{5}$</b>.
                </div>
            </div>
        </div>
    </div>

    {{-- Contoh soal step by step --}}
    <div class="box-contoh mt-5 mb-4">
        <div class="card-body">
            <span class="title-box">Contoh</span>
            <p class="mb-3">Tentukan gradien garis melalui $P(1,3)$ dan $Q(5,7)$.</p>

            {{-- STEP 1 --}}
            <div class="border rounded-4 p-3 mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="fw-semibold">Langkah 1: Isi nilai titik</div>
                    <span id="lock_s1" class="badge bg-primary">Open</span>
                </div>

                <div class="row g-2 mt-3">
                    <div class="col-6 col-md-3">
                        <label class="form-label mb-1">$x₁$</label>
                        <input id="x1" type="number" class="form-control" placeholder="...">
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="form-label mb-1">$y₁$</label>
                        <input id="y1" type="number" class="form-control" placeholder="...">
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="form-label mb-1">$x₂$</label>
                        <input id="x2" type="number" class="form-control" placeholder="...">
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="form-label mb-1">$y₂$</label>
                        <input id="y2" type="number" class="form-control" placeholder="...">
                    </div>
                </div>

                <div class="d-flex gap-2 mt-3 flex-wrap">
                    <button class="btn btn-palet btn-sm" onclick="checkStep1()">Check</button>
                </div>

                <div id="fb_s1" class="mt-2"></div>
            </div>

            {{-- STEP 2 --}}
            <div class="border rounded-4 p-3 mb-3" id="card_s2" style="opacity:.55;">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="fw-semibold">Langkah 2: Substitusi ke rumus</div>
                    <span id="lock_s2" class="badge bg-secondary">Locked</span>
                </div>

                <div id="s2_body" style="display:none;" class="mt-3">
                    <div id="katex_step2" class="rumus-box"></div>

                    <div class="d-flex gap-2 mt-3 flex-wrap">
                        <button class="btn btn-palet btn-sm" onclick="unlockStep3()">Continue</button>
                    </div>
                </div>
            </div>

            {{-- STEP 3 --}}
            <div class="border rounded-4 p-3 mb-3" id="card_s3" style="opacity:.55;">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="fw-semibold">Langkah 3: Hitung nilai gradien (m)</div>
                    <span id="lock_s3" class="badge bg-secondary">Locked</span>
                </div>

                <div id="s3_body" style="display:none;" class="mt-3">
                    <label class="form-label mb-1">m</label>
                    <input id="m" type="text" class="form-control" placeholder="Masukkan gradien">

                    <div class="d-flex gap-2 mt-3 flex-wrap">
                        <button class="btn btn-palet btn-sm" onclick="checkStep3()">Check</button>
                    </div>

                    <div id="fb_s3" class="mt-2"></div>
                </div>
            </div>

            {{-- HINTS + SOLUTION --}}
            <div class="d-flex gap-2 flex-wrap">
                <button class="btn btn-palet btn-sm" onclick="hintNext()">Hint</button>
                <button class="btn btn-palet btn-sm" onclick="showSolution()">Tunjukkan Penyelesaian</button>
                <button class="btn btn-palet btn-sm" onclick="resetAll()">Reset</button>
            </div>

            <div id="hintBox" class="alert alert-info mt-3 mb-0" style="border-radius:14px; display:none;"></div>
            <div id="solutionBox" class="alert alert-success mt-3 mb-0" style="border-radius:14px; display:none;">
            </div>
        </div>
    </div>

    {{-- Latihan Soal --}}

    <div class="box-latihan mt-5 mb-4" id="latihanB3Box">
        <div class="card-body">
            <span class="title-box">Latihan</span>

            <!-- ===================== -->
            <!-- LATIHAN 1 -->
            <!-- ===================== -->
            <div class="latihan-step" id="latihanStep1">
                <p class="mb-3" style="line-height:1.8;">
                    <b>1.</b> Seorang teknisi sedang mengamati jalur kabel pada peta gedung. Jalur tersebut
                    menghubungkan titik <b>\(P(-3,6)\)</b> dan <b>\(Q(5,-4)\)</b>.
                    Tentukan gradien jalur kabel tersebut.
                </p>

                <div class="border rounded-4 p-3 mb-4" style="background:#f7f9fc;">
                    <p class="mb-3"><b>Penyelesaian:</b></p>

                    <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                        <span>\(P(-3,6)\), maka</span>
                        <span>\(x_1=\)</span>
                        <input type="text" id="l1x1"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:70px;">
                        <span>dan</span>
                        <span>\(y_1=\)</span>
                        <input type="text" id="l1y1"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:70px;">
                    </div>

                    <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                        <span>\(Q(5,-4)\), maka</span>
                        <span>\(x_2=\)</span>
                        <input type="text" id="l1x2"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:70px;">
                        <span>dan</span>
                        <span>\(y_2=\)</span>
                        <input type="text" id="l1y2"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:70px;">
                    </div>

                    <div class="mb-3 d-flex flex-wrap align-items-center gap-2" style="line-height:2;">
                        <span>Jadi,</span>
                        <span>\(m=\dfrac{y_2-y_1}{x_2-x_1}=\)</span>

                        <div class="frac-input">
                            <div class="top">
                                <input type="text" id="l1_subY2"
                                    class="form-control form-control-sm text-center jawaban-latihan">
                                <span>-</span>
                                <input type="text" id="l1_subY1"
                                    class="form-control form-control-sm text-center jawaban-latihan">
                            </div>

                            <div class="bottom">
                                <input type="text" id="l1_subX2"
                                    class="form-control form-control-sm text-center jawaban-latihan">
                                <span>- (</span>
                                <input type="text" id="l1_subX1"
                                    class="form-control form-control-sm text-center jawaban-latihan">
                                <span>)</span>
                            </div>
                        </div>

                        <span>\(=\)</span>

                        <div class="frac-input single">
                            <div class="top">
                                <input type="text" id="l1_hasilAtas"
                                    class="form-control form-control-sm text-center jawaban-latihan">
                            </div>

                            <div class="bottom">
                                <input type="text" id="l1_hasilBawah"
                                    class="form-control form-control-sm text-center jawaban-latihan">
                            </div>
                        </div>

                        <span>\(=\)</span>

                        <div class="frac-input single">
                            <div class="top">
                                <input type="text" id="l1_hasilAkhirAtas"
                                    class="form-control form-control-sm text-center jawaban-latihan">
                            </div>

                            <div class="bottom">
                                <input type="text" id="l1_hasilAkhirBawah"
                                    class="form-control form-control-sm text-center jawaban-latihan">
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <div>
                            <button class="btn btn-palet btn-sm" type="button" onclick="cekLatihanTitik1()">
                                Cek Jawaban
                            </button>

                            <button class="btn btn-palet btn-sm" type="button" onclick="resetLatihanTitik1()">
                                Reset
                            </button>
                        </div>

                        <button id="nextBtnLatihan1" class="btn btn-palet btn-sm" type="button"
                            onclick="nextLatihan(2)" disabled>
                            Lanjut ke Latihan 2
                        </button>
                    </div>

                    <div id="fbLatihan1" class="mt-3"></div>
                </div>
            </div>

            <!-- ===================== -->
            <!-- LATIHAN 2 -->
            <!-- ===================== -->
            <div class="latihan-step" id="latihanStep2" style="display:none;">
                <hr class="my-4">

                <p class="mb-3" style="line-height:1.8;">
                    <b>2.</b> Seorang perencana kota akan membuat jalan baru yang menghubungkan dua titik pada peta,
                    yaitu <b>\(A(1,2)\)</b> dan <b>\(B(5,p)\)</b>. Agar kemiringan jalan tersebut sesuai rancangan,
                    gradiennya harus bernilai <b>\(1\)</b>. Tentukan nilai <b>\(p\)</b>.
                </p>

                <div class="border rounded-4 p-3 mb-4" style="background:#f7f9fc;">
                    <p class="mb-3"><b>Penyelesaian:</b></p>

                    <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                        <span>\(A(1,2)\), maka</span>
                        <span>\(x_1=\)</span>
                        <input type="text" id="x1_2"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:70px;">
                        <span>dan</span>
                        <span>\(y_1=\)</span>
                        <input type="text" id="y1_2"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:70px;">
                    </div>

                    <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                        <span>\(B(5,p)\), maka</span>
                        <span>\(x_2=\)</span>
                        <input type="text" id="x2_2"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:70px;">
                        <span>dan</span>
                        <span>\(y_2=\)</span>
                        <input type="text" id="y2_2"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:70px;">
                    </div>

                    <p class="mb-2">Karena gradiennya diketahui, maka:</p>

                    <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                        <span>\(m=\)</span>
                        <input type="text" id="m_2"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:70px;">
                    </div>

                    <p class="mb-2">Substitusikan ke rumus gradien.</p>

                    <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                        <input type="text" id="kiri1_2"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:70px;">
                        <span>\(=\)</span>

                        <div class="frac-input">
                            <div class="top">
                                <input type="text" id="subY2_2"
                                    class="form-control form-control-sm text-center jawaban-latihan">
                                <span>\(-\)</span>
                                <input type="text" id="subY1_2"
                                    class="form-control form-control-sm text-center jawaban-latihan">
                            </div>

                            <div class="bottom">
                                <input type="text" id="subX2_2"
                                    class="form-control form-control-sm text-center jawaban-latihan">
                                <span>\(-\)</span>
                                <input type="text" id="subX1_2"
                                    class="form-control form-control-sm text-center jawaban-latihan">
                            </div>
                        </div>
                    </div>

                    <p class="mb-2">Sederhanakan penyebutnya.</p>

                    <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                        <input type="text" id="kiri2_2"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:70px;">
                        <span>\(=\)</span>

                        <div class="frac-input single">
                            <div class="top">
                                <input type="text" id="hasilAtas_2"
                                    class="form-control form-control-sm text-center jawaban-latihan">
                            </div>

                            <div class="bottom">
                                <input type="text" id="hasilBawah_2"
                                    class="form-control form-control-sm text-center jawaban-latihan">
                            </div>
                        </div>
                    </div>

                    <p class="mt-3">Kalikan kedua ruas dengan penyebut agar pecahan hilang.</p>

                    <div class="mb-2 d-flex flex-wrap align-items-center gap-2">
                        <input type="text" id="pers1Kiri_2"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:90px;">
                        <span>\(=\)</span>
                        <input type="text" id="pers1Kanan_2"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:120px;">
                    </div>

                    <p class="mt-3">Sehingga nilai <b>\(p\)</b> adalah:</p>

                    <div class="mb-2 d-flex flex-wrap align-items-center gap-2">
                        <span>\(p=\)</span>
                        <input type="text" id="hasilP_2"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:80px;">
                    </div>

                    <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <button class="btn btn-palet btn-sm" type="button" onclick="prevLatihan(1)">
                            Kembali ke Latihan 1
                        </button>

                        <div>
                            <button class="btn btn-palet btn-sm" type="button" onclick="cekLatihanTitik2()">
                                Cek Jawaban
                            </button>

                            <button class="btn btn-palet btn-sm" type="button" onclick="resetLatihanTitik2()">
                                Reset
                            </button>
                        </div>

                        <button id="nextBtnLatihan2" class="btn btn-palet btn-sm" type="button"
                            onclick="nextLatihan(3)" disabled>
                            Lanjut ke Latihan 3
                        </button>
                    </div>

                    <div id="fbLatihan2" class="mt-3"></div>
                </div>
            </div>

            <!-- ===================== -->
            <!-- LATIHAN 3 -->
            <!-- ===================== -->
            <div class="latihan-step" id="latihanStep3" style="display:none;">
                <hr class="my-4">

                <p class="mb-3" style="line-height:1.8;">
                    <b>3.</b> Sebuah jalan menanjak pada kawasan perumahan digambarkan pada ilustrasi berikut.
                    Titik awal jalan berada di <b>\(A(2,1)\)</b> dan titik akhir berada di <b>\(B(8,4)\)</b>.
                    Tentukan gradien jalan tersebut.
                </p>

                <div class="text-center mb-4">
                    <img src="{{ asset('img/gradien/jalan menanjak.png') }}" alt="Ilustrasi jalan menanjak"
                        class="img-fluid rounded-4 border" style="max-width:200px;">
                </div>

                <div class="border rounded-4 p-3" style="background:#f7f9fc;">
                    <p class="mb-3"><b>Penyelesaian:</b></p>

                    <div class="mb-3 d-flex flex-wrap align-items-center gap-2" style="line-height:2;">
                        <span>\(m=\dfrac{y_2-y_1}{x_2-x_1}=\)</span>

                        <div class="frac-input">
                            <div class="top">
                                <input type="text" id="subY2_3"
                                    class="form-control form-control-sm text-center jawaban-latihan">
                                <span>-</span>
                                <input type="text" id="subY1_3"
                                    class="form-control form-control-sm text-center jawaban-latihan">
                            </div>

                            <div class="bottom">
                                <input type="text" id="subX2_3"
                                    class="form-control form-control-sm text-center jawaban-latihan">
                                <span>-</span>
                                <input type="text" id="subX1_3"
                                    class="form-control form-control-sm text-center jawaban-latihan">
                            </div>
                        </div>

                        <span>\(=\)</span>

                        <div class="frac-input single">
                            <div class="top">
                                <input type="text" id="hasilAtas_3"
                                    class="form-control form-control-sm text-center jawaban-latihan">
                            </div>

                            <div class="bottom">
                                <input type="text" id="hasilBawah_3"
                                    class="form-control form-control-sm text-center jawaban-latihan">
                            </div>
                        </div>

                        <span>\(=\)</span>

                        <div class="frac-input single">
                            <div class="top">
                                <input type="text" id="hasilAkhirAtas_3"
                                    class="form-control form-control-sm text-center jawaban-latihan">
                            </div>

                            <div class="bottom">
                                <input type="text" id="hasilAkhirBawah_3"
                                    class="form-control form-control-sm text-center jawaban-latihan">
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <button class="btn btn-palet btn-sm" type="button" onclick="prevLatihan(2)">
                            Kembali ke Latihan 2
                        </button>

                        <div>
                            <button class="btn btn-palet btn-sm" type="button" onclick="cekLatihanTitik3()">
                                Cek Jawaban
                            </button>

                            <button class="btn btn-palet btn-sm" type="button" onclick="resetLatihanTitik3()">
                                Reset
                            </button>
                        </div>
                    </div>

                    <div id="fbLatihan3" class="mt-3"></div>
                    <div id="pesanAkhirLatihan" class="mt-4"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/subbabB/subbab_gradienduatitik.js') }}"></script>

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
