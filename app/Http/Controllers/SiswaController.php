<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function index(Request $request)
{
    $query = Siswa::query()->orderBy('id', 'desc');

    if ($request->filled('kelas')) {
        $query->where('kelas', $request->kelas);
    }

    $siswas = $query->paginate(10)->withQueryString();

    return view('guru.daftarsiswa', compact('siswas'));
}

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|string|max:20|unique:siswa,nis',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:siswa,email',
            'kelas' => 'required|in:8A,8B,8C',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'password' => 'required|min:6',
        ]);

        Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'email' => $request->email,
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'password' => Hash::make($request->password)
        ]);

        return redirect()
            ->route('daftarsiswa.index')
            ->with('success', 'Siswa berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        return response()->json($siswa);
    }

    public function update(Request $request, string $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nis' => 'required|string|max:20|unique:siswa,nis,' . $id,
            'nama' => 'required',
            'email' => 'required|email|unique:siswa,email,' . $id,
            'kelas' => 'required|in:8A,8B,8C',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'password' => 'nullable|min:6',
        ]);

        $data = $request->only('nis','nama', 'email', 'kelas', 'jenis_kelamin');

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $siswa->update($data);

        return redirect()
            ->route('daftarsiswa.index')
            ->with('success', 'Data siswa berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()
            ->route('daftarsiswa.index')
            ->with('success', 'Siswa berhasil dihapus');
    }

    public function exportPdf()
    {
        $siswas = Siswa::orderBy('id', 'desc')->get();

        $pdf = Pdf::loadView('guru.exports.siswa_pdf', compact('siswas'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('daftar-siswa.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new SiswaExport, 'daftar-siswa.xlsx');
    }
}