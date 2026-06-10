@extends('layout.halaman-materi')

@section('content')
    <style>
        .box-pengantar {
            background: var(--hero-bg);
            border-radius: 12px;
            padding: 14px 16px;
            border: 1px solid rgba(0, 0, 0, .05);
            line-height: 1.7;
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

        /* ===== Responsive Apersepsi ===== */
        .apersepsi-container {
            max-width: 100%;
        }

        .apersepsi-card {
            border-radius: 14px;
        }

        .apersepsi-section {
            border: 2px solid #4a76b8;
            border-radius: 10px;
            background-color: white;
            padding: 24px;
        }

        .section-label {
            top: -18px;
            left: 20px;
            background-color: #4a76b8;
            border-radius: 8px;
            max-width: calc(100% - 40px);
            white-space: normal;
            line-height: 1.3;
        }

        /* ===== Gambar Apersepsi ===== */
        .materi-img {
            width: auto;
            max-width: 100%;
            height: auto;
            display: block;
            margin-left: auto;
            margin-right: auto;
            border-radius: 10px;
            cursor: zoom-in;
        }

        .gambar-wrapper {
            width: 100%;
            max-width: 680px;
            max-height: 340px;
            overflow: hidden;
            margin-left: auto;
            margin-right: auto;
            border-radius: 12px;
        }

        .gambar-wrapper img {
            width: 100%;
            max-height: 340px;
            object-fit: contain;
        }

        .img-koordinat {
            max-width: 680px;
        }

        .img-titik-asal {
            max-width: 260px;
            width: 100%;
        }

        /* ===== GeoGebra dan Canvas ===== */
        .ggb-responsive,
        .canvas-responsive {
            width: 100%;
            overflow-x: auto;
            overflow-y: hidden;
            -webkit-overflow-scrolling: touch;
            border: 1px solid rgba(0, 0, 0, .08);
            border-radius: 12px;
            background: #fff;
            padding: 8px;
        }

        #ggb-element,
        #canvas-container,
        #canvas-latihan-buat {
            width: 100%;
            min-height: 320px;
        }

        #canvas-container canvas,
        #canvas-latihan-buat canvas {
            max-width: 100% !important;
            height: auto !important;
            display: block;
            margin: 0 auto;
        }

        /* ===== Input Koordinat ===== */
        .input-koordinat {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .input-koordinat label {
            font-weight: 600;
        }

        .input-koordinat .form-control {
            max-width: 120px;
            margin-top: 4px;
        }

        .radio-option {
            display: block;
            margin-bottom: 6px;
            line-height: 1.5;
        }

        .aksi-latihan {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        /* ===== Tabel Posisi Titik ===== */
        .table-responsive {
            width: fit-content;
            max-width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            border-radius: 8px;
        }

        .tabel-posisi {
            width: auto !important;
            min-width: 0 !important;
            max-width: none !important;
            margin-bottom: 0;
            table-layout: fixed;
        }

        .tabel-posisi th,
        .tabel-posisi td {
            vertical-align: middle;
            padding: 12px 14px;
        }

        .tabel-posisi th:nth-child(1),
        .tabel-posisi td:nth-child(1),
        .tabel-posisi th:nth-child(2),
        .tabel-posisi td:nth-child(2) {
            width: 85px;
            min-width: 85px;
        }

        .tabel-posisi th:nth-child(3),
        .tabel-posisi td:nth-child(3) {
            width: 220px;
            min-width: 220px;
        }

        .input-posisi {
            width: 140px !important;
            max-width: 140px;
            margin: 0 auto;
        }

        .medium-zoom-overlay {
            z-index: 9998 !important;
        }

        .medium-zoom-image--opened {
            z-index: 9999 !important;
        }

        @media (max-width: 768px) {
            .container.apersepsi-container {
                padding-left: 12px;
                padding-right: 12px;
                margin-top: 16px !important;
            }

            .card-body {
                padding: 16px;
            }

            h1 {
                font-size: 1.55rem;
                line-height: 1.35;
            }

            h5 {
                font-size: 1rem;
                line-height: 1.4;
            }

            p,
            li,
            table,
            input,
            button {
                font-size: 0.95rem;
            }

            .apersepsi-section {
                padding: 22px 14px 16px;
            }

            .section-label {
                left: 14px;
                padding: 6px 10px !important;
                font-size: 0.9rem;
            }

            .box-pengantar {
                padding: 12px;
            }

            .gambar-wrapper {
                max-width: 100%;
                max-height: 300px;
            }

            .gambar-wrapper img {
                max-height: 300px;
            }

            .img-titik-asal {
                max-width: 220px;
            }

            .ggb-responsive,
            .canvas-responsive {
                padding: 6px;
            }

            #ggb-element,
            #canvas-container,
            #canvas-latihan-buat {
                min-height: 280px;
            }

            .input-koordinat {
                align-items: stretch;
                gap: 8px;
            }

            .input-koordinat label {
                width: 100%;
            }

            .input-koordinat .form-control {
                width: 100% !important;
                max-width: 100%;
            }

            .btn-palet,
            .aksi-latihan .btn {
                width: 100%;
                white-space: normal;
            }

            .table-responsive {
                width: 100%;
            }

            .tabel-posisi {
                min-width: 390px !important;
            }

            .tabel-posisi th:nth-child(1),
            .tabel-posisi td:nth-child(1),
            .tabel-posisi th:nth-child(2),
            .tabel-posisi td:nth-child(2) {
                width: 70px;
                min-width: 70px;
            }

            .tabel-posisi th:nth-child(3),
            .tabel-posisi td:nth-child(3) {
                width: 180px;
                min-width: 180px;
            }

            .input-posisi {
                width: 120px !important;
                max-width: 120px;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.35rem;
            }

            .card-body {
                padding: 14px;
            }

            .apersepsi-section {
                padding-left: 12px;
                padding-right: 12px;
            }

            .gambar-wrapper {
                max-height: 240px;
            }

            .gambar-wrapper img {
                max-height: 240px;
            }

            .img-titik-asal {
                max-width: 200px;
            }

            #ggb-element,
            #canvas-container,
            #canvas-latihan-buat {
                min-height: 240px;
            }

            .tabel-posisi {
                min-width: 360px !important;
            }

            .tabel-posisi th:nth-child(1),
            .tabel-posisi td:nth-child(1),
            .tabel-posisi th:nth-child(2),
            .tabel-posisi td:nth-child(2) {
                width: 60px;
                min-width: 60px;
            }

            .tabel-posisi th:nth-child(3),
            .tabel-posisi td:nth-child(3) {
                width: 170px;
                min-width: 170px;
            }

            .input-posisi {
                width: 110px !important;
                max-width: 110px;
            }
        }
    </style>

    <div class="container mt-4 apersepsi-container">

        <div class="card shadow-sm mb-4 apersepsi-card">
            <div class="card-body">

                <h1 class="mb-3" style="font-weight: 600;">Apersepsi</h1>

                <p style="text-align: justify;">
                    Dalam kehidupan sehari-hari, suatu lokasi dapat ditentukan dengan menggunakan dua informasi arah.
                    Misalnya pada peta kawasan lahan basah, posisi suatu objek seperti tanaman atau rumah
                    dapat ditentukan berdasarkan arah mendatar dan arah tegak.
                    Untuk menyatakan posisi tersebut secara tepat, digunakan suatu sistem
                    yang disebut <strong>sistem koordinat Kartesius</strong>.
                </p>

                <div class="text-center my-4 gambar-wrapper">
                    <img src="{{ asset('img/koordinatkartesius.jpg') }}" alt="Bidang Koordinat Kartesius"
                        class="materi-img zoomable img-koordinat">
                </div>
                <p class="mt-2 mb-0 text-center"> <small><strong>Gambar 1.1</strong> Contoh titik pada bidang koordinat
                        Kartesius</small> </p>
                <br>
                <p style="text-align: justify;">
                    Sistem koordinat Kartesius terdiri atas dua sumbu yang saling tegak lurus,
                    yaitu sumbu X (mendatar) dan sumbu Y (tegak).
                    Titik perpotongan kedua sumbu tersebut disebut <strong>titik asal</strong>
                    dan dinyatakan dengan (0,0).
                </p>

                <div class="text-center my-4">
                    <img src="{{ asset('img/titikpotong00.png') }}" alt="Titik Asal (0,0)"
                        class="materi-img zoomable img-titik-asal" style="width: 300px">
                </div>
                <p class="mt-2 mb-0 text-center"> <small><strong>Gambar 1.2</strong> Sumbu koordinat kartesius</small> </p>
                <br>

                <p style="text-align: justify;">
                    Setiap posisi pada bidang koordinat dinyatakan dalam bentuk pasangan bilangan
                    <strong>(x, y)</strong>.
                    Pasangan bilangan tersebut menunjukkan letak suatu <strong>titik</strong>
                    pada bidang koordinat Kartesius.
                </p>

                <p style="text-align: justify;">
                    Agar lebih memahami bagaimana suatu titik ditentukan oleh pasangan bilangan
                    tersebut, lakukanlah aktivitas berikut.
                </p>
            </div>
        </div>

        {{-- Eksplorasi Titik --}}
        <div class="position-relative apersepsi-section">

            <div class="position-absolute px-3 py-2 text-white fw-bold section-label">
                Eksplorasi Titik
            </div>

            <div class="box-pengantar mt-3 mb-3">
                Pada aktivitas ini kamu akan mengeksplorasi bagaimana posisi sebuah titik
                ditentukan oleh dua bilangan, yaitu $x$ dan $y$.

                <br><br>

                <b>Lakukan langkah berikut:</b>
                <ol class="mb-0 mt-2">
                    <li>Geser titik A ke arah kanan dan ke kiri.</li>
                    <li>Perhatikan bagaimana nilai <b>x</b> berubah.</li>
                    <li>Selanjutnya geser titik A ke arah atas dan ke bawah.</li>
                    <li>Perhatikan bagaimana nilai <b>y</b> berubah.</li>
                </ol>

                Amati perubahan nilai koordinat yang ditampilkan pada titik tersebut.
            </div>

            <div class="ggb-responsive mt-4">
                <div id="ggb-element"></div>
            </div>

            <div class="mt-4">

                <p>
                    Setelah melakukan pengamatan terhadap pergerakan titik,
                    jawablah pertanyaan berikut berdasarkan hasil eksplorasimu.
                </p>

                <div class="mb-3">
                    <p>1. Apa yang terjadi pada nilai x ketika titik digeser ke arah kanan?</p>

                    <label class="radio-option">
                        <input type="radio" name="q1" value="a"> a. Nilai x berkurang
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="q1" value="b"> b. Nilai x tetap
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="q1" value="c"> c. Nilai x bertambah
                    </label>

                    <div id="result1" class="mt-1"></div>
                </div>

                <div class="mb-3">
                    <p>2. Apa yang terjadi pada nilai y ketika titik digeser ke arah atas?</p>

                    <label class="radio-option">
                        <input type="radio" name="q2" value="a"> a. Nilai y tetap
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="q2" value="b"> b. Nilai y bertambah
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="q2" value="c"> c. Nilai y berkurang
                    </label>

                    <div id="result2" class="mt-1"></div>
                </div>

                <div class="mb-3">
                    <p>3. Apa yang terjadi jika titik digeser ke kiri dan ke bawah?</p>

                    <label class="radio-option">
                        <input type="radio" name="q3" value="a"> a. Nilai x dan y berkurang
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="q3" value="b"> b. Nilai x bertambah dan y berkurang
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="q3" value="c"> c. Nilai x dan y bertambah
                    </label>

                    <div id="result3" class="mt-1"></div>
                </div>

                <button class="btn-palet btn mt-2" onclick="cekJawaban()">Cek Jawaban</button>

                <div id="kesimpulanBox" class="mt-4 p-3 border border-success rounded bg-light" style="display:none;">
                    <strong>Kesimpulan:</strong><br>
                    Pada bidang koordinat Kartesius, posisi suatu titik ditentukan oleh pasangan
                    bilangan <b>(x, y)</b>.

                    <ul class="mb-0 mt-2">
                        <li>Nilai <b>x</b> menunjukkan posisi titik secara mendatar.</li>
                        <li>Nilai <b>y</b> menunjukkan posisi titik secara tegak.</li>
                    </ul>

                    Dengan demikian, setiap titik pada bidang koordinat dapat dinyatakan
                    dalam bentuk pasangan berurutan <b>(x, y)</b>.
                </div>
            </div>
        </div>

        {{-- Eksplorasi Titik pada Bidang Koordinat --}}
        <div class="position-relative apersepsi-section mt-5">

            <div class="position-absolute px-3 py-2 text-white fw-bold section-label">
                Eksplorasi Titik pada Bidang Koordinat
            </div>

            <p class="mt-3">
                Setelah memahami bahwa posisi titik dinyatakan dengan pasangan berurutan (x,y),
                sekarang kamu akan mencoba menentukan posisi titik berdasarkan nilai x dan y
                yang diberikan.
            </p>

            <div class="box-pengantar mt-3 mb-3">
                Pada aktivitas ini kamu akan mencoba menentukan posisi titik berdasarkan nilai
                <b>x</b> dan <b>y</b>.

                <br><br>

                <b>Petunjuk:</b>
                <ul class="mb-0 mt-2">
                    <li>Ubah nilai X dan Y pada kotak input.</li>
                    <li>Perhatikan bagaimana posisi titik berpindah pada bidang koordinat.</li>
                    <li>Tentukan pasangan berurutan yang sesuai pada tabel.</li>
                </ul>
            </div>

            <div class="mb-3 input-koordinat">
                <label>
                    X:
                    <input type="number" id="inputX" value="0" class="form-control">
                </label>

                <label>
                    Y:
                    <input type="number" id="inputY" value="0" class="form-control">
                </label>
            </div>

            <div class="canvas-responsive mt-3">
                <div id="canvas-container"></div>
            </div>

            <h5 class="mt-4"><strong>Lengkapilah Posisi Titik Berikut</strong></h5>

            <div class="table-responsive" style="width: fit-content; max-width: 100%; overflow-x: auto;">
                <table class="table table-bordered text-center" style="width: auto; table-layout: fixed; margin-bottom: 0;">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 80px;">x</th>
                            <th style="width: 80px;">y</th>
                            <th style="width: 220px;">Posisi Titik</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="vertical-align: middle;">3</td>
                            <td style="vertical-align: middle;">2</td>
                            <td style="vertical-align: middle;">
                                <input type="text" id="p1" class="form-control text-center"
                                    placeholder="(x,y)" style="width: 140px; margin: 0 auto;">
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;">-2</td>
                            <td style="vertical-align: middle;">4</td>
                            <td style="vertical-align: middle;">
                                <input type="text" id="p2" class="form-control text-center"
                                    placeholder="(x,y)" style="width: 140px; margin: 0 auto;">
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;">-3</td>
                            <td style="vertical-align: middle;">-1</td>
                            <td style="vertical-align: middle;">
                                <input type="text" id="p3" class="form-control text-center"
                                    placeholder="(x,y)" style="width: 140px; margin: 0 auto;">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <button class="btn-palet btn" onclick="cekTitik()">Cek Jawaban</button>

            <div id="hasilTitik" class="mt-3"></div>
        </div>

        {{-- Latihan Membuat Titik --}}
        <div class="position-relative apersepsi-section mt-5">

            <div class="position-absolute px-3 py-2 text-white fw-bold section-label">
                Latihan Membuat Titik
            </div>

            <p class="mt-3">
                Sekarang kamu sudah dapat membaca posisi titik pada bidang koordinat.
                Selanjutnya, cobalah menempatkan titik secara mandiri berdasarkan pasangan
                bilangan yang diberikan.
            </p>

            <div class="box-pengantar mt-3 mb-3">
                Pada latihan ini kamu akan menempatkan titik pada bidang koordinat
                dengan cara <b>mengklik</b> lokasi yang sesuai.

                <br><br>

                Ingat bahwa suatu titik dinyatakan dengan pasangan berurutan
                <b>(x,y)</b>.

                <br><br>

                <b>Tugasmu:</b>
                <ul class="mb-0 mt-2">
                    <li>Klik posisi yang sesuai untuk titik B, C, dan D.</li>
                    <li>Perhatikan arah mendatar (x) dan arah tegak (y).</li>
                    <li>Jika terjadi kesalahan, gunakan tombol <b>Reset</b>.</li>
                </ul>
            </div>

            <ul>
                <li>$B (2,3)$</li>
                <li>$C (-7,3)$</li>
                <li>$D (5,-4)$</li>
            </ul>

            <div class="canvas-responsive">
                <div id="canvas-latihan-buat"></div>
            </div>

            <div class="aksi-latihan mt-3">
                <button class="btn-palet btn btn-sm" onclick="cekTitikBuat()">Cek Jawaban</button>
                <button class="btn-palet btn btn-sm" onclick="resetTitik()">Reset</button>
            </div>

            <div id="hasilLatihanBuat" class="mt-3"></div>
        </div>
    </div>

    {{-- GeoGebra --}}
    <script src="https://www.geogebra.org/apps/deployggb.js"></script>

    <script>
        let applet = null;

        // =========================
        // Responsive Size
        // =========================
        function getGgbSize() {

            const container = document.querySelector('.ggb-responsive');

            const width = container ?
                container.clientWidth - 16 :
                700;

            // MOBILE
            if (window.innerWidth <= 768) {

                return {
                    width: Math.max(320, width),
                    height: 320
                };
            }

            // DESKTOP
            return {
                width: Math.min(400, width),
                height: 400
            };
        }

        // =========================
        // On Load GeoGebra
        // =========================
        function ggbOnLoad(api) {

            // tampilan grafik saja
            api.setPerspective("G");

            // grid & axis
            api.setAxesVisible(true, true);
            api.setGridVisible(true);

            // grid sederhana
            api.setGraphicsOptions(1, {
                gridType: 0,
            });

            api.setAxisSteps(1, 1, 1, 1);

            // koordinat responsive
            if (window.innerWidth <= 768) {

                // mobile lebih zoom
                api.setCoordSystem(-5, 5, -5, 5);

            } else {

                // desktop
                api.setCoordSystem(-6, 6, -6, 6);
            }

            // titik eksplorasi
            api.evalCommand("A=(1,1)");

            api.setLabelVisible("A", true);

            api.setPointSize("A", 6);

            api.setColor("A", 0, 102, 204);
        }

        // =========================
        // Init GeoGebra
        // =========================
        function loadGeoGebra() {

            const ggbSize = getGgbSize();

            const params = {

                appName: "classic",

                id: "ggbApplet",

                width: ggbSize.width,
                height: ggbSize.height,

                showToolBar: false,
                showAlgebraInput: false,
                showMenuBar: false,

                showZoomButtons: false,
                showFullscreenButton: false,

                enableShiftDragZoom: true,
                enableRightClick: false,

                showResetIcon: true,

                appletOnLoad: ggbOnLoad
            };

            applet = new GGBApplet(params, true);

            applet.inject('ggb-element');
        }

        // =========================
        // Load
        // =========================
        window.addEventListener("load", function() {

            loadGeoGebra();

        });
    </script>

    {{-- Cek Jawaban Eksplorasi GeoGebra --}}
    <script>
        function cekJawaban() {
            const kunci = {
                q1: "c",
                q2: "b",
                q3: "a"
            };

            let benarSemua = true;

            for (let key in kunci) {
                const jawaban = document.querySelector(`input[name="${key}"]:checked`);
                const resultDiv = document.getElementById("result" + key.slice(1));

                if (!jawaban) {
                    resultDiv.innerHTML = "<span class='text-warning'>Pilih salah satu jawaban</span>";
                    benarSemua = false;
                } else if (jawaban.value === kunci[key]) {
                    resultDiv.innerHTML = "<span class='text-success'>✓ Benar</span>";
                } else {
                    resultDiv.innerHTML = "<span class='text-danger'>✗ Salah</span>";
                    benarSemua = false;
                }
            }

            if (benarSemua) {
                document.getElementById("kesimpulanBox").style.display = "block";
            } else {
                document.getElementById("kesimpulanBox").style.display = "none";
            }
        }
    </script>

    {{-- p5 --}}
    <script src="{{ asset('js/subbabA/eksplorasititik1.js') }}"></script>
    <script>
        let titikSiswa = [];
        let daftarNama = ["B", "C", "D"];

        const sketch = (p) => {
            const gridSize = 400;

            let originX;
            let originY;
            let scaleUnit;

            let lastClickTime = 0;

            p.setup = function() {
                let canvas = p.createCanvas(450, 500);

                canvas.parent("canvas-latihan-buat");

                scaleUnit = gridSize / 20;

                originX = p.width / 2;
                originY = p.height / 2;

                // klik hanya aktif di canvas saja
                canvas.mousePressed(function() {
                    handleInput();
                    return false;
                });
            };

            p.draw = function() {
                p.background(245);

                drawGrid();
                drawTitik();
                drawInfo();
            };

            // =========================
            // CLICK INPUT
            // =========================
            function handleInput() {

                // cegah double trigger
                if (p.millis() - lastClickTime < 300) {
                    return;
                }

                lastClickTime = p.millis();

                // maksimal 3 titik
                if (titikSiswa.length >= 3) {
                    return;
                }

                const titik = pixelToCoord(
                    p.mouseX,
                    p.mouseY
                );

                if (!titik) {
                    return;
                }

                titikSiswa.push({
                    nama: daftarNama[titikSiswa.length],
                    x: titik.x,
                    y: titik.y,
                });
            }

            // =========================
            // GRID
            // =========================
            function drawGrid() {
                p.push();

                p.translate(originX, originY);

                // grid
                p.stroke(220);

                for (let i = -10; i <= 10; i++) {
                    p.line(i * scaleUnit, -200, i * scaleUnit, 200);

                    p.line(-200, i * scaleUnit, 200, i * scaleUnit);
                }

                // axis
                p.stroke(0);

                p.strokeWeight(2);

                p.line(-200, 0, 200, 0);

                p.line(0, -200, 0, 200);

                p.strokeWeight(1);

                // ticks
                for (let i = -10; i <= 10; i++) {
                    p.line(i * scaleUnit, -5, i * scaleUnit, 5);

                    p.line(-5, i * scaleUnit, 5, i * scaleUnit);
                }

                // numbers
                p.noStroke();

                p.fill(0);

                p.textSize(12);

                for (let i = -10; i <= 10; i++) {
                    if (i !== 0) {
                        p.text(i, i * scaleUnit - 4, 18);

                        p.text(i, -18, -i * scaleUnit + 4);
                    }
                }

                p.text("0", 6, 15);

                p.pop();
            }

            // =========================
            // DRAW TITIK
            // =========================
            function drawTitik() {
                p.push();

                p.translate(originX, originY);

                titikSiswa.forEach((t) => {
                    p.fill("red");

                    p.noStroke();

                    p.circle(t.x * scaleUnit, -t.y * scaleUnit, 10);

                    p.fill(0);

                    p.textSize(14);

                    p.text(t.nama, t.x * scaleUnit + 8, -t.y * scaleUnit - 8);
                });

                p.pop();
            }

            // =========================
            // INFO
            // =========================
            function drawInfo() {
                p.fill(0);

                p.noStroke();

                p.textSize(13);

                if (titikSiswa.length < 3) {
                    p.text(
                        `Klik untuk menempatkan titik ${daftarNama[titikSiswa.length]}`,
                        20,
                        480,
                    );
                } else {
                    p.text(
                        `Semua titik sudah ditempatkan. Klik "Cek Jawaban".`,
                        20,
                        480,
                    );
                }
            }

            // =========================
            // PIXEL TO COORD
            // =========================
            function pixelToCoord(px, py) {
                let x = Math.round((px - originX) / scaleUnit);

                let y = Math.round((originY - py) / scaleUnit);

                x = p.constrain(x, -10, 10);

                y = p.constrain(y, -10, 10);

                return {
                    x,
                    y
                };
            }
        };

        new p5(sketch);

        // =========================
        // CEK JAWABAN
        // =========================
        function cekTitikBuat() {
            const target = [{
                    nama: "B",
                    x: 2,
                    y: 3
                },
                {
                    nama: "C",
                    x: -7,
                    y: 3
                },
                {
                    nama: "D",
                    x: 5,
                    y: -4
                },
            ];

            let benar = target.every((t) =>
                titikSiswa.some((s) => s.nama === t.nama && s.x === t.x && s.y === t.y),
            );

            if (benar) {
                document.getElementById("hasilLatihanBuat").innerHTML =
                    "<div class='alert alert-success'>Semua titik (B, C, D) sudah benar</div>";
            } else {
                document.getElementById("hasilLatihanBuat").innerHTML =
                    "<div class='alert alert-danger'>Masih ada titik yang belum tepat</div>";
            }
        }

        // =========================
        // RESET
        // =========================
        function resetTitik() {
            titikSiswa = [];

            document.getElementById("hasilLatihanBuat").innerHTML = "";
        }
    </script>

    {{-- Cek Jawaban Posisi Titik --}}
    <script>
        function normalisasi(input) {
            return input.replace(/\s/g, "").replace(/[()]/g, "").toLowerCase();
        }

        function cekTitik() {
            const kunci = {
                p1: "3,2",
                p2: "-2,4",
                p3: "-3,-1"
            };

            let benarSemua = true;

            for (let key in kunci) {
                let jawaban = normalisasi(document.getElementById(key).value);

                if (jawaban === normalisasi(kunci[key])) {
                    document.getElementById(key).classList.remove("is-invalid");
                    document.getElementById(key).classList.add("is-valid");
                } else {
                    document.getElementById(key).classList.remove("is-valid");
                    document.getElementById(key).classList.add("is-invalid");
                    benarSemua = false;
                }
            }

            if (benarSemua) {
                document.getElementById("hasilTitik").innerHTML =
                    "<div class='alert alert-success'>Semua jawaban benar</div>";
            } else {
                document.getElementById("hasilTitik").innerHTML =
                    "<div class='alert alert-danger'>Masih ada jawaban yang salah</div>";
            }
        }
    </script>

    {{-- Zoom Gambar --}}
    <script src="https://cdn.jsdelivr.net/npm/medium-zoom@1.1.0/dist/medium-zoom.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            mediumZoom('.zoomable', {
                margin: 24,
                background: 'rgba(0, 0, 0, 0.75)',
                scrollOffset: 40
            });
        });
    </script>
@endsection

@section('nav')
    <a href="{{ route('peta-konsep') }}" class="btn btn-prev px-4 rounded-pill">
        ← Prev
    </a>
    <a href="{{ route('materi.show', 'subbab-a1') }}" class="btn btn-next px-4 rounded-pill fw-semibold">
        Next →
    </a>
@endsection
