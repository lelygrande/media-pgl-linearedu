@extends('layout.halaman-materi')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/subbabB/subbbabB_gradienduatitik.css') }}">

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

        .btn-tampil {
            background-color: #f1a10c;
            /* abu-abu bootstrap */
            color: white;
            border: none;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 10px;
            transition: 0.2s ease-in-out;
        }

        .btn-tampil:hover {
            background-color: #895d09;
            color: #dbe5f1;
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

    <style>
        .frac-static {
            display: inline-flex;
            flex-direction: column;
            align-items: stretch;
            text-align: center;
            min-width: 180px;
        }

        .frac-static .top {
            border-bottom: 2px solid #222;
            padding: 0 8px 6px 8px;
            min-width: 180px;
        }

        .frac-static .bottom {
            padding-top: 6px;
            min-width: 180px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 6px;
        }

        .frac-static input {
            width: 70px;
            text-align: center;
        }

        /* Rumus Box terlalu mepet */
        .rumus-bertingkat {
            padding: 14px 20px;
        }

        .rumus-bertingkat div {
            line-height: 2;
            margin-bottom: 8px;
        }

        .rumus-bertingkat div:last-child {
            margin-bottom: 0;
        }
    </style>

    {{-- Slider Latihan --}}
    <style>
        .latihan-slider {
            width: 100%;
            overflow: hidden;
            position: relative;
        }

        .latihan-track {
            display: flex;
            transition: transform 0.45s ease-in-out;
            width: 100%;
        }

        .latihan-slide {
            min-width: 100%;
            flex: 0 0 100%;
            box-sizing: border-box;
        }

        /* Latihan */
        .hitung-turun {
            margin-top: 12px;
            margin-bottom: 18px;
            max-width: 760px;
        }

        .hitung-info {
            margin-bottom: 10px;
            line-height: 1.7;
        }

        .hitung-line {
            display: grid;
            grid-template-columns: 190px 28px 1fr;
            align-items: center;
            column-gap: 8px;
            margin-bottom: 10px;
            font-size: 1.1rem;
            line-height: 2.1;
        }

        .hitung-left {
            text-align: right;
            white-space: nowrap;
        }

        .hitung-eq {
            text-align: center;
            font-weight: 600;
        }

        .hitung-right {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 7px;
        }

        .input-matematika {
            vertical-align: middle;
            height: 38px;
            padding: 4px 8px;
        }

        /* Pecahan untuk gradien */
        .frac-latihan {
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            min-width: 150px;
        }

        .frac-latihan .atas {
            width: 100%;
            border-bottom: 2px solid #222;
            padding: 0 8px 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .frac-latihan .bawah {
            width: 100%;
            padding-top: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .frac-latihan input {
            width: 60px;
        }

        @media (max-width: 768px) {
            .hitung-line {
                grid-template-columns: 1fr 24px 1fr;
                font-size: 1rem;
            }

            .hitung-left {
                text-align: right;
            }

            .frac-latihan {
                min-width: 130px;
            }

            .frac-latihan input {
                width: 55px;
            }
        }
    </style>

    <style>
        .jawaban-latihan.is-valid {
            border: 2px solid #198754 !important;
            background-color: #f0fff4 !important;
        }

        .jawaban-latihan.is-invalid {
            border: 2px solid #dc3545 !important;
            background-color: #fff5f5 !important;
        }
    </style>

    {{-- Subjudul --}}
    <h2 class="mt-2 mb-3" style="font-weight: 600;">3. Persamaan Garis yang Melalui Satu Titik dan Sejajar dengan Garis Lain
    </h2>

    {{-- ========================================================= --}}
    {{-- EKSPLORASI --}}
    {{-- ========================================================= --}}
    <div class="box-eksplorasi mt-5">

        <div class="title-box">
            Eksplorasi
        </div>


        <div class="mt-3">
            <p>
                Perhatikan gambar dua garis <span>$p$</span> dan <span>$q$</span> berikut. Garis <span>$p$</span> sejajar
                dengan garis
                <span>$q$</span>. Garis <span>$q$</span> melalui titik <span>$(x_1, y_1)$</span>.
            </p>

            <figure class="text-center mb-3">
                <img src="{{ asset('img/pgl/pgl_sejajar_1titik.png') }}" alt="Gambar garis sejajar melalui satu titik"
                    class="img-fluid rounded" style="max-width: 420px;">

                <figcaption class="mt-2 text-muted" style="font-size: 14px;">
                    Gambar dua garis sejajar, dengan salah satu garis melalui titik <span>$(x_1, y_1)$</span>.
                </figcaption>
            </figure>

            <p>
                Karena dua garis yang sejajar mempunyai gradien yang sama, maka hubungan gradien kedua garis itu adalah:
            </p>

            <p>
                <span>$m_p =$</span>
                <input type="text" id="eks_sejajar1"
                    class="form-control form-control-sm d-inline-block text-center jawaban-latihan" style="width:90px;">
            </p>

            <p>
                Jika garis <span>$p$</span> memiliki gradien <span>$m$</span>, maka gradien garis <span>$q$</span> adalah:
            </p>

            <p>
                <span>$m_q =$</span>
                <input type="text" id="eks_sejajar2"
                    class="form-control form-control-sm d-inline-block text-center jawaban-latihan" style="width:90px;">
            </p>

            <p>
                Karena garis <span>$q$</span> melalui titik <span>$(x_1, y_1)$</span>, maka persamaan garis <span>$q$</span>
                dapat
                disusun dengan bentuk persamaan garis melalui satu titik dan gradien.
            </p>

            <div class="mb-3" style="width: fit-content;">
                <span>$y-$</span>
                <input type="text" id="eks_sejajar3"
                    class="form-control form-control-sm d-inline-block text-center jawaban-latihan" style="width:90px;">
                <span>$= $</span>
                <input type="text" id="eks_sejajar4"
                    class="form-control form-control-sm d-inline-block text-center jawaban-latihan" style="width:90px;">
                <span>$(x-$</span>
                <input type="text" id="eks_sejajar5"
                    class="form-control form-control-sm d-inline-block text-center jawaban-latihan" style="width:90px;">
                <span>$)$</span>
            </div>

            <div class="mt-3">
                <button class="btn btn-palet btn-sm" onclick="cekEksplorasiSejajar()">Cek</button>
                <div id="feedbackEksplorasiSejajar" class="mt-2"></div>
                <div id="pembahasanEksplorasiSejajar" class="box-kesimpulan mt-3 d-none">
                    <b>Pembahasan:</b>

                    <p class="mb-2 mt-2">
                        Karena garis <span>$p$</span> sejajar dengan garis <span>$q$</span>,
                        maka gradien kedua garis tersebut sama.
                    </p>

                    <div class="rumus-box mb-3" style="width: fit-content;">
                        <span>$m_p = m_q$</span>
                    </div>

                    <p class="mb-2">
                        Jika garis <span>$p$</span> memiliki gradien <span>$m$</span>,
                        maka gradien garis <span>$q$</span> adalah:
                    </p>

                    <div class="rumus-box mb-3" style="width: fit-content;">
                        <span>$m_q = m$</span>
                    </div>

                    <p class="mb-2">
                        Karena garis <span>$q$</span> melalui titik <span>$(x_1, y_1)$</span>
                        dan memiliki gradien <span>$m$</span>, maka bentuk persamaannya adalah:
                    </p>

                    <div class="rumus-box mb-0" style="width: fit-content;">
                        <span>$y - y_1 = m(x - x_1)$</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ========================================================= --}}
    {{-- MATERI KONSEP --}}
    {{-- ========================================================= --}}
    <div class="card card-materi mt-4 mb-4">
        <div class="card-body">
            <span class="badge-sub">Persamaan Garis yang Melalui Satu Titik dan Sejajar dengan Garis Lain</span>

            <p class="mt-3">
                Untuk menentukan persamaan garis yang melalui satu titik dan sejajar dengan garis lain,
                kita perlu mengingat kembali sifat gradien garis sejajar yang telah dipelajari pada
                subbab sebelumnya.
            </p>

            <p>
                Dua garis yang sejajar memiliki gradien yang sama. Jika garis pertama memiliki gradien
                <span>$m_1$</span> dan garis kedua memiliki gradien <span>$m_2$</span>, maka berlaku:
            </p>

            <div class="rumus-box mb-3 text-center mx-auto" style="width: fit-content;">
                <span>$m_1 = m_2$</span>
            </div>

            <p>
                Artinya, gradien garis yang akan dicari sama dengan gradien garis yang diketahui.
            </p>

            <p>
                Setelah gradien garis diketahui, persamaan garis yang melalui titik
                <span>$(x_1, y_1)$</span> dapat disusun menggunakan bentuk persamaan garis
                melalui satu titik dan gradien, yaitu:
            </p>

            <div class="rumus-box mb-3 text-center mx-auto" style="width: fit-content;">
                <span>$y - y_1 = m(x - x_1)$</span>
            </div>

            <p>
                Pada rumus tersebut, <span>$x_1$</span> dan <span>$y_1$</span> merupakan
                koordinat titik yang dilalui garis, sedangkan <span>$m$</span> merupakan
                gradien garis yang sejajar dengan garis yang diketahui.
            </p>

            <p>
                Langkah-langkah menentukan persamaan garis yang melalui satu titik dan sejajar
                dengan garis lain adalah sebagai berikut:
            </p>

            <ol class="mb-3">
                <li>Menentukan gradien garis yang diketahui.</li>
                <li>Menggunakan gradien yang sama karena kedua garis sejajar.</li>
                <li>Menentukan titik yang dilalui garis baru, yaitu <span>$(x_1, y_1)$</span>.</li>
                <li>
                    Mensubstitusikan nilai gradien dan titik ke dalam rumus
                    <span>$y - y_1 = m(x - x_1)$</span>.
                </li>
                <li>Menyederhanakan persamaan hingga diperoleh bentuk yang diminta.</li>
            </ol>
        </div>
    </div>

    {{-- Contoh Soal --}}
    <div class="box-contoh mt-5 mb-4">
        <div class="card-body">
            <span class="title-box">Contoh</span>

            <p>
                Tentukan persamaan garis yang melalui titik
                <span>$A(2,3)$</span> dan sejajar dengan garis
                <span>$y = 2x + 1$</span>.
            </p>

            <p>
                <b>Coba lengkapi substitusi ke rumus berikut:</b>
            </p>

            <div class="rumus-bertingkat mb-3 mx-auto" style="width: fit-content;">
                <span>$y-$</span>
                <input type="text" id="contoh_y1"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:80px;">

                <span>$= $</span>

                <input type="text" id="contoh_m"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:80px;">

                <span>$(x-$</span>

                <input type="text" id="contoh_x1"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:80px;">

                <span>$)$</span>
            </div>

            <p class="small text-muted">
                Isi nilai $y_1$, $m$, dan $x_1$ dari titik $A(2,3)$ dan garis sejajar $y=2x+1$.
            </p>

            <div class="mt-3">
                <button class="btn btn-palet btn-sm" type="button" onclick="cekContohSejajar()">
                    Cek Jawaban
                </button>

                <button class="btn btn-tampil btn-sm" type="button" onclick="toggleSolusi('pembahasanContohSejajar')">
                    Tampilkan Jawaban
                </button>

                <div id="feedbackContohSejajar" class="mt-2"></div>
            </div>

            <div id="pembahasanContohSejajar" class="box-kesimpulan mt-3 d-none">
                <b>Penyelesaian:</b>

                <p class="mt-2 mb-2">
                    Diketahui garis <span>$y = 2x + 1$</span> memiliki gradien:
                </p>

                <div class="rumus-bertingkat my-2 mx-auto" style="width: fit-content;">
                    <div>$m_1 = 2$</div>
                </div>

                <p class="mb-2">
                    Karena garis yang dicari sejajar dengan garis tersebut, maka gradiennya sama.
                </p>

                <div class="rumus-bertingkat my-2 mx-auto" style="width: fit-content;">
                    <div>$m_1 = m_2$</div>
                </div>

                <p class="mb-2">
                    Sehingga:
                </p>

                <div class="rumus-bertingkat my-2 mx-auto" style="width: fit-content;">
                    <div>$m_2 = 2$</div>
                </div>

                <p class="mb-2">
                    Garis yang dicari melalui titik <span>$A(2,3)$</span>, maka
                    <span>$x_1 = 2$</span> dan <span>$y_1 = 3$</span>.
                </p>

                <p class="mb-2">
                    Substitusikan titik <span>$(2,3)$</span> dan gradien
                    <span>$m_2 = 2$</span> ke bentuk persamaan garis melalui satu titik:
                </p>

                <div class="rumus-bertingkat my-2 mx-auto" style="width: fit-content;">
                    <div>$y - y_1 = m(x - x_1)$</div>
                    <div>$y - 3 = 2(x - 2)$</div>
                </div>

                <p class="mb-2">
                    Sederhanakan:
                </p>

                <div class="rumus-bertingkat my-2 mx-auto" style="width: fit-content;">
                    <div>$y - 3 = 2x - 4$</div>
                    <div>$y = 2x - 4 + 3$</div>
                    <div>$y = 2x - 1$</div>
                </div>

                <div class="alert alert-success mt-3 mb-0" style="border-radius:14px;">
                    Jadi, persamaan garis yang melalui titik <span>$A(2,3)$</span>
                    dan sejajar dengan garis <span>$y = 2x + 1$</span> adalah
                    <b>$y = 2x - 1$</b>.
                </div>
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

    {{-- Latihan --}}
    <div class="box-latihan mt-5 mb-4" id="latihanD3Box">
        <div class="card-body">
            <span class="title-box">Latihan</span>

            {{-- ===================== --}}
            {{-- LATIHAN 1 --}}
            {{-- ===================== --}}
            <div class="latihan-step" id="latihanStep1">
                <p class="mt-3">
                    <b>1.</b> Seorang siswa mengamati hubungan antara lama waktu belajar <span>($x$)</span>
                    dan nilai tambahan yang diperoleh <span>($y$)</span>. Diketahui garis yang dicari
                    melalui titik <span>$A(4,1)$</span> dan sejajar dengan garis lain yang mempunyai
                    gradien <span>$2$</span>. Tentukan persamaan garis tersebut.
                </p>

                <p class="mb-2"><b>Penyelesaian:</b></p>

                <div class="hitung-turun">

                    <p class="hitung-info">
                        Untuk titik $A(4,1)$ maka
                        $x_1 =$
                        <input type="text" id="lat1_x1"
                            class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                            style="width:80px;">
                        dan
                        $y_1 =$
                        <input type="text" id="lat1_y1"
                            class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                            style="width:80px;">.
                        Karena garisnya sejajar, maka gradiennya
                        $m =$
                        <input type="text" id="lat1_m"
                            class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                            style="width:80px;">.
                    </p>

                    <p class="hitung-info">
                        Dengan menggunakan rumus umum, diperoleh persamaan garis:
                    </p>

                    <div class="hitung-line">
                        <div class="hitung-left">$y-y_1$</div>
                        <div class="hitung-eq">$=$</div>
                        <div class="hitung-right">$m(x-x_1)$</div>
                    </div>

                    <div class="hitung-line">
                        <div class="hitung-left">
                            $y-$
                            <input type="text" id="lat1_sub_y1"
                                class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                style="width:80px;">
                        </div>

                        <div class="hitung-eq">$=$</div>

                        <div class="hitung-right">
                            <input type="text" id="lat1_sub_m"
                                class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                style="width:80px;">
                            <span>$(x-$</span>
                            <input type="text" id="lat1_sub_x1"
                                class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                style="width:80px;">
                            <span>$)$</span>
                        </div>
                    </div>

                    <div class="hitung-line">
                        <div class="hitung-left">$y-1$</div>
                        <div class="hitung-eq">$=$</div>
                        <div class="hitung-right">$2(x-4)$</div>
                    </div>

                    <div class="hitung-line">
                        <div class="hitung-left">$y-1$</div>
                        <div class="hitung-eq">$=$</div>
                        <div class="hitung-right">$2x-8$</div>
                    </div>

                    <div class="hitung-line">
                        <div class="hitung-left">$y$</div>
                        <div class="hitung-eq">$=$</div>
                        <div class="hitung-right">
                            <input type="text" id="lat1_akhir"
                                class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                style="width:150px;">
                        </div>
                    </div>

                    <p class="hitung-info">
                        Bentuk $Ax+By+C=0$:
                    </p>

                    <div class="hitung-line">
                        <div class="hitung-left">
                            <input type="text" id="lat1_umum"
                                class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                style="width:150px;">
                        </div>
                        <div class="hitung-eq">$=$</div>
                        <div class="hitung-right">$0$</div>
                    </div>

                </div>

                <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div>
                        <button class="btn btn-palet btn-sm" type="button" onclick="cekLatihan1Sejajar()">
                            Cek Jawaban
                        </button>

                        <button class="btn btn-palet btn-sm" type="button" onclick="resetLatihan1Sejajar()">
                            Reset
                        </button>
                    </div>

                    <button id="nextBtnLatihan1" class="btn btn-palet btn-sm" type="button" onclick="nextLatihan(2)"
                        disabled>
                        Lanjut ke Latihan 2
                    </button>
                </div>

                <div id="feedbackLatihan1" class="mt-2"></div>
                <div id="petunjukLatihan1" class="mt-2"></div>
            </div>

            {{-- ===================== --}}
            {{-- LATIHAN 2 --}}
            {{-- ===================== --}}
            <div class="latihan-step" id="latihanStep2" style="display:none;">
                <hr class="my-4">

                <p class="mt-3">
                    <b>2.</b> Seorang siswa membuat garis bantu pada bidang koordinat. Garis pertama
                    melalui titik <span>$(3,4)$</span> dan <span>$(5,1)$</span>. Ia ingin membuat garis
                    lain yang melalui titik <span>$(4,6)$</span> dan sejajar dengan garis pertama.
                    Tentukan persamaan garis tersebut.
                </p>

                <p class="mb-2"><b>Penyelesaian:</b></p>

                <div class="hitung-turun">

                    <p class="hitung-info">
                        Gradien garis yang melalui titik $(3,4)$ dan $(5,1)$ adalah:
                    </p>

                    <div class="hitung-line">
                        <div class="hitung-left">$m$</div>
                        <div class="hitung-eq">$=$</div>
                        <div class="hitung-right">
                            <div class="frac-latihan">
                                <div class="atas">
                                    <input type="text" id="lat2_m_atas1"
                                        class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                    <span>$-$</span>
                                    <input type="text" id="lat2_m_atas2"
                                        class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                </div>

                                <div class="bawah">
                                    <input type="text" id="lat2_m_bawah1"
                                        class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                    <span>$-$</span>
                                    <input type="text" id="lat2_m_bawah2"
                                        class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                </div>
                            </div>

                            <span>$=$</span>

                            <div class="frac-latihan" style="min-width:110px;">
                                <div class="atas">
                                    <input type="text" id="lat2_m_sederhana_atas"
                                        class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                </div>

                                <div class="bawah">
                                    <input type="text" id="lat2_m_sederhana_bawah"
                                        class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="hitung-info">
                        Karena garis yang dicari sejajar, maka gradiennya sama. Dengan menggunakan rumus umum:
                    </p>

                    <div class="hitung-line">
                        <div class="hitung-left">$y-y_1$</div>
                        <div class="hitung-eq">$=$</div>
                        <div class="hitung-right">$m(x-x_1)$</div>
                    </div>

                    <div class="hitung-line">
                        <div class="hitung-left">
                            $y-$
                            <input type="text" id="lat2_sub_y1"
                                class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                style="width:80px;">
                        </div>

                        <div class="hitung-eq">$=$</div>

                        <div class="hitung-right">
                            <div class="frac-latihan" style="min-width:110px;">
                                <div class="atas">
                                    <input type="text" id="lat2_sub_m_atas"
                                        class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                </div>

                                <div class="bawah">
                                    <input type="text" id="lat2_sub_m_bawah"
                                        class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                </div>
                            </div>

                            <span>$(x-$</span>
                            <input type="text" id="lat2_sub_x1"
                                class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                style="width:80px;">
                            <span>$)$</span>
                        </div>
                    </div>

                    <div class="hitung-line">
                        <div class="hitung-left">$y$</div>
                        <div class="hitung-eq">$=$</div>
                        <div class="hitung-right">
                            <input type="text" id="lat2_akhir"
                                class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                style="width:150px;">
                        </div>
                    </div>

                    <p class="hitung-info">
                        Bentuk $Ax+By+C=0$:
                    </p>

                    <div class="hitung-line">
                        <div class="hitung-left">
                            <input type="text" id="lat2_umum"
                                class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                style="width:150px;">
                        </div>

                        <div class="hitung-eq">$=$</div>

                        <div class="hitung-right">$0$</div>
                    </div>

                </div>

                <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <button class="btn btn-palet btn-sm" type="button" onclick="prevLatihan(1)">
                        Kembali ke Latihan 1
                    </button>

                    <div>
                        <button class="btn btn-palet btn-sm" type="button" onclick="cekLatihan2Sejajar()">
                            Cek Jawaban
                        </button>

                        <button class="btn btn-palet btn-sm" type="button" onclick="resetLatihan2Sejajar()">
                            Reset
                        </button>
                    </div>
                </div>

                <div id="feedbackLatihan2" class="mt-2"></div>
                <div id="petunjukLatihan2" class="mt-2"></div>
                <div id="pesanAkhirLatihan" class="mt-3"></div>
            </div>
        </div>
    </div>

    <script src="https://www.geogebra.org/apps/deployggb.js"></script>
    <script>
        // Eksplorasi
        function normEksplorasi(teks) {
            return (teks || "").toString().trim().toLowerCase().replace(/\s+/g, "");
        }

        function cekIsianEksplorasi(id, jawabanBenar) {
            const el = document.getElementById(id);
            if (!el) return false;

            const nilai = normEksplorasi(el.value);
            const daftar = Array.isArray(jawabanBenar) ? jawabanBenar : [jawabanBenar];
            const cocok = daftar.map(normEksplorasi).includes(nilai);

            el.classList.remove("is-valid", "is-invalid");
            el.classList.add(cocok ? "is-valid" : "is-invalid");

            return cocok;
        }

        function cekEksplorasiSejajar() {
            const inputIds = [
                "eks_sejajar1",
                "eks_sejajar2",
                "eks_sejajar3",
                "eks_sejajar4",
                "eks_sejajar5"
            ];

            const feedback = document.getElementById("feedbackEksplorasiSejajar");
            const pembahasan = document.getElementById("pembahasanEksplorasiSejajar");

            // cek apakah masih ada isian kosong
            const adaKosong = inputIds.some((id) => {
                const el = document.getElementById(id);
                return !el || normEksplorasi(el.value) === "";
            });

            if (adaKosong) {
                feedback.innerHTML =
                    '<div class="alert alert-warning py-2 mb-0">Lengkapi semua isian terlebih dahulu.</div>';

                inputIds.forEach((id) => {
                    const el = document.getElementById(id);
                    if (el) el.classList.remove("is-valid", "is-invalid");
                });

                if (pembahasan) pembahasan.classList.add("d-none");
                return;
            }

            const benar1 = cekIsianEksplorasi("eks_sejajar1", ["mq", "m_q"]);
            const benar2 = cekIsianEksplorasi("eks_sejajar2", ["m"]);
            const benar3 = cekIsianEksplorasi("eks_sejajar3", ["y1", "y_1"]);
            const benar4 = cekIsianEksplorasi("eks_sejajar4", ["m"]);
            const benar5 = cekIsianEksplorasi("eks_sejajar5", ["x1", "x_1"]);

            if (benar1 && benar2 && benar3 && benar4 && benar5) {
                feedback.innerHTML =
                    '<div class="alert alert-success py-2 mb-0">Bagus, kamu sudah menemukan bahwa garis sejajar memiliki gradien yang sama, sehingga persamaan garisnya dapat disusun dengan bentuk titik-gradien.</div>';

                if (pembahasan) pembahasan.classList.add("d-none");
            } else {
                feedback.innerHTML =
                    '<div class="alert alert-warning py-2 mb-0">Masih ada jawaban yang belum tepat. Perhatikan pembahasan berikut untuk membantu memahami isian yang benar.</div>';

                if (pembahasan) pembahasan.classList.remove("d-none");
            }
        }
        // =========================
        // CONTOH SOAL
        // Hanya cek substitusi y1, m, x1
        // =========================
        function normContoh(teks) {
            return String(teks || "")
                .trim()
                .toLowerCase()
                .replace(/\s+/g, "")
                .replace(/[()]/g, "")
                .replace(/−/g, "-");
        }

        function cekIsianContoh(id, jawabanBenar) {
            const el = document.getElementById(id);
            if (!el) return false;

            const nilai = normContoh(el.value);
            const daftar = Array.isArray(jawabanBenar) ? jawabanBenar : [jawabanBenar];
            const cocok = daftar.map(normContoh).includes(nilai);

            el.classList.remove("is-valid", "is-invalid");
            el.classList.add(cocok ? "is-valid" : "is-invalid");

            return cocok;
        }

        function isiFeedbackContoh(idElemen, tipe, pesan) {
            const el = document.getElementById(idElemen);
            if (!el) return;

            const kelas =
                tipe === "success" ?
                "alert-success" :
                tipe === "warning" ?
                "alert-warning" :
                "alert-info";

            el.innerHTML = `
        <div class="alert ${kelas} py-2 mb-0">
            ${pesan}
        </div>
    `;

            renderMathSafe(el);
        }

        function cekContohSejajar() {
            const benarY1 = cekIsianContoh("contoh_y1", ["3"]);
            const benarM = cekIsianContoh("contoh_m", ["2"]);
            const benarX1 = cekIsianContoh("contoh_x1", ["2"]);

            const semuaBenar = benarY1 && benarM && benarX1;
            const pembahasan = document.getElementById("pembahasanContohSejajar");

            if (semuaBenar) {
                isiFeedbackContoh(
                    "feedbackContohSejajar",
                    "success",
                    "Benar. Nilai $y_1$, $m$, dan $x_1$ sudah tepat disubstitusikan ke rumus.",
                );

                if (pembahasan) {
                    pembahasan.classList.remove("d-none");
                    renderMathSafe(pembahasan);
                }

                return;
            }

            isiFeedbackContoh(
                "feedbackContohSejajar",
                "warning",
                "Masih ada nilai yang belum tepat. Dari titik $A(2,3)$ diperoleh $x_1=2$ dan $y_1=3$. Karena sejajar dengan $y=2x+1$, maka gradiennya $m=2$.",
            );

            if (pembahasan) {
                pembahasan.classList.add("d-none");
            }
        }

        function toggleSolusi(id) {
            const el = document.getElementById(id);
            if (!el) return;

            el.classList.toggle("d-none");
            renderMathSafe(el);
        }

        // Latihan
        function pindahLatihan(index) {
            const track = document.getElementById("latihanTrack");
            if (!track) return;
            track.style.transform = `translateX(-${index * 100}%)`;
        }

        function normLatihanSejajar(teks) {
            return (teks || "")
                .toString()
                .trim()
                .toLowerCase()
                .replace(/\s+/g, "")
                .replace(/[()]/g, "");
        }

        function cekIsianLatihanSejajar(id, jawabanBenar) {
            const el = document.getElementById(id);
            if (!el) return false;

            const nilai = normLatihanSejajar(el.value);
            const daftar = Array.isArray(jawabanBenar) ? jawabanBenar : [jawabanBenar];
            const cocok = daftar.map(normLatihanSejajar).includes(nilai);

            el.classList.remove("is-valid", "is-invalid");
            el.classList.add(cocok ? "is-valid" : "is-invalid");

            return cocok;
        }

        function tampilkanPetunjukLatihan1(pesan) {
            const el = document.getElementById("petunjukLatihan1");
            if (el) {
                el.innerHTML =
                    '<div class="alert alert-info py-2 mb-0">' + pesan + "</div>";
            }
        }

        function tampilkanPetunjukLatihan2(pesan) {
            const el = document.getElementById("petunjukLatihan2");
            if (el) {
                el.innerHTML =
                    '<div class="alert alert-info py-2 mb-0">' + pesan + "</div>";
            }
        }

        // =========================
        // LATIHAN SOAL SUBBAB D3
        // Sistem turun ke bawah
        // =========================

        // =========================
        // Helper umum
        // =========================
        function normLatihanSejajar(teks) {
            return String(teks || "")
                .trim()
                .toLowerCase()
                .replace(/\s+/g, "")
                .replace(/[()]/g, "")
                .replace(/−/g, "-");
        }

        function renderMathSafe(target) {
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
            renderMathSafe(document.getElementById("latihanD3Box") || document.body);
            restoreProgressD3();
        });

        // =========================
        // Navigasi latihan
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
        // SAVE LATIHAN PROGRESS D3
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
                console.log("Simpan latihan D3:", data);

                return response.ok;
            } catch (error) {
                console.error("Gagal menyimpan latihan D3:", error);
                return false;
            }
        }

        function ambilJawabanLatihan1D3() {
            return {
                lat1_x1: document.getElementById("lat1_x1")?.value.trim() ?? "",
                lat1_y1: document.getElementById("lat1_y1")?.value.trim() ?? "",
                lat1_m: document.getElementById("lat1_m")?.value.trim() ?? "",

                lat1_sub_y1: document.getElementById("lat1_sub_y1")?.value.trim() ?? "",
                lat1_sub_m: document.getElementById("lat1_sub_m")?.value.trim() ?? "",
                lat1_sub_x1: document.getElementById("lat1_sub_x1")?.value.trim() ?? "",

                lat1_akhir: document.getElementById("lat1_akhir")?.value.trim() ?? "",
                lat1_umum: document.getElementById("lat1_umum")?.value.trim() ?? "",
            };
        }

        function ambilJawabanLatihan2D3() {
            return {
                lat2_m_atas1: document.getElementById("lat2_m_atas1")?.value.trim() ?? "",
                lat2_m_atas2: document.getElementById("lat2_m_atas2")?.value.trim() ?? "",
                lat2_m_bawah1: document.getElementById("lat2_m_bawah1")?.value.trim() ?? "",
                lat2_m_bawah2: document.getElementById("lat2_m_bawah2")?.value.trim() ?? "",

                lat2_m_sederhana_atas: document.getElementById("lat2_m_sederhana_atas")?.value.trim() ?? "",
                lat2_m_sederhana_bawah: document.getElementById("lat2_m_sederhana_bawah")?.value.trim() ?? "",

                lat2_sub_y1: document.getElementById("lat2_sub_y1")?.value.trim() ?? "",
                lat2_sub_m_atas: document.getElementById("lat2_sub_m_atas")?.value.trim() ?? "",
                lat2_sub_m_bawah: document.getElementById("lat2_sub_m_bawah")?.value.trim() ?? "",
                lat2_sub_x1: document.getElementById("lat2_sub_x1")?.value.trim() ?? "",

                lat2_akhir: document.getElementById("lat2_akhir")?.value.trim() ?? "",
                lat2_umum: document.getElementById("lat2_umum")?.value.trim() ?? "",
            };
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
        // Validasi umum
        // =========================
        function cekIsianLatihanSejajar(id, jawabanBenar) {
            const el = document.getElementById(id);
            if (!el) return false;

            const nilai = normLatihanSejajar(el.value);
            const daftar = Array.isArray(jawabanBenar) ? jawabanBenar : [jawabanBenar];
            const cocok = daftar.map(normLatihanSejajar).includes(nilai);

            el.classList.remove("is-valid", "is-invalid");
            el.classList.add(cocok ? "is-valid" : "is-invalid");

            return cocok;
        }

        function resetInput(ids) {
            ids.forEach((id) => {
                const el = document.getElementById(id);

                if (el) {
                    el.value = "";
                    el.classList.remove("is-valid", "is-invalid");
                }
            });
        }

        function tampilkanPetunjuk(idElemen, pesan) {
            const el = document.getElementById(idElemen);
            if (!el) return;

            el.innerHTML = `
        <div class="alert alert-info py-2 mb-0">
            ${pesan}
        </div>
    `;

            renderMathSafe(el);
        }

        function kosongkanPetunjuk(idElemen) {
            const el = document.getElementById(idElemen);
            if (el) el.innerHTML = "";
        }

        function isiFeedback(idElemen, tipe, pesan) {
            const el = document.getElementById(idElemen);
            if (!el) return;

            const kelas = tipe === "success" ? "alert-success" : "alert-warning";

            el.innerHTML = `
        <div class="alert ${kelas} py-2 mb-0">
            ${pesan}
        </div>
    `;

            renderMathSafe(el);
        }

        // =========================
        // Latihan 1
        // =========================
        async function cekLatihan1Sejajar() {
            const benarX1 = cekIsianLatihanSejajar("lat1_x1", ["4"]);
            const benarY1 = cekIsianLatihanSejajar("lat1_y1", ["1"]);
            const benarM = cekIsianLatihanSejajar("lat1_m", ["2"]);

            const benarSubY1 = cekIsianLatihanSejajar("lat1_sub_y1", ["1"]);
            const benarSubM = cekIsianLatihanSejajar("lat1_sub_m", ["2"]);
            const benarSubX1 = cekIsianLatihanSejajar("lat1_sub_x1", ["4"]);

            const benarAkhir = cekIsianLatihanSejajar("lat1_akhir", ["2x-7", "2x - 7"]);

            const benarUmum = cekIsianLatihanSejajar("lat1_umum", [
                "2x-y-7",
                "2x - y - 7",
                "-2x+y+7",
            ]);

            const semuaBenar =
                benarX1 &&
                benarY1 &&
                benarM &&
                benarSubY1 &&
                benarSubM &&
                benarSubX1 &&
                benarAkhir &&
                benarUmum;

            const nextBtn = document.getElementById("nextBtnLatihan1");

            if (semuaBenar) {
                isiFeedback(
                    "feedbackLatihan1",
                    "success",
                    "Bagus, jawabanmu sudah benar. Persamaan garisnya adalah $y = 2x - 7$. Silakan lanjut ke soal berikutnya.",
                );
                kosongkanPetunjuk("petunjukLatihan1");

                if (nextBtn) nextBtn.disabled = false;

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L1`,
                    "input",
                    ambilJawabanLatihan1D3(),
                    true
                );
                return;
            }

            isiFeedback(
                "feedbackLatihan1",
                "warning",
                "Masih ada jawaban yang belum tepat. Coba periksa kembali jawabanmu.",
            );

            if (nextBtn) nextBtn.disabled = true;
            resetStepSetelah(2);

            if (!benarX1 || !benarY1) {
                tampilkanPetunjuk(
                    "petunjukLatihan1",
                    "Petunjuk: baca titik $A(4,1)$, lalu tentukan $x_1$ dan $y_1$.",
                );
                return;
            }

            if (!benarM) {
                tampilkanPetunjuk(
                    "petunjukLatihan1",
                    "Petunjuk: karena garis sejajar, gradien garis yang dicari sama dengan gradien yang diketahui.",
                );
                return;
            }

            if (!benarSubY1 || !benarSubM || !benarSubX1) {
                tampilkanPetunjuk(
                    "petunjukLatihan1",
                    "Petunjuk: masukkan titik $(4,1)$ dan gradien $2$ ke bentuk $y-y_1=m(x-x_1)$.",
                );
                return;
            }

            if (!benarAkhir) {
                tampilkanPetunjukLatihan1("Petunjuk: sederhanakan $y - 1 = 2(x - 4)$.");
                return;
            }

            if (!benarUmum) {
                tampilkanPetunjuk(
                    "petunjukLatihan1",
                    "Petunjuk: ubah $y = 2x - 7$ ke bentuk umum $ax + by + c = 0$.",
                );
            }
        }

        function resetLatihan1Sejajar() {
            resetInput([
                "lat1_x1",
                "lat1_y1",
                "lat1_m",
                "lat1_sub_y1",
                "lat1_sub_m",
                "lat1_sub_x1",
                "lat1_akhir",
                "lat1_umum",
            ]);

            const feedback = document.getElementById("feedbackLatihan1");
            const petunjuk = document.getElementById("petunjukLatihan1");
            const nextBtn = document.getElementById("nextBtnLatihan1");

            if (feedback) feedback.innerHTML = "";
            if (petunjuk) petunjuk.innerHTML = "";
            if (nextBtn) nextBtn.disabled = true;

            resetStepSetelah(2);
        }

        // =========================
        // Latihan 2
        // =========================
        async function cekLatihan2Sejajar() {
            const benarMAtas1 = cekIsianLatihanSejajar("lat2_m_atas1", ["1"]);
            const benarMAtas2 = cekIsianLatihanSejajar("lat2_m_atas2", ["4"]);
            const benarMBawah1 = cekIsianLatihanSejajar("lat2_m_bawah1", ["5"]);
            const benarMBawah2 = cekIsianLatihanSejajar("lat2_m_bawah2", ["3"]);

            const benarMSederhanaAtas = cekIsianLatihanSejajar(
                "lat2_m_sederhana_atas",
                ["-3", "3"],
            );

            const benarMSederhanaBawah = cekIsianLatihanSejajar(
                "lat2_m_sederhana_bawah",
                ["2", "-2"],
            );

            const benarSubY1 = cekIsianLatihanSejajar("lat2_sub_y1", ["6"]);
            const benarSubMAtas = cekIsianLatihanSejajar("lat2_sub_m_atas", [
                "-3",
                "3",
            ]);
            const benarSubMBawah = cekIsianLatihanSejajar("lat2_sub_m_bawah", [
                "2",
                "-2",
            ]);
            const benarSubX1 = cekIsianLatihanSejajar("lat2_sub_x1", ["4"]);

            const benarAkhir = cekIsianLatihanSejajar("lat2_akhir", [
                "-3/2x+12",
                "-3/2x + 12",
                "-1.5x+12",
                "-1.5x + 12",
            ]);

            const benarUmum = cekIsianLatihanSejajar("lat2_umum", [
                "3x+2y-24",
                "3x + 2y - 24",
                "-3x-2y+24",
                "-3x - 2y + 24",
            ]);

            const semuaBenar =
                benarMAtas1 &&
                benarMAtas2 &&
                benarMBawah1 &&
                benarMBawah2 &&
                benarMSederhanaAtas &&
                benarMSederhanaBawah &&
                benarSubY1 &&
                benarSubMAtas &&
                benarSubMBawah &&
                benarSubX1 &&
                benarAkhir &&
                benarUmum;

            const feedback = document.getElementById("feedbackLatihan2");
            const akhir = document.getElementById("pesanAkhirLatihan");

            if (semuaBenar) {
                isiFeedback(
                    "feedbackLatihan2",
                    "success",
                    "Bagus, jawabanmu sudah benar. Persamaan garisnya adalah $y = -\\frac{3}{2}x + 12$, atau $3x + 2y - 24 = 0$.",
                );
                kosongkanPetunjuk("petunjukLatihan2");

                if (akhir) {
                    akhir.innerHTML = `
                <div class="alert alert-success fw-semibold text-center mt-3">
                    Bagus, kamu sudah memahami persamaan garis yang sejajar dengan garis lain.
                    Silakan lanjut ke materi berikutnya.
                </div>
            `;
                    renderMathSafe(akhir);
                }

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L2`,
                    "input",
                    ambilJawabanLatihan2D3(),
                    true
                );

                const saved = await saveProgressMateri();

                if (saved) {
                    bukaNextButton();
                } else if (akhir) {
                    akhir.innerHTML += `
                <div class="alert alert-warning mt-2 mb-0">
                    Jawaban benar, tetapi progres belum tersimpan. Coba cek koneksi atau refresh halaman.
                </div>
            `;
                }

                return;
            }

            isiFeedback(
                "feedbackLatihan2",
                "warning",
                "Masih ada jawaban yang belum tepat. Coba periksa kembali jawabanmu.",
            );

            if (akhir) akhir.innerHTML = "";

            if (!benarMAtas1 || !benarMAtas2 || !benarMBawah1 || !benarMBawah2) {
                tampilkanPetunjuk(
                    "petunjukLatihan2",
                    "Petunjuk: gunakan rumus gradien dari dua titik, yaitu selisih $y$ dibagi selisih $x$.",
                );
                return;
            }

            if (!benarMSederhanaAtas || !benarMSederhanaBawah) {
                tampilkanPetunjuk(
                    "petunjukLatihan2",
                    "Petunjuk: sederhanakan $1 - 4$ dan $5 - 3$ terlebih dahulu.",
                );
                return;
            }

            if (!benarSubY1 || !benarSubMAtas || !benarSubMBawah || !benarSubX1) {
                tampilkanPetunjuk(
                    "petunjukLatihan2",
                    "Petunjuk: gunakan titik $(4,6)$ dan gradien yang sama karena kedua garis sejajar.",
                );
                return;
            }

            if (!benarAkhir) {
                tampilkanPetunjuk(
                    "petunjukLatihan2",
                    "Petunjuk: sederhanakan $y - 6 = -\\frac{3}{2}(x - 4)$.",
                );
                return;
            }

            if (!benarUmum) {
                tampilkanPetunjuk(
                    "petunjukLatihan2",
                    "Petunjuk: hilangkan dulu pecahan pada $y = -\\frac{3}{2}x + 12$ dengan mengalikan semua ruas dengan $2$, lalu pindahkan semua suku ke satu ruas hingga berbentuk $ax + by + c = 0$.",
                );
            }
        }

        function resetLatihan2Sejajar() {
            resetInput([
                "lat2_m_atas1",
                "lat2_m_atas2",
                "lat2_m_bawah1",
                "lat2_m_bawah2",
                "lat2_m_sederhana_atas",
                "lat2_m_sederhana_bawah",
                "lat2_sub_y1",
                "lat2_sub_m_atas",
                "lat2_sub_m_bawah",
                "lat2_sub_x1",
                "lat2_akhir",
                "lat2_umum",
            ]);

            const feedback = document.getElementById("feedbackLatihan2");
            const petunjuk = document.getElementById("petunjukLatihan2");
            const akhir = document.getElementById("pesanAkhirLatihan");

            if (feedback) feedback.innerHTML = "";
            if (petunjuk) petunjuk.innerHTML = "";
            if (akhir) akhir.innerHTML = "";
        }

        // =========================
        // RESTORE PROGRESS D3
        // =========================
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

        function ambilSavedJawaban(latihanKey) {
            const saved = SAVED_LATIHAN?.[latihanKey]?.jawaban;

            if (!saved) return null;

            if (typeof saved === "string") {
                try {
                    return JSON.parse(saved);
                } catch (error) {
                    console.error("Gagal parse jawaban tersimpan:", error);
                    return null;
                }
            }

            return saved;
        }

        function restoreLatihan1D3() {
            const saved = ambilSavedJawaban(`${MATERI_SLUG}_L1`);
            if (!saved) return;

            Object.entries(saved).forEach(([id, value]) => {
                setValueSafe(id, value);
            });

            beriValid(Object.keys(saved));

            const fb = document.getElementById("feedbackLatihan1");
            const nextBtn = document.getElementById("nextBtnLatihan1");
            const latihan2 = document.getElementById("latihanStep2");

            if (fb) {
                fb.innerHTML = `
            <div class="alert alert-success py-2 mb-0">
                Jawaban Latihan 1 sudah tersimpan.
            </div>
        `;
                renderMathSafe(fb);
            }

            if (nextBtn) nextBtn.disabled = false;
            if (latihan2) latihan2.style.display = "block";
        }

        function restoreLatihan2D3() {
            const saved = ambilSavedJawaban(`${MATERI_SLUG}_L2`);
            if (!saved) return;

            Object.entries(saved).forEach(([id, value]) => {
                setValueSafe(id, value);
            });

            beriValid(Object.keys(saved));

            const latihan2 = document.getElementById("latihanStep2");
            const fb = document.getElementById("feedbackLatihan2");
            const akhir = document.getElementById("pesanAkhirLatihan");

            if (latihan2) latihan2.style.display = "block";

            if (fb) {
                fb.innerHTML = `
            <div class="alert alert-success py-2 mb-0">
                Jawaban Latihan 2 sudah tersimpan.
            </div>
        `;
                renderMathSafe(fb);
            }

            if (akhir) {
                akhir.innerHTML = `
            <div class="alert alert-success fw-semibold text-center mt-3">
                Bagus, kamu sudah memahami persamaan garis yang sejajar dengan garis lain.
                Silakan lanjut ke materi berikutnya.
            </div>
        `;
                renderMathSafe(akhir);
            }

            bukaNextButton();
        }

        function restoreProgressD3() {
            restoreLatihan1D3();
            restoreLatihan2D3();

            if (IS_MATERI_COMPLETED) {
                const latihan2 = document.getElementById("latihanStep2");
                const nextBtn1 = document.getElementById("nextBtnLatihan1");

                if (latihan2) latihan2.style.display = "block";
                if (nextBtn1) nextBtn1.disabled = false;

                bukaNextButton();
            }

            renderMathSafe(document.getElementById("latihanD3Box") || document.body);
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
