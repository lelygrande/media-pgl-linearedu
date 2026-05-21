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

            $materiDibuka = $progressMateri
                ->where('is_opened', true)
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

            /*
            |--------------------------------------------------------------------------
            | Aktivitas terakhir
            |--------------------------------------------------------------------------
            */

            $lastActivity = collect([
                $progressMateri->max('opened_at'),
                $progressMateri->max('completed_at'),
                $attempts->max('submitted_at'),
            ])->filter()->max();

            $lastActivityFormatted = $lastActivity
                ? Carbon::parse($lastActivity)
                    ->timezone('Asia/Jakarta')
                    ->format('d-m-Y H:i') . ' WIB'
                : '-';

            /*
            |--------------------------------------------------------------------------
            | Status siswa
            |--------------------------------------------------------------------------
            */

            if (
                $progressPersen >= 100 &&
                $kuisDikerjakan >= $totalQuiz &&
                $evaluasiAttempt &&
                $evaluasiAttempt->is_passed
            ) {
                $status = 'Selesai';
                $statusClass = 'bg-success';
            } elseif ($materiDibuka > 0 || $kuisDikerjakan > 0) {
                $status = 'Sedang Belajar';
                $statusClass = 'bg-primary';
            } else {
                $status = 'Belum Mulai';
                $statusClass = 'bg-secondary';
            }

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

                'aktivitas_terakhir' => $lastActivityFormatted,
                'last_activity' => $lastActivity,

                'status' => $status,
                'status_class' => $statusClass,
            ];
        });

        $jumlahSiswaAktif = $studentsData
            ->where('status', '!=', 'Belum Mulai')
            ->count();

        $rataProgress = round(
            $studentsData->avg('progress_persen'),
            1
        );

        return view('guru.progres_siswa', compact(
            'studentsData',
            'jumlahSiswaAktif',
            'rataProgress'
        ));
    }
}