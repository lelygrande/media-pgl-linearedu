<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $quiz->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/kuis-siswa.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
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
                                    <p class="mb-2">{{ $question->question_text }}</p>

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
                                                    <span class="option-text">{{ $option->option_text }}</span>
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
