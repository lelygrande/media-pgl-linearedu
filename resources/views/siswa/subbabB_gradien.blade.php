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

        .badge-mini {
            font-size: 12px;
            padding: 6px 10px;
            border-radius: 999px;
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
            max-width: 340px;
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

    <style>
        .eksplorasi-wrap {
            width: 100%;
        }

        .slider-area input {
            width: 260px;
            max-width: 100%;
        }

        #papanVisual {
            position: relative;
            width: 100%;
            max-width: 350px;
            height: 320px;
            border-radius: 16px;
            background: #f8fafc;
            overflow: hidden;
            margin-top: 20px;
        }

        /* alas */
        #alas {
            position: absolute;
            left: 80px;
            bottom: 60px;
            height: 4px;
            background: #94a3b8;
        }

        /* tinggi */
        #tinggi {
            position: absolute;
            left: 80px;
            bottom: 56px;
            width: 4px;
            background: #94a3b8;
        }

        /* papan miring */
        #papan {
            position: absolute;
            left: 80px;
            bottom: 60px;
            height: 8px;
            background: #334155;
            border-radius: 999px;
            transform-origin: left center;
        }

        /* mobile */
        @media (max-width: 576px) {

            #papanVisual {
                height: 260px;
            }

            #alas,
            #papan {
                left: 35px;
                bottom: 35px;
            }

            #tinggi {
                left: 35px;
                bottom: 35px;

                transform: translateY(15px);
            }

        }
    </style>



    {{-- css pilihan ganda --}}
    <style>
        .quiz-card .form-check {
            padding-left: 0;
            /* hilangkan offset bawaan bootstrap */
        }

        .quiz-card .form-check-input {
            margin-left: 0;
            /* hilangkan minus margin */
            margin-right: 10px;
            /* beri jarak ke teks */
            position: relative;
        }
    </style>

    <style>
        .drag-bank {
            display: flex;
            flex-direction: column;
            gap: 10px;
            min-height: 220px;
            padding: 10px;
            border: 2px dashed #d6dee8;
            border-radius: 12px;
            background: #ffffff;
        }

        .drag-item {
            padding: 8px 12px;
            border: 1px solid #cfd8e3;
            border-radius: 10px;
            background: #f8fbff;
            cursor: grab;
            font-weight: 600;
            user-select: none;
            width: fit-content;
        }

        .drop-zone {
            border: 2px dashed #b8c7db;
            border-radius: 12px;
            padding: 8px 10px;
            background: #fcfdff;
            min-height: 54px;
        }

        .drop-slot {
            margin-top: 6px;
            min-height: 32px;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 6px;
        }

        .drag-item:active {
            cursor: grabbing;
        }

        .drop-zone.hovered {
            background: #eef5ff;
            border-color: #4a76b8;
        }

        .drop-zone.correct {
            border-color: #22b969;
            background: #f2fff8;
        }

        .drop-zone.wrong {
            border-color: #dc3545;
            background: #fff5f5;
        }

        /* =========================================
                        RESPONSIVE MOBILE
                    ========================================= */
        @media (max-width: 768px) {

            /* ---------- RUMUS ---------- */
            .rumus-box {
                overflow-x: auto;
                font-size: 16px;
                padding: 12px;
            }

            /* ---------- GAMBAR FIGURE ---------- */
            .img-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .img-grid img {
                width: 100%;
                max-width: 100%;
                height: auto;
            }
        }
    </style>

    {{-- Judul --}}
    <h1 class="mb-3" style="font-weight: 600;">B. Gradien (Kemiringan Garis)</h1>

    {{-- Tujuan Pembelajaran --}}
    <div class="card card-tujuan mb-4">
        <div class="card-body">
            <h5>Tujuan Pembelajaran:</h5>
            <ol>
                <li>Peserta didik dapat memahami konsep gradien dan menentukan gradien garis.</li>
            </ol>
        </div>
    </div>

    {{-- Subjudul --}}
    <h2 class="mt-2 mb-3" style="font-weight: 600;">1. Pengertian Gradien (Kemiringan)</h2>

    <div class="box-eksplorasi mt-5">
        <div class="title-box">
            Eksplorasi Kemiringan
        </div>

        <p style="line-height:1.8; text-align: justify;">
            Geser kedua slider, lalu amati perubahan bentuk papan.
            Perhatikan hubungan antara nilai <b>Naik</b> dan <b>Maju</b>.
            Jika nilai <b>Naik</b> semakin besar, apakah papan tampak semakin curam?
            Jika nilai <b>Maju</b> semakin besar, apakah papan tampak lebih landai?
        </p>

        <p style="line-height:1.8; text-align: justify;">
            Dari pengamatan ini, kamu akan memahami bahwa kemiringan garis dapat dilihat
            dari perbandingan perubahan ke atas dengan perubahan ke samping.
        </p>

        <div class="eksplorasi-wrap mb-4">

            <!-- Slider -->
            <div class="slider-area mb-3">
                <div class="mb-2">
                    <label>Naik: <span id="riseVal">3</span></label>
                    <input type="range" id="riseSlider" min="1" max="10" value="3">
                </div>

                <div>
                    <label>Maju: <span id="runVal">6</span></label>
                    <input type="range" id="runSlider" min="1" max="10" value="6">
                </div>
            </div>

            <!-- Area gambar -->
            <div id="papanVisual">

                <!-- alas -->
                <div id="alas"></div>

                <!-- tinggi -->
                <div id="tinggi"></div>

                <!-- papan miring -->
                <div id="papan"></div>

            </div>
        </div>

        <!-- Soal 1 -->
        <div class="mb-4">
            <div style="line-height:1.8;" class="mb-2">
                1) Setelah kamu mencoba menggeser slider, bagaimana bentuk papan jika nilai
                <b>naik</b> diperbesar, sedangkan nilai <b>maju</b> tetap?
            </div>

            <div class="opsi-kotak-wrap" id="opsiQ1">
                <button type="button" class="opsi-kotak" data-soal="q1" data-value="tegak">lebih tegak</button>
                <button type="button" class="opsi-kotak" data-soal="q1" data-value="landai">lebih landai</button>
                <button type="button" class="opsi-kotak" data-soal="q1" data-value="tetap">tetap</button>
            </div>

            <input type="hidden" id="q1" value="">
        </div>

        <!-- Soal 2 -->
        <div class="mb-4">
            <div style="line-height:1.8;" class="mb-2">
                2) Sekarang perhatikan kondisi sebaliknya. Bagaimana bentuk papan jika nilai
                <b>maju</b> diperbesar, sedangkan nilai <b>naik</b> tetap?
            </div>

            <div class="opsi-kotak-wrap" id="opsiQ2">
                <button type="button" class="opsi-kotak" data-soal="q2" data-value="tegak">lebih tegak</button>
                <button type="button" class="opsi-kotak" data-soal="q2" data-value="landai">lebih landai</button>
                <button type="button" class="opsi-kotak" data-soal="q2" data-value="tetap">tetap</button>
            </div>

            <input type="hidden" id="q2" value="">
        </div>

        <!-- Soal 3 tetap dropdown -->
        <div class="mb-3">
            <div style="line-height:1.8;">
                3) Berdasarkan hasil pengamatanmu, kemiringan papan ditentukan oleh perbandingan
            </div>

            <div class="d-flex align-items-center flex-wrap gap-2 mt-2">
                <select id="q3a" class="form-select form-select-sm w-auto">
                    <option value="">-- pilih --</option>
                    <option value="naik">naik</option>
                    <option value="maju">maju</option>
                    <option value="warna">warna</option>
                    <option value="panjang">panjang</option>
                </select>
                <span>dan</span>
                <select id="q3b" class="form-select form-select-sm w-auto">
                    <option value="">-- pilih --</option>
                    <option value="naik">naik</option>
                    <option value="maju">maju</option>
                    <option value="warna">warna</option>
                    <option value="panjang">panjang</option>
                </select>
            </div>
        </div>

        <button class="btn btn-palet mt-2" onclick="cekJawabanPapan()">Cek Jawaban</button>
        <div id="feedbackPapan" class="mt-2"></div>
    </div>

    <div class="card card-materi mt-3 mb-3">
        <div class="card-body">
            <p style="line-height:1.8; text-align: justify;">
                Dari kegiatan eksplorasi tadi, kamu telah melihat bahwa kemiringan papan
                ditentukan oleh perbandingan antara <b>naik</b> dan <b>maju</b>.
                Semakin besar nilai naik dibanding maju, papan tampak semakin curam.
                Sebaliknya, jika nilai maju lebih besar, papan tampak lebih landai.
            </p>

            <p style="line-height:1.8; text-align: justify;">
                Dalam sistem koordinat, perubahan <b>naik</b> dinyatakan sebagai perubahan nilai pada sumbu-$y$
                dan ditulis dengan $ \Delta y $.
                Adapun perubahan <b>maju</b> dinyatakan sebagai perubahan nilai pada sumbu-$x$
                dan ditulis dengan $ \Delta x $.
            </p>

            <p style="line-height:1.8; text-align: justify;">
                Oleh karena itu, untuk menyatakan kemiringan garis secara matematis,
                kita menggunakan <b>gradien</b>.
                Gradien suatu garis dirumuskan sebagai:
            </p>

            <div class="rumus-box text-center my-3">
                $$
                m = \frac{\Delta y}{\Delta x}
                = \frac{\text{Perubahan panjang sisi tegak (vertikal)}}{\text{Perubahan panjang sisi
                mendatar(horizontal)}}
                $$
            </div>

            <p style="line-height:1.8; text-align: justify;">
                Jadi, gradien menunjukkan seberapa besar perubahan nilai $y$
                untuk setiap satu satuan perubahan nilai $x$.
            </p>
            <p style="line-height:1.8;">
                Semakin curam suatu garis, maka nilai gradiennya semakin besar.
                Sebaliknya, semakin landai suatu garis, maka nilai gradiennya semakin kecil.
            </p>
        </div>
    </div>

    <p class="mb-2" style="line-height: 1.8;">
        Garis lurus memiliki kemiringan atau gradien dengan ciri-ciri sebagai berikut:
    </p>

    <ol style="line-height: 1.8;">
        <li>
            Garis yang miring ke kanan atas atau ke kiri bawah memiliki gradien <b>positif</b>.
            Artinya, ketika arah gerak dari kiri ke kanan, nilai <b>y</b> meningkat.
        </li>
        <li>
            Garis yang miring ke kiri atas atau ke kanan bawah memiliki gradien <b>negatif</b>.
            Dalam hal ini, saat bergerak ke kanan, nilai <b>y</b> justru menurun.
        </li>
        <li>
            Garis yang datar tidak memiliki kemiringan, sehingga gradiennya <b>nol (0)</b>.
            Sedangkan garis yang tegak lurus sumbu-x tidak memiliki nilai gradien yang <b>terdefinisi</b>.
        </li>
    </ol>

    <p class="mb-2 mt-3" style="line-height: 1.8;">
        Untuk memahami cara menentukan arah gradien suatu garis, perhatikan tanda perubahan komponen koordinat
        berikut:
    </p>

    <ul style="line-height: 1.9;">
        <li>Komponen <b>y</b> bernilai positif (+) jika bergerak ke atas, dan negatif (−) jika bergerak ke bawah.
        </li>
        <li>Komponen <b>x</b> bernilai positif (+) jika bergerak ke kanan, dan negatif (−) jika bergerak ke kiri.
        </li>
    </ul>

    <div class="img-grid mb-4">
        <figure>
            <img src="{{ asset('img/gradien/mpositif.png') }}" alt="Contoh gradien positif">
            <figcaption class="mt-2"><span class="badge bg-primary badge-mini">m = positif</span></figcaption>
        </figure>
        <figure>
            <img src="{{ asset('img/gradien/mnegatif.png') }}" alt="Contoh gradien negatif">
            <figcaption class="mt-2"><span class="badge bg-primary badge-mini">m = negatif</span></figcaption>
        </figure>
        <figure>
            <img src="{{ asset('img/gradien/mdatar.png') }}" alt="Contoh gradien nol">
            <figcaption class="mt-2"><span class="badge bg-secondary badge-mini">m = 0</span></figcaption>
        </figure>
        <figure>
            <img src="{{ asset('img/gradien/mtakterdefinisi.png') }}" alt="Contoh gradien tidak terdefinisi">
            <figcaption class="mt-2"><span class="badge bg-secondary badge-mini">m tidak terdefinisi</span>
            </figcaption>
        </figure>
    </div>

    <div class="box-contoh mt-5 mb-4">
        <div class="card-body">
            <span class="title-box">Contoh</span>
            <h5 class="mb-3" style="font-weight:700;">Menentukan Tanda Gradien</h5>

            <p style="line-height:1.8; text-align:justify;">
                Untuk menentukan apakah gradien bernilai positif atau negatif, perhatikan arah perubahan
                mendatar dan arah perubahan vertikal dari titik pertama ke titik kedua.
            </p>

            <div class="row g-4">
                {{-- CONTOH 1 --}}
                <div class="col-md-6">
                    <div class="border rounded-4 p-3 h-100" style="background:#f8fbff;">
                        <h6 class="fw-bold mb-3">Contoh 1: Gradien Positif</h6>

                        <div class="text-center mb-3">
                            <img class="zoomable" src="{{ asset('img/gradien/contohgradienpositif.png') }}"
                                alt="Contoh gradien positif"
                                style="max-width: 360px; width: 100%; border-radius: 12px; border:1px solid #e5e7eb;">
                        </div>

                        <p style="line-height:1.8; text-align:justify;">
                            Dari titik A ke titik B, garis bergerak <b>ke kanan</b> sehingga
                            <b>\(\Delta x\) bernilai positif</b>, dan bergerak <b>ke atas</b> sehingga
                            <b>\(\Delta y\) juga bernilai positif</b>.
                        </p>

                        <div class="rumus-box text-center mb-3">
                            \[
                            \Delta x = +6,\qquad \Delta y = +4
                            \]
                            \[
                            m = \frac{\Delta y}{\Delta x} = \frac{+4}{+6} = \frac{2}{3}
                            \]
                        </div>

                        <p class="mb-0" style="line-height:1.8;">
                            Karena \(\Delta y\) dan \(\Delta x\) sama-sama bernilai positif, maka gradien
                            garis bernilai <b>positif</b>.
                        </p>
                    </div>
                </div>

                {{-- CONTOH 2 --}}
                <div class="col-md-6">
                    <div class="border rounded-4 p-3 h-100" style="background:#fffaf8;">
                        <h6 class="fw-bold mb-3">Contoh 2: Gradien Negatif</h6>

                        <div class="text-center mb-3">
                            <img class="zoomable" src="{{ asset('img/gradien/contohgradiennegatif.png') }}"
                                alt="Contoh gradien positif"
                                style="max-width: 360px; width: 100%; border-radius: 12px; border:1px solid #e5e7eb;">
                        </div>

                        <p style="line-height:1.8; text-align:justify;">
                            Dari titik A ke titik B, garis bergerak <b>ke kanan</b> sehingga
                            <b>\(\Delta x\) bernilai positif</b>, tetapi bergerak <b>ke bawah</b> sehingga
                            <b>\(\Delta y\) bernilai negatif</b>.
                        </p>

                        <div class="rumus-box text-center mb-3">
                            \[
                            \Delta x = +6,\qquad \Delta y = -4
                            \]
                            \[
                            m = \frac{\Delta y}{\Delta x} = \frac{-4}{+6} = -\frac{2}{3}
                            \]
                        </div>

                        <p class="mb-0" style="line-height:1.8;">
                            Karena \(\Delta y\) bernilai negatif dan \(\Delta x\) bernilai positif, maka
                            gradien garis bernilai <b>negatif</b>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="box-latihan mt-5 mb-4" id="latihanGradienBox">
        <div class="card-body">
            <span class="title-box">Latihan</span>

            <!-- ===================== -->
            <!-- LATIHAN 1 -->
            <!-- ===================== -->
            <div class="latihan-step" id="latihanStep1">
                <p style="line-height:1.8; text-align:justify;">
                    1. Perhatikan beberapa bentuk garis berikut, kemudian pasangkan masing-masing
                    garis dengan jenis gradien yang sesuai.
                </p>

                <div class="row g-3">
                    <div class="col-lg-5">
                        <div class="drag-bank">
                            <div class="drag-item" draggable="true" data-value="nol">Garis datar</div>
                            <div class="drag-item" draggable="true" data-value="positif">Garis naik</div>
                            <div class="drag-item" draggable="true" data-value="takdef">Garis tegak</div>
                            <div class="drag-item" draggable="true" data-value="negatif">Garis turun</div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="drop-zone mb-3" data-answer="positif">
                            <strong>Gradien positif</strong>
                            <div class="drop-slot"></div>
                        </div>

                        <div class="drop-zone mb-3" data-answer="negatif">
                            <strong>Gradien negatif</strong>
                            <div class="drop-slot"></div>
                        </div>

                        <div class="drop-zone mb-3" data-answer="nol">
                            <strong>Gradien nol</strong>
                            <div class="drop-slot"></div>
                        </div>

                        <div class="drop-zone" data-answer="takdef">
                            <strong>Tidak terdefinisi</strong>
                            <div class="drop-slot"></div>
                        </div>
                    </div>
                </div>

                <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div>
                        <button type="button" class="btn btn-palet btn-sm"
                            onclick="cekKlasifikasiGradien()">Cek</button>
                        <button type="button" class="btn btn-palet btn-sm"
                            onclick="resetKlasifikasiGradien()">Reset</button>
                    </div>

                    <button id="nextBtnLatihan1" type="button" class="btn btn-palet btn-sm" onclick="nextLatihan(2)"
                        disabled>
                        Lanjut ke Latihan 2
                    </button>
                </div>

                <div id="feedbackKlasifikasiGradien" class="mt-3"></div>
            </div>

            <!-- ===================== -->
            <!-- LATIHAN 2 -->
            <!-- ===================== -->
            <div class="latihan-step" id="latihanStep2" style="display:none;">
                <hr class="my-4">

                <p style="line-height:1.8; text-align:justify;">
                    2. Perhatikan gambar berikut. Jika garis dibaca dari titik A ke titik B, maka tanda perubahan
                    koordinat yang benar adalah ...
                </p>

                <div class="text-center mb-3">
                    <img src="{{ asset('img/gradien/latihan2_positif.png') }}" alt="Latihan 2 gradien positif"
                        style="max-width: 340px; width:100%; border-radius:12px; border:1px solid #e5e7eb;">
                </div>

                <div class="opsi-kotak-wrap">
                    <button type="button" class="opsi-kotak" data-soal="lat2" data-value="a">
                        \(\Delta x\) positif dan \(\Delta y\) positif
                    </button>
                    <button type="button" class="opsi-kotak" data-soal="lat2" data-value="b">
                        \(\Delta x\) positif dan \(\Delta y\) negatif
                    </button>
                    <button type="button" class="opsi-kotak" data-soal="lat2" data-value="c">
                        \(\Delta x\) negatif dan \(\Delta y\) positif
                    </button>
                    <button type="button" class="opsi-kotak" data-soal="lat2" data-value="d">
                        \(\Delta x\) negatif dan \(\Delta y\) negatif
                    </button>
                </div>

                <input type="hidden" id="lat2" value="">

                <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <button type="button" class="btn btn-palet btn-sm" onclick="prevLatihan(1)">
                        Kembali ke Latihan 1
                    </button>

                    <div>
                        <button type="button" class="btn btn-palet btn-sm" onclick="cekLatihan2Gradien()">Cek</button>
                        <button type="button" class="btn btn-palet btn-sm"
                            onclick="resetLatihan2Gradien()">Reset</button>
                    </div>

                    <button id="nextBtnLatihan2" type="button" class="btn btn-palet btn-sm" onclick="nextLatihan(3)"
                        disabled>
                        Lanjut ke Latihan 3
                    </button>
                </div>

                <div id="feedbackLatihan2Gradien" class="mt-3"></div>
            </div>

            <!-- ===================== -->
            <!-- LATIHAN 3 -->
            <!-- ===================== -->
            <div class="latihan-step" id="latihanStep3" style="display:none;">
                <hr class="my-4">

                <p style="line-height:1.8; text-align:justify;">
                    3. Perhatikan gambar berikut. Tentukan nilai \(\Delta y\), \(\Delta x\), dan gradien garisnya.
                </p>

                <div class="text-center mb-3">
                    <img src="{{ asset('img/gradien/latihan3_negatif.png') }}" alt="Latihan 3 gradien negatif"
                        style="max-width: 340px; width:100%; border-radius:12px; border:1px solid #e5e7eb;">
                </div>

                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">\(\Delta y\)</label>
                        <input type="text" id="lat3_dy" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">\(\Delta x\)</label>
                        <input type="text" id="lat3_dx" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Gradien \(m\)</label>
                        <input type="text" id="lat3_m" class="form-control" placeholder="contoh: -1 atau -5/5">
                    </div>
                </div>

                <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <button type="button" class="btn btn-palet btn-sm" onclick="prevLatihan(2)">
                        Kembali ke Latihan 2
                    </button>

                    <div>
                        <button type="button" class="btn btn-palet btn-sm" onclick="cekLatihan3Gradien()">Cek</button>
                        <button type="button" class="btn btn-palet btn-sm"
                            onclick="resetLatihan3Gradien()">Reset</button>
                    </div>
                </div>

                <div id="feedbackLatihan3Gradien" class="mt-3" style="display:none;">
                    <div id="feedbackBoxLat3" class="alert mb-0"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- </div> --}}
    <script src="https://cdn.jsdelivr.net/npm/p5@1.9.0/lib/p5.min.js"></script>
    <script>
        const riseSlider = document.getElementById("riseSlider");
        const runSlider = document.getElementById("runSlider");

        const riseVal = document.getElementById("riseVal");
        const runVal = document.getElementById("runVal");

        const papan = document.getElementById("papan");
        const alas = document.getElementById("alas");
        const tinggi = document.getElementById("tinggi");

        function updatePapan() {

            const rise = parseInt(riseSlider.value);
            const run = parseInt(runSlider.value);

            // update angka
            riseVal.textContent = rise;
            runVal.textContent = run;

            // skala visual
            const scale = window.innerWidth < 576 ? 14 : 20;

            const tinggiPx = rise * scale;
            const alasPx = run * scale;

            // panjang papan
            const panjang = Math.sqrt(
                alasPx * alasPx +
                tinggiPx * tinggiPx
            );

            // sudut papan
            const sudut = Math.atan2(tinggiPx, alasPx) * (180 / Math.PI);

            // alas
            alas.style.width = `${alasPx}px`;

            // tinggi
            tinggi.style.height = `${tinggiPx}px`;

            // posisi tinggi
            tinggi.style.bottom = `60px`;

            // papan
            papan.style.width = `${panjang}px`;
            papan.style.transform = `rotate(-${sudut}deg)`;
        }

        riseSlider.addEventListener("input", updatePapan);
        runSlider.addEventListener("input", updatePapan);

        updatePapan();
    </script>

    <script>
        // Eksplorasi
        document.addEventListener("DOMContentLoaded", function() {
            const opsiKotak = document.querySelectorAll(".opsi-kotak");

            opsiKotak.forEach((btn) => {
                btn.addEventListener("click", function() {
                    const soal = this.dataset.soal;
                    const value = this.dataset.value;

                    document
                        .querySelectorAll(`.opsi-kotak[data-soal="${soal}"]`)
                        .forEach((el) => {
                            el.classList.remove("active");
                        });

                    this.classList.add("active");
                    document.getElementById(soal).value = value;
                });
            });
        });

        // Kunci Materi
        // cek jawaban (3 pertanyaan)
        document.addEventListener("DOMContentLoaded", function() {
            const opsiKotak = document.querySelectorAll(".opsi-kotak");

            opsiKotak.forEach((btn) => {
                btn.addEventListener("click", function() {
                    const soal = this.dataset.soal;
                    const value = this.dataset.value;

                    document
                        .querySelectorAll(`.opsi-kotak[data-soal="${soal}"]`)
                        .forEach((el) => {
                            el.classList.remove("active");
                        });

                    this.classList.add("active");
                    document.getElementById(soal).value = value;
                });
            });
        });

        function cekJawabanPapan() {
            const q1 = document.getElementById("q1").value;
            const q2 = document.getElementById("q2").value;
            const q3a = document.getElementById("q3a").value;
            const q3b = document.getElementById("q3b").value;

            const feedback = document.getElementById("feedbackPapan");
            const lanjutan = document.getElementById("lanjutanGradien");

            // reset style dropdown
            document.getElementById("q3a").classList.remove("is-valid", "is-invalid");
            document.getElementById("q3b").classList.remove("is-valid", "is-invalid");

            // reset style opsi kotak
            document.querySelectorAll('.opsi-kotak[data-soal="q1"]').forEach((el) => {
                el.classList.remove("benar", "salah");
            });
            document.querySelectorAll('.opsi-kotak[data-soal="q2"]').forEach((el) => {
                el.classList.remove("benar", "salah");
            });

            // validasi kosong
            if (!q1 || !q2 || !q3a || !q3b) {
                feedback.innerHTML = `
            <div class="alert alert-warning mb-0">
                Semua jawaban harus diisi terlebih dahulu.
            </div>
        `;
                if (lanjutan) lanjutan.style.display = "none";
                return;
            }

            // kunci jawaban
            const benarQ1 = "tegak";
            const benarQ2 = "landai";

            // untuk q3, urutan boleh fleksibel: naik dan maju
            const benarQ3 = q3a === "naik" && q3b === "maju";
            let semuaBenar = true;

            // cek q1
            const q1Aktif = document.querySelector(
                `.opsi-kotak[data-soal="q1"][data-value="${q1}"]`,
            );
            if (q1 === benarQ1) {
                q1Aktif.classList.add("benar");
            } else {
                q1Aktif.classList.add("salah");
                semuaBenar = false;
            }

            // cek q2
            const q2Aktif = document.querySelector(
                `.opsi-kotak[data-soal="q2"][data-value="${q2}"]`,
            );
            if (q2 === benarQ2) {
                q2Aktif.classList.add("benar");
            } else {
                q2Aktif.classList.add("salah");
                semuaBenar = false;
            }

            // cek q3
            if (benarQ3) {
                document.getElementById("q3a").classList.add("is-valid");
                document.getElementById("q3b").classList.add("is-valid");
            } else {
                document.getElementById("q3a").classList.add("is-invalid");
                document.getElementById("q3b").classList.add("is-invalid");
                semuaBenar = false;
            }

            // feedback
            if (semuaBenar) {
                feedback.innerHTML = `
            <div class="alert alert-success mb-0">
                Bagus! Jawabanmu benar. Kamu bisa melanjutkan ke bagian berikutnya.
            </div>
        `;
                if (lanjutan) lanjutan.style.display = "block";
            } else {
                feedback.innerHTML = `
            <div class="alert alert-danger mb-0">
                Masih ada jawaban yang belum tepat. Coba perhatikan lagi hubungan antara naik dan maju.
            </div>
        `;
                if (lanjutan) lanjutan.style.display = "none";
            }
        }

        // Slider Latihan
        let currentLatihanGradien = 0;

        function goToLatihanGradien(index) {
            const track = document.getElementById("latihanTrackGradien");
            if (!track) return;

            currentLatihanGradien = index;
            track.style.transform = `translateX(-${index * 100}%)`;
        }

        // Render Katex
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

        // =========================
        // LATIHAN SOAL SUBBAB B
        // =========================

        let draggedItemGradien = null;

        document.addEventListener("DOMContentLoaded", function() {
            initKlasifikasiGradien();
            initOpsiLatihan2Gradien();
        });

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

        function renderMath(target) {
            renderMathSafe(target);
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
            for (let i = stepMulai; i <= 3; i++) {
                const step = document.getElementById(`latihanStep${i}`);
                if (step) step.style.display = "none";
            }
        }

        function normalisasiInputNilai(nilai) {
            return String(nilai || "")
                .replace(/\s+/g, "")
                .toLowerCase()
                .replace(/−/g, "-")
                .trim();
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
        // LATIHAN 1
        // Drag and Drop Klasifikasi Gradien
        // =========================
        function initKlasifikasiGradien() {
            const dragItems = document.querySelectorAll(".drag-item");
            const dropZones = document.querySelectorAll(".drop-zone");
            const dragBank = document.querySelector(".drag-bank");

            if (!dragItems.length || !dropZones.length || !dragBank) return;

            dragItems.forEach((item) => {
                // =========================
                // DESKTOP DRAG
                // =========================
                item.addEventListener("dragstart", function() {
                    draggedItemGradien = this;

                    setTimeout(() => {
                        this.style.opacity = "0.5";
                    }, 0);
                });

                item.addEventListener("dragend", function() {
                    this.style.opacity = "1";
                    draggedItemGradien = null;
                });

                // =========================
                // MOBILE TAP
                // =========================
                item.addEventListener(
                    "touchstart",
                    function(e) {
                        e.preventDefault();

                        const currentZone = this.closest(".drop-zone");

                        // kalau item masih di bank
                        if (!currentZone) {
                            // cari dropzone kosong pertama
                            const emptyZone = [...dropZones].find((zone) => {
                                return (
                                    zone.querySelector(".drop-slot").children.length ===
                                    0
                                );
                            });

                            if (emptyZone) {
                                emptyZone.querySelector(".drop-slot").appendChild(this);
                            }
                        }

                        // kalau item sudah di dropzone → balik ke bank
                        else {
                            dragBank.appendChild(this);
                        }
                    }, {
                        passive: false
                    },
                );
            });
            dropZones.forEach((zone) => {
                zone.addEventListener("dragover", function(e) {
                    e.preventDefault();
                    this.classList.add("hovered");
                });

                zone.addEventListener("dragleave", function() {
                    this.classList.remove("hovered");
                });

                zone.addEventListener("drop", function(e) {
                    e.preventDefault();
                    this.classList.remove("hovered");

                    if (!draggedItemGradien) return;

                    const slot = this.querySelector(".drop-slot");
                    if (!slot) return;

                    if (slot.children.length > 0) {
                        const existingItem = slot.children[0];
                        dragBank.appendChild(existingItem);
                    }

                    slot.appendChild(draggedItemGradien);
                });
            });

            dragBank.addEventListener("dragover", function(e) {
                e.preventDefault();
            });

            dragBank.addEventListener("drop", function(e) {
                e.preventDefault();

                if (draggedItemGradien) {
                    dragBank.appendChild(draggedItemGradien);
                }
            });
        }

        function cekKlasifikasiGradien() {
            const dropZones = document.querySelectorAll(".drop-zone");
            const feedback = document.getElementById("feedbackKlasifikasiGradien");
            const nextBtn = document.getElementById("nextBtnLatihan1");

            if (!feedback) return;

            let semuaBenar = true;
            let zonaKosong = [];

            dropZones.forEach((zone) => {
                const jawabanBenar = zone.dataset.answer;
                const slot = zone.querySelector(".drop-slot");
                const item = slot?.querySelector(".drag-item");
                const judul = zone.querySelector("strong")?.innerText || "Zona";

                zone.classList.remove("correct", "wrong");

                if (!item) {
                    semuaBenar = false;
                    zonaKosong.push(judul);
                    return;
                }

                const jawabanUser = item.dataset.value;

                if (jawabanUser === jawabanBenar) {
                    zone.classList.add("correct");
                } else {
                    zone.classList.add("wrong");
                    semuaBenar = false;
                }
            });

            if (zonaKosong.length > 0) {
                feedback.innerHTML = `
            <div class="alert alert-warning mb-0">
                Masih ada pasangan yang belum diisi pada: <b>${zonaKosong.join(", ")}</b>.
            </div>
        `;

                if (nextBtn) nextBtn.disabled = true;
                resetStepSetelah(2);
                return;
            }

            if (semuaBenar) {
                feedback.innerHTML = `
            <div class="alert alert-success mb-0">
                Bagus! Semua pasangan sudah tepat. Silakan lanjut ke latihan berikutnya.
            </div>
        `;

                if (nextBtn) nextBtn.disabled = false;
            } else {
                feedback.innerHTML = `
            <div class="alert alert-danger mb-0">
                Masih ada pasangan yang belum tepat. Coba periksa lagi.
            </div>
        `;

                if (nextBtn) nextBtn.disabled = true;
                resetStepSetelah(2);
            }
        }

        function resetKlasifikasiGradien() {
            const dragBank = document.querySelector(".drag-bank");
            const dropZones = document.querySelectorAll(".drop-zone");
            const feedback = document.getElementById("feedbackKlasifikasiGradien");
            const nextBtn = document.getElementById("nextBtnLatihan1");

            if (!dragBank) return;

            dropZones.forEach((zone) => {
                zone.classList.remove("correct", "wrong", "hovered");

                const slot = zone.querySelector(".drop-slot");
                const items = slot?.querySelectorAll(".drag-item") || [];

                items.forEach((item) => {
                    dragBank.appendChild(item);
                });
            });

            if (feedback) feedback.innerHTML = "";
            if (nextBtn) nextBtn.disabled = true;

            resetStepSetelah(2);
        }

        // =========================
        // LATIHAN 2
        // Pilihan tanda Delta x dan Delta y
        // =========================
        function initOpsiLatihan2Gradien() {
            const opsi = document.querySelectorAll('.opsi-kotak[data-soal="lat2"]');
            const input = document.getElementById("lat2");

            if (!opsi.length || !input) return;

            opsi.forEach((btn) => {
                btn.addEventListener("click", function() {
                    input.value = this.dataset.value;

                    opsi.forEach((item) => {
                        item.classList.remove("active", "benar", "salah");
                    });

                    this.classList.add("active");
                });
            });
        }

        function cekLatihan2Gradien() {
            const input = document.getElementById("lat2");
            const feedback = document.getElementById("feedbackLatihan2Gradien");
            const nextBtn = document.getElementById("nextBtnLatihan2");

            if (!input || !feedback) return;

            const jawaban = input.value;

            document.querySelectorAll('.opsi-kotak[data-soal="lat2"]').forEach((el) => {
                el.classList.remove("benar", "salah");
            });

            if (!jawaban) {
                feedback.innerHTML = `
            <div class="alert alert-warning mb-0">
                Pilih salah satu jawaban terlebih dahulu.
            </div>
        `;

                if (nextBtn) nextBtn.disabled = true;
                resetStepSetelah(3);
                return;
            }

            const benar = "a";
            const tombolAktif = document.querySelector(
                `.opsi-kotak[data-soal="lat2"][data-value="${jawaban}"]`,
            );

            if (jawaban === benar) {
                if (tombolAktif) tombolAktif.classList.add("benar");

                feedback.innerHTML = `
            <div class="alert alert-success mb-0">
                Benar! Karena garis bergerak ke kanan dan ke atas, maka \\(\\Delta x\\) positif dan \\(\\Delta y\\) positif.
                Silakan lanjut ke latihan berikutnya.
            </div>
        `;

                renderMath(feedback);

                if (nextBtn) nextBtn.disabled = false;
            } else {
                if (tombolAktif) tombolAktif.classList.add("salah");

                feedback.innerHTML = `
            <div class="alert alert-danger mb-0">
                Belum tepat. Perhatikan lagi arah garis dari A ke B: bergerak ke kanan dan ke atas.
            </div>
        `;

                renderMath(feedback);

                if (nextBtn) nextBtn.disabled = true;
                resetStepSetelah(3);
            }
        }

        function resetLatihan2Gradien() {
            const input = document.getElementById("lat2");
            const feedback = document.getElementById("feedbackLatihan2Gradien");
            const nextBtn = document.getElementById("nextBtnLatihan2");

            if (input) input.value = "";

            document.querySelectorAll('.opsi-kotak[data-soal="lat2"]').forEach((el) => {
                el.classList.remove("active", "benar", "salah");
            });

            if (feedback) feedback.innerHTML = "";
            if (nextBtn) nextBtn.disabled = true;

            resetStepSetelah(3);
        }

        // =========================
        // LATIHAN 3
        // Input Delta y, Delta x, dan Gradien
        // =========================
        async function cekLatihan3Gradien() {
            const dyEl = document.getElementById("lat3_dy");
            const dxEl = document.getElementById("lat3_dx");
            const mEl = document.getElementById("lat3_m");
            const feedback = document.getElementById("feedbackLatihan3Gradien");

            if (!dyEl || !dxEl || !mEl || !feedback) return;

            const dy = normalisasiInputNilai(dyEl.value);
            const dx = normalisasiInputNilai(dxEl.value);
            const m = normalisasiInputNilai(mEl.value);

            [dyEl, dxEl, mEl].forEach((el) => {
                el.classList.remove("is-valid", "is-invalid");
            });

            if (!dy || !dx || !m) {
                feedback.innerHTML = `
            <div class="alert alert-warning mb-0">
                Semua isian harus diisi terlebih dahulu.
            </div>
        `;
                return;
            }

            let semuaBenar = true;

            const benarDy = ["-3"];
            const benarDx = ["6"];
            const benarM = ["-1/2", "-3/6"];

            if (benarDy.includes(dy)) {
                dyEl.classList.add("is-valid");
            } else {
                dyEl.classList.add("is-invalid");
                semuaBenar = false;
            }

            if (benarDx.includes(dx)) {
                dxEl.classList.add("is-valid");
            } else {
                dxEl.classList.add("is-invalid");
                semuaBenar = false;
            }

            if (benarM.includes(m)) {
                mEl.classList.add("is-valid");
            } else {
                mEl.classList.add("is-invalid");
                semuaBenar = false;
            }

            if (semuaBenar) {
                feedback.innerHTML = `
            <div class="alert alert-success mb-0">
                Benar! Dari A ke B, garis bergerak ke kanan sebanyak 6 satuan dan ke bawah sebanyak 3 satuan, sehingga
                \\[
                    \\Delta x = 6, \\quad \\Delta y = -3, \\quad m = \\frac{-3}{6} = -\\frac{1}{2}
                \\]
                Silakan lanjut ke materi berikutnya.
            </div>
        `;

                renderMath(feedback);

                const saved = await saveProgressMateri();

                if (saved) {
                    bukaNextButton();
                } else {
                    feedback.innerHTML += `
                <div class="alert alert-warning mt-2 mb-0">
                    Jawaban benar, tetapi progres belum tersimpan. Coba cek koneksi atau refresh halaman.
                </div>
            `;
                }
            } else {
                feedback.innerHTML = `
            <div class="alert alert-danger mb-0">
                Masih ada jawaban yang belum tepat. Hitung kembali banyak kotak ke kanan dan ke bawah dari titik A ke titik B.
            </div>
        `;

                renderMath(feedback);
            }
        }

        function resetLatihan3Gradien() {
            ["lat3_dy", "lat3_dx", "lat3_m"].forEach((id) => {
                const el = document.getElementById(id);

                if (el) {
                    el.value = "";
                    el.classList.remove("is-valid", "is-invalid");
                }
            });

            const feedback = document.getElementById("feedbackLatihan3Gradien");
            if (feedback) feedback.innerHTML = "";
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
