<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Materi;
use App\Models\MaterialProgress;
use App\Models\QuizAttempt;
use Carbon\Carbon;

class ProgressSiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::orderBy('nama')->get();

        $materis = Materi::orderBy('bab_id')
            ->orderBy('urutan')
            ->get();

        $totalMateri = $materis->count();
        $totalQuiz = 5;

        $progressByStudent = MaterialProgress::with('materi')
            ->get()
            ->groupBy('student_id');

        $attemptsByStudent = QuizAttempt::whereNotNull('submitted_at')
            ->orderByDesc('submitted_at')
            ->get()
            ->groupBy('student_id');

        $studentsData = $siswas->map(function ($siswa) use (
            $progressByStudent,
            $attemptsByStudent,
            $totalMateri,
            $totalQuiz
        ) {
            $progressMateri = $progressByStudent->get($siswa->id, collect());

            $materiSelesai = $progressMateri
                ->where('is_completed', true)
                ->count();

            $progressPersen = $totalMateri > 0
                ? round(($materiSelesai / $totalMateri) * 100)
                : 0;

            $attempts = $attemptsByStudent->get($siswa->id, collect());

            $kuisDikerjakan = $attempts
                ->pluck('quiz_id')
                ->unique()
                ->count();

            $evaluasiAttempt = $attempts
                ->where('quiz_id', 5)
                ->sortByDesc('submitted_at')
                ->first();

            $lastActivity = collect([
                $progressMateri->max('opened_at'),
                $progressMateri->max('completed_at'),
                $attempts->max('submitted_at'),
            ])->filter()->max();

            $aktifDalam7Hari = $lastActivity
                ? Carbon::parse($lastActivity)->greaterThanOrEqualTo(now()->subDays(7))
                : false;

            if ($progressPersen < 40) {
                $status = 'Perlu Perhatian';
                $statusClass = 'bg-danger';
            } elseif (!$aktifDalam7Hari) {
                $status = 'Pasif';
                $statusClass = 'bg-warning text-dark';
            } else {
                $status = 'Aktif';
                $statusClass = 'bg-success';
            }

            /*
                Belum ada tabel durasi belajar.
                Jadi ini estimasi sementara: 1 materi terbuka = 5 menit.
            */
            $materiDibuka = $progressMateri
                ->where('is_opened', true)
                ->count();

            $waktuBelajar = $materiDibuka * 5;

            return [
                'id' => $siswa->id,
                'nama' => $siswa->nama,
                'progress_persen' => $progressPersen,
                'materi_selesai' => $materiSelesai,
                'total_materi' => $totalMateri,
                'kuis_dikerjakan' => $kuisDikerjakan,
                'total_quiz' => $totalQuiz,
                'evaluasi_sudah' => $evaluasiAttempt !== null,
                'evaluasi_lulus' => $evaluasiAttempt?->is_passed ?? false,
                'evaluasi_score' => $evaluasiAttempt?->score,
                'waktu_belajar' => $waktuBelajar,
                'status' => $status,
                'status_class' => $statusClass,
                'last_activity' => $lastActivity,
            ];
        });

        $jumlahSiswaAktif = $studentsData
            ->filter(fn ($item) => $item['last_activity'] &&
                Carbon::parse($item['last_activity'])->greaterThanOrEqualTo(now()->subDays(7))
            )
            ->count();

        $rataProgress = $studentsData->count() > 0
            ? round($studentsData->avg('progress_persen'))
            : 0;

        $rataWaktuBelajar = $studentsData->count() > 0
            ? round($studentsData->avg('waktu_belajar'))
            : 0;

        $babSlugMap = [
            'Bab A' => ['subbab-a1', 'subbab-a2-1', 'subbab-a2-2'],
            'Bab B' => [
                'subbab-b-gradien',
                'subbab-b-gradien-satu-titik',
                'subbab-b-gradien-dua-titik',
                'subbab-b-gradien-persamaan1',
            ],
            'Bab C' => [
                'subbab-c-garis-sejajar-sumbuxy',
                'subbab-c-dua-garis-sejajar',
                'subbab-c-dua-garis-tegak-lurus',
            ],
            'Bab D' => [
                'subbab-d-pgl1',
                'subbab-d-pgl2',
                'subbab-d-pgl-sejajar',
                'subbab-d-pgl-tegak-lurus',
            ],
        ];

        $babLabels = array_keys($babSlugMap);
        $chartData = [];

        foreach ($babSlugMap as $label => $slugs) {
            $materiIds = Materi::whereIn('slug', $slugs)->pluck('id');

            $jumlahSiswaSelesaiBab = $siswas->filter(function ($siswa) use ($materiIds) {
                if ($materiIds->isEmpty()) {
                    return false;
                }

                $completedCount = MaterialProgress::where('student_id', $siswa->id)
                    ->whereIn('materi_id', $materiIds)
                    ->where('is_completed', true)
                    ->count();

                return $completedCount === $materiIds->count();
            })->count();

            $chartData[] = $siswas->count() > 0
                ? round(($jumlahSiswaSelesaiBab / $siswas->count()) * 100)
                : 0;
        }

        return view('guru.progres_siswa', compact(
            'studentsData',
            'jumlahSiswaAktif',
            'rataProgress',
            'rataWaktuBelajar',
            'babLabels',
            'chartData'
        ));
    }

    public function detail(Siswa $siswa)
    {
        return view('guru.detail_progress_siswa', compact('siswa'));
    }
}
