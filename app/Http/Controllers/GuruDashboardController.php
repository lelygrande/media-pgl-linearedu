<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Models\MaterialProgress;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GuruDashboardController extends Controller
{
    public function index()
    {
        // jumlah siswa
        $totalSiswa = Siswa::count();

        // rata-rata semua nilai
        $rataNilai = QuizAttempt::avg('score');

        $rataNilai = $rataNilai ? round($rataNilai, 1) : 0;

        // Siswa yang mengunjungi hari ini
        $today = Carbon::today()->timestamp;

        $pengunjungHariIni = DB::table('sessions')
            ->whereNotNull('user_id')
            ->where('last_activity', '>=', $today)
            ->distinct('user_id')
            ->count('user_id');

        // data chart
        $quizzes = Quiz::all();

        $labels = [];
        $data = [];

        foreach ($quizzes as $quiz) {

            $labels[] = $quiz->title;

            $avgScore = QuizAttempt::where('quiz_id', $quiz->id)
                ->avg('score');

            $data[] = $avgScore ? round($avgScore, 1) : 0;
        }
        $aktivitas = MaterialProgress::with(['siswa', 'materi'])
            ->whereNotNull('opened_at')
            ->latest('opened_at')
            ->take(5)
            ->get()
            ->map(function ($item) {

                if ($item->is_completed) {
                    $status = 'Selesai';
                    $waktuAsli = $item->completed_at ?? $item->opened_at ?? $item->updated_at;

                } elseif ($item->is_opened) {
                    $status = 'Sedang dikerjakan';
                    $waktuAsli = $item->opened_at ?? $item->updated_at;

                } else {
                    $status = 'Belum mulai';
                    $waktuAsli = $item->updated_at;
                }

                return (object) [
                    'nama' => $item->siswa->nama ?? '-',
                    'materi' => $item->materi->judul ?? '-',
                    'status' => $status,
                    'waktu_asli' => $waktuAsli,

                    'waktu' => $waktuAsli
                        ? Carbon::parse($waktuAsli)->format('d-m-Y H:i')
                        : '-',
                ];
            });

        return view('guru.dashboardguru', compact(
            'totalSiswa',
            'rataNilai',
            'labels',
            'data',
            'aktivitas',
            'pengunjungHariIni'
        ));
    }
}
