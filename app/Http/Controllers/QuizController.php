<?php

namespace App\Http\Controllers;

use App\Exports\RekapNilaiExport;
use App\Models\Bab;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('bab')
            ->withCount('questions')
            ->orderBy('bab_id')
            ->paginate(10);

        $babs = Bab::orderBy('urutan')->get();

        return view('guru.manajemenkuis', compact('quizzes', 'babs'));
    }

    public function show($id)
    {
        $quiz = Quiz::findOrFail($id);
        return response()->json($quiz);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bab_id' => 'required|exists:bab,id',
            'title' => 'required|string|max:150',
            'description' => 'nullable|string',
            'duration_minutes' => 'required|integer|min:1',
            'kkm' => 'required|numeric|min:0|max:100',
        ]);

        $quiz = Quiz::findOrFail($id);

        $quiz->update([
            'bab_id' => $request->bab_id,
            'title' => $request->title,
            'description' => $request->description,
            'duration_minutes' => $request->duration_minutes,
            'kkm' => $request->kkm,
        ]);

        return redirect()->route('kuis.index')->with('success', 'Kuis berhasil diupdate.');
    }

    public function soal($id)
    {
        $quiz = Quiz::with('questions.options')->findOrFail($id);
        return view('guru.manajemensoal', compact('quiz'));
    }

    public function rekapNilai(Request $request)
    {
        $search = $request->query('search');
        $kelas = $request->query('kelas');

        $siswas = Siswa::query()
            ->when($search, function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            })
            ->when($kelas, function ($query) use ($kelas) {
                $query->where('kelas', $kelas);
            })
            ->orderBy('nama')
            ->paginate(10)
            ->withQueryString();

        $rows = $siswas->getCollection()->map(
            function ($siswa, $index) use ($siswas) {

                /*
                * Mengambil seluruh nilai yang sudah dikumpulkan.
                * Percobaan lama yang telah di-reset tetap dipertahankan
                * dalam rekap nilai.
                */
                $attempts = QuizAttempt::where('student_id', $siswa->id)
                    ->where('status', 'submitted')
                    ->get()
                    ->groupBy('quiz_id');

                $kuisA = optional($attempts->get(1))->max('score');
                $kuisB = optional($attempts->get(2))->max('score');
                $kuisC = optional($attempts->get(3))->max('score');
                $kuisD = optional($attempts->get(4))->max('score');
                $evaluasi = optional($attempts->get(5))->max('score');

                /*
                * Menghitung percobaan pada periode yang sedang aktif.
                * Percobaan yang sudah di-reset guru tidak dihitung lagi.
                */
                $jumlahPercobaan = QuizAttempt::where(
                    'student_id',
                    $siswa->id
                )
                    ->where('is_reset', 0)
                    ->whereIn('status', [
                        'in_progress',
                        'submitted',
                        'expired',
                    ])
                    ->selectRaw('quiz_id, COUNT(*) AS total')
                    ->groupBy('quiz_id')
                    ->pluck('total', 'quiz_id');

                $percobaanKuisA = (int) ($jumlahPercobaan->get(1) ?? 0);
                $percobaanKuisB = (int) ($jumlahPercobaan->get(2) ?? 0);
                $percobaanKuisC = (int) ($jumlahPercobaan->get(3) ?? 0);
                $percobaanKuisD = (int) ($jumlahPercobaan->get(4) ?? 0);
                $percobaanEvaluasi = (int) ($jumlahPercobaan->get(5) ?? 0);

                $nilaiList = collect([
                    $kuisA,
                    $kuisB,
                    $kuisC,
                    $kuisD,
                    $evaluasi,
                ])->filter(function ($nilai) {
                    return $nilai !== null;
                });

                $rataRata = $nilaiList->isNotEmpty()
                    ? round($nilaiList->avg(), 1)
                    : null;

                if ($rataRata === null) {
                    $status = 'Belum Ada Nilai';
                } elseif ($rataRata >= 75) {
                    $status = 'Tuntas';
                } elseif ($rataRata >= 65) {
                    $status = 'Perlu Perbaikan';
                } else {
                    $status = 'Belum Tuntas';
                }

                return [
                    'student_id' => $siswa->id,

                    'no' => (
                        ($siswas->currentPage() - 1)
                        * $siswas->perPage()
                    ) + $index + 1,

                    'nama' => $siswa->nama,
                    'kelas' => $siswa->kelas ?? '-',

                    'kuis_a' => $kuisA,
                    'kuis_b' => $kuisB,
                    'kuis_c' => $kuisC,
                    'kuis_d' => $kuisD,
                    'evaluasi' => $evaluasi,

                    'rata_rata' => $rataRata,
                    'status' => $status,

                    /*
                    * Jumlah percobaan aktif pada setiap kuis
                    */
                    'percobaan_kuis_a' => $percobaanKuisA,
                    'percobaan_kuis_b' => $percobaanKuisB,
                    'percobaan_kuis_c' => $percobaanKuisC,
                    'percobaan_kuis_d' => $percobaanKuisD,
                    'percobaan_evaluasi' => $percobaanEvaluasi,

                    /*
                    * Tombol reset hanya dapat digunakan
                    * setelah mencapai 3 kali percobaan.
                    */
                    'bisa_reset_kuis_a' => $percobaanKuisA >= 3,
                    'bisa_reset_kuis_b' => $percobaanKuisB >= 3,
                    'bisa_reset_kuis_c' => $percobaanKuisC >= 3,
                    'bisa_reset_kuis_d' => $percobaanKuisD >= 3,
                    'bisa_reset_evaluasi' => $percobaanEvaluasi >= 3,
                ];
            }
        );

        return view('guru.rekaptulasi-nilai', [
            'rows' => $rows,
            'siswas' => $siswas,
            'search' => $search,
            'kelas' => $kelas,
        ]);
    }

    // Rekapitulasi Nilai
    public function exportRekapPdf(Request $request)
    {
        $query = Siswa::query();

        if ($request->kelas) {
            $query->where('kelas', $request->kelas);
        }

        $siswas = $query->orderBy('nama')->get();

        $rows = $siswas->map(function ($siswa, $index) {

            $attempts = QuizAttempt::where('student_id', $siswa->id)
                ->where('status', 'submitted')
                ->get()
                ->groupBy('quiz_id');

            $kuisA = optional($attempts->get(1))?->max('score');
            $kuisB = optional($attempts->get(2))?->max('score');
            $kuisC = optional($attempts->get(3))?->max('score');
            $kuisD = optional($attempts->get(4))?->max('score');
            $evaluasi = optional($attempts->get(5))?->max('score');

            $nilaiList = collect([
                $kuisA,
                $kuisB,
                $kuisC,
                $kuisD,
                $evaluasi
            ])->filter(fn ($v) => $v !== null);

            $rataRata = $nilaiList->count()
                ? round($nilaiList->avg(), 1)
                : null;

            if ($rataRata === null) {
                $status = 'Belum Ada Nilai';
            } elseif ($rataRata >= 75) {
                $status = 'Tuntas';
            } elseif ($rataRata >= 65) {
                $status = 'Perlu Perbaikan';
            } else {
                $status = 'Belum Tuntas';
            }

            return [
                'no' => $index + 1,
                'nama' => $siswa->nama,
                'kelas' => $siswa->kelas,
                'kuis_a' => $kuisA,
                'kuis_b' => $kuisB,
                'kuis_c' => $kuisC,
                'kuis_d' => $kuisD,
                'evaluasi' => $evaluasi,
                'rata_rata' => $rataRata,
                'status' => $status,
            ];
        });

        $pdf = Pdf::loadView(
            'guru.exports.rekap_pdf',
            compact('rows')
        )->setPaper('a4', 'landscape');

        return $pdf->download('rekapitulasi-nilai.pdf');
    }
    public function exportRekapExcel(Request $request)
    {
        return Excel::download(
            new RekapNilaiExport($request->kelas),
            'rekapitulasi-nilai.xlsx'
        );
    }
    
    public function resetPercobaan($studentId, $quizId)
    {
        $siswa = Siswa::findOrFail($studentId);
        $quiz = Quiz::findOrFail($quizId);

        $jumlahPercobaan = QuizAttempt::where('quiz_id', $quiz->id)
            ->where('student_id', $siswa->id)
            ->where('is_reset', 0)
            ->whereIn('status', [
                'in_progress',
                'submitted',
                'expired',
            ])
            ->count();

        if ($jumlahPercobaan < 3) {
            return back()->with(
                'error',
                'Percobaan ' . $quiz->title .
                ' milik ' . $siswa->nama .
                ' belum mencapai batas 3 kali.'
            );
        }

        DB::transaction(function () use ($studentId, $quizId) {
            /*
            * Attempt yang masih berjalan diakhiri terlebih dahulu.
            */
            QuizAttempt::where('quiz_id', $quizId)
                ->where('student_id', $studentId)
                ->where('is_reset', 0)
                ->where('status', 'in_progress')
                ->update([
                    'status' => 'expired',
                    'end_at' => now(),
                    'submitted_at' => now(),
                    'updated_at' => now(),
                ]);

            /*
            * Semua percobaan dalam periode saat ini diarsipkan.
            * Data tidak dihapus sehingga riwayat tetap tersimpan.
            */
            QuizAttempt::where('quiz_id', $quizId)
                ->where('student_id', $studentId)
                ->where('is_reset', 0)
                ->update([
                    'is_reset' => 1,
                    'reset_at' => now(),
                    'updated_at' => now(),
                ]);
        });

        return back()->with(
            'success',
            'Percobaan ' . $quiz->title .
            ' milik ' . $siswa->nama .
            ' berhasil di-reset. Siswa memperoleh kembali 3 kali kesempatan.'
        );
    }
}
