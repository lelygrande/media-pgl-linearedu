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

    <h2 class="mt-2 mb-3" style="font-weight: 600;">4. Gradien dari Persamaan Garis Lurus</h2>

    <div class="box-eksplorasi mt-4">

        <div class="title-box">
            Eksplorasi
        </div>

        <p class="mb-3" style="line-height:1.7; text-align: justify;">
            Perhatikan Gambar 2.10. Pada gambar tersebut terdapat sebuah garis dengan persamaan
            <b>\(y=-x+4\)</b> yang melalui titik <b>A</b>, <b>B</b>, dan <b>C</b>.
        </p>

        <div class="text-center mb-2">
            <img class="zoomable" src="{{ asset('img/gradien/eksplorasipersamaan.png') }}"
                alt="Grafik garis persamaan y=-x+4"
                style="max-width:420px; width:100%; border-radius:12px; border:1px solid #e5e7eb;">
        </div>

        <div class="text-center text-muted mb-3" style="font-size:13px;">
            <strong>Gambar 2.10</strong> Grafik garis persamaan \(y=-x+4\)
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
            <button class="btn btn-palet btn-sm" onclick="resetEksplorasiPersamaan()">Reset</button>
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
                    2. Jika semua ruas pada garis memiliki nilai gradien yang sama,
                    maka pada persamaan garis \(y = mx + c\),
                    simbol yang menyatakan gradien adalah ....
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
        <div class="card-body">
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
        <div class="card-body">
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
        <div class="card-body">
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
        <div class="card-body">
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
        <div class="card-body">
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
        <div class="card-body">
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
        <div class="card-body">
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
        <div class="card-body">
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
        <div class="card-body">
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
        <div class="card-body">
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
        <div class="card-body">
            <span class="title-box">Contoh</span>

            <p style="line-height:1.8; text-align:justify;">
                Perhatikan persamaan <b>$6y = -3x + 12$</b>. Susunlah potongan langkah berikut agar menjadi urutan yang
                benar
                untuk mengubah persamaan tersebut ke bentuk <b>$y = mx + c$</b>.
            </p>

            <div class="sort-bank mb-3" id="sortBank">
                <div class="sort-item" draggable="true" data-step="2">$y = \frac{-3x + 12}{6}$</div>
                <div class="sort-item" draggable="true" data-step="4">$m = -\frac{1}{2}$</div>
                <div class="sort-item" draggable="true" data-step="1">$6y = -3x + 12$</div>
                <div class="sort-item" draggable="true" data-step="3">$y = -\frac{1}{2}x + 2$</div>
            </div>

            <div class="step-card">
                <div class="step-slot sort-slot" data-answer="1">Letakkan langkah pertama di sini</div>
                <div class="step-slot sort-slot" data-answer="2">Letakkan langkah berikutnya di sini</div>
                <div class="step-slot sort-slot" data-answer="3">Letakkan langkah berikutnya di sini</div>
                <div class="step-slot sort-slot mb-0" data-answer="4">Letakkan kesimpulan di sini</div>
            </div>

            <div class="d-flex gap-2 mt-3">
                <button class="btn btn-palet btn-sm" onclick="cekUrutanLangkah()">Cek</button>
                <button class="btn btn-palet btn-sm" onclick="resetUrutanLangkah()">Reset</button>
            </div>

            <div id="fbUrutanLangkah" class="mt-3"></div>
        </div>
    </div>

    <div class="box-latihan mt-5 mb-4" id="latihanGradienB4Box">
        <div class="card-body">
            <span class="title-box">Latihan Soal</span>
            <!-- ===================== -->
            <!-- LATIHAN 1 -->
            <!-- ===================== -->
            <div class="latihan-step" id="latihanStep1">
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

                    <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <div>
                            <button type="button" class="btn btn-palet btn-sm" onclick="cekLatihan1Gradien()">
                                Cek Jawaban
                            </button>

                            <button type="button" class="btn btn-palet btn-sm" onclick="resetLatihan1Gradien()">
                                Reset
                            </button>
                        </div>

                        <button id="nextBtnLatihan1" type="button" class="btn btn-palet btn-sm"
                            onclick="nextLatihan(2)" disabled>
                            Lanjut ke Latihan 2
                        </button>
                    </div>

                    <div id="feedbackLatihan1Gradien" class="mt-3"></div>
                </div>
            </div>

            <!-- ===================== -->
            <!-- LATIHAN 2 -->
            <!-- ===================== -->
            <div class="latihan-step" id="latihanStep2" style="display:none;">
                <hr class="my-4">

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

                    <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <button type="button" class="btn btn-palet btn-sm" onclick="prevLatihan(1)">
                            Kembali ke Latihan 1
                        </button>

                        <div>
                            <button type="button" class="btn btn-palet btn-sm" onclick="cekLatihan2Gradien()">
                                Cek Jawaban
                            </button>

                            <button type="button" class="btn btn-palet btn-sm" onclick="resetLatihan2Gradien()">
                                Reset
                            </button>
                        </div>

                        <button id="nextBtnLatihan2" type="button" class="btn btn-palet btn-sm"
                            onclick="nextLatihan(3)" disabled>
                            Lanjut ke Latihan 3
                        </button>
                    </div>

                    <div id="feedbackLatihan2Gradien" class="mt-3"></div>
                </div>
            </div>

            <!-- ===================== -->
            <!-- LATIHAN 3 -->
            <!-- ===================== -->
            <div class="latihan-step" id="latihanStep3" style="display:none;">
                <hr class="my-4">

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

                    <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <button type="button" class="btn btn-palet btn-sm" onclick="prevLatihan(2)">
                            Kembali ke Latihan 2
                        </button>

                        <div>
                            <button type="button" class="btn btn-palet btn-sm" onclick="cekLatihan3Gradien()">
                                Cek Jawaban
                            </button>

                            <button type="button" class="btn btn-palet btn-sm" onclick="resetLatihan3Gradien()">
                                Reset
                            </button>
                        </div>
                    </div>

                    <div id="feedbackLatihan3Gradien" class="mt-3"></div>

                    <div id="pesanAkhirLatihan" class="mt-3 d-none">
                        <div class="alert alert-success fw-semibold text-center mt-3">
                            Bagus, kamu sudah memahami cara menentukan gradien dari suatu persamaan garis lurus.
                            Silakan lanjut ke kuis subbab B.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Eksplorasi
        function normJawaban(teks) {
            return (teks || "")
                .toString()
                .trim()
                .toLowerCase()
                .replace(/\s+/g, "")
                .replace(/[()]/g, "");
        }

        function cekIsianLokal(id, jawabanBenar) {
            const el = document.getElementById(id);
            if (!el) return false;

            const nilai = normJawaban(el.value);
            const daftar = Array.isArray(jawabanBenar) ? jawabanBenar : [jawabanBenar];
            const cocok = daftar.map(normJawaban).includes(nilai);

            el.classList.remove("is-valid", "is-invalid");
            el.classList.add(cocok ? "is-valid" : "is-invalid");

            return cocok;
        }

        function isiPesanLokal(id, pesan, tipe = "info") {
            const el = document.getElementById(id);
            if (!el) return;

            const kelas =
                tipe === "success" ?
                "alert-success" :
                tipe === "warning" ?
                "alert-warning" :
                "alert-info";

            el.innerHTML = `<div class="alert ${kelas} py-2 mb-0">${pesan}</div>`;
        }

        function kosongkanLokal(id) {
            const el = document.getElementById(id);
            if (el) el.innerHTML = "";
        }

        function cekTabelEksplorasi() {
            const benarXAB = cekIsianLokal("xAB", ["1"]);
            const benarXBC = cekIsianLokal("xBC", ["2"]);
            const benarYAB = cekIsianLokal("yAB", ["-1"]);
            const benarYBC = cekIsianLokal("yBC", ["-2"]);
            const benarMAB = cekIsianLokal("mAB", ["-1", "-1/1"]);
            const benarMBC = cekIsianLokal("mBC", ["-1", "-2/2"]);

            let pesan = [];

            if (!benarXAB || !benarXBC) {
                pesan.push("Komponen x masih ada yang belum tepat.");
            }

            if (!benarYAB || !benarYBC) {
                pesan.push("Komponen y masih ada yang belum tepat.");
            }

            if (!benarMAB || !benarMBC) {
                pesan.push(
                    "Nilai perbandingan Δy terhadap Δx masih ada yang belum tepat.",
                );
            }

            if (benarXAB && benarXBC && benarYAB && benarYBC && benarMAB && benarMBC) {
                isiPesanLokal(
                    "feedbackTabelEksplorasi",
                    "Bagus, seluruh isian pada tabel sudah benar.",
                    "success",
                );
                return;
            }

            isiPesanLokal("feedbackTabelEksplorasi", pesan.join("<br>"), "warning");
        }

        function cekPertanyaanEksplorasi() {
            const q1 = document.getElementById("q1");
            const benarQ2 = cekIsianLokal("q2", ["m"]);
            const kesimpulan = document.getElementById("kesimpulanEksplorasiPersamaan");

            let benarQ1 = false;

            if (q1) {
                q1.classList.remove("is-valid", "is-invalid");
                benarQ1 = q1.value === "sama";
                q1.classList.add(benarQ1 ? "is-valid" : "is-invalid");
            }

            if (benarQ1 && benarQ2) {
                isiPesanLokal(
                    "feedbackPertanyaanEksplorasi",
                    "Bagus, jawaban pertanyaan kesimpulanmu sudah benar.",
                    "success",
                );
                if (kesimpulan) kesimpulan.classList.remove("d-none");
                return;
            }

            isiPesanLokal(
                "feedbackPertanyaanEksplorasi",
                "Masih ada jawaban pertanyaan yang belum tepat. Bandingkan nilai gradien pada ruas AB dan BC, lalu perhatikan bentuk umum persamaan y = mx + c.",
                "warning",
            );

            if (kesimpulan) kesimpulan.classList.add("d-none");
        }

        function resetEksplorasiPersamaan() {
            ["xAB", "xBC", "yAB", "yBC", "mAB", "mBC", "q2"].forEach((id) => {
                const el = document.getElementById(id);
                if (el) {
                    el.value = "";
                    el.classList.remove("is-valid", "is-invalid");
                }
            });

            const q1 = document.getElementById("q1");
            if (q1) {
                q1.value = "";
                q1.classList.remove("is-valid", "is-invalid");
            }

            kosongkanLokal("feedbackTabelEksplorasi");
            kosongkanLokal("feedbackPertanyaanEksplorasi");

            const kesimpulan = document.getElementById("kesimpulanEksplorasiPersamaan");
            if (kesimpulan) kesimpulan.classList.add("d-none");
        }

        //
        function alertSuccess(text) {
            return `<div class="alert alert-success mb-0" style="border-radius:14px;">${text}</div>`;
        }

        function alertDanger(text) {
            return `<div class="alert alert-danger mb-0" style="border-radius:14px;">${text}</div>`;
        }

        function cekEksplorasiTabel() {
            let xAB = document.getElementById("xAB").value.trim().replace(/\s+/g, "");
            let xBC = document.getElementById("xBC").value.trim().replace(/\s+/g, "");
            let yAB = document.getElementById("yAB").value.trim().replace(/\s+/g, "");
            let yBC = document.getElementById("yBC").value.trim().replace(/\s+/g, "");
            let mAB = document.getElementById("mAB").value.trim().replace(/\s+/g, "");
            let mBC = document.getElementById("mBC").value.trim().replace(/\s+/g, "");
            let q1 = document.getElementById("q1").value;
            let q2 = document.getElementById("q2").value.trim().toLowerCase();

            let benar = 0;
            let pesan = [];

            if (xAB === "1") {
                benar++;
            } else {
                pesan.push("Komponen x pada ruas AB belum tepat.");
            }

            if (yAB === "-1") {
                benar++;
            } else {
                pesan.push("Komponen y pada ruas AB belum tepat.");
            }

            if (mAB === "-1" || mAB === "-1/1") {
                benar++;
            } else {
                pesan.push("Nilai Δy/Δx pada ruas AB belum tepat.");
            }

            if (xBC === "2") {
                benar++;
            } else {
                pesan.push("Komponen x pada ruas BC belum tepat.");
            }

            if (yBC === "-2") {
                benar++;
            } else {
                pesan.push("Komponen y pada ruas BC belum tepat.");
            }

            if (mBC === "-1" || mBC === "-2/2") {
                benar++;
            } else {
                pesan.push("Nilai Δy/Δx pada ruas BC belum tepat.");
            }

            if (q1 === "sama") {
                benar++;
            } else {
                pesan.push("Jawaban pada pertanyaan nomor 1 belum tepat.");
            }

            if (q2 === "m") {
                benar++;
            } else {
                pesan.push("Jawaban pada pertanyaan nomor 2 belum tepat.");
            }

            if (benar === 8) {
                document.getElementById("fbTabel").innerHTML = alertSuccess(
                    "Benar. Berdasarkan tabel, perbandingan komponen y terhadap komponen x mempunyai nilai gradien yang sama pada setiap ruas garis. Jadi, gradien garis dengan persamaan y = mx + c adalah m.",
                );
            } else {
                document.getElementById("fbTabel").innerHTML = alertDanger(
                    "Masih ada jawaban yang belum tepat.<br>" + pesan.join("<br>"),
                );
            }
        }

        function resetEksplorasiTabel() {
            ["xAB", "xBC", "yAB", "yBC", "mAB", "mBC", "q2"].forEach((id) => {
                document.getElementById(id).value = "";
            });

            document.getElementById("q1").value = "";
            document.getElementById("fbTabel").innerHTML = "";
        }

        //

        document.addEventListener("DOMContentLoaded", function() {
            initKlikKoefisien();
            initUrutanLangkah();
            initMatching();
        });

        function alertSuccess(text) {
            return `<div class="alert alert-success mb-0" style="border-radius:14px;">${text}</div>`;
        }

        function alertDanger(text) {
            return `<div class="alert alert-danger mb-0" style="border-radius:14px;">${text}</div>`;
        }

        function alertInfo(text) {
            return `<div class="alert alert-info mb-0" style="border-radius:14px;">${text}</div>`;
        }

        function resetExprState(items) {
            items.forEach((item) =>
                item.classList.remove("expr-correct", "expr-wrong"),
            );
        }

        // Eksplorasi Ax + By + C = 0
        function bersihHuruf(teks) {
            return (teks || "")
                .toLowerCase()
                .replace(/\s+/g, "")
                .replace(/[(){}[\]]/g, "");
        }

        function cekEksplorasiGradienUmum() {
            const eks1 = bersihHuruf(document.getElementById("eks1").value);
            const eks2 = bersihHuruf(document.getElementById("eks2").value);

            const eks3atas1 = bersihHuruf(document.getElementById("eks3atas1").value);
            const eks3bawah1 = bersihHuruf(document.getElementById("eks3bawah1").value);
            const eks3atas2 = bersihHuruf(document.getElementById("eks3atas2").value);
            const eks3bawah2 = bersihHuruf(document.getElementById("eks3bawah2").value);

            const eks4atas = bersihHuruf(document.getElementById("eks4atas").value);
            const eks4bawah = bersihHuruf(document.getElementById("eks4bawah").value);

            const feedback = document.getElementById("fbEksplorasiGradienUmum");
            const kesimpulan = document.getElementById(
                "kesimpulanEksplorasiGradienUmum",
            );

            const benar1 = eks1 === "-ax";
            const benar2 = eks2 === "-ax-c" || eks2 === "-c-ax";

            const benar3 =
                eks3atas1 === "a" &&
                eks3bawah1 === "b" &&
                eks3atas2 === "c" &&
                eks3bawah2 === "b";

            const benar4 = eks4atas === "a" && eks4bawah === "b";

            if (benar1 && benar2 && benar3 && benar4) {
                feedback.innerHTML = "";
                kesimpulan.classList.remove("d-none");
            } else {
                let pesan =
                    `<div class="alert alert-warning"><b>Masih ada yang perlu diperbaiki.</b><ul class="mb-0 mt-2">`;

                if (!benar1) {
                    pesan +=
                        `<li>Langkah 1: perhatikan suku mana yang dipindahkan ke ruas kanan. Tanda suku itu berubah.</li>`;
                }

                if (!benar2) {
                    pesan +=
                        `<li>Langkah 2: setelah konstanta dipindahkan, ruas kanan memuat dua suku. Coba cek kembali tanda masing-masing suku.</li>`;
                }

                if (!benar3) {
                    pesan +=
                        `<li>Langkah 3: bagi setiap suku di ruas kanan dengan \(B\). Koefisien \(x\) berasal dari suku yang memuat \(A\), sedangkan konstanta berasal dari suku yang memuat \(C\).</li>`;
                }

                if (!benar4) {
                    pesan +=
                        `<li>Langkah 4: gradien adalah koefisien yang menempel pada \(x\) di bentuk \(y = mx + c\). Perhatikan pembilang dan penyebutnya.</li>`;
                }

                pesan += `</ul></div>`;
                feedback.innerHTML = pesan;
                kesimpulan.classList.add("d-none");
            }

            if (window.renderMathInElement) {
                renderMathInElement(document.body, {
                    delimiters: [{
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
                });
            }
        }

        function resetEksplorasiGradienUmum() {
            document.getElementById("eks1").value = "";
            document.getElementById("eks2").value = "";

            document.getElementById("eks3atas1").value = "";
            document.getElementById("eks3bawah1").value = "";
            document.getElementById("eks3atas2").value = "";
            document.getElementById("eks3bawah2").value = "";

            document.getElementById("eks4atas").value = "";
            document.getElementById("eks4bawah").value = "";

            document.getElementById("fbEksplorasiGradienUmum").innerHTML = "";
            document
                .getElementById("kesimpulanEksplorasiGradienUmum")
                .classList.add("d-none");
        }

        // Contoh Persamaan Ax + By + C = 0
        function cekGradien() {
            let atas = document.getElementById("gradAtas").value.trim();
            let bawah = document.getElementById("gradBawah").value.trim();

            if (atas == "1" && bawah == "2") {
                document.getElementById("fbGradien").innerHTML =
                    "Benar! Gradiennya adalah 1/2.";

                document.getElementById("pembahasanGradien").classList.remove("d-none");
            } else {
                document.getElementById("fbGradien").innerHTML =
                    "Coba lagi. Ingat rumus m = -A/B dan sederhanakan pecahannya<br>Perhatikan tanda negatif pada rumus gradien";
            }
        }

        /* =========================
           CONTOH 1: KLIK KOEFISIEN
        ========================= */
        function initKlikKoefisien() {
            const coef = document.getElementById("coefA");
            const konst = document.getElementById("constA");
            const fb = document.getElementById("fbKlikKoef");

            if (!coef || !konst) return;

            coef.addEventListener("click", function() {
                resetExprState([coef, konst]);
                coef.classList.add("expr-correct");
                fb.innerHTML = alertSuccess(
                    "Benar. Angka 4 adalah koefisien di depan x, sehingga gradien persamaan tersebut adalah 4.",
                );
            });

            konst.addEventListener("click", function() {
                resetExprState([coef, konst]);
                konst.classList.add("expr-wrong");
                fb.innerHTML = alertDanger(
                    "Belum tepat. Angka 2 adalah konstanta, bukan gradien.",
                );
            });
        }

        /* =========================
           CONTOH 2: SUSUN LANGKAH
        ========================= */
        let draggedItemUrutan = null;

        function initUrutanLangkah() {
            const items = document.querySelectorAll(".sort-item");
            const slots = document.querySelectorAll(".sort-slot");
            const bank = document.querySelector(".sort-bank");

            if (!items.length || !slots.length || !bank) return;

            items.forEach((item) => {
                // =========================
                // DESKTOP DRAG
                // =========================
                item.addEventListener("dragstart", function(e) {
                    draggedItemUrutan = this;

                    e.dataTransfer.setData(
                        "text/plain",
                        this.dataset.step + "|" + this.innerHTML,
                    );

                    setTimeout(() => {
                        this.style.opacity = "0.5";
                    }, 0);
                });

                item.addEventListener("dragend", function() {
                    this.style.opacity = "1";
                    draggedItemUrutan = null;
                });

                // =========================
                // MOBILE TAP
                // =========================
                item.addEventListener(
                    "touchstart",
                    function(e) {
                        e.preventDefault();

                        const currentSlot = this.closest(".sort-slot");

                        // kalau item masih di bank → masuk ke slot kosong pertama
                        if (!currentSlot) {
                            const emptySlot = [...slots].find((slot) => {
                                return !slot.querySelector(".sort-item");
                            });

                            if (emptySlot) {
                                emptySlot.innerHTML = "";
                                emptySlot.dataset.filled = this.dataset.step;
                                emptySlot.appendChild(this);
                            }
                        }

                        // kalau item sudah di slot → balik ke bank
                        else {
                            const indexSlot = [...slots].indexOf(currentSlot);

                            bank.appendChild(this);

                            delete currentSlot.dataset.filled;

                            const defaults = [
                                "Letakkan langkah pertama di sini",
                                "Letakkan langkah berikutnya di sini",
                                "Letakkan langkah berikutnya di sini",
                                "Letakkan kesimpulan di sini",
                            ];

                            currentSlot.innerHTML = defaults[indexSlot];
                            currentSlot.classList.remove("correct", "wrong", "hovered");
                        }
                    }, {
                        passive: false
                    },
                );
            });

            slots.forEach((slot) => {
                slot.addEventListener("dragover", function(e) {
                    e.preventDefault();
                    this.classList.add("hovered");
                });

                slot.addEventListener("dragleave", function() {
                    this.classList.remove("hovered");
                });

                slot.addEventListener("drop", function(e) {
                    e.preventDefault();
                    this.classList.remove("hovered");

                    if (!draggedItemUrutan) return;

                    // kalau slot sudah ada item, balikin item lama ke bank
                    const existingItem = this.querySelector(".sort-item");
                    if (existingItem) {
                        bank.appendChild(existingItem);
                    }

                    this.innerHTML = "";
                    this.dataset.filled = draggedItemUrutan.dataset.step;
                    this.appendChild(draggedItemUrutan);
                });
            });

            // desktop: item bisa dikembalikan ke bank
            bank.addEventListener("dragover", function(e) {
                e.preventDefault();
            });

            bank.addEventListener("drop", function(e) {
                e.preventDefault();

                if (draggedItemUrutan) {
                    bank.appendChild(draggedItemUrutan);
                }
            });
        }

        function cekUrutanLangkah() {
            const slots = document.querySelectorAll(".sort-slot");
            const fb = document.getElementById("fbUrutanLangkah");
            let benar = 0;

            slots.forEach((slot) => {
                slot.classList.remove("correct", "wrong");

                const item = slot.querySelector(".sort-item");
                const jawabanUser = item?.dataset.step;

                if (jawabanUser === slot.dataset.answer) {
                    slot.classList.add("correct");
                    benar++;
                } else {
                    slot.classList.add("wrong");
                }
            });

            if (benar === 4) {
                fb.innerHTML = alertSuccess(
                    "Urutanmu sudah benar. Dari persamaan \\(6y = -3x + 12\\) diperoleh \\(y = -\\frac{1}{2}x + 2\\), sehingga gradiennya adalah \\(- \\frac{1}{2}\\).",
                );
            } else {
                fb.innerHTML = alertInfo(
                    "Masih ada urutan yang belum tepat. Ingat, persamaan harus diubah dulu ke bentuk \\(y = mx + c\\) sebelum gradien ditentukan.",
                );
            }

            renderKatexUlang(fb);
        }

        function resetUrutanLangkah() {
            const slots = document.querySelectorAll(".sort-slot");
            const bank = document.querySelector(".sort-bank");
            const fb = document.getElementById("fbUrutanLangkah");

            const defaults = [
                "Letakkan langkah pertama di sini",
                "Letakkan langkah berikutnya di sini",
                "Letakkan langkah berikutnya di sini",
                "Letakkan kesimpulan di sini",
            ];

            if (bank) {
                slots.forEach((slot) => {
                    const item = slot.querySelector(".sort-item");
                    if (item) {
                        bank.appendChild(item);
                    }
                });
            }

            slots.forEach((slot, i) => {
                slot.classList.remove("correct", "wrong", "hovered");
                delete slot.dataset.filled;
                slot.innerHTML = defaults[i];
            });

            if (fb) fb.innerHTML = "";
        }
        // Latihan Soal
        // =========================
        // LATIHAN SOAL SUBBAB B4
        // Akhir Subbab B: buka tombol Kuis
        // =========================

        document.addEventListener("DOMContentLoaded", function() {
            renderKatexUlang(
                document.getElementById("latihanGradienB4Box") || document.body,
            );
        });

        // =========================
        // HELPER
        // =========================
        function normGradien(teks) {
            return String(teks || "")
                .toLowerCase()
                .replace(/\s+/g, "")
                .replace(/[(){}[\]]/g, "")
                .replace(/−/g, "-")
                .trim();
        }

        function renderKatexUlang(el) {
            if (!window.renderMathInElement || !el) return;

            renderMathInElement(el, {
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
            renderKatexUlang(step);
            scrollKeStep(`latihanStep${stepNumber}`);
        }

        function prevLatihan(stepNumber) {
            scrollKeStep(`latihanStep${stepNumber}`);
        }

        function resetStepSetelah(stepMulai) {
            for (let i = stepMulai; i <= 3; i++) {
                const step = document.getElementById(`latihanStep${i}`);
                if (step) step.style.display = "none";
            }
        }

        function setValid(id, benar) {
            const el = document.getElementById(id);
            if (!el) return;

            el.classList.remove("is-valid", "is-invalid");
            el.classList.add(benar ? "is-valid" : "is-invalid");
        }

        function clearValid(ids) {
            ids.forEach((id) => {
                const el = document.getElementById(id);
                if (el) el.classList.remove("is-valid", "is-invalid");
            });
        }

        // =========================
        // SAVE PROGRESS + BUKA KUIS
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

        function bukaQuizButton() {
            const quizBtn = document.getElementById("quizBabBtn");
            if (!quizBtn) return;

            const url = quizBtn.dataset.quizUrl;
            if (!url) return;

            const link = document.createElement("a");
            link.href = url;
            link.id = "quizBabBtn";
            link.className = "btn btn-next px-4 rounded-pill fw-semibold";
            link.textContent = "Kuis →";

            quizBtn.replaceWith(link);
        }

        // =========================
        // LATIHAN 1
        // =========================
        function cekLatihan1Gradien() {
            const a = normGradien(document.getElementById("lat1a")?.value);
            const b = normGradien(document.getElementById("lat1b")?.value);

            const fb = document.getElementById("feedbackLatihan1Gradien");
            const nextBtn = document.getElementById("nextBtnLatihan1");

            if (!fb) return;

            clearValid(["lat1a", "lat1b"]);

            const benarA = a === "-5" || a === "-5/1";
            const benarB = b === "5/2";

            setValid("lat1a", benarA);
            setValid("lat1b", benarB);

            if (benarA && benarB) {
                fb.innerHTML = `
            <div class="alert alert-success mb-0">
                Bagus. Jawabanmu benar. Silakan lanjut ke latihan berikutnya.
            </div>
        `;

                if (nextBtn) nextBtn.disabled = false;
            } else {
                let pesan = `
            <div class="alert alert-warning mb-0">
                <b>Masih ada yang perlu diperbaiki.</b>
                <ul class="mb-0 mt-2">
        `;

                if (!benarA) {
                    pesan += `<li>Soal a: gradien pada bentuk \\(y=mx+c\\) adalah koefisien di depan \\(x\\).</li>`;
                }

                if (!benarB) {
                    pesan += `<li>Soal b: ubah dulu ke bentuk \\(y=mx+c\\), lalu sederhanakan koefisien \\(x\\).</li>`;
                }

                pesan += `
                </ul>
            </div>
        `;

                fb.innerHTML = pesan;

                if (nextBtn) nextBtn.disabled = true;
                resetStepSetelah(2);
            }

            renderKatexUlang(fb);
        }

        function resetLatihan1Gradien() {
            ["lat1a", "lat1b"].forEach((id) => {
                const el = document.getElementById(id);
                if (el) {
                    el.value = "";
                    el.classList.remove("is-valid", "is-invalid");
                }
            });

            const fb = document.getElementById("feedbackLatihan1Gradien");
            const nextBtn = document.getElementById("nextBtnLatihan1");

            if (fb) fb.innerHTML = "";
            if (nextBtn) nextBtn.disabled = true;

            resetStepSetelah(2);
        }

        // =========================
        // LATIHAN 2
        // =========================
        function cekLatihan2Gradien() {
            const a = normGradien(document.getElementById("lat2a")?.value);
            const b = normGradien(document.getElementById("lat2b")?.value);

            const fb = document.getElementById("feedbackLatihan2Gradien");
            const nextBtn = document.getElementById("nextBtnLatihan2");

            if (!fb) return;

            clearValid(["lat2a", "lat2b"]);

            const benarA = a === "-2" || a === "-2/1";
            const benarB = b === "3/2";

            setValid("lat2a", benarA);
            setValid("lat2b", benarB);

            if (benarA && benarB) {
                fb.innerHTML = `
            <div class="alert alert-success mb-0">
                Bagus. Jawabanmu benar. Silakan lanjut ke latihan berikutnya.
            </div>
        `;

                if (nextBtn) nextBtn.disabled = false;
            } else {
                let pesan = `
            <div class="alert alert-warning mb-0">
                <b>Masih ada yang perlu diperbaiki.</b>
                <ul class="mb-0 mt-2">
        `;

                if (!benarA) {
                    pesan +=
                        `<li>Soal a: gunakan hubungan gradien pada bentuk umum atau ubah dulu ke bentuk \\(y=mx+c\\).</li>`;
                }

                if (!benarB) {
                    pesan += `<li>Soal b: perhatikan tanda koefisien \\(y\\), lalu sederhanakan hasil pecahannya.</li>`;
                }

                pesan += `
                </ul>
            </div>
        `;

                fb.innerHTML = pesan;

                if (nextBtn) nextBtn.disabled = true;
                resetStepSetelah(3);
            }

            renderKatexUlang(fb);
        }

        function resetLatihan2Gradien() {
            ["lat2a", "lat2b"].forEach((id) => {
                const el = document.getElementById(id);
                if (el) {
                    el.value = "";
                    el.classList.remove("is-valid", "is-invalid");
                }
            });

            const fb = document.getElementById("feedbackLatihan2Gradien");
            const nextBtn = document.getElementById("nextBtnLatihan2");

            if (fb) fb.innerHTML = "";
            if (nextBtn) nextBtn.disabled = true;

            resetStepSetelah(3);
        }

        // =========================
        // LATIHAN 3
        // =========================
        async function cekLatihan3Gradien() {
            const a = normGradien(document.getElementById("lat3a")?.value);
            const b = normGradien(document.getElementById("lat3b")?.value);
            const c = normGradien(document.getElementById("lat3c")?.value);

            const fb = document.getElementById("feedbackLatihan3Gradien");
            const akhir = document.getElementById("pesanAkhirLatihan");

            if (!fb) return;

            clearValid(["lat3a", "lat3b", "lat3c"]);

            const benarA = a === "3" || a === "3/1";
            const benarB = b === "-2" || b === "-2/1";
            const benarC = c === "jalana" || c === "jalana." || c === "a";

            setValid("lat3a", benarA);
            setValid("lat3b", benarB);
            setValid("lat3c", benarC);

            if (benarA && benarB && benarC) {
                fb.innerHTML = `
        <div class="alert alert-success mb-0">
            Bagus. Jawabanmu benar.
        </div>
    `;

                if (akhir) {
                    akhir.classList.remove("d-none");
                    renderKatexUlang(akhir);
                }

                const saved = await saveProgressMateri();

                if (saved) {
                    bukaQuizButton();
                } else if (akhir) {
                    akhir.insertAdjacentHTML(
                        "beforeend",
                        `
            <div class="alert alert-warning mt-2 mb-0">
                Jawaban benar, tetapi progres belum tersimpan. Coba cek koneksi atau refresh halaman.
            </div>
            `,
                    );
                }
            } else {
                let pesan = `
            <div class="alert alert-warning mb-0">
                <b>Masih ada yang perlu diperbaiki.</b>
                <ul class="mb-0 mt-2">
        `;

                if (!benarA) {
                    pesan += `<li>Jalan A: ubah dulu persamaan sehingga \\(y\\) berada sendiri di ruas kiri.</li>`;
                }

                if (!benarB) {
                    pesan +=
                        `<li>Jalan B: tentukan gradien dari bentuk umum dengan memperhatikan koefisien \\(x\\) dan \\(y\\).</li>`;
                }

                if (!benarC) {
                    pesan +=
                        `<li>Bandingkan nilai mutlak gradien kedua jalan untuk menentukan jalan yang lebih curam.</li>`;
                }

                pesan += `
                </ul>
            </div>
        `;
                fb.innerHTML = pesan;
                if (akhir) akhir.classList.add("d-none");
            }
            renderKatexUlang(fb);
        }

        function resetLatihan3Gradien() {
            ["lat3a", "lat3b", "lat3c"].forEach((id) => {
                const el = document.getElementById(id);
                if (el) {
                    el.value = "";
                    el.classList.remove("is-valid", "is-invalid");
                }
            });

            const fb = document.getElementById("feedbackLatihan3Gradien");
            const akhir = document.getElementById("pesanAkhirLatihan");

            if (fb) fb.innerHTML = "";
            if (akhir) akhir.classList.add("d-none");
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
