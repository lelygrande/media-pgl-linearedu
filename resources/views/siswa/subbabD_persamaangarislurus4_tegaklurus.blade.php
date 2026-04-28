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
    </style>

    {{-- Judul --}}
    <h1 class="mb-3" style="font-weight: 600;">D. Persamaan Garis Lurus</h1>

    {{-- Tujuan Pembelajaran --}}
    <div class="card card-tujuan mb-4">
        <div class="card-body">
            <h5>Tujuan Pembelajaran:</h5>
            <ol>
                <li>Siswa dapat menentukan persamaan garis lurus dari satu titik dan gradien.</li>
                <li>Siswa dapat menentukan persamaan garis lurus dari dua titik.</li>
                <li>Siswa dapat menentukan persamaan garis lurus yang melalui satu titik dan sejajar dengan garis lain.</li>
                <li>Siswa dapat menentukan persamaan garis lurus yang melalui satu titik dan tegak lurus dengan garis lain.
                </li>
            </ol>
        </div>
    </div>

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

            <div class="rumus-box mb-3" style="width: fit-content;">
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

            <p>
                Jadi, untuk menentukan persamaan garis yang melalui satu titik dan tegak lurus dengan garis lain, kita
                perlu:
            </p>

            <ol>
                <li>menentukan hubungan gradien garis yang saling tegak lurus,</li>
                <li>mencari gradien garis baru,</li>
                <li>mensubstitusikan gradien dan titik ke bentuk persamaan garis.</li>
            </ol>

            <div class="mt-3">
                <button class="btn btn-palet btn-sm" onclick="cekEksplorasiTegakLurus()">Cek Jawaban</button>
                <div id="feedbackEksplorasiTegakLurus" class="mt-2"></div>
            </div>

            <div id="kesimpulanEksplorasiTegakLurus" class="box-kesimpulan mt-3 d-none">
                <b>Kesimpulan:</b>
                <p class="mb-2">
                    Jika dua garis saling tegak lurus, maka hasil kali gradiennya adalah:
                </p>
                <div class="rumus-box mb-2" style="width: fit-content;">
                    <span>$m_g \times m_h = -1$</span>
                </div>
                <p class="mb-2">
                    Jika gradien garis pertama adalah <span>$m_g$</span>, maka gradien garis yang tegak lurus dengannya
                    adalah:
                </p>
                <div class="rumus-box mb-2" style="width: fit-content;">
                    <span>$m_h = -\dfrac{1}{m_g}$</span>
                </div>
                <p class="mb-2">
                    Jika garis itu melalui titik <span>$(x_1, y_1)$</span>, maka persamaan garisnya adalah:
                </p>
                <div class="rumus-box" style="width: fit-content;">
                    <span>$y-y_1 = m_h(x-x_1)$</span>
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
                hal pertama yang perlu diperhatikan adalah <b>gradien</b> kedua garis tersebut.
            </p>

            <p>
                Dua garis yang saling tegak lurus mempunyai hubungan:
            </p>

            <div class="rumus-box mb-3 text-center">
                <span>$m_1 \times m_2 = -1$</span>
            </div>

            <p>
                Jika suatu garis memiliki gradien <span>$m$</span>, maka gradien garis yang tegak lurus
                dengannya adalah:
            </p>

            <div class="rumus-box mb-3 text-center">
                <span>$m_{\perp} = -\dfrac{1}{m}$</span>
            </div>

            <p>
                Setelah gradien garis baru diketahui, persamaan garis yang melalui titik
                <span>$(x_1, y_1)$</span> dapat ditentukan dengan menggunakan bentuk persamaan garis
                melalui satu titik dan gradien, yaitu:
            </p>

            <div class="rumus-box mb-3 text-center">
                <span>$y - y_1 = m(x - x_1)$</span>
            </div>

            <p>
                Dengan demikian, langkah menentukan persamaan garis yang melalui satu titik dan tegak lurus
                dengan garis lain adalah sebagai berikut:
            </p>

            <ol class="mb-3">
                <li>Menentukan gradien garis yang diketahui.</li>
                <li>Mencari gradien garis yang tegak lurus dengan menggunakan hubungan <span>$m_1 \times m_2 = -1$</span>.
                </li>
                <li>Mensubstitusikan gradien baru dan titik yang dilalui ke persamaan <span>$y - y_1 = m(x - x_1)$</span>.
                </li>
            </ol>

            <p class="mb-0">
                Jadi, jika sebuah garis melalui titik <span>$(x_1, y_1)$</span> dan tegak lurus dengan garis
                yang bergradien <span>$m$</span>, maka gradien garis barunya adalah
                <span>$-\dfrac{1}{m}$</span>, lalu persamaan garisnya dapat disusun dengan bentuk
                <span>$y - y_1 = m_{\perp}(x - x_1)$</span>.
            </p>
        </div>
    </div>

    {{-- Contoh --}}

    <div class="box-contoh mt-5 mb-4">
        <div class="card-body">
            <span class="title-box">Contoh</span>

            <p>
                Tentukan persamaan garis yang melalui titik <span>$A(8,6)$</span> dan tegak lurus dengan garis
                <span>$y = -4x + 9$</span>.
            </p>

            <p><b>Penyelesaian:</b></p>

            <p>
                Gradien garis <span>$y = -4x + 9$</span> adalah:
                <input type="text" id="cs_tl_m1"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:80px;">.
            </p>

            <p>
                Karena garis yang dicari tegak lurus dengan garis tersebut, maka gradien garis yang dicari adalah:
            </p>

            <div class="d-flex align-items-center flex-wrap gap-2 mb-3">
                <span>$m =$</span>
                <div class="frac-input">
                    <div class="top">
                        <input type="text" id="cs_tl_m2_atas"
                            class="form-control form-control-sm text-center jawaban-contoh">
                    </div>
                    <div class="bottom">
                        <input type="text" id="cs_tl_m2_bawah"
                            class="form-control form-control-sm text-center jawaban-contoh">
                    </div>
                </div>
            </div>

            <p>
                Titik yang dilalui adalah <span>$A(8,6)$</span>, sehingga:
            </p>

            <p>
                <span>$x_1 =$</span>
                <input type="text" id="cs_tl_x1"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:80px;">
                <span>dan</span>
                <span>$y_1 =$</span>
                <input type="text" id="cs_tl_y1"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:80px;">
            </p>

            <p>
                Substitusikan ke bentuk persamaan garis melalui satu titik dan gradien:
            </p>

            <div class="rumus-box mb-3" style="width: fit-content;">
                <span>$y-$</span>
                <input type="text" id="cs_tl_sub_y1"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:80px;">
                <span>$= $</span>

                <div class="frac-input d-inline-flex align-middle mx-1">
                    <div class="top">
                        <input type="text" id="cs_tl_sub_m_atas"
                            class="form-control form-control-sm text-center jawaban-contoh">
                    </div>
                    <div class="bottom">
                        <input type="text" id="cs_tl_sub_m_bawah"
                            class="form-control form-control-sm text-center jawaban-contoh">
                    </div>
                </div>

                <span>$(x-$</span>
                <input type="text" id="cs_tl_sub_x1"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:80px;">
                <span>$)$</span>
            </div>

            <p>
                Uraikan bentuk tersebut sehingga diperoleh:
            </p>

            <p>
                <span>$y-$</span>
                <input type="text" id="cs_tl_urai1"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:80px;">
                <span>$=$</span>
                <input type="text" id="cs_tl_urai2"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:180px;">
            </p>

            <p>
                Kemudian pindahkan ruas sehingga diperoleh bentuk eksplisit:
            </p>

            <p>
                <span>$y =$</span>
                <input type="text" id="cs_tl_akhir"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:200px;">
            </p>

            <p>
                Tuliskan juga dalam bentuk umum.
            </p>

            <p>
                <input type="text" id="cs_tl_umum"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:220px;">
                <span>$= 0$</span>
            </p>

            <div class="mt-3">
                <button class="btn btn-palet btn-sm" onclick="cekContohSoalTegakLurus()">Cek</button>
                <div id="feedbackContohSoalTegakLurus" class="mt-2"></div>
                <div id="petunjukContohSoalTegakLurus" class="mt-2"></div>
            </div>

            <div id="pembahasanContohSoalTegakLurus" class="box-kesimpulan mt-3 d-none">
                <b>Pembahasan:</b>
                <ol class="mb-0 mt-2">
                    <li>Gradien garis <span>$y = -4x + 9$</span> adalah <span>$-4$</span>.</li>
                    <li>Karena garis yang dicari tegak lurus, maka gradiennya adalah <span>$\dfrac{1}{4}$</span>.</li>
                    <li>Titik yang dilalui adalah <span>$(8,6)$</span>.</li>
                    <li>Substitusi ke rumus <span>$y-y_1=m(x-x_1)$</span> menghasilkan
                        <span>$y-6=\dfrac{1}{4}(x-8)$</span>.
                    </li>
                    <li>Uraikan:
                        <span>$y-6=\dfrac{1}{4}x-2$</span>.
                    </li>
                    <li>Pindahkan ruas:
                        <span>$y=\dfrac{1}{4}x+4$</span>.
                    </li>
                    <li>Bentuk umum:
                        <span>$x-4y+16=0$</span>.
                    </li>
                </ol>
            </div>
        </div>
    </div>

    {{-- Latihan --}}

    {{-- Latihan --}}
    <div class="box-latihan mt-5 mb-4" id="latihanDLastBox">
        <div class="card-body">
            <span class="title-box">Latihan</span>

            {{-- ===================== --}}
            {{-- LATIHAN 1 --}}
            {{-- ===================== --}}
            <div class="latihan-step" id="latihanStep1">
                <p class="mt-3">
                    <b>1.</b> Pada sebuah peta koordinat, seorang siswa ingin menggambar jalan kecil yang melalui titik
                    <span>$D(4,2)$</span>. Jalan kecil itu harus tegak lurus terhadap jalan utama yang dinyatakan oleh
                    persamaan <span>$y = -3x + 7$</span>. Tentukan persamaan jalan kecil tersebut.
                </p>

                <p>
                    Tentukan gradien garis <span>$y = -3x + 7$</span>.
                </p>

                <p>
                    <span>$m_1 =$</span>
                    <input type="text" id="lat1_m1"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                </p>

                <p>
                    Tentukan gradien garis yang tegak lurus dengan garis tersebut.
                </p>

                <div class="d-flex align-items-center flex-wrap gap-2 mb-3">
                    <span>$m_2 =$</span>

                    <div class="frac-input">
                        <div class="top">
                            <input type="text" id="lat1_m2_atas"
                                class="form-control form-control-sm text-center jawaban-latihan">
                        </div>

                        <div class="bottom">
                            <input type="text" id="lat1_m2_bawah"
                                class="form-control form-control-sm text-center jawaban-latihan">
                        </div>
                    </div>
                </div>

                <p>
                    Gunakan titik <span>$D(4,2)$</span> dan gradien yang diperoleh untuk membentuk persamaan garis.
                </p>

                <div class="rumus-box mb-3" style="width: fit-content;">
                    <span>$y-$</span>
                    <input type="text" id="lat1_sub_y1"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                    <span>$= $</span>

                    <div class="frac-input d-inline-flex align-middle mx-1">
                        <div class="top">
                            <input type="text" id="lat1_sub_m_atas"
                                class="form-control form-control-sm text-center jawaban-latihan">
                        </div>

                        <div class="bottom">
                            <input type="text" id="lat1_sub_m_bawah"
                                class="form-control form-control-sm text-center jawaban-latihan">
                        </div>
                    </div>

                    <span>$(x-$</span>
                    <input type="text" id="lat1_sub_x1"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                    <span>$)$</span>
                </div>

                <p>
                    Uraikan bentuk tersebut.
                </p>

                <p>
                    <span>$y-$</span>
                    <input type="text" id="lat1_urai1"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                    <span>$=$</span>
                    <input type="text" id="lat1_urai2"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:180px;">
                </p>

                <p>
                    Tuliskan persamaan garis dalam bentuk <span>$y = mx + c$</span>.
                </p>

                <p>
                    <span>$y =$</span>
                    <input type="text" id="lat1_akhir"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:200px;">
                </p>

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

                <p>
                    <b>2.</b> Seorang siswa menggambar garis bantu pada bidang koordinat. Garis itu harus melalui titik
                    <span>$E(7,-4)$</span> dan tegak lurus terhadap garis lain yang mempunyai gradien
                    <span>$-\dfrac{2}{5}$</span>. Tentukan persamaan garis tersebut.
                </p>

                <p><b>Penyelesaian:</b></p>

                <p>
                    Tentukan gradien garis yang dicari.
                </p>

                <div class="d-flex align-items-center flex-wrap gap-2 mb-3">
                    <span>$m =$</span>

                    <div class="frac-input">
                        <div class="top">
                            <input type="text" id="lat2_m_atas"
                                class="form-control form-control-sm text-center jawaban-latihan">
                        </div>

                        <div class="bottom">
                            <input type="text" id="lat2_m_bawah"
                                class="form-control form-control-sm text-center jawaban-latihan">
                        </div>
                    </div>
                </div>

                <p>
                    Gunakan titik <span>$E(7,-4)$</span> dan gradien tersebut ke bentuk persamaan garis melalui satu titik
                    dan gradien.
                </p>

                <div class="rumus-box mb-3" style="width: fit-content;">
                    <span>$y-$</span>
                    <input type="text" id="lat2_sub_y1"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                    <span>$= $</span>

                    <div class="frac-input d-inline-flex align-middle mx-1">
                        <div class="top">
                            <input type="text" id="lat2_sub_m_atas"
                                class="form-control form-control-sm text-center jawaban-latihan">
                        </div>

                        <div class="bottom">
                            <input type="text" id="lat2_sub_m_bawah"
                                class="form-control form-control-sm text-center jawaban-latihan">
                        </div>
                    </div>

                    <span>$(x-$</span>
                    <input type="text" id="lat2_sub_x1"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                    <span>$)$</span>
                </div>

                <p>
                    Uraikan bentuk tersebut.
                </p>

                <p>
                    <span>$y+$</span>
                    <input type="text" id="lat2_urai1"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                    <span>$=$</span>
                    <input type="text" id="lat2_urai2"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:200px;">
                </p>

                <p>
                    Tuliskan persamaan garis dalam bentuk <span>$y = mx + c$</span>.
                </p>

                <p>
                    <span>$y =$</span>
                    <input type="text" id="lat2_akhir"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:220px;">
                </p>

                <p>
                    Tuliskan juga persamaan garis dalam bentuk umum.
                </p>

                <p>
                    <input type="text" id="lat2_umum"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:240px;">
                    <span>$= 0$</span>
                </p>

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

                <p>
                    <b>3.</b> Pada denah sekolah, terdapat sebuah jalur utama yang melalui titik <span>$(1,14)$</span> dan
                    <span>$(9,6)$</span>. Pihak sekolah akan membuat jalur baru menuju kantin yang melalui titik
                    <span>$(12,-3)$</span> dan tegak lurus terhadap jalur utama tersebut. Tentukan persamaan jalur baru itu.
                </p>

                <p>
                    Tentukan gradien jalur utama.
                </p>

                <div class="d-flex align-items-center flex-wrap gap-2 mb-3">
                    <span>$m_1 =$</span>

                    <div class="frac-input">
                        <div class="top">
                            <input type="text" id="lat3_m1_atas1"
                                class="form-control form-control-sm text-center jawaban-latihan">
                            <span>$-$</span>
                            <input type="text" id="lat3_m1_atas2"
                                class="form-control form-control-sm text-center jawaban-latihan">
                        </div>

                        <div class="bottom">
                            <input type="text" id="lat3_m1_bawah1"
                                class="form-control form-control-sm text-center jawaban-latihan">
                            <span>$-$</span>
                            <input type="text" id="lat3_m1_bawah2"
                                class="form-control form-control-sm text-center jawaban-latihan">
                        </div>
                    </div>

                    <span>$=$</span>
                    <input type="text" id="lat3_m1_final"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                </div>

                <p>
                    Karena jalur baru tegak lurus terhadap jalur utama, maka gradien jalur baru adalah:
                </p>

                <p>
                    <span>$m_2 =$</span>
                    <input type="text" id="lat3_m2_final"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                </p>

                <p>
                    Gunakan titik <span>$(12,-3)$</span> dan gradien yang diperoleh untuk membentuk persamaan garis.
                </p>

                <div class="rumus-box mb-3" style="width: fit-content;">
                    <span>$y-$</span>
                    <input type="text" id="lat3_sub_y1"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                    <span>$= $</span>
                    <input type="text" id="lat3_sub_m"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                    <span>$(x-$</span>
                    <input type="text" id="lat3_sub_x1"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                    <span>$)$</span>
                </div>

                <p>
                    Uraikan bentuk tersebut.
                </p>

                <p>
                    <span>$y+$</span>
                    <input type="text" id="lat3_urai1"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                    <span>$=$</span>
                    <input type="text" id="lat3_urai2"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:180px;">
                </p>

                <p>
                    Tuliskan persamaan garis dalam bentuk <span>$y = mx + c$</span>.
                </p>

                <p>
                    <span>$y =$</span>
                    <input type="text" id="lat3_akhir"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:180px;">
                </p>

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
    <script src="{{ asset('js/subbabD/subbabD_persamaan4.js') }}"></script>

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
