<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizAttemptSeeder extends Seeder
{
    public function run(): void
    {
        /*
         * Nilai dibuat tetap agar hasil rekap tidak semuanya gagal.
         *
         * Format:
         * student_id => [
         *     quiz_id => score
         * ]
         */
        $nilaiPerSiswa = [
            // Rata-rata 81 → Tuntas
            34 => [
                1 => 80,
                2 => 80,
                3 => 90,
                4 => 70,
                5 => 85,
            ],

            // Rata-rata 70 → Tuntas
            35 => [
                1 => 70,
                2 => 70,
                3 => 70,
                4 => 70,
                5 => 70,
            ],

            // Rata-rata 87 → Tuntas
            36 => [
                1 => 90,
                2 => 80,
                3 => 80,
                4 => 90,
                5 => 95,
            ],

            // Rata-rata 65 → Perlu Perbaikan
            37 => [
                1 => 60,
                2 => 70,
                3 => 60,
                4 => 70,
                5 => 65,
            ],

            // Rata-rata 55 → Belum Tuntas
            38 => [
                1 => 50,
                2 => 60,
                3 => 60,
                4 => 50,
                5 => 55,
            ],

            // Rata-rata 75 → Tuntas
            39 => [
                1 => 70,
                2 => 80,
                3 => 70,
                4 => 80,
                5 => 75,
            ],
        ];

        /*
         * Hapus nilai lama siswa 34–39 agar percobaan lama yang rendah
         * tidak dianggap sebagai percobaan pertama.
         *
         * Gunakan ini hanya untuk data development/testing.
         */
        DB::table('quiz_attempts')
            ->whereBetween('student_id', [34, 39])
            ->delete();

        foreach ($nilaiPerSiswa as $studentId => $nilaiKuis) {
            $siswaAda = DB::table('siswa')
                ->where('id', $studentId)
                ->exists();

            if (!$siswaAda) {
                continue;
            }

            foreach ($nilaiKuis as $quizId => $score) {
                $kuisAda = DB::table('quizzes')
                    ->where('id', $quizId)
                    ->exists();

                if (!$kuisAda) {
                    continue;
                }

                // Kuis 1–4 berisi 10 soal, kuis 5 berisi 20 soal
                $totalQuestions = $quizId === 5 ? 20 : 10;

                $correctAnswers = (int) round(
                    ($score / 100) * $totalQuestions
                );

                $wrongAnswers = $totalQuestions - $correctAnswers;
                $submittedAt = now();
                $startedAt = now()->subMinutes(
                    random_int(5, 20)
                );

                DB::table('quiz_attempts')->insert([
                    'quiz_id'          => $quizId,
                    'student_id'       => $studentId,
                    'started_at'       => $startedAt,
                    'end_at'           => $submittedAt,
                    'submitted_at'     => $submittedAt,
                    'status'           => 'submitted',
                    'total_questions'  => $totalQuestions,
                    'correct_answers'  => $correctAnswers,
                    'wrong_answers'    => $wrongAnswers,
                    'unanswered'       => 0,
                    'score'            => $score,
                    'is_passed'        => $score >= 70,
                    'passed_at'        => $score >= 70
                        ? $submittedAt
                        : null,
                    'created_at'       => now(),
                    'updated_at'       => now(),
                ]);
            }
        }

        $this->command?->info(
            'Nilai siswa ID 34–39 berhasil dibuat.'
        );
    }
}
