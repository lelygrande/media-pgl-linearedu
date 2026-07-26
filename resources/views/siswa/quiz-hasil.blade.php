<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Kuis - {{ $quiz->title }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary-color: #0187b8;
            --primary-dark: #00658b;
            --footer-bg: #004365;
            --text-dark: #1f2a37;
            --text-soft: #5b6573;
            --border-soft: #dbeaf5;
            --green: #198754;
            --green-soft: #e7f7ee;
            --red: #dc3545;
            --red-soft: #fff0f2;
            --blue-soft: #eef8ff;
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            min-height: 100%;
        }

        body {
            font-family: "Quicksand", sans-serif;
            background: #ffffff;
            color: var(--text-dark);
            font-weight: 600;
        }

        .hasil-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px;
        }

        .hasil-wrapper {
            width: 100%;
            max-width: 860px;
        }

        .hasil-card {
            background: linear-gradient(180deg, #eef8ff, #f8fcff);
            border: 1px solid #cfe6ff;
            border-radius: 22px;
            padding: 24px 26px 22px;
        }

        .hasil-header {
            text-align: center;
            margin-bottom: 14px;
        }

        .hasil-label {
            color: var(--primary-color);
            font-size: 13px;
            font-weight: 800;
            letter-spacing: 0.4px;
            margin-bottom: 4px;
        }

        .hasil-header h1 {
            font-size: 24px;
            color: var(--footer-bg);
            font-weight: 800;
            margin-bottom: 4px;
        }

        .hasil-header p {
            font-size: 14px;
            color: var(--text-soft);
            line-height: 1.5;
        }

        .skor-section {
            text-align: center;
            padding: 14px 8px 10px;
            margin-bottom: 10px;
        }

        .skor-title {
            font-size: 15px;
            color: var(--text-soft);
            font-weight: 700;
            margin-bottom: 2px;
        }

        .skor-angka {
            font-size: 78px;
            line-height: 1;
            font-weight: 800;
            color: var(--footer-bg);
            margin-bottom: 8px;
        }

        .status-badge {
            display: inline-block;
            padding: 7px 18px;
            border-radius: 999px;
            font-size: 15px;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .status-badge.lulus {
            background: var(--green);
            color: #fff;
        }

        .status-badge.tidak-lulus {
            background: var(--red);
            color: #fff;
        }

        .pesan-hasil {
            max-width: 680px;
            margin: 0 auto;
            font-size: 16px;
            line-height: 1.7;
            color: var(--text-dark);
        }

        .pesan-hasil.lulus {
            color: var(--green);
        }

        .pesan-hasil.tidak-lulus {
            color: var(--red);
        }

        .ringkasan {
            margin: 18px 0 14px;
            padding-top: 14px;
            border-top: 1px solid #e8eef5;
            border-bottom: 1px solid #e8eef5;
            padding-bottom: 14px;
        }

        .ringkasan-line {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 14px 28px;
            text-align: center;
            margin-bottom: 10px;
        }

        .ringkasan-line:last-child {
            margin-bottom: 0;
        }

        .ringkasan-item {
            font-size: 15px;
            color: var(--text-dark);
            line-height: 1.5;
        }

        .ringkasan-item .label {
            color: var(--text-soft);
            font-weight: 700;
            margin-right: 4px;
        }

        .ringkasan-item .value {
            color: var(--footer-bg);
            font-weight: 800;
        }

        .catatan-kecil {
            text-align: center;
            font-size: 14px;
            line-height: 1.6;
            color: var(--text-soft);
            margin-bottom: 16px;
        }

        .catatan-kecil.gagal {
            color: #9a3d48;
        }

        .action-area {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 4px;
        }

        .btn-hasil {
            text-decoration: none;
            border: none;
            border-radius: 12px;
            padding: 11px 20px;
            font-family: "Quicksand", sans-serif;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.25s ease;
            text-align: center;
            min-width: 180px;
        }

        .btn-secondary {
            background: var(--footer-bg);
            color: #ffffff;
            border: 1px solid var(--footer-bg);
        }

        .btn-secondary:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
            color: #ffffff;
        }

        .btn-primary {
            background: var(--primary-color);
            color: #fff;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        .btn-danger {
            background: var(--red);
            color: #fff;
        }

        .btn-danger:hover {
            background: #bb2d3b;
        }

        @media (max-width: 768px) {
            .hasil-page {
                align-items: flex-start;
                padding: 12px;
            }

            .hasil-card {
                padding: 18px 16px;
                border-radius: 18px;
            }

            .hasil-header h1 {
                font-size: 22px;
            }

            .skor-angka {
                font-size: 62px;
            }

            .pesan-hasil {
                font-size: 15px;
            }

            .ringkasan-line {
                flex-direction: column;
                gap: 8px;
            }

            .action-area {
                flex-direction: column;
            }

            .btn-hasil {
                width: 100%;
            }
        }

        @media (max-height: 760px) and (min-width: 769px) {
            .hasil-page {
                padding: 10px 16px;
            }

            .hasil-card {
                padding: 18px 22px;
            }

            .hasil-header {
                margin-bottom: 10px;
            }

            .hasil-header h1 {
                font-size: 22px;
            }

            .skor-section {
                padding: 8px 8px 6px;
                margin-bottom: 6px;
            }

            .skor-angka {
                font-size: 64px;
                margin-bottom: 6px;
            }

            .status-badge {
                margin-bottom: 8px;
            }

            .pesan-hasil {
                font-size: 15px;
                line-height: 1.6;
            }

            .ringkasan {
                margin: 14px 0 12px;
                padding-top: 10px;
                padding-bottom: 10px;
            }

            .catatan-kecil {
                margin-bottom: 12px;
            }
        }
    </style>
</head>

<body>
    @php
        /*
         * Nilai asli hasil pengerjaan.
         * Contoh: 10 benar dari 10 soal akan tampil 100.
         */
        $nilaiTampil = rtrim(rtrim(number_format($nilaiTampilan, 2, '.', ''), '0'), '.');

        if ($durasiMenit > 0 && $durasiSisaDetik > 0) {
            $durasiTampil = $durasiMenit . ' menit ' . $durasiSisaDetik . ' detik';
        } elseif ($durasiMenit > 0) {
            $durasiTampil = $durasiMenit . ' menit';
        } else {
            $durasiTampil = $durasiSisaDetik . ' detik';
        }
    @endphp

    <div class="hasil-page">
        <div class="hasil-wrapper">
            <div class="hasil-card">

                <div class="hasil-header">
                    <div class="hasil-label">HASIL KUIS</div>
                    <h1>{{ $quiz->title }}</h1>
                    <p>Berikut hasil pengerjaan kuis yang telah kamu selesaikan.</p>
                </div>

                <div class="skor-section">
                    <div class="skor-title">Skor Kamu</div>
                    <div class="skor-angka">{{ $nilaiTampil }}</div>

                    <div class="status-badge {{ $lulus ? 'lulus' : 'tidak-lulus' }}">
                        {{ $lulus ? 'Lulus' : 'Belum Lulus' }}
                    </div>

                    @if ($quiz->id == 5)
                        @if ($lulus)
                            <div class="pesan-hasil lulus">
                                Selamat! Kamu telah menyelesaikan seluruh rangkaian pembelajaran pada materi persamaan
                                garis lurus.
                            </div>
                        @else
                            <div class="pesan-hasil tidak-lulus">
                                Nilai kamu belum mencapai KKM. Silakan pelajari kembali materi, lalu kerjakan evaluasi
                                kembali.
                            </div>
                        @endif
                    @else
                        @if ($lulus)
                            <div class="pesan-hasil lulus">
                                Selamat! Nilai kamu sudah mencapai KKM.
                            </div>
                        @else
                            <div class="pesan-hasil tidak-lulus">
                                Nilai kamu belum mencapai KKM. Silakan pelajari kembali materi, lalu coba kerjakan kuis
                                ini lagi.
                            </div>
                        @endif
                    @endif
                </div>

                @if ($nilaiTersimpan < $nilaiTampilan)
                    <div class="catatan-kecil" style="margin-top: 12px;">
                        Skor hasil pengerjaan kamu adalah
                        <strong>{{ number_format($nilaiTampilan, 0) }}</strong>.

                        Karena ini merupakan percobaan ulang, nilai yang dicatat
                        pada riwayat dan rekap guru adalah
                        <strong>{{ number_format($nilaiTersimpan, 0) }}</strong>.
                    </div>
                @endif

                <div class="ringkasan">
                    <div class="ringkasan-line">
                        <div class="ringkasan-item">
                            <span class="label">KKM:</span>
                            <span class="value">{{ $quiz->kkm }}</span>
                        </div>

                        <div class="ringkasan-item">
                            <span class="label">Waktu Pengerjaan:</span>
                            <span class="value">{{ $durasiTampil }}</span>
                        </div>
                    </div>

                    <div class="ringkasan-line">
                        <div class="ringkasan-item">
                            <span class="label">Jawaban Benar:</span>
                            <span class="value">{{ $benar }}</span>
                        </div>

                        <div class="ringkasan-item">
                            <span class="label">Jawaban Salah:</span>
                            <span class="value">{{ $salah }}</span>
                        </div>
                    </div>
                </div>

                <div class="action-area">
                    @if ($lulus)
                        @if ($quiz->id == 4)
                            @if (!empty($previousMateri))
                                <a href="{{ route('materi.show', $previousMateri->slug) }}"
                                    class="btn-hasil btn-secondary">
                                    Kembali ke Materi
                                </a>
                            @endif

                            <a href="{{ route('quiz.show', 5) }}" class="btn-hasil btn-primary">
                                Kerjakan Evaluasi
                            </a>
                        @elseif ($quiz->id == 5)
                            <a href="{{ route('peta-konsep') }}" class="btn-hasil btn-primary">
                                Kembali ke Peta Konsep
                            </a>
                        @elseif (!empty($nextMateri))
                            <a href="{{ route('materi.show', $nextMateri->slug) }}" class="btn-hasil btn-primary">
                                Lanjut Materi
                            </a>
                        @elseif (!empty($previousMateri))
                            <a href="{{ route('materi.show', $previousMateri->slug) }}"
                                class="btn-hasil btn-secondary">
                                Kembali ke Materi
                            </a>
                        @else
                            <a href="{{ route('peta-konsep') }}" class="btn-hasil btn-primary">
                                Kembali ke Peta Konsep
                            </a>
                        @endif
                    @else
                        @if ($quiz->id == 5)
                            <a href="{{ route('peta-konsep') }}" class="btn-hasil btn-secondary">
                                Kembali ke Peta Konsep
                            </a>
                        @elseif (!empty($previousMateri))
                            <a href="{{ route('materi.show', $previousMateri->slug) }}"
                                class="btn-hasil btn-secondary">
                                Pelajari Materi
                            </a>
                        @else
                            <a href="{{ route('peta-konsep') }}" class="btn-hasil btn-secondary">
                                Kembali ke Peta Konsep
                            </a>
                        @endif

                        <a href="{{ route('quiz.show', $quiz->id) }}?ulang=1" class="btn-hasil btn-danger">
                            Ulangi Kuis
                        </a>
                    @endif
                </div>

            </div>
        </div>
    </div>
</body>

</html>
