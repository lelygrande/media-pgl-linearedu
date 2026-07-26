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

    {{-- Subjudul --}}
    <h2 class="mt-2 mb-3" style="font-weight: 600;">4. Persamaan Garis yang Melalui Satu Titik dan Tegak Lurus dengan Garis
        Lain</h2>

    {{-- ========================================================= --}}
    {{-- EKSPLORASI --}}
    {{-- ========================================================= --}}
    <div class="box-eksplorasi mt-5">

        <div class="title-box">
            Eksplorasi
        </div>


        <div class="mt-3">
            <p>
                Perhatikan gambar berikut.
            </p>

            <figure class="text-center mb-3">
                <img src="{{ asset('img/pgl/pgl_tegaklurus.png') }}" alt="Gambar dua garis saling tegak lurus"
                    class="img-fluid rounded" style="max-width: 320px;">
                <figcaption class="mt-2 text-muted" style="font-size: 14px;">
                    Gambar dua garis yang saling tegak lurus pada bidang koordinat.
                </figcaption>
            </figure>

            <p>
                Misalkan gradien garis <span>$g$</span> adalah <span>$m_g$</span>. Karena garis <span>$h$</span> tegak lurus
                dengan garis <span>$g$</span>, maka hubungan gradien kedua garis tersebut adalah:
            </p>

            <p>
                <span>$m_g \times m_h =$</span>
                <input type="text" id="eks_tl_1"
                    class="form-control form-control-sm d-inline-block text-center jawaban-latihan" style="width:90px;">
            </p>

            <p>
                Jika gradien garis <span>$g$</span> adalah <span>$m_g$</span>, maka gradien garis <span>$h$</span> adalah:
            </p>

            <div class="d-flex align-items-center flex-wrap gap-2 mb-3">
                <span>$m_h =$</span>
                <div class="frac-input">
                    <div class="top">
                        <input type="text" id="eks_tl_2_atas"
                            class="form-control form-control-sm text-center jawaban-latihan">
                    </div>
                    <div class="bottom">
                        <input type="text" id="eks_tl_2_bawah"
                            class="form-control form-control-sm text-center jawaban-latihan">
                    </div>
                </div>
            </div>

            <p>
                Garis <span>$h$</span> melalui titik <span>$(x_1, y_1)$</span>. Oleh karena itu, persamaan garis
                <span>$h$</span>
                dapat ditulis dalam bentuk:
            </p>

            <div class="mb-3" style="width: fit-content;">
                <span>$y-$</span>
                <input type="text" id="eks_tl_3"
                    class="form-control form-control-sm d-inline-block text-center jawaban-latihan" style="width:90px;">
                <span>$= $</span>
                <input type="text" id="eks_tl_4"
                    class="form-control form-control-sm d-inline-block text-center jawaban-latihan" style="width:120px;">
                <span>$(x-$</span>
                <input type="text" id="eks_tl_5"
                    class="form-control form-control-sm d-inline-block text-center jawaban-latihan" style="width:90px;">
                <span>$)$</span>
            </div>

            <div class="mt-3">
                <button class="btn btn-palet btn-sm" onclick="cekEksplorasiTegakLurus()">Cek Jawaban</button>
                <div id="feedbackEksplorasiTegakLurus" class="mt-2"></div>
                <div id="pembahasanEksplorasiTegakLurus" class="box-kesimpulan mt-3 d-none">
                    <b>Pembahasan:</b>

                    <p class="mb-2 mt-2">
                        Karena garis <span>$g$</span> tegak lurus dengan garis <span>$h$</span>,
                        maka hasil kali gradien kedua garis tersebut adalah <span>$-1$</span>.
                    </p>

                    <div class="rumus-box mb-3" style="width: fit-content;">
                        <span>$m_g \times m_h = -1$</span>
                    </div>

                    <p class="mb-2">
                        Jika gradien garis <span>$g$</span> adalah <span>$m_g$</span>,
                        maka gradien garis <span>$h$</span> adalah:
                    </p>

                    <div class="rumus-box mb-3" style="width: fit-content;">
                        <span>$m_h = -\dfrac{1}{m_g}$</span>
                    </div>

                    <p class="mb-2">
                        Karena garis <span>$h$</span> melalui titik <span>$(x_1, y_1)$</span>
                        dan memiliki gradien <span>$m_h$</span>, maka bentuk persamaannya adalah:
                    </p>

                    <div class="rumus-box mb-0" style="width: fit-content;">
                        <span>$y - y_1 = m_h(x - x_1)$</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    {{-- ========================================================= --}}
    {{-- MATERI KONSEP --}}
    {{-- ========================================================= --}}
    <div class="card card-materi mt-5 mb-4">
        <div class="card-body">
            <span class="badge-sub">Persamaan Garis yang Melalui Satu Titik dan Tegak Lurus dengan Garis Lain</span>

            <p class="mt-3">
                Untuk menentukan persamaan garis yang melalui satu titik dan tegak lurus dengan garis lain,
                kita perlu mengingat kembali hubungan gradien dua garis yang saling tegak lurus.
            </p>

            <p>
                Pada subbab sebelumnya telah dipelajari bahwa dua garis yang saling tegak lurus
                memiliki hasil kali gradien sama dengan <span>$-1$</span>.
            </p>

            <p>
                Jika garis pertama memiliki gradien <span>$m_1$</span> dan garis kedua memiliki
                gradien <span>$m_2$</span>, maka hubungan gradiennya dapat dituliskan sebagai:
            </p>

            <div class="rumus-box mb-3 text-center mx-auto" style="width: fit-content;">
                <span>$m_1 \times m_2 = -1$</span>
            </div>

            <p>
                Jika suatu garis memiliki gradien <span>$m$</span>, maka gradien garis yang
                tegak lurus dengannya adalah:
            </p>

            <div class="rumus-box mb-3 text-center mx-auto" style="width: fit-content;">
                <span>$m_2 = -\dfrac{1}{m}$</span>
            </div>

            <p>
                Setelah gradien garis baru diketahui, persamaan garis yang melalui titik
                <span>$(x_1, y_1)$</span> dapat ditentukan dengan menggunakan bentuk persamaan garis
                melalui satu titik dan gradien, yaitu:
            </p>

            <div class="rumus-box mb-3 text-center mx-auto" style="width: fit-content;">
                <span>$y - y_1 = m(x - x_1)$</span>
            </div>

            <p>
                Dengan demikian, langkah menentukan persamaan garis yang melalui satu titik dan
                tegak lurus dengan garis lain adalah sebagai berikut:
            </p>

            <ol class="mb-3">
                <li>Menentukan gradien garis <span>$(m_1)$</span> yang diketahui.</li>
                <li>
                    Mencari gradien garis yang tegak lurus <span>$(m_2)$</span> dengan menggunakan
                    hubungan <span>$m_1 \times m_2 = -1$</span>.
                </li>
                <li>
                    Mensubstitusikan gradien baru dan titik yang dilalui ke persamaan
                    <span>$y - y_1 = m(x - x_1)$</span>.
                </li>
            </ol>
        </div>
    </div>

    {{-- Contoh --}}
    <div class="box-contoh mt-5 mb-4">
        <div class="card-body">
            <span class="title-box">Contoh</span>

            <p style="line-height:1.8; text-align:justify;">
                Tentukan persamaan garis yang melalui titik \(A(8,6)\) dan tegak lurus dengan garis
                \(y = -4x + 9\).
            </p>

            <p class="mb-2"><b>Penyelesaian:</b></p>

            <p style="line-height:1.8; text-align:justify;">
                Gradien garis \(y = -4x + 9\) adalah \(m_1 = -4\).
            </p>

            <p style="line-height:1.8; text-align:justify;">
                Karena garis yang dicari tegak lurus dengan garis \(y = -4x + 9\), maka gradiennya
                dapat ditentukan dengan hubungan:
            </p>

            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <p class="mb-1" style="line-height:2;">
                        \(m_2 = -\dfrac{1}{m_1}\)
                    </p>
                    <p class="mb-1" style="line-height:2;">
                        \(m_2 = -\dfrac{1}{-4}\)
                    </p>
                    <p class="mb-0" style="line-height:2;">
                        \(m_2 = \dfrac{1}{4}\)
                    </p>
                </div>

                <div class="col-md-6">
                    <p class="mb-1" style="line-height:2;">
                        Atau menggunakan sifat \(m_1 \times m_2 = -1\):
                    </p>
                    <p class="mb-1" style="line-height:2;">
                        \((-4) \times m_2 = -1\)
                    </p>
                    <p class="mb-0" style="line-height:2;">
                        \(m_2 = \dfrac{1}{4}\)
                    </p>
                </div>
            </div>

            <p style="line-height:1.8; text-align:justify;">
                Jadi, gradien garis yang tegak lurus dengan \(y = -4x + 9\) adalah
                \(m_2 = \dfrac{1}{4}\).
            </p>

            <p style="line-height:1.8; text-align:justify;">
                Titik yang dilalui adalah \(A(8,6)\), sehingga \(x_1 = 8\) dan \(y_1 = 6\).
            </p>

            <p style="line-height:1.8; text-align:justify;">
                Gunakan rumus persamaan garis yang melalui satu titik:
            </p>

            <p class="text-center fw-bold" style="line-height:2;">
                \(y-y_1=m(x-x_1)\)
            </p>

            <p style="line-height:1.8; text-align:justify;">
                Substitusikan nilai \(m_2=\dfrac{1}{4}\), \(x_1=8\), dan \(y_1=6\) ke dalam rumus tersebut.
            </p>

            <p class="mb-2">
                <b>Coba lengkapi substitusi ke rumus berikut:</b>
            </p>

            <div class="my-3 text-center" style="line-height:2.2;">
                <span>\(y-\)</span>

                <input type="text" id="cs_tl_sub_y1"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh bg-white"
                    style="width:80px;">

                <span>\(=\)</span>

                <div class="frac-input d-inline-flex align-middle mx-1">
                    <div class="top">
                        <input type="text" id="cs_tl_sub_m_atas"
                            class="form-control form-control-sm text-center jawaban-contoh bg-white">
                    </div>
                    <div class="bottom">
                        <input type="text" id="cs_tl_sub_m_bawah"
                            class="form-control form-control-sm text-center jawaban-contoh bg-white">
                    </div>
                </div>

                <span>\((x-\)</span>

                <input type="text" id="cs_tl_sub_x1"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh bg-white"
                    style="width:80px;">

                <span>\()\)</span>
            </div>

            <div class="petunjuk-mini-latihan mb-3">
                <strong>Petunjuk Pengerjaan:</strong>
                Isilah kotak kosong sesuai nilai yang sudah diketahui, yaitu nilai \(y_1\), pembilang dan penyebut
                gradien \(m\), serta nilai \(x_1\).
            </div>

            <div class="mt-3">
                <button class="btn btn-palet btn-sm" type="button" onclick="cekContohSoalTegakLurus()">
                    Cek Jawaban
                </button>

                <button class="btn btn-tampil btn-sm" type="button"
                    onclick="toggleSolusi('pembahasanContohSoalTegakLurus')">
                    Tampilkan Jawaban
                </button>

                <div id="feedbackContohSoalTegakLurus" class="mt-2"></div>
            </div>

            <div id="pembahasanContohSoalTegakLurus" class="box-kesimpulan mt-3 d-none">
                <b>Pembahasan:</b>

                <ol class="mb-0 mt-2" style="line-height:1.9;">
                    <li>
                        Gradien garis \(y=-4x+9\) adalah \(m_1=-4\).
                    </li>

                    <li>
                        Karena garis yang dicari tegak lurus, maka:
                        <div class="my-2 ps-3" style="line-height:2;">
                            \(m_2=-\dfrac{1}{m_1}\)<br>
                            \(m_2=-\dfrac{1}{-4}\)<br>
                            \(m_2=\dfrac{1}{4}\)
                        </div>
                    </li>

                    <li>
                        Titik yang dilalui adalah \(A(8,6)\), sehingga \(x_1=8\) dan \(y_1=6\).
                    </li>

                    <li>
                        Substitusikan ke rumus \(y-y_1=m(x-x_1)\):
                        <div class="my-2 ps-3" style="line-height:2;">
                            \(y-6=\dfrac{1}{4}(x-8)\)
                        </div>
                    </li>

                    <li>
                        Uraikan ruas kanan:
                        <div class="my-2 ps-3" style="line-height:2;">
                            \(y-6=\dfrac{1}{4}x-2\)
                        </div>
                    </li>

                    <li>
                        Pindahkan \(-6\) ke ruas kanan dengan menambahkan \(6\) pada kedua ruas:
                        <div class="my-2 ps-3" style="line-height:2;">
                            \(y=\dfrac{1}{4}x-2+6\)<br>
                            \(y=\dfrac{1}{4}x+4\)
                        </div>
                    </li>

                    <li>
                        Bentuk umum dari persamaan tersebut adalah:
                        <div class="my-2 ps-3" style="line-height:2;">
                            \(y=\dfrac{1}{4}x+4\)<br>
                            \(4y=x+16\)<br>
                            \(x-4y+16=0\)
                        </div>
                    </li>
                </ol>

                <div class="alert alert-success mt-3 mb-0" style="border-radius:14px; line-height:1.8;">
                    Jadi, persamaan garis yang dicari adalah <b>\(y=\dfrac{1}{4}x+4\)</b>,
                    atau dalam bentuk umum implisitnya <b>\(x-4y+16=0\)</b>.
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
    <div class="box-latihan mt-5 mb-4" id="latihanDLastBox">
        <div class="card-body">
            <span class="title-box">Latihan Soal</span>

            {{-- ===================== --}}
            {{-- LATIHAN 1 --}}
            {{-- ===================== --}}
            <div class="latihan-step" id="latihanStep1">
                <p class="mt-3">
                    <b>1.</b> Pada sebuah peta koordinat, seorang siswa ingin menggambar jalan kecil yang melalui titik
                    <span>$D(4,2)$</span>. Jalan kecil itu harus tegak lurus terhadap jalan utama yang dinyatakan oleh
                    persamaan <span>$y = -3x + 7$</span>. Tentukan persamaan jalan kecil tersebut.
                </p>

                <p class="mb-2"><b>Penyelesaian:</b></p>

                <div class="hitung-turun">

                    <p class="hitung-info">
                        Gradien garis utama:
                    </p>

                    <div class="hitung-line">
                        <div class="hitung-left">$m_1$</div>
                        <div class="hitung-eq">$=$</div>
                        <div class="hitung-right">
                            <input type="text" id="lat1_m1"
                                class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                style="width:80px;">
                        </div>
                    </div>

                    <p class="hitung-info">
                        Gradien garis yang tegak lurus:
                    </p>

                    <div class="hitung-line">
                        <div class="hitung-left">$m_2$</div>
                        <div class="hitung-eq">$=$</div>
                        <div class="hitung-right">
                            <div class="frac-latihan" style="min-width:110px;">
                                <div class="atas">
                                    <input type="text" id="lat1_m2_atas"
                                        class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                </div>

                                <div class="bawah">
                                    <input type="text" id="lat1_m2_bawah"
                                        class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="hitung-info">
                        Dengan menggunakan rumus umum:
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
                            <div class="frac-latihan" style="min-width:110px;">
                                <div class="atas">
                                    <input type="text" id="lat1_sub_m_atas"
                                        class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                </div>

                                <div class="bawah">
                                    <input type="text" id="lat1_sub_m_bawah"
                                        class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                </div>
                            </div>

                            <span>$(x-$</span>
                            <input type="text" id="lat1_sub_x1"
                                class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                style="width:80px;">
                            <span>$)$</span>
                        </div>
                    </div>

                    <div class="hitung-line">
                        <div class="hitung-left">
                            $y-$
                            <input type="text" id="lat1_urai1"
                                class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                style="width:80px;">
                        </div>

                        <div class="hitung-eq">$=$</div>

                        <div class="hitung-right">
                            <input type="text" id="lat1_urai2"
                                class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                style="width:180px;">
                        </div>
                    </div>

                    <div class="hitung-line">
                        <div class="hitung-left">$y$</div>
                        <div class="hitung-eq">$=$</div>
                        <div class="hitung-right">
                            <input type="text" id="lat1_akhir"
                                class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                style="width:200px;">
                        </div>
                    </div>

                </div>

                <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div>
                        <button class="btn btn-palet btn-sm" type="button" onclick="cekLatihan1TegakLurus()">
                            Cek Jawaban
                        </button>

                        <button class="btn btn-palet btn-sm" type="button" onclick="resetLatihan1TegakLurus()">
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
                    <b>2.</b> Seorang siswa menggambar garis bantu pada bidang koordinat. Garis itu harus melalui titik
                    <span>$E(7,-4)$</span> dan tegak lurus terhadap garis lain yang mempunyai gradien
                    <span>$-\dfrac{2}{5}$</span>. Tentukan persamaan garis tersebut.
                </p>

                <p class="mb-2"><b>Penyelesaian:</b></p>

                <div class="hitung-turun">

                    <p class="hitung-info">
                        Gradien garis yang dicari:
                    </p>

                    <div class="hitung-line">
                        <div class="hitung-left">$m$</div>
                        <div class="hitung-eq">$=$</div>
                        <div class="hitung-right">
                            <div class="frac-latihan" style="min-width:110px;">
                                <div class="atas">
                                    <input type="text" id="lat2_m_atas"
                                        class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                </div>

                                <div class="bawah">
                                    <input type="text" id="lat2_m_bawah"
                                        class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="hitung-info">
                        Dengan menggunakan rumus umum:
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
                        <div class="hitung-left">
                            $y+$
                            <input type="text" id="lat2_urai1"
                                class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                style="width:80px;">
                        </div>

                        <div class="hitung-eq">$=$</div>

                        <div class="hitung-right">
                            <input type="text" id="lat2_urai2"
                                class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                style="width:200px;">
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
                        Bentuk umum:
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
                        <button class="btn btn-palet btn-sm" type="button" onclick="cekLatihan2TegakLurus()">
                            Cek Jawaban
                        </button>

                        <button class="btn btn-palet btn-sm" type="button" onclick="resetLatihan2TegakLurus()">
                            Reset
                        </button>
                    </div>

                    <button id="nextBtnLatihan2" class="btn btn-palet btn-sm" type="button" onclick="nextLatihan(3)"
                        disabled>
                        Lanjut ke Latihan 3
                    </button>
                </div>

                <div id="feedbackLatihan2" class="mt-2"></div>
                <div id="petunjukLatihan2" class="mt-2"></div>
            </div>

            {{-- ===================== --}}
            {{-- LATIHAN 3 --}}
            {{-- ===================== --}}
            <div class="latihan-step" id="latihanStep3" style="display:none;">
                <hr class="my-4">

                <p class="mt-3">
                    <b>3.</b> Pada suatu denah sekolah, terdapat sebuah jalur utama yang melalui titik <span>$(1,14)$</span>
                    dan <span>$(9,6)$</span>. Pihak sekolah akan membuat jalur baru menuju kantin yang melalui titik
                    <span>$(12,-3)$</span> dan tegak lurus terhadap jalur utama tersebut. Tentukan persamaan jalur baru itu.
                </p>

                <p class="mb-2"><b>Penyelesaian:</b></p>

                <div class="hitung-turun">

                    <p class="hitung-info">
                        Gradien jalur utama:
                    </p>

                    <div class="hitung-line">
                        <div class="hitung-left">$m_1$</div>
                        <div class="hitung-eq">$=$</div>
                        <div class="hitung-right">
                            <div class="frac-latihan">
                                <div class="atas">
                                    <input type="text" id="lat3_m1_atas1"
                                        class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                    <span>$-$</span>
                                    <input type="text" id="lat3_m1_atas2"
                                        class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                </div>

                                <div class="bawah">
                                    <input type="text" id="lat3_m1_bawah1"
                                        class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                    <span>$-$</span>
                                    <input type="text" id="lat3_m1_bawah2"
                                        class="form-control form-control-sm text-center input-matematika jawaban-latihan">
                                </div>
                            </div>

                            <span>$=$</span>

                            <input type="text" id="lat3_m1_final"
                                class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                style="width:80px;">
                        </div>
                    </div>

                    <p class="hitung-info">
                        Gradien jalur baru:
                    </p>

                    <div class="hitung-line">
                        <div class="hitung-left">$m_2$</div>
                        <div class="hitung-eq">$=$</div>
                        <div class="hitung-right">
                            <input type="text" id="lat3_m2_final"
                                class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                style="width:80px;">
                        </div>
                    </div>

                    <p class="hitung-info">
                        Dengan menggunakan rumus umum:
                    </p>

                    <div class="hitung-line">
                        <div class="hitung-left">$y-y_1$</div>
                        <div class="hitung-eq">$=$</div>
                        <div class="hitung-right">$m(x-x_1)$</div>
                    </div>

                    <div class="hitung-line">
                        <div class="hitung-left">
                            $y-$
                            <input type="text" id="lat3_sub_y1"
                                class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                style="width:80px;">
                        </div>

                        <div class="hitung-eq">$=$</div>

                        <div class="hitung-right">
                            <input type="text" id="lat3_sub_m"
                                class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                style="width:80px;">
                            <span>$(x-$</span>
                            <input type="text" id="lat3_sub_x1"
                                class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                style="width:80px;">
                            <span>$)$</span>
                        </div>
                    </div>

                    <div class="hitung-line">
                        <div class="hitung-left">
                            $y+$
                            <input type="text" id="lat3_urai1"
                                class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                style="width:80px;">
                        </div>

                        <div class="hitung-eq">$=$</div>

                        <div class="hitung-right">
                            <input type="text" id="lat3_urai2"
                                class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                style="width:180px;">
                        </div>
                    </div>

                    <div class="hitung-line">
                        <div class="hitung-left">$y$</div>
                        <div class="hitung-eq">$=$</div>
                        <div class="hitung-right">
                            <input type="text" id="lat3_akhir"
                                class="form-control form-control-sm d-inline-block text-center input-matematika jawaban-latihan"
                                style="width:180px;">
                        </div>
                    </div>

                </div>

                <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <button class="btn btn-palet btn-sm" type="button" onclick="prevLatihan(2)">
                        Kembali ke Latihan 2
                    </button>

                    <div>
                        <button class="btn btn-palet btn-sm" type="button" onclick="cekLatihan3TegakLurus()">
                            Cek Jawaban
                        </button>

                        <button class="btn btn-palet btn-sm" type="button" onclick="resetLatihan3TegakLurus()">
                            Reset
                        </button>
                    </div>
                </div>

                <div id="feedbackLatihan3" class="mt-2"></div>
                <div id="petunjukLatihan3" class="mt-2"></div>
                <div id="pesanAkhirLatihan" class="mt-3"></div>
            </div>
        </div>
    </div>

    <script src="https://www.geogebra.org/apps/deployggb.js"></script>
    <script>
        // =========================================================
        // HELPER UMUM
        // =========================================================
        function normJawaban(teks) {
            return (teks || "")
                .toString()
                .trim()
                .toLowerCase()
                .replace(/\s+/g, "")
                .replace(/[()]/g, "");
        }

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
        }

        function kosongkan(id) {
            const el = document.getElementById(id);
            if (el) el.innerHTML = "";
        }

        function pindahLatihan(index) {
            const track = document.getElementById("latihanTrack");
            if (!track) return;
            track.style.transform = `translateX(-${index * 100}%)`;
        }

        // =========================================================
        // EKSPLORASI
        // =========================================================
        function cekEksplorasiTegakLurus() {
            const inputIds = [
                "eks_tl_1",
                "eks_tl_2_atas",
                "eks_tl_2_bawah",
                "eks_tl_3",
                "eks_tl_4",
                "eks_tl_5"
            ];

            const pembahasan = document.getElementById("pembahasanEksplorasiTegakLurus");

            const adaKosong = inputIds.some((id) => {
                const el = document.getElementById(id);
                return !el || el.value.trim() === "";
            });

            if (adaKosong) {
                isiPesan(
                    "feedbackEksplorasiTegakLurus",
                    "Lengkapi semua isian terlebih dahulu.",
                    "warning"
                );

                inputIds.forEach((id) => {
                    const el = document.getElementById(id);
                    if (el) el.classList.remove("is-valid", "is-invalid");
                });

                if (pembahasan) pembahasan.classList.add("d-none");
                return;
            }

            const benar1 = cekIsian("eks_tl_1", ["-1"]);
            const benar2atas = cekIsian("eks_tl_2_atas", ["-1"]);
            const benar2bawah = cekIsian("eks_tl_2_bawah", ["mg", "m_g"]);
            const benar3 = cekIsian("eks_tl_3", ["y1", "y_1"]);
            const benar4 = cekIsian("eks_tl_4", ["mh", "m_h"]);
            const benar5 = cekIsian("eks_tl_5", ["x1", "x_1"]);

            const semuaBenar =
                benar1 && benar2atas && benar2bawah && benar3 && benar4 && benar5;

            if (semuaBenar) {
                isiPesan(
                    "feedbackEksplorasiTegakLurus",
                    "Bagus, jawabanmu benar. Kamu sudah memahami hubungan gradien dua garis yang saling tegak lurus.",
                    "success"
                );

                if (pembahasan) pembahasan.classList.add("d-none");
                return;
            }

            isiPesan(
                "feedbackEksplorasiTegakLurus",
                "Masih ada jawaban yang belum tepat. Perhatikan pembahasan berikut untuk membantu memahami isian yang benar.",
                "warning"
            );

            if (pembahasan) pembahasan.classList.remove("d-none");
        }

        // =========================
        // CONTOH SOAL TEGAK LURUS
        // Siswa hanya mengisi substitusi ke rumus
        // =========================
        function normContoh(teks) {
            return String(teks || "")
                .trim()
                .toLowerCase()
                .replace(/\s+/g, "")
                .replace(/[(){}[\]]/g, "")
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

        function toggleSolusi(id) {
            const el = document.getElementById(id);
            if (!el) return;

            el.classList.toggle("d-none");
            renderMathSafe(el);
        }

        function cekContohSoalTegakLurus() {
            const benarSubY1 = cekIsianContoh("cs_tl_sub_y1", ["6"]);
            const benarSubMAtas = cekIsianContoh("cs_tl_sub_m_atas", ["1"]);
            const benarSubMBawah = cekIsianContoh("cs_tl_sub_m_bawah", ["4"]);
            const benarSubX1 = cekIsianContoh("cs_tl_sub_x1", ["8"]);

            const semuaBenar =
                benarSubY1 && benarSubMAtas && benarSubMBawah && benarSubX1;

            const pembahasan = document.getElementById(
                "pembahasanContohSoalTegakLurus",
            );

            if (semuaBenar) {
                isiFeedbackContoh(
                    "feedbackContohSoalTegakLurus",
                    "success",
                    "Benar. Substitusi ke rumus sudah tepat, yaitu $y-6=\\dfrac{1}{4}(x-8)$.",
                );

                if (pembahasan) {
                    pembahasan.classList.remove("d-none");
                    renderMathSafe(pembahasan);
                }

                return;
            }

            isiFeedbackContoh(
                "feedbackContohSoalTegakLurus",
                "warning",
                "Masih ada nilai yang belum tepat. Dari titik $A(8,6)$ diperoleh $x_1=8$ dan $y_1=6$. Karena garis tegak lurus dengan $y=-4x+9$, gradiennya menjadi $\\dfrac{1}{4}$.",
            );

            if (pembahasan) {
                pembahasan.classList.add("d-none");
            }
        }

        // =========================================================
        // LATIHAN MATERI TERAKHIR SUBBAB D
        // Sistem turun ke bawah + buka Kuis
        // =========================================================

        // =========================================================
        // HELPER UMUM LATIHAN
        // =========================================================
        function normJawaban(teks) {
            return String(teks || "")
                .trim()
                .toLowerCase()
                .replace(/\s+/g, "")
                .replace(/[()]/g, "")
                .replace(/−/g, "-");
        }

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
            renderMathSafe(el);
        }

        function kosongkan(id) {
            const el = document.getElementById(id);
            if (el) el.innerHTML = "";
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
            renderMathSafe(document.getElementById("latihanDLastBox") || document.body);
            restoreProgressDLast();
        });

        // =========================================================
        // NAVIGASI LATIHAN
        // =========================================================
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

        // =========================================================
        // SAVE PROGRESS + BUKA KUIS
        // =========================================================

        // =========================================================
        // SAVE LATIHAN PROGRESS D LAST
        // =========================================================
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
                console.log("Simpan latihan D Last:", data);

                return response.ok;
            } catch (error) {
                console.error("Gagal menyimpan latihan D Last:", error);
                return false;
            }
        }

        function ambilJawabanLatihan1DLast() {
            return {
                lat1_m1: document.getElementById("lat1_m1")?.value.trim() ?? "",
                lat1_m2_atas: document.getElementById("lat1_m2_atas")?.value.trim() ?? "",
                lat1_m2_bawah: document.getElementById("lat1_m2_bawah")?.value.trim() ?? "",

                lat1_sub_y1: document.getElementById("lat1_sub_y1")?.value.trim() ?? "",
                lat1_sub_m_atas: document.getElementById("lat1_sub_m_atas")?.value.trim() ?? "",
                lat1_sub_m_bawah: document.getElementById("lat1_sub_m_bawah")?.value.trim() ?? "",
                lat1_sub_x1: document.getElementById("lat1_sub_x1")?.value.trim() ?? "",

                lat1_urai1: document.getElementById("lat1_urai1")?.value.trim() ?? "",
                lat1_urai2: document.getElementById("lat1_urai2")?.value.trim() ?? "",

                lat1_akhir: document.getElementById("lat1_akhir")?.value.trim() ?? "",
            };
        }

        function ambilJawabanLatihan2DLast() {
            return {
                lat2_m_atas: document.getElementById("lat2_m_atas")?.value.trim() ?? "",
                lat2_m_bawah: document.getElementById("lat2_m_bawah")?.value.trim() ?? "",

                lat2_sub_y1: document.getElementById("lat2_sub_y1")?.value.trim() ?? "",
                lat2_sub_m_atas: document.getElementById("lat2_sub_m_atas")?.value.trim() ?? "",
                lat2_sub_m_bawah: document.getElementById("lat2_sub_m_bawah")?.value.trim() ?? "",
                lat2_sub_x1: document.getElementById("lat2_sub_x1")?.value.trim() ?? "",

                lat2_urai1: document.getElementById("lat2_urai1")?.value.trim() ?? "",
                lat2_urai2: document.getElementById("lat2_urai2")?.value.trim() ?? "",

                lat2_akhir: document.getElementById("lat2_akhir")?.value.trim() ?? "",
                lat2_umum: document.getElementById("lat2_umum")?.value.trim() ?? "",
            };
        }

        function ambilJawabanLatihan3DLast() {
            return {
                lat3_m1_atas1: document.getElementById("lat3_m1_atas1")?.value.trim() ?? "",
                lat3_m1_atas2: document.getElementById("lat3_m1_atas2")?.value.trim() ?? "",
                lat3_m1_bawah1: document.getElementById("lat3_m1_bawah1")?.value.trim() ?? "",
                lat3_m1_bawah2: document.getElementById("lat3_m1_bawah2")?.value.trim() ?? "",
                lat3_m1_final: document.getElementById("lat3_m1_final")?.value.trim() ?? "",

                lat3_m2_final: document.getElementById("lat3_m2_final")?.value.trim() ?? "",

                lat3_sub_y1: document.getElementById("lat3_sub_y1")?.value.trim() ?? "",
                lat3_sub_m: document.getElementById("lat3_sub_m")?.value.trim() ?? "",
                lat3_sub_x1: document.getElementById("lat3_sub_x1")?.value.trim() ?? "",

                lat3_urai1: document.getElementById("lat3_urai1")?.value.trim() ?? "",
                lat3_urai2: document.getElementById("lat3_urai2")?.value.trim() ?? "",

                lat3_akhir: document.getElementById("lat3_akhir")?.value.trim() ?? "",
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

        // =========================================================
        // RESET INPUT
        // =========================================================
        function resetInput(ids) {
            ids.forEach((id) => {
                const el = document.getElementById(id);

                if (el) {
                    el.value = "";
                    el.classList.remove("is-valid", "is-invalid");
                }
            });
        }

        // =========================================================
        // LATIHAN 1
        // Data: titik D(4,2), tegak lurus y = -3x + 7
        // Hasil: y = 1/3x + 2/3
        // =========================================================
        function tampilkanPetunjukLatihan1(pesan) {
            isiPesan("petunjukLatihan1", pesan, "info");
        }

        async function cekLatihan1TegakLurus() {
            const benarM1 = cekIsian("lat1_m1", ["-3"]);

            const benarM2Atas = cekIsian("lat1_m2_atas", ["1"]);
            const benarM2Bawah = cekIsian("lat1_m2_bawah", ["3"]);

            const benarSubY1 = cekIsian("lat1_sub_y1", ["2"]);
            const benarSubMAtas = cekIsian("lat1_sub_m_atas", ["1"]);
            const benarSubMBawah = cekIsian("lat1_sub_m_bawah", ["3"]);
            const benarSubX1 = cekIsian("lat1_sub_x1", ["4"]);

            const benarUrai1 = cekIsian("lat1_urai1", ["2"]);
            const benarUrai2 = cekIsian("lat1_urai2", [
                "1/3x-4/3",
                "1/3x - 4/3",
                "0.333x-1.333",
                "0.333x - 1.333",
                "0.33x-1.33",
                "0.33x - 1.33",
            ]);

            const benarAkhir = cekIsian("lat1_akhir", [
                "1/3x+2/3",
                "1/3x + 2/3",
                "0.333x+0.667",
                "0.333x + 0.667",
                "0.33x+0.67",
                "0.33x + 0.67",
            ]);

            const semuaBenar =
                benarM1 &&
                benarM2Atas &&
                benarM2Bawah &&
                benarSubY1 &&
                benarSubMAtas &&
                benarSubMBawah &&
                benarSubX1 &&
                benarUrai1 &&
                benarUrai2 &&
                benarAkhir;

            const nextBtn = document.getElementById("nextBtnLatihan1");

            if (semuaBenar) {
                isiPesan(
                    "feedbackLatihan1",
                    "Bagus, jawabanmu sudah benar. Silakan lanjut ke latihan berikutnya.",
                    "success",
                );

                kosongkan("petunjukLatihan1");

                if (nextBtn) nextBtn.disabled = false;

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L1`,
                    "input",
                    ambilJawabanLatihan1DLast(),
                    true
                );
                return;
            }

            isiPesan(
                "feedbackLatihan1",
                "Masih ada jawaban yang belum tepat. Coba periksa kembali jawabanmu.",
                "warning",
            );

            if (nextBtn) nextBtn.disabled = true;
            resetStepSetelah(2);

            if (!benarM1) {
                tampilkanPetunjukLatihan1(
                    "Petunjuk: gradien garis $y = mx + c$ adalah koefisien $x$.",
                );
                return;
            }

            if (!benarM2Atas || !benarM2Bawah) {
                tampilkanPetunjukLatihan1(
                    "Petunjuk: gradien garis yang tegak lurus adalah negatif kebalikan dari gradien semula.",
                );
                return;
            }

            if (!benarSubY1 || !benarSubMAtas || !benarSubMBawah || !benarSubX1) {
                tampilkanPetunjukLatihan1(
                    "Petunjuk: gunakan titik $D(4,2)$ dan gradien yang sudah diperoleh ke bentuk $y-y_1=m(x-x_1)$.",
                );
                return;
            }

            if (!benarUrai1 || !benarUrai2) {
                tampilkanPetunjukLatihan1(
                    "Petunjuk: uraikan $\\frac{1}{3}(x - 4)$ terlebih dahulu.",
                );
                return;
            }

            if (!benarAkhir) {
                tampilkanPetunjukLatihan1(
                    "Petunjuk: dari $y - 2 = \\frac{1}{3}x - \\frac{4}{3}$, pindahkan $-2$ ke ruas kanan.",
                );
            }
        }

        function resetLatihan1TegakLurus() {
            resetInput([
                "lat1_m1",
                "lat1_m2_atas",
                "lat1_m2_bawah",
                "lat1_sub_y1",
                "lat1_sub_m_atas",
                "lat1_sub_m_bawah",
                "lat1_sub_x1",
                "lat1_urai1",
                "lat1_urai2",
                "lat1_akhir",
            ]);

            kosongkan("feedbackLatihan1");
            kosongkan("petunjukLatihan1");

            const nextBtn = document.getElementById("nextBtnLatihan1");
            if (nextBtn) nextBtn.disabled = true;

            resetStepSetelah(2);
        }

        // =========================================================
        // LATIHAN 2
        // Data: titik E(7,-4), tegak lurus gradien -2/5
        // Hasil: y = 5/2x - 43/2
        // =========================================================
        function tampilkanPetunjukLatihan2(pesan) {
            isiPesan("petunjukLatihan2", pesan, "info");
        }

        async function cekLatihan2TegakLurus() {
            const benarMAtas = cekIsian("lat2_m_atas", ["5"]);
            const benarMBawah = cekIsian("lat2_m_bawah", ["2"]);

            const benarSubY1 = cekIsian("lat2_sub_y1", ["-4"]);
            const benarSubMAtas = cekIsian("lat2_sub_m_atas", ["5"]);
            const benarSubMBawah = cekIsian("lat2_sub_m_bawah", ["2"]);
            const benarSubX1 = cekIsian("lat2_sub_x1", ["7"]);

            const benarUrai1 = cekIsian("lat2_urai1", ["4"]);
            const benarUrai2 = cekIsian("lat2_urai2", [
                "5/2x-35/2",
                "5/2x - 35/2",
                "2.5x-17.5",
                "2.5x - 17.5",
            ]);

            const benarAkhir = cekIsian("lat2_akhir", [
                "5/2x-43/2",
                "5/2x - 43/2",
                "2.5x-21.5",
                "2.5x - 21.5",
            ]);

            const benarUmum = cekIsian("lat2_umum", [
                "5x-2y-43",
                "5x - 2y - 43",
                "-5x+2y+43",
                "-5x + 2y + 43",
            ]);

            const semuaBenar =
                benarMAtas &&
                benarMBawah &&
                benarSubY1 &&
                benarSubMAtas &&
                benarSubMBawah &&
                benarSubX1 &&
                benarUrai1 &&
                benarUrai2 &&
                benarAkhir &&
                benarUmum;

            const nextBtn = document.getElementById("nextBtnLatihan2");

            if (semuaBenar) {
                isiPesan(
                    "feedbackLatihan2",
                    "Bagus, jawabanmu sudah benar. Silakan lanjut ke latihan berikutnya.",
                    "success",
                );

                kosongkan("petunjukLatihan2");

                if (nextBtn) nextBtn.disabled = false;

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L2`,
                    "input",
                    ambilJawabanLatihan2DLast(),
                    true
                );
                return;
            }

            isiPesan(
                "feedbackLatihan2",
                "Masih ada jawaban yang belum tepat. Coba periksa kembali jawabanmu.",
                "warning",
            );

            if (nextBtn) nextBtn.disabled = true;
            resetStepSetelah(3);

            if (!benarMAtas || !benarMBawah) {
                tampilkanPetunjukLatihan2(
                    "Petunjuk: gradien garis yang tegak lurus adalah negatif kebalikan dari gradien semula.",
                );
                return;
            }

            if (!benarSubY1 || !benarSubMAtas || !benarSubMBawah || !benarSubX1) {
                tampilkanPetunjukLatihan2(
                    "Petunjuk: gunakan titik $E(7,-4)$ dan gradien yang sudah diperoleh ke bentuk $y-y_1=m(x-x_1)$.",
                );
                return;
            }

            if (!benarUrai1 || !benarUrai2) {
                tampilkanPetunjukLatihan2(
                    "Petunjuk: uraikan $\\frac{5}{2}(x - 7)$ terlebih dahulu.",
                );
                return;
            }

            if (!benarAkhir) {
                tampilkanPetunjukLatihan2(
                    "Petunjuk: dari $y + 4 = \\frac{5}{2}x - \\frac{35}{2}$, pindahkan $4$ ke ruas kanan.",
                );
                return;
            }

            if (!benarUmum) {
                tampilkanPetunjukLatihan2(
                    "Petunjuk: hilangkan pecahan pada $y = \\frac{5}{2}x - \\frac{43}{2}$, lalu susun ke bentuk $ax + by + c = 0$.",
                );
            }
        }

        function resetLatihan2TegakLurus() {
            resetInput([
                "lat2_m_atas",
                "lat2_m_bawah",
                "lat2_sub_y1",
                "lat2_sub_m_atas",
                "lat2_sub_m_bawah",
                "lat2_sub_x1",
                "lat2_urai1",
                "lat2_urai2",
                "lat2_akhir",
                "lat2_umum",
            ]);

            kosongkan("feedbackLatihan2");
            kosongkan("petunjukLatihan2");

            const nextBtn = document.getElementById("nextBtnLatihan2");
            if (nextBtn) nextBtn.disabled = true;

            resetStepSetelah(3);
        }

        // =========================================================
        // LATIHAN 3
        // Data: jalur utama melalui (1,14) dan (9,6), jalur baru melalui (12,-3)
        // Hasil: y = x - 15
        // Materi terakhir: buka Kuis
        // =========================================================
        function tampilkanPetunjukLatihan3(pesan) {
            isiPesan("petunjukLatihan3", pesan, "info");
        }

        async function cekLatihan3TegakLurus() {
            const benarM1Atas1 = cekIsian("lat3_m1_atas1", ["6"]);
            const benarM1Atas2 = cekIsian("lat3_m1_atas2", ["14"]);
            const benarM1Bawah1 = cekIsian("lat3_m1_bawah1", ["9"]);
            const benarM1Bawah2 = cekIsian("lat3_m1_bawah2", ["1"]);
            const benarM1Final = cekIsian("lat3_m1_final", ["-1"]);

            const benarM2Final = cekIsian("lat3_m2_final", ["1"]);

            const benarSubY1 = cekIsian("lat3_sub_y1", ["-3"]);
            const benarSubM = cekIsian("lat3_sub_m", ["1"]);
            const benarSubX1 = cekIsian("lat3_sub_x1", ["12"]);

            const benarUrai1 = cekIsian("lat3_urai1", ["3"]);
            const benarUrai2 = cekIsian("lat3_urai2", ["x-12", "x - 12"]);

            const benarAkhir = cekIsian("lat3_akhir", ["x-15", "x - 15"]);

            const semuaBenar =
                benarM1Atas1 &&
                benarM1Atas2 &&
                benarM1Bawah1 &&
                benarM1Bawah2 &&
                benarM1Final &&
                benarM2Final &&
                benarSubY1 &&
                benarSubM &&
                benarSubX1 &&
                benarUrai1 &&
                benarUrai2 &&
                benarAkhir;

            const feedback = document.getElementById("feedbackLatihan3");
            const akhir = document.getElementById("pesanAkhirLatihan");

            if (semuaBenar) {
                isiPesan(
                    "feedbackLatihan3",
                    "Bagus, jawabanmu sudah benar. Kamu sudah menyelesaikan semua latihan.",
                    "success",
                );

                kosongkan("petunjukLatihan3");

                if (akhir) {
                    akhir.innerHTML = `
                <div class="alert alert-success fw-semibold text-center mt-3">
                    Bagus, kamu sudah memahami persamaan garis yang tegak lurus dengan garis lain.
                    Silakan lanjut ke kuis.
                </div>
            `;
                    renderMathSafe(akhir);
                }

                const saved = await saveProgressMateri();

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L3`,
                    "input",
                    ambilJawabanLatihan3DLast(),
                    true
                );


                if (saved) {
                    bukaQuizButton();
                } else if (feedback) {
                    feedback.innerHTML += `
                <div class="alert alert-warning mt-2 mb-0">
                    Jawaban benar, tetapi progres belum tersimpan. Coba cek koneksi atau refresh halaman.
                </div>
            `;
                }

                return;
            }

            isiPesan(
                "feedbackLatihan3",
                "Masih ada jawaban yang belum tepat. Coba periksa kembali jawabanmu.",
                "warning",
            );

            if (akhir) akhir.innerHTML = "";

            if (
                !benarM1Atas1 ||
                !benarM1Atas2 ||
                !benarM1Bawah1 ||
                !benarM1Bawah2 ||
                !benarM1Final
            ) {
                tampilkanPetunjukLatihan3(
                    "Petunjuk: tentukan dulu gradien garis yang melalui titik $(1,14)$ dan $(9,6)$.",
                );
                return;
            }

            if (!benarM2Final) {
                tampilkanPetunjukLatihan3(
                    "Petunjuk: gradien garis yang tegak lurus dengan gradien $-1$ adalah $1$.",
                );
                return;
            }

            if (!benarSubY1 || !benarSubM || !benarSubX1) {
                tampilkanPetunjukLatihan3(
                    "Petunjuk: karena titiknya $(12,-3)$, maka bentuknya ditulis menjadi $y + 3 = 1(x - 12)$.",
                );
                return;
            }

            if (!benarUrai1 || !benarUrai2) {
                tampilkanPetunjukLatihan3(
                    "Petunjuk: uraikan $1(x - 12)$ terlebih dahulu.",
                );
                return;
            }

            if (!benarAkhir) {
                tampilkanPetunjukLatihan3(
                    "Petunjuk: dari $y + 3 = x - 12$, pindahkan $3$ ke ruas kanan.",
                );
            }
        }

        function resetLatihan3TegakLurus() {
            resetInput([
                "lat3_m1_atas1",
                "lat3_m1_atas2",
                "lat3_m1_bawah1",
                "lat3_m1_bawah2",
                "lat3_m1_final",
                "lat3_m2_final",
                "lat3_sub_y1",
                "lat3_sub_m",
                "lat3_sub_x1",
                "lat3_urai1",
                "lat3_urai2",
                "lat3_akhir",
            ]);

            kosongkan("feedbackLatihan3");
            kosongkan("petunjukLatihan3");
            kosongkan("pesanAkhirLatihan");
        }

        // =========================================================
        // RESTORE PROGRESS D LAST
        // =========================================================
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

        function restoreLatihan1DLast() {
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

        function restoreLatihan2DLast() {
            const saved = ambilSavedJawaban(`${MATERI_SLUG}_L2`);
            if (!saved) return;

            Object.entries(saved).forEach(([id, value]) => {
                setValueSafe(id, value);
            });

            beriValid(Object.keys(saved));

            const latihan2 = document.getElementById("latihanStep2");
            const latihan3 = document.getElementById("latihanStep3");
            const fb = document.getElementById("feedbackLatihan2");
            const nextBtn = document.getElementById("nextBtnLatihan2");

            if (latihan2) latihan2.style.display = "block";
            if (latihan3) latihan3.style.display = "block";

            if (fb) {
                fb.innerHTML = `
            <div class="alert alert-success py-2 mb-0">
                Jawaban Latihan 2 sudah tersimpan.
            </div>
        `;
                renderMathSafe(fb);
            }

            if (nextBtn) nextBtn.disabled = false;
        }

        function restoreLatihan3DLast() {
            const saved = ambilSavedJawaban(`${MATERI_SLUG}_L3`);
            if (!saved) return;

            Object.entries(saved).forEach(([id, value]) => {
                setValueSafe(id, value);
            });

            beriValid(Object.keys(saved));

            const latihan2 = document.getElementById("latihanStep2");
            const latihan3 = document.getElementById("latihanStep3");
            const fb = document.getElementById("feedbackLatihan3");
            const akhir = document.getElementById("pesanAkhirLatihan");

            if (latihan2) latihan2.style.display = "block";
            if (latihan3) latihan3.style.display = "block";

            if (fb) {
                fb.innerHTML = `
            <div class="alert alert-success py-2 mb-0">
                Jawaban Latihan 3 sudah tersimpan.
            </div>
        `;
                renderMathSafe(fb);
            }

            if (akhir) {
                akhir.innerHTML = `
            <div class="alert alert-success fw-semibold text-center mt-3">
                Bagus, kamu sudah memahami persamaan garis yang tegak lurus dengan garis lain.
                Silakan lanjut ke kuis.
            </div>
        `;
                renderMathSafe(akhir);
            }

            bukaQuizButton();
        }

        function restoreProgressDLast() {
            restoreLatihan1DLast();
            restoreLatihan2DLast();
            restoreLatihan3DLast();

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

            renderMathSafe(document.getElementById("latihanDLastBox") || document.body);
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
