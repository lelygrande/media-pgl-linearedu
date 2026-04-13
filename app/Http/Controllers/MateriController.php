<?php

namespace App\Http\Controllers;

use App\Models\Bab;
use App\Models\Materi;
use App\Models\MaterialProgress;
use App\Models\QuizAttempt;
use Illuminate\Support\Facades\Auth;

class MateriController extends Controller
{
    public function show($slug)
    {
        // 1. Ambil materi berdasarkan slug
        $materi = Materi::with(['bab.quizzes'])
            ->where('slug', $slug)
            ->firstOrFail();

        // 2. Ambil ID siswa
        $studentId = Auth::guard('siswa')->id();

        // 3. Tandai materi sudah dibuka
        MaterialProgress::updateOrCreate(
            [
                'student_id' => $studentId,
                'materi_id' => $materi->id,
            ],
            [
                'is_opened' => true,
                'opened_at' => now(),
            ]
        );

        // 4. Cari materi sebelumnya
        $previousMateri = Materi::where('bab_id', $materi->bab_id)
            ->where('urutan', '<', $materi->urutan)
            ->orderBy('urutan', 'desc')
            ->first();

        // 5. Cari materi berikutnya
        $nextMateri = Materi::where('bab_id', $materi->bab_id)
            ->where('urutan', '>', $materi->urutan)
            ->orderBy('urutan', 'asc')
            ->first();

        // 6. Ambil kuis dari bab ini
        $quizBab = $materi->bab->quizzes->first();

        // 7. Kirim ke view
        return view($materi->view_path, compact(
            'materi',
            'previousMateri',
            'nextMateri',
            'quizBab'
        ));
    }

    public function complete($id)
    {
        $materi = Materi::findOrFail($id);
        $studentId = Auth::guard('siswa')->id();

        MaterialProgress::updateOrCreate(
            [
                'student_id' => $studentId,
                'materi_id' => $materi->id,
            ],
            [
                'is_opened' => true,
                'is_completed' => true,
                'completed_at' => now(),
            ]
        );

        return back()->with('success', 'Latihan materi selesai.');
    }

    public function progress()
    {
        $studentId = Auth::guard('siswa')->id();

        $babs = Bab::with(['materis', 'quizzes'])->orderBy('urutan')->get();
        $progresses = MaterialProgress::where('student_id', $studentId)
            ->get()
            ->keyBy('materi_id');

        $quizAttempts = QuizAttempt::where('student_id', $studentId)
            ->where('status', 'submitted')
            ->get()
            ->groupBy('quiz_id');

        return view('siswa.progres_belajar', compact('babs', 'progresses', 'quizAttempts'));
    }
}
