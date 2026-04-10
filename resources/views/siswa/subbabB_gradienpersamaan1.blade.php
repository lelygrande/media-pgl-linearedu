@extends('layout.halaman-materi')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/subbabB/subbabB_gradienpersamaan.css') }}">
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

        .step-box {
            background: #f7f9fc;
            border: 1px solid #dbe5f1;
            border-radius: 14px;
            padding: 16px;
            margin-bottom: 14px;
        }

        .info-box {
            background: #eef6ff;
            border: 1px solid #cfe2ff;
            border-radius: 14px;
            padding: 14px 16px;
        }

        .context-box {
            background: #fffaf0;
            border: 1px solid #f3d9a4;
            border-radius: 14px;
            padding: 14px 16px;
        }

        .pilihan-box label {
            display: block;
            padding: 10px 12px;
            border: 1px solid #dbe5f1;
            border-radius: 10px;
            margin-bottom: 10px;
            cursor: pointer;
            background: #fff;
        }

        .pilihan-box label:hover {
            background: #f7fbff;
            border-color: #2E75B6;
        }

        .pecahan-tabel {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-width: 80px;
            gap: 3px;
        }

        .input-pecahan {
            width: 48px;
            height: 36px;
            text-align: center;
            border: 1px solid #b8c7db;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            padding: 2px;
        }

        .garis-pecahan-kecil {
            width: 70px;
            height: 2px;
            background: #222;
        }
    </style>

    <h1 class="mb-3" style="font-weight: 600;">B. Gradien (Kemiringan Garis)</h1>

    <div class="card card-tujuan mb-4">
        <div class="card-body">
            <h5>Tujuan Pembelajaran:</h5>
            <ol>
                <li>Siswa dapat menentukan gradien (kemiringan) garis dari persamaan garis lurus.</li>
            </ol>
        </div>
    </div>

    <h2 class="mt-2 mb-3" style="font-weight: 600;">4. Gradien dari Suatu Persamaan Garis Lurus</h2>

    {{-- Pengantar kontekstual --}}
    <div class="card card-materi mb-4">
        <div class="card-body p-4">
            <p class="mb-2" style="line-height:1.8; text-align:justify;">
                Pada bagian sebelumnya, kita telah mempelajari bahwa gradien menunjukkan perbandingan perubahan nilai
                <b>y</b> terhadap perubahan nilai <b>x</b>.
            </p>

            <div class="rumus-box text-center mb-3">
                \[
                m = \frac{\Delta y}{\Delta x}
                \]
            </div>

            <p class="mb-3" style="line-height:1.8; text-align:justify;">
                Sekarang, kita akan mempelajari cara menentukan gradien jika sebuah garis sudah dinyatakan dalam bentuk
                persamaan.
            </p>

            <div class="rumus-box text-center mb-3">
                \[
                y = mx + c
                \]
            </div>

            <p class="mb-0" style="line-height:1.8; text-align:justify;">
                Pada bentuk tersebut, <b>m</b> menyatakan gradien, sedangkan <b>c</b> menyatakan konstanta atau titik potong
                garis dengan sumbu-$y$.
            </p>
        </div>
    </div>

    {{-- Bentuk y = mx --}}
    <div class="card card-materi mb-4">
        <div class="card-body p-4">
            <span class="badge-sub">1. Bentuk Khusus: $y = mx$</span>

            <p class="mb-2" style="line-height:1.8; text-align:justify;">
                Perhatikan persamaan berikut.
            </p>

            <div class="rumus-box text-center mb-3">
                \[
                y = mx
                \]
            </div>

            <p class="mb-2" style="line-height:1.8; text-align:justify;">
                Pada bentuk ini, huruf <b>m</b> menunjukkan gradien garis.
                Jadi, untuk menentukan gradien, kita cukup melihat angka yang berada di depan <b>x</b>.
            </p>

            <p class="mb-0" style="line-height:1.8; text-align:justify;">
                Misalnya, pada persamaan $y = 2x$, angka 2 yang berada di depan $x$ menunjukkan bahwa gradien garis tersebut
                adalah 2.
            </p>
        </div>
    </div>

    {{-- Amati pola --}}
    <div class="card card-materi mb-4">
        <div class="card-body p-4">
            <span class="badge-contoh">Ayo Amati</span>

            <p class="mb-2" style="line-height:1.8;">
                Perhatikan beberapa persamaan berikut.
            </p>

            <ol style="line-height:1.9;">
                <li>$y = 3x$</li>
                <li>$y = -2x$</li>
                <li>$y = \frac{1}{2}x$</li>
            </ol>

            <p class="mb-2" style="line-height:1.8;">
                Dari ketiga persamaan tersebut, angka yang selalu berada di depan $x$ adalah penunjuk gradien.
            </p>

            <div class="info-box">
                <p class="mb-0" style="line-height:1.8;">
                    Jadi, pada bentuk $y = mx$, nilai gradien adalah <b>koefisien di depan $x$</b>.
                </p>
            </div>
        </div>
    </div>

    {{-- Contoh kontekstual y=mx --}}
    <div class="card card-materi mb-4">
        <div class="card-body p-4">
            <span class="badge-contoh">Contoh</span>

            <p class="mb-3" style="line-height:1.8; text-align:justify;">
                Sebuah jalan menanjak dinyatakan oleh persamaan berikut.
            </p>

            <div class="rumus-box text-center mb-3">
                \[
                y = 4x
                \]
            </div>

            <p class="mb-2" style="line-height:1.8; text-align:justify;">
                Angka yang berada di depan $x$ adalah <b>4</b>.
                Maka, gradien jalan tersebut adalah:
            </p>

            <div class="rumus-box text-center">
                \[
                m = 4
                \]
            </div>
        </div>
    </div>

    {{-- Bentuk umum y = mx + c --}}
    <div class="card card-materi mb-4">
        <div class="card-body p-4">
            <span class="badge-sub">2. Bentuk Umum: $y = mx + c$</span>

            <p class="mb-2" style="line-height:1.8; text-align:justify;">
                Sekarang perhatikan persamaan berikut.
            </p>

            <div class="rumus-box text-center mb-3">
                \[
                y = mx + c
                \]
            </div>

            <p class="mb-2" style="line-height:1.8; text-align:justify;">
                Pada bentuk ini, <b>m</b> tetap menyatakan gradien, sedangkan <b>c</b> adalah konstanta.
            </p>

            <p class="mb-0" style="line-height:1.8; text-align:justify;">
                Jadi, meskipun ada tambahan $c$, cara menentukan gradien tetap sama, yaitu dengan melihat angka yang berada
                di depan $x$.
            </p>
        </div>
    </div>

    {{-- Contoh kontekstual y=mx+c --}}
    <div class="card card-materi mb-4">
        <div class="card-body p-4">
            <span class="badge-contoh">Contoh</span>

            <p class="mb-3" style="line-height:1.8; text-align:justify;">
                Ketinggian air dalam sebuah tangki dinyatakan oleh persamaan berikut.
            </p>

            <div class="rumus-box text-center mb-3">
                \[
                y = 2x + 5
                \]
            </div>

            <p class="mb-2" style="line-height:1.8; text-align:justify;">
                Angka yang berada di depan $x$ adalah <b>2</b>, sehingga gradien garisnya adalah:
            </p>

            <div class="rumus-box text-center mb-3">
                \[
                m = 2
                \]
            </div>

            <p class="mb-0" style="line-height:1.8; text-align:justify;">
                Angka <b>5</b> bukan gradien, melainkan konstanta.
            </p>
        </div>
    </div>

    {{-- Contoh bertahap mengubah bentuk --}}
    <div class="card card-materi mb-4">
        <div class="card-body p-4">
            <span class="badge-contoh">Contoh</span>

            <p class="mb-3" style="line-height:1.8;">
                Tentukan gradien dari persamaan berikut.
            </p>

            <div class="rumus-box text-center mb-3">
                \[
                4y = 2x - 8
                \]
            </div>

            <div class="step-box">
                <div class="fw-bold mb-2">Langkah 1</div>
                <p class="mb-2">Ubah persamaan agar $y$ berada sendiri di ruas kiri.</p>
                <div class="rumus-box text-center">
                    \[
                    y = \frac{2x - 8}{4}
                    \]
                </div>
            </div>

            <div class="step-box">
                <div class="fw-bold mb-2">Langkah 2</div>
                <p class="mb-2">Sederhanakan persamaan tersebut.</p>
                <div class="rumus-box text-center">
                    \[
                    y = \frac{1}{2}x - 2
                    \]
                </div>
            </div>

            <div class="step-box mb-0">
                <div class="fw-bold mb-2">Langkah 3</div>
                <p class="mb-2">Lihat angka di depan $x$. Angka itu adalah gradien.</p>
                <div class="rumus-box text-center">
                    \[
                    m = \frac{1}{2}
                    \]
                </div>
            </div>
        </div>
    </div>

    {{-- Bentuk umum Ax + By + C = 0 --}}
    <div class="card card-materi mb-4">
        <div class="card-body p-4">
            <span class="badge-sub">3. Bentuk Umum: $Ax + By + C = 0$</span>

            <p class="mb-2" style="line-height:1.8; text-align:justify;">
                Selain bentuk $y = mx + c$, persamaan garis lurus juga dapat dituliskan dalam bentuk umum berikut.
            </p>

            <div class="rumus-box text-center mb-3">
                \[
                Ax + By + C = 0
                \]
            </div>

            <p class="mb-2" style="line-height:1.8; text-align:justify;">
                Pada bentuk ini, gradien garis dapat ditentukan dengan rumus:
            </p>

            <div class="rumus-box text-center mb-3">
                \[
                m = -\frac{A}{B}
                \]
            </div>

            <div class="info-box">
                <p class="mb-0" style="line-height:1.8;">
                    Jadi, untuk menentukan gradien dari persamaan $Ax + By + C = 0$,
                    cukup mengambil nilai $A$ dan $B$, lalu menggunakan rumus
                    <b>$m = -\frac{A}{B}$</b>.
                </p>
            </div>
        </div>
    </div>

    {{-- Contoh Ax + By + C = 0 --}}
    {{-- Contoh interaktif langsung gradien --}}
    <div class="card card-materi mb-4">
        <div class="card-body p-4">
            <span class="badge-contoh">Contoh Interaktif</span>

            <p class="mb-3">
                Diketahui persamaan garis berikut.
            </p>

            <div class="rumus-box text-center mb-3">
                $$ 2x - 4y + 1 = 0 $$
            </div>

            <p>Tentukan gradien garis tersebut.</p>

            <div class="quiz-card p-3">

                {{-- Input --}}
                <div id="contohStep1">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <span>$m = $</span>

                        <div class="pecahan-tabel">
                            <input type="number" id="gradAtas" class="input-pecahan">
                            <div class="garis-pecahan-kecil"></div>
                            <input type="number" id="gradBawah" class="input-pecahan">
                        </div>
                    </div>

                    <button class="btn btn-palet" onclick="cekGradien()">Cek</button>
                    <div id="fbGradien" class="mt-2"></div>
                </div>

                {{-- Pembahasan --}}
                <div id="pembahasanGradien" class="d-none mt-3 info-box">
                    <b>Pembahasan:</b><br>

                    Gradien dari bentuk $Ax + By + C = 0$ adalah:

                    <div class="rumus-box text-center mt-2 mb-2">
                        $$ m = -\frac{A}{B} $$
                    </div>

                    Pada persamaan $2x - 4y + 1 = 0$:
                    <br>
                    $A = 2$ dan $B = -4$

                    <div class="rumus-box text-center mt-2 mb-2">
                        $$ m = -\frac{2}{-4} = \frac{1}{2} $$
                    </div>

                    Jadi, gradiennya adalah $\frac{1}{2}$.
                </div>

            </div>
        </div>
    </div>


    {{-- Contoh 1 --}}
    <div class="card card-materi mb-4">
        <div class="card-body p-4">
            <span class="badge-contoh">Contoh</span>

            <p style="line-height:1.8; text-align:justify;">
                Perhatikan persamaan berikut. Klik bagian persamaan yang menunjukkan gradien garis.
            </p>

            <div class="rumus-box mb-3">
                <span>$y =$</span>
                <span class="expr-part" data-role="coef" id="coefA">$4$</span>
                <span>$x$</span>
                <span>$+$</span>
                <span class="expr-part" data-role="const" id="constA">$2$</span>
            </div>

            <div id="fbKlikKoef"></div>
        </div>
    </div>

    {{-- Contoh 2 --}}
    <div class="card card-materi mb-4">
        <div class="card-body p-4">
            <span class="badge-contoh">Contoh</span>

            <p style="line-height:1.8; text-align:justify;">
                Perhatikan persamaan <b>$4y = 2x - 8$</b>. Susunlah potongan langkah berikut agar menjadi urutan yang benar
                untuk mengubah persamaan tersebut ke bentuk <b>$y = mx + c$</b>.
            </p>

            <div class="sort-bank mb-3" id="sortBank">
                <div class="sort-item" draggable="true" data-step="2">$y = \frac{2x - 8}{4}$</div>
                <div class="sort-item" draggable="true" data-step="4">$m = \frac{1}{2}$</div>
                <div class="sort-item" draggable="true" data-step="1">$4y = 2x - 8$</div>
                <div class="sort-item" draggable="true" data-step="3">$y = \frac{1}{2}x - 2$</div>
            </div>

            <div class="step-card">
                <div class="step-slot sort-slot" data-answer="1">Letakkan langkah pertama di sini</div>
                <div class="step-slot sort-slot" data-answer="2">Letakkan langkah berikutnya di sini</div>
                <div class="step-slot sort-slot" data-answer="3">Letakkan langkah berikutnya di sini</div>
                <div class="step-slot sort-slot mb-0" data-answer="4">Letakkan kesimpulan di sini</div>
            </div>

            <div class="d-flex gap-2 mt-3">
                <button class="btn btn-palet btn-sm" onclick="cekUrutanLangkah()">Cek</button>
                <button class="btn btn-outline-secondary btn-sm" onclick="resetUrutanLangkah()">Reset</button>
            </div>

            <div id="fbUrutanLangkah" class="mt-3"></div>
        </div>
    </div>

    {{-- Latihan --}}
    <div class="card card-materi mb-4">
        <div class="card-body p-4">
            <span class="badge-latihan">Latihan</span>

            <p style="line-height:1.8; text-align:justify;">
                Kerjakan latihan berikut dengan cermat. Pada beberapa soal, kamu perlu mengenali gradien dari persamaan
                yang sudah sederhana, sedangkan pada soal lain kamu perlu berpikir lebih jauh dengan membandingkan dua
                situasi yang berbeda.
            </p>

            <div class="matching-wrap mb-3">
                <div>
                    <p class="mb-2"><b>1.</b> Cocokkan setiap persamaan dengan gradien yang benar.</p>

                    <div class="match-card mb-2">$y = 5x + 1$</div>
                    <div class="drop-zone match-target mb-3" data-answer="5" id="match1">Letakkan gradien di sini
                    </div>

                    <div class="match-card mb-2">$y = -2x + 4$</div>
                    <div class="drop-zone match-target mb-3" data-answer="-2" id="match2">Letakkan gradien di sini
                    </div>

                    <div class="match-card mb-2">$3y = 6x - 9$</div>
                    <div class="drop-zone match-target" data-answer="2" id="match3">Letakkan gradien di sini</div>
                </div>

                <div>
                    <p class="mb-2"><b>Pilihan gradien</b></p>
                    <div class="sort-bank">
                        <div class="drag-item match-item" draggable="true" data-label="2">$2$</div>
                        <div class="drag-item match-item" draggable="true" data-label="5">$5$</div>
                        <div class="drag-item match-item" draggable="true" data-label="3">$3$</div>
                        <div class="drag-item match-item" draggable="true" data-label="-2">$-2$</div>
                        <div class="drag-item match-item" draggable="true" data-label="-3">$-3$</div>
                    </div>
                </div>
            </div>
            <hr class="soft">
            <div class="choice-card mb-3">
                <p class="mb-2"><b>2.</b> Persamaan manakah yang memiliki gradien paling besar?</p>

                <label>
                    <input type="radio" name="pilihAnalisis" value="a">
                    $y = 2x + 5$
                </label>

                <label>
                    <input type="radio" name="pilihAnalisis" value="b">
                    $2y = 10x - 4$
                </label>

                <label>
                    <input type="radio" name="pilihAnalisis" value="c">
                    $y = -3x + 8$
                </label>

                <div class="mt-2">
                    <label class="form-label">Tuliskan gradien persamaan yang kamu pilih.</label>
                    <input type="text" id="analisisGradien" class="form-control mini-input">
                </div>
            </div>

            <hr class="soft">

            <div class="highlight-box mb-3">
                <p class="mb-0" style="line-height:1.8; text-align:justify;">
                    Dua jalan menanjak dinyatakan oleh persamaan <b>$2y = 4x + 2$</b> dan
                    <b>$3y = 12x + 3$</b>. Kedua persamaan tersebut menunjukkan hubungan antara
                    jarak mendatar ($x$) dan ketinggian ($y$) suatu jalan.
                </p>
            </div>

            <div class="context-card">
                <p class="mb-2"><b>3.</b> Berdasarkan persamaan tersebut, tentukan jalan yang lebih curam.</p>

                <label class="d-block mb-2">
                    <input type="radio" name="pilihLatsol3" value="a">
                    Jalan dengan persamaan $2y = 4x + 2$
                </label>

                <label class="d-block mb-3">
                    <input type="radio" name="pilihLatsol3" value="b">
                    Jalan dengan persamaan $3y = 12x + 3$
                </label>

                <hr class="soft">

                <div class="mb-3">
                    <label class="form-label">Persamaan $2y = 4x + 2$ diubah menjadi ...</label>
                    <input type="text" id="latsol3_bentuk1" class="form-control mini-input"
                        placeholder="contoh: y = ...">
                </div>

                <div class="mb-3">
                    <label class="form-label">Persamaan $3y = 12x + 3$ diubah menjadi ...</label>
                    <input type="text" id="latsol3_bentuk2" class="form-control mini-input"
                        placeholder="contoh: y = ...">
                </div>

                <div class="mb-3">
                    <label class="form-label">Gradien dari persamaan pertama adalah ...</label>
                    <input type="text" id="latsol3_grad1" class="form-control mini-input">
                </div>

                <div class="mb-0">
                    <label class="form-label">Gradien dari persamaan kedua adalah ...</label>
                    <input type="text" id="latsol3_grad2" class="form-control mini-input">
                </div>
            </div>

            <hr class="soft">

            <div class="context-card">
                <p class="mb-2"><b>4.</b> Sebuah jalan menanjak dinyatakan oleh persamaan:</p>

                <div class="rumus-box text-center mb-2">
                    $$ 5x + 2y - 8 = 0 $$
                </div>

                <p>
                    Persamaan tersebut menunjukkan hubungan antara jarak mendatar ($x$) dan ketinggian ($y$).
                </p>

                <p>
                    Tentukan gradien jalan tersebut.
                </p>

                <div class="pecahan-tabel mt-2">
                    <input type="number" id="lat4_atas" class="input-pecahan">
                    <div class="garis-pecahan-kecil"></div>
                    <input type="number" id="lat4_bawah" class="input-pecahan">
                </div>
            </div>

            <div class="d-flex gap-2 mt-3">
                <button class="btn btn-palet btn-sm" onclick="cekSemuaLatihan()">Cek Jawaban</button>
                <button class="btn btn-outline-secondary btn-sm" onclick="resetSemuaLatihan()">Reset</button>
            </div>

            <div id="fbHasilAkhir" class="mt-3"></div>
        </div>
    </div>

    <script src="{{ asset('js/subbabB/subbab_gradienpersamaan1.js') }}"></script>
@endsection

@section('nav')
    <a href="{{ route('subbabB_gradienduatitik') }}" class="btn btn-prev px-4 rounded-pill">
        ← Prev
    </a>
    <a href="{{ route('quiz.show', 2) }}" class="btn btn-next px-4 rounded-pill fw-semibold">
        Next →
    </a>
@endsection
