<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SiswaExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Siswa::orderBy('id', 'desc')->get();
    }

    public function headings(): array
    {
        return ['No', 'Nama', 'Email', 'Kelas', 'Jenis Kelamin'];
    }

    public function map($siswa): array
    {
        static $no = 0;
        $no++;

        return [
            $no,
            $siswa->nama,
            $siswa->email,
            $siswa->kelas,
            $siswa->jenis_kelamin,
        ];
    }
}