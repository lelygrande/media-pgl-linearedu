<?php

namespace App\Exports;

use App\Models\Siswa;
use App\Models\QuizAttempt;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RekapNilaiExport implements FromCollection, WithHeadings, WithMapping
{
    protected $kelas;

    public function __construct($kelas = null)
    {
        $this->kelas = $kelas;
    }

    public function collection()
    {
        $query = Siswa::query()->orderBy('nama');

        if ($this->kelas) {
            $query->where('kelas', $this->kelas);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Kelas',
            'Kuis Bab A',
            'Kuis Bab B',
            'Kuis Bab C',
            'Kuis Bab D',
            'Evaluasi',
            'Rata-rata',
            'Status'
        ];
    }

    public function map($siswa): array
    {
        static $no = 0;
        $no++;

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
            $no,
            $siswa->nama,
            $siswa->kelas,
            $kuisA,
            $kuisB,
            $kuisC,
            $kuisD,
            $evaluasi,
            $rataRata,
            $status
        ];
    }
}
