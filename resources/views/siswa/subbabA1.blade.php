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
    </style>


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
    <h2 class="mt-2 mb-4" style="font-weight: 600;">1. Bentuk Umum Persamaan Garis Lurus</h2>

    <div class="position-relative p-4 mt-5" style="border:2px solid #4a76b8; border-radius:6px; background-color:white;">

        <div class="position-absolute px-3 py-2 text-white fw-bold"
            style="top:-18px; left:20px; background-color:#4a76b8; border-radius:8px;">
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
            Dari hasil eksplorasi, kita mengetahui bahwa dua titik yang berbeda dapat dihubungkan sehingga terbentuk sebuah
            garis lurus. Setiap titik pada garis tersebut memiliki koordinat <b>(x, y)</b>.
        </p>

        <p class="mb-0" style="text-align: justify;">
            Jika kita mengambil beberapa titik yang berada pada garis, ternyata titik-titik tersebut memiliki suatu pola
            atau hubungan tertentu antara nilai <b>x</b> dan <b>y</b>. Hubungan inilah yang dapat dituliskan dalam bentuk
            persamaan. Persamaan tersebut digunakan untuk menyatakan semua titik yang berada pada garis.
        </p>
    </div>

    <div class="box-info mt-3 mb-3">
        <p class="mb-2" style="text-align: justify;">
            Sekarang, mari kita lanjutkan pemahamanmu.
            Jika sebuah garis terdiri atas banyak titik, bagaimana cara menuliskan semua titik itu secara matematis?
        </p>
        <p class="mb-0" style="text-align: justify;">
            Untuk menjawab pertanyaan tersebut, kita menggunakan <b>persamaan garis lurus</b>.
            Melalui persamaan ini, kita dapat mengetahui hubungan antara nilai <b>x</b> dan <b>y</b> pada suatu garis.
        </p>
    </div>

    <p class="mt-3" style="text-align: justify;">
        Kamu telah melihat bahwa dua titik yang berbeda dapat menentukan sebuah garis lurus.
        Di dalam bidang koordinat Kartesius, setiap titik dinyatakan dalam pasangan $(x, y)$.
        Artinya, sebuah garis juga dapat dipelajari melalui titik-titik yang menyusunnya.
    </p>

    <p style="text-align: justify;">
        Sekarang, pertanyaannya adalah: bagaimana cara menyatakan sebuah garis dalam bentuk matematika?
        Untuk itu, digunakan suatu bentuk persamaan yang disebut <em>persamaan garis lurus</em>.
    </p>

    <p style="text-align: justify;">
        Persamaan garis lurus adalah persamaan matematika yang apabila digambar pada bidang koordinat Kartesius akan
        membentuk
        sebuah garis lurus.
        Dengan kata lain, semua titik $(x, y)$ yang memenuhi persamaan tersebut terletak pada garis,
        sedangkan titik yang tidak memenuhi persamaan berada di luar garis.
    </p>


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

                <div class="text-center mb-2">
                    <img src="{{ asset('img/eksplisit.png') }}" alt="" style="max-width: 500px">
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

                <div class="text-center mb-2">
                    <img src="{{ asset('img/implisit.png') }}" alt="">
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

                    <p>Pada bentuk $ax + by + c = 0$:</p>

                    <ul>
                        <li>$a$ adalah koefisien dari $x$</li>
                        <li>$b$ adalah koefisien dari $y$</li>
                        <li>$c$ adalah konstanta</li>
                    </ul>

                    <p class="mb-2" style="text-align: justify;">
                        Sekarang, coba perhatikan contoh berikut: $3x + 2y - 6 = 0$.
                        Tuliskan terlebih dahulu nilai $a$, $b$, dan $c$ pada kotak berikut.
                    </p>

                    <div class="abc-grid">
                        <div class="abc-row">
                            <label class="abc-label" for="inputA">$a =$</label>
                            <input type="text" id="inputA" class="abc-input" placeholder="Isi jawaban">
                        </div>

                        <div class="abc-row">
                            <label class="abc-label" for="inputB">$b =$</label>
                            <input type="text" id="inputB" class="abc-input" placeholder="Isi jawaban">
                        </div>

                        <div class="abc-row">
                            <label class="abc-label" for="inputC">$c =$</label>
                            <input type="text" id="inputC" class="abc-input" placeholder="Isi jawaban">
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary btn-sm mt-3" onclick="cekJawabanABC()">
                        Lihat Penyelesaian
                    </button>

                    <button type="button" class="btn btn-outline-secondary btn-sm mt-3" onclick="resetKotakABC()">
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
        <img src="{{ asset('img/p1.png') }}" alt="y = 3x - 2" class="zoomable img-fluid"
            style="max-width:300px; cursor:zoom-in;">
    </div>

    <p style="text-align: justify;">
        Dari grafik tersebut, terlihat bahwa titik-titik yang memenuhi persamaan $y = 3x - 2$ berada pada satu garis lurus.
        Jadi, kita dapat menyimpulkan bahwa $y = 3x - 2$ merupakan persamaan garis lurus.
    </p>

    {{-- Contoh mengubah eksplisit ke implisit --}}
    <div class="box-border-blue mb-4">
        <span class="badge-judul">Contoh</span>

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

    <div class="box-border-blue mb-4">
        <span class="badge-judul">Contoh</span>

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
                    </div>
                </div>

                <button class="btn-arrow" type="button" onclick="openStepS('s3', this)">
                    ↓ Tampilkan langkah berikutnya
                </button>
            </div>

            <!-- STEP 3 -->
            <div id="s3" class="step-item" style="display:none;">
                <div class="step-row">
                    <div class="step-eq">$y = \frac{-3x + 6}{2}$</div>
                    <div class="step-note">
                        Bagi kedua ruas dengan 2 agar $y$ sendirian.
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
                        Sederhanakan bentuk pecahan.
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

    {{-- ===== Contoh ===== --}}
    <div class="box-border-blue mb-4">
        <span class="badge-judul">Contoh</span>

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
                $x$ dan $y$ berpangkat satu, sehingga termasuk persamaan linear dua variabel.
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
            <b>4. $y + 3x = 12$</b><br>
            <button class="btn-palet btn-sm mt-2" onclick="toggleSolution('sol4', this)">
                Lihat Penyelesaian
            </button>

            <div id="sol4" class="mt-2" style="display:none;">
                $y + 3x = 12$ merupakan persamaan garis lurus karena variabel
                $x$ dan $y$ berpangkat satu.
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
                $\sqrt{4y}$ sehingga tidak dapat dinyatakan sebagai persamaan linear.
            </div>
        </div>

    </div>


    <div class="card card-materi mb-4">
        <div class="card-body">
            <span class="badge-contoh">Contoh</span>

            <p class="mt-2 mb-3">
                Tentukan apakah persamaan <b>$2y + 4^2 = x$</b> merupakan persamaan garis lurus!
            </p>

            <div class="step-stack">
                <div class="step-item">
                    <div class="step-row">
                        <div class="step-eq">$2y + 4^2 = x$</div>
                        <div class="step-note">
                            Mulai dari persamaan awal. Hitung dulu nilai <b>$4^2$</b>.
                        </div>
                    </div>

                    <button class="btn-arrow" type="button" onclick="openStep(2, this)">
                        ↓ Tampilkan langkah berikutnya
                    </button>
                </div>

                <div id="step2" class="step-item" style="display:none;">
                    <div class="step-row">
                        <div class="step-eq">$2y + 16 = x$</div>
                        <div class="step-note">
                            Karena <b>$4^2 = 16$</b>, persamaan menjadi <b>$2y + 16 = x$</b>.
                        </div>
                    </div>

                    <button class="btn-arrow" type="button" onclick="openStep(3, this)">
                        ↓ Tampilkan langkah berikutnya
                    </button>
                </div>

                <div id="step3" class="step-item" style="display:none;">
                    <div class="step-row">
                        <div class="step-eq">$2y = x - 16$</div>
                        <div class="step-note">
                            <b>Pindahkan 16</b> ke ruas kanan. Karena awalnya <b>+16</b>, saat pindah jadi <b>−16</b>.
                        </div>
                    </div>

                    <button class="btn-arrow" type="button" onclick="openStep(4, this)">
                        ↓ Tampilkan langkah berikutnya
                    </button>
                </div>

                <div id="step4" class="step-item" style="display:none;">
                    <div class="step-row">
                        <div class="step-eq">$y = \frac{x - 16}{2}$</div>
                        <div class="step-note">
                            Koefisien di depan $y$ adalah <b>2</b>. Agar $y$ sendiri, kedua ruas <b>dibagi 2</b>.
                        </div>
                    </div>

                    <button class="btn-arrow" type="button" onclick="openStep(5, this)">
                        ↓ Tampilkan langkah berikutnya
                    </button>
                </div>

                <div id="step5" class="step-item" style="display:none;">
                    <div class="step-row">
                        <div class="step-eq">$y = \frac{1}{2}x - 8$</div>
                        <div class="step-note">
                            Sederhanakan: $\frac{x}{2}=\frac{1}{2}x$ dan $\frac{-16}{2}=-8$.
                            Bentuk ini sudah sesuai $y=mx+c$.
                        </div>
                    </div>

                    <div class="final-box mt-3">
                        <b>Kesimpulan:</b> Persamaan dapat ditulis dalam bentuk <b>$y = mx + c$</b>,
                        sehingga merupakan persamaan garis lurus.
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- ===== Latihan Soal ===== --}}
    <div class="latihan-slider">
        <div class="latihan-track" id="latihanTrack">

            <!-- ===================== -->
            <!-- LATIHAN 1 -->
            <!-- ===================== -->
            <section class="latihan-slide">
                <div class="card card-materi mb-4">
                    <div class="card-body">
                        <span class="badge-latihan">Latihan 1</span>

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
                                <button class="btn btn-palet btn-sm" onclick="cekLatihan1A1()">Cek</button>
                                <button class="btn btn-outline-secondary btn-sm"
                                    onclick="resetLatihan1A1()">Reset</button>
                            </div>

                            <div id="feedbackLatihan1A1" class="mt-2"></div>
                        </div>

                        <div class="mt-3 text-end">
                            <button id="nextBtn1" class="btn btn-palet btn-sm" onclick="nextLatihan(1)" disabled>
                                Lanjut ke Latihan 2
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ===================== -->
            <!-- LATIHAN 2 -->
            <!-- ===================== -->
            <section class="latihan-slide">
                <div class="card card-materi mb-4">
                    <div class="card-body">
                        <span class="badge-latihan">Latihan 2</span>

                        <p>
                            <b>2.</b> Nyatakan persamaan garis berikut ke dalam bentuk <b>$Ax + By + C = 0$</b>.
                        </p>

                        <div class="mb-3">
                            <p><b>a.</b> $y = 2x - 5$</p>
                            <input type="text" id="lat2a"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:220px;">
                            <span>$= 0$</span>
                            <div id="fb-lat2a" class="mt-1"></div>
                        </div>

                        <div class="mb-3">
                            <p><b>b.</b> $y = -3x + 4$</p>
                            <input type="text" id="lat2b"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:220px;">
                            <span>$= 0$</span>
                            <div id="fb-lat2b" class="mt-1"></div>
                        </div>

                        <div class="mb-3">
                            <p><b>c.</b> $2y = x + 6$</p>
                            <input type="text" id="lat2c"
                                class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                style="width:220px;">
                            <span>$= 0$</span>
                            <div id="fb-lat2c" class="mt-1"></div>
                        </div>

                        <div class="mt-3">
                            <button class="btn btn-palet btn-sm" onclick="cekLatihan2A1()">Cek</button>
                        </div>

                        <div id="feedbackLatihan2A1" class="mt-2"></div>

                        <div class="mt-3 d-flex justify-content-between">
                            <button class="btn btn-outline-secondary btn-sm" onclick="prevLatihan(0)">
                                Kembali
                            </button>
                            <button id="nextBtn2" class="btn btn-palet btn-sm" onclick="nextLatihan(2)" disabled>
                                Lanjut ke Latihan 3
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ===================== -->
            <!-- LATIHAN 3 -->
            <!-- ===================== -->
            <section class="latihan-slide">
                <div class="card card-materi mb-4">
                    <div class="card-body">
                        <span class="badge-latihan">Latihan 3</span>

                        <p>
                            <b>3.</b> Nyatakan persamaan garis berikut ke dalam bentuk <b>$y = mx + c$</b>.
                        </p>

                        <div class="mb-3">
                            <p><b>a.</b> $3x + y - 7 = 0$</p>
                            <p>
                                <span>$y =$</span>
                                <input type="text" id="lat3a"
                                    class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                    style="width:220px;">
                            </p>
                            <div id="fb-lat3a" class="mt-1"></div>
                        </div>

                        <div class="mb-3">
                            <p><b>b.</b> $2x - 4y + 8 = 0$</p>
                            <p>
                                <span>$y =$</span>
                                <input type="text" id="lat3b"
                                    class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                    style="width:220px;">
                            </p>
                            <div id="fb-lat3b" class="mt-1"></div>
                        </div>

                        <div class="mb-3">
                            <p><b>c.</b> $5x + 2y - 6 = 0$</p>
                            <p>
                                <span>$y =$</span>
                                <input type="text" id="lat3c"
                                    class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                                    style="width:220px;">
                            </p>
                            <div id="fb-lat3c" class="mt-1"></div>
                        </div>

                        <div class="mt-3">
                            <button class="btn btn-palet btn-sm" onclick="cekLatihan3A1()">Cek</button>
                        </div>

                        <div id="feedbackLatihan3A1" class="mt-2"></div>

                        <div class="mt-3 d-flex justify-content-between">
                            <button class="btn btn-outline-secondary btn-sm" onclick="prevLatihan(1)">
                                Kembali
                            </button>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
    <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/contrib/auto-render.min.js"
        onload="renderMathInElement(document.body, {
                                                                                                                                                                                    delimiters: [
                                                                                                                                                                                        {left: '$$', right: '$$', display: true},
                                                                                                                                                                                        {left: '$', right: '$', display: false}
                                                                                                                                                                                    ]
                                                                                                                                                                                });"></script>

    {{-- p5 library --}}
    <script src="https://cdn.jsdelivr.net/npm/p5@1.9.0/lib/p5.min.js"></script>
    <script src="https://www.geogebra.org/apps/deployggb.js"></script>
    <script src="{{ asset('js/subbabA/subbabA1.js') }}"></script>
    <script src="https://unpkg.com/medium-zoom/dist/medium-zoom.min.js"></script>
    <script>
        mediumZoom('.zoomable', {
            margin: 40,
            background: '#000000cc'
        })
    </script>
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
