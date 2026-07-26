<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $kelasList = Kelas::orderBy('nama_kelas', 'asc')->get();

        $query = Siswa::with('kelasData')
            ->orderBy('id', 'desc');

        if ($request->filled('kelas_id')) {
            $query->where('kelas_id', $request->kelas_id);
        }

        $siswas = $query->paginate(10)->withQueryString();

        return view('guru.daftarsiswa', compact('siswas', 'kelasList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|string|max:20|unique:siswa,nis',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:siswa,email',
            'kelas_id' => 'required|exists:kelas,id',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'password' => 'required|min:6',
        ]);

        $kelas = Kelas::findOrFail($request->kelas_id);

        Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'email' => $request->email,
            'kelas_id' => $request->kelas_id,

            // Ini sementara saja jika kolom kelas lama masih ada di tabel siswa.
            // Kalau kolom kelas sudah dihapus, hapus baris ini.
            'kelas' => $kelas->nama_kelas,

            'jenis_kelamin' => $request->jenis_kelamin,
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('daftarsiswa.index')
            ->with('success', 'Siswa berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $siswa = Siswa::with('kelasData')->findOrFail($id);

        return response()->json([
            'id' => $siswa->id,
            'nis' => $siswa->nis,
            'nama' => $siswa->nama,
            'email' => $siswa->email,
            'kelas_id' => $siswa->kelas_id,
            'kelas' => $siswa->kelasData->nama_kelas ?? $siswa->kelas,
            'jenis_kelamin' => $siswa->jenis_kelamin,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nis' => 'required|string|max:20|unique:siswa,nis,' . $id,
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:siswa,email,' . $id,
            'kelas_id' => 'required|exists:kelas,id',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'password' => 'nullable|min:6',
        ]);

        $kelas = Kelas::findOrFail($request->kelas_id);

        $data = [
            'nis' => $request->nis,
            'nama' => $request->nama,
            'email' => $request->email,
            'kelas_id' => $request->kelas_id,

            // Ini sementara saja jika kolom kelas lama masih ada di tabel siswa.
            // Kalau kolom kelas sudah dihapus, hapus baris ini.
            'kelas' => $kelas->nama_kelas,

            'jenis_kelamin' => $request->jenis_kelamin,
        ];

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
        $siswas = Siswa::with('kelasData')
            ->orderBy('id', 'desc')
            ->get();

        $pdf = Pdf::loadView('guru.exports.siswa_pdf', compact('siswas'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('daftar-siswa.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new SiswaExport, 'daftar-siswa.xlsx');
    }
}
