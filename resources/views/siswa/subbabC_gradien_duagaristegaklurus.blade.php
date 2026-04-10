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
            background: #f7f9fc;
            border: 1px solid #dbe5f1;
            border-radius: 12px;
            padding: 14px 16px;
            overflow-x: auto;
            font-size: 20px;
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
    </style>

    {{-- Judul --}}
    <h1 class="mb-3" style="font-weight: 600;">C. Hubungan Gradien Garis</h1>

    {{-- Tujuan Pembelajaran --}}
    <div class="card card-tujuan mb-4">
        <div class="card-body">
            <h5>Tujuan Pembelajaran:</h5>
            <ol>
                <li>Siswa dapat menjelaskan hubungan gradien garis</li>
                <li>Siswa dapat menentukan gradien dari garis-garis yang saling sejajar</li>
                <li>Siswa dapat menentukan gradien dari garis-garis yang saling tegak lurus</li>
            </ol>
        </div>
    </div>

    {{-- Subjudul --}}
    <h2 class="mt-2 mb-3" style="font-weight: 600;">3. Gradien Garis-garis yang Saling Tegak Lurus</h2>

    <div class="position-relative p-4 mt-4 mb-4"
        style="border:2px solid #4a76b8; border-radius:12px; background-color:white;">

        <div class="position-absolute px-3 py-2 text-white fw-bold"
            style="top:-18px; left:20px; background-color:#4a76b8; border-radius:8px;">
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
                <div id="ggb-eksplorasi-tegak" style="width:100%; height:500px;"></div>
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

                <div class="table-responsive mb-3">
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
                                <td><input type="text" id="tm1" class="form-control text-center"></td>
                            </tr>
                            <tr>
                                <td>$CD$</td>
                                <td>$C(-4,2)$ dan $D(0,0)$</td>
                                <td><input type="text" id="tm2" class="form-control text-center"></td>
                            </tr>
                            <tr>
                                <td>$EF$</td>
                                <td>$E(1,-1)$ dan $F(5,1)$</td>
                                <td><input type="text" id="tm3" class="form-control text-center"></td>
                            </tr>
                            <tr>
                                <td>$GH$</td>
                                <td>$G(2,3)$ dan $H(4,-1)$</td>
                                <td><input type="text" id="tm4" class="form-control text-center"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="rumus-box text-center mb-3">
                    $$ m = \frac{y_2 - y_1}{x_2 - x_1} $$
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
                                <td><input type="text" id="kali1" class="form-control text-center"></td>
                            </tr>
                            <tr>
                                <td>$m_{EF} \times m_{GH}$</td>
                                <td><input type="text" id="kali2" class="form-control text-center"></td>
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
    <div class="card card-materi mb-4">
        <div class="card-body">
            <span class="badge-sub">Konsep Gradien Garis-Garis Saling Tegak Lurus</span>

            <p class="mt-3" style="line-height:1.8;">
                Berdasarkan hasil eksplorasi, diperoleh bahwa pada dua garis yang saling tegak lurus
                terdapat hubungan khusus antara gradien kedua garis tersebut.
                Perhatikan gambar berikut.
            </p>

            <div class="text-center my-4">
                <img src="{{ asset('img/hubungan gradien garis/gradiengarissalingtegaklurus.png') }}"
                    alt="Gradien garis saling tegak lurus" class="img-fluid" style="max-width:420px;">
            </div>

            <p style="line-height:1.8;">
                Pada gambar di atas, garis <b>$k$</b> dan garis <b>$l$</b> berpotongan membentuk sudut siku-siku,
                sehingga kedua garis tersebut saling tegak lurus.
            </p>

            <p style="line-height:1.8;">
                Misalkan gradien garis <b>$k$</b> adalah <b>$m_1$</b> dan gradien garis <b>$l$</b> adalah <b>$m_2$</b>.
                Dari hasil perhitungan, diperoleh bahwa hasil kali kedua gradien tersebut selalu memenuhi:
            </p>

            <div class="rumus-box text-center my-3">
                $$m_1 \times m_2 = -1$$
            </div>

            <p style="line-height:1.8;">
                Jadi, dapat disimpulkan bahwa:
            </p>

            <div class="box-kesimpulan mt-3">
                Dua garis saling tegak lurus jika hasil kali gradien kedua garis tersebut sama dengan <b>$-1$</b>.
            </div>

            <p class="mt-4 mb-2" style="line-height:1.8;">
                Hubungan ini juga dapat dinyatakan sebagai berikut.
                Jika suatu garis memiliki gradien <b>$m$</b>, maka gradien garis yang tegak lurus terhadapnya adalah:
            </p>

            <div class="rumus-box text-center my-3">
                $$-\frac{1}{m}$$
            </div>

            <p style="line-height:1.8;">
                Artinya, gradien garis yang tegak lurus diperoleh dengan cara
                <b>membalik gradien</b> lalu <b>mengubah tandanya</b>.
            </p>
        </div>
    </div>

    {{-- Contoh Soal --}}
    <div class="card card-materi mb-4">
        <div class="card-body p-4">
            <span class="badge-contoh">Contoh</span>

            <p class="mt-3" style="line-height:1.8;">
                Tentukan gradien garis yang tegak lurus dengan garis
                <b>$y = 2x + 3$</b>.
            </p>

            <div class="border rounded-4 p-3 mb-3" style="background:#f7f9fc;">
                <p class="mb-2"><b>Ayo mencoba terlebih dahulu:</b></p>

                <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                    <span>Dari persamaan <b>$y = 2x + 3$</b>, gradien garis tersebut adalah</span>
                    <input type="text" id="c1_m1" class="form-control form-control-sm text-center"
                        style="width:90px;">
                </div>

                <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                    <span>Karena kedua garis saling tegak lurus, maka berlaku</span>
                    <input type="text" id="c1_relasi" class="form-control form-control-sm text-center"
                        style="width:140px;">
                </div>

                <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                    <span>Substitusi nilai gradien menghasilkan</span>
                    <input type="text" id="c1_subs" class="form-control form-control-sm text-center"
                        style="width:120px;">
                </div>

                <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                    <span>Jadi gradien garis yang dicari adalah</span>
                    <input type="text" id="c1_hasil" class="form-control form-control-sm text-center"
                        style="width:100px;">
                </div>

                <button class="btn btn-palet btn-sm" onclick="cekContoh1()">Cek Jawaban</button>
                <div id="fbContoh1" class="mt-3"></div>
            </div>
        </div>
    </div>

    <div class="card card-materi mb-4">
        <div class="card-body p-4">
            <span class="badge-latihan">Latihan</span>

            <p class="mt-3" style="line-height:1.8;">
                1. Tentukan persamaan garis yang tegak lurus dengan garis <b>$y = 3x - 2$</b>.
            </p>

            <p>
                a. $x + 3y - 6 = 0$ <br>
                b. $2x - 3y + 9 = 0$
            </p>

            <div class="border rounded-4 p-4 mb-3" style="background:#f7f9fc;">
                <p class="fw-bold mb-4">Penyelesaian:</p>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="pe-md-3 border-end">
                            <div class="mb-4">
                                <p class="mb-2">Gradien garis $y = 3x - 2$ adalah:</p>
                                <div class="d-inline-flex align-items-center gap-2">
                                    <span>$m_1 =$</span>
                                    <input type="text" id="l_m1" class="form-control form-control-sm text-center"
                                        style="width:90px;">
                                </div>
                            </div>

                            <div class="mb-4">
                                <p class="mb-2">Ubah persamaan (a) ke bentuk $y = mx + c$, gradiennya adalah:</p>
                                <div class="d-inline-flex align-items-center gap-2">
                                    <span>$m_a =$</span>
                                    <input type="text" id="l_ma" class="form-control form-control-sm text-center"
                                        style="width:90px;">
                                </div>
                            </div>

                            <div class="mb-4">
                                <p class="mb-2">Ubah persamaan (b) ke bentuk $y = mx + c$, gradiennya adalah:</p>
                                <div class="d-inline-flex align-items-center gap-2">
                                    <span>$m_b =$</span>
                                    <input type="text" id="l_mb" class="form-control form-control-sm text-center"
                                        style="width:90px;">
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
                                <p class="mb-2">Jadi, persamaan garis yang tegak lurus adalah:</p>
                                <input type="text" id="l_jawaban" class="form-control form-control-sm"
                                    style="max-width:220px;" placeholder="Tulis persamaan lengkap">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="btn btn-palet btn-sm mt-2" onclick="cekLatihanTegak()">Cek Jawaban</button>
            <div id="fbLatihanTegak" class="mt-3"></div>

            <p class="mt-3" style="line-height:1.8;">
                2. Seorang perencana kota akan membuat jalan <b>$k$</b> yang tegak lurus terhadap jalan lama.
                Pada peta, jalan lama melalui titik <b>$A(200, 150)$</b> dan <b>$B(700, 50)$</b>.
                Tentukan gradien jalan <b>$k$</b>.
            </p>

            <div class="border rounded-4 p-4 mb-3" style="background:#f7f9fc;">
                <p class="fw-bold mb-4">Penyelesaian:</p>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="pe-md-3 border-end">
                            <div class="mb-4">
                                <p class="mb-2">Gradien jalan yang melalui titik $A(200,150)$ dan $B(700,50)$ adalah:</p>
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
                                <input type="text" id="l2_jawaban" class="form-control form-control-sm text-center"
                                    style="width:120px;" placeholder="Tulis gradien">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="btn btn-palet btn-sm mt-2" onclick="cekLatihan2()">Cek Jawaban</button>
            <div id="fbLatihan2" class="mt-3"></div>
        </div>
    </div>


    <script src="https://www.geogebra.org/apps/deployggb.js"></script>
    <script src="{{ asset('js/subbabC/gradien_garis2salingtegaklurus.js') }}"></script>
@endsection

@section('nav')
    <a href="{{ route('subbabB_gradienduatitik') }}" class="btn btn-prev px-4 rounded-pill">
        ← Prev
    </a>
    <a href="{{ route('quiz.show', 3) }}" class="btn btn-next px-4 rounded-pill fw-semibold">
        Next →
    </a>
@endsection
