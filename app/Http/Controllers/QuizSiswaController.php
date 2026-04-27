<?php

namespace App\Http\Controllers;

use App\Models\Bab;
use App\Models\Materi;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizSiswaController extends Controller
{
    public function show($id)
    {
        $quiz = Quiz::with(['bab', 'questions.options'])
            ->where('is_active', 1)
            ->findOrFail($id);

        $studentId = Auth::guard('siswa')->id();

        // cari attempt yang masih berjalan
        $attempt = QuizAttempt::where('quiz_id', $quiz->id)
            ->where('student_id', $studentId)
            ->where('status', 'in_progress')
            ->latest('id')
            ->first();

        // kalau belum ada attempt aktif, buat baru
        if (!$attempt) {
            $attempt = QuizAttempt::create([
                'quiz_id' => $quiz->id,
                'student_id' => $studentId,
                'started_at' => now(),
                'status' => 'in_progress',
                'total_questions' => $quiz->questions->count(),
            ]);
        } else {
            // kalau ada attempt aktif tapi waktunya sudah habis saat halaman dibuka lagi
            $durasiDetik = $attempt->started_at->diffInSeconds(now());

            if ($durasiDetik >= ($quiz->duration_minutes * 60)) {
                $attempt->update([
                    'end_at' => now(),
                    'submitted_at' => now(),
                    'status' => 'expired',
                ]);

                // buat attempt baru agar siswa bisa mengulang kuis
                $attempt = QuizAttempt::create([
                    'quiz_id' => $quiz->id,
                    'student_id' => $studentId,
                    'started_at' => now(),
                    'status' => 'in_progress',
                    'total_questions' => $quiz->questions->count(),
                ]);
            }
        }

        return view('siswa.quiz', compact('quiz', 'attempt'));
    }

    public function evaluasi()
    {
        $quiz = Quiz::with(['bab', 'questions.options'])->findOrFail(5);
        return view('siswa.kuis.evaluasi', compact('quiz'));
    }

    public function submit(Request $request, $id)
    {
        $quiz = Quiz::with(['bab', 'questions.options'])->findOrFail($id);
        $studentId = Auth::guard('siswa')->id();

        $attempt = QuizAttempt::where('id', $request->attempt_id)
            ->where('quiz_id', $quiz->id)
            ->where('student_id', $studentId)
            ->where('status', 'in_progress')
            ->first();

        if (!$attempt) {
            return redirect()->route('quiz.show', $quiz->id)
                ->with('error', 'Attempt kuis tidak ditemukan atau sudah berakhir.');
        }

        // cek apakah waktu sudah habis
        $durasiDetikSekarang = $attempt->started_at->diffInSeconds(now());

        if ($durasiDetikSekarang >= ($quiz->duration_minutes * 60)) {
            $attempt->update([
                'end_at' => now(),
                'submitted_at' => now(),
                'status' => 'expired',
            ]);

            return redirect()->route('quiz.show', $quiz->id)
                ->with('error', 'Waktu kuis sudah habis. Silakan ulangi kuis.');
        }

        $jawabanSiswa = $request->input('jawaban', []);
        $totalSoal = $quiz->questions->count();
        $benar = 0;
        $terjawab = 0;

        foreach ($quiz->questions as $question) {
            $opsiBenar = $question->options->firstWhere('is_correct', 1);

            if (isset($jawabanSiswa[$question->id])) {
                $terjawab++;
            }

            if ($opsiBenar && isset($jawabanSiswa[$question->id])) {
                if ((int) $jawabanSiswa[$question->id] === (int) $opsiBenar->id) {
                    $benar++;
                }
            }
        }

        $salah = $terjawab - $benar;
        $kosong = $totalSoal - $terjawab;
        $nilai = $totalSoal > 0 ? round(($benar / $totalSoal) * 100, 2) : 0;
        $lulus = $nilai >= $quiz->kkm;

        $attempt->update([
            'end_at' => now(),
            'submitted_at' => now(),
            'status' => 'submitted',
            'total_questions' => $totalSoal,
            'correct_answers' => $benar,
            'wrong_answers' => $salah,
            'unanswered' => $kosong,
            'score' => $nilai,
            'is_passed' => $lulus ? 1 : 0,
            'passed_at' => $lulus ? now() : null,
        ]);

        $attempt->refresh();

        $durasiDetik = $attempt->started_at->diffInSeconds($attempt->end_at);
        $durasiMenit = floor($durasiDetik / 60);
        $durasiSisaDetik = $durasiDetik % 60;

        // materi terakhir di bab sekarang
        $previousMateri = Materi::where('bab_id', $quiz->bab_id)
            ->orderBy('urutan', 'desc')
            ->first();

        // bab berikutnya
        $babBerikutnya = Bab::where('urutan', '>', $quiz->bab->urutan)
            ->orderBy('urutan', 'asc')
            ->first();

        $nextMateri = null;

        if ($babBerikutnya) {
            $nextMateri = Materi::where('bab_id', $babBerikutnya->id)
                ->orderBy('urutan', 'asc')
                ->first();
        }

        return view('siswa.quiz-hasil', compact(
            'quiz',
            'nilai',
            'benar',
            'salah',
            'kosong',
            'lulus',
            'previousMateri',
            'nextMateri',
            'durasiDetik',
            'durasiMenit',
            'durasiSisaDetik'
        ));
    }
}