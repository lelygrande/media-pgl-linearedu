@extends('layout.halaman-materi')

@section('content')
    <style>
        /* Card tujuan pembelajaran */
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

        /* Box materi */
        .box-info {
            background: #f7fbff;
            border: 1px solid rgba(0, 0, 0, .06);
            border-radius: 12px;
            padding: 14px 16px;
        }

        .badge-judul {
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

        .materi-img {
            width: 100%;
            max-width: 560px;
            display: block;
            margin: 10px auto 0;
            border-radius: 8px;
        }

        .box-border-blue {
            border: 2px solid #2E75B6;
            border-radius: 10px;
            background: #fff;
            padding: 12px;
        }

        .tabel-garis {
            width: 100%;
            border-collapse: collapse;
            font-size: 15px;
            background: white;
        }

        .tabel-garis th,
        .tabel-garis td {
            border: 2px solid #000;
            padding: 8px 10px;
            vertical-align: middle;
        }

        .tabel-garis th {
            text-align: center;
            font-weight: 800;
        }

        .tabel-garis td:nth-child(1),
        .tabel-garis td:nth-child(3) {
            text-align: center;
        }

        .tabel-garis td {
            text-align: center;
            vertical-align: middle;
        }

        .tabel-garis td input {
            display: inline-block;
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

        .box-kesimpulan {
            background: #fff8e8;
            border: 1px solid #e6c76a;
            border-radius: 12px;
            padding: 14px 16px;
        }

        /* Tabel inputan */

        .input-y {
            width: 100%;
            max-width: 160px;
            padding: 6px 10px;
            border: 1px solid rgba(0, 0, 0, .2);
            border-radius: 8px;
            font-size: 15px;
        }

        .feedback-box {
            border-radius: 10px;
            padding: 10px 12px;
            margin-top: 10px;
            font-weight: 600;
            display: none;
        }

        .feedback-ok {
            display: block;
            background: #e8fff0;
            border: 1px solid #2fb344;
            color: #1b7a31;
        }

        .feedback-bad {
            display: block;
            background: #ffe8e8;
            border: 1px solid #e03131;
            color: #b42318;
        }

        .geogebra-wrap {
            border: 2px solid #2E75B6;
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
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

    <style>
        .latihan-slider {
            overflow: hidden;
            width: 100%;
        }

        .latihan-track {
            display: flex;
            transition: transform 0.4s ease;
            width: 100%;
        }

        .latihan-slide {
            min-width: 100%;
            box-sizing: border-box;
        }

        .grafik-wrapper {
            width: 100%;
            max-width: 870px;
            margin: 0 auto;
            overflow-x: auto;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 12px;
            background: #fff;
        }

        #canvas-holder {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #canvas-holder canvas {
            max-width: 100% !important;
            height: auto !important;
            display: block;
        }

        .grafik-actions {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 16px;
            flex-wrap: wrap;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/contrib/auto-render.min.js"
        onload="renderMathInElement(document.body);"></script>


    {{-- Judul --}}
    <h1 class="mb-3" style="font-weight: 600;">A. Pengertian Dasar Persamaan Garis Lurus</h1>

    {{-- Tujuan Pembelajaran --}}
    <div class="card card-tujuan mb-4">
        <div class="card-body">
            <h5>Tujuan Pembelajaran:</h5>
            <ol>
                <li>Siswa menjelaskan pengertian dan contoh Persamaan Garis Lurus</li>
                <li>Siswa menggambar grafik Persamaan Garis Lurus</li>
                <li>Siswa dapat menentukan titik potong terhadap sumbu-x dan sumbu-y</li>
            </ol>
        </div>
    </div>

    {{-- Subjudul --}}
    <h2 class="mt-2 mb-3" style="font-weight: 600;">2. Menggambar Grafik Persamaan Garis Lurus</h2>

    <div class="box-info mb-3">
        <h5 class="mb-2" style="font-weight:700;">2.1 Menggambar Grafik Persamaan menggunakan Beberapa Titik</h5>

        <p class="mb-3" style="line-height:1.7;">
            Persamaan garis lurus tidak hanya dapat dituliskan dalam bentuk aljabar,
            tetapi juga dapat direpresentasikan dalam bentuk grafik. Dengan menggambarkan grafik,
            kita dapat memahami hubungan antara dua variabel secara lebih jelas dan visual.
            Berikut ini akan dibahas cara menggambar grafik persamaan garis lurus.
        </p>

        <p class="mb-2">
            Grafik persamaan garis lurus dapat digambar dengan menentukan beberapa titik yang memenuhi persamaan tersebut.
            Langkah-langkah menggambar grafik persamaan garis lurus adalah sebagai berikut:
        </p>

        <ol class="mb-0" style="line-height:1.7; padding-left: 18px;">
            <li>Tentukan beberapa titik yang memenuhi persamaan garis lurus dengan terlebih dahulu memilih nilai $x$,
                kemudian hitung nilai $y$ yang sesuai.</li>
            <li>Buatlah tabel pasangan nilai $x$ dan $y$ yang memenuhi persamaan garis lurus.</li>
            <li>Gambarkan pasangan berurutan $(x, y)$ sebagai titik-titik pada bidang koordinat Kartesius.</li>
            <li>Hubungkan titik-titik tersebut sehingga terbentuk sebuah garis lurus.</li>
        </ol>
    </div>

    {{-- Contoh --}}
    <div class="box-contoh mt-4 mb-4">
        <span class="title-box">Contoh</span>
        <p class="mb-2">
            Gambarlah grafik persamaan garis lurus:
        </p>

        <div class="box-info mb-3" style="background:#fff;">

            <p class="text-center mb-2" style="font-weight:700;">
                \( y = 2x - 4 \)
            </p>

            <p class="mb-2">
                Untuk menggambar grafik persamaan \( y = 2x - 4 \),
                dipilih beberapa nilai \( x \), misalnya
                \( x = -2, 0, 2, 4 \),
                kemudian dihitung nilai \( y \) yang bersesuaian.
            </p>

            <div class="table-responsive" style="width: 500px">
                <table class="tabel-garis">
                    <thead>
                        <tr>
                            <th>\(x\)</th>
                            <th>\(y = 2x - 4\)</th>
                            <th>\((x,y)\)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>\(-2\)</td>
                            <td>\(y = 2(-2) - 4 = -8\)</td>
                            <td>\((-2,-8)\)</td>
                        </tr>
                        <tr>
                            <td>\(0\)</td>
                            <td>\(y = 2(0) - 4 = -4\)</td>
                            <td>\((0,-4)\)</td>
                        </tr>
                        <tr>
                            <td>\(2\)</td>
                            <td>\(y = 2(2) - 4 = 0\)</td>
                            <td>\((2,0)\)</td>
                        </tr>
                        <tr>
                            <td>\(4\)</td>
                            <td>\(y = 2(4) - 4 = 4\)</td>
                            <td>\((4,4)\)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <p class="mb-2">Penyelesaian:</p>
        <div class="box-info mb-3" style="background:#fff;">
            <p class="mb-2" style="font-weight:600;">Tampilkan titik satu per satu, lalu garisnya.
            </p>

            <div id="canvas-contoh-21" class="mb-2"></div>

            <div class="d-flex gap-2 flex-wrap">
                <button class="btn-palet btn-sm" onclick="tampilTitik21('A')">Tampilkan Titik A</button>
                <button class="btn-palet btn-sm" onclick="tampilTitik21('B')">Tampilkan Titik B</button>
                <button class="btn-palet btn-sm" onclick="tampilTitik21('C')">Tampilkan Titik C</button>
                <button class="btn-palet btn-sm" onclick="tampilTitik21('D')">Tampilkan Titik D</button>
                <button class="btn-palet btn-sm" onclick="tampilGaris21()">Tampilkan Garis</button>
                <button class="btn-palet btn-sm" onclick="resetContoh21()">Reset</button>
            </div>

            <div id="infoContoh21" class="mt-2"></div>
            <script src="{{ asset('js/subbabA/pcontoh21.js') }}"></script>
        </div>
    </div>

    {{-- LATIHAN SOAL --}}

    <div class="latihan-slider">
        <div class="latihan-track" id="latihanTrack">

            <!-- STEP 1 -->
            <section class="latihan-slide">
                <div class="box-latihan mt-5" id="latihan-garis-1">
                    <span class="title-box">Latihan</span>

                    <p class="mb-2" style="max-width: 720px;">
                        <b>1.</b> Diketahui persamaan garis lurus:<br>
                        <b>$y = x - 3$</b><br><br>
                        Isi tabel nilai $y$ lalu tuliskan pasangan $(x,y)$.
                    </p>

                    <table class="tabel-garis" style="width: 500px">
                        <tr>
                            <th>$x$</th>
                            <th>$y = x - 3$</th>
                            <th>$(x,y)$</th>
                        </tr>
                        <tr>
                            <td>$-2$</td>
                            <td><input type="text" id="lat1_y1"
                                    class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                    style="width:90px;"></td>
                            <td><input type="text" id="lat1_pair1"
                                    class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                    style="width:90px;"></td>
                        </tr>
                        <tr>
                            <td>$0$</td>
                            <td><input type="text" id="lat1_y2"
                                    class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                    style="width:90px;"></td>
                            <td><input type="text" id="lat1_pair2"
                                    class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                    style="width:90px;"></td>
                        </tr>
                        <tr>
                            <td>$2$</td>
                            <td><input type="text" id="lat1_y3"
                                    class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                    style="width:90px;"></td>
                            <td><input type="text" id="lat1_pair3"
                                    class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                    style="width:90px;"></td>
                        </tr>
                        <tr>
                            <td>$4$</td>
                            <td><input type="text" id="lat1_y4"
                                    class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                    style="width:90px;"></td>
                            <td><input type="text" id="lat1_pair4"
                                    class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                    style="width:90px;"></td>
                        </tr>
                    </table>

                    <div class="mt-3 d-flex justify-content-between ">
                        <div>
                            <button class="btn-palet" onclick="cekLatihan1()">Cek Jawaban</button>
                            <button class="btn-palet" onlick="resetLatihan1()">Reset</button>
                        </div>
                        <button id="nextBtnLat1" class="btn btn-palet" onclick="nextLatihan(1)" disabled>
                            Lanjut ke Latihan 2
                        </button>
                    </div>

                    <div id="feedbackLatihan1" style="margin-top:10px;font-weight:600;"></div>
                    <div class="box-kesimpulan mt-3" id="kesimpulanLat1" style="display:none;">
                        <p class="mb-1" style="font-weight:700;">Kesimpulan:</p>
                        <p class="mb-0">
                            Untuk menentukan pasangan berurutan $(x,y)$ pada persamaan garis lurus:
                            <br>1. Pilih nilai $x$ terlebih dahulu.
                            <br>2. Substitusikan nilai $x$ ke dalam persamaan untuk mendapatkan $y$.
                            <br>3. Tuliskan pasangan berurutan dalam bentuk $(x,y)$.
                        </p>
                    </div>
                </div>
            </section>

            <!-- STEP 2 -->
            <section class="latihan-slide">
                <div class="box-latihan mt-5" id="latihan-garis-2">
                    <span class="title-box">Latihan</span>

                    <p class="mb-2" style="max-width: 720px;">
                        <b>2.</b> Diketahui persamaan garis lurus:<br>
                        <b>$y = 2x + 5$</b><br><br>
                        Isi tabel, lalu tampilkan grafik.
                    </p>

                    <table class="tabel-garis" style="width: 500px">
                        <tr>
                            <th>$x$</th>
                            <th>$y = 2x + 5$</th>
                            <th>$(x,y)$</th>
                        </tr>
                        <tr>
                            <td>$-4$</td>
                            <td><input type="text" id="y1"
                                    class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                    style="width:90px;"></td>
                            <td id="pair1">$(-4, \dots)$</td>
                        </tr>
                        <tr>
                            <td>$-2$</td>
                            <td><input type="text" id="y2"
                                    class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                    style="width:90px;"></td>
                            <td id="pair2">$(-2, \dots)$</td>
                        </tr>
                        <tr>
                            <td>$0$</td>
                            <td><input type="text" id="y3"
                                    class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                    style="width:90px;"></td>
                            <td id="pair3">$(0, \dots)$</td>
                        </tr>
                        <tr>
                            <td>$2$</td>
                            <td><input type="text" id="y4"
                                    class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                    style="width:90px;"></td>
                            <td id="pair4">$(2, \dots)$</td>
                        </tr>
                    </table>

                    <div class="mt-3 d-flex justify-content-between">
                        <button class="btn-palet" onclick="prevLatihan(0)">Sebelumnya</button>
                        <div>
                            <button class="btn-palet" onclick="cekTabel()">Cek Tabel</button>
                            <button class="btn-palet" onclick="resetLatihan()">Reset</button>
                        </div>
                    </div>

                    <div id="feedbackTabel" style="margin-top:10px;font-weight:600;"></div>

                    <div id="grafikSection" style="display:none; margin-top:20px;">
                        <div class="grafik-wrapper">
                            <div id="canvas-holder"></div>
                        </div>

                        <div class="grafik-actions">
                            <button class="btn-palet" onclick="checkAnswers()">Submit</button>
                            <button class="btn-palet" onclick="resetAll()">Reset</button>
                        </div>

                        <div id="feedbackGrafik" style="margin-top:10px;font-weight:600;"></div>
                    </div>
                    <div class="box-kesimpulan mt-3" id="kesimpulanLat2" style="display:none;">
                        <p class="mb-1" style="font-weight:700;">Kesimpulan:</p>
                        <p class="mb-0">
                            Untuk menggambar grafik persamaan garis lurus:
                            <br>1. Tentukan beberapa nilai $x$.
                            <br>2. Hitung nilai $y$ yang sesuai.
                            <br>3. Tuliskan pasangan berurutan $(x,y)$.
                            <br>4. Plot titik-titik tersebut pada bidang koordinat.
                            <br>5. Hubungkan titik-titiknya sehingga membentuk garis lurus.
                        </p>
                    </div>
                </div>
            </section>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/p5@1.9.0/lib/p5.min.js"></script>
    <script src="{{ asset('js/subbabA/latsol21.js') }}"></script>
    <script src="{{ asset('js/subbabA/subbabA2_1.js') }}"></script>
@endsection

@section('nav')
    {{-- PREV --}}
    @if ($previousMateri)
        <a href="{{ route('materi.show', $previousMateri->slug) }}" class="btn btn-prev px-4 rounded-pill">
            ← Prev
        </a>

        {{-- KHUSUS MATERI PERTAMA --}}
    @elseif($materi->slug === 'subbab-a1')
        <a href="{{ route('apersepsi1') }}" class="btn btn-prev px-4 rounded-pill">
            ← Prev
        </a>
    @else
        <span class="btn btn-prev px-4 rounded-pill invisible">← Prev</span>
    @endif


    {{-- NEXT --}}
    @if ($nextMateri)
        <a href="{{ route('materi.show', $nextMateri->slug) }}" class="btn btn-next px-4 rounded-pill fw-semibold">
            Next →
        </a>

        {{-- MATERI TERAKHIR → KUIS --}}
    @elseif($quizBab)
        <a href="{{ route('quiz.show', $quizBab->id) }}" class="btn btn-next px-4 rounded-pill fw-semibold">
            Kuis →
        </a>
    @else
        <span class="btn btn-next px-4 rounded-pill invisible">Next →</span>
    @endif
@endsection
