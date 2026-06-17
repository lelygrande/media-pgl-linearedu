@extends('layout.halaman-materi')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/subbabB/subbabB_gradien1titik.css') }}">

    <style>
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

            <div class="alert alert-info mb-0" style="border-radius: 14px;">
                <strong>Catatan:</strong> Jika $x_1 = 0$, maka gradien tidak terdefinisi (garisnya tegak/vertikal).
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
                    <b>Kesimpulan:</b> Gradien garis yang melalui titik <b>O(0,0)</b>
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

                    <div class="d-flex align-items-center gap-3 flex-wrap">
                        <input type="text" id="pilihJalur" class="form-control w-auto text-center jawaban-latihan"
                            style="max-width:90px;" placeholder="A/B">
                        <button type="button" class="btn btn-palet btn-sm" onclick="cekLatihan1()">Cek</button>

                        <button id="nextBtnLatihan1" type="button" class="btn btn-palet btn-sm"
                            onclick="nextLatihan(2)" disabled>
                            Lanjut ke Latihan 2
                        </button>
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

                        <div>
                            <button type="button" class="btn btn-palet btn-sm" onclick="cekLatihan2()">Cek</button>
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

                        <button type="button" class="btn btn-palet btn-sm" onclick="cekLatihan3()">Cek</button>
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
        async function cekLatihanTitik1() {
            const ids = [
                "l1x1", "l1y1", "l1x2", "l1y2",
                "l1_subY2", "l1_subY1", "l1_subX2", "l1_subX1",
                "l1_hasilAtas", "l1_hasilBawah",
                "l1_hasilAkhirAtas", "l1_hasilAkhirBawah",
            ];

            clearValid(ids);

            const x1 = normalisasiNilai(document.getElementById("l1x1")?.value);
            const y1 = normalisasiNilai(document.getElementById("l1y1")?.value);
            const x2 = normalisasiNilai(document.getElementById("l1x2")?.value);
            const y2 = normalisasiNilai(document.getElementById("l1y2")?.value);

            const subY2 = normalisasiNilai(document.getElementById("l1_subY2")?.value);
            const subY1 = normalisasiNilai(document.getElementById("l1_subY1")?.value);
            const subX2 = normalisasiNilai(document.getElementById("l1_subX2")?.value);
            const subX1 = normalisasiNilai(document.getElementById("l1_subX1")?.value);

            const hasilAtas = normalisasiNilai(document.getElementById("l1_hasilAtas")?.value);
            const hasilBawah = normalisasiNilai(document.getElementById("l1_hasilBawah")?.value);
            const akhirAtas = normalisasiNilai(document.getElementById("l1_hasilAkhirAtas")?.value);
            const akhirBawah = normalisasiNilai(document.getElementById("l1_hasilAkhirBawah")?.value);

            const fb = document.getElementById("fbLatihan1");
            const nextBtn = document.getElementById("nextBtnLatihan1");

            if (!fb) return;

            const benarTitik =
                x1 === "-3" &&
                y1 === "6" &&
                x2 === "5" &&
                y2 === "-4";

            const benarSubstitusi =
                subY2 === "-4" &&
                subY1 === "6" &&
                subX2 === "5" &&
                subX1 === "-3";

            const benarHasil =
                hasilAtas === "-10" &&
                hasilBawah === "8";

            const benarAkhir =
                akhirAtas === "-5" &&
                akhirBawah === "4";

            setValid("l1x1", x1 === "-3");
            setValid("l1y1", y1 === "6");
            setValid("l1x2", x2 === "5");
            setValid("l1y2", y2 === "-4");

            setValid("l1_subY2", subY2 === "-4");
            setValid("l1_subY1", subY1 === "6");
            setValid("l1_subX2", subX2 === "5");
            setValid("l1_subX1", subX1 === "-3");

            setValid("l1_hasilAtas", hasilAtas === "-10");
            setValid("l1_hasilBawah", hasilBawah === "8");
            setValid("l1_hasilAkhirAtas", akhirAtas === "-5");
            setValid("l1_hasilAkhirBawah", akhirBawah === "4");

            if (benarTitik && benarSubstitusi && benarHasil && benarAkhir) {
                fb.innerHTML = `
            <div class="alert alert-success mb-0">
                <strong>Benar.</strong><br>
                Gradien jalur kabel tersebut adalah:
                <div class="text-center my-2">
                    $m = \\frac{-4 - 6}{5 - (-3)} = \\frac{-10}{8} = \\frac{-5}{4}$
                </div>
                Jadi, gradien jalur kabel adalah $\\frac{-5}{4}$.
                <br>
                Silakan lanjut ke latihan berikutnya.
            </div>
        `;

                if (nextBtn) nextBtn.disabled = false;

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L1`,
                    "input",
                    ambilJawabanLatihanTitik1(),
                    true
                );
            } else {
                let hints = [];

                if (!benarTitik) hints.push("Periksa lagi penentuan nilai $x_1$, $y_1$, $x_2$, dan $y_2$.");
                if (benarTitik && !benarSubstitusi) hints.push("Periksa lagi substitusi nilai ke rumus gradien.");
                if (benarTitik && benarSubstitusi && !benarHasil) hints.push(
                    "Hitung kembali hasil pengurangan pada pembilang dan penyebut.");
                if (benarTitik && benarSubstitusi && benarHasil && !benarAkhir) hints.push(
                    "Sederhanakan hasil gradiennya.");

                fb.innerHTML = `
            <div class="alert alert-danger mb-0">
                ${hints.join("<br>")}
            </div>
        `;

                if (nextBtn) nextBtn.disabled = true;
                resetStepSetelah(2);
            }

            renderMath(fb);
        }
        // =========================
        // LATIHAN 2
        // =========================
        async function cekLatihanTitik2() {
            const ids = [
                "x1_2", "y1_2", "x2_2", "y2_2", "m_2",
                "kiri1_2", "subY2_2", "subY1_2", "subX2_2", "subX1_2",
                "kiri2_2", "hasilAtas_2", "hasilBawah_2",
                "pers1Kiri_2", "pers1Kanan_2", "hasilP_2",
            ];

            clearValid(ids);

            const x1 = normalisasiNilai(document.getElementById("x1_2")?.value);
            const y1 = normalisasiNilai(document.getElementById("y1_2")?.value);
            const x2 = normalisasiNilai(document.getElementById("x2_2")?.value);
            const y2 = normalisasiNilai(document.getElementById("y2_2")?.value);
            const m = normalisasiNilai(document.getElementById("m_2")?.value);

            const kiri1 = normalisasiNilai(document.getElementById("kiri1_2")?.value);
            const subY2 = normalisasiNilai(document.getElementById("subY2_2")?.value);
            const subY1 = normalisasiNilai(document.getElementById("subY1_2")?.value);
            const subX2 = normalisasiNilai(document.getElementById("subX2_2")?.value);
            const subX1 = normalisasiNilai(document.getElementById("subX1_2")?.value);

            const kiri2 = normalisasiNilai(document.getElementById("kiri2_2")?.value);
            const hasilAtas = normalisasiNilai(document.getElementById("hasilAtas_2")?.value);
            const hasilBawah = normalisasiNilai(document.getElementById("hasilBawah_2")?.value);

            const persKiri = normalisasiNilai(document.getElementById("pers1Kiri_2")?.value);
            const persKanan = normalisasiNilai(document.getElementById("pers1Kanan_2")?.value);
            const hasilP = normalisasiNilai(document.getElementById("hasilP_2")?.value);

            const fb = document.getElementById("fbLatihan2");
            const nextBtn = document.getElementById("nextBtnLatihan2");

            if (!fb) return;

            const benarTitik =
                x1 === "1" &&
                y1 === "2" &&
                x2 === "5" &&
                y2 === "p";

            const benarGradien = m === "1";

            const benarSubstitusi =
                kiri1 === "1" &&
                subY2 === "p" &&
                subY1 === "2" &&
                subX2 === "5" &&
                subX1 === "1";

            const benarSederhana =
                kiri2 === "1" &&
                hasilAtas === "p-2" &&
                hasilBawah === "4";

            const benarHilangkanPecahan =
                persKiri === "4" &&
                persKanan === "p-2";

            const benarP = hasilP === "6";

            setValid("x1_2", x1 === "1");
            setValid("y1_2", y1 === "2");
            setValid("x2_2", x2 === "5");
            setValid("y2_2", y2 === "p");
            setValid("m_2", benarGradien);

            setValid("kiri1_2", kiri1 === "1");
            setValid("subY2_2", subY2 === "p");
            setValid("subY1_2", subY1 === "2");
            setValid("subX2_2", subX2 === "5");
            setValid("subX1_2", subX1 === "1");

            setValid("kiri2_2", kiri2 === "1");
            setValid("hasilAtas_2", hasilAtas === "p-2");
            setValid("hasilBawah_2", hasilBawah === "4");

            setValid("pers1Kiri_2", persKiri === "4");
            setValid("pers1Kanan_2", persKanan === "p-2");
            setValid("hasilP_2", benarP);

            if (
                benarTitik &&
                benarGradien &&
                benarSubstitusi &&
                benarSederhana &&
                benarHilangkanPecahan &&
                benarP
            ) {
                fb.innerHTML = `
            <div class="alert alert-success mb-0">
                <strong>Benar.</strong><br>
                Karena gradiennya $1$, maka:
                <div class="text-center my-2">
                    $1 = \\frac{p - 2}{5 - 1} = \\frac{p - 2}{4}$
                </div>
                Kalikan kedua ruas dengan $4$, sehingga diperoleh:
                <div class="text-center my-2">
                    $4 = p - 2$
                </div>
                Maka $p = 6$.
                <br>
                Silakan lanjut ke latihan berikutnya.
            </div>
        `;

                if (nextBtn) nextBtn.disabled = false;

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L2`,
                    "input",
                    ambilJawabanLatihanTitik2(),
                    true
                );
            } else {
                let hints = [];

                if (!benarTitik) hints.push("Periksa lagi penentuan nilai $x_1$, $y_1$, $x_2$, dan $y_2$.");
                if (benarTitik && !benarGradien) hints.push("Periksa kembali nilai gradien yang diketahui pada soal.");
                if (benarTitik && benarGradien && !benarSubstitusi) hints.push(
                    "Periksa lagi substitusi nilai ke rumus gradien.");
                if (benarTitik && benarGradien && benarSubstitusi && !benarSederhana) hints.push(
                    "Sederhanakan penyebut pecahannya.");
                if (benarTitik && benarGradien && benarSubstitusi && benarSederhana && !benarHilangkanPecahan) hints
                    .push("Periksa kembali langkah menghilangkan pecahan.");
                if (benarTitik && benarGradien && benarSubstitusi && benarSederhana && benarHilangkanPecahan && !benarP)
                    hints.push("Periksa kembali nilai akhir $p$.");

                fb.innerHTML = `
            <div class="alert alert-danger mb-0">
                ${hints.join("<br>")}
            </div>
        `;

                if (nextBtn) nextBtn.disabled = true;
                resetStepSetelah(3);
            }

            renderMath(fb);
        }

        // =========================
        // LATIHAN 3
        // =========================
        async function cekLatihanTitik3() {
            const ids = [
                "subY2_3", "subY1_3", "subX2_3", "subX1_3",
                "hasilAtas_3", "hasilBawah_3",
                "hasilAkhirAtas_3", "hasilAkhirBawah_3",
            ];

            clearValid(ids);

            const subY2 = normalisasiNilai(document.getElementById("subY2_3")?.value);
            const subY1 = normalisasiNilai(document.getElementById("subY1_3")?.value);
            const subX2 = normalisasiNilai(document.getElementById("subX2_3")?.value);
            const subX1 = normalisasiNilai(document.getElementById("subX1_3")?.value);

            const hasilAtas = normalisasiNilai(document.getElementById("hasilAtas_3")?.value);
            const hasilBawah = normalisasiNilai(document.getElementById("hasilBawah_3")?.value);
            const akhirAtas = normalisasiNilai(document.getElementById("hasilAkhirAtas_3")?.value);
            const akhirBawah = normalisasiNilai(document.getElementById("hasilAkhirBawah_3")?.value);

            const fb = document.getElementById("fbLatihan3");

            if (!fb) return;

            const benarSubstitusi =
                subY2 === "4" &&
                subY1 === "1" &&
                subX2 === "8" &&
                subX1 === "2";

            const benarHasil =
                hasilAtas === "3" &&
                hasilBawah === "6";

            const benarAkhir =
                akhirAtas === "1" &&
                akhirBawah === "2";

            setValid("subY2_3", subY2 === "4");
            setValid("subY1_3", subY1 === "1");
            setValid("subX2_3", subX2 === "8");
            setValid("subX1_3", subX1 === "2");

            setValid("hasilAtas_3", hasilAtas === "3");
            setValid("hasilBawah_3", hasilBawah === "6");

            setValid("hasilAkhirAtas_3", akhirAtas === "1");
            setValid("hasilAkhirBawah_3", akhirBawah === "2");

            if (benarSubstitusi && benarHasil && benarAkhir) {
                fb.innerHTML = `
            <div class="alert alert-success mb-0">
                <strong>Benar.</strong><br>
                Gradien jalan tersebut adalah:
                <div class="text-center my-2">
                    $m = \\frac{4 - 1}{8 - 2} = \\frac{3}{6} = \\frac{1}{2}$
                </div>
                Jadi, gradien jalan tersebut adalah $\\frac{1}{2}$.
            </div>
        `;

                const akhir = document.getElementById("pesanAkhirLatihan");

                if (akhir) {
                    akhir.innerHTML = `
                <div class="alert alert-success fw-semibold text-center mt-3">
                    Bagus, kamu sudah memahami cara menentukan gradien garis melalui dua titik.
                    Silakan lanjut ke materi berikutnya.
                </div>
            `;
                    renderMath(akhir);
                }

                await simpanProgressLatihan(
                    `${MATERI_SLUG}_L3`,
                    "input",
                    ambilJawabanLatihanTitik3(),
                    true
                );

                const saved = await saveProgressMateri();

                if (saved) {
                    bukaNextButton();
                } else if (akhir) {
                    akhir.innerHTML += `
                <div class="alert alert-warning mt-2 mb-0">
                    Jawaban benar, tetapi progres belum tersimpan. Coba cek koneksi atau refresh halaman.
                </div>
            `;
                }
            } else {
                let hints = [];

                if (!benarSubstitusi) hints.push(
                "Periksa lagi substitusi titik awal dan titik akhir ke rumus gradien.");
                if (benarSubstitusi && !benarHasil) hints.push(
                    "Hitung kembali hasil pengurangan pada pembilang dan penyebut.");
                if (benarSubstitusi && benarHasil && !benarAkhir) hints.push("Sederhanakan hasil gradiennya.");

                fb.innerHTML = `
            <div class="alert alert-danger mb-0">
                ${hints.join("<br>")}
            </div>
        `;
            }

            renderMath(fb);
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
