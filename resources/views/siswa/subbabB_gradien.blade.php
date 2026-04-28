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
    </style>

    {{-- Judul --}}
    <h1 class="mb-3" style="font-weight: 600;">B. Gradien (Kemiringan Garis)</h1>

    {{-- Tujuan Pembelajaran --}}
    <div class="card card-tujuan mb-4">
        <div class="card-body">
            <h5>Tujuan Pembelajaran:</h5>
            <ol>
                <li>Siswa dapat menentukan Kemiringan Garis Lurus</li>
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

        <div id="papan-canvas" class="mb-3"></div>

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

    {{-- <div id="lanjutanGradien" style="display:none;"> --}}

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
        <div class="card-body p-4">
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
                            <img src="{{ asset('img/gradien/contohgradienpositif.png') }}" alt="Contoh gradien positif"
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
                            <img src="{{ asset('img/gradien/contohgradiennegatif.png') }}" alt="Contoh gradien positif"
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
        <div class="card-body p-4">
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

                <div id="feedbackLatihan3Gradien" class="mt-3"></div>
            </div>
        </div>
    </div>

    {{-- </div> --}}
    <script src="https://cdn.jsdelivr.net/npm/p5@1.9.0/lib/p5.min.js"></script>
    <script src="{{ asset('js/subbabB/eksplorasi_papan.js') }}"></script>
    <script src="{{ asset('js/subbabB/subbabB_gradien.js') }}"></script>

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
