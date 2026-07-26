<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KelasController extends Controller
{
    public function index()
    {
        $kelasList = Kelas::withCount('siswa')
            ->orderBy('nama_kelas', 'asc')
            ->paginate(10);

        return view('guru.manajemenkelas', compact('kelasList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:50|unique:kelas,nama_kelas',
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'token_kelas' => $this->generateTokenKelas(),
        ]);

        return redirect()
            ->route('kelas.index')
            ->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);

        $request->validate([
            'nama_kelas' => 'required|string|max:50|unique:kelas,nama_kelas,' . $kelas->id,
        ]);

        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
        ]);

        return redirect()
            ->route('kelas.index')
            ->with('success', 'Nama kelas berhasil diperbarui.');
    }

    public function regenerateToken($id)
    {
        $kelas = Kelas::findOrFail($id);

        $kelas->update([
            'token_kelas' => $this->generateTokenKelas(),
        ]);

        return redirect()
            ->route('kelas.index')
            ->with('success', 'Token kelas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kelas = Kelas::withCount('siswa')->findOrFail($id);

        if ($kelas->siswa_count > 0) {
            return redirect()
                ->route('kelas.index')
                ->with('error', 'Kelas tidak dapat dihapus karena masih memiliki siswa.');
        }

        $kelas->delete();

        return redirect()
            ->route('kelas.index')
            ->with('success', 'Kelas berhasil dihapus.');
    }

    private function generateTokenKelas()
    {
        do {
            $token = strtoupper(Str::random(8));
        } while (Kelas::where('token_kelas', $token)->exists());

        return $token;
    }
}