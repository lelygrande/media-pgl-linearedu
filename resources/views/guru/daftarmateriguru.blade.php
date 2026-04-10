@extends('layout.layoutguru')

@section('title', 'Daftar Materi')

@section('content')
    <section class="bg-section-dark py-4" style="border-radius: 12px;">
        <div class="container-fluid">
            <h3 class="text-center fw-bold mb-4" style="color: var(--primary-dark);">
                Materi yang akan dipelajari:
            </h3>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 p-3">
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-2">Bab A: Bentuk Umum Persamaan Garis Lurus</h5>

                            <ul class="mb-0">
                                <li>
                                    <a href="#" class="materi-link" data-bs-toggle="modal"
                                        data-bs-target="#modalMateri" data-title="Bab A - Bentuk umum persamaan garis lurus"
                                        data-content="<p><b>Bentuk umum</b> persamaan garis lurus adalah <i>ax + by + c = 0</i>, dengan a dan b tidak keduanya nol.</p>
                                     <p>Contoh: <i>2x + y - 4 = 0</i>.</p>">
                                        Bentuk umum persamaan garis lurus
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="materi-link" data-bs-toggle="modal"
                                        data-bs-target="#modalMateri"
                                        data-title="Bab A - Menggambar grafik dari persamaan garis lurus"
                                        data-content="<p>Untuk menggambar grafik, cari minimal 2 titik (x,y) yang memenuhi persamaan.</p>
                                     <ol>
                                        <li>Tentukan dua nilai x (misal 0 dan 2)</li>
                                        <li>Hitung y</li>
                                        <li>Plot dua titik lalu tarik garis</li>
                                     </ol>">
                                        Menggambar grafik dari persamaan garis lurus
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Bab B -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 p-3">
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-2">
                                Bab B: Gradien (Kemiringan Garis)
                            </h5>

                            <ul class="mb-0">
                                <li>
                                    <a href="#" class="materi-link" data-bs-toggle="modal"
                                        data-bs-target="#modalMateri" data-title="Bab B - Pengertian gradien"
                                        data-content="<p><b>Gradien</b> adalah ukuran kemiringan garis.</p>
                                     <p>Secara umum, gradien menyatakan perbandingan perubahan <i>y</i> terhadap perubahan <i>x</i>.</p>
                                     <p>Semakin besar gradien, garis semakin curam.</p>">
                                        Pengertian gradien atau kemiringan
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="materi-link" data-bs-toggle="modal"
                                        data-bs-target="#modalMateri"
                                        data-title="Bab B - Gradien garis melalui (0,0) dan (x₁, y₁)"
                                        data-content="<p>Jika garis melalui titik <b>(0,0)</b> dan <b>(x₁, y₁)</b>, maka gradiennya:</p>
                                     <p class='mb-0'><b>m = y₁ / x₁</b> (dengan x₁ ≠ 0)</p>
                                     <hr>
                                     <p><b>Contoh:</b> melalui (0,0) dan (2,6) → m = 6/2 = 3.</p>">
                                        Gradien garis melalui titik pusat (0,0) dan (x₁, y₁)
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="materi-link" data-bs-toggle="modal"
                                        data-bs-target="#modalMateri" data-title="Bab B - Gradien garis melalui dua titik"
                                        data-content="<p>Jika garis melalui dua titik <b>(x₁, y₁)</b> dan <b>(x₂, y₂)</b>, maka:</p>
                                     <p><b>m = (y₂ - y₁) / (x₂ - x₁)</b> (dengan x₂ ≠ x₁)</p>
                                     <hr>
                                     <p><b>Contoh:</b> (1,2) dan (5,10) → m = (10-2)/(5-1) = 8/4 = 2.</p>">
                                        Gradien garis yang melewati dua titik
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="materi-link" data-bs-toggle="modal"
                                        data-bs-target="#modalMateri" data-title="Bab B - Gradien pada persamaan y = mx"
                                        data-content="<p>Pada persamaan <b>y = mx</b>:</p>
                                     <p class='mb-0'>Nilai <b>m</b> adalah <b>gradien</b> garis.</p>
                                     <hr>
                                     <p><b>Contoh:</b> y = 4x → gradien m = 4.</p>">
                                        Gradien pada persamaan <i>y = mx</i>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="materi-link" data-bs-toggle="modal"
                                        data-bs-target="#modalMateri" data-title="Bab B - Gradien pada persamaan y = mx + c"
                                        data-content="<p>Pada persamaan <b>y = mx + c</b>:</p>
                                     <ul>
                                        <li><b>m</b> = gradien</li>
                                        <li><b>c</b> = titik potong sumbu-y (intersep)</li>
                                     </ul>
                                     <p><b>Contoh:</b> y = 2x + 3 → gradien m = 2, titik potong y = 3.</p>">
                                        Gradien pada persamaan garis <i>y = mx + c</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Bab C -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 p-3">
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-2">
                                Bab C: Sifat-sifat Gradien
                            </h5>

                            <ul class="mb-0">
                                <li>
                                    <a href="#" class="materi-link" data-bs-toggle="modal"
                                        data-bs-target="#modalMateri" data-title="Bab C - Garis sejajar sumbu-x"
                                        data-content="<p>Garis yang sejajar sumbu-x adalah garis datar (horizontal).</p>
                                     <p>Gradiennya selalu <b>m = 0</b>.</p>
                                     <hr>
                                     <p><b>Contoh:</b> y = 5 → gradien 0.</p>">
                                        Gradien garis yang sejajar dengan sumbu-x
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="materi-link" data-bs-toggle="modal"
                                        data-bs-target="#modalMateri" data-title="Bab C - Garis sejajar sumbu-y"
                                        data-content="<p>Garis yang sejajar sumbu-y adalah garis tegak (vertikal).</p>
                                     <p>Gradiennya <b>tidak terdefinisi</b> (undefined), karena pembagi (Δx) = 0.</p>
                                     <hr>
                                     <p><b>Contoh:</b> x = 3 → gradien tidak terdefinisi.</p>">
                                        Gradien garis yang sejajar dengan sumbu-y
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="materi-link" data-bs-toggle="modal"
                                        data-bs-target="#modalMateri" data-title="Bab C - Dua garis sejajar"
                                        data-content="<p>Dua garis sejajar memiliki kemiringan yang sama.</p>
                                     <p>Jika garis 1 gradiennya m₁ dan garis 2 gradiennya m₂, maka:</p>
                                     <p><b>m₁ = m₂</b></p>
                                     <hr>
                                     <p><b>Contoh:</b> y = 2x + 1 sejajar dengan y = 2x - 4 (gradien sama-sama 2).</p>">
                                        Gradien dua garis sejajar
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="materi-link" data-bs-toggle="modal"
                                        data-bs-target="#modalMateri" data-title="Bab C - Dua garis tegak lurus"
                                        data-content="<p>Dua garis saling tegak lurus memiliki gradien yang hasil kalinya:</p>
                                     <p><b>m₁ · m₂ = -1</b></p>
                                     <p>Artinya m₂ adalah negatif kebalikan dari m₁.</p>
                                     <hr>
                                     <p><b>Contoh:</b> jika m₁ = 2, maka m₂ = -1/2.</p>">
                                        Gradien dua garis saling tegak lurus
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Bab D -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 p-3">
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-2">
                                Bab D: Persamaan Garis Lurus
                            </h5>

                            <ul class="mb-0">
                                <li>
                                    <a href="#" class="materi-link" data-bs-toggle="modal"
                                        data-bs-target="#modalMateri"
                                        data-title="Bab D - Persamaan garis melalui satu titik dan gradien"
                                        data-content="<p>Jika garis memiliki gradien <b>m</b> dan melalui titik <b>(x₁, y₁)</b>, maka persamaannya:</p>
                                     <p><b>y - y₁ = m(x - x₁)</b></p>
                                     <hr>
                                     <p><b>Contoh:</b> m = 3, melalui (1,2):</p>
                                     <p>y - 2 = 3(x - 1) → y = 3x - 1</p>">
                                        Persamaan garis melalui satu titik dan gradien
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="materi-link" data-bs-toggle="modal"
                                        data-bs-target="#modalMateri"
                                        data-title="Bab D - Persamaan garis melalui dua titik"
                                        data-content="<p>Jika garis melalui dua titik <b>(x₁, y₁)</b> dan <b>(x₂, y₂)</b>, maka:</p>
                                     <p><b>y - y₁ = ((y₂ - y₁)/(x₂ - x₁)) (x - x₁)</b></p>
                                     <hr>
                                     <p><b>Contoh:</b> melalui (1,2) dan (3,6):</p>
                                     <p>m = (6-2)/(3-1) = 2</p>
                                     <p>y - 2 = 2(x - 1) → y = 2x</p>">
                                        Persamaan garis yang melalui dua titik
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="modalMateri" tabindex="-1" aria-labelledby="modalMateriLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content" style="border-radius: 16px;">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="modalMateriLabel">Materi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body" id="modalMateriBody">
                    {{-- konten diisi via JS --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <style>
        /* biar class ini jalan */
        .bg-section-dark {
            background: var(--section-dark);
        }

        .materi-link {
            color: var(--primary-dark);
            font-weight: 600;
            text-decoration: none;
        }

        .materi-link:hover {
            text-decoration: underline;
        }
    </style>
@endpush
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modalTitle = document.getElementById('modalMateriLabel');
            const modalBody = document.getElementById('modalMateriBody');

            document.querySelectorAll('.materi-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();

                    modalTitle.textContent = this.dataset.title || 'Materi';
                    modalBody.innerHTML = this.dataset.content || '<p>Materi belum tersedia.</p>';
                });
            });
        });
    </script>
@endpush
