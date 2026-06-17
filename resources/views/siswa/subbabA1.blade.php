@extends('layout.halaman-materi')

@section('content')
    <style>
        /* ===== Umum ===== */
        img {
            max-width: 100%;
            height: auto;
        }

        .card,
        .card-materi,
        .card-tujuan,
        .box-info,
        .box-contoh,
        .box-latihan,
        .latihan-dnd-wrap,
        .step-stack {
            max-width: 100%;
            box-sizing: border-box;
        }

        /* ===== Tujuan Pembelajaran ===== */
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

        /* ===== Card Materi ===== */
        .card-materi {
            border-radius: 16px;
            border: 2px solid #2E75B6;
            background: #fff;
        }

        .box-info {
            background: #f7fbff;
            border: 1px solid rgba(0, 0, 0, .06);
            border-radius: 12px;
            padding: 14px 16px;
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

        /* ===== Button ===== */
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

        /* ===== Aktivitas Menentukan A, B, dan C ===== */
        .aktivitas-abc {
            background: #f8fbff;
            border: 1px solid rgba(74, 118, 184, .25);
            border-radius: 16px;
            padding: 18px 20px;
        }

        .aktivitas-abc-header {
            margin-bottom: 12px;
        }

        .aktivitas-title {
            font-weight: 700;
            margin: 0;
            color: #22324a;
        }

        .petunjuk-abc {
            background: #ffffff;
            border-left: 5px solid #2E75B6;
            border-radius: 12px;
            padding: 12px 14px;
            line-height: 1.7;
            margin: 14px 0;
        }

        .persamaan-abc-box {
            background: #ffffff;
            border: 1px solid rgba(74, 118, 184, .22);
            border-radius: 14px;
            padding: 14px;
            text-align: center;
            margin-bottom: 16px;
        }

        .persamaan-abc {
            display: inline-block;
            background: #fff3cd;
            border: 1px solid #ffe69c;
            border-radius: 12px;
            padding: 10px 28px;
            font-size: 1.25rem;
            font-weight: 700;
        }

        .abc-input-card {
            background: #ffffff;
            border: 1px solid rgba(74, 118, 184, .22);
            border-radius: 14px;
            padding: 14px 18px;
            max-width: 200px;
        }

        .abc-row {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
        }

        .abc-row:last-child {
            margin-bottom: 0;
        }

        .abc-label {
            min-width: 42px;
            font-weight: 700;
            font-size: 1rem;
        }

        .abc-input {
            width: 90px;
            height: 38px;
            border: 1px solid #cfe0f4;
            border-radius: 8px;
            padding: 6px 10px;
            outline: none;
            text-align: center;
            font-size: 0.95rem;
        }

        .abc-input::placeholder {
            font-size: 0.85rem;
            font-style: normal;
        }

        .abc-input:focus {
            border-color: #2E75B6;
            box-shadow: 0 0 0 3px rgba(46, 117, 182, .12);
        }

        /* Contoh Penyelesaian */
        .penyelesaian-sejajar {
            margin-top: 20px;
            padding: 4px 0 8px;
        }

        .baris-penyelesaian {
            display: grid;
            grid-template-columns: 255px 1fr;
            column-gap: 18px;
            align-items: center;
            margin-bottom: 20px;
        }

        .rumus-kiri {
            font-size: 18px;
            font-weight: 700;
            text-align: left;
            padding-left: 35px;
            line-height: 1.5;
        }

        .rumus-dua-baris {
            line-height: 1.9;
        }

        /* kecilkan KaTeX khusus di rumus kiri */
        .rumus-kiri .katex {
            font-size: 1.05em !important;
        }

        .catatan-kanan {
            font-size: 15px;
            line-height: 1.7;
            color: #555b6e;
            text-align: justify;
            max-width: 620px;
        }

        /* kecilkan KaTeX di penjelasan */
        .catatan-kanan .katex {
            font-size: 1em !important;
        }

        .btn-step-text {
            margin-top: 6px;
            border: none;
            background: transparent;
            color: #6f4ed8;
            font-weight: 700;
            padding: 0;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-step-text:hover {
            text-decoration: underline;
        }

        .kesimpulan-sejajar {
            margin-top: 8px;
            padding: 10px 12px;
            border-left: 4px solid #7b56d9;
            background: #f7f3ff;
            border-radius: 8px;
            color: #333;
        }

        /* jaga-jaga kalau script lama sempat kasih display:block */
        .baris-penyelesaian[style*="display: block"] {
            display: grid !important;
        }

        @media (max-width: 768px) {
            .baris-penyelesaian {
                grid-template-columns: 1fr;
                row-gap: 6px;
                margin-bottom: 18px;
            }

            .rumus-kiri {
                padding-left: 0;
                font-size: 17px;
            }

            .catatan-kanan {
                font-size: 14px;
                max-width: 100%;
            }
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

        /* ===== Latihan Drag and Drop ===== */
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

        /* ===== Responsive Tablet / HP ===== */
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
            .latihan-dnd-wrap,
            .step-stack,
            .step-item {
                padding: 12px;
            }

            .rumus-box {
                font-size: 18px;
                padding: 8px 16px;
                max-width: 100%;
                overflow-x: auto;
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

            .latihan-step .text-end {
                text-align: center !important;
            }

            .btn-palet,
            .btn-arrow {
                width: 100%;
                margin-top: 6px;
            }

            .box-latihan .btn-sm,
            .box-contoh .btn-sm,
            .aktivitas-abc .btn-sm {
                width: 100%;
            }
        }

        /* ===== Responsive HP Kecil ===== */
        @media (max-width: 480px) {
            h1 {
                font-size: 21px;
            }

            h2 {
                font-size: 18px;
            }

            p,
            li,
            .badge-sub,
            .title-box {
                font-size: 14px;
                padding: 6px 10px;
            }
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
            </ol>
        </div>
    </div>

    {{-- Subjudul --}}
    <h2 class="mt-2 mb-4" style="font-weight: 600;">1. Pengertian dan Bentuk Umum Persamaan Garis Lurus</h2>

    <div class="box-info mt-3 mb-3">
        <p style="text-align: justify;">
            Setelah kamu mempelajari kegiatan sebelumnya, kamu telah mengetahui bahwa
            beberapa titik pada bidang koordinat Kartesius dapat membentuk garis lurus.
            Garis lurus tersebut dapat dinyatakan dalam bentuk persamaan.
        </p>

        <p style="text-align: justify;">
            <strong>Persamaan garis lurus</strong> adalah persamaan yang apabila
            digambarkan pada bidang koordinat Kartesius akan membentuk sebuah garis lurus.
        </p>

        <div class="box-info mt-3 mb-0">
            <p class="mb-2"><strong>Ciri-ciri persamaan garis lurus:</strong></p>
            <ol class="mb-0">
                <li>Grafiknya berbentuk garis lurus pada bidang koordinat Kartesius.</li>
                <li>Memuat variabel $x$ dan/atau $y$.</li>
                <li>Pangkat tertinggi variabelnya adalah satu.</li>
                <li>Tidak memuat bentuk seperti $x^2$, $y^2$, $xy$, atau variabel di dalam akar.</li>
            </ol>
        </div>
    </div>

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

    <div class="card card-materi mt-4 mb-4">
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

                <div class="box-info mt-3 mb-3">
                    <p class="mb-2"><strong>Memahami Bentuk Umum</strong></p>

                    <p style="text-align: justify;">
                        Bentuk implisit persamaan garis lurus dapat dituliskan dalam bentuk umum
                        sebagai berikut.
                    </p>

                    <div class="text-center my-3">
                        <div class="rumus-box">
                            $Ax + By + C = 0$
                        </div>
                    </div>

                    <p style="text-align: justify;">
                        Pada bentuk umum tersebut, $A$, $B$, dan $C$ merupakan bilangan real.
                        Nilai $A$ dan $B$ tidak boleh keduanya nol, karena jika keduanya nol,
                        persamaan tersebut tidak membentuk garis lurus.
                    </p>

                    <div class="keterangan-abc">
                        <p class="mb-2"><strong>Keterangan:</strong></p>
                        <ul class="mb-0">
                            <li>$A$ adalah koefisien dari variabel $x$.</li>
                            <li>$B$ adalah koefisien dari variabel $y$.</li>
                            <li>$C$ adalah konstanta.</li>
                        </ul>
                    </div>
                </div>

                {{-- Aktivitas Menentukan A, B, dan C --}}
                <div class="aktivitas-abc mt-4">
                    <div class="aktivitas-abc-header">
                        <h5 class="aktivitas-title">Menentukan Nilai $A$, $B$, dan $C$</h5>
                    </div>

                    <p style="text-align: justify;">
                        Setelah memahami bentuk umum persamaan garis lurus, sekarang coba tentukan
                        nilai $A$, $B$, dan $C$ dari sebuah persamaan.
                    </p>

                    <div class="petunjuk-abc">
                        <strong>Petunjuk:</strong><br>
                        Perhatikan bentuk umum $Ax + By + C = 0$. Nilai $A$ adalah koefisien
                        dari $x$, nilai $B$ adalah koefisien dari $y$, dan nilai $C$ adalah konstanta.
                    </div>

                    <div class="persamaan-abc-box">
                        <p class="mb-2">Tentukan nilai $A$, $B$, dan $C$ dari persamaan berikut.</p>

                        <div class="persamaan-abc">
                            $3x + 2y - 6 = 0$
                        </div>
                    </div>

                    <div class="abc-input-card">
                        <div class="abc-row">
                            <label class="abc-label" for="inputA">$A =$</label>
                            <input type="text" id="inputA" class="abc-input" placeholder="Isi nilai A">
                        </div>

                        <div class="abc-row">
                            <label class="abc-label" for="inputB">$B =$</label>
                            <input type="text" id="inputB" class="abc-input" placeholder="Isi nilai B">
                        </div>

                        <div class="abc-row">
                            <label class="abc-label" for="inputC">$C =$</label>
                            <input type="text" id="inputC" class="abc-input" placeholder="Isi nilai C">
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="button" class="btn btn-palet btn-sm" onclick="cekJawabanABC()">
                            Cek Jawaban
                        </button>

                        <button type="button" class="btn btn-palet btn-sm" onclick="resetKotakABC()">
                            Reset
                        </button>
                    </div>

                    <div id="hasilABC" class="mt-3" style="display: none;"></div>
                </div>
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

        <div class="penyelesaian-sejajar">

            <!-- STEP 1 -->
            <div class="baris-penyelesaian">
                <div class="rumus-kiri">
                    $y = -2x + 3$
                </div>

                <div class="catatan-kanan">
                    Persamaan tersebut masih berbentuk <b>eksplisit</b> karena $y$ sudah berdiri sendiri.
                    Agar menjadi bentuk implisit, semua suku harus dipindahkan ke satu ruas sehingga ruas lainnya bernilai
                    nol.

                    <br>
                    <button class="btn-step-text" type="button" onclick="openStepUmum('umum2', this)">
                        Tampilkan langkah berikutnya ↓
                    </button>
                </div>
            </div>

            <!-- STEP 2 -->
            <div id="umum2" class="baris-penyelesaian" style="display:none;">
                <div class="rumus-kiri">
                    $2x + y = 3$
                </div>

                <div class="catatan-kanan">
                    Pindahkan $-2x$ ke ruas kiri. Saat dipindahkan ruas, tandanya berubah menjadi $+2x$.

                    <br>
                    <button class="btn-step-text" type="button" onclick="openStepUmum('umum3', this)">
                        Tampilkan langkah berikutnya ↓
                    </button>
                </div>
            </div>

            <!-- STEP 3 -->
            <div id="umum3" class="baris-penyelesaian" style="display:none;">
                <div class="rumus-kiri">
                    $2x + y - 3 = 0$
                </div>

                <div class="catatan-kanan">
                    Selanjutnya, pindahkan $3$ ke ruas kiri. Karena awalnya $+3$ di ruas kanan,
                    maka saat dipindahkan menjadi $-3$.

                    <br>
                    <button class="btn-step-text" type="button" onclick="openStepUmum('umum4', this)">
                        Tampilkan kesimpulan ↓
                    </button>
                </div>
            </div>

            <!-- STEP 4 -->
            <div id="umum4" class="baris-penyelesaian" style="display:none;">
                <div class="rumus-kiri hasil-akhir">
                    $2x + y - 3 = 0$
                </div>

                <div class="catatan-kanan">
                    Sekarang persamaan sudah berbentuk umum $Ax + By + C = 0$,
                    dengan $A = 2$, $B = 1$, dan $C = -3$.

                    <div class="kesimpulan-sejajar">
                        <b>Kesimpulan:</b> Bentuk umum dari persamaan $y = -2x + 3$ adalah
                        <b>$2x + y - 3 = 0$</b>.
                    </div>
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

        <div class="penyelesaian-sejajar">

            <!-- STEP 1 -->
            <div class="baris-penyelesaian">
                <div class="rumus-kiri">
                    $3x + 2y - 6 = 0$
                </div>

                <div class="catatan-kanan">
                    Mulai dari persamaan dalam bentuk implisit.
                    Target kita adalah membuat $y$ berdiri sendiri.

                    <br>
                    <button class="btn-step-text" type="button" onclick="openStepS('eksplisit2', this)">
                        Tampilkan langkah berikutnya ↓
                    </button>
                </div>
            </div>

            <!-- STEP 2 -->
            <div id="eksplisit2" class="baris-penyelesaian" style="display:none;">
                <div class="rumus-kiri">
                    $2y = -3x + 6$
                </div>

                <div class="catatan-kanan">
                    Pindahkan $3x$ dan $-6$ ke ruas kanan.
                    Jika suatu suku berpindah ruas, maka tandanya berubah.
                    Jadi, $3x$ menjadi $-3x$ dan $-6$ menjadi $+6$.

                    <br>
                    <button class="btn-step-text" type="button" onclick="openStepS('eksplisit3', this)">
                        Tampilkan langkah berikutnya ↓
                    </button>
                </div>
            </div>

            <!-- STEP 3 -->
            <div id="eksplisit3" class="baris-penyelesaian" style="display:none;">
                <div class="rumus-kiri rumus-dua-baris">
                    $\frac{2y}{2} = \frac{-3x + 6}{2}$ <br>
                    $y = \frac{-3x + 6}{2}$
                </div>

                <div class="catatan-kanan">
                    Bagi kedua ruas dengan $2$ agar $y$ berdiri sendiri.

                    <br>
                    <button class="btn-step-text" type="button" onclick="openStepS('eksplisit4', this)">
                        Tampilkan langkah berikutnya ↓
                    </button>
                </div>
            </div>

            <!-- STEP 4 -->
            <div id="eksplisit4" class="baris-penyelesaian" style="display:none;">
                <div class="rumus-kiri">
                    $y = -\frac{3}{2}x + 3$
                </div>

                <div class="catatan-kanan">
                    Sederhanakan bentuk pecahannya.
                    Sekarang persamaan sudah berbentuk eksplisit $y = mx + c$.

                    <div class="kesimpulan-sejajar">
                        <b>Kesimpulan:</b> Bentuk eksplisit dari persamaan
                        $3x + 2y - 6 = 0$ adalah
                        <b>$y = -\frac{3}{2}x + 3$</b>.
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        const MATERI_ID = @json($materi->id);
        const MATERI_SLUG = @json($materi->slug);
        const IS_MATERI_COMPLETED = @json((bool) ($materialProgress->is_completed ?? false));
        const SAVED_LATIHAN = @json($latihanProgress ?? []);
    </script>

    {{-- ===== Latihan Soal ===== --}}
    <div class="box-latihan mt-5">
        <div class="card-body">
            <span class="title-box">Latihan Soal</span>

            <!-- ===================== -->
            <!-- LATIHAN 1 -->
            <!-- ===================== -->
            <div class="latihan-step" id="latihanStep1">
                <p>
                    <b>1.</b> Tentukan persamaan berikut yang merupakan <b>persamaan garis lurus</b>.
                </p>

                <div class="petunjuk-mini-latihan">
                    <strong>Petunjuk:</strong>
                    Seret semua persamaan yang merupakan persamaan garis lurus ke dalam kotak jawaban.
                </div>

                <div class="latihan-dnd-wrap mb-3">
                    <div class="opsi-wrap" id="opsiLinear">
                        <div class="opsi-item" draggable="true" data-id="l1_x_3y_9" data-linear="true">$x + 3y = 9$
                        </div>
                        <div class="opsi-item" draggable="true" data-id="l1_x2_y_4" data-linear="false">$x^2 + y = 4$
                        </div>
                        <div class="opsi-item" draggable="true" data-id="l1_2x_y_5" data-linear="true">$2x - y + 5 = 0$
                        </div>
                        <div class="opsi-item" draggable="true" data-id="l1_akar_y_x_2" data-linear="false">$\sqrt{y} +
                            x = 2$</div>
                        <div class="opsi-item" draggable="true" data-id="l1_y_min3x_1" data-linear="true">$y = -3x + 1$
                        </div>
                        <div class="opsi-item" draggable="true" data-id="l1_xy_6" data-linear="false">$xy = 6$</div>
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
                    <b>2.</b> Tuliskan persamaan garis lurus berdasarkan nilai koefisien yang diberikan.
                </p>

                <div class="petunjuk-mini-latihan mb-3">
                    <strong>Petunjuk:</strong>
                    Substitusikan nilai koefisien yang diberikan ke bentuk persamaan yang sesuai.
                </div>

                <div class="mb-3">
                    <p>
                        <b>a.</b> Diketahui $m = 4$ dan $c = 6$.
                        Tuliskan persamaan garis lurus dalam bentuk $y = mx + c$.
                    </p>

                    <input type="text" id="lat2a"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:180px;" placeholder="Jawaban kamu">

                    <div id="fb-lat2a" class="mt-1"></div>
                </div>

                <div class="mb-3">
                    <p>
                        <b>b.</b> Diketahui $A = 2$, $B = 5$, dan $C = -2$.
                        Tuliskan persamaan garis lurus dalam bentuk $Ax + By + C = 0$.
                    </p>

                    <input type="text" id="lat2b"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:180px;" placeholder="Jawaban kamu">

                    <div id="fb-lat2b" class="mt-1"></div>
                </div>

                <div class="mb-3">
                    <p>
                        <b>c.</b> Diketahui $m = -3$ dan $c = 1$.
                        Tuliskan persamaan garis lurus dalam bentuk $y = mx + c$.
                    </p>

                    <input type="text" id="lat2c"
                        class="form-control form-control-sm d-inline-block text-center jawaban-latihan"
                        style="width:180px;" placeholder="Jawaban kamu">

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

    <script>
        // Memahami bentuk implisit
        function cekJawabanABC() {
            const inputA = document.getElementById("inputA");
            const inputB = document.getElementById("inputB");
            const inputC = document.getElementById("inputC");
            const hasil = document.getElementById("hasilABC");

            if (!inputA || !inputB || !inputC || !hasil) return;

            const jawabanA = inputA.value.trim().replace(/\s+/g, "").replace(/−/g, "-");
            const jawabanB = inputB.value.trim().replace(/\s+/g, "").replace(/−/g, "-");
            const jawabanC = inputC.value.trim().replace(/\s+/g, "").replace(/−/g, "-");

            const benarA = jawabanA === "3" || jawabanA === "+3";
            const benarB = jawabanB === "2" || jawabanB === "+2";
            const benarC = jawabanC === "-6";

            let jumlahBenar = 0;

            if (benarA) jumlahBenar++;
            if (benarB) jumlahBenar++;
            if (benarC) jumlahBenar++;

            hasil.style.display = "block";

            if (jawabanA === "" || jawabanB === "" || jawabanC === "") {
                hasil.innerHTML = `
            <div class="alert alert-warning mb-0">
                Masih ada jawaban yang belum diisi. Lengkapi nilai $A$, $B$, dan $C$ terlebih dahulu.
            </div>
        `;

                renderMathSafe(hasil);
                return;
            }

            if (jumlahBenar < 3) {
                hasil.innerHTML = `
            <div class="alert alert-danger mb-0">
                Masih ada jawaban yang belum tepat. Kamu menjawab <strong>${jumlahBenar}</strong> dari <strong>3</strong> bagian dengan benar.
                Perhatikan kembali koefisien $x$, koefisien $y$, dan konstantanya.
            </div>
        `;

                renderMathSafe(hasil);
                return;
            }

            hasil.innerHTML = `
        <div class="alert alert-success mb-0">
            <strong>Bagus, jawaban kamu benar.</strong><br>
            Pada persamaan $3x + 2y - 6 = 0$, diperoleh:
            <ul class="mb-0 mt-2">
                <li>$A = 3$</li>
                <li>$B = 2$</li>
                <li>$C = -6$</li>
            </ul>
        </div>
    `;

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

            el.style.display = "grid";
            btn.style.display = "none";

            renderMathSafe(el);
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

        async function cekLatihan1A1() {
            const dropLinear = document.getElementById("dropLinear");
            const feedback = document.getElementById("feedbackLatihan1A1");
            const nextBtn = document.getElementById("nextBtn1");

            if (!dropLinear || !feedback || !nextBtn) return;

            const selectedItems = [...dropLinear.querySelectorAll(".opsi-item")];
            const selectedIds = selectedItems.map(item => item.dataset.id);

            const benar =
                selectedItems.length === 3 &&
                selectedItems.every(item => item.dataset.linear === "true");

            if (benar) {
                feedback.innerHTML = `
            <div class="alert alert-success mb-0">
                <strong>Benar.</strong> Semua persamaan yang kamu pilih merupakan persamaan garis lurus.
                <br><br>
                <strong>Penyelesaian:</strong><br>
                Persamaan garis lurus adalah persamaan yang variabelnya memiliki pangkat tertinggi $1$
                dan tidak memuat bentuk akar, kuadrat, atau perkalian antarvariabel.
                <br><br>
                Persamaan yang termasuk persamaan garis lurus adalah:
                <ul class="mb-0 mt-2">
                    <li>$x + 3y = 9$</li>
                    <li>$2x - y + 5 = 0$</li>
                    <li>$y = -3x + 1$</li>
                </ul>
            </div>
        `;

                nextBtn.disabled = false;
                renderMathSafe(feedback);

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L1`,
                    "drag_drop", {
                        selectedIds: selectedIds
                    },
                    true
                );
            } else {
                feedback.innerHTML = `
            <div class="alert alert-danger mb-0">
                <strong>Belum tepat.</strong><br>
                Pilih hanya persamaan yang memuat variabel berpangkat satu.
                Persamaan yang memuat $x^2$, bentuk akar seperti $\\sqrt{y}$,
                atau perkalian variabel seperti $xy$ bukan persamaan garis lurus.
            </div>
        `;

                nextBtn.disabled = true;
                renderMathSafe(feedback);
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

        function normLatihan2(teks) {
            return (teks || "")
                .toString()
                .trim()
                .toLowerCase()
                .replace(/\s+/g, "")
                .replace(/\*/g, "")
                .replace(/[()]/g, "");
        }

        // =========================
        // LATIHAN 2
        // =========================
        async function cekLatihan2A1() {
            let skor = 0;

            const a = document.getElementById("lat2a")?.value.trim();
            const b = document.getElementById("lat2b")?.value.trim();
            const c = document.getElementById("lat2c")?.value.trim();

            const fba = document.getElementById("fb-lat2a");
            const fbb = document.getElementById("fb-lat2b");
            const fbc = document.getElementById("fb-lat2c");
            const fb = document.getElementById("feedbackLatihan2A1");
            const nextBtn = document.getElementById("nextBtn2");

            if (!fba || !fbb || !fbc || !fb || !nextBtn) return;

            const jawabanA = ["y=4x+6"];
            const jawabanB = [
                "2x+5y-2=0",
                "2x+5y+-2=0"
            ];
            const jawabanC = [
                "y=-3x+1",
                "y=1-3x"
            ];

            if (jawabanA.map(normLatihan2).includes(normLatihan2(a))) {
                fba.innerHTML = "Benar.";
                fba.style.color = "green";
                skor++;
            } else {
                fba.innerHTML = "Belum tepat. Substitusikan $m = 4$ dan $c = 6$ ke bentuk $y = mx + c$.";
                fba.style.color = "red";
            }

            if (jawabanB.map(normLatihan2).includes(normLatihan2(b))) {
                fbb.innerHTML = "Benar.";
                fbb.style.color = "green";
                skor++;
            } else {
                fbb.innerHTML =
                    "Belum tepat. Substitusikan $A = 2$, $B = 5$, dan $C = -2$ ke bentuk $Ax + By + C = 0$.";
                fbb.style.color = "red";
            }

            if (jawabanC.map(normLatihan2).includes(normLatihan2(c))) {
                fbc.innerHTML = "Benar.";
                fbc.style.color = "green";
                skor++;
            } else {
                fbc.innerHTML = "Belum tepat. Substitusikan $m = -3$ dan $c = 1$ ke bentuk $y = mx + c$.";
                fbc.style.color = "red";
            }

            [fba, fbb, fbc].forEach(renderMathSafe);

            if (skor === 3) {
                fb.innerHTML = `
            <div class="alert alert-success mb-0">
                <strong>Benar.</strong> Kamu sudah dapat menyusun persamaan garis lurus berdasarkan nilai koefisien yang diberikan.
                <br><br>
                <strong>Penyelesaian:</strong>
                <ul class="mb-0 mt-2">
                    <li>Jika $m = 4$ dan $c = 6$, maka $y = mx + c$ menjadi $y = 4x + 6$.</li>
                    <li>Jika $A = 2$, $B = 5$, dan $C = -2$, maka $Ax + By + C = 0$ menjadi $2x + 5y - 2 = 0$.</li>
                    <li>Jika $m = -3$ dan $c = 1$, maka $y = mx + c$ menjadi $y = -3x + 1$.</li>
                </ul>
            </div>
        `;

                nextBtn.disabled = false;
                renderMathSafe(fb);

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L2`,
                    "input", {
                        lat2a: a,
                        lat2b: b,
                        lat2c: c,
                    },
                    true
                );
            } else {
                fb.innerHTML = `
            <div class="alert alert-warning mb-0">
                Kamu menjawab <strong>${skor}</strong> dari <strong>3</strong> soal dengan benar.
                Periksa kembali bagian yang masih belum tepat.
            </div>
        `;
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

        // =========================
        // LATIHAN 3
        // =========================
        async function cekLatihan3A1() {
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
                fb.innerHTML = `
                    <div class="alert alert-success mb-0">
                        <strong>Benar.</strong> Kamu sudah dapat mengubah bentuk eksplisit ke bentuk implisit.
                        <br><br>
                        <strong>Penyelesaian:</strong>
                        <ul class="mb-0 mt-2">
                            <li>
                                $y = 2x - 5$ dapat ditulis menjadi $2x - y - 5 = 0$
                                atau $-2x + y + 5 = 0$.
                            </li>
                            <li>
                                $y = -3x + 4$ dapat ditulis menjadi $3x + y - 4 = 0$
                                atau $-3x - y + 4 = 0$.
                            </li>
                            <li>
                                $2y = x + 6$ dapat ditulis menjadi $x - 2y + 6 = 0$
                                atau $-x + 2y - 6 = 0$.
                            </li>
                        </ul>
                        Bentuk-bentuk tersebut tetap benar karena persamaan yang dikalikan $-1$
                        masih memiliki makna yang sama.
                    </div>
                `;

                nextBtn.disabled = false;
                renderMathSafe(fb);

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L3`,
                    "input", {
                        lat3a: document.getElementById("lat3a").value.trim(),
                        lat3b: document.getElementById("lat3b").value.trim(),
                        lat3c: document.getElementById("lat3c").value.trim(),
                    },
                    true
                );
            } else {
                fb.innerHTML = `
            <div class="alert alert-warning mb-0">
                Kamu menjawab <strong>${skor}</strong> dari <strong>3</strong> soal dengan benar.
                Ingat, bentuk implisit ditulis dalam bentuk $Ax + By + C = 0$.
            </div>
        `;
                nextBtn.disabled = true;
                renderMathSafe(fb);
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
        // =========================
        // LATIHAN 4
        // =========================
        async function cekLatihan4A1() {
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

            if (["1/2x+2", "0.5x+2", "x/2+2"].includes(b)) {
                fbb.innerHTML = "Benar.";
                fbb.style.color = "green";
                skor++;
            } else {
                fbb.innerHTML = "Belum tepat.";
                fbb.style.color = "red";
            }

            if (["-5/2x+3", "-2.5x+3", "-5x/2+3"].includes(c)) {
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
                    fb.innerHTML = `
                <div class="alert alert-success mb-0">
                    <strong>Benar.</strong> Kamu sudah dapat mengubah bentuk implisit ke bentuk eksplisit.
                    <br><br>
                    <strong>Penyelesaian:</strong>
                    <ul class="mb-0 mt-2">
                        <li>
                            $3x + y - 7 = 0$<br>
                            $y = -3x + 7$
                        </li>
                        <li>
                            $2x - 4y + 8 = 0$<br>
                            $-4y = -2x - 8$<br>
                            $y = \\frac{1}{2}x + 2$
                        </li>
                        <li>
                            $5x + 2y - 6 = 0$<br>
                            $2y = -5x + 6$<br>
                            $y = -\\frac{5}{2}x + 3$
                        </li>
                    </ul>
                    Jadi, untuk mengubah ke bentuk $y = mx + c$, pisahkan variabel $y$ di ruas kiri.
                    <br><br>
                    Silakan lanjut ke materi berikutnya.
                </div>
            `;

                    bukaNextButton();
                } else {
                    fb.innerHTML = `
                <div class="alert alert-warning mb-0">
                    Jawaban benar, tapi progres belum tersimpan.
                </div>
            `;
                }

                renderMathSafe(fb);

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L4`,
                    "input", {
                        lat4a: document.getElementById("lat4a").value.trim(),
                        lat4b: document.getElementById("lat4b").value.trim(),
                        lat4c: document.getElementById("lat4c").value.trim(),
                    },
                    true
                );

            } else {
                fb.innerHTML = `
            <div class="alert alert-warning mb-0">
                Kamu menjawab <strong>${skor}</strong> dari <strong>3</strong> soal dengan benar.
                Ingat, bentuk eksplisit harus ditulis dalam bentuk $y = mx + c$.
            </div>
        `;
                renderMathSafe(fb);
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

    {{-- Script Simpan Progres Latihan --}}
    <script>
        async function simpanProgressLatihan(latihanKey, tipe, jawaban, isCorrect) {
            try {
                const response = await fetch(`/materi/${MATERI_ID}/latihan-progress`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        latihan_key: latihanKey,
                        tipe: tipe,
                        jawaban: jawaban,
                        is_correct: isCorrect,
                    })
                });

                return await response.json();
            } catch (error) {
                console.error('Gagal menyimpan progress latihan:', error);
            }
        }
    </script>

    {{-- Restore Jawaban --}}
    <script>
        // Latihan 1
        function restoreLatihan1A1() {
            const saved = SAVED_LATIHAN[`${MATERI_SLUG}_L1`]?.jawaban;

            if (!saved || !saved.selectedIds) return;

            const dropLinear = document.getElementById("dropLinear");

            if (!dropLinear) return;

            dropLinear.innerHTML = "";

            saved.selectedIds.forEach(id => {
                const item = document.querySelector(`.opsi-item[data-id="${id}"]`);

                if (item) {
                    dropLinear.appendChild(item);
                }
            });

            document.getElementById("nextBtn1").disabled = false;
        }
        // Latihan 2
        function restoreLatihan2A1() {
            const saved = SAVED_LATIHAN[`${MATERI_SLUG}_L2`]?.jawaban;

            if (!saved) return;

            if (saved.lat2a !== undefined) {
                document.getElementById("lat2a").value = saved.lat2a;
            }

            if (saved.lat2b !== undefined) {
                document.getElementById("lat2b").value = saved.lat2b;
            }

            if (saved.lat2c !== undefined) {
                document.getElementById("lat2c").value = saved.lat2c;
            }

            document.getElementById("latihanStep2").style.display = "block";
            document.getElementById("nextBtn1").disabled = false;
            document.getElementById("nextBtn2").disabled = false;
        }

        // Latihan 3
        function restoreLatihan3A1() {
            const saved = SAVED_LATIHAN[`${MATERI_SLUG}_L3`]?.jawaban;

            if (!saved) return;

            if (saved.lat3a !== undefined) {
                document.getElementById("lat3a").value = saved.lat3a;
            }

            if (saved.lat3b !== undefined) {
                document.getElementById("lat3b").value = saved.lat3b;
            }

            if (saved.lat3c !== undefined) {
                document.getElementById("lat3c").value = saved.lat3c;
            }

            document.getElementById("latihanStep2").style.display = "block";
            document.getElementById("latihanStep3").style.display = "block";

            document.getElementById("nextBtn1").disabled = false;
            document.getElementById("nextBtn2").disabled = false;
            document.getElementById("nextBtn3").disabled = false;
        }

        // Latihan 4
        function restoreLatihan4A1() {
            const saved = SAVED_LATIHAN[`${MATERI_SLUG}_L4`]?.jawaban;

            if (!saved) return;

            if (saved.lat4a !== undefined) {
                document.getElementById("lat4a").value = saved.lat4a;
            }

            if (saved.lat4b !== undefined) {
                document.getElementById("lat4b").value = saved.lat4b;
            }

            if (saved.lat4c !== undefined) {
                document.getElementById("lat4c").value = saved.lat4c;
            }

            document.getElementById("latihanStep2").style.display = "block";
            document.getElementById("latihanStep3").style.display = "block";
            document.getElementById("latihanStep4").style.display = "block";

            document.getElementById("nextBtn1").disabled = false;
            document.getElementById("nextBtn2").disabled = false;
            document.getElementById("nextBtn3").disabled = false;
        }

        // Panggil fungsi Restore
        document.addEventListener("DOMContentLoaded", function() {
            restoreLatihan1A1();
            restoreLatihan2A1();
            restoreLatihan3A1();
            restoreLatihan4A1();
        });
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
