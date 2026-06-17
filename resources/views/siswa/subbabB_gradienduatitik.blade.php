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
            display: block;
            width: fit-content;
            max-width: 100%;
            margin: 16px auto 22px;
            padding: 10px 28px;

            background: transparent;
            border: none;
            border-bottom: 2px solid #d8c8ff;

            font-size: 20px;
            text-align: center;
            overflow-x: auto;
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

    {{-- Rumus --}}
    <style>
        .contoh-item {
            padding: 14px 0;
            border-bottom: 1px dashed #d8dee9;
        }

        .contoh-item:last-child {
            border-bottom: none;
        }

        .rumus-contoh {
            max-width: 620px;
            margin: 10px auto;
            padding: 12px 18px;
            font-size: 18px;
            background: #f8fbff;
            border: 1px solid #dbe5f1;
            border-radius: 14px;
        }

        .hasil-mini {
            display: inline-block;
            background: #e9f8ef;
            color: #146c43;
            border: 1px solid #b7e4c7;
            border-radius: 999px;
            padding: 6px 14px;
            font-weight: 700;
            margin-top: 4px;
        }
    </style>



    {{-- Subjudul --}}
    <h2 class="mt-2 mb-3" style="font-weight: 600;">3. Gradien garis yang melewati dua titik</h2>


    {{-- Pengantar --}}
    <div class="card card-materi mt-4 mb-4">
        <div class="card-body">
            <p class="mb-3" style="line-height:1.8; text-align: justify;">
                Pada bagian sebelumnya, kamu telah mempelajari bahwa gradien diperoleh dari
                perbandingan perubahan nilai \(y\) terhadap perubahan nilai \(x\).
            </p>

            <div class="rumus-box text-center my-3">
                $$
                m = \frac{\Delta y}{\Delta x}
                $$
            </div>

            <p class="mb-3" style="line-height:1.8; text-align: justify;">
                Sekarang, bagaimana jika suatu garis diketahui melalui dua titik?
                Misalkan garis tersebut melalui titik \(A(x_1,y_1)\) dan titik \(B(x_2,y_2)\).
                Untuk menentukan gradiennya, kita perlu memperhatikan perubahan posisi dari
                titik \(A\) ke titik \(B\).
            </p>

            <div class="text-center mb-3">
                <img class="zoomable" src="{{ asset('img/gradien/gradienduatitik.png') }}"
                    alt="Perpindahan dari titik A ke titik B"
                    style="max-width:340px;width:100%;border-radius:12px;border:1px solid #e5e7eb;">

                <div class="text-muted mt-2" style="font-size:13px;">
                    <strong>Gambar 2.6</strong> Perpindahan dari titik \(A(x_1,y_1)\) ke titik \(B(x_2,y_2)\)
                </div>
            </div>

            <p class="mb-3" style="line-height:1.8; text-align: justify;">
                Perubahan nilai \(x\) diperoleh dengan mengurangkan nilai \(x\) kedua
                dengan nilai \(x\) pertama.
            </p>

            <div class="rumus-box text-center my-3">
                $$
                \Delta x = x_2 - x_1
                $$
            </div>

            <div class="text-center mb-3">
                <img class="zoomable" src="{{ asset('img/gradien/duatitik2.png') }}"
                    alt="Perubahan nilai x dari titik A ke titik B"
                    style="max-width:340px;width:100%;border-radius:12px;border:1px solid #e5e7eb;">

                <div class="text-muted mt-2" style="font-size:13px;">
                    <strong>Gambar 2.7</strong> Perubahan nilai \(x\) dari \(x_1\) ke \(x_2\)
                </div>
            </div>

            <p class="mb-3" style="line-height:1.8; text-align: justify;">
                Perubahan nilai \(y\) diperoleh dengan mengurangkan nilai \(y\) kedua
                dengan nilai \(y\) pertama.
            </p>

            <div class="rumus-box text-center my-3">
                $$
                \Delta y = y_2 - y_1
                $$
            </div>

            <div class="text-center mb-3">
                <img class="zoomable" src="{{ asset('img/gradien/duatitik3.png') }}"
                    alt="Perubahan nilai y dari titik A ke titik B"
                    style="max-width:340px;width:100%;border-radius:12px;border:1px solid #e5e7eb;">

                <div class="text-muted mt-2" style="font-size:13px;">
                    <strong>Gambar 2.8</strong> Perubahan nilai \(y\) dari \(y_1\) ke \(y_2\)
                </div>
            </div>

            <p class="mb-3" style="line-height:1.8; text-align: justify;">
                Karena gradien merupakan perbandingan antara perubahan nilai \(y\)
                dan perubahan nilai \(x\), maka rumus gradien garis yang melalui dua titik
                dapat ditulis sebagai berikut.
            </p>

            <div class="rumus-box text-center my-3">
                $$
                m = \frac{\Delta y}{\Delta x}
                = \frac{y_2-y_1}{x_2-x_1}
                $$
            </div>

            <p class="mb-0" style="line-height:1.8; text-align: justify;">
                Jadi, gradien garis yang melalui dua titik \(A(x_1,y_1)\) dan \(B(x_2,y_2)\)
                dapat ditentukan dengan membagi selisih nilai \(y\) dengan selisih nilai \(x\).
            </p>
        </div>
    </div>

    {{-- Contoh --}}
    <div class="box-contoh mt-5 mb-4">
        <div class="card-body">
            <span class="title-box">Contoh</span>

            <p class="mb-2" style="line-height:1.8; text-align: justify;">
                Tentukanlah gradien garis yang melalui titik-titik koordinat berikut:
            </p>

            <ol class="mb-3" style="line-height:1.9; padding-left:18px;">
                <li>\(P(1,3)\) dan \(Q(5,7)\)</li>
                <li>\(R(-1,4)\) dan \(S(3,-2)\)</li>
                <li>\(T(-3,-1)\) dan \(U(2,-4)\)</li>
            </ol>

            <p class="mb-2"><b>Penyelesaian:</b></p>

            {{-- a --}}
            <div class="contoh-item">
                <p class="mb-2" style="line-height:1.8;">
                    a. Untuk titik \(P(1,3)\) dan \(Q(5,7)\)
                </p>

                <div class="rumus-box rumus-contoh text-center">
                    $$
                    m = \frac{y_2-y_1}{x_2-x_1}
                    = \frac{7-3}{5-1}
                    = \frac{4}{4}
                    = 1
                    $$
                </div>

                <span class="hasil-mini">Jadi, gradiennya adalah \(1\).</span>
            </div>

            {{-- b --}}
            <div class="contoh-item">
                <p class="mb-2" style="line-height:1.8;">
                    b. Untuk titik \(R(-1,4)\) dan \(S(3,-2)\)
                </p>

                <div class="rumus-box rumus-contoh text-center">
                    $$
                    m = \frac{-2-4}{3-(-1)}
                    = \frac{-6}{4}
                    = -\frac{3}{2}
                    $$
                </div>

                <span class="hasil-mini">Jadi, gradiennya adalah \(-\frac{3}{2}\).</span>
            </div>

            {{-- c --}}
            <div class="contoh-item">
                <p class="mb-2" style="line-height:1.8;">
                    c. Untuk titik \(T(-3,-1)\) dan \(U(2,-4)\)
                </p>

                <div class="rumus-box rumus-contoh text-center">
                    $$
                    m = \frac{-4-(-1)}{2-(-3)}
                    = \frac{-3}{5}
                    = -\frac{3}{5}
                    $$
                </div>

                <span class="hasil-mini">Jadi, gradiennya adalah \(-\frac{3}{5}\).</span>
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
                <div class="petunjuk-mini-latihan">
                    <strong>Petunjuk:</strong>
                    Isilah nilai \(x_1\), \(y_1\), \(x_2\), dan \(y_2\) pada kolom yang tersedia.
                    Setelah itu, lengkapi bentuk pecahan gradien sampai diperoleh hasil akhirnya.
                </div>

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
                <div class="petunjuk-mini-latihan">
                    <strong>Petunjuk:</strong>
                    Isilah setiap langkah penyelesaian pada kolom yang tersedia.
                    Gunakan informasi titik dan nilai gradien yang sudah diketahui untuk menentukan nilai \(p\).
                </div>

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
                <div class="petunjuk-mini-latihan">
                    <strong>Petunjuk:</strong>
                    Perhatikan titik awal dan titik akhir pada soal, lalu isilah nilai pada bentuk pecahan gradien yang
                    tersedia.
                </div>

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

    <script>
        // Contoh Step by step
        // ==== KUNCI JAWABAN (contoh P(1,3) Q(5,7)) ====
        const ANSWER = {
            x1: 1,
            y1: 3,
            x2: 5,
            y2: 7,
            m: 1
        };

        let hintIndex = 0;
        const hints = [
            "Ingat rumus gradien: m = (y₂ − y₁) / (x₂ − x₁).",
            "Ambil (x₁,y₁) dari titik pertama dan (x₂,y₂) dari titik kedua.",
            "Hitung y₂ − y₁ dan x₂ − x₁ secara terpisah dulu.",
            "Terakhir, bagi hasilnya untuk dapat m.",
        ];

        // ==== UTIL ====
        function el(id) {
            return document.getElementById(id);
        }

        function setLocked(step, locked) {
            const card = el(`card_s${step}`);
            const badge = el(`lock_s${step}`);
            const body = el(`s${step}_body`);

            if (locked) {
                card.style.opacity = ".55";
                badge.className = "badge bg-secondary";
                badge.textContent = "Locked";
                body.style.display = "none";
            } else {
                card.style.opacity = "1";
                badge.className = "badge bg-success";
                badge.textContent = "Unlocked";
                body.style.display = "block";
            }
        }

        function normalizeFraction(input) {
            const s = String(input).trim();
            if (!s) return null;

            if (s.includes("/")) {
                const parts = s.split("/");
                if (parts.length !== 2) return null;
                const a = Number(parts[0].trim());
                const b = Number(parts[1].trim());
                if (!Number.isFinite(a) || !Number.isFinite(b) || b === 0) return null;
                return a / b;
            }
            const n = Number(s);
            return Number.isFinite(n) ? n : null;
        }

        // ==== KATEX RENDER ====
        function renderStep2Katex() {
            const x1 = el("x1").value || "?";
            const y1 = el("y1").value || "?";
            const x2 = el("x2").value || "?";
            const y2 = el("y2").value || "?";

            const tex = `m=\\frac{y_2-y_1}{x_2-x_1}=\\frac{${y2}-${y1}}{${x2}-${x1}}`;

            // Pastikan KaTeX sudah ada (katex.min.js)
            katex.render(tex, el("katex_step2"), {
                throwOnError: false,
                displayMode: true,
            });
        }

        // ==== STEP LOGIC ====
        function checkStep1() {
            el("fb_s1").innerHTML = "";

            const x1 = Number(el("x1").value);
            const y1 = Number(el("y1").value);
            const x2 = Number(el("x2").value);
            const y2 = Number(el("y2").value);

            const ok =
                x1 === ANSWER.x1 &&
                y1 === ANSWER.y1 &&
                x2 === ANSWER.x2 &&
                y2 === ANSWER.y2;

            if (!ok) {
                el("fb_s1").innerHTML =
                    `<div class="text-danger">Belum tepat. Cek lagi titik P dan Q.</div>`;
                return;
            }

            el("fb_s1").innerHTML =
                `<div class="text-success">Langkah 1 benar. Step berikutnya terbuka.</div>`;
            setLocked(2, false);
            renderStep2Katex();
        }

        function unlockStep3() {
            setLocked(3, false);
        }

        function checkStep3() {
            el("fb_s3").innerHTML = "";

            const mVal = normalizeFraction(el("m").value);
            if (mVal === null) {
                el("fb_s3").innerHTML =
                    `<div class="text-danger">Format jawaban tidak valid. Pakai 1 atau a/b.</div>`;
                return;
            }

            if (Math.abs(mVal - ANSWER.m) < 1e-9) {
                el("fb_s3").innerHTML =
                    `<div class="text-success">Benar! Gradiennya ${ANSWER.m}.</div>`;
            } else {
                el("fb_s3").innerHTML =
                    `<div class="text-danger">Belum tepat. Coba hitung (7−3)/(5−1).</div>`;
            }
        }

        // ==== HINTS + SOLUTION ====
        function hintNext() {
            el("hintBox").style.display = "block";
            el("hintBox").innerHTML =
                `Hint ${Math.min(hintIndex + 1, hints.length)}: ${hints[Math.min(hintIndex, hints.length - 1)]}`;
            if (hintIndex < hints.length - 1) hintIndex++;
        }

        function showSolution() {
            // unlock all
            setLocked(2, false);
            setLocked(3, false);

            // fill answer
            el("x1").value = ANSWER.x1;
            el("y1").value = ANSWER.y1;
            el("x2").value = ANSWER.x2;
            el("y2").value = ANSWER.y2;
            el("m").value = String(ANSWER.m);

            renderStep2Katex();

            el("solutionBox").style.display = "block";
            el("solutionBox").innerHTML = `
    <div><b>Solution</b></div>
    <div>Step 1: (x₁,y₁)=(${ANSWER.x1},${ANSWER.y1}), (x₂,y₂)=(${ANSWER.x2},${ANSWER.y2})</div>
    <div>Step 2: m=(y₂−y₁)/(x₂−x₁)=(7−3)/(5−1)</div>
    <div>Step 3: m=4/4=1</div>
  `;
        }

        function resetAll() {
            ["x1", "y1", "x2", "y2", "m"].forEach((id) => (el(id).value = ""));
            ["fb_s1", "fb_s3"].forEach((id) => (el(id).innerHTML = ""));
            el("hintBox").style.display = "none";
            el("solutionBox").style.display = "none";
            hintIndex = 0;

            // Step 2 & 3 locked again
            setLocked(2, true);
            setLocked(3, true);

            // kosongkan katex container
            el("katex_step2").innerHTML = "";
        }

        // init state
        document.addEventListener("DOMContentLoaded", () => {
            setLocked(2, true);
            setLocked(3, true);

            // optional: kalau user edit input setelah benar, update substitusi kalau step2 udah kebuka
            ["x1", "y1", "x2", "y2"].forEach((id) => {
                el(id).addEventListener("input", () => {
                    if (el("s2_body").style.display === "block") renderStep2Katex();
                });
            });
        });


        // =========================
        // LATIHAN SOAL SUBBAB B3
        // =========================

        function normalisasiNilai(teks) {
            return String(teks || "")
                .trim()
                .replace(/\s+/g, "")
                .replace(/−/g, "-")
                .toLowerCase();
        }

        function renderMath(target) {
            if (typeof renderMathInElement !== "function" || !target) return;

            renderMathInElement(target, {
                delimiters: [{
                        left: "$$",
                        right: "$$",
                        display: true
                    },
                    {
                        left: "\\[",
                        right: "\\]",
                        display: true
                    },
                    {
                        left: "\\(",
                        right: "\\)",
                        display: false
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

        document.addEventListener("DOMContentLoaded", function() {
            renderMath(document.getElementById("latihanB3Box") || document.body);
            restoreProgressTitikB3();
        });

        // =========================
        // NAVIGASI LATIHAN
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
            renderMath(step);
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
                console.log("Simpan latihan B3:", data);

                return response.ok;
            } catch (error) {
                console.error("Gagal menyimpan latihan B3:", error);
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
        function cekField(id, jawabanBenar, labelTampil) {
            const el = document.getElementById(id);
            if (!el) return {
                benar: false,
                label: `Field ${id} tidak ditemukan.`
            };

            const nilaiUser = normalisasiNilai(el.value);
            const nilaiKunci = normalisasiNilai(jawabanBenar);

            if (!Number.isNaN(Number(nilaiUser)) && !Number.isNaN(Number(nilaiKunci))) {
                if (Number(nilaiUser) === Number(nilaiKunci)) {
                    el.classList.remove("is-invalid");
                    el.classList.add("is-valid");
                    return {
                        benar: true,
                        label: labelTampil
                    };
                }
            }

            if (nilaiUser === nilaiKunci) {
                el.classList.remove("is-invalid");
                el.classList.add("is-valid");
                return {
                    benar: true,
                    label: labelTampil
                };
            }

            el.classList.remove("is-valid");
            el.classList.add("is-invalid");
            return {
                benar: false,
                label: labelTampil
            };
        }

        function prosesPengecekan(data) {
            const salah = [];

            data.forEach((item) => {
                const hasil = cekField(item.id, item.jawaban, item.label);
                if (!hasil.benar) salah.push(item.label);
            });

            return {
                semuaBenar: salah.length === 0,
                salah: salah,
            };
        }

        function buatHintRingkas(nomor, salah) {
            let hints = [];

            if (nomor === 1) {
                const salahTitik = salah.some(item =>
                    item.includes("x_1") ||
                    item.includes("y_1") ||
                    item.includes("x_2") ||
                    item.includes("y_2")
                );

                const salahSubstitusi = salah.some(item =>
                    item.includes("pembilang") ||
                    item.includes("penyebut")
                );

                const salahHasil = salah.some(item =>
                    item.includes("Hasil pembilang") ||
                    item.includes("Hasil penyebut")
                );

                const salahAkhir = salah.some(item =>
                    item.includes("hasil akhir")
                );

                if (salahTitik) hints.push("Periksa lagi penentuan nilai $x_1$, $y_1$, $x_2$, dan $y_2$.");
                if (salahSubstitusi) hints.push("Periksa lagi substitusi nilai ke rumus gradien.");
                if (salahHasil) hints.push("Hitung kembali hasil pengurangan pada pembilang dan penyebut.");
                if (salahAkhir) hints.push("Sederhanakan hasil gradiennya.");
            }

            if (nomor === 2) {
                const salahTitik = salah.some(item =>
                    item.includes("x_1") ||
                    item.includes("y_1") ||
                    item.includes("x_2") ||
                    item.includes("y_2")
                );

                const salahGradien = salah.some(item =>
                    item.includes("gradien")
                );

                const salahSubstitusi = salah.some(item =>
                    item.includes("substitusi") ||
                    item.includes("pembilang") ||
                    item.includes("penyebut")
                );

                const salahPersamaan = salah.some(item =>
                    item.includes("pecahan") ||
                    item.includes("Ruas kiri") ||
                    item.includes("Ruas kanan")
                );

                const salahP = salah.some(item =>
                    item.includes("Nilai \\(p\\)")
                );

                if (salahTitik) hints.push("Periksa lagi penentuan nilai $x_1$, $y_1$, $x_2$, dan $y_2$.");
                if (salahGradien) hints.push("Periksa kembali nilai gradien yang diketahui pada soal.");
                if (salahSubstitusi) hints.push("Periksa lagi substitusi nilai ke rumus gradien.");
                if (salahPersamaan) hints.push("Periksa kembali langkah penyederhanaan dan menghilangkan pecahan.");
                if (salahP) hints.push("Periksa kembali nilai akhir $p$.");
            }

            if (nomor === 3) {
                const salahSubstitusi = salah.some(item =>
                    item.includes("y_2") ||
                    item.includes("y_1") ||
                    item.includes("x_2") ||
                    item.includes("x_1")
                );

                const salahHasil = salah.some(item =>
                    item.includes("Hasil pembilang") ||
                    item.includes("Hasil penyebut")
                );

                const salahAkhir = salah.some(item =>
                    item.includes("hasil akhir")
                );

                if (salahSubstitusi) hints.push("Periksa lagi substitusi titik awal dan titik akhir ke rumus gradien.");
                if (salahHasil) hints.push("Hitung kembali hasil pengurangan pada pembilang dan penyebut.");
                if (salahAkhir) hints.push("Sederhanakan hasil gradiennya.");
            }

            if (hints.length === 0) {
                hints.push("Periksa kembali langkah penyelesaianmu.");
            }

            return hints;
        }

        function tampilkanFeedback(containerId, hasil, nomor, pesanBenar) {
            const fb = document.getElementById(containerId);
            if (!fb) return hasil.semuaBenar;

            if (hasil.semuaBenar) {
                fb.innerHTML = `
            <div class="alert alert-success py-2 mb-0">
                ${pesanBenar}
            </div>
        `;
            } else {
                const hints = buatHintRingkas(nomor, hasil.salah);

                fb.innerHTML = `
            <div class="alert alert-danger py-2 mb-0">
                ${hints.join("<br>")}
            </div>
        `;
            }

            renderMath(fb);
            return hasil.semuaBenar;
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

        // Simpan Jawaban Latihan
        function ambilJawabanLatihanTitik1() {
            return {
                l1x1: document.getElementById("l1x1")?.value.trim() ?? "",
                l1y1: document.getElementById("l1y1")?.value.trim() ?? "",
                l1x2: document.getElementById("l1x2")?.value.trim() ?? "",
                l1y2: document.getElementById("l1y2")?.value.trim() ?? "",

                l1_subY2: document.getElementById("l1_subY2")?.value.trim() ?? "",
                l1_subY1: document.getElementById("l1_subY1")?.value.trim() ?? "",
                l1_subX2: document.getElementById("l1_subX2")?.value.trim() ?? "",
                l1_subX1: document.getElementById("l1_subX1")?.value.trim() ?? "",

                l1_hasilAtas: document.getElementById("l1_hasilAtas")?.value.trim() ?? "",
                l1_hasilBawah: document.getElementById("l1_hasilBawah")?.value.trim() ?? "",
                l1_hasilAkhirAtas: document.getElementById("l1_hasilAkhirAtas")?.value.trim() ?? "",
                l1_hasilAkhirBawah: document.getElementById("l1_hasilAkhirBawah")?.value.trim() ?? "",
            };
        }

        function ambilJawabanLatihanTitik2() {
            return {
                x1_2: document.getElementById("x1_2")?.value.trim() ?? "",
                y1_2: document.getElementById("y1_2")?.value.trim() ?? "",
                x2_2: document.getElementById("x2_2")?.value.trim() ?? "",
                y2_2: document.getElementById("y2_2")?.value.trim() ?? "",
                m_2: document.getElementById("m_2")?.value.trim() ?? "",

                kiri1_2: document.getElementById("kiri1_2")?.value.trim() ?? "",
                subY2_2: document.getElementById("subY2_2")?.value.trim() ?? "",
                subY1_2: document.getElementById("subY1_2")?.value.trim() ?? "",
                subX2_2: document.getElementById("subX2_2")?.value.trim() ?? "",
                subX1_2: document.getElementById("subX1_2")?.value.trim() ?? "",

                kiri2_2: document.getElementById("kiri2_2")?.value.trim() ?? "",
                hasilAtas_2: document.getElementById("hasilAtas_2")?.value.trim() ?? "",
                hasilBawah_2: document.getElementById("hasilBawah_2")?.value.trim() ?? "",

                pers1Kiri_2: document.getElementById("pers1Kiri_2")?.value.trim() ?? "",
                pers1Kanan_2: document.getElementById("pers1Kanan_2")?.value.trim() ?? "",
                hasilP_2: document.getElementById("hasilP_2")?.value.trim() ?? "",
            };
        }

        function ambilJawabanLatihanTitik3() {
            return {
                subY2_3: document.getElementById("subY2_3")?.value.trim() ?? "",
                subY1_3: document.getElementById("subY1_3")?.value.trim() ?? "",
                subX2_3: document.getElementById("subX2_3")?.value.trim() ?? "",
                subX1_3: document.getElementById("subX1_3")?.value.trim() ?? "",

                hasilAtas_3: document.getElementById("hasilAtas_3")?.value.trim() ?? "",
                hasilBawah_3: document.getElementById("hasilBawah_3")?.value.trim() ?? "",
                hasilAkhirAtas_3: document.getElementById("hasilAkhirAtas_3")?.value.trim() ?? "",
                hasilAkhirBawah_3: document.getElementById("hasilAkhirBawah_3")?.value.trim() ?? "",
            };
        }

        // =========================
        // LATIHAN 1
        // =========================
        async function cekLatihanTitik1() {
            const data = [{
                    id: "l1x1",
                    jawaban: "-3",
                    label: "Nilai \\(x_1\\) belum benar."
                },
                {
                    id: "l1y1",
                    jawaban: "6",
                    label: "Nilai \\(y_1\\) belum benar."
                },
                {
                    id: "l1x2",
                    jawaban: "5",
                    label: "Nilai \\(x_2\\) belum benar."
                },
                {
                    id: "l1y2",
                    jawaban: "-4",
                    label: "Nilai \\(y_2\\) belum benar."
                },

                {
                    id: "l1_subY2",
                    jawaban: "-4",
                    label: "Bagian \\(y_2\\) pada pembilang belum benar."
                },
                {
                    id: "l1_subY1",
                    jawaban: "6",
                    label: "Bagian \\(y_1\\) pada pembilang belum benar."
                },
                {
                    id: "l1_subX2",
                    jawaban: "5",
                    label: "Bagian \\(x_2\\) pada penyebut belum benar."
                },
                {
                    id: "l1_subX1",
                    jawaban: "-3",
                    label: "Bagian \\(x_1\\) pada penyebut belum benar."
                },

                {
                    id: "l1_hasilAtas",
                    jawaban: "-10",
                    label: "Hasil pembilang belum benar."
                },
                {
                    id: "l1_hasilBawah",
                    jawaban: "8",
                    label: "Hasil penyebut belum benar."
                },
                {
                    id: "l1_hasilAkhirAtas",
                    jawaban: "-5",
                    label: "Pembilang hasil akhir belum benar."
                },
                {
                    id: "l1_hasilAkhirBawah",
                    jawaban: "4",
                    label: "Penyebut hasil akhir belum benar."
                },
            ];

            const hasil = prosesPengecekan(data);
            const benar = tampilkanFeedback(
                "fbLatihan1",
                hasil,
                1,
                "Jawaban nomor 1 benar. Silakan lanjut ke latihan berikutnya."
            );

            const nextBtn = document.getElementById("nextBtnLatihan1");

            if (benar) {
                if (nextBtn) nextBtn.disabled = false;

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L1`,
                    "input",
                    ambilJawabanLatihanTitik1(),
                    true
                );
            } else {
                if (nextBtn) nextBtn.disabled = true;
                resetStepSetelah(2);
            }

            return benar;
        }

        function resetLatihanTitik1() {
            resetInput([
                "l1x1", "l1y1", "l1x2", "l1y2",
                "l1_subY2", "l1_subY1", "l1_subX2", "l1_subX1",
                "l1_hasilAtas", "l1_hasilBawah", "l1_hasilAkhirAtas", "l1_hasilAkhirBawah",
            ]);

            const fb = document.getElementById("fbLatihan1");
            const nextBtn = document.getElementById("nextBtnLatihan1");

            if (fb) fb.innerHTML = "";
            if (nextBtn) nextBtn.disabled = true;

            resetStepSetelah(2);
        }

        // =========================
        // LATIHAN 2
        // =========================
        async function cekLatihanTitik2() {
            const data = [{
                    id: "x1_2",
                    jawaban: "1",
                    label: "Nilai \\(x_1\\) pada nomor 2 belum benar."
                },
                {
                    id: "y1_2",
                    jawaban: "2",
                    label: "Nilai \\(y_1\\) pada nomor 2 belum benar."
                },
                {
                    id: "x2_2",
                    jawaban: "5",
                    label: "Nilai \\(x_2\\) pada nomor 2 belum benar."
                },
                {
                    id: "y2_2",
                    jawaban: "p",
                    label: "Nilai \\(y_2\\) pada nomor 2 belum benar."
                },
                {
                    id: "m_2",
                    jawaban: "1",
                    label: "Nilai gradien \\(m\\) pada nomor 2 belum benar."
                },
                {
                    id: "kiri1_2",
                    jawaban: "1",
                    label: "Ruas kiri pada langkah substitusi belum benar."
                },
                {
                    id: "subY2_2",
                    jawaban: "p",
                    label: "Bagian \\(y_2\\) pada pembilang nomor 2 belum benar."
                },
                {
                    id: "subY1_2",
                    jawaban: "2",
                    label: "Bagian \\(y_1\\) pada pembilang nomor 2 belum benar."
                },
                {
                    id: "subX2_2",
                    jawaban: "5",
                    label: "Bagian \\(x_2\\) pada penyebut nomor 2 belum benar."
                },
                {
                    id: "subX1_2",
                    jawaban: "1",
                    label: "Bagian \\(x_1\\) pada penyebut nomor 2 belum benar."
                },
                {
                    id: "kiri2_2",
                    jawaban: "1",
                    label: "Ruas kiri pada langkah penyederhanaan belum benar."
                },
                {
                    id: "hasilAtas_2",
                    jawaban: "p-2",
                    label: "Pembilang hasil pecahan nomor 2 belum benar."
                },
                {
                    id: "hasilBawah_2",
                    jawaban: "4",
                    label: "Penyebut hasil pecahan nomor 2 belum benar."
                },
                {
                    id: "pers1Kiri_2",
                    jawaban: "4",
                    label: "Ruas kiri setelah menghilangkan pecahan belum benar."
                },
                {
                    id: "pers1Kanan_2",
                    jawaban: "p-2",
                    label: "Ruas kanan setelah menghilangkan pecahan belum benar."
                },
                {
                    id: "hasilP_2",
                    jawaban: "6",
                    label: "Nilai \\(p\\) pada nomor 2 belum benar."
                },
            ];

            const hasil = prosesPengecekan(data);
            const benar = tampilkanFeedback(
                "fbLatihan2",
                hasil,
                2,
                "Jawaban nomor 2 benar. Silakan lanjut ke latihan berikutnya."
            );

            const nextBtn = document.getElementById("nextBtnLatihan2");

            if (benar) {
                if (nextBtn) nextBtn.disabled = false;

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L2`,
                    "input",
                    ambilJawabanLatihanTitik2(),
                    true
                );
            } else {
                if (nextBtn) nextBtn.disabled = true;
                resetStepSetelah(3);
            }

            return benar;
        }

        function resetLatihanTitik2() {
            resetInput([
                "x1_2", "y1_2", "x2_2", "y2_2", "m_2", "kiri1_2",
                "subY2_2", "subY1_2", "subX2_2", "subX1_2",
                "kiri2_2", "hasilAtas_2", "hasilBawah_2",
                "pers1Kiri_2", "pers1Kanan_2", "hasilP_2",
            ]);

            const fb = document.getElementById("fbLatihan2");
            const nextBtn = document.getElementById("nextBtnLatihan2");

            if (fb) fb.innerHTML = "";
            if (nextBtn) nextBtn.disabled = true;

            resetStepSetelah(3);
        }

        // =========================
        // LATIHAN 3
        // =========================
        async function cekLatihanTitik3() {
            const data = [{
                    id: "subY2_3",
                    jawaban: "4",
                    label: "Nilai \\(y_2\\) pada nomor 3 belum benar."
                },
                {
                    id: "subY1_3",
                    jawaban: "1",
                    label: "Nilai \\(y_1\\) pada nomor 3 belum benar."
                },
                {
                    id: "subX2_3",
                    jawaban: "8",
                    label: "Nilai \\(x_2\\) pada nomor 3 belum benar."
                },
                {
                    id: "subX1_3",
                    jawaban: "2",
                    label: "Nilai \\(x_1\\) pada nomor 3 belum benar."
                },
                {
                    id: "hasilAtas_3",
                    jawaban: "3",
                    label: "Hasil pembilang pada nomor 3 belum benar."
                },
                {
                    id: "hasilBawah_3",
                    jawaban: "6",
                    label: "Hasil penyebut pada nomor 3 belum benar."
                },
                {
                    id: "hasilAkhirAtas_3",
                    jawaban: "1",
                    label: "Pembilang hasil akhir nomor 3 belum benar."
                },
                {
                    id: "hasilAkhirBawah_3",
                    jawaban: "2",
                    label: "Penyebut hasil akhir nomor 3 belum benar."
                },
            ];

            const hasil = prosesPengecekan(data);
            const benar = tampilkanFeedback(
                "fbLatihan3",
                hasil,
                3,
                "Jawaban nomor 3 benar. Gradien jalan tersebut adalah \\(\\frac{1}{2}\\)."
            );

            if (benar) {
                const akhir = document.getElementById("pesanAkhirLatihan");

                if (akhir) {
                    akhir.innerHTML = `
                <div class="alert alert-success fw-semibold text-center mt-3">
                    Bagus, kamu sudah memahami cara menentukan gradien garis melalui dua titik.
                    Silakan lanjut ke materi berikutnya.
                </div>
            `;
                    renderMath(akhir);
                }

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L3`,
                    "input",
                    ambilJawabanLatihanTitik3(),
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
            }

            return benar;
        }

        function resetLatihanTitik3() {
            resetInput([
                "subY2_3", "subY1_3", "subX2_3", "subX1_3",
                "hasilAtas_3", "hasilBawah_3", "hasilAkhirAtas_3", "hasilAkhirBawah_3",
            ]);

            const fb = document.getElementById("fbLatihan3");
            const akhir = document.getElementById("pesanAkhirLatihan");

            if (fb) fb.innerHTML = "";
            if (akhir) akhir.innerHTML = "";
        }

        // Restore
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

        function restoreLatihanTitik1() {
            const saved = SAVED_LATIHAN[`${MATERI_SLUG}_L1`]?.jawaban;

            if (!saved) return;

            Object.entries(saved).forEach(([id, value]) => {
                setValueSafe(id, value);
            });

            beriValid(Object.keys(saved));

            const fb = document.getElementById("fbLatihan1");
            const nextBtn = document.getElementById("nextBtnLatihan1");
            const latihan2 = document.getElementById("latihanStep2");

            if (fb) {
                fb.innerHTML = `
            <div class="alert alert-success py-2 mb-0">
                Jawaban Latihan 1 sudah tersimpan.
            </div>
        `;
            }

            if (nextBtn) nextBtn.disabled = false;
            if (latihan2) latihan2.style.display = "block";

            renderMath(fb);
        }

        function restoreLatihanTitik2() {
            const saved = SAVED_LATIHAN[`${MATERI_SLUG}_L2`]?.jawaban;

            if (!saved) return;

            Object.entries(saved).forEach(([id, value]) => {
                setValueSafe(id, value);
            });

            beriValid(Object.keys(saved));

            const fb = document.getElementById("fbLatihan2");
            const nextBtn = document.getElementById("nextBtnLatihan2");
            const latihan2 = document.getElementById("latihanStep2");
            const latihan3 = document.getElementById("latihanStep3");

            if (fb) {
                fb.innerHTML = `
            <div class="alert alert-success py-2 mb-0">
                Jawaban Latihan 2 sudah tersimpan.
            </div>
        `;
            }

            if (latihan2) latihan2.style.display = "block";
            if (latihan3) latihan3.style.display = "block";
            if (nextBtn) nextBtn.disabled = false;

            renderMath(fb);
        }

        function restoreLatihanTitik3() {
            const saved = SAVED_LATIHAN[`${MATERI_SLUG}_L3`]?.jawaban;

            if (!saved) return;

            Object.entries(saved).forEach(([id, value]) => {
                setValueSafe(id, value);
            });

            beriValid(Object.keys(saved));

            const latihan2 = document.getElementById("latihanStep2");
            const latihan3 = document.getElementById("latihanStep3");
            const fb = document.getElementById("fbLatihan3");
            const akhir = document.getElementById("pesanAkhirLatihan");

            if (latihan2) latihan2.style.display = "block";
            if (latihan3) latihan3.style.display = "block";

            if (fb) {
                fb.innerHTML = `
            <div class="alert alert-success py-2 mb-0">
                Jawaban Latihan 3 sudah tersimpan.
            </div>
        `;
            }

            if (akhir) {
                akhir.innerHTML = `
            <div class="alert alert-success fw-semibold text-center mt-3">
                Bagus, kamu sudah memahami cara menentukan gradien garis melalui dua titik.
                Silakan lanjut ke materi berikutnya.
            </div>
        `;
            }

            renderMath(fb);
            renderMath(akhir);
            bukaNextButton();
        }

        function restoreProgressTitikB3() {
            restoreLatihanTitik1();
            restoreLatihanTitik2();
            restoreLatihanTitik3();

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
