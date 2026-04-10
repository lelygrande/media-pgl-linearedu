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
        .eq-block {
            border: 3px solid #1f4ea3;
            border-radius: 8px;
            background: #fff;
            padding: 14px;
        }

        .eq-row {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 8px;
            margin-bottom: 6px;
        }

        .var {
            font-size: 24px;
            font-weight: 700;
        }

        .box-inp {
            width: 72px;
            height: 36px;
            border: 2px solid #111;
            border-radius: 12px;

            text-align: center;
            font-size: 16px;
            font-weight: 600;

            padding: 0;
            line-height: 36px;
            /* samakan dengan height */
        }

        .frac {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
        }

        .frac-line {
            width: 120px;
            height: 3px;
            background: #111;
            border-radius: 2px;
        }

        .sym {
            font-size: 24px;
            font-weight: 800;
        }

        .fb {
            font-size: 13px;
            margin-top: 4px;
            min-height: 18px;
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

    <div class="box-border-blue mb-4">
        <span class="badge-judul">Contoh</span>

        <p class="mt-2 mb-3">
            Perhatikan persamaan <b>$y = 2x + 1$</b>.
        </p>

        <p style="text-align: justify;">
            Untuk memahami persamaan tersebut, kita dapat menentukan beberapa pasangan nilai $(x,y)$.
            Caranya adalah dengan memilih nilai $x$, kemudian mensubstitusikannya ke dalam persamaan
            untuk mendapatkan nilai $y$.
        </p>

        <p style="text-align: justify;">
            Misalnya, kita ambil beberapa nilai $x$, yaitu $x = -1$, $x = 0$, dan $x = 1$.
        </p>

        <table class="table table-bordered text-center" style="max-width:400px;">
            <tr>
                <th>$x$</th>
                <th>$y = 2x + 1$</th>
            </tr>
            <tr>
                <td>-1</td>
                <td>$y = 2(-1) + 1 = -2 + 1 = -1$</td>
            </tr>
            <tr>
                <td>0</td>
                <td>$y = 2(0) + 1 = 1$</td>
            </tr>
            <tr>
                <td>1</td>
                <td>$y = 2(1) + 1 = 3$</td>
            </tr>
        </table>

        <p class="mt-3" style="text-align: justify;">
            Dari perhitungan tersebut diperoleh pasangan titik:
            $(-1,-1)$, $(0,1)$, dan $(1,3)$.
        </p>

        <div class="final-box mt-3">
            <b>Kesimpulan:</b> Setiap pasangan $(x,y)$ yang diperoleh memenuhi persamaan.
            Jika titik-titik tersebut digambar pada bidang koordinat, maka akan terletak pada satu garis lurus.
        </div>
    </div>

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

    <h5 class="mt-4"><strong>Bentuk Persamaan Garis Lurus</strong></h5>

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
            Jadi, kamu dapat segera melihat nilai gradien dan titik potong terhadap sumbu-$y$ dari persamaan tersebut.
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
            Oleh sebab itu, jika ingin mengetahui bentuk <b>$y = mx + c$</b>, kita perlu mengubahnya terlebih dahulu.
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

    {{-- contoh mengubah implisit ke eksplisit --}}
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

    <div class="box-border-blue mb-4">
        <span class="badge-judul">Contoh</span>

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
    {{-- ===== Latihan Soal ===== --}}
    <div class="box-border-blue mb-4">
        <span class="badge-latihan">Latihan Soal</span>
        <br><br>

        <p class="mb-2">
            <b>1.</b> Lengkapilah tabel berikut berdasarkan persamaan <b>$y = -x + 2$</b>.
        </p>

        <table class="table table-bordered text-center" style="max-width:500px;">
            <tr>
                <th>$x$</th>
                <th>$y = -x + 2$</th>
                <th>$(x,y)$</th>
            </tr>
            <tr>
                <td>-2</td>
                <td><input type="number" id="t1-y" class="box-inp"></td>
                <td id="pair-t1">$(-2,\ \dots)$</td>
            </tr>
            <tr>
                <td>0</td>
                <td><input type="number" id="t2-y" class="box-inp"></td>
                <td id="pair-t2">$(0,\ \dots)$</td>
            </tr>
            <tr>
                <td>2</td>
                <td><input type="number" id="t3-y" class="box-inp"></td>
                <td id="pair-t3">$(2,\ \dots)$</td>
            </tr>
        </table>

        <button class="btn-palet btn mt-2" onclick="cekPasanganBerurutan()">
            Periksa Jawaban
        </button>

        <div id="fb-pasangan" class="mt-3 mb-3 fw-semibold"></div>

        <p class="mb-2">
            <b>2.</b> Seret persamaan yang merupakan persamaan garis lurus ke dalam kotak di kanan.
            Klik tombol <b>Periksa Jawaban</b> untuk mengecek.
        </p>

        <div class="p5-wrapper">

            <div id="p5-linear-drop"></div>

            <div class="mt-3" style="margin-left:600px;">
                <div id="p5-linear-actions"></div>
                <div id="p5-linear-feedback" class="fw-semibold mt-2"></div>
            </div>
        </div>

        <p class="mt-3 mb-2">
            <b>3.</b> Nyatakan persamaan garis berikut ini ke dalam bentuk <b>y = mx + c</b>!
        </p>

        <div class="eq-block">

            <!-- A -->
            <div class="mb-3">
                <p class="mb-1"><b>a.</b> $4x + y = 12$</p>

                <div class="eq-row">
                    <span class="var">$y$</span>
                    <span class="sym">$=$</span>

                    <input id="a-m" class="box-inp" placeholder="..." inputmode="decimal">

                    <span class="var">$x$</span>
                    <span class="var">$+$</span>

                    <input id="a-c" class="box-inp" placeholder="..." inputmode="decimal">
                </div>

                <div id="fb-a" class="fb"></div>
            </div>

            <!-- B -->
            <div class="mb-3">
                <p class="mb-1"><b>b.</b> $12x + 3y = 5$</p>

                <div class="eq-row">
                    <span class="var">$y$</span>
                    <span class="sym">$=$</span>
                    <input id="b-m" class="box-inp" placeholder="..." inputmode="decimal">
                    <span class="var">$x$</span>
                    <span class="var">$+$</span>
                    <div class="frac">
                        <input id="b-c-top" class="box-inp" placeholder="..." inputmode="numeric">
                        <div class="frac-line"></div>
                        <input id="b-c-bot" class="box-inp" placeholder="..." inputmode="numeric">
                    </div>
                </div>

                <div id="fb-b" class="fb"></div>
            </div>

            <!-- C -->
            <div class="mb-3">
                <p class="mb-1"><b>c.</b> $7x − 3y − 21 = 0$</p>

                <div class="eq-row">
                    <span class="var">$y$</span>
                    <span class="sym">$=$</span>

                    <div class="frac">
                        <input id="c-m-top" class="box-inp" placeholder="..." inputmode="numeric">
                        <div class="frac-line"></div>
                        <input id="c-m-bot" class="box-inp" placeholder="..." inputmode="numeric">
                    </div>

                    <span class="var">$x$</span>
                    <span class="var">$-$</span>
                    <input id="c-c" class="box-inp" placeholder="..." inputmode="decimal">
                </div>

                <div id="fb-c" class="fb"></div>
            </div>

            <button id="btn-cek-no2" type="button" class="btn-palet btn">
                Periksa Jawaban
            </button>

            <div id="fb-total" class="mt-3 fw-semibold"></div>
        </div>
    </div>

    <div class="box-info mt-4">
        <p class="mb-2" style="text-align: justify;">
            Sampai di sini, kamu telah mempelajari pengertian dasar persamaan garis lurus, bentuk-bentuknya,
            serta cara mengubah persamaan ke bentuk <b>$y = mx + c$</b>.
        </p>
        <p class="mb-0" style="text-align: justify;">
            Pastikan kamu sudah memahami bahwa persamaan garis lurus selalu melibatkan variabel berpangkat satu.
            Setelah ini, kamu akan melanjutkan ke pembahasan berikutnya yang masih berkaitan dengan garis lurus.
        </p>
    </div>
    <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/contrib/auto-render.min.js" onload="renderMathInElement(document.body, {
                                                                                                            delimiters: [
                                                                                                                {left: '$$', right: '$$', display: true},
                                                                                                                {left: '$', right: '$', display: false}
                                                                                                            ]
                                                                                                        });"></script>

    {{-- p5 library --}}
    <script src="https://cdn.jsdelivr.net/npm/p5@1.9.0/lib/p5.min.js"></script>

    <script src="{{ asset('js/subbabA/drag-and-drop-latihan-1.js') }}"></script>

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
    <a href="{{ route('apersepsi1') }}" class="btn btn-prev px-4 rounded-pill fw-semibold">
        ← Prev
    </a>
    <a href="{{ route('subbabA2.1') }}" class="btn btn-next px-4 rounded-pill fw-semibold">
        Next →
    </a>
@endsection
