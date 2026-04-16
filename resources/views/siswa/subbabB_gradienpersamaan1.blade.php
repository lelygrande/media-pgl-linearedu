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

        /* pecahan */
        .frac,
        .frac-input {
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            vertical-align: middle;
            margin: 0 4px;
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

        /* Slider */

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

    <div class="box-eksplorasi mt-4">

        <div class="title-box">
            Eksplorasi
        </div>

        <p class="mb-3" style="line-height:1.7;">
            Perhatikan gambar di samping. Terdapat sebuah garis dengan persamaan
            <b>\(y=-x+4\)</b> yang melalui titik <b>A</b>, <b>B</b>, dan <b>C</b>.
        </p>

        <div class="text-center mb-2">
            <img src="{{ asset('img/gradien/eksplorasipersamaan.png') }}"
                alt="Grafik garis y = -x + 4 melalui titik A, B, dan C"
                style="max-width:420px; width:100%; border-radius:12px; border:1px solid #e5e7eb;">
        </div>

        <div class="text-center text-muted mb-3" style="font-size:13px;">
            Gambar garis \(y=-x+4\) yang melalui titik A, B, dan C
        </div>

        <p class="mb-3">
            Isilah tabel berikut berdasarkan gambar yang diberikan.
        </p>

        <div class="table-responsive mb-3" style="max-width: 500px">
            <table class="table table-bordered text-center align-middle">
                <thead class="table-light">
                    <tr>
                        <th></th>
                        <th>Ruas AB</th>
                        <th>Ruas BC</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Komponen \(x\)</th>
                        <td class="text-center">
                            <input type="text" id="xAB" class="form-control text-center mx-auto"
                                style="width:70px;">
                        </td>
                        <td class="text-center">
                            <input type="text" id="xBC" class="form-control text-center mx-auto"
                                style="width:70px;">
                        </td>
                    </tr>
                    <tr>
                        <th>Komponen \(y\)</th>
                        <td class="text-center">
                            <input type="text" id="yAB" class="form-control text-center mx-auto"
                                style="width:70px;">
                        </td>
                        <td class="text-center">
                            <input type="text" id="yBC" class="form-control text-center mx-auto"
                                style="width:70px;">
                        </td>
                    </tr>
                    <tr>
                        <th>\(\frac{\Delta y}{\Delta x}\)</th>
                        <td class="text-center">
                            <input type="text" id="mAB" class="form-control text-center mx-auto"
                                style="width:70px;">
                        </td>
                        <td class="text-center">
                            <input type="text" id="mBC" class="form-control text-center mx-auto"
                                style="width:70px;">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex gap-2 flex-wrap mb-3">
            <button class="btn btn-palet btn-sm" onclick="cekTabelEksplorasi()">Cek Jawaban</button>
            <button class="btn btn-outline-secondary btn-sm" onclick="resetEksplorasiPersamaan()">Reset</button>
        </div>

        <div id="feedbackTabelEksplorasi" class="mb-3"></div>

        <div class="p-3 border rounded-4 mb-3">
            <div class="fw-semibold mb-2">
                Jawablah pertanyaan berikut.
            </div>

            <div class="mb-3">
                <label for="q1" class="form-label">
                    1. Berdasarkan tabel, apakah nilai gradien pada ruas AB dan BC sama?
                </label>
                <select id="q1" class="form-select" style="max-width:260px;">
                    <option value="">-- Pilih jawaban --</option>
                    <option value="sama">Sama</option>
                    <option value="berbeda">Berbeda</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="q2" class="form-label">
                    2. Gradien garis dengan persamaan \(y = mx + c\) adalah ....
                </label>
                <input type="text" id="q2" class="form-control" style="max-width:120px;">
            </div>

            <button class="btn btn-palet btn-sm" onclick="cekPertanyaanEksplorasi()">Cek Pertanyaan</button>
            <div id="feedbackPertanyaanEksplorasi" class="mt-2"></div>
        </div>

        <div id="kesimpulanEksplorasiPersamaan" class="box-kesimpulan d-none">
            <div class="alert alert-success mb-0">
                Berdasarkan tabel, perbandingan komponen \(y\) terhadap komponen \(x\) mempunyai nilai gradien yang
                sama pada setiap ruas garis. Jadi, gradien garis dengan persamaan \(y = mx + c\) adalah \(m\).
            </div>
        </div>
    </div>

    {{-- Pengantar kontekstual --}}
    <div class="card card-materi mt-4 mb-4">
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
    <div class="box-eksplorasi mt-5">
        <div class="card-body p-4">
            <span class="title-box">Ayo Amati</span>

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
    <div class="box-contoh mt-5 mb-4">
        <div class="card-body p-4">
            <span class="title-box">Contoh</span>

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
    <div class="box-contoh mb-4 mt-5">
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

    {{-- Contoh kontekstual y=mx+c --}}
    <div class="box-contoh mt-5 mb-4">
        <div class="card-body p-4">
            <span class="title-box">Contoh</span>

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
    <div class="box-contoh mt-5 mb-4">
        <div class="card-body p-4">
            <span class="title-box">Contoh</span>

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

    {{-- Eksplorasi Bentuk Ax + By + C = 0  --}}

    <div class="box-eksplorasi mt-5 mb-4">
        <div class="card-body p-4">
            <span class="title-box">Eksplorasi</span>

            <p class="mb-3" style="line-height:1.8; text-align:justify;">
                Gradien garis pada bentuk <b>\(Ax + By + C = 0\)</b> dapat ditentukan dengan cara
                mengubah persamaan tersebut ke bentuk <b>\(y = mx + c\)</b>, dengan <b>\(m\)</b>
                adalah gradien garis.
            </p>

            <p class="mb-3" style="line-height:1.8; text-align:justify;">
                Perhatikan langkah-langkah berikut, lalu lengkapi bagian yang kosong.
            </p>

            <div class="rumus-box text-center mb-4">
                \(Ax + By + C = 0\)
            </div>

            <div class="quiz-card p-3">

                {{-- Langkah 1 --}}
                <div class="mb-4">
                    <div class="fw-bold mb-2">Langkah 1</div>
                    <p class="mb-2">Pindahkan suku \(Ax\) ke ruas kanan.</p>

                    <div class="rumus-box text-center d-flex justify-content-center align-items-center gap-2 flex-wrap">
                        <span>\(By + C =\)</span>
                        <input type="text" id="eks1"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:120px;">
                    </div>
                </div>

                {{-- Langkah 2 --}}
                <div class="mb-4">
                    <div class="fw-bold mb-2">Langkah 2</div>
                    <p class="mb-2">Pindahkan suku \(C\) ke ruas kanan.</p>

                    <div class="rumus-box text-center d-flex justify-content-center align-items-center gap-2 flex-wrap">
                        <span>\(By =\)</span>
                        <input type="text" id="eks2"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:140px;">
                    </div>
                </div>

                {{-- Langkah 3 --}}
                <div class="mb-4">
                    <div class="fw-bold mb-2">Langkah 3</div>
                    <p class="mb-2">Bagilah kedua ruas dengan \(B\), sehingga diperoleh bentuk \(y = mx + c\).</p>

                    <div class="rumus-box text-center d-flex justify-content-center align-items-center gap-1 flex-wrap">
                        <span>\(y=\)</span>

                        <span style="font-size:22px; font-weight:600;">−</span>
                        <div class="frac-input single">
                            <div class="top">
                                <input type="text" id="eks3atas1"
                                    class="form-control form-control-sm text-center jawaban-latihan" style="width:60px;">
                            </div>
                            <div class="bottom">
                                <input type="text" id="eks3bawah1"
                                    class="form-control form-control-sm text-center jawaban-latihan" style="width:60px;">
                            </div>
                        </div>

                        <span>\(x\)</span>

                        <span style="font-size:22px; font-weight:600;">−</span>
                        <div class="frac-input single">
                            <div class="top">
                                <input type="text" id="eks3atas2"
                                    class="form-control form-control-sm text-center jawaban-latihan" style="width:60px;">
                            </div>
                            <div class="bottom">
                                <input type="text" id="eks3bawah2"
                                    class="form-control form-control-sm text-center jawaban-latihan" style="width:60px;">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Langkah 4 --}}
                <div class="mb-3">
                    <div class="fw-bold mb-2">Langkah 4</div>
                    <p class="mb-2">Karena gradien adalah koefisien \(x\), maka gradien garis tersebut adalah</p>

                    <div class="rumus-box text-center d-flex justify-content-center align-items-center gap-1 flex-wrap">
                        <span>\(m=\)</span>
                        <span style="font-size:22px; font-weight:600;">−</span>

                        <div class="frac-input single">
                            <div class="top">
                                <input type="text" id="eks4atas"
                                    class="form-control form-control-sm text-center jawaban-latihan" style="width:60px;">
                            </div>
                            <div class="bottom">
                                <input type="text" id="eks4bawah"
                                    class="form-control form-control-sm text-center jawaban-latihan" style="width:60px;">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-2 flex-wrap mt-3">
                    <button class="btn btn-palet btn-sm" onclick="cekEksplorasiGradienUmum()">Cek Jawaban</button>
                </div>

                <div id="fbEksplorasiGradienUmum" class="mt-3"></div>

                <div id="kesimpulanEksplorasiGradienUmum" class="box-kesimpulan d-none mt-3">
                    <div class="alert alert-success mb-0">
                        Bagus! Setelah persamaan \(Ax + By + C = 0\) diubah ke bentuk \(y = mx + c\),
                        diperoleh bahwa koefisien \(x\) bernilai \(-\frac{A}{B}\).
                        Karena gradien adalah koefisien \(x\), maka gradien garis tersebut adalah
                        \(m = -\frac{A}{B}\).
                    </div>
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
    <div class="box-contoh mt-5 mb-4">
        <div class="card-body p-4">
            <span class="title-box">Contoh</span>

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
    <div class="box-contoh mt-5 mb-4">
        <div class="card-body p-4">
            <span class="title-box">Contoh</span>

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
    <div class="box-contoh mt-5 mb-4">
        <div class="card-body p-4">
            <span class="title-box">Contoh</span>

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

    <div class="box-latihan mt-5 mb-4" id="latihanGradienSlider">
        <div class="card-body p-4">
            <span class="title-box">Latihan</span>

            <p class="mb-3" style="line-height:1.8; text-align:justify;">
                Kerjakan latihan berikut dengan cermat. Jika jawaban berupa pecahan, tuliskan dalam bentuk
                $a/b$, misalnya $1/2$.
            </p>

            <div class="latihan-slider" id="latihanSliderGradien">
                <div class="latihan-track" id="latihanTrackGradien">

                    <!-- Slide 1 -->
                    <section class="latihan-slide">
                        <div class="context-card">
                            <p class="mb-3"><b>1.</b> Tentukan gradien dari persamaan berikut.</p>

                            <div class="mb-3">
                                <label class="form-label">a. \(y=-5x+7\)</label>
                                <input type="text" id="lat1a" class="form-control mini-input">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">b. \(4y=10x-12\)</label>
                                <input type="text" id="lat1b" class="form-control mini-input">
                            </div>

                            <button type="button" class="btn btn-palet btn-sm" onclick="cekLatihan1Gradien()">Cek
                                Jawaban</button>
                            <div id="feedbackLatihan1Gradien" class="mt-3"></div>
                        </div>
                    </section>

                    <!-- Slide 2 -->
                    <section class="latihan-slide">
                        <div class="context-card">
                            <p class="mb-3"><b>2.</b> Tentukan gradien dari persamaan berikut.</p>

                            <div class="mb-3">
                                <label class="form-label">a. \(6x+3y-9=0\)</label>
                                <input type="text" id="lat2a" class="form-control mini-input">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">b. \(9x-6y+15=0\)</label>
                                <input type="text" id="lat2b" class="form-control mini-input">
                            </div>

                            <button type="button" class="btn btn-palet btn-sm" onclick="cekLatihan2Gradien()">Cek
                                Jawaban</button>
                            <div id="feedbackLatihan2Gradien" class="mt-3"></div>
                        </div>
                    </section>

                    <!-- Slide 3 -->
                    <section class="latihan-slide">
                        <div class="context-card">
                            <p class="mb-3"><b>3.</b> Perhatikan dua jalan berikut.</p>

                            <p style="line-height:1.8; text-align:justify;">
                                Jalan A dinyatakan oleh persamaan \(3y=9x+6\), sedangkan Jalan B dinyatakan oleh
                                persamaan \(4x+2y-8=0\). Nilai \(x\) menyatakan jarak mendatar dan nilai \(y\)
                                menyatakan ketinggian.
                            </p>

                            <div class="mb-3">
                                <label class="form-label">Gradien Jalan A adalah ...</label>
                                <input type="text" id="lat3a" class="form-control mini-input">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Gradien Jalan B adalah ...</label>
                                <input type="text" id="lat3b" class="form-control mini-input">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jalan yang lebih curam adalah ...</label>
                                <input type="text" id="lat3c" class="form-control mini-input">
                            </div>

                            <button type="button" class="btn btn-palet btn-sm" onclick="cekLatihan3Gradien()">Cek
                                Jawaban</button>
                            <div id="feedbackLatihan3Gradien" class="mt-3"></div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/subbabB/subbab_gradienpersamaan1.js') }}"></script>
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
