    @extends('layout.halaman-materi')

    @section('content')
        <link rel="stylesheet" href="{{ asset('css/subbabB/subbabB_gradienpersamaan.css') }}">
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
                font-size: 16px;
                border-radius: 12px;
            }

            /* Biar jarak rumus KaTeX di dalam box tidak terlalu tinggi */
            .rumus-box .katex-display {
                margin: 0.35em 0;
            }

            /* Untuk layar kecil */
            @media (max-width: 576px) {
                .rumus-box {
                    width: 100%;
                    font-size: 16px;
                    padding: 10px 12px;
                }
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

            .step-box {
                background: #f7f9fc;
                border: 1px solid #dbe5f1;
                border-radius: 14px;
                padding: 16px;
                margin-bottom: 14px;
            }

            .info-box {
                background: #eef6ff;
                border: 1px solid #cfe2ff;
                border-radius: 14px;
                padding: 14px 16px;
            }

            .context-box {
                background: #fffaf0;
                border: 1px solid #f3d9a4;
                border-radius: 14px;
                padding: 14px 16px;
            }

            .pilihan-box label {
                display: block;
                padding: 10px 12px;
                border: 1px solid #dbe5f1;
                border-radius: 10px;
                margin-bottom: 10px;
                cursor: pointer;
                background: #fff;
            }

            .pilihan-box label:hover {
                background: #f7fbff;
                border-color: #2E75B6;
            }

            .pecahan-tabel {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                min-width: 80px;
                gap: 3px;
            }

            .input-pecahan {
                width: 48px;
                height: 36px;
                text-align: center;
                border: 1px solid #b8c7db;
                border-radius: 8px;
                font-size: 16px;
                font-weight: 600;
                padding: 2px;
            }

            .garis-pecahan-kecil {
                width: 70px;
                height: 2px;
                background: #222;
            }

            /* pecahan */
            .frac,
            .frac-input {
                display: inline-flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                vertical-align: middle;
                margin: 0 4px;
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

            /* Slider */

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

            .gambar-eksplorasi-persamaan {
                display: block;
                width: 100% !important;
                max-width: 320px !important;
                height: auto !important;
                margin: 0 auto;
                border-radius: 12px;
                border: 1px solid #e5e7eb;
            }
        </style>

        <h2 class="mt-2 mb-3" style="font-weight: 600;">4. Gradien dari Persamaan Garis Lurus</h2>

        <p class="mb-3" style="line-height:1.8; text-align: justify;">
            Pada materi sebelumnya, kamu telah mempelajari cara menentukan gradien garis
            dari gambar dan dari dua titik. Gradien dapat diperoleh dengan membandingkan
            perubahan nilai \(y\) terhadap perubahan nilai \(x\).
        </p>

        <p class="mb-3" style="line-height:1.8; text-align: justify;">
            Pada bagian ini, kamu akan mempelajari cara menentukan gradien jika garis
            sudah dituliskan dalam bentuk persamaan. Sebelum mempelajari rumusnya,
            lakukan eksplorasi berikut untuk melihat hubungan antara gradien pada grafik
            dan angka yang terdapat pada persamaan garis.
        </p>

        <div class="box-eksplorasi mt-5">

            <div class="title-box">
                Eksplorasi
            </div>

            <p class="mb-3" style="line-height:1.7; text-align: justify;">
                Perhatikan Gambar 2.10. Pada gambar tersebut terdapat sebuah garis dengan persamaan
                <b>\(y=-x+4\)</b> yang melalui titik <b>A</b>, <b>B</b>, dan <b>C</b>.
            </p>

            <div class="petunjuk-mini-latihan mb-4">
                <strong>Petunjuk Pengerjaan:</strong>
                Perhatikan koordinat titik \(A\), \(B\), dan \(C\) pada grafik.
                Tentukan perubahan nilai \(x\) dan \(y\) pada ruas \(AB\) dan \(BC\),
                kemudian hitung gradien menggunakan
                \(\displaystyle m=\frac{\Delta y}{\Delta x}\).
                Setelah semua kolom terisi, klik tombol
                <strong>Cek Jawaban</strong>.
            </div>

            <div class="row g-4 align-items-start mb-3">

                {{-- Gambar di sebelah kiri --}}
                <div class="col-md-5 text-center">
                    <img class="zoomable img-fluid" src="{{ asset('img/gradien/eksplorasipersamaan.png') }}"
                        alt="Grafik garis persamaan y=-x+4"
                        style="
                width:100%;
                max-width:300px;
                height:auto;
                border-radius:12px;
                border:1px solid #e5e7eb;
            ">

                    <div class="text-muted mt-2" style="font-size:13px;">
                        <strong>Gambar 2.10</strong>
                        Grafik garis persamaan \(y=-x+4\)
                    </div>
                </div>

                {{-- Tabel di sebelah kanan --}}
                <div class="col-md-7">
                    <p class="mb-3 fw-semibold">
                        Isilah tabel berikut berdasarkan gambar yang diberikan.
                    </p>

                    <div class="table-responsive">
                        <table class="table table-bordered text-center align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th></th>
                                    <th>Ruas AB</th>
                                    <th>Ruas BC</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <th>Komponen \(\Delta x\)</th>

                                    <td>
                                        <input type="text" id="xAB"
                                            class="form-control text-center mx-auto jawaban-latihan" style="width:70px;">
                                    </td>

                                    <td>
                                        <input type="text" id="xBC"
                                            class="form-control text-center mx-auto jawaban-latihan" style="width:70px;">
                                    </td>
                                </tr>

                                <tr>
                                    <th>Komponen \(\Delta y\)</th>

                                    <td>
                                        <input type="text" id="yAB"
                                            class="form-control text-center mx-auto jawaban-latihan" style="width:70px;">
                                    </td>

                                    <td>
                                        <input type="text" id="yBC"
                                            class="form-control text-center mx-auto jawaban-latihan" style="width:70px;">
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        \(\displaystyle\frac{\Delta y}{\Delta x}\)
                                    </th>

                                    <td>
                                        <input type="text" id="mAB"
                                            class="form-control text-center mx-auto jawaban-latihan" style="width:70px;">
                                    </td>

                                    <td>
                                        <input type="text" id="mBC"
                                            class="form-control text-center mx-auto jawaban-latihan" style="width:70px;">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2 flex-wrap mb-3">
                <button type="button" class="btn btn-palet btn-sm" onclick="cekTabelEksplorasi()">
                    Cek Jawaban
                </button>

                <button type="button" class="btn btn-palet btn-sm" onclick="resetEksplorasiPersamaan()">
                    Reset
                </button>
            </div>

            <div id="feedbackTabelEksplorasi" class="mb-3"></div>

            <div class="p-3 border rounded-4 mb-3">
                <div class="fw-semibold mb-2">
                    Jawablah pertanyaan berikut.
                </div>

                <div class="mb-3">
                    <label for="q1" class="form-label">
                        1. Berdasarkan tabel, apakah nilai gradien pada ruas AB dan BC sama?
                    </label>
                    <select id="q1" class="form-select" style="max-width:260px;">
                        <option value="">-- Pilih jawaban --</option>
                        <option value="sama">Sama</option>
                        <option value="berbeda">Berbeda</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="q2" class="form-label">
                        2. Pada persamaan \(y=-x+4\), angka yang berada di depan \(x\) adalah ....
                    </label>
                    <input type="text" id="q2" class="form-control" style="max-width:120px;">
                </div>

                <div class="mb-3">
                    <label for="q3" class="form-label">
                        3. Jika hasil gradien pada tabel sama dengan angka di depan \(x\),
                        maka pada bentuk \(y=mx+c\), simbol yang menyatakan gradien adalah ....
                    </label>
                    <input type="text" id="q3" class="form-control" style="max-width:120px;">
                </div>

                <button class="btn btn-palet btn-sm" onclick="cekPertanyaanEksplorasi()">Cek Pertanyaan</button>
                <div id="feedbackPertanyaanEksplorasi" class="mt-2"></div>
            </div>
            <div id="kesimpulanEksplorasiPersamaan" class="box-kesimpulan d-none">
                <div class="alert alert-success mb-0">
                    Berdasarkan tabel, gradien pada ruas AB dan BC memiliki nilai yang sama, yaitu \(-1\).
                    Nilai tersebut sama dengan koefisien \(x\) pada persamaan \(y=-x+4\).
                    Jadi, pada bentuk \(y=mx+c\), gradien garis ditunjukkan oleh nilai \(m\).
                </div>
            </div>
        </div>

        {{-- Pengantar kontekstual --}}
        <div class="card card-materi mt-4 mb-4">
            <div class="card-body">
                <p class="mb-2" style="line-height:1.8; text-align:justify;">
                    Pada bagian sebelumnya, kita telah mempelajari bahwa gradien menunjukkan perbandingan perubahan nilai
                    <b>y</b> terhadap perubahan nilai <b>x</b>.
                </p>

                <div class="text-center my-3 rumus-sederhana">
                    $$
                    m = \frac{\Delta y}{\Delta x}
                    $$
                </div>

                <p class="mb-3" style="line-height:1.8; text-align: justify;">
                    Sekarang, kita akan mempelajari cara menentukan gradien jika sebuah garis
                    sudah dinyatakan dalam bentuk persamaan.
                </p>

                <div class="text-center my-3 rumus-sederhana">
                    $$
                    y = mx + c
                    $$
                </div>

                <p class="mb-3" style="line-height:1.8; text-align: justify;">
                    Pada bentuk tersebut, \(m\) menyatakan gradien, sedangkan \(c\) menyatakan
                    konstanta atau titik potong garis dengan sumbu-\(y\).
                </p>
            </div>
        </div>

        {{-- Bentuk y = mx --}}
        <div class="card card-materi mb-4">
            <div class="card-body">
                <span class="badge-sub">1. Bentuk Khusus: $y = mx$</span>

                <p class="mb-2" style="line-height:1.8; text-align:justify;">
                    Perhatikan persamaan berikut.
                </p>

                <div class="rumus-box text-center mb-3">
                    \[
                    y = mx
                    \]
                </div>

                <p class="mb-2" style="line-height:1.8; text-align:justify;">
                    Pada bentuk ini, huruf <b>m</b> menunjukkan gradien garis.
                    Jadi, untuk menentukan gradien, kita cukup melihat angka yang berada di depan <b>x</b>.
                </p>

                <p class="mb-2" style="line-height:1.8; text-align:justify;">
                    Contoh:
                </p>

                <ul style="line-height:1.8; text-align:justify;">
                    <li>pada persamaan $y = 3x$, gradiennya adalah 3</li>
                    <li>pada persamaan $y = -2x$, gradiennya adalah -2</li>
                    <li>pada persamaan $y = \frac{1}{2}x$, gradiennya adalah $\frac{1}{2}$</li>
                </ul>

                <p class="mt-2" style="line-height:1.8; text-align:justify;">
                    Dengan demikian, pada bentuk $y = mx$, gradien adalah koefisien di depan $x$.
                </p>
            </div>
        </div>

        {{-- Bentuk umum y = mx + c --}}
        <div class="card card-materi mt-4 mt-5">
            <div class="card-body">
                <span class="badge-sub">2. Bentuk Umum: $y = mx + c$</span>

                <p class="mb-2" style="line-height:1.8; text-align:justify;">
                    Sekarang perhatikan persamaan berikut.
                </p>

                <div class="rumus-box text-center mb-3">
                    \[
                    y = mx + c
                    \]
                </div>

                <p class="mb-0" style="line-height:1.8; text-align:justify;">
                    Sama halnya dengan perhitungan gradien pada persamaan garis $y = mx$,
                    perhitungan gradien pada garis $y = mx + c$ dilakukan dengan cara menentukan
                    nilai konstanta di depan variabel $x$.
                </p>
            </div>
        </div>

        {{-- Contoh menentukan gradien dari y = mx + c --}}
        <div class="box-contoh mt-5 mb-4">
            <div class="card-body">
                <span class="title-box">Contoh</span>

                <p class="mb-3" style="line-height:1.8; text-align: justify;">
                    Tentukan gradien dari persamaan berikut dengan mengubah ke bentuk \(y = mx + c\).
                </p>

                {{-- ===================== --}}
                {{-- CONTOH 1 (FULL WORKED) --}}
                {{-- ===================== --}}
                <div class="card border-info-subtle shadow-sm mb-4">
                    <div class="card-header bg-info-subtle fw-bold">
                        Contoh 1
                    </div>

                    <div class="card-body">

                        <p class="mb-2"><b>Tentukan gradien dari persamaan \(4y = 2x - 8\)</b></p>

                        <p style="line-height:1.8;">
                            Ubah ke bentuk \(y = mx + c\):
                        </p>

                        <div class="text-center my-3">
                            \[
                            4y = 2x - 8
                            \]
                            \[
                            y = \frac{2x - 8}{4}
                            \]
                            \[
                            y = \frac{1}{2}x - 2
                            \]
                        </div>

                        <p style="line-height:1.8;">
                            Jadi, gradien garis tersebut adalah \(m = \frac{1}{2}\).
                        </p>
                    </div>
                </div>

                {{-- ===================== --}}
                {{-- CONTOH 2 (ISIAN KOTAK) --}}
                {{-- ===================== --}}
                <div class="card border-warning-subtle shadow-sm mb-2">
                    <div class="card-header bg-warning-subtle fw-bold">
                        Contoh 2
                    </div>

                    <div class="card-body">

                        <p class="mb-3">
                            Tentukan gradien dari persamaan \(5y = 15 - 10x\).
                        </p>

                        <p class="mb-3" style="line-height:1.8; text-align: justify;">
                            Ubah persamaan ke bentuk \(y = mx + c\).
                        </p>

                        <div class="d-flex align-items-center gap-2 flex-wrap mb-3">
                            \(5y = 15 - 10x\)
                        </div>

                        {{-- STEP 1 --}}
                        <div class="d-flex align-items-center gap-2 flex-wrap mb-3">
                            <span>\(y =\)</span>

                            <div class="frac-input">
                                <div class="top">
                                    <input type="text" id="c1a" class="form-control text-center"
                                        style="width:70px;">
                                    <span>-</span>
                                    <input type="text" id="c1b" class="form-control text-center"
                                        style="width:70px;">
                                </div>

                                <div class="bottom">
                                    <input type="text" id="c1c" class="form-control text-center"
                                        style="width:70px;">
                                    <span>-</span>
                                    <input type="text" id="c1d" class="form-control text-center"
                                        style="width:70px;">
                                </div>
                            </div>
                        </div>

                        {{-- STEP 2 --}}
                        <div class="d-flex align-items-center gap-2 flex-wrap mb-3">
                            <span>\(y =\)</span>
                            <input type="text" id="c2" class="form-control text-center" style="width:100px;">
                        </div>

                        {{-- STEP 3 --}}
                        <div class="d-flex align-items-center gap-2 flex-wrap mb-4">
                            <span>\(y =\)</span>
                            <input type="text" id="c3" class="form-control text-center" style="width:100px;">
                        </div>

                        {{-- FINAL ANSWER --}}
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <span style="font-weight:600;">
                                Jadi gradien dari persamaan \(5y = 15 - 10x\) adalah
                            </span>

                            <input type="text" id="c4" class="form-control text-center" style="width:70px;">
                        </div>

                        <div class="mt-3">
                            <button class="btn btn-palet btn-sm" onclick="cekContohGradien()">
                                Cek Jawaban
                            </button>

                            <div id="fbContohGradien" class="mt-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Contoh Drag and Drop --}}
        <div class="box-contoh mt-5 mb-4">
            <div class="card-body">
                <span class="title-box">Contoh</span>

                <p style="line-height:1.8; text-align:justify;">
                    Perhatikan persamaan <b>$6y = -3x + 12$</b>. Susunlah potongan langkah berikut agar menjadi urutan yang
                    benar untuk mengubah persamaan tersebut ke bentuk <b>$y = mx + c$</b>.
                </p>

                {{-- ✅ PETUNJUK (sesuai request kamu) --}}
                <div class="petunjuk-mini-latihan mb-3">
                    <strong>Petunjuk:</strong>
                    Seret dan susun kotak langkah sesuai urutan yang benar hingga diperoleh bentuk \(y = mx + c\).
                </div>

                <div class="sort-bank mb-3" id="sortBank">
                    <div class="sort-item" draggable="true" data-step="2">$y = \frac{-3x + 12}{6}$</div>
                    <div class="sort-item" draggable="true" data-step="4">$m = -\frac{1}{2}$</div>
                    <div class="sort-item" draggable="true" data-step="1">$6y = -3x + 12$</div>
                    <div class="sort-item" draggable="true" data-step="3">$y = -\frac{1}{2}x + 2$</div>
                </div>

                <div class="step-card">
                    <div class="step-slot sort-slot" data-answer="1">Langkah awal (bentuk persamaan)</div>
                    <div class="step-slot sort-slot" data-answer="2">Operasi aljabar pertama</div>
                    <div class="step-slot sort-slot" data-answer="3">Hasil Bentuk $y = mx + c$</div>
                    <div class="step-slot sort-slot mb-0" data-answer="4">Gradien (m)</div>
                </div>

                <div class="d-flex gap-2 mt-3">
                    <button class="btn btn-palet btn-sm" onclick="cekUrutanLangkah()">Cek</button>
                    <button class="btn btn-palet btn-sm" onclick="resetUrutanLangkah()">Reset</button>
                </div>

                <div id="fbUrutanLangkah" class="mt-3"></div>
            </div>
        </div>


        {{-- Eksplorasi Bentuk Ax + By + C = 0  --}}
        <div class="box-eksplorasi mt-5 mb-4">
            <div class="card-body">
                <span class="title-box">Eksplorasi</span>

                <p class="mb-3" style="line-height:1.8; text-align:justify;">
                    Gradien garis pada bentuk <b>\(Ax + By + C = 0\)</b> dapat ditentukan dengan cara
                    mengubah persamaan tersebut ke bentuk <b>\(y = mx + c\)</b>, dengan <b>\(m\)</b>
                    adalah gradien garis.
                </p>

                <p class="petunjuk-mini-latihan mb-3" style="line-height:1.8; text-align:justify;">
                    Perhatikan langkah-langkah berikut, lalu lengkapi bagian yang kosong.
                </p>

                <div class="quiz-card p-3">

                    <p class="mb-3" style="line-height:1.8; text-align:justify;">
                        Lengkapi perubahan bentuk persamaan berikut sampai diperoleh gradiennya.
                    </p>

                    {{-- Baris awal --}}
                    <div class="row align-items-center mb-3">
                        <div class="col-md-5">
                            <div class="d-flex justify-content-start align-items-center gap-2 flex-wrap">
                                <span>\(Ax + By + C = 0\)</span>
                            </div>
                        </div>

                        <div class="col-md-7">
                        </div>
                    </div>

                    {{-- Baris 1 --}}
                    <div class="row align-items-center mb-3">
                        <div class="col-md-5">
                            <div class="d-flex justify-content-start align-items-center gap-2 flex-wrap">
                                <span>\(By + C =\)</span>
                                <input type="text" id="eks1"
                                    class="form-control form-control-sm text-center jawaban-latihan" style="width:120px;">
                            </div>
                        </div>

                        <div class="col-md-7">
                            <p class="mb-0" style="line-height:1.8; text-align:justify;">
                                Pindahkan suku \(Ax\) ke ruas kanan.
                            </p>
                        </div>
                    </div>

                    {{-- Baris 2 --}}
                    <div class="row align-items-center mb-3">
                        <div class="col-md-5">
                            <div class="d-flex justify-content-start align-items-center gap-2 flex-wrap">
                                <span>\(By =\)</span>
                                <input type="text" id="eks2"
                                    class="form-control form-control-sm text-center jawaban-latihan" style="width:140px;">
                            </div>
                        </div>

                        <div class="col-md-7">
                            <p class="mb-0" style="line-height:1.8; text-align:justify;">
                                Pindahkan suku \(C\) ke ruas kanan.
                            </p>
                        </div>
                    </div>

                    {{-- Baris 3 --}}
                    <div class="row align-items-center mb-3">
                        <div class="col-md-5">
                            <div class="d-flex justify-content-start align-items-center gap-2 flex-wrap">
                                <span>\(y=\)</span>

                                <div class="frac-input single">
                                    <div class="top">
                                        <input type="text" id="eks3atas1"
                                            class="form-control form-control-sm text-center jawaban-latihan"
                                            style="width:70px;">
                                    </div>
                                    <div class="bottom">
                                        <input type="text" id="eks3bawah1"
                                            class="form-control form-control-sm text-center jawaban-latihan"
                                            style="width:70px;">
                                    </div>
                                </div>

                                <span>\(x+\)</span>

                                <div class="frac-input single">
                                    <div class="top">
                                        <input type="text" id="eks3atas2"
                                            class="form-control form-control-sm text-center jawaban-latihan"
                                            style="width:70px;">
                                    </div>
                                    <div class="bottom">
                                        <input type="text" id="eks3bawah2"
                                            class="form-control form-control-sm text-center jawaban-latihan"
                                            style="width:70px;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-7">
                            <p class="mb-0" style="line-height:1.8; text-align:justify;">
                                Bagi kedua ruas dengan \(B\)
                            </p>
                        </div>
                    </div>

                    {{-- Baris 4 --}}
                    <div class="row align-items-center mb-3">
                        <div class="col-md-5">
                            <div class="d-flex justify-content-start align-items-center gap-2 flex-wrap">
                                <span>\(m=\)</span>

                                <div class="frac-input single">
                                    <div class="top">
                                        <input type="text" id="eks4atas"
                                            class="form-control form-control-sm text-center jawaban-latihan"
                                            style="width:70px;">
                                    </div>
                                    <div class="bottom">
                                        <input type="text" id="eks4bawah"
                                            class="form-control form-control-sm text-center jawaban-latihan"
                                            style="width:70px;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-7">
                            <p class="mb-0" style="line-height:1.8; text-align:justify;">
                                Gradiennya adalah koefisien \(x\).
                            </p>
                        </div>
                    </div>

                    <div class="d-flex gap-2 flex-wrap mt-3">
                        <button class="btn btn-palet btn-sm" onclick="cekEksplorasiGradienUmum()">
                            Cek Jawaban
                        </button>
                    </div>

                    <div id="fbEksplorasiGradienUmum" class="mt-3"></div>

                    <div id="kesimpulanEksplorasiGradienUmum" class="box-kesimpulan d-none mt-3">
                        <div class="alert alert-success mb-0">
                            Bagus! Setelah persamaan \(Ax + By + C = 0\) diubah ke bentuk \(y = mx + c\),
                            diperoleh bahwa koefisien \(x\) bernilai \(\frac{-A}{B}\).
                            Karena gradien adalah koefisien \(x\), maka gradien garis tersebut adalah
                            \(m = \frac{-A}{B}\).
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bentuk umum --}}
        <div class="card card-materi mb-4">
            <div class="card-body">
                <span class="badge-sub">3. Bentuk Umum: $Ax + By + C = 0$</span>

                <p class="mb-2" style="line-height:1.8; text-align:justify;">
                    Selain bentuk $y = mx + c$, persamaan garis lurus juga dapat dituliskan dalam bentuk umum berikut.
                </p>

                <div class="rumus-box text-center mb-3">
                    \[
                    Ax + By + C = 0
                    \]
                </div>

                <p class="mb-2" style="line-height:1.8; text-align:justify;">
                    Pada bentuk ini, gradien garis dapat ditentukan dengan rumus:
                </p>

                <div class="rumus-box text-center mb-3">
                    \[
                    m = -\frac{A}{B}
                    \]
                </div>

                <div class="info-box">
                    <p class="mb-0" style="line-height:1.8;">
                        Jadi, untuk menentukan gradien dari persamaan $Ax + By + C = 0$,
                        cukup mengambil nilai $A$ dan $B$, lalu menggunakan rumus
                        <b>$m = -\frac{A}{B}$</b>.
                    </p>
                </div>
            </div>
        </div>

        {{-- Contoh Bentuk  Ax + By + C = 0 --}}
        <div class="box-contoh mt-5 mb-4">
            <div class="card-body">
                <span class="title-box">Contoh</span>

                <p class="mb-3">
                    Diketahui persamaan garis:
                </p>

                <div class="text-center mb-3">
                    $$ 2x - 4y + 1 = 0 $$
                </div>

                <div class="card-body">

                    <p><b>Penyelesaian:</b></p>

                    <p style="line-height:1.8; text-align:justify;">
                        Dari persamaan \(2x - 4y + 1 = 0\), diperoleh: \(A = 2\) dan \(B = -4\)
                    </p>

                    <p><b>Maka:</b></p>

                    <div class="text-center my-3">
                        $$ m = -\frac{A}{B} = -\frac{2}{-4} = \frac{1}{2} $$
                    </div>

                    <p style="line-height:1.8; text-align:justify;">
                        Jadi, gradien dari persamaan \(2x - 4y + 1 = 0\) adalah \( \frac{1}{2} \).
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

        <div class="box-latihan mt-5 mb-4" id="latihanGradienB4Box">
            <div class="card-body">
                <span class="title-box">Latihan Soal</span>
                <!-- ===================== -->
                <!-- LATIHAN 1 -->
                <!-- ===================== -->
                <div class="latihan-step" id="latihanStep1">
                    <div class="context-card">
                        <p class="mb-3"><b>1.</b> Tentukan gradien dari persamaan berikut.</p>
                        <div class="petunjuk-mini-latihan">
                            <strong>Petunjuk:</strong>
                            Isilah gradien dari setiap persamaan pada kolom jawaban yang tersedia.
                        </div>

                        <div class="mb-3">
                            <label class="form-label">a. \(y=-5x+7\)</label>
                            <div class="d-flex align-items-center gap-2">
                                <span>$m =$</span>
                                <input type="text" id="lat1a" class="form-control" style="width: 80px">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">b. \(4y=10x-12\)</label>
                            <div class="d-flex align-items-center gap-2">
                                <span>$m =$</span>
                                <input type="text" id="lat1b" class="form-control" style="width: 80px">
                            </div>
                        </div>

                        <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <div>
                                <button type="button" class="btn btn-palet btn-sm" onclick="cekLatihan1Gradien()">
                                    Cek Jawaban
                                </button>

                                <button type="button" class="btn btn-palet btn-sm" onclick="resetLatihan1Gradien()">
                                    Reset
                                </button>
                            </div>

                            <button id="nextBtnLatihan1" type="button" class="btn btn-palet btn-sm"
                                onclick="nextLatihan(2)" disabled>
                                Lanjut ke Latihan 2
                            </button>
                        </div>

                        <div id="feedbackLatihan1Gradien" class="mt-3"></div>
                    </div>
                </div>

                <!-- ===================== -->
                <!-- LATIHAN 2 -->
                <!-- ===================== -->
                <div class="latihan-step" id="latihanStep2" style="display:none;">
                    <hr class="my-4">

                    <div class="context-card">
                        <p class="mb-3"><b>2.</b> Tentukan gradien dari persamaan berikut.</p>
                        <div class="petunjuk-mini-latihan">
                            <strong>Petunjuk:</strong>
                            Isilah gradien dari setiap persamaan pada kolom jawaban yang tersedia.
                        </div>

                        <div class="mb-3">
                            <label class="form-label">a. \(6x+3y-9=0\)</label>
                            <div class="d-flex align-items-center gap-2">
                                <span>$m =$</span>
                                <input type="text" id="lat2a" class="form-control" style="width: 80px">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">b. \(9x-6y+15=0\)</label>
                            <div class="d-flex align-items-center gap-2">
                                <span>$m =$</span>
                                <input type="text" id="lat2b" class="form-control" style="width: 80px">
                            </div>
                        </div>

                        <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <button type="button" class="btn btn-palet btn-sm" onclick="prevLatihan(1)">
                                Kembali ke Latihan 1
                            </button>

                            <div>
                                <button type="button" class="btn btn-palet btn-sm" onclick="cekLatihan2Gradien()">
                                    Cek Jawaban
                                </button>

                                <button type="button" class="btn btn-palet btn-sm" onclick="resetLatihan2Gradien()">
                                    Reset
                                </button>
                            </div>

                            <button id="nextBtnLatihan2" type="button" class="btn btn-palet btn-sm"
                                onclick="nextLatihan(3)" disabled>
                                Lanjut ke Latihan 3
                            </button>
                        </div>

                        <div id="feedbackLatihan2Gradien" class="mt-3"></div>
                    </div>
                </div>

                <!-- ===================== -->
                <!-- LATIHAN 3 -->
                <!-- ===================== -->
                <div class="latihan-step" id="latihanStep3" style="display:none;">
                    <hr class="my-4">

                    <div class="context-card">
                        <p class="mb-3"><b>3.</b> Perhatikan dua jalan berikut.</p>

                        <p style="line-height:1.8; text-align:justify;">
                            Jalan A dinyatakan oleh persamaan \(3y=9x+6\), sedangkan Jalan B dinyatakan oleh
                            persamaan \(4x+2y-8=0\). Nilai \(x\) menyatakan jarak mendatar dan nilai \(y\)
                            menyatakan ketinggian.
                        </p>

                        <div class="petunjuk-mini-latihan">
                            <strong>Petunjuk:</strong>
                            Isilah gradien Jalan A, gradien Jalan B, dan jalan yang lebih curam pada kolom jawaban yang
                            tersedia.
                        </div>

                        <div class="mb-3 d-flex align-items-center flex-wrap gap-2">
                            <label class="form-label mb-0">
                                Gradien Jalan A adalah
                            </label>

                            <span>$m =$</span>
                            <input type="text" id="lat3a" class="form-control" style="width:80px;">
                        </div>

                        <div class="mb-3 d-flex align-items-center flex-wrap gap-2">
                            <label class="form-label mb-0">
                                Gradien Jalan B adalah
                            </label>

                            <span>$m =$</span>
                            <input type="text" id="lat3b" class="form-control" style="width:80px;">
                        </div>

                        <div class="mb-3 d-flex align-items-center flex-wrap gap-2">
                            <label class="form-label mb-0">
                                Jalan yang lebih curam adalah
                            </label>

                            <input type="text" id="lat3c" class="form-control" style="width:150px;">
                        </div>

                        <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <button type="button" class="btn btn-palet btn-sm" onclick="prevLatihan(2)">
                                Kembali ke Latihan 2
                            </button>

                            <div>
                                <button type="button" class="btn btn-palet btn-sm" onclick="cekLatihan3Gradien()">
                                    Cek Jawaban
                                </button>

                                <button type="button" class="btn btn-palet btn-sm" onclick="resetLatihan3Gradien()">
                                    Reset
                                </button>
                            </div>
                        </div>

                        <div id="feedbackLatihan3Gradien" class="mt-3"></div>

                        <div id="pesanAkhirLatihan" class="mt-3 d-none">
                            <div class="alert alert-success fw-semibold text-center mt-3">
                                Bagus, kamu sudah memahami cara menentukan gradien dari suatu persamaan garis lurus.
                                Silakan lanjut ke kuis subbab B.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // =========================
            // HELPER GLOBAL
            // =========================
            function norm(teks, opsi = {}) {
                const {
                    decimal = false,
                        hapusKurung = true,
                } = opsi;

                let hasil = String(teks || "")
                    .trim()
                    .toLowerCase()
                    .replace(/−/g, "-")
                    .replace(/\s+/g, "")
                    .replace(/\*/g, "");

                if (decimal) {
                    hasil = hasil.replace(",", ".");
                }

                if (hapusKurung) {
                    hasil = hasil.replace(/[(){}[\]]/g, "");
                }

                return hasil;
            }

            function renderMath(target = document.body) {
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
                    throwOnError: false,
                });
            }

            // =========================
            // EKSPLORASI GRADIEN DARI PERSAMAAN
            // =========================
            function cekIsianLokal(id, jawabanBenar) {
                const el = document.getElementById(id);
                if (!el) return false;

                const nilai = norm(el.value);
                const daftar = Array.isArray(jawabanBenar) ? jawabanBenar : [jawabanBenar];
                const cocok = daftar.map((item) => norm(item)).includes(nilai);

                el.classList.remove("is-valid", "is-invalid");
                el.classList.add(cocok ? "is-valid" : "is-invalid");

                return cocok;
            }

            function isiPesanLokal(id, pesan, tipe = "info") {
                const el = document.getElementById(id);
                if (!el) return;

                const kelas =
                    tipe === "success" ?
                    "alert-success" :
                    tipe === "warning" || tipe === "danger" ?
                    "alert-danger" :
                    "alert-info";

                const judul =
                    tipe === "success" ?
                    "<strong>Benar.</strong><br>" :
                    tipe === "warning" || tipe === "danger" ?
                    "<strong>Belum tepat.</strong><br>" :
                    "";

                el.innerHTML = `
        <div class="alert ${kelas} py-2 mb-0">
            ${judul}${pesan}
        </div>
    `;

                renderMath(el);
            }

            function kosongkanLokal(id) {
                const el = document.getElementById(id);
                if (el) el.innerHTML = "";
            }

            function cekTabelEksplorasi() {
                const benarXAB = cekIsianLokal("xAB", ["1"]);
                const benarXBC = cekIsianLokal("xBC", ["2"]);
                const benarYAB = cekIsianLokal("yAB", ["-1"]);
                const benarYBC = cekIsianLokal("yBC", ["-2"]);
                const benarMAB = cekIsianLokal("mAB", ["-1", "-1/1"]);
                const benarMBC = cekIsianLokal("mBC", ["-1", "-2/2"]);

                let pesan = [];

                if (!benarXAB || !benarXBC) {
                    pesan.push("Perubahan \\(x\\) masih ada yang belum tepat.");
                }

                if (!benarYAB || !benarYBC) {
                    pesan.push("Perubahan \\(y\\) masih ada yang belum tepat.");
                }

                if (!benarMAB || !benarMBC) {
                    pesan.push("Nilai perbandingan \\(\\frac{\\Delta y}{\\Delta x}\\) masih ada yang belum tepat.");
                }

                if (benarXAB && benarXBC && benarYAB && benarYBC && benarMAB && benarMBC) {
                    isiPesanLokal(
                        "feedbackTabelEksplorasi",
                        "Bagus, seluruh isian pada tabel sudah benar.",
                        "success"
                    );
                    return;
                }

                isiPesanLokal("feedbackTabelEksplorasi", pesan.join("<br>"), "warning");
            }

            function cekPertanyaanEksplorasi() {
                const q1 = document.getElementById("q1");
                const kesimpulan = document.getElementById("kesimpulanEksplorasiPersamaan");

                let benarQ1 = false;

                if (q1) {
                    q1.classList.remove("is-valid", "is-invalid");
                    benarQ1 = q1.value === "sama";
                    q1.classList.add(benarQ1 ? "is-valid" : "is-invalid");
                }

                // q2: angka di depan x pada y = -x + 4 adalah -1
                const benarQ2 = cekIsianLokal("q2", ["-1", "-1/1"]);

                // q3: simbol gradien pada y = mx + c adalah m
                const benarQ3 = cekIsianLokal("q3", ["m"]);

                if (benarQ1 && benarQ2 && benarQ3) {
                    isiPesanLokal(
                        "feedbackPertanyaanEksplorasi",
                        "Bagus, jawaban pertanyaan kesimpulanmu sudah benar.",
                        "success"
                    );

                    if (kesimpulan) kesimpulan.classList.remove("d-none");
                    return;
                }

                isiPesanLokal(
                    "feedbackPertanyaanEksplorasi",
                    "Masih ada jawaban yang belum tepat. Bandingkan nilai gradien pada tabel dengan angka di depan \\(x\\) pada persamaan \\(y=-x+4\\), lalu hubungkan dengan bentuk \\(y=mx+c\\).",
                    "warning"
                );

                if (kesimpulan) kesimpulan.classList.add("d-none");
            }

            function resetEksplorasiPersamaan() {
                ["xAB", "xBC", "yAB", "yBC", "mAB", "mBC", "q2", "q3"].forEach((id) => {
                    const el = document.getElementById(id);
                    if (el) {
                        el.value = "";
                        el.classList.remove("is-valid", "is-invalid");
                    }
                });

                const q1 = document.getElementById("q1");
                if (q1) {
                    q1.value = "";
                    q1.classList.remove("is-valid", "is-invalid");
                }

                kosongkanLokal("feedbackTabelEksplorasi");
                kosongkanLokal("feedbackPertanyaanEksplorasi");

                const kesimpulan = document.getElementById("kesimpulanEksplorasiPersamaan");
                if (kesimpulan) kesimpulan.classList.add("d-none");
            }

            document.addEventListener("DOMContentLoaded", function() {
                initKlikKoefisien();
                initUrutanLangkah();
                initMatching();
            });

            function alertSuccess(text) {
                return `<div class="alert alert-success mb-0" style="border-radius:14px;">${text}</div>`;
            }

            function alertDanger(text) {
                return `<div class="alert alert-danger mb-0" style="border-radius:14px;">${text}</div>`;
            }

            function alertInfo(text) {
                return `<div class="alert alert-info mb-0" style="border-radius:14px;">${text}</div>`;
            }

            function resetExprState(items) {
                items.forEach((item) =>
                    item.classList.remove("expr-correct", "expr-wrong"),
                );
            }

            // HELPER setValid
            function setValid(id, benar) {
                const el = document.getElementById(id);
                if (!el) return;

                el.classList.remove("is-valid", "is-invalid");
                el.classList.add(benar ? "is-valid" : "is-invalid");
            }

            function clearValid(ids) {
                ids.forEach((id) => {
                    const el = document.getElementById(id);
                    if (el) el.classList.remove("is-valid", "is-invalid");
                });
            }


            // Contoh y=mx+c
            function cekContohGradien() {

                clearValid(["c1a", "c1b", "c1c", "c1d", "c2", "c3", "c4"]);

                const c1a = document.getElementById("c1a").value.trim();
                const c1b = document.getElementById("c1b").value.trim();
                const c1c = document.getElementById("c1c").value.trim();
                const c1d = document.getElementById("c1d").value.trim();

                const c2 = document.getElementById("c2").value.trim();
                const c3 = document.getElementById("c3").value.trim();
                const c4 = document.getElementById("c4").value.trim();

                const benarC1 =
                    (c1a === "15" || c1a === "15/5") &&
                    (c1b === "10x") &&
                    (c1c === "5") &&
                    (c1d === "5");

                const benarC2 = (c2 === "3-2x" || c2 === "-2x+3");
                const benarC3 = (c3 === "-2x+3");
                const benarC4 = (c4 === "-2");

                setValid("c1a", c1a === "15" || c1a === "15/5");
                setValid("c1b", c1b === "10x");
                setValid("c1c", c1c === "5");
                setValid("c1d", c1d === "5");

                setValid("c2", benarC2);
                setValid("c3", benarC3);
                setValid("c4", benarC4);

                const fb = document.getElementById("fbContohGradien");

                if (benarC1 && benarC2 && benarC3 && benarC4) {
                    fb.innerHTML = `
            <div class="alert alert-success mb-0">
                Benar. Gradiennya adalah -2.
            </div>
        `;
                } else {
                    fb.innerHTML = `
                    <div class="alert alert-danger mb-0">
                        Masih ada langkah yang belum tepat. Periksa pembagian setiap suku.
                    </div>
                    `;
                }
            }

            // Eksplorasi Ax + By + C = 0

            function cekEksplorasiGradienUmum() {

                clearValid([
                    "eks1",
                    "eks2",
                    "eks3atas1",
                    "eks3bawah1",
                    "eks3atas2",
                    "eks3bawah2",
                    "eks4atas",
                    "eks4bawah"
                ]);

                const eks1 = norm(document.getElementById("eks1").value);
                const eks2 = norm(document.getElementById("eks2").value);

                const eks3atas1 = norm(document.getElementById("eks3atas1").value);
                const eks3bawah1 = norm(document.getElementById("eks3bawah1").value);
                const eks3atas2 = norm(document.getElementById("eks3atas2").value);
                const eks3bawah2 = norm(document.getElementById("eks3bawah2").value);

                const eks4atas = norm(document.getElementById("eks4atas").value);
                const eks4bawah = norm(document.getElementById("eks4bawah").value);

                const feedback = document.getElementById("fbEksplorasiGradienUmum");
                const kesimpulan = document.getElementById("kesimpulanEksplorasiGradienUmum");

                const benar1 = eks1 === "-ax";

                const benar2 =
                    eks2 === "-ax-c" ||
                    eks2 === "-c-ax";

                const benar3 =
                    eks3atas1 === "-a" &&
                    eks3bawah1 === "b" &&
                    eks3atas2 === "-c" &&
                    eks3bawah2 === "b";

                const benar4 =
                    eks4atas === "-a" &&
                    eks4bawah === "b";

                // =========================
                // SET VALID PER INPUT
                // =========================
                setValid("eks1", benar1);
                setValid("eks2", benar2);

                setValid("eks3atas1", eks3atas1 === "-a");
                setValid("eks3bawah1", eks3bawah1 === "b");
                setValid("eks3atas2", eks3atas2 === "-c");
                setValid("eks3bawah2", eks3bawah2 === "b");

                setValid("eks4atas", eks4atas === "-a");
                setValid("eks4bawah", eks4bawah === "b");

                // =========================
                // FEEDBACK
                // =========================
                if (benar1 && benar2 && benar3 && benar4) {

                    feedback.innerHTML = "";
                    kesimpulan.classList.remove("d-none");

                } else {

                    let pesan = `
            <div class="alert alert-danger mb-0">
                <b>Masih ada yang perlu diperbaiki.</b>
                <ul class="mb-0 mt-2">
        `;

                    if (!benar1) {
                        pesan += `<li>Periksa kembali perpindahan suku \(Ax\) ke ruas kanan.</li>`;
                    }

                    if (!benar2) {
                        pesan += `<li>Periksa kembali perpindahan suku \(C\) ke ruas kanan.</li>`;
                    }

                    if (!benar3) {
                        pesan += `<li>Periksa pembagian setiap suku dengan \(B\). Tanda negatif masuk ke pembilang.</li>`;
                    }

                    if (!benar4) {
                        pesan += `<li>Periksa koefisien \(x\) pada bentuk \(y = mx + c\).</li>`;
                    }

                    pesan += `
                </ul>
            </div>
        `;

                    feedback.innerHTML = pesan;
                    kesimpulan.classList.add("d-none");
                }

                // =========================
                // RENDER MATH
                // =========================
                if (window.renderMathInElement) {
                    renderMathInElement(feedback, {
                        delimiters: [{
                                left: "\\(",
                                right: "\\)",
                                display: false
                            },
                            {
                                left: "\\[",
                                right: "\\]",
                                display: true
                            },
                            {
                                left: "$",
                                right: "$",
                                display: false
                            },
                            {
                                left: "$$",
                                right: "$$",
                                display: true
                            }
                        ],
                        throwOnError: false
                    });

                    renderMathInElement(kesimpulan, {
                        delimiters: [{
                                left: "\\(",
                                right: "\\)",
                                display: false
                            },
                            {
                                left: "\\[",
                                right: "\\]",
                                display: true
                            },
                            {
                                left: "$",
                                right: "$",
                                display: false
                            },
                            {
                                left: "$$",
                                right: "$$",
                                display: true
                            }
                        ],
                        throwOnError: false
                    });
                }
            }


            function resetEksplorasiGradienUmum() {

                const ids = [
                    "eks1",
                    "eks2",
                    "eks3atas1",
                    "eks3bawah1",
                    "eks3atas2",
                    "eks3bawah2",
                    "eks4atas",
                    "eks4bawah"
                ];

                clearValid(ids);

                ids.forEach((id) => {
                    const el = document.getElementById(id);
                    if (el) el.value = "";
                });

                const feedback = document.getElementById("fbEksplorasiGradienUmum");
                const kesimpulan = document.getElementById("kesimpulanEksplorasiGradienUmum");

                if (feedback) feedback.innerHTML = "";
                if (kesimpulan) kesimpulan.classList.add("d-none");
            }

            // Contoh Persamaan Ax + By + C = 0
            function cekGradien() {
                let atas = document.getElementById("gradAtas").value.trim();
                let bawah = document.getElementById("gradBawah").value.trim();

                if (atas == "1" && bawah == "2") {
                    document.getElementById("fbGradien").innerHTML =
                        "Benar! Gradiennya adalah 1/2.";

                    document.getElementById("pembahasanGradien").classList.remove("d-none");
                } else {
                    document.getElementById("fbGradien").innerHTML =
                        "Coba lagi. Ingat rumus m = -A/B dan sederhanakan pecahannya<br>Perhatikan tanda negatif pada rumus gradien";
                }
            }

            /* =========================
            CONTOH 2: SUSUN LANGKAH
            ========================= */

            let draggedItemUrutan = null;

            document.addEventListener("DOMContentLoaded", function() {
                initUrutanLangkah();

                const box = document.querySelector(".box-contoh");
                if (box) renderMath(box);
            });

            function getDefaultSlotText(index) {
                const defaults = [
                    "Letakkan langkah pertama di sini",
                    "Letakkan langkah berikutnya di sini",
                    "Letakkan langkah berikutnya di sini",
                    "Letakkan kesimpulan di sini",
                ];

                return defaults[index] || "Letakkan langkah di sini";
            }

            function initUrutanLangkah() {
                const items = document.querySelectorAll("#sortBank .sort-item");
                const slots = document.querySelectorAll(".sort-slot");
                const bank = document.getElementById("sortBank");

                if (!items.length || !slots.length || !bank) return;

                items.forEach((item) => {
                    item.addEventListener("dragstart", function(e) {
                        draggedItemUrutan = this;

                        e.dataTransfer.setData("text/plain", this.dataset.step);

                        setTimeout(() => {
                            this.style.opacity = "0.5";
                        }, 0);
                    });

                    item.addEventListener("dragend", function() {
                        this.style.opacity = "1";
                        draggedItemUrutan = null;
                    });

                    // MOBILE: tap item
                    item.addEventListener("touchstart", function(e) {
                        e.preventDefault();

                        const currentSlot = this.closest(".sort-slot");

                        // Kalau item masih di bank, masukkan ke slot kosong pertama
                        if (!currentSlot) {
                            const emptySlot = [...slots].find((slot) => {
                                return !slot.querySelector(".sort-item");
                            });

                            if (emptySlot) {
                                emptySlot.innerHTML = "";
                                emptySlot.dataset.filled = this.dataset.step;
                                emptySlot.appendChild(this);
                                emptySlot.classList.remove("correct", "wrong", "hovered");
                            }
                        }

                        // Kalau item sudah di slot, kembalikan ke bank
                        else {
                            const indexSlot = [...slots].indexOf(currentSlot);

                            bank.appendChild(this);

                            delete currentSlot.dataset.filled;
                            currentSlot.innerHTML = getDefaultSlotText(indexSlot);
                            currentSlot.classList.remove("correct", "wrong", "hovered");
                        }
                    }, {
                        passive: false
                    });
                });

                slots.forEach((slot) => {
                    slot.addEventListener("dragover", function(e) {
                        e.preventDefault();
                        this.classList.add("hovered");
                    });

                    slot.addEventListener("dragleave", function() {
                        this.classList.remove("hovered");
                    });

                    slot.addEventListener("drop", function(e) {
                        e.preventDefault();
                        this.classList.remove("hovered");

                        if (!draggedItemUrutan) return;

                        const oldSlot = draggedItemUrutan.closest(".sort-slot");

                        // Kalau item berasal dari slot lama, kembalikan teks placeholder slot lama
                        if (oldSlot && oldSlot !== this) {
                            const oldIndex = [...slots].indexOf(oldSlot);
                            oldSlot.innerHTML = getDefaultSlotText(oldIndex);
                            oldSlot.classList.remove("correct", "wrong", "hovered");
                            delete oldSlot.dataset.filled;
                        }

                        // Kalau slot tujuan sudah berisi item, balikin item lama ke bank
                        const existingItem = this.querySelector(".sort-item");
                        if (existingItem && existingItem !== draggedItemUrutan) {
                            bank.appendChild(existingItem);
                        }

                        this.innerHTML = "";
                        this.dataset.filled = draggedItemUrutan.dataset.step;
                        this.appendChild(draggedItemUrutan);
                        this.classList.remove("correct", "wrong");
                    });
                });

                // Desktop: item bisa dikembalikan ke bank
                bank.addEventListener("dragover", function(e) {
                    e.preventDefault();
                });

                bank.addEventListener("drop", function(e) {
                    e.preventDefault();

                    if (!draggedItemUrutan) return;

                    const oldSlot = draggedItemUrutan.closest(".sort-slot");

                    if (oldSlot) {
                        const indexSlot = [...slots].indexOf(oldSlot);
                        oldSlot.innerHTML = getDefaultSlotText(indexSlot);
                        oldSlot.classList.remove("correct", "wrong", "hovered");
                        delete oldSlot.dataset.filled;
                    }

                    bank.appendChild(draggedItemUrutan);
                });
            }

            function cekUrutanLangkah() {
                const slots = document.querySelectorAll(".sort-slot");
                const fb = document.getElementById("fbUrutanLangkah");

                if (!fb) return;

                let benar = 0;
                let terisi = 0;

                slots.forEach((slot) => {
                    slot.classList.remove("correct", "wrong");

                    const item = slot.querySelector(".sort-item");
                    const jawabanUser = item?.dataset.step;

                    if (item) terisi++;

                    if (jawabanUser === slot.dataset.answer) {
                        slot.classList.add("correct");
                        benar++;
                    } else {
                        slot.classList.add("wrong");
                    }
                });

                if (terisi < 4) {
                    fb.innerHTML = `
                <div class="alert alert-danger mb-0">
                    Masih ada langkah yang belum diisi. Susun semua potongan langkah terlebih dahulu.
                </div>
            `;
                } else if (benar === 4) {
                    fb.innerHTML = `
                <div class="alert alert-success mb-0">
                    <strong>Benar.</strong><br>
                    Urutan langkah sudah tepat.
                    Dari persamaan $6y = -3x + 12$ diperoleh:
                    <div class="text-center my-2">
                        $y = \\frac{-3x + 12}{6} = -\\frac{1}{2}x + 2$
                    </div>
                    Jadi, gradiennya adalah $m = -\\frac{1}{2}$.
                </div>
            `;
                } else {
                    fb.innerHTML = `
                <div class="alert alert-danger mb-0">
                    Masih ada urutan yang belum tepat.
                    Ingat, persamaan harus diubah dulu ke bentuk $y = mx + c$ sebelum gradien ditentukan.
                </div>
            `;
                }

                renderMath(fb);
            }

            function resetUrutanLangkah() {
                const slots = document.querySelectorAll(".sort-slot");
                const bank = document.getElementById("sortBank");
                const fb = document.getElementById("fbUrutanLangkah");

                if (!bank) return;

                slots.forEach((slot, index) => {
                    const item = slot.querySelector(".sort-item");

                    if (item) {
                        bank.appendChild(item);
                    }

                    slot.classList.remove("correct", "wrong", "hovered");
                    delete slot.dataset.filled;
                    slot.innerHTML = getDefaultSlotText(index);
                });

                if (fb) fb.innerHTML = "";
            }


            // Latihan Soal
            // =========================
            // LATIHAN SOAL SUBBAB B4
            // Akhir Subbab B: buka tombol Kuis
            // =========================

            document.addEventListener("DOMContentLoaded", function() {
                renderMath(
                    document.getElementById("latihanGradienB4Box") || document.body,
                );

                restoreProgressB4();
            });

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
            // SAVE PROGRESS + BUKA KUIS
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
                    console.log("Simpan latihan B4:", data);

                    return response.ok;
                } catch (error) {
                    console.error("Gagal menyimpan latihan B4:", error);
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
            // simpan jawaban latihan
            function ambilJawabanLatihan1B4() {
                return {
                    lat1a: document.getElementById("lat1a")?.value.trim() ?? "",
                    lat1b: document.getElementById("lat1b")?.value.trim() ?? "",
                };
            }

            function ambilJawabanLatihan2B4() {
                return {
                    lat2a: document.getElementById("lat2a")?.value.trim() ?? "",
                    lat2b: document.getElementById("lat2b")?.value.trim() ?? "",
                };
            }

            function ambilJawabanLatihan3B4() {
                return {
                    lat3a: document.getElementById("lat3a")?.value.trim() ?? "",
                    lat3b: document.getElementById("lat3b")?.value.trim() ?? "",
                    lat3c: document.getElementById("lat3c")?.value.trim() ?? "",
                };
            }

            // =========================
            // LATIHAN 1
            // =========================
            async function cekLatihan1Gradien() {
                const a = norm(document.getElementById("lat1a")?.value);
                const b = norm(document.getElementById("lat1b")?.value);

                const fb = document.getElementById("feedbackLatihan1Gradien");
                const nextBtn = document.getElementById("nextBtnLatihan1");

                if (!fb) return;

                clearValid(["lat1a", "lat1b"]);

                const benarA = a === "-5" || a === "-5/1";
                const benarB = b === "5/2";

                setValid("lat1a", benarA);
                setValid("lat1b", benarB);

                if (benarA && benarB) {
                    fb.innerHTML = `
                <div class="alert alert-success mb-0">
                    Bagus. Jawabanmu benar. Silakan lanjut ke latihan berikutnya.
                </div>
            `;

                    if (nextBtn) nextBtn.disabled = false;
                    await simpanProgressLatihan(
                        `${MATERI_SLUG}_L1`,
                        "input",
                        ambilJawabanLatihan1B4(),
                        true
                    );
                } else {
                    let pesan = `
                <div class="alert alert-danger mb-0">
                    <b>Masih ada yang perlu diperbaiki.</b>
                    <ul class="mb-0 mt-2">
            `;

                    if (!benarA) {
                        pesan += `<li>Soal a: gradien pada bentuk \\(y=mx+c\\) adalah koefisien di depan \\(x\\).</li>`;
                    }

                    if (!benarB) {
                        pesan += `<li>Soal b: ubah dulu ke bentuk \\(y=mx+c\\), lalu sederhanakan koefisien \\(x\\).</li>`;
                    }

                    pesan += `
                    </ul>
                </div>
            `;

                    fb.innerHTML = pesan;

                    if (nextBtn) nextBtn.disabled = true;
                    resetStepSetelah(2);
                }

                renderMath(fb);
            }

            function resetLatihan1Gradien() {
                ["lat1a", "lat1b"].forEach((id) => {
                    const el = document.getElementById(id);
                    if (el) {
                        el.value = "";
                        el.classList.remove("is-valid", "is-invalid");
                    }
                });

                const fb = document.getElementById("feedbackLatihan1Gradien");
                const nextBtn = document.getElementById("nextBtnLatihan1");

                if (fb) fb.innerHTML = "";
                if (nextBtn) nextBtn.disabled = true;

                resetStepSetelah(2);
            }

            // =========================
            // LATIHAN 2
            // =========================
            async function cekLatihan2Gradien() {
                const a = norm(document.getElementById("lat2a")?.value);
                const b = norm(document.getElementById("lat2b")?.value);

                const fb = document.getElementById("feedbackLatihan2Gradien");
                const nextBtn = document.getElementById("nextBtnLatihan2");

                if (!fb) return;

                clearValid(["lat2a", "lat2b"]);

                const benarA = a === "-2" || a === "-2/1";
                const benarB = b === "3/2";

                setValid("lat2a", benarA);
                setValid("lat2b", benarB);

                if (benarA && benarB) {
                    fb.innerHTML = `
                <div class="alert alert-success mb-0">
                    Bagus. Jawabanmu benar. Silakan lanjut ke latihan berikutnya.
                </div>
            `;

                    if (nextBtn) nextBtn.disabled = false;
                    await simpanProgressLatihan(
                        `${MATERI_SLUG}_L2`,
                        "input",
                        ambilJawabanLatihan2B4(),
                        true
                    );
                } else {
                    let pesan = `
                <div class="alert alert-danger mb-0">
                    <b>Masih ada yang perlu diperbaiki.</b>
                    <ul class="mb-0 mt-2">
            `;

                    if (!benarA) {
                        pesan +=
                            `<li>Soal a: gunakan hubungan gradien pada bentuk umum atau ubah dulu ke bentuk \\(y=mx+c\\).</li>`;
                    }

                    if (!benarB) {
                        pesan += `<li>Soal b: perhatikan tanda koefisien \\(y\\), lalu sederhanakan hasil pecahannya.</li>`;
                    }

                    pesan += `
                    </ul>
                </div>
            `;

                    fb.innerHTML = pesan;

                    if (nextBtn) nextBtn.disabled = true;
                    resetStepSetelah(3);
                }

                renderMath(fb);
            }

            function resetLatihan2Gradien() {
                ["lat2a", "lat2b"].forEach((id) => {
                    const el = document.getElementById(id);
                    if (el) {
                        el.value = "";
                        el.classList.remove("is-valid", "is-invalid");
                    }
                });

                const fb = document.getElementById("feedbackLatihan2Gradien");
                const nextBtn = document.getElementById("nextBtnLatihan2");

                if (fb) fb.innerHTML = "";
                if (nextBtn) nextBtn.disabled = true;

                resetStepSetelah(3);
            }

            // =========================
            // LATIHAN 3
            // =========================
            async function cekLatihan3Gradien() {
                const a = norm(document.getElementById("lat3a")?.value);
                const b = norm(document.getElementById("lat3b")?.value);
                const c = norm(document.getElementById("lat3c")?.value);

                const fb = document.getElementById("feedbackLatihan3Gradien");
                const akhir = document.getElementById("pesanAkhirLatihan");

                if (!fb) return;

                clearValid(["lat3a", "lat3b", "lat3c"]);

                const benarA = a === "3" || a === "3/1";
                const benarB = b === "-2" || b === "-2/1";
                const benarC = c === "jalana" || c === "jalana." || c === "a";

                setValid("lat3a", benarA);
                setValid("lat3b", benarB);
                setValid("lat3c", benarC);

                if (benarA && benarB && benarC) {
                    fb.innerHTML = `
            <div class="alert alert-success mb-0">
                Bagus. Jawabanmu benar.
            </div>
        `;

                    if (akhir) {
                        akhir.classList.remove("d-none");
                        renderMath(akhir);
                    }

                    await simpanProgressLatihan(
                        `${MATERI_SLUG}_L3`,
                        "input",
                        ambilJawabanLatihan3B4(),
                        true
                    );

                    const saved = await saveProgressMateri();

                    if (saved) {
                        bukaQuizButton();
                    } else if (akhir) {
                        akhir.insertAdjacentHTML(
                            "beforeend",
                            `
                <div class="alert alert-danger mb-0">
                    Jawaban benar, tetapi progres belum tersimpan. Coba cek koneksi atau refresh halaman.
                </div>
                `,
                        );
                    }
                } else {
                    let pesan = `
                <div class="alert alert-danger mb-0">
                    <b>Masih ada yang perlu diperbaiki.</b>
                    <ul class="mb-0 mt-2">
            `;

                    if (!benarA) {
                        pesan += `<li>Jalan A: ubah dulu persamaan sehingga \\(y\\) berada sendiri di ruas kiri.</li>`;
                    }

                    if (!benarB) {
                        pesan +=
                            `<li>Jalan B: tentukan gradien dari bentuk umum dengan memperhatikan koefisien \\(x\\) dan \\(y\\).</li>`;
                    }

                    if (!benarC) {
                        pesan +=
                            `<li>Bandingkan nilai mutlak gradien kedua jalan untuk menentukan jalan yang lebih curam.</li>`;
                    }

                    pesan += `
                    </ul>
                </div>
            `;
                    fb.innerHTML = pesan;
                    if (akhir) akhir.classList.add("d-none");
                }
                renderMath(fb);
            }

            function resetLatihan3Gradien() {
                ["lat3a", "lat3b", "lat3c"].forEach((id) => {
                    const el = document.getElementById(id);
                    if (el) {
                        el.value = "";
                        el.classList.remove("is-valid", "is-invalid");
                    }
                });

                const fb = document.getElementById("feedbackLatihan3Gradien");
                const akhir = document.getElementById("pesanAkhirLatihan");

                if (fb) fb.innerHTML = "";
                if (akhir) akhir.classList.add("d-none");
            }

            function ambilSavedJawabanB4(latihanKey) {
                const saved = SAVED_LATIHAN?.[latihanKey]?.jawaban;

                if (!saved) return null;

                if (typeof saved === "string") {
                    try {
                        return JSON.parse(saved);
                    } catch (error) {
                        console.error("Jawaban tersimpan gagal dibaca:", error);
                        return null;
                    }
                }

                return saved;
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

            function restoreLatihan1B4() {
                const saved = ambilSavedJawabanB4(`${MATERI_SLUG}_L1`);

                if (!saved) return;

                setValueSafe("lat1a", saved.lat1a);
                setValueSafe("lat1b", saved.lat1b);

                beriValid(["lat1a", "lat1b"]);

                const fb = document.getElementById("feedbackLatihan1Gradien");
                const nextBtn = document.getElementById("nextBtnLatihan1");
                const latihan2 = document.getElementById("latihanStep2");

                if (fb) {
                    fb.innerHTML = `
                <div class="alert alert-success mb-0">
                    Jawaban Latihan 1 sudah tersimpan.
                </div>
            `;
                }

                if (nextBtn) nextBtn.disabled = false;
                if (latihan2) latihan2.style.display = "block";
            }

            function restoreLatihan2B4() {
                const saved = ambilSavedJawabanB4(`${MATERI_SLUG}_L2`);

                if (!saved) return;

                setValueSafe("lat2a", saved.lat2a);
                setValueSafe("lat2b", saved.lat2b);

                beriValid(["lat2a", "lat2b"]);

                const fb = document.getElementById("feedbackLatihan2Gradien");
                const nextBtn = document.getElementById("nextBtnLatihan2");
                const latihan2 = document.getElementById("latihanStep2");
                const latihan3 = document.getElementById("latihanStep3");

                if (fb) {
                    fb.innerHTML = `
                <div class="alert alert-success mb-0">
                    Jawaban Latihan 2 sudah tersimpan.
                </div>
            `;
                }

                if (latihan2) latihan2.style.display = "block";
                if (latihan3) latihan3.style.display = "block";
                if (nextBtn) nextBtn.disabled = false;
            }

            function restoreLatihan3B4() {
                const saved = ambilSavedJawabanB4(`${MATERI_SLUG}_L3`);

                if (!saved) return;

                setValueSafe("lat3a", saved.lat3a);
                setValueSafe("lat3b", saved.lat3b);
                setValueSafe("lat3c", saved.lat3c);

                beriValid(["lat3a", "lat3b", "lat3c"]);

                const latihan2 = document.getElementById("latihanStep2");
                const latihan3 = document.getElementById("latihanStep3");
                const fb = document.getElementById("feedbackLatihan3Gradien");
                const akhir = document.getElementById("pesanAkhirLatihan");

                if (latihan2) latihan2.style.display = "block";
                if (latihan3) latihan3.style.display = "block";

                if (fb) {
                    fb.innerHTML = `
                <div class="alert alert-success mb-0">
                    Jawaban Latihan 3 sudah tersimpan.
                </div>
            `;
                }

                if (akhir) {
                    akhir.classList.remove("d-none");
                }

                bukaQuizButton();
            }

            function restoreProgressB4() {
                restoreLatihan1B4();
                restoreLatihan2B4();
                restoreLatihan3B4();

                if (IS_MATERI_COMPLETED) {
                    const latihan2 = document.getElementById("latihanStep2");
                    const latihan3 = document.getElementById("latihanStep3");
                    const nextBtn1 = document.getElementById("nextBtnLatihan1");
                    const nextBtn2 = document.getElementById("nextBtnLatihan2");

                    if (latihan2) latihan2.style.display = "block";
                    if (latihan3) latihan3.style.display = "block";
                    if (nextBtn1) nextBtn1.disabled = false;
                    if (nextBtn2) nextBtn2.disabled = false;

                    bukaQuizButton();
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
