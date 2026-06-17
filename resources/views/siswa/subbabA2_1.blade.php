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

        .materi-img {
            width: 100%;
            max-width: 560px;
            display: block;
            margin: 10px auto 0;
            border-radius: 8px;
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

        .tabel-garis td:nth-child(1),
        .tabel-garis td:nth-child(3) {
            text-align: center;
        }

        .tabel-garis td {
            text-align: center;
            vertical-align: middle;
        }

        .tabel-garis td input {
            display: inline-block;
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

        .box-kesimpulan {
            background: #fff8e8;
            border: 1px solid #e6c76a;
            border-radius: 12px;
            padding: 14px 16px;
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
    </style>

    <style>
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

        .input-latihan {
            width: 90px;
            padding: 6px 10px;
            border: 1px solid rgba(0, 0, 0, .25);
            border-radius: 8px;
            font-size: 15px;
            text-align: center;
            background: #fff;
            outline: none;
            box-shadow: none;
            background-image: none;
        }

        .input-latihan:focus {
            border-color: #2E75B6;
        }

        .input-latihan.is-valid {
            border: 2px solid #198754 !important;
            background-color: #f0fff4 !important;
            background-image: none !important;
        }

        .input-latihan.is-invalid {
            border: 2px solid #dc3545 !important;
            background-color: #fff5f5 !important;
            background-image: none !important;
        }
    </style>

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

        .grafik-wrapper {
            width: 100%;
            max-width: 760px;
            margin: 0 auto;
            overflow-x: hidden;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 12px;
            background: #fff;
        }

        #canvas-holder {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #canvas-holder canvas {
            max-width: 100% !important;
            height: auto !important;
            display: block;
            border-radius: 8px;
        }

        .grafik-actions {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 16px;
            flex-wrap: wrap;
        }

        /* RESPONSIVE MOBILE */
        @media (max-width: 768px) {

            /* ---------- GAMBAR ---------- */
            .materi-img,
            .zoomable {
                width: 100% !important;
                max-width: 100% !important;
                height: auto !important;
                display: block;
                margin-left: auto;
                margin-right: auto;
            }

            /* ---------- TABEL ---------- */
            .tabel-garis,
            .tabel-latihan {
                width: 100% !important;
                min-width: unset !important;
                font-size: 13px;
            }

            .tabel-garis th,
            .tabel-garis td {
                padding: 6px 4px;
            }

            /* ---------- INPUT ---------- */
            .input-matematika,
            .input-latihan,
            .input-y {
                width: 70px !important;
                max-width: 70px !important;
                font-size: 12px;
                padding: 4px 6px;
            }

            /* ---------- P5 JS / CANVAS ---------- */
            #canvas-holder,
            #canvas-contoh-21,
            .grafik-wrapper {
                width: 100%;
                overflow-x: hidden;
            }

            canvas {
                max-width: 100% !important;
                height: auto !important;
                display: block;
                margin: 0 auto;
            }

            /* ---------- BUTTON ---------- */
            .grafik-actions,
            .d-flex.gap-2.flex-wrap {
                flex-direction: column;
                gap: 8px;
            }

            /* ---------- BOX ---------- */
            .box-info,
            .box-contoh,
            .box-latihan,
            .box-kesimpulan {
                padding: 14px;
            }

            /* Layout button latihan */
            .d-flex.justify-content-between.align-items-center {
                flex-direction: column;
                align-items: stretch !important;
                gap: 10px;
            }

            .d-flex.justify-content-between.align-items-center>div {
                display: flex;
                flex-direction: column;
                gap: 8px;
                width: 100%;
            }

            .d-flex.justify-content-between.align-items-center .btn {
                width: 100%;
                margin-left: 0 !important;
            }

        }
    </style>

    <style>
        /* ===== Canvas Contoh 2.1 ===== */

        .plot-contoh-row {
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 24px;
            align-items: start;
            justify-content: center;
        }

        .plot-info-side {
            width: 260px;
            margin-top: 100px;
        }

        .plot-info-side .info-aktivitas {
            min-height: 120px;
        }

        @media (max-width: 992px) {
            .plot-contoh-row {
                grid-template-columns: 1fr;
            }

            .plot-info-side {
                width: 100%;
                margin-top: 12px;
            }
        }

        .canvas-responsive {
            width: 100%;
            max-width: 540px;
            overflow: hidden;
            border: 1px solid rgba(0, 0, 0, .08);
            border-radius: 12px;
            background: #fff;
            padding: 8px;
        }

        #canvas-contoh-21 {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        #canvas-contoh-21 canvas {
            width: 100% !important;
            max-width: 520px !important;
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
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/contrib/auto-render.min.js"
        onload="renderMathInElement(document.body);"></script>

    {{-- Subjudul --}}
    <h2 class="mt-2 mb-3" style="font-weight: 600;">2. Menggambar Grafik Persamaan Garis Lurus</h2>


    <div class="box-info mb-3">
        <h5 class="mb-2" style="font-weight:700;">2.1 Menggambar Grafik Persamaan menggunakan Beberapa Titik</h5>

        <p class="mb-3" style="line-height:1.7;">
            Persamaan garis lurus tidak hanya dapat dinyatakan dalam bentuk aljabar,
            tetapi juga dapat direpresentasikan dalam bentuk grafik. Dengan menggambarkan grafik,
            kita dapat memahami hubungan antara dua variabel secara lebih jelas dan visual.
            Berikut ini akan dibahas cara menggambar grafik persamaan garis lurus.
        </p>

        <p class="mb-2">
            Grafik persamaan garis lurus dapat digambar dengan menentukan beberapa titik yang memenuhi persamaan tersebut.
            Langkah-langkah menggambar grafik persamaan garis lurus adalah sebagai berikut:
        </p>

        <ol class="mb-0" style="line-height:1.7; padding-left: 18px;">
            <li>Tentukan titik-titik yang memenuhi persamaan garis lurus dengan terlebih dahulu memilih beberapa nilai $x$,
                kemudian hitung nilai $y$ yang sesuai.</li>
            <li>Buatlah tabel pasangan nilai $x$ dan $y$ yang memenuhi persamaan garis lurus.</li>
            <li>Gambarkan pasangan berurutan $(x, y)$ sebagai titik-titik pada bidang koordinat Kartesius.</li>
            <li>Hubungkan titik-titik tersebut sehingga terbentuk sebuah garis lurus.</li>
        </ol>
    </div>

    {{-- Contoh --}}
    <div class="box-contoh mt-4 mb-4">
        <span class="title-box">Contoh</span>

        <div class="box-info mb-3 text-center">
            <figure class="figure">
                <img src="{{ asset('img/contohsubbab2_1.png') }}" alt="ilustrasi sepeda" class="zoomable img-fluid"
                    style="max-width:520px; cursor:zoom-in;">

                <figcaption class="figure-caption text-center mt-2">
                    <strong>Gambar 1.4</strong> Ilustrasi perubahan jarak tempuh sepeda terhadap waktu
                </figcaption>
            </figure>
        </div>

        <p class="mb-2" style="line-height:1.7;">
            Sebuah sepeda sudah menempuh jarak 2 km dari tempat mulai.
            Setelah itu, sepeda bergerak dengan kecepatan tetap, yaitu 3 km setiap jam.
            Kita ingin mengetahui jarak sepeda setelah beberapa waktu berikutnya.
        </p>

        <p class="mb-2" style="line-height:1.7;">
            Misalkan \(x\) menyatakan lama waktu sepeda bergerak dalam jam,
            dan \(y\) menyatakan jarak yang ditempuh sepeda dalam km.
            Jarak awal sepeda adalah 2 km, kemudian bertambah 3 km setiap jam.
            Jadi, hubungan antara \(x\) dan \(y\) dapat ditulis:
        </p>

        <p class="text-center mb-2" style="font-weight:700;">
            \( y = 3x + 2 \)
        </p>

        <div class="box-info mb-3" style="background:#fff;">
            <p class="mb-2" style="line-height:1.7;">
                Untuk menggambar grafik persamaan \( y = 3x + 2 \), kita dapat menentukan
                beberapa titik terlebih dahulu. Misalnya, kita ingin mengetahui jarak sepeda
                setelah 1 jam, 2 jam, 3 jam, dan 4 jam.
            </p>

            <p class="mb-2" style="line-height:1.7;">
                Oleh karena itu, nilai \(x\) yang digunakan adalah \(1, 2, 3,\) dan \(4\).
                Setiap nilai \(x\) dimasukkan ke dalam persamaan untuk memperoleh nilai \(y\).
                Hasilnya kemudian dituliskan sebagai pasangan titik \((x,y)\) seperti pada tabel berikut.
            </p>
            <div class="table-responsive" style="width: fit-content; max-width: 100%; overflow-x: auto;">
                <table class="tabel-garis" style="width:auto; min-width:500px;">
                    <thead>
                        <tr>
                            <th>\(x\)</th>
                            <th>\(y = 3x + 2\)</th>
                            <th>\((x,y)\)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>\(1\)</td>
                            <td>\(y = 3(1) + 2 = 5\)</td>
                            <td>\((1,5)\)</td>
                        </tr>
                        <tr>
                            <td>\(2\)</td>
                            <td>\(y = 3(2) + 2 = 8\)</td>
                            <td>\((2,8)\)</td>
                        </tr>
                        <tr>
                            <td>\(3\)</td>
                            <td>\(y = 3(3) + 2 = 11\)</td>
                            <td>\((3,11)\)</td>
                        </tr>
                        <tr>
                            <td>\(4\)</td>
                            <td>\(y = 3(4) + 2 = 14\)</td>
                            <td>\((4,14)\)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <p class="mb-2" style="line-height:1.7;">
            Berdasarkan tabel di atas, diperoleh pasangan titik \((1,5)\), \((2,8)\), \((3,11)\),
            dan \((4,14)\). Titik-titik tersebut kemudian digambar pada bidang koordinat.
        </p>

        <div class="box-info mb-3" style="background:#fff;">
            <p class="mb-2" style="font-weight:600;">
                Tempatkan titik-titik berikut pada bidang koordinat sesuai pasangan titik yang diperoleh dari tabel.
            </p>

            <div class="petunjuk-mini-latihan">
                <strong>Petunjuk:</strong>
                Klik titik pada bidang koordinat Kartesius sesuai urutan
                $A(1,5)$, $B(2,8)$, $C(3,11)$, dan $D(4,14)$.
                Jika titik yang kamu klik benar, titik akan muncul pada bidang koordinat.
                Jika semua titik sudah tepat, titik-titik tersebut akan dihubungkan membentuk garis lurus.
            </div>

            <div class="plot-contoh-row">
                <div class="canvas-responsive">
                    <div id="canvas-contoh-21"></div>
                </div>

                <div class="plot-info-side">
                    <div id="infoContoh21" class="info-aktivitas">
                        Klik titik <b>A(1,5)</b> pada bidang koordinat.
                    </div>

                    <div class="mt-3">
                        <button class="btn-palet btn btn-sm" onclick="resetContoh21()">Reset</button>
                    </div>
                </div>
            </div>

            <script src="{{ asset('js/subbabA/pcontoh21.js') }}"></script>
        </div>
    </div>

    {{-- ===== Latihan Soal A2.1 ===== --}}
    <div class="box-latihan mt-5">
        <div class="card-body">
            <span class="title-box">Latihan Soal</span>

            <!-- ===================== -->
            <!-- LATIHAN 1 -->
            <!-- ===================== -->
            <div class="latihan-step" id="latihanStep1">

                <p class="mb-2" style="max-width: 720px;">
                    <b>1.</b> Diketahui persamaan garis lurus:
                    <b>$y = x - 3$</b>.
                    Lengkapilah tabel berikut dengan menentukan nilai $y$ untuk setiap nilai $x$,
                    kemudian tuliskan pasangan berurutan $(x,y)$ yang sesuai.
                </p>

                <div class="petunjuk-mini-latihan">
                    <strong>Petunjuk:</strong>
                    Substitusikan setiap nilai $x$ ke dalam persamaan $y = x - 3$.
                    Setelah nilai $y$ diperoleh, tuliskan pasangan berurutan dalam bentuk $(x,y)$.
                    Contoh penulisan pasangan titik: $1, -2$ atau $(1,-2)$.
                </div>

                <table class="tabel-garis" style="width: 500px">
                    <tr>
                        <th>$x$</th>
                        <th>$y = x - 3$</th>
                        <th>$(x,y)$</th>
                    </tr>

                    <tr>
                        <td>$-2$</td>

                        <td>
                            <input type="text" id="lat1_y1"
                                class="form-control form-control-sm d-inline-block text-center input-matematika"
                                style="width:90px;">
                        </td>

                        <td>
                            <input type="text" id="lat1_pair1"
                                class="form-control form-control-sm d-inline-block text-center input-matematika"
                                style="width:110px;">
                        </td>
                    </tr>

                    <tr>
                        <td>$0$</td>

                        <td>
                            <input type="text" id="lat1_y2"
                                class="form-control form-control-sm d-inline-block text-center input-matematika"
                                style="width:90px;">
                        </td>

                        <td>
                            <input type="text" id="lat1_pair2"
                                class="form-control form-control-sm d-inline-block text-center input-matematika"
                                style="width:110px;">
                        </td>
                    </tr>

                    <tr>
                        <td>$2$</td>

                        <td>
                            <input type="text" id="lat1_y3"
                                class="form-control form-control-sm d-inline-block text-center input-matematika"
                                style="width:90px;">
                        </td>

                        <td>
                            <input type="text" id="lat1_pair3"
                                class="form-control form-control-sm d-inline-block text-center input-matematika"
                                style="width:110px;">
                        </td>
                    </tr>

                    <tr>
                        <td>$4$</td>

                        <td>
                            <input type="text" id="lat1_y4"
                                class="form-control form-control-sm d-inline-block text-center input-matematika"
                                style="width:90px;">
                        </td>

                        <td>
                            <input type="text" id="lat1_pair4"
                                class="form-control form-control-sm d-inline-block text-center input-matematika"
                                style="width:110px;">
                        </td>
                    </tr>
                </table>

                <div class="mt-3">
                    <button type="button" class="btn btn-palet btn-sm" onclick="cekLatihan1A21()">
                        Cek Jawaban
                    </button>

                    <button type="button" class="btn btn-palet btn-sm" onclick="resetLatihan1A21()">
                        Reset
                    </button>
                </div>

                <div id="feedbackLatihan1" class="mt-2 fw-semibold"></div>

                <div class="mt-3 text-end">
                    <button id="nextBtnLat1" class="btn btn-palet btn-sm" onclick="nextLatihan(2)" disabled>
                        Lanjut ke Latihan 2
                    </button>
                </div>
            </div>

            <!-- ===================== -->
            <!-- LATIHAN 2 -->
            <!-- ===================== -->
            <div class="latihan-step" id="latihanStep2" style="display:none;">

                <hr class="my-4">

                <p class="mb-2" style="max-width: 720px;">
                    <b>2.</b> Diketahui persamaan garis lurus:
                    <b>$y = 2x + 5$</b>.
                    Tentukan nilai $y$ untuk setiap nilai $x$ pada tabel berikut.
                    Setelah tabel benar, gunakan pasangan titik yang diperoleh untuk menggambar grafik
                    pada bidang koordinat.
                </p>

                <div class="petunjuk-mini-latihan">
                    <strong>Petunjuk:</strong>
                    Hitung nilai $y$ dengan mensubstitusikan setiap nilai $x$ ke dalam persamaan
                    $y = 2x + 5$. Setelah semua nilai $y$ diisi, klik tombol
                    <strong>Cek Tabel</strong>. Jika tabel benar, bidang koordinat akan muncul
                    dan kamu dapat mengeklik titik $A$, $B$, $C$, dan $D$ sesuai pasangan titik pada tabel.
                </div>

                <table class="tabel-garis" style="width: 500px">
                    <tr>
                        <th>$x$</th>
                        <th>$y = 2x + 5$</th>
                        <th>$(x,y)$</th>
                    </tr>

                    <tr>
                        <td>$-4$</td>

                        <td>
                            <input type="text" id="y1"
                                class="form-control form-control-sm d-inline-block text-center input-matematika"
                                style="width:90px;">
                        </td>

                        <td id="pair1">$A(-4, \dots)$</td>
                    </tr>

                    <tr>
                        <td>$-2$</td>

                        <td>
                            <input type="text" id="y2"
                                class="form-control form-control-sm d-inline-block text-center input-matematika"
                                style="width:90px;">
                        </td>

                        <td id="pair2">$B(-2, \dots)$</td>
                    </tr>

                    <tr>
                        <td>$0$</td>

                        <td>
                            <input type="text" id="y3"
                                class="form-control form-control-sm d-inline-block text-center input-matematika"
                                style="width:90px;">
                        </td>

                        <td id="pair3">$C(0, \dots)$</td>
                    </tr>

                    <tr>
                        <td>$2$</td>

                        <td>
                            <input type="text" id="y4"
                                class="form-control form-control-sm d-inline-block text-center input-matematika"
                                style="width:90px;">
                        </td>

                        <td id="pair4">$D(2, \dots)$</td>
                    </tr>
                </table>

                <div class="mt-3">
                    <button class="btn btn-palet btn-sm" onclick="cekTabelA21()">
                        Cek Tabel
                    </button>

                    <button class="btn btn-palet btn-sm" onclick="resetLatihan2A21()">
                        Reset
                    </button>
                </div>

                <div class="mt-3">
                    <button class="btn btn-palet btn-sm" onclick="prevLatihan(1)">
                        Kembali ke Latihan 1
                    </button>
                </div>

                <div id="feedbackTabel" class="mt-2 fw-semibold"></div>

                <div id="grafikSection" style="display:none; margin-top:20px;">

                    <div class="petunjuk-mini-latihan">
                        <strong>Petunjuk menggambar grafik:</strong>
                        Perhatikan koordinat titik pada panel di samping bidang koordinat, lalu klik titik
                        sesuai urutan $A$, $B$, $C$, dan $D$.
                    </div>

                    <div class="grafik-wrapper">
                        <div id="canvas-holder"></div>
                    </div>

                    <div id="feedbackGrafik" class="mt-2 fw-semibold"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Script complete --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        const MATERI_ID = @json($materi->id);
        const MATERI_SLUG = @json($materi->slug);
        const IS_MATERI_COMPLETED = @json((bool) ($materialProgress->is_completed ?? false));
        const SAVED_LATIHAN = @json($latihanProgress ?? []);
        const LATIHAN_PROGRESS_URL = @json(route('latihan.progress.store', $materi->id));

        window.completeMateriUrl = "{{ route('materi.complete', $materi->id) }}";
        window.nextMateriUrl = @json($nextMateri ? route('materi.show', $nextMateri->slug) : null);
    </script>

    <script>
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
                ],
            });
        }

        function normJawaban(v) {
            return String(v || "")
                .trim()
                .toLowerCase()
                .replace(/\s+/g, "")
                .replace(/[−–—]/g, "-")
                .replace(",", ".");
        }

        function normPasangan(v) {
            return String(v || "")
                .trim()
                .toLowerCase()
                .replace(/\s+/g, "")
                .replace(/[()]/g, "")
                .replace(/[−–—]/g, "-");
        }

        function norm(v) {
            return String(v || "")
                .trim()
                .toLowerCase()
                .replace(/\s+/g, "")
                .replace(/[−–—]/g, "-")
                .replace(",", ".");
        }

        function cekIsian(id, jawabanBenar, tipe = "angka") {
            const el = document.getElementById(id);
            if (!el) return false;

            const normalizer = tipe === "pasangan" ? normPasangan : normJawaban;

            const nilai = normalizer(el.value);
            const daftar = Array.isArray(jawabanBenar) ? jawabanBenar : [jawabanBenar];

            const cocok = nilai !== "" && daftar.map(normalizer).includes(nilai);

            el.classList.remove("is-valid", "is-invalid");
            el.classList.add(cocok ? "is-valid" : "is-invalid");

            return cocok;
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

        // =========================
        // SAVE PROGRESS
        // =========================

        async function simpanProgressLatihan(latihanKey, tipe, jawaban, isCorrect) {
            const csrfToken = document
                .querySelector('meta[name="csrf-token"]')
                ?.getAttribute("content");

            if (!LATIHAN_PROGRESS_URL) {
                console.error("LATIHAN_PROGRESS_URL kosong.");
                return false;
            }

            if (!csrfToken) {
                console.error("CSRF token kosong.");
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

                const text = await response.text();

                console.log("STATUS SIMPAN:", response.status);
                console.log("RESPONSE SIMPAN:", text);

                try {
                    return JSON.parse(text);
                } catch (e) {
                    return text;
                }
            } catch (error) {
                console.error("Gagal menyimpan latihan:", error);
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
        // LATIHAN 1 A2.1
        // =========================
        async function cekLatihan1A21() {
            const hasil = [
                cekIsian("lat1_y1", "-5"),
                cekIsian("lat1_y2", "-3"),
                cekIsian("lat1_y3", "-1"),
                cekIsian("lat1_y4", "1"),

                cekIsian("lat1_pair1", ["-2,-5", "(-2,-5)"]),
                cekIsian("lat1_pair2", ["0,-3", "(0,-3)"]),
                cekIsian("lat1_pair3", ["2,-1", "(2,-1)"]),
                cekIsian("lat1_pair4", ["4,1", "(4,1)"]),
            ];

            const nextBtn = document.getElementById("nextBtnLat1");
            const feedback = document.getElementById("feedbackLatihan1");
            if (!feedback) return;

            if (hasil.every(Boolean)) {}

            if (hasil.every(Boolean)) {
                feedback.innerHTML = `<span style="color:#15803d;">Bagus! Semua jawaban benar.</span>`;

                if (nextBtn) nextBtn.disabled = false;

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L1`,
                    "input", {
                        lat1_y1: document.getElementById("lat1_y1")?.value.trim() ?? "",
                        lat1_y2: document.getElementById("lat1_y2")?.value.trim() ?? "",
                        lat1_y3: document.getElementById("lat1_y3")?.value.trim() ?? "",
                        lat1_y4: document.getElementById("lat1_y4")?.value.trim() ?? "",

                        lat1_pair1: document.getElementById("lat1_pair1")?.value.trim() ?? "",
                        lat1_pair2: document.getElementById("lat1_pair2")?.value.trim() ?? "",
                        lat1_pair3: document.getElementById("lat1_pair3")?.value.trim() ?? "",
                        lat1_pair4: document.getElementById("lat1_pair4")?.value.trim() ?? "",
                    },
                    true
                );
            } else {
                feedback.innerHTML = `<span style="color:#b91c1c;">Masih ada yang salah.</span>`;

                if (nextBtn) nextBtn.disabled = true;

                resetStepSetelah(2);
            }
        }

        function resetLatihan1A21() {
            [
                "lat1_y1",
                "lat1_y2",
                "lat1_y3",
                "lat1_y4",
                "lat1_pair1",
                "lat1_pair2",
                "lat1_pair3",
                "lat1_pair4",
            ].forEach((id) => {
                const el = document.getElementById(id);
                if (el) {
                    el.value = "";
                    el.classList.remove(
                        "jawaban-benar",
                        "jawaban-salah",
                        "is-valid",
                        "is-invalid",
                    );
                }
            });

            const feedback = document.getElementById("feedbackLatihan1");
            const nextBtn = document.getElementById("nextBtnLat1");

            if (feedback) feedback.innerHTML = "";
            if (nextBtn) nextBtn.disabled = true;

            resetStepSetelah(2);
        }

        // =========================
        // LATIHAN 2 A2.1
        // =========================
        async function cekTabelA21() {
            const inputIds = ["y1", "y2", "y3", "y4"];

            const kosong = inputIds.some((id) => {
                const el = document.getElementById(id);
                return !el || norm(el.value) === "";
            });

            const feedbackTabel = document.getElementById("feedbackTabel");
            const grafikSection = document.getElementById("grafikSection");

            if (kosong) {
                inputIds.forEach((id) => {
                    const el = document.getElementById(id);
                    if (el && norm(el.value) === "") {
                        el.classList.remove("is-valid", "is-invalid");
                        el.classList.add("is-invalid");
                    }
                });

                if (feedbackTabel) {
                    feedbackTabel.innerHTML = `<span style="color:#b45309;">Isi semua nilai y dulu ya.</span>`;
                }

                if (grafikSection) grafikSection.style.display = "none";
                return;
            }

            const benar1 = cekIsian("y1", "-3");
            const benar2 = cekIsian("y2", "1");
            const benar3 = cekIsian("y3", "5");
            const benar4 = cekIsian("y4", "9");

            const y1 = document.getElementById("y1")?.value.trim() ?? "";
            const y2 = document.getElementById("y2")?.value.trim() ?? "";
            const y3 = document.getElementById("y3")?.value.trim() ?? "";
            const y4 = document.getElementById("y4")?.value.trim() ?? "";

            const pair1 = document.getElementById("pair1");
            const pair2 = document.getElementById("pair2");
            const pair3 = document.getElementById("pair3");
            const pair4 = document.getElementById("pair4");

            if (pair1) pair1.innerHTML = `$A(-4, ${y1})$`;
            if (pair2) pair2.innerHTML = `$B(-2, ${y2})$`;
            if (pair3) pair3.innerHTML = `$C(0, ${y3})$`;
            if (pair4) pair4.innerHTML = `$D(2, ${y4})$`;

            renderMathSafe(document.getElementById("latihanStep2"));

            const ok = benar1 && benar2 && benar3 && benar4;

            if (ok) {

                window.tablePairs = [{
                        label: "A",
                        x: -4,
                        y: Number(norm(y1))
                    },
                    {
                        label: "B",
                        x: -2,
                        y: Number(norm(y2))
                    },
                    {
                        label: "C",
                        x: 0,
                        y: Number(norm(y3))
                    },
                    {
                        label: "D",
                        x: 2,
                        y: Number(norm(y4))
                    },
                ];

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L2_TABEL`,
                    "input", {
                        y1: y1,
                        y2: y2,
                        y3: y3,
                        y4: y4,
                        pairs: window.tablePairs,
                    },
                    true
                );

                if (window.loadTargetsFromTable) {
                    window.loadTargetsFromTable(window.tablePairs);
                }

                if (feedbackTabel) {
                    feedbackTabel.innerHTML =
                        `<span style="color:#15803d;">Tabel benar! Sekarang klik titik A–D pada grafik.</span>`;
                }

                if (grafikSection) {
                    grafikSection.style.display = "block";
                    scrollKeStep("grafikSection");
                }

                if (window.resetPointsToStart) {
                    window.resetPointsToStart();
                }
            } else {
                if (feedbackTabel) {
                    feedbackTabel.innerHTML =
                        `<span style="color:#b91c1c;">Masih ada yang salah. Coba cek lagi pakai y = 2x + 5.</span>`;
                }

                if (grafikSection) grafikSection.style.display = "none";
            }
        }

        function resetLatihan2A21() {
            ["y1", "y2", "y3", "y4"].forEach((id) => {
                const el = document.getElementById(id);
                if (el) {
                    el.value = "";
                    el.classList.remove("is-valid", "is-invalid");
                }
            });

            const pair1 = document.getElementById("pair1");
            const pair2 = document.getElementById("pair2");
            const pair3 = document.getElementById("pair3");
            const pair4 = document.getElementById("pair4");

            if (pair1) pair1.innerHTML = "$A(-4, \\dots)$";
            if (pair2) pair2.innerHTML = "$B(-2, \\dots)$";
            if (pair3) pair3.innerHTML = "$C(0, \\dots)$";
            if (pair4) pair4.innerHTML = "$D(2, \\dots)$";

            const feedbackTabel = document.getElementById("feedbackTabel");
            const grafikSection = document.getElementById("grafikSection");

            if (feedbackTabel) feedbackTabel.innerHTML = "";
            if (grafikSection) grafikSection.style.display = "none";

            renderMathSafe(document.getElementById("latihanStep2"));

            if (window.resetPointsToStart) {
                window.resetPointsToStart();
            }
        }

        async function checkAnswersA21() {
            let benar = false;

            if (typeof window.checkAnswers === "function") {
                benar = await window.checkAnswers();
            }

            if (!benar) return;

            await simpanProgressLatihan(
                `${MATERI_SLUG}_L2`,
                "grafik", {
                    y1: document.getElementById("y1")?.value.trim() ?? "",
                    y2: document.getElementById("y2")?.value.trim() ?? "",
                    y3: document.getElementById("y3")?.value.trim() ?? "",
                    y4: document.getElementById("y4")?.value.trim() ?? "",
                    pairs: window.tablePairs ?? [],
                    titikSiswa: typeof window.getTitikSiswaA21 === "function" ?
                        window.getTitikSiswaA21() : [],
                    plottingBenar: true,
                },
                true
            );

            const saved = await saveProgressMateri();

            if (saved) {
                bukaNextButton();
            }
        }

        function resetGrafikA21() {
            const feedbackGrafik = document.getElementById("feedbackGrafik");

            if (feedbackGrafik) feedbackGrafik.innerHTML = "";

            if (window.resetPointsToStart) {
                window.resetPointsToStart();
            }
        }

        // =========================
        // P5 LATIHAN 2
        // =========================

        const sketchLatihanA21 = (p) => {
            const canvasW = 720;
            const canvasH = 430;

            const gridSize = 340;
            const leftMargin = 44;
            const topMargin = 40;

            let originX;
            let originY;
            let scaleUnit;

            let titikSiswa = [];
            let plottingBenar = false;
            let feedbackPlot = "Klik titik A, B, C, dan D pada bidang koordinat.";

            p.setup = function() {
                const canvas = p.createCanvas(canvasW, canvasH);
                canvas.parent("canvas-holder");

                scaleUnit = gridSize / 20;
                originX = leftMargin + gridSize / 2;
                originY = topMargin + gridSize / 2;
            };

            p.draw = function() {
                p.background(255);

                drawGrid();
                drawPanelKanan();
                drawPoints();

                if (plottingBenar) {
                    drawLine();
                }
            };

            // =========================
            // CLICK INPUT
            // =========================
            let lastClickTime = 0;

            function handleInput() {
                if (p.millis() - lastClickTime < 300) return;

                lastClickTime = p.millis();

                if (!window.tablePairs || !window.tablePairs.length) {
                    feedbackPlot = "Isi dan cek tabel terlebih dahulu.";
                    return;
                }

                if (plottingBenar) return;
                if (titikSiswa.length >= 4) return;

                const pt = pixelToCoord(p.mouseX, p.mouseY);
                if (!pt) return;

                const target = window.tablePairs[titikSiswa.length];
                const nama = target.label;

                titikSiswa.push({
                    nama,
                    x: pt.x,
                    y: pt.y,
                });

                if (titikSiswa.length < 4) {
                    const targetBerikutnya = window.tablePairs[titikSiswa.length];

                    feedbackPlot =
                        `Titik ${nama} dipilih di (${pt.x}, ${pt.y}). Selanjutnya klik titik ${targetBerikutnya.label}(${targetBerikutnya.x}, ${targetBerikutnya.y}).`;

                    return;
                }

                cekJawaban();
            }

            p.mousePressed = function() {
                handleInput();
            };

            function cekJawaban() {
                plottingBenar = true;

                for (let i = 0; i < 4; i++) {
                    const siswa = titikSiswa[i];
                    const target = window.tablePairs[i];

                    if (siswa.x !== target.x || siswa.y !== target.y) {
                        plottingBenar = false;
                        break;
                    }
                }

                if (plottingBenar) {
                    feedbackPlot =
                        "Bagus! Semua titik sudah tepat dan membentuk garis lurus. Silakan lanjut ke materi selanjutnya.";
                    checkAnswersA21();
                } else {
                    feedbackPlot =
                        "Masih ada titik yang belum tepat. Perhatikan kembali koordinat A, B, C, dan D pada panel petunjuk.";

                    setTimeout(() => {
                        resetPlot();
                    }, 1800);
                }
            }

            function resetPlot() {
                titikSiswa = [];
                plottingBenar = false;
                feedbackPlot = "Klik titik A, B, C, dan D pada bidang koordinat.";
            }

            window.resetPointsToStart = function() {
                resetPlot();
            };

            window.checkAnswers = async function() {
                return plottingBenar;
            };

            // Simpan Titik dan Restore
            window.getTitikSiswaA21 = function() {
                return titikSiswa;
            };

            window.restorePlotA21 = function(points) {
                if (!Array.isArray(points) || points.length === 0) return;

                titikSiswa = points;
                plottingBenar = true;
                feedbackPlot =
                    "Jawaban grafik sudah tersimpan. Titik A, B, C, dan D sudah tepat dan membentuk garis lurus.";
            };

            // =========================
            // GRID
            // =========================
            function drawGrid() {
                p.stroke(230);
                p.strokeWeight(1);

                for (let x = -10; x <= 10; x++) {
                    const px = originX + x * scaleUnit;
                    p.line(px, topMargin, px, topMargin + gridSize);
                }

                for (let y = -10; y <= 10; y++) {
                    const py = originY - y * scaleUnit;
                    p.line(leftMargin, py, leftMargin + gridSize, py);
                }

                p.stroke(0);
                p.strokeWeight(2);

                p.line(leftMargin, originY, leftMargin + gridSize, originY);
                p.line(originX, topMargin, originX, topMargin + gridSize);

                p.noStroke();
                p.fill(0);
                p.textAlign(p.CENTER, p.CENTER);
                p.textSize(11);

                for (let i = -10; i <= 10; i++) {
                    const px = originX + i * scaleUnit;

                    if (i !== 0) {
                        p.text(i, px, originY + 14);
                    }
                }

                for (let j = -10; j <= 10; j++) {
                    const py = originY - j * scaleUnit;

                    if (j !== 0) {
                        p.text(j, originX - 14, py);
                    }
                }

                p.text("0", originX - 10, originY + 14);

                p.textSize(15);
                p.text("X", leftMargin + gridSize + 14, originY);
                p.text("Y", originX, topMargin - 15);
            }

            // =========================
            // PANEL KANAN
            // =========================
            function drawPanelKanan() {
                const panelX = 430;
                const panelY = 38;
                const panelW = 260;

                p.noStroke();
                p.fill(0);
                p.textAlign(p.LEFT, p.TOP);

                p.textSize(17);
                p.text("Petunjuk", panelX, panelY);

                p.textSize(13);

                let daftarKoordinat = "Koordinat titik:\n";

                if (window.tablePairs && window.tablePairs.length) {
                    window.tablePairs.forEach((t) => {
                        daftarKoordinat += `${t.label}(${t.x}, ${t.y})\n`;
                    });
                } else {
                    daftarKoordinat += "Isi tabel dan klik Cek Tabel dulu.\n";
                }

                p.text(daftarKoordinat, panelX, panelY + 32, panelW, 95);

                let targetText = "";

                if (window.tablePairs && window.tablePairs.length && titikSiswa.length < 4 && !plottingBenar) {
                    const target = window.tablePairs[titikSiswa.length];

                    targetText =
                        `Titik yang harus diklik:\n` +
                        `${target.label}(${target.x}, ${target.y})\n\n` +
                        `Klik titik pada bidang koordinat\n` +
                        `Kartesius sesuai koordinat\n` +
                        `yang ditampilkan.\n\n` +
                        `Setelah titik A, B, C, dan D\n` +
                        `tepat, titik-titik tersebut\n` +
                        `akan dihubungkan membentuk\n` +
                        `garis lurus.`;
                } else if (plottingBenar) {
                    targetText =
                        `Semua titik sudah tepat.\n\n` +
                        `Titik A, B, C, dan D\n` +
                        `dihubungkan sehingga\n` +
                        `membentuk garis lurus.`;
                } else {
                    targetText =
                        `Isi tabel dan klik Cek Tabel\n` +
                        `terlebih dahulu.`;
                }
                p.text(targetText, panelX, panelY + 120, panelW, 185);

                p.fill(plottingBenar ? "#15803d" : "#111827");
                p.text(feedbackPlot, panelX, panelY + 325, panelW, 80);
            }

            // =========================
            // TITIK DAN GARIS
            // =========================
            function drawPoints() {
                titikSiswa.forEach((titik) => {
                    const px = toPixelX(titik.x);
                    const py = toPixelY(titik.y);

                    p.fill(220, 0, 0);
                    p.noStroke();
                    p.circle(px, py, 10);

                    p.fill(0);
                    p.textAlign(p.LEFT, p.BOTTOM);
                    p.textSize(13);
                    p.text(`${titik.nama}(${titik.x}, ${titik.y})`, px + 8, py - 4);
                });
            }

            function drawLine() {
                if (!plottingBenar) return;

                const A = titikSiswa[0];
                const D = titikSiswa[3];

                p.stroke(30, 150, 70);
                p.strokeWeight(3);
                p.line(toPixelX(A.x), toPixelY(A.y), toPixelX(D.x), toPixelY(D.y));
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

                x = p.constrain(x, -10, 10);
                y = p.constrain(y, -10, 10);

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

        // RESTORE JAWABAN
        function setValueSafe(id, value) {
            const el = document.getElementById(id);
            if (el && value !== undefined && value !== null) {
                el.value = value;
            }
        }

        function restoreLatihan1A21() {
            const saved = SAVED_LATIHAN[`${MATERI_SLUG}_L1`]?.jawaban;

            if (!saved) return;

            setValueSafe("lat1_y1", saved.lat1_y1);
            setValueSafe("lat1_y2", saved.lat1_y2);
            setValueSafe("lat1_y3", saved.lat1_y3);
            setValueSafe("lat1_y4", saved.lat1_y4);

            setValueSafe("lat1_pair1", saved.lat1_pair1);
            setValueSafe("lat1_pair2", saved.lat1_pair2);
            setValueSafe("lat1_pair3", saved.lat1_pair3);
            setValueSafe("lat1_pair4", saved.lat1_pair4);

            [
                "lat1_y1",
                "lat1_y2",
                "lat1_y3",
                "lat1_y4",
                "lat1_pair1",
                "lat1_pair2",
                "lat1_pair3",
                "lat1_pair4",
            ].forEach((id) => {
                const el = document.getElementById(id);
                if (el) {
                    el.classList.remove("is-invalid");
                    el.classList.add("is-valid");
                }
            });

            const nextBtn = document.getElementById("nextBtnLat1");
            const feedback = document.getElementById("feedbackLatihan1");
            const latihan2 = document.getElementById("latihanStep2");

            if (nextBtn) nextBtn.disabled = false;
            if (latihan2) latihan2.style.display = "block";

            if (feedback) {
                feedback.innerHTML =
                    `<span style="color:#15803d;">Jawaban Latihan 1 sudah tersimpan.</span>`;
            }
        }

        function updatePairsLatihan2A21(y1, y2, y3, y4) {
            const pair1 = document.getElementById("pair1");
            const pair2 = document.getElementById("pair2");
            const pair3 = document.getElementById("pair3");
            const pair4 = document.getElementById("pair4");

            if (pair1) pair1.innerHTML = `$A(-4, ${y1})$`;
            if (pair2) pair2.innerHTML = `$B(-2, ${y2})$`;
            if (pair3) pair3.innerHTML = `$C(0, ${y3})$`;
            if (pair4) pair4.innerHTML = `$D(2, ${y4})$`;

            renderMathSafe(document.getElementById("latihanStep2"));
        }

        function restoreGrafikJikaSiap(points) {
            if (typeof window.restorePlotA21 === "function") {
                window.restorePlotA21(points);
                return;
            }

            setTimeout(() => {
                restoreGrafikJikaSiap(points);
            }, 300);
        }

        function restoreLatihan2A21() {
            const savedFinal = SAVED_LATIHAN[`${MATERI_SLUG}_L2`]?.jawaban;
            const savedTabel = SAVED_LATIHAN[`${MATERI_SLUG}_L2_TABEL`]?.jawaban;

            const saved = savedFinal || savedTabel;

            if (!saved) return;

            const y1 = saved.y1 ?? "";
            const y2 = saved.y2 ?? "";
            const y3 = saved.y3 ?? "";
            const y4 = saved.y4 ?? "";

            setValueSafe("y1", y1);
            setValueSafe("y2", y2);
            setValueSafe("y3", y3);
            setValueSafe("y4", y4);

            ["y1", "y2", "y3", "y4"].forEach((id) => {
                const el = document.getElementById(id);
                if (el) {
                    el.classList.remove("is-invalid");
                    el.classList.add("is-valid");
                }
            });

            updatePairsLatihan2A21(y1, y2, y3, y4);

            window.tablePairs = saved.pairs ?? [{
                    label: "A",
                    x: -4,
                    y: Number(norm(y1))
                },
                {
                    label: "B",
                    x: -2,
                    y: Number(norm(y2))
                },
                {
                    label: "C",
                    x: 0,
                    y: Number(norm(y3))
                },
                {
                    label: "D",
                    x: 2,
                    y: Number(norm(y4))
                },
            ];

            const latihan2 = document.getElementById("latihanStep2");
            const grafikSection = document.getElementById("grafikSection");
            const feedbackTabel = document.getElementById("feedbackTabel");

            if (latihan2) latihan2.style.display = "block";
            if (grafikSection) grafikSection.style.display = "block";

            if (feedbackTabel) {
                feedbackTabel.innerHTML =
                    `<span style="color:#15803d;">Tabel Latihan 2 sudah tersimpan.</span>`;
            }

            if (savedFinal && savedFinal.plottingBenar) {
                restoreGrafikJikaSiap(savedFinal.titikSiswa ?? []);

                if (feedbackTabel) {
                    feedbackTabel.innerHTML =
                        `<span style="color:#15803d;">Latihan 2 sudah selesai dan tersimpan.</span>`;
                }

                bukaNextButton();
            }
        }

        function restoreProgressA21() {
            if (IS_MATERI_COMPLETED) {
                const latihan2 = document.getElementById("latihanStep2");
                const grafikSection = document.getElementById("grafikSection");
                const nextBtnLat1 = document.getElementById("nextBtnLat1");

                if (latihan2) latihan2.style.display = "block";
                if (grafikSection) grafikSection.style.display = "block";
                if (nextBtnLat1) nextBtnLat1.disabled = false;

                bukaNextButton();
            }

            restoreLatihan1A21();
            restoreLatihan2A21();
        }

        document.addEventListener("DOMContentLoaded", function() {
            restoreProgressA21();
        });

        new p5(sketchLatihanA21, "canvas-holder");
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
