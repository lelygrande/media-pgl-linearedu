<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petunjuk Kuis - {{ $quiz->title }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary-color: #0187b8;
            --primary-dark: #00658b;
            --footer-bg: #004365;
            --white: #ffffff;
            --text-dark: #1f2a37;
            --text-soft: #5b6573;
            --border-soft: rgba(1, 135, 184, 0.18);
            --section-light: #eef8ff;
            --section-blue: #cfe6ff;
            --section-blue-hover: #a9cff7;
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

        .petunjuk-page {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px 16px;
            overflow: hidden;
        }

        .petunjuk-wrapper {
            width: 100%;
            max-width: 760px;
            max-height: 100%;
            display: flex;
            flex-direction: column;
        }

        .petunjuk-title {
            text-align: center;
            margin-bottom: 10px;
            flex-shrink: 0;
        }

        .petunjuk-label {
            color: var(--primary-color);
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 3px;
        }

        .petunjuk-title h1 {
            color: var(--footer-bg);
            font-size: 26px;
            font-weight: 800;
            margin-bottom: 4px;
        }

        .petunjuk-title p {
            color: var(--text-soft);
            font-size: 14px;
            line-height: 1.4;
        }

        .petunjuk-card {
            background: var(--white);
            border-radius: 20px;
            border: 1px solid #dbeaf5;
            padding: 20px 24px;
            box-shadow: none;
            max-height: calc(100vh - 110px);
            display: flex;
            flex-direction: column;
            min-height: 0;
        }

        .info-kuis {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-bottom: 16px;
            flex-shrink: 0;
        }

        .info-item {
            background: var(--section-light);
            border: 1px solid var(--border-soft);
            border-radius: 14px;
            padding: 9px 12px;
            text-align: center;
        }

        .info-item span {
            display: block;
            color: var(--text-soft);
            font-size: 12px;
            margin-bottom: 2px;
        }

        .info-item b {
            display: block;
            color: var(--footer-bg);
            font-size: 17px;
            font-weight: 800;
        }

        .petunjuk-body {
            min-height: 0;
            overflow-y: auto;
            padding-right: 6px;
        }

        .petunjuk-body::-webkit-scrollbar {
            width: 6px;
        }

        .petunjuk-body::-webkit-scrollbar-thumb {
            background: #c8d8e5;
            border-radius: 999px;
        }

        .petunjuk-body::-webkit-scrollbar-track {
            background: #f3f8fc;
            border-radius: 999px;
        }

        .petunjuk-card h2 {
            color: var(--footer-bg);
            font-size: 20px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .petunjuk-list {
            margin-left: 22px;
            margin-bottom: 0;
            padding-left: 0;
        }

        .petunjuk-list li {
            color: var(--text-dark);
            font-size: 15px;
            line-height: 1.62;
            margin-bottom: 7px;
        }

        .button-area {
            flex-shrink: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-top: 14px;
            padding-top: 14px;
            border-top: 1px solid #e8eef5;
        }

        .btn-back,
        .btn-start {
            text-decoration: none;
            border: none;
            border-radius: 12px;
            padding: 10px 20px;
            font-family: "Quicksand", sans-serif;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.25s ease;
            text-align: center;
            min-width: 170px;
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

        @media (max-width: 768px) {
            body {
                overflow-y: auto;
            }

            .petunjuk-page {
                height: auto;
                min-height: 100vh;
                align-items: flex-start;
                padding: 16px 12px;
                overflow: visible;
            }

            .petunjuk-wrapper {
                max-width: 100%;
            }

            .petunjuk-title h1 {
                font-size: 24px;
            }

            .petunjuk-title p {
                font-size: 14px;
            }

            .petunjuk-card {
                max-height: none;
                padding: 18px;
            }

            .petunjuk-body {
                overflow: visible;
                padding-right: 0;
            }

            .info-kuis {
                grid-template-columns: 1fr;
                gap: 8px;
                margin-bottom: 14px;
            }

            .button-area {
                flex-direction: column;
            }

            .btn-back,
            .btn-start {
                width: 100%;
            }
        }

        @media (max-height: 700px) and (min-width: 769px) {
            .petunjuk-page {
                padding: 8px 16px;
            }

            .petunjuk-title {
                margin-bottom: 8px;
            }

            .petunjuk-title h1 {
                font-size: 24px;
            }

            .petunjuk-title p {
                font-size: 13px;
            }

            .petunjuk-card {
                max-height: calc(100vh - 92px);
                padding: 16px 22px;
            }

            .info-kuis {
                margin-bottom: 12px;
            }

            .info-item {
                padding: 8px 10px;
            }

            .petunjuk-card h2 {
                font-size: 19px;
                margin-bottom: 6px;
            }

            .petunjuk-list li {
                font-size: 14px;
                line-height: 1.55;
                margin-bottom: 6px;
            }

            .button-area {
                margin-top: 10px;
                padding-top: 10px;
            }

            .btn-back,
            .btn-start {
                padding: 9px 18px;
            }
        }
    </style>
</head>

<body>
    <div class="petunjuk-page">
        <div class="petunjuk-wrapper">

            <div class="petunjuk-title">
                <div class="petunjuk-label">Petunjuk Pengerjaan Kuis</div>
                <h1>{{ $quiz->title }}</h1>
                <p>Baca petunjuk berikut sebelum mulai mengerjakan kuis.</p>
            </div>

            <div class="petunjuk-card">
                <div class="info-kuis">
                    <div class="info-item">
                        <span>Jumlah Soal</span>
                        <b>{{ $quiz->questions->count() }}</b>
                    </div>

                    <div class="info-item">
                        <span>Waktu</span>
                        <b>{{ $quiz->duration_minutes }} menit</b>
                    </div>

                    <div class="info-item">
                        <span>KKM</span>
                        <b>{{ $quiz->kkm }}</b>
                    </div>
                </div>

                <div class="petunjuk-body">
                    <h2>Cara Pengerjaan</h2>

                    <ol class="petunjuk-list">
                        <li>Kerjakan kuis secara mandiri dan baca setiap soal dengan teliti.</li>
                        <li>Pilih satu jawaban yang paling tepat pada setiap soal.</li>
                        <li>
                            Jika masih ragu dengan jawaban, klik tombol <b>Ragu-ragu</b> yang tersedia
                            di bagian atas soal.
                        </li>
                        <li>Waktu akan mulai berjalan setelah tombol mulai ditekan.</li>
                        <li>Periksa kembali jawaban sebelum menekan tombol kumpulkan jawaban.</li>
                        <li>
                            Pada percobaan ulang, kuis tetap dapat dikerjakan kembali untuk memperbaiki
                            ketuntasan. Namun, jika nilai yang diperoleh melebihi KKM, maka nilai yang
                            dicatat maksimal adalah <b>{{ $quiz->kkm }}</b>.
                        </li>
                    </ol>
                </div>

                <div class="button-area">
                    @if (!empty($isUlang))
                        <a href="{{ route('quiz.show', $quiz->id) }}" class="btn-back">
                            Kembali
                        </a>
                    @elseif (!empty($previousMateri))
                        <a href="{{ route('materi.show', $previousMateri->slug) }}" class="btn-back">
                            Kembali
                        </a>
                    @else
                        <a href="javascript:history.back()" class="btn-back">
                            Kembali
                        </a>
                    @endif

                    <a href="{{ route('quiz.show', $quiz->id) }}?start=1" class="btn-start">
                        {{ !empty($isUlang) ? 'Mulai Ulang Kuis' : 'Mulai Kuis' }}
                    </a>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
