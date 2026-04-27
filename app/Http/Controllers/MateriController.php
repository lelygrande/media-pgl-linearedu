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
        $materi = Materi::with(['bab.quizzes'])
            ->where('slug', $slug)
            ->firstOrFail();

        $studentId = Auth::guard('siswa')->id();

        $completedMateriIds = MaterialProgress::where('student_id', $studentId)
            ->where('is_completed', true)
            ->pluck('materi_id')
            ->toArray();

        $passedQuizIds = QuizAttempt::where('student_id', $studentId)
            ->where('is_passed', true)
            ->pluck('quiz_id')
            ->toArray();

        $allMateri = Materi::with('bab.quizzes')
            ->orderBy('bab_id')
            ->orderBy('urutan')
            ->get();

        $unlockedSlugs = [];

        foreach ($allMateri as $index => $item) {
            if ($index === 0) {
                $unlockedSlugs[] = $item->slug;
                continue;
            }

            $previousItem = $allMateri[$index - 1];

            // Kalau masih dalam bab yang sama, syaratnya materi sebelumnya selesai
            if ($previousItem->bab_id === $item->bab_id) {
                if (in_array($previousItem->id, $completedMateriIds)) {
                    $unlockedSlugs[] = $item->slug;
                }
                continue;
            }

            // Kalau masuk bab baru, syaratnya kuis bab sebelumnya lulus
            $quizSebelumnya = optional($previousItem->bab)->quizzes->first();

            if ($quizSebelumnya && in_array($quizSebelumnya->id, $passedQuizIds)) {
                $unlockedSlugs[] = $item->slug;
            }
        }

        // Akses Kuis
        $canAccessQuizA = MaterialProgress::where('student_id', $studentId)
            ->whereHas('materi', function ($q) {
                $q->where('slug', 'subbab-a2-2');
            })
            ->where('is_completed', true)
            ->exists();

        $canAccessQuizB = MaterialProgress::where('student_id', $studentId)
            ->whereHas('materi', function ($q) {
                $q->where('slug', 'subbab-b-gradien-persamaan1');
            })
            ->where('is_completed', true)
            ->exists();

        $canAccessQuizC = MaterialProgress::where('student_id', $studentId)
            ->whereHas('materi', function ($q) {
                $q->where('slug', 'subbab-c-dua-garis-tegak-lurus');
            })
            ->where('is_completed', true)
            ->exists();

        $canAccessQuizD = MaterialProgress::where('student_id', $studentId)
            ->whereHas('materi', function ($q) {
                $q->where('slug', 'subbab-d-pgl-tegak-lurus');
            })
            ->where('is_completed', true)
            ->exists();

        // // blok akses URL langsung kalau materi masih terkunci
        // if (!in_array($materi->slug, $unlockedSlugs)) {
        //     return redirect()->back()->with('error', 'Materi masih terkunci.');
        // }

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

        $previousMateri = Materi::where('bab_id', $materi->bab_id)
            ->where('urutan', '<', $materi->urutan)
            ->orderBy('urutan', 'desc')
            ->first();

        $nextMateri = Materi::where('bab_id', $materi->bab_id)
            ->where('urutan', '>', $materi->urutan)
            ->orderBy('urutan', 'asc')
            ->first();

        $quizBab = $materi->bab->quizzes->first();

        $materialProgress = MaterialProgress::where('student_id', $studentId)
            ->where('materi_id', $materi->id)
            ->first();

        return view($materi->view_path, compact(
            'materi',
            'previousMateri',
            'nextMateri',
            'quizBab',
            'materialProgress',
            'unlockedSlugs',
            'passedQuizIds',
            'canAccessQuizA'
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

        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Latihan materi selesai.',
            ]);
        }

        return back()->with('success', 'Latihan materi selesai.');
    }
}

// public function progress()
//     {
//         $studentId = Auth::guard('siswa')->id();

//         $babs = Bab::with(['materis', 'quizzes'])->orderBy('urutan')->get();
//         $progresses = MaterialProgress::where('student_id', $studentId)
//             ->get()
//             ->keyBy('materi_id');

//         $quizAttempts = QuizAttempt::where('student_id', $studentId)
//             ->where('status', 'submitted')
//             ->get()
//             ->groupBy('quiz_id');

//         return view('siswa.progres_belajar', compact('babs', 'progresses', 'quizAttempts'));
//     }