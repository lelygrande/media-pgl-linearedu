<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $quiz->title }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --hero-bg: #e8f4ff;
            --section-light: #cfe6ff;
            --section-dark: #a9cff7;
            --footer-bg: #004365;
            --primary-color: #0187b8;
            --primary-dark: #00658b;
            --white: #ffffff;
            --text-dark: #1f2a37;
            --text-soft: #5b6573;
            --border-soft: rgba(1, 135, 184, 0.15);
            --shadow: 0 12px 30px rgba(0, 67, 101, 0.12);
            --green: #198754;
            --green-soft: #dff6e7;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Quicksand", sans-serif;
            background: linear-gradient(180deg, var(--hero-bg) 0%, #e0e9f6 100%);
            min-height: 100vh;
            font-weight: 550;
            color: var(--text-dark);
        }

        .quiz-page {
            min-height: 100vh;
            padding: 28px 16px;
        }

        .quiz-wrapper {
            max-width: 1200px;
            margin: 0 auto;
        }

        .quiz-topbar {
            background: var(--white);
            border-radius: 24px;
            box-shadow: var(--shadow);
            padding: 24px 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 24px;
            margin-bottom: 24px;
        }

        .quiz-label {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 15px;
            margin-bottom: 6px;
        }

        .quiz-title-area h1 {
            font-size: 32px;
            color: var(--footer-bg);
            margin-bottom: 8px;
        }

        .quiz-desc {
            color: var(--text-soft);
            font-size: 16px;
            font-weight: 600;
        }

        .timer-box {
            min-width: 150px;
            background: linear-gradient(135deg,
                    var(--primary-color),
                    var(--primary-dark));
            color: var(--white);
            border-radius: 18px;
            padding: 18px 22px;
            text-align: center;
            box-shadow: 0 10px 24px rgba(1, 135, 184, 0.22);
        }

        .timer-box span {
            display: block;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 6px;
            opacity: 0.95;
        }

        .timer-box #timer {
            font-size: 28px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .quiz-content {
            display: grid;
            grid-template-columns: 1.8fr 0.9fr;
            gap: 22px;
            align-items: start;
        }

        .question-panel,
        .navigator-card {
            background: var(--white);
            border-radius: 24px;
            box-shadow: var(--shadow);
        }

        .question-panel {
            padding: 28px;
        }

        .navigator-card {
            padding: 24px;
            position: sticky;
            top: 20px;
        }

        .question-slide {
            display: none;
        }

        .question-slide.active {
            display: block;
        }

        .question-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: var(--primary-dark);
            font-weight: 700;
            margin-bottom: 18px;
            font-size: 15px;
        }

        .question-card {
            background: var(--hero-bg);
            border-radius: 22px;
            padding: 24px;
            border: 1px solid var(--border-soft);
        }

        .question-text {
            font-size: 22px;
            line-height: 1.6;
            font-weight: 700;
            margin-bottom: 22px;
            color: var(--text-dark);
        }

        .question-image {
            margin-bottom: 20px;
        }

        .question-image img {
            width: 100%;
            max-height: 320px;
            object-fit: contain;
            border-radius: 16px;
            background: #fff;
            padding: 10px;
        }

        .options {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .option-item {
            display: block;
            cursor: pointer;
        }

        .option-item input[type="radio"] {
            display: none;
        }

        .option-content {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            background: var(--white);
            border: 2px solid transparent;
            border-radius: 16px;
            padding: 16px 18px;
            transition: 0.25s ease;
        }

        .option-item input[type="radio"]:checked+.option-content {
            border-color: var(--primary-color);
            background: #eef8ff;
        }

        .option-content:hover {
            border-color: var(--section-dark);
        }

        /* Opsi */

        .option-label {
            width: 38px;
            height: 38px;
            flex-shrink: 0;
            border-radius: 50%;
            background: var(--section-light);
            color: var(--footer-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .option-text {
            font-size: 16px;
            color: var(--text-dark);
            line-height: 1.5;
            font-weight: 600;
            padding-top: 6px;
        }


        .option-body {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 100%;
        }

        .option-image {
            max-width: 260px;
            width: 100%;
            height: auto;
            border-radius: 12px;
            border: 1px solid #ddd;
            display: block;
        }

        @media (max-width: 576px) {
            .option-image {
                max-width: 100%;
            }
        }

        .question-actions {
            margin-top: 24px;
            display: flex;
            justify-content: space-between;
            gap: 12px;
        }

        .nav-btn,
        .submit-btn {
            border: none;
            border-radius: 14px;
            padding: 12px 22px;
            font-family: "Quicksand", sans-serif;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.25s ease;
        }

        .nav-btn {
            background: var(--section-light);
            color: var(--footer-bg);
        }

        .nav-btn:hover {
            background: var(--section-dark);
        }

        .nav-btn.primary,
        .submit-btn {
            background: var(--primary-color);
            color: var(--white);
        }

        .nav-btn.primary:hover,
        .submit-btn:hover {
            background: var(--primary-dark);
        }

        .submit-section {
            margin-top: 16px;
            text-align: right;
        }

        .navigator-card h3 {
            font-size: 22px;
            color: var(--footer-bg);
            margin-bottom: 8px;
        }

        .navigator-card p {
            color: var(--text-soft);
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 18px;
        }

        .numbers {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
            margin-bottom: 22px;
        }

        .num {
            border: 2px solid var(--section-dark);
            background: var(--white);
            color: var(--footer-bg);
            border-radius: 14px;
            padding: 12px 0;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.25s ease;
        }

        .num:hover {
            background: var(--hero-bg);
        }

        .num.active {
            background: var(--primary-color);
            color: var(--white);
            border-color: var(--primary-color);
        }

        .num.answered {
            background: var(--green);
            color: var(--white);
            border-color: var(--green);
        }

        .legend {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding-top: 8px;
            border-top: 1px solid rgba(0, 67, 101, 0.08);
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--text-soft);
            font-size: 14px;
            font-weight: 600;
        }

        .legend-dot {
            width: 16px;
            height: 16px;
            border-radius: 50%;
        }

        .active-dot {
            background: var(--primary-color);
        }

        .answered-dot {
            background: var(--green);
        }

        .empty-question {
            background: var(--white);
            padding: 24px;
            border-radius: 18px;
            text-align: center;
            color: var(--text-soft);
            font-weight: 700;
        }

        @media (max-width: 992px) {
            .quiz-content {
                grid-template-columns: 1fr;
            }

            .navigator-card {
                position: static;
            }

            .quiz-topbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .timer-box {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .quiz-title-area h1 {
                font-size: 26px;
            }

            .question-panel,
            .navigator-card {
                padding: 20px;
            }

            .question-text {
                font-size: 19px;
            }

            .numbers {
                grid-template-columns: repeat(4, 1fr);
            }

            .question-actions {
                flex-direction: column;
            }

            .nav-btn,
            .submit-btn {
                width: 100%;
            }

            .submit-section {
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .numbers {
                grid-template-columns: repeat(3, 1fr);
            }

            .option-content {
                padding: 14px;
            }

            .option-text {
                font-size: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="quiz-page">
        <div class="quiz-wrapper">
            <div class="quiz-topbar">
                <div class="quiz-title-area">
                    <h1>{{ $quiz->title }}</h1>
                    <p class="quiz-desc">
                        Kerjakan semua soal dengan teliti sebelum waktu habis.
                    </p>
                </div>

                <div class="timer-box">
                    <span>Waktu</span>
                    <div id="timer">
                        {{ str_pad($quiz->duration_minutes, 2, '0', STR_PAD_LEFT) }}:00
                    </div>
                </div>
            </div>

            <form action="{{ route('quiz.submit', $quiz->id) }}" method="POST" id="quizForm">
                @csrf

                @if (isset($attempt))
                    <input type="hidden" name="attempt_id" value="{{ $attempt->id }}">
                @endif

                <div class="quiz-content">
                    <div class="question-panel">
                        @forelse ($quiz->questions as $index => $question)
                            <div class="question-slide {{ $index === 0 ? 'active' : '' }}"
                                data-index="{{ $index }}">
                                <div class="question-meta">
                                    <span>Soal {{ $question->question_order }}</span>
                                    <span>{{ $index + 1 }} / {{ $quiz->questions->count() }}</span>
                                </div>
                                <br>
                                <div class="question-card">
                                    <p class="mb-2">{!! $question->question_text !!}</p>

                                    @if ($question->question_image)
                                        <img src="{{ asset('img/kuis/' . $question->question_image) }}"
                                            alt="Gambar soal" class="img-fluid rounded mb-2" style="max-width: 300px;">
                                    @endif

                                    <br>

                                    <div class="options">
                                        @foreach ($question->options as $option)
                                            <label class="option-item">
                                                <input type="radio" name="jawaban[{{ $question->id }}]"
                                                    value="{{ $option->id }}">

                                                <div class="option-content">
                                                    <span class="option-label">{{ $option->option_label }}</span>

                                                    <div class="option-body">
                                                        @if ($option->option_text && trim($option->option_text) !== '-')
                                                            <span class="option-text">{!! $option->option_text !!}</span>
                                                        @endif

                                                        @if ($option->option_image)
                                                            <img src="{{ asset('img/kuis/opsi/' . $option->option_image) }}"
                                                                alt="Gambar opsi {{ $option->option_label }}"
                                                                class="option-image">
                                                        @endif
                                                    </div>
                                                </div>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="empty-question">
                                Belum ada soal untuk kuis ini.
                            </div>
                        @endforelse

                        @if ($quiz->questions->count())
                            <div class="question-actions">
                                <button type="button" class="nav-btn" id="prevBtn">Sebelumnya</button>
                                <button type="button" class="nav-btn primary" id="nextBtn">Berikutnya</button>
                            </div>

                            <div class="submit-section" id="submitSection" style="display: none;">
                                <button type="submit" class="submit-btn">
                                    Kumpulkan Jawaban
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="navigator-panel">
                        <div class="navigator-card">
                            <h3>Navigasi Soal</h3>
                            <p>Pilih nomor soal untuk berpindah.</p>

                            <div class="numbers">
                                @foreach ($quiz->questions as $index => $item)
                                    <button type="button" class="num {{ $index === 0 ? 'active' : '' }}"
                                        data-index="{{ $index }}">
                                        {{ $item->question_order }}
                                    </button>
                                @endforeach
                            </div>

                            <div class="legend">
                                <div class="legend-item">
                                    <span class="legend-dot active-dot"></span>
                                    <span>Sedang dibuka</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-dot answered-dot"></span>
                                    <span>Sudah dijawab</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/contrib/auto-render.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            renderMathInElement(document.body, {
                delimiters: [{
                        left: "\\(",
                        right: "\\)",
                        display: false
                    },
                    {
                        left: "$",
                        right: "$",
                        display: false
                    }
                ]
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.question-slide');
            const navButtons = document.querySelectorAll('.num');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const submitSection = document.getElementById('submitSection');
            const quizForm = document.getElementById('quizForm');
            const timerElement = document.getElementById('timer');

            let currentIndex = 0;
            let totalSeconds = {{ $quiz->duration_minutes * 60 }};

            function updateAnsweredStatus() {
                slides.forEach((slide, index) => {
                    const checked = slide.querySelector('input[type="radio"]:checked');
                    navButtons[index].classList.remove('answered');

                    if (checked) {
                        navButtons[index].classList.add('answered');
                    }
                });

                if (navButtons[currentIndex]) {
                    navButtons[currentIndex].classList.add('active');
                }
            }

            function showSlide(index) {
                slides.forEach(slide => slide.classList.remove('active'));
                navButtons.forEach(btn => btn.classList.remove('active'));

                if (slides[index]) {
                    slides[index].classList.add('active');
                    navButtons[index].classList.add('active');
                    currentIndex = index;
                }

                prevBtn.style.visibility = currentIndex === 0 ? 'hidden' : 'visible';
                nextBtn.style.display = currentIndex === slides.length - 1 ? 'none' : 'inline-flex';
                submitSection.style.display = currentIndex === slides.length - 1 ? 'block' : 'none';

                updateAnsweredStatus();
            }

            prevBtn?.addEventListener('click', function() {
                if (currentIndex > 0) {
                    showSlide(currentIndex - 1);
                }
            });

            nextBtn?.addEventListener('click', function() {
                if (currentIndex < slides.length - 1) {
                    showSlide(currentIndex + 1);
                }
            });

            navButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const index = parseInt(this.dataset.index);
                    showSlide(index);
                });
            });

            document.querySelectorAll('input[type="radio"]').forEach(input => {
                input.addEventListener('change', function() {
                    updateAnsweredStatus();
                });
            });

            function updateTimer() {
                const minutes = String(Math.floor(totalSeconds / 60)).padStart(2, '0');
                const seconds = String(totalSeconds % 60).padStart(2, '0');
                timerElement.textContent = `${minutes}:${seconds}`;

                if (totalSeconds <= 0) {
                    clearInterval(interval);
                    alert('Waktu habis. Jawaban akan dikumpulkan otomatis.');
                    quizForm.submit();
                    return;
                }

                totalSeconds--;
            }

            if (slides.length > 0) {
                showSlide(0);
                updateTimer();
                var interval = setInterval(updateTimer, 1000);
            }
        });
    </script>
</body>

</html>
