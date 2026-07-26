@extends('layout.layoutguru')

@section('title', 'Aturan Penulisan Simbol Matematika')

@section('content')
    {{-- KaTeX --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/katex@0.17.0/dist/katex.min.css"
        integrity="sha384-vlBdW0r3AcZO/HboRPznQNowvexd3fY8qHOWkBi5q7KGgqJ+F48+DceybYmrVbmB"
        crossorigin="anonymous">

    <style>
        .guide-card {
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            background: #fff;
        }

        .guide-section-title {
            color: var(--primary-dark);
            font-weight: 700;
            margin-bottom: 12px;
        }

        .guide-note {
            background: #f5f8ff;
            border: 1px solid #dce7ff;
            border-radius: 14px;
            padding: 14px 16px;
            color: #334155;
        }

        .guide-warning {
            background: #fff8e6;
            border: 1px solid #ffe4a3;
            border-radius: 14px;
            padding: 14px 16px;
            color: #7c5700;
        }

        .formula-code {
            display: inline-block;
            background: #f3f4f6;
            border: 1px solid #e5e7eb;
            border-radius: 7px;
            padding: 4px 7px;
            color: #be123c;
            font-size: 13px;
            white-space: normal;
            word-break: break-word;
        }

        .formula-result {
            min-width: 160px;
            font-size: 16px;
        }

        .copy-formula {
            border: 0;
            background: transparent;
            color: var(--primary-color);
            font-size: 12px;
            font-weight: 700;
            padding: 2px 0;
        }

        .copy-formula:hover {
            text-decoration: underline;
        }

        .example-box {
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 14px;
            height: 100%;
            background: #fafafa;
        }

        .table > :not(caption) > * > * {
            vertical-align: middle;
        }
    </style>

    <div class="d-flex justify-content-between align-items-start gap-3 mb-3 flex-wrap">
        <div>
            <h3 class="fw-bold mb-1" style="color: var(--primary-dark);">
                Aturan Penulisan Simbol Matematika
            </h3>
            <p class="text-muted mb-0">
                Panduan menulis rumus pada pertanyaan dan pilihan jawaban menggunakan KaTeX.
            </p>
        </div>

        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
            Kembali ke Manajemen Soal
        </a>
    </div>

    <div class="guide-note mb-3">
        <strong class="d-block mb-2">Cara dasar menulis rumus</strong>
        <div class="mb-2">
            Gunakan <code class="formula-code">$...$</code> untuk rumus yang menyatu dengan kalimat.
            Contoh: <span class="math-content">Persamaan $y = 2x + 3$ memiliki gradien $2$.</span>
        </div>
        <div>
            Gunakan <code class="formula-code">$$...$$</code> untuk rumus yang ditampilkan pada baris tersendiri.
            <div class="math-content mt-2">$$m = \frac{y_2-y_1}{x_2-x_1}$$</div>
        </div>
    </div>

    <div class="guide-warning mb-4">
        <strong>Perhatian:</strong>
        tanda pembuka dan penutup harus lengkap. Jangan menulis hanya
        <code class="formula-code">$y = 2x + 3</code> tanpa tanda
        <code class="formula-code">$</code> di bagian akhir.
    </div>

    <div class="guide-card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="guide-section-title">Simbol yang Sering Digunakan</h5>

            <div class="table-responsive">
                <table class="table table-bordered align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 27%;">Kebutuhan</th>
                            <th style="width: 43%;">Cara Penulisan</th>
                            <th style="width: 30%;">Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pangkat</td>
                            <td>
                                <code class="formula-code">$x^2$</code><br>
                                <button type="button" class="copy-formula" data-copy="$x^2$">Salin sintaks</button>
                            </td>
                            <td class="formula-result math-content">$x^2$</td>
                        </tr>
                        <tr>
                            <td>Pangkat lebih dari satu karakter</td>
                            <td>
                                <code class="formula-code">$x^{10}$</code><br>
                                <button type="button" class="copy-formula" data-copy="$x^{10}$">Salin sintaks</button>
                            </td>
                            <td class="formula-result math-content">$x^{10}$</td>
                        </tr>
                        <tr>
                            <td>Indeks</td>
                            <td>
                                <code class="formula-code">$x_1$</code><br>
                                <button type="button" class="copy-formula" data-copy="$x_1$">Salin sintaks</button>
                            </td>
                            <td class="formula-result math-content">$x_1$</td>
                        </tr>
                        <tr>
                            <td>Pecahan</td>
                            <td>
                                <code class="formula-code">$\frac{a}{b}$</code><br>
                                <button type="button" class="copy-formula" data-copy="$\frac{a}{b}$">Salin sintaks</button>
                            </td>
                            <td class="formula-result math-content">$\frac{a}{b}$</td>
                        </tr>
                        <tr>
                            <td>Akar kuadrat</td>
                            <td>
                                <code class="formula-code">$\sqrt{x}$</code><br>
                                <button type="button" class="copy-formula" data-copy="$\sqrt{x}$">Salin sintaks</button>
                            </td>
                            <td class="formula-result math-content">$\sqrt{x}$</td>
                        </tr>
                        <tr>
                            <td>Akar berpangkat</td>
                            <td>
                                <code class="formula-code">$\sqrt[3]{x}$</code><br>
                                <button type="button" class="copy-formula" data-copy="$\sqrt[3]{x}$">Salin sintaks</button>
                            </td>
                            <td class="formula-result math-content">$\sqrt[3]{x}$</td>
                        </tr>
                        <tr>
                            <td>Perkalian</td>
                            <td>
                                <code class="formula-code">$a \times b$</code><br>
                                <button type="button" class="copy-formula" data-copy="$a \times b$">Salin sintaks</button>
                            </td>
                            <td class="formula-result math-content">$a \times b$</td>
                        </tr>
                        <tr>
                            <td>Pembagian</td>
                            <td>
                                <code class="formula-code">$a \div b$</code><br>
                                <button type="button" class="copy-formula" data-copy="$a \div b$">Salin sintaks</button>
                            </td>
                            <td class="formula-result math-content">$a \div b$</td>
                        </tr>
                        <tr>
                            <td>Kurang dari atau sama dengan</td>
                            <td>
                                <code class="formula-code">$x \leq 5$</code><br>
                                <button type="button" class="copy-formula" data-copy="$x \leq 5$">Salin sintaks</button>
                            </td>
                            <td class="formula-result math-content">$x \leq 5$</td>
                        </tr>
                        <tr>
                            <td>Lebih dari atau sama dengan</td>
                            <td>
                                <code class="formula-code">$x \geq 5$</code><br>
                                <button type="button" class="copy-formula" data-copy="$x \geq 5$">Salin sintaks</button>
                            </td>
                            <td class="formula-result math-content">$x \geq 5$</td>
                        </tr>
                        <tr>
                            <td>Tidak sama dengan</td>
                            <td>
                                <code class="formula-code">$x \neq 5$</code><br>
                                <button type="button" class="copy-formula" data-copy="$x \neq 5$">Salin sintaks</button>
                            </td>
                            <td class="formula-result math-content">$x \neq 5$</td>
                        </tr>
                        <tr>
                            <td>Kurang lebih</td>
                            <td>
                                <code class="formula-code">$x \approx 3{,}14$</code><br>
                                <button type="button" class="copy-formula" data-copy="$x \approx 3{,}14$">Salin sintaks</button>
                            </td>
                            <td class="formula-result math-content">$x \approx 3{,}14$</td>
                        </tr>
                        <tr>
                            <td>Plus minus</td>
                            <td>
                                <code class="formula-code">$x = \pm 2$</code><br>
                                <button type="button" class="copy-formula" data-copy="$x = \pm 2$">Salin sintaks</button>
                            </td>
                            <td class="formula-result math-content">$x = \pm 2$</td>
                        </tr>
                        <tr>
                            <td>Derajat</td>
                            <td>
                                <code class="formula-code">$90^\circ$</code><br>
                                <button type="button" class="copy-formula" data-copy="$90^\circ$">Salin sintaks</button>
                            </td>
                            <td class="formula-result math-content">$90^\circ$</td>
                        </tr>
                        <tr>
                            <td>Huruf Yunani</td>
                            <td>
                                <code class="formula-code">$\alpha, \beta, \theta, \pi$</code><br>
                                <button type="button" class="copy-formula"
                                    data-copy="$\alpha, \beta, \theta, \pi$">Salin sintaks</button>
                            </td>
                            <td class="formula-result math-content">$\alpha, \beta, \theta, \pi$</td>
                        </tr>
                        <tr>
                            <td>Tak hingga</td>
                            <td>
                                <code class="formula-code">$\infty$</code><br>
                                <button type="button" class="copy-formula" data-copy="$\infty$">Salin sintaks</button>
                            </td>
                            <td class="formula-result math-content">$\infty$</td>
                        </tr>
                        <tr>
                            <td>Panah</td>
                            <td>
                                <code class="formula-code">$A \rightarrow B$</code><br>
                                <button type="button" class="copy-formula" data-copy="$A \rightarrow B$">Salin sintaks</button>
                            </td>
                            <td class="formula-result math-content">$A \rightarrow B$</td>
                        </tr>
                        <tr>
                            <td>Anggota himpunan</td>
                            <td>
                                <code class="formula-code">$x \in \mathbb{R}$</code><br>
                                <button type="button" class="copy-formula" data-copy="$x \in \mathbb{R}$">Salin sintaks</button>
                            </td>
                            <td class="formula-result math-content">$x \in \mathbb{R}$</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="guide-card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="guide-section-title">Contoh untuk Materi Persamaan Garis Lurus</h5>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="example-box">
                        <strong class="d-block mb-2">Bentuk umum persamaan garis</strong>
                        <code class="formula-code">$y = mx + c$</code>
                        <div class="math-content mt-3">$y = mx + c$</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="example-box">
                        <strong class="d-block mb-2">Bentuk umum lainnya</strong>
                        <code class="formula-code">$Ax + By + C = 0$</code>
                        <div class="math-content mt-3">$Ax + By + C = 0$</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="example-box">
                        <strong class="d-block mb-2">Rumus gradien dua titik</strong>
                        <code class="formula-code">$$m = \frac{y_2-y_1}{x_2-x_1}$$</code>
                        <div class="math-content mt-3">$$m = \frac{y_2-y_1}{x_2-x_1}$$</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="example-box">
                        <strong class="d-block mb-2">Persamaan melalui satu titik</strong>
                        <code class="formula-code">$$y-y_1 = m(x-x_1)$$</code>
                        <div class="math-content mt-3">$$y-y_1 = m(x-x_1)$$</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="example-box">
                        <strong class="d-block mb-2">Persamaan melalui dua titik</strong>
                        <code class="formula-code">$$\frac{y-y_1}{y_2-y_1} = \frac{x-x_1}{x_2-x_1}$$</code>
                        <div class="math-content mt-3">
                            $$\frac{y-y_1}{y_2-y_1} = \frac{x-x_1}{x_2-x_1}$$
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="example-box">
                        <strong class="d-block mb-2">Gradien garis sejajar dan tegak lurus</strong>
                        <code class="formula-code">$m_1 = m_2$</code>
                        <span class="mx-1">dan</span>
                        <code class="formula-code">$m_1 \times m_2 = -1$</code>
                        <div class="math-content mt-3">$m_1 = m_2$ dan $m_1 \times m_2 = -1$</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="guide-card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="guide-section-title">Contoh Penulisan pada Soal</h5>

            <div class="mb-3">
                <strong class="d-block mb-2">Teks yang dimasukkan:</strong>
                <code class="formula-code d-block p-3">
                    Diketahui persamaan $y = 3x - 6$. Tentukan gradien dan titik potong garis terhadap sumbu $Y$.
                </code>
            </div>

            <div>
                <strong class="d-block mb-2">Tampilan setelah dirender:</strong>
                <div class="border rounded p-3 math-content">
                    Diketahui persamaan $y = 3x - 6$. Tentukan gradien dan titik potong garis terhadap sumbu $Y$.
                </div>
            </div>
        </div>
    </div>

    <div class="guide-card shadow-sm">
        <div class="card-body">
            <h5 class="guide-section-title">Ketentuan Penulisan</h5>
            <ol class="mb-0 ps-3">
                <li class="mb-2">Gunakan garis miring terbalik <code class="formula-code">\</code> sebelum perintah KaTeX, misalnya <code class="formula-code">\frac</code> dan <code class="formula-code">\sqrt</code>.</li>
                <li class="mb-2">Gunakan kurung kurawal <code class="formula-code">{ }</code> untuk mengelompokkan isi, misalnya <code class="formula-code">x^{10}</code>.</li>
                <li class="mb-2">Jangan menulis kode HTML di dalam rumus.</li>
                <li class="mb-2">Pastikan setiap tanda <code class="formula-code">$</code> atau <code class="formula-code">$$</code> memiliki pasangan penutup.</li>
                <li class="mb-2">Untuk bilangan desimal Indonesia, gunakan <code class="formula-code">3{,}14</code> agar koma tidak diberi jarak seperti tanda baca matematika.</li>
                <li>Periksa kembali tampilan soal setelah disimpan. Jika sintaks salah, rumus dapat tampil sebagai teks berwarna merah.</li>
            </ol>
        </div>
    </div>

    <script defer
        src="https://cdn.jsdelivr.net/npm/katex@0.17.0/dist/katex.min.js"
        integrity="sha384-AtrdNsnxl/75rvBneBVH7DtOvCxSVahR2zWqle1coBKd8DEmLoviqNeJSx64gNAs"
        crossorigin="anonymous"></script>

    <script defer
        src="https://cdn.jsdelivr.net/npm/katex@0.17.0/dist/contrib/auto-render.min.js"
        integrity="sha384-bjyGPfbij8/NDKJhSGZNP/khQVgtHUE5exjm4Ydllo42FwIgYsdLO2lXGmRBf5Mz"
        crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function renderGuideMath() {
                if (typeof renderMathInElement !== 'function') {
                    setTimeout(renderGuideMath, 50);
                    return;
                }

                document.querySelectorAll('.math-content').forEach(function(element) {
                    renderMathInElement(element, {
                        delimiters: [
                            {
                                left: '$$',
                                right: '$$',
                                display: true
                            },
                            {
                                left: '$',
                                right: '$',
                                display: false
                            },
                            {
                                left: '\\(',
                                right: '\\)',
                                display: false
                            },
                            {
                                left: '\\[',
                                right: '\\]',
                                display: true
                            }
                        ],
                        throwOnError: false
                    });
                });
            }

            renderGuideMath();

            document.querySelectorAll('.copy-formula').forEach(function(button) {
                button.addEventListener('click', async function() {
                    const formula = this.dataset.copy;
                    const originalText = this.textContent;

                    try {
                        await navigator.clipboard.writeText(formula);
                        this.textContent = 'Berhasil disalin';
                    } catch (error) {
                        this.textContent = 'Gagal menyalin';
                    }

                    setTimeout(() => {
                        this.textContent = originalText;
                    }, 1500);
                });
            });
        });
    </script>
@endsection
