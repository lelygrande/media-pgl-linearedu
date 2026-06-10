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
            max-width: 870px;
            margin: 0 auto;
            overflow-x: auto;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 12px;
            background: #fff;
        }

        #canvas-holder {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #canvas-holder canvas {
            max-width: 100% !important;
            height: auto !important;
            display: block;
        }

        .grafik-actions {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 16px;
            flex-wrap: wrap;
        }

        /* =========================================
                                                                   RESPONSIVE MOBILE
                                                                ========================================= */
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

        <p class="mb-2" style="line-height:1.7;">
            Jika titik-titik tersebut dihubungkan, akan terbentuk grafik garis lurus seperti berikut.
        </p>

        <div class="box-info mb-3" style="background:#fff;">
            <p class="mb-2" style="font-weight:600;">
                Tampilkan titik satu per satu, lalu hubungkan titik-titik tersebut menjadi garis.
            </p>

            <div id="canvas-contoh-21" class="mb-2"></div>

            <div class="d-flex gap-2 flex-wrap">
                <button class="btn-palet btn-sm" onclick="tampilTitik21('A')">Tampilkan Titik A</button>
                <button class="btn-palet btn-sm" onclick="tampilTitik21('B')">Tampilkan Titik B</button>
                <button class="btn-palet btn-sm" onclick="tampilTitik21('C')">Tampilkan Titik C</button>
                <button class="btn-palet btn-sm" onclick="tampilTitik21('D')">Tampilkan Titik D</button>
                <button class="btn-palet btn-sm" onclick="tampilGaris21()">Tampilkan Garis</button>
                <button class="btn-palet btn-sm" onclick="resetContoh21()">Reset</button>
            </div>

            <div id="infoContoh21" class="mt-2"></div>
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
                    <b>1.</b> Diketahui persamaan garis lurus:<br>
                    <b>$y = x - 3$</b><br><br>

                    Isi tabel nilai $y$ lalu tuliskan pasangan $(x,y)$.
                </p>

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

                <div class="box-kesimpulan mt-3" id="kesimpulanLat1" style="display:none;">

                    <p class="mb-1" style="font-weight:700;">
                        Kesimpulan:
                    </p>

                    <p class="mb-0">
                        Untuk menentukan pasangan berurutan $(x,y)$
                        pada persamaan garis lurus:
                        <br>1. Pilih nilai $x$ terlebih dahulu.
                        <br>2. Substitusikan nilai $x$
                        ke dalam persamaan untuk mendapatkan $y$.
                        <br>3. Tuliskan pasangan berurutan
                        dalam bentuk $(x,y)$.
                    </p>
                </div>
            </div>

            <!-- ===================== -->
            <!-- LATIHAN 2 -->
            <!-- ===================== -->
            <div class="latihan-step" id="latihanStep2" style="display:none;">

                <hr class="my-4">

                <p class="mb-2" style="max-width: 720px;">
                    <b>2.</b> Diketahui persamaan garis lurus:<br>
                    <b>$y = 2x + 5$</b><br><br>

                    Isi tabel, lalu tampilkan grafik.
                </p>

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

                    <div class="grafik-wrapper">
                        <div id="canvas-holder"></div>
                    </div>

                    <div id="feedbackGrafik" class="mt-2 fw-semibold">
                    </div>
                </div>

                <div class="box-kesimpulan mt-3" id="kesimpulanLat2" style="display:none;">

                    <p class="mb-1" style="font-weight:700;">
                        Kesimpulan:
                    </p>

                    <p class="mb-0">
                        Untuk menggambar grafik persamaan garis lurus:
                        <br>1. Tentukan beberapa nilai $x$.
                        <br>2. Hitung nilai $y$ yang sesuai.
                        <br>3. Tuliskan pasangan berurutan $(x,y)$.
                        <br>4. Plot titik-titik tersebut pada bidang koordinat.
                        <br>5. Hubungkan titik-titiknya sehingga membentuk garis lurus.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Script complete --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
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
        function cekLatihan1A21() {
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
            const boxKesimpulan = document.getElementById("kesimpulanLat1");

            if (!feedback) return;

            if (hasil.every(Boolean)) {
                feedback.innerHTML = `<span style="color:#15803d;">Bagus! Semua jawaban benar.</span>`;

                if (boxKesimpulan) boxKesimpulan.style.display = "block";
                if (nextBtn) nextBtn.disabled = false;
            } else {
                feedback.innerHTML = `<span style="color:#b91c1c;">Masih ada yang salah.</span>`;

                if (boxKesimpulan) boxKesimpulan.style.display = "none";
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
            const boxKesimpulan = document.getElementById("kesimpulanLat1");
            const nextBtn = document.getElementById("nextBtnLat1");

            if (feedback) feedback.innerHTML = "";
            if (boxKesimpulan) boxKesimpulan.style.display = "none";
            if (nextBtn) nextBtn.disabled = true;

            resetStepSetelah(2);
        }

        // =========================
        // LATIHAN 2 A2.1
        // =========================
        function cekTabelA21() {
            const inputIds = ["y1", "y2", "y3", "y4"];

            const kosong = inputIds.some((id) => {
                const el = document.getElementById(id);
                return !el || norm(el.value) === "";
            });

            const feedbackTabel = document.getElementById("feedbackTabel");
            const grafikSection = document.getElementById("grafikSection");
            const boxKesimpulan = document.getElementById("kesimpulanLat2");

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
                if (boxKesimpulan) boxKesimpulan.style.display = "none";
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

                if (boxKesimpulan) {
                    boxKesimpulan.style.display = "none";
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
                if (boxKesimpulan) boxKesimpulan.style.display = "none";
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
            const boxKesimpulan = document.getElementById("kesimpulanLat2");

            if (feedbackTabel) feedbackTabel.innerHTML = "";
            if (grafikSection) grafikSection.style.display = "none";
            if (boxKesimpulan) boxKesimpulan.style.display = "none";

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

            const saved = await saveProgressMateri();
            if (saved) {
                bukaNextButton();
            }
        }

        function resetGrafikA21() {
            const feedbackGrafik = document.getElementById("feedbackGrafik");
            const boxKesimpulan = document.getElementById("kesimpulanLat2");

            if (feedbackGrafik) feedbackGrafik.innerHTML = "";
            if (boxKesimpulan) boxKesimpulan.style.display = "none";

            if (window.resetPointsToStart) {
                window.resetPointsToStart();
            }
        }

        // =========================
        // P5 LATIHAN 2
        // =========================

        const sketchLatihanA21 = (p) => {
            const gridSize = 500;
            const leftMargin = 40;
            const topMargin = 40;

            let originX, originY, scaleUnit;

            let titikSiswa = [];

            let plottingSelesai = false;
            let plottingBenar = false;

            let feedbackPlot = "Klik titik A, B, C, dan D pada bidang koordinat.";

            p.setup = function() {
                p.createCanvas(760, 600);

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

                // cegah double trigger mobile
                if (p.millis() - lastClickTime < 300) {
                    return;
                }

                lastClickTime = p.millis();

                if (!window.tablePairs) return;

                if (plottingBenar) return;

                if (titikSiswa.length >= 4) return;

                const pt = pixelToCoord(
                    p.mouseX,
                    p.mouseY
                );

                if (!pt) return;

                const nama =
                    window.tablePairs[
                        titikSiswa.length
                    ].label;

                titikSiswa.push({
                    nama,
                    x: pt.x,
                    y: pt.y,
                });

                if (titikSiswa.length < 4) {

                    feedbackPlot =
                        `Titik ${nama} dipilih di (${pt.x}, ${pt.y}).`;

                    return;
                }

                cekJawaban();
            }

            p.mousePressed = function() {
                handleInput();
            };

            function cekJawaban() {
                plottingSelesai = true;

                plottingBenar = true;

                for (let i = 0; i < 4; i++) {
                    const siswa = titikSiswa[i];

                    const target = window.tablePairs[i];

                    if (siswa.x !== target.x || siswa.y !== target.y) {
                        plottingBenar = false;
                        break;
                    }
                }

                const feedbackGrafik = document.getElementById("feedbackGrafik");

                if (plottingBenar) {
                    feedbackPlot = "Bagus! Semua titik sudah benar.";

                    const boxKesimpulan = document.getElementById("kesimpulanLat2");

                    if (boxKesimpulan) {
                        boxKesimpulan.style.display = "block";
                    }
                    // SAVE PROGRESS
                    checkAnswersA21();
                } else {
                    feedbackPlot = "Masih ada titik yang salah.";

                    setTimeout(() => {
                        resetPlot();
                    }, 1200);
                }
            }

            function resetPlot() {
                titikSiswa = [];

                plottingSelesai = false;

                plottingBenar = false;

                feedbackPlot = "Klik titik A, B, C, dan D pada bidang koordinat.";
            }

            window.resetPointsToStart = function() {
                resetPlot();
            };

            window.checkAnswers = async function() {
                return plottingBenar;
            };

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

                p.textSize(12);

                for (let i = -10; i <= 10; i++) {
                    const px = originX + i * scaleUnit;

                    if (i !== 0) {
                        p.text(i, px, originY + 16);
                    }
                }

                for (let j = -10; j <= 10; j++) {
                    const py = originY - j * scaleUnit;

                    if (j !== 0) {
                        p.text(j, originX - 16, py);
                    }
                }

                p.text("0", originX - 10, originY + 16);

                p.textSize(16);

                p.text("X", leftMargin + gridSize + 15, originY);

                p.text("Y", originX, topMargin - 15);
            }

            function drawPanelKanan() {
                const panelX = 565;
                const panelW = 170;

                p.noStroke();

                p.fill(0);

                p.textAlign(p.LEFT, p.TOP);

                p.textSize(16);

                p.text("Petunjuk", panelX, 40);

                p.textSize(14);

                const petunjuk =
                    "1. Klik titik A.\n" +
                    "2. Klik titik B.\n" +
                    "3. Klik titik C.\n" +
                    "4. Klik titik D.\n" +
                    "5. Sistem akan memeriksa\n" +
                    "   apakah titik sudah benar.";

                p.text(petunjuk, panelX, 70, panelW, 150);

                p.text(feedbackPlot, panelX, 250, panelW, 120);
            }

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

                    p.text(titik.nama, px + 8, py - 4);
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
