<!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $quiz->title }}</title>

        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap"
            rel="stylesheet">

        <style>
            :root {
                --primary-color: #0187b8;
                --primary-dark: #00658b;
                --footer-bg: #004365;
                --text-dark: #1f2a37;
                --text-soft: #5b6573;
                --border: #d9e6ef;
                --light-blue: #eef8ff;
                --green: #198754;
                --yellow: #ffc107;
                --yellow-soft: #fff4d8;
                --red: #dc3545;
                --red-soft: #ffe3e6;
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
                height: 100%;
            }

            body {
                font-family: "Quicksand", sans-serif;
                background: var(--white);
                color: var(--text-dark);
                font-weight: 600;
                overflow: hidden;
            }

            .quiz-page {
                height: 100vh;
                padding: 18px 24px;
                overflow: hidden;
            }

            .quiz-wrapper {
                max-width: 1200px;
                height: 100%;
                margin: 0 auto;
                display: flex;
                flex-direction: column;
            }

            .quiz-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 16px;
                border-bottom: 1px solid var(--border);
                padding-bottom: 14px;
                margin-bottom: 16px;
                flex-shrink: 0;
            }

            .quiz-title h1 {
                font-size: 28px;
                color: var(--footer-bg);
                margin-bottom: 4px;
            }

            .quiz-title p {
                color: var(--text-soft);
                font-size: 15px;
            }

            .timer-box {
                min-width: 120px;
                border: 1px solid var(--primary-color);
                color: var(--primary-dark);
                border-radius: 12px;
                padding: 10px 16px;
                text-align: center;
            }

            .timer-box span {
                display: block;
                font-size: 13px;
                margin-bottom: 3px;
                color: var(--text-soft);
            }

            .timer-box #timer {
                font-size: 22px;
                font-weight: 700;
                color: var(--primary-dark);
            }

            .quiz-alert {
                background: var(--red-soft);
                color: var(--red);
                border: 1px solid rgba(220, 53, 69, 0.25);
                border-radius: 12px;
                padding: 10px 14px;
                margin-bottom: 12px;
                font-weight: 700;
                flex-shrink: 0;
            }

            #quizForm {
                flex: 1;
                min-height: 0;
            }

            .quiz-content {
                height: 100%;
                min-height: 0;
                display: grid;
                grid-template-columns: 1fr 280px;
                gap: 24px;
                align-items: stretch;
            }

            .question-area {
                min-width: 0;
                min-height: 0;
                height: 100%;
                display: flex;
                flex-direction: column;
            }

            .question-slide {
                display: none;
                height: 100%;
                min-height: 0;
            }

            .question-slide.active {
                display: flex;
                flex-direction: column;
            }

            .question-meta {
                display: flex;
                justify-content: space-between;
                align-items: center;
                color: var(--primary-dark);
                font-weight: 700;
                font-size: 15px;
                margin-bottom: 12px;
                padding-bottom: 10px;
                border-bottom: 1px solid var(--border);
                flex-shrink: 0;
            }

            .question-top-actions {
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .doubt-btn-top {
                border: 1px solid #f0d27a;
                background: var(--yellow-soft);
                color: #7a5a00;
                border-radius: 10px;
                padding: 7px 13px;
                font-family: "Quicksand", sans-serif;
                font-size: 13px;
                font-weight: 700;
                cursor: pointer;
                transition: 0.2s ease;
            }

            .doubt-btn-top.active {
                background: var(--yellow);
                color: #3f3000;
                border-color: var(--yellow);
            }

            .question-scroll {
                flex: 1;
                min-height: 0;
                overflow-y: auto;
                padding-right: 10px;
            }

            .question-scroll::-webkit-scrollbar {
                width: 8px;
            }

            .question-scroll::-webkit-scrollbar-thumb {
                background: #c8d8e5;
                border-radius: 999px;
            }

            .question-scroll::-webkit-scrollbar-track {
                background: #f3f8fc;
                border-radius: 999px;
            }

            .question-text {
                font-size: 20px;
                line-height: 1.55;
                font-weight: 700;
                margin-bottom: 16px;
                color: var(--text-dark);
            }

            .question-image {
                margin-bottom: 14px;
            }

            .question-image img,
            .question-slide img.img-fluid {
                max-width: 280px !important;
                max-height: 220px;
                object-fit: contain;
                border: 1px solid var(--border);
                border-radius: 10px;
                padding: 8px;
                background: #fff;
            }

            .options {
                display: flex;
                flex-direction: column;
                gap: 10px;
                margin-top: 12px;
                padding-bottom: 8px;
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
                gap: 12px;
                border: 1px solid var(--border);
                border-radius: 12px;
                padding: 12px 14px;
                background: #fff;
                transition: 0.2s ease;
            }

            .option-content:hover {
                border-color: var(--primary-color);
                background: #f7fcff;
            }

            .option-item input[type="radio"]:checked+.option-content {
                border-color: var(--primary-color);
                background: var(--light-blue);
            }

            .option-label {
                width: 32px;
                height: 32px;
                border-radius: 50%;
                background: var(--light-blue);
                color: var(--footer-bg);
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: 700;
                flex-shrink: 0;
            }

            .option-body {
                display: flex;
                flex-direction: column;
                gap: 8px;
                width: 100%;
            }

            .option-text {
                font-size: 16px;
                line-height: 1.45;
                color: var(--text-dark);
                padding-top: 4px;
            }

            .option-image {
                max-width: 220px;
                max-height: 150px;
                object-fit: contain;
                border: 1px solid var(--border);
                border-radius: 10px;
                padding: 6px;
                background: #fff;
            }

            .options.options-grid {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 14px;
            }

            .options.options-grid .option-content {
                height: 100%;
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
                padding: 14px;
            }

            .options.options-grid .option-body {
                width: 100%;
                align-items: center;
            }

            .options.options-grid .option-text {
                text-align: center;
                padding-top: 0;
            }

            .options.options-grid .option-image {
                width: 100%;
                max-width: 220px;
                max-height: 180px;
            }

            .question-actions {
                margin-top: 14px;
                padding-top: 12px;
                border-top: 1px solid var(--border);
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 12px;
                flex-shrink: 0;
            }

            .left-actions,
            .right-actions {
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .nav-btn,
            .submit-btn {
                border: none;
                border-radius: 10px;
                padding: 10px 18px;
                font-family: "Quicksand", sans-serif;
                font-size: 14px;
                font-weight: 700;
                cursor: pointer;
                transition: 0.2s ease;
            }

            .nav-btn {
                background: #dcecf8;
                color: var(--footer-bg);
            }

            .nav-btn:hover {
                background: #c7e1f5;
            }

            .nav-btn.primary,
            .submit-btn {
                background: var(--primary-color);
                color: white;
            }

            .nav-btn.primary:hover,
            .submit-btn:hover {
                background: var(--primary-dark);
            }

            .navigator-panel {
                border-left: 1px solid var(--border);
                padding-left: 22px;
                height: 100%;
                min-height: 0;
                display: flex;
                flex-direction: column;
            }

            .navigator-panel h3 {
                font-size: 20px;
                color: var(--footer-bg);
                margin-bottom: 6px;
            }

            .navigator-panel p {
                color: var(--text-soft);
                font-size: 14px;
                line-height: 1.5;
                margin-bottom: 14px;
            }

            .numbers {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 9px;
                margin-bottom: 16px;
            }

            .num {
                border: 1px solid var(--border);
                background: white;
                color: var(--footer-bg);
                border-radius: 10px;
                padding: 10px 0;
                font-size: 14px;
                font-weight: 700;
                cursor: pointer;
                transition: 0.2s ease;
            }

            .num:hover {
                border-color: var(--primary-color);
                background: #f7fcff;
            }

            .num.active {
                border-color: var(--primary-color);
                outline: 2px solid rgba(1, 135, 184, 0.18);
            }

            .num.answered:not(.doubt) {
                background: var(--green);
                color: white;
                border-color: var(--green);
            }

            .num.doubt {
                background: var(--yellow);
                color: #3f3000;
                border-color: var(--yellow);
            }

            .legend {
                border-top: 1px solid var(--border);
                padding-top: 12px;
                display: flex;
                flex-direction: column;
                gap: 8px;
                margin-bottom: 16px;
            }

            .legend-item {
                display: flex;
                align-items: center;
                gap: 9px;
                color: var(--text-soft);
                font-size: 13px;
            }

            .legend-dot {
                width: 13px;
                height: 13px;
                border-radius: 50%;
                display: inline-block;
            }

            .active-dot {
                border: 2px solid var(--primary-color);
                background: white;
            }

            .answered-dot {
                background: var(--green);
            }

            .doubt-dot {
                background: var(--yellow);
            }

            .submit-nav-area {
                margin-top: auto;
                padding-top: 14px;
                border-top: 1px solid var(--border);
            }

            .submit-btn {
                width: 100%;
            }

            .empty-question {
                border: 1px solid var(--border);
                padding: 20px;
                border-radius: 12px;
                text-align: center;
                color: var(--text-soft);
            }


            /* =========================
               POP-UP / MODAL KUIS
            ========================== */
            .quiz-modal-overlay {
                position: fixed;
                inset: 0;
                z-index: 9999;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 20px;
                background: rgba(7, 36, 54, 0.58);
                backdrop-filter: blur(4px);
                opacity: 0;
                visibility: hidden;
                transition: opacity 0.2s ease, visibility 0.2s ease;
            }

            .quiz-modal-overlay.show {
                opacity: 1;
                visibility: visible;
            }

            .quiz-modal {
                width: min(430px, 100%);
                background: var(--white);
                border-radius: 20px;
                padding: 28px 24px 24px;
                text-align: center;
                box-shadow: 0 24px 70px rgba(0, 67, 101, 0.28);
                transform: translateY(18px) scale(0.96);
                transition: transform 0.22s ease;
            }

            .quiz-modal-overlay.show .quiz-modal {
                transform: translateY(0) scale(1);
            }

            .quiz-modal-icon {
                width: 66px;
                height: 66px;
                margin: 0 auto 16px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 30px;
                font-weight: 700;
                background: var(--light-blue);
                color: var(--primary-dark);
            }

            .quiz-modal-icon.warning {
                background: var(--yellow-soft);
                color: #8a6500;
            }

            .quiz-modal-icon.danger {
                background: var(--red-soft);
                color: var(--red);
            }

            .quiz-modal-icon.success {
                background: #e4f6ec;
                color: var(--green);
            }

            .quiz-modal h2 {
                margin-bottom: 10px;
                color: var(--footer-bg);
                font-size: 22px;
                line-height: 1.3;
            }

            .quiz-modal p {
                margin-bottom: 22px;
                color: var(--text-soft);
                font-size: 15px;
                line-height: 1.65;
                white-space: pre-line;
            }

            .quiz-modal-actions {
                display: flex;
                justify-content: center;
                gap: 10px;
            }

            .quiz-modal-btn {
                border: none;
                border-radius: 11px;
                padding: 11px 18px;
                min-width: 130px;
                font-family: "Quicksand", sans-serif;
                font-size: 14px;
                font-weight: 700;
                cursor: pointer;
                transition: 0.2s ease;
            }

            .quiz-modal-btn.secondary {
                background: #e7f0f6;
                color: var(--footer-bg);
            }

            .quiz-modal-btn.secondary:hover {
                background: #d6e7f1;
            }

            .quiz-modal-btn.primary {
                background: var(--primary-color);
                color: var(--white);
            }

            .quiz-modal-btn.primary:hover {
                background: var(--primary-dark);
            }

            @media (max-width: 480px) {
                .quiz-modal {
                    padding: 24px 18px 20px;
                }

                .quiz-modal-actions {
                    flex-direction: column-reverse;
                }

                .quiz-modal-btn {
                    width: 100%;
                }
            }

            @media (max-width: 992px) {
                body {
                    overflow: auto;
                }

                .quiz-page {
                    min-height: 100vh;
                    height: auto;
                    overflow: visible;
                    padding: 14px 12px;
                }

                .quiz-wrapper {
                    height: auto;
                    display: block;
                }

                #quizForm {
                    height: auto;
                }

                .quiz-content {
                    height: auto;
                    grid-template-columns: 1fr;
                }

                .question-area,
                .question-slide,
                .question-slide.active {
                    height: auto;
                    display: block;
                }

                .question-scroll {
                    overflow: visible;
                    padding-right: 0;
                }

                .navigator-panel {
                    border-left: none;
                    border-top: 1px solid var(--border);
                    padding-left: 0;
                    padding-top: 18px;
                    margin-top: 18px;
                    height: auto;
                }

                .numbers {
                    grid-template-columns: repeat(5, 1fr);
                }

                .submit-nav-area {
                    margin-top: 0;
                }
            }

            @media (max-width: 768px) {
                .quiz-header {
                    flex-direction: column;
                    align-items: flex-start;
                }

                .timer-box {
                    width: 100%;
                }

                .quiz-title h1 {
                    font-size: 24px;
                }

                .question-text {
                    font-size: 17px;
                }

                .question-actions {
                    flex-direction: column;
                    align-items: stretch;
                }

                .left-actions,
                .right-actions {
                    width: 100%;
                    flex-direction: column;
                }

                .nav-btn {
                    width: 100%;
                }

                .options.options-grid {
                    grid-template-columns: 1fr;
                }
            }

            @media (max-width: 480px) {
                .numbers {
                    grid-template-columns: repeat(3, 1fr);
                }

                .option-content {
                    padding: 10px;
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

                <div class="quiz-header">
                    <div class="quiz-title">
                        <h1>{{ $quiz->title }}</h1>
                        <p>Kerjakan semua soal dengan teliti sebelum waktu habis.</p>
                    </div>

                    <div class="timer-box">
                        <span>Waktu</span>
                        <div id="timer">
                            {{ str_pad($quiz->duration_minutes, 2, '0', STR_PAD_LEFT) }}:00
                        </div>
                    </div>
                </div>

                @if (session('error'))
                    <div class="quiz-alert">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('quiz.submit', $quiz->id) }}" method="POST" id="quizForm">
                    @csrf

                    @if (isset($attempt))
                        <input type="hidden" name="attempt_id" value="{{ $attempt->id }}">
                    @endif

                    <div class="quiz-content">
                        <div class="question-area">
                            @forelse ($quiz->questions as $index => $question)
                                <div class="question-slide {{ $index === 0 ? 'active' : '' }}"
                                    data-index="{{ $index }}">
                                    <div class="question-meta">
                                        <span>Soal {{ $question->question_order }}</span>

                                        <div class="question-top-actions">
                                            <button type="button" class="doubt-btn-top"
                                                data-index="{{ $index }}">
                                                Ragu-ragu
                                            </button>

                                            <span>{{ $index + 1 }} / {{ $quiz->questions->count() }}</span>
                                        </div>
                                    </div>

                                    <div class="question-scroll">
                                        <p class="question-text">{!! $question->question_text !!}</p>

                                        @if ($question->question_image)
                                            <div class="question-image">
                                                <img src="{{ asset('img/kuis/' . $question->question_image) }}"
                                                    alt="Gambar soal">
                                            </div>
                                        @endif

                                        @php
                                            $isImageGrid =
                                                $question->options->count() === 4 &&
                                                $question->options->every(function ($option) {
                                                    return !empty($option->option_image);
                                                });
                                        @endphp

                                        <div class="options {{ $isImageGrid ? 'options-grid' : '' }}">
                                            @foreach ($question->options as $option)
                                                <label class="option-item">
                                                    <input type="radio" name="jawaban[{{ $question->id }}]"
                                                        value="{{ $option->id }}"
                                                        {{ (string) old('jawaban.' . $question->id) === (string) $option->id ? 'checked' : '' }}>

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

                                    <div class="question-actions">
                                        <div class="left-actions">
                                            <button type="button" class="nav-btn prev-btn">
                                                Sebelumnya
                                            </button>
                                        </div>

                                        <div class="right-actions">
                                            <button type="button" class="nav-btn primary next-btn">
                                                Berikutnya
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="empty-question">
                                    Belum ada soal untuk kuis ini.
                                </div>
                            @endforelse
                        </div>

                        <div class="navigator-panel">
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

                                <div class="legend-item">
                                    <span class="legend-dot doubt-dot"></span>
                                    <span>Ragu-ragu</span>
                                </div>
                            </div>

                            <div class="submit-nav-area">
                                <button type="submit" class="submit-btn">
                                    Kumpulkan Jawaban
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <!-- Pop-up kuis -->
        <div class="quiz-modal-overlay" id="quizModal" aria-hidden="true">
            <div class="quiz-modal" role="dialog" aria-modal="true"
                aria-labelledby="quizModalTitle" aria-describedby="quizModalMessage">
                <div class="quiz-modal-icon warning" id="quizModalIcon">!</div>
                <h2 id="quizModalTitle">Perhatian</h2>
                <p id="quizModalMessage"></p>

                <div class="quiz-modal-actions">
                    <button type="button" class="quiz-modal-btn secondary" id="quizModalCancel">
                        Kembali
                    </button>
                    <button type="button" class="quiz-modal-btn primary" id="quizModalConfirm">
                        Mengerti
                    </button>
                </div>
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
                const prevButtons = document.querySelectorAll('.prev-btn');
                const nextButtons = document.querySelectorAll('.next-btn');
                const doubtButtons = document.querySelectorAll('.doubt-btn-top');
                const quizForm = document.getElementById('quizForm');
                const timerElement = document.getElementById('timer');

                const quizModal = document.getElementById('quizModal');
                const quizModalIcon = document.getElementById('quizModalIcon');
                const quizModalTitle = document.getElementById('quizModalTitle');
                const quizModalMessage = document.getElementById('quizModalMessage');
                const quizModalCancel = document.getElementById('quizModalCancel');
                const quizModalConfirm = document.getElementById('quizModalConfirm');

                let currentIndex = 0;
                let totalSeconds = {{ $quiz->duration_minutes * 60 }};
                let isTimeUpSubmit = false;
                let submitConfirmed = false;
                let modalConfirmAction = null;
                const doubtIndexes = new Set();

                function openQuizModal({
                    type = 'warning',
                    icon = '!',
                    title = 'Perhatian',
                    message = '',
                    confirmText = 'Mengerti',
                    cancelText = 'Kembali',
                    showCancel = false,
                    onConfirm = null
                }) {
                    quizModalIcon.className = `quiz-modal-icon ${type}`;
                    quizModalIcon.textContent = icon;
                    quizModalTitle.textContent = title;
                    quizModalMessage.textContent = message;
                    quizModalConfirm.textContent = confirmText;
                    quizModalCancel.textContent = cancelText;
                    quizModalCancel.style.display = showCancel ? 'inline-block' : 'none';

                    modalConfirmAction = onConfirm;
                    quizModal.classList.add('show');
                    quizModal.setAttribute('aria-hidden', 'false');

                    setTimeout(() => quizModalConfirm.focus(), 50);
                }

                function closeQuizModal() {
                    quizModal.classList.remove('show');
                    quizModal.setAttribute('aria-hidden', 'true');
                    modalConfirmAction = null;
                }

                quizModalConfirm.addEventListener('click', function() {
                    const action = modalConfirmAction;
                    closeQuizModal();

                    if (typeof action === 'function') {
                        action();
                    }
                });

                quizModalCancel.addEventListener('click', closeQuizModal);

                document.addEventListener('keydown', function(event) {
                    if (event.key === 'Escape' &&
                        quizModal.classList.contains('show') &&
                        !isTimeUpSubmit) {
                        closeQuizModal();
                    }
                });

                function updateAnsweredStatus() {
                    slides.forEach((slide, index) => {
                        const checked = slide.querySelector('input[type="radio"]:checked');

                        if (!navButtons[index]) return;

                        navButtons[index].classList.remove('answered');

                        if (checked) {
                            navButtons[index].classList.add('answered');
                        }
                    });
                }

                function updateDoubtStatus() {
                    navButtons.forEach((button, index) => {
                        button.classList.toggle('doubt', doubtIndexes.has(index));
                    });

                    doubtButtons.forEach((button) => {
                        const index = parseInt(button.dataset.index);
                        const isDoubt = doubtIndexes.has(index);

                        button.classList.toggle('active', isDoubt);
                        button.textContent = isDoubt ? 'Batal Ragu-ragu' : 'Ragu-ragu';
                    });
                }

                function showSlide(index) {
                    slides.forEach(slide => slide.classList.remove('active'));
                    navButtons.forEach(btn => btn.classList.remove('active'));

                    if (slides[index]) {
                        slides[index].classList.add('active');
                        currentIndex = index;
                    }

                    if (navButtons[index]) {
                        navButtons[index].classList.add('active');
                    }

                    prevButtons.forEach(btn => {
                        btn.style.visibility = currentIndex === 0 ? 'hidden' : 'visible';
                    });

                    nextButtons.forEach(btn => {
                        btn.style.visibility = currentIndex === slides.length - 1 ? 'hidden' : 'visible';
                    });

                    updateAnsweredStatus();
                    updateDoubtStatus();
                }

                function getFirstUnansweredIndex() {
                    for (let i = 0; i < slides.length; i++) {
                        const checked = slides[i].querySelector('input[type="radio"]:checked');

                        if (!checked) {
                            return i;
                        }
                    }

                    return -1;
                }

                function getAnsweredCount() {
                    let count = 0;

                    slides.forEach(slide => {
                        const checked = slide.querySelector('input[type="radio"]:checked');

                        if (checked) {
                            count++;
                        }
                    });

                    return count;
                }

                function getFirstDoubtIndex() {
                    for (let i = 0; i < slides.length; i++) {
                        if (doubtIndexes.has(i)) {
                            return i;
                        }
                    }

                    return -1;
                }

                function getDoubtCount() {
                    return doubtIndexes.size;
                }

                prevButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        if (currentIndex > 0) {
                            showSlide(currentIndex - 1);
                        }
                    });
                });

                nextButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        if (currentIndex < slides.length - 1) {
                            showSlide(currentIndex + 1);
                        }
                    });
                });

                navButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const index = parseInt(this.dataset.index);
                        showSlide(index);
                    });
                });

                doubtButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const index = parseInt(this.dataset.index);

                        if (doubtIndexes.has(index)) {
                            doubtIndexes.delete(index);
                        } else {
                            doubtIndexes.add(index);
                        }

                        updateDoubtStatus();
                    });
                });

                document.querySelectorAll('input[type="radio"]').forEach(input => {
                    input.addEventListener('change', function() {
                        const slide = this.closest('.question-slide');
                        const index = parseInt(slide.dataset.index);

                        if (doubtIndexes.has(index)) {
                            doubtIndexes.delete(index);
                        }

                        updateAnsweredStatus();
                        updateDoubtStatus();
                    });
                });

                quizForm.addEventListener('submit', function(event) {
                    if (isTimeUpSubmit || submitConfirmed) {
                        return;
                    }

                    event.preventDefault();

                    const firstUnansweredIndex = getFirstUnansweredIndex();

                    if (firstUnansweredIndex !== -1) {
                        showSlide(firstUnansweredIndex);

                        openQuizModal({
                            type: 'danger',
                            icon: '!',
                            title: 'Jawaban Belum Lengkap',
                            message:
                                `Masih ada soal yang belum dijawab.
` +
                                `Terjawab ${getAnsweredCount()} dari ${slides.length} soal.
` +
                                `Silakan lengkapi jawaban terlebih dahulu.`,
                            confirmText: 'Lanjut Mengerjakan'
                        });

                        return;
                    }

                    const firstDoubtIndex = getFirstDoubtIndex();

                    if (firstDoubtIndex !== -1) {
                        showSlide(firstDoubtIndex);

                        openQuizModal({
                            type: 'warning',
                            icon: '?',
                            title: 'Masih Ada Jawaban Ragu-ragu',
                            message:
                                `Terdapat ${getDoubtCount()} soal yang masih ditandai ragu-ragu.
` +
                                `Periksa kembali atau batalkan tanda ragu-ragu sebelum mengumpulkan.`,
                            confirmText: 'Periksa Kembali'
                        });

                        return;
                    }

                    openQuizModal({
                        type: 'success',
                        icon: '✓',
                        title: 'Kumpulkan Jawaban?',
                        message:
                            `Semua ${slides.length} soal sudah dijawab.
` +
                            `Pastikan jawabanmu sudah benar karena jawaban tidak dapat diubah setelah dikumpulkan.`,
                        confirmText: 'Ya, Kumpulkan',
                        cancelText: 'Periksa Lagi',
                        showCancel: true,
                        onConfirm: function() {
                            submitConfirmed = true;
                            quizForm.requestSubmit();
                        }
                    });
                });

                function updateTimer() {
                    const minutes = String(Math.floor(totalSeconds / 60)).padStart(2, '0');
                    const seconds = String(totalSeconds % 60).padStart(2, '0');

                    timerElement.textContent = `${minutes}:${seconds}`;

                    if (totalSeconds <= 0) {
                        clearInterval(interval);
                        isTimeUpSubmit = true;

                        openQuizModal({
                            type: 'danger',
                            icon: '⏱',
                            title: 'Waktu Habis',
                            message: 'Waktu pengerjaan telah selesai. Jawaban akan dikumpulkan secara otomatis.',
                            confirmText: 'Kumpulkan Sekarang',
                            onConfirm: function() {
                                quizForm.submit();
                            }
                        });

                        setTimeout(function() {
                            if (isTimeUpSubmit) {
                                quizForm.submit();
                            }
                        }, 1800);

                        return;
                    }

                    totalSeconds--;
                }

                @if (session('error'))
                    openQuizModal({
                        type: 'danger',
                        icon: '!',
                        title: 'Perhatian',
                        message: @json(session('error')),
                        confirmText: 'Mengerti'
                    });
                @endif

                if (slides.length > 0) {
                    showSlide(0);
                    updateAnsweredStatus();
                    updateDoubtStatus();
                    updateTimer();

                    var interval = setInterval(updateTimer, 1000);
                }
            });
        </script>
    </body>

    </html>
