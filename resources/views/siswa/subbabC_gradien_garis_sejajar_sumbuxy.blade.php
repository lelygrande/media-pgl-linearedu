@extends('layout.halaman-materi')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/subbabC/subbabC_garis_sumbu_x_y.css') }}">
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

        .badge-eksplorasi {
            display: inline-block;
            background: #fff4cc;
            color: #8a6d1d;
            font-weight: 800;
            padding: 6px 12px;
            border-radius: 8px;
            margin-bottom: 10px;
            border: 1px solid #f0d98a;
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

        .box-bimbingan {
            background: #f8fbff;
            border-left: 5px solid #2E75B6;
            padding: 14px 16px;
            border-radius: 10px;
            margin-bottom: 16px;
        }

        .box-kesimpulan {
            background: #fff8e8;
            border: 1px solid #e6c76a;
            border-radius: 12px;
            padding: 14px 16px;
        }

        .quiz-card {
            border-radius: 16px;
            border: 1px solid #e5e7eb;
            background: #fff;
        }
    </style>

    {{-- Judul --}}
    <h1 class="mb-3" style="font-weight: 600;">C. Hubungan Gradien Garis</h1>

    {{-- Tujuan Pembelajaran --}}
    <div class="card card-tujuan mb-4">
        <div class="card-body">
            <h5>Tujuan Pembelajaran:</h5>
            <ol>
                <li>Siswa dapat menjelaskan hubungan gradien garis</li>
                <li>Siswa dapat menentukan gradien dari garis-garis yang saling sejajar</li>
                <li>Siswa dapat menentukan gradien dari garis-garis yang saling tegak lurus</li>
            </ol>
        </div>
    </div>

    {{-- Subjudul --}}
    <h2 class="mt-2 mb-3" style="font-weight: 600;">1. Gradien yang Sejajar dengan $Sumbu-x$ dan $Sumbu-y$</h2>

    {{-- ========================================================= --}}
    {{-- EKSPLORASI --}}
    {{-- ========================================================= --}}
    <div class="position-relative p-4 mt-4 mb-4"
        style="border:2px solid #4a76b8; border-radius:12px; background-color:white;">
        <div class="position-absolute px-3 py-2 text-white fw-bold"
            style="top:-18px; left:20px; background-color:#4a76b8; border-radius:8px;">
            Eksplorasi
        </div>

        <p class="mt-2">
            Pada bagian ini, kita akan menelusuri hubungan antara gradien dan bentuk garis.
            Perhatikan beberapa garis berikut, hitung gradien masing-masing garis, lalu bandingkan hasilnya.
            Dari kegiatan ini, kamu diharapkan dapat menemukan pola hubungan antara garis sejajar
            $sumbu\text{-}x$, garis sejajar $sumbu\text{-}y$, dan gradiennya.
        </p>

        {{-- ========================= --}}
        {{-- Eksplorasi Sumbu-x --}}
        {{-- ========================= --}}
        <div class="quiz-card p-3 mb-4">
            <span class="badge-eksplorasi">Eksplorasi $Sumbu\text{-}x$</span>

            <div id="step-x-1">
                <p class="mt-2">
                    Perhatikan tiga garis berikut.
                </p>

                <div class="table-responsive mb-3">
                    <table class="table table-bordered text-center align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Garis</th>
                                <th>Titik</th>
                                <th>Gradien ($m$)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>$a$</td>
                                <td>$A(-2,2)$ dan $B(4,2)$</td>
                                <td>
                                    <input type="number" id="mx1" class="form-control text-center"
                                        placeholder="Isi gradien">
                                </td>
                            </tr>
                            <tr>
                                <td>$b$</td>
                                <td>$C(1,5)$ dan $D(6,5)$</td>
                                <td>
                                    <input type="number" id="mx2" class="form-control text-center"
                                        placeholder="Isi gradien">
                                </td>
                            </tr>
                            <tr>
                                <td>$c$</td>
                                <td>$E(-3,-1)$ dan $F(2,-1)$</td>
                                <td>
                                    <input type="number" id="mx3" class="form-control text-center"
                                        placeholder="Isi gradien">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p>
                    Gunakan rumus gradien berikut untuk membantu perhitunganmu.
                </p>

                <div class="rumus-box text-center mb-3">
                    $$ m = \frac{y_2 - y_1}{x_2 - x_1} $$
                </div>

                <button type="button" id="btn-tabel-x" class="btn btn-palet" onclick="cekTabelX()">
                    Cek Jawaban
                </button>

                <div id="feedback-x1" style="width: fit-content"></div>
            </div>

            <div id="step-x-2" class="d-none mt-3">
                <p>
                    <b>Bagus,</b> perhitungan gradien sudah benar. Setelah kamu mengisi tabel tersebut,
                    perhatikan nilai gradien yang diperoleh. Menurutmu, bagaimana hubungan ketiga gradien itu?
                </p>

                <select id="banding-x" class="form-select inline-select" style="width: 250px">
                    <option value="">Pilih</option>
                    <option value="sama">Semua gradien sama</option>
                    <option value="beda">Gradiennya berbeda</option>
                </select>

                <button type="button" id="btn-banding-x" class="btn btn-palet mt-2" onclick="cekBandingX()">
                    Cek
                </button>

                <div id="feedback-x2" style="width: fit-content"></div>
            </div>

            <div id="step-x-3" class="d-none mt-3">
                <p>
                    Sekarang perhatikan kembali pasangan titik pada setiap garis. Nilai $y$ pada setiap pasangan titik
                    tetap.
                    Jika digambarkan pada bidang koordinat, maka bentuk garis-garis tersebut adalah ....
                </p>

                <select id="bentuk-x" class="form-select inline-select" style="width: 200px">
                    <option value="">Pilih</option>
                    <option value="mendatar">Mendatar</option>
                    <option value="tegak">Tegak</option>
                    <option value="miring">Miring</option>
                </select>

                <button type="button" id="btn-bentuk-x" class="btn btn-palet mt-2" onclick="cekBentukX()">
                    Cek
                </button>

                <div id="feedback-x3" style="width: fit-content"></div>
            </div>

            <div id="step-x-4" class="d-none mt-3">
                <p>
                    Berdasarkan hasil perhitungan dan pengamatanmu, lengkapilah kesimpulan berikut.
                </p>

                <p class="mb-3">
                    Jika beberapa garis memiliki titik-titik dengan nilai $y$ yang sama, maka garis tersebut
                    <select id="simpulan-x1" class="form-select inline-select mx-1" style="width: 200px">
                        <option value="">Pilih</option>
                        <option value="mendatar">mendatar</option>
                        <option value="tegak">tegak</option>
                        <option value="miring">miring</option>
                    </select>
                    dan gradiennya
                    <select id="simpulan-x2" class="form-select inline-select mx-1" style="width: 200px">
                        <option value="">Pilih</option>
                        <option value="0">0</option>
                        <option value="tdk">tidak terdefinisi</option>
                        <option value="1">1</option>
                    </select>.
                </p>

                <button type="button" id="btn-simpulan-x" class="btn btn-palet" onclick="cekSimpulanX()">
                    Simpan Kesimpulan
                </button>

                <div id="feedback-x4" style="width: fit-content"></div>
            </div>

            <div class="box-kesimpulan d-none mt-3" id="kesimpulan-x">
                <b>Kesimpulan:</b><br>
                Dari hasil perhitungan, ketiga garis tersebut memiliki gradien yang sama, yaitu $0$.
                Dari pengamatan terhadap bentuk garisnya, ketiganya merupakan garis mendatar.
                Jadi, dapat disimpulkan bahwa garis yang memiliki pasangan titik dengan nilai $y$ sama
                merupakan garis yang sejajar dengan $sumbu\text{-}x$ dan gradiennya adalah $0$.
            </div>

            <div class="d-none mt-3" id="ggb-wrapper-x">
                <div id="ggb-sumbu-x" style="width:100%; height:420px;"></div>
            </div>
        </div>

        {{-- ========================= --}}
        {{-- Eksplorasi Sumbu-y --}}
        {{-- ========================= --}}
        <div class="quiz-card p-3 mb-3">
            <span class="badge-eksplorasi">Eksplorasi $Sumbu\text{-}y$</span>

            <div id="step-y-1">
                <p class="mt-2">
                    Sekarang perhatikan tiga garis berikut.
                </p>

                <p>
                    Hitung bentuk gradien masing-masing garis menggunakan rumus gradien, lalu isikan hasilnya
                    dalam bentuk pecahan pada tabel berikut.
                </p>

                <div class="rumus-box text-center mb-3">
                    $$ m = \frac{y_2 - y_1}{x_2 - x_1} $$
                </div>

                <div class="table-responsive mb-3">
                    <table class="table table-bordered text-center align-middle" style="table-layout: fixed;">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 80px;">Garis</th>
                                <th style="width: 260px;">Titik</th>
                                <th style="width: 160px;">Gradien ($m$)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>$p$</td>
                                <td>$P(2,3)$ dan $Q(2,-4)$</td>
                                <td>
                                    <div class="pecahan-tabel">
                                        <input type="number" id="py1-atas" class="input-pecahan">
                                        <div class="garis-pecahan-kecil"></div>
                                        <input type="number" id="py1-bawah" class="input-pecahan">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>$q$</td>
                                <td>$R(-1,5)$ dan $S(-1,-2)$</td>
                                <td>
                                    <div class="pecahan-tabel">
                                        <input type="number" id="py2-atas" class="input-pecahan">
                                        <div class="garis-pecahan-kecil"></div>
                                        <input type="number" id="py2-bawah" class="input-pecahan">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>$r$</td>
                                <td>$T(4,1)$ dan $U(4,6)$</td>
                                <td>
                                    <div class="pecahan-tabel">
                                        <input type="number" id="py3-atas" class="input-pecahan">
                                        <div class="garis-pecahan-kecil"></div>
                                        <input type="number" id="py3-bawah" class="input-pecahan">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <button type="button" id="btn-tabel-y" class="btn btn-palet" onclick="cekTabelY()">
                    Cek Jawaban
                </button>

                <div id="feedback-y1"></div>
            </div>

            <div id="step-y-2" class="d-none mt-3">
                <p>
                    <b>Bagus,</b> bentuk gradien yang kamu isi sudah benar.
                    Sekarang perhatikan nilai penyebut pada ketiga gradien tersebut.
                    Bagaimana nilai penyebut pada ketiganya?
                </p>

                <select id="banding-y" class="form-select inline-select">
                    <option value="">Pilih</option>
                    <option value="nol">Semua penyebut bernilai 0</option>
                    <option value="beda">Penyebutnya berbeda</option>
                </select>

                <button type="button" id="btn-banding-y" class="btn btn-palet mt-2" onclick="cekBandingY()">
                    Cek
                </button>

                <div id="feedback-y2"></div>
            </div>

            <div id="step-y-3" class="d-none mt-3">
                <p>
                    Jika penyebut pada ketiga gradien bernilai $0$, menurutmu bagaimana keadaan gradien garis tersebut?
                </p>

                <select id="keadaan-y" class="form-select inline-select">
                    <option value="">Pilih</option>
                    <option value="tdk">Tidak terdefinisi</option>
                    <option value="nol">Bernilai 0</option>
                    <option value="satu">Bernilai 1</option>
                </select>

                <button type="button" id="btn-keadaan-y" class="btn btn-palet mt-2" onclick="cekKeadaanY()">
                    Cek
                </button>

                <div id="feedback-y3"></div>
            </div>

            <div id="step-y-4" class="d-none mt-3">
                <p>
                    Sekarang perhatikan kembali pasangan titik pada setiap garis. Karena nilai $x$ pada setiap pasangan
                    titik sama,
                    maka jika digambar pada bidang koordinat, bentuk garis-garis tersebut adalah ....
                </p>

                <select id="bentuk-y" class="form-select inline-select">
                    <option value="">Pilih</option>
                    <option value="tegak">Tegak</option>
                    <option value="mendatar">Mendatar</option>
                    <option value="miring">Miring</option>
                </select>

                <button type="button" id="btn-bentuk-y" class="btn btn-palet mt-2" onclick="cekBentukY()">
                    Cek
                </button>

                <div id="feedback-y4"></div>
            </div>

            <div id="step-y-5" class="d-none mt-3">
                <p>
                    Berdasarkan hasil yang kamu peroleh, lengkapilah kesimpulan berikut.
                </p>

                <p class="mb-3">
                    Jika beberapa garis memiliki titik-titik dengan nilai $x$ yang sama, maka garis tersebut
                    <select id="simpulan-y1" class="form-select inline-select mx-1">
                        <option value="">Pilih</option>
                        <option value="tegak">tegak</option>
                        <option value="mendatar">mendatar</option>
                        <option value="miring">miring</option>
                    </select>
                    dan gradiennya
                    <select id="simpulan-y2" class="form-select inline-select mx-1">
                        <option value="">Pilih</option>
                        <option value="tdk">tidak terdefinisi</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                    </select>.
                </p>

                <button type="button" id="btn-simpulan-y" class="btn btn-palet" onclick="cekSimpulanY()">
                    Simpan Kesimpulan
                </button>

                <div id="feedback-y5"></div>
            </div>

            <div class="box-kesimpulan d-none mt-3" id="kesimpulan-y">
                <b>Kesimpulan:</b><br><br>
                Dari hasil perhitungan, diperoleh bahwa pada ketiga garis tersebut nilai $x_2 - x_1 = 0$.
                Karena penyebut pada rumus gradien bernilai $0$, maka pembagian tidak dapat dilakukan.
                Oleh karena itu, gradien garis tersebut tidak terdefinisi.

                Jika digambarkan pada bidang koordinat, garis-garis tersebut berbentuk tegak,
                sehingga dapat disimpulkan bahwa garis tersebut sejajar dengan $sumbu\text{-}y$.
            </div>

            <div class="d-none mt-3" id="ggb-wrapper-y">
                <div id="ggb-sumbu-y" style="width:100%; height:420px;"></div>
            </div>
        </div>
    </div>

    {{-- ========================================================= --}}
    {{-- MATERI --}}
    {{-- ========================================================= --}}

    {{-- Materi sejajar sumbu-x --}}
    <div class="card card-materi mb-4">
        <div class="card-body">
            <span class="badge-sub">Gradien Garis Sejajar $Sumbu\text{-}x$</span>

            <p>
                Pada kegiatan eksplorasi sebelumnya, kamu telah menghitung gradien dari beberapa garis yang berbeda.
                Walaupun titik-titik yang digunakan tidak sama, semua garis tersebut memiliki satu ciri yang sama,
                yaitu nilai $y$ pada setiap pasangan titiknya tetap.
            </p>

            <p>
                Jika dua titik memiliki nilai $y$ yang sama, maka garis yang terbentuk akan berbentuk
                <b>mendatar</b>. Garis mendatar inilah yang sejajar dengan $sumbu\text{-}x$.
            </p>

            <div class="text-center mb-3">
                <img src="{{ asset('img/hubungan gradien garis/garis_sejajar_sumbu_x.png') }}" class="img-fluid rounded">
                <small class="text-muted d-block">Gambar garis yang sejajar dengan $sumbu\text{-}x$</small>
            </div>

            <p>
                Untuk mengetahui gradiennya, kita gunakan rumus gradien berikut.
            </p>

            <div class="rumus-box text-center mb-3">
                $$ m = \frac{y_2 - y_1}{x_2 - x_1} $$
            </div>

            <p>
                Karena nilai $y$ kedua titik sama, maka selisih $y_2 - y_1$ selalu bernilai $0$.
                Akibatnya, pada perhitungan gradien diperoleh:
            </p>

            <div class="rumus-box text-center mb-3">
                $$ m = \frac{0}{x_2 - x_1} = 0 $$
            </div>

            <p>
                Hal ini menunjukkan bahwa garis yang tidak naik dan tidak turun, atau garis yang berbentuk
                mendatar, selalu memiliki gradien $0$.
            </p>

            <div class="box-kesimpulan">
                <b>Kesimpulan:</b><br>
                Jika dua titik memiliki nilai $y$ yang sama, maka garis tersebut sejajar dengan $sumbu\text{-}x$
                dan gradiennya adalah $0$.
            </div>
        </div>
    </div>

    {{-- Materi sejajar sumbu-y --}}
    <div class="card card-materi mb-4">
        <div class="card-body">
            <span class="badge-sub">Gradien Garis Sejajar $Sumbu\text{-}y$</span>

            <p>
                Pada kegiatan eksplorasi berikutnya, kamu juga telah menemukan bahwa beberapa garis memiliki
                pasangan titik dengan nilai $x$ yang sama. Meskipun titik-titiknya berbeda, garis-garis
                tersebut menunjukkan pola yang sama.
            </p>

            <p>
                Jika dua titik memiliki nilai $x$ yang sama, maka garis yang terbentuk akan berbentuk
                <b>tegak</b> atau <b>vertikal</b>. Garis vertikal inilah yang sejajar dengan $sumbu\text{-}y$.
            </p>

            <div class="text-center mb-3">
                <img src="{{ asset('img/hubungan gradien garis/garis_sejajar_sumbu_y.png') }}" class="img-fluid rounded">
                <small class="text-muted d-block">Gambar garis yang sejajar dengan $sumbu\text{-}y$</small>
            </div>

            <p>
                Untuk mengetahui gradiennya, kita gunakan rumus gradien berikut.
            </p>

            <div class="rumus-box text-center mb-3">
                $$ m = \frac{y_2 - y_1}{x_2 - x_1} $$
            </div>

            <p>
                Karena nilai $x$ kedua titik sama, maka selisih $x_2 - x_1$ selalu bernilai $0$.
                Akibatnya, pada perhitungan gradien kita memperoleh bentuk:
            </p>

            <div class="rumus-box text-center mb-3">
                $$ m = \frac{y_2 - y_1}{0} $$
            </div>

            <p>
                Dalam matematika, pembagian dengan $0$ tidak dapat dilakukan. Oleh karena itu,
                gradien garis yang sejajar dengan $sumbu\text{-}y$ dinyatakan tidak terdefinisi.
            </p>

            <p>
                Jadi, setiap garis yang tegak atau sejajar dengan $sumbu\text{-}y$ tidak memiliki nilai gradien
                berupa bilangan tertentu.
            </p>

            <div class="box-kesimpulan">
                <b>Kesimpulan:</b><br>
                Jika dua titik memiliki nilai $x$ yang sama, maka garis tersebut sejajar dengan $sumbu\text{-}y$
                dan gradiennya tidak terdefinisi.
            </div>
        </div>
    </div>

    {{-- Perbandingan --}}
    <div class="card card-materi mb-4">
        <div class="card-body">
            <span class="badge-sub">Perbandingan Garis Sejajar $Sumbu\text{-}x$ dan $Sumbu\text{-}y$</span>

            <p>
                Dari dua materi sebelumnya, dapat dilihat bahwa garis sejajar $sumbu\text{-}x$ dan garis sejajar
                $sumbu\text{-}y$
                memiliki ciri yang berbeda.
            </p>

            <div class="box-kesimpulan">
                <b>Perbandingan:</b><br><br>
                Jika nilai $y$ sama → garis <b>mendatar</b> → sejajar dengan $sumbu\text{-}x$ → gradien $0$<br>
                Jika nilai $x$ sama → garis <b>tegak</b> → sejajar dengan $sumbu\text{-}y$ → gradien tidak terdefinisi
            </div>
        </div>
    </div>

    <div class="card card-materi mb-4">
        <div class="card-body">
            <span class="badge-contoh">Contoh Soal</span>

            <p>
                Rina berjalan di jalan lurus dari titik $A(-2,3)$ ke $B(4,3)$.
                Jalan tersebut tidak menanjak dan tidak menurun.
                Apakah jalan itu sejajar dengan $sumbu\text{-}x$?
            </p>

            <div class="quiz-card p-3">
                <div id="contoh1-step1">
                    <p>
                        Coba bayangkan situasinya terlebih dahulu. Jika jalan yang dilalui Rina tidak menanjak
                        dan tidak menurun, menurutmu jalan itu termasuk jalan yang bagaimana?
                    </p>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" id="btn-c1-s1-naik" class="btn btn-outline-primary"
                            onclick="cekContoh1Step1('naik')">
                            Naik
                        </button>
                        <button type="button" id="btn-c1-s1-turun" class="btn btn-outline-primary"
                            onclick="cekContoh1Step1('turun')">
                            Turun
                        </button>
                        <button type="button" id="btn-c1-s1-datar" class="btn btn-outline-primary"
                            onclick="cekContoh1Step1('datar')">
                            Datar
                        </button>
                    </div>

                    <div id="fb-contoh1-step1" class="mt-2"></div>
                </div>

                <div id="contoh1-step2" class="d-none mt-3">
                    <p>
                        Betul, jalannya datar. Sekarang perhatikan titik $A(-2,3)$ dan $B(4,3)$.
                        Dari kedua titik itu, adakah nilai koordinat yang tetap?
                    </p>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" id="btn-c1-s2-x" class="btn btn-outline-primary"
                            onclick="cekContoh1Step2('x')">
                            Nilai $x$ sama
                        </button>
                        <button type="button" id="btn-c1-s2-y" class="btn btn-outline-primary"
                            onclick="cekContoh1Step2('y')">
                            Nilai $y$ sama
                        </button>
                    </div>

                    <div id="fb-contoh1-step2" class="mt-2"></div>
                </div>

                <div id="contoh1-step3" class="d-none mt-3">
                    <p>
                        Ya, nilai $y$ pada kedua titik itu sama. Sekarang coba isi bentuk gradiennya.
                    </p>

                    <p class="mb-2">
                        $m =$
                        <span class="pecahan-inline align-middle ms-1">
                            <input type="number" id="c1-atas" class="input-pecahan-inline">
                            <span class="garis-pecahan-inline"></span>
                            <input type="number" id="c1-bawah" class="input-pecahan-inline">
                        </span>
                    </p>

                    <p class="text-muted mb-3">
                        Isikan hasil pengurangan pada pembilang dan penyebut.
                    </p>

                    <button type="button" id="btn-c1-step3" class="btn btn-palet" onclick="cekContoh1Step3()">
                        Cek Jawaban
                    </button>

                    <div id="fb-contoh1-step3" class="mt-2"></div>
                </div>

                <div id="contoh1-step4" class="d-none mt-3">
                    <p>
                        Tepat, gradiennya bernilai $0$. Dari hasil itu, sekarang kita bisa menentukan bahwa
                        garis tersebut sejajar dengan sumbu yang mana.
                    </p>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" id="btn-c1-s4-x" class="btn btn-outline-primary"
                            onclick="cekContoh1Step4('x')">
                            $sumbu\text{-}x$
                        </button>
                        <button type="button" id="btn-c1-s4-y" class="btn btn-outline-primary"
                            onclick="cekContoh1Step4('y')">
                            $sumbu\text{-}y$
                        </button>
                    </div>

                    <div id="fb-contoh1-step4" class="mt-2"></div>
                </div>

                <div id="contoh1-kesimpulan" class="box-kesimpulan d-none mt-3">
                    <b>Kesimpulan:</b><br>
                    Karena jalan yang dilalui Rina bersifat datar, titik $A(-2,3)$ dan $B(4,3)$
                    memiliki nilai $y$ yang sama. Dari perhitungan diperoleh $m = 0$.
                    Jadi, garis tersebut sejajar dengan $sumbu\text{-}x$.
                </div>
            </div>
        </div>
    </div>

    <div class="card card-materi mb-4">
        <div class="card-body">
            <span class="badge-latihan">Latihan</span>

            <p>
                Kerjakan latihan berikut berdasarkan pemahamanmu tentang garis yang sejajar dengan sumbu-x dan sumbu-y.
            </p>

            <!-- LATIHAN 1 -->
            <div class="quiz-card p-3 mt-3">
                <p><b>1.</b> Perhatikan gambar berikut.</p>

                <div class="text-center mb-3">
                    <!-- Ganti src dengan gambar buatanmu -->
                    <img src="{{ asset('img/hubungan gradien garis/latsol1.png') }}" class="img-fluid rounded"
                        alt="Gambar latihan garis" style="max-height: 300px">
                </div>

                <p>Pilih semua garis yang sejajar dengan <b>sumbu-x</b>.</p>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="lat1-k">
                    <label class="form-check-label" for="lat1-k">Garis k</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="lat1-l">
                    <label class="form-check-label" for="lat1-l">Garis l</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="lat1-m">
                    <label class="form-check-label" for="lat1-m">Garis m</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="lat1-n">
                    <label class="form-check-label" for="lat1-n">Garis n</label>
                </div>

                <button type="button" class="btn btn-palet mt-3" onclick="cekLatihan1()">
                    Cek Jawaban
                </button>

                <div id="fb-lat1" class="mt-2"></div>
            </div>

            <!-- LATIHAN 2 -->
            <div class="quiz-card p-3 mt-3">
                <p><b>2.</b> Manakah garis berikut yang sejajar dengan <b>sumbu-y</b>?</p>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="latihan2" id="lat2-a" value="a">
                    <label class="form-check-label" for="lat2-a">
                        Garis melalui titik (2,3) dan (2,8)
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="latihan2" id="lat2-b" value="b">
                    <label class="form-check-label" for="lat2-b">
                        Garis melalui titik (1,4) dan (5,4)
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="latihan2" id="lat2-c" value="c">
                    <label class="form-check-label" for="lat2-c">
                        Garis melalui titik (0,0) dan (3,3)
                    </label>
                </div>

                <button type="button" class="btn btn-palet mt-3" onclick="cekLatihan2()">
                    Cek Jawaban
                </button>

                <div id="fb-lat2" class="mt-2"></div>
            </div>

            <div class="quiz-card p-3 mt-3">
                <p class="mb-3" style="line-height:1.8;">
                    <b>3.</b> Tentukan nilai <b>$a$</b> agar garis yang melalui titik
                    <b>$A(3a,8a)$</b> dan <b>$B(2a,4)$</b> sejajar dengan <b>sumbu-x</b>.
                </p>

                <div class="border rounded-4 p-3 mb-4" style="background:#f7f9fc;">
                    <p class="mb-3"><b>Penyelesaian:</b></p>

                    <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                        <span>$A(3a,8a)$, maka</span>
                        <span>$x_1=$</span>
                        <input type="text" id="x1_3"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:70px;">
                        <span>dan</span>
                        <span>$y_1=$</span>
                        <input type="text" id="y1_3"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:70px;">
                    </div>

                    <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                        <span>$B(2a,4)$, maka</span>
                        <span>$x_2=$</span>
                        <input type="text" id="x2_3"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:70px;">
                        <span>dan</span>
                        <span>$y_2=$</span>
                        <input type="text" id="y2_3"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:70px;">
                    </div>

                    <p class="mb-2">Karena garis sejajar dengan sumbu-x, maka:</p>
                    <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                        <span>$m=$</span>
                        <input type="text" id="m_3"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:70px;">
                    </div>

                    <p class="mb-2">Substitusikan ke rumus gradien.</p>
                    <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                        <input type="text" id="kiri1_3"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:70px;">
                        <span>$=$</span>

                        <div class="frac-input">
                            <div class="top">
                                <input type="text" id="subY2_3"
                                    class="form-control form-control-sm text-center jawaban-latihan">
                                <span>$-$</span>
                                <input type="text" id="subY1_3"
                                    class="form-control form-control-sm text-center jawaban-latihan">
                            </div>
                            <div class="bottom">
                                <input type="text" id="subX2_3"
                                    class="form-control form-control-sm text-center jawaban-latihan">
                                <span>$-$</span>
                                <input type="text" id="subX1_3"
                                    class="form-control form-control-sm text-center jawaban-latihan">
                            </div>
                        </div>
                    </div>

                    <p class="mb-2">Sederhanakan penyebutnya.</p>
                    <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                        <input type="text" id="kiri2_3"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:70px;">
                        <span>$=$</span>

                        <div class="frac-input single">
                            <div class="top">
                                <input type="text" id="hasilAtas_3"
                                    class="form-control form-control-sm text-center jawaban-latihan">
                            </div>
                            <div class="bottom">
                                <input type="text" id="hasilBawah_3"
                                    class="form-control form-control-sm text-center jawaban-latihan">
                            </div>
                        </div>
                    </div>

                    <p class="mt-3">Kalikan kedua ruas dengan penyebut agar pecahan hilang.</p>
                    <div class="mb-2 d-flex flex-wrap align-items-center gap-2">
                        <input type="text" id="pers1Kiri_3"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:90px;">
                        <span>$=$</span>
                        <input type="text" id="pers1Kanan_3"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:120px;">
                    </div>

                    <p class="mt-3">Sehingga nilai <b>$a$</b> adalah:</p>
                    <div class="mb-2 d-flex flex-wrap align-items-center gap-2">
                        <span>$a=$</span>
                        <input type="text" id="hasilA_3"
                            class="form-control form-control-sm text-center jawaban-latihan" style="width:80px;">
                    </div>

                    <button type="button" class="btn btn-palet mt-2" onclick="cekLatihan3()">Cek Jawaban</button>

                    <div id="fbLatihan3" class="mt-3"></div>
                </div>
            </div>

            <div class="quiz-card p-3 mt-3">
                <p><b>4.</b> Tentukan gradien dari garis $$y = -4$$</p>

                <p>Gradien garis:</p>
                <input type="text" id="lat4-m" class="form-control w-25 text-center" placeholder="Isi jawaban">

                <p class="mt-2">Kedudukan garis:</p>
                <select id="lat4-posisi" class="form-select w-50">
                    <option value="">Pilih</option>
                    <option value="x">Sejajar sumbu-x</option>
                    <option value="y">Sejajar sumbu-y</option>
                    <option value="tidak">Tidak sejajar keduanya</option>
                </select>

                <p class="mt-2">Alasan:</p>
                <textarea id="lat4-alasan" class="form-control" placeholder="Tuliskan alasanmu..."></textarea>

                <button class="btn btn-palet mt-2" onclick="cekLat4()">Cek Jawaban</button>

                <div id="fb-lat4" class="mt-2"></div>
            </div>
        </div>
    </div>

    <script src="https://www.geogebra.org/apps/deployggb.js"></script>
    <script src="{{ asset('js/subbabC/gradien_garissejajarsumbuxy.js') }}"></script>
@endsection

@section('nav')
    {{-- PREV --}}
    @if($previousMateri)
        <a href="{{ route('materi.show', $previousMateri->slug) }}"
           class="btn btn-prev px-4 rounded-pill">
            ← Prev
        </a>

    {{-- KHUSUS MATERI PERTAMA --}}
    @elseif($materi->slug === 'subbab-a1')
        <a href="{{ route('apersepsi1') }}"
           class="btn btn-prev px-4 rounded-pill">
            ← Prev
        </a>

    @else
        <span class="btn btn-prev px-4 rounded-pill invisible">← Prev</span>
    @endif


    {{-- NEXT --}}
    @if($nextMateri)
        <a href="{{ route('materi.show', $nextMateri->slug) }}"
           class="btn btn-next px-4 rounded-pill fw-semibold">
            Next →
        </a>

    {{-- MATERI TERAKHIR → KUIS --}}
    @elseif($quizBab)
        <a href="{{ route('quiz.show', $quizBab->id) }}"
           class="btn btn-next px-4 rounded-pill fw-semibold">
            Kuis →
        </a>
    @else
        <span class="btn btn-next px-4 rounded-pill invisible">Next →</span>
    @endif
@endsection

