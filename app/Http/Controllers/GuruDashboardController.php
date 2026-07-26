<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\MaterialProgress;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GuruDashboardController extends Controller
{
    public function index()
    {
        // Jumlah seluruh siswa
        $totalSiswa = Siswa::count();

        // Jumlah siswa berbeda yang aktif hari ini
        $pengunjungHariIni = DB::table('sessions')
            ->whereNotNull('user_id')
            ->where(
                'last_activity',
                '>=',
                now()->startOfDay()->timestamp
            )
            ->whereIn('user_id', Siswa::select('id'))
            ->distinct()
            ->count('user_id');

        // Lima aktivitas materi terbaru
        $aktivitas = MaterialProgress::with(['siswa', 'materi'])
            ->whereNotNull('opened_at')
            ->latest('opened_at')
            ->take(5)
            ->get()
            ->map(function ($item) {
                if ($item->is_completed) {
                    $status = 'Selesai';
                    $waktuAsli =
                        $item->completed_at
                        ?? $item->opened_at
                        ?? $item->updated_at;
                } elseif ($item->is_opened) {
                    $status = 'Sedang dikerjakan';
                    $waktuAsli =
                        $item->opened_at
                        ?? $item->updated_at;
                } else {
                    $status = 'Belum mulai';
                    $waktuAsli = $item->updated_at;
                }

                return (object) [
                    'nama' => $item->siswa->nama ?? '-',
                    'materi' => $item->materi->judul ?? '-',
                    'status' => $status,

                    'waktu' => $waktuAsli
                        ? Carbon::parse($waktuAsli)
                            ->format('d-m-Y H:i')
                        : '-',
                ];
            });

        return view('guru.dashboardguru', compact(
            'totalSiswa',
            'pengunjungHariIni',
            'aktivitas'
        ));
    }
}
