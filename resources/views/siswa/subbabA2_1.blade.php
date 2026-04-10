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

        /* Box materi */
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

        .badge-latihan {
            display: inline-block;
            background: #22b969;
            color: #fff;
            font-weight: 800;
            padding: 6px 12px;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .materi-img {
            width: 100%;
            max-width: 560px;
            display: block;
            margin: 10px auto 0;
            border-radius: 8px;
        }

        .box-border-blue {
            border: 2px solid #2E75B6;
            border-radius: 10px;
            background: #fff;
            padding: 12px;
        }

        .tabel-garis {
            width: 100%;
            border-collapse: collapse;
            font-size: 15px;
            background: white;
        }

        .tabel-garis th,
        .tabel-garis td {
            border: 2px solid #000;
            padding: 8px 10px;
            vertical-align: middle;
        }

        .tabel-garis th {
            text-align: center;
            font-weight: 800;
        }

        .tabel-garis td:nth-child(1),
        .tabel-garis td:nth-child(3) {
            text-align: center;
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

        /* Tabel inputan */

        .input-y {
            width: 100%;
            max-width: 160px;
            padding: 6px 10px;
            border: 1px solid rgba(0, 0, 0, .2);
            border-radius: 8px;
            font-size: 15px;
        }

        .feedback-box {
            border-radius: 10px;
            padding: 10px 12px;
            margin-top: 10px;
            font-weight: 600;
            display: none;
        }

        .feedback-ok {
            display: block;
            background: #e8fff0;
            border: 1px solid #2fb344;
            color: #1b7a31;
        }

        .feedback-bad {
            display: block;
            background: #ffe8e8;
            border: 1px solid #e03131;
            color: #b42318;
        }

        .geogebra-wrap {
            border: 2px solid #2E75B6;
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/contrib/auto-render.min.js"
        onload="renderMathInElement(document.body);"></script>


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
    <h2 class="mt-2 mb-3" style="font-weight: 600;">2. Menggambar Grafik Persamaan Garis Lurus</h2>

    <div class="box-info mb-3">
        <h5 class="mb-2" style="font-weight:700;">2.1 Menggambar Grafik Persamaan menggunakan Beberapa Titik</h5>

        <p class="mb-3" style="line-height:1.7;">
            Persamaan garis lurus tidak hanya dapat dituliskan dalam bentuk aljabar,
            tetapi juga dapat direpresentasikan dalam bentuk grafik. Dengan menggambarkan grafik,
            kita dapat memahami hubungan antara dua variabel secara lebih jelas dan visual.
            Berikut ini akan dibahas cara menggambar grafik persamaan garis lurus.
        </p>

        <p class="mb-2">
            Grafik persamaan garis lurus dapat digambar dengan menentukan beberapa titik yang memenuhi persamaan tersebut.
            Langkah-langkah menggambar grafik persamaan garis lurus adalah sebagai berikut:
        </p>

        <ol class="mb-0" style="line-height:1.7; padding-left: 18px;">
            <li>Tentukan beberapa titik yang memenuhi persamaan garis lurus dengan terlebih dahulu memilih nilai $x$,
                kemudian hitung nilai $y$ yang sesuai.</li>
            <li>Buatlah tabel pasangan nilai $x$ dan $y$ yang memenuhi persamaan garis lurus.</li>
            <li>Gambarkan pasangan berurutan $(x, y)$ sebagai titik-titik pada bidang koordinat Kartesius.</li>
            <li>Hubungkan titik-titik tersebut sehingga terbentuk sebuah garis lurus.</li>
        </ol>
    </div>

    {{-- Contoh --}}
    <div class="box-border-blue mb-4">
        <span class="badge-judul">Contoh</span>
        <p class="mb-2">
            Gambarlah grafik persamaan garis lurus:
        </p>

        <div class="box-info mb-3" style="background:#fff;">

            <p class="text-center mb-2" style="font-weight:700;">
                \( y = 2x - 4 \)
            </p>

            <p class="mb-2">
                Untuk menggambar grafik persamaan \( y = 2x - 4 \),
                dipilih beberapa nilai \( x \), misalnya
                \( x = -2, 0, 2, 4 \),
                kemudian dihitung nilai \( y \) yang bersesuaian.
            </p>

            <div class="table-responsive">
                <table class="tabel-garis">
                    <thead>
                        <tr>
                            <th>\(x\)</th>
                            <th>\(y = 2x - 4\)</th>
                            <th>\((x,y)\)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>\(-2\)</td>
                            <td>\(y = 2(-2) - 4 = -8\)</td>
                            <td>\((-2,-8)\)</td>
                        </tr>
                        <tr>
                            <td>\(0\)</td>
                            <td>\(y = 2(0) - 4 = -4\)</td>
                            <td>\((0,-4)\)</td>
                        </tr>
                        <tr>
                            <td>\(2\)</td>
                            <td>\(y = 2(2) - 4 = 0\)</td>
                            <td>\((2,0)\)</td>
                        </tr>
                        <tr>
                            <td>\(4\)</td>
                            <td>\(y = 2(4) - 4 = 4\)</td>
                            <td>\((4,4)\)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <p class="mb-2">Penyelesaian:</p>
        <div class="box-info mb-3" style="background:#fff;">
            <p class="mb-2" style="font-weight:600;">Tampilkan titik satu per satu, lalu garisnya.
            </p>

            <div id="canvas-contoh-21" class="mb-2"></div>

            <div class="d-flex gap-2 flex-wrap">
                <button class="btn-palet btn-sm" onclick="tampilTitik21('A')">Tampilkan Titik A</button>
                <button class="btn-palet btn-sm" onclick="tampilTitik21('B')">Tampilkan Titik B</button>
                <button class="btn-palet btn-sm" onclick="tampilTitik21('C')">Tampilkan Titik C</button>
                <button class="btn-palet btn-sm" onclick="tampilTitik21('D')">Tampilkan Titik D</button>
                <button class="btn-palet btn-sm" onclick="tampilGaris21()">Tampilkan Garis</button>
                <button class="btn-palet btn-sm" onclick="resetContoh21()">Reset</button>
            </div>

            <div id="infoContoh21" class="mt-2"></div>
            <script src="{{ asset('js/subbabA/pcontoh21.js') }}"></script>
        </div>
    </div>

    {{-- LATIHAN SOAL --}}
    <div class="box-border-blue mb-4" id="latihan-garis">

        <span class="badge-latihan">Latihan Soal</span>

        <p class="mb-2" style="max-width: 720px;">
            Diketahui persamaan garis lurus:<br>
            <b>$y = 2x + 5$</b><br><br>

            <b>Langkah 1:</b> Isi tabel nilai $y$.<br>
            <b>Langkah 2:</b> Klik <b>Cek Tabel</b>.<br>
        </p>

        <table class="tabel-garis">
            <tr>
                <th>$x$</th>
                <th>$y = 2x + 5$</th>
                <th>$(x,y)$</th>
            </tr>
            <tr>
                <td>$-4$</td>
                <td><input type="number" id="y1"></td>
                <td id="pair1">$(-4, …)$</td>
            </tr>
            <tr>
                <td>$-2$</td>
                <td><input type="number" id="y2"></td>
                <td id="pair2">$(-2, …)$</td>
            </tr>
            <tr>
                <td>$0$</td>
                <td><input type="number" id="y3"></td>
                <td id="pair3">$(-0, …)$</td>
            </tr>
            <tr>
                <td>$2$</td>
                <td><input type="number" id="y4"></td>
                <td id="pair4">$(2, …)$</td>
            </tr>
        </table>

        <div class="mt-3">
            <button class="btn-palet" onclick="cekTabel()">Cek Tabel</button>
            <button class="btn-palet" onclick="resetLatihan()">Reset</button>
        </div>

        <div id="feedbackTabel" style="margin-top:10px;font-weight:600;"></div>

        {{-- GRAFIK --}}
        <div id="grafikSection" style="display:none; margin-top:20px;">
            <div id="canvas-holder"></div>
            <div id="feedbackGrafik" style="margin-top:10px;font-weight:600;"></div>
        </div>
    </div>

    <script>
        function cekTabel() {
            const expected = [-3, 1, 5, 9];

            const y1 = Number(document.getElementById("y1").value);
            const y2 = Number(document.getElementById("y2").value);
            const y3 = Number(document.getElementById("y3").value);
            const y4 = Number(document.getElementById("y4").value);

            // cek input kosong
            if (
                document.getElementById("y1").value === "" ||
                document.getElementById("y2").value === "" ||
                document.getElementById("y3").value === "" ||
                document.getElementById("y4").value === ""
            ) {
                document.getElementById("feedbackTabel").innerHTML =
                    `<span style="color:#b45309;">Isi semua nilai y dulu ya.</span>`;
                return;
            }

            // update pasangan titik (x,y)
            document.getElementById("pair1").innerHTML = `$(-4, ${y1})$`;
            document.getElementById("pair2").innerHTML = `$(-2, ${y2})$`;
            document.getElementById("pair3").innerHTML = `$(0, ${y3})$`;
            document.getElementById("pair4").innerHTML = `$(2, ${y4})$`;

            if (window.renderMathInElement) {
                renderMathInElement(document.getElementById("latihan-garis"), {
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

            // validasi benar/salah
            const ok =
                y1 === expected[0] &&
                y2 === expected[1] &&
                y3 === expected[2] &&
                y4 === expected[3];

            if (ok) {
                // kirim data titik target dari tabel ke p5
                window.tablePairs = [{
                        label: "A",
                        x: -4,
                        y: y1
                    },
                    {
                        label: "B",
                        x: -2,
                        y: y2
                    },
                    {
                        label: "C",
                        x: 0,
                        y: y3
                    },
                    {
                        label: "D",
                        x: 2,
                        y: y4
                    },
                ];

                if (window.loadTargetsFromTable) window.loadTargetsFromTable(window.tablePairs);
                document.getElementById("feedbackTabel").innerHTML =
                    `<span style="color:#15803d;">Tabel benar! Sekarang seret titik A–D pada grafik.</span>`;

                // tampilkan section grafik
                document.getElementById("grafikSection").style.display = "block";

                // kalau p5 sketch sudah ada, bisa reset posisi titik untuk mulai latihan
                if (window.resetPointsToStart) window.resetPointsToStart();
            } else {
                document.getElementById("feedbackTabel").innerHTML =
                    `<span style="color:#b91c1c;"> Masih ada yang salah. Coba cek lagi pakai y = 2x + 5.</span>`;
                document.getElementById("grafikSection").style.display = "none";
            }
        }

        function resetLatihan() {
            ["y1", "y2", "y3", "y4"].forEach(id => (document.getElementById(id).value = ""));
            document.getElementById("pair1").innerHTML = "$(-4, …)$";
            document.getElementById("pair2").innerHTML = "$(-2, …)$";
            document.getElementById("pair3").innerHTML = "$(0, …)$";
            document.getElementById("pair4").innerHTML = "$(2, …)$";

            document.getElementById("feedbackTabel").innerHTML = "";
            document.getElementById("feedbackGrafik").innerHTML = "";
            document.getElementById("grafikSection").style.display = "none";

            if (window.resetPointsToStart) window.resetPointsToStart();
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/p5@1.9.0/lib/p5.min.js"></script>
    <script src="{{ asset('js/subbabA/latsol21.js') }}"></script>
@endsection

@section('nav')
    <a href="{{ route('subbabA1') }}" class="btn btn-prev px-4 rounded-pill">
        ← Prev
    </a>
    {{-- ganti route next sesuai strukturmu --}}
    <a href="{{ route('subbabA2.2') }}" class="btn btn-next px-4 rounded-pill fw-semibold">
        Next →
    </a>
@endsection
