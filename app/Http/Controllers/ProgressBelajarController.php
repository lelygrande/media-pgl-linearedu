<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\MaterialProgress;
use App\Models\QuizAttempt;
use Illuminate\Support\Facades\Auth;

class ProgressBelajarController extends Controller
{
    public function index()
    {
        $siswa = Auth::guard('siswa')->user();

        if (!$siswa) {
            return redirect()->route('login');
        }

        $studentId = $siswa->id;

        $lastOpenedProgress = MaterialProgress::with('materi')
        ->where('student_id', $studentId)
        ->where('is_opened', true)
        ->whereHas('materi')
        ->latest('opened_at')
        ->first();

        $backToMateriUrl = $lastOpenedProgress && $lastOpenedProgress->materi
        ? route('materi.show', $lastOpenedProgress->materi->slug) : route('peta-konsep');

        $materiGroups = [
            [
                'bab' => 'Bentuk Umum Persamaan Garis Lurus',
                'items' => [
                    ['title' => 'Pengertian dan Bentuk Umum', 'slug' => 'subbab-a1'],
                    ['title' => 'Menggambar Grafik Persamaan Garis Lurus 1', 'slug' => 'subbab-a2-1'],
                    ['title' => 'Menggambar Grafik Persamaan Garis Lurus 2', 'slug' => 'subbab-a2-2'],
                ],
                'quiz' => ['title' => 'Kuis A', 'quiz_id' => 1],
            ],
            [
                'bab' => 'Gradien atau Kemiringan Garis',
                'items' => [
                    ['title' => 'Pengertian Gradien', 'slug' => 'subbab-b-gradien'],
                    ['title' => 'Gradien garis melalui (0,0) dan (x1,y1)', 'slug' => 'subbab-b-gradien-satu-titik'],
                    ['title' => 'Gradien garis melalui dua titik', 'slug' => 'subbab-b-gradien-dua-titik'],
                    ['title' => 'Gradien garis dari suatu Persamaan Garis Lurus', 'slug' => 'subbab-b-gradien-persamaan1'],
                ],
                'quiz' => ['title' => 'Kuis B', 'quiz_id' => 2],
            ],
            [
                'bab' => 'Hubungan Gradien Garis',
                'items' => [
                    ['title' => 'Gradien garis sejajar sumbu x dan sumbu y', 'slug' => 'subbab-c-garis-sejajar-sumbuxy'],
                    ['title' => 'Gradien garis-garis yang saling sejajar', 'slug' => 'subbab-c-dua-garis-sejajar'],
                    ['title' => 'Gradien dua garis saling tegak lurus', 'slug' => 'subbab-c-dua-garis-tegak-lurus'],
                ],
                'quiz' => ['title' => 'Kuis C', 'quiz_id' => 3],
            ],
            [
                'bab' => 'Menentukan Persamaan Garis Lurus',
                'items' => [
                    ['title' => 'Persamaan Garis Melalui Satu Titik dan Gradien', 'slug' => 'subbab-d-pgl1'],
                    ['title' => 'Persamaan Garis yang Melalui Dua Titik', 'slug' => 'subbab-d-pgl2'],
                    ['title' => 'Persamaan Garis yang Melalui Satu Titik dan Sejajar dengan Garis Lain', 'slug' => 'subbab-d-pgl-sejajar'],
                    ['title' => 'Persamaan Garis yang Melalui Satu Titik dan Tegak Lurus dengan Garis Lain', 'slug' => 'subbab-d-pgl-tegak-lurus'],
                ],
                'quiz' => ['title' => 'Kuis D', 'quiz_id' => 4],
            ],
        ];

        $allSlugs = collect($materiGroups)
            ->flatMap(fn ($group) => collect($group['items'])->pluck('slug'))
            ->values();

        $materiBySlug = Materi::whereIn('slug', $allSlugs)
            ->get()
            ->keyBy('slug');

        $progressBySlug = MaterialProgress::with('materi')
            ->where('student_id', $studentId)
            ->whereHas('materi', function ($query) use ($allSlugs) {
                $query->whereIn('slug', $allSlugs);
            })
            ->get()
            ->keyBy(fn ($progress) => $progress->materi?->slug);

        $latestQuizAttempts = QuizAttempt::where('student_id', $studentId)
            ->whereIn('quiz_id', [1, 2, 3, 4, 5])
            ->orderByDesc('submitted_at')
            ->get()
            ->groupBy('quiz_id')
            ->map(fn ($attempts) => $attempts->first());

        $completedMateriCount = $progressBySlug
            ->filter(fn ($progress) => $progress->is_completed)
            ->count();

        $passedQuizCount = $latestQuizAttempts
            ->filter(fn ($attempt) => $attempt && $attempt->is_passed)
            ->count();

        $totalItems = $allSlugs->count() + 5;
        $completedItems = $completedMateriCount + $passedQuizCount;

        $progressPercent = $totalItems > 0
            ? round(($completedItems / $totalItems) * 100)
            : 0;

        return view('siswa.progres_belajar', compact(
            'siswa',
            'materiGroups',
            'materiBySlug',
            'progressBySlug',
            'latestQuizAttempts',
            'progressPercent',
            'completedItems',
            'totalItems',
            'backToMateriUrl'
        ));
    }
}
