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
    <h2 class="mt-2 mb-3" style="font-weight: 600;">2. Gradien Garis-garis yang saling Sejajar</h2>

    <div class="position-relative p-4 mt-4 mb-4"
        style="border:2px solid #4a76b8; border-radius:12px; background-color:white;">

        <div class="position-absolute px-3 py-2 text-white fw-bold"
            style="top:-18px; left:20px; background-color:#4a76b8; border-radius:8px;">
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

                <div class="rumus-box text-center mb-3">
                    $$ m = \frac{y_2 - y_1}{x_2 - x_1} $$
                </div>

                <button class="btn btn-palet" onclick="cekStep1()">Cek Jawaban</button>
                <div id="fb1" class="mt-2"></div>
            </div>

            {{-- STEP 2 --}}
            <div id="step2" class="d-none mt-3">
                <p>
                    Bagaimana hubungan nilai gradien dari keempat garis tersebut?
                </p>

                <select id="pilih1" class="form-select">
                    <option value="">Pilih</option>
                    <option value="sama">Semua gradien sama</option>
                    <option value="beda">Gradien berbeda</option>
                </select>

                <button class="btn btn-palet mt-2" onclick="cekStep2()">Cek</button>
                <div id="fb2"></div>
            </div>

            {{-- STEP 3 --}}
            <div id="step3" class="d-none mt-3">
                <p>
                    Jika keempat garis tersebut digambar pada bidang koordinat,
                    bagaimana kedudukannya?
                </p>

                <select id="pilih2" class="form-select">
                    <option value="">Pilih</option>
                    <option value="sejajar">Sejajar</option>
                    <option value="potong">Berpotongan</option>
                    <option value="tegak">Tegak lurus</option>
                </select>

                <button class="btn btn-palet mt-2" onclick="cekStep3()">Cek</button>
                <div id="fb3"></div>
            </div>

            {{-- STEP 4 --}}
            <div id="step4" class="d-none mt-3">
                <p>
                    Berdasarkan hasil tersebut, lengkapilah kesimpulan berikut.
                </p>

                <p>
                    Jika dua garis atau lebih memiliki gradien yang
                    <select id="pilih3" class="form-select d-inline w-auto">
                        <option value="">Pilih</option>
                        <option value="sama">sama</option>
                        <option value="beda">berbeda</option>
                    </select>,
                    maka garis-garis tersebut
                    <select id="pilih4" class="form-select d-inline w-auto">
                        <option value="">Pilih</option>
                        <option value="sejajar">sejajar</option>
                        <option value="tegak">tegak lurus</option>
                    </select>.
                </p>

                <button class="btn btn-palet" onclick="cekStep4()">Simpan Kesimpulan</button>
                <div id="fb4"></div>
            </div>

            {{-- KESIMPULAN --}}
            <div id="kesimpulan" class="d-none mt-3 box-kesimpulan">
                <b>Kesimpulan:</b><br>
                Garis-garis yang saling sejajar memiliki gradien yang sama.
            </div>

            {{-- GRAFIK --}}
            <div id="ggb-wrapper-sejajar" class="d-none mt-3">
                <div id="ggb-eksplorasi" style="width:100%; height:400px;"></div>
                <p class="mt-3 mb-0">
                    Pada grafik di atas, keempat garis memiliki kemiringan yang sama dan tidak saling berpotongan.
                    Hal ini menunjukkan bahwa garis-garis tersebut saling sejajar.
                </p>
            </div>
        </div>
    </div>

    {{-- ========================================================= --}}
    {{-- MATERI KONSEP --}}
    {{-- ========================================================= --}}
    <div class="card card-materi mb-4">
        <div class="card-body">
            <span class="badge-sub">Konsep Gradien Garis-Garis Sejajar</span>

            <p>
                Dari kegiatan eksplorasi yang telah kamu lakukan, kamu telah menemukan bahwa beberapa garis
                yang memiliki kemiringan yang sama tidak saling berpotongan. Garis-garis tersebut dikatakan
                sejajar.
            </p>

            <p>
                Untuk memperjelas konsep tersebut, sekarang perhatikan dua garis berikut, yaitu garis
                <b>$k$</b> dan garis <b>$l$</b>. Meskipun pada eksplorasi sebelumnya kita mengamati lebih dari
                dua garis, konsep garis sejajar dapat dijelaskan dengan membandingkan dua garis saja.
            </p>

            <p>
                Kedua garis tersebut tampak memiliki kemiringan yang sama. Hal ini dapat dibuktikan dengan
                menghitung gradien masing-masing garis.
            </p>

            <div class="text-center mb-3">
                <img src="{{ asset('img/hubungan gradien garis/gradiengaris2sejajar.png') }}" class="img-fluid rounded"
                    alt="Dua garis sejajar" style="max-height: 320px;">
                <small class="text-muted d-block">Gambar dua garis yang sejajar</small>
            </div>

            <p>
                Gradien garis <b>$k$</b> adalah:
            </p>

            <div class="rumus-box text-center mb-3">
                $$ m_k = \frac{5 - 2}{6 - 3} = \frac{3}{3} = 1 $$
            </div>

            <p>
                Sedangkan gradien garis <b>$l$</b> adalah:
            </p>

            <div class="rumus-box text-center mb-3">
                $$ m_l = \frac{7 - 4}{5 - 2} = \frac{3}{3} = 1 $$
            </div>

            <p>
                Dari hasil perhitungan tersebut, terlihat bahwa kedua garis memiliki nilai gradien yang sama.
            </p>

            <p>
                Jika garis <b>$k$</b> digeser mendekati garis <b>$l$</b>, maka garis <b>$k$</b> dapat menempati
                posisi yang sama dengan garis <b>$l$</b>. Hal ini menunjukkan bahwa kedua garis tersebut tidak
                akan pernah berpotongan.
            </p>

            <p>
                Oleh karena itu, garis <b>$k$</b> dan garis <b>$l$</b> disebut sebagai dua garis yang sejajar.
            </p>

            <div class="box-kesimpulan">
                <b>Kesimpulan:</b><br>
                Jika dua garis memiliki gradien yang sama, maka kedua garis tersebut sejajar.
            </div>

            <div class="rumus-box text-center mt-3">
                $$ m_1 = m_2 $$
            </div>
        </div>
    </div>

    {{-- ========================================================= --}}
    {{-- CONTOH SOAL --}}
    {{-- ========================================================= --}}
    <div class="card card-materi mb-4">
        <div class="card-body">
            <span class="badge-contoh">Contoh Soal</span>

            <p>
                Diketahui garis <b>$k$</b> melalui titik $A(2,3)$ dan $B(6,7)$,
                serta garis <b>$l$</b> melalui titik $C(1,2)$ dan $D(5,6)$.
            </p>

            <p>Tentukan:</p>
            <ol type="a" style="line-height: 1.8;">
                <li>Gradien garis $k$</li>
                <li>Gradien garis $l$</li>
                <li>Apakah kedua garis sejajar?</li>
            </ol>

            <div class="quiz-card p-3 mt-3">

                {{-- STEP 1 --}}
                <div id="contohStep1">
                    <p><b>a. Gradien garis k</b></p>
                    <div class="rumus-box text-center mb-2">
                        $$ m_k = \frac{7 - 3}{6 - 2} = \frac{?}{?} = $$
                        <input type="number" id="ck1" class="form-control d-inline w-25 text-center">
                    </div>

                    <button class="btn btn-palet" onclick="cekContoh1()">Cek</button>
                    <div id="cf1" class="mt-2"></div>
                </div>

                {{-- STEP 2 --}}
                <div id="contohStep2" class="d-none mt-3">
                    <p><b>b. Gradien garis l</b></p>
                    <div class="rumus-box text-center mb-2">
                        $$ m_l = \frac{6 - 2}{5 - 1} = \frac{?}{?} = $$
                        <input type="number" id="ck2" class="form-control d-inline w-25 text-center">
                    </div>

                    <button class="btn btn-palet" onclick="cekContoh2()">Cek</button>
                    <div id="cf2" class="mt-2"></div>
                </div>

                {{-- STEP 3 --}}
                <div id="contohStep3" class="d-none mt-3">
                    <p><b>c. Kesimpulan</b></p>

                    <select id="ck3" class="form-select w-50">
                        <option value="">Pilih</option>
                        <option value="sejajar">Sejajar</option>
                        <option value="tidak">Tidak sejajar</option>
                    </select>

                    <button class="btn btn-palet mt-2" onclick="cekContoh3()">Cek</button>
                    <div id="cf3"></div>
                </div>

                {{-- PEMBAHASAN --}}
                <div id="pembahasan" class="d-none mt-3 box-kesimpulan">
                    <b>Pembahasan:</b><br>
                    Gradien garis $k$ = 1 dan gradien garis $l$ = 1.<br>
                    Karena $m_k = m_l$, maka kedua garis sejajar.
                </div>
            </div>
        </div>
    </div>

    <div class="card card-materi mb-4">
        <div class="card-body p-4">
            <span class="badge-latihan">Latihan</span>

            <p class="mb-3 mt-3" style="line-height:1.8;">
                <b>1.</b> Diketahui suatu garis <b>$p$</b> sejajar dengan garis
                <b>$20x - 2y + 5 = 0$</b>. Tentukan gradien garis <b>$p$</b>.
            </p>

            <div class="border rounded-4 p-3 mb-4" style="background:#f7f9fc;">
                <p class="mb-3"><b>Penyelesaian:</b></p>

                <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                    <span>Gradien garis $p$ =</span>
                    <input type="text" id="l1_m1" class="form-control form-control-sm text-center"
                        style="width:70px;">
                </div>

                <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                    <span>Gradien garis $20x - 2y + 5 = 0$ =</span>
                    <input type="text" id="l1_m2" class="form-control form-control-sm text-center"
                        style="width:70px;">
                </div>

                <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                    <span>Karena kedua garis sejajar, maka</span>
                    <input type="text" id="l1_relasi" class="form-control form-control-sm text-center"
                        style="width:120px;">
                </div>

                <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                    <span>Pada persamaan diperoleh</span>
                    <span>$A=$</span>
                    <input type="text" id="l1_A" class="form-control form-control-sm text-center"
                        style="width:70px;">
                    <span>dan</span>
                    <span>$B=$</span>
                    <input type="text" id="l1_B" class="form-control form-control-sm text-center"
                        style="width:70px;">
                </div>

                <div class="mb-3 d-flex flex-wrap align-items-center gap-2" style="line-height:2;">
                    <span>$m_2 = -\dfrac{A}{B} =$</span>

                    <div class="frac-input">
                        <div class="top">
                            <input type="text" id="l1_subAtas" class="form-control form-control-sm text-center"
                                style="width:70px;">
                        </div>
                        <div class="bottom">
                            <input type="text" id="l1_subBawah" class="form-control form-control-sm text-center"
                                style="width:70px;">
                        </div>
                    </div>
                </div>

                <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                    <span>$m_2 =$</span>
                    <input type="text" id="l1_hasil" class="form-control form-control-sm text-center"
                        style="width:80px;">
                </div>

                <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                    <span>maka gradien garis $p$ adalah</span>
                    <span>$m_1 =$</span>
                    <input type="text" id="l1_final" class="form-control form-control-sm text-center"
                        style="width:80px;">
                </div>
            </div>
            <p class="mb-3 mt-4" style="line-height:1.8;">
                <b>2.</b> Perhatikan persamaan garis berikut. Pilih garis yang sejajar dengan
                <b>$y = 4x + 2$</b>.
            </p>
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
            </div>

            <p class="mb-3 mt-4" style="line-height:1.8;">
                <b>3.</b> Carilah nilai <b>$c$</b> agar garis <b>$4x + cy = 8$</b> sejajar dengan garis
                <b>$x + y = 3$</b>.
            </p>

            <div class="border rounded-4 p-3 mb-4" style="background:#f7f9fc;">
                <p class="mb-3"><b>Penyelesaian:</b></p>

                <div class="mb-3">
                    Misalkan gradien garis $4x + cy = 8$ adalah $m_1$ dan gradien garis $x + y = 3$ adalah $m_2$.
                </div>

                <div class="mb-3 d-flex align-items-center gap-2" style="line-height:2;">
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

                <div class="mb-3 d-flex align-items-center gap-2">
                    <span>$m_2 =$</span>
                    <input type="text" id="l3_m2" class="form-control form-control-sm text-center"
                        style="width:80px;">
                </div>

                <div class="mb-3 d-flex align-items-center gap-2">
                    <span>Karena sejajar, maka</span>
                    <input type="text" id="l3_relasi" class="form-control form-control-sm text-center"
                        style="width:120px;">
                </div>

                <div class="mb-3 d-flex align-items-center gap-2" style="line-height:2;">
                    <div class="frac-input">
                        <div class="top">
                            <input type="text" id="l3_kiri_atas" class="form-control form-control-sm text-center">
                        </div>
                        <div class="bottom">
                            <input type="text" id="l3_kiri_bawah" class="form-control form-control-sm text-center">
                        </div>
                    </div>

                    <span>=</span>

                    <input type="text" id="l3_kanan" class="form-control form-control-sm text-center"
                        style="width:80px;">
                </div>

                <div class="mb-3 d-flex align-items-center gap-2">
                    <span>$c =$</span>
                    <input type="text" id="l3_c" class="form-control form-control-sm text-center"
                        style="width:80px;">
                </div>
            </div>

            <button class="btn btn-palet btn-sm" onclick="cekSemuaLatihan()">Cek Jawaban</button>

            <div id="fbSemuaLatihan" class="mt-3"></div>
        </div>
    </div>

    <script src="https://www.geogebra.org/apps/deployggb.js"></script>
    <script src="{{ asset('js/subbabC/gradien_garis2salingsejajar.js') }}"></script>
@endsection

@section('nav')
    {{-- PREV --}}
    @if($previousMateri)
        <a href="{{ route('materi.show', $previousMateri->slug) }}"
           class="btn btn-prev px-4 rounded-pill">
            ← Prev
        </a>

    {{-- KHUSUS MATERI PERTAMA --}}
    @elseif($materi->slug === 'subbab-a1')
        <a href="{{ route('apersepsi1') }}"
           class="btn btn-prev px-4 rounded-pill">
            ← Prev
        </a>

    @else
        <span class="btn btn-prev px-4 rounded-pill invisible">← Prev</span>
    @endif


    {{-- NEXT --}}
    @if($nextMateri)
        <a href="{{ route('materi.show', $nextMateri->slug) }}"
           class="btn btn-next px-4 rounded-pill fw-semibold">
            Next →
        </a>

    {{-- MATERI TERAKHIR → KUIS --}}
    @elseif($quizBab)
        <a href="{{ route('quiz.show', $quizBab->id) }}"
           class="btn btn-next px-4 rounded-pill fw-semibold">
            Kuis →
        </a>
    @else
        <span class="btn btn-next px-4 rounded-pill invisible">Next →</span>
    @endif
@endsection

