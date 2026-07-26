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
            $materis,
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
            | Materi terakhir atau materi yang belum selesai
            |--------------------------------------------------------------------------
            */

            // Menghubungkan progress dengan ID materi
            $progressByMateriId = $progressMateri
                ->filter(fn ($progress) => $progress->materi !== null)
                ->keyBy(fn ($progress) => $progress->materi->id);

            // Cari materi yang sudah dibuka tetapi belum selesai
            $materiBelumSelesai = $materis->first(function ($materi) use ($progressByMateriId) {
                $progress = $progressByMateriId->get($materi->id);

                return $progress
                    && $progress->is_opened
                    && !$progress->is_completed;
            });

            // Cari materi dengan urutan paling akhir yang sudah dicapai
            $materiTerakhirDicapai = $materis
                ->reverse()
                ->first(function ($materi) use ($progressByMateriId) {
                    $progress = $progressByMateriId->get($materi->id);

                    return $progress
                        && ($progress->is_opened || $progress->is_completed);
                });

            if ($totalMateri > 0 && $materiSelesai >= $totalMateri) {
                // Kalau semua selesai, selalu ambil materi paling akhir berdasarkan urutan
                $materiFokus = $materis->last()?->judul ?? '-';
                $statusMateriFokus = 'Terakhir';
                $statusMateriClass = 'bg-success';

            } elseif ($materiBelumSelesai) {
                // Prioritaskan materi yang masih dikerjakan
                $materiFokus = $materiBelumSelesai->judul;
                $statusMateriFokus = 'Belum selesai';
                $statusMateriClass = 'bg-warning text-dark';

            } elseif ($materiTerakhirDicapai) {
                // Jika tidak ada yang belum selesai, tampilkan materi terakhir yang dicapai
                $materiFokus = $materiTerakhirDicapai->judul;
                $statusMateriFokus = 'Terakhir';
                $statusMateriClass = 'bg-success';

            } else {
                $materiFokus = null;
                $statusMateriFokus = 'Belum mulai belajar';
                $statusMateriClass = 'bg-secondary';
            }

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

                'materi_fokus' => $materiFokus,
                'status_materi_fokus' => $statusMateriFokus,
                'status_materi_class' => $statusMateriClass,

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