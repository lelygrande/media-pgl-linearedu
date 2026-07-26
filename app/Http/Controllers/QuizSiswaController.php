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
    private const MAX_ATTEMPTS = 3;
    public function show(Request $request, $id)
    {
        $quiz = Quiz::with(['bab', 'questions.options'])
            ->where('is_active', 1)
            ->findOrFail($id);

        $studentId = Auth::guard('siswa')->id();

        // Cari attempt yang masih berjalan
       $attemptAktif = QuizAttempt::where('quiz_id', $quiz->id)
            ->where('student_id', $studentId)
            ->where('status', 'in_progress')
            ->where('is_reset', 0)
            ->latest('id')
            ->first();

        // Kalau ada attempt aktif, cek waktunya
        if ($attemptAktif) {
            $durasiDetik = $attemptAktif->started_at->diffInSeconds(now());

                if ($durasiDetik >= ($quiz->duration_minutes * 60)) {
                    $attemptAktif->update([
                        'end_at' => now(),
                        'submitted_at' => now(),
                        'status' => 'expired',
                    ]);

                    $attemptAktif = null;
                }
            }
            // Pengecekan Percobaan
            $maksimalPercobaan = self::MAX_ATTEMPTS;

            $jumlahPercobaan = QuizAttempt::where('quiz_id', $quiz->id)
                ->where('student_id', $studentId)
                ->where('is_reset', 0)
                ->whereIn('status', [
                    'in_progress',
                    'submitted',
                    'expired',
                ])
                ->count();

            $sisaPercobaan = max(
                0,
                $maksimalPercobaan - $jumlahPercobaan
            );

            // Riwayat attempt selesai / expired
            $attempts = QuizAttempt::where('quiz_id', $quiz->id)
                ->where('student_id', $studentId)
                ->where('is_reset', 0)
                ->whereIn('status', ['submitted', 'expired'])
                ->latest('id')
                ->get();

            // Kalau klik "Mulai Kuis" dari halaman petunjuk
            if ($request->query('start') == 1) {
        if ($attemptAktif) {
            return view('siswa.quiz', [
                'quiz' => $quiz,
                'attempt' => $attemptAktif,
            ]);
        }

        if ($jumlahPercobaan >= $maksimalPercobaan) {
            return redirect()
                ->route('quiz.show', $quiz->id)
                ->with(
                    'error',
                    'Batas maksimal 3 kali percobaan telah tercapai. Silakan hubungi guru untuk membuka kembali kuis.'
                );
        }

        $attempt = QuizAttempt::create([
            'quiz_id' => $quiz->id,
            'student_id' => $studentId,
            'started_at' => now(),
            'status' => 'in_progress',
            'total_questions' => $quiz->questions->count(),
        ]);

        return view('siswa.quiz', compact('quiz', 'attempt'));
    }

        // Kalau klik "Ulangi Kuis", tampilkan petunjuk dulu
        if ($request->query('ulang') == 1) {
            if ($jumlahPercobaan >= $maksimalPercobaan) {
                return redirect()
                    ->route('quiz.show', $quiz->id)
                    ->with(
                        'error',
                        'Batas maksimal 3 kali percobaan telah tercapai. Silakan hubungi guru untuk membuka kembali kuis.'
                    );
            }

            $isUlang = true;

            $previousMateri = Materi::where('bab_id', $quiz->bab_id)
                ->orderBy('urutan', 'desc')
                ->first();

            return view('siswa.quiz-petunjuk', compact(
                'quiz',
                'isUlang',
                'previousMateri',
                'jumlahPercobaan',
                'sisaPercobaan',
                'maksimalPercobaan'
            ));
        }

        // Kalau masih ada attempt aktif, tampilkan kuis yang sedang berjalan
        if ($attemptAktif) {
            return view('siswa.quiz', [
                'quiz' => $quiz,
                'attempt' => $attemptAktif,
            ]);
        }

        // Kalau sudah pernah mengerjakan, tampilkan riwayat
        if ($attempts->count() > 0) {
            $previousMateri = Materi::where('bab_id', $quiz->bab_id)
                ->orderBy('urutan', 'desc')
                ->first();

            return view('siswa.quiz-riwayat', compact(
                'quiz',
                'attempts',
                'previousMateri',
                'jumlahPercobaan',
                'sisaPercobaan',
                'maksimalPercobaan'
            ));
        }

        // Kalau belum pernah mengerjakan, tampilkan petunjuk awal
        $isUlang = false;

        $previousMateri = Materi::where('bab_id', $quiz->bab_id)
            ->orderBy('urutan', 'desc')
            ->first();

        return view('siswa.quiz-petunjuk', compact('quiz', 'isUlang', 'previousMateri'));
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
            ->where('is_reset', 0)
            ->first();

        if (!$attempt) {
            return redirect()->route('quiz.show', $quiz->id)
                ->with('error', 'Attempt kuis tidak ditemukan atau sudah berakhir.');
        }

        // Cek apakah waktu sudah habis
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

        // =====================================================
        // VALIDASI: SEMUA SOAL WAJIB DIJAWAB
        // =====================================================
        $jumlahTerjawab = 0;

        foreach ($quiz->questions as $question) {
            if (
                isset($jawabanSiswa[$question->id]) &&
                $jawabanSiswa[$question->id] !== null &&
                $jawabanSiswa[$question->id] !== ''
            ) {
                $jumlahTerjawab++;
            }
        }

        if ($jumlahTerjawab < $totalSoal) {
            return redirect()->route('quiz.show', $quiz->id)
                ->with('error', 'Cek kembali jawaban kamu. Masih ada soal yang belum terjawab')
                ->withInput();
        }

        // =====================================================
        // HITUNG NILAI
        // =====================================================
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
        $nilaiMentah = $totalSoal > 0 ? round(($benar / $totalSoal) * 100, 2) : 0;

        // Cek apakah ini percobaan ulang
        $jumlahPercobaanSebelumnya = QuizAttempt::where('quiz_id', $quiz->id)
            ->where('student_id', $studentId)
            ->where('id', '!=', $attempt->id)
            ->where('is_reset', 0)
            ->whereIn('status', ['submitted', 'expired'])
            ->count();

        $isPercobaanUlang = $jumlahPercobaanSebelumnya > 0;

        /*
        * Nilai asli untuk ditampilkan pada halaman hasil.
        * Contoh: benar 10 dari 10 menghasilkan nilai 100.
        */
        $nilaiTampilan = $nilaiMentah;

        /*
        * Nilai yang disimpan ke database.
        * Pada percobaan ulang, nilai maksimal yang masuk
        * ke riwayat dan rekap guru adalah sebesar KKM.
        */
        if ($isPercobaanUlang && $nilaiMentah >= $quiz->kkm) {
            $nilaiTersimpan = $quiz->kkm;
        } else {
            $nilaiTersimpan = $nilaiMentah;
        }

        $lulus = $nilaiMentah >= $quiz->kkm;

        $attempt->update([
            'end_at' => now(),
            'submitted_at' => now(),
            'status' => 'submitted',
            'total_questions' => $totalSoal,
            'correct_answers' => $benar,
            'wrong_answers' => $salah,
            'score' => $nilaiTersimpan,
            'is_passed' => $lulus ? 1 : 0,
            'passed_at' => $lulus ? now() : null,
        ]);

        $attempt->refresh();

        $durasiDetik = $attempt->started_at->diffInSeconds($attempt->end_at);
        $durasiMenit = floor($durasiDetik / 60);
        $durasiSisaDetik = $durasiDetik % 60;

        // Materi terakhir di bab sekarang
        $previousMateri = Materi::where('bab_id', $quiz->bab_id)
            ->orderBy('urutan', 'desc')
            ->first();

        // Bab berikutnya
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
            'nilaiTampilan',
            'nilaiTersimpan',
            'benar',
            'salah',
            'lulus',
            'previousMateri',
            'nextMateri',
            'durasiDetik',
            'durasiMenit',
            'durasiSisaDetik'
        ));
    }
}