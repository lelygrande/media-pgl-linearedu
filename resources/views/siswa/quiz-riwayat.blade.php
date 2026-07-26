    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Riwayat Kuis - {{ $quiz->title }}</title>

        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap"
            rel="stylesheet">

        <style>
            :root {
                --primary-color: #0187b8;
                --primary-dark: #00658b;
                --footer-bg: #004365;
                --white: #ffffff;
                --text-dark: #1f2a37;
                --text-soft: #5b6573;
                --border-soft: #dbeaf5;
                --section-light: #eef8ff;
                --section-blue: #cfe6ff;
                --section-blue-hover: #a9cff7;
                --green: #198754;
                --green-soft: #dff6e7;
                --red: #dc3545;
                --red-soft: #ffe3e6;
                --yellow-soft: #fff4d8;
                --yellow-text: #8a6200;
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            html,
            body {
                width: 100%;
                height: 100%;
            }

            body {
                font-family: "Quicksand", sans-serif;
                background: #ffffff;
                color: var(--text-dark);
                font-weight: 600;
                overflow: hidden;
            }

            .riwayat-page {
                height: 100vh;
                padding: 22px 16px;
                display: flex;
                justify-content: center;
                align-items: center;
                overflow: hidden;
            }

            .riwayat-wrapper {
                width: 100%;
                max-width: 980px;
            }

            .riwayat-title {
                text-align: center;
                margin-bottom: 16px;
            }

            .riwayat-label {
                color: var(--primary-color);
                font-size: 14px;
                font-weight: 700;
                margin-bottom: 4px;
            }

            .riwayat-title h1 {
                color: var(--footer-bg);
                font-size: 28px;
                font-weight: 700;
                margin-bottom: 6px;
            }

            .riwayat-title p {
                color: var(--text-soft);
                font-size: 15px;
                line-height: 1.5;
            }

            .riwayat-card {
                background: var(--white);
                border: 1px solid var(--border-soft);
                border-radius: 20px;
                padding: 22px 26px;
                box-shadow: none;
            }

            .summary-row {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 10px;
                margin-bottom: 18px;
            }

            .summary-item {
                background: var(--section-light);
                border: 1px solid rgba(1, 135, 184, 0.18);
                border-radius: 14px;
                padding: 10px 12px;
                text-align: center;
            }

            .summary-item span {
                display: block;
                color: var(--text-soft);
                font-size: 12px;
                margin-bottom: 2px;
            }

            .summary-item b {
                display: block;
                color: var(--footer-bg);
                font-size: 16px;
                font-weight: 700;
            }

            .table-title {
                color: var(--footer-bg);
                font-size: 20px;
                font-weight: 700;
                margin-bottom: 12px;
            }

            .table-wrap {
                width: 100%;
                max-height: 300px;
                overflow: auto;
                border: 1px solid var(--border-soft);
                border-radius: 14px;
            }

            .table-wrap::-webkit-scrollbar {
                width: 8px;
                height: 8px;
            }

            .table-wrap::-webkit-scrollbar-thumb {
                background: #c8d8e5;
                border-radius: 999px;
            }

            .table-wrap::-webkit-scrollbar-track {
                background: #f3f8fc;
                border-radius: 999px;
            }

            .history-table {
                width: 100%;
                min-width: 680px;
                border-collapse: collapse;
                background: var(--white);
            }

            .history-table thead {
                background: var(--section-light);
            }

            .history-table thead th {
                position: sticky;
                top: 0;
                z-index: 2;
                background: var(--section-light);
            }

            .history-table th {
                color: var(--footer-bg);
                padding: 13px 12px;
                text-align: center;
                font-size: 14px;
                font-weight: 700;
                border-bottom: 1px solid var(--border-soft);
                white-space: nowrap;
            }

            .history-table td {
                padding: 12px;
                text-align: center;
                font-size: 14px;
                font-weight: 600;
                color: var(--text-dark);
                border-bottom: 1px solid #edf3f8;
                vertical-align: middle;
            }

            .history-table tbody tr:last-child td {
                border-bottom: none;
            }

            .history-table tbody tr:nth-child(even) {
                background: #fbfdff;
            }

            .score-text {
                color: var(--footer-bg);
                font-size: 16px;
                font-weight: 700;
            }

            .badge {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border-radius: 999px;
                padding: 6px 11px;
                font-size: 12px;
                font-weight: 700;
                white-space: nowrap;
            }

            .badge-success {
                background: var(--green-soft);
                color: var(--green);
            }

            .badge-danger {
                background: var(--red-soft);
                color: var(--red);
            }

            .badge-warning {
                background: var(--yellow-soft);
                color: var(--yellow-text);
            }

            .empty-history {
                background: var(--section-light);
                border: 1px solid var(--border-soft);
                border-radius: 14px;
                padding: 20px;
                text-align: center;
                color: var(--text-soft);
                font-weight: 700;
            }

            .button-area {
                margin-top: 18px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 12px;
                flex-wrap: wrap;
            }

            .btn-back,
            .btn-start {
                text-decoration: none;
                border: none;
                border-radius: 12px;
                padding: 10px 20px;
                font-family: "Quicksand", sans-serif;
                font-size: 14px;
                font-weight: 700;
                cursor: pointer;
                transition: 0.25s ease;
                text-align: center;
                min-width: 150px;
            }

            .btn-back {
                background: var(--section-blue);
                color: var(--footer-bg);
            }

            .btn-back:hover {
                background: var(--section-blue-hover);
            }

            .btn-start {
                background: var(--primary-color);
                color: var(--white);
            }

            .btn-start:hover {
                background: var(--primary-dark);
            }

            @media (max-height: 720px) and (min-width: 769px) {
                .riwayat-page {
                    padding: 12px 16px;
                }

                .riwayat-title {
                    margin-bottom: 10px;
                }

                .riwayat-title h1 {
                    font-size: 24px;
                }

                .riwayat-title p {
                    font-size: 14px;
                }

                .riwayat-card {
                    padding: 18px 22px;
                }

                .summary-row {
                    margin-bottom: 14px;
                }

                .table-wrap {
                    max-height: 260px;
                }
            }

            @media (max-width: 768px) {
                body {
                    overflow: auto;
                }

                .riwayat-page {
                    height: auto;
                    min-height: 100vh;
                    padding: 18px 12px;
                    align-items: flex-start;
                    overflow: visible;
                }

                .riwayat-wrapper {
                    max-width: 100%;
                }

                .riwayat-title h1 {
                    font-size: 24px;
                }

                .riwayat-title p {
                    font-size: 14px;
                }

                .riwayat-card {
                    padding: 18px;
                }

                .summary-row {
                    grid-template-columns: repeat(2, 1fr);
                }

                .table-wrap {
                    max-height: 360px;
                }

                .button-area {
                    flex-direction: column;
                }

                .btn-back,
                .btn-start {
                    width: 100%;
                }
            }

            @media (max-width: 480px) {
                .summary-row {
                    grid-template-columns: 1fr;
                }
            }
        </style>
    </head>

    <body>
        @php
            // Karena attempts diurutkan latest('id'), data pertama adalah percobaan terbaru
            $nilaiKamu = optional($attempts->first())->score ?? 0;
            $passedCount = $attempts->where('is_passed', 1)->count();
        @endphp

        <div class="riwayat-page">
            <div class="riwayat-wrapper">

                <div class="riwayat-title">
                    <div class="riwayat-label">Riwayat Percobaan Kuis</div>

                    <h1>{{ $quiz->title }}</h1>

                    <p>
                        Berikut adalah riwayat percobaan kuis yang sudah kamu kerjakan.
                    </p>
                </div>

                <div class="riwayat-card">

                    <div class="summary-row">
                        <div class="summary-item">
                            <span>Total Percobaan</span>
                            <b>{{ $attempts->count() }}</b>
                        </div>

                        <div class="summary-item">
                            <span>Nilai Kamu</span>
                            <b>{{ number_format($nilaiKamu, 0) }}</b>
                        </div>

                        <div class="summary-item">
                            <span>Jumlah Lulus</span>
                            <b>{{ $passedCount }}</b>
                        </div>

                        <div class="summary-item">
                            <span>KKM</span>
                            <b>{{ $quiz->kkm }}</b>
                        </div>
                    </div>

                    <h2 class="table-title">Tabel Percobaan Kuis</h2>

                    @if ($attempts->count() > 0)
                        <div class="table-wrap">
                            <table class="history-table">
                                <thead>
                                    <tr>
                                        <th>Percobaan</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Benar</th>
                                        <th>Salah</th>
                                        <th>Nilai</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($attempts as $index => $attempt)
                                        <tr>
                                            <td>
                                                {{ $attempts->count() - $index }}
                                            </td>

                                            <td>
                                                {{ optional($attempt->submitted_at ?? $attempt->end_at)->format('d/m/Y H:i') ?? '-' }}
                                            </td>

                                            <td>
                                                @if ($attempt->status === 'submitted')
                                                    <span class="badge badge-success">Selesai</span>
                                                @elseif ($attempt->status === 'expired')
                                                    <span class="badge badge-warning">Waktu Habis</span>
                                                @else
                                                    <span class="badge badge-warning">{{ $attempt->status }}</span>
                                                @endif
                                            </td>

                                            <td>{{ $attempt->correct_answers ?? 0 }}</td>
                                            <td>{{ $attempt->wrong_answers ?? 0 }}</td>

                                            <td>
                                                <span class="score-text">
                                                    {{ number_format($attempt->score ?? 0, 0) }}
                                                </span>
                                            </td>

                                            <td>
                                                @if ($attempt->status === 'expired')
                                                    <span class="badge badge-warning">Tidak Selesai</span>
                                                @elseif ($attempt->is_passed)
                                                    <span class="badge badge-success">Lulus</span>
                                                @else
                                                    <span class="badge badge-danger">Belum Lulus</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="empty-history">
                            Belum ada riwayat percobaan kuis.
                        </div>
                    @endif

                    <div class="button-area">
                        @if (!empty($previousMateri))
                            <a href="{{ route('materi.show', $previousMateri->slug) }}" class="btn-back">
                                Kembali
                            </a>
                        @else
                            <a href="javascript:history.back()" class="btn-back">
                                Kembali
                            </a>
                        @endif

                        @if ($sisaPercobaan > 0)
                            <a href="{{ route('quiz.show', $quiz->id) }}?ulang=1" class="btn-start">
                                Ulangi Kuis
                                (Sisa {{ $sisaPercobaan }})
                            </a>
                        @else
                            <button type="button" class="btn-start" disabled
                                style="background:#94a3b8;cursor:not-allowed;">
                                Batas Percobaan Tercapai
                            </button>
                        @endif
                    </div>

                </div>

            </div>
        </div>
    </body>

    </html>
