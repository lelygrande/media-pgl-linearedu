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

        /* Opsi kotak */
        .opsi-kotak-wrap {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .opsi-kotak {
            border: 2px solid #cfd8e3;
            background: #fff;
            border-radius: 12px;
            padding: 10px 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .opsi-kotak:hover {
            border-color: #2E75B6;
            background: #eef5ff;
        }

        .opsi-kotak.active {
            background: #2E75B6;
            color: #fff;
            border-color: #2E75B6;
        }

        .opsi-kotak.benar {
            background: #198754 !important;
            color: #fff !important;
            border-color: #198754 !important;
        }

        .opsi-kotak.salah {
            background: #dc3545 !important;
            color: #fff !important;
            border-color: #dc3545 !important;
        }
    </style>

    {{-- Subjudul --}}
    <h2 class="mt-2 mb-3" style="font-weight: 600;">2. Gradien Garis-garis yang saling Sejajar</h2>

    <div class="box-eksplorasi mt-5">
        <div class="title-box">
            Eksplorasi
        </div>

        <p class="mt-2">
            Pada bagian ini, kamu akan menemukan sendiri hubungan antara gradien dan kedudukan dua garis.
            Perhatikan beberapa garis berikut, hitung gradiennya, lalu bandingkan hasilnya.
        </p>

        <div class="quiz-card p-3 mb-3">

            {{-- STEP 1 --}}
            <div id="step1">
                <p class="mt-2">
                    Perhatikan empat garis berikut.
                </p>

                <div class="table-responsive mb-3" style="max-width: 550px">
                    <table class="table table-bordered text-center align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Garis</th>
                                <th>Titik</th>
                                <th>Gradien ($m$)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>$AB$</td>
                                <td>$A(-5,-1)$ dan $B(-3,5)$</td>
                                <td><input type="number" id="m1" class="form-control text-center"></td>
                            </tr>
                            <tr>
                                <td>$CD$</td>
                                <td>$C(-3,-3)$ dan $D(-1,3)$</td>
                                <td><input type="number" id="m2" class="form-control text-center"></td>
                            </tr>
                            <tr>
                                <td>$EF$</td>
                                <td>$E(0,-1)$ dan $F(2,5)$</td>
                                <td><input type="number" id="m3" class="form-control text-center"></td>
                            </tr>
                            <tr>
                                <td>$GH$</td>
                                <td>$G(2,-2)$ dan $H(3,1)$</td>
                                <td><input type="number" id="m4" class="form-control text-center"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p class="mb-3">
                    Gunakan rumus gradien $m = \frac{y_2-y_1}{x_2-x_1}$ untuk menghitung gradien setiap garis.
                </p>

                <button class="btn btn-palet" onclick="cekStep1()">Cek Jawaban</button>
                <div id="fb1" class="mt-2"></div>
            </div>

            {{-- STEP 2 --}}
            <div id="step2" class="d-none mt-3">
                <p>
                    Bagaimana hubungan nilai gradien dari keempat garis tersebut?
                </p>

                <div class="opsi-kotak-wrap">
                    <button type="button" class="opsi-kotak" onclick="cekStep2('sama', this)">
                        Semua gradien sama
                    </button>
                    <button type="button" class="opsi-kotak" onclick="cekStep2('beda', this)">
                        Gradien berbeda
                    </button>
                </div>

                <div id="fb2" class="mt-2"></div>
            </div>

            {{-- STEP 3 --}}
            <div id="step3" class="d-none mt-3">
                <p>
                    Sekarang perhatikan grafik keempat garis berikut.
                </p>

                <div id="ggb-wrapper-sejajar" class="mt-3">
                    <div id="ggb-eksplorasi" style="width:100%; height:400px;"></div>
                </div>

                <p class="mt-3 mb-0">
                    Keempat garis pada grafik memiliki kemiringan yang sama dan tidak saling berpotongan.
                    Berdasarkan hasil perhitungan gradien dan grafik tersebut, apa yang dapat kamu simpulkan?
                </p>

                <button class="btn btn-palet mt-3" onclick="cekStep4()">
                    Tampilkan Kesimpulan
                </button>

                <div id="fb4" class="mt-2"></div>
            </div>

            {{-- KESIMPULAN --}}
            <div id="kesimpulan" class="d-none mt-3 box-kesimpulan">
                <b>Kesimpulan:</b><br>
                Garis-garis yang saling sejajar memiliki gradien yang sama.
            </div>
        </div>
    </div>

    {{-- ========================================================= --}}
    {{-- MATERI KONSEP --}}
    {{-- ========================================================= --}}
    <div class="card card-materi mt-4 mb-4">
        <div class="card-body">
            <span class="badge-sub">Konsep Gradien Garis-Garis Sejajar</span>

            <p style="line-height:1.8; text-align:justify;">
                Berdasarkan kegiatan eksplorasi, kamu telah menemukan bahwa garis-garis yang
                memiliki gradien sama tampak memiliki kemiringan yang sama dan tidak saling
                berpotongan. Garis-garis seperti ini disebut garis sejajar.
            </p>

            <p style="line-height:1.8; text-align:justify;">
                Dengan demikian, gradien dapat digunakan untuk menentukan apakah dua garis
                saling sejajar atau tidak. Jika dua garis memiliki gradien yang sama,
                maka kedua garis tersebut sejajar.
            </p>

            <div class="text-center mb-3">
                <img src="{{ asset('img/hubungan gradien garis/gradiengaris2sejajar.png') }}"
                    class="img-fluid rounded zoomable" alt="Dua garis yang sejajar"
                    style="max-width:300px; width:100%; cursor:zoom-in;">

                <small class="text-muted d-block mt-2">
                    <strong>Gambar 3.3</strong> Dua garis yang sejajar
                </small>
            </div>

            <p style="line-height:1.8; text-align:justify;">
                Pada Gambar 3.3, garis <b>$k$</b> dan garis <b>$l$</b> memiliki kemiringan
                yang sama. Oleh karena itu, kedua garis tersebut merupakan garis sejajar.
            </p>

            <div class="box-kesimpulan">
                <b>Kesimpulan:</b><br>
                Dua garis sejajar memiliki gradien yang sama, sehingga dapat ditulis $m_1 = m_2$.
            </div>
        </div>
    </div>

    {{-- ========================================================= --}}
    {{-- CONTOH SOAL --}}
    {{-- ========================================================= --}}
    <div class="box-contoh mt-5 mb-4">
        <div class="card-body">
            <span class="title-box">Contoh</span>

            <div class="mt-3" style="line-height:1.8; text-align:justify;">

                {{-- CONTOH 1 --}}
                <p class="mb-2">
                    <b>Contoh 1.</b> Tentukan gradien garis <b>$k$</b> yang sejajar dengan garis
                    yang melalui titik <b>$A(1,2)$</b> dan <b>$B(4,8)$</b>.
                </p>

                <p class="mb-1"><b>Penyelesaian:</b></p>

                <p class="mb-2">
                    Garis yang melalui titik $A(1,2)$ dan $B(4,8)$ memiliki gradien
                    $m = \frac{y_2-y_1}{x_2-x_1}
                    = \frac{8-2}{4-1}
                    = \frac{6}{3}
                    = 2$.
                </p>

                <p class="mb-4">
                    Karena garis <b>$k$</b> sejajar dengan garis tersebut, maka gradiennya sama.
                    Jadi, gradien garis <b>$k$</b> adalah $m_k = 2$.
                </p>

                <hr class="my-4">

                {{-- CONTOH 2 --}}
                <p class="mb-2">
                    <b>Contoh 2.</b> Tentukan gradien garis <b>$p$</b> yang sejajar dengan garis
                    <b>$6x - 3y + 4 = 0$</b>.
                </p>

                <p class="mb-1"><b>Penyelesaian:</b></p>

                <p class="mb-2">
                    Persamaan $6x - 3y + 4 = 0$ berbentuk $Ax + By + C = 0$.
                    Dari persamaan tersebut diperoleh $A = 6$ dan $B = -3$.
                </p>

                <p class="mb-2">
                    Gradien garis tersebut adalah
                    $m = -\frac{A}{B}
                    = -\frac{6}{-3}
                    = 2$.
                </p>

                <p class="mb-0">
                    Karena garis <b>$p$</b> sejajar dengan garis tersebut, maka gradiennya sama.
                    Jadi, gradien garis <b>$p$</b> adalah $m_p = 2$.
                </p>

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

    <div class="box-latihan mt-5 mb-4" id="latihanC2Box">
        <div class="card-body">
            <span class="title-box">Latihan Soal</span>

            <!-- ===================== -->
            <!-- LATIHAN 1 -->
            <!-- ===================== -->
            <div class="latihan-step" id="latihanStep1">
                <p class="mb-3 mt-3" style="line-height:1.8;">
                    <b>1.</b> Diketahui suatu garis <b>$p$</b> sejajar dengan garis
                    <b>$20x - 2y + 5 = 0$</b>. Tentukan gradien garis <b>$p$</b>.
                </p>

                <div class="petunjuk-mini-latihan">
                    <strong>Petunjuk:</strong>
                    Isilah setiap kolom jawaban yang tersedia untuk menentukan gradien garis yang sejajar.
                </div>

                <div class="border rounded-4 p-3 mb-4" style="background:#f7f9fc;">
                    <p class="mb-4"><b>Penyelesaian:</b></p>

                    <div class="mb-4 d-flex flex-wrap align-items-center gap-2">
                        <span>Pada persamaan $20x - 2y + 5 = 0$ diperoleh</span>

                        <span>$A=$</span>
                        <input type="text" id="l1_A" class="form-control form-control-sm text-center bg-white"
                            style="width:80px;">

                        <span>dan</span>

                        <span>$B=$</span>
                        <input type="text" id="l1_B" class="form-control form-control-sm text-center bg-white"
                            style="width:80px;">
                    </div>

                    <p class="mb-2">
                        Gradien garis $20x - 2y + 5 = 0$ adalah:
                    </p>

                    <div class="mb-4 d-flex flex-wrap align-items-center gap-2" style="line-height:2;">
                        <span>$m = -\dfrac{A}{B} =$</span>

                        <span>$-$</span>

                        <div class="frac-input">
                            <div class="top">
                                <input type="text" id="l1_subAtas"
                                    class="form-control form-control-sm text-center bg-white" style="width:80px;">
                            </div>
                            <div class="bottom">
                                <input type="text" id="l1_subBawah"
                                    class="form-control form-control-sm text-center bg-white" style="width:80px;">
                            </div>
                        </div>

                        <span>$=$</span>

                        <input type="text" id="l1_hasil" class="form-control form-control-sm text-center bg-white"
                            style="width:80px;">
                    </div>

                    <div class="mb-4 d-flex flex-wrap align-items-center gap-2">
                        <span>Karena garis $p$ sejajar dengan garis tersebut, maka</span>
                        <span>$m_p=$</span>

                        <input type="text" id="l1_final" class="form-control form-control-sm text-center bg-white"
                            style="width:80px;">
                    </div>

                    <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <div>
                            <button type="button" class="btn btn-palet btn-sm" onclick="cekLatihan1()">
                                Cek Jawaban
                            </button>
                            <button type="button" class="btn btn-palet btn-sm" onclick="resetLatihan1()">
                                Reset
                            </button>
                        </div>

                        <button id="nextBtnLatihan1" type="button" class="btn btn-palet btn-sm"
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

                <p class="mb-3 mt-4" style="line-height:1.8;">
                    <b>2.</b> Perhatikan persamaan garis berikut. Pilih garis yang sejajar dengan
                    <b>$y = 4x + 2$</b>.
                </p>

                <div class="petunjuk-mini-latihan">
                    <strong>Petunjuk:</strong>
                    Pilih semua kotak jawaban yang memiliki gradien sama dengan garis yang diketahui.
                </div>

                <div class="border rounded-4 p-3 mb-4" style="background:#f7f9fc;">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="l2_a">
                        <label class="form-check-label" for="l2_a">
                            a. $y - 4x = 0$
                        </label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="l2_b">
                        <label class="form-check-label" for="l2_b">
                            b. $y = -8x + 4$
                        </label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="l2_c">
                        <label class="form-check-label" for="l2_c">
                            c. $2y = 8x - 5$
                        </label>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="l2_d">
                        <label class="form-check-label" for="l2_d">
                            d. $2y = 4x + 8$
                        </label>
                    </div>

                    <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <button type="button" class="btn btn-palet btn-sm" onclick="prevLatihan(1)">
                            Kembali ke Latihan 1
                        </button>

                        <div>
                            <button type="button" class="btn btn-palet btn-sm" onclick="cekLatihan2()">
                                Cek Jawaban
                            </button>
                            <button type="button" class="btn btn-palet btn-sm" onclick="resetLatihan2()">
                                Reset
                            </button>
                        </div>

                        <button id="nextBtnLatihan2" type="button" class="btn btn-palet btn-sm"
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

                <p class="mb-3 mt-4" style="line-height:1.8;">
                    <b>3.</b> Carilah nilai <b>$c$</b> agar garis <b>$4x + cy = 8$</b> sejajar dengan garis
                    <b>$x + y = 3$</b>.
                </p>

                <div class="petunjuk-mini-latihan">
                    <strong>Petunjuk:</strong>
                    Isilah setiap langkah penyelesaian pada kolom yang tersedia sampai diperoleh nilai \(c\).
                </div>

                <div class="border rounded-4 p-3 mb-4" style="background:#f7f9fc;">
                    <p class="mb-3"><b>Penyelesaian:</b></p>

                    <div class="mb-3">
                        Misalkan gradien garis $4x + cy = 8$ adalah $m_1$ dan gradien garis $x + y = 3$ adalah $m_2$.
                    </div>

                    <div class="mb-3 d-flex align-items-center gap-2 flex-wrap" style="line-height:2;">
                        <span>$m_1 =$</span>

                        <div class="frac-input">
                            <div class="top">
                                <input type="text" id="l3_m1_atas" class="form-control form-control-sm text-center">
                            </div>
                            <div class="bottom">
                                <input type="text" id="l3_m1_bawah" class="form-control form-control-sm text-center">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 d-flex align-items-center gap-2 flex-wrap">
                        <span>$m_2 =$</span>
                        <input type="text" id="l3_m2" class="form-control form-control-sm text-center"
                            style="width:80px;">
                    </div>

                    <div class="mb-3 d-flex align-items-center gap-2 flex-wrap">
                        <span>Karena sejajar, maka</span>
                        <span>$m_1 =$</span>
                        <input type="text" id="l3_relasi" class="form-control form-control-sm text-center"
                            style="width:80px;" placeholder="m₂">
                    </div>

                    <p>Substitusikan ke persamaannya</p>
                    <div class="mb-3 d-flex align-items-center gap-2 flex-wrap" style="line-height:2;">
                        <div class="frac-input">
                            <div class="top">
                                <input type="text" id="l3_kiri_atas" class="form-control form-control-sm text-center">
                            </div>
                            <div class="bottom">
                                <input type="text" id="l3_kiri_bawah"
                                    class="form-control form-control-sm text-center">
                            </div>
                        </div>

                        <span>=</span>

                        <input type="text" id="l3_kanan" class="form-control form-control-sm text-center"
                            style="width:80px;">
                    </div>

                    <div class="mb-3 d-flex align-items-center gap-2 flex-wrap">
                        <span>$c =$</span>
                        <input type="text" id="l3_c" class="form-control form-control-sm text-center"
                            style="width:80px;">
                    </div>

                    <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <button type="button" class="btn btn-palet btn-sm" onclick="prevLatihan(2)">
                            Kembali ke Latihan 2
                        </button>

                        <div>
                            <button type="button" class="btn btn-palet btn-sm" onclick="cekLatihan3()">
                                Cek Jawaban
                            </button>
                            <button type="button" class="btn btn-palet btn-sm" onclick="resetLatihan3()">
                                Reset
                            </button>
                        </div>
                    </div>

                    <div id="fbLatihan3" class="mt-3"></div>
                    <div id="pesanAkhirLatihan" class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://www.geogebra.org/apps/deployggb.js"></script>
    <script>
        // =========================
        // GeoGebra Eksplorasi
        // =========================
        let appletEks = null;
        let sudahLoad = false;

        function ggbOnLoadEks(api) {
            api.setPerspective("G");

            api.setAxesVisible(true, true);
            api.setGridVisible(true);

            api.setGraphicsOptions(1, {
                gridDistance: [1, 1], // jarak grid utama (1 satuan)
                minorGrid: false, // MATIKAN minor grid
            });

            api.setGraphicsOptions(1, {
                gridType: 0,
            });

            api.setCoordSystem(-7, 7, -7, 7);
            api.setAxisSteps(1, 1, 1, 1);

            // Titik-titik
            api.evalCommand("A=(-5,-1)");
            api.evalCommand("B=(-3,5)");
            api.evalCommand("C=(-3,-3)");
            api.evalCommand("D=(-1,3)");
            api.evalCommand("E=(0,-1)");
            api.evalCommand("F=(2,5)");
            api.evalCommand("G=(2,-2)");
            api.evalCommand("H=(3,1)");

            // Ruas garis
            api.evalCommand("s1=Segment(A,B)");
            api.evalCommand("s2=Segment(C,D)");
            api.evalCommand("s3=Segment(E,F)");
            api.evalCommand("s4=Segment(G,H)");

            // Atur titik
            ["A", "B", "C", "D", "E", "F", "G", "H"].forEach(function(obj) {
                api.setLabelVisible(obj, true);
                api.setFixed(obj, true, false);
                api.setPointSize(obj, 5);
                api.setColor(obj, 0, 0, 0);
            });

            // Atur ruas garis
            ["s1", "s2", "s3", "s4"].forEach(function(obj) {
                api.setLabelVisible(obj, false);
                api.setLineThickness(obj, 5);
                api.setColor(obj, 220, 60, 35);
            });

            // Tampilkan sumbu dan grid
            api.setAxesVisible(true, true);
            api.setGridVisible(true);

            // Atur tampilan koordinat
            api.setCoordSystem(-6, 6, -5.5, 6);
        }

        function tampilkanGrafik() {
            if (sudahLoad) return;

            const paramsEks = {
                appName: "classic",
                id: "ggbAppletEks",
                width: 500,
                height: 500,
                showToolBar: false,
                showAlgebraInput: false,
                showMenuBar: false,
                enableRightClick: false,
                showResetIcon: true,
                appletOnLoad: ggbOnLoadEks,
            };

            appletEks = new GGBApplet(paramsEks, true);
            appletEks.inject("ggb-eksplorasi");

            sudahLoad = true;
        }

        function tampilkanStep(id) {
            const el = document.getElementById(id);
            if (el) el.classList.remove("d-none");
        }

        function disableMany(ids) {
            ids.forEach((id) => {
                const el = document.getElementById(id);
                if (el) el.disabled = true;
            });
        }

        function resetOpsiKotak(containerSelector) {
            const opsi = document.querySelectorAll(`${containerSelector} .opsi-kotak`);
            opsi.forEach((item) => {
                item.classList.remove("active", "benar", "salah");
            });
        }

        function tandaiOpsi(element, status) {
            if (!element) return;
            element.classList.add("active");
            if (status === "benar") {
                element.classList.add("benar");
            } else if (status === "salah") {
                element.classList.add("salah");
            }
        }

        function disableOpsiKotak(containerSelector) {
            const opsi = document.querySelectorAll(`${containerSelector} .opsi-kotak`);
            opsi.forEach((item) => {
                item.disabled = true;
                item.style.pointerEvents = "none";
            });
        }

        // =========================
        // HELPER
        // =========================
        function norm(v) {
            return String(v || "")
                .trim()
                .replace(/\s+/g, "")
                .replace(/−/g, "-")
                .toLowerCase();
        }

        function renderMathTarget(target) {
            let el = target;

            if (typeof target === "string") {
                el = document.getElementById(target);
            }

            if (!el || !window.renderMathInElement) return;

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
            renderMathTarget(document.getElementById("latihanC2Box") || document.body);
            restoreProgressC2();
        });

        // =========================
        // Eksplorasi
        // =========================

        function cekStep1() {
            const m1 = document.getElementById("m1").value.trim();
            const m2 = document.getElementById("m2").value.trim();
            const m3 = document.getElementById("m3").value.trim();
            const m4 = document.getElementById("m4").value.trim();
            const fb = document.getElementById("fb1");

            let pesan = [];

            if (m1 !== "3") pesan.push("Gradien garis <b>AB</b> belum tepat.");
            if (m2 !== "3") pesan.push("Gradien garis <b>CD</b> belum tepat.");
            if (m3 !== "3") pesan.push("Gradien garis <b>EF</b> belum tepat.");
            if (m4 !== "3") pesan.push("Gradien garis <b>GH</b> belum tepat.");

            if (pesan.length === 0) {
                fb.innerHTML = `
            <div class="alert alert-success mt-2">
                Bagus! Semua gradien sudah benar. Sekarang bandingkan hasilnya.
            </div>
        `;

                disableMany(["m1", "m2", "m3", "m4"]);
                tampilkanStep("step2");
            } else {
                fb.innerHTML = `
            <div class="alert alert-warning mt-2">
                <b>Masih ada jawaban yang belum tepat:</b><br><br>
                ${pesan.join("<br>")}
                <br><br>
                <b>Petunjuk:</b> Gunakan rumus gradien
                $m = \\frac{y_2-y_1}{x_2-x_1}$.
            </div>
        `;
            }

            renderMathTarget("fb1");
        }

        function cekStep2(jawaban, el) {
            const fb = document.getElementById("fb2");
            const container = "#step2";

            resetOpsiKotak(container);

            if (jawaban === "sama") {
                tandaiOpsi(el, "benar");

                fb.innerHTML = `
            <div class="alert alert-success mt-2">
                Tepat. Keempat garis memiliki gradien yang sama.
                Sekarang perhatikan grafiknya.
            </div>
        `;

                disableOpsiKotak(container);

                // Tampilkan step grafik
                tampilkanStep("step3");

                // Kalau wrapper grafik masih punya d-none, buka juga
                const wrapper = document.getElementById("ggb-wrapper-sejajar");
                if (wrapper) wrapper.classList.remove("d-none");

                // Render grafik setelah elemen tampil
                setTimeout(function() {
                    tampilkanGrafik();
                }, 200);

            } else {
                tandaiOpsi(el, "salah");

                fb.innerHTML = `
            <div class="alert alert-warning mt-2">
                Coba perhatikan kembali hasil gradien pada tabel.
                Apakah semuanya menunjukkan nilai yang sama?
            </div>
        `;
            }

            renderMathTarget("fb2");
        }

        function cekStep4() {
            const fb = document.getElementById("fb4");
            const kesimpulan = document.getElementById("kesimpulan");

            // Kosongkan feedback agar tidak dobel
            if (fb) fb.innerHTML = "";

            // Tampilkan kesimpulan saja
            if (kesimpulan) kesimpulan.classList.remove("d-none");

            renderMathTarget("kesimpulan");
        }


        function clearValidContoh(ids) {
            ids.forEach((id) => {
                const el = document.getElementById(id);
                if (el) el.classList.remove("is-valid", "is-invalid");
            });
        }

        function setValidContoh(id, benar) {
            const el = document.getElementById(id);
            if (!el) return;

            el.classList.remove("is-valid", "is-invalid");
            el.classList.add(benar ? "is-valid" : "is-invalid");
        }

        // =========================
        // LATIHAN SOAL SUBBAB C2
        // Sistem turun ke bawah
        // =========================


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
            renderMathTarget(step);
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
                console.log("Simpan latihan C2:", data);

                return response.ok;
            } catch (error) {
                console.error("Gagal menyimpan latihan C2:", error);
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
        function cekField(id, jawabanBenar) {
            const el = document.getElementById(id);

            if (!el) {
                return false;
            }

            const nilaiUser = norm(el.value);
            const daftarJawaban = Array.isArray(jawabanBenar) ?
                jawabanBenar.map(norm) : [norm(jawabanBenar)];

            const cocok = daftarJawaban.includes(nilaiUser);

            el.classList.remove("is-valid", "is-invalid");
            el.classList.add(cocok ? "is-valid" : "is-invalid");

            return cocok;
        }

        function clearFields(ids) {
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

            renderMathTarget(el);
        }

        // Simpan Jawaban
        function ambilJawabanLatihan1C2() {
            return {
                l1_A: document.getElementById("l1_A")?.value.trim() ?? "",
                l1_B: document.getElementById("l1_B")?.value.trim() ?? "",
                l1_subAtas: document.getElementById("l1_subAtas")?.value.trim() ?? "",
                l1_subBawah: document.getElementById("l1_subBawah")?.value.trim() ?? "",
                l1_hasil: document.getElementById("l1_hasil")?.value.trim() ?? "",
                l1_final: document.getElementById("l1_final")?.value.trim() ?? "",
            };
        }

        function ambilJawabanLatihan2C2() {
            const selected = [];

            ["a", "b", "c", "d"].forEach((kode) => {
                const el = document.getElementById(`l2_${kode}`);
                if (el?.checked) selected.push(kode);
            });

            return {
                selected: selected,
            };
        }

        function ambilJawabanLatihan3C2() {
            return {
                l3_m1_atas: document.getElementById("l3_m1_atas")?.value.trim() ?? "",
                l3_m1_bawah: document.getElementById("l3_m1_bawah")?.value.trim() ?? "",
                l3_m2: document.getElementById("l3_m2")?.value.trim() ?? "",
                l3_relasi: document.getElementById("l3_relasi")?.value.trim() ?? "",
                l3_kiri_atas: document.getElementById("l3_kiri_atas")?.value.trim() ?? "",
                l3_kiri_bawah: document.getElementById("l3_kiri_bawah")?.value.trim() ?? "",
                l3_kanan: document.getElementById("l3_kanan")?.value.trim() ?? "",
                l3_c: document.getElementById("l3_c")?.value.trim() ?? "",
            };
        }

        // =========================
        // LATIHAN 1
        // =========================
        async function cekLatihan1() {
            const benarA = cekField("l1_A", "20");
            const benarB = cekField("l1_B", "-2");

            // Karena bentuknya m = -A/B = - [20] / [-2]
            // maka input atas cukup 20, bukan -20.
            const benarSubAtas = cekField("l1_subAtas", "20");
            const benarSubBawah = cekField("l1_subBawah", "-2");

            const benarHasil = cekField("l1_hasil", "10");
            const benarFinal = cekField("l1_final", "10");

            const semuaBenar =
                benarA &&
                benarB &&
                benarSubAtas &&
                benarSubBawah &&
                benarHasil &&
                benarFinal;

            const nextBtn = document.getElementById("nextBtnLatihan1");

            if (semuaBenar) {
                isiFeedback(
                    "fbLatihan1",
                    "success",
                    "Benar. Gradien garis \\(20x - 2y + 5 = 0\\) adalah \\(10\\), sehingga gradien garis \\(p\\) juga \\(10\\) karena kedua garis sejajar. Silakan lanjut ke latihan berikutnya."
                );

                if (nextBtn) nextBtn.disabled = false;

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L1`,
                    "input",
                    ambilJawabanLatihan1C2(),
                    true
                );
            } else {
                isiFeedback(
                    "fbLatihan1",
                    "warning",
                    "Masih ada jawaban yang belum tepat. Gunakan rumus \\(m = -\\frac{A}{B}\\), lalu ingat bahwa garis sejajar memiliki gradien yang sama."
                );

                if (nextBtn) nextBtn.disabled = true;
                resetStepSetelah(2);
            }
        }

        function resetLatihan1() {
            clearFields([
                "l1_A",
                "l1_B",
                "l1_subAtas",
                "l1_subBawah",
                "l1_hasil",
                "l1_final",
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
        async function cekLatihan2() {
            const a = document.getElementById("l2_a")?.checked;
            const b = document.getElementById("l2_b")?.checked;
            const c = document.getElementById("l2_c")?.checked;
            const d = document.getElementById("l2_d")?.checked;

            const nextBtn = document.getElementById("nextBtnLatihan2");

            if (a && c && !b && !d) {
                isiFeedback(
                    "fbLatihan2",
                    "success",
                    "Benar. Garis a dan c sejajar dengan $y = 4x + 2$ karena memiliki gradien yang sama, yaitu $4$. Silakan lanjut ke latihan berikutnya."
                );

                if (nextBtn) nextBtn.disabled = false;
                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L2`,
                    "checkbox",
                    ambilJawabanLatihan2C2(),
                    true
                );
            } else {
                isiFeedback(
                    "fbLatihan2",
                    "warning",
                    "Masih ada pilihan yang belum tepat. Ubah setiap persamaan ke bentuk $y = mx + c$, lalu bandingkan nilai gradiennya."
                );

                if (nextBtn) nextBtn.disabled = true;
                resetStepSetelah(3);
            }
        }

        function resetLatihan2() {
            ["l2_a", "l2_b", "l2_c", "l2_d"].forEach((id) => {
                const el = document.getElementById(id);
                if (el) el.checked = false;
            });

            const fb = document.getElementById("fbLatihan2");
            const nextBtn = document.getElementById("nextBtnLatihan2");

            if (fb) fb.innerHTML = "";
            if (nextBtn) nextBtn.disabled = true;

            resetStepSetelah(3);
        }

        // =========================
        // LATIHAN 3
        // =========================
        async function cekLatihan3() {
            const benarM1Atas = cekField("l3_m1_atas", "-4");
            const benarM1Bawah = cekField("l3_m1_bawah", "c");
            const benarM2 = cekField("l3_m2", "-1");

            const benarRelasi = cekField("l3_relasi", "m2");

            const benarKiriAtas = cekField("l3_kiri_atas", "-4");
            const benarKiriBawah = cekField("l3_kiri_bawah", "c");
            const benarKanan = cekField("l3_kanan", "-1");
            const benarC = cekField("l3_c", "4");

            const semuaBenar =
                benarM1Atas &&
                benarM1Bawah &&
                benarM2 &&
                benarRelasi &&
                benarKiriAtas &&
                benarKiriBawah &&
                benarKanan &&
                benarC;

            const akhir = document.getElementById("pesanAkhirLatihan");

            if (semuaBenar) {
                isiFeedback(
                    "fbLatihan3",
                    "success",
                    "Benar. Karena kedua garis sejajar, maka $m_1 = m_2$. Dari $-\\frac{4}{c} = -1$, diperoleh $c = 4$."
                );

                if (akhir) {
                    akhir.innerHTML = `
                <div class="alert alert-success fw-semibold text-center mt-3">
                    Bagus, kamu sudah memahami gradien dua garis yang sejajar.
                    Silakan lanjut ke materi berikutnya.
                </div>
            `;
                    renderMathTarget(akhir);
                }

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L3`,
                    "input",
                    ambilJawabanLatihan3C2(),
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
            } else {
                isiFeedback(
                    "fbLatihan3",
                    "warning",
                    "Masih ada jawaban yang belum tepat. Gunakan rumus gradien bentuk umum $Ax + By + C = 0$, yaitu $m = -\\frac{A}{B}$, lalu samakan kedua gradien karena garisnya sejajar."
                );

                if (akhir) akhir.innerHTML = "";
            }
        }

        function resetLatihan3() {
            clearFields([
                "l3_m1_atas",
                "l3_m1_bawah",
                "l3_m2",
                "l3_relasi",
                "l3_kiri_atas",
                "l3_kiri_bawah",
                "l3_kanan",
                "l3_c",
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

        function setCheckedSafe(id, checked) {
            const el = document.getElementById(id);

            if (el) {
                el.checked = checked;
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

        function restoreLatihan1C2() {
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
                isiFeedback(
                    "fbLatihan1",
                    "success",
                    "Jawaban Latihan 1 sudah tersimpan."
                );
            }

            if (nextBtn) nextBtn.disabled = false;
            if (latihan2) latihan2.style.display = "block";
        }

        function restoreLatihan2C2() {
            const saved = SAVED_LATIHAN[`${MATERI_SLUG}_L2`]?.jawaban;

            if (!saved || !Array.isArray(saved.selected)) return;

            ["a", "b", "c", "d"].forEach((kode) => {
                setCheckedSafe(`l2_${kode}`, saved.selected.includes(kode));
            });

            const fb = document.getElementById("fbLatihan2");
            const nextBtn = document.getElementById("nextBtnLatihan2");
            const latihan2 = document.getElementById("latihanStep2");
            const latihan3 = document.getElementById("latihanStep3");

            if (fb) {
                isiFeedback(
                    "fbLatihan2",
                    "success",
                    "Jawaban Latihan 2 sudah tersimpan."
                );
            }

            if (latihan2) latihan2.style.display = "block";
            if (latihan3) latihan3.style.display = "block";
            if (nextBtn) nextBtn.disabled = false;
        }

        function restoreLatihan3C2() {
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
                isiFeedback(
                    "fbLatihan3",
                    "success",
                    "Jawaban Latihan 3 sudah tersimpan."
                );
            }

            if (akhir) {
                akhir.innerHTML = `
            <div class="alert alert-success fw-semibold text-center mt-3">
                Bagus, kamu sudah memahami gradien dua garis yang sejajar.
                Silakan lanjut ke materi berikutnya.
            </div>
        `;
                renderMathTarget(akhir);
            }

            bukaNextButton();
        }

        function restoreProgressC2() {
            restoreLatihan1C2();
            restoreLatihan2C2();
            restoreLatihan3C2();

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
