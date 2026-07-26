@extends('layout.halaman-materi')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/subbabC/subbabC_garis_sumbu_x_y.css') }}">
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

        .badge-eksplorasi {
            display: inline-block;
            background: #fff4cc;
            color: #8a6d1d;
            font-weight: 800;
            padding: 6px 12px;
            border-radius: 8px;
            margin-bottom: 10px;
            border: 1px solid #f0d98a;
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

        .quiz-card {
            border-radius: 16px;
            border: 1px solid #e5e7eb;
            background: #fff;
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

        /* DESKTOP */
        .tabel-gradien {
            width: 500px;
        }

        /* MOBILE */
        @media (max-width: 768px) {

            .tabel-gradien {
                width: 100% !important;
                font-size: 13px;
            }

            .tabel-gradien th,
            .tabel-gradien td {
                padding: 6px 4px;
            }

            .tabel-gradien input {
                width: 60px;
                font-size: 12px;
                padding: 4px;
            }
        }
    </style>

    {{-- Judul --}}
    <h1 class="mb-3" style="font-weight: 600;">C. Hubungan Gradien Garis</h1>

    {{-- Tujuan Pembelajaran --}}
    <div class="card card-tujuan mb-4">
        <div class="card-body">
            <h5>Tujuan Pembelajaran:</h5>
            <ol>
                <li>Peserta didik dapat memahami hubungan gradien pada garis-garis lurus dengan benar.</li>
            </ol>
        </div>
    </div>

    {{-- Subjudul --}}
    <h2 class="mt-2 mb-3" style="font-weight: 600;">1. Gradien Garis yang Sejajar dengan $sumbu-x$ dan $sumbu-y$</h2>

    {{-- ========================================================= --}}
    {{-- MATERI --}}
    {{-- ========================================================= --}}

    {{-- Materi sejajar sumbu-x --}}
    <div class="card card-materi mt-4 mb-4">
        <div class="card-body">

            <span class="badge-sub">Gradien Garis Sejajar Sumbu-x</span>

            <p>Perhatikan Gambar 3.1 di bawah ini.</p>

            <div class="text-center mb-3">
                <img src="{{ asset('img/hubungan gradien garis/garis_sejajar_sumbu_x.png') }}" class="img-fluid rounded"
                    style="max-width:320px;">
                <small class="text-muted d-block">
                    Gambar 3.1 Garis sejajar sumbu x
                </small>
            </div>

            <p>
                Pada Gambar 3.1 tampak bahwa garis $k$ melalui titik
                $A(-2,2)$ dan $B(4,2)$.
                Garis ini sejajar dengan sumbu $x$.
            </p>

            <p>
                Untuk titik $A(-2,2)$, diperoleh $x_1 = -2$ dan $y_1 = 2$.<br>
                Untuk titik $B(4,2)$, diperoleh $x_2 = 4$ dan $y_2 = 2$.
            </p>

            <p>Substitusikan nilai ke dalam rumus gradien:</p>

            {{-- FRAKSI INPUT --}}
            <div class="d-flex align-items-center flex-wrap gap-2">

                <span>$m =$</span>

                <div class="d-flex flex-column align-items-center">

                    {{-- PEMBILANG --}}
                    <div class="d-flex align-items-center gap-2">
                        <input type="text" id="y2" class="form-control form-control-sm text-center"
                            style="width:60px;">

                        <span>$-$</span>

                        <input type="text" id="y1" class="form-control form-control-sm text-center"
                            style="width:60px;">
                    </div>

                    <div style="width:140px; border-top:2px solid #000; margin:4px 0;"></div>

                    {{-- PENYEBUT --}}
                    <div class="d-flex align-items-center gap-2">
                        <input type="text" id="x2" class="form-control form-control-sm text-center"
                            style="width:60px;">

                        <span>$-$</span>

                        <input type="text" id="x1" class="form-control form-control-sm text-center"
                            style="width:60px;">
                    </div>

                </div>

                <span>$=$</span>

                <input type="text" id="hasil" class="form-control form-control-sm text-center" style="width:70px;">
            </div>

            <button class="btn btn-palet btn-sm mt-2" onclick="cekRumusGradien()">
                Cek Jawaban
            </button>

            <div id="feedbackLKS" class="mt-3"></div>

        </div>
    </div>

    <script>
        function cekRumusGradien() {

            let y2 = parseFloat(document.getElementById("y2").value);
            let y1 = parseFloat(document.getElementById("y1").value);
            let x2 = parseFloat(document.getElementById("x2").value);
            let x1 = parseFloat(document.getElementById("x1").value);
            let hasil = document.getElementById("hasil");

            let output = document.getElementById("feedbackLKS");

            // hitung gradien
            let m = (y2 - y1) / (x2 - x1);

            // BENAR: sumbu-x → y sama → m = 0
            if (y1 === y2 && m === 0) {

                hasil.value = 0;

                output.innerHTML = `
            <div class="alert alert-success">
                <b>Jawaban benar.</b><br><br>

                $m = \\frac{2 - 2}{4 - (-2)} = 0$<br><br>

                <b>Kesimpulan:</b><br>
                Garis sejajar sumbu-x memiliki gradien 0 (m = 0) karena nilai y pada kedua titik sama.
            </div>
        `;
            }

            // SALAH
            else {

                hasil.value = m;

                output.innerHTML = `
            <div class="alert alert-danger">
                <b>Jawaban belum tepat.</b><br><br>

                <b>Pembahasan:</b><br>
                Untuk garis sejajar sumbu-x, syaratnya adalah $y_1 = y_2$.<br>
                Jika disubstitusikan:<br><br>

                $m = \\frac{y_2 - y_1}{x_2 - x_1}$<br><br>

                sehingga:<br>
                $m = \\frac{2 - 2}{4 - (-2)} = 0$<br><br>

                <b>Kesimpulan:</b><br>
                Garis sejajar sumbu-x memiliki gradien 0.
            </div>
        `;
            }
        }
    </script>

    <div class="card card-materi mt-4 mb-4">
        <div class="card-body">
            <span class="badge-sub">Gradien Garis Sejajar $sumbu\text{-}x$</span>

            <p>
                Pada kegiatan eksplorasi sebelumnya, kamu telah menghitung gradien dari beberapa garis yang berbeda.
                Walaupun titik-titik yang digunakan tidak sama, semua garis tersebut memiliki satu ciri yang sama,
                yaitu nilai $y$ pada setiap pasangan titiknya tetap.
            </p>

            <p>
                Jika dua titik memiliki nilai $y$ yang sama, maka garis yang terbentuk akan berbentuk
                <b>mendatar</b>. Garis mendatar inilah yang sejajar dengan $sumbu\text{-}x$,
                sebagaimana ditunjukkan pada Gambar 3.1.
            </p>

            <div class="text-center mb-3">
                <img src="{{ asset('img/hubungan gradien garis/garis_sejajar_sumbu_x.png') }}"
                    alt="Garis yang sejajar dengan sumbu x" class="img-fluid rounded zoomable"
                    style="max-width:300px; width:100%; cursor:zoom-in;">

                <small class="text-muted d-block mt-2">
                    <strong>Gambar 3.1</strong> Garis yang sejajar dengan sumbu x
                </small>
            </div>

            <p style="line-height:1.8; text-align:justify;">
                Pada Gambar 3.1, terlihat garis yang melalui titik <b>$A(-2,2)$</b>
                dan <b>$B(4,2)$</b>. Garis tersebut sejajar dengan $sumbu\text{-}x$.
                Untuk menghitung gradien garis tersebut, gunakan rumus gradien berikut.
            </p>

            <div class="text-center mb-3">
                $$ m = \frac{y_2 - y_1}{x_2 - x_1} $$
            </div>

            <p style="line-height:1.8; text-align:justify;">
                Dari titik <b>$A(-2,2)$</b>, diperoleh $x_1 = -2$ dan $y_1 = 2$.
                Dari titik <b>$B(4,2)$</b>, diperoleh $x_2 = 4$ dan $y_2 = 2$.
            </p>

            <p style="line-height:1.8; text-align:justify;">
                Substitusikan nilai tersebut ke dalam rumus gradien.
            </p>

            <div class="text-center mb-3" style="font-size:18px;">
                \[
                \begin{aligned}
                m &= \frac{y_2 - y_1}{x_2 - x_1} \\
                &= \frac{2 - 2}{4 - (-2)} \\
                &= \frac{0}{6} \\
                &= 0
                \end{aligned}
                \]
            </div>

            <p style="line-height:1.8; text-align:justify;">
                Berdasarkan perhitungan tersebut, diperoleh gradien garis adalah $0$.
                Hal ini terjadi karena nilai $y$ pada kedua titik sama, sehingga garis tidak naik
                dan tidak turun. Garis seperti ini disebut garis mendatar atau garis yang sejajar
                dengan $sumbu\text{-}x$.
            </p>

            <div class="box-kesimpulan">
                <b>Kesimpulan:</b><br>
                Jika garis sejajar dengan $sumbu\text{-}x$, maka nilai gradiennya adalah $0$ atau $m=0$.
            </div>
        </div>
    </div>


    {{-- Materi sejajar sumbu-y --}}
    <div class="card card-materi mb-4">
        <div class="card-body">
            <span class="badge-sub">Gradien Garis Sejajar $sumbu\text{-}y$</span>

            <p>
                Pada kegiatan eksplorasi sebelumnya, kamu juga telah menemukan bahwa beberapa garis memiliki
                pasangan titik dengan nilai $x$ yang sama. Meskipun titik-titiknya berbeda, garis-garis
                tersebut menunjukkan pola yang sama.
            </p>

            <p>
                Jika dua titik memiliki nilai $x$ yang sama, maka garis yang terbentuk akan berbentuk
                <b>tegak</b> atau <b>vertikal</b>. Garis vertikal inilah yang sejajar dengan $sumbu\text{-}y$,
                sebagaimana ditunjukkan pada Gambar 3.2.
            </p>

            <div class="text-center mb-3">
                <img src="{{ asset('img/hubungan gradien garis/garis_sejajar_sumbu_y.png') }}"
                    alt="Garis yang sejajar dengan sumbu y" class="img-fluid rounded zoomable"
                    style="max-width:300px; width:100%; cursor:zoom-in;">

                <small class="text-muted d-block mt-2">
                    <strong>Gambar 3.2</strong> Garis yang sejajar dengan sumbu y
                </small>
            </div>

            <p style="line-height:1.8; text-align:justify;">
                Pada Gambar 3.2, terlihat garis yang melalui titik <b>$A(1,3)$</b>
                dan <b>$B(1,-3)$</b>. Garis tersebut sejajar dengan $sumbu\text{-}y$.
                Untuk menghitung gradien garis tersebut, gunakan rumus gradien berikut.
            </p>

            <div class="text-center mb-3">
                $$ m = \frac{y_2 - y_1}{x_2 - x_1} $$
            </div>

            <p style="line-height:1.8; text-align:justify;">
                Dari titik <b>$A(1,3)$</b>, diperoleh $x_1 = 1$ dan $y_1 = 3$.
                Dari titik <b>$B(1,-3)$</b>, diperoleh $x_2 = 1$ dan $y_2 = -3$.
            </p>

            <p style="line-height:1.8; text-align:justify;">
                Substitusikan nilai tersebut ke dalam rumus gradien.
            </p>

            <div class="text-center mb-3" style="font-size:18px; line-height: 1.5">
                \[
                \begin{aligned}
                m &= \frac{y_2 - y_1}{x_2 - x_1} \\
                &= \frac{-3 - 3}{1 - 1} \\
                &= \frac{-6}{0}
                \end{aligned}
                \]
            </div>

            <p style="line-height:1.8; text-align:justify;">
                Berdasarkan perhitungan tersebut, penyebut pecahan bernilai $0$.
                Dalam matematika, pembagian dengan $0$ tidak dapat dilakukan.
                Oleh karena itu, gradien garis yang sejajar dengan $sumbu\text{-}y$
                dinyatakan <b>tidak terdefinisi</b>.
            </p>

            <p style="line-height:1.8; text-align:justify;">
                Hal ini terjadi karena nilai $x$ pada kedua titik sama, sehingga garis berbentuk
                tegak atau vertikal.
            </p>

            <div class="box-kesimpulan">
                <b>Kesimpulan:</b><br>
                Jika garis sejajar dengan $sumbu\text{-}y$, maka gradiennya tidak terdefinisi.
            </div>
        </div>
    </div>

    {{-- Contoh --}}
    <div class="box-contoh mt-5 mb-4">
        <div class="card-body">
            <span class="title-box">Contoh</span>

            <p class="mb-3" style="line-height:1.8; text-align:justify;">
                Tentukan apakah garis lurus berikut sejajar dengan $sumbu\text{-}x$ atau $sumbu\text{-}y$.
            </p>

            <div class="mb-3" style="line-height:1.8;">
                <p class="mb-1">a. Garis $k$ melalui $A(1,-2)$ dan $B(1,5)$</p>
                <p class="mb-1">b. Garis $l$ melalui $C(-4,3)$ dan $D(2,3)$</p>
            </div>

            <p class="mb-2"><b>Jawab:</b></p>

            {{-- Jawaban a --}}
            <div class="mb-4" style="line-height:1.8;">
                <p class="mb-1">
                    <b>a.</b> Gradien garis $k$, yaitu:
                </p>

                <p class="mb-1">
                    Dari titik $A(1,-2)$, maka $x_1 = 1$ dan $y_1 = -2$.
                </p>

                <p class="mb-2">
                    Dari titik $B(1,5)$, maka $x_2 = 1$ dan $y_2 = 5$.
                </p>
                <div class="text-center mb-2">
                    $$
                    m_{AB} = \frac{y_2 - y_1}{x_2 - x_1}
                    = \frac{5 - (-2)}{1 - 1}
                    = \frac{7}{0}
                    $$
                </div>

                <p class="mb-0">
                    Karena penyebutnya $0$, maka gradien garis $k$ tidak terdefinisi.
                    Jadi, garis $k$ sejajar dengan $sumbu\text{-}y$.
                </p>
            </div>

            {{-- Jawaban b --}}
            <div class="mb-4" style="line-height:1.8;">
                <p class="mb-1">
                    <b>b.</b> Gradien garis $l$, yaitu:
                </p>

                <p class="mb-1">
                    Dari titik $C(-4,3)$, maka $x_1 = -4$ dan $y_1 = 3$.
                </p>

                <p class="mb-2">
                    Dari titik $D(2,3)$, maka $x_2 = 2$ dan $y_2 = 3$.
                </p>

                <div class="text-center mb-2">
                    <div class="text-center mb-2">
                        $$
                        m_{CD} = \frac{y_2-y_1}{x_2-x_1}
                        = \frac{3-3}{2-(-4)}
                        = \frac{0}{6}
                        = 0
                        $$
                    </div>
                </div>

                <p class="mb-0">
                    Karena gradiennya $0$, maka garis $l$ sejajar dengan $sumbu\text{-}x$.
                </p>
            </div>
        </div>
    </div>



    <script>
        const MATERI_ID = @json($materi->id);
        const MATERI_SLUG = @json($materi->slug);
        const IS_MATERI_COMPLETED = @json((bool) ($materialProgress->is_completed ?? false));
        const SAVED_LATIHAN = @json($latihanProgress ?? []);
    </script>

    {{-- Latihan --}}
    <div class="box-latihan mt-5" id="latihanC1Box">
        <div class="card-body">
            <span class="title-box">Latihan Soal</span>

            <p>
                Kerjakan latihan berikut berdasarkan pemahamanmu tentang garis yang sejajar dengan sumbu-x dan sumbu-y.
            </p>

            <!-- ===================== -->
            <!-- LATIHAN 1 -->
            <!-- ===================== -->
            <div class="latihan-step" id="latihanStep1">
                <div class="quiz-card p-3 mt-3">
                    <p><b>1.</b> Perhatikan gambar berikut.</p>

                    <div class="text-center mb-3">
                        <img src="{{ asset('img/hubungan gradien garis/latsol1.png') }}" class="img-fluid rounded"
                            alt="Gambar latihan garis" style="max-height: 300px">
                    </div>

                    <p>Pilih semua garis yang sejajar dengan <b>sumbu-x</b>.</p>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="lat1-k">
                        <label class="form-check-label" for="lat1-k">Garis k</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="lat1-l">
                        <label class="form-check-label" for="lat1-l">Garis l</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="lat1-m">
                        <label class="form-check-label" for="lat1-m">Garis m</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="lat1-n">
                        <label class="form-check-label" for="lat1-n">Garis n</label>
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

                    <div id="fb-lat1" class="mt-2"></div>
                </div>
            </div>

            <!-- ===================== -->
            <!-- LATIHAN 2 -->
            <!-- ===================== -->
            <div class="latihan-step" id="latihanStep2" style="display:none;">
                <hr class="my-4">

                <div class="quiz-card p-3 mt-3">
                    <p><b>2.</b> Manakah garis berikut yang sejajar dengan <b>sumbu-y</b>?</p>
                    <div class="petunjuk-mini-latihan">
                        <strong>Petunjuk:</strong>
                        Pilih salah satu jawaban yang paling tepat.
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="latihan2" id="lat2-a" value="a">
                        <label class="form-check-label" for="lat2-a">
                            Garis melalui titik (2,3) dan (2,8)
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="latihan2" id="lat2-b" value="b">
                        <label class="form-check-label" for="lat2-b">
                            Garis melalui titik (1,4) dan (5,4)
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="latihan2" id="lat2-c" value="c">
                        <label class="form-check-label" for="lat2-c">
                            Garis melalui titik (0,0) dan (3,3)
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

                    <div id="fb-lat2" class="mt-2"></div>
                </div>
            </div>

            <!-- ===================== -->
            <!-- LATIHAN 3 -->
            <!-- ===================== -->
            <div class="latihan-step" id="latihanStep3" style="display:none;">
                <hr class="my-4">

                <div class="quiz-card p-3 mt-3">
                    <p class="mb-3" style="line-height:1.8;">
                        <b>3.</b> Tentukan nilai <b>$a$</b> agar garis yang melalui titik
                        <b>$A(3a,8a)$</b> dan <b>$B(2a,4)$</b> sejajar dengan <b>sumbu-x</b>.
                    </p>
                    <div class="petunjuk-mini-latihan">
                        <strong>Petunjuk:</strong>
                        Isilah setiap langkah penyelesaian pada kolom yang tersedia sampai diperoleh nilai \(a\).
                    </div>

                    <div class="border rounded-4 p-3 mb-4" style="background:#f7f9fc;">
                        <p class="mb-3"><b>Penyelesaian:</b></p>

                        <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                            <span>$A(3a,8a)$, maka</span>
                            <span>$x_1=$</span>
                            <input type="text" id="x1_3"
                                class="form-control form-control-sm text-center jawaban-latihan" style="width:70px;">
                            <span>dan</span>
                            <span>$y_1=$</span>
                            <input type="text" id="y1_3"
                                class="form-control form-control-sm text-center jawaban-latihan" style="width:70px;">
                        </div>

                        <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                            <span>$B(2a,4)$, maka</span>
                            <span>$x_2=$</span>
                            <input type="text" id="x2_3"
                                class="form-control form-control-sm text-center jawaban-latihan" style="width:70px;">
                            <span>dan</span>
                            <span>$y_2=$</span>
                            <input type="text" id="y2_3"
                                class="form-control form-control-sm text-center jawaban-latihan" style="width:70px;">
                        </div>

                        <p class="mb-2">Karena garis sejajar dengan sumbu-x, maka:</p>

                        <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                            <span>$m=$</span>
                            <input type="text" id="m_3"
                                class="form-control form-control-sm text-center jawaban-latihan" style="width:70px;">
                        </div>

                        <p class="mb-2">Substitusikan ke rumus gradien.</p>

                        <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                            <input type="text" id="kiri1_3"
                                class="form-control form-control-sm text-center jawaban-latihan" style="width:70px;">
                            <span>$=$</span>

                            <div class="frac-input">
                                <div class="top">
                                    <input type="text" id="subY2_3"
                                        class="form-control form-control-sm text-center jawaban-latihan">
                                    <span>$-$</span>
                                    <input type="text" id="subY1_3"
                                        class="form-control form-control-sm text-center jawaban-latihan">
                                </div>

                                <div class="bottom">
                                    <input type="text" id="subX2_3"
                                        class="form-control form-control-sm text-center jawaban-latihan">
                                    <span>$-$</span>
                                    <input type="text" id="subX1_3"
                                        class="form-control form-control-sm text-center jawaban-latihan">
                                </div>
                            </div>
                        </div>

                        <p class="mb-2">Sederhanakan penyebutnya.</p>

                        <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                            <input type="text" id="kiri2_3"
                                class="form-control form-control-sm text-center jawaban-latihan" style="width:70px;">
                            <span>$=$</span>

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
                        </div>

                        <p class="mt-3">Kalikan kedua ruas dengan penyebut agar pecahan hilang.</p>

                        <div class="mb-2 d-flex flex-wrap align-items-center gap-2">
                            <input type="text" id="pers1Kiri_3"
                                class="form-control form-control-sm text-center jawaban-latihan" style="width:90px;">
                            <span>$=$</span>
                            <input type="text" id="pers1Kanan_3"
                                class="form-control form-control-sm text-center jawaban-latihan" style="width:120px;">
                        </div>

                        <p class="mt-3">Sehingga nilai <b>$a$</b> adalah:</p>

                        <div class="mb-2 d-flex flex-wrap align-items-center gap-2">
                            <span>$a=$</span>
                            <input type="text" id="hasilA_3"
                                class="form-control form-control-sm text-center jawaban-latihan" style="width:80px;">
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

                            <div id="fbLatihan3" class="mt-3"></div>

                            <div id="pesanAkhirLatihan" class="mt-3 d-none">
                                <div class="alert alert-success fw-semibold text-center mt-3">
                                    Bagus, kamu sudah memahami gradien garis sejajar sumbu-x dan sumbu-y.
                                    Silakan lanjut ke materi berikutnya.
                                </div>
                            </div>
                        </div>

                        <div id="petunjukLatihan3" class="mt-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://www.geogebra.org/apps/deployggb.js"></script>
    <script>
        function tampilkanFeedback(id, tipe, pesan) {
            let kelas = "feedback-box feedback-info";
            if (tipe === "benar") kelas = "feedback-box feedback-benar";
            if (tipe === "salah") kelas = "feedback-box feedback-salah";
            document.getElementById(id).innerHTML =
                `<div class="${kelas}">${pesan}</div>`;
        }

        function showEl(id) {
            document.getElementById(id).classList.remove("d-none");
        }

        function renderKatexById(id) {
            const el = document.getElementById(id);
            if (el && window.renderMathInElement) {
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
                    ],
                });
            }
        }

        function tampilkanStep(id) {
            const el = document.getElementById(id);
            if (el) el.classList.remove("d-none");
        }

        function sembunyikanTombol(id) {
            const el = document.getElementById(id);
            if (el) el.classList.add("d-none");
        }

        function disableElement(id) {
            const el = document.getElementById(id);
            if (el) el.disabled = true;
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

        /* =========================
        EKSPLORASI SUMBU-X
        ========================= */

        function cekTabelX() {
            const mx1 = document.getElementById("mx1").value.trim();
            const mx2 = document.getElementById("mx2").value.trim();
            const mx3 = document.getElementById("mx3").value.trim();
            const fb = document.getElementById("feedback-x1");

            let pesan = [];

            if (mx1 !== "0") {
                pesan.push(
                    "Gradien garis <b>a</b> belum tepat. Pada titik A(-2,2) dan B(4,2), nilai <b>y</b> sama sehingga <b>y₂ - y₁ = 0</b>.",
                );
            }

            if (mx2 !== "0") {
                pesan.push(
                    "Gradien garis <b>b</b> belum tepat. Pada titik C(1,5) dan D(6,5), nilai <b>y</b> juga sama.",
                );
            }

            if (mx3 !== "0") {
                pesan.push(
                    "Gradien garis <b>c</b> belum tepat. Pada titik E(-3,-1) dan F(2,-1), selisih nilai <b>y</b> adalah <b>0</b>.",
                );
            }

            if (pesan.length === 0) {
                fb.innerHTML = `
                <div class="alert alert-success mt-2">
                    Bagus! Semua gradien sudah benar. Sekarang perhatikan hasilnya, lalu bandingkan ketiga gradien tersebut.
                </div>
            `;
                disableMany(["mx1", "mx2", "mx3"]);
                sembunyikanTombol("btn-tabel-x");
                tampilkanStep("step-x-2");
            } else {
                fb.innerHTML = `
                <div class="alert alert-warning mt-2">
                    <b>Masih ada jawaban yang belum tepat:</b><br><br>
                    ${pesan.join("<br><br>")}
                    <br><br>
                    <b>Petunjuk:</b> Gunakan rumus <b>m = (y₂ - y₁)/(x₂ - x₁)</b>. Jika nilai <b>y</b> kedua titik sama, maka pembilangnya berapa?
                </div>
            `;
                renderKatexById("feedback-x1");
            }
        }

        function cekBandingX(jawaban, el) {
            const fb = document.getElementById("feedback-x2");
            const container = "#step-x-2";

            resetOpsiKotak(container);

            if (jawaban === "sama") {
                tandaiOpsi(el, "benar");
                fb.innerHTML = `
                <div class="alert alert-success mt-2">
                    Tepat. Ketiga garis memiliki gradien yang sama.
                </div>
            `;
                disableOpsiKotak(container);
                tampilkanStep("step-x-3");
            } else {
                tandaiOpsi(el, "salah");
                fb.innerHTML = `
                <div class="alert alert-warning mt-2">
                    Coba lihat kembali hasil gradien pada tabel. Apakah ketiganya menunjukkan pola yang sama?
                </div>
            `;
            }
        }

        function cekBentukX(jawaban, el) {
            const fb = document.getElementById("feedback-x3");
            const container = "#step-x-3";

            resetOpsiKotak(container);

            if (jawaban === "mendatar") {
                tandaiOpsi(el, "benar");
                fb.innerHTML = `
                <div class="alert alert-success mt-2">
                    Benar. Karena nilai <b>y</b> tetap, garis yang terbentuk adalah garis mendatar.
                </div>
            `;
                disableOpsiKotak(container);
                tampilkanStep("step-x-4");
            } else {
                tandaiOpsi(el, "salah");
                fb.innerHTML = `
                <div class="alert alert-warning mt-2">
                    Coba perhatikan lagi. Jika nilai <b>y</b> sama, garisnya tidak naik dan tidak turun.
                </div>
            `;
            }
        }

        function cekSimpulanX() {
            const fb = document.getElementById("feedback-x4");

            fb.innerHTML = `
            <div class="alert alert-success mt-2">
                Bagus! Sekarang perhatikan kesimpulan yang terbentuk dari hasil eksplorasimu.
            </div>
        `;

            tampilkanStep("kesimpulan-x");
            tampilkanStep("ggb-wrapper-x");
            renderKatexById("kesimpulan-x");
        }

        /* =========================
        EKSPLORASI SUMBU-Y
        ========================= */

        function cekTabelY() {
            const py1Atas = document.getElementById("py1-atas").value.trim();
            const py1Bawah = document.getElementById("py1-bawah").value.trim();
            const py2Atas = document.getElementById("py2-atas").value.trim();
            const py2Bawah = document.getElementById("py2-bawah").value.trim();
            const py3Atas = document.getElementById("py3-atas").value.trim();
            const py3Bawah = document.getElementById("py3-bawah").value.trim();
            const fb = document.getElementById("feedback-y1");

            let pesan = [];

            if (!(py1Atas === "-7" && py1Bawah === "0")) {
                pesan.push(
                    "Gradien garis <b>p</b> belum tepat. Dari titik P(2,3) dan Q(2,-4), diperoleh <b>y₂ - y₁ = -7</b> dan <b>x₂ - x₁ = 0</b>.",
                );
            }

            if (!(py2Atas === "-7" && py2Bawah === "0")) {
                pesan.push(
                    "Gradien garis <b>q</b> belum tepat. Dari titik R(-1,5) dan S(-1,-2), diperoleh <b>y₂ - y₁ = -7</b> dan <b>x₂ - x₁ = 0</b>.",
                );
            }

            if (!(py3Atas === "5" && py3Bawah === "0")) {
                pesan.push(
                    "Gradien garis <b>r</b> belum tepat. Dari titik T(4,1) dan U(4,6), diperoleh <b>y₂ - y₁ = 5</b> dan <b>x₂ - x₁ = 0</b>.",
                );
            }

            if (pesan.length === 0) {
                fb.innerHTML = `
                <div class="alert alert-success mt-2">
                    Bagus! Bentuk gradien yang kamu isi sudah benar. Sekarang amati apa yang sama dari ketiga garis tersebut.
                </div>
            `;
                disableMany([
                    "py1-atas",
                    "py1-bawah",
                    "py2-atas",
                    "py2-bawah",
                    "py3-atas",
                    "py3-bawah",
                ]);
                sembunyikanTombol("btn-tabel-y");
                tampilkanStep("step-y-2");
            } else {
                fb.innerHTML = `
                <div class="alert alert-warning mt-2">
                    <b>Masih ada jawaban yang belum tepat:</b><br><br>
                    ${pesan.join("<br><br>")}
                    <br><br>
                    <b>Petunjuk:</b> Gunakan rumus <b>m = (y₂ - y₁)/(x₂ - x₁)</b>, lalu perhatikan selisih nilai <b>x</b>.
                </div>
            `;
                renderKatexById("feedback-y1");
            }
        }

        function cekBandingY(jawaban, el) {
            const fb = document.getElementById("feedback-y2");
            const container = "#step-y-2";

            resetOpsiKotak(container);

            if (jawaban === "x-sama") {
                tandaiOpsi(el, "benar");
                fb.innerHTML = `
                <div class="alert alert-success mt-2">
                    Tepat. Pada setiap pasangan titik, nilai <b>x</b> selalu sama. Karena itu, <b>x₂ - x₁ = 0</b>.
                </div>
            `;
                disableOpsiKotak(container);
                tampilkanStep("step-y-3");
            } else {
                tandaiOpsi(el, "salah");
                fb.innerHTML = `
                <div class="alert alert-warning mt-2">
                    Coba perhatikan lagi koordinat titik pada setiap garis. Nilai mana yang tetap, <b>x</b> atau <b>y</b>?
                </div>
            `;
            }

            renderKatexById("feedback-y2");
        }

        function cekKeadaanY(jawaban, el) {
            const fb = document.getElementById("feedback-y3");
            const container = "#step-y-3";

            resetOpsiKotak(container);

            if (jawaban === "tdk") {
                tandaiOpsi(el, "benar");
                fb.innerHTML = `
                <div class="alert alert-success mt-2">
                    Benar. Karena penyebut pada gradien bernilai <b>0</b>, pembagian tidak dapat dilakukan, sehingga gradiennya <b>tidak terdefinisi</b>.
                </div>
            `;
                disableOpsiKotak(container);
                tampilkanStep("step-y-4");
            } else {
                tandaiOpsi(el, "salah");
                fb.innerHTML = `
                <div class="alert alert-warning mt-2">
                    Coba ingat kembali: apakah pembagian dengan <b>0</b> dapat dilakukan?
                </div>
            `;
            }

            renderKatexById("feedback-y3");
        }

        function cekBentukY(jawaban, el) {
            const fb = document.getElementById("feedback-y4");
            const container = "#step-y-4";

            resetOpsiKotak(container);

            if (jawaban === "tegak") {
                tandaiOpsi(el, "benar");
                fb.innerHTML = `
                <div class="alert alert-success mt-2">
                    Tepat. Jika nilai <b>x</b> pada pasangan titik sama, garis yang terbentuk berbentuk <b>tegak</b> atau vertikal.
                </div>
            `;
                disableOpsiKotak(container);
                tampilkanStep("step-y-5");
            } else {
                tandaiOpsi(el, "salah");
                fb.innerHTML = `
                <div class="alert alert-warning mt-2">
                    Coba bayangkan titik-titik yang memiliki nilai <b>x</b> sama pada bidang koordinat. Garisnya akan bergerak ke arah mana?
                </div>
            `;
            }

            renderKatexById("feedback-y4");
        }

        function cekSimpulanY() {
            const fb = document.getElementById("feedback-y5");

            fb.innerHTML = `
            <div class="alert alert-success mt-2">
                Bagus! Sekarang perhatikan kesimpulan yang terbentuk dari hasil eksplorasimu.
            </div>
        `;

            tampilkanStep("kesimpulan-y");
            tampilkanStep("ggb-wrapper-y");
            renderKatexById("feedback-y5");
            renderKatexById("kesimpulan-y");
        }

        // Contoh Sumbu x
        function renderKatexById(id) {
            const el = document.getElementById(id);
            if (el && window.renderMathInElement) {
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
                    ],
                });
            }
        }

        function tampilkan(id) {
            const el = document.getElementById(id);
            if (el) {
                el.classList.remove("d-none");
            }
        }

        function sembunyikanBanyak(ids) {
            ids.forEach((id) => {
                const el = document.getElementById(id);
                if (el) {
                    el.classList.add("d-none");
                }
            });
        }

        function disableBanyak(ids) {
            ids.forEach((id) => {
                const el = document.getElementById(id);
                if (el) {
                    el.disabled = true;
                }
            });
        }

        function cekContoh1Step1(pilihan) {
            const fb = document.getElementById("fb-contoh1-step1");

            if (pilihan === "datar") {
                fb.innerHTML = "";
                sembunyikanBanyak([
                    "btn-c1-s1-naik",
                    "btn-c1-s1-turun",
                    "btn-c1-s1-datar",
                ]);
                tampilkan("contoh1-step2");
                renderKatexById("contoh1-step2");
            } else {
                fb.innerHTML = `
                <div class="alert alert-warning mt-2">
                    Coba perhatikan lagi. Pada soal disebutkan bahwa jalan tidak menanjak dan tidak menurun.
                </div>
            `;
            }
        }

        function cekContoh1Step2(pilihan) {
            const fb = document.getElementById("fb-contoh1-step2");

            if (pilihan === "y") {
                fb.innerHTML = "";
                sembunyikanBanyak(["btn-c1-s2-x", "btn-c1-s2-y"]);
                tampilkan("contoh1-step3");
                renderKatexById("contoh1-step3");
            } else {
                fb.innerHTML = `
                <div class="alert alert-warning mt-2">
                    Coba perhatikan kembali koordinat titik $A(-2,3)$ dan $B(4,3)$.
                </div>
            `;
                renderKatexById("fb-contoh1-step2");
            }
        }

        function cekContoh1Step3() {
            const atas = document.getElementById("c1-atas").value.trim();
            const bawah = document.getElementById("c1-bawah").value.trim();
            const fb = document.getElementById("fb-contoh1-step3");

            if (atas === "0" && bawah === "6") {
                fb.innerHTML = "";
                disableBanyak(["c1-atas", "c1-bawah"]);
                document.getElementById("btn-c1-step3").classList.add("d-none");
                tampilkan("contoh1-step4");
                renderKatexById("contoh1-step4");
            } else {
                fb.innerHTML = `
                <div class="alert alert-warning mt-2">
                    Coba hitung lagi. Selisih nilai $y$ adalah $3 - 3$, sedangkan selisih nilai $x$ adalah $4 - (-2)$.
                </div>
            `;
                renderKatexById("fb-contoh1-step3");
            }
        }

        function cekContoh1Step4(pilihan) {
            const fb = document.getElementById("fb-contoh1-step4");

            if (pilihan === "x") {
                fb.innerHTML = "";
                sembunyikanBanyak(["btn-c1-s4-x", "btn-c1-s4-y"]);
                tampilkan("contoh1-kesimpulan");
                renderKatexById("contoh1-kesimpulan");
            } else {
                fb.innerHTML = `
                <div class="alert alert-warning mt-2">
                    Coba ingat kembali. Garis dengan gradien $0$ berbentuk mendatar dan sejajar dengan $sumbu\text{-}x$.
                </div>
            `;
                renderKatexById("fb-contoh1-step4");
            }
        }

        //
        // Latihan Soal Subbab C
        // Sistem turun ke bawah
        //

        // =========================
        // HELPER UMUM
        // =========================
        function normJawaban(teks) {
            return String(teks || "")
                .toLowerCase()
                .replace(/\s+/g, "")
                .replace(/−/g, "-")
                .trim();
        }

        function renderKatex(target) {
            if (!window.renderMathInElement || !target) return;

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

        function renderKatexById(id) {
            const el = document.getElementById(id);
            renderKatex(el);
        }

        document.addEventListener("DOMContentLoaded", function() {
            renderKatex(document.getElementById("latihanC1Box") || document.body);
            restoreProgressC1();
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
            renderKatex(step);
            scrollKeStep(`latihanStep${stepNumber}`);
        }

        function prevLatihan(stepNumber) {
            scrollKeStep(`latihanStep${stepNumber}`);
        }

        function resetStepSetelah(stepMulai) {
            for (let i = stepMulai; i <= 4; i++) {
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
                console.log("Simpan latihan C1:", data);

                return response.ok;
            } catch (error) {
                console.error("Gagal menyimpan latihan C1:", error);
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
        // VALIDASI ISIAN
        // =========================
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

        function isiPesan(id, pesan, tipe = "info") {
            const el = document.getElementById(id);
            if (!el) return;

            const kelas =
                tipe === "success" ?
                "alert-success" :
                tipe === "warning" ?
                "alert-warning" :
                "alert-info";

            el.innerHTML = `<div class="alert ${kelas} py-2 mb-0">${pesan}</div>`;
            renderKatex(el);
        }

        function tampilkanPetunjukLatihan3(pesan) {
            isiPesan("petunjukLatihan3", pesan, "info");
        }

        function kosongkanPetunjukLatihan3() {
            const el = document.getElementById("petunjukLatihan3");
            if (el) el.innerHTML = "";
        }

        // simpan jawaban latihan
        function ambilJawabanLatihan1C1() {
            const selected = [];

            ["k", "l", "m", "n"].forEach((kode) => {
                const el = document.getElementById(`lat1-${kode}`);
                if (el?.checked) {
                    selected.push(kode);
                }
            });

            return {
                selected: selected,
            };
        }

        function ambilJawabanLatihan2C1() {
            const pilihan = document.querySelector('input[name="latihan2"]:checked');

            return {
                latihan2: pilihan ? pilihan.value : "",
            };
        }

        function ambilJawabanLatihan3C1() {
            return {
                x1_3: document.getElementById("x1_3")?.value.trim() ?? "",
                y1_3: document.getElementById("y1_3")?.value.trim() ?? "",
                x2_3: document.getElementById("x2_3")?.value.trim() ?? "",
                y2_3: document.getElementById("y2_3")?.value.trim() ?? "",

                m_3: document.getElementById("m_3")?.value.trim() ?? "",

                kiri1_3: document.getElementById("kiri1_3")?.value.trim() ?? "",
                subY2_3: document.getElementById("subY2_3")?.value.trim() ?? "",
                subY1_3: document.getElementById("subY1_3")?.value.trim() ?? "",
                subX2_3: document.getElementById("subX2_3")?.value.trim() ?? "",
                subX1_3: document.getElementById("subX1_3")?.value.trim() ?? "",

                kiri2_3: document.getElementById("kiri2_3")?.value.trim() ?? "",
                hasilAtas_3: document.getElementById("hasilAtas_3")?.value.trim() ?? "",
                hasilBawah_3: document.getElementById("hasilBawah_3")?.value.trim() ?? "",

                pers1Kiri_3: document.getElementById("pers1Kiri_3")?.value.trim() ?? "",
                pers1Kanan_3: document.getElementById("pers1Kanan_3")?.value.trim() ?? "",
                hasilA_3: document.getElementById("hasilA_3")?.value.trim() ?? "",
            };
        }

        // =========================
        // LATIHAN 1
        // =========================
        async function cekLatihan1() {
            const k = document.getElementById("lat1-k")?.checked;
            const l = document.getElementById("lat1-l")?.checked;
            const m = document.getElementById("lat1-m")?.checked;
            const n = document.getElementById("lat1-n")?.checked;
            const fb = document.getElementById("fb-lat1");
            const nextBtn = document.getElementById("nextBtnLatihan1");

            if (!fb) return;

            if (k && l && !m && !n) {
                fb.innerHTML = `
                <div class="alert alert-success mb-0">
                    Benar! Garis <b>k</b> dan <b>l</b> sejajar dengan sumbu-x karena keduanya berbentuk <b>mendatar</b>.
                    Silakan lanjut ke latihan berikutnya.
                </div>
            `;

                if (nextBtn) nextBtn.disabled = false;
                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L1`,
                    "checkbox",
                    ambilJawabanLatihan1C1(),
                    true
                );
            } else {
                fb.innerHTML = `
                <div class="alert alert-warning mb-0">
                    Jawaban belum tepat. Coba perhatikan lagi garis yang berbentuk <b>mendatar</b>,
                    karena garis seperti itulah yang sejajar dengan <b>sumbu-x</b>.
                </div>
            `;

                if (nextBtn) nextBtn.disabled = true;
                resetStepSetelah(2);
            }
        }

        function resetLatihan1() {
            ["lat1-k", "lat1-l", "lat1-m", "lat1-n"].forEach((id) => {
                const el = document.getElementById(id);
                if (el) el.checked = false;
            });

            const fb = document.getElementById("fb-lat1");
            const nextBtn = document.getElementById("nextBtnLatihan1");

            if (fb) fb.innerHTML = "";
            if (nextBtn) nextBtn.disabled = true;

            resetStepSetelah(2);
        }

        // =========================
        // LATIHAN 2
        // =========================
        async function cekLatihan2() {
            const pilihan = document.querySelector('input[name="latihan2"]:checked');
            const fb = document.getElementById("fb-lat2");
            const nextBtn = document.getElementById("nextBtnLatihan2");

            if (!fb) return;

            if (!pilihan) {
                fb.innerHTML = `
                <div class="alert alert-warning mb-0">
                    Pilih salah satu jawaban terlebih dahulu.
                </div>
            `;

                if (nextBtn) nextBtn.disabled = true;
                resetStepSetelah(3);
                return;
            }

            if (pilihan.value === "a") {
                fb.innerHTML = `
                <div class="alert alert-success mb-0">
                    Tepat! Garis melalui titik <b>(2,3)</b> dan <b>(2,8)</b> sejajar dengan
                    <b>sumbu-y</b> karena kedua titik memiliki nilai <b>x</b> yang sama.
                    Silakan lanjut ke latihan berikutnya.
                </div>
            `;

                if (nextBtn) nextBtn.disabled = false;
                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L2`,
                    "radio",
                    ambilJawabanLatihan2C1(),
                    true
                );

            } else {
                fb.innerHTML = `
                <div class="alert alert-warning mb-0">
                    Jawaban belum tepat. Ingat, garis yang sejajar dengan <b>sumbu-y</b>
                    memiliki nilai <b>x</b> yang sama pada kedua titiknya.
                </div>
            `;

                if (nextBtn) nextBtn.disabled = true;
                resetStepSetelah(3);
            }
        }

        function resetLatihan2() {
            document.querySelectorAll('input[name="latihan2"]').forEach((el) => {
                el.checked = false;
            });

            const fb = document.getElementById("fb-lat2");
            const nextBtn = document.getElementById("nextBtnLatihan2");

            if (fb) fb.innerHTML = "";
            if (nextBtn) nextBtn.disabled = true;

            resetStepSetelah(3);
        }

        // =========================
        // LATIHAN 3
        // =========================
        async function cekLatihan3() {
            const benarX1 = cekIsian("x1_3", ["3a"]);
            const benarY1 = cekIsian("y1_3", ["8a"]);
            const benarX2 = cekIsian("x2_3", ["2a"]);
            const benarY2 = cekIsian("y2_3", ["4"]);

            const benarM = cekIsian("m_3", ["0"]);

            const benarKiri1 = cekIsian("kiri1_3", ["0"]);
            const benarSubY2 = cekIsian("subY2_3", ["4"]);
            const benarSubY1 = cekIsian("subY1_3", ["8a"]);
            const benarSubX2 = cekIsian("subX2_3", ["2a"]);
            const benarSubX1 = cekIsian("subX1_3", ["3a"]);

            const benarKiri2 = cekIsian("kiri2_3", ["0"]);
            const benarHasilAtas = cekIsian("hasilAtas_3", ["4-8a", "-8a+4"]);
            const benarHasilBawah = cekIsian("hasilBawah_3", ["-a", "2a-3a"]);

            const benarPers1Kiri = cekIsian("pers1Kiri_3", ["0", "0(-a)", "-0a"]);
            const benarPers1Kanan = cekIsian("pers1Kanan_3", ["4-8a", "-8a+4"]);

            const benarHasilA = cekIsian("hasilA_3", ["1/2", "0.5", "½"]);

            const semuaBenar =
                benarX1 &&
                benarY1 &&
                benarX2 &&
                benarY2 &&
                benarM &&
                benarKiri1 &&
                benarSubY2 &&
                benarSubY1 &&
                benarSubX2 &&
                benarSubX1 &&
                benarKiri2 &&
                benarHasilAtas &&
                benarHasilBawah &&
                benarPers1Kiri &&
                benarPers1Kanan &&
                benarHasilA;

            const akhir = document.getElementById("pesanAkhirLatihan");

            if (semuaBenar) {
                isiPesan(
                    "fbLatihan3",
                    "Bagus! Langkah-langkah penyelesaianmu sudah benar.<br>Diperoleh $8a = 4$, sehingga $a = \\frac{1}{2}$.",
                    "success",
                );

                kosongkanPetunjukLatihan3();

                if (akhir) {
                    akhir.classList.remove("d-none");
                    renderKatex(akhir);
                }

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L3`,
                    "input",
                    ambilJawabanLatihan3C1(),
                    true
                );

                const saved = await saveProgressMateri();

                if (saved) {
                    bukaNextButton();
                } else if (akhir) {
                    akhir.insertAdjacentHTML(
                        "beforeend",
                        `
            <div class="alert alert-warning mt-2 mb-0">
                Jawaban benar, tetapi progres belum tersimpan. Coba cek koneksi atau refresh halaman.
            </div>
            `,
                    );
                }

                return;
            }

            isiPesan(
                "fbLatihan3",
                "Masih ada jawaban yang belum tepat. Coba periksa kembali isian yang berwarna merah.",
                "warning",
            );

            if (akhir) akhir.classList.add("d-none");

            if (!benarX1 || !benarY1 || !benarX2 || !benarY2) {
                tampilkanPetunjukLatihan3(
                    "Petunjuk: tentukan nilai $x_1$, $y_1$, $x_2$, dan $y_2$ berdasarkan urutan titik yang diberikan pada soal.",
                );
                return;
            }

            if (!benarM) {
                tampilkanPetunjukLatihan3(
                    "Petunjuk: gunakan sifat gradien garis yang sejajar dengan $sumbu\\text{-}x$.",
                );
                return;
            }

            if (
                !benarKiri1 ||
                !benarSubY2 ||
                !benarSubY1 ||
                !benarSubX2 ||
                !benarSubX1
            ) {
                tampilkanPetunjukLatihan3(
                    "Petunjuk: substitusikan nilai yang sudah diketahui ke dalam rumus gradien $m=\\frac{y_2-y_1}{x_2-x_1}$.",
                );
                return;
            }

            if (!benarKiri2 || !benarHasilAtas || !benarHasilBawah) {
                tampilkanPetunjukLatihan3(
                    "Petunjuk: sederhanakan hasil pengurangan pada pembilang dan penyebut secara teliti.",
                );
                return;
            }

            if (!benarPers1Kiri || !benarPers1Kanan) {
                tampilkanPetunjukLatihan3(
                    "Petunjuk: hilangkan bentuk pecahan dengan mengalikan kedua ruas menggunakan penyebutnya.",
                );
                return;
            }

            if (!benarHasilA) {
                tampilkanPetunjukLatihan3(
                    "Petunjuk: selesaikan persamaan yang diperoleh sampai nilai $a$ ditemukan.",
                );
            }
        }

        function resetLatihan3() {
            [
                "x1_3",
                "y1_3",
                "x2_3",
                "y2_3",
                "m_3",
                "kiri1_3",
                "subY2_3",
                "subY1_3",
                "subX2_3",
                "subX1_3",
                "kiri2_3",
                "hasilAtas_3",
                "hasilBawah_3",
                "pers1Kiri_3",
                "pers1Kanan_3",
                "hasilA_3",
            ].forEach((id) => {
                const el = document.getElementById(id);

                if (el) {
                    el.value = "";
                    el.classList.remove("is-valid", "is-invalid");
                }
            });

            const fb = document.getElementById("fbLatihan3");
            const petunjuk = document.getElementById("petunjukLatihan3");
            const akhir = document.getElementById("pesanAkhirLatihan");

            if (fb) fb.innerHTML = "";
            if (petunjuk) petunjuk.innerHTML = "";

            if (akhir) {
                akhir.classList.add("d-none");
            }
        }

        // Save PROGRESS
        function setCheckedSafe(id, checked) {
            const el = document.getElementById(id);
            if (el) {
                el.checked = checked;
            }
        }

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

        function restoreLatihan1C1() {
            const saved = SAVED_LATIHAN[`${MATERI_SLUG}_L1`]?.jawaban;

            if (!saved || !Array.isArray(saved.selected)) return;

            ["k", "l", "m", "n"].forEach((kode) => {
                setCheckedSafe(`lat1-${kode}`, saved.selected.includes(kode));
            });

            const fb = document.getElementById("fb-lat1");
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

        function restoreLatihan2C1() {
            const saved = SAVED_LATIHAN[`${MATERI_SLUG}_L2`]?.jawaban;

            if (!saved || !saved.latihan2) return;

            const radio = document.querySelector(
                `input[name="latihan2"][value="${saved.latihan2}"]`
            );

            if (radio) {
                radio.checked = true;
            }

            const fb = document.getElementById("fb-lat2");
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

        function restoreLatihan3C1() {
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
                akhir.classList.remove("d-none");
            }

            renderKatex(fb);
            renderKatex(akhir);
            bukaNextButton();
        }

        function restoreProgressC1() {
            restoreLatihan1C1();
            restoreLatihan2C1();
            restoreLatihan3C1();

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
