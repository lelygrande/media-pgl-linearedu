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

        /* =========================================
                                                            GEOGEBRA RESPONSIVE
                                                            ========================================= */

        #ggb-eksplorasi-tegak {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
            overflow: hidden;
        }

        @media (max-width: 768px) {

            #ggb-eksplorasi-tegak {

                max-width: 100%;

                height: 320px;
            }
        }
    </style>

    {{-- Subjudul --}}
    <h2 class="mt-2 mb-3" style="font-weight: 600;">3. Gradien Garis-garis yang Saling Tegak Lurus</h2>

    <div class="box-eksplorasi mt-5">

        <div class="title-box">
            Eksplorasi
        </div>

        {{-- Pengantar --}}
        <p class="mt-2">
            Pada bagian ini, kamu akan menemukan sendiri hubungan antara gradien dua garis yang saling tegak lurus.
            Perhatikan terlebih dahulu grafik dua pasangan garis berikut. Setiap pasangan garis berpotongan membentuk
            sudut siku-siku. Selanjutnya, hitung gradien masing-masing garis, lalu temukan pola dari hasil kali gradiennya.
        </p>

        <div class="quiz-card p-3 mb-3">
            {{-- Grafik muncul di awal --}}
            <div class="mb-4">
                <div id="ggb-eksplorasi-tegak"></div>
                <p class="mt-3 mb-0">
                    Amati kedua pasangan garis pada grafik di atas. Masing-masing pasangan garis tampak berpotongan
                    membentuk sudut siku-siku.
                </p>
            </div>

            {{-- Tabel gradien --}}
            <div id="stepT1" class="mt-4">
                <p class="mt-2">
                    Hitung gradien masing-masing garis pada grafik tersebut.
                </p>

                <div class="table-responsive mb-3" style="max-width: 550px;">
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
                                <td>$A(-4,-2)$ dan $B(-2,2)$</td>
                                <td>
                                    <input type="text" id="tm1" class="form-control text-center mx-auto"
                                        style="width: 70px">
                                </td>
                            </tr>
                            <tr>
                                <td>$CD$</td>
                                <td>$C(-4,2)$ dan $D(0,0)$</td>
                                <td>
                                    <input type="text" id="tm2" class="form-control text-center mx-auto"
                                        style="width: 70px">
                                </td>
                            </tr>
                            <tr>
                                <td>$EF$</td>
                                <td>$E(1,-1)$ dan $F(5,1)$</td>
                                <td>
                                    <input type="text" id="tm3" class="form-control text-center mx-auto"
                                        style="width: 70px">
                                </td>
                            </tr>
                            <tr>
                                <td>$GH$</td>
                                <td>$G(2,3)$ dan $H(4,-1)$</td>
                                <td>
                                    <input type="text" id="tm4" class="form-control text-center mx-auto"
                                        style="width: 70px">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <button class="btn btn-palet" onclick="cekStepT1()">Cek Jawaban</button>
                <div id="fbT1" class="mt-2"></div>
            </div>

            {{-- Hasil kali gradien --}}
            <div id="stepT2" class="d-none mt-4">
                <p>
                    Sekarang, hitung hasil kali gradien dari setiap pasangan garis.
                </p>

                <div style="max-width:500px; margin:auto;">
                    <table class="table table-bordered text-center align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Pasangan Garis</th>
                                <th>Hasil Kali Gradien</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>$m_{AB} \times m_{CD}$</td>
                                <td><input type="text" id="kali1" class="form-control text-center mx-auto"
                                        style="width: 70px"></td>
                            </tr>
                            <tr>
                                <td>$m_{EF} \times m_{GH}$</td>
                                <td><input type="text" id="kali2" class="form-control text-center mx-auto"
                                        style="width: 70px"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <button class="btn btn-palet" onclick="cekStepT2()">Cek Jawaban</button>
                <div id="fbT2" class="mt-2"></div>
            </div>

            {{-- Kesimpulan --}}
            <div id="stepT3" class="d-none mt-4">
                <p>
                    Berdasarkan hasil yang kamu peroleh, lengkapilah kesimpulan berikut.
                </p>

                <p>
                    Jika dua garis saling tegak lurus, maka hasil kali gradien kedua garis tersebut adalah
                    <select id="pilihT1" class="form-select d-inline w-auto">
                        <option value="">Pilih</option>
                        <option value="-1">-1</option>
                        <option value="1">1</option>
                        <option value="0">0</option>
                    </select>.
                </p>

                <button class="btn btn-palet" onclick="cekStepT3()">Simpan Kesimpulan</button>
                <div id="fbT3" class="mt-2"></div>
            </div>

            <div id="kesimpulanT" class="d-none mt-3 box-kesimpulan">
                Pada grafik, terdapat pasangan garis yang saling tegak lurus yaitu garis AB dan CD serta garis EF dan GH.
                Hasil kali
                gradien masing-masing pasangan garis tersebut adalah $m_{AB} \times m_{CD} = -1$ dan $m_{EF} \times m_{GH} =
                -1$. Jadi, jika dua garis saling tegak lurus, maka hasil kali gradien kedua garis tersebut adalah $-1$.
            </div>
        </div>
    </div>

    {{-- ========================================================= --}}
    {{-- MATERI KONSEP --}}
    {{-- ========================================================= --}}
    <div class="card card-materi mt-4 mb-4">
        <div class="card-body">
            <span class="badge-sub">Konsep Gradien Garis-Garis Saling Tegak Lurus</span>

            <p class="mt-3" style="line-height:1.8;">
                Berdasarkan hasil eksplorasi, diperoleh bahwa pada dua garis yang saling tegak lurus
                terdapat hubungan khusus antara gradien kedua garis tersebut.
                Hubungan dua garis yang saling tegak lurus dapat diamati pada Gambar 3.5.
            </p>

            <div class="text-center my-4">
                <img src="{{ asset('img/hubungan gradien garis/gradiengarissalingtegaklurus.png') }}"
                    alt="Dua garis yang saling tegak lurus" class="img-fluid rounded zoomable"
                    style="max-width:300px; width:100%; cursor:zoom-in;">

                <small class="text-muted d-block mt-2">
                    <strong>Gambar 3.5</strong> Dua garis yang saling tegak lurus
                </small>
            </div>

            <p style="line-height:1.8;">
                Pada Gambar 3.5, garis <b>$k$</b> dan garis <b>$l$</b> berpotongan membentuk sudut siku-siku,
                sehingga kedua garis tersebut saling tegak lurus.
            </p>

            <p style="line-height:1.8;">
                Misalkan gradien garis <b>$k$</b> adalah <b>$m_1$</b> dan gradien garis <b>$l$</b> adalah <b>$m_2$</b>.
                Dari hasil perhitungan, diperoleh bahwa hasil kali kedua gradien tersebut selalu memenuhi:
            </p>

            <div class="rumus-box text-center my-3 mx-auto" style="width: fit-content">
                $$m_1 \times m_2 = -1$$
            </div>

            <p style="line-height:1.8;">
                Jadi, dapat disimpulkan bahwa:
            </p>

            <div class="box-kesimpulan mt-3 mx-auto" style="width: fit-content;">
                Dua garis saling tegak lurus jika hasil kali gradien kedua garis tersebut sama dengan <b>$-1$</b>.
            </div>

            <p class="mt-4 mb-2" style="line-height:1.8;">
                Jika suatu garis memiliki gradien <b>$m_1$</b>, maka gradien garis yang tegak lurus
                terhadapnya adalah:
            </p>

            <div class="rumus-box text-center my-3 mx-auto" style="width: fit-content; min-width: 180px;">
                $$m_2=-\frac{1}{m_1}$$
            </div>

            <p style="line-height:1.8;">
                Artinya, gradien garis yang tegak lurus diperoleh dengan cara <b>membalik gradien</b>,
                kemudian <b>mengubah tandanya</b>.
            </p>
        </div>
    </div>

    {{-- Contoh Soal --}}
    <div class="box-contoh mt-5 mb-4">
        <div class="card-body">
            <span class="title-box">Contoh</span>

            <div class="mt-3" style="line-height:1.8; text-align:justify;">

                <p class="mb-2">
                    Diketahui garis <b>$a$</b> melalui titik <b>$(1,2)$</b> dan <b>$(5,6)$</b>,
                    sedangkan garis <b>$b$</b> melalui titik <b>$(3,4)$</b> dan <b>$(7,0)$</b>.
                    Tentukan apakah garis <b>$a$</b> dan garis <b>$b$</b> saling tegak lurus.
                </p>

                <p class="mb-1"><b>Penyelesaian:</b></p>

                <p class="mb-2">
                    Untuk menentukan apakah dua garis saling tegak lurus, tentukan terlebih dahulu
                    gradien masing-masing garis.
                </p>

                <p class="mb-2">
                    Gradien garis <b>$a$</b> adalah
                    $m_a = \frac{y_2-y_1}{x_2-x_1}
                    = \frac{6-2}{5-1}
                    = \frac{4}{4}
                    = 1$.
                </p>

                <p class="mb-2">
                    Gradien garis <b>$b$</b> adalah
                    $m_b = \frac{y_2-y_1}{x_2-x_1}
                    = \frac{0-4}{7-3}
                    = \frac{-4}{4}
                    = -1$.
                </p>

                <p class="mb-2">
                    Selanjutnya, kalikan kedua gradien tersebut:
                    $m_a \times m_b = 1 \times (-1) = -1$.
                </p>

                <p class="mb-0">
                    Karena hasil kali gradien kedua garis adalah $-1$, maka garis <b>$a$</b>
                    dan garis <b>$b$</b> saling tegak lurus.
                </p>

                <hr class="my-4">

                <p class="mb-2">
                    <b>Coba Tentukan: </b> Jika gradien suatu garis adalah <b>$2$</b>,
                    berapakah gradien garis yang tegak lurus dengannya?
                </p>

                <div class="d-flex flex-wrap align-items-center gap-2">
                    <span>Gradien garis yang tegak lurus adalah</span>
                    <input type="text" id="cek-cepat-tegak" class="form-control form-control-sm text-center bg-white"
                        style="width:100px;" placeholder="Jawaban">

                    <button class="btn btn-palet btn-sm" type="button" onclick="cekCepatTegak()">
                        Cek Jawaban
                    </button>
                </div>

                <div id="fb-cek-cepat-tegak" class="mt-2"></div>

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

    <div class="box-latihan mt-5 mb-4" id="latihanC3Box">
        <div class="card-body">
            <span class="title-box">Latihan Soal</span>

            <!-- ===================== -->
            <!-- LATIHAN 1 -->
            <!-- ===================== -->
            <div class="latihan-step" id="latihanStep1">
                <p class="mt-3" style="line-height:1.8;">
                    <b>1.</b> Tentukan persamaan garis yang tegak lurus dengan garis <b>$y = 3x - 2$</b>.
                </p>

                <p>
                    a. $x + 3y - 6 = 0$ <br>
                    b. $2x - 3y + 9 = 0$
                </p>

                <div class="petunjuk-mini-latihan">
                    <strong>Petunjuk:</strong>
                    Isilah setiap langkah penyelesaian pada kolom yang tersedia, lalu tuliskan persamaan garis yang tegak
                    lurus.
                </div>


                <div class="border rounded-4 p-4 mb-3" style="background:#f7f9fc;">
                    <p class="fw-bold mb-4">Penyelesaian:</p>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="pe-md-3 border-end">
                                <div class="mb-4">
                                    <p class="mb-2">Gradien garis $y = 3x - 2$ adalah:</p>
                                    <div class="d-inline-flex align-items-center gap-2">
                                        <span>$m_1 =$</span>
                                        <input type="text" id="l_m1"
                                            class="form-control form-control-sm text-center" style="width:90px;">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <p class="mb-2">Ubah persamaan (a) ke bentuk $y = mx + c$, gradiennya adalah:</p>
                                    <div class="d-inline-flex align-items-center gap-2">
                                        <span>$m_a =$</span>
                                        <input type="text" id="l_ma"
                                            class="form-control form-control-sm text-center" style="width:90px;">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <p class="mb-2">Ubah persamaan (b) ke bentuk $y = mx + c$, gradiennya adalah:</p>
                                    <div class="d-inline-flex align-items-center gap-2">
                                        <span>$m_b =$</span>
                                        <input type="text" id="l_mb"
                                            class="form-control form-control-sm text-center" style="width:90px;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="ps-md-3">
                                <p class="mb-3">Karena dua garis tegak lurus memiliki hasil kali gradien $-1$, maka:</p>

                                <div class="mb-3 d-flex align-items-center gap-2 flex-wrap">
                                    <span>$m_1 \times m_a =$</span>
                                    <input type="text" id="l_kali_a" class="form-control form-control-sm text-center"
                                        style="width:90px;">
                                </div>

                                <div class="mb-4 d-flex align-items-center gap-2 flex-wrap">
                                    <span>$m_1 \times m_b =$</span>
                                    <input type="text" id="l_kali_b" class="form-control form-control-sm text-center"
                                        style="width:90px;">
                                </div>

                                <div class="mb-4">
                                    <p class="mb-2">
                                        Jadi, persamaan garis yang tegak lurus dengan garis $y = 3x - 2$ adalah:
                                    </p>
                                    <input type="text" id="l_jawaban" class="form-control form-control-sm"
                                        style="max-width:220px;" placeholder="Tulis persamaan lengkap">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <div>
                            <button class="btn btn-palet btn-sm" type="button" onclick="cekLatihanTegak()">
                                Cek Jawaban
                            </button>

                            <button class="btn btn-palet btn-sm" type="button" onclick="resetLatihanTegak()">
                                Reset
                            </button>
                        </div>

                        <button id="nextBtnLatihan1" class="btn btn-palet btn-sm" type="button"
                            onclick="nextLatihan(2)" disabled>
                            Lanjut ke Latihan 2
                        </button>
                    </div>

                    <div id="fbLatihanTegak" class="mt-3"></div>
                </div>
            </div>

            <!-- ===================== -->
            <!-- LATIHAN 2 -->
            <!-- ===================== -->
            <div class="latihan-step" id="latihanStep2" style="display:none;">
                <hr class="my-4">

                <p class="mt-3" style="line-height:1.8;">
                    <b>2.</b> Seorang perencana kota akan membuat jalan <b>$k$</b> yang tegak lurus terhadap jalan lama.
                    Pada peta, jalan lama melalui titik <b>$A(200, 150)$</b> dan <b>$B(700, 50)$</b>.
                    Tentukan gradien jalan <b>$k$</b>.
                </p>
                <div class="petunjuk-mini-latihan">
                    <strong>Petunjuk:</strong>
                    Isilah setiap langkah penyelesaian pada kolom yang tersedia sampai diperoleh gradien jalan \(k\).
                </div>

                <div class="border rounded-4 p-4 mb-3" style="background:#f7f9fc;">
                    <p class="fw-bold mb-4">Penyelesaian:</p>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="pe-md-3 border-end">
                                <div class="mb-4">
                                    <p class="mb-2">Gradien jalan yang melalui titik $A(200,150)$ dan $B(700,50)$ adalah:
                                    </p>
                                    <div class="d-inline-flex align-items-center gap-2" style="line-height:2;">
                                        <span>$m_{AB} =$</span>

                                        <div class="frac-input">
                                            <div class="top">
                                                <input type="text" id="l2_mab_atas"
                                                    class="form-control form-control-sm text-center">
                                            </div>
                                            <div class="bottom">
                                                <input type="text" id="l2_mab_bawah"
                                                    class="form-control form-control-sm text-center">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <p class="mb-2">Karena jalan $k$ tegak lurus dengan jalan $AB$, maka:</p>
                                    <div class="d-inline-flex align-items-center gap-2 flex-wrap">
                                        <span>$m_k \times m_{AB} =$</span>
                                        <input type="text" id="l2_hubungan"
                                            class="form-control form-control-sm text-center" style="width:90px;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="ps-md-3">
                                <div class="mb-4">
                                    <p class="mb-2">Substitusikan nilai $m_{AB}$:</p>
                                    <div class="mb-3 d-flex align-items-center gap-2" style="line-height:2;">
                                        <span>$m_k \times$</span>

                                        <div class="frac-input">
                                            <div class="top">
                                                <input type="text" id="l2_atas"
                                                    class="form-control form-control-sm text-center">
                                            </div>
                                            <div class="bottom">
                                                <input type="text" id="l2_bawah"
                                                    class="form-control form-control-sm text-center">
                                            </div>
                                        </div>

                                        <span>$=$</span>

                                        <input type="text" id="l2_hasil_subs"
                                            class="form-control form-control-sm text-center" style="width:80px;">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <p class="mb-2">Jadi, gradien jalan $k$ adalah:</p>
                                    <input type="text" id="l2_jawaban"
                                        class="form-control form-control-sm text-center" style="width:120px;"
                                        placeholder="Tulis gradien">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <button class="btn btn-palet btn-sm" type="button" onclick="prevLatihan(1)">
                            Kembali ke Latihan 1
                        </button>

                        <div>
                            <button class="btn btn-palet btn-sm" type="button" onclick="cekLatihan2()">
                                Cek Jawaban
                            </button>

                            <button class="btn btn-palet btn-sm" type="button" onclick="resetLatihan2()">
                                Reset
                            </button>
                        </div>
                    </div>

                    <div id="fbLatihan2" class="mt-3"></div>
                    <div id="pesanAkhirLatihan" class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://www.geogebra.org/apps/deployggb.js"></script>
    <script>
        // =========================
        // GeoGebra Eksplorasi Tegak Lurus
        // =========================
        let appletEksTegak = null;
        let sudahLoadTegak = false;

        function ggbOnLoadEksTegak(api) {
            api.setPerspective("G");

            api.setAxesVisible(true, true);
            api.setGridVisible(true);

            api.setGraphicsOptions(1, {
                gridDistance: [1, 1],
                minorGrid: false,
            });

            api.setGraphicsOptions(1, {
                gridType: 0,
            });

            api.setAxisSteps(1, 1, 1, 1);

            // =========================
            // Titik
            // =========================
            api.evalCommand("A=(-4,-2)");
            api.evalCommand("B=(-2,2)");

            api.evalCommand("C=(-4,2)");
            api.evalCommand("D=(0,0)");

            api.evalCommand("E=(1,-1)");
            api.evalCommand("F=(5,1)");

            api.evalCommand("G=(2,3)");
            api.evalCommand("H=(4,-1)");

            // =========================
            // Segment
            // =========================
            api.evalCommand("s1=Segment(A,B)");
            api.evalCommand("s2=Segment(C,D)");

            api.evalCommand("s3=Segment(E,F)");
            api.evalCommand("s4=Segment(G,H)");

            // =========================
            // Style titik
            // =========================
            ["A", "B", "C", "D", "E", "F", "G", "H"].forEach(function(obj) {
                api.setLabelVisible(obj, true);
                api.setFixed(obj, true, false);

                api.setPointSize(obj, 5);

                api.setColor(obj, 0, 0, 0);
            });

            // =========================
            // Style garis merah
            // =========================
            ["s1", "s2"].forEach(function(obj) {
                api.setLabelVisible(obj, false);

                api.setLineThickness(obj, 5);

                api.setColor(obj, 220, 60, 35);
            });

            // =========================
            // Style garis biru
            // =========================
            ["s3", "s4"].forEach(function(obj) {
                api.setLabelVisible(obj, false);

                api.setLineThickness(obj, 5);

                api.setColor(obj, 40, 120, 220);
            });

            // =========================
            // Viewport responsive
            // =========================
            api.setAxesVisible(true, true);
            api.setGridVisible(true);

            if (window.innerWidth <= 768) {
                // mobile → lebih zoom in
                api.setCoordSystem(-4.5, 4.5, -3.5, 3.5);
            } else {
                // desktop
                api.setCoordSystem(-6, 6, -5, 5);
            }
        }

        function tampilkanGrafikTegak() {

            if (sudahLoadTegak) return;

            let ggbWidth;
            let ggbHeight;

            if (window.innerWidth <= 768) {

                const container = document.getElementById("ggb-eksplorasi-tegak");

                ggbWidth = container.clientWidth - 20;

                ggbHeight = 300;

            } else {

                ggbWidth = 500;
                ggbHeight = 400;
            }

            const paramsEksTegak = {

                appName: "classic",

                id: "ggbAppletEksTegak",

                width: ggbWidth,

                height: ggbHeight,

                showToolBar: false,

                showAlgebraInput: false,

                showMenuBar: false,

                enableRightClick: false,

                showResetIcon: true,

                appletOnLoad: ggbOnLoadEksTegak,
            };

            appletEksTegak = new GGBApplet(paramsEksTegak, true);

            appletEksTegak.inject("ggb-eksplorasi-tegak");

            sudahLoadTegak = true;
        }

        window.addEventListener("load", function() {
            tampilkanGrafikTegak();
        });

        // =========================
        // Helper Umum
        // =========================
        function parseNilai(v) {
            v = (v || "").toString().trim().replace(",", ".");

            if (v.includes("/")) {
                const parts = v.split("/");
                if (parts.length === 2) {
                    const a = Number(parts[0]);
                    const b = Number(parts[1]);
                    if (!isNaN(a) && !isNaN(b) && b !== 0) {
                        return a / b;
                    }
                }
            }

            const n = Number(v);
            return isNaN(n) ? null : n;
        }

        function samaNilai(inputId, kunci, toleransi = 1e-9) {
            const el = document.getElementById(inputId);
            if (!el) return false;

            const nilaiUser = parseNilai(el.value);
            const nilaiKunci = parseNilai(kunci);

            if (nilaiUser === null || nilaiKunci === null) return false;
            return Math.abs(nilaiUser - nilaiKunci) < toleransi;
        }

        function normalisasiNilai(teks) {
            return (teks || "")
                .toString()
                .trim()
                .toLowerCase()
                .replace(/\s+/g, "")
                .replace(/,/g, ".");
        }

        function cocokJawaban(input, daftarBenar) {
            const nilai = normalisasiNilai(input);
            return daftarBenar.some((jawaban) => normalisasiNilai(jawaban) === nilai);
        }

        function renderUlangKatex(container) {
            if (window.renderMathInElement && container) {
                renderMathInElement(container, {
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
                    throwOnError: false,
                });
            }
        }

        function nonaktifkanTombolDi(containerId) {
            const container = document.getElementById(containerId);
            if (!container) return;

            const buttons = container.querySelectorAll("button");
            buttons.forEach((btn) => {
                btn.disabled = true;
            });
        }

        function tandaiTombolPilihan(containerId, jawabanBenar, jawabanDipilih) {
            const container = document.getElementById(containerId);
            if (!container) return;

            const buttons = container.querySelectorAll("button");
            buttons.forEach((btn) => {
                const onclickAttr = btn.getAttribute("onclick") || "";

                btn.classList.remove(
                    "btn-outline-primary",
                    "btn-success",
                    "btn-danger",
                    "btn-secondary",
                );

                if (onclickAttr.includes(`'${jawabanBenar}'`)) {
                    btn.classList.add("btn-success");
                } else if (onclickAttr.includes(`'${jawabanDipilih}'`)) {
                    btn.classList.add("btn-danger");
                } else {
                    btn.classList.add("btn-secondary");
                }
            });
        }

        function tampilkanStep(id) {
            const el = document.getElementById(id);
            if (el) {
                el.classList.remove("d-none");
            }
        }
        // =========================
        // Eksplorasi
        // =========================
        function cekStepT1() {
            let benar = 0;
            let pesan = [];

            if (samaNilai("tm1", "2")) benar++;
            else pesan.push("Gradien AB belum tepat.");

            if (samaNilai("tm2", "-1/2")) benar++;
            else pesan.push("Gradien CD belum tepat.");

            if (samaNilai("tm3", "1/2")) benar++;
            else pesan.push("Gradien EF belum tepat.");

            if (samaNilai("tm4", "-2")) benar++;
            else pesan.push("Gradien GH belum tepat.");

            const fb = document.getElementById("fbT1");

            if (benar === 4) {
                fb.innerHTML = `<div class="alert alert-success">Semua gradien sudah benar.</div>`;
                document.getElementById("stepT2").classList.remove("d-none");
            } else {
                fb.innerHTML = `<div class="alert alert-warning">${pesan.join("<br>")}</div>`;
            }

            renderUlangKatex(fb);
        }

        function cekStepT2() {
            let benar = 0;
            let pesan = [];

            if (samaNilai("kali1", "-1")) benar++;
            else pesan.push("Hasil kali gradien pasangan pertama belum tepat.");

            if (samaNilai("kali2", "-1")) benar++;
            else pesan.push("Hasil kali gradien pasangan kedua belum tepat.");

            const fb = document.getElementById("fbT2");

            if (benar === 2) {
                fb.innerHTML = `<div class="alert alert-success">Bagus. Sekarang kamu bisa membuat kesimpulan.</div>`;
                document.getElementById("stepT3").classList.remove("d-none");
            } else {
                fb.innerHTML = `<div class="alert alert-warning">${pesan.join("<br>")}</div>`;
            }

            renderUlangKatex(fb);
        }

        function cekStepT3() {
            const pilih = document.getElementById("pilihT1").value;
            const fb = document.getElementById("fbT3");

            if (pilih === "-1") {
                fb.innerHTML = `<div class="alert alert-success">Kesimpulanmu benar.</div>`;
                document.getElementById("kesimpulanT").classList.remove("d-none");
            } else {
                fb.innerHTML =
                    `<div class="alert alert-warning">Perhatikan kembali hasil kali gradien pada langkah sebelumnya.</div>`;
            }

            renderUlangKatex(fb);
        }

        // =========================
        // Contoh Soal
        // =========================
        function cekCepatTegak() {
            const input = document.getElementById("cek-cepat-tegak");
            const fb = document.getElementById("fb-cek-cepat-tegak");
            const jawaban = (input.value || "")
                .trim()
                .replace(/\s+/g, "")
                .replace(",", ".");

            const benar =
                jawaban === "-1/2" || jawaban === "-0.5" || jawaban === "(-1)/2";

            if (benar) {
                fb.innerHTML = `
        <div class="alert alert-success mt-2">
            Benar. Gradien garis yang tegak lurus dapat ditentukan dengan rumus
            <b>$m_2 = -\\frac{1}{m_1}$</b>.
            Karena gradien garis pertama adalah <b>$2$</b>, maka
            <b>$m_2 = -\\frac{1}{2}$</b>.
        </div>
    `;
                input.disabled = true;
            } else {
                fb.innerHTML = `
        <div class="alert alert-warning mt-2">
            Coba gunakan rumus gradien garis yang tegak lurus,
            yaitu <b>$m_2 = -\\frac{1}{m_1}$</b>.
            Jika <b>$m_1 = 2$</b>, maka
            maka berapa nilai $m_2$?
        </div>
    `;
            }
            renderUlangKatex(fb);
        }

        // =========================
        // LATIHAN SUBBAB C3
        // =========================

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

        function cocokJawaban(input, daftarJawaban) {
            const nilai = norm(input);
            return daftarJawaban.map(norm).includes(nilai);
        }

        function renderUlangKatex(target) {
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

        document.addEventListener("DOMContentLoaded", function() {
            renderUlangKatex(document.getElementById("latihanC3Box") || document.body);
            restoreProgressC3();
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
            renderUlangKatex(step);
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

        function setValid(id, benar) {
            const el = document.getElementById(id);
            if (!el) return;

            el.classList.remove("is-valid", "is-invalid");
            el.classList.add(benar ? "is-valid" : "is-invalid");
        }

        function clearInput(ids) {
            ids.forEach((id) => {
                const el = document.getElementById(id);

                if (el) {
                    el.value = "";
                    el.classList.remove("is-valid", "is-invalid");
                }
            });
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

        // simpan jawaban
        function ambilJawabanLatihan1C3() {
            return {
                l_m1: document.getElementById("l_m1")?.value.trim() ?? "",
                l_ma: document.getElementById("l_ma")?.value.trim() ?? "",
                l_mb: document.getElementById("l_mb")?.value.trim() ?? "",
                l_kali_a: document.getElementById("l_kali_a")?.value.trim() ?? "",
                l_kali_b: document.getElementById("l_kali_b")?.value.trim() ?? "",
                l_jawaban: document.getElementById("l_jawaban")?.value.trim() ?? "",
            };
        }

        function ambilJawabanLatihan2C3() {
            return {
                l2_mab_atas: document.getElementById("l2_mab_atas")?.value.trim() ?? "",
                l2_mab_bawah: document.getElementById("l2_mab_bawah")?.value.trim() ?? "",
                l2_hubungan: document.getElementById("l2_hubungan")?.value.trim() ?? "",
                l2_atas: document.getElementById("l2_atas")?.value.trim() ?? "",
                l2_bawah: document.getElementById("l2_bawah")?.value.trim() ?? "",
                l2_hasil_subs: document.getElementById("l2_hasil_subs")?.value.trim() ?? "",
                l2_jawaban: document.getElementById("l2_jawaban")?.value.trim() ?? "",
            };
        }

        // =========================
        // LATIHAN 1
        // =========================
        async function cekLatihanTegak() {
            const m1 = document.getElementById("l_m1")?.value;
            const ma = document.getElementById("l_ma")?.value;
            const mb = document.getElementById("l_mb")?.value;
            const kaliA = document.getElementById("l_kali_a")?.value;
            const kaliB = document.getElementById("l_kali_b")?.value;
            const jawaban = document.getElementById("l_jawaban")?.value;

            const benarM1 = cocokJawaban(m1, ["3"]);
            const benarMa = cocokJawaban(ma, ["-1/3", "-0.3333", "-0.33"]);
            const benarMb = cocokJawaban(mb, ["2/3", "0.6667", "0.67"]);
            const benarKaliA = cocokJawaban(kaliA, ["-1"]);
            const benarKaliB = cocokJawaban(kaliB, ["2"]);

            const benarJawaban = cocokJawaban(jawaban, [
                "x+3y-6=0",
                "x+3y=6",
                "a",
                "persamaana",
                "garisa",
            ]);

            const feedback = document.getElementById("fbLatihanTegak");
            const nextBtn = document.getElementById("nextBtnLatihan1");

            setValid("l_m1", benarM1);
            setValid("l_ma", benarMa);
            setValid("l_mb", benarMb);
            setValid("l_kali_a", benarKaliA);
            setValid("l_kali_b", benarKaliB);
            setValid("l_jawaban", benarJawaban);

            if (
                benarM1 &&
                benarMa &&
                benarMb &&
                benarKaliA &&
                benarKaliB &&
                benarJawaban
            ) {
                feedback.innerHTML = `
            <div class="alert alert-success rounded-3 mb-0">
                Bagus, semua langkah sudah tepat. Persamaan yang tegak lurus adalah $x + 3y - 6 = 0$.
                Silakan lanjut ke latihan berikutnya.
            </div>
        `;

                if (nextBtn) nextBtn.disabled = false;
                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L1`,
                    "input",
                    ambilJawabanLatihan1C3(),
                    true
                );
            } else {
                let petunjuk = [];

                if (!benarM1) {
                    petunjuk.push(
                        "Periksa kembali gradien pada persamaan <b>$y = 3x - 2$</b>. Pada bentuk <b>$y = mx + c$</b>, gradien adalah koefisien <b>$x$</b>.",
                    );
                }

                if (!benarMa) {
                    petunjuk.push(
                        "Untuk garis <b>(a)</b>, ubah dulu ke bentuk <b>$y = mx + c$</b>, lalu tentukan gradiennya dari koefisien <b>$x$</b>.",
                    );
                }

                if (!benarMb) {
                    petunjuk.push(
                        "Untuk garis <b>(b)</b>, ubah dulu ke bentuk <b>$y = mx + c$</b>, lalu tentukan gradiennya dari koefisien <b>$x$</b>.",
                    );
                }

                if (!benarKaliA) {
                    petunjuk.push(
                        "Hitung kembali hasil kali <b>$m_1 \\times m_a$</b>. Bandingkan hasilnya dengan syarat dua garis tegak lurus.",
                    );
                }

                if (!benarKaliB) {
                    petunjuk.push(
                        "Hitung kembali hasil kali <b>$m_1 \\times m_b$</b>.",
                    );
                }

                if (!benarJawaban) {
                    petunjuk.push(
                        "Pilih persamaan garis yang menghasilkan hasil kali gradien <b>$-1$</b>, lalu tuliskan persamaan garisnya dengan lengkap.",
                    );
                }

                feedback.innerHTML = `
            <div class="alert alert-warning rounded-3 mb-0">
                <b>Coba perhatikan lagi:</b>
                <ul class="mb-0 mt-2">
                    ${petunjuk.map((item) => `<li>${item}</li>`).join("")}
                </ul>
            </div>
        `;

                if (nextBtn) nextBtn.disabled = true;
                resetStepSetelah(2);
            }

            renderUlangKatex(feedback);
        }

        function resetLatihanTegak() {
            clearInput(["l_m1", "l_ma", "l_mb", "l_kali_a", "l_kali_b", "l_jawaban"]);

            const fb = document.getElementById("fbLatihanTegak");
            const nextBtn = document.getElementById("nextBtnLatihan1");

            if (fb) fb.innerHTML = "";
            if (nextBtn) nextBtn.disabled = true;

            resetStepSetelah(2);
        }

        // =========================
        // LATIHAN 2
        // =========================
        async function cekLatihan2() {
            const mabAtas = document.getElementById("l2_mab_atas")?.value;
            const mabBawah = document.getElementById("l2_mab_bawah")?.value;
            const hubungan = document.getElementById("l2_hubungan")?.value;
            const atas = document.getElementById("l2_atas")?.value;
            const bawah = document.getElementById("l2_bawah")?.value;
            const hasilSubs = document.getElementById("l2_hasil_subs")?.value;
            const jawaban = document.getElementById("l2_jawaban")?.value;

            const benarMabAtas = cocokJawaban(mabAtas, ["-1"]);
            const benarMabBawah = cocokJawaban(mabBawah, ["5"]);
            const benarHubungan = cocokJawaban(hubungan, ["-1"]);
            const benarAtas = cocokJawaban(atas, ["-1"]);
            const benarBawah = cocokJawaban(bawah, ["5"]);
            const benarHasilSubs = cocokJawaban(hasilSubs, ["-1"]);
            const benarJawaban = cocokJawaban(jawaban, ["5"]);

            const feedback = document.getElementById("fbLatihan2");
            const akhir = document.getElementById("pesanAkhirLatihan");

            setValid("l2_mab_atas", benarMabAtas);
            setValid("l2_mab_bawah", benarMabBawah);
            setValid("l2_hubungan", benarHubungan);
            setValid("l2_atas", benarAtas);
            setValid("l2_bawah", benarBawah);
            setValid("l2_hasil_subs", benarHasilSubs);
            setValid("l2_jawaban", benarJawaban);

            if (
                benarMabAtas &&
                benarMabBawah &&
                benarHubungan &&
                benarAtas &&
                benarBawah &&
                benarHasilSubs &&
                benarJawaban
            ) {
                feedback.innerHTML = `
            <div class="alert alert-success rounded-3 mb-0">
                Bagus, semua langkah sudah tepat. Gradien jalan $k$ adalah $5$.
            </div>
        `;

                if (akhir) {
                    akhir.innerHTML = `
                <div class="alert alert-success fw-semibold text-center mt-3">
                    Bagus, kamu sudah memahami hubungan gradien dua garis yang tegak lurus.
                    Silakan lanjut ke kuis subbab C.
                </div>
            `;
                    renderUlangKatex(akhir);
                }

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L2`,
                    "input",
                    ambilJawabanLatihan2C3(),
                    true
                );

                const saved = await saveProgressMateri();

                if (saved) {
                    bukaQuizButton();
                } else if (akhir) {
                    akhir.innerHTML += `
                <div class="alert alert-warning mt-2 mb-0">
                    Jawaban benar, tetapi progres belum tersimpan. Coba cek koneksi atau refresh halaman.
                </div>
            `;
                }
            } else {
                let petunjuk = [];

                if (!benarMabAtas || !benarMabBawah) {
                    petunjuk.push(
                        "Perhatikan kembali gradien jalan $AB$. Tuliskan dalam bentuk pecahan yang sudah disederhanakan.",
                    );
                }

                if (!benarHubungan) {
                    petunjuk.push(
                        "Ingat, dua garis yang saling tegak lurus memiliki hasil kali gradien $-1$.",
                    );
                }

                if (!benarAtas || !benarBawah) {
                    petunjuk.push(
                        "Substitusikan kembali nilai gradien $AB$ ke bentuk $m_k \\times m_{AB} = -1$.",
                    );
                }

                if (!benarHasilSubs) {
                    petunjuk.push(
                        "Perhatikan ruas kanan pada hubungan dua garis tegak lurus. Nilainya tetap $-1$.",
                    );
                }

                if (!benarJawaban) {
                    petunjuk.push(
                        "Dari bentuk $m_k \\times \\left(-\\frac{1}{5}\\right) = -1$, cari nilai $m_k$ dengan membagi kedua ruas oleh $-\\frac{1}{5}$.",
                    );
                }

                feedback.innerHTML = `
            <div class="alert alert-warning rounded-3 mb-0">
                <b>Coba perhatikan lagi:</b>
                <ul class="mb-0 mt-2">
                    ${petunjuk.map((item) => `<li>${item}</li>`).join("")}
                </ul>
            </div>
        `;

                if (akhir) akhir.innerHTML = "";
            }

            renderUlangKatex(feedback);
        }

        function resetLatihan2() {
            clearInput([
                "l2_mab_atas",
                "l2_mab_bawah",
                "l2_hubungan",
                "l2_atas",
                "l2_bawah",
                "l2_hasil_subs",
                "l2_jawaban",
            ]);

            const fb = document.getElementById("fbLatihan2");
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

        function restoreLatihan1C3() {
            const saved = SAVED_LATIHAN[`${MATERI_SLUG}_L1`]?.jawaban;

            if (!saved) return;

            Object.entries(saved).forEach(([id, value]) => {
                setValueSafe(id, value);
            });

            beriValid(Object.keys(saved));

            const fb = document.getElementById("fbLatihanTegak");
            const nextBtn = document.getElementById("nextBtnLatihan1");
            const latihan2 = document.getElementById("latihanStep2");

            if (fb) {
                fb.innerHTML = `
            <div class="alert alert-success rounded-3 mb-0">
                Jawaban Latihan 1 sudah tersimpan.
            </div>
        `;
                renderUlangKatex(fb);
            }

            if (nextBtn) nextBtn.disabled = false;
            if (latihan2) latihan2.style.display = "block";
        }

        function restoreLatihan2C3() {
            const saved = SAVED_LATIHAN[`${MATERI_SLUG}_L2`]?.jawaban;

            if (!saved) return;

            Object.entries(saved).forEach(([id, value]) => {
                setValueSafe(id, value);
            });

            beriValid(Object.keys(saved));

            const latihan2 = document.getElementById("latihanStep2");
            const fb = document.getElementById("fbLatihan2");
            const akhir = document.getElementById("pesanAkhirLatihan");

            if (latihan2) latihan2.style.display = "block";

            if (fb) {
                fb.innerHTML = `
            <div class="alert alert-success rounded-3 mb-0">
                Jawaban Latihan 2 sudah tersimpan.
            </div>
        `;
                renderUlangKatex(fb);
            }

            if (akhir) {
                akhir.innerHTML = `
            <div class="alert alert-success fw-semibold text-center mt-3">
                Bagus, kamu sudah memahami hubungan gradien dua garis yang tegak lurus.
                Silakan lanjut ke kuis subbab C.
            </div>
        `;
                renderUlangKatex(akhir);
            }

            bukaQuizButton();
        }

        function restoreProgressC3() {
            restoreLatihan1C3();
            restoreLatihan2C3();

            if (IS_MATERI_COMPLETED) {
                const latihan2 = document.getElementById("latihanStep2");
                const nextBtn1 = document.getElementById("nextBtnLatihan1");

                if (latihan2) latihan2.style.display = "block";
                if (nextBtn1) nextBtn1.disabled = false;

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
