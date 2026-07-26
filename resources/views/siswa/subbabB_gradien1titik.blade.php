@extends('layout.halaman-materi')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/subbabB/subbabB_gradien1titik.css') }}">

    <style>
        .rumus-box {
            display: inline-block;
            background: #fff3cd;
            border: 1px solid #ffe69c;
            padding: 10px 30px;
            font-size: 20px;
            border-radius: 12px;
        }

        /* ====== RESPONSIVE MOBILE .input-kecil====== */
        @media (max-width: 768px) {

            /* ---------- P5 CANVAS ---------- */
            #segaris-origin-canvas {
                width: 100%;
                overflow-x: hidden;
            }

            #segaris-origin-canvas canvas,
            #segaris-origin-canvas .p5Canvas {
                max-width: 100% !important;
                height: auto !important;
                display: block;
                margin: 0 auto;
            }

            /* ---------- RUMUS ---------- */
            .rumus-box {
                display: block;
                width: fit-content;
                max-width: 100%;
                margin: 16px auto 22px;
                padding: 10px 28px;

                background: transparent;
                border: none;
                border-bottom: 2px solid #d8c8ff;

                font-size: 20px;
                text-align: center;
                overflow-x: auto;
            }

            /* ---------- GAMBAR ---------- */
            .img-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .img-grid img,
            .zoomable,
            .img-fluid {
                width: 100%;
                max-width: 100%;
                height: auto;
            }

            /* ---------- INPUT PECAHAN ---------- */
            .frac-input input,
            .jawaban-latihan {
                font-size: 14px;
            }

            /* ---------- FLEX INPUT ---------- */
            .d-flex.align-items-center.gap-3.flex-wrap {
                gap: 10px !important;
            }

            /* ---------- BUTTON ---------- */
            .btn-palet {
                width: auto;
            }

            /* tombol next */
            #nextBtnLatihan1,
            #nextBtnLatihan2 {
                width: 100%;
            }

            /* layout tombol latihan */
            .d-flex.justify-content-between.align-items-center.flex-wrap.gap-2 {
                flex-direction: column;
                align-items: stretch !important;
                gap: 10px;
            }

            .d-flex.justify-content-between.align-items-center.flex-wrap.gap-2>div {
                width: 100%;
                display: flex;
                flex-direction: column;
                gap: 8px;
            }

            .d-flex.justify-content-between.align-items-center.flex-wrap.gap-2 .btn {
                width: 100%;
                margin-left: 0 !important;
            }

            /* ---------- LATIHAN 2 KOLOM ---------- */
            .latihan-dua-kolom {
                flex-direction: column;
            }

            /* ---------- INPUT KECIL ---------- */
            .input-kecil {
                width: 70px !important;
                min-width: 70px !important;
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
    </style>

    {{-- Subjudul --}}
    <h2 class="mt-2 mb-3" style="font-weight: 600;">2. Gradien garis yang melewati titik $(0, 0)$ dan $A(x_1,y_1)$</h2>

    <script src="https://cdn.jsdelivr.net/npm/p5@1.9.0/lib/p5.min.js"></script>
    <script src="{{ asset('js/subbabB/eksplorasi_segaris.js') }}"></script>

    {{-- Materi --}}
    <div class="card card-materi mb-4">
        <div class="card-body p-4">
            <p class="mb-3" style="line-height: 1.8; text-align: justify;">
                Untuk menentukan gradien garis yang melalui titik pusat $(0,0)$ dan titik lain $A(x_1,y_1)$,
                kita cukup memperhatikan koordinat titik $A(x_1,y_1)$. Penjelasan tersebut dapat dilihat pada
                Gambar 2.5.
            </p>

            {{-- Ilustrasi --}}
            <div class="img-grid mb-3">
                <figure>
                    <img class="zoomable" src="{{ asset('img/gradien/gradiensatutitik.png') }}"
                        alt="Garis yang melewati titik pusat dan titik A" style="max-width: 360px; width: 100%;">

                    <figcaption class="mt-2 text-muted text-center" style="font-size: 13px;">
                        <strong>Gambar 2.5</strong> Garis yang melewati $(0,0)$ dan $A(x_1,y_1)$
                    </figcaption>
                </figure>
            </div>

            <p class="mb-2" style="line-height: 1.8; text-align: justify;">
                Gradien garis pada Gambar 2.5 dapat diketahui dari perbandingan nilai $y_1$ terhadap $x_1$.
                Secara umum, gradien garis yang melalui titik $(0,0)$ dan titik $A(x_1,y_1)$ dirumuskan:
            </p>

            <div class="rumus-box mb-3">
                $$ m = \frac{y_1 - 0}{x_1 - 0} $$
                <div class="text-muted" style="font-size: 14px;">Disederhanakan menjadi:</div>
                $$ m = \frac{y_1}{x_1} $$
            </div>
        </div>
    </div>

    {{-- Contoh --}}
    <div class="box-contoh mt-5 mb-4">
        <div class="card-body p-2">

            <span class="title-box">Contoh</span>

            <!-- ===================== -->
            <!-- CONTOH 1 -->
            <!-- ===================== -->
            <div class="mt-3 mb-4">
                <p class="fw-bold mb-2">Contoh 1</p>

                <p style="line-height:1.8; text-align: justify;">
                    Tentukan gradien garis yang melalui titik <b>O(0,0)</b> dan titik <b>A(6,3)</b>.
                </p>

                <p style="line-height:1.8; text-align: justify;">
                    Karena garis melalui titik pusat <b>O(0,0)</b>, maka gradien dapat ditentukan dengan rumus:
                </p>

                <div class="rumus-box text-center mb-3">
                    $$m = \frac{y_1}{x_1}$$
                </div>

                <p style="line-height:1.8; text-align: justify;">
                    Pada titik <b>A(6,3)</b>, diperoleh $x_1 = 6$ dan $y_1 = 3$.
                    Maka:
                </p>

                <div class="penyelesaian-singkat">
                    $$m = \frac{y_1}{x_1} = \frac{3}{6} = \frac{1}{2}$$
                </div>

                <div class="kesimpulan-sejajar mt-3">
                    <b>Jadi,</b> gradien garis yang melalui titik <b>O(0,0)</b>
                    dan titik <b>A(6,3)</b> adalah <b>$\frac{1}{2}$</b>.
                </div>
            </div>

            <hr class="my-4">

            <!-- ===================== -->
            <!-- CONTOH 2 -->
            <!-- ===================== -->
            <div class="mt-3">
                <p class="fw-bold mb-2">Contoh 2</p>

                <p style="line-height:1.8; text-align: justify;">
                    Tentukan gradien garis yang melalui titik <b>O(0,0)</b> dan titik <b>B(4,8)</b>.
                </p>

                <div class="petunjuk-mini-latihan mb-3">
                    <strong>Petunjuk:</strong>
                    Isi nilai \(x_1\) dan \(y_1\),
                    kemudian lengkapi bentuk pecahan dan hasil akhirnya.
                </div>

                <p style="line-height:1.8; text-align: justify;">
                    Pada titik <b>B(4,8)</b>, nilai
                    $x_1 =$
                    <input type="text" id="cobaX1"
                        class="form-control w-auto text-center jawaban-latihan d-inline-block bg-white"
                        style="max-width:70px;">

                    dan

                    $y_1 =$
                    <input type="text" id="cobaY1"
                        class="form-control w-auto text-center jawaban-latihan d-inline-block bg-white"
                        style="max-width:70px;">

                    . Lengkapi bentuk berikut:
                </p>

                <div class="d-flex align-items-center justify-content-center gap-3 flex-wrap my-3">

                    <span style="font-size:20px;">
                        $m = \displaystyle\frac{y_1}{x_1} =$
                    </span>

                    <div class="d-flex flex-column align-items-center">
                        <input type="text" id="cobaPembilang"
                            class="form-control w-auto text-center jawaban-latihan bg-white" style="max-width:70px;">
                        <div class="border-top border-2 border-dark my-2" style="width:90px;"></div>
                        <input type="text" id="cobaPenyebut"
                            class="form-control w-auto text-center jawaban-latihan bg-white" style="max-width:70px;">
                    </div>

                    <span style="font-size:20px;">=</span>

                    <input type="text" id="cobaHasil" class="form-control w-auto text-center jawaban-latihan bg-white"
                        style="max-width:70px;">
                </div>

                <button class="btn btn-palet btn-sm mt-2" type="button" onclick="cekCobaGradien()">
                    Cek Jawaban
                </button>

                <div id="fbCobaGradien" class="mt-3"></div>
            </div>

        </div>
    </div>

    {{-- Script Contoh --}}
    <script>
        function normInputGradien(value) {
            return String(value || "")
                .trim()
                .replace(/\s+/g, "")
                .replace(",", ".");
        }

        function cekCobaGradien() {
            const x1 = normInputGradien(document.getElementById("cobaX1")?.value);
            const y1 = normInputGradien(document.getElementById("cobaY1")?.value);
            const pembilang = normInputGradien(document.getElementById("cobaPembilang")?.value);
            const penyebut = normInputGradien(document.getElementById("cobaPenyebut")?.value);
            const hasil = normInputGradien(document.getElementById("cobaHasil")?.value);

            const fb = document.getElementById("fbCobaGradien");
            if (!fb) return;

            const benar =
                x1 === "4" &&
                y1 === "8" &&
                pembilang === "8" &&
                penyebut === "4" &&
                (hasil === "2" || hasil === "2/1");

            if (benar) {
                fb.innerHTML = `
            <div class="alert alert-success mb-0">
                <strong>Benar.</strong><br>
                Pada titik $B(4,8)$, diperoleh $x_1 = 4$ dan $y_1 = 8$.
                Maka:
                <div class="text-center mt-2 mb-2">
                    $m = \\frac{y_1}{x_1} = \\frac{8}{4} = 2$
                </div>
                Jadi, gradien garis yang melalui titik $O(0,0)$ dan $B(4,8)$ adalah $2$.
            </div>
        `;
            } else {
                fb.innerHTML = `
            <div class="alert alert-danger mb-0">
                <strong>Belum tepat.</strong><br>
                Ingat, pada titik $B(4,8)$, nilai $x_1$ adalah koordinat pertama,
                sedangkan nilai $y_1$ adalah koordinat kedua. Setelah itu,
                substitusikan ke rumus $m = \\frac{y_1}{x_1}$.
            </div>
        `;
            }

            renderMathSafe(fb);
        }
    </script>

    <script>
        const MATERI_ID = @json($materi->id);
        const MATERI_SLUG = @json($materi->slug);
        const IS_MATERI_COMPLETED = @json((bool) ($materialProgress->is_completed ?? false));
        const SAVED_LATIHAN = @json($latihanProgress ?? []);
        const LATIHAN_PROGRESS_URL = @json(route('latihan.progress.store', $materi->id));
    </script>

    <div class="box-latihan mt-5 mb-4">
        <div class="card-body p-2">

            <span class="title-box">Latihan Soal</span>

            <div id="latihan1" class="latihan-step">

                <p style="line-height:1.8;">
                    <b>1.</b> Seorang pendaki memulai perjalanan dari kaki gunung pada titik
                    <b>$O(0,0)$</b>. Ia dapat memilih dua jalur untuk mencapai pos pendakian,
                    yaitu jalur <b>$A(8,4)$</b> dan jalur <b>$B(6,4)$</b>.
                    Angka pertama menyatakan jarak mendatar dalam kilometer, sedangkan angka kedua
                    menyatakan kenaikan tinggi dalam kilometer.
                    Tentukan gradien masing-masing jalur, lalu pilih jalur yang <b>lebih landai</b>
                    agar pendaki lebih mudah naik ke gunung.
                </p>

                <div class="petunjuk-mini-latihan">
                    <strong>Petunjuk:</strong>
                    Isilah bagian pembilang dan penyebut pada bentuk pecahan yang tersedia, kemudian tuliskan jalur yang
                    lebih landai pada kolom jawaban.
                </div>

                <p class="mb-2"><b>Penyelesaian:</b></p>

                <div class="row g-4 latihan-dua-kolom">

                    <div class="col-md-6">
                        <div class="kolom-latihan">
                            <p class="mb-2">
                                <b>a.</b> Gradien garis yang melalui titik <b>$O(0,0)$</b> dan <b>$A(8,4)$</b> adalah
                            </p>

                            <div class="rumus-stack">
                                <div class="rumus-line rumus-line-1">
                                    <span class="math-inline">$m=\dfrac{y}{x}$</span>
                                </div>

                                <div class="rumus-line">
                                    <span class="eq">$=$</span>
                                    <div class="frac-input single">
                                        <div class="top">
                                            <input type="text" id="subAtas_a"
                                                class="form-control form-control-sm text-center jawaban-latihan">
                                        </div>
                                        <div class="bottom">
                                            <input type="text" id="subBawah_a"
                                                class="form-control form-control-sm text-center jawaban-latihan">
                                        </div>
                                    </div>
                                </div>

                                <div class="rumus-line">
                                    <span class="eq">$=$</span>
                                    <div class="frac-input single">
                                        <div class="top">
                                            <input type="text" id="hasilAtas_a"
                                                class="form-control form-control-sm text-center jawaban-latihan">
                                        </div>
                                        <div class="bottom">
                                            <input type="text" id="hasilBawah_a"
                                                class="form-control form-control-sm text-center jawaban-latihan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="kolom-latihan">
                            <p class="mb-2">
                                <b>b.</b> Gradien garis yang melalui titik <b>$O(0,0)$</b> dan <b>$B(6,4)$</b> adalah
                            </p>

                            <div class="rumus-stack">
                                <div class="rumus-line rumus-line-1">
                                    <span class="math-inline">$m=\dfrac{y}{x}$</span>
                                </div>

                                <div class="rumus-line">
                                    <span class="eq">$=$</span>
                                    <div class="frac-input single">
                                        <div class="top">
                                            <input type="text" id="subAtas_b"
                                                class="form-control form-control-sm text-center jawaban-latihan">
                                        </div>
                                        <div class="bottom">
                                            <input type="text" id="subBawah_b"
                                                class="form-control form-control-sm text-center jawaban-latihan">
                                        </div>
                                    </div>
                                </div>

                                <div class="rumus-line">
                                    <span class="eq">$=$</span>
                                    <div class="frac-input single">
                                        <div class="top">
                                            <input type="text" id="hasilAtas_b"
                                                class="form-control form-control-sm text-center jawaban-latihan">
                                        </div>
                                        <div class="bottom">
                                            <input type="text" id="hasilBawah_b"
                                                class="form-control form-control-sm text-center jawaban-latihan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-4">
                    <p class="mb-2">
                        Jadi, jalur yang lebih landai untuk memudahkan pendaki naik ke gunung adalah jalur
                    </p>

                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                        {{-- Bagian kiri --}}
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <input type="text" id="pilihJalur" class="form-control w-auto text-center jawaban-latihan"
                                style="max-width:90px;" placeholder="A/B">

                            <button type="button" class="btn btn-palet btn-sm" onclick="cekLatihan1()">
                                Cek
                            </button>

                            <button type="button" class="btn btn-palet btn-sm" onclick="resetLatihan1()">
                                Reset
                            </button>
                        </div>

                        {{-- Bagian kanan --}}
                        <div class="ms-auto">
                            <button id="nextBtnLatihan1" type="button" class="btn btn-palet btn-sm"
                                onclick="nextLatihan(2)" disabled>
                                Lanjut ke Latihan 2
                            </button>
                        </div>
                    </div>
                    <div id="feedbackLatihan1" class="mt-3"></div>
                </div>
            </div>

            <br>

            <div id="latihan2" class="latihan-step d-none">

                <p style="line-height:1.8;">
                    <b>2.</b> Perhatikan grafik berikut. Dari titik asal <b>$O$</b> dibuat tiga garis menuju
                    titik <b>$A$</b>, <b>$B$</b>, dan <b>$C$</b>. Tentukan gradien garis <b>$OA$</b>,
                    gradien garis <b>$OB$</b>, dan gradien garis <b>$OC$</b>.
                </p>

                <div class="petunjuk-mini-latihan">
                    <strong>Petunjuk:</strong>
                    Amati koordinat titik pada grafik, lalu isilah nilai gradien setiap garis pada kolom pecahan yang
                    tersedia.
                </div>

                <div class="text-center my-4">
                    <img src="{{ asset('img/gradien/latihan_no1gradienB21.png') }}" alt="Latihan 2" class="img-fluid"
                        style="max-width:380px;">
                </div>

                <p class="mb-2"><b>Isi gradien masing-masing jalur:</b></p>

                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="p-3 border rounded-4" style="background:#f7f9fc;">
                            <p><b>a.</b> $m_{OA} =$</p>
                            <div class="frac-input single">
                                <div class="top">
                                    <input type="text" id="moaAtas"
                                        class="form-control form-control-sm text-center jawaban-latihan">
                                </div>
                                <div class="bottom">
                                    <input type="text" id="moaBawah"
                                        class="form-control form-control-sm text-center jawaban-latihan">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-3 border rounded-4" style="background:#f7f9fc;">
                            <p><b>b.</b> $m_{OB} =$</p>
                            <div class="frac-input single">
                                <div class="top">
                                    <input type="text" id="mobAtas"
                                        class="form-control form-control-sm text-center jawaban-latihan">
                                </div>
                                <div class="bottom">
                                    <input type="text" id="mobBawah"
                                        class="form-control form-control-sm text-center jawaban-latihan">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-3 border rounded-4" style="background:#f7f9fc;">
                            <p><b>c.</b> $m_{OC} =$</p>
                            <div class="frac-input single">
                                <div class="top">
                                    <input type="text" id="mocAtas"
                                        class="form-control form-control-sm text-center jawaban-latihan">
                                </div>
                                <div class="bottom">
                                    <input type="text" id="mocBawah"
                                        class="form-control form-control-sm text-center jawaban-latihan">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="mt-4 d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <button type="button" class="btn btn-palet btn-sm" onclick="prevLatihan(1)">
                            Kembali ke Latihan 1
                        </button>

                        <div class="d-flex gap-2 flex-wrap">
                            <button type="button" class="btn btn-palet btn-sm" onclick="cekLatihan2()">
                                Cek
                            </button>

                            <button type="button" class="btn btn-palet btn-sm" onclick="resetLatihan2()">
                                Reset
                            </button>

                            <button id="nextBtnLatihan2" type="button" class="btn btn-palet btn-sm"
                                onclick="nextLatihan(3)" disabled>
                                Lanjut ke Latihan 3
                            </button>
                        </div>
                    </div>
                    <div id="feedbackLatihan2" class="mt-3"></div>
                </div>
            </div>
            <br>
            <div id="latihan3" class="latihan-step d-none">

                <p style="line-height:1.8;">
                    <b>3.</b> Seorang petugas pemetaan mencatat bahwa sebuah garis jalan dimulai dari titik
                    <b>$O(0,0)$</b> dan melalui titik <b>$A(6,p)$</b>. Diketahui gradien garis tersebut adalah
                    <b>$4$</b>. Tentukan nilai <b>$p$</b>.
                </p>
                <div class="petunjuk-mini-latihan">
                    <strong>Petunjuk:</strong>
                    Isilah setiap langkah penyelesaian pada kolom yang tersedia sampai diperoleh nilai \(p\) dan koordinat
                    titik \(A\).
                </div>

                <p class="mb-2"><b>Penyelesaian:</b></p>

                <div class="latihan-no3">

                    <p>Diketahui: <b>$m = 4$</b></p>

                    <p class="flex-wrap-line">
                        Titik <b>$A(6,p)$</b> &hArr; <b>$x =$</b>
                        <input type="text" id="nilaiX_3"
                            class="form-control d-inline-block text-center jawaban-latihan input-kecil">
                        dan <b>$y =$</b>
                        <input type="text" id="nilaiP_3"
                            class="form-control d-inline-block text-center jawaban-latihan input-kecil">
                    </p>

                    <p>Maka, gradien garis yang melalui titik <b>$O(0,0)$</b> dan <b>$A(6,p)$</b> adalah:</p>

                    <div class="blok-rumus-no3">
                        <div class="rumus-baris-no3">
                            <span class="math-inline">$m=\dfrac{y}{x}$</span>
                        </div>

                        <div class="rumus-baris-no3">
                            <input type="text" id="subM_3"
                                class="form-control form-control-sm text-center jawaban-latihan input-kecil"
                                placeholder="m">
                            <span class="eq">$=$</span>
                            <div class="frac-input single">
                                <div class="top">
                                    <input type="text" id="subP_3"
                                        class="form-control form-control-sm text-center jawaban-latihan" placeholder="y">
                                </div>
                                <div class="bottom">
                                    <input type="text" id="subX_3"
                                        class="form-control form-control-sm text-center jawaban-latihan" placeholder="x">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="langkah-kali-no3">
                        <span><b>$p =$</b></span>
                        <input type="text" id="kali1_3"
                            class="form-control form-control-sm text-center jawaban-latihan input-kecil">
                        <span><b>$\times$</b></span>
                        <input type="text" id="kali2_3"
                            class="form-control form-control-sm text-center jawaban-latihan input-kecil">
                    </div>

                    <div class="kesimpulan-no3">
                        <span>Jadi, nilai <b>$p$</b> adalah</span>
                        <input type="text" id="hasilP_3"
                            class="form-control text-center jawaban-latihan input-kecil">

                        <span>, sehingga koordinat titik <b>$A$</b> adalah</span>
                        <span>(</span>
                        <input type="text" id="koordX_3"
                            class="form-control text-center jawaban-latihan input-kecil">
                        <span>,</span>
                        <input type="text" id="koordY_3"
                            class="form-control text-center jawaban-latihan input-kecil">
                        <span>)</span>
                    </div>

                    <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <button type="button" class="btn btn-palet btn-sm" onclick="prevLatihan(2)">
                            Kembali ke Latihan 2
                        </button>

                        <div class="d-flex gap-2 flex-wrap">
                            <button type="button" class="btn btn-palet btn-sm" onclick="cekLatihan3()">
                                Cek
                            </button>

                            <button type="button" class="btn btn-palet btn-sm" onclick="resetLatihan3()">
                                Reset
                            </button>
                        </div>
                    </div>
                    <div id="feedbackLatihan3" class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // =========================
        // LATIHAN SOAL SUBBAB B2
        // Gradien garis melalui O(0,0) dan (x,y)
        // =========================

        window.addEventListener("load", function() {
            renderMathSafe(document.body);
            restoreProgressB2();
        });


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
            });
        }

        function norm(nilai) {
            return String(nilai || "")
                .trim()
                .replace(/\s+/g, "")
                .replace(/−/g, "-")
                .toLowerCase();
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
            const step = document.getElementById(`latihan${stepNumber}`);
            if (!step) return;

            step.classList.remove("d-none");
            renderMathSafe(step);
            scrollKeStep(`latihan${stepNumber}`);
        }

        function prevLatihan(stepNumber) {
            scrollKeStep(`latihan${stepNumber}`);
        }

        function resetStepSetelah(stepMulai) {
            for (let i = stepMulai; i <= 3; i++) {
                const step = document.getElementById(`latihan${i}`);
                if (step) step.classList.add("d-none");
            }
        }

        // =========================
        // SAVE PROGRESS
        // =========================

        async function simpanProgressLatihan(latihanKey, tipe, jawaban, isCorrect) {
            const csrfToken = document
                .querySelector('meta[name="csrf-token"]')
                ?.getAttribute("content");

            if (!LATIHAN_PROGRESS_URL || !csrfToken) {
                console.error("URL atau CSRF kosong.", {
                    LATIHAN_PROGRESS_URL,
                    csrfToken,
                });
                return false;
            }

            try {
                const response = await fetch(LATIHAN_PROGRESS_URL, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": csrfToken,
                        "X-Requested-With": "XMLHttpRequest",
                        Accept: "application/json",
                    },
                    body: JSON.stringify({
                        latihan_key: latihanKey,
                        tipe: tipe,
                        jawaban: jawaban,
                        is_correct: isCorrect,
                    }),
                });

                const data = await response.json();
                console.log("Simpan latihan B2:", data);

                return response.ok;
            } catch (error) {
                console.error("Gagal menyimpan latihan B2:", error);
                return false;
            }
        }

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
        // VALIDASI FIELD
        // =========================
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

        // Simpan Jawaban Latihan
        function ambilJawabanLatihan1B2() {
            return {
                subAtas_a: document.getElementById("subAtas_a")?.value.trim() ?? "",
                subBawah_a: document.getElementById("subBawah_a")?.value.trim() ?? "",
                hasilAtas_a: document.getElementById("hasilAtas_a")?.value.trim() ?? "",
                hasilBawah_a: document.getElementById("hasilBawah_a")?.value.trim() ?? "",

                subAtas_b: document.getElementById("subAtas_b")?.value.trim() ?? "",
                subBawah_b: document.getElementById("subBawah_b")?.value.trim() ?? "",
                hasilAtas_b: document.getElementById("hasilAtas_b")?.value.trim() ?? "",
                hasilBawah_b: document.getElementById("hasilBawah_b")?.value.trim() ?? "",

                pilihJalur: document.getElementById("pilihJalur")?.value.trim() ?? "",
            };
        }

        function ambilJawabanLatihan2B2() {
            return {
                moaAtas: document.getElementById("moaAtas")?.value.trim() ?? "",
                moaBawah: document.getElementById("moaBawah")?.value.trim() ?? "",

                mobAtas: document.getElementById("mobAtas")?.value.trim() ?? "",
                mobBawah: document.getElementById("mobBawah")?.value.trim() ?? "",

                mocAtas: document.getElementById("mocAtas")?.value.trim() ?? "",
                mocBawah: document.getElementById("mocBawah")?.value.trim() ?? "",
            };
        }

        function ambilJawabanLatihan3B2() {
            return {
                nilaiX_3: document.getElementById("nilaiX_3")?.value.trim() ?? "",
                nilaiP_3: document.getElementById("nilaiP_3")?.value.trim() ?? "",

                subM_3: document.getElementById("subM_3")?.value.trim() ?? "",
                subP_3: document.getElementById("subP_3")?.value.trim() ?? "",
                subX_3: document.getElementById("subX_3")?.value.trim() ?? "",

                kali1_3: document.getElementById("kali1_3")?.value.trim() ?? "",
                kali2_3: document.getElementById("kali2_3")?.value.trim() ?? "",

                hasilP_3: document.getElementById("hasilP_3")?.value.trim() ?? "",
                koordX_3: document.getElementById("koordX_3")?.value.trim() ?? "",
                koordY_3: document.getElementById("koordY_3")?.value.trim() ?? "",
            };
        }

        // =========================
        // LATIHAN 1
        // =========================
        async function cekLatihan1() {
            const ids = [
                "subAtas_a", "subBawah_a", "hasilAtas_a", "hasilBawah_a",
                "subAtas_b", "subBawah_b", "hasilAtas_b", "hasilBawah_b",
                "pilihJalur"
            ];

            clearValid(ids);

            const subAtasA = norm(document.getElementById("subAtas_a")?.value);
            const subBawahA = norm(document.getElementById("subBawah_a")?.value);
            const hasilAtasA = norm(document.getElementById("hasilAtas_a")?.value);
            const hasilBawahA = norm(document.getElementById("hasilBawah_a")?.value);

            const subAtasB = norm(document.getElementById("subAtas_b")?.value);
            const subBawahB = norm(document.getElementById("subBawah_b")?.value);
            const hasilAtasB = norm(document.getElementById("hasilAtas_b")?.value);
            const hasilBawahB = norm(document.getElementById("hasilBawah_b")?.value);

            const pilihJalur = norm(document.getElementById("pilihJalur")?.value)
                .replace("jalur", "");

            const fb = document.getElementById("feedbackLatihan1");
            const nextBtn = document.getElementById("nextBtnLatihan1");

            if (!fb) return;

            const benarSubA = subAtasA === "4" && subBawahA === "8";
            const benarHasilA = hasilAtasA === "1" && hasilBawahA === "2";

            const benarSubB = subAtasB === "4" && subBawahB === "6";
            const benarHasilB = hasilAtasB === "2" && hasilBawahB === "3";

            const benarJalur = pilihJalur === "a";

            setValid("subAtas_a", subAtasA === "4");
            setValid("subBawah_a", subBawahA === "8");
            setValid("hasilAtas_a", hasilAtasA === "1");
            setValid("hasilBawah_a", hasilBawahA === "2");

            setValid("subAtas_b", subAtasB === "4");
            setValid("subBawah_b", subBawahB === "6");
            setValid("hasilAtas_b", hasilAtasB === "2");
            setValid("hasilBawah_b", hasilBawahB === "3");

            setValid("pilihJalur", benarJalur);

            if (benarSubA && benarHasilA && benarSubB && benarHasilB && benarJalur) {
                fb.innerHTML = `
                <div class="alert alert-success mb-0" style="line-height:1.8;">
                    <strong>Benar.</strong><br>
                    Gradien jalur A:
                    <div class="text-center my-2">
                        $m_A = \\frac{4}{8} = \\frac{1}{2}$
                    </div>

                    Gradien jalur B:
                    <div class="text-center my-2">
                        $m_B = \\frac{4}{6} = \\frac{2}{3}$
                    </div>

                    Karena $\\frac{1}{2}$ lebih kecil daripada $\\frac{2}{3}$,
                    maka jalur yang lebih landai adalah <b>jalur A</b>.
                    <br>
                    Silakan lanjut ke latihan berikutnya.
                </div>
            `;

                if (nextBtn) nextBtn.disabled = false;

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L1`,
                    "input",
                    ambilJawabanLatihan1B2(),
                    true
                );
            } else {
                let pesan = "";


                // tahap 1 cek substitusi jalur A
                if (!benarSubA) {

                    pesan = `
                    <strong>Belum tepat.</strong><br>
                    Perhatikan kembali titik A(8,4).
                    Pada rumus $m=\\frac{y}{x}$,
                    nilai $y$ menjadi pembilang dan nilai $x$ menjadi penyebut.
                    `;

                }

                // tahap 2 cek hasil A
                else if (!benarHasilA) {

                    pesan = `
                    <strong>Hampir benar.</strong><br>
                    Nilai gradien jalur A sudah disubstitusikan dengan benar.
                    Sekarang sederhanakan:
                    <div class="text-center mt-2">
                    $\\frac{4}{8}=\\frac{1}{2}$
                    </div>
                    `;

                }


                // tahap 3 cek substitusi B
                else if (!benarSubB) {

                    pesan = `
                    <strong>Coba periksa kembali.</strong><br>
                    Pada jalur B(6,4),
                    masukkan nilai $y=4$ sebagai pembilang dan $x=6$ sebagai penyebut.
                    `;

                }


                // tahap 4 cek hasil B
                else if (!benarHasilB) {

                    pesan = `
                    <strong>Satu langkah lagi.</strong><br>
                    Sederhanakan:
                    <div class="text-center mt-2">
                    $\\frac{4}{6}=\\frac{2}{3}$
                    </div>
                    `;

                }


                // tahap 5 pilih jalur
                else if (!benarJalur) {

                    pesan = `
                    <strong>Periksa kembali pilihan jalur.</strong><br>
                    Jalur yang lebih landai adalah jalur dengan nilai gradien lebih kecil.
                    Bandingkan $\\frac{1}{2}$ dan $\\frac{2}{3}$.
                    `;

                }


                fb.innerHTML = `
                <div class="alert alert-warning mb-0" style="line-height:1.8;">
                    ${pesan}
                </div>
                `;

                if (nextBtn) nextBtn.disabled = true;
                resetStepSetelah(2);

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L1`,
                    "input",
                    ambilJawabanLatihan1B2(),
                    false
                );
            }

            renderMathSafe(fb);
        }

        function resetLatihan1() {

            const ids = [
                "subAtas_a",
                "subBawah_a",
                "hasilAtas_a",
                "hasilBawah_a",
                "subAtas_b",
                "subBawah_b",
                "hasilAtas_b",
                "hasilBawah_b",
                "pilihJalur"
            ];

            ids.forEach(id => {
                const el = document.getElementById(id);

                if (el) {
                    el.value = "";
                    el.classList.remove("is-valid", "is-invalid");
                }
            });


            const fb = document.getElementById("feedbackLatihan1");

            if (fb) {
                fb.innerHTML = "";
            }


            const nextBtn = document.getElementById("nextBtnLatihan1");

            if (nextBtn) {
                nextBtn.disabled = true;
            }


            resetStepSetelah(2);
        }



        // =========================
        // LATIHAN 2
        // =========================
        async function cekLatihan2() {
            const ids = [
                "moaAtas", "moaBawah",
                "mobAtas", "mobBawah",
                "mocAtas", "mocBawah"
            ];

            clearValid(ids);

            const moaAtas = norm(document.getElementById("moaAtas")?.value);
            const moaBawah = norm(document.getElementById("moaBawah")?.value);

            const mobAtas = norm(document.getElementById("mobAtas")?.value);
            const mobBawah = norm(document.getElementById("mobBawah")?.value);

            const mocAtas = norm(document.getElementById("mocAtas")?.value);
            const mocBawah = norm(document.getElementById("mocBawah")?.value);

            const fb = document.getElementById("feedbackLatihan2");
            const nextBtn = document.getElementById("nextBtnLatihan2");

            if (!fb) return;

            const benarOA = moaAtas === "5" && moaBawah === "3";
            const benarOB = mobAtas === "-2" && mobBawah === "3";
            const benarOC = mocAtas === "3" && mocBawah === "4";

            setValid("moaAtas", moaAtas === "5");
            setValid("moaBawah", moaBawah === "3");

            setValid("mobAtas", mobAtas === "-2");
            setValid("mobBawah", mobBawah === "3");

            setValid("mocAtas", mocAtas === "3");
            setValid("mocBawah", mocBawah === "4");

            if (benarOA && benarOB && benarOC) {
                fb.innerHTML = `
                <div class="alert alert-success mb-0" style="line-height:1.8;">
                    <strong>Benar.</strong><br>
                    Gradien garis yang diperoleh adalah:
                    <div class="text-center my-2">
                        $m_{OA}=\\frac{5}{3}, \\quad
                        m_{OB}=-\\frac{2}{3}, \\quad
                        m_{OC}=\\frac{3}{4}$
                    </div>
                    Silakan lanjut ke latihan berikutnya.
                </div>
            `;

                if (nextBtn) nextBtn.disabled = false;

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L2`,
                    "input",
                    ambilJawabanLatihan2B2(),
                    true
                );
            } else {
                let hints = [];

                if (!benarOA) hints.push("Periksa kembali gradien garis OA.");
                if (!benarOB) hints.push("Periksa kembali gradien garis OB.");
                if (!benarOC) hints.push("Periksa kembali gradien garis OC.");

                fb.innerHTML = `
                <div class="alert alert-danger mb-0" style="line-height:1.8;">
                    <strong>Belum tepat.</strong><br>
                    ${hints.join("<br>")}
                </div>
            `;

                if (nextBtn) nextBtn.disabled = true;
                resetStepSetelah(3);

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L2`,
                    "input",
                    ambilJawabanLatihan2B2(),
                    false
                );
            }

            renderMathSafe(fb);
        }

        function resetLatihan2() {

    const ids = [
        "moaAtas",
        "moaBawah",
        "mobAtas",
        "mobBawah",
        "mocAtas",
        "mocBawah"
    ];


    ids.forEach(id => {

        const el = document.getElementById(id);

        if (el) {
            el.value = "";
            el.classList.remove("is-valid", "is-invalid");
        }

    });


    const fb = document.getElementById("feedbackLatihan2");

    if (fb) {
        fb.innerHTML = "";
    }


    const nextBtn = document.getElementById("nextBtnLatihan2");

    if (nextBtn) {
        nextBtn.disabled = true;
    }


    resetStepSetelah(3);
}


        // =========================
        // LATIHAN 3
        // =========================
        async function cekLatihan3() {
            const ids = [
                "nilaiX_3", "nilaiP_3",
                "subM_3", "subP_3", "subX_3",
                "kali1_3", "kali2_3",
                "hasilP_3", "koordX_3", "koordY_3"
            ];

            clearValid(ids);

            const nilaiX = norm(document.getElementById("nilaiX_3")?.value);
            const nilaiP = norm(document.getElementById("nilaiP_3")?.value);

            const subM = norm(document.getElementById("subM_3")?.value);
            const subP = norm(document.getElementById("subP_3")?.value);
            const subX = norm(document.getElementById("subX_3")?.value);

            const kali1 = norm(document.getElementById("kali1_3")?.value);
            const kali2 = norm(document.getElementById("kali2_3")?.value);

            const hasilP = norm(document.getElementById("hasilP_3")?.value);
            const koordX = norm(document.getElementById("koordX_3")?.value);
            const koordY = norm(document.getElementById("koordY_3")?.value);

            const fb = document.getElementById("feedbackLatihan3");

            if (!fb) return;

            const benarDiketahui =
                nilaiX === "6" &&
                nilaiP === "p";

            const benarSubstitusi =
                subM === "4" &&
                subP === "p" &&
                subX === "6";

            const benarKali =
                kali1 === "6" &&
                kali2 === "4";

            const benarAkhir =
                hasilP === "24" &&
                koordX === "6" &&
                koordY === "24";

            setValid("nilaiX_3", nilaiX === "6");
            setValid("nilaiP_3", nilaiP === "p");

            setValid("subM_3", subM === "4");
            setValid("subP_3", subP === "p");
            setValid("subX_3", subX === "6");

            setValid("kali1_3", kali1 === "6");
            setValid("kali2_3", kali2 === "4");

            setValid("hasilP_3", hasilP === "24");
            setValid("koordX_3", koordX === "6");
            setValid("koordY_3", koordY === "24");

            if (benarDiketahui && benarSubstitusi && benarKali && benarAkhir) {
                fb.innerHTML = `
                <div class="alert alert-success mb-0" style="line-height:1.8;">
                    <strong>Benar.</strong><br>
                    Diketahui gradien $m=4$ dan titik $A(6,p)$.
                    <div class="text-center my-2">
                        $4 = \\frac{p}{6}$
                    </div>
                    Maka:
                    <div class="text-center my-2">
                        $p = 6 \\times 4 = 24$
                    </div>
                    Jadi, nilai $p$ adalah $24$, sehingga koordinat titik $A$ adalah $(6,24)$.
                </div>
            `;

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L3`,
                    "input",
                    ambilJawabanLatihan3B2(),
                    true
                );

                const saved = await saveProgressMateri();

                if (saved) {
                    bukaNextButton();
                } else {
                    fb.innerHTML += `
                    <div class="alert alert-warning mt-2 mb-0">
                        Jawaban benar, tetapi progres materi belum tersimpan. Coba cek koneksi atau refresh halaman.
                    </div>
                `;
                }
            } else {
                let hints = [];

                if (!benarDiketahui) hints.push("Periksa kembali nilai x dan y dari titik A(6,p).");
                if (benarDiketahui && !benarSubstitusi) hints.push("Periksa kembali substitusi ke rumus gradien.");
                if (benarDiketahui && benarSubstitusi && !benarKali) hints.push(
                    "Periksa kembali langkah perkalian silang.");
                if (benarDiketahui && benarSubstitusi && benarKali && !benarAkhir) hints.push(
                    "Periksa kembali nilai p dan koordinat titik A.");

                fb.innerHTML = `
                <div class="alert alert-danger mb-0" style="line-height:1.8;">
                    <strong>Belum tepat.</strong><br>
                    ${hints.join("<br>")}
                </div>
            `;

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L3`,
                    "input",
                    ambilJawabanLatihan3B2(),
                    false
                );
            }

            renderMathSafe(fb);
        }

        function resetLatihan3() {

    const ids = [
        "nilaiX_3",
        "nilaiP_3",
        "subM_3",
        "subP_3",
        "subX_3",
        "kali1_3",
        "kali2_3",
        "hasilP_3",
        "koordX_3",
        "koordY_3"
    ];


    ids.forEach(id => {

        const el = document.getElementById(id);

        if (el) {
            el.value = "";
            el.classList.remove("is-valid", "is-invalid");
        }

    });


    const fb = document.getElementById("feedbackLatihan3");

    if (fb) {
        fb.innerHTML = "";
    }

}

        // Restore Jawaban
        function setValueSafe(id, value) {
            const el = document.getElementById(id);

            if (el && value !== undefined && value !== null) {
                el.value = value;
            }
        }

        function beriValid(ids) {
            ids.forEach((id) => {
                const el = document.getElementById(id);

                if (el) {
                    el.classList.remove("is-invalid");
                    el.classList.add("is-valid");
                }
            });
        }

        function restoreLatihan1B2() {
            const saved = SAVED_LATIHAN[`${MATERI_SLUG}_L1`]?.jawaban;

            if (!saved) return;

            setValueSafe("subAtas_a", saved.subAtas_a);
            setValueSafe("subBawah_a", saved.subBawah_a);
            setValueSafe("hasilAtas_a", saved.hasilAtas_a);
            setValueSafe("hasilBawah_a", saved.hasilBawah_a);

            setValueSafe("subAtas_b", saved.subAtas_b);
            setValueSafe("subBawah_b", saved.subBawah_b);
            setValueSafe("hasilAtas_b", saved.hasilAtas_b);
            setValueSafe("hasilBawah_b", saved.hasilBawah_b);

            setValueSafe("pilihJalur", saved.pilihJalur);

            beriValid([
                "subAtas_a",
                "subBawah_a",
                "hasilAtas_a",
                "hasilBawah_a",
                "subAtas_b",
                "subBawah_b",
                "hasilAtas_b",
                "hasilBawah_b",
                "pilihJalur",
            ]);

            const fb = document.getElementById("feedbackLatihan1");
            const nextBtn = document.getElementById("nextBtnLatihan1");
            const latihan2 = document.getElementById("latihan2");

            if (fb) {
                fb.innerHTML = `
            <div class="alert alert-success mb-0">
                Jawaban Latihan 1 sudah tersimpan.
            </div>
        `;
                renderMathSafe(fb);
            }

            if (nextBtn) nextBtn.disabled = false;
            if (latihan2) latihan2.classList.remove("d-none");
        }

        function restoreLatihan2B2() {
            const saved = SAVED_LATIHAN[`${MATERI_SLUG}_L2`]?.jawaban;

            if (!saved) return;

            setValueSafe("moaAtas", saved.moaAtas);
            setValueSafe("moaBawah", saved.moaBawah);

            setValueSafe("mobAtas", saved.mobAtas);
            setValueSafe("mobBawah", saved.mobBawah);

            setValueSafe("mocAtas", saved.mocAtas);
            setValueSafe("mocBawah", saved.mocBawah);

            beriValid([
                "moaAtas",
                "moaBawah",
                "mobAtas",
                "mobBawah",
                "mocAtas",
                "mocBawah",
            ]);

            const fb = document.getElementById("feedbackLatihan2");
            const nextBtn = document.getElementById("nextBtnLatihan2");
            const latihan2 = document.getElementById("latihan2");
            const latihan3 = document.getElementById("latihan3");

            if (fb) {
                fb.innerHTML = `
            <div class="alert alert-success mb-0">
                Jawaban Latihan 2 sudah tersimpan.
            </div>
        `;
                renderMathSafe(fb);
            }

            if (latihan2) latihan2.classList.remove("d-none");
            if (latihan3) latihan3.classList.remove("d-none");
            if (nextBtn) nextBtn.disabled = false;
        }

        function restoreLatihan3B2() {
            const saved = SAVED_LATIHAN[`${MATERI_SLUG}_L3`]?.jawaban;

            if (!saved) return;

            setValueSafe("nilaiX_3", saved.nilaiX_3);
            setValueSafe("nilaiP_3", saved.nilaiP_3);

            setValueSafe("subM_3", saved.subM_3);
            setValueSafe("subP_3", saved.subP_3);
            setValueSafe("subX_3", saved.subX_3);

            setValueSafe("kali1_3", saved.kali1_3);
            setValueSafe("kali2_3", saved.kali2_3);

            setValueSafe("hasilP_3", saved.hasilP_3);
            setValueSafe("koordX_3", saved.koordX_3);
            setValueSafe("koordY_3", saved.koordY_3);

            beriValid([
                "nilaiX_3",
                "nilaiP_3",
                "subM_3",
                "subP_3",
                "subX_3",
                "kali1_3",
                "kali2_3",
                "hasilP_3",
                "koordX_3",
                "koordY_3",
            ]);

            const latihan2 = document.getElementById("latihan2");
            const latihan3 = document.getElementById("latihan3");
            const fb = document.getElementById("feedbackLatihan3");

            if (latihan2) latihan2.classList.remove("d-none");
            if (latihan3) latihan3.classList.remove("d-none");

            if (fb) {
                fb.innerHTML = `
            <div class="alert alert-success mb-0">
                Jawaban Latihan 3 sudah tersimpan. Silakan lanjut ke materi berikutnya.
            </div>
        `;
            }

            bukaNextButton();
        }

        function restoreProgressB2() {
            restoreLatihan1B2();
            restoreLatihan2B2();
            restoreLatihan3B2();

            if (IS_MATERI_COMPLETED) {
                const latihan2 = document.getElementById("latihan2");
                const latihan3 = document.getElementById("latihan3");
                const nextBtn1 = document.getElementById("nextBtnLatihan1");
                const nextBtn2 = document.getElementById("nextBtnLatihan2");

                if (latihan2) latihan2.classList.remove("d-none");
                if (latihan3) latihan3.classList.remove("d-none");

                if (nextBtn1) nextBtn1.disabled = false;
                if (nextBtn2) nextBtn2.disabled = false;

                bukaNextButton();
            }
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
