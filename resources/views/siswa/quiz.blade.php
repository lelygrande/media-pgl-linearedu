@extends('layout.halaman-materi')

@section('content')
<link rel="stylesheet" href="{{ asset('css/kuis.css') }}">

<div class="quiz-container">
    <div class="quiz-header">
        <div>
            <h2>{{ $quiz->title }}</h2>
            <p>Jawablah semua pertanyaan dengan teliti sebelum waktu habis.</p>
        </div>

        <div class="timer" id="timer">
            {{ str_pad($quiz->duration_minutes, 2, '0', STR_PAD_LEFT) }}:00
        </div>
    </div>

    <form action="{{ route('quiz.submit', $quiz->id) }}" method="POST" id="quizForm">
        @csrf

        <div class="quiz-body">
            <div class="question-box">
                @forelse ($quiz->questions as $index => $question)
                    <div class="question-slide {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}">
                        <div class="question-number">
                            Soal {{ $question->question_order }}
                        </div>

                        <div class="question-text">
                            {{ $question->question_text }}
                        </div>

                        <div class="options">
                            @foreach ($question->options as $option)
                                <label class="option">
                                    <input
                                        type="radio"
                                        name="jawaban[{{ $question->id }}]"
                                        value="{{ $option->id }}"
                                    >
                                    <span class="circle">{{ $option->option_label }}</span>
                                    <span>{{ $option->option_text }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <p>Belum ada soal.</p>
                @endforelse

                @if ($quiz->questions->count())
                    <div class="question-navigation mt-4 d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-outline-primary" id="prevBtn">
                            &lt;
                        </button>

                        <button type="button" class="btn btn-outline-primary" id="nextBtn">
                            &gt;
                        </button>
                    </div>

                    <div class="submit-section mt-3 text-end" id="submitSection" style="display: none;">
                        <button type="submit" class="btn btn-primary">
                            Kumpulkan Jawaban
                        </button>
                    </div>
                @endif
            </div>

            <div class="navigator">
                <h4>Nomor Soal</h4>
                <div class="numbers">
                    @foreach ($quiz->questions as $index => $item)
                        <button
                            type="button"
                            class="num {{ $index === 0 ? 'active' : '' }}"
                            data-index="{{ $index }}"
                        >
                            {{ $item->question_order }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </form>
</div>

<style>
    .question-slide {
        display: none;
    }

    .question-slide.active {
        display: block;
    }

    .num.active {
        background-color: #0d6efd;
        color: #fff;
        border-color: #0d6efd;
    }

    .num.answered {
        background-color: #198754;
        color: #fff;
        border-color: #198754;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const slides = document.querySelectorAll('.question-slide');
        const navButtons = document.querySelectorAll('.num');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitSection = document.getElementById('submitSection');

        let currentIndex = 0;

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
            nextBtn.style.visibility = currentIndex === slides.length - 1 ? 'hidden' : 'visible';
            submitSection.style.display = currentIndex === slides.length - 1 ? 'block' : 'none';

            updateAnsweredStatus();
        }

        prevBtn.addEventListener('click', function () {
            if (currentIndex > 0) {
                showSlide(currentIndex - 1);
            }
        });

        nextBtn.addEventListener('click', function () {
            if (currentIndex < slides.length - 1) {
                showSlide(currentIndex + 1);
            }
        });

        navButtons.forEach(button => {
            button.addEventListener('click', function () {
                const index = parseInt(this.dataset.index);
                showSlide(index);
            });
        });

        document.querySelectorAll('input[type="radio"]').forEach(input => {
            input.addEventListener('change', function () {
                updateAnsweredStatus();
            });
        });

        showSlide(0);
    });
</script>
@endsection
