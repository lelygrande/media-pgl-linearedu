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
                Tentukan persamaan garis yang melalui titik <span>$A(2,3)$</span> dan sejajar dengan garis
                <span>$y = 2x + 1$</span>.
            </p>

            <p><b>Penyelesaian:</b></p>

            <p>
                Gradien garis <span>$y = 2x + 1$</span> adalah
                <input type="text" id="cs_sejajar_m1"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:80px;">.
            </p>

            <p>
                Karena garis yang dicari sejajar dengan garis tersebut, maka gradiennya juga
                <input type="text" id="cs_sejajar_m2"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:80px;">.
            </p>

            <p>
                Gunakan titik <span>$(2,3)$</span> dan gradien tersebut ke bentuk persamaan garis melalui satu titik:
            </p>

            <div class="rumus-box mb-3" style="width: fit-content;">
                <span>$y-$</span>
                <input type="text" id="cs_sejajar_y1"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:80px;">
                <span>$= $</span>
                <input type="text" id="cs_sejajar_m3"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:80px;">
                <span>$(x-$</span>
                <input type="text" id="cs_sejajar_x1"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:80px;">
                <span>$)$</span>
            </div>

            <p>
                Sederhanakan persamaan tersebut hingga diperoleh bentuk akhir.
            </p>

            <p>
                <span>$y =$</span>
                <input type="text" id="cs_sejajar_akhir"
                    class="form-control form-control-sm d-inline-block text-center jawaban-contoh" style="width:160px;">
            </p>

            <div class="mt-3">
                <button class="btn btn-palet btn-sm" onclick="cekContohSoalSejajar()">Cek</button>
                <div id="feedbackContohSoalSejajar" class="mt-2"></div>
                <div id="petunjukContohSoalSejajar" class="mt-2"></div>
            </div>

            <div id="pembahasanContohSoalSejajar" class="box-kesimpulan mt-3 d-none">
                <b>Pembahasan:</b>
                <ol class="mb-0 mt-2">
                    <li>Gradien garis <span>$y = 2x + 1$</span> adalah <span>$2$</span>.</li>
                    <li>Karena garis yang dicari sejajar, maka gradiennya juga <span>$2$</span>.</li>
                    <li>Substitusikan titik <span>$(2,3)$</span> ke rumus <span>$y-y_1=m(x-x_1)$</span>:
                        <span>$y-3=2(x-2)$</span>.
                    </li>
                    <li>Sederhanakan:
                        <span>$y-3=2x-4$</span>, sehingga <span>$y=2x-1$</span>.
                    </li>
                </ol>
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
                    <b>1.</b> Seorang siswa mengamati hubungan antara lama waktu belajar <span>$x$</span>
                    dan nilai tambahan yang diperoleh <span>$y$</span>. Diketahui garis yang dicari
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
    <script src="{{ asset('js/subbabD/subbabD_persamaan3.js') }}"></script>

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
