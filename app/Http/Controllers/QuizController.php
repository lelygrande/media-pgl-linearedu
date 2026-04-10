<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\QuizAttempt;
use App\Models\Bab;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('bab')->orderBy('bab_id')->paginate(10);
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
            'total_questions' => 'required|integer|min:0',
            'kkm' => 'required|numeric|min:0|max:100',
        ]);

        $quiz = Quiz::findOrFail($id);

        $quiz->update([
            'bab_id' => $request->bab_id,
            'title' => $request->title,
            'description' => $request->description,
            'duration_minutes' => $request->duration_minutes,
            'total_questions' => $request->total_questions,
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

        $siswas = Siswa::query()
            ->when($search, function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            })
            ->orderBy('nama')
            ->paginate(10)
            ->withQueryString();

        $rows = $siswas->getCollection()->map(function ($siswa, $index) use ($siswas) {
            $attempts = QuizAttempt::where('student_id', $siswa->id)
                ->where('status', 'submitted')
                ->get()
                ->groupBy('quiz_id');

            $kuisA = optional($attempts->get(1))?->max('score');
            $kuisB = optional($attempts->get(2))?->max('score');
            $kuisC = optional($attempts->get(3))?->max('score');
            $kuisD = optional($attempts->get(4))?->max('score');
            $evaluasi = optional($attempts->get(5))?->max('score');

            $nilaiList = collect([$kuisA, $kuisB, $kuisC, $kuisD, $evaluasi])
                ->filter(fn ($v) => $v !== null);

            $rataRata = $nilaiList->count() ? round($nilaiList->avg(), 1) : null;

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
                'no' => (($siswas->currentPage() - 1) * $siswas->perPage()) + $index + 1,
                'nama' => $siswa->nama,
                'kelas' => $siswa->kelas ?? '-',
                'kuis_a' => $kuisA,
                'kuis_b' => $kuisB,
                'kuis_c' => $kuisC,
                'kuis_d' => $kuisD,
                'evaluasi' => $evaluasi,
                'rata_rata' => $rataRata,
                'status' => $status,
            ];
        });

        return view('guru.rekaptulasi-nilai', [
            'rows' => $rows,
            'siswas' => $siswas,
            'search' => $search,
        ]);
    }
}