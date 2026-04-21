<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Kuis</title>
    <link rel="stylesheet" href="{{ asset('css/quiz-hasil.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="result-page">
        <div class="result-card">
            <div class="result-header">
                <h1>Hasil Kuis</h1>
                <p>{{ $quiz->title }}</p>
            </div>

            <div class="status-box {{ $lulus ? 'lulus' : 'tidak-lulus' }}">
                <h2>
                    {{ $lulus ? 'Selamat, Kamu Lulus!' : 'Tetap Semangat, Kamu Belum Lulus' }}
                </h2>
                <p>
                    Nilai kamu <strong>{{ $nilai }}</strong>
                    dengan KKM <strong>{{ $quiz->kkm }}</strong>
                </p>
            </div>

            <div class="score-section">
                <div class="score-circle">
                    <span>{{ $nilai }}</span>
                    <small>Nilai</small>
                </div>
            </div>

            <div class="duration-box">
                <h4>Waktu Pengerjaan</h4>
                <p>{{ $durasiMenit }} menit {{ $durasiSisaDetik }} detik</p>
            </div>

            <div class="stats-grid">
                <div class="stat-item">
                    <h3>{{ $benar }}</h3>
                    <p>Jawaban Benar</p>
                </div>

                <div class="stat-item">
                    <h3>{{ $salah }}</h3>
                    <p>Jawaban Salah</p>
                </div>

                <div class="stat-item">
                    <h3>{{ $kosong }}</h3>
                    <p>Tidak Dijawab</p>
                </div>

                <div class="stat-item">
                    <h3>{{ $quiz->questions->count() }}</h3>
                    <p>Total Soal</p>
                </div>
            </div>

            <div class="result-actions">
                @if ($lulus)
                    @if ($quiz->id == 4)
                        <a href="{{ route('materi.show', $previousMateri->slug) }}" class="btn btn-secondary">
                            Kembali ke Halaman Materi
                        </a>

                        <a href="{{ route('quiz.show', 5) }}" class="btn btn-primary">
                            Kerjakan Evaluasi
                        </a>
                    @elseif ($quiz->id == 5)
                        <a href="{{ route('peta-konsep') }}" class="btn btn-primary">
                            Kembali ke Peta Konsep
                        </a>
                    @elseif ($nextMateri)
                        <a href="{{ route('materi.show', $nextMateri->slug) }}" class="btn btn-primary">
                            Lanjut ke Materi Berikutnya
                        </a>
                    @endif
                @else
                    @if ($quiz->id == 5)
                        <a href="{{ route('peta-konsep') }}" class="btn btn-secondary">
                            Kembali ke Peta Konsep
                        </a>
                    @elseif ($previousMateri)
                        <a href="{{ route('materi.show', $previousMateri->slug) }}" class="btn btn-secondary">
                            Kembali ke Materi Sebelumnya
                        </a>
                    @endif

                    <a href="{{ route('quiz.show', $quiz->id) }}" class="btn btn-danger">
                        Ulangi Kuis
                    </a>
                @endif
            </div>
        </div>
    </div>
    </div>
</body>

</html>
