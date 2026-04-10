@extends('layout.halaman-materi')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/subbabB/subbabB_gradien1titik.css') }}">

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
    <h2 class="mt-2 mb-3" style="font-weight: 600;">2. Gradien yang melewati titik $(0, 0)$ dan $A(x,y)$</h2>

    {{-- Eksplorasi --}}
    <div class="position-relative p-4 mt-4 mb-4"
        style="border:2px solid #4a76b8; border-radius:12px; background-color:white;">
        <div class="position-absolute px-3 py-2 text-white fw-bold"
            style="top:-18px; left:20px; background-color:#4a76b8; border-radius:8px;">
            Eksplorasi: Titik-titik Segaris dengan (0,0)
        </div>

        <div class=" mb-3" style="line-height:1.6;">
            Klik titik-titik pada bidang koordinat. Pilih <b>3 titik</b> yang menurutmu berada pada <b>garis yang sama</b>
            dan garis tersebut melewati <b>O(0,0)</b>.
            <br><span class="d-inline-block mt-1">Petunjuk: kalau segaris lewat O, biasanya perbandingan <b>y/x</b> akan
                sama.</span>
        </div>

        <div id="segaris-origin-canvas" class="mb-3"></div>

        <div class="row g-3">
            <div class="col-12 col-md-7">
                <div class="border rounded-4 p-3" style="background:#f7f9fc;">
                    <div class="fw-bold mb-2">Titik yang kamu pilih:</div>
                    <div id="pickedList" class="small text-muted">Belum ada titik dipilih.</div>
                    <div id="ratioList" class="small mt-2"></div>
                </div>
            </div>

            <div class="col-12 col-md-5">
                <div class="d-flex gap-2 flex-wrap">
                    <button class="btn btn-palet btn-sm" onclick="cekSegarisOrigin()">Cek</button>
                    <button class="btn btn-outline-secondary btn-sm" onclick="resetSegarisOrigin()">Reset</button>
                </div>
                <div id="fbSegarisOrigin" class="mt-3"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/p5@1.9.0/lib/p5.min.js"></script>
    <script src="{{ asset('js/subbabB/eksplorasi_segaris.js') }}"></script>

    {{-- Materi --}}
    <div class="card card-materi mb-4">
        <div class="card-body p-4">
            <p class="mb-3" style="line-height: 1.8;">
                Untuk menentukan gradien garis yang melalui titik pusat $(0,0)$ dan titik lain $A(x,y)$, kita cukup
                memperhatikan koordinat titik $A(x,y)$. Gradien menyatakan perbandingan perubahan nilai pada sumbu $y$
                terhadap perubahan nilai pada sumbu $x$.
            </p>

            {{-- Ilustrasi --}}
            <div class="img-grid mb-3">
                <figure>
                    <img src="{{ asset('img/gradien/gradiensatutitik.png') }}" alt="Ilustrasi Gambar 2.1">
                    <figcaption class="mt-2 text-muted" style="font-size: 13px;">Gambar 2.1</figcaption>
                </figure>
            </div>

            <p class="mb-2" style="line-height: 1.8;">
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
    <div class="card card-materi mt-4 mb-4">
        <div class="card-body p-4">

            <span class="badge-latihan">Latihan</span>

            <p style="line-height:1.8;">
                Tentukan gradien garis yang melalui titik <b>O(0,0)</b> dan titik <b>A(6,3)</b>.
            </p>

            <p>Lengkapi langkah berikut.</p>

            <!-- LANGKAH 1 -->
            <div class="border rounded-4 p-3 mb-3" style="background:#f7f9fc;">
                <div class="fw-bold mb-2">Langkah 1</div>

                <p>Gunakan rumus gradien berikut:</p>

                <div class="rumus-box text-center mb-3">
                    $$ m = \frac{y}{x} $$
                </div>

                <p>Masukkan nilai koordinat titik <b>A(6,3)</b> ke bentuk pecahan berikut.</p>

                <div class="d-flex align-items-center gap-3 flex-wrap">
                    <div style="font-size:24px;">m =</div>

                    <div class="d-flex flex-column align-items-center">
                        <input type="text" id="inputPembilang" class="form-control text-center" style="width:80px;"
                            placeholder="y">
                        <div style="border-top:2px solid #000; width:80px; margin:4px 0;"></div>
                        <input type="text" id="inputPenyebut" class="form-control text-center" style="width:80px;"
                            placeholder="x">
                    </div>

                    <button class="btn btn-palet btn-sm" onclick="cekSubstitusi()">Cek</button>
                </div>

                <div id="fb1" class="mt-2"></div>
            </div>

            <!-- LANGKAH 2 -->
            <div id="step2" class="border rounded-4 p-3" style="background:#f7f9fc; display:none;">
                <div class="fw-bold mb-2">Langkah 2</div>

                <p>Sederhanakan hasil gradiennya, lalu isi dalam bentuk pecahan.</p>

                <div class="d-flex align-items-center gap-3 flex-wrap">
                    <div style="font-size:24px;">m =</div>

                    <div class="d-flex flex-column align-items-center">
                        <input type="text" id="inputHasilAtas" class="form-control text-center" style="width:80px;"
                            placeholder="atas">
                        <div style="border-top:2px solid #000; width:80px; margin:4px 0;"></div>
                        <input type="text" id="inputHasilBawah" class="form-control text-center" style="width:80px;"
                            placeholder="bawah">
                    </div>

                    <button class="btn btn-palet btn-sm" onclick="cekHasil()">Cek</button>
                </div>

                <div id="fb2" class="mt-2"></div>
            </div>

        </div>
    </div>

    <script>
        function cekSubstitusi() {
            const pembilang = document.getElementById("inputPembilang").value.trim();
            const penyebut = document.getElementById("inputPenyebut").value.trim();
            const fb1 = document.getElementById("fb1");

            if (pembilang === "3" && penyebut === "6") {
                fb1.innerHTML = "<span class='text-success'>Benar, substitusinya tepat: m = 3/6</span>";
                document.getElementById("step2").style.display = "block";
            } else {
                fb1.innerHTML = "<span class='text-danger'>Belum tepat. Ingat, y = 3 dan x = 6.</span>";
            }
        }

        function cekHasil() {
            const atas = document.getElementById("inputHasilAtas").value.trim();
            const bawah = document.getElementById("inputHasilBawah").value.trim();
            const fb2 = document.getElementById("fb2");

            if (atas === "1" && bawah === "2") {
                fb2.innerHTML = "<span class='text-success fw-bold'>Benar, gradiennya adalah 1/2</span>";
            } else {
                fb2.innerHTML = "<span class='text-danger'>Belum tepat. Sederhanakan 3/6 terlebih dahulu.</span>";
            }
        }
    </script>

    <div class="card card-materi mt-4 mb-4">
        <div class="card-body p-4">

            <span class="badge-latihan">Latihan</span>

            <div id="latihan1" class="latihan-step">

                <p style="line-height:1.8;">
                    <b>1.</b> Seorang pendaki memulai perjalanan dari kaki gunung pada titik
                    <b>$O(0,0)$</b>. Ia dapat memilih dua jalur untuk mencapai pos pendakian,
                    yaitu jalur <b>$A(800,400)$</b> dan jalur <b>$B(600,450)$</b>.
                    Angka pertama menyatakan jarak mendatar dalam meter, sedangkan angka kedua
                    menyatakan kenaikan tinggi dalam meter.
                    Tentukan gradien masing-masing jalur, lalu pilih jalur yang <b>lebih landai</b>
                    agar pendaki lebih mudah naik ke gunung.
                </p>

                <p class="mb-2"><b>Penyelesaian:</b></p>

                <div class="row g-4 latihan-dua-kolom">

                    <div class="col-md-6">
                        <div class="kolom-latihan">
                            <p class="mb-2">
                                <b>a.</b> Gradien garis yang melalui titik <b>$O(0,0)$</b> dan <b>$A(800,400)$</b> adalah
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
                                <b>b.</b> Gradien garis yang melalui titik <b>$O(0,0)$</b> dan <b>$B(600,450)$</b> adalah
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
                    </div>

                    <div id="feedbackLatihan1" class="mt-3"></div>
                </div>

            </div>


            <div id="latihan2" class="latihan-step d-none">

                <p style="line-height:1.8;">
                    <b>2.</b> Perhatikan grafik berikut. Dari titik asal <b>$O$</b> dibuat tiga garis menuju
                    titik <b>$A$</b>, <b>$B$</b>, dan <b>$C$</b>. Tentukan gradien garis <b>$OA$</b>,
                    gradien garis <b>$OB$</b>, dan gradien garis <b>$OC$</b>.
                </p>

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
                    <button type="button" class="btn btn-palet btn-sm" onclick="cekLatihan2()">Cek</button>
                    <div id="feedbackLatihan2" class="mt-3"></div>
                </div>

            </div>

            <div id="latihan3" class="latihan-step d-none">

                <p style="line-height:1.8;">
                    <b>3.</b> Seorang petugas pemetaan mencatat bahwa sebuah garis jalan dimulai dari titik
                    <b>$O(0,0)$</b> dan melalui titik <b>$A(6,p)$</b>. Diketahui gradien garis tersebut adalah
                    <b>$4$</b>. Tentukan nilai <b>$p$</b>.
                </p>

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
                                        class="form-control form-control-sm text-center jawaban-latihan" placeholder="p">
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

                    <div class="mt-3">
                        <button type="button" class="btn btn-palet btn-sm" onclick="cekLatihan3()">Cek</button>
                    </div>

                    <div id="feedbackLatihan3" class="mt-3"></div>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/subbabB/subbabB_gradien1titik.js') }}"></script>
@endsection

@section('nav')
    <a href="{{ route('subbabB_gradien') }}" class="btn btn-prev px-4 rounded-pill">
        ← Prev
    </a>
    <a href="{{ route('subbabB_gradienduatitik') }}" class="btn btn-next px-4 rounded-pill fw-semibold">
        Next →
    </a>
@endsection
