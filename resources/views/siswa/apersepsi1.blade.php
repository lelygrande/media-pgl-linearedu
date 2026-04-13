@extends('layout.halaman-materi')

@section('content')
    <style>
        .box-pengantar {
            background: var(--hero-bg);
            border-radius: 12px;
            padding: 14px 16px;
            border: 1px solid rgba(0, 0, 0, .05);
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

    <div class="container mt-4">

        <div class="card shadow-sm mb-4">
            <div class="card-body">

                <h1 class="mb-3" style="font-weight: 600;">Apersepsi</h1>

                <p style="text-align: justify;">
                    Dalam kehidupan sehari-hari, suatu lokasi dapat ditentukan dengan menggunakan dua informasi arah.
                    Misalnya pada peta kawasan lahan basah, posisi suatu objek seperti tanaman atau rumah
                    dapat ditentukan berdasarkan arah mendatar dan arah tegak.
                    Untuk menyatakan posisi tersebut secara tepat, digunakan suatu sistem
                    yang disebut <strong>sistem koordinat Kartesius</strong>.
                </p>

                <div class="text-center my-4">
                    <img src="{{ asset('img/koordinatkartesius.jpg') }}" alt="Bidang Koordinat Kartesius" class="img-fluid"
                        style="max-width: 400px;">
                </div>

                <p style="text-align: justify;">
                    Sistem koordinat Kartesius terdiri atas dua sumbu yang saling tegak lurus,
                    yaitu sumbu X (mendatar) dan sumbu Y (tegak).
                    Titik perpotongan kedua sumbu tersebut disebut <strong>titik asal</strong>
                    dan dinyatakan dengan (0,0).
                </p>

                <div class="text-center my-4">
                    <img src="{{ asset('img/titikpotong00.png') }}" alt="Titik Asal (0,0)" class="img-fluid"
                        style="max-width: 250px;">
                </div>

                <p style="text-align: justify;">
                    Setiap posisi pada bidang koordinat dinyatakan dalam bentuk pasangan bilangan
                    <strong>(x, y)</strong>.
                    Pasangan bilangan tersebut menunjukkan letak suatu <strong>titik</strong>
                    pada bidang koordinat Kartesius.
                </p>

                <p style="text-align: justify;">
                    Agar lebih memahami bagaimana suatu titik ditentukan oleh pasangan bilangan
                    tersebut, lakukanlah aktivitas berikut.
                </p>
            </div>
        </div>

        <div class="position-relative p-4" style="border:2px solid #4a76b8; border-radius:6px; background-color:white;">

            <!-- Label -->
            <div class="position-absolute px-3 py-2 text-white fw-bold"
                style="top:-18px; left:20px; background-color:#4a76b8; border-radius:8px;">
                Eksplorasi Titik
            </div>

            <div class="box-pengantar mt-3 mb-3" style="border-radius:10px;">
                Pada aktivitas ini kamu akan mengeksplorasi bagaimana posisi sebuah titik
                ditentukan oleh dua bilangan, yaitu $x$ dan $y$.

                <br><br>

                <b>Lakukan langkah berikut:</b>
                <ol class="mb-0 mt-2">
                    <li>Geser titik A ke arah kanan dan ke kiri.</li>
                    <li>Perhatikan bagaimana nilai <b>x</b> berubah.</li>
                    <li>Selanjutnya geser titik A ke arah atas dan ke bawah.</li>
                    <li>Perhatikan bagaimana nilai <b>y</b> berubah.</li>
                </ol>

                Amati perubahan nilai koordinat yang ditampilkan pada titik tersebut.
            </div>

            <!-- GeoGebra Container -->
            <div id="ggb-element" class="mt-4"></div>

            <div class="mt-4">

                <p>
                    Setelah melakukan pengamatan terhadap pergerakan titik,
                    jawablah pertanyaan berikut berdasarkan hasil eksplorasimu.
                </p>

                <!-- Pertanyaan 1 -->
                <div class="mb-3">
                    <p>1. Apa yang terjadi pada nilai x ketika titik digeser ke arah kanan?</p>

                    <input type="radio" name="q1" value="a"> a. Nilai x berkurang<br>
                    <input type="radio" name="q1" value="b"> b. Nilai x tetap<br>
                    <input type="radio" name="q1" value="c"> c. Nilai x bertambah<br>

                    <div id="result1" class="mt-1"></div>
                </div>


                <!-- Pertanyaan 2 -->
                <div class="mb-3">
                    <p>2. Apa yang terjadi pada nilai y ketika titik digeser ke arah atas?</p>

                    <input type="radio" name="q2" value="a"> a. Nilai y tetap<br>
                    <input type="radio" name="q2" value="b"> b. Nilai y bertambah<br>
                    <input type="radio" name="q2" value="c"> c. Nilai y berkurang<br>

                    <div id="result2" class="mt-1"></div>
                </div>


                <!-- Pertanyaan 3 -->
                <div class="mb-3">
                    <p>3. Apa yang terjadi jika titik digeser ke kiri dan ke bawah?</p>

                    <input type="radio" name="q3" value="a"> a. Nilai x dan y berkurang<br>
                    <input type="radio" name="q3" value="b"> b. Nilai x bertambah dan y berkurang<br>
                    <input type="radio" name="q3" value="c"> c. Nilai x dan y bertambah<br>

                    <div id="result3" class="mt-1"></div>
                </div>

                <button class="btn-palet btn mt-2" onclick="cekJawaban()">Cek Jawaban</button>

                <!-- Kesimpulan -->
                <div id="kesimpulanBox" class="mt-4 p-3 border border-success rounded bg-light" style="display:none;">
                    <strong>Kesimpulan:</strong><br>
                    Pada bidang koordinat Kartesius, posisi suatu titik ditentukan oleh pasangan
                    bilangan <b>(x, y)</b>.

                    <ul class="mb-0 mt-2">
                        <li>Nilai <b>x</b> menunjukkan posisi titik secara mendatar.</li>
                        <li>Nilai <b>y</b> menunjukkan posisi titik secara tegak.</li>
                    </ul>

                    Dengan demikian, setiap titik pada bidang koordinat dapat dinyatakan
                    dalam bentuk pasangan berurutan <b>(x, y)</b>.
                </div>
            </div>
        </div>
    </div>

    <script src="https://www.geogebra.org/apps/deployggb.js"></script>

    <script>
        var params = {
            "appName": "graphing",
            "width": 700,
            "height": 500,
            "showToolBar": false,
            "showAlgebraInput": false,
            "showMenuBar": false,
            "enableShiftDragZoom": true,
            "enableRightClick": false,
            "showResetIcon": true
        };

        var applet = new GGBApplet(params, true);

        window.addEventListener("load", function() {
            applet.inject('ggb-element');

            setTimeout(function() {
                var ggb = applet.getAppletObject();
                ggb.evalCommand("A = (1,1)");
                ggb.setLabelVisible("A", true);
                ggb.setLabelStyle("A", 1);
            }, 1000);
        });
    </script>

    <script>
        function cekJawaban() {

            const kunci = {
                q1: "c",
                q2: "b",
                q3: "a"
            };

            let benarSemua = true;

            for (let key in kunci) {
                const jawaban = document.querySelector(`input[name="${key}"]:checked`);
                const resultDiv = document.getElementById("result" + key.slice(1));

                if (!jawaban) {
                    resultDiv.innerHTML = "<span class='text-warning'>Pilih salah satu jawaban</span>";
                    benarSemua = false;
                } else if (jawaban.value === kunci[key]) {
                    resultDiv.innerHTML = "<span class='text-success'>✓ Benar</span>";
                } else {
                    resultDiv.innerHTML = "<span class='text-danger'>✗ Salah</span>";
                    benarSemua = false;
                }
            }

            if (benarSemua) {
                document.getElementById("kesimpulanBox").style.display = "block";
            } else {
                document.getElementById("kesimpulanBox").style.display = "none";
            }
        }
    </script>

    <div class="position-relative p-4 mt-5" style="border:2px solid #4a76b8; border-radius:6px; background-color:white;">

        <!-- Label -->
        <div class="position-absolute px-3 py-2 text-white fw-bold"
            style="top:-18px; left:20px; background-color:#4a76b8; border-radius:8px;">
            Eksplorasi Titik pada Bidang Koordinat
        </div>

        <p>
            Setelah memahami bahwa posisi titik dinyatakan dengan pasangan berurutan (x,y),
            sekarang kamu akan mencoba menentukan posisi titik berdasarkan nilai x dan y
            yang diberikan.
        </p>

        <div class="box-pengantar mt-3 mb-3" style="border-radius:10px;">
            Pada aktivitas ini kamu akan mencoba menentukan posisi titik berdasarkan nilai
            <b>x</b> dan <b>y</b>.

            <br><br>

            <b>Petunjuk:</b>
            <ul class="mb-0 mt-2">
                <li>Ubah nilai X dan Y pada kotak input.</li>
                <li>Perhatikan bagaimana posisi titik berpindah pada bidang koordinat.</li>
                <li>Tentukan pasangan berurutan yang sesuai pada tabel.</li>
            </ul>
        </div>

        <div class="mb-3">
            X: <input type="number" id="inputX" value="0" class="form-control d-inline-block w-auto">
            Y: <input type="number" id="inputY" value="0" class="form-control d-inline-block w-auto">
        </div>

        <div id="canvas-container" class="mt-3"></div>

        <h5 class="mt-4"><strong>Lengkapilah Posisi Titik Berikut</strong></h5>

        <table class="table table-bordered text-center">
            <thead class="table-light">
                <tr>
                    <th>x</th>
                    <th>y</th>
                    <th>Posisi Titik</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>3</td>
                    <td>2</td>
                    <td><input type="text" id="p1" class="form-control text-center" placeholder="(x,y)"></td>
                </tr>
                <tr>
                    <td>-2</td>
                    <td>4</td>
                    <td><input type="text" id="p2" class="form-control text-center" placeholder="(x,y)"></td>
                </tr>
                <tr>
                    <td>-3</td>
                    <td>-1</td>
                    <td><input type="text" id="p3" class="form-control text-center" placeholder="(x,y)"></td>
                </tr>
            </tbody>
        </table>

        <button class="btn-palet btn" onclick="cekTitik()">Cek Jawaban</button>

        <div id="hasilTitik" class="mt-3"></div>

    </div>

    <div class="position-relative p-4 mt-5" style="border:2px solid #4a76b8; border-radius:6px; background-color:white;">

        <div class="position-absolute px-3 py-2 text-white fw-bold"
            style="top:-18px; left:20px; background-color:#4a76b8; border-radius:8px;">
            Latihan Membuat Titik
        </div>

        <p>
            Sekarang kamu sudah dapat membaca posisi titik pada bidang koordinat.
            Selanjutnya, cobalah menempatkan titik secara mandiri berdasarkan pasangan
            bilangan yang diberikan.
        </p>

        <div class="box-pengantar mt-3 mb-3" style="border-radius:10px;">
            Pada latihan ini kamu akan menempatkan titik pada bidang koordinat
            dengan cara <b>mengklik</b> lokasi yang sesuai.

            <br><br>

            Ingat bahwa suatu titik dinyatakan dengan pasangan berurutan
            <b>(x,y)</b>.

            <br><br>

            <b>Tugasmu:</b>
            <ul class="mb-0 mt-2">
                <li>Klik posisi yang sesuai untuk titik B, C, dan D.</li>
                <li>Perhatikan arah mendatar (x) dan arah tegak (y).</li>
                <li>Jika terjadi kesalahan, gunakan tombol <b>Reset</b>.</li>
            </ul>
        </div>

        <ul>
            <li>$B (2,3)$</li>
            <li>$C (-7,3)$</li>
            <li>$D (5,-4)$</li>
        </ul>

        <div id="canvas-latihan-buat"></div>

        <button class="btn-palet btn btn-sm mt-3" onclick="cekTitikBuat()">Cek Jawaban</button>
        <button class="btn-palet btn btn-sm mt-3" onclick="resetTitik()">Reset</button>
        <div id="hasilLatihanBuat" class="mt-3"></div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.9.0/p5.min.js"></script>
    <script src="{{ asset('js/subbabA/latihan_membuat_titik.js') }}"></script>
    <script src="{{ asset('js/subbabA/eksplorasititik1.js') }}"></script>

    <script>
        function normalisasi(input) {
            return input.replace(/\s/g, "").toLowerCase();
        }

        function cekTitik() {

            const kunci = {
                p1: "3,2",
                p2: "-2,4",
                p3: "-3,-1"
            };

            let benarSemua = true;

            for (let key in kunci) {

                let jawaban = normalisasi(document.getElementById(key).value);

                if (jawaban === normalisasi(kunci[key])) {
                    document.getElementById(key).classList.remove("is-invalid");
                    document.getElementById(key).classList.add("is-valid");
                } else {
                    document.getElementById(key).classList.remove("is-valid");
                    document.getElementById(key).classList.add("is-invalid");
                    benarSemua = false;
                }
            }

            if (benarSemua) {
                document.getElementById("hasilTitik").innerHTML =
                    "<div class='alert alert-success'>Semua jawaban benar</div>";
            } else {
                document.getElementById("hasilTitik").innerHTML =
                    "<div class='alert alert-danger'>Masih ada jawaban yang salah </div>";
            }
        }
    </script>
@endsection


@section('nav')
    <a href="{{ route('peta-konsep') }}" class="btn btn-prev px-4 rounded-pill">
        ← Prev
    </a>
    <a href="{{ route('materi.show', 'subbab-a1') }}" class="btn btn-next px-4 rounded-pill fw-semibold">
        Next →
    </a>
@endsection
