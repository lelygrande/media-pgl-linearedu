<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        $siswas = [];

        for ($i = 1; $i <= 20; $i++) {
            $siswas[] = [
                'nis' => '8B' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'nama' => 'Siswa ' . $i,
                'email' => 'siswa' . $i . '@gmail.com',
                'jenis_kelamin' => $i % 2 == 0 ? 'Perempuan' : 'Laki-laki',
                'kelas' => '8B',
                'password' => Hash::make('password123'),
            ];
        }

        foreach ($siswas as $siswa) {
            Siswa::updateOrCreate(
                ['email' => $siswa['email']],
                $siswa
            );
        }
    }
}
