<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;

class QuizSiswaController extends Controller
{
    public function show($id)
    {
        $quiz = Quiz::with(['bab', 'questions.options'])
            ->where('is_active', 1)
            ->findOrFail($id);

        return view('siswa.quiz', compact('quiz'));
    }

    public function evaluasi()
    {
        $quiz = Quiz::with(['bab', 'questions.options'])->findOrFail(5);
        return view('siswa.kuis.evaluasi', compact('quiz'));
    }

    public function submit(Request $request, $id)
    {
        $quiz = Quiz::with(['bab', 'questions.options'])->findOrFail($id);

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

        QuizAttempt::create([
            'quiz_id' => $quiz->id,
            'student_id' => Auth::guard('siswa')->id(),
            'started_at' => now(),
            'end_at' => now(),
            'submitted_at' => now(),
            'status' => 'submitted',
            'total_questions' => $totalSoal,
            'correct_answers' => $benar,
            'wrong_answers' => $salah,
            'unanswered' => $kosong,
            'score' => $nilai,
        ]);

        $lulus = $nilai >= $quiz->kkm;

        return view('siswa.quiz-hasil', compact(
            'quiz',
            'nilai',
            'benar',
            'salah',
            'kosong',
            'lulus'
        ));
    }
}