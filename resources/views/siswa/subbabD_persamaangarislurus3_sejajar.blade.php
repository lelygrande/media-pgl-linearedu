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

            <div class="rumus-box mb-3" style="width: fit-content;">
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
            </div>

            <div id="kesimpulanEksplorasiSejajar" class="box-kesimpulan mt-3 d-none">
                <b>Kesimpulan:</b>
                <p class="mb-2">
                    Persamaan garis yang melalui titik <span>$(x_1, y_1)$</span> dan sejajar dengan garis lain yang
                    bergradien
                    <span>$m$</span> adalah:
                </p>
                <div class="rumus-box" style="width: fit-content;">
                    <span>$y-y_1 = m(x-x_1)$</span>
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
    <div class="card card-materi mt-4 mb-4">
        <div class="card-body">
            <span class="badge-sub">Persamaan Garis yang Melalui Satu Titik dan Sejajar dengan Garis Lain</span>

            <p class="mt-3">
                Untuk menentukan persamaan garis yang melalui satu titik dan sejajar dengan garis lain, hal pertama yang
                harus diperhatikan adalah <b>gradien</b> kedua garis tersebut.
            </p>

            <p>
                Dua garis yang saling sejajar mempunyai gradien yang sama. Jadi, jika suatu garis diketahui memiliki gradien
                <span>$m$</span>, maka garis lain yang sejajar dengannya juga memiliki gradien <span>$m$</span>.
            </p>

            <p>Hubungan gradien dua garis sejajar dapat dituliskan sebagai:</p>

            <div class="rumus-box mb-3 text-center" style="width: fit-content">
                <span>$m_1 = m_2$</span>
            </div>

            <p>
                Setelah gradien garis diketahui, persamaan garis yang melalui titik <span>$(x_1, y_1)$</span> dapat
                disusun dengan menggunakan bentuk persamaan garis melalui satu titik dan gradien, yaitu:
            </p>

            <div class="rumus-box mb-3 text-center" style="width: fit-content">
                <span>$y - y_1 = m(x - x_1)$</span>
            </div>

            <p>
                Dengan demikian, langkah menentukan persamaan garis yang melalui satu titik dan sejajar dengan garis lain
                adalah sebagai berikut:
            </p>

            <ol class="mb-3">
                <li>Menentukan gradien garis yang diketahui.</li>
                <li>Menggunakan gradien yang sama karena kedua garis saling sejajar.</li>
                <li>Mensubstitusikan gradien dan titik yang dilalui ke persamaan <span>$y - y_1 = m(x - x_1)$</span>.</li>
            </ol>

            <p class="mb-0">
                Jadi, jika sebuah garis melalui titik <span>$(x_1, y_1)$</span> dan sejajar dengan garis yang bergradien
                <span>$m$</span>, maka persamaan garisnya dapat ditentukan dengan bentuk:
            </p>

            <div class="rumus-box mt-3 text-center" style="width: fit-content">
                <span>$y - y_1 = m(x - x_1)$</span>
            </div>
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

            <p class="mb-2">
                Garis <span>$y = 2x + 1$</span> memiliki gradien <span>$m=2$</span>.
                Karena garis yang dicari sejajar, maka gradiennya juga <span>$m=2$</span>.
            </p>

            <p>
                <b>Coba lengkapi substitusi ke rumus berikut:</b>
            </p>

            <div class="rumus-box mb-3" style="width: fit-content;">
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
                <b>Pembahasan:</b>

                <ol class="mb-0 mt-2" style="line-height:1.9;">
                    <li>
                        Gradien garis <span>$y = 2x + 1$</span> adalah <span>$m = 2$</span>.
                    </li>

                    <li>
                        Karena garis yang dicari sejajar dengan garis tersebut, maka gradiennya juga
                        <span>$m = 2$</span>.
                    </li>

                    <li>
                        Garis melalui titik <span>$A(2,3)$</span>, sehingga
                        <span>$x_1=2$</span> dan <span>$y_1=3$</span>.
                    </li>

                    <li>
                        Substitusikan ke rumus <span>$y-y_1=m(x-x_1)$</span>:
                        <div class="rumus-box my-2" style="width: fit-content;">
                            <span>$y-3=2(x-2)$</span>
                        </div>
                    </li>

                    <li>
                        Sederhanakan:
                        <div class="rumus-box my-2" style="width: fit-content;">
                            <span>$y-3=2x-4$</span><br>
                            <span>$y=2x-4+3$</span><br>
                            <span>$y=2x-1$</span>
                        </div>
                    </li>
                </ol>

                <div class="alert alert-success mt-3 mb-0" style="border-radius:14px;">
                    Jadi, persamaan garis yang dicari adalah <b>$y=2x-1$</b>.
                </div>
            </div>
        </div>
    </div>

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

                <p><b>Penyelesaian:</b></p>

                <p>
                    Dari soal diketahui titik yang dilalui adalah <span>$A(4,1)$</span>, sehingga:
                </p>

                <p>
                    <span>$x_1 =$</span>
                    <input type="text" id="lat1_x1"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                    <span>dan</span>
                    <span>$y_1 =$</span>
                    <input type="text" id="lat1_y1"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                </p>

                <p>
                    <span>$m =$</span>
                    <input type="text" id="lat1_m"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                </p>

                <p>
                    Substitusikan titik dan gradien tersebut ke bentuk persamaan garis melalui satu titik dan gradien.
                </p>

                <div class="rumus-box mb-3" style="width: fit-content;">
                    <span>$y-$</span>
                    <input type="text" id="lat1_sub_y1"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                    <span>$= $</span>
                    <input type="text" id="lat1_sub_m"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                    <span>$(x-$</span>
                    <input type="text" id="lat1_sub_x1"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:80px;">
                    <span>$)$</span>
                </div>

                <p>
                    Tuliskan persamaan garis dalam bentuk <span>$y = mx + c$</span>.
                </p>

                <p>
                    <span>$y =$</span>
                    <input type="text" id="lat1_akhir"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:180px;">
                </p>

                <p>
                    Tuliskan juga persamaan garis dalam bentuk umum.
                </p>

                <p>
                    <input type="text" id="lat1_umum"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:220px;">
                    <span>$= 0$</span>
                </p>

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

                <p>
                    <b>2.</b> Seorang siswa membuat garis bantu pada bidang koordinat. Garis pertama
                    melalui titik <span>$(3,4)$</span> dan <span>$(5,1)$</span>. Ia ingin membuat garis
                    lain yang melalui titik <span>$(4,6)$</span> dan sejajar dengan garis pertama.
                    Tentukan persamaan garis tersebut.
                </p>

                <p><b>Penyelesaian:</b></p>

                <p>
                    Gradien garis yang melalui titik <span>$(3,4)$</span> dan <span>$(5,1)$</span> adalah:
                </p>

                <div class="d-flex align-items-center flex-wrap gap-2 mb-3">
                    <span>$m =$</span>

                    <div class="frac-input">
                        <div class="top">
                            <input type="text" id="lat2_m_atas1"
                                class="form-control form-control-sm text-center jawaban-latihan">
                            <span>$-$</span>
                            <input type="text" id="lat2_m_atas2"
                                class="form-control form-control-sm text-center jawaban-latihan">
                        </div>

                        <div class="bottom">
                            <input type="text" id="lat2_m_bawah1"
                                class="form-control form-control-sm text-center jawaban-latihan">
                            <span>$-$</span>
                            <input type="text" id="lat2_m_bawah2"
                                class="form-control form-control-sm text-center jawaban-latihan">
                        </div>
                    </div>

                    <span>$=$</span>

                    <div class="frac-input">
                        <div class="top">
                            <input type="text" id="lat2_m_sederhana_atas"
                                class="form-control form-control-sm text-center jawaban-latihan">
                        </div>

                        <div class="bottom">
                            <input type="text" id="lat2_m_sederhana_bawah"
                                class="form-control form-control-sm text-center jawaban-latihan">
                        </div>
                    </div>
                </div>

                <p>
                    Karena garis yang dicari sejajar dengan garis pertama, maka gradiennya sama. Gunakan titik
                    <span>$(4,6)$</span> dan gradien tersebut ke bentuk persamaan garis melalui satu titik dan gradien.
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
                    Tuliskan persamaan garis dalam bentuk <span>$y = mx + c$</span>.
                </p>

                <p>
                    <span>$y =$</span>
                    <input type="text" id="lat2_akhir"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:200px;">
                </p>

                <p>
                    Tuliskan juga persamaan garis dalam bentuk umum.
                </p>

                <p>
                    <input type="text" id="lat2_umum"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:220px;">
                    <span>$= 0$</span>
                </p>

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
            const benar1 = cekIsianEksplorasi("eks_sejajar1", ["mq", "m_q"]);
            const benar2 = cekIsianEksplorasi("eks_sejajar2", ["m"]);
            const benar3 = cekIsianEksplorasi("eks_sejajar3", ["y1", "y_1"]);
            const benar4 = cekIsianEksplorasi("eks_sejajar4", ["m"]);
            const benar5 = cekIsianEksplorasi("eks_sejajar5", ["x1", "x_1"]);

            const feedback = document.getElementById("feedbackEksplorasiSejajar");
            const kesimpulan = document.getElementById("kesimpulanEksplorasiSejajar");

            if (benar1 && benar2 && benar3 && benar4 && benar5) {
                feedback.innerHTML =
                    '<div class="alert alert-success py-2 mb-0">Bagus, kamu sudah menemukan bahwa garis sejajar memiliki gradien yang sama, sehingga persamaan garisnya dapat disusun dengan bentuk titik-gradien.</div>';
                kesimpulan.classList.remove("d-none");
            } else {
                feedback.innerHTML =
                    '<div class="alert alert-warning py-2 mb-0">Masih ada jawaban yang belum tepat. Coba perhatikan lagi hubungan gradien dua garis yang sejajar.</div>';
                kesimpulan.classList.add("d-none");
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

        function cekLatihan1Sejajar() {
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

            const feedback = document.getElementById("feedbackLatihan1");
            const petunjuk = document.getElementById("petunjukLatihan1");

            if (semuaBenar) {
                feedback.innerHTML =
                    '<div class="alert alert-success py-2 mb-0">Bagus, jawabanmu sudah benar. Lanjut ke soal berikutnya.</div>';
                if (petunjuk) petunjuk.innerHTML = "";

                setTimeout(() => {
                    pindahLatihan(1);
                }, 700);
                return;
            }

            feedback.innerHTML =
                '<div class="alert alert-warning py-2 mb-0">Masih ada jawaban yang belum tepat. Coba periksa kembali jawabanmu.</div>';

            if (!benarX1 || !benarY1) {
                tampilkanPetunjukLatihan1(
                    "Petunjuk: baca titik A(4,1), lalu tentukan x₁ dan y₁.",
                );
                return;
            }

            if (!benarM) {
                tampilkanPetunjukLatihan1(
                    "Petunjuk: karena garis sejajar, gradien garis yang dicari sama dengan gradien yang diketahui.",
                );
                return;
            }

            if (!benarSubY1 || !benarSubM || !benarSubX1) {
                tampilkanPetunjukLatihan1(
                    "Petunjuk: masukkan titik (4,1) dan gradien 2 ke bentuk y - y₁ = m(x - x₁).",
                );
                return;
            }

            if (!benarAkhir) {
                tampilkanPetunjukLatihan1("Petunjuk: sederhanakan y - 1 = 2(x - 4).");
                return;
            }

            if (!benarUmum) {
                tampilkanPetunjukLatihan1(
                    "Petunjuk: ubah y = 2x - 7 ke bentuk umum ax + by + c = 0.",
                );
            }
        }

        function cekLatihan2Sejajar() {
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
                "-3x-2y+24",
                "-1.5x+12",
                "-1.5x + 12",
            ]);

            const benarUmum = cekIsianLatihanSejajar("lat2_umum", [
                "3x+2y-24",
                "3x + 2y - 24",
                "-3/2x-y+12",
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
            const petunjuk = document.getElementById("petunjukLatihan2");

            if (semuaBenar) {
                feedback.innerHTML =
                    '<div class="alert alert-success py-2 mb-0">Bagus, jawabanmu sudah benar. Kamu sudah menyelesaikan semua latihan.</div>';
                if (petunjuk) petunjuk.innerHTML = "";
                return;
            }

            feedback.innerHTML =
                '<div class="alert alert-warning py-2 mb-0">Masih ada jawaban yang belum tepat. Coba periksa kembali jawabanmu.</div>';

            if (!benarMAtas1 || !benarMAtas2 || !benarMBawah1 || !benarMBawah2) {
                tampilkanPetunjukLatihan2(
                    "Petunjuk: gunakan rumus gradien dari dua titik, yaitu selisih y dibagi selisih x.",
                );
                return;
            }

            if (!benarMSederhanaAtas || !benarMSederhanaBawah) {
                tampilkanPetunjukLatihan2(
                    "Petunjuk: sederhanakan 1 - 4 dan 5 - 3 terlebih dahulu.",
                );
                return;
            }

            if (!benarSubY1 || !benarSubMAtas || !benarSubMBawah || !benarSubX1) {
                tampilkanPetunjukLatihan2(
                    "Petunjuk: gunakan titik (4,6) dan gradien yang sama karena kedua garis sejajar.",
                );
                return;
            }

            if (!benarAkhir) {
                tampilkanPetunjukLatihan2(
                    "Petunjuk: sederhanakan y - 6 = -3/2 (x - 4).",
                );
                return;
            }

            if (!benarUmum) {
                tampilkanPetunjukLatihan2(
                    "Petunjuk: hilangkan dulu pecahan pada y = -3/2 x + 12 dengan mengalikan semua ruas dengan 2, lalu pindahkan semua suku ke satu ruas hingga berbentuk ax + by + c = 0.",
                );
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
        // Save progress
        // =========================
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
        function cekLatihan1Sejajar() {
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
