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

        .card-materi {
            border-radius: 16px;
            border: 2px solid #2E75B6;
            background: #fff;
        }

        /* Box eksplorasi */
        .eksplorasi {
            background: #D9E8F6;
            border: 1px solid rgba(0, 0, 0, .06);
            border-radius: 14px;
            padding: 18px 18px 2px;
            position: relative;
            margin-top: 14px;
            margin-bottom: 30px;
        }

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

        .box-border-blue {
            border: 2px solid #2E75B6;
            border-radius: 10px;
            background: #fff;
            padding: 12px;
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

        .badge-contoh {
            display: inline-block;
            background: #2E75B6;
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

        .rumus-box {
            display: inline-block;
            background: #fff3cd;
            border: 1px solid #ffe69c;
            padding: 10px 30px;
            font-size: 20px;
            border-radius: 12px;
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

        /* contoh 2 */
        .step-stack {
            background: #e8f4ff;
            border: 1px solid rgba(0, 0, 0, .06);
            border-radius: 12px;
            padding: 14px;
        }

        .step-item {
            background: white;
            border: 1px solid rgba(0, 0, 0, .06);
            border-radius: 12px;
            padding: 12px;
            margin-bottom: 12px;
        }

        .step-row {
            display: grid;
            grid-template-columns: 260px 1fr;
            gap: 14px;
            align-items: start;
        }

        .step-eq {
            font-size: 20px;
            font-weight: 700;
            text-align: center;
            padding: 10px;
            border-radius: 10px;
            background: #f7fbff;
            border: 1px solid rgba(0, 0, 0, .06);
        }

        .step-note {
            font-size: 15px;
            line-height: 1.6;
            text-align: justify;
        }

        .btn-arrow {
            margin-top: 10px;
            width: 100%;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 8px 12px;
            font-weight: 600;
            transition: .2s;
        }

        .btn-arrow:hover {
            background: var(--primary-dark);
        }

        .final-box {
            background: #eaf8ef;
            border: 1px solid #bde5c8;
            border-radius: 10px;
            padding: 12px;
        }

        .p5-wrapper {
            position: relative;
            width: 920px;
        }
    </style>

    <style>
        .latihan-slider {
            width: 100%;
        }

        .latihan-track {
            display: block;
            width: 100%;
        }

        .latihan-slide {
            display: none;
            width: 100%;
            box-sizing: border-box;
        }

        .latihan-slide.active {
            display: block;
        }

        .latihan-dnd-wrap {
            background: #f8fbff;
            border: 1px solid rgba(0, 0, 0, .08);
            border-radius: 12px;
            padding: 14px;
        }

        .opsi-wrap {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .opsi-item {
            padding: 8px 14px;
            background: #eef4ff;
            border: 2px dashed #4a76b8;
            border-radius: 10px;
            cursor: grab;
            font-weight: 600;
            user-select: none;
        }

        .dropzone-linear {
            min-height: 80px;
            border: 2px dashed #2E75B6;
            border-radius: 12px;
            background: #ffffff;
            padding: 12px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: flex-start;
        }

        .dropzone-linear.over {
            background: #eaf4ff;
        }
    </style>

    <style>
        /* ===== RESPONSIVE MEDIA PEMBELAJARAN ===== */

        /* Supaya semua gambar tidak melebar keluar layar */
        img {
            max-width: 100%;
            height: auto;
        }

        /* Supaya konten tidak melebar di layar kecil */
        .card,
        .card-materi,
        .card-tujuan,
        .box-info,
        .box-contoh,
        .box-latihan,
        .box-eksplorasi,
        .eksplorasi,
        .latihan-dnd-wrap,
        .step-stack {
            max-width: 100%;
            box-sizing: border-box;
        }

        #ggb-garis,
        .p5-wrapper {
            width: 100% !important;
            max-width: 100%;

            overflow: hidden;

            display: flex;
            justify-content: center;
        }

        /* Responsive langkah penyelesaian */
        @media (max-width: 768px) {
            h1 {
                font-size: 24px;
                line-height: 1.3;
            }

            h2 {
                font-size: 20px;
                line-height: 1.3;
            }

            .card-tujuan {
                padding: 8px;
                border-radius: 12px;
            }

            .card-tujuan ol {
                padding-left: 18px;
                line-height: 1.6;
            }

            .box-info,
            .box-border-blue,
            .latihan-dnd-wrap,
            .step-stack,
            .step-item {
                padding: 12px;
            }

            .step-row {
                display: block;
            }

            .step-eq {
                font-size: 18px;
                margin-bottom: 10px;
                overflow-x: auto;
            }

            .step-note {
                font-size: 14px;
                text-align: left;
            }

            .rumus-box {
                font-size: 18px;
                padding: 8px 16px;
                max-width: 100%;
                overflow-x: auto;
            }

            .abc-grid {
                max-width: 100%;
            }

            .abc-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 6px;
            }

            .abc-input {
                width: 100%;
            }

            .opsi-wrap {
                flex-direction: column;
            }

            .opsi-item {
                width: 100%;
                text-align: center;
            }

            .dropzone-linear {
                min-height: 100px;
                flex-direction: column;
            }

            .jawaban-latihan {
                width: 100% !important;
                margin-bottom: 6px;
            }

            .latihan-step .d-flex {
                flex-direction: column;
                gap: 10px;
            }

            .latihan-step .text-end {
                text-align: center !important;
            }


            .btn-palet,
            .btn-arrow {
                width: 100%;
                margin-top: 6px;
            }

            .btn-sm {
                width: 100%;
            }
        }

        /* Untuk layar sangat kecil seperti HP */
        @media (max-width: 480px) {
            h1 {
                font-size: 21px;
            }

            h2 {
                font-size: 18px;
            }

            p,
            li,
            .step-note {
                font-size: 14px;
            }

            .p-4 {
                padding: 14px !important;
            }

            .mt-5 {
                margin-top: 24px !important;
            }

            .mb-4 {
                margin-bottom: 18px !important;
            }

            .step-eq {
                font-size: 16px;
            }

            .badge-sub,
            .badge-judul,
            .badge-latihan,
            .badge-contoh,
            .title-box {
                font-size: 14px;
                padding: 6px 10px;
            }

            input[type="radio"] {
                margin-bottom: 8px;
            }
        }
    </style>

    <style>
        .abc-grid {
            max-width: 360px;
        }

        .abc-row {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 8px 0;
        }

        .abc-label {
            min-width: 44px;
            font-weight: 600;
        }

        .abc-box {
            cursor: pointer;
            display: inline-block;
            min-width: 110px;
            text-align: center;
            padding: 6px 12px;
            border: 2px dashed #4a76b8;
            border-radius: 8px;
            background: #eef4ff;
            font-weight: 700;
            user-select: none;
            transition: .15s;
        }

        .abc-box:hover {
            background: #4a76b8;
            color: #fff;
            border-style: solid;
        }

        .abc-box.filled {
            border-style: solid;
            background: #eafff0;
            border-color: #2e9b4f;
            color: #000;
        }

        /* Zoom Gambar */
        .medium-zoom-overlay {
            z-index: 9998 !important;
        }

        .medium-zoom-image--opened {
            z-index: 9999 !important;
        }
    </style>


    {{-- Judul --}}
    <h1 class="mb-3" style="font-weight: 600;">A. Pengertian Dasar Persamaan Garis Lurus</h1>

    {{-- Tujuan Pembelajaran --}}
    <div class="card card-tujuan mb-4">
        <div class="card-body">
            <h5>Tujuan Pembelajaran:</h5>
            <ol>
                <li>Peserta didik dapat memahami konsep dasar persamaan garis lurus dengan benar.</li>
                <li>Peserta didik dapat menggambar grafik persamaan garis lurus dengan tepat</li>
            </ol>
        </div>
    </div>

    {{-- Subjudul --}}
    <h2 class="mt-2 mb-4" style="font-weight: 600;">1. Pengertian dan Bentuk Umum Persamaan Garis Lurus</h2>

    <div class="p-4 mt-5 box-eksplorasi">
        <div class="title-box">
            Eksplorasi Garis
        </div>

        <p style="text-align: justify;">
            Pada materi sebelumnya, kamu telah mengenal titik pada bidang koordinat Kartesius.
            Setiap titik dinyatakan dalam bentuk pasangan berurutan (x,y).
        </p>

        <p style="text-align: justify;">
            Sekarang, kita akan mengeksplorasi bagaimana sebuah garis dapat terbentuk.
            Apakah satu titik cukup untuk membentuk garis?
            Berapa banyak titik yang diperlukan untuk membuat sebuah garis lurus?
        </p>

        <p style="text-align: justify;">
            Ayo perhatikan hubungan antara titik A dan titik B.
            Saat kedua titik berada pada posisi yang berbeda, amati garis yang terbentuk.
            Lalu, coba geser salah satu titik dan perhatikan apakah garis ikut berubah.
            Dari pengamatan itu, kamu akan menemukan bagaimana sebuah garis lurus dapat ditentukan.
        </p>

        <div id="ggb-garis" class="mt-4"></div>

        <div class="mt-4">
            <h5><strong>Jawablah pertanyaan berikut:</strong></h5>

            <div class="mb-3">
                <p>1. Apa yang terbentuk jika titik A dan titik B berada pada posisi yang berbeda?</p>
                <input type="radio" name="g1" value="a"> a. Dua garis<br>
                <input type="radio" name="g1" value="b"> b. Satu garis lurus<br>
                <input type="radio" name="g1" value="c"> c. Tidak terbentuk apa-apa<br>
                <div id="hasilg1"></div>
            </div>

            <div class="mb-3">
                <p>2. Apa yang terjadi jika salah satu titik digeser?</p>
                <input type="radio" name="g2" value="a"> a. Garis ikut berubah posisi<br>
                <input type="radio" name="g2" value="b"> b. Garis tetap<br>
                <input type="radio" name="g2" value="c"> c. Garis menghilang<br>
                <div id="hasilg2"></div>
            </div>

            <div class="mb-3">
                <p>3. Jika titik A dan titik B berada pada posisi yang sama, maka...</p>
                <input type="radio" name="g3" value="a"> a. Tetap terbentuk garis<br>
                <input type="radio" name="g3" value="b"> b. Tidak dapat terbentuk garis lurus<br>
                <input type="radio" name="g3" value="c"> c. Terbentuk dua garis<br>
                <div id="hasilg3"></div>
            </div>

            <button class="btn-palet btn" onclick="cekEksplorasiGaris()">Cek Jawaban</button>

            <div id="kesimpulanGaris" class="mt-4 p-3 border border-success rounded bg-light" style="display:none;">
                <strong>Kesimpulan:</strong><br>
                Dua titik yang berbeda dapat dihubungkan oleh tepat satu garis lurus.
                Jika kedua titik berimpit (berada pada posisi yang sama), maka garis tidak dapat ditentukan.
            </div>
        </div>
    </div>

    <div class="box-info mt-3 mb-3">
        <p class="mb-2" style="text-align: justify;">
            Dari hasil eksplorasi, kita mengetahui bahwa dua titik yang berbeda dapat dihubungkan
            sehingga terbentuk sebuah garis lurus. Di dalam bidang koordinat Kartesius, setiap titik
            pada garis tersebut dinyatakan dalam pasangan berurutan <b>$(x, y)$</b>.
        </p>

        <p class="mb-2" style="text-align: justify;">
            Agar garis lurus lebih mudah dipelajari, kita dapat menuliskannya dalam bentuk persamaan.
            Persamaan ini membantu kita mengetahui titik-titik yang berada pada garis.
        </p>

        <p class="mb-0" style="text-align: justify;">
            Dengan demikian, <b>persamaan garis lurus</b> adalah persamaan matematika yang jika
            digambar pada bidang koordinat Kartesius akan membentuk sebuah garis lurus.
            Semua titik <b>$(x, y)$</b> yang memenuhi persamaan tersebut berada pada garis,
            sedangkan titik yang tidak memenuhi persamaan berada di luar garis.
        </p>
    </div>

    <div class="card card-materi mb-4">
        <div class="card-body">
            <span class="badge-sub">Bentuk Umum Persamaan Garis Lurus</span>

            <p style="text-align: justify;">
                Agar lebih mudah dipelajari, persamaan garis lurus dapat dituliskan dalam dua bentuk.
                Ayo perhatikan kedua bentuk berikut.
                Cobalah amati, apa perbedaan letak variabel <b>$y$</b> pada masing-masing bentuk?
            </p>

            <div class="box-info mt-3 mb-3">
                <p class="mb-2"><strong>1. Bentuk Eksplisit</strong></p>

                <p class="mb-2" style="text-align: justify;">
                    Perhatikan bentuk eksplisit persamaan garis lurus berikut.
                </p>

                <div class="text-center mb-2">
                    <img src="{{ asset('img/eksplisit.png') }}" alt="Bentuk eksplisit persamaan garis lurus"
                        class="img-fluid">
                </div>

                <p class="mb-1" style="text-align: justify;">
                    Bentuk ini disebut bentuk eksplisit karena variabel <b>$y$</b> sudah dinyatakan secara langsung.
                    Jadi, kamu dapat segera melihat nilai gradien dan titik potong terhadap sumbu-$y$ dari persamaan
                    tersebut.
                </p>

                <ul class="mb-0">
                    <li>$m$ adalah gradien (kemiringan garis).</li>
                    <li>$c$ adalah titik potong dengan sumbu $y$.</li>
                </ul>
            </div>


            <div class="box-info mb-3">
                <p class="mb-2"><strong>2. Bentuk Implisit</strong></p>

                <p class="mb-2" style="text-align: justify;">
                    Perhatikan bentuk implisit persamaan garis lurus berikut.
                </p>

                <div class="text-center mb-2">
                    <img src="{{ asset('img/implisit.png') }}" alt="Bentuk implisit persamaan garis lurus"
                        class="img-fluid">
                </div>

                <p class="mb-1" style="text-align: justify;">
                    Bentuk ini disebut bentuk implisit karena variabel <b>$y$</b> belum berdiri sendiri.
                    Oleh sebab itu, jika ingin mengetahui bentuk <b>$y = mx + c$</b>, kita perlu mengubahnya terlebih
                    dahulu.
                </p>

                <div class="box-info mb-3">
                    <p class="mb-2"><strong>Memahami Bentuk Umum</strong></p>

                    <p style="text-align: justify;">
                        Supaya kamu lebih memahami bentuk umum persamaan garis lurus, perhatikan penjelasan berikut.
                        Fokuslah pada koefisien di depan <b>$x$</b>, koefisien di depan <b>$y$</b>, dan bilangan tetapnya.
                    </p>

                    <p>Pada bentuk $Ax + By + C = 0$:</p>

                    <ul>
                        <li>$A$ adalah koefisien dari $x$</li>
                        <li>$B$ adalah koefisien dari $y$</li>
                        <li>$C$ adalah konstanta</li>
                    </ul>

                    <p class="mb-2" style="text-align: justify;">
                        Sekarang, coba perhatikan contoh berikut: $3x + 2y - 6 = 0$.
                        Tuliskan terlebih dahulu nilai $A$, $B$, dan $C$ pada kotak berikut.
                    </p>

                    <div class="abc-grid">
                        <div class="abc-row">
                            <label class="abc-label" for="inputA">$A =$</label>
                            <input type="text" id="inputA" class="abc-input" placeholder="Isi jawaban">
                        </div>

                        <div class="abc-row">
                            <label class="abc-label" for="inputB">$B =$</label>
                            <input type="text" id="inputB" class="abc-input" placeholder="Isi jawaban">
                        </div>

                        <div class="abc-row">
                            <label class="abc-label" for="inputC">$C =$</label>
                            <input type="text" id="inputC" class="abc-input" placeholder="Isi jawaban">
                        </div>
                    </div>

                    <button type="button" class="btn btn-palet btn-sm mt-3" onclick="cekJawabanABC()">
                        Lihat Penyelesaian
                    </button>

                    <button type="button" class="btn btn-palet btn-sm mt-3" onclick="resetKotakABC()">
                        Reset
                    </button>

                    <div id="hasilABC" class="mt-3" style="display: none;"></div>
                </div>
            </div>
        </div>
    </div>


    <p>
        Kedua bentuk tersebut menyatakan garis yang sama, hanya berbeda dalam cara penulisannya.
    </p>

    <p class="mt-3" style="text-align: justify;">
        Sekarang, mari kita lihat contoh persamaan garis lurus dalam bentuk eksplisit.
        Dengan melihat grafiknya, kamu akan lebih mudah memahami bahwa persamaan tersebut benar-benar membentuk garis lurus.
    </p>

    <p class="mb-2" style="text-align: justify;">
        Perhatikan grafik dari persamaan $y = 3x - 2$ dalam koordinat Kartesius berikut.
        Amati bagaimana titik-titik yang memenuhi persamaan itu terletak pada satu garis lurus.
    </p>
    <div class="box-info mb-3 text-center">
        <figure class="figure">
            <img src="{{ asset('img/p1.png') }}" alt="Grafik persamaan y = 3x - 2" class="zoomable img-fluid"
                style="max-width:300px; cursor:zoom-in;">

            <figcaption class="figure-caption text-center mt-2">
                Grafik persamaan $y = 3x - 2$
            </figcaption>
        </figure>
    </div>

    <p style="text-align: justify;">
        Dari grafik tersebut, terlihat bahwa titik-titik yang memenuhi persamaan $y = 3x - 2$ berada pada satu garis lurus.
        Jadi, kita dapat menyimpulkan bahwa $y = 3x - 2$ merupakan persamaan garis lurus.
    </p>

    {{-- ===== Contoh ===== --}}
    <div class="box-contoh mt-5 mb-4">
        <span class="title-box">Contoh</span>

        <p class="mt-2 mb-3" style="text-align: justify;">
            Sekarang, cobalah perhatikan beberapa persamaan berikut.
            Untuk menentukan apakah suatu persamaan merupakan persamaan garis lurus atau bukan,
            amati apakah variabel-variabelnya berpangkat satu dan tidak memuat bentuk akar atau pangkat lebih dari satu.
        </p>

        <!-- No 1 -->
        <div class="mb-3">
            <b>1. $x + 3y = 0$</b><br>
            <button class="btn-palet btn-sm mt-2" onclick="toggleSolution('sol1', this)">
                Lihat Penyelesaian
            </button>

            <div id="sol1" class="mt-2" style="display:none;">
                $x + 3y = 0$ merupakan persamaan garis lurus karena memuat variabel
                $x$ dan $y$ berpangkat satu, sehingga termasuk persamaan garis lurus.
            </div>
        </div>

        <!-- No 2 -->
        <div class="mb-3">
            <b>2. $x^2 + 2y = 5$</b><br>
            <button class="btn-palet btn-sm mt-2" onclick="toggleSolution('sol2', this)">
                Lihat Penyelesaian
            </button>
            <div id="sol2" class="mt-2" style="display:none;">
                $x^2 + 2y = 5$ bukan persamaan garis lurus karena terdapat suku
                $x^2$ yang berpangkat dua, sehingga tidak bersifat linear.
            </div>
        </div>

        <!-- No 3 -->
        <div class="mb-3">
            <b>3. $3x + 3y = 3^2$</b><br>
            <button class="btn-palet btn-sm mt-2" onclick="toggleSolution('sol3', this)">
                Lihat Penyelesaian
            </button>

            <div id="sol3" class="mt-2" style="display:none;">
                Karena $3^2 = 9$, maka persamaan menjadi $3x + 3y = 9$.
                Semua variabel berpangkat satu, sehingga merupakan persamaan garis lurus.
            </div>
        </div>

        <!-- No 4 -->
        <div class="mb-3">
            <b>4. $\frac{y}{3} + 3x = 12$</b><br>
            <button class="btn-palet btn-sm mt-2" onclick="toggleSolution('sol4', this)">
                Lihat Penyelesaian
            </button>

            <div id="sol4" class="mt-2" style="display:none;">
                $\frac{y}{3} + 3x = 12$ merupakan persamaan garis lurus karena variabel
                $x$ dan $y$ tetap berpangkat satu. Bentuk $\frac{y}{3}$ hanya menunjukkan
                bahwa variabel $y$ dibagi dengan konstanta, sehingga persamaan tersebut
                masih termasuk persamaan garis lurus.
            </div>
        </div>

        <!-- No 5 -->
        <div class="mb-3">
            <b>5. $\sqrt{4y} + 3x - 6 = 0$</b><br>
            <button class="btn-palet btn-sm mt-2" onclick="toggleSolution('sol5', this)">
                Lihat Penyelesaian
            </button>

            <div id="sol5" class="mt-2" style="display:none;">
                Persamaan ini bukan persamaan garis lurus karena mengandung bentuk akar
                $\sqrt{4y}$ sehingga tidak dapat dinyatakan sebagai persamaan garis lurus.
            </div>
        </div>

    </div>

    {{-- Contoh mengubah eksplisit ke implisit --}}
    <div class="box-contoh mt-5 mb-4">
        <span class="title-box">Contoh</span>

        <p class="mt-2 mb-3" style="text-align: justify;">
            Nyatakan persamaan garis berikut ke dalam bentuk umum <b>$Ax + By + C = 0$</b>.
        </p>

        <p class="text-center mb-3" style="font-weight:700;">
            $y = -2x + 3$
        </p>

        <div class="step-stack">
            <!-- STEP 1 -->
            <div class="step-item">
                <div class="step-row">
                    <div class="step-eq">$y = -2x + 3$</div>
                    <div class="step-note">
                        Persamaan tersebut masih berbentuk <b>eksplisit</b> karena <b>$y$</b> sudah berdiri sendiri.
                        Agar menjadi bentuk umum, semua suku harus dipindahkan ke satu ruas sehingga ruas lainnya bernilai
                        nol.
                    </div>
                </div>

                <button class="btn-arrow" type="button" onclick="openStepUmum('umum2', this)">
                    ↓ Tampilkan langkah berikutnya
                </button>
            </div>

            <!-- STEP 2 -->
            <div id="umum2" class="step-item" style="display:none;">
                <div class="step-row">
                    <div class="step-eq">$2x + y = 3$</div>
                    <div class="step-note">
                        Pindahkan <b>$-2x$</b> ke ruas kiri. Saat dipindahkan ruas, tandanya berubah menjadi <b>$+2x$</b>.
                    </div>
                </div>

                <button class="btn-arrow" type="button" onclick="openStepUmum('umum3', this)">
                    ↓ Tampilkan langkah berikutnya
                </button>
            </div>

            <!-- STEP 3 -->
            <div id="umum3" class="step-item" style="display:none;">
                <div class="step-row">
                    <div class="step-eq">$2x + y - 3 = 0$</div>
                    <div class="step-note">
                        Selanjutnya, pindahkan <b>$3$</b> ke ruas kiri. Karena awalnya <b>$+3$</b> di ruas kanan,
                        maka saat dipindahkan menjadi <b>$-3$</b>.
                    </div>
                </div>

                <button class="btn-arrow" type="button" onclick="openStepUmum('umum4', this)">
                    ↓ Tampilkan langkah berikutnya
                </button>
            </div>

            <!-- STEP 4 -->
            <div id="umum4" class="step-item" style="display:none;">
                <div class="step-row">
                    <div class="step-eq">$2x + y - 3 = 0$</div>
                    <div class="step-note">
                        Sekarang persamaan sudah berbentuk umum <b>$Ax + By + C = 0$</b>,
                        dengan <b>$A = 2$</b>, <b>$B = 1$</b>, dan <b>$C = -3$</b>.
                    </div>
                </div>

                <div class="final-box mt-3">
                    <b>Kesimpulan:</b> Bentuk umum dari persamaan <b>$y = -2x + 3$</b> adalah
                    <b>$2x + y - 3 = 0$</b>.
                </div>
            </div>
        </div>
    </div>

    {{-- Contoh mengubah implisit ke eksplisit --}}
    <div class="box-contoh mt-5 mb-4">
        <span class="title-box">Contoh</span>

        <p class="mt-2 mb-3" style="text-align: justify;">
            Mari kita ubah persamaan berikut dari bentuk implisit ke bentuk eksplisit secara bertahap.
            Perhatikan setiap langkahnya dengan saksama, terutama bagaimana <b>$y$</b> dibuat berdiri sendiri.
        </p>

        <p class="text-center mb-3" style="font-weight:700;">
            $3x + 2y - 6 = 0$
        </p>

        <div class="step-stack">

            <!-- STEP 1 -->
            <div class="step-item">
                <div class="step-row">
                    <div class="step-eq">$3x + 2y - 6 = 0$</div>
                    <div class="step-note">
                        Mulai dari persamaan dalam bentuk implisit.
                        Target kita adalah membuat <b>$y$</b> berdiri sendiri.
                    </div>
                </div>

                <button class="btn-arrow" type="button" onclick="openStepS('s2', this)">
                    ↓ Tampilkan langkah berikutnya
                </button>
            </div>

            <!-- STEP 2 -->
            <div id="s2" class="step-item" style="display:none;">
                <div class="step-row">
                    <div class="step-eq">$2y = -3x + 6$</div>
                    <div class="step-note">
                        Pindahkan $3x$ dan $-6$ ke ruas kanan.
                        Jika suatu suku berpindah ruas, maka tandanya berubah, sehingga
                        $3x$ menjadi $-3x$ dan $-6$ menjadi $+6$.
                    </div>
                </div>

                <button class="btn-arrow" type="button" onclick="openStepS('s3', this)">
                    ↓ Tampilkan langkah berikutnya
                </button>
            </div>

            <!-- STEP 3 -->
            <div id="s3" class="step-item" style="display:none;">
                <div class="step-row">
                    <div class="step-eq">
                        $\frac{2y}{2} = \frac{-3x + 6}{2}$ <br>
                        $y = \frac{-3x + 6}{2}$
                    </div>
                    <div class="step-note">
                        Bagi kedua ruas dengan 2 agar $y$ berdiri sendiri.
                    </div>
                </div>

                <button class="btn-arrow" type="button" onclick="openStepS('s4', this)">
                    ↓ Tampilkan langkah berikutnya
                </button>
            </div>

            <!-- STEP 4 -->
            <div id="s4" class="step-item" style="display:none;">
                <div class="step-row">
                    <div class="step-eq">$y = -\frac{3}{2}x + 3$</div>
                    <div class="step-note">
                        Sederhanakan bentuk pecahannya.
                        Sekarang persamaan sudah berbentuk eksplisit.
                    </div>
                </div>

                <div class="final-box mt-3">
                    <b>Kesimpulan:</b> Persamaan tersebut telah diubah ke bentuk eksplisit
                    $y = mx + c$.
                </div>
            </div>
        </div>
    </div>



    {{-- ===== Latihan Soal ===== --}}
    <div class="box-latihan mt-5">
        <div class="card-body">
            <span class="title-box">Latihan Soal</span>

            <!-- ===================== -->
            <!-- LATIHAN 1 -->
            <!-- ===================== -->
            <div class="latihan-step" id="latihanStep1">
                <p>
                    <b>1.</b> Seret persamaan yang merupakan <b>persamaan garis lurus</b> ke dalam kotak jawaban.
                </p>

                <div class="latihan-dnd-wrap mb-3">
                    <div class="opsi-wrap" id="opsiLinear">
                        <div class="opsi-item" draggable="true" data-linear="true">$x + 3y = 9$</div>
                        <div class="opsi-item" draggable="true" data-linear="false">$x^2 + y = 4$</div>
                        <div class="opsi-item" draggable="true" data-linear="true">$2x - y + 5 = 0$</div>
                        <div class="opsi-item" draggable="true" data-linear="false">$\sqrt{y} + x = 2$</div>
                        <div class="opsi-item" draggable="true" data-linear="true">$y = -3x + 1$</div>
                        <div class="opsi-item" draggable="true" data-linear="false">$xy = 6$</div>
                    </div>

                    <div class="dropzone-linear mt-3" id="dropLinear">
                        Seret jawaban ke sini
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-palet btn-sm" onclick="cekLatihan1A1()">Cek Jawaban</button>
                        <button class="btn btn-palet btn-sm" onclick="resetLatihan1A1()">Reset</button>
                    </div>

                    <div id="feedbackLatihan1A1" class="mt-2"></div>
                </div>

                <div class="mt-3 text-end">
                    <button id="nextBtn1" class="btn btn-palet btn-sm" onclick="nextLatihan(2)" disabled>
                        Lanjut ke Latihan 2
                    </button>
                </div>
            </div>

            <!-- ===================== -->
            <!-- LATIHAN 2 -->
            <!-- ===================== -->
            <div class="latihan-step" id="latihanStep2" style="display:none;">
                <hr class="my-4">

                <p>
                    <b>2.</b> Buatlah <b>3 contoh persamaan garis lurus!</b>.
                </p>

                <p class="mb-3">
                    Contoh: $y = 2x + 3$, $3x + 2y - 6 = 0$, atau $x - y + 4 = 0$.
                </p>

                <div class="mb-3">
                    <p><b>a.</b> Contoh persamaan garis lurus pertama</p>

                    <input type="text" id="lat2a"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:180px;">

                    <div id="fb-lat2a" class="mt-1"></div>
                </div>

                <div class="mb-3">
                    <p><b>b.</b> Contoh persamaan garis lurus kedua</p>

                    <input type="text" id="lat2b"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:180px;">

                    <div id="fb-lat2b" class="mt-1"></div>
                </div>

                <div class="mb-3">
                    <p><b>c.</b> Contoh persamaan garis lurus ketiga</p>

                    <input type="text" id="lat2c"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:180px;">

                    <div id="fb-lat2c" class="mt-1"></div>
                </div>

                <div class="mt-3">
                    <button class="btn btn-palet btn-sm" onclick="cekLatihan2A1()">
                        Cek Jawaban
                    </button>

                    <button class="btn btn-palet btn-sm" onclick="resetLatihan2A1()">
                        Reset
                    </button>
                </div>

                <div id="feedbackLatihan2A1" class="mt-2"></div>

                <div class="mt-3 text-end">
                    <button id="nextBtn2" class="btn btn-palet btn-sm" onclick="nextLatihan(3)" disabled>
                        Lanjut ke Latihan 3
                    </button>
                </div>

                <div class="mt-3">
                    <button class="btn btn-palet btn-sm" onclick="prevLatihan(1)">
                        Kembali ke Latihan 1
                    </button>
                </div>
            </div>


            <!-- ===================== -->
            <!-- LATIHAN 3 -->
            <!-- ===================== -->
            <div class="latihan-step" id="latihanStep3" style="display:none;">
                <hr class="my-4">

                <p>
                    <b>3.</b> Nyatakan persamaan garis berikut ke dalam bentuk
                    <b>$Ax + By + C = 0$</b>.
                </p>

                <div class="mb-3">
                    <p><b>a.</b> $y = 2x - 5$</p>

                    <input type="text" id="lat3a"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:100px;">

                    <span>$= 0$</span>

                    <div id="fb-lat3a" class="mt-1"></div>
                </div>

                <div class="mb-3">
                    <p><b>b.</b> $y = -3x + 4$</p>

                    <input type="text" id="lat3b"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:100px;">

                    <span>$= 0$</span>

                    <div id="fb-lat3b" class="mt-1"></div>
                </div>

                <div class="mb-3">
                    <p><b>c.</b> $2y = x + 6$</p>

                    <input type="text" id="lat3c"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:100px;">

                    <span>$= 0$</span>

                    <div id="fb-lat3c" class="mt-1"></div>
                </div>

                <div class="mt-3">
                    <button class="btn btn-palet btn-sm" onclick="cekLatihan3A1()">
                        Cek Jawaban
                    </button>

                    <button class="btn btn-palet btn-sm" onclick="resetLatihan3A1()">
                        Reset
                    </button>
                </div>

                <div id="feedbackLatihan3A1" class="mt-2"></div>

                <div class="mt-3 text-end">
                    <button id="nextBtn3" class="btn btn-palet btn-sm" onclick="nextLatihan(4)" disabled>
                        Lanjut ke Latihan 4
                    </button>
                </div>

                <div class="mt-3">
                    <button class="btn btn-palet btn-sm" onclick="prevLatihan(2)">
                        Kembali ke Latihan 2
                    </button>
                </div>
            </div>

            <!-- ===================== -->
            <!-- LATIHAN 4 -->
            <!-- ===================== -->
            <div class="latihan-step" id="latihanStep4" style="display:none;">
                <hr class="my-4">

                <p>
                    <b>4.</b> Nyatakan persamaan garis berikut ke dalam bentuk
                    <b>$y = mx + c$</b>.
                </p>

                <div class="mb-3">
                    <p><b>a.</b> $3x + y - 7 = 0$</p>

                    <p>
                        <span>$y =$</span>

                        <input type="text" id="lat4a"
                            class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                            style="width:100px;">
                    </p>

                    <div id="fb-lat4a" class="mt-1"></div>
                </div>

                <div class="mb-3">
                    <p><b>b.</b> $2x - 4y + 8 = 0$</p>

                    <p>
                        <span>$y =$</span>

                        <input type="text" id="lat4b"
                            class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                            style="width:100px;">
                    </p>

                    <div id="fb-lat4b" class="mt-1"></div>
                </div>

                <div class="mb-3">
                    <p><b>c.</b> $5x + 2y - 6 = 0$</p>

                    <p>
                        <span>$y =$</span>

                        <input type="text" id="lat4c"
                            class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                            style="width:100px;">
                    </p>

                    <div id="fb-lat4c" class="mt-1"></div>
                </div>

                <div class="mt-3">
                    <button class="btn btn-palet btn-sm" onclick="cekLatihan4A1()">
                        Cek Jawaban
                    </button>
                </div>

                <div id="feedbackLatihan4A1" class="mt-2"></div>

                <div class="mt-3">
                    <button class="btn btn-palet btn-sm" onclick="prevLatihan(3)">
                        Kembali ke Latihan 3
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/contrib/auto-render.min.js"
        onload="renderMathInElement(document.body, { delimiters: [{left: '$$', right: '$$', display: true},{left: '$', right: '$', display: false}]});">
    </script>

    {{-- p5 library --}}
    <script src="https://cdn.jsdelivr.net/npm/p5@1.9.0/lib/p5.min.js"></script>
    <script src="https://www.geogebra.org/apps/deployggb.js"></script>

    <script>
        // Geogebra
        let applet2 = null;

        // =========================
        // RESPONSIVE SIZE
        // =========================
        function getGgbSize2() {
            const container = document.querySelector("#ggb-garis");

            const width = container ? container.clientWidth : 500;

            // MOBILE
            if (window.innerWidth <= 768) {
                return {
                    width: Math.min(width, 400),
                    height: 400,
                };
            }

            // DESKTOP
            return {
                width: 400,
                height: 400,
            };
        }

        // =========================
        // ON LOAD
        // =========================
        function ggbOnLoad2(api) {
            // mode grafik saja
            api.setPerspective("G");

            // axis & grid
            api.setAxesVisible(true, true);
            api.setGridVisible(true);

            // grid sederhana
            api.setGraphicsOptions(1, {
                gridType: 0,
            });

            api.setAxisSteps(1, 1, 1, 1);

            // viewport
            api.setCoordSystem(-6, 6, -6, 6);

            // titik
            api.evalCommand("A=(0,1)");
            api.evalCommand("B=(3,2)");

            // garis
            api.evalCommand("g=Line(A,B)");

            // style titik
            ["A", "B"].forEach(function(obj) {
                api.setLabelVisible(obj, true);

                api.setPointSize(obj, 8);

                api.setColor(obj, 0, 102, 204);
            });

            // style garis
            api.setLabelVisible("g", false);

            api.setLineThickness("g", 4);

            api.setColor("g", 220, 60, 35);
        }

        // =========================
        // INIT
        // =========================
        function loadGeoGebra2() {
            const ggbSize = getGgbSize2();

            const params2 = {
                appName: "classic",

                id: "ggbApplet2",

                width: ggbSize.width,
                height: ggbSize.height,

                showToolBar: false,
                showAlgebraInput: false,
                showMenuBar: false,

                showZoomButtons: false,
                showFullscreenButton: false,

                enableShiftDragZoom: true,
                enableRightClick: false,

                showResetIcon: true,

                appletOnLoad: ggbOnLoad2,
            };

            applet2 = new GGBApplet(params2, true);

            applet2.inject("ggb-garis");
        }

        // =========================
        // LOAD
        // =========================
        window.addEventListener("load", function() {
            loadGeoGebra2();
        });

        // Eksplorasi
        function cekEksplorasiGaris() {
            const kunci = {
                g1: "b",
                g2: "a",
                g3: "b",
            };

            let benarSemua = true;

            for (let key in kunci) {
                const jawaban = document.querySelector(`input[name="${key}"]:checked`);
                const hasil = document.getElementById("hasil" + key);
                if (!hasil) continue;

                if (!jawaban) {
                    hasil.innerHTML =
                        "<span class='text-warning'>Pilih salah satu jawaban</span>";
                    benarSemua = false;
                } else if (jawaban.value === kunci[key]) {
                    hasil.innerHTML = "<span class='text-success'>✓ Benar</span>";
                } else {
                    hasil.innerHTML = "<span class='text-danger'>✗ Salah</span>";
                    benarSemua = false;
                }
            }

            const kesimpulan = document.getElementById("kesimpulanGaris");
            if (kesimpulan) {
                kesimpulan.style.display = benarSemua ? "block" : "none";
            }
        }

        // Memahami bentuk implisit
        function cekJawabanABC() {
            const inputA = document.getElementById("inputA")?.value.trim() || "";
            const inputB = document.getElementById("inputB")?.value.trim() || "";
            const inputC = document.getElementById("inputC")?.value.trim() || "";
            const hasil = document.getElementById("hasilABC");
            if (!hasil) return;

            const benarA = "3";
            const benarB = "2";
            const benarC = "-6";

            let feedback = `
        <div class="alert alert-info">
            <p><strong>Penyelesaian:</strong></p>
            <p>Pada persamaan $3x + 2y - 6 = 0$:</p>
            <ul>
                <li>$a = 3$</li>
                <li>$b = 2$</li>
                <li>$c = -6$</li>
            </ul>
    `;

            if (inputA === benarA && inputB === benarB && inputC === benarC) {
                feedback += `<p class="mb-0 text-success"><strong>Jawaban kamu benar.</strong></p>`;
            } else {
                feedback +=
                    `<p class="mb-0 text-danger"><strong>Jawaban kamu belum tepat. Perhatikan kembali koefisien dan konstantanya.</strong></p>`;
            }

            feedback += `</div>`;

            hasil.innerHTML = feedback;
            hasil.style.display = "block";

            renderMathSafe(hasil);
        }

        function resetKotakABC() {
            const inputA = document.getElementById("inputA");
            const inputB = document.getElementById("inputB");
            const inputC = document.getElementById("inputC");
            const hasil = document.getElementById("hasilABC");

            if (inputA) inputA.value = "";
            if (inputB) inputB.value = "";
            if (inputC) inputC.value = "";
            if (hasil) {
                hasil.innerHTML = "";
                hasil.style.display = "none";
            }
        }

        // Contoh menentukan persamaan garis lurus atau tidak
        function toggleSolution(id, btn) {
            const el = document.getElementById(id);
            if (!el || !btn) return;

            const isHidden = el.style.display === "none" || el.style.display === "";
            el.style.display = isHidden ? "block" : "none";
            btn.textContent = isHidden ?
                "Sembunyikan Penyelesaian" :
                "Lihat Penyelesaian";
        }

        // Contoh implisit klik kotak abc
        function tampilABC(huruf) {
            const hasil = document.getElementById("hasilABC");
            if (!hasil) return;

            if (huruf === "a") hasil.innerHTML = "$a = 3$";
            if (huruf === "b") hasil.innerHTML = "$b = 2$";
            if (huruf === "c") hasil.innerHTML = "$c = -6$";

            renderMathSafe(hasil);
        }

        // Contoh mengubah persamaan eksplisit ke implisit
        function openStepUmum(id, btn) {
            const el = document.getElementById(id);
            if (!el || !btn) return;

            el.style.display = "block";
            btn.style.display = "none";
        }

        function openStepS(id, btn) {
            const next = document.getElementById(id);
            if (!next || !btn) return;

            next.style.display = "block";
            btn.style.display = "none";
        }

        function openStep(n, btn) {
            const next = document.getElementById("step" + n);
            if (!next || !btn) return;

            next.style.display = "block";
            btn.style.display = "none";
        }

        // =========================
        // HELPER
        // =========================
        function renderMathSafe(target) {
            if (!target || !window.renderMathInElement) return;

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
                ],
            });
        }

        function norm(expr) {
            return String(expr || "")
                .toLowerCase()
                .replace(/\s+/g, "")
                .replace(/−/g, "-")
                .trim();
        }

        // SAVE PROGRESS
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

        // BUKA TOMBOL NEXT
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
        // LATIHAN SOAL
        // =========================
        let draggedItem = null;

        document.addEventListener("DOMContentLoaded", function() {
            initDragDropA1();
        });

        function getContentWrapper() {
            return document.querySelector(".content-wrapper");
        }

        function renderMathSafe(target) {
            if (!target || !window.renderMathInElement) return;

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
                ],
            });
        }

        function scrollKeStep(stepId) {
            const content = document.querySelector(".content-wrapper");
            const step = document.getElementById(stepId);
            if (!content || !step) return;

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
            for (let i = stepMulai; i <= 4; i++) {
                const step = document.getElementById(`latihanStep${i}`);
                if (step) step.style.display = "none";
            }
        }

        function norm(expr) {
            return String(expr || "")
                .toLowerCase()
                .replace(/\s+/g, "")
                .replace(/−/g, "-")
                .trim();
        }

        // =========================
        // LATIHAN 1
        // =========================
        function initDragDropA1() {

            const items = document.querySelectorAll(".opsi-item");

            const dropzone = document.getElementById("dropLinear");

            const opsiWrap = document.getElementById("opsiLinear");

            if (!items.length || !dropzone || !opsiWrap) return;

            items.forEach((item) => {

                // =========================
                // DESKTOP DRAG
                // =========================
                item.addEventListener("dragstart", function() {

                    draggedItem = this;
                });

                // =========================
                // MOBILE TAP
                // =========================
                item.addEventListener("touchstart", function(e) {

                    e.preventDefault();

                    // kalau masih di opsi
                    if (this.parentElement.id === "opsiLinear") {

                        dropzone.appendChild(this);

                    }

                    // kalau sudah di jawaban
                    else {

                        opsiWrap.appendChild(this);
                    }

                }, {
                    passive: false
                });

            });

            // =========================
            // DESKTOP DROP
            // =========================
            [dropzone, opsiWrap].forEach((area) => {

                area.addEventListener("dragover", function(e) {

                    e.preventDefault();

                    if (this.id === "dropLinear") {

                        this.classList.add("over");
                    }
                });

                area.addEventListener("dragleave", function() {

                    if (this.id === "dropLinear") {

                        this.classList.remove("over");
                    }
                });

                area.addEventListener("drop", function(e) {

                    e.preventDefault();

                    this.classList.remove("over");

                    if (draggedItem) {

                        this.appendChild(draggedItem);

                        draggedItem = null;
                    }
                });
            });
        }

        function cekLatihan1A1() {
            const dropzone = document.getElementById("dropLinear");
            const fb = document.getElementById("feedbackLatihan1A1");
            const nextBtn = document.getElementById("nextBtn1");

            if (!dropzone || !fb || !nextBtn) return;

            const items = dropzone.querySelectorAll(".opsi-item");

            if (items.length === 0) {
                fb.innerHTML = "Belum ada jawaban yang diseret ke kotak.";
                fb.style.color = "red";
                nextBtn.disabled = true;
                return;
            }

            let semuaBenar = true;
            let jumlahBenar = 0;

            items.forEach((item) => {
                if (item.dataset.linear === "true") {
                    jumlahBenar++;
                } else {
                    semuaBenar = false;
                }
            });

            const totalLinear = document.querySelectorAll(
                '.opsi-item[data-linear="true"]',
            ).length;

            if (semuaBenar && jumlahBenar === totalLinear) {
                fb.innerHTML =
                    "Benar. Semua pilihanmu merupakan persamaan garis lurus.";
                fb.style.color = "green";
                nextBtn.disabled = false;
            } else {
                fb.innerHTML =
                    "Masih ada jawaban yang belum tepat. Persamaan garis lurus hanya memuat variabel berpangkat satu dan tidak mengandung akar, pangkat lebih dari satu, atau hasil kali variabel.";
                fb.style.color = "red";
                nextBtn.disabled = true;
            }
        }

        function resetLatihan1A1() {
            const opsiWrap = document.getElementById("opsiLinear");
            const dropzone = document.getElementById("dropLinear");
            const feedback = document.getElementById("feedbackLatihan1A1");
            const nextBtn = document.getElementById("nextBtn1");

            if (!opsiWrap || !dropzone || !feedback || !nextBtn) return;

            const items = Array.from(dropzone.querySelectorAll(".opsi-item"));
            items.forEach((item) => opsiWrap.appendChild(item));

            feedback.innerHTML = "";
            nextBtn.disabled = true;

            resetStepSetelah(2);
        }

        // =========================
        // LATIHAN 2
        // =========================

        function isPersamaanGarisLurus(expr) {
            const s = norm(expr);

            if (!s) return false;
            if (!s.includes("=")) return false;

            // Tidak boleh mengandung pangkat, akar, perkalian variabel, atau pembagian oleh variabel
            if (
                s.includes("^") ||
                s.includes("²") ||
                s.includes("sqrt") ||
                s.includes("√") ||
                s.includes("xy") ||
                s.includes("yx") ||
                s.includes("/x") ||
                s.includes("/y")
            ) {
                return false;
            }

            // Harus mengandung x atau y
            if (!s.includes("x") && !s.includes("y")) return false;

            return true;
        }

        function cekLatihan2A1() {
            let skor = 0;

            const a = document.getElementById("lat2a")?.value;
            const b = document.getElementById("lat2b")?.value;
            const c = document.getElementById("lat2c")?.value;

            const fba = document.getElementById("fb-lat2a");
            const fbb = document.getElementById("fb-lat2b");
            const fbc = document.getElementById("fb-lat2c");
            const fb = document.getElementById("feedbackLatihan2A1");
            const nextBtn = document.getElementById("nextBtn2");

            if (!fba || !fbb || !fbc || !fb || !nextBtn) return;

            if (isPersamaanGarisLurus(a)) {
                fba.innerHTML = "Benar. Ini dapat menjadi persamaan garis lurus.";
                fba.style.color = "green";
                skor++;
            } else {
                fba.innerHTML =
                    "Belum tepat. Coba buat persamaan yang hanya memuat x dan/atau y berpangkat satu.";
                fba.style.color = "red";
            }

            if (isPersamaanGarisLurus(b)) {
                fbb.innerHTML = "Benar. Ini dapat menjadi persamaan garis lurus.";
                fbb.style.color = "green";
                skor++;
            } else {
                fbb.innerHTML =
                    "Belum tepat. Hindari bentuk pangkat, akar, atau perkalian variabel seperti xy.";
                fbb.style.color = "red";
            }

            if (isPersamaanGarisLurus(c)) {
                fbc.innerHTML = "Benar. Ini dapat menjadi persamaan garis lurus.";
                fbc.style.color = "green";
                skor++;
            } else {
                fbc.innerHTML =
                    "Belum tepat. Contoh yang benar misalnya y = 2x + 3 atau 3x + y - 5 = 0.";
                fbc.style.color = "red";
            }

            if (skor === 3) {
                fb.innerHTML =
                    "Bagus. Ketiga contohmu merupakan persamaan garis lurus.";
                fb.style.color = "green";
                nextBtn.disabled = false;
            } else {
                fb.innerHTML = `Kamu membuat ${skor} dari 3 contoh dengan benar.`;
                fb.style.color = "black";
                nextBtn.disabled = true;
            }
        }

        function resetLatihan2A1() {
            ["lat2a", "lat2b", "lat2c"].forEach((id) => {
                const el = document.getElementById(id);
                if (el) el.value = "";
            });

            ["fb-lat2a", "fb-lat2b", "fb-lat2c", "feedbackLatihan2A1"].forEach((id) => {
                const el = document.getElementById(id);
                if (el) el.innerHTML = "";
            });

            const nextBtn = document.getElementById("nextBtn2");
            if (nextBtn) nextBtn.disabled = true;

            resetStepSetelah(3);
        }

        // =========================
        // LATIHAN 3
        // =========================

        function cekLatihan3A1() {
            let skor = 0;

            const a = norm(document.getElementById("lat3a")?.value);
            const b = norm(document.getElementById("lat3b")?.value);
            const c = norm(document.getElementById("lat3c")?.value);

            const fba = document.getElementById("fb-lat3a");
            const fbb = document.getElementById("fb-lat3b");
            const fbc = document.getElementById("fb-lat3c");
            const fb = document.getElementById("feedbackLatihan3A1");
            const nextBtn = document.getElementById("nextBtn3");

            if (!fba || !fbb || !fbc || !fb || !nextBtn) return;

            if (["2x-y-5", "-2x+y+5"].includes(a)) {
                fba.innerHTML = "Benar.";
                fba.style.color = "green";
                skor++;
            } else {
                fba.innerHTML = "Belum tepat.";
                fba.style.color = "red";
            }

            if (["3x+y-4", "-3x-y+4"].includes(b)) {
                fbb.innerHTML = "Benar.";
                fbb.style.color = "green";
                skor++;
            } else {
                fbb.innerHTML = "Belum tepat.";
                fbb.style.color = "red";
            }

            if (["x-2y+6", "-x+2y-6"].includes(c)) {
                fbc.innerHTML = "Benar.";
                fbc.style.color = "green";
                skor++;
            } else {
                fbc.innerHTML = "Belum tepat.";
                fbc.style.color = "red";
            }

            if (skor === 3) {
                fb.innerHTML = "Bagus. Semua jawabanmu benar.";
                fb.style.color = "green";
                nextBtn.disabled = false;
            } else {
                fb.innerHTML = `Kamu menjawab ${skor} dari 3 soal dengan benar.`;
                fb.style.color = "black";
                nextBtn.disabled = true;
            }
        }

        function resetLatihan3A1() {
            ["lat3a", "lat3b", "lat3c"].forEach((id) => {
                const el = document.getElementById(id);
                if (el) el.value = "";
            });

            ["fb-lat3a", "fb-lat3b", "fb-lat3c", "feedbackLatihan3A1"].forEach((id) => {
                const el = document.getElementById(id);
                if (el) el.innerHTML = "";
            });

            const nextBtn = document.getElementById("nextBtn3");
            if (nextBtn) nextBtn.disabled = true;

            resetStepSetelah(4);
        }

        // =========================
        // LATIHAN 4
        // =========================
        async function cekLatihan4A1() {
            console.log("LATIHAN 4 JALAN");

            let skor = 0;

            const a = norm(document.getElementById("lat4a")?.value);
            const b = norm(document.getElementById("lat4b")?.value);
            const c = norm(document.getElementById("lat4c")?.value);

            const fba = document.getElementById("fb-lat4a");
            const fbb = document.getElementById("fb-lat4b");
            const fbc = document.getElementById("fb-lat4c");
            const fb = document.getElementById("feedbackLatihan4A1");

            if (!fba || !fbb || !fbc || !fb) return;

            if (["-3x+7"].includes(a)) {
                fba.innerHTML = "Benar.";
                fba.style.color = "green";
                skor++;
            } else {
                fba.innerHTML = "Belum tepat.";
                fba.style.color = "red";
            }

            if (["1/2x+2", "0.5x+2"].includes(b)) {
                fbb.innerHTML = "Benar.";
                fbb.style.color = "green";
                skor++;
            } else {
                fbb.innerHTML = "Belum tepat.";
                fbb.style.color = "red";
            }

            if (["-5/2x+3", "-2.5x+3"].includes(c)) {
                fbc.innerHTML = "Benar.";
                fbc.style.color = "green";
                skor++;
            } else {
                fbc.innerHTML = "Belum tepat.";
                fbc.style.color = "red";
            }

            if (skor === 3) {
                const saved = await saveProgressMateri();

                if (saved) {
                    fb.innerHTML =
                        "Bagus. Semua jawabanmu benar. Silakan lanjut ke materi berikutnya.";
                    fb.style.color = "green";

                    bukaNextButton();
                } else {
                    fb.innerHTML = "Jawaban benar, tapi progres belum tersimpan.";
                    fb.style.color = "orange";
                }
            } else {
                fb.innerHTML = `Kamu menjawab ${skor} dari 3 soal dengan benar.`;
                fb.style.color = "black";
            }
        }

        function resetLatihan4A1() {
            ["lat4a", "lat4b", "lat4c"].forEach((id) => {
                const el = document.getElementById(id);
                if (el) el.value = "";
            });

            ["fb-lat4a", "fb-lat4b", "fb-lat4c", "feedbackLatihan4A1"].forEach((id) => {
                const el = document.getElementById(id);
                if (el) el.innerHTML = "";
            });
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
