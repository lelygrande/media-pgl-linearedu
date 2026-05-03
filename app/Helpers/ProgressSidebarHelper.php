<?php

namespace App\Helpers;

use App\Models\MaterialProgress;
use App\Models\QuizAttempt;

class ProgressSidebarHelper
{
    public static function getSidebarProgress($studentId): array
    {
        $completedSlugs = MaterialProgress::with('materi')
            ->where('student_id', $studentId)
            ->where('is_completed', true)
            ->get()
            ->pluck('materi.slug')
            ->filter()
            ->values()
            ->toArray();

        $openedSlugs = MaterialProgress::with('materi')
            ->where('student_id', $studentId)
            ->where('is_opened', true)
            ->get()
            ->pluck('materi.slug')
            ->filter()
            ->values()
            ->toArray();

        $passedQuizIds = QuizAttempt::where('student_id', $studentId)
            ->where('is_passed', true)
            ->pluck('quiz_id')
            ->unique()
            ->values()
            ->toArray();

        $isCompleted = fn ($slug) => in_array($slug, $completedSlugs);
        $isQuizPassed = fn ($quizId) => in_array($quizId, $passedQuizIds);

        $unlockedSlugs = array_merge(['subbab-a1'], $openedSlugs);

        // A
        if ($isCompleted('subbab-a1')) {
            $unlockedSlugs[] = 'subbab-a2-1';
        }

        if ($isCompleted('subbab-a2-1')) {
            $unlockedSlugs[] = 'subbab-a2-2';
        }

        $canAccessQuizA = $isCompleted('subbab-a2-2');

        // B
        if ($isQuizPassed(1)) {
            $unlockedSlugs[] = 'subbab-b-gradien';
        }

        if ($isCompleted('subbab-b-gradien')) {
            $unlockedSlugs[] = 'subbab-b-gradien-satu-titik';
        }

        if ($isCompleted('subbab-b-gradien-satu-titik')) {
            $unlockedSlugs[] = 'subbab-b-gradien-dua-titik';
        }

        if ($isCompleted('subbab-b-gradien-dua-titik')) {
            $unlockedSlugs[] = 'subbab-b-gradien-persamaan1';
        }

        $canAccessQuizB = $isCompleted('subbab-b-gradien-persamaan1');

        // C
        if ($isQuizPassed(2)) {
            $unlockedSlugs[] = 'subbab-c-garis-sejajar-sumbuxy';
        }

        if ($isCompleted('subbab-c-garis-sejajar-sumbuxy')) {
            $unlockedSlugs[] = 'subbab-c-dua-garis-sejajar';
        }

        if ($isCompleted('subbab-c-dua-garis-sejajar')) {
            $unlockedSlugs[] = 'subbab-c-dua-garis-tegak-lurus';
        }

        $canAccessQuizC = $isCompleted('subbab-c-dua-garis-tegak-lurus');

        // D
        if ($isQuizPassed(3)) {
            $unlockedSlugs[] = 'subbab-d-pgl1';
        }

        if ($isCompleted('subbab-d-pgl1')) {
            $unlockedSlugs[] = 'subbab-d-pgl2';
        }

        if ($isCompleted('subbab-d-pgl2')) {
            $unlockedSlugs[] = 'subbab-d-pgl-sejajar';
        }

        if ($isCompleted('subbab-d-pgl-sejajar')) {
            $unlockedSlugs[] = 'subbab-d-pgl-tegak-lurus';
        }

        $canAccessQuizD = $isCompleted('subbab-d-pgl-tegak-lurus');

        return [
            'unlockedSlugs' => array_values(array_unique($unlockedSlugs)),
            'passedQuizIds' => $passedQuizIds,
            'canAccessQuizA' => $canAccessQuizA,
            'canAccessQuizB' => $canAccessQuizB,
            'canAccessQuizC' => $canAccessQuizC,
            'canAccessQuizD' => $canAccessQuizD,
        ];
    }
}
