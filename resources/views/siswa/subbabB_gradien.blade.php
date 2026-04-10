@extends('layout.halaman-materi')

@section('content')
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

        /* tambahan */
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

        .badge-mini {
            font-size: 12px;
            padding: 6px 10px;
            border-radius: 999px;
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

        .img-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(220px, 1fr));
            gap: 14px;
        }

        .img-grid figure {
            margin: 0;
            text-align: center;
        }

        .img-grid img {
            width: 100%;
            max-width: 340px;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
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
    </style>

    <style>
        .pecahan-input {
            display: inline-flex;
            flex-direction: column;
            align-items: center;
        }

        .pecahan-input input {
            width: 90px;
            text-align: center;
        }

        .garis-pecahan {
            width: 95px;
            border-top: 2px solid #333;
            margin: 6px 0;
        }
    </style>

    {{-- css pilihan ganda --}}
    <style>
        .quiz-card .form-check {
            padding-left: 0;
            /* hilangkan offset bawaan bootstrap */
        }

        .quiz-card .form-check-input {
            margin-left: 0;
            /* hilangkan minus margin */
            margin-right: 10px;
            /* beri jarak ke teks */
            position: relative;
        }
    </style>

    <style>
        .drag-bank {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .drag-item {
            padding: 10px 14px;
            border: 1px solid #cfd8e3;
            border-radius: 10px;
            background: #f8fbff;
            cursor: grab;
            font-weight: 600;
            user-select: none;
        }

        .drag-item:active {
            cursor: grabbing;
        }

        .drop-zone {
            border: 2px dashed #b8c7db;
            border-radius: 12px;
            padding: 12px;
            background: #fcfdff;
            min-height: 90px;
        }

        .drop-slot {
            margin-top: 10px;
            min-height: 42px;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
        }

        .drop-zone.hovered {
            background: #eef5ff;
            border-color: #4a76b8;
        }

        .drop-zone.correct {
            border-color: #22b969;
            background: #f2fff8;
        }

        .drop-zone.wrong {
            border-color: #dc3545;
            background: #fff5f5;
        }
    </style>

    {{-- Judul --}}
    <h1 class="mb-3" style="font-weight: 600;">B. Gradien (Kemiringan Garis)</h1>

    {{-- Tujuan Pembelajaran --}}
    <div class="card card-tujuan mb-4">
        <div class="card-body">
            <h5>Tujuan Pembelajaran:</h5>
            <ol>
                <li>Siswa dapat menentukan Kemiringan Garis Lurus</li>
            </ol>
        </div>
    </div>

    {{-- Subjudul --}}
    <h2 class="mt-2 mb-3" style="font-weight: 600;">1. Pengertian Gradien (Kemiringan)</h2>

    <div class="position-relative p-4 mt-5" style="border:2px solid #4a76b8; border-radius:6px; background-color:white;">

        <div class="position-absolute px-3 py-2 text-white fw-bold"
            style="top:-18px; left:20px; background-color:#4a76b8; border-radius:8px;">
            Eksplorasi Kemiringan
        </div>

        <p style="line-height:1.8; text-align: justify;">
            Geser kedua slider, lalu amati perubahan bentuk papan.
            Perhatikan hubungan antara nilai <b>Naik</b> dan <b>Maju</b>.
            Jika nilai <b>Naik</b> semakin besar, apakah papan tampak semakin curam?
            Jika nilai <b>Maju</b> semakin besar, apakah papan tampak lebih landai?
        </p>

        <p style="line-height:1.8; text-align: justify;">
            Dari pengamatan ini, kamu akan memahami bahwa kemiringan garis dapat dilihat
            dari perbandingan perubahan ke atas dengan perubahan ke samping.
        </p>

        <div id="papan-canvas" class="mb-3"></div>

        <div class="mb-3">
            <div style="line-height:1.8;">
                1) Setelah kamu mencoba menggeser slider, bagaimana bentuk papan jika nilai
                <b>naik</b> diperbesar, sedangkan nilai <b>maju</b> tetap?
            </div>
            <select id="q1" class="form-select form-select-sm w-auto mt-1">
                <option value="">-- pilih --</option>
                <option value="tegak">lebih tegak</option>
                <option value="landai">lebih landai</option>
                <option value="tetap">tetap</option>
            </select>
        </div>

        <div class="mb-3">
            <div style="line-height:1.8;">
                2) Sekarang perhatikan kondisi sebaliknya. Bagaimana bentuk papan jika nilai
                <b>maju</b> diperbesar, sedangkan nilai <b>naik</b> tetap?
            </div>
            <select id="q2" class="form-select form-select-sm w-auto mt-1">
                <option value="">-- pilih --</option>
                <option value="tegak">lebih tegak</option>
                <option value="landai">lebih landai</option>
                <option value="tetap">tetap</option>
            </select>
        </div>

        <div class="mb-3">
            <div style="line-height:1.8;">
                3) Berdasarkan hasil pengamatanmu, kemiringan papan ditentukan oleh perbandingan
            </div>

            <div class="d-flex align-items-center flex-wrap gap-2 mt-2">
                <select id="q3a" class="form-select form-select-sm w-auto">
                    <option value="">-- pilih --</option>
                    <option value="naik">naik</option>
                    <option value="maju">maju</option>
                    <option value="warna">warna</option>
                    <option value="panjang">panjang</option>
                </select>
                <span>dan</span>
                <select id="q3b" class="form-select form-select-sm w-auto">
                    <option value="">-- pilih --</option>
                    <option value="naik">naik</option>
                    <option value="maju">maju</option>
                    <option value="warna">warna</option>
                    <option value="panjang">panjang</option>
                </select>
            </div>
        </div>

        <button class="btn btn-palet mt-2" onclick="cekJawabanPapan()">Cek Jawaban</button>
        <div id="feedbackPapan" class="mt-2"></div>
    </div>

    <div id="lanjutanGradien" style="display:none;">
        <div id="deltaMatchBox" class="card card-materi mt-3 mb-3">
            <div class="card-body">
                <p style="line-height:1.8; text-align:justify;">
                    Sebelum masuk ke rumus gradien, pasangkan terlebih dahulu istilah berikut
                    dengan makna yang sesuai.
                </p>

                <div class="row g-3">
                    <div class="col-md-5">
                        <div class="drag-bank">
                            <div class="drag-item" draggable="true" data-value="dy">Δy</div>
                            <div class="drag-item" draggable="true" data-value="dx">Δx</div>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="drop-zone mb-3" data-answer="dy">
                            <strong>Perubahan vertikal (naik/turun)</strong>
                            <div class="drop-slot"></div>
                        </div>

                        <div class="drop-zone" data-answer="dx">
                            <strong>Perubahan horizontal (maju/mundur)</strong>
                            <div class="drop-slot"></div>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="button" class="btn btn-palet btn-sm" onclick="cekPasanganDelta()">Cek</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm"
                        onclick="resetPasanganDelta()">Reset</button>
                </div>

                <div id="feedbackDelta" class="mt-3"></div>
            </div>
        </div>

        <div class="card card-materi mt-3 mb-3">
            <div class="card-body">
                <p style="line-height:1.8; text-align:justify;">
                    Berdasarkan penjelasan yang telah kamu pelajari, lengkapi pernyataan berikut.
                </p>
                <div class="d-flex align-items-center flex-wrap gap-2">
                    <span>Gradien merupakan perbandingan</span>

                    <select id="gradienCompare1" class="form-select form-select-sm w-auto">
                        <option value="">-- pilih --</option>
                        <option value="dy">Δy</option>
                        <option value="dx">Δx</option>
                    </select>

                    <span>terhadap</span>

                    <select id="gradienCompare2" class="form-select form-select-sm w-auto">
                        <option value="">-- pilih --</option>
                        <option value="dy">Δy</option>
                        <option value="dx">Δx</option>
                    </select>

                    <button type="button" class="btn btn-palet btn-sm" onclick="cekPerbandinganGradien()">Cek</button>
                </div>

                <div id="feedbackPerbandinganGradien" class="mt-2"></div>
            </div>

        </div>

        <div class="card card-materi mt-3 mb-3">
            <div class="card-body">
                <p style="line-height:1.8; text-align: justify;">
                    Dari kegiatan eksplorasi tadi, kamu telah melihat bahwa kemiringan papan
                    ditentukan oleh perbandingan antara <b>naik</b> dan <b>maju</b>.
                    Semakin besar nilai naik dibanding maju, papan tampak semakin curam.
                    Sebaliknya, jika nilai maju lebih besar, papan tampak lebih landai.
                </p>

                <p style="line-height:1.8; text-align: justify;">
                    Dalam sistem koordinat, perubahan <b>naik</b> dinyatakan sebagai perubahan nilai pada sumbu-$y$
                    dan ditulis dengan $ \Delta y $.
                    Adapun perubahan <b>maju</b> dinyatakan sebagai perubahan nilai pada sumbu-$x$
                    dan ditulis dengan $ \Delta x $.
                </p>

                <p style="line-height:1.8; text-align: justify;">
                    Oleh karena itu, untuk menyatakan kemiringan garis secara matematis,
                    kita menggunakan <b>gradien</b>.
                    Gradien suatu garis dirumuskan sebagai:
                </p>

                <div class="rumus-box text-center my-3">
                    $$
                    m = \frac{\Delta y}{\Delta x}
                    = \frac{\text{Perubahan panjang sisi tegak (vertikal)}}{\text{Perubahan panjang sisi
                    mendatar(horizontal)}}
                    $$
                </div>

                <p style="line-height:1.8; text-align: justify;">
                    Jadi, gradien menunjukkan seberapa besar perubahan nilai $y$
                    untuk setiap satu satuan perubahan nilai $x$.
                </p>
                <p style="line-height:1.8;">
                    Semakin curam suatu garis, maka nilai gradiennya semakin besar.
                    Sebaliknya, semakin landai suatu garis, maka nilai gradiennya semakin kecil.
                </p>
            </div>
        </div>

        <p class="mb-2" style="line-height: 1.8;">
            Garis lurus memiliki kemiringan atau gradien dengan ciri-ciri sebagai berikut:
        </p>

        <ol style="line-height: 1.8;">
            <li>
                Garis yang miring ke kanan atas atau ke kiri bawah memiliki gradien <b>positif</b>.
                Artinya, ketika arah gerak dari kiri ke kanan, nilai <b>y</b> meningkat.
            </li>
            <li>
                Garis yang miring ke kiri atas atau ke kanan bawah memiliki gradien <b>negatif</b>.
                Dalam hal ini, saat bergerak ke kanan, nilai <b>y</b> justru menurun.
            </li>
            <li>
                Garis yang datar tidak memiliki kemiringan, sehingga gradiennya <b>nol (0)</b>.
                Sedangkan garis yang tegak lurus sumbu-x tidak memiliki nilai gradien yang <b>terdefinisi</b>.
            </li>
        </ol>

        <p class="mb-2 mt-3" style="line-height: 1.8;">
            Untuk memahami cara menentukan arah gradien suatu garis, perhatikan tanda perubahan komponen koordinat
            berikut:
        </p>

        <ul style="line-height: 1.9;">
            <li>Komponen <b>y</b> bernilai positif (+) jika bergerak ke atas, dan negatif (−) jika bergerak ke bawah.
            </li>
            <li>Komponen <b>x</b> bernilai positif (+) jika bergerak ke kanan, dan negatif (−) jika bergerak ke kiri.
            </li>
        </ul>

        <div class="img-grid mb-4">
            <figure>
                <img src="{{ asset('img/gradien/mpositif.png') }}" alt="Contoh gradien positif">
                <figcaption class="mt-2"><span class="badge bg-primary badge-mini">m = positif</span></figcaption>
            </figure>
            <figure>
                <img src="{{ asset('img/gradien/mnegatif.png') }}" alt="Contoh gradien negatif">
                <figcaption class="mt-2"><span class="badge bg-primary badge-mini">m = negatif</span></figcaption>
            </figure>
            <figure>
                <img src="{{ asset('img/gradien/mdatar.png') }}" alt="Contoh gradien nol">
                <figcaption class="mt-2"><span class="badge bg-secondary badge-mini">m = 0</span></figcaption>
            </figure>
            <figure>
                <img src="{{ asset('img/gradien/mtakterdefinisi.png') }}" alt="Contoh gradien tidak terdefinisi">
                <figcaption class="mt-2"><span class="badge bg-secondary badge-mini">m tidak terdefinisi</span>
                </figcaption>
            </figure>
        </div>

        <div id="klasifikasiGradienBox" class="card card-materi mt-4 mb-4">
            <div class="card-body">
                <p style="line-height:1.8; text-align:justify;">
                    Perhatikan beberapa bentuk garis berikut, kemudian pasangkan masing-masing
                    garis dengan jenis gradien yang sesuai.
                </p>

                <div class="row g-3">
                    <div class="col-lg-5">
                        <div class="drag-bank">
                            <div class="drag-item" draggable="true" data-value="nol">Garis datar</div>
                            <div class="drag-item" draggable="true" data-value="positif">Garis naik</div>
                            <div class="drag-item" draggable="true" data-value="takdef">Garis tegak</div>
                            <div class="drag-item" draggable="true" data-value="negatif">Garis turun</div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="drop-zone mb-3" data-answer="positif">
                            <strong>Gradien positif</strong>
                            <div class="drop-slot"></div>
                        </div>

                        <div class="drop-zone mb-3" data-answer="negatif">
                            <strong>Gradien negatif</strong>
                            <div class="drop-slot"></div>
                        </div>

                        <div class="drop-zone mb-3" data-answer="nol">
                            <strong>Gradien nol</strong>
                            <div class="drop-slot"></div>
                        </div>

                        <div class="drop-zone" data-answer="takdef">
                            <strong>Tidak terdefinisi</strong>
                            <div class="drop-slot"></div>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="button" class="btn btn-palet btn-sm" onclick="cekKlasifikasiGradien()">Cek</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm"
                        onclick="resetKlasifikasiGradien()">Reset</button>
                </div>

                <div id="feedbackKlasifikasiGradien" class="mt-3"></div>
            </div>
        </div>

        <div class="card card-materi mt-4 mb-4">
            <div class="card-body p-4">
                <span class="badge-latihan">Latihan</span>

                <p class="mb-3" style="line-height:1.8; text-align:justify;">
                    Perhatikan ruas garis pada gambar berikut, lalu ikuti langkah-langkah berikut untuk menentukan
                    gradiennya.
                </p>

                <div class="text-center mb-4">
                    <img src="{{ asset('img/gradien/contoh1gradien.png') }}" alt="Contoh gradien"
                        style="max-width: 360px; width: 100%; border-radius: 12px; border:1px solid #e5e7eb;">
                </div>

                {{-- Langkah 1 --}}
                <div class="border rounded-4 p-3 mb-3" style="background:#f7f9fc;">
                    <div class="fw-bold mb-2">Langkah 1</div>
                    <p class="mb-2" style="line-height:1.8;">
                        Setelah memperhatikan ruas garis tersebut, bagaimana arah garis jika dilihat dari kiri ke kanan?
                    </p>

                    <div class="d-flex gap-2 flex-wrap">
                        <button type="button" class="btn btn-outline-primary btn-sm"
                            onclick="cekArahGaris('naik')">Naik</button>
                        <button type="button" class="btn btn-outline-primary btn-sm"
                            onclick="cekArahGaris('turun')">Turun</button>
                        <button type="button" class="btn btn-outline-primary btn-sm"
                            onclick="cekArahGaris('datar')">Datar</button>
                    </div>

                    <div id="fbLangkah1" class="mt-3"></div>
                </div>

                {{-- Langkah 2 --}}
                <div id="step2Gradien" class="border rounded-4 p-3 mb-3" style="background:#f7f9fc; display:none;">
                    <div class="fw-bold mb-2">Langkah 2</div>
                    <p id="teksLangkah2" class="mb-2" style="line-height:1.8;">
                        Berdasarkan arah garis yang telah kamu tentukan, sekarang tentukan perubahan vertikalnya.
                    </p>

                    <div class="row g-3 align-items-end">
                        <div class="col-12 col-md-4">
                            <label class="form-label fw-semibold">Banyak kotak perubahan vertikal (Δy)</label>
                            <input type="text" id="inputDyBesar" class="form-control">
                        </div>
                        <div class="col-12 col-md-8">
                            <button type="button" class="btn btn-palet btn-sm" onclick="cekDeltaY()">Cek</button>
                            <button type="button" class="btn btn-outline-secondary btn-sm"
                                onclick="resetDeltaY()">Reset</button>
                        </div>
                    </div>

                    <div id="fbLangkah2" class="mt-3"></div>
                </div>

                {{-- Langkah 3 --}}
                <div id="step3Gradien" class="border rounded-4 p-3 mb-3" style="background:#f7f9fc; display:none;">
                    <div class="fw-bold mb-2">Langkah 3</div>
                    <p class="mb-2" style="line-height:1.8;">
                        Sekarang, hitung banyak kotak perubahan mendatar pada garis tersebut.
                    </p>

                    <div class="row g-3 align-items-end">
                        <div class="col-12 col-md-4">
                            <label class="form-label fw-semibold">Banyak kotak perubahan mendatar (Δx)</label>
                            <input type="text" id="inputDxBesar" class="form-control">
                        </div>
                        <div class="col-12 col-md-8">
                            <button type="button" class="btn btn-palet btn-sm" onclick="cekDeltaX()">Cek</button>
                            <button type="button" class="btn btn-outline-secondary btn-sm"
                                onclick="resetDeltaX()">Reset</button>
                        </div>
                    </div>

                    <div id="fbLangkah3" class="mt-3"></div>
                </div>

                {{-- Langkah 4 --}}
                <div id="step4Gradien" class="border rounded-4 p-3 mb-3" style="background:#f7f9fc; display:none;">
                    <div class="fw-bold mb-2">Langkah 4</div>

                    <p class="mb-2" style="line-height:1.8;">
                        Gunakan rumus gradien berikut.
                    </p>

                    <div class="rumus-box text-center mb-3">
                        $$ m = \frac{\Delta y}{\Delta x} $$
                    </div>

                    <p class="mb-3" style="line-height:1.8;">
                        Setelah menentukan nilai <b>\(\Delta y\)</b> dan <b>\(\Delta x\)</b>, sekarang substitusikan
                        kedua nilai tersebut ke dalam bentuk pecahan berikut.
                    </p>

                    <div class="d-flex align-items-center flex-wrap gap-3">
                        <div style="font-size:24px; font-weight:600;">\( m = \)</div>

                        <div class="pecahan-input">
                            <input type="text" id="inputPembilang" class="form-control form-control-sm">
                            <div class="garis-pecahan"></div>
                            <input type="text" id="inputPenyebut" class="form-control form-control-sm">
                        </div>

                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-palet btn-sm" onclick="cekSubstitusi()">Cek</button>
                            <button type="button" class="btn btn-outline-secondary btn-sm"
                                onclick="resetSubstitusi()">Reset</button>
                        </div>
                    </div>

                    <div id="fbLangkah4" class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/p5@1.9.0/lib/p5.min.js"></script>
    <script src="{{ asset('js/subbabB/eksplorasi_papan.js') }}"></script>
    <script src="{{ asset('js/subbabB/subbabB_gradien.js') }}"></script>
@endsection

@section('nav')
    <a href="{{ route('subbabA2.2') }}" class="btn btn-prev px-4 rounded-pill">
        ← Prev
    </a>
    <a href="{{ route('subbabB_gradiensatutitik') }}" class="btn btn-next px-4 rounded-pill fw-semibold">
        Next →
    </a>
@endsection
