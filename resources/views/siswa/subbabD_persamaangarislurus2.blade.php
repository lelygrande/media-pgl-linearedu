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
                <li>Menentukan persamaan garis lurus dari dua titik atau satu titik dan gradien.</li>
            </ol>
        </div>
    </div>

    {{-- Subjudul --}}
    <h2 class="mt-2 mb-3" style="font-weight: 600;">2. Persamaan Garis Lurus Melalui Dua Titik</h2>

    {{-- ========================================================= --}}
    {{-- EKSPLORASI --}}
    {{-- ========================================================= --}}
    <div class="position-relative p-4 mt-4 mb-4"
        style="border:2px solid #4a76b8; border-radius:12px; background-color:white;">

        <div class="position-absolute px-3 py-2 text-white fw-bold"
            style="top:-18px; left:20px; background-color:#4a76b8; border-radius:8px;">
            Eksplorasi
        </div>

        <div class="mt-3">
            <p>
                Misalkan suatu garis melalui dua titik <span>$(x_1, y_1)$</span> dan
                <span>$(x_2, y_2)$</span>. Untuk menemukan persamaan garis yang melalui dua titik tersebut,
                kita mulai dengan menentukan gradien garisnya terlebih dahulu.
            </p>

            <p>
                Gradien garis yang melalui dua titik itu adalah:
            </p>

            <div class="d-flex align-items-center flex-wrap gap-2 mb-3">
                <span>$m =$</span>
                <div class="frac-input">
                    <div class="top">
                        <input type="text" id="m_atas1"
                            class="form-control form-control-sm text-center jawaban-latihan">
                        <span>$-$</span>
                        <input type="text" id="m_atas2"
                            class="form-control form-control-sm text-center jawaban-latihan">
                    </div>
                    <div class="bottom">
                        <input type="text" id="m_bawah1"
                            class="form-control form-control-sm text-center jawaban-latihan">
                        <span>$-$</span>
                        <input type="text" id="m_bawah2"
                            class="form-control form-control-sm text-center jawaban-latihan">
                    </div>
                </div>
            </div>

            <p>
                Setelah gradien diperoleh, substitusikan bentuk gradien tersebut ke persamaan garis melalui titik
                <span>$(x_1, y_1)$</span>, yaitu <span>$y - y_1 = m(x - x_1)$</span>.
            </p>

            <div class="d-flex align-items-center flex-wrap gap-2 mb-3">
                <span>$y - y_1 =$</span>
                <div class="frac-input">
                    <div class="top">
                        <input type="text" id="sub_atas1"
                            class="form-control form-control-sm text-center jawaban-latihan">
                        <span>$-$</span>
                        <input type="text" id="sub_atas2"
                            class="form-control form-control-sm text-center jawaban-latihan">
                    </div>
                    <div class="bottom">
                        <input type="text" id="sub_bawah1"
                            class="form-control form-control-sm text-center jawaban-latihan">
                        <span>$-$</span>
                        <input type="text" id="sub_bawah2"
                            class="form-control form-control-sm text-center jawaban-latihan">
                    </div>
                </div>
                <span>$(x - x_1)$</span>
            </div>

            <p>
                Selanjutnya, susun persamaan tersebut menjadi bentuk perbandingan berikut.
            </p>

            <div class="d-flex align-items-center flex-wrap gap-4 mb-3">
                <div class="frac-static">
                    <div class="top">
                        <span>$y - y_1$</span>
                    </div>
                    <div class="bottom">
                        <input type="text" id="akhir1"
                            class="form-control form-control-sm text-center jawaban-latihan">
                        <span>$-$</span>
                        <input type="text" id="akhir2"
                            class="form-control form-control-sm text-center jawaban-latihan">
                    </div>
                </div>

                <span>$=$</span>

                <div class="frac-static">
                    <div class="top">
                        <span>$x - x_1$</span>
                    </div>
                    <div class="bottom">
                        <input type="text" id="akhir3"
                            class="form-control form-control-sm text-center jawaban-latihan">
                        <span>$-$</span>
                        <input type="text" id="akhir4"
                            class="form-control form-control-sm text-center jawaban-latihan">
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <button class="btn btn-palet btn-sm" onclick="cekEksplorasiDuaTitik()">Cek</button>
                <div id="feedbackEksplorasiDuaTitik" class="mt-2"></div>
            </div>

            <div id="kesimpulanEksplorasiDuaTitik" class="box-kesimpulan mt-3 d-none">
                <b>Kesimpulan:</b>
                <p class="mb-2">
                    Persamaan garis yang melalui titik <span>$(x_1, y_1)$</span> dan
                    <span>$(x_2, y_2)$</span> adalah:
                </p>
                <div class="rumus-box" style="width: fit-content;">
                    <span>$\dfrac{y-y_1}{y_2-y_1}=\dfrac{x-x_1}{x_2-x_1}$</span>
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
    <div class="card card-materi mb-4">
        <div class="card-body">
            <span class="badge-sub">Persamaan Garis Lurus Melalui Dua Titik</span>

            <p>
                Untuk menyusun persamaan garis yang melalui titik <span>$A(x_1, y_1)$</span> dan
                <span>$B(x_2, y_2)$</span>, langkah pertama yang dilakukan adalah menentukan gradien garis yang
                melalui kedua titik tersebut. Nilai gradien diperoleh dari perbandingan perubahan nilai koordinat
                <span>$y$</span> terhadap perubahan nilai koordinat <span>$x$</span>, yaitu:
            </p>

            <div class="rumus-box mb-3 text-center" style="width: fit-content">
                <span>$m = \dfrac{y_2 - y_1}{x_2 - x_1}$</span>
            </div>

            <p>
                Setelah nilai gradien diketahui, kita menggunakan persamaan dasar garis melalui titik
                <span>$(x_1, y_1)$</span> dengan gradien <span>$m$</span>, yaitu:
            </p>

            <div class="rumus-box mb-3 text-center" style="width: fit-content">
                <span>$y - y_1 = m(x - x_1)$</span>
            </div>

            <p>
                Jika nilai gradien tersebut disubstitusikan ke persamaan garis, maka diperoleh:
            </p>

            <div class="rumus-box mb-3 text-center" style="width: fit-content">
                <span>$y - y_1 = \dfrac{y_2 - y_1}{x_2 - x_1}(x - x_1)$</span>
            </div>

            <p>
                Bentuk ini menunjukkan bahwa setiap titik <span>$(x, y)$</span> yang terletak pada garis tersebut
                memenuhi hubungan perbandingan perubahan koordinat yang sama seperti dua titik yang dilaluinya.
                Oleh karena itu, persamaan garis yang melalui dua titik dapat dinyatakan dalam bentuk:
            </p>

            <div class="rumus-box mb-3 text-center" style="width: fit-content">
                <span>$\dfrac{y-y_1}{y_2-y_1}=\dfrac{x-x_1}{x_2-x_1}$</span>
            </div>

            <p class="mb-0">
                Jadi, jika diketahui dua titik pada suatu garis, kita dapat menentukan persamaan garisnya dengan
                terlebih dahulu mencari gradien, kemudian mensubstitusikannya ke persamaan garis melalui satu titik.
            </p>
        </div>
    </div>

    {{-- Contoh Soal --}}

    <div class="card card-materi mb-4">
        <div class="card-body">
            <span class="badge-contoh">Contoh Soal</span>

            <p>
                Tentukan persamaan garis yang melalui titik <span>$A(1,3)$</span> dan <span>$B(5,11)$</span>.
            </p>

            <p><b>Penyelesaian:</b></p>

            <p class="mb-1">
                Diketahui:
                <span>$A(1,3) \Leftrightarrow x_1 = 1$</span> dan <span>$y_1 = 3$</span>
            </p>
            <p>
                <span>$B(5,11) \Leftrightarrow x_2 = 5$</span> dan <span>$y_2 = 11$</span>
            </p>

            <p>
                Persamaan garis yang melalui dua titik dapat ditentukan dengan rumus:
            </p>

            <div class="rumus-box mb-3 text-center" style="width: fit-content">
                <span>$\dfrac{y-y_1}{y_2-y_1}=\dfrac{x-x_1}{x_2-x_1}$</span>
            </div>

            <p>
                Substitusikan nilai <span>$x_1, y_1, x_2,$</span> dan <span>$y_2$</span> ke rumus tersebut.
            </p>

            <div class="rumus-box mb-3 text-center" style="width: fit-content">
                <span>$\dfrac{y-3}{11-3}=\dfrac{x-1}{5-1}$</span>
            </div>

            <p>
                Sekarang, sederhanakan penyebut pada kedua ruas.
            </p>

            <div class="d-flex align-items-center flex-wrap gap-4 mb-3">
                <div class="frac-static">
                    <div class="top">
                        <span>$y-3$</span>
                    </div>
                    <div class="bottom">
                        <input type="text" id="cs_sd_1"
                            class="form-control form-control-sm text-center jawaban-contoh">
                    </div>
                </div>

                <span>$=$</span>

                <div class="frac-static">
                    <div class="top">
                        <span>$x-1$</span>
                    </div>
                    <div class="bottom">
                        <input type="text" id="cs_sd_2"
                            class="form-control form-control-sm text-center jawaban-contoh">
                    </div>
                </div>
            </div>

            <p>
                Setelah penyebut disederhanakan, lakukan kali silang.
            </p>

            <div class="rumus-box mb-3" style="width: fit-content;">
                <input type="text" id="cs_ks_1"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:80px;">
                <span>$(y-3) =$</span>
                <input type="text" id="cs_ks_2"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:80px;">
                <span>$(x-1)$</span>
            </div>

            <p>
                Uraikan bentuk tersebut. Lengkapilah langkah-langkah berikut.
            </p>

            <div class="rumus-box mb-3" style="width: fit-content;">
                <input type="text" id="cs_urai_1"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:80px;">
                <span>$y $</span>
                <input type="text" id="cs_urai_2"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:80px;">
                <span>$= $</span>
                <input type="text" id="cs_urai_3"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:80px;">
                <span>$x $</span>
                <input type="text" id="cs_urai_4"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:80px;">
            </div>

            <p>
                Selanjutnya, pindahkan suku konstanta pada ruas kanan ke ruas kiri.
            </p>

            <div class="rumus-box mb-3" style="width: fit-content;">
                <input type="text" id="cs_pindah_1"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:80px;">
                <span>$y = $</span>
                <input type="text" id="cs_pindah_2"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:80px;">
                <span>$x $</span>
                <input type="text" id="cs_pindah_3"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:80px;">
            </div>

            <p>
                Bagi kedua ruas dengan koefisien <span>$y$</span> sehingga diperoleh bentuk akhir persamaan garis.
            </p>

            <div class="rumus-box mb-3" style="width: fit-content;">
                <span>$y =$</span>
                <input type="text" id="cs_akhir_1"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:80px;">
                <span>$x +$</span>
                <input type="text" id="cs_akhir_2"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:80px;">
            </div>

            <div class="mt-3">
                <button class="btn btn-palet btn-sm" onclick="cekContohSoal1()">Cek</button>
                <div id="feedbackContohSoal1" class="mt-2"></div>
                <div id="petunjukContohSoal1" class="mt-2"></div>
            </div>

            <div id="pembahasanContohSoal1" class="box-kesimpulan mt-3 d-none">
                <b>Pembahasan:</b>
                <ol class="mb-0 mt-2">
                    <li>
                        Dari bentuk <span>$\dfrac{y-3}{11-3}=\dfrac{x-1}{5-1}$</span>, diperoleh
                        <span>$\dfrac{y-3}{8}=\dfrac{x-1}{4}$</span>.
                    </li>
                    <li>
                        Dengan kali silang:
                        <span>$4(y-3)=8(x-1)$</span>.
                    </li>
                    <li>
                        Uraikan kedua ruas:
                        <span>$4y-12=8x-8$</span>.
                    </li>
                    <li>
                        Tambahkan <span>$12$</span> ke kedua ruas:
                        <span>$4y=8x+4$</span>.
                    </li>
                    <li>
                        Bagi kedua ruas dengan <span>$4$</span>:
                        <span>$y=2x+1$</span>.
                    </li>
                </ol>
            </div>
        </div>
    </div>

    {{-- Latihan --}}

    <div class="latihan-slider">
        <div class="latihan-track" id="latihanTrack">

            {{-- ===================== --}}
            {{-- LATIHAN 1 --}}
            {{-- ===================== --}}
            <section class="latihan-slide">
                <div class="card card-materi mb-4">
                    <div class="card-body">
                        <span class="badge-latihan">Latihan</span>

                        <p>
                            1. Pada hari pertama, tinggi sebuah tanaman adalah <span>$4$</span> cm. Setelah <span>$3$</span>
                            hari,
                            tinggi tanaman itu menjadi <span>$10$</span> cm. Jika pertumbuhan tinggi tanaman dianggap
                            membentuk garis
                            lurus,
                            tentukan persamaan garis yang menyatakan hubungan antara banyak hari <span>$x$</span> dan tinggi
                            tanaman
                            <span>$y$</span>.
                        </p>

                        <p>Dari cerita di atas, tuliskan dua titik yang diketahui.</p>

                        <p>
                            Titik 1 = (
                            <input type="text" id="lat_x1"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:70px;">
                            ,
                            <input type="text" id="lat_y1"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:70px;">
                            )
                        </p>

                        <p>
                            Titik 2 = (
                            <input type="text" id="lat_x2"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:70px;">
                            ,
                            <input type="text" id="lat_y2"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:70px;">
                            )
                        </p>

                        <p>Tuliskan langsung rumus persamaan garis lurus melalui dua titik.</p>

                        <div class="d-flex align-items-center flex-wrap gap-4 mb-3">
                            <div class="frac-static">
                                <div class="top">
                                    <span>$y-$</span>
                                    <input type="text" id="lat_rumus1"
                                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                        style="width:70px;">
                                </div>
                                <div class="bottom">
                                    <input type="text" id="lat_rumus2"
                                        class="form-control form-control-sm text-center jawaban-latihan">
                                    <span>$-$</span>
                                    <input type="text" id="lat_rumus3"
                                        class="form-control form-control-sm text-center jawaban-latihan">
                                </div>
                            </div>

                            <span>$=$</span>

                            <div class="frac-static">
                                <div class="top">
                                    <span>$x-$</span>
                                    <input type="text" id="lat_rumus4"
                                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                        style="width:70px;">
                                </div>
                                <div class="bottom">
                                    <input type="text" id="lat_rumus5"
                                        class="form-control form-control-sm text-center jawaban-latihan">
                                    <span>$-$</span>
                                    <input type="text" id="lat_rumus6"
                                        class="form-control form-control-sm text-center jawaban-latihan">
                                </div>
                            </div>
                        </div>

                        <p>Substitusikan titik-titik yang sudah kamu tentukan ke rumus tersebut.</p>

                        <div class="d-flex align-items-center flex-wrap gap-4 mb-3">
                            <div class="frac-static">
                                <div class="top">
                                    <span>$y-$</span>
                                    <input type="text" id="lat_sub1"
                                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                        style="width:70px;">
                                </div>
                                <div class="bottom">
                                    <input type="text" id="lat_sub2"
                                        class="form-control form-control-sm text-center jawaban-latihan">
                                    <span>$-$</span>
                                    <input type="text" id="lat_sub3"
                                        class="form-control form-control-sm text-center jawaban-latihan">
                                </div>
                            </div>

                            <span>$=$</span>

                            <div class="frac-static">
                                <div class="top">
                                    <span>$x-$</span>
                                    <input type="text" id="lat_sub4"
                                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                        style="width:70px;">
                                </div>
                                <div class="bottom">
                                    <input type="text" id="lat_sub5"
                                        class="form-control form-control-sm text-center jawaban-latihan">
                                    <span>$-$</span>
                                    <input type="text" id="lat_sub6"
                                        class="form-control form-control-sm text-center jawaban-latihan">
                                </div>
                            </div>
                        </div>

                        <p>Sederhanakan penyebutnya, lalu lakukan kali silang.</p>

                        <div class="rumus-box mb-3" style="width: fit-content;">
                            <input type="text" id="lat_kali1"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:80px;">
                            <span>$(y-$</span>
                            <input type="text" id="lat_kali2"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:80px;">
                            <span>$) =$</span>
                            <input type="text" id="lat_kali3"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:80px;">
                            <span>$(x-$</span>
                            <input type="text" id="lat_kali4"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:80px;">
                            <span>$)$</span>
                        </div>

                        <p>Tuliskan persamaan garis akhirnya.</p>

                        <p>
                            <span>$y =$</span>
                            <input type="text" id="lat_akhir"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:180px;">
                        </p>

                        <div class="mt-3">
                            <button class="btn btn-palet btn-sm" onclick="cekLatihan1()">Cek</button>
                            <div id="feedbackLatihan1" class="mt-2"></div>
                            <div id="petunjukLatihan1" class="mt-2"></div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- ===================== --}}
            {{-- LATIHAN 2 --}}
            {{-- ===================== --}}
            <section class="latihan-slide">
                <div class="card card-materi mb-4">
                    <div class="card-body">
                        <span class="badge-latihan">Latihan 2</span>

                        <p>
                            2. Perhatikan gambar persegi panjang berikut. Tentukan persamaan garis yang melalui titik
                            <span>$A$</span> dan <span>$C$</span>.
                        </p>

                        <div class="text-center mb-3">
                            <img src="{{ asset('img/pgl/pgl2latsol2.png') }}" alt="Gambar titik A dan C"
                                class="img-fluid rounded" style="max-width: 300px;">
                        </div>

                        <p>
                            Substitusikan koordinat titik <span>$A$</span> dan <span>$C$</span> dari gambar ke rumus
                            persamaan garis
                            melalui dua titik.
                        </p>

                        <div class="d-flex align-items-center flex-wrap gap-4 mb-3">
                            <div class="frac-static">
                                <div class="top">
                                    <span>$y-$</span>
                                    <input type="text" id="lat2_sub1"
                                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                        style="width:70px;">
                                </div>
                                <div class="bottom">
                                    <input type="text" id="lat2_sub2"
                                        class="form-control form-control-sm text-center jawaban-latihan">
                                    <span>$-$</span>
                                    <input type="text" id="lat2_sub3"
                                        class="form-control form-control-sm text-center jawaban-latihan">
                                </div>
                            </div>

                            <span>$=$</span>

                            <div class="frac-static">
                                <div class="top">
                                    <span>$x-$</span>
                                    <input type="text" id="lat2_sub4"
                                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                        style="width:70px;">
                                </div>
                                <div class="bottom">
                                    <input type="text" id="lat2_sub5"
                                        class="form-control form-control-sm text-center jawaban-latihan">
                                    <span>$-$</span>
                                    <input type="text" id="lat2_sub6"
                                        class="form-control form-control-sm text-center jawaban-latihan">
                                </div>
                            </div>
                        </div>

                        <p>Sederhanakan penyebutnya, lalu lakukan kali silang.</p>

                        <div class="rumus-box mb-3" style="width: fit-content;">
                            <input type="text" id="lat2_kali1"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:80px;">
                            <span>$(y-$</span>
                            <input type="text" id="lat2_kali2"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:80px;">
                            <span>$) =$</span>
                            <input type="text" id="lat2_kali3"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:80px;">
                            <span>$(x-$</span>
                            <input type="text" id="lat2_kali4"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:80px;">
                            <span>$)$</span>
                        </div>

                        <p>Tuliskan persamaan garis akhirnya.</p>

                        <p>
                            <span>$y =$</span>
                            <input type="text" id="lat2_akhir"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:180px;">
                        </p>

                        <div class="mt-3">
                            <button class="btn btn-palet btn-sm" onclick="cekLatihan2()">Cek</button>
                            <div id="feedbackLatihan2" class="mt-2"></div>
                            <div id="petunjukLatihan2" class="mt-2"></div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- ===================== --}}
            {{-- LATIHAN 3 --}}
            {{-- ===================== --}}
            <section class="latihan-slide">
                <div class="card card-materi mb-4">
                    <div class="card-body">
                        <span class="badge-latihan">Latihan 3</span>

                        <p>
                            3. Seorang siswa mengamati hubungan antara banyak buku tulis yang dibeli dan jumlah uang yang
                            harus dibayar.
                            Data tersebut dinyatakan pada dua titik, yaitu <span>$A(1,5)$</span> dan <span>$B(5,13)$</span>.
                            Jika hubungan itu membentuk garis lurus dan terdapat titik <span>$(3,a)$</span> pada garis yang
                            sama,
                            tentukan nilai <span>$a$</span>.
                        </p>

                        <p>
                            Substitusikan titik <span>$A(1,5)$</span> dan <span>$B(5,13)$</span> ke rumus persamaan garis
                            lurus melalui
                            dua titik.
                        </p>

                        <div class="d-flex align-items-center flex-wrap gap-4 mb-3">
                            <div class="frac-static">
                                <div class="top">
                                    <span>$y-$</span>
                                    <input type="text" id="lat3_sub1"
                                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                        style="width:70px;">
                                </div>
                                <div class="bottom">
                                    <input type="text" id="lat3_sub2"
                                        class="form-control form-control-sm text-center jawaban-latihan">
                                    <span>$-$</span>
                                    <input type="text" id="lat3_sub3"
                                        class="form-control form-control-sm text-center jawaban-latihan">
                                </div>
                            </div>

                            <span>$=$</span>

                            <div class="frac-static">
                                <div class="top">
                                    <span>$x-$</span>
                                    <input type="text" id="lat3_sub4"
                                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                        style="width:70px;">
                                </div>
                                <div class="bottom">
                                    <input type="text" id="lat3_sub5"
                                        class="form-control form-control-sm text-center jawaban-latihan">
                                    <span>$-$</span>
                                    <input type="text" id="lat3_sub6"
                                        class="form-control form-control-sm text-center jawaban-latihan">
                                </div>
                            </div>
                        </div>

                        <p>Sederhanakan penyebutnya, lalu lakukan kali silang.</p>

                        <div class="rumus-box mb-3" style="width: fit-content;">
                            <input type="text" id="lat3_kali1"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:80px;">
                            <span>$(y-$</span>
                            <input type="text" id="lat3_kali2"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:80px;">
                            <span>$) =$</span>
                            <input type="text" id="lat3_kali3"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:80px;">
                            <span>$(x-$</span>
                            <input type="text" id="lat3_kali4"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:80px;">
                            <span>$)$</span>
                        </div>

                        <p>Tuliskan persamaan garis yang diperoleh.</p>

                        <p>
                            <span>$y =$</span>
                            <input type="text" id="lat3_persamaan"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:180px;">
                        </p>

                        <p>
                            Karena titik <span>$(3,a)$</span> terletak pada garis tersebut, maka nilai <span>$a$</span>
                            adalah:
                        </p>

                        <p>
                            <span>$a =$</span>
                            <input type="text" id="lat3_a"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:100px;">
                        </p>

                        <div class="mt-3">
                            <button class="btn btn-palet btn-sm" onclick="cekLatihan3()">Cek</button>
                            <div id="feedbackLatihan3" class="mt-2"></div>
                            <div id="petunjukLatihan3" class="mt-2"></div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>

    <script src="https://www.geogebra.org/apps/deployggb.js"></script>
    <script src="{{ asset('js/subbabD/subbabD_persamaan2.js') }}"></script>
@endsection

@section('nav')
    <a href="{{ route('subbabD_persamaangarislurus1') }}" class="btn btn-prev px-4 rounded-pill">
        ← Prev
    </a>
    <a href="{{ route('quiz.show', 5) }}" class="btn btn-next px-4 rounded-pill fw-semibold">
        Next →
    </a>
@endsection
